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
    <link href="../../css/loader.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="../../themes/moacl_2.min.css" />
    <link rel="stylesheet" href="../../themes/jquery.mobile.icons.min.css" />
</head>

<body>
<section id="transactions" data-role = "page" data-position = "fixed">

    <?require_once '../../header.php'?>

    <div class="content moacl-common" data-role = "content" >

        <div data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u">
                <h4>Advanced filter</h4>
                 <div data-role="fieldcontain">
                     <label for="confirmed_filter">Confirmed:</label>
                     <select id="confirmed_filter" name="confirmed_filter" data-native-menu = "false">
                         <option value= -1>ALL</option>
                         <option value= 1>Yes</option>
                         <option value= 0>No</option>
                     </select>
                 </div>
                 <div data-role="fieldcontain"  >
                     <label for="account_filter">Account:</label>
                     <select id="account_filter" name="account_filter" data-native-menu = "false" >
                         <option value= -1>ALL</option>
                     </select>
                 </div>
                 <div data-role="fieldcontain" >
                       <label for="itemType_filter">Item type:</label>
                       <select id="itemType_filter" name="itemType_filter" data-native-menu = "false">
                           <option value= -1>ALL</option>
                           <option value= 1>Gain</option>
                           <option value= 0>Cost</option>
                       </select>
                 </div>
                <div data-role="fieldcontain" id = "cat_block" style = "display : none;">
                        <label for="category_filter">Category:</label>
                        <select id="category_filter" name="category_filter" data-native-menu = "false">
                            <option value= -1>ALL</option>
                        </select>
                </div>
                <div data-role="fieldcontain" id = "itm_block" style = "display : none;">
                        <label for="item_filter">Item:</label>
                        <select id="item_filter" name="item_filter" data-native-menu = "false">
                            <option value= -1>ALL</option>
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

        <ul id = "transactJournal" data-role="listview" data-split-icon="action" data-split-theme="a" data-inset="true">
        </ul>

        <div id="ballsWaveG">
            <div id="ballsWaveG_1" class="ballsWaveG"></div>
            <div id="ballsWaveG_2" class="ballsWaveG"></div>
            <div id="ballsWaveG_3" class="ballsWaveG"></div>
            <div id="ballsWaveG_4" class="ballsWaveG"></div>
            <div id="ballsWaveG_5" class="ballsWaveG"></div>
            <div id="ballsWaveG_6" class="ballsWaveG"></div>
            <div id="ballsWaveG_7" class="ballsWaveG"></div>
            <div id="ballsWaveG_8" class="ballsWaveG"></div>
        </div>
        <button id="more">Show more</button>

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
    var $inProgress = false;
    var $startFrom = 0;
    $(document).ready(function(){

        /*$(window).scroll(function() {
         Если высота окна + высота прокрутки больше или равны высоте всего документа и ajax-запрос в настоящий момент не выполняется, то запускаем ajax-запрос
         if($(window).scrollTop() + $(window).height() >= $(document).height() - 200 && !inProgress) {
         }  */

            //1.load of accounts
            combobox_load(false,"account_filter", "Account", "getaccounts.php", 1);
            combobox_load(false,"category_filter","Category", "getcategories.php?revenue=" + $("#itemType_filter").val(), 1);
            combobox_load(false, "item_filter","Item", "getitems.php?category_id=" + $("#category_filter").val(), 1);

        SetTransactions();

        });
    function SetTransactions() {
        var $loader = $("#ballsWaveG");
        var $button = $("#more");
        $loader.show();
        $button.hide();
        //input vars
        var account_filter = $("#account_filter").val();
        var category_filter = $("#category_filter").val();
        var item_filter = $("#item_filter").val();
        var date_0_filter = $("#date_0_filter").val();
        var date_1_filter = $("#date_1_filter").val();
        var confirmed_filter = $("#confirmed_filter").val();
        var itemType_filter = $("#itemType_filter").val();
        var $len = 10;

        //output vars
        var Date_of_realization;
        var Revenue;
        var Sum;
        var Transaction_ID;
        var Account;
        var Category;
        var Item;
        var Comment;
        var Valute;
        var Confirmed;
        var Sign;
        var colorConf;
        var colorSum;


        var $tJournal = $("#transactJournal");
        var $result_len;
        if (!$inProgress) {
            $.ajax({
                url: "gettransactions.php",
                data: {
                    "account" : account_filter,
                    "category": category_filter,
                    "item": item_filter,
                    "date_0": date_0_filter,
                    "date_1": date_1_filter,
                    "confirmed": confirmed_filter,
                    "revenue": itemType_filter,
                    "start_": $startFrom,
                    "len_": $len
                },
                async: true,
                beforeSend: function () {
                    $inProgress = true;

                },
                dataType: "json",
                success: function (result) {
                  //  alert("!");
                    if (result.type == 'error') {
                        alert('error SetTransactions'.url);
                        return (false);
                    }
                    else {
                        $result_len = $(result.row).length;
                        if ($result_len> 0) {
                            $(result.row).each(function () {
                                Date_of_realization =$(this).attr('Date_of_realization');
                                Revenue =$(this).attr('Revenue');
                                   if(Revenue== 0){
                                        Sign = '-';
                                        colorSum = 'Red';
                                    }
                                    else {
                                        Sign = '+';
                                        colorSum = 'Blue';
                                    }
                                Sum =$(this).attr('Sum');
                                     Sum = money_format(Sum);
                                Transaction_ID =$(this).attr('Transaction_ID');
                                Account =$(this).attr('Account');
                                Category =$(this).attr('Category');
                                Item =$(this).attr('Item');
                                Comment =$(this).attr('Comment');
                                Valute =$(this).attr('Valute');
                                Confirmed =$(this).attr('Confirmed');
                                    if(Confirmed== 0){
                                        Confirmed = 'Not confirmed';
                                        colorConf = 'Red'
                                    }
                                    else {
                                        Confirmed = 'Confirmed';
                                        colorConf = 'Green'
                                    }
                                $tJournal.append(
                                    '<li data-role="list-divider" role = "heading" class = "ui-li-divider ui-bar-inherit ui-li-has-count ui-first-child">' +
                                    Date_of_realization + '<span class="ui-li-count ui-body-inherit" style = "color: ' + colorConf + ';">' +
                                    Confirmed + '</span></li> ' +
                                    '<li class = "ui-li-has-alt ui-last-child"><a class = "ui-btn" href="#"> ' +
                                    '<h2 class="ui-li-aside" style = "min-width: 20%; text-align: left; color: ' + colorSum + ';">' + Valute + ' ' + Sign +
                                    '' + Sum + '</h2>' +
                                    '<p><strong>#' + Transaction_ID + ' ' + Account + ' </strong></p>' +
                                    '<p><strong>' + Category + ': ' + Item + '</strong></p>' +
                                    '<p>' + Comment + '</p>' +
                                    '</a>' +
                                    '<a title = "OPERATIONS" class = "ui-btn ui-btn-icon-notext ui-icon-action ui-btn-a" ' +
                                    'aria-expanded = "false" aria-haspopup = "true" aria-owns = "oper" href="#oper" data-rel="popup" ' +
                                    'data-position-to="window" data-transition="pop"></a>' +
                                    '</li>'
                                );
                            });
                            /* По факту окончания запроса снова меняем значение флага на false */
                            $inProgress = false;
                            // Увеличиваем на 10 порядковый номер статьи, с которой надо начинать выборку из базы
                            $startFrom += 10;
                            $loader.hide() ;
                            if( $result_len==$len){
                                $button.show();
                            }
                        }
                        else{
                            $inProgress = false;
                            $loader.hide();
                        }

                    }
                }//success
            });//ajax*
        }

    }

    $('#more').click(function(){
        SetTransactions();
    });
    $('#load').click(function(){
        $("#transactJournal").html('');
        $startFrom = 0;
        $inProgress = false;
        SetTransactions();
    });

    $("#itemType_filter").change(function(){
        $("#itm_block").css({"display":"none"});
        if( $(this).val() == -1){
            $("#cat_block").css({"display":"none"});
        }
        else{
            $("#cat_block").css({"display":"block"});
            combobox_load(false,"category_filter","Category", "getcategories.php?revenue=" + $(this).val(), 1);
            combobox_load(false, "item_filter","Item", "getitems.php?category_id=" + $("#category_filter").val(), 1);
        }
    });

    $("#category_filter").change(function(){
        combobox_load(false, "item_filter","Item", "getitems.php?category_id=" + $(this).val(), 1);
        if( $(this).val() == -1){
            $("#itm_block").css({"display":"none"});
        }
        else{
            $("#itm_block").css({"display":"block"});
            combobox_load(false, "item_filter","Item", "getitems.php?category_id=" + $(this).val(), 1);
        }
    });

</script>


</html>
