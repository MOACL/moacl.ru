<?
session_start();
include_once '../../moacl_framework.php';

//получение доступа
$auth = New Authentication;
$access = $auth->authorizer();
unset($auth);
//получение доступа

if($access){
	require_once 'moacl_money_accounts_current_access.php';
}
else{
	//require_once '../../access_denied.php'
	header("Location: ../../access_denied.php");
	exit();
}