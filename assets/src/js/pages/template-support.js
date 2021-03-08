jQuery( document ).ready(function() {
	'use strict';

    jQuery('form').on('submit', function (e) {
		e.preventDefault();

		let form = jQuery(this);
		let url = jQuery('#ajaxurl').val();
		let data = {
			action: 'support_form',
		};

		form.serializeArray().map(e => {
			data[e.name] = e.value;
		})

		jQuery.ajax(url, {
			method: 'post',
			data
		}).done(res => {
            form.append('<p class="mt-4" role="alert">' + res.data.message + '</p>');
            form.find("input[type=text], input[type=email], textarea").val(null);
		}).fail(res => {
			alert('Something went wrong');
		});
	});
});
