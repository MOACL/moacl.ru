	
	var MES_COLOR_WARNING = "rgba(255 ,0 ,0 , 0.7)";
	var MES_COLOR_OK = "rgba(0, 128, 0, 1)";
	
	$(document).ready(function() {
		
		setInterval(function(){
			var url = "./register_ajax.php?login=" + $("#login").val() + "&password1=" + $("#password1").val()
			+ "&password2=" + $("#password2").val() + "&email=" + $("#email").val();
			$.ajax({
				url: url,            
				dataType : "json",                    
				success: function (result) {
					if (result.type == 'error') {
						alert('error');
						return(false);
					}
					else {
						$("#login_mes").html(result.login_mes);
						if (result.login_mes == "ok") $("#login_mes").css({color: MES_COLOR_OK});
						else $("#login_mes").css({color: MES_COLOR_WARNING});
							
						$("#pass1_mes").html(result.pass1_mes);
						if (result.pass1_mes == "ok") $("#pass1_mes").css({color: MES_COLOR_OK});
						else $("#pass1_mes").css({color: MES_COLOR_WARNING});
						
						$("#pass2_mes").html(result.pass2_mes);
						if (result.pass2_mes == "ok") $("#pass2_mes").css({color: MES_COLOR_OK});
						else $("#pass2_mes").css({color: MES_COLOR_WARNING});
						
						$("#email_mes").html(result.email_mes);
						if (result.email_mes == "ok") $("#email_mes").css({color: MES_COLOR_OK});
						else $("#email_mes").css({color: MES_COLOR_WARNING});
						
						$("#complete").html(result.complete);
					}
				}
			});
		},1000);
	});
	
	$( document ).on( "click", ".show-page-loading-msg", function() { //стандартная анимация при проводке
		if($("#complete").html() == "false"){
			//добавить popup
			alert("вместо алерта нужно добавить попап");
			//добавить popup
			
			return false;
		}
			
		$(".moacl-reg-message").css({display: "none"});	//скрываем ворнинги сразу после клика по регистрации
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




	
	