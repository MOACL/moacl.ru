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
		<section id="new_account" data-role = "page" data-position = "fixed" >
			<header data-role = "header">
				<h1><b>MOACL-<i>New Account</i></b></h1>
				 <a href="moacl_finance_accounts.php" data-ajax = "false" data-icon="back" data-iconpos="notext">Menu</a>
			</header>
			<center>
			<form id = "new_account_data"  style = "line-height: 0;">
				
				<div data-role="fieldcontain" style = "text-align: left; line-height: 0.5">
					<label for="balance">Name of account:</label>
					<input id = "account_name" type="text" name="account_name" />
				</div>
			
			<fieldset data-role="controlgroup" data-type="horizontal" style ="text-align: left; line-height: 0.5">
			<legend>Permit type of transaction: </legend>	
			        <input type="checkbox" name="checkbox-v-2a" id="checkbox-v-2a" checked = "Yes">
			        <label for="checkbox-v-2a">REVENUES</label>
			        <input type="checkbox" name="checkbox-v-2b" id="checkbox-v-2b" checked = "Yes">
			        <label for="checkbox-v-2b">EXPENSES</label>
			
			</fieldset>
					
			
			<fieldset data-role="controlgroup" data-type="horizontal" style ="text-align: left; line-height: 0.5">
			<legend>Cash position: </legend>	
					<input type="radio" id="radio_cash" name="radio_cash_pos" value="cash" checked = "Yes" />
					<label for="radio_cash">CASH</label>
					<input type="radio" id="radio_card" name="radio_cash_pos" value="card" />
					<label for="radio_card">CARD</label>
					<input type="radio" id="radio_clearing" name="radio_cash_pos" value="clearing" />
					<label for="radio_clearing">CLEARING</label>
			</fieldset>
			
			<fieldset data-role="controlgroup" data-type="horizontal" style ="text-align: left; line-height: 0.5">
			<legend >Credit position: </legend>	
					<input type="radio" id="radio_credit" name="radio_credit_pos" value="credit"  />
					<label for="radio_credit">CREDIT</label>
					<input type="radio" id="radio_debit" name="radio_credit_pos" value="debit" />
					<label for="radio_debit">DEBIT</label>
					<input type="radio" id="radio_none" name="radio_credit_pos" value="none" checked = "Yes"/>
					<label for="radio_none">NONE</label>
			</fieldset>
			
			

			<fieldset data-role="controlgroup">
			        <input type="checkbox" name="checkbox-v-2d" id="checkbox-v-2d" >
			        <label for="checkbox-v-2d">PURPOSE</label>
			        <input type="checkbox" name="checkbox-v-2e" id="checkbox-v-2e">
			        <label for="checkbox-v-2e">RESERVED</label>
			        <input type="checkbox" name="checkbox-v-2f" id="checkbox-v-2f">
			        <label for="checkbox-v-2f">USERS</label>
			        <input type="checkbox" name="checkbox-v-2i" id="checkbox-v-2i">
			        <label for="checkbox-v-2i">VALID THRU</label>
			        <input type="checkbox" name="checkbox-v-2j" id="checkbox-v-2j">
			        <label for="checkbox-v-2j">LIMIT</label>
			        <input type="checkbox" name="checkbox-v-2k" id="checkbox-v-2k">
			        <label for="checkbox-v-2k">VALUTE</label>
			
			</fieldset>
						
			<input data-icon="check" data-iconpos="top" id = "submit"  type="submit" name="submit" value="Create!"/>
			
			</form>
			</center>
			

		<footer data-role = "footer" data-position = "fixed"><h1>moacl.ru (c) 2015</h1></footer>
		</section>
	<body>
<html>