<?
session_start();
$account_id = $_POST['account'];
$category_id= $_POST['category'];
$item_id= $_POST['item'];
$sum = str_replace(" ","",str_replace("RUR" , "" , $_POST['sum']));
if($sum =="")$sum=0;
$commentary= $_POST['commentary'];
if($commentary == null)$commentary="null";
$date = str_replace("." , "-",$_POST['date']);
$date = date('Y-m-d',strtotime($date));

include_once '../../moacl_framework.php';
$auth = New Authentication;
if($auth->authorizer()){ //если пользователь авторизован, то даем доступ
    $Money = New Money;
    $result=$Money->transactionGo($account_id, $category_id, $item_id, $sum, $commentary, $date);
    if ($result) {
        echo "New record created successfully." ;

    } else {
        echo "Error of transaction." ;
    }
}
?>