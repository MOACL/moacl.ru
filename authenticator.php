<?
define('SID',session_id());

function logout() {
    unset($_SESSION['uid']); //Удаляем из сессии ID пользователя
    die(header('Location: '.$_SERVER['PHP_SELF']));
}

function login($login,$password)    {
	prepare_reg_data(&$login,&$password,'gag@gag')
	$result = mysql_query ("SELECT `Password`, `Salt`, `Login`, `User_ID` FROM `users` WHERE `Login`= '$login' and `Deleted` = 0");
		or die(mysql_error());
		$row = mysql_fetch_array($result);
		$password_db = $row['Password'];
		$salt_db = $row['Salt'];
		$login_db = $row['Login'];
		$hash = crypt($password, $salt_db);
		$user_id = $row['User_ID'];
    if($hash==$password_db && $login =$login_db) {
		$_SESSION = array_merge($_SESSION,$USER); //Добавляем массив с пользователем к массиву сессии
        
        mysql_query("UPDATE `".USERS_TABLE."` SET `sid`='".SID."' WHERE `uid`='$user_id';")
            or die(mysql_error());
        return true;
    }
    else {
        return false;
    }
}

?>