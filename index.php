<?
session_start();
include_once 'moacl_framework.php';

//получение доступа
$auth = New Authentication;
$access = $auth->authorizer();
unset($auth);
//получение доступа

if($access){
	//require_once 'main_access.php';
	header("Location: main.php");
	exit();
}
else{
	require_once 'index_access.php';
}