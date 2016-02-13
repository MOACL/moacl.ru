<?
session_start();
$Authorizator = false;
if(!empty($_SESSION['User_ID'])){
	$Authorizator = true;
}
else {
	$login = $_POST['login'];
	$password = $_POST['password'];

	include_once 'moacl_framework.php';
	$auth = New Authentication;
	$Authorizator = $auth->login($login, $password, "gag@gag");
}
		if($Authorizator){
			require_once 'main_access.php';
		}
		else{
			require_once 'access_denied.php';

		}
	
?>
