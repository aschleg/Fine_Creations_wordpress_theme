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

/***************************************FANCYBOX***************************************/

	/*$(".fancybox").fancybox();
	$("a[href$='.jpg'], a[href=$='.png'], a[href$='.jpeg'], a[href$='.gif']").fancybox();
	$(".gallery a[href$='.jpg'], .gallery a[href$='.png'], .gallery a[href$='.jpeg'], .gallery a[href$='.gif']").attr('rel', 'gallery').fancybox();*/

});
