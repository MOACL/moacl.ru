<?php
//запрет на прямое обращение к файлу
if ( basename($_SERVER['SCRIPT_FILENAME']) == 'index_access.php' )
	die (require_once 'access_denied.php');
?>

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
		<section id="registration" data-role = "page" data-position = "fixed" >

			<header data-role = "header">
				<h1>MOACL</h1>
				<a href="javascript:history.back()" data-icon="back" data-iconpos="notext">Back</a>
				<script type="text/javascript" src="scripts/registration.js"></script>
			</header>
			
			<br>


			<div class="content moacl-common ui-content" id="main_reg" role="main" data-role="content" data-position="fixed">

			<form class = "moacl-common" id = "reg_data" name="reg_data" action="register.php" enctype="multipart/form-data" method="post"  target="_self" >
				<ul data-role="listview" data-inset="true">
			
				<li class="moacl-field-reg">
					<label for="login" >Login:</label>
					<input type="text" data-clear-btn="true" name="login" id="login" >
					<div id ="login_mes" class = "moacl-reg-message"></div>
				</li>
				<li class="moacl-field-reg">
					<label for="password1">Password:</label>
					<input type="password" data-clear-btn="true" name="password1" id="password1" autocomplete="off" >
					<div id ="pass1_mes" class = "moacl-reg-message"></div>
				</li>
				<li class="moacl-field-reg">
					<label for="password2">Password (repeat):</label>
					<input type="password" data-clear-btn="true" name="password2" id="password2" autocomplete="off" >
					<div id ="pass2_mes" class = "moacl-reg-message"></div>
				</li>
				<li class="moacl-field-reg">
					<label for="email">E-mail:</label>
					<input type="email" data-clear-btn="true" name="email" id="email" >
					<div id ="email_mes" class = "moacl-reg-message"></div>
				</li>
				</ul>
					<button class ="show-page-loading-msg ui-btn ui-shadow ui-corner-all ui-icon-check ui-btn-icon-top" data-textonly="false" data-textvisible="false" data-msgtext="" data-inline="true">Register</button>
					<div id ="complete" style ="display: none" >false</div> <!--скрытый индикатор готовности заполнения регистрационных данных-->
			</form>
			<div>
			<?require_once 'footer.php'?>
		</section>
	</body>
	
</html>



