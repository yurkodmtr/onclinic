<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ocularis
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="profile" href="https://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	
<?php do_action( 'ocularis-theme/site/page-start' ); ?>
<?php ocularis_get_page_preloader(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ocularis' ); ?></a>
	<header id="masthead">
		<?php ocularis_theme()->do_location( 'header', 'template-parts/header' ); ?>
	</header><!-- #masthead -->
	<?php get_template_part( 'template-parts/breadcrumbs' ); ?>
	<div id="content" <?php echo ocularis_get_container_classes( 'site-content' ); ?>>
