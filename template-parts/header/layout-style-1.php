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
                        <?php onclinic_header_addres() ;?>
                        <div class="address">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 0C4.58881 0 1 3.44722 1 7.68442C1 9.47986 1.64439 11.1333 2.72263 12.4429L6.28085 16.7401C7.67183 18.42 10.3282 18.42 11.7191 16.7401L15.2774 12.4429C16.3556 11.1333 17 9.47986 17 7.68442C17 3.44722 13.4112 0 9 0ZM9 11.0409C7.0144 11.0409 5.39899 9.48922 5.39899 7.58194C5.39899 5.67466 7.0144 4.12296 9 4.12296C10.9856 4.12296 12.601 5.67466 12.601 7.58194C12.601 9.48922 10.9856 11.0409 9 11.0409Z" fill="#89CCF7"/>
                            </svg>
                            670 Lafayette Ave, Brooklyn, NY 11216
                        </div>
                        <div class="phone">
                            <span class="phone__text">
                                Have questions?
                            </span>
                                <span class="phone__number">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip01)">
                                    <path d="M4.69223 13.4304C8.35635 16.9385 12.8158 17.794 15.5339 17.995C16.8023 18.0887 18.0001 16.8559 18 15.58L17.9998 13.7451C17.9998 12.8857 17.4541 12.1217 16.6428 11.8454L13.5751 10.8006C12.9871 10.6003 12.3397 10.6854 11.823 11.0308L11.3721 11.3323C10.7965 11.7171 10.0543 11.7905 9.46726 11.4237C8.90849 11.0746 8.38727 10.6613 7.91638 10.1968C7.4071 9.69431 6.94147 9.11658 6.55586 8.5C6.18834 7.91237 6.26097 7.16819 6.64459 6.591L6.94924 6.13264C7.29141 5.6178 7.37764 4.97337 7.18292 4.38623L6.18358 1.37298C5.91168 0.553143 5.14712 1.71111e-06 4.28583 1.17539e-06L2.39616 0C1.20426 -7.41365e-07 0.00517616 1.03485 0.000144684 2.23052C-0.01115 4.91456 0.630996 9.54209 4.69223 13.4304Z" fill="#89CCF7"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip01">
                                    <rect width="18" height="18" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                                (123) 456-7890
                            </span>
                        </div>
                        <div class="header__btn">
                            <a href="#">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.386719 14.4253L8.4375 17V3.48717L0.738281 1.03029C0.65625 0.996634 0.568359 0.991025 0.474609 1.01346C0.392578 1.02468 0.310547 1.05273 0.228516 1.0976C0.158203 1.1537 0.0996094 1.22101 0.0527344 1.29954C0.0175781 1.36685 0 1.44538 0 1.53513V13.9205C0 14.0327 0.0351562 14.1393 0.105469 14.2402C0.175781 14.33 0.269531 14.3917 0.386719 14.4253ZM17.7715 1.0976C17.6895 1.05273 17.6016 1.02468 17.5078 1.01346C17.4258 0.991025 17.3438 0.996634 17.2617 1.03029L9.5625 3.48717V17L17.6133 14.4253C17.7305 14.3917 17.8242 14.33 17.8945 14.2402C17.9648 14.1393 18 14.0327 18 13.9205V1.53513C18 1.44538 17.9766 1.36685 17.9297 1.29954C17.8945 1.22101 17.8418 1.1537 17.7715 1.0976Z" fill="white"/>
                                </svg>
                                Book an Appointment
                            </a>
                        </div>
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
    <div class="reheader__mobile">
        <div class="reheader__mobile__top">
            <div class="reheader__mobile__wrapper">
                <div class="address">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 0C4.58881 0 1 3.44722 1 7.68442C1 9.47986 1.64439 11.1333 2.72263 12.4429L6.28085 16.7401C7.67183 18.42 10.3282 18.42 11.7191 16.7401L15.2774 12.4429C16.3556 11.1333 17 9.47986 17 7.68442C17 3.44722 13.4112 0 9 0ZM9 11.0409C7.0144 11.0409 5.39899 9.48922 5.39899 7.58194C5.39899 5.67466 7.0144 4.12296 9 4.12296C10.9856 4.12296 12.601 5.67466 12.601 7.58194C12.601 9.48922 10.9856 11.0409 9 11.0409Z" fill="#89CCF7"/>
                    </svg>
                    670 Lafayette Ave, Brooklyn, NY 11216
                </div>
                <div class="phone">
                            <span class="phone__text">
                                Have questions?
                            </span>
                    <span class="phone__number">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip01)">
                                    <path d="M4.69223 13.4304C8.35635 16.9385 12.8158 17.794 15.5339 17.995C16.8023 18.0887 18.0001 16.8559 18 15.58L17.9998 13.7451C17.9998 12.8857 17.4541 12.1217 16.6428 11.8454L13.5751 10.8006C12.9871 10.6003 12.3397 10.6854 11.823 11.0308L11.3721 11.3323C10.7965 11.7171 10.0543 11.7905 9.46726 11.4237C8.90849 11.0746 8.38727 10.6613 7.91638 10.1968C7.4071 9.69431 6.94147 9.11658 6.55586 8.5C6.18834 7.91237 6.26097 7.16819 6.64459 6.591L6.94924 6.13264C7.29141 5.6178 7.37764 4.97337 7.18292 4.38623L6.18358 1.37298C5.91168 0.553143 5.14712 1.71111e-06 4.28583 1.17539e-06L2.39616 0C1.20426 -7.41365e-07 0.00517616 1.03485 0.000144684 2.23052C-0.01115 4.91456 0.630996 9.54209 4.69223 13.4304Z" fill="#89CCF7"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip01">
                                    <rect width="18" height="18" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                                (123) 456-7890
                            </span>
                </div>
                <div class="header__btn">
                    <a href="#">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.386719 14.4253L8.4375 17V3.48717L0.738281 1.03029C0.65625 0.996634 0.568359 0.991025 0.474609 1.01346C0.392578 1.02468 0.310547 1.05273 0.228516 1.0976C0.158203 1.1537 0.0996094 1.22101 0.0527344 1.29954C0.0175781 1.36685 0 1.44538 0 1.53513V13.9205C0 14.0327 0.0351562 14.1393 0.105469 14.2402C0.175781 14.33 0.269531 14.3917 0.386719 14.4253ZM17.7715 1.0976C17.6895 1.05273 17.6016 1.02468 17.5078 1.01346C17.4258 0.991025 17.3438 0.996634 17.2617 1.03029L9.5625 3.48717V17L17.6133 14.4253C17.7305 14.3917 17.8242 14.33 17.8945 14.2402C17.9648 14.1393 18 14.0327 18 13.9205V1.53513C18 1.44538 17.9766 1.36685 17.9297 1.29954C17.8945 1.22101 17.8418 1.1537 17.7715 1.0976Z" fill="white"/>
                        </svg>
                        Book an Appointment
                    </a>
                </div>
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
                    <?php onclinic_header_logo(); ?>
                    <div class="right_side">
                        <?php onclinic_header_search_toggle('search_black'); ?>
                        <?php if ( $visible_header_wc_cart ) :
                            onclinic_wc_header_cart();
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-menu-mobile">
        <div class="main-menu-mobile__wrap">
            <button class="main-menu-mobile__close">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.34855 9L0 1.65145L1.65145 0L9 7.34855L16.3485 0L18 1.65145L10.6515 9L18 16.3485L16.3485 18L9 10.6515L1.65145 18L0 16.3485L7.34855 9Z" fill="#1E306E"/>
                </svg>
            </button>
            <?php onclinic_main_menu_mobile(); ?>
        </div>
    </div>
    <?php onclinic_header_search_popup(); ?>
</div>

<div <?php onclinic_header_class(); ?> style="display: none;">
    <?php do_action( 'onclinic-theme/header/before' ); ?>
    <div class="space-between-content">

        <?php onclinic_main_menu(); ?>

        <div <?php onclinic_site_branding_class(); ?>>
            <?php onclinic_header_logo(); ?>
            <?php onclinic_site_description(); ?>
        </div>

        <div class="site-header__right_part">
            <?php onclinic_social_list( 'header' ); ?>



            <?php if ( $visible_header_wc_cart ) :
                onclinic_wc_header_cart();
            endif; ?>
        </div>


    </div>
    <?php do_action( 'onclinic-theme/header/after' ); ?>
</div>
