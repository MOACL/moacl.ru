<?
session_start();
//echo $_SESSION['User_ID'];
$login = $_POST['login'];
$password = $_POST['password'];
include_once 'moacl_framework.php';

$auth = New Authentication;
$access = $auth->authorizer();
$login_success = $auth->login($login, $password, "gag@gag");
unset($auth);
if($access or  $login_success){ //уже авторизован или правлиьный пароль и логин
	require_once 'main_access.php';
		}
else{
	//require_once 'access_denied.php'
	header("Location: index.php");
	exit();
}