<?php
namespace PluginCube;

/**
 * Include PHP files, nothing else.
 *
 * @package PluginCube
 */

require_once 'inc/config.php';

require_once 'inc/helpers.php';
require_once 'inc/setup.php';
require_once 'inc/filters.php';
require_once 'inc/assets.php';
require_once 'inc/ajax.php';


add_action('init', function () {
    if (class_exists('Elementor')) {
        require_once 'inc/elementor/widgets/widgets.php';
        
        Elementor\Widgets::get_instance();
    }
});
