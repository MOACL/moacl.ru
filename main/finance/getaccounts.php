<?
include_once '../../connect.php';
$query=mysql_query("SELECT Account_ID, Account, Selected FROM mfin.accounts WHERE Disabled = 0;");
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