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
                    <input id = "balance_pass" type="text" name="balance_pass" value = "RUR 500" readonly/>
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
                <div style = "display: inline-block; margin-bottom: 0;width: 100%;vertical-align: top; text-align: center;">
            <input data-icon="check" data-iconpos="top" id = "submit"  type="submit" name="submit" value="Rightly!"/>
            </div>
            </div>
        </form>
    </div>

    <?require_once '../../footer.php'?>
    <?require_once 'panel.php'?>




    <a href="#transact_info" id = "transact" data-transition="slidedown" data-position-to="window" data-rel="popup" style = "display: none"></a>
    <div data-role="popup" id="transact_info" class="ui-content" data-theme="b">
        <p>#155362: Transport: Taxy: +100 RUR</p>
        <b><center><p>Compleate!</p></center></b>
    </div>
</section>
<script src="../../scripts/moacl_money.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        $("#to_contacts_btn").click( function(){location.href = $(this).attr("data-href");});
        $("#to_love_btn").click( function(){location.href = $(this).attr("data-href");});
        $("#to_fin_btn").click( function(){location.href = $(this).attr("data-href");});
        $("#to_obj_btn").click( function(){location.href = $(this).attr("data-href");});
        $("#to_act_btn").click( function(){location.href = $(this).attr("data-href");});
        $("#to_exit_btn").click( function(){location.href = $(this).attr("data-href");});
    });
</script>
</body>
</html>