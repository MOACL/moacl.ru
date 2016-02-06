<?
include_once 'constants.php';
include_once 'connect.php';

 class Moacl{ //Корневой класс фреймворка
	public $author = "Dmitry Fomin";
	public $mission = "Diminish entropy";
}

 class SecureSystem extends Moacl{
	static $login;
	static $password;
	static $password_repeat;
	static $email;
	static $sid;
	static $uid;
	static $ip;
	static $browser;
	static $salt;
	static $hash;
	static $messa333ge;
	
	function verificationRegData() {
		//Login
		$feedback=self::loginExist();
		if(!$feedback === false){
			return $feedback;
		}
		if(mb_strlen(self::$login, ENCODING) > LOGIN_MAX_LEN){
			$feedback="Very long Login, Please put <=" . LOGIN_MAX_LEN . "letters.";
			return $feedback;
		}
		elseif(mb_strlen(self::$login, ENCODING)==0){
			$feedback="Login is mising! Please put <=" . LOGIN_MAX_LEN . "letters.";
			return $feedback;
		}//Login
	
		//Password
		if(mb_strlen(self::$password, ENCODING) > PASSWORD_MAX_LEN){
			$feedback="Very long Password! Please put <=" . PASSWORD_MAX_LEN . " letters.";
			return $feedback;
		}
		elseif(mb_strlen(self::$password, ENCODING)==0){
			$feedback="Password is mising! Please put <=" . PASSWORD_MAX_LEN . "letters.";
			return $feedback;
		}//Password
	
		//E-mail
		$feedback=self::emailExist();
		if(!$feedback === false){
			return $feedback;
		}
		if(!preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", self::$email)) { 
			$feedback="Incorrect Email!";
			return $feedback;
		} //E-mail
		
	}
		
	function prepareRegData() { 
		self::$login = trim(strtolower(self::$login));
		self::$password = mysql_real_escape_string(self::$password);
		self::$email = trim(strtolower(self::$email));
	}
	
	function loginExist(){
		$login = self::$login;
		$query = "select `User_id` from `users` where `Deleted` = 0 and `Login` = '$login'";
		$result = mysql_query($query); 
		if (!$result) { 
				$feedback = 'Error - Database Error! - '; 
				$feedback .= mysql_error(); 
		}
		else{
			$myrow = mysql_fetch_array($result);
			if (!empty($myrow['User_id'])) {
				$feedback ="Login already exist!";
			}
			else{
				$feedback = false;
			}
			return $feedback;
		}
	}
	
	function emailExist(){
		$email = self::$email;
		$query = "select `User_id` from `users` where `Deleted` = 0 and `E-mail` = '$email'";
		$result = mysql_query($query); 
		if (!$result) { 
				$feedback = 'Error - Database Error! - '; 
				$feedback .= mysql_error(); 
		}
		else{
			$myrow = mysql_fetch_array($result);
			if (!empty($myrow['User_id'])) {
				$feedback ="Email already exist!";
			}
			else{
				$feedback = false;
			}
			return $feedback;
		}
	}
	
	function getSalt(){
		self::$salt = '$2a$10$'.substr(str_replace('+', '.', base64_encode(pack('N4', mt_rand(), mt_rand(), mt_rand(),mt_rand()))), 0, 22) . '$';
		return self::$salt;
	}
	
	function getIp(){
		if (!empty($_SERVER['HTTP_CLIENT_IP'])){
			self::$ip=$_SERVER['HTTP_CLIENT_IP'];
		}
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			self::$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else{
			self::$ip=$_SERVER['REMOTE_ADDR'];
		}
		return self::$ip;
	}
	
	function getBrowser(){
			self::$browser=$_SERVER['HTTP_USER_AGENT'];
			return self::$browser;
	}
	
	
	function getHash(){
		self::$hash = crypt(self::$login, self::$salt);
		return self::$hash;
	}
	
	function getSID(){
		 self::$sid = session_id();
		 return self::$sid;
	}
	
	
}

class Registration extends SecureSystem{

	function __construct(){

		self::$login= $_POST['login'];
		self::$password= $_POST['password1'];
		self::$email = $_POST['email'];
				
		$feedback =self::verificationRegData();
		if($feedback){
			self::$message = $feedback;
		}
		else{
			self::prepareRegData();
			self::addUser();
		}
	}
	
	function addUser(){
		$login = self::$login;
		$salt =self::getSalt();
		$hash =self::getHash();
		$email =self::$email;
		$ip =self::getIp();
		$browser =self::getBrowser();
		$sid =self::getSID();
		
		
		$query = "INSERT INTO `users` (`Login`, `Password`, `Salt`, `E-mail`, `IP`, `SID` ,`BROWSER`) VALUES ('$login' , '$hash' ,'$salt', '$email', '$ip', '$sid' , '$browser');";
		$result = mysql_query($query); 
		
		if($result){
			
			$query = "SELECT`User_id` FROM `users` WHERE `Login` = '$login';";
			$result = mysql_query ($query);
			$row = mysql_fetch_array($result);
			$uid= $row['User_id'];
			$query = "INSERT INTO `users_sessions` (`SID`, `UID`, `IP`, `BROWSER`, `Action_ID`, `Date_of_start` ,`Date_of_end`) VALUES ('$sid' , '$uid' ,'$ip', '$browser', 1 , Now() , Now());"; // Action_ID =1 (registration)
			$result = mysql_query($query); 
		}
		
		
		if (!$result) { 
			$feedback = 'Error - Database Error! - '; 
			$feedback .= mysql_error(); 
			self::$message = $feedback;
		}
		else{
			self::sendMail();
		}	
	}
	
	
	
	function sendMail(){
		 $email = self::$email;
		 $login = self::$login;
		 $result = mysql_query ("SELECT `User_id`, `Salt` FROM `users` WHERE `Login`='$login'");
		 $row = mysql_fetch_array($result);
		 $activation = crypt($row['User_id'].$login, $row['Salt']);
		 $subject = "Registration confirmation.";
		 $message    = "Уважаемый ".$login.", для активации акаунта на moacl.ru перейдите по ссылке:\nhttp://moacl.ru/activation.php?login=".$login."&code=".$activation;
		mail($email, $subject, $message, "Content-type:text/plane; Charset=utf-8\r\n");
		$feedback = "На ".$email." отправлена cсылкa для подтверждения регистрации.<br> Внимание! Ссылка действительна 1 час."; 
		self::$message = $feedback;
		
	}
	
	function activateUser(){
			
		$ip =self::getIp();
		$browser =self::getBrowser();
		$sid =self::getSID();
		
		mysql_query ("UPDATE `users` SET `Deleted`=1 WHERE Activation='0' AND UNIX_TIMESTAMP()- UNIX_TIMESTAMP(`Date_of_add`) > " . MAIL_REG_LIMIT . ";");
		if(isset($_GET['code'])) {
			$code =$_GET['code'];
		}
		else {
			self::$message = "Вы  зашли на страницу без кода подтверждения!";
		}
		if (isset($_GET['login'])) {
			$login=$_GET['login'];
		}
		else {
			self::$message = "Вы зашли на страницу без логина!";
			exit;
		}
		$result = mysql_query("SELECT `User_id`, `Salt` FROM `users` WHERE Login='$login' and activation='0' ");
		$row    = mysql_fetch_array($result); 
		$activation    = crypt($row['User_id'].$login, $row['Salt']);
		
		if(mysql_num_rows($result)==0){
			self::$message =  "User $login already activated! <a href='index.php'>Moacl.ru</a>";
		}
		
		elseif ($activation == $code) {
			$result = mysql_query("UPDATE `users` SET `Activation`='1', `IP` = '$ip', `SID` = '$sid', `BROWSER` = '$browser' WHERE Login='$login'");
			
			if($result){
			
			$query = "SELECT`User_id` FROM `users` WHERE `Login` = '$login';";
			$result = mysql_query ($query);
			$row = mysql_fetch_array($result);
			$uid= $row['User_id'];
			$query = "INSERT INTO `users_sessions` (`SID`, `UID`, `IP`, `BROWSER`, `Action_ID`, `Date_of_start` ,`Date_of_end`) VALUES ('$sid' , '$uid' ,'$ip', '$browser', 2 , Now() , Now());"; // Action_ID =2 (activation)
			$result = mysql_query($query); 
			}
			
			self::$message = "Congratulations!<br>Now you are the owner of Moacl-account!";
			self::$message .=  "<br> <a href='main.php'>Go!</a>";
		}
		else {
			self::$message =  "Error! Your E-mail are not confirm'! <a href='index.php'>Moacl.ru</a>";
		//	self::$message .=   "\r\n $activation";
		//	self::$message .=   "\r\n $code";
		}
	}
	
	function warningField($key, $val){

		switch($key) {
			case "login":
				//Login
				self::$login= $val;
				
				$feedback=self::loginExist(); //false или "Login alredy exist"
				if(!$feedback === false){
					return $feedback;
				}
				elseif(mb_strlen(self::$login, ENCODING) > LOGIN_MAX_LEN){
					$feedback="Very long Login, Please put <=" . LOGIN_MAX_LEN . "letters.";
					return $feedback;
				}
				elseif(mb_strlen(self::$login, ENCODING)==0){
					$feedback="";
					return $feedback;
				}
				else{
					$feedback=_OK;
					return $feedback;
				}//Login
				break;
			
			case "password1":	
				//password1
				self::$password= $val;
			
				if(mb_strlen(self::$password, ENCODING) > PASSWORD_MAX_LEN){
					$feedback="Very long Password! Please put <=" . PASSWORD_MAX_LEN . " letters.";
					return $feedback;
				}
				elseif(mb_strlen(self::$password, ENCODING)==0){
					$feedback="";
					return $feedback;
				}
				else{
					$feedback=_OK;
					return $feedback;
				}//password1
				break;
			
			case "password2":	
				//password2
				self::$password_repeat= $val;
			
				if(mb_strlen(self::$password, ENCODING)==0 && mb_strlen(self::$password_repeat, ENCODING)==0){
					$feedback="";
					return $feedback;
				}
				elseif(self::$password <> self::$password_repeat){
					$feedback="Passwords do not match.";
					return $feedback;
				}
				else{
					$feedback=_OK;
					return $feedback;
				}//password2
				break;
			case "email":	
				//E-mail
				self::$email= $val;
				$feedback=self::emailExist();
				if(!$feedback === false){
					return $feedback;
				}
				elseif(mb_strlen(self::$email, ENCODING)==0){
					$feedback="";
					return $feedback;
				}
				elseif(!preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", self::$email)) { 
					$feedback="Incorrect Email!";
					return $feedback;
				}
				else{
					$feedback=_OK;
					return $feedback;
				}//E-mail
				break;
		}
	}
}
?>