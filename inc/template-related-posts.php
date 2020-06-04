<?php
/**
 * Related Posts Template Functions.
 *
 * @package Onclinic
 */

/**
 * Print HTML with related posts block.
 *
 * @since  1.0.0
 * @return array
 */
function onclinic_related_posts() {

	if ( ! is_singular( 'post' ) ) {
		return;
	}

	$visible = onclinic_theme()->customizer->get_value( 'related_posts_visible' );

	if ( false === $visible ) {
		return;
	}

	global $post;

	$post  = get_post( $post );
	$terms = get_the_terms( $post, 'post_tag' );

	if ( ! $terms ) {
		return;
	}

	$post_terms  = array();
	$post_number = onclinic_theme()->customizer->get_value( 'related_posts_count' );

	$post_terms = wp_list_pluck( $terms, 'term_id' );

	$post_args = array(
		'post_type'    => 'post',
		'tag__in'      => $post_terms,
		'numberposts'  => ( int ) $post_number,
		'post__not_in' => array( $post->ID ),
	);

	$posts = get_posts( $post_args );

	if ( ! $posts ) {
		return;
	}

	$holder_view_dir = locate_template( 'template-parts/content-related-post.php', false, false );

	$settings = array(
		'block_title' 				=> 'related_posts_block_title',
		'title_visible' 			=> 'related_posts_title',
		'image_visible' 			=> 'related_posts_image',
		'excerpt_visible' 			=> 'related_posts_excerpt',
		'excerpt_length' 			=> 'related_posts_excerpt_words_count',
		'author_visible' 			=> 'related_posts_author',
		'date_visible' 				=> 'related_posts_publish_date',
		'layout_columns' 			=> 'related_posts_grid',
		'categories_visible' 		=> 'related_posts_categories',
		'tags_visible' 				=> 'related_posts_tags',
		'comment_count_visible' 	=> 'related_posts_comment_count',
		'button_learn_more' 		=> 'related_posts_learn_more',
	);

	foreach ( $settings as $setting_key => $setting_value ) {
		$settings[ $setting_key ] = onclinic_theme()->customizer->get_value( $setting_value );
	}

	$settings['grid_count'] 	= ( int ) 12 / $settings[ 'layout_columns' ];
	$grid_class 				= ' col-xs-12 col-sm-6 col-md-6 col-lg-' . $settings['grid_count'] . ' ';
	$thumb_class 				= $settings['image_visible'] ? 'has-thumb' : 'no-thumb';
	
	if ( $holder_view_dir ) {

		$block_title = ( $settings['block_title'] ) ? '<h3 class="related-posts__title">' . $settings['block_title'] . '</h3>' : '';

		echo '<div class="related-posts hentry posts-list">'
				. $block_title .
				'<div class="row" >';

		foreach ( $posts as $post ) {

			setup_postdata( $post );

			require( $holder_view_dir );
		}

		echo '</div>
			<div class="related-posts__overlay"></div>
		</div>';
	}

	wp_reset_postdata();
}
