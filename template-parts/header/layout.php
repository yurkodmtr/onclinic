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
    <div class="site-header__top">
        <?php onclinic_header_logo(); ?>
    </div>
    <div class="site-header__bottom">
        <?php onclinic_main_menu(); ?>
        <div class="site-header__bottom__right_part">
            <?php onclinic_social_list( 'header' ); ?>

            <?php onclinic_header_search_toggle(); ?>

            <?php if ( $visible_header_wc_cart ) :
                onclinic_wc_header_cart();
            endif; ?>
        </div>
    </div>
	<div class="space-between-content">



		<div <?php onclinic_site_branding_class(); ?>>
			<?php onclinic_site_description(); ?>
		</div>



		<?php onclinic_header_search_popup(); ?>
	</div>
	<?php do_action( 'onclinic-theme/header/after' ); ?>
</div>
