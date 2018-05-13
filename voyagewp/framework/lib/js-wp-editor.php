<?php
/*
 *	JavaScript Wordpress editor
 *	Author: 		Ante Primorac
 *	Author URI: 	http://anteprimorac.from.hr
 *	Version: 		1.1
 *	License:
 *		Copyright (c) 2013 Ante Primorac
 *		Permission is hereby granted, free of charge, to any person obtaining a copy
 *		of this software and associated documentation files (the "Software"), to deal
 *		in the Software without restriction, including without limitation the rights
 *		to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *		copies of the Software, and to permit persons to whom the Software is
 *		furnished to do so, subject to the following conditions:
 *
 *		The above copyright notice and this permission notice shall be included in
 *		all copies or substantial portions of the Software.
 *
 *		THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *		IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *		FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *		AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *		LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *		OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 *		THE SOFTWARE.
 *	Usage:
 *		server side(WP):
 *			js_wp_editor( $settings );
 *		client side(jQuery):
 *			$('textarea').wp_editor( options );
 */

function js_wp_editor() {
	if ( ! class_exists( '_WP_Editors' ) )
		require( ABSPATH . WPINC . '/class-wp-editor.php' );
	$set = _WP_Editors::parse_settings( 'mkdf_editor_id', array() );

	if ( !current_user_can( 'upload_files' ) )
		$set['media_buttons'] = false;

	if ( $set['media_buttons'] ) {
		wp_enqueue_script( 'thickbox' );
		wp_enqueue_style( 'thickbox' );
		wp_enqueue_script('media-upload');

		$post = get_post();
		if ( ! $post && ! empty( $GLOBALS['post_ID'] ) )
			$post = $GLOBALS['post_ID'];

		wp_enqueue_media( array(
			'post' => $post
		) );
	}

	_WP_Editors::editor_settings( 'mkdf_editor_id', $set );

	$mkdf_wp_editor_vars = array(
		'url' => get_home_url(),
		'includes_url' => includes_url()
	);

	wp_localize_script( 'js-wp-editor', 'mkdf_wp_editor_vars', $mkdf_wp_editor_vars );

}