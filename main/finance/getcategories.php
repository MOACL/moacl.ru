<?
include_once '../../connect.php';
$revenue = $_GET['revenue'];
$query=mysql_query("SELECT Category_ID, Category, Selected  FROM mfin.categories mc WHERE mc.Disabled = 0 AND mc.Revenue=" . $revenue .";");
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