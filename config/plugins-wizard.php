<?php
/**
 * Jet Plugins Wizard configuration.
 *
 * @package Onclinic
 */
$license = array(
	'enabled' => false,
);

/**
 * Plugins configuration
 *
 * @var array
 */
$plugins = array(
	'jet-data-importer' => array(
		'name'   => esc_html__( 'Jet Data Importer', 'onclinic' ),
		'source' => 'remote', // 'local', 'remote', 'wordpress' (default).
		'path'   => 'https://github.com/ZemezLab/jet-data-importer/archive/master.zip',
		'access' => 'base',
	),
	'elementor' => array(
		'name'   => esc_html__( 'Elementor Page Builder', 'onclinic' ),
		'access' => 'base',
	),
	'jet-blocks' => array(
		'name'   => esc_html__( 'Jet Blocks For Elementor', 'onclinic' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/jet-blocks.zip',
		'access' => 'base',
	),
	'jet-blog' => array(
		'name'   => esc_html__( 'Jet Blog For Elementor', 'onclinic' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/jet-blog.zip',
		'access' => 'base',
	),
	'jet-elements' => array(
		'name'   => esc_html__( 'Jet Elements For Elementor', 'onclinic' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/jet-elements.zip',
		'access' => 'base',
	),
	
	'jet-theme-core' => array(
		'name'   => esc_html__( 'Jet Theme Core', 'onclinic' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/jet-theme-core.zip',
		'access' => 'base',
	),
	'jet-tricks' => array(
		'name'   => esc_html__( 'Jet Tricks', 'onclinic' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/jet-tricks.zip',
		'access' => 'base',
	),
	'jet-tabs' => array(
		'name'   => esc_html__( 'Jet Tabs', 'onclinic' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/jet-tabs.zip',
		'access' => 'base',
	),
	'jet-menu' => array(
		'name'   => esc_html__( 'Jet Menu', 'onclinic' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/jet-menu.zip',
		'access' => 'base',
	),
	'revslider' => array(
		'name'   => esc_html__( 'Revolution Slider', 'onclinic' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/revslider.zip',
		'access' => 'base',
	),
	'contact-form-7' => array(
		'name'   => esc_html__( 'Contact Form 7', 'onclinic' ),
		'access' => 'skins',
	),
	'woocommerce' => array(
		'name'   => esc_html__( 'WooCommerce', 'onclinic' ),
		'access' => 'skins',
	),
	'jet-compare-wishlist' => array(
		'name'   => esc_html__( 'Jet Compare Wish List', 'onclinic' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/jet-compare-wishlist.zip',
		'access' => 'skins',
	),
	'jet-smart-filters' => array(
		'name'   => esc_html__( 'Jet Smart Filters', 'onclinic' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/jet-smart-filters.zip',
		'access' => 'skins',
	),
	'jet-woo-builder' => array(
		'name'   => esc_html__( 'Jet Woo Builder', 'onclinic' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/jet-woo-builder.zip',
		'access' => 'skins',
	),
	'jet-woo-product-gallery' => array(
		'name'   => esc_html__( 'Jet Woo Product Gallery', 'onclinic' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/jet-woo-product-gallery.zip',
		'access' => 'skins',
	),
	'essential-grid' => array(
		'name'   => esc_html__( 'Essential Grid', 'onclinic' ),
		'source' => 'remote',
		'path'   => 'http://monstroid.zemez.io/download/essential-grid.zip',
		'access' => 'base',
	),

);

/**
 * Skins configuration
 *
 * @var array
 */
$skins = array(
	'base' => array(
		'jet-data-importer',
		'elementor',

	),
	'advanced' => array(
		'onclinic' => array(
			'full'  => array(
				'jet-blocks',
				'jet-blog',
				'jet-elements',
				'jet-theme-core',
				'jet-tricks',
				'jet-tabs',
				'jet-menu',
				'revslider',
				'contact-form-7',
				'woocommerce',
				'jet-compare-wishlist',
				'jet-smart-filters',
				'jet-woo-builder',
				'jet-woo-product-gallery',
				'essential-grid',
			),
			'lite'  => false,
			'demo'  => 'https://ld-wp73.template-help.com/onclinic/onclinic',
			'thumb' => 'https://monstroid.zemez.io/download/tf/onclinic/default/default.png',
			'name'  => esc_html__( 'Onclinic', 'onclinic' ),
		),						
	),
);

$texts = array(
	'theme-name' => esc_html__( 'Onclinic', 'onclinic' ),
);

$config = array(
	'license' => $license,
	'plugins' => $plugins,
	'skins'   => $skins,
	'texts'   => $texts,
);
