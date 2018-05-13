<?php

namespace Voyage\Modules\Shortcodes\VerticalProgressBar;

use Voyage\Modules\Shortcodes\Lib\ShortcodeInterface;

class VerticalProgressBar implements ShortcodeInterface {
	private $base;

	/**
	 * VerticalProgressBar constructor.
	 */
	public function __construct() {
		$this->base = 'mkdf_vertical_progress_bar';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'                      => 'Vertical Progress Bar',
			'base'                      => $this->base,
			'icon'                      => 'icon-wpb-vertical-progress-bar extended-custom-icon',
			'category'                  => 'by MIKADO',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => 'Title',
					'param_name'  => 'title',
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => 'Percentage',
					'param_name'  => 'percent',
					'description' => ''
				),
				array(
					'type'        => 'colorpicker',
					'admin_label' => true,
					'heading'     => 'Bar Color',
					'param_name'  => 'bar_color',
					'description' => ''
				),
				array(
					'type'        => 'colorpicker',
					'admin_label' => true,
					'heading'     => 'Inactive Bar Color',
					'param_name'  => 'inactive_bar_color',
					'description' => ''
				)
			)
		));
	}

	public function render($atts, $content = null) {
		$args = array(
			'title'              => '',
			'percent'            => '100',
			'bar_color'          => '',
			'inactive_bar_color' => ''
		);

		$params                      = shortcode_atts($args, $atts);
		$params['progress_bar_data'] = $this->getProgressBarData($params);
		$params['inactive_style']    = $this->getInactiveStyles($params);
		$params['active_style']      = $this->getActiveStyles($params);

		return voyage_mikado_get_shortcode_module_template_part('templates/vertical-progress-bar', 'vertical-progress-bar', '', $params);
	}

	private function getProgressBarData($params) {
		$data = array();

		if($params['percent'] !== '') {
			$data['data-percent'] = $params['percent'];
		}

		return $data;
	}

	private function getInactiveStyles($params) {
		$styles = array();

		if($params['inactive_bar_color'] !== '') {
			$styles[] = 'background-color: '.$params['inactive_bar_color'];
		}

		return $styles;
	}

	private function getActiveStyles($params) {
		$styles = array();

		if($params['bar_color'] !== '') {
			$styles[] = 'background-color: '.$params['bar_color'];
		}

		return $styles;
	}

}