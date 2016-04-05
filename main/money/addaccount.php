<?
session_start();
$account= $_POST['account_name'];
$description= $_POST['description'];
$selected= $_POST['selected'];
$revenues= $_POST['revenues'];
$expenses= $_POST['expenses'];
$purpose_id= $_POST['purpose_id'];
$reserved= $_POST['reserved'];
$valid_thrue= $_POST['valid_thrue'];
$limit= $_POST['limit'];
$valute_id= $_POST['valute'];
$cash_position_id= $_POST['cashPosition'];

$status_id= 1; //status = 'open' //$_POST['status_id'];
$balance= 0;//для нового счета нулевой баланс//$_POST['balance'];
$balance_pass= 0;//для нового счета нулевой баланс//$_POST['balance_pass'];

$valid_thrue=new DateTime($valid_thrue);
$valid_thrue = $valid_thrue->format('Y-m-d H:i:s');

include_once '../../moacl_framework.php';
//получение доступа
$auth = New Authentication;
$access = $auth->authorizer();
unset($auth);
//получение доступа

if($access){
    $Money = New Money;
    $result=$Money->addAccount($account, $description, $balance, $balance_pass, $selected, $revenues, $expenses, $purpose_id, $reserved, $valid_thrue, $limit, $valute_id, $cash_position_id, $status_id);
    print $result;
}