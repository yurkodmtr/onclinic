<?php
/**
 * The template for displaying the default header layout.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Onclinic
 */

$visible_header_wc_cart 	= onclinic_theme()->customizer->get_value( 'woo_header_cart_icon' ) && class_exists( 'WooCommerce' );
?>

<div <?php onclinic_header_class(); ?>>
	<?php do_action( 'onclinic-theme/header/before' ); ?>
	<div class="space-between-content">

		<?php onclinic_main_menu(); ?>

		<div <?php onclinic_site_branding_class(); ?>>
			<?php onclinic_header_logo(); ?>
			<?php onclinic_site_description(); ?>
		</div>

		<div class="site-header__right_part">
			<?php onclinic_social_list( 'header' ); ?>

			<?php onclinic_header_search_toggle(); ?>

			<?php if ( $visible_header_wc_cart ) :
				onclinic_wc_header_cart();
			endif; ?>
		</div>

		<?php onclinic_header_search_popup(); ?>
	</div>
	<?php do_action( 'onclinic-theme/header/after' ); ?>
</div>
