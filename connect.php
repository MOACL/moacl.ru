<?
$hostname = "localhost";
$username = "difomin";
$password = "12345";
$dbName = "mfin";
$link = mysqli_connect($hostname,$username,$password) OR DIE("Don't connect with database!");
mysqli_query ($link,"set character_set_client='utf8'");
mysqli_query ($link,"set character_set_results='utf8'");
mysqli_query ($link,"set collation_connection='utf8_general_ci'");
mysqli_select_db($link, $dbName) or die(mysqli_error($link));
?>
