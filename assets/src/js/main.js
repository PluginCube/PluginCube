jQuery(($) => {
	'use strict';

	// Toggle element
	$('.plugincube-toggle').each(function(){
		let toggle = $(this);

		let primaryTarget = '.' + toggle.find('.primary-text').data('class-target');
		let secondaryTarget = '.' + toggle.find('.secondary-text').data('class-target');

		let toggleVisibility = () => {
			if (toggle.hasClass('active')) {
				$(primaryTarget).hide()
				$(secondaryTarget).show()
			} else {
				$(primaryTarget).show()
				$(secondaryTarget).hide()
			}
		}

		toggleVisibility();


		toggle.find('.toggle-trigger').on('click', function () {
			toggle.toggleClass('active');

			toggleVisibility();
		});
	});

	// Mobile menu
	$('.burger-icon').on('click', function () {
		$('header.header nav').toggleClass('open');
	});

	// Fixed header
	const nav = $('header.header');
	let headerHeight = nav.height();

	$(window).on('load scroll', function(){
		if ( $(window).scrollTop() > headerHeight ) {
			nav.addClass('fixed-show');
		} else {
			nav.removeClass('fixed-show');
		}
	})

	// Documentation header
	$('.bpress-content-wrap header h2').html('Documentation')
});
