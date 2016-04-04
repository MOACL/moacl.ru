<?
session_start();
include_once '../../moacl_framework.php';

//получение доступа
$auth = New Authentication;
$access = $auth->authorizer();
unset($auth);
//получение доступа

if($access){
    $Money = New Money;
    $result=$Money->getCashPositions();
    print $result;
}