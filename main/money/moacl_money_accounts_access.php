<?php
//запрет на прямое обращение к файлу
if ( basename($_SERVER['SCRIPT_FILENAME']) == 'moacl_money_accounts_access.php' ){
	//require_once '../../access_denied.php'
	header("Location: ../../access_denied.php");
	exit();
};
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<title>MOACL</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="../../scripts/jquery-1.11.2.min.js" type="text/javascript"></script>
		<script src="../../plugins/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js" type="text/javascript"></script>
		<script src="../../scripts/moacl_functions.js" type="text/javascript"></script>
		<script src="../../scripts/date.format.js" type="text/javascript"></script>
		<link href="../../plugins/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css" rel="stylesheet" type="text/css"/>
		<link href="../../css/moacl_style.css" rel="stylesheet" type="text/css"/>
		<link href="../../css/loader.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="../../themes/moacl_2.min.css" />
		<link rel="stylesheet" href="../../themes/jquery.mobile.icons.min.css" />
	</head>
	
	<body>
		<section id="set_accounts" data-role = "page" data-position = "fixed" >

			<?require_once '../../header.php'?>
			<div class="content moacl-common data_list" data-role = "content">

				<ul id = "accountJournal"  data-role="listview" data-count-theme="a" data-inset="true">
				    <li data-theme = "b"><a href="moacl_money_accounts_new.php" data-ajax = "false" style = "border-top-width: 1px;" >NEW ACCOUNT </a></li>
				</ul>
				<div id="ballsWaveG">
					<div id="ballsWaveG_1" class="ballsWaveG"></div>
					<div id="ballsWaveG_2" class="ballsWaveG"></div>
					<div id="ballsWaveG_3" class="ballsWaveG"></div>
					<div id="ballsWaveG_4" class="ballsWaveG"></div>
					<div id="ballsWaveG_5" class="ballsWaveG"></div>
					<div id="ballsWaveG_6" class="ballsWaveG"></div>
					<div id="ballsWaveG_7" class="ballsWaveG"></div>
					<div id="ballsWaveG_8" class="ballsWaveG"></div>
				</div>
			</div>

			<? require_once '../../footer.php';?>
			<? require_once 'panel.php'?>

		</section>

	</body>
    <script src="../../scripts/moacl_money_accounts.js" type="text/javascript"></script>
</html>