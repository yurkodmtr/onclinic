<?php
/**
 * Theme hooks.
 *
 * @package Ocularis
 */

// Adds the meta viewport to the header.
add_action( 'wp_head', 'ocularis_meta_viewport', 0 );

// Additional body classes.
add_filter( 'body_class', 'ocularis_extra_body_classes' );

// Enqueue sticky menu if required.
add_filter( 'ocularis-theme/assets-depends/script', 'ocularis_enqueue_misc' );

// Additional image sizes for media gallery.
add_filter( 'image_size_names_choose', 'ocularis_image_size_names_choose' );

// Modify a comment form.
add_filter( 'comment_form_defaults', 'ocularis_modify_comment_form' );


// Modify background-image dynamic css variables.
add_filter( 'cherry_css_variables', 'ocularis_modify_bg_img_variables', 10, 2 );


// Add dynamic css function.
add_filter( 'cx_dynamic_css/func_list', 'ocularis_add_dynamic_css_function' );

// Add has/no thumbnail classes for posts.
add_filter( 'post_class', 'ocularis_post_thumb_classes' );

//	Callback function for additional fonts in Elementor.
add_filter( 'elementor/fonts/additional_fonts', 'ocularis_add_additional_fonts' );

//	Remove the parentheses from the category/archive/tag widget.
add_filter( 'wp_list_categories', 'ocularis_categories_postcount_filter' );
add_filter( 'get_archives_link', 'ocularis_categories_postcount_filter' );
add_filter( 'wp_tag_cloud', 'ocularis_tagcloud_postcount_filter');

/**
 * Add has/no thumbnail classes for posts
 *
 * @param  array $classes Existing classes.
 *
 * @return array
 */
function ocularis_post_thumb_classes( $classes ) {
	$thumb = 'no-thumb';

	if ( has_post_thumbnail() ) {
		$thumb = 'has-thumb';
	}

	$classes[] = $thumb;

	return $classes;
}

/**
 * Modify background-image dynamic css variables.
 *
 * @param array $variables CSS variables.
 * @param array $args      Module arguments.
 *
 * @return array
 */
function ocularis_modify_bg_img_variables( $variables = array(), $args = array() ) {

	$bg_img_variables = array(
		'header_bg_image',
		'page_404_bg_image',
	);

	foreach ( $bg_img_variables as $var ) {
		$variables[ $var ] = esc_url( ocularis_render_theme_url( $variables[ $var ] ) );
	}

	return $variables;
}


/**
 * Adds the meta viewport to the header.
 *
 * @since  1.0.0
 * @return string `<meta>` tag for viewport.
 */
function ocularis_meta_viewport() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1" />' . "\n";
}

/**
 * Add extra body classes
 *
 * @param  array $classes Existing classes.
 * @return array
 */
function ocularis_extra_body_classes( $classes ) {

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a options-based classes.
	$options_based_classes = array();

	$layout      = ocularis_theme()->customizer->get_value( 'container_type' );
	$blog_layout = ocularis_theme()->customizer->get_value( 'blog_layout_type' );
	$sb_position = ocularis_theme()->sidebar_position;
	$sidebar     = ocularis_theme()->customizer->get_value( 'sidebar_width' );

	array_push( $options_based_classes, 'layout-' . $layout, 'blog-' . $blog_layout );
	if( 'none' !== $sb_position ) {
		array_push( $options_based_classes, 'sidebar_enabled', 'position-' . $sb_position, 'sidebar-' . str_replace( '/', '-', $sidebar ) );
	}

	return array_merge( $classes, $options_based_classes );
}

/**
 * Add misc to theme script dependencies if required.
 *
 * @param  array $depends Default dependencies.
 * @return array
 */
function ocularis_enqueue_misc( $depends ) {
	$totop_visibility = ocularis_theme()->customizer->get_value( 'totop_visibility' );

	if ( $totop_visibility ) {
		$depends[] = 'jquery-totop';
	}

	return $depends;
}

/**
 * Add image sizes for media gallery
 *
 * @param  array $classes Existing classes.
 * @return array
 */
function ocularis_image_size_names_choose( $image_sizes ) {
	$image_sizes['post-thumbnail'] = __( 'Post Thumbnail', 'ocularis' );

	return $image_sizes;
}

/**
 * Add placeholder attributes for comment form fields.
 *
 * @param  array $args Argumnts for comment form.
 * @return array
 */
function ocularis_modify_comment_form( $args ) {
	$args = wp_parse_args( $args );

	if ( ! isset( $args['format'] ) ) {
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
	}

	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );
	$html_req  = ( $req ? " required='required'" : '' );
	$html5     = 'html5' === $args['format'];
	$commenter = wp_get_current_commenter();

	$args['label_submit'] = esc_html__( 'Submit', 'ocularis' );

	$args['fields']['author'] = '<div class="comment-form__input_wrap clear"><p class="comment-form-author"><input id="author" class="comment-form__field" name="author" type="text" placeholder="' . esc_attr__( 'Your name', 'ocularis' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></p>';

	$args['fields']['email'] = '<p class="comment-form-email"><input id="email" class="comment-form__field" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' placeholder="' . esc_attr__( 'Your email', 'ocularis' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>';

	$args['fields']['url'] = '<p class="comment-form-url"><input id="url" class="comment-form__field" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' placeholder="' . esc_attr__( 'Your website', 'ocularis' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p></div>';

	$args['comment_field'] = '<p class="comment-form-comment"><textarea id="comment" class="comment-form__field" name="comment" placeholder="' . esc_attr__( 'Say something nice...', 'ocularis' ) . '" cols="45" rows="7" ></textarea></p>';

	return $args;
}


/**
 * Add dynamic css function.
 *
 * @param array $func_list Function list.
 *
 * @return array
 */
function ocularis_add_dynamic_css_function( $func_list = array() ) {

	$func_list['background_position'] = 'ocularis_dynamic_css_background_position';

	return $func_list;
}

/**
 * Callback function for dynamic css function `background_position`.
 *
 * @param string $position Background position.
 *
 * @return bool|string
 */
function ocularis_dynamic_css_background_position( $position = '' ) {

	if ( empty( $position ) ) {
		return;
	}

	$result = 'background-position: ' . str_replace( '-', ' ', $position );

	return $result;
}

/**
 * Callback function for additional fonts in Elementor.
 */
function ocularis_add_additional_fonts( $additional_fonts ) {
	
	$additional_fonts[ 'Contata One' ] = 'googlefonts';
	$additional_fonts[ 'Spartan' ] = 'googlefonts';

	return $additional_fonts;
}

/**
 * Remove the parentheses from the category widget.
 */
function ocularis_categories_postcount_filter ($variable) {
   
   $variable = str_replace('(', '<span class="post_count"> ', $variable);
   $variable = str_replace(')', ' </span>', $variable);
   
   return $variable;
}

/**
 * Remove parentheses from tag cloud count
 */
function ocularis_tagcloud_postcount_filter ($variable) {
	$variable = str_replace('(', '', $variable);
	$variable = str_replace(')', '', $variable);
	
	return $variable;
}