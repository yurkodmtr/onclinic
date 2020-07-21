<?php
/**
 * Extends basic functionality for better WooCommerce compatibility
 *
 * @package Onclinic
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function onclinic_wc_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}

add_action( 'after_setup_theme', 'onclinic_wc_setup' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 *
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function onclinic_wc_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}

add_filter( 'body_class', 'onclinic_wc_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 *
 * @return array $args related products args.
 */
function onclinic_wc_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 4,
		'columns'        => 4,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}

add_filter( 'woocommerce_output_related_products_args', 'onclinic_wc_related_products_args' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'onclinic_wc_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function onclinic_wc_wrapper_before() {
		?>
			<div <?php onclinic_get_single_product_container_classes() ?>>
			<div class="row">
			<div id="primary" <?php onclinic_primary_content_class(); ?>>
			<main id="main" class="site-main">
		<?php
	}
}

/**
 * Single product layout classes.
 */
if ( ! function_exists( 'onclinic_get_single_product_container_classes' ) ) {
	function onclinic_get_single_product_container_classes( $classes = null, $fullwidth = false ) {
		
		if ( $classes ) {
			$classes .= ' ';
		}
		
		$classes .= 'site-content__wrap ';
			
		echo 'class="' . apply_filters( 'onclinic-theme/site-content/content-classes', $classes ) . '"';
	}
}

add_action( 'woocommerce_before_main_content', 'onclinic_wc_wrapper_before' );

if ( ! function_exists( 'onclinic_wc_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
function onclinic_wc_wrapper_after() {
	?>
	</main><!-- #main -->
	</div><!-- #primary -->
	<?php
}
}
add_action( 'woocommerce_after_main_content', 'onclinic_wc_wrapper_after' );


if ( ! function_exists( 'onclinic_wc_sidebar_after' ) ) {
	/**
	 * Close tags after sidebar
	 */
	function onclinic_wc_sidebar_after() {
		?>
			</div>
			</div>
		<?php
	}
}
add_action( 'woocommerce_sidebar', 'onclinic_wc_sidebar_after', 99 );

if ( ! function_exists( 'onclinic_wc_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 *
	 * @return array Fragments to refresh via AJAX.
	 */
	function onclinic_wc_cart_link_fragment( $fragments ) {
		ob_start();
		onclinic_wc_cart_link();
		$fragments['a.header-cart__link'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'add_to_cart_fragments', 'onclinic_wc_cart_link_fragment' );

if ( ! function_exists( 'onclinic_wc_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function onclinic_wc_cart_link() {
		?>
			<a class="header-cart__link" href="#" title="<?php esc_attr_e( 'View your shopping cart', 'onclinic' ); ?>">
		  <?php
		  $item_count_text = sprintf(
		  /* translators: number of items in the mini cart. */
			  esc_html__( '%d', 'onclinic' ),
			  WC()->cart->get_cart_contents_count()
		  );

		  ?>
				<span class="header-cart__link-count"><?php echo esc_html( $item_count_text ); ?></span>
				<?php echo onclinic_get_icon_svg( 'cart' ); ?>
			</a>
		<?php
	}
}

if ( ! function_exists( 'onclinic_wc_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function onclinic_wc_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
			<div class="header-cart">
				<div class="header-cart__link-wrap <?php echo esc_attr( $class ); ?>">
			        <?php onclinic_wc_cart_link(); ?>
				</div>
				<div class="header-cart__content">
                    <?php
                    $instance = array( 'title' => esc_html__( 'My cart', 'onclinic' ) );
                    the_widget( 'WC_Widget_Cart', $instance );
                    ?>
				</div>
			</div>
		<?php
	}
}

if ( ! function_exists( 'onclinic_wc_pagination' ) ) {

	/**
	 * WooCommerce pagination
	 *
	 * @param $args
	 *
	 * @return mixed
	 */
	function onclinic_wc_pagination( $args ) {
		$args['prev_text'] = sprintf( '
		<span class="nav-icon icon-prev"></span><span>%1$s</span>',
			esc_html__( 'Prev', 'onclinic' ) );

		$args['next_text'] = sprintf( '
		<span>%1$s</span><span class="nav-icon icon-next"></span>',
			esc_html__( 'Next', 'onclinic' ) );

		return $args;
	}

}
add_filter( 'woocommerce_pagination_args', 'onclinic_wc_pagination' );

if ( ! function_exists( 'onclinic_init_wc_properties' ) ) {

	/**
	 * Init shop properties
	 */
	function onclinic_init_wc_properties() {

		// Sidebar properties for archive product
		if ( ( is_shop() || is_product_taxonomy() ) && ! is_singular( 'product' ) ) {
			if ( is_active_sidebar( 'sidebar-shop' ) ) {
				onclinic_theme()->sidebar_position = 'one-left-sidebar';
			} else {
				onclinic_theme()->sidebar_position = 'none';
			}
		}

	}

}
add_action( 'wp_head', 'onclinic_init_wc_properties', 2 );

/*
 *
 * Removes products count after categories name
 * 
 */
add_filter( 'woocommerce_subcategory_count_html', 'onclinic_woo_remove_category_products_count' );

function onclinic_woo_remove_category_products_count() {
	return;
}

if ( ! function_exists( 'onclinic_woo_add_category_description' ) ) {

	/**
	 * WooCommerce Description for Categories List Page
	 */
	function onclinic_woo_add_category_description ($category) {
		
		$cat_id 		= $category->term_id;
		$prod_term 		= get_term( $cat_id,'product_cat' );
		$description 	= $prod_term->description;

		if ( $category->count > 0 ) {
			$category_count = sprintf(
				'%1$s %2$s',
				esc_html( $category->count ),
				esc_html__( 'Products', 'onclinic' )
			);

		}


		$output = sprintf(
			'<div class="woocommerce-loop-category__description">%1$s</div><div class="entry-meta">%2$s</div>',
				esc_html( $description ),
				esc_html( $category_count )
		);

		echo wp_kses_post( $output );

	}

}
add_action( 'woocommerce_after_subcategory_title', 'onclinic_woo_add_category_description', 12);

if ( ! function_exists( 'onclinic_woo_custom_sale_text' ) ) {
	/**
	 * Remove the parentheses from the category widget.
	 */
	
	function onclinic_woo_custom_sale_text($text, $post, $_product) {
    	return '<span class="onsale">' . esc_html( 'Sale', 'onclinic' ) . '</span>';
	}
}
add_filter('woocommerce_sale_flash', 'onclinic_woo_custom_sale_text', 10, 3);
