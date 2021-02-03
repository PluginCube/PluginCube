<?php

/**
 * Widgets
 *
 * @package PluginCube
 */

namespace PluginCube\Elementor;

class Widgets {

	protected static $instance = null;

	public static function get_instance() {        
		if ( ! isset( static::$instance ) ) {
			static::$instance = new static;
		}

		return static::$instance;
	}

	protected function __construct() {
		require_once 'toggle.php';
        
        add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets']);
	}

	public function register_widgets() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Toggle() );
	}

}
