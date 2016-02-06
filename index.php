<!DOCTYPE html>
<html lang="ru">
	<head>
		<title>MOACL</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<script src="scripts/jquery-1.11.2.min.js" type="text/javascript"></script>
		<script src="plugins/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js" type="text/javascript"></script>
		<script src="scripts/index.js" type="text/javascript" ></script>
		<link href="plugins/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css" rel="stylesheet" type="text/css"/>
		<link href="css/moacl_style.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="themes/moacl_2.min.css" />
		<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
		
	</head>
	
	<body>
		<section id="title_unreg" data-role = "page" data-position = "fixed" >
			<header data-role = "header"><h1>MOACL - DEMO</h1></header>
			<center>
			<div id = "main" class="content moacl-common" data-role = "content" data-position = "fixed">
				<button id= "reg_button" class="ui-btn ui-shadow ui-corner-all ui-icon-lock ui-btn-icon-top" data-href = "registration.php" >Registration</button>
			
				
					<form id = "login_data" name ="login_data" action="main.php" enctype="multipart/form-data" method="post"  target="_self">
						<div class="ui-field-contain">
				    		<input type="text" data-clear-btn="true" name="login" id="login" placeholder = "Login or E-mail">
						    <input type="password" data-clear-btn="true" name="password" id="password" autocomplete="off" placeholder = "Password">
							<br>
							<button id = "enter_btn" class="ui-btn ui-shadow ui-corner-all ui-btn-icon-bottom">Enter</button>
						</div>
					</form>
				
			
				<button id ="to_about_btn" class ="ui-btn ui-shadow ui-corner-all ui-icon-info ui-btn-icon-top" data-href = "about.php" >About</button>
				<button id ="to_donation_btn" class ="ui-btn ui-shadow ui-corner-all ui-icon-star ui-btn-icon-top" data-href = "donation.php" >Donation</button>
			</div>
			</center>
			<footer data-role = "footer" data-position = "fixed"><h1>moacl.ru (c) 2016</h1></footer>
		</section>
	</body>
		
</html>
