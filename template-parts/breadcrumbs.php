<?php
/**
 * Template part for breadcrumbs.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Ocularis
 */

$breadcrumbs_visibillity = ocularis_theme()->customizer->get_value( 'breadcrumbs_visibillity' );

/**
 * [$breadcrumbs_visibillity description]
 * @var [type]
 */
$breadcrumbs_visibillity = apply_filters( 'ocularis-theme/breadcrumbs/breadcrumbs-visibillity', $breadcrumbs_visibillity );

if ( ! $breadcrumbs_visibillity ) {
	return;
}

$breadcrumbs_front_visibillity = ocularis_theme()->customizer->get_value( 'breadcrumbs_front_visibillity' );

if ( !$breadcrumbs_front_visibillity && is_front_page() ) {
	return;
}

do_action( 'ocularis-theme/breadcrumbs/breadcrumbs-before-render' );

?>
	<?php do_action( 'ocularis-theme/breadcrumbs/before' ); ?>
	<?php do_action( 'cx_breadcrumbs/render' ); ?>
	<?php do_action( 'ocularis-theme/breadcrumbs/after' ); ?>
<?php

do_action( 'ocularis-theme/breadcrumbs/breadcrumbs-after-render' );