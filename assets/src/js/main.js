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
});
