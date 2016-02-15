<?php
//запрет на прямое обращение к файлу
if ( basename($_SERVER['SCRIPT_FILENAME']) == 'moacl_finance_accounts_access.php' ){
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
		<link href="../../plugins/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css" rel="stylesheet" type="text/css"/>
		<link href="../../css/moacl_style.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="../../themes/moacl_2.min.css" />
		<link rel="stylesheet" href="../../themes/jquery.mobile.icons.min.css" />
	</head>
	
	<body>
		<section id="set_accounts" data-role = "page" data-position = "fixed" >
			<header data-role = "header">
			<h1><b>MOACL<i>-accounts</i></b></h1>
			 <a href="moacl_finance_setting.php" data-ajax = "false" data-icon="back" data-iconpos="notext">Menu</a>
			</header>
			<form id = "accounts_data" class = "data_list">
				<ul data-role="listview" data-count-theme="a" data-inset="true">
				    <li data-theme = "b"><a href="moacl_finance_accounts_new.php" data-ajax = "false" >NEW ACCOUNT </a></li>
				    <li><a href="moacl_finance_accounts_current.php" data-ajax = "false">MIM222 <span class="ui-li-count">300 RUR</span></a></li>
				    <li><a href="#">QIWI <span class="ui-li-count">200 RUR</span></a></li>
				    <li><a href="#">MAIN_RESERVED <span class="ui-li-count">400 RUR</span></a></li>
				    <li><a href="#">POCKET_1 <span class="ui-li-count">120 RUR</span></a></li>
				    <li style = "opacity: 0.2"><a href="#">POCKET_2 <span class="ui-li-count">40 000 000 RUR</span></a></li>
				</ul>
			</form>

			<?require_once '../../footer.php'?>
		</section>
	</body>
</html>