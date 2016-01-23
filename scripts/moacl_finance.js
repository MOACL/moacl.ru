var $CURR = "RUR"
var $MIN_TIME_OF_TRANSACT = 1.5 //в секундах
//events begin
//event 0
$(document).ready(
		function() {
			//1.load of accounts
			combobox_load("account", "Account", "getaccounts.php", SetBalance);
		}
)


$("#sum").focus(function(){
			rur_format_clear("#sum");
			$("#sum").css({"font-weight":"normal"});
		}
);
//event 5
$("#sum").blur(function(){
			rur_format("#sum", false);
			$("#sum").css({"font-weight":"bold"});
		}
);


function SetBalance(){
	var url = "getbalance.php?account_id=" + $("#account").val();

	$.ajax({
		url: url,
		dataType : "json",
		success: function (result) {
			if (result.type == 'error') {
				alert('error');
				return(false);
			}
			else {
				$("#balance").val($(result.row).attr("Balance"));
				rur_format("#balance", true);
			}
		}
	});
}

///////////////универсальные функции (для выделения в отдельный файл)///////////////

function combobox_load(comboname, dbfieldname, url, changefunc){
	var $select = $("#" + comboname);

	$select.empty();
	$.ajax({
		url: url,
		dataType : "json",
		success: function (result) {
			if (result.type == 'error') {
				alert('error');
				return(false);
			}
			else {

				$(result.row).each(function() {

					$select.append('<option value=' + $(this).attr(dbfieldname + "_ID") + '>' + $(this).attr(dbfieldname) + '</option>');
					if ($(this).attr("Selected") == 1) {
						$selVal = $(this).attr(dbfieldname + "_ID");
					}
				});
			}
			$select.val($selVal);
			$select.change(changefunc);
			changefunc();
			$select.selectmenu("refresh"); //завершаем возвратную функцию обновлением комбобокса

		}
	});
}




//focus
function rur_format(v, minus){
	rur_format_clear(v);
	var x = $(v).val();
	if(x>0) {
		x = "" + money_format((1)*x +"");
	}
	else if(x<0 && minus == true) {
		x = "-" + money_format((-1)*x+"");
	}
	else {
		x="";
	}

	$(v).val($CURR + " " + x);
}

//blur
function rur_format_clear(v){
	var t = $(v).val()
	t = t.replace($CURR,"").replace(/\s/g,"");
	$(v).val(t);
}

function money_format(s){
	//s = s.trim();
	var l = s.length;	//длинна суммы
	var k = parseInt((l-1)/3); //количество необходимых пробелов в числе
	var m = s.match(/\d/g);	//помещение суммы в массив
	m.reverse();
	for(var i = 0; i < k; i++){
		m.splice((i+1)*3+i,0," "); //после какого эллемента массива следует вставить пробел
	}
	return m.reverse().join("");
}