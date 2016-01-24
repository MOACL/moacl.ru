<?
/*header("Location: index.php");*/
include_once '../../connect.php';
$account_id = $_POST['account'];
$category_id= $_POST['category'];
$item_id= $_POST['item'];
$sum = str_replace(" ","",str_replace("RUR" , "" , $_POST['sum']));
	if($sum =="")$sum=0;
$commentary= $_POST['commentary'];
	if($commentary == null)$commentary="null";
$date = str_replace("." , "-",$_POST['date']);
$date = date('Y-m-d',strtotime($date));

$sql = "insert into transactions(Account_ID, Category_ID, Item_ID, Deleted, Sum, Date_of_realization, Commentary) 
			select " . $account_id . "," . $category_id . "," . $item_id . ",0," . $sum . ", '" . $date . "'," . $commentary . ";";
					
if (mysql_query($sql)) {
    echo "New record created successfully" ;

} else {
    echo "Error: " . $sql ;
}							

?>