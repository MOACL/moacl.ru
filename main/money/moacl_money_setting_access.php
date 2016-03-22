<?php
//запрет на прямое обращение к файлу
if ( basename($_SERVER['SCRIPT_FILENAME']) == 'moacl_money_setting_access.php' ){
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
    <script src="../../plugins/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js" type="text/javascript"></script>
    <link href="../../plugins/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../css/moacl_style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="../../themes/moacl_2.min.css" />
    <link rel="stylesheet" href="../../themes/jquery.mobile.icons.min.css" />
</head>
<body>
<section id="mfin_1" data-role = "page" data-position = "fixed"  >

    <?require_once '../../header.php'?>

    <div class="content moacl-common" data-role = "content">
        <form id = "main_form" name="main_form">
            <div data-role="fieldcontain">

                    <fieldset data-role="controlgroup" data-type="horizontal" >
                        <input type="radio" id="radio_in" name="radio_tt" value=1 />
                        <label for="radio_in">Gain</label>
                        <input type="radio" id="radio_out" name="radio_tt" value=0 checked = "checked"  />
                        <label for="radio_out">Cost</label>
                    </fieldset>

            </div>

                <div>
                        <div data-role="fieldcontain" style = "display: inline-block; width: 80%; margin-bottom: 0em;">
                            <label for="account">Account:</label>
                            <select id="account" name="account" data-native-menu = "false"></select>
                        </div>

                        <div data-role="fieldcontain" style = "display: inline-block; width: 10%; margin-bottom: 0em;">
                            <a href="moacl_money_accounts.php" data-ajax = "false" class="ui-btn ui-shadow ui-corner-all ui-icon-gear ui-btn-icon-notext">Account_set</a>
                        </div>

                </div>

                <div>
                        <div data-role="fieldcontain" style = "display: inline-block; width: 80%; margin-bottom: 0em; ">
                            <label for="category">Category:</label>
                            <select id = "category" name="category" data-native-menu = "false"></select>
                        </div>
                       <div data-role="fieldcontain" style = "display: inline-block; width: 10%; margin-bottom: 0em;">
                            <a href="moacl_money_categories.php" data-ajax = "false" class="ui-btn ui-shadow ui-corner-all ui-icon-gear ui-btn-icon-notext">Cat_set</a>
                        </div>
                </div>
                <div>
                        <div data-role="fieldcontain" style = "display: inline-block; width: 80%; margin-bottom: 0em;">
                            <label for="item">Item:</label>
                            <select id = "item" name="item" data-native-menu = "false"></select>
                        </div>
                        <div data-role="fieldcontain" style = "display: inline-block; width: 10%; margin-bottom: 0em;" >
                            <a href="moacl_money_items.php" data-ajax = "false" class="ui-btn ui-shadow ui-corner-all ui-icon-gear ui-btn-icon-notext">Item_set</a>
                        </div>
                </div>
            
        </form>
    </div>

    <?require_once '../../footer.php'?>
    <?require_once 'panel.php'?>

    </section>
<script src="../../scripts/moacl_money_setting.js" type="text/javascript"></script>
</body>
</html>