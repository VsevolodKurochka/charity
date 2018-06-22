$(document).ready(function(){

	function scroll(scrollLink, speed){
		$('html, body').animate({
			scrollTop: scrollLink.offset().top
		}, speed);
		return false;
	}
	$('.anchor').click(function(e){
		e.preventDefault();
		scroll($( $(this).attr('href') ), 1500);
	});

	$('#motivation-slider').owlCarousel({
    loop:true,
    margin: 0,
    nav: false,
    items: 1,
    dots: false,
    nav: true,
    navContainerClass: 'owl-nav container',
    autoplay: true,
    autoplayTimeout: 3000
	});

	// Page "Front"

		$('.js-front-contrast-button').click(function () {
			var toggle = $(this).attr('data-toggle');
			var textOpen = $(this).attr('data-open-text');
			var textClose = $(this).attr('data-close-text');

			$("#" + toggle).slideToggle();

			$(this).text() == textOpen ? $(this).text(textClose) : $(this).text(textOpen);

			$('html, body').animate({
				scrollTop: $("#" + toggle).offset().top - $('#js-navigation').height() - 15
			}, 500);
			return false;

		});

});	