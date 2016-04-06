var $CURR = "RUR";
var $MIN_TIME_OF_TRANSACT = 0; //в секундах

//events begin
//event 0
$(document).ready(function() {
			//1.load of accounts
			combobox_load(false,"account", "Account", "getaccounts.php",0, SetBalance);
			//comboboxCatItem();

			var $revenue;
				$revenue = $('input[name=radio_tt]:checked').val();

			combobox_load(false,"category","Category", "getcategories.php?revenue=" + $revenue, 0);

			combobox_load(false, "item","Item", "getitems.php?category_id=" + $("#category").val(), 0);

			$("#to_contacts_btn").click( function(){location.href = $(this).attr("data-href");});
			$("#to_love_btn").click( function(){location.href = $(this).attr("data-href");});
			$("#to_fin_btn").click( function(){location.href = $(this).attr("data-href");});
			$("#to_obj_btn").click( function(){location.href = $(this).attr("data-href");});
			$("#to_act_btn").click( function(){location.href = $(this).attr("data-href");});
			$("#to_exit_btn").click( function(){location.href = $(this).attr("data-href");});

			$("#goToJournal").click( function(){location.href = "moacl_money_transactions.php";});
			$("#goToMain").click( function(){location.href = "../../main.php";});

			$("#implement").click(function(){

				var $transactData = $("#main_form").serialize() + '&' + $("#decisionTransact_form").serialize() + '&status=1';
				$.post(
						"transaction.php",
						$transactData,
						function(result) {
							if (result.type == 'error') {
								alert('error transaction');
								return(false);
							}
							else{
								var $rr = $(result.row);
								var $tid = $rr.attr("Transaction_ID");
								var $acc = $rr.attr("Account");
								var $cat = $rr.attr("Category");
								var $itm = $rr.attr("Item");
								var $val = $rr.attr("Valute");
								var $rev = $rr.attr("Revenue");
								var $sum = $rr.attr("Sum");
								var $date = $rr.attr("Date_of_realization");
								$date = Date.createFromMysql($date).format("dd.mm.yyyy");

								$("#successTransact").html(
										('<b>TRNS #' +
												$tid + ' was implemented!</b><br>Payment Date: <b>' +
												$date + '</b><br>Account: <b>' +
												$acc + '</b><br>Item: <b>' +
												$cat + '(' +
												$itm + ')</b><br>Amount: <b>' +
												$val + ' ' +
												(($rev == 0) ? '-' : '+') +
												$sum + '</b>'
										)
								);
								SetBalance();
								$("#transact").click();
							}
						},
						"json"
				);

			});
			$("#addInPlan").click(function(){
				var $transactData = $("#main_form").serialize() + '&' + $("#decisionTransact_form").serialize() + '&status=2';
				$.post(
						"transaction.php",
						$transactData,
						function(result) {
							if (result.type == 'error') {
								alert('error transaction');
								return(false);
							}
							else{
								var $rr = $(result.row);
								var $tid = $rr.attr("Transaction_ID");
								var $acc = $rr.attr("Account");
								var $cat = $rr.attr("Category");
								var $itm = $rr.attr("Item");
								var $val = $rr.attr("Valute");
								var $rev = $rr.attr("Revenue");
								var $sum = $rr.attr("Sum");
								var $date = $rr.attr("Date_of_realization");
								$date = Date.createFromMysql($date).format("dd.mm.yyyy");

								$("#successTransact").html(
										('<b>TRNS #' +
												$tid + ' was added in plan!</b><br>(Needs confirmation at <b>' +
												$date + '</b>)<br>Account: <b>' +
												$acc + '</b><br>Item: <b>' +
												$cat + '(' +
												$itm + ')</b><br>Amount: <b>' +
												$val + ' ' +
												(($rev == 0) ? '-' : '+') +
												$sum + '</b>'
										)
								);
								SetBalance();
								$("#transact").click();
							}
						},
						"json"
				);

			});
			$("#newTransact").click(function(){
				//очистка полей формы
				$("#sum").val($CURR);
                var now = new Date();
                now = now.format("yyyy-mm-dd");
				$("#date").val(now);
				$("#commentary").val("");

			});
			$("#decisionTransact_rel").click(function(e){
				var $sum = $("#sum").val();
				$sum = $sum.replace($CURR,"").replace(/\s/g,"");

				if (($sum > 0)) {
					$("#decisionTransact_rel").attr('href', '#decisionTransact');
				}
				else{
					$("#decisionTransact_rel").attr('href', '#warningTransact');
				}

			});





		});

$("#category").change(function(){
	combobox_load(false, "item","Item", "getitems.php?category_id=" + $("#category").val(), 0);
});

$('input[type="radio"]').change( function() {
	var $revenue;
	$revenue = $('input[name=radio_tt]:checked').val();

	combobox_load(false,"category","Category", "getcategories.php?revenue=" + $revenue, 0);
	combobox_load(false, "item","Item", "getitems.php?category_id=" + $("#category").val(), 0);

});

var $sum = $("#sum");

$sum.tap(function(){

    $sum.attr('type','number'); //call numeric keypad
   // $sum.removeAttr('readonly');

		}
);

$sum.focus(function(){
			//rur_format_clear($sum);
    rur_format_clear($sum);
    $sum.css({"font-weight":"normal"});
    $sum.css({"text-align":"right"});

    }
);
//event 5
$sum.blur(function(){
   // $sum.attr('readonly', 'readonly');
			$sum.attr('type','text');

			rur_format($sum, false);
    $sum.css({"font-weight":"bold"});
    $sum.css({"text-align":"left"});

		}
);

function SetBalance(){
	var $loader = $("#loaderset");
    var $balset = $("#balset");

    $balset.hide();
    $loader.show();

	var url = "getbalance.php?account_id=" + $("#account").val();

	$.ajax({
		url: url,
		dataType : "json",
		cache: false,
		success: function (result) {
			if (result.type == 'error') {
				alert('error SetBalance');
				return(false);
			}
			else {
                var $bal = $("#balance");
                var $bal_pass = $("#balance_pass");
                $bal.val($(result.row).attr("Balance"));
				$bal_pass.val($(result.row).attr("Balance_pass"));
				rur_format($bal, true);
				rur_format($bal_pass, true);

                $loader.hide();
                $balset.show();
			}
		}
	});
}

