<?php
/**
 * Theme Breadcrumbs.
 *
 * @package Ocularis
 */

/**
 * Retrieve a holder for breadcrumbs options.
 *
 * @since  1.0.0
 * @return array
 */

function ocularis_get_breadcrumbs_options() {
	/**
	 * Filter a holder for breadcrumbs options.
	 *
	 * @since 1.0.0
	 */

	return apply_filters( 'ocularis-theme/breadcrumbs/options' , array(
		'wrapper_format'    => '<div class="container"><div class="row"><div class="breadcrumbs_items">%2$s</div></div></div>',
		'separator'         => '&#62;',
		'show_browse'       => false,
		'show_on_front'     => ocularis_theme()->customizer->get_value( 'breadcrumbs_front_visibillity' ),
		'show_title'        => false,
		'path_type'         => ocularis_theme()->customizer->get_value( 'breadcrumbs_path_type' ),
		'css_namespace'     => array(
			'module'    => 'breadcrumbs',
			'content'   => 'breadcrumbs_content',
			'wrap'      => 'breadcrumbs_wrap',
			'browse'    => 'breadcrumbs_browse',
			'item'      => 'breadcrumbs_item',
			'separator' => 'breadcrumbs_item_sep',
			'link'      => 'breadcrumbs_item_link',
			'target'    => 'breadcrumbs_item_target',
		),
	) );
}

