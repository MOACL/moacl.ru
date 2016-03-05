<?
session_start();
include_once '../../moacl_framework.php';
$auth = New Authentication;
if($auth->authorizer()){ ////если пользователь авторизован, то даем доступ
	require_once 'moacl_money_categories_access.php';
}
else{
	//require_once '../../access_denied.php'
	header("Location: ../../access_denied.php");
	exit();
}
