var $inProgress = false;

$(document).ready(function(){
    $("#to_exit_btn").click( function(){location.href = $(this).attr("data-href");});
    SetAccounts();
});

function SetAccounts() {
    var $loader = $("#ballsWaveG");
    $loader.show();

    //input vars

    //output vars
    var Account;
    var Balance;
    var Valute;

    var $aJournal = $("#accountJournal");
    var $result_len;
    if (!$inProgress) {
        $.ajax({
            url: "getaccounts.php",
            async: true,
            beforeSend: function () {
                $inProgress = true;

            },
            dataType: "json",
            success: function (result) {
                //  alert("!");
                if (result.type == 'error') {
                    alert('error SetAccounts'.url);
                    return (false);
                }
                else {
                    $result_len = $(result.row).length;
                    if ($result_len> 0) {
                        $(result.row).each(function () {
                            Account =$(this).attr('Account');
                            Balance =$(this).attr('Balance');
                            Valute = $(this).attr('Valute');

                            Balance = money_format(Balance);

                            $aJournal.append(
                                '<li class = "ui-li-has-count"><a href="#" class = "ui-btn ui-btn-icon-right ui-icon-carat-r">' +
                                Account + ' <span class="ui-li-count ui-body-a">' +
                                Valute + ' ' + Balance +
                                '</span></a></li>'
                            );
                        });
                        /* По факту окончания запроса снова меняем значение флага на false */
                        $inProgress = false;

                        $loader.hide() ;

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
