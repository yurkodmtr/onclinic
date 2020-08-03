<?php
/**
 * The template for displaying the default header layout.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ocularis
 */

$visible_header_wc_cart 	= ocularis_theme()->customizer->get_value( 'woo_header_cart_icon' ) && class_exists( 'WooCommerce' );
?>

<div <?php ocularis_header_class(); ?> >
    <div class="reheader__desktop">
        <div class="reheader__desktop__top">
            <div class="container">
                <div class="reheader__desktop__top__wrap">
                    <?php ocularis_header_address(); ?>
                    <?php ocularis_header_logo(); ?>
                    <div class="right_side">
                        <?php ocularis_header_phone(); ?>
                        <?php ocularis_header_search_toggle(); ?>
                        <?php if ( $visible_header_wc_cart ) :
                            ocularis_wc_header_cart();
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="reheader__desktop__bottom">
            <div class="container">
                <div class="reheader__desktop__bottom__wrap">
                    <?php ocularis_main_menu(); ?>
                    <?php ocularis_header_button(); ?>
                </div>
            </div>
        </div>
    </div>
    <?php get_template_part( 'template-parts/header/header_mobile' ); ?>
    <?php get_template_part( 'template-parts/header/menu_mobile' ); ?>
    <?php ocularis_header_search_popup(); ?>
</div>
