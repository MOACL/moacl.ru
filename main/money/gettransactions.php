<?
session_start();
$account_id = $_GET['account'];
$category_id = $_GET['category'];
$item_id = $_GET['item'];
$date0 = $_GET['date_0'];
$date1 = $_GET['date_1'];
$status = $_GET['status'];
$revenue = $_GET['revenue'];
$start = $_GET['start_'];
$len = $_GET['len_'];

include_once '../../moacl_framework.php';

//получение доступа
$auth = New Authentication;
$access = $auth->authorizer();
unset($auth);
//получение доступа

if($access){
$Money = New Money;
$result=$Money->showTransactions($account_id,$category_id,$item_id,$date0,$date1,$status,$revenue, $start, $len);
print $result;
}
