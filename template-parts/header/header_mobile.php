<?php
$visible_header_wc_cart 	= ocularis_theme()->customizer->get_value( 'woo_header_cart_icon' ) && class_exists( 'WooCommerce' );
?>

<div class="reheader__mobile">
        <div class="reheader__mobile__top">
            <div class="reheader__mobile__wrapper">
                <?php ocularis_header_address(); ?>
                <?php ocularis_header_phone(); ?>
                <?php ocularis_header_button(); ?>
            </div>
        </div>
        <div class="reheader__mobile__bottom">
            <div class="reheader__mobile__wrapper">
                <div class="reheader__mobile__bottom__wrap">
                    <div class="menu_toggle">
                        <button class="menu_toggle_btn">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect y="2" width="18" height="4" rx="2" fill="#1E306E"/>
                                <rect y="12" width="18" height="4" rx="2" fill="#1E306E"/>
                            </svg>
                        </button>
                    </div>
                    <?php ocularis_header_logo(); ?>
                    <div class="right_side">
                        <?php ocularis_header_search_toggle('search_black'); ?>
                        <?php if ( $visible_header_wc_cart ) :
                            ocularis_wc_header_cart();
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

