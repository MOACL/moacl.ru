<?
//db configuration
define("DBHOST", "localhost");
define("DBUSER", "difomin");
define("DBPASS", "12345");
define("DB", "mfin");
//db configuration

$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DB);

if (mysqli_connect_errno()) {
    printf("Error database: %s\n", mysqli_connect_error());
    exit();
}

?>
