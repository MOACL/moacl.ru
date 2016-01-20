<!DOCTYPE html>
<html lang="ru">
	<head>
		<title>MOACL</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<script src="../../scripts/jquery-1.11.2.min.js" type="text/javascript"></script>	
		<script src="../../plugins/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js" type="text/javascript"></script>
		<link href="../../plugins/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css" rel="stylesheet" type="text/css"/>
		<link href="../../css/moacl_style.css" rel="stylesheet" type="text/css"/>
	</head>
	
	<body>
		<section id="current_phase" data-role = "page" data-position = "fixed" >
			<header data-role = "header">
				<h1><b>MOACL-<i>MIM222</i></b></h1>
				 <a href="moacl_activities_phases.php" data-ajax = "false" data-icon="back" data-iconpos="notext">Menu</a>
			</header>
			<center>
			<form id = "current_phase_data"  style = "line-height: 0;">
				<div data-role="fieldcontain" style = "width: 300px; line-height: 0.3;">
					<label for="Limit">Limit:</label>
					<input id = "Limit" type="text" name="Limit" value = "3H" readonly />
				</div>
			
			<fieldset data-role="controlgroup">
			        <input type="checkbox" name="checkbox-v-2a" id="checkbox-v-2a">
			        <label for="checkbox-v-2a">Доходный</label>
			        <input type="checkbox" name="checkbox-v-2b" id="checkbox-v-2b">
			        <label for="checkbox-v-2b">Расходный</label>
			        <input type="checkbox" name="checkbox-v-2c" id="checkbox-v-2c">
			        <label for="checkbox-v-2c">Совместный</label>
			        <input type="checkbox" name="checkbox-v-2d" id="checkbox-v-2d" >
			        <label for="checkbox-v-2d">Целевой</label>
			        <input type="checkbox" name="checkbox-v-2e" id="checkbox-v-2e">
			        <label for="checkbox-v-2e">Неприкосновенный</label>
			</fieldset>
			
			<div class = "phase_but" >
			<button id ="1" class ="ui-btn ui-shadow ui-corner-all ui-btn-inline " data-href = "donation.php" >FROZE</button>
			<button id ="2" class ="ui-btn ui-shadow ui-corner-all ui-btn-inline " data-href = "donation.php" >TRANSFER</button>
			<button id ="3" class ="ui-btn ui-shadow ui-corner-all ui-btn-inline " data-href = "donation.php" >LIMIT</button>
			<button id ="4" class ="ui-btn ui-shadow ui-corner-all ui-btn-inline " data-href = "donation.php" >HISTORY</button>
			<button id ="5" class ="ui-btn ui-shadow ui-corner-all ui-btn-inline " data-href = "donation.php" >ANNUL</button>
			<button id ="6" class ="ui-btn ui-shadow ui-corner-all ui-btn-inline " data-href = "donation.php" >UNION</button>
			<button id ="7" class ="ui-btn ui-shadow ui-corner-all ui-btn-inline " data-href = "donation.php" >RENAME</button>
			<button id ="8" class ="ui-btn ui-shadow ui-corner-all ui-btn-inline " data-href = "donation.php" >CLONE</button>
			</div>
			
			</form>
			</center>
			

		<footer data-role = "footer" data-position = "fixed"><h1>moacl.ru (c) 2015</h1></footer>
		</section>
	<body>
<html>