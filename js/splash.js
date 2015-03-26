$( document ).ready(function() {
    $(".strapline").delay(1200).addClass("full-opacity");

    $( ".register-btn" ).click(function() {
	  $(".splash-register").fadeIn(1000);
	});

	$( ".login-btn" ).click(function() {
	  $(".splash-login").fadeIn(1000);
	});

	$( ".close-btn" ).click(function() {
	  $(".splash-register").fadeOut(500);
	  $(".splash-login").fadeOut(500);
	});

	$( ".register-link" ).click(function() {
	  $(".splash-login").slideUp(500);
	  $(".splash-register").delay(501).slideDown(500);
	});

	$( ".login-link" ).click(function() {
	  $(".splash-register").slideUp(500);
	  $(".splash-login").delay(501).slideDown(500);
	});

});