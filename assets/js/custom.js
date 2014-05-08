jQuery(document).ready(function($) {

	var $container = $('.isotope').imagesLoaded(function() {
		$container.isotope({
			itemSelector: '.project',
		});
	});

	$('.option-set a').click(function() {
		$('.option-set a').removeClass('active');
		$(this).addClass('active');
		var selector = $(this).attr('data-filter');
		$container.isotope({
			filter: selector
		});
		return false;
	});
});