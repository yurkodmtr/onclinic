<?php
/**
 * Menus configuration.
 *
 * @package Ocularis
 */

add_action( 'after_setup_theme', 'ocularis_register_menus', 5 );
function ocularis_register_menus() {

	register_nav_menus( array(
		'main'   => esc_html__( 'Main', 'ocularis' ),
		'footer' => esc_html__( 'Footer', 'ocularis' ),
	) );
}
