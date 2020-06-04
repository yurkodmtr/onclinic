<?php
/**
 * Menus configuration.
 *
 * @package Onclinic
 */

add_action( 'after_setup_theme', 'onclinic_register_menus', 5 );
function onclinic_register_menus() {

	register_nav_menus( array(
		'main'   => esc_html__( 'Main', 'onclinic' ),
		'footer' => esc_html__( 'Footer', 'onclinic' ),
		'social' => esc_html__( 'Social', 'onclinic' ),
	) );
}
