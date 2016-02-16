<?php

//запрет на прямое обращение к файлу
if ( basename($_SERVER['SCRIPT_FILENAME']) == 'moacl_finance_access.php' ) {
    //require_once '../../access_denied.php'
    header("Location: ../../access_denied.php");
    exit();
 };
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>MOACL-finance</title>
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
    <header data-role = "header">
        <h1><b>MOACL-<i>finance</i></b></h1>
         <a href="#nav-panel" data-icon="bars" data-iconpos="notext">Menu</a>
         <a href="moacl_finance_setting.php" data-ajax = "false" data-icon="gear" data-iconpos="notext right">Menu</a>
    </header>

    <div class="content moacl-common" data-role = "content">
        <form id = "main_form" name="main_form" action="transaction.php" method="post">
            <div data-role="fieldcontain">

                    <fieldset data-role="controlgroup" data-type="horizontal" >
                        <input type="radio" id="radio_in" name="radio_tt" value=1 />
                        <label for="radio_in">&ensp;In</label>
                        <input type="radio" id="radio_out" name="radio_tt" value=0 checked = "Yes"  />
                        <label for="radio_out">Out</label>
                    </fieldset>

            </div>

            <table>
                <tr>
                    <td>
                        <div data-role="fieldcontain" >
                            <label for="account">Account:</label>

                            <select id="account" name="account" data-native-menu = "false"></select>
                        </div>
                    </td>
                    <td>
                        <div data-role="fieldcontain" >
                            <label for="balance">Balance:</label>
                            <input id = "balance" type="text" name="balance" readonly/>
                        </div>
                    </td>

                </tr>
            </table>
            <table>
                <tr>
                    <td>
                        <div data-role="fieldcontain">
                            <label for="category">Category:</label>
                            <select id = "category" name="category" data-native-menu = "false"></select>
                        </div>
                    </td>
                    <td>
                        <div data-role="fieldcontain">
                            <label for="item">Item:</label>
                            <select id = "item" name="item" data-native-menu = "false"></select>
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
                        <label for="sum">Sum:</label>
                        <input id="sum" type="text" name= "sum" value = "RUR" data-clear-btn="true"><br>
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>
                        <label for="commentary">Commentary:</label>
                        <textarea placeholder = "особенности транзакции" rows = "3" id="commentary" name="commentary" wrap="hard" ></textarea>
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

    <?require_once '../../footer.php'?>

    <div data-role="panel" data-position-fixed="true" data-display="push" data-theme="a" id="nav-panel">
                <ul data-role="listview">
                            <li data-theme="b"><a data-ajax = "false" href="../objects/moacl_objects.php">Objects</a></li>
                            <li data-theme="b"><a data-ajax = "false" href="../activities/moacl_activities.php">Activities</a></li>
                            <li><a data-ajax = "false" href="../../about.php">About</a></li>
                            <li><a data-ajax = "false" href="../../donation.php">Donation</a></li>
                            <li><a data-ajax = "false" href="../../index.php">Exit</a></li>

                	    </ul>
            </div><!-- /panel -->

</section>
<script src="../../scripts/moacl_finance.js" type="text/javascript"></script>
</body>
</html>