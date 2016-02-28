<?
session_start();
$revenue = $_GET['revenue'];
include_once '../../moacl_framework.php';
$auth = New Authentication;
if($auth->authorizer()){ //если пользователь авторизован, то даем доступ
    $Money = New Money;
    $result=$Money->getCategories($revenue);
    print json_encode($result);
}
?>

