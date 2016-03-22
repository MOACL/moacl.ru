<!DOCTYPE html>
<html lang="ru">
<head>
    <title>MOACL-money</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../../scripts/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script src="../../plugins/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js" type="text/javascript"></script>
    <script src="../../scripts/moacl_functions.js" type="text/javascript"></script>
    <script src="../../scripts/date.format.js" type="text/javascript"></script>
    <link href="../../plugins/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../css/moacl_style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="../../themes/moacl_2.min.css" />
    <link rel="stylesheet" href="../../themes/jquery.mobile.icons.min.css" />
</head>

<body>
<section id="transactions" data-role = "page" data-position = "fixed">

    <?require_once '../../header.php'?>

    <div class="content moacl-common" data-role = "content" >

        <div data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u">
                <h4>Advanced filter</h4>
                 <div data-role="fieldcontain" >
                     <label for="confirmed_filter">Confirmed:</label>
                     <select id="confirmed_filter" name="confirmed_filter" data-native-menu = "false">
                         <option value= null>ALL</option>
                         <option value= 1>Yes</option>
                         <option value= 0>No</option>
                     </select>
                 </div>
                 <div data-role="fieldcontain" >
                     <label for="account_filter">Account:</label>
                     <select id="account_filter" name="account_filter" data-native-menu = "false" >
                         <option value= null>ALL</option>
                     </select>
                 </div>
                 <div data-role="fieldcontain" >
                       <label for="itemType_filter">Item type:</label>
                       <select id="itemType_filter" name="itemType_filter" data-native-menu = "false">
                           <option value= null>ALL</option>
                           <option value= 1>Gain</option>
                           <option value= 0>Cost</option>
                       </select>
                 </div>
                <div data-role="fieldcontain" >
                        <label for="category_filter">Category:</label>
                        <select id="category_filter" name="category_filter" data-native-menu = "false">
                            <option value= null>ALL</option>
                        </select>
                </div>
                <div data-role="fieldcontain" >
                        <label for="item_filter">Item:</label>
                        <select id="item_filter" name="item_filter" data-native-menu = "false">
                            <option value= null>ALL</option>
                        </select>
               </div>
            <div data-role="fieldcontain" >
                <label for="date_0_filter">From:</label>
                <input type="date" name="date_0_filter" id="date_0_filter" placeholder = "Начиная с">
                <label for="date_1_filter">To:</label>
                <input type="date" name="date_1_filter" id="date_1_filter" placeholder = "Заканчивая">
            </div>

            <button id ="load" class ="ui-btn ui-shadow ui-corner-all ui-icon-search ui-btn-icon-top moacl-butt">Load</button>

        </div>



        <ul data-role="listview" data-split-icon="action" data-split-theme="a" data-inset="true">
            <li data-role="list-divider">Friday, October 8, 2010, 18:24:55<span class="ui-li-count" style = "color: lightgreen;">DONE</span></li>
            <li><a href="#">
                    <h2 class="ui-li-aside" style = "color: red;">-600 RUR</h2>
                    <p><strong>#465465 POCKET </strong></p>
                    <p><strong>Transport: Taxi</strong></p>
                    <p>Поездка в магазин за покупками</p>
                </a>
                <a href="#oper" data-rel="popup" data-position-to="window" data-transition="pop">OPERATIONS</a>
            </li>

        </ul>
    </div>

    <?require_once '../../footer.php'?>
    <?require_once 'panel.php'?>

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

<script>
    function SetTransactions(){
        var url = "gettransactions.php?"
            + "account_id=" + $("#account_filter").val() + '&'
            + "category_id=" + $("#category_filter").val() + '&'
            + "item_id=" + $("#item_filter").val() + '&'
            + "date0=" + $("#date_0_filter").val() + '&'
            + "date1=" + $("#date_1_filter").val() + '&'
            + "confirmed=" + $("#confirmed_filter").val() + '&'
            + "revenue=" + $("#itemType_filter").val();

        $.ajax({
            url: url,
            dataType : "json",
            cache: false,
            success: function (result) {
                if (result.type == 'error') {
                    alert('error SetTransactions');
                    return(false);
                }
                else {
                    var $account = $("#account");
                    $account.val($(result.row).attr("Account_ID"));

                }
            }
        });
    }
    $(document).ready(
        function(){
            //1.load of accounts
            combobox_load(false,"account_filter", "Account", "getaccounts.php", 1);
            $revenue = $("#itemType_filter").val();
            combobox_load(false,"category","Category", "getcategories.php?revenue=" + $revenue, 1);
        });
</script>


</html>
