<?
session_start();
$account_id = $_POST['account'];
$category_id = $_POST['category'];
$item_id = $_POST['item'];
$sum = $_POST['sum'];
$comment = $_POST['comment'];
$date = $_POST['date'];
$status = $_POST['status'];

$sum = str_replace(" ","",str_replace("RUR" , "" , $sum));
if($sum =="")$sum=0;

//if($commentary == null)$commentary="null";
//$date = str_replace("." , "-",$date);
//$date = date('Y-m-d',strtotime($date));

$date=new DateTime($date);
$date = $date->format('Y-m-d H:i:s');

include_once '../../moacl_framework.php';
//получение доступа
$auth = New Authentication;
$access = $auth->authorizer();
unset($auth);
//получение доступа

if($access){
    $Money = New Money;
    $result=$Money->transactionGo($account_id, $category_id, $item_id, $sum, $comment, $date, $status);
    print $result;
}