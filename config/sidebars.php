<?php
/**
 * Sidebars configuration.
 *
 * @package Ocularis
 */

add_action( 'after_setup_theme', 'ocularis_register_sidebars', 5 );
function ocularis_register_sidebars() {

	ocularis_widget_area()->widgets_settings = apply_filters( 'ocularis-theme/widget_area/default_settings', array(
		'sidebar' => array(
            'name'           => esc_html__( 'Sidebar', 'ocularis' ),
            'description'    => esc_html__( 'List of widgets to display on blog post pages', 'ocularis' ),
			'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'   => '</aside>',
			'before_title'   => '<h5 class="widget-title">',
			'after_title'    => '</h5>',
			'before_wrapper' => '<div id="%1$s" %2$s role="complementary">',
			'after_wrapper'  => '</div>',
			'is_global'      => true,
		),
		'sidebar-shop' => array(
            'name'           => esc_html__( 'Shop Sidebar', 'ocularis' ),
            'description'    => esc_html__( 'List of widgets to display on Shop pages', 'ocularis' ),
			'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'   => '</aside>',
			'before_title'   => '<h3 class="widget-title h6-style">',
			'after_title'    => '</h3>',
			'before_wrapper' => '<div id="%1$s" %2$s role="complementary">',
			'after_wrapper'  => '</div>',
			'is_global'      => true,
		)
	) );
}
