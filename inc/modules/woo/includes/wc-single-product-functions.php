<?php
/**
 * WooCommerce single product hooks.
 *
 * @package Onclinic
 */

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 1 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15 );

add_action( 'woocommerce_before_single_product_summary', 'onclinic_single_product_row_open', 1 );
add_action( 'woocommerce_after_single_product_summary', 'onclinic_single_product_row_close', 10 );

add_action( 'woocommerce_before_single_product_summary', 'onclinic_single_product_images_column_open', 1 );
add_action( 'woocommerce_before_single_product_summary', 'onclinic_single_product_images_column_close', 30 );

add_action( 'woocommerce_before_single_product_summary', 'onclinic_single_product_content_column_open', 40 );
add_action( 'woocommerce_after_single_product_summary', 'onclinic_single_product_content_column_close', 10 );
add_filter( 'woocommerce_product_thumbnails_columns', 'onclinic_wc_product_thumbnails_columns' );

/* Product Single Sharing */
add_action('woocommerce_share','onclinic_woo_single_sharing');


if ( ! function_exists( 'onclinic_single_product_row_open' ) ) {

	/**
	 * Content single product row open
	 */
	function onclinic_single_product_row_open() {
		echo '<div class="row">';
	}

}

if ( ! function_exists( 'onclinic_single_product_row_close' ) ) {

	/**
	 * Content single product row open
	 */
	function onclinic_single_product_row_close() {
		echo '</div>';
	}

}

if ( ! function_exists( 'onclinic_single_product_images_column_open' ) ) {

	/**
	 * Content single product images column open
	 */
	function onclinic_single_product_images_column_open() {
		echo '<div class="col-sm-12 col-md-6 col-lg-5 product-gallery__wrap">';
	}

}

if ( ! function_exists( 'onclinic_single_product_images_column_close' ) ) {

	/**
	 * Content single product images column close
	 */
	function onclinic_single_product_images_column_close() {
		echo '</div>';
	}

}

if ( ! function_exists( 'onclinic_single_product_content_column_open' ) ) {

	/**
	 * Content single product content column open
	 */
	function onclinic_single_product_content_column_open() {
		echo '<div class="col-sm-12 col-md-6 col-lg-6 product-summary__wrap">';
	}

}

if ( ! function_exists( 'onclinic_single_product_content_column_close' ) ) {

	/**
	 * Content single product content column close
	 */
	function onclinic_single_product_content_column_close() {
		echo '</div>';
	}

}

if ( ! function_exists( 'onclinic_wc_product_thumbnails_columns' ) ) {

	/**
	 * Return product thumbnails count
	 *
	 * @return int
	 */
	function onclinic_wc_product_thumbnails_columns(){
		return 6;
	}

}

if ( ! function_exists( 'onclinic_woo_single_sharing' ) ) {

	/**
	 * Product Single Sharing
	 */
	function onclinic_woo_single_sharing(){
		
		global $post;

		$product_sharing = onclinic_theme()->customizer->get_value( 'single_product_sharing' );

		if ( ! $product_sharing ) {
			return;
		}

		$featured_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), false, '' );

		$title 		= get_the_title();
		$permalink 	= get_permalink();
		$email_url 	= 'mailto:?subject=' . rawurlencode( $title ) . '&body=' . $permalink;
	?>
		
		<div class="product_sharing">
				
			<a class="product_sharing_link facebook" href="http://www.facebook.com/sharer.php?u=<?php echo esc_url( $permalink ); ?>&t=<?php echo str_replace(' ', '+', the_title('', '', false)); ?>" title="<?php esc_html_e( 'Facebook', 'onclinic') ?>" onclick="javascript:window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><?php echo onclinic_get_icon_svg( 'facebook' ); ?></a>
				
			<a class="product_sharing_link twitter" href="http://twitter.com/home?status=<?php echo str_replace(' ', '+', the_title('', '', false)); ?> <?php echo esc_url( $permalink ); ?>" title="<?php esc_html_e( 'Twitter', 'onclinic') ?>" onclick="javascript:window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><?php echo onclinic_get_icon_svg( 'twitter' ); ?></a>
				

			<a class="product_sharing_link pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo esc_url( $permalink ); ?>&media=<?php echo ( strlen( $featured_image_url[0]) > 0 ) ? $featured_image_url[0] : get_option( 'onclinic_logo' ); ?>" onclick="javascript:window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><?php echo onclinic_get_icon_svg( 'pinterest' ); ?></a>
			
			<a href="<?php echo esc_url( $email_url ); ?>"><?php echo onclinic_get_icon_svg( 'email' ); ?></a>

		</div>
		
	<?php
	}
}