<?php

if(!function_exists('voyage_mikado_get_footer_classes')) {
	/**
	 * Return all footer classes
	 *
	 * @param $page_id
	 *
	 * @return string|void
	 */
	function voyage_mikado_get_footer_classes($page_id) {

		$footer_classes       = '';
		$footer_classes_array = array('mkdf-page-footer');

		//is uncovering footer option set in theme options?
		if(voyage_mikado_options()->getOptionValue('uncovering_footer') == 'yes') {
			$footer_classes_array[] = 'mkdf-footer-uncover';
		}

		if(get_post_meta($page_id, 'mkdf_disable_footer_meta', true) == 'yes') {
			$footer_classes_array[] = 'mkdf-disable-footer';
		}

		//is some class added to footer classes array?
		if(is_array($footer_classes_array) && count($footer_classes_array)) {
			//concat all classes and prefix it with class attribute
			$footer_classes = esc_attr(implode(' ', $footer_classes_array));
		}

		return $footer_classes;

	}

}

if(!function_exists('voyage_mikado_get_footer_top_border')) {
	/**
	 * Return HTML for footer top border
	 *
	 * @return string
	 */
	function voyage_mikado_get_footer_top_border() {

		$footer_top_border = '';

		if(voyage_mikado_options()->getOptionValue('footer_top_border_color')) {
			if(voyage_mikado_options()->getOptionValue('footer_top_border_width') !== '') {
				$footer_border_height = voyage_mikado_options()->getOptionValue('footer_top_border_width');
			} else {
				$footer_border_height = '1';
			}

			$footer_top_border = 'height: '.esc_attr($footer_border_height).'px; background-color: '.esc_attr(voyage_mikado_options()->getOptionValue('footer_top_border_color')).';';
		}

		return $footer_top_border;
	}
}

if(!function_exists('voyage_mikado_get_footer_bottom_border')) {
	/**
	 * Return HTML for footer bottom border top
	 *
	 * @return string
	 */
	function voyage_mikado_get_footer_bottom_border() {

		$footer_bottom_border = '';

		if(voyage_mikado_options()->getOptionValue('footer_bottom_border_color')) {
			if(voyage_mikado_options()->getOptionValue('footer_bottom_border_width') !== '') {
				$footer_border_height = voyage_mikado_options()->getOptionValue('footer_bottom_border_width');
			} else {
				$footer_border_height = '1';
			}

			$footer_bottom_border = 'height: '.esc_attr($footer_border_height).'px; background-color: '.esc_attr(voyage_mikado_options()->getOptionValue('footer_bottom_border_color')).';';
		}

		return $footer_bottom_border;
	}
}


if(!function_exists('voyage_mikado_get_footer_bottom_bottom_border')) {
	/**
	 * Return HTML for footer bottom border bottom
	 *
	 * @return string
	 */
	function voyage_mikado_get_footer_bottom_bottom_border() {

		$footer_bottom_border = '';

		if(voyage_mikado_options()->getOptionValue('footer_bottom_border_bottom_color')) {
			if(voyage_mikado_options()->getOptionValue('footer_bottom_border_bottom_width') !== '') {
				$footer_border_height = voyage_mikado_options()->getOptionValue('footer_bottom_border_bottom_width');
			} else {
				$footer_border_height = '1';
			}

			$footer_bottom_border = 'height: '.esc_attr($footer_border_height).'px; background-color: '.esc_attr(voyage_mikado_options()->getOptionValue('footer_bottom_border_bottom_color')).';';
		}

		return $footer_bottom_border;
	}
}

if(!function_exists('voyage_mikado_footer_top_classes')) {
	/**
	 * Return classes for footer top
	 *
	 * @return string
	 */
	function voyage_mikado_footer_top_classes() {

		$footer_top_classes = array();

		if(voyage_mikado_options()->getOptionValue('footer_in_grid') != 'yes') {
			$footer_top_classes[] = 'mkdf-footer-top-full';
		}

		//footer aligment
		if(voyage_mikado_options()->getOptionValue('footer_top_columns_alignment') != '') {
			$footer_top_classes[] = 'mkdf-footer-top-aligment-'.voyage_mikado_options()->getOptionValue('footer_top_columns_alignment');
		}


		return implode(' ', $footer_top_classes);
	}

}