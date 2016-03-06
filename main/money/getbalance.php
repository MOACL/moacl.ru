<?
session_start();
$account_id = $_GET['account_id'];

include_once '../../moacl_framework.php';

//получение доступа
$auth = New Authentication;
$access = $auth->authorizer();
unset($auth);
//получение доступа

if($access){
    $Money = New Money;
    $result=$Money->getBalance($account_id);
    print json_encode($result);
}
