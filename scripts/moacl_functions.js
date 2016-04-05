/**
 * Created by Dmitry on 22.03.2016.
 */

$( document ).on( "click", ".show-page-loading-msg", function() {
        var $this = $( this ),
            theme = $this.jqmData( "theme" ) || $.mobile.loader.prototype.options.theme,
            msgText = $this.jqmData( "msgtext" ) || $.mobile.loader.prototype.options.text,
            textVisible = $this.jqmData( "textvisible" ) || $.mobile.loader.prototype.options.textVisible,
            textonly = !!$this.jqmData( "textonly" );
        html = $this.jqmData( "html" ) || "";
        $.mobile.loading( "show", {
            text: msgText,
            textVisible: textVisible,
            theme: theme,
            textonly: textonly,
            html: html
        });
    })
    .on( "click", ".hide-page-loading-msg", function() {
        $.mobile.loading( "hide" );
    });

var combobox_load = function (ajax, comboname, dbfieldname, url, checkall, changefunc){
    //alert(url);
    var $select = $("#" + comboname);

    $i=0;
    $selVal=0;
    $select.empty();
    if (checkall == 1) {
        $select.append('<option value= -1>ALL</option>');
    }
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
                if (checkall == 1) {
                    $selVal = -1;
                }

                if ($selVal > 0 || $selVal == -1){$select.val($selVal);}
                $select.selectmenu("refresh");

            }

        }//success
    });//ajax*

    if(typeof changefunc == 'function' ){
        $select.change(changefunc);
        changefunc(); //запускаем функцию в конце загрузки комбобокса
    }
};//end

var rur_format = function (v, minus){
    rur_format_clear(v);
    var x = v.val();
    if(x>0) {
        x = "" + money_format((1)*x +"");
    }
    else if(x<0 && minus == true) {
        x = "-" + money_format((-1)*x+"");
    }
    else {
        x="";
    }

    v.val($CURR + " " + x);
};


var rur_format_clear = function (v){
    var t = v.val();
    t = t.replace($CURR,"").replace(/\s/g,"");
    v.val(t);
};

var money_format = function (s){
    //s = s.trim();
    var l = s.length;	//длинна суммы
    var k = parseInt((l-1)/3); //количество необходимых пробелов в числе
    var m = s.match(/\d/g);	//помещение суммы в массив
    m.reverse();
    for(var i = 0; i < k; i++){
        m.splice((i+1)*3+i,0," "); //после какого эллемента массива следует вставить пробел
    }
    return m.reverse().join("");
};

Date.createFromMysql = function(mysql_string) {
    if(typeof mysql_string === 'string') {
        var t = mysql_string.split(/[- :]/);
        return new Date(t[0], t[1] - 1, t[2], t[3] || 0, t[4] || 0, t[5] || 0);
    }
    return null;
};