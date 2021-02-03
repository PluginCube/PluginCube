<?php

/**
 * Theme Setup
 *
 * @package PluginCube
*/

namespace PluginCube;

/**
 * Main theme setup
 */
add_action('after_setup_theme', function() {
    add_theme_support('title-tag');

    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption'
    ]);

	add_theme_support('post-thumbnails');

	add_image_size('lazyload', 16, 12, true);
	add_image_size('hero_xl', 2000, 1511, true);
	add_image_size('hero_md', 1500, 1133, true);
	add_image_size('hero_sm', 850, 567, true);
	add_image_size('wide', 1216, 919, false);
	add_image_size('wide_xl', 1824, 1378, false);

	register_nav_menus([
        'primary' => 'Header: Primary',
        'secondary' => 'Header: secondary',
    ]);
});

/**
 * Register widgets
 */
add_action('widgets_init', function () {
    register_sidebar([
        'name'          => 'Footer: First',
        'id'            => 'footer-first',
        'description'   => 'First footer column.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5>',
        'after_title'   => '</h6>',
    ]);

    register_sidebar([
        'name'          => 'Footer: Second',
        'id'            => 'footer-second',
        'description'   => 'Second footer column.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5>',
        'after_title'   => '</h6>',
    ]);

    register_sidebar([
        'name'          => 'Footer: Third',
        'id'            => 'footer-third',
        'description'   => 'Third footer column.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5>',
        'after_title'   => '</h6>',
    ]);
});
