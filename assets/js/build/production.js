jQuery(document).ready(function($) {

/***************************************ISOTOPE***************************************/
	
	var $container = $('.isotope').imagesLoaded(function() {
		$container.isotope({
			itemSelector: '.project',
		});
	});

	$('.filter a').click(function() {
		$('.filter a').removeClass('active');
		$(this).addClass('active');
		var selector = $(this).attr('data-filter');
		$container.isotope({
			filter: selector
		});
		return false;
	});

/***************************************BACK TO TOP***************************************/

	$("#scrolltop").hide();

	$(function() {
		$(window).scroll(function() {
			if ($(this).scrollTop() > 800) {
				$('#scrolltop').fadeIn();
			}
			else {
				$('#scrolltop').fadeOut();
			}
		});

		$('#scrolltop a').click(function() {
			$('body, html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});
});
