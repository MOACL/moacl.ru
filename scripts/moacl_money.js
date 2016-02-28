var $CURR = "RUR";
var $MIN_TIME_OF_TRANSACT = 0; //в секундах
//events begin
//event 0
$(document).ready(
		function() {
			//1.load of accounts
			combobox_load(false,"account", "Account", "getaccounts.php", SetBalance);
			//comboboxCatItem();


				$revenue = $('input[name=radio_tt]:checked').val();

			combobox_load(false,"category","Category", "getcategories.php?revenue=" + $revenue);

			combobox_load(false, "item","Item", "getitems.php?category_id=" + $("#category").val());

		}
);

$("#category").change(function(){
	combobox_load(false, "item","Item", "getitems.php?category_id=" + $("#category").val());
});

$('input[type="radio"]').change( function() {
	$revenue = $('input[name=radio_tt]:checked').val();

	combobox_load(false,"category","Category", "getcategories.php?revenue=" + $revenue);
	combobox_load(false, "item","Item", "getitems.php?category_id=" + $("#category").val());

})

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
		cache: false,
		success: function (result) {
			if (result.type == 'error') {
				alert('error SetBalance');
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

function combobox_load(ajax, comboname, dbfieldname, url, changefunc){
	//alert(url);
	var $select = $("#" + comboname);
    $i=0;
	$selVal=0;
	$select.empty();
	$.ajax({
		url: url,
		async: ajax,
		dataType : "json",
		success: function (result) {
			if (result.type == 'error') {
				alert('error combobox_load'. url);
				return(false);
			}
			else {
				$(result.row).each(function() {
					$select.append('<option value=' + $(this).attr(dbfieldname + "_ID") + '>' + $(this).attr(dbfieldname) + '</option>');
					if (($(this).attr("Selected") == 1) || ($i=0)) {
						$selVal = $(this).attr(dbfieldname + "_ID");
					}
					$i=$i+1;
				});

				if ($selVal > 0){$select.val($selVal);}
				$select.selectmenu("refresh");

			}

		}//success
	});//ajax

	if(typeof changefunc == 'function' ){
		$select.change(changefunc);
		changefunc(); //запускаем функцию в конце загрузки комбобокса
	}
}//end


$('#main_form').submit(function(e){
	e.preventDefault();

	if (!$('#sum').val().replace($CURR,"").replace(/\s/g,"")>0){alert("Sum incorrect!"); return;}
	if (!confirm("Are you sure?")) {return;}


	var m_method=$(this).attr('method');
	var m_action=$(this).attr('action');
	var m_data=$(this).serialize();

	$.ajax({
		type: m_method,
		url: m_action,
		data: m_data,

		success: function(result){
			setTimeout(function(){


				$("#sum").val("");
				$("#date").val("");
				$("#commentary").val("");
				SetBalance();
			}, $MIN_TIME_OF_TRANSACT*1000);

		}
	});
});




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