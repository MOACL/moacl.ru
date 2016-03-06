<?
session_start();
$category_id = $_GET['category_id'];

include_once '../../moacl_framework.php';

//получение доступа
$auth = New Authentication;
$access = $auth->authorizer();
unset($auth);
//получение доступа

if($access){
    $Money = New Money;
    $result=$Money->getItems($category_id);
    print json_encode($result);
}

