$(document).ready(function(){
    //1.load of cash positions
    combobox_load(false,"cashPosition", "Cash_position", "getcashpositions.php",0);
    //1.load valutes
    combobox_load(false,"valute", "Valute", "getvalutes.php",0);

    $("#to_exit_btn").click( function(){location.href = $(this).attr("data-href");});


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
        var $revenues = $("#checkbox-v-2a").prop("checked");
        if ($revenues){$revenues=1;}
        else{$revenues=0;}
        var $expenses = $("#checkbox-v-2b").prop("checked");
        if ($expenses){$expenses=1;}
        else {$expenses=0;}
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

    $("#decisionAccount_rel").click(function(e){
        var $aName = $("#account_name").val();

        if ($aName.length > 0) {
            $("#decisionAccount_rel").attr('href', '#decisionAccount');
        }
        else{
            $("#decisionAccount_rel").attr('href', '#warningAccount');
        }

    });
});