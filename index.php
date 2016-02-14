<?
session_start();
echo $_SESSION['User_ID'];
include_once 'moacl_framework.php';
$auth = New Authentication;
if($auth->authorizer()){ //уже авторизован
	require_once 'main_access.php';
}
else{
	require_once 'index_access.php';
}
?>