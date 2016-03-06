<!DOCTYPE html>
<html lang="ru">
	<head>
		<title>MOACL-objects</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="../../scripts/jquery-1.11.2.min.js" type="text/javascript"></script>	
		<script src="../../plugins/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js" type="text/javascript"></script>
		<link href="../../plugins/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css" rel="stylesheet" type="text/css"/>
		<link href="../../css/moacl_style.css" rel="stylesheet" type="text/css"/>
	</head>
	
	<body>
		<section id="mobj_1" data-role = "page" data-position = "fixed"  >
			<header data-role = "header">
				<h1><b>MOACL-<i>objects</i></b></h1>
				 <a href="#nav-panel" data-icon="bars" data-iconpos="notext">Menu</a>
				<a href="moacl_objects_setting.php" data-ajax = "false" data-icon="gear" data-iconpos="notext right">Setting</a>
			</header>
			
			<div class="content" data-role = "content">
				<form id = "main_form" name="main_form">
					<div data-role="fieldcontain">
						<center>
						<fieldset data-role="controlgroup" data-type="horizontal" >
							<input type="radio" id="radio_in" name="radio_tt" value="Get" />
							<label for="radio_in">&ensp;Get</label>
							<input type="radio" id="radio_out" name="radio_tt" value="Put" checked = "Yes"  />
							<label for="radio_out">Put</label>
						</fieldset>
						</center>
					</div>
					
					<table>
						<tr>
							<td>
								<div data-role="fieldcontain" >
									<label for="Place">Place:</label>
									<select id="Place" name="Place" data-native-menu = "false" ></select>
								</div>
							</td>
							<td>
								<div data-role="fieldcontain" >
									<label for="Capacity">Capacity:</label>
									<input id = "Capacity" type="text" name="Capacity" readonly />
								</div>
							</td>
						</tr>
					</table>
					<table>
						<tr>
							<td>
								<div data-role="fieldcontain">
									<label for="Group">Group:</label>
									<select id = "Group" name="Group" data-native-menu = "false"/></select>
								</div>
							</td>
							<td>
								<div data-role="fieldcontain">
									<label for="Object">Object:</label>
									<select id = "Object" name="Object" data-native-menu = "false"/></select>
								</div>
							</td>
						</tr>
					</table>
					<table>	
						<tr>
							<td> 
								<div data-role="date" data-inline ="true">
									<label for="date">Date:</label>
									<input id="date" type="datetime" name= "date" ><br>
								</div>
							</td>
							<td> 
								<label for="sum">Size:</label>
								<input id="Size" type="text" name= "Size" data-clear-btn="true"><br>
							</td> 
						</tr>
					</table>	
					<table>	
						<tr>
							<td>
								<label for="commentary">Commentary:</label>
								<textarea placeholder = "особенности транзакции" rows = "3" name="Commentary" wrap="hard" ></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<center>
								
									<input data-icon="check" data-iconpos="top" id = "submit"  type="submit" name="submit" value="Rightly!"/>
								</center>
							</td>
						</tr>
					</table>
				</form>
			</div>
			
			<footer data-role = "footer" data-position = "fixed"><h1>moacl.ru (c) 2015</h1></footer>
		
			<div data-role="panel" data-position-fixed="true" data-display="push" data-theme="a" id="nav-panel">
	        <ul data-role="listview">
                <li data-theme="b"><a data-ajax = "false" href="../money/moacl_money.php">money</a></li>
                <li data-theme="b"><a data-ajax = "false" href="../activities/moacl_activities.php">Activities</a></li>
                <li><a data-ajax = "false" href="../about.php">About</a></li>
                <li><a data-ajax = "false" href="../donation.php">Donation</a></li>
                <li><a data-ajax = "false" href="../index.php">Exit</a></li>

    	    </ul>
		    </div><!-- /panel -->

		</section>
	<script src="../../scripts/moacl_objects.js" type="text/javascript" /></script>
	</body>
</html>;



