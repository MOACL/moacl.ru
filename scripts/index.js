$(document).ready(

		function() {
			$("#to_about_btn").click( function(){location.href = $(this).attr("data-href");});
			$("#to_donation_btn").click( function(){location.href = $(this).attr("data-href");});
			$("#reg_button").click( function(){location.href = $(this).attr("data-href");});
		});