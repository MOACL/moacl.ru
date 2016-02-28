<?
session_start();
//echo $_SESSION['User_ID'];
$login = $_POST['login'];
$password = $_POST['password'];
include_once 'moacl_framework.php';
$auth = New Authentication;
if($auth->authorizer() or  $auth->login($login, $password, "gag@gag")){ //уже авторизован или правлиьный пароль и логин
	require_once 'main_access.php';
		}
else{
	//require_once 'access_denied.php'
	header("Location: access_denied.php");
	exit();
}

?>
