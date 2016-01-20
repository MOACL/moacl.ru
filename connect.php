<?
	$hostname = "localhost";
	$username = "difomin";
	$password = "12345";
	$dbName = "mfin";
	$link = mysql_connect($hostname,$username,$password) OR DIE("Don't connect with database!"); 
	mysql_query ("set character_set_client='utf8'");
	mysql_query ("set character_set_results='utf8'");
	mysql_query ("set collation_connection='utf8_general_ci'");
	mysql_select_db($dbName, $link) or die(mysql_error());  
?>