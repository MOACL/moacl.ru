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
</head>

<body>
<section id="transactions" data-role = "page" data-position = "fixed">
    <header data-role = "header">
        <h1><b>MOACL-<i>money</i></b></h1>
        <a href="#nav-panel" data-icon="bars" data-iconpos="notext">Menu</a>
    </header>

    <div class="content" data-role = "content" style = "padding: 0em;">

        <div id ="controlbar" data-role="navbar" data-iconpos="right">

            <ul>
                <li>
                    <div data-role="fieldcontain" placeholder = "Account" >
                        <label for="account">Account:</label>
                        <select id="account" name="account" data-native-menu = "false"></select>
                    </div>
                </li>
                <li>
                    <div data-role="fieldcontain" >
                        <label for="category">Category:</label>
                        <select id="category" name="category" data-native-menu = "false"></select>
                    </div>
                </li>
                <li>
                    <div data-role="fieldcontain" >
                        <label for="item">Item:</label>
                        <select id="item" name="item" data-native-menu = "false"></select>
                    </div>
                </li>

            </ul>

            <ul>
                <li>
                    <fieldset data-role="controlgroup" data-type="horizontal" style ="text-align: center; line-height: 0.5">
                        <input type="checkbox" name="checkbox-v-2a" id="checkbox-v-2a" checked = "Yes">
                        <label for="checkbox-v-2a">IN</label>
                        <input type="checkbox" name="checkbox-v-2b" id="checkbox-v-2b" checked = "Yes">
                        <label for="checkbox-v-2b">OUT</label>
                        <input type="checkbox" name="checkbox-v-2c" id="checkbox-v-2c" checked = "Yes">
                        <label for="checkbox-v-2c">DONE</label>
                        <input type="checkbox" name="checkbox-v-2d" id="checkbox-v-2d" checked = "Yes">
                        <label for="checkbox-v-2d">NOT DONE</label>
                    </fieldset>
                </li>
            </ul>

            <ul>
                <li><input type="text" name="date_0" id="date_0" placeholder = "Начиная с"></li>
                <li><input type="text" name="date_1" id="date_1" placeholder = "Заканчивая"></li>
            </ul>

            <ul>
                <li>
                    <button id ="load" class ="ui-btn ui-shadow ui-corner-all ui-icon-search ui-btn-icon-top moacl-butt">Load</button>
                </li>
            </ul>
            <br><br><br><br>
        </div><!-- /controlbar-->



        <ul data-role="listview" data-split-icon="action" data-split-theme="a" data-inset="true">
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-600 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#oper" data-rel="popup" data-position-to="window" data-transition="pop">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightyellow; background-color: red;">NOT DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="index.html">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-50 000 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-600 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#oper" data-rel="popup" data-position-to="window" data-transition="pop">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: yellow; background-color: pink;">NOT DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="index.html">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-50 000 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-600 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#oper" data-rel="popup" data-position-to="window" data-transition="pop">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: yellow; background-color: pink;">NOT DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="index.html">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-50 000 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-600 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#oper" data-rel="popup" data-position-to="window" data-transition="pop">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: yellow; background-color: pink;">NOT DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="index.html">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-50 000 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-600 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#oper" data-rel="popup" data-position-to="window" data-transition="pop">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: yellow; background-color: pink;">NOT DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="index.html">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-50 000 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-600 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#oper" data-rel="popup" data-position-to="window" data-transition="pop">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: yellow; background-color: pink;">NOT DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="index.html">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-50 000 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-600 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#oper" data-rel="popup" data-position-to="window" data-transition="pop">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: yellow; background-color: pink;">NOT DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="index.html">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-50 000 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-600 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#oper" data-rel="popup" data-position-to="window" data-transition="pop">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: yellow; background-color: pink;">NOT DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="index.html">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-50 000 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-600 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#oper" data-rel="popup" data-position-to="window" data-transition="pop">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: yellow; background-color: pink;">NOT DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="index.html">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-50 000 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-600 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#oper" data-rel="popup" data-position-to="window" data-transition="pop">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: yellow; background-color: pink;">NOT DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="index.html">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-50 000 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-600 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#oper" data-rel="popup" data-position-to="window" data-transition="pop">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: yellow; background-color: pink;">NOT DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="index.html">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-50 000 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-600 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#oper" data-rel="popup" data-position-to="window" data-transition="pop">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: yellow; background-color: pink;">NOT DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="index.html">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-50 000 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-600 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#oper" data-rel="popup" data-position-to="window" data-transition="pop">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: yellow; background-color: pink;">NOT DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="index.html">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-50 000 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-600 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#oper" data-rel="popup" data-position-to="window" data-transition="pop">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: yellow; background-color: pink;">NOT DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="index.html">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-50 000 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-600 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#oper" data-rel="popup" data-position-to="window" data-transition="pop">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: yellow; background-color: pink;">NOT DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="index.html">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-50 000 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-600 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#oper" data-rel="popup" data-position-to="window" data-transition="pop">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: yellow; background-color: pink;">NOT DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="index.html">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-50 000 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: blue;">-500 RUR</h2>
                    <p ><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#">OPERATIONS</a>
            </li>
        </ul>
    </div>

    <footer data-role = "footer" data-position = "fixed" >
        <div data-role="navbar">
            <ul>
                <li><a data-theme="b" href="moacl_money.html" data-ajax = "false">New transact</a></li>
                <li><a data-theme="b" href="#">Analytics</a></li>
            </ul>
        </div><!-- /navbar -->
        <h1>moacl.ru (c) 2015</h1>
    </footer>
    <div data-role="panel" data-position-fixed="true" data-display="push" data-theme="a" id="nav-panel">
        <ul data-role="listview">
            <li data-theme="b"><a data-ajax = "false" href="../objects/moacl_objects.html">Objects</a></li>
            <li data-theme="b"><a data-ajax = "false" href="../activities/moacl_activities.html">Activities</a></li>
            <li data-theme="b"><a data-ajax = "false" href="../contacts/moacl_contacts.html">Contacts</a></li>
            <li><a data-ajax = "false" href="about.html">About</a></li>
            <li><a data-ajax = "false" href="donation.html">Donation</a></li>
            <li data-role="list-divider" style = "text-align: center">saboter22222</li>
            <li><a href="#">Edit</a></li>
            <li><a href="#">Exit</a></li>
        </ul>
    </div><!-- /panel -->

    <div data-role="popup" data-dismissible="false" id="oper" data-theme="a" data-overlay-theme="b" class="ui-content" style="max-width:340px; padding-bottom:2em;">
        <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>
        <h3>Transaction #155362: Transport: Taxy: +100 RUR</h3>
        <p>What do you want?</p>
        <a href="#" data-rel="back" class="ui-shadow ui-btn ui-corner-all ui-btn-b ui-icon-check ui-btn-icon-left ui-mini">To do</a>
        <a href="#" data-rel="back" class="ui-shadow ui-btn ui-corner-all ui-btn-b ui-icon-delete ui-btn-icon-left ui-mini">Delete</a>
        <a href="#" data-rel="back" class="ui-shadow ui-btn ui-corner-all ui-mini">Correct Sum</a>
        <a href="#" data-rel="back" class="ui-shadow ui-btn ui-corner-all ui-mini">Clone</a>
        <a href="#" data-rel="back" class="ui-shadow ui-btn ui-corner-all ui-mini">Carry forward</a>
        <a href="#" data-rel="back" class="ui-shadow ui-btn ui-corner-all ui-mini">Autopayment</a>
    </div>




    <a href="#transact_info" id = "transact" data-transition="slidedown" data-position-to="window" data-rel="popup" style = "display: none"></a>
    <div data-role="popup" id="transact_info" class="ui-content" data-theme="b">
        <p>#155362: Transport: Taxy: +100 RUR</p>
        <b><center><p>Compleate!</p></center></b>
    </div>



</section>







</body>
<script src="../../scripts/moacl_money.js" type="text/javascript" ></script>

</html>
