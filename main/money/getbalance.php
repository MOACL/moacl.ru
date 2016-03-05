<?
session_start();
$account_id = $_GET['account_id'];
include_once '../../moacl_framework.php';
$auth = New Authentication;
if($auth->authorizer()){ //если пользователь авторизован, то даем доступ
    $Money = New Money;
    $result=$Money->getBalance($account_id);
    print json_encode($result);
}
