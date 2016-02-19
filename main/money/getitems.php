<?
session_start();
$category_id = $_GET['category_id'];
include_once '../../moacl_framework.php';
$auth = New Authentication;
if($auth->authorizer()){ //если пользователь авторизован, то даем доступ
    $Money = New Money;
    $result=$Money->getItems($category_id);
    print json_encode($result);
}
?>

