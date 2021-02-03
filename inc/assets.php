<?php

/**
 * Assets
 *
 * @package PluginCube
 */

namespace PluginCube\Ajax;

/**
 * Front-end Assets
 */
add_action('wp_enqueue_scripts', function() {
	$template = pathinfo($GLOBALS['template'])['filename'];

	wp_enqueue_style(
		'plugincube-style',
		get_template_directory_uri() . '/assets/dist/css/main.css'
	);

	wp_enqueue_script(
		'plugincube-js',
		get_template_directory_uri() . '/assets/dist/js/main.js'
	);

	if ( is_singular() && comments_open() && get_option('thread_comments') ) {
		wp_enqueue_script('comment-reply');
	}

	$tjs = "/assets/dist/js/pages/$template.js";

	if ( file_exists(get_template_directory() . $tjs) ) {
		wp_enqueue_script(
			"plugincube-$template-js",
			get_template_directory_uri() . $tjs,
			['jquery']
		);
	}


	$tcss = "/assets/dist/css/pages/$template.css";

	if ( file_exists(get_template_directory() . $tcss) ) {
		wp_enqueue_style(
			"plugincube-$template-css",
			get_template_directory_uri() . $tcss
		);
	}
});
