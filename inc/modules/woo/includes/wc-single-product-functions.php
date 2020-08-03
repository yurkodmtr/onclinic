<?php
/**
 * WooCommerce single product hooks.
 *
 * @package Ocularis
 */

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_show_product_sale_flash', 1 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15 );

add_action( 'woocommerce_before_single_product_summary', 'ocularis_single_product_row_open', 1 );
add_action( 'woocommerce_after_single_product_summary', 'ocularis_single_product_row_close', 5 );

add_action( 'woocommerce_before_single_product_summary', 'ocularis_single_product_images_column_open', 1 );
add_action( 'woocommerce_before_single_product_summary', 'ocularis_single_product_images_column_close', 30 );

add_action( 'woocommerce_before_single_product_summary', 'ocularis_single_product_content_column_open', 40 );
add_action( 'woocommerce_after_single_product_summary', 'ocularis_single_product_content_column_close', 1 );
add_filter( 'woocommerce_product_thumbnails_columns', 'ocularis_wc_product_thumbnails_columns' );

add_action( 'woocommerce_review_before_comment_text', 'ocularis_review_before_comment_text', 1 );
add_action( 'woocommerce_review_after_comment_text', 'ocularis_review_after_comment_text', 1 );


// Hide Tab Heading
add_filter( 'woocommerce_product_description_heading', '__return_null' );

if ( ! function_exists( 'ocularis_single_product_row_open' ) ) {

    /**
     * Content single product row open
     */
    function ocularis_single_product_row_open() {
        echo '<div class="row single_product_row">';
    }

}

if ( ! function_exists( 'ocularis_single_product_row_close' ) ) {

    /**
     * Content single product row open
     */
    function ocularis_single_product_row_close() {
        echo '</div>';
    }

}

if ( ! function_exists( 'ocularis_single_product_images_column_open' ) ) {

    /**
     * Content single product images column open
     */
    function ocularis_single_product_images_column_open() {
        echo '<div class="col-xs-12 col-md-6">';
    }

}

if ( ! function_exists( 'ocularis_single_product_images_column_close' ) ) {

    /**
     * Content single product images column close
     */
    function ocularis_single_product_images_column_close() {
        echo '</div>';
    }

}

if ( ! function_exists( 'ocularis_single_product_content_column_open' ) ) {

    /**
     * Content single product content column open
     */
    function ocularis_single_product_content_column_open() {
        echo '<div class="col-xs-12 col-md-6">';
    }

}

if ( ! function_exists( 'ocularis_single_product_content_column_close' ) ) {

    /**
     * Content single product content column close
     */
    function ocularis_single_product_content_column_close() {
        echo '</div>';
    }

}

if ( ! function_exists( 'ocularis_wc_product_thumbnails_columns' ) ) {

    /**
     * Return product thumbnails count
     *
     * @return int
     */
    function ocularis_wc_product_thumbnails_columns(){
        return 6;
    }

}

if ( ! function_exists( 'ocularis_review_before_comment_text' ) ) {
    function ocularis_review_before_comment_text() {
        echo '<div class="comment_author_row">';
    }
}

if ( ! function_exists( 'ocularis_review_after_comment_text' ) ) {
    function ocularis_review_after_comment_text() {
        echo '</div>';
    }
}