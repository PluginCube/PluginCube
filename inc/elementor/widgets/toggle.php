<?php
namespace PluginCube\Elementor;

// Elementor Classes
use Elementor\Controls_Manager;
use Elementor\Control_Media;
use Elementor\Utils;
use Elementor\Repeater;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;


/**
 * Elementor Toggle Widget.
 *
 *
 * @since 1.0.0
 */
class Toggle extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'plugincube-toggle';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return 'Toggle';
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-toggle-on';
	}

	/**
	 * Get widget categories.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Register widget controls.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		// Primary
		$this->start_controls_section('primary', [
            'label' => 'Primary',
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

		$this->add_control('primary_text', [
            'label' => 'Text',
            'type' => \Elementor\Controls_Manager::TEXT,
			'input_type' => 'text',
			'default' => 'Billed Monthly'
        ]);

		$this->add_control('primary_tooltip', [
            'label' => 'Tooltip',
            'type' => \Elementor\Controls_Manager::TEXT,
			'input_type' => 'text',
			'default' => null
		]);
		
		$this->add_control('primary_target_class', [
            'label' => 'Target Class',
            'type' => \Elementor\Controls_Manager::TEXT,
			'input_type' => 'text',
			'default' => null
        ]);

		$this->end_controls_section();

		// Secondary
		$this->start_controls_section('secondary', [
            'label' => 'Secondary',
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

		$this->add_control('secondary_text', [
            'label' => 'Text',
            'type' => \Elementor\Controls_Manager::TEXT,
			'input_type' => 'text',
			'default' => 'Billed Yearly'
        ]);

		$this->add_control('secondary_tooltip', [
            'label' => 'Tooltip',
            'type' => \Elementor\Controls_Manager::TEXT,
			'input_type' => 'text',
			'default' => 'Save up to 30%'
        ]);
		
		$this->add_control('secondary_target_class', [
            'label' => 'Target Class',
            'type' => \Elementor\Controls_Manager::TEXT,
			'input_type' => 'text',
			'default' => null
        ]);

		$this->end_controls_section();

	}

	/**
	 * Render widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
			$settings = $this->get_settings_for_display();
		?>
			<div class="plugincube-toggle">
				<div class="primary-text" data-class-target="<?= $settings['primary_target_class'] ?? null ?>">
					<?= $settings['primary_text'] ?? null ?>
					
					<?php if ($settings['primary_tooltip']) : ?>
						<span><?= $settings['primary_tooltip'] ?></span>
					<?php endif; ?>
				</div>

				<div class="toggle-trigger">
					<div class="toggle-circle"></div>
				</div>

				<div class="secondary-text" data-class-target="<?= $settings['secondary_target_class'] ?? null ?>">
					<?= $settings['secondary_text'] ?? null ?>
					
					<?php if ($settings['secondary_tooltip']) : ?>
						<span><?= $settings['secondary_tooltip'] ?></span>
					<?php endif; ?>
				</div>
			</div>
		<?php
	}

}
