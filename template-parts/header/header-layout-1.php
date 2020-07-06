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

<div <?php onclinic_header_class(); ?> >
    <div class="reheader__desktop">
        <div class="reheader__desktop__top">
            <div class="container">
                <div class="reheader__desktop__top__wrap">
                    <?php onclinic_header_logo(); ?>
                    <div class="right_side">
                        <div class="reheader__desktop__info">
                            <?php onclinic_header_address(); ?>
                            <?php onclinic_header_phone(); ?>
                        </div>
                        <?php onclinic_header_button(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="reheader__desktop__bottom">
            <div class="container">
                <div class="reheader__desktop__bottom__wrap">
                    <?php onclinic_main_menu(); ?>
                    <div class="right_site">
                        <?php onclinic_header_search_toggle(); ?>
                        <?php if ( $visible_header_wc_cart ) :
                            onclinic_wc_header_cart();
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php get_template_part( 'template-parts/header/header_mobile' ); ?>
    <?php get_template_part( 'template-parts/header/menu_mobile' ); ?>
    <?php onclinic_header_search_popup(); ?>
</div>
