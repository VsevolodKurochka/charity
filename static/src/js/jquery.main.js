jQuery(document).ready(function($){

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

	$("#partner-carousel").owlCarousel({
	loop:true,
	margin: 15,
	nav: false,
	items: 3,
	dots: true,
	nav: false,
	autoplay: true,
	autoplayTimeout: 3000,
	dotsClass: 'owl-dots partner__slider-dots',
	dotClass: 'owl-dot partner__slider-dot',
	responsive: {
		768: {
			items: 2
		},
		1025: {
			items: 3
		}
	}
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