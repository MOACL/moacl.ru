<? session_start(); ?>
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
		<link rel="stylesheet" href="themes/moacl_2.min.css" />
		<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />

	</head>
	
	<body>
		<section id="activation" data-role = "page" data-position = "fixed" >

			<header data-role = "header"><h1>MOACL</h1></header>
			<center>
			<div id = "main" class="content" data-role = "content" data-position = "fixed">
			<?
				include_once 'moacl_framework.php';
				$reg= New Registration;
			    $reg->activateUser();
				echo  SecureSystem::$message;
				
				session_unset(); 
				session_destroy();
			?>
			</div>
			</center>
			<?require_once 'footer.php'?>
		</section>
	</body>
	
</html>
