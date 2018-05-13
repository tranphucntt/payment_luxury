<?php

if(!function_exists('voyage_mikado_map_content_bottom_meta_box')) {
	/**
	 * Maps content bottom meta box
	 */
	function voyage_mikado_map_content_bottom_meta_box() {
		$content_bottom_meta_box = voyage_mikado_add_meta_box(
			array(
				'scope' => array('page', 'post'),
				'title' => 'Content Bottom',
				'name'  => 'content_bottom_meta'
			)
		);

		voyage_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_enable_content_bottom_area_meta',
				'type'          => 'selectblank',
				'default_value' => '',
				'label'         => 'Enable Content Bottom Area',
				'description'   => 'This option will enable Content Bottom area on pages',
				'parent'        => $content_bottom_meta_box,
				'options'       => array(
					'no'  => 'No',
					'yes' => 'Yes'
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''   => '#mkdf_mkdf_show_content_bottom_meta_container',
						'no' => '#mkdf_mkdf_show_content_bottom_meta_container'
					),
					'show'       => array(
						'yes' => '#mkdf_mkdf_show_content_bottom_meta_container'
					)
				)
			)
		);

		$show_content_bottom_meta_container = voyage_mikado_add_admin_container(
			array(
				'parent'          => $content_bottom_meta_box,
				'name'            => 'mkdf_show_content_bottom_meta_container',
				'hidden_property' => 'mkdf_enable_content_bottom_area_meta',
				'hidden_value'    => '',
				'hidden_values'   => array('', 'no')
			)
		);

		voyage_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_content_bottom_sidebar_custom_display_meta',
				'type'          => 'selectblank',
				'default_value' => '',
				'label'         => 'Sidebar to Display',
				'description'   => 'Choose a Content Bottom sidebar to display',
				'options'       => voyage_mikado_get_custom_sidebars(),
				'parent'        => $show_content_bottom_meta_container
			)
		);

		voyage_mikado_add_meta_box_field(
			array(
				'type'          => 'selectblank',
				'name'          => 'mkdf_content_bottom_in_grid_meta',
				'default_value' => '',
				'label'         => 'Display in Grid',
				'description'   => 'Enabling this option will place Content Bottom in grid',
				'options'       => array(
					'no'  => 'No',
					'yes' => 'Yes'
				),
				'parent'        => $show_content_bottom_meta_container
			)
		);

		voyage_mikado_add_meta_box_field(
			array(
				'type'          => 'color',
				'name'          => 'mkdf_content_bottom_background_color_meta',
				'default_value' => '',
				'label'         => 'Background Color',
				'description'   => 'Choose a background color for Content Bottom area',
				'parent'        => $show_content_bottom_meta_container
			)
		);
	}

	add_action('voyage_mikado_meta_boxes_map', 'voyage_mikado_map_content_bottom_meta_box');
}