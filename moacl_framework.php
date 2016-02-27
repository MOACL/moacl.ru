<?
include_once 'constants.php';


 class Moacl { //Корневой класс фреймворка
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
	static $message;
	static $mysqli;
	 function __construct(){

		 self::$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DB);

		 if (mysqli_connect_errno()) {
			 printf("Error database: %s\n", mysqli_connect_error());
			 exit();
		 }
	 }

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
			$feedback="Login is missing! Please put <=" . LOGIN_MAX_LEN . "letters.";
			return $feedback;
		}//Login
	
		//Password
		if(mb_strlen(self::$password, ENCODING) > PASSWORD_MAX_LEN){
			$feedback="Very long Password! Please put <=" . PASSWORD_MAX_LEN . " letters.";
			return $feedback;
		}
		elseif(mb_strlen(self::$password, ENCODING)==0){
			$feedback="Password is missing! Please put <=" . PASSWORD_MAX_LEN . "letters.";
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
		self::$password = self::$mysqli->real_escape_string(self::$password);
		self::$email = trim(strtolower(self::$email));
	}

	function loginExist(){

		$login = self::$login;
		$query = "select `User_id` from `users` where `Deleted` = 0 and `Login` = '$login'";
		$result = self::$mysqli->query($query);

		if (!$result) { 
				$feedback = 'Error - Database Error! - '; 
				$feedback .= self::$mysqli->error;
		}
		else{
			$myrow = $result->fetch_array(MYSQLI_ASSOC);
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
		$result = self::$mysqli->query($query);
		if (!$result) { 
				$feedback = 'Error - Database Error! - '; 
				$feedback .= self::$mysqli->error;
		}
		else{
			$myrow = $result->fetch_array(MYSQLI_ASSOC);
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

class Authentication extends SecureSystem{

	function __construct(){
		parent::__construct();
		define('SID',session_id());
	}


	static function logout() {
		session_start();
		unset($_SESSION['User_ID']); //Удаляем из сессии ID пользователя
		session_destroy();
		header('Location: index.php'); //header('Location: '.$_SERVER['HTTP_HOST'])
	}

	function authorizer() {
		if(!empty($_SESSION['User_ID'])){
			return true;
		}
		else{
			return false;
		}
	}

	function getUserName() {
		if(!empty($_SESSION['User_ID'])){
			return $_SESSION['Login'];
		}
		else{
			return "?????";
		}
	}

	function login($login,$password,$email)    {

		self::$login=$login;
		self::$password=$password;
		self::$email=$email;
		self::prepareRegData();

		$query = "SELECT `Password`, `Salt`, `Login`, `User_ID` FROM `users` WHERE `Login`= '$login'  and `Activation` = 1 and `Deleted` = 0;";
		$result = self::$mysqli->query($query)	or die(self::$mysqli->error);
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$_USER = $row;
		$password_db = $row['Password'];
		$salt_db = $row['Salt'];
		$login_db = $row['Login'];
		$hash = crypt(self::$password, $salt_db);
		$user_id = $row['User_ID'];
		if($hash==$password_db && $login =$login_db) {
			$_SESSION = array_merge($_SESSION,$_USER); //Добавляем массив с пользователем к массиву сессии

			$query = "UPDATE `users` SET `SID`='".SID."' WHERE `User_ID`='$user_id';";
			//примерный запрос для ддълогирования действия аутентификации $query = "INSERT INTO `users_sessions`
			// (`SID`, `UID`, `IP`, `BROWSER`, `Action_ID`, `Date_of_start` ,`Date_of_end`) VALUES
			// ('$sid' , '$uid' ,'$ip', '$browser', 1 , Now() , Now());"; // Action_ID =1 (registration)

			self::$mysqli->query($query)or die(self::$mysqli->error);

			return true;
		}
		else {
			return false;
		}
	}
}
class Registration extends SecureSystem{

	function __construct(){
		parent::__construct();
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
		$result = self::$mysqli->query($query);
		
		if($result){
			
			$query = "SELECT`User_id` FROM `users` WHERE `Login` = '$login';";
			$result = self::$mysqli->query($query);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$uid= $row['User_id'];
			$query = "INSERT INTO `users_sessions` (`SID`, `UID`, `IP`, `BROWSER`, `Action_ID`, `Date_of_start` ,`Date_of_end`) VALUES ('$sid' , '$uid' ,'$ip', '$browser', 1 , Now() , Now());"; // Action_ID =1 (registration)
			$result = self::$mysqli->query($query);
		}
		
		
		if (!$result) { 
			$feedback = 'Error - Database Error! - '; 
			$feedback .= self::$mysqli->error;
			self::$message = $feedback;
		}
		else{
			self::sendMail();
		}	
	}

	function sendMail(){
		 $email = self::$email;
		 $login = self::$login;
		 $query = "SELECT `User_id`, `Salt` FROM `users` WHERE `Login`='$login'";
		 $result = self::$mysqli->query($query);
		 $row = $result->fetch_array(MYSQLI_ASSOC);
		 $activation = crypt($row['User_id'].$login, $row['Salt']);
		 $subject = "Registration confirmation.";
		 $message    = "Уважаемый ".$login.", для активации акаунта на moacl.ru перейдите по ссылке:\nhttp://moacl.ru/activation.php?login=".$login."&code=".$activation;
		mail($email, $subject, $message, "Content-type:text/plane; Charset=utf-8\r\n");
		$feedback = "На ".$email." отправлена cсылкa для подтверждения регистрации.<br> Внимание! Ссылка действительна 1 час."; 
		self::$message = $feedback;
		
	}
	
	function activateUser(){
			
		$ip = self::getIp();
		$browser = self::getBrowser();
		$sid = self::getSID();
		$code = null;

		$query = "UPDATE `users` SET `Deleted`=1 WHERE Activation='0' AND UNIX_TIMESTAMP()- UNIX_TIMESTAMP(`Date_of_add`) > " . MAIL_REG_LIMIT . ";";
		self::$mysqli->query($query);
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
		$query = "SELECT `User_id`, `Salt` FROM `users` WHERE Login='$login' and activation='0' ";
		$result = self::$mysqli->query($query);
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$activation = crypt($row['User_id'].$login, $row['Salt']);
		
		if($result->num_rows==0){
			self::$message =  "User $login already activated! <a href='index.php'>Moacl.ru</a>";
		}
		
		elseif ($activation == $code) {
			$query = "UPDATE `users` SET `Activation`='1', `IP` = '$ip', `SID` = '$sid', `BROWSER` = '$browser' WHERE Login='$login'";
			$result = self::$mysqli->query($query);
			
			if($result){
			
			$query = "SELECT`User_id` FROM `users` WHERE `Login` = '$login';";
			$result = self::$mysqli->query ($query);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$uid= $row['User_id'];
			$query = "INSERT INTO `users_sessions` (`SID`, `UID`, `IP`, `BROWSER`, `Action_ID`, `Date_of_start` ,`Date_of_end`) VALUES ('$sid' , '$uid' ,'$ip', '$browser', 2 , Now() , Now());"; // Action_ID =2 (activation)
			$result = self::$mysqli->query($query);
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
				
				$feedback=self::loginExist(); //false или "Login already exist"
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

class Money extends SecureSystem{
	function getAccounts(){
		$result=self::$mysqli->query("SELECT Account_ID, Account, Selected FROM mfin.accounts WHERE Disabled = 0;");

		if ($result) {
			$num = $result->num_rows;
			$i = 0;
			while ($i < $num) {
				$row[$i] = $result->fetch_array(MYSQLI_ASSOC);
				$i++;
			}
			return array('row'=>$row);
		}
		else {
			return array('type'=>'error');
		}
	}
	function getBalance($account_id){
		$result=self::$mysqli->query("select Balance from accounts where Account_ID =" . $account_id .";");

		if ($result) {
			$num = $result->num_rows;
			$i = 0;
			while ($i < $num) {
				$row[$i] = $result->fetch_array(MYSQLI_ASSOC);
				$i++;
			}
			return array('row'=>$row);
		}
		else {
			return array('type'=>'error');
		}
	}
	function getCategories($revenue){
		$result=self::$mysqli->query("SELECT Category_ID, Category, Selected  FROM mfin.categories mc WHERE mc.Disabled = 0 AND mc.Revenue=" . $revenue .";");

		if ($result) {
			$num = $result->num_rows;
			$i = 0;
			while ($i < $num) {
				$row[$i] = $result->fetch_array(MYSQLI_ASSOC);
				$i++;
			}
			return array('row'=>$row);
		}
		else {
			return array('type'=>'error');
		}
	}
	function getItems($category_id){
		$result=self::$mysqli->query("SELECT Item_ID, Item, Selected FROM mfin.items mg WHERE mg.Disabled = 0 AND mg.Category_ID=" . $category_id .";");

		if ($result) {
			$num = $result->num_rows;
			$i = 0;
			while ($i < $num) {
				$row[$i] = $result->fetch_array(MYSQLI_ASSOC);
				$i++;
			}
			return array('row'=>$row);
		}
		else {
			return array('type'=>'error');
		}
	}
	function transactionGo($account_id, $category_id, $item_id, $sum, $commentary, $date){

		$query = "insert into transactions(Account_ID, Category_ID, Item_ID, Deleted, Sum, Date_of_realization, Commentary)
			select " . $account_id . "," . $category_id . "," . $item_id . ",0," . $sum . ", '" . $date . "'," . $commentary . ";";

		$result=self::$mysqli->query($query);

		if ($result) {
			return true;

		} else {
			return false;
		}
	}

}

?>