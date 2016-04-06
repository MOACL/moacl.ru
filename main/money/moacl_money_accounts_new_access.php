<?php
//запрет на прямое обращение к файлу
if ( basename($_SERVER['SCRIPT_FILENAME']) == 'moacl_money_accounts_new_access.php' )
	die (require_once '../../access_denied.php');
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
		<section id="new_account" data-role = "page" data-position = "fixed" >
			<?require_once '../../header.php'?>
			<div class="content moacl-common" data-role = "content">
			<form id = "new_account_data" name="new_account_data">
				
				<div id = "nameBlock" data-role="fieldcontain" style = "text-align: left;" >
					<div style = "display: inline-block; margin-bottom: 0;width: 50%; vertical-align: top; text-align: left;">
                        <label for="account_name">Name of account:</label>
                        <input id = "account_name" maxlength=7 placeholder = "Max 7 symbols" type="text" name="account_name" />
                    </div>
					<div style = "display: inline-block; margin-bottom: 0;width: 40%; min-width: 14em !important; vertical-align: top; text-align: left;">
						<label for="valid_thrue">Valid Thrue:</label>
						<input id = "valid_thrue"  type="date" name="valid_thrue" value = "2099-01-01" />
					</div>
                    <div style = "display: inline-block; margin-bottom: 0;width: 100%; vertical-align: top; text-align: left;">
                        <label for="description" ></label>
                        <textarea data-clear-btn="true" placeholder = "Description" name="description" id="description"></textarea>
                    </div>
				</div>

                <div id = "permitTransactBlock" style = "text-align: left; ">
                    <div style = "display: inline-block; margin-bottom: 0; min-width: 14em !important; vertical-align: top; text-align: left;">
                    <fieldset data-role="controlgroup" data-type="horizontal" >
                        <legend>Permit type of transactions:</legend>
                        <input type="checkbox" name="checkbox-v-2a" id="checkbox-v-2a" checked = "checked">
                        <label for="checkbox-v-2a">INCOMES</label>
                        <input type="checkbox" name="checkbox-v-2b" id="checkbox-v-2b" checked = "checked">
                        <label for="checkbox-v-2b">EXPENSES</label>

                    </fieldset>
                    </div>
                    <div style = "bottom: 0; display: inline-block; margin-bottom: 0; min-width: 14em !important; vertical-align: bottom; text-align: left;">
                        <label for="limit">Limit:</label>
                        <input id = "limit"  type="text" name="limit" placeholder = "unlimited" />
                    </div>
                </div>

                <div id = "cashPositionblock" data-role="fieldcontain" style = "text-align: left;">
	                <div style = "display: inline-block; width: 40%; margin-bottom: 0em;vertical-align: top; text-align: left;">
	 	                <label for="cashPosition" style="
                          margin-right: 15px;
                                  margin-bottom: 15px;
                          margin-top: 15px;
                          margin-left: 0px;">Cash position:</label>
	 	        	    <select id="cashPosition" name="cashPosition" data-native-menu = "false"></select>
				    </div>

                    <div style = "display: inline-block; width: 30%; margin-bottom: 0em;vertical-align: top; text-align: left;">
                        <label for="valute" style="
                          margin-right: 15px;
                          margin-bottom: 15px;
                          margin-top: 15px;
                          margin-left: 0px;">Valute:</label>
                        <select id="valute" name="valute" data-native-menu = "false"></select>
                    </div>
				</div>

			<fieldset data-role="controlgroup">

			        <input type="checkbox" name="checkbox-v-2e" id="checkbox-v-2e">
			        <label for="checkbox-v-2e">Credit position</label>
                <div id = "creditBlock" style = "display: none;">
                <fieldset data-role="controlgroup" data-type="horizontal" style ="text-align: left; line-height: 0.5">
                    <legend ></legend>
                    <input type="radio" id="radio_credit" name="radio_credit_pos" value="credit"  />
                    <label for="radio_credit">CREDIT</label>
                    <input type="radio" id="radio_debit" name="radio_credit_pos" value="debit" />
                    <label for="radio_debit">DEBIT</label>
                    <input type="radio" id="radio_none" name="radio_credit_pos" value="none" checked = "checked"/>
                    <label for="radio_none">NONE</label>
                </fieldset>
                </div>
			        <input type="checkbox" name="checkbox-v-2f" id="checkbox-v-2f">

			        <label for="checkbox-v-2f">Reserved</label>
			        <input type="checkbox" name="checkbox-v-2i" id="checkbox-v-2i">
			        <label for="checkbox-v-2i">Purpose</label>
			        <input type="checkbox" name="checkbox-v-2j" id="checkbox-v-2j">
			        <label for="checkbox-v-2j">Common</label>

			</fieldset>
						

                <div id = "createblock" data-role="fieldcontain">
                    <div style = "display: inline-block; margin-bottom: 0;width: 90%;vertical-align: top; text-align: center;">
                        <a href="#decisionAccount" id = "decisionAccount_rel" class ="ui-btn ui-shadow ui-corner-all ui-icon-check ui-btn-icon-top" data-rel="popup" data-position-to="window" data-transition="pop">Create!</a>

                    </div>
                </div>
			</form>
			</div>

			<?require_once '../../footer.php'?>
			<?require_once 'panel.php'?>

            <!--форма принятия решения о проводке -->
            <div data-role="popup" id="decisionAccount" data-dismissible="false" data-theme="a" data-overlay-theme="b" class="ui-content" >
                <form id = "decisionAccount_form" name="decisionAccount_form" action="addaccount.php" method="post">

                    <div id = "summaryLabel" style = "text-align: center;" ><h3>New Account</h3></div>
                    <div>
                        <input type="checkbox" name="checkbox-v-2d" id="checkbox-v-2d"  >
                        <label for="checkbox-v-2d" style = "border-width: 0;">Set by default</label>
                    </div>
                    <a href="#" id="addAccount" data-rel="back" class="show-page-loading-msg ui-shadow ui-btn ui-corner-all ui-btn-b ui-icon-check ui-btn-icon-left ui-mini" data-textonly="false" data-textvisible="true" data-msgtext="Please, wait..." data-inline="true">Create!</a>
                    <a href="#" data-rel="back" class="ui-shadow ui-btn ui-corner-all ui-mini">Go back</a>
                </form>
            </div><!--форма принятия решения о проводке -->

            <!--форма ворнинг -->
            <div data-role="popup" id="warningAccount" data-dismissible="false" data-theme="a" data-overlay-theme="b" class="ui-content" >
                <h3>First enter the name of account!</h3>
                <a href="#" data-rel="back" class="ui-shadow ui-btn ui-corner-all ui-mini">Ок</a>
            </div><!--форма ворнинг -->

            <a href="#account_info" class = "hide-page-loading-msg" id = "account"  data-position-to="window" data-rel="popup" style = "display: none"></a>
            <!--форма после проводки транзакции -->
            <div data-role="popup" id="account_info" data-dismissible="false"  data-overlay-theme="b" class="ui-content" data-theme="a">
                <form id = "postAccount_form" name="postAccount_form" action="" method="post">

                    <div id = "successAccount" style="font-size: 10pt;"><!--заполняется программно-->   </div>

                    <a href="#" id="newAccount" data-rel="back" class="ui-shadow ui-btn ui-corner-all ui-btn-b ui-icon-check ui-btn-icon-left ui-mini">New account</a>
                    <a href="#" id="goToListAccounts" class="show-page-loading-msg ui-shadow ui-btn ui-corner-all ui-btn-b ui-icon-check ui-btn-icon-left ui-mini" data-textonly="false" data-textvisible="true" data-msgtext="Please, wait..." data-inline="true">List of accounts</a>
                    <a href="#" id="goToMain" class="show-page-loading-msg ui-shadow ui-btn ui-btn-a ui-corner-all ui-mini" data-textonly="false" data-textvisible="true" data-msgtext="Please, wait..." data-inline="true">MOACL</a>

                </form>
            </div><!--форма после проводки транзакции -->

		</section>
        <script src="../../scripts/moacl_money_accounts_new.js" type="text/javascript"></script>
	</body>
</html>