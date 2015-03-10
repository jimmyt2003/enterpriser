$( document ).ready(function() {
    $(".strapline").delay(1000).addClass("full-opacity");

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

});