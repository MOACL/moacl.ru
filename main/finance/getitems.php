<?
include_once '../../connect.php';
$category_id = $_GET['category_id'];
$query=mysql_query("SELECT Item_ID, Item, Selected FROM mfin.items mg WHERE mg.Disabled = 0 AND mg.Category_ID=" . $category_id .";");
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