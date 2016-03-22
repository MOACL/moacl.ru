<?php

//запрет на прямое обращение к файлу
if ( basename($_SERVER['SCRIPT_FILENAME']) == 'moacl_money_access.php' ) {
    //require_once '../../access_denied.php'
    header("Location: ../../access_denied.php");
    exit();
 };
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>MOACL-money</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../../scripts/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script src="../../scripts/moacl_functions.js" type="text/javascript"></script>
    <script src="../../scripts/date.format.js" type="text/javascript"></script>
    <script src="../../plugins/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js" type="text/javascript"></script>
    <link href="../../plugins/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../css/moacl_style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="../../themes/moacl_2.min.css" />
    <link rel="stylesheet" href="../../themes/jquery.mobile.icons.min.css" />
</head>

<body>
<section id="mfin_1" data-role = "page" data-position = "fixed"  >
    <?require_once '../../header.php'?>

    <div class="content moacl-common" data-role = "content" >
        <form id = "main_form" name="main_form" action="transaction.php" method="post">
            <div id = "accountblock" data-role="fieldcontain">
            <div style = "display: inline-block; margin-bottom: 0em;width: 50%; vertical-align: top; text-align: left;">
                <label for="account" style="
    margin-right: 15px;
    margin-bottom: 15px;
    margin-top: 15px;
    margin-left: 0px;
">Account:</label>
                <select id="account" name="account" data-native-menu = "false"></select>
            </div>
                <div  style = "display: inline-block;  margin-bottom: 0em; width: 40%; vertical-align: top; text-align: left; ">
            <div id = "bal" style = "margin: 0 auto; width: 100%; vertical-align: bottom; text-align: left; ">
                <label for="balance"></label>
                <input id = "balance" type="text" name="balance" readonly/>
            </div>
                <div id = "balpas" style = "margin: 0 auto; width: 100%; vertical-align: top; text-align: left; ">
                    <label for="balance_pass"></label>
                    <input id = "balance_pass" type="text" name="balance_pass" readonly/>
                </div>
                </div>
            </div>

            <div id = "categoryblock" data-role="fieldcontain">
                <div style = "display: inline-block; margin-bottom: 0em;width: 50%; vertical-align: top; text-align: left;">
                    <label for="category" style="
    margin-right: 15px;
    margin-bottom: 15px;
    margin-top: 15px;
    margin-left: 0px;
">Category:</label>
                    <select id="category" name="category" data-native-menu = "false"></select>
                </div>
                <div style = "display: inline-block; margin-bottom: 0em; width: 40%; vertical-align: top;">
                    <fieldset data-role="controlgroup" data-type="horizontal" >
                        <input type="radio" id="radio_in" name="radio_tt" value=1 />
                        <label for="radio_in">Gain</label>
                        <input type="radio" id="radio_out" name="radio_tt" value=0 checked = "checked"  />
                        <label for="radio_out">Cost</label>
                    </fieldset>
                </div>
            </div>
            <div id = "itemblock" data-role="fieldcontain">
                <div style = "display: inline-block; margin-bottom: 0em;width: 50%; vertical-align: top; text-align: left;">
                    <label for="item" style="
    margin-right: 15px;
    margin-bottom: 15px;
    margin-top: 15px;
    margin-left: 0px;
">Item:</label>
                    <select id="item" name="item" data-native-menu = "false"></select>
                </div>
                <div  style = "display: inline-block;  margin-bottom: 0em; width: 40%; vertical-align: top; text-align: left; ">

                    <label for="sum" style="
    margin-right: 15px;
    margin-bottom: 15px;
    margin-top: 15px;
    margin-left: 0px;
">Sum:</label>
                    <input id="sum" type="text" name= "sum" value = "RUR" data-clear-btn="false" autocomplete="off">
                </div>
            </div>
            <div id = "dateblock" data-role="fieldcontain">
                <div style = "display: inline-block; margin-bottom: 0;width: 40%; min-width: 9.5em !important; vertical-align: top; text-align: center;">
                    <label for="date" style="
    margin-right: 15px;
    margin-bottom: 15px;
    margin-top: 15px;
    margin-left: 0;
">Date of payment:</label>
                    <input id="date" name= "date" type="date" value="<?echo date("Y-m-d"); ?>" data-clear-btn="false">
                </div>
            </div>
            <div id = "submitblock" data-role="fieldcontain">
                <div style = "display: inline-block; margin-bottom: 0;width: 90%;vertical-align: top; text-align: center;">
                    <!--<input data-icon="check" data-iconpos="top" id = "submit"  type="submit" name="submit" value="Rightly!"/>-->
                    <a href="#decisionTransact" id = "decisionTransact_rel" class ="ui-btn ui-shadow ui-corner-all ui-icon-check ui-btn-icon-top" data-rel="popup" data-position-to="window" data-transition="pop">Rightly!</a>

                </div>
            </div>
        </form>
    </div>

    <?require_once '../../footer.php'?>
    <?require_once 'panel.php'?>

    <!--форма принятия решения о проводке -->
    <div data-role="popup" id="decisionTransact" data-dismissible="false" data-theme="a" data-overlay-theme="b" class="ui-content" >
    <form id = "decisionTransact_form" name="decisionTransact_form" action="transaction.php" method="post">

        <div id = "summaryLabel" style = "text-align: center;" ><h3>Transaction</h3></div>

        <div>
            <label for="comment" style="font-size: 10pt;">Comment:</label>
            <textarea data-clear-btn="true" style="font-size: 10pt; min-height: 4em; min-width: 15em;" name="comment" id="comment"></textarea>
        </div>
        <a href="#" id="addInPlan" data-rel="back" class="show-page-loading-msg ui-shadow ui-btn ui-corner-all ui-btn-b ui-icon-clock ui-btn-icon-left ui-mini" data-textonly="false" data-textvisible="true" data-msgtext="Please, wait..." data-inline="true">Add in plan</a>
        <a href="#" id="implement" data-rel="back" class="show-page-loading-msg ui-shadow ui-btn ui-corner-all ui-btn-b ui-icon-check ui-btn-icon-left ui-mini" data-textonly="false" data-textvisible="true" data-msgtext="Please, wait..." data-inline="true">Implement</a>
        <a href="#" data-rel="back" class="ui-shadow ui-btn ui-corner-all ui-mini">Go back</a>
    </form>
    </div><!--форма принятия решения о проводке -->

    <!--форма ворнинг -->
    <div data-role="popup" id="warningTransact" data-dismissible="false" data-theme="a" data-overlay-theme="b" class="ui-content" >
        <h3>First enter the amount!</h3>
        <a href="#" data-rel="back" class="ui-shadow ui-btn ui-corner-all ui-mini">Ок</a>
    </div><!--форма ворнинг -->



    <a href="#transact_info" class = "hide-page-loading-msg" id = "transact"  data-position-to="window" data-rel="popup" style = "display: none"></a>
    <!--форма после проводки транзакции -->
    <div data-role="popup" id="transact_info" data-dismissible="false"  data-overlay-theme="b" class="ui-content" data-theme="a">
        <form id = "postTransact_form" name="postTransact_form" action="" method="post">

            <div id = "successTransact" style="font-size: 10pt;"><!--заполняется программно-->   </div>

            <a href="#" id="newTransact" data-rel="back" class="ui-shadow ui-btn ui-corner-all ui-btn-b ui-icon-check ui-btn-icon-left ui-mini">New transaction</a>
            <a href="#" id="goToJournal" class="show-page-loading-msg ui-shadow ui-btn ui-corner-all ui-btn-b ui-icon-check ui-btn-icon-left ui-mini" data-textonly="false" data-textvisible="true" data-msgtext="Please, wait..." data-inline="true">Go to journal</a>
            <a href="#" id="goToMain" class="show-page-loading-msg ui-shadow ui-btn ui-btn-a ui-corner-all ui-mini" data-textonly="false" data-textvisible="true" data-msgtext="Please, wait..." data-inline="true"">MOACL</a>

        </form>
    </div><!--форма после проводки транзакции -->


</section>
<script src="../../scripts/moacl_money.js" type="text/javascript"></script>

</body>
</html>