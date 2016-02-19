<?
session_start();
include_once '../../moacl_framework.php';
$auth = New Authentication;
if($auth->authorizer()){ //если пользователь авторизован, то даем доступ
    $Money = New Money;
    $result=$Money->getAccounts();
    print json_encode($result);
}
?>