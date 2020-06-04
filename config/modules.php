<?php
/**
 * Modules configuration
 *
 * Allowed to rewrite in child theme.
 *
 * Format:
 * associative array.
 * keys - module name to load,
 * values - array of child modules for this module. If module has no childs - just an empty array
 */

if ( ! function_exists( 'onclinic_get_allowed_modules' ) ) {
	function onclinic_get_allowed_modules() {
		return apply_filters( 'onclinic-theme/allowed-modules', array(
			'blog-layouts' => array(),
			'woo'          => array(
				'woo-breadcrumbs' => array()
			),
		) );
	}
}