<?php
/**
 * Thumbnails configuration.
 *
 * @package onclinic
 */

add_action( 'after_setup_theme', 'onclinic_register_image_sizes', 5 );
/**
 * Register image sizes.
 */
function onclinic_register_image_sizes() {
	set_post_thumbnail_size( 370, 260, true );

	// Registers a new image sizes.
	add_image_size( 'onclinic-thumb-m', 370, 280, true );
	
	add_image_size( 'onclinic-thumb-listing', 540, 9999 );   // Posts default listing
	add_image_size( 'onclinic-thumb-listing2', 420, 9999 );   // Posts default listing with sidebar

	add_image_size( 'onclinic-thumb-grid-3col', 420, 9999 );   // default Posts Grid 3 Columns
	add_image_size( 'onclinic-thumb-grid-2col', 660, 9999 );   // default Posts Grid 2 Columns
	add_image_size( 'onclinic-thumb-grid-2col-sidebar', 480, 9999 );   // default Posts Grid 2 Columns with Sidebar

	add_image_size( 'onclinic-thumb-related', 420, 9999 ); // Related Posts
	add_image_size( 'onclinic-thumb-related2', 660, 9999 ); // Related Posts
	
	add_image_size( 'onclinic-thumb-search-result', 180, 240, true ); // Search Result Page

	add_image_size( 'onclinic-thumb-wishlist', 60, 91, true ); // Wishlist
	add_image_size( 'onclinic-thumb-listing-line-product', 420, 560, true ); // Woo
}
