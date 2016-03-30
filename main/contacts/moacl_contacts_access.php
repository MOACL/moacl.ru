<?php

//запрет на прямое обращение к файлу
if ( basename($_SERVER['SCRIPT_FILENAME']) == 'moacl_contacts_access.php' ) {
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
    <link href="../../css/loader.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="../../themes/moacl_2.min.css" />
    <link rel="stylesheet" href="../../themes/jquery.mobile.icons.min.css" />
</head>

<body>
<section id="mcon_1" data-role = "page" data-position = "fixed"  >
    <?require_once '../../header.php'?>

    <div class="content moacl-common" data-role = "content" >
        <form id = "main_form" name="main_form" >
            <div data-role="fieldcontain" >
                <label for="name">Name:</label>
                <input id = "name" type="text" name="name" />
            </div>
            <div data-role="fieldcontain" >
                <label for="moacler">Bind to moacler:</label>
                <input id = "moacler" data-type="search" name="moacler" />
                <!--<input id="autocomplete-input" data-type="search" placeholder="Search fruits...">-->

                <ul data-role="listview" data-filter="true" data-filter-reveal="true" data-input="#moacler" data-inset="true">
                    <li><a href="#">Apple</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Banana</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Cherry</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Cranberry</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Grape</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Orange</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Apple</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Banana</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Cherry</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Cranberry</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Grape</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Orange</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Apple</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Banana</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Cherry</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Cranberry</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Grape</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Orange</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Apple</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Banana</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Cherry</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Cranberry</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Grape</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Orange</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Apple</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Banana</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Cherry</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Cranberry</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Grape</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Orange</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Apple</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Banana</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Cherry</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Cranberry</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Grape</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Orange</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Cranberry</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Grape</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Orange</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Apple</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Banana</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Cherry</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Cranberry</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Grape</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>
                    <li><a href="#">Orange</a><a href="#" class ="ui-icon-info">OPERATIONS</a></li>

                </ul>
            </div>
            <div data-role="fieldcontain">
                <label for="conGroup">Contact group:</label>
                <select id = "conGroup" name="conGroup" data-native-menu = "false"/></select>
            </div>
            <div class="ui-field-contain" >
                <label for="flip-6">Friend:</label>
                <select name="flip-6" id="flip-6" data-role="slider">
                    <option value="off">No</option>
                    <option value="on">Yes</option>
                </select>
            </div>

            <div data-role="fieldcontain" >
                <label for="commentary">Comment:</label>
                <textarea placeholder = "особенности контакта" rows = "3" name="Commentary" wrap="hard" ></textarea>
            </div>

            <input data-href = "#addcontact" data-icon="check" data-iconpos="top" id = "submit"  type="submit" name="submit" value="Add contact! "/>

        </form>

    </div>

    <?require_once '../../footer.php'?>
    <?require_once 'panel.php'?>

    <div data-role="panel" data-position-fixed="true" data-display="push" data-theme="a" id="nav-panel">
        <ul data-role="listview">
            <li data-theme="b"><a data-ajax = "false" href="../finance/moacl_finance.html">Finance</a></li>
            <li data-theme="b"><a data-ajax = "false" href="../objects/moacl_objects.html">Objects</a></li>
            <li data-theme="b"><a data-ajax = "false" href="../activities/moacl_activities.html">Activities</a></li>
            <li><a data-ajax = "false" href="about.html">About</a></li>
            <li><a data-ajax = "false" href="donation.html">Donation</a></li>
            <li data-role="list-divider" style = "text-align: center">saboter22222</li>
            <li><a href="#">Edit</a></li>
            <li><a href="#">Exit</a></li>
        </ul>
    </div><!-- /panel -->


</section>

</body>
</html>