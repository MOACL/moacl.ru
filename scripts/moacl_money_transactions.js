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
    var status_filter = $("#status_filter").val();
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
    var Status;
    var StatusID;
    var Sign;
    var colorStatus;
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
                "status": status_filter,
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
                            Status =$(this).attr('Status');
                            StatusID =$(this).attr('Status_ID');
                            if(StatusID== 1){
                                colorStatus = 'Green'
                            }
                            else if(StatusID== 2){
                                colorStatus = 'Red'
                            }
                            else if(StatusID== 3){
                                colorStatus = 'Gray'
                            }
                            else {
                                colorStatus = 'Black'
                            }
                            $tJournal.append(
                                '<li data-role="list-divider" role = "heading" class = "ui-li-divider ui-bar-inherit ui-li-has-count ui-first-child">' +
                                Date_of_realization + '<span class="ui-li-count ui-body-inherit" style = "color: ' + colorStatus + ';">' +
                                Status + '</span></li> ' +
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