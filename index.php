<?
session_start();
include_once 'moacl_framework.php';
$auth = New Authentication;
if($auth->authorizer()){ //уже авторизован
	//require_once 'main_access.php';
	header("Location: main.php");
	exit();
}
else{
	require_once 'index_access.php';
}