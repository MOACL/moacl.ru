<?
include_once '../../connect.php';
$account_id = $_GET['account_id'];
$query=mysql_query("select Balance from accounts where Account_ID =" . $account_id .";");
if ($query) {
    $num = mysql_num_rows($query);     
    $i = 0;
    while ($i < $num) {
       $row[$i] = mysql_fetch_assoc($query);  
       $i++;
    }    
    $result = array('row'=>$row); 
}
else {
    $result = array('type'=>'error');
}
print json_encode($result);

?>