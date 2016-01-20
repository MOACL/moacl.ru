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
		<section id="set_object" data-role = "page" data-position = "fixed" >
			<header data-role = "header">
			<h1><b>MOACL<i>-accounts</i></b></h1>
			 <a href="moacl_objects_setting.php" data-ajax = "false" data-icon="back" data-iconpos="notext">Menu</a>
			</header>
			<form id = "objects_data" class = "data_list">
				<ul data-role="listview" data-count-theme="a" data-inset="true">
				    <li data-theme = "b"><a href="#" >NEW PLACE </a></li>
				    <li><a href="moacl_objects_places_current.php" data-ajax = "false">LOGGIA <span class="ui-li-count">50%</span></a></li>
				    <li><a href="#">KITCHEN <span class="ui-li-count">40%</span></a></li>
				    <li><a href="#">GARAGE <span class="ui-li-count">30%</span></a></li>
				    <li><a href="#">DACHA <span class="ui-li-count">20%</span></a></li>
				</ul>
			</form>

		<footer data-role = "footer" data-position = "fixed"><h1>moacl.ru (c) 2015</h1></footer>
		</section>
	<body>
<html>