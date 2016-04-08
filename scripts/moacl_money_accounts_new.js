$(document).ready(function(){
    //1.load of cash positions
    combobox_load(false,"cashPosition", "Cash_position", "getcashpositions.php",0);
    //1.load valutes
    combobox_load(false,"valute", "Valute", "getvalutes.php",0);

    $("#to_exit_btn").click( function(){location.href = $(this).attr("data-href");});

    $('input[type="radio"]').click(function(){
        var enable= $('input[type="radio"]:checked').val();

        if(enable == 1){
            $("#limitBlock").show();
            $('#permitExpensesBlock').css('padding-left','0');
        }
        else{
            $("#limitBlock").hide();
            $('#permitExpensesBlock').css('padding-left','10%');
        }
    });

    $("#checkbox-v-2e").click(function(){
        var check = $(this).prop("checked");

        if(check){
            $("#creditBlock").show();
        }
        else{
            $("#creditBlock").hide();
        }
    });
    $('#createblock').click(function(){
        $('#summaryLabel').html('<h3>Account: ' + $('#account_name').val() + '</h3>');
    });

    $("#addAccount").click(function(){

        var $selected = $("#checkbox-v-2d").prop("checked");
        if ($selected){$selected=1;}
        else{$selected=0;}
        var $revenues = 1; //разрешать класть на счет деньги всегда
        var $expenses = $('input[type="radio"]:checked').val();
        var $purpose_id = $("#checkbox-v-2i").prop("checked");
        if ($purpose_id){$purpose_id=1;}
        else {$purpose_id=null;}
        var $reserved = $("#checkbox-v-2f").prop("checked");
        if ($reserved){$reserved=1;}
        else {$reserved=0;}
        var $accountData = $("#new_account_data").serialize() +
            '&' + 'selected=' + $selected +
            '&' + 'revenues=' + $revenues +
            '&' + 'expenses=' + $expenses +
            '&' + 'purpose_id=' + $purpose_id +
            '&' + 'reserved=' + $reserved;
        $.post(
            "addaccount.php",
            $accountData,
            function(result) {
                if (result.type == 'error') {
                    return(false);
                }
                else{
                    var $rr = $(result.row);
                    var $aid = $rr.attr("Account_ID");
                    var $acc = $rr.attr("Account");
                    var $sel = $rr.attr("Selected");
                    var $lim = $rr.attr("Limit");
                    var $vlt = $rr.attr("Valute");
                    var $csp = $rr.attr("Cash_position");
                    var $vth = $rr.attr("Valid_thrue");
                    var $rev = $rr.attr("Revenues");
                    var $exp = $rr.attr("Expenses");
                    var $res = $rr.attr("Reserved");

                    $("#successAccount").html(
                        ('<b>Account #' +
                            $aid + ' was created!</b><br>Account name: <b>' +
                            $acc + '</b><br>Limit: <b>' +
                            $lim + '</b><br>Valute: <b>' +
                            $vlt + $sel + $csp + $vth + $rev + $exp + $res + '</b>'
                        )
                    );
                    //SetBalance();
                    $("#account").click();
                }
            },
            "json"
        );
    });

//выделить в отдельную функцию
    var $limit = $("#limit");

    $limit.tap(function(){

        $limit.attr('type','number'); //call numeric keypad
            // $limit.removeAttr('readonly');

        }
    );

    $limit.focus(function(){
            //rur_format_clear($limit);
            rur_format_clear($limit);
        $limit.css({"font-weight":"normal"});
        $limit.css({"text-align":"right"});

        }
    );
//event 5
    $limit.blur(function(){
            // $limit.attr('readonly', 'readonly');
        $limVal = $limit.val();
        $limit.attr('type','text');
        if($limVal>0){
            rur_format($limit, false);
        }

        $limit.css({"font-weight":"bold"});
        $limit.css({"text-align":"left"});

        }
    );
//выделить в отдельную функцию

    $("#createAccount").click(function(e){
        var $aName = $("#account_name").val();
        var $dAr = $("#decisionAccount_rel");

        if ($aName.length > 0) {
            var $accountData = 'account_name=' + $aName;
            $.post(
                "existsaccount.php",
                $accountData,
                function(result) {
                    if (result.type == 'error') {
                        return(false);
                    }
                    else{
                        var $result_len = $(result.row).length;

                        if ($result_len> 0) {
                            $dAr.attr('href', '#warningAccount');
                            $('#warningAccount').html('' +
                            ' <h3>This Name of Account already exists!</h3>' +
                            '<a href="#" data-rel="back" class="ui-shadow ui-btn ui-corner-all ui-mini">Ок</a>');
                        }
                        else{
                            $dAr.attr('href', '#decisionAccount');
                        }
                        $dAr.click();
                    }
                },
                "json"
            );

        }
        else{
            $dAr.attr('href', '#warningAccount');
            $('#warningAccount').html('' +
                ' <h3>First enter the name of account!</h3>' +
                '<a href="#" data-rel="back" class="ui-shadow ui-btn ui-corner-all ui-mini">Ок</a>');
            $dAr.click();
        }

    });
});