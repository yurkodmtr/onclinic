<?php
/**
 * WooCommerce customizer options
 *
 * @package Ocularis
 */

if ( ! function_exists( 'ocularis_set_wc_dynamic_css_options' ) ) {

	/**
	 * Add dynamic WooCommerce styles
	 *
	 * @param $options
	 *
	 * @return mixed
	 */
	function ocularis_set_wc_dynamic_css_options( $options ) {

		array_push( $options['css_files'], get_theme_file_path( 'inc/modules/woo/assets/css/dynamic/woo-module-dynamic.css' ) );

		return $options;

	}

}
add_filter( 'ocularis-theme/dynamic_css/options', 'ocularis_set_wc_dynamic_css_options' );