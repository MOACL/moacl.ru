<!DOCTYPE html>
<html lang="ru">
<head>
	<title>MOACL</title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="scripts/jquery-1.11.2.min.js" type="text/javascript"></script>
	<script src="plugins/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js" type="text/javascript"></script>
	<link href="plugins/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css" rel="stylesheet" type="text/css"/>
	<link href="css/moacl_style.css" rel="stylesheet" type="text/css"/>
</head>

<?
	session_start();
	
	include_once 'connect.php';
	include_once 'functions.php';
	
	$login= $_POST['login'];
	$password= $_POST['password'];
	$email = "gag@gag"; //заглушка
	
		prepare_reg_data(&$login,&$password,&$email);
	
		$result = mysql_query ("SELECT `Password`, `Salt`, `Login` FROM `users` WHERE `Login`= '$login' and `Deleted` = 0");
		$row = mysql_fetch_array($result);
		$password_db = $row['Password'];
		$salt_db = $row['Salt'];
		$login_db = $row['Login'];
	
		$hash = crypt($password, $salt_db);
	
		if($hash==$password_db && $login =$login_db){
			echo <<<NO
    <body>
		<section id="title_unreg" data-role = "page" data-position = "fixed" >
			<header data-role = "header">
				<h1>MOACL</h1>
				<a href="user.php" data-ajax = "false" data-icon="user" data-iconpos="notext right" >User</a>
			</header>
			<center>
			<div id = "main" class="content moacl-common" data-role = "content" data-position = "fixed">
				<button id ="to_fin_btn" class ="ui-btn ui-btn-b ui-shadow ui-corner-all ui-icon-heart ui-btn-icon-top" data-href = "main/finance/moacl_finance.php" >Finance</button>
				<button id ="to_act_btn" class ="ui-btn ui-btn-b ui-shadow ui-corner-all ui-icon-action ui-btn-icon-top" data-href = "main/activities/moacl_activities.php" >Activities</button>
				<button id ="to_obj_btn" class ="ui-btn ui-btn-b ui-shadow ui-corner-all ui-icon-eye ui-btn-icon-top" data-href = "main/objects/moacl_objects.php" >Objects</button>
				<button id ="to_about_btn" class ="ui-btn ui-shadow ui-corner-all ui-icon-info ui-btn-icon-top" data-href = "about.php" >About</button>
				<button id ="to_donation_btn" class ="ui-btn ui-shadow ui-corner-all ui-icon-star ui-btn-icon-top" data-href = "donation.php" >Donation</button>
				<button id ="to_exit_btn" class ="ui-btn ui-shadow ui-corner-all ui-icon-power ui-btn-icon-top" data-href = "index.php" >Exit</button>

			</div>
			</center>
			<footer data-role = "footer" data-position = "fixed"><h1>moacl.ru (c) 2015</h1></footer>
		</section>
	</body>

	<script>
		$(document).ready(function(){
				$("#to_about_btn").click( function(){location.href = $(this).attr("data-href");});
				$("#to_donation_btn").click( function(){location.href = $(this).attr("data-href");});
				$("#to_fin_btn").click( function(){location.href = $(this).attr("data-href");});
				$("#to_obj_btn").click( function(){location.href = $(this).attr("data-href");});
				$("#to_act_btn").click( function(){location.href = $(this).attr("data-href");});
				$("#to_exit_btn").click( function(){location.href = $(this).attr("data-href");});
		});
	</script>
NO;
		}
		else{
			echo <<<YES
    <body>
		<section id="title_unreg" data-role = "page" data-position = "fixed" >
			<header data-role = "header">
				<h1>MOACL</h1>

			</header>
			<center>
			<div id = "main" class="content moacl-common" data-role = "content" data-position = "fixed">
				ACCESS DENIED
			</div>
			</center>
			<footer data-role = "footer" data-position = "fixed"><h1>moacl.ru (c) 2015</h1></footer>
		</section>
	</body>
YES;

		}
	
?>

</html>
