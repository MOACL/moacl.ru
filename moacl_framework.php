<?
include_once 'constants.php';


 class Moacl { //Корневой класс фреймворка
	public $author = "Dmitry Fomin";
	public $mission = "The victory over entropy";
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
	static $dbErrorString = "Error database: ";
	static $longLoginString = "Very long Login, Please put <=";
	static $missLoginString = "Login is missing! Please put <=";
	static $longPswString = "Very long Password, Please put <=";
	static $missPswString = "Password is missing! Please put <=";
	static $existsLoginString = "Login already exists!";
	static $lettersString = "letters.";
	static $incorrectEmailString = "Incorrect Email!";
	static $existsEmailString = "Email already exists!";
	static $emailMask = "|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i";
	static $notMatchPswString = "Passwords do not match.";
	static $noConfirmString = "No confirm code.";
	static $noLoginString = "No login."; //заход на страницу без логина

	 function __construct(){
		 if (isset(self::$mysqli)){
			 exit;
		 }
		 if($_SERVER['HTTP_HOST'] == HTTPHOST){
			 self::$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DB);
		 }
		 else{
			 self::$mysqli = new mysqli(DBHOST_LOC, DBUSER_LOC, DBPASS_LOC, DB_LOC);
		 }

		 if (self::$mysqli->connect_errno) {
			 printf(self::$dbErrorString . self::$mysqli->connect_error);
			 exit();
		 }
	 }

	 function __destruct() {
		 if (isset(self::$mysqli)){
			 self::$mysqli->close();
			 self::$mysqli=null;
		 }

	 }

	 function getParamSQL($queryName,$paramArray){
		 $query = "select * from `sql_templates` where `Query_name` ='$queryName'";
		 $result = self::$mysqli->query($query);
		 $row = $result->fetch_array(MYSQLI_ASSOC);
		 if (!$result) {
			 return false;
		 }
		 else {
			 $sqlTemlate = $row['SQL'];
			 $parameters = $row['Parameters'];
			 $m=0;
			 $sql=$sqlTemlate;
			 if ($paramArray != null) {
				 foreach ($paramArray as $i => $value) {
					 $n = strpos($parameters, ";", $m + 1);
					 $parameter = "@@" . substr($parameters, $m, $n - $m) . "@@";
					 $sql = str_replace($parameter, $value, $sql);
					 $m = $n + 1;
				 }
			 }
			 return $sql;
		 }
	 }
     function getSP($spName,$paramArray){

         $query = "call $spName";
             if ($paramArray != null) {
                 //$query .= "(join(",", $paramArray))";
                 $query .= "('" . implode("', '", $paramArray) . "');";
         }
         return $query;
     }

     function getJsonFromSP($spName,$paramArray){
         $query = "call $spName";
         if ($paramArray != null) {
             $query .= "('" . implode("', '", $paramArray) . "');";
         }
         $resultQuery=self::$mysqli->query($query);
         $row = array();
         if ($resultQuery) {
             $num = $resultQuery->num_rows;
             $i = 0;
             while ($i < $num) {
                 $row[$i] = $resultQuery->fetch_array(MYSQLI_ASSOC);
                 $i++;
             }
             $result = array('row'=>$row);
         }
         else {
             $result = array('type'=>'error');
         }
         $result = json_encode($result);
         return $result;
     }

	 function verificationRegData() {
		//Login
		$loginExist=self::loginExist();
		$emailExist=self::emailExist();
		$login=mb_strlen(self::$login, ENCODING);
		$password=mb_strlen(self::$password, ENCODING);
		$email = self::$email;


		//Login
		if($loginExist === false){ //если такого логина еще нет в базе
			if($login > LOGIN_MAX_LEN){
				$feedback= self::$longLoginString . LOGIN_MAX_LEN . self::$lettersString ."\r\n";
			}
			elseif($login==0){
				$feedback= self::$missLoginString . LOGIN_MAX_LEN . self::$lettersString ."\r\n";
			}
			else{ //все хорошо
				$feedback =false;
			}
		}
		else{
			$feedback = self::$existsLoginString ."\r\n";
		}//Login

	
		//Password
		if($password > PASSWORD_MAX_LEN){
			$feedback.=self::$longPswString . PASSWORD_MAX_LEN . self::$lettersString ."\r\n";
		}
		elseif($password==0){
			$feedback.=self::$missPswString . PASSWORD_MAX_LEN . self::$lettersString ."\r\n";
		}
		else{ //все хорошо
			$feedback.=false;
		}//Password

		//E-mail
		if($emailExist === false){ //если такого email еще нет в базе
			if(!preg_match(self::$emailMask, $email)) {
				$feedback.=self::$incorrectEmailString;
			}
			else{ //все хорошо
				$feedback.=false;
			}
		}
		else{
			$feedback.= self::$existsEmailString;
		}//E-mail

		return $feedback;
	}
		
	function prepareRegData() { 
		self::$login = trim(strtolower(self::$login));
		self::$password = self::$mysqli->real_escape_string(self::$password);
		self::$email = trim(strtolower(self::$email));
	}

	function loginExist(){

		$login = self::$login;
		$query = self::getParamSQL('UID_by_Login',Array($login));
		$result = self::$mysqli->query($query);

		if (!$result) { 
				$feedback = self::$dbErrorString . self::$mysqli->error;
		}
		else{
			$myrow = $result->fetch_array(MYSQLI_ASSOC);
			if (!empty($myrow['User_id'])) {
				$feedback ="Login already exist!";
			}
			else{
				$feedback = false;
			}
		}
		return $feedback;
	}
	
	function emailExist(){
		$email = self::$email;
		$query = self::getParamSQL('UID_by_Email',Array($email));
		$result = self::$mysqli->query($query);
		if (!$result) {
			$feedback = self::$dbErrorString . self::$mysqli->error;
		}
		else{
			$myrow = $result->fetch_array(MYSQLI_ASSOC);
			if (!empty($myrow['User_id'])) {
				$feedback ="Email already exist!";
			}
			else{
				$feedback = false;
			}
		}
		return $feedback;
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
	function __destruct(){
		parent::__destruct();
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
			return false;
		}
	}

	function login($login,$password,$email)    {

		self::$login=$login;
		self::$password=$password;
		self::$email=$email;
		self::prepareRegData();

		//$query = "SELECT `Password`, `Salt`, `Login`, `User_ID` FROM `users` WHERE `Login`= '$login'  and `Activation` = 1 and `Deleted` = 0;";
		$query = self::getParamSQL('UserRegData_by_Login',Array(self::$login,1)); //активированный юзер
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

			//$query = "UPDATE `users` SET `SID`='".SID."' WHERE `User_ID`='$user_id';";
			$query = self::getParamSQL('NewSID_for_UID',Array(SID,$user_id));
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
	function __destruct(){
		parent::__destruct();
	}
	
	function addUser(){
		$login = self::$login;
		$salt =self::getSalt();
		$hash =self::getHash();
		$email =self::$email;
		$ip =self::getIp();
		$browser =self::getBrowser();
		$sid =self::getSID();

		$query = self::getParamSQL('Add_NewUser',Array($login,$hash,$salt,$email,$ip,$sid,$browser));
		$result = self::$mysqli->query($query);
		
		if($result){
			
			//$query = "SELECT `User_id` FROM `users` WHERE `Login` = '$login';";
			$query = self::getParamSQL('UID_by_Login',Array($login));
			$result = self::$mysqli->query($query);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$uid= $row['User_id'];
			//$query = "INSERT INTO `users_sessions` (`SID`, `UID`, `IP`, `BROWSER`, `Action_ID`, `Date_of_start` ,`Date_of_end`) VALUES ('$sid' , '$uid' ,'$ip', '$browser', 1 , Now() , Now());"; // Action_ID =1 (registration)
			$query = self::getParamSQL('Add_NewSession',Array($sid,$uid,$ip,$browser, 1)); // Action_ID =1 (registration)
			$result = self::$mysqli->query($query);
			if (!$result) {
				self::$message = self::$dbErrorString . self::$mysqli->error;;
			}
			else{
				self::sendMail();
			}
		}
		else{
			self::$message = self::$dbErrorString . self::$mysqli->error;;
		}
	}

	function sendMail(){
		 $email = self::$email;
		 $login = self::$login;
		 //$query = "SELECT `User_id`, `Salt` FROM `users` WHERE `Login`='$login'";
		 $query = self::getParamSQL('UserRegData_by_Login',Array(self::$login, 0)); //неактивированный юзер
		 $result = self::$mysqli->query($query);
		 $row = $result->fetch_array(MYSQLI_ASSOC);
		 $activation = crypt($row['User_ID'].$login, $row['Salt']);
		 $subject = "Registration confirmation.";
		 //$message    = "Для активации акаунта на moacl.ru перейдите по ссылке:\nhttp://moacl.ru/activation.php?login=".$login."&code=".$activation;
		$message    ='<html>
<head>
  <title>Registration confirmation.</title>
</head>
<body>
  <div>
  Для активации акаунта moacl.ru перейдите по <a href = "localhost:85/moacl.ru/activation.php?login='.$login.'&code='.$activation.'">ссылке</a>
  </div>
</body>
</html>';
		//$headers  = "Content-type:text/plane; Charset=utf-8\r\n"
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= 'From: Activator Moacl <activation@moacl.com>' . "\r\n";
		mail($email, $subject, $message, $headers);
		$feedback = "На ".$email." отправлена ссылка для подтверждения регистрации.<br> Внимание! Ссылка действительна 1 час.";
		self::$message = $feedback;

	}
	
	function activateUser(){
			
		$ip = self::getIp();
		$browser = self::getBrowser();
		$sid = self::getSID();
		$code = null;

		$query = self::getParamSQL('DelAllOldNonActivatedUsers',Array(MAIL_REG_LIMIT));
		self::$mysqli->query($query);
		if(isset($_GET['code'])) {
			$code =$_GET['code'];
		}
		else {
			self::$message = self::$noConfirmString;
			exit;
		}
		if (isset($_GET['login'])) {
			$login=$_GET['login'];
		}
		else {
			self::$message = self::$noLoginString;
			exit;
		}
		$query = self::getParamSQL('UID_Salt_by_login',Array($login));
		$result = self::$mysqli->query($query);
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$activation = crypt($row['User_id'].$login, $row['Salt']);
		
		if($result->num_rows==0){
			self::$message =  "User $login does not need activation! <a href='index.php'>Moacl.ru</a>";
		}
		
		elseif ($activation == $code) {
			$query = self::getParamSQL('ActivateUser',Array($ip,$sid,$browser,$login));
			$result = self::$mysqli->query($query);
			
			if($result){
				$query = self::getParamSQL('UID_by_Login',Array($login));
				$result = self::$mysqli->query ($query);
				$row = $result->fetch_array(MYSQLI_ASSOC);
				$uid= $row['User_id'];
				$query = self::getParamSQL('Add_NewSession',Array($sid,$uid,$ip,$browser, 2)); // Action_ID =2 (activation)
				$result = self::$mysqli->query($query);
				if (!$result) {
					self::$message = self::$dbErrorString . self::$mysqli->error;;
				}
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
					$feedback=self::$longLoginString . LOGIN_MAX_LEN . self::$lettersString;
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
					$feedback=self::$longPswString . PASSWORD_MAX_LEN . self::$lettersString;
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
					$feedback=self::$notMatchPswString;
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
				elseif(!preg_match(self::$emailMask, self::$email)) {
					$feedback=self::$incorrectEmailString;
					return $feedback;
				}
				else{
					$feedback=_OK;
					return $feedback;
				}//E-mail
				break;
		}
		return false;
	}
}

class Money extends SecureSystem{
	function __construct(){
		parent::__construct();
	}
	function __destruct(){
		parent::__destruct();
	}

	function getAccounts(){
        $result = self::getJsonFromSP('sp_accounts_enabled',Array(session_id(), $_SESSION['Password']));
        return $result;
	}
	function getBalance($account_id){
        $result = self::getJsonFromSP('sp_balance_of_account',Array($account_id, session_id(), $_SESSION['Password']));
        return $result;
	}
	function getCategories($revenue){
		$result = self::getJsonFromSP('sp_categories_by_revenue',Array($revenue, session_id(), $_SESSION['Password']));
        return $result;
	}
	function getItems($category_id){
		$result = self::getJsonFromSP('sp_items_of_category',Array($category_id, session_id(), $_SESSION['Password']));
		return $result;
	}
	function transactionGo($account_id, $category_id, $item_id, $sum, $comment, $date, $status){
        $result = self::getJsonFromSP('sp_add_transaction',Array($account_id,$category_id,$item_id,$sum,$date,$comment,$status, session_id(), $_SESSION['Password']));
        return $result;
	}
	function showTransactions($account_id,$category_id,$item_id,$date0,$date1,$status,$revenue, $start, $len){
        $result = self::getJsonFromSP('sp_show_transactions',Array($account_id,$category_id,$item_id,$date0,$date1,$status,$revenue, $start, $len, session_id(), $_SESSION['Password']));
        return $result;
	}
	function getCashPositions(){
	$result = self::getJsonFromSP('sp_cash_positions',null);
	return $result;
    }
	function getValutes(){
		$result = self::getJsonFromSP('sp_valutes',null);
		return $result;
	}
    function addAccount($account, $description, $balance, $balance_pass, $selected, $revenues, $expenses, $purpose_id, $reserved, $valid_thrue, $limit, $valute_id, $cash_position_id, $status_id){
        $result = self::getJsonFromSP('sp_add_account',Array($account, $description, $balance, $balance_pass, $selected, $revenues, $expenses, $purpose_id, $reserved, $valid_thrue, $limit, $valute_id, $cash_position_id, $status_id, session_id(), $_SESSION['Password']));
        return $result;
    }
}