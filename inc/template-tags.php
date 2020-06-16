<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Onclinic
 */

if ( ! function_exists( 'onclinic_post_excerpt' ) ) :
	/**
	 * Prints HTML with excerpt.
	 */
    /**
     * @param array $args
     */
    function onclinic_post_excerpt($args = array() ) {
		$default_args = array(
			'before' => '<div class="entry-content">',
			'after'  => '</div>',
			'echo'   => true
		);
		$args = wp_parse_args( $args, $default_args );

		$post_excerpt_enable = onclinic_theme()->customizer->get_value( 'blog_post_excerpt' );

		if ( ! $post_excerpt_enable ) {
			return;
		}

		$words_count = onclinic_theme()->customizer->get_value( 'blog_post_excerpt_words_count' );

		if ( has_excerpt() ) {
			$excerpt = wp_trim_words( get_the_excerpt(), $words_count, '...' );
		} else {
			$excerpt = get_the_content();
			$excerpt = strip_shortcodes( $excerpt );
			$excerpt = str_replace( ']]>', ']]&gt;', $excerpt );
			$excerpt = wp_trim_words( $excerpt, $words_count, '...' );

			if ( ! $excerpt ) {
				return;
			}
		}

		$excerpt_output = apply_filters(
			'onclinic-theme/post/excerpt-output',
			$args['before'] .'<p>'. $excerpt .'</p>'. $args['after']
		);

		if ( $args['echo'] ) {
			echo wp_kses_post( $excerpt_output );
		} else {
			return $excerpt_output;
		}
	}
endif;

if ( ! function_exists( 'onclinic_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function onclinic_posted_on( $args = array() ) {
		if ( 'post' === get_post_type() ) {

			$default_args = array(
				'prefix' 	=> '',
				'format' 	=> '',
				'before' 	=> '<span class="posted-on">',
				'after' 	=> '</span>',
				'echo' 		=> true,
				'visible' 	=> ! is_singular( 'post' ) ? onclinic_theme()->customizer->get_value( 'blog_post_publish_date' ) : onclinic_theme()->customizer->get_value( 'single_post_publish_date' ),
			);
			
			$args = wp_parse_args( $args, $default_args );
			$args = apply_filters( 'onclinic_posted_on_args', $args );

			$visible = filter_var( $args['visible'], FILTER_VALIDATE_BOOLEAN );

			if ( ! $visible ) {
				return false;
			}

			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

			$time_string = sprintf( $time_string,
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date( $args['format'] ) )
			);

			$posted_on = sprintf(
				/* translators: %s: post date. */
				esc_html_x( '%s', 'post date', 'onclinic' ),
				$time_string
			);

			$date_output = apply_filters(
				'onclinic-theme/post/date-output',
				$args['before'] . $args['prefix'] . ' ' . $posted_on . $args['after']
			);

			$allowed_html = array(
				'time' => array(
					'datetime' => true,
				),
				'svg'   => array(
					'class' => true,
					'aria-hidden' => true,
					'aria-labelledby' => true,
					'role' => true,
					'xmlns' => true,
					'width' => true,
					'height' => true,
					'viewbox' => true, // <= Must be lower case!
				),
				'g'     => array( 'fill' => true ),
				'title' => array( 'title' => true ),
				'path'  => array( 'd' => true, 'fill' => true,  ),
			);

			if ( $args['echo'] ) {
				echo wp_kses( $date_output, onclinic_kses_post_allowed_html( $allowed_html ) );
			} else {
				return $date_output;
			}
		}
	}
endif;

if ( ! function_exists( 'onclinic_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function onclinic_posted_by( $args = array() ) {
		if ( 'post' === get_post_type() ) {

			$default_args = array(
				'prefix' => esc_html__( 'by', 'onclinic' ),
				'before' => '<span class="byline">',
				'after'  => '</span>',
				'echo'   => true,
				'visible'     => ! is_singular( 'post' ) ? onclinic_theme()->customizer->get_value( 'blog_post_author' ) : onclinic_theme()->customizer->get_value( 'single_post_author' ),
			);

			$args = wp_parse_args( $args, $default_args );
			$args = apply_filters( 'onclinic_posted_by_args', $args );

			$visible = filter_var( $args['visible'], FILTER_VALIDATE_BOOLEAN );

			if ( ! $visible ) {
				return false;
			}
			
			onclinic_get_post_author( $args );
		}
	}
endif;

if ( ! function_exists( 'onclinic_posted_in' ) ) :
	/**
	 * Prints HTML with meta information for the current categories.
	 */
	function onclinic_posted_in( $args = array() ) {
		if ( 'post' === get_post_type() ) {

			$default_args = array(
				'prefix' 	=> '',
				'delimiter' => ' ',
				'before' 	=> '<span class="cat-links">',
				'after' 	=> '</span>',
				'visible' 	=> true
			);
			$args = wp_parse_args( $args, $default_args );
			$args = apply_filters( 'onclinic_post_thumbnail_args', $args );

			$visible = filter_var( $args['visible'], FILTER_VALIDATE_BOOLEAN );

			if ( ! $visible ) {
				return false;
			}

			$categories_list = get_the_category_list( esc_html( $args['delimiter'] ) );
			if ( $categories_list ) {
				$categories = sprintf(
					/* translators: 1: list of categories. */
					esc_html__( '%s', 'onclinic' ),
					$categories_list
				);

				echo apply_filters(
					'onclinic-theme/post/categories-output',
					$args['before'] . $args['prefix'] . ' ' . $categories . $args['after']
				);
			}
		}
	}
endif;

if ( ! function_exists( 'onclinic_post_tags' ) ) :
	/**
	 * Prints HTML with meta information for the current tags.
	 */
	function onclinic_post_tags( $args = array() ) {
		if ( 'post' !== get_post_type() ) {
			return false;
		}

		$default_args = array(
			'prefix'    => '',
			'delimiter' => ', ',
			'before'    => '<span class="tags-links">',
			'after'     => '</span>',
			'visible'   => ! is_singular( 'post' ) ? onclinic_theme()->customizer->get_value( 'blog_post_tags' ) : onclinic_theme()->customizer->get_value( 'single_post_tags' ),
		);

		$args = wp_parse_args( $args, $default_args );
		$args = apply_filters( 'onclinic_post_tags_args', $args );

		$visible = filter_var( $args['visible'], FILTER_VALIDATE_BOOLEAN );

		if ( ! $visible ) {
			return false;
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html_x( $args['delimiter'], 'list item separator', 'onclinic' ) );
		if ( $tags_list ) {
			$tags = sprintf(
				/* translators: 1: list of tags. */
				esc_html__( '%s', 'onclinic' ),
				$tags_list
			);

			echo apply_filters(
				'onclinic-theme/post/tags-output',
				$args['before'] . $args['prefix'] . ' ' . $tags . $args['after']
			);
		}
	}
endif;

if ( ! function_exists( 'onclinic_post_comments' ) ) :
	/**
	 * Prints HTML with meta information for the current comments.
	 */
	function onclinic_post_comments( $args = array() ) {
		if ( 'post' !== get_post_type() ) {
			return false;
		}

		$default_args = array(
			'class' 	=> '',
			'prefix' 	=> '',
			'before' 	=> '<span class="comments-link">',
			'after' 	=> '</span>',
			'postfix' 	=> esc_html( 'Comment(s)', 'onclinic' ),
			'visible' => ! is_singular( 'post' ) ? onclinic_theme()->customizer->get_value( 'blog_post_comments' ) : onclinic_theme()->customizer->get_value( 'single_post_comments' ),
		);

		$args = wp_parse_args( $args, $default_args );
		$args = apply_filters( 'onclinic_post_comments_args', $args );

		$visible = filter_var( $args['visible'], FILTER_VALIDATE_BOOLEAN );

		$post_comments_visible = $visible && ! post_password_required() && ( comments_open() || get_comments_number() );
		$post_comments_visible = apply_filters( 'onclinic_post_comments_visible', $post_comments_visible, $args );

		if ( ! $post_comments_visible ) {
			return false;
		}

		global $post;

		$count = $post->comment_count;
		$link = get_comments_link();

		if ( $args['prefix'] ) {
			$args['prefix'] .= ' ';
		}

		if ( $args['postfix'] ) {
			$args['postfix'] = ' ' . $args['postfix'];
		}

		echo apply_filters(
			'onclinic-theme/post/comments-output',
			$args['before'] . '<a href="' . $link . '" class="' . $args['class'] . '">' . $args['prefix'] . $count . $args['postfix'] . '</a>' . $args['after']
		);
	}
endif;

if ( ! function_exists( 'onclinic_get_post_author' ) ) :
	/*
	* Display a post author.
	*/
	function onclinic_get_post_author( $args = array() ) {
		$default_args = array(
			'prefix' 	=> '',
			'before' 	=> '<span class="author">',
			'after' 	=> '</span>',
			'link' 		=> true,
			'echo' 		=> true
		);
		$args = wp_parse_args( $args, $default_args );

		global $post;
		$author_id = $post->post_author;

		$author_output = $args['before'];
		if ( $args['prefix'] ) {
			$author_output .= $args['prefix'] . ' ';
		}
		if ( $args['link'] ) {
			$author_output .= '<a href="' . esc_url( get_author_posts_url( $author_id ) ) . '">';
		}
		$author_output .= esc_html( get_the_author_meta( 'display_name' , $author_id ) );
		if ( $args['link'] ) {
			$author_output .= '</a>';
		}
		$author_output .= $args['after'];

		$author_output = apply_filters(
			'onclinic-theme/post/author-output',
			$author_output
		);

		if ( $args['echo'] ) {
			echo wp_kses_post( $author_output );
		} else {
			return $author_output;
		}
	}
endif;

if ( ! function_exists( 'onclinic_get_post_author_avatar' ) ) :
	/*
	* Display a post author avatar.
	*/
	function onclinic_get_post_author_avatar( $args = array() ) {
		$default_args = array(
			'size' => 128,
			'echo' => true
		);
		$args = wp_parse_args( $args, $default_args );

		global $post;
		$author_id = $post->post_author;

		$avatar_output = apply_filters(
			'onclinic-theme/post/avatar-output',
			get_avatar( get_the_author_meta( 'user_email', $author_id ), $args['size'], '', esc_attr( get_the_author_meta( 'nickname', $author_id ) ) )
		);

		$allowed_html = array(
			'img' => array(
				'srcset' => true,
			),
			'noscript' => array(),
		);

		if ( $args['echo'] ) {
			echo wp_kses( $avatar_output, onclinic_kses_post_allowed_html( $allowed_html ) );
		} else {
			return $avatar_output;
		}
	}
endif;

if ( ! function_exists( 'onclinic_get_author_role_name' ) ) :
	/*
	* Display a post author role.
	*/
	function onclinic_get_author_role_name() {
		
		global $authordata;

		$author_roles = $authordata->roles;
		$role = array_shift($author_roles);
		$wp_roles = wp_roles();
		$role_name = $wp_roles->role_names[$role];

		echo esc_html( $role_name );
	}
endif;

if ( ! function_exists( 'onclinic_get_author_meta' ) ) :
	/*
	* Display author meta.
	*/
	function onclinic_get_author_meta( $args = array() ) {
		$default_args = array(
			'field' => 'description',
			'echo'  => true
		);
		$args = wp_parse_args( $args, $default_args );

		global $post;
		$author_id = $post->post_author;

		$author_meta_output = apply_filters(
			'onclinic-theme/post/author-meta-output',
			get_the_author_meta( $args['field'], $author_id )
		);

		if ( $args['echo'] ) {
			echo wp_kses_post( $author_meta_output );
		} else {
			return $author_meta_output;
		}
	}
endif;

if ( ! function_exists( 'onclinic_post_link' ) ) :
	function onclinic_post_link( $args = array() ) {

		$default_args = array(
			'class' => '',
		);

		$args = wp_parse_args( $args, $default_args );

		$post_link_type 	= onclinic_theme()->customizer->get_value( 'blog_read_more_type' );

		if ( ! $post_link_type ) {
			return;
		}

		$link 				= get_permalink();
		$icon 				= '<svg width="9" height="12" viewBox="0 0 9 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.57812 11.8906L0.8125 10.7812L6.8125 6.23438L0.8125 1.6875L1.57812 0.578125L8.28125 5.54688V6.90625L1.57812 11.8906Z" fill="#298CD3"/></svg>';
		$title 				= onclinic_theme()->customizer->get_value( 'blog_read_more_text' );
		$post_link_output 	= '<a href="' . esc_url( $link ) . '" class="btn-text-icon' . esc_attr( $args['class'] ) . '">' . esc_html( $title ) . '' . wp_unslash( $icon ) . '</a>';

		echo apply_filters(
			'onclinic-theme/post/link-output',
			$post_link_output
		);
	}
endif;

if ( ! function_exists( 'onclinic_edit_link' ) ) :
	function onclinic_edit_link() {
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'onclinic' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'onclinic_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */

function onclinic_post_thumbnail( $image_size = 'post-thumbnail', $args = array() ) {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	$default_args = array(
		'link'       => true,
		'class'      => 'post-thumbnail',
		'link-class' => 'post-thumbnail__link',
		'echo'       => true,
		'visible'    => true,
	);
	$args = wp_parse_args( $args, $default_args );
	$args = apply_filters( 'onclinic_post_thumbnail_args', $args );

	$visible = filter_var( $args['visible'], FILTER_VALIDATE_BOOLEAN );

	if ( ! $visible ) {
		return false;
	}

	$image_size = apply_filters(
		'onclinic-theme/post/thumb-image-size',
		$image_size
	);

	$thumb = '<figure class="' . $args['class'] . '">';
	if ( $args['link'] ) {
		$thumb .= '<a class="' . $args['link-class'] . '" href="' . get_permalink() .'" aria-hidden="true">';
	}

	$thumb .= get_the_post_thumbnail( null, $image_size );

	if ( $args['link'] ) {
		$thumb .= '</a>';
	}
	$thumb .= '</figure>';

	$thumb = apply_filters(
		'onclinic-theme/post/thumb',
		$thumb
	);

	$allowed_html = array(
		'a' => array(
			'aria-hidden' => true,
		),
		'img' => array(
			'srcset' => true,
			'sizes'  => true,
		),
		'noscript' => array(),
	);

	if ( $args['echo'] ) {
		echo wp_kses( $thumb, onclinic_kses_post_allowed_html( $allowed_html ) );
	} else {
		return $thumb;
	}
}
endif;

/**
 * Displays post thumbnail placeholder
 *
 * @return string
 */
if ( ! function_exists( 'get_placeholder_url' ) ) :
	
	function get_placeholder_url( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'width'      => 370,
			'height'     => 260,
			'background' => '558dd9',
			'foreground' => 'fff',
			'title'      => 'onclinic',
		) );

		$args      = array_map( 'urlencode', $args );
		$base_url  = 'http://fakeimg.pl';
		$format    = '%1$s/%2$sx%3$s/%4$s/%5$s/?text=%6$s';
		$image_url = sprintf(
			$format,
			$base_url, $args['width'], $args['height'], $args['background'], $args['foreground'], $args['title']
		);

		/**
		 * Filter image placeholder URL
		 *
		 * @param string $image_url Default URL.
		 * @param string $args      Image arguments.
		 */
		return esc_url( $image_url );
	}

endif;


if ( ! function_exists( 'onclinic_post_overlay_thumbnail' ) ) :
/**
 * Displays post thumbnail as tag style
 *
 * @return string
 */
function onclinic_post_overlay_thumbnail( $img_size = 'onclinic-thumb-xl', $postID = null ) {
	$thumbnail = apply_filters(
		'onclinic-theme/post/overlay-thumb',
		get_the_post_thumbnail_url( $postID, $img_size )
	);

	if( $thumbnail ) {
		echo 'style="background-image: url(' . $thumbnail . ')"';
	}
}
endif;

if ( ! function_exists( 'onclinic_get_page_preloader' ) ) :
/**
 * Display the page preloader.
 *
 * @since  1.0.0
 * @return void
 */
function onclinic_get_page_preloader() {
	
	$page_preloader = onclinic_theme()->customizer->get_value( 'page_preloader' );

	if ( $page_preloader ) {

		echo '<div class="page-preloader-cover">';
			onclinic_header_logo();
			echo '<div class="bar"></div>';
		echo '</div>';
	}
}
endif;

if ( ! function_exists( 'onclinic_header_bar_markup' ) ) :
	/**
	 * Header bar markup.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function onclinic_header_bar_markup(){
		$layout = onclinic_theme()->customizer->get_value( 'header_layout_type' );

		get_template_part( 'template-parts/header/layout', $layout );
	}
endif;
add_action( 'onclinic_header_bar', 'onclinic_header_bar_markup' );

if ( ! function_exists( 'onclinic_header_logo' ) ) :
/**
 * Display the header logo.
 *
 * @since  1.0.0
 * @return void
 */
function onclinic_header_logo() {
		
	$custom_logo_id = get_theme_mod( 'custom_logo' );

	$class = 'site-logo';

	$logo_retina_height = onclinic_theme()->customizer->get_value( 'logo_retina_height' );

	$custom_logo_attr = array(
		'itemprop' 	=> 'logo',
	);
	$image_retina_url = false;
	$retina_id = false;
	$retina_url = onclinic_theme()->customizer->get_value( 'logo_retina' );
	if ( $retina_url ) {
		$retina_id = attachment_url_to_postid( $retina_url );
		if ( $retina_id ) {
			$image_retina_url = wp_get_attachment_image_src( $retina_id, 'full' );
			if ( $image_retina_url ) {
				$custom_logo_attr['srcset'] = $image_retina_url[0] . ' 2x';
			}
		}
	}

	if ( ! $custom_logo_id ) {
		$custom_logo_id = $retina_id;
	}

	if ( $custom_logo_id ) {
		$image_alt = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
		if ( empty( $image_alt ) ) {
			$custom_logo_attr['alt'] = get_bloginfo( 'name', 'display' );
		}

		if ( $retina_id ) {
			$class .= ' retina-logo';
		}

		$logo = wp_get_attachment_image( $custom_logo_id, 'full', false, $custom_logo_attr );

		$format = apply_filters(
			'onclinic-theme/header/logo-format',
			'<div class="%3$s"><a class="site-logo__link" href="%1$s" rel="home">%2$s</a></div>'
		);

	} else {

		$logo = get_bloginfo( 'name' );

		$format = apply_filters(
			'onclinic-theme/header/logo-format',
			'<h1 class="%3$s"><a class="site-logo__link" href="%1$s" rel="home">%2$s</a></h1>'
		);
	}


	printf( $format, esc_url( home_url( '/' ) ), $logo, $class );
}
endif;

if ( ! function_exists( 'onclinic_site_description' ) ) :
	/**
	 * Display the site description.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function onclinic_site_description() {
		$site_tagline 	= onclinic_theme()->customizer->get_value( 'site_tagline' );
		$description 	= get_bloginfo( 'description', 'display' );

		$visible = $site_tagline && $description;

		if ( ! $visible && ! is_customize_preview() ) {
			return;
		}

		$hidden = ! $visible ? ' hidden="hidden"' : '';

		printf( '<div class="site-description"%2$s><span class="site-description__text">%1$s</span></div>', esc_html( $description ), esc_attr( $hidden ) );
	}
endif;

if ( ! function_exists( 'onclinic_header_search_toggle' ) ) :
	/**
	 * Show header search toggle.
	 * @since  1.0.0
	 * @return void
	 */
	function onclinic_header_search_toggle() {
		$visible = onclinic_theme()->customizer->get_value( 'header_search_visible' );

		if ( ! $visible ) {
			return;
		}

        echo '<button class="header-search-toggle"></button>';

	}
endif;

if ( ! function_exists( 'onclinic_header_search_popup' ) ) :
	/**
	 * Show header search popup.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function onclinic_header_search_popup() {
		$visible = onclinic_theme()->customizer->get_value( 'header_search_visible' );

		if ( ! $visible ) {
			return;
		}

		get_template_part( 'template-parts/header/search-popup' );
	}
endif;

if ( ! function_exists( 'onclinic_site_description' ) ) :
/**
 * Display the site description.
 *
 * @since  1.0.0
 * @return void
 */
function onclinic_site_description() {
	$show_desc = onclinic_theme()->customizer->get_value( 'show_tagline' );

	if ( ! $show_desc ) {
		return;
	}

	$description = get_bloginfo( 'description', 'display' );

	if ( ! ( $description || is_customize_preview() ) ) {
		return;
	}

	$format = apply_filters( 'onclinic-theme/header/description-format', '<div class="site-description">%s</div>' );

	printf( $format, $description );
}
endif;

if ( ! function_exists( 'onclinic_social_list' ) ) :
/**
 * Show Social list.
 *
 * @since  1.0.0
 * @since  1.0.1 Added new param - $type.
 * @return void
 */
function onclinic_social_list( $context = '', $type = 'icon' ) {
	$visibility_in_header = onclinic_theme()->customizer->get_value( 'header_social_links' );
	$visibility_in_footer = onclinic_theme()->customizer->get_value( 'footer_social_links' );

	if ( ! $visibility_in_header && ( 'header' === $context ) ) {
		return;
	}

	if ( ! $visibility_in_footer && ( 'footer' === $context ) ) {
		return;
	}

	echo onclinic_get_social_list( $context, $type );
}
endif;

if ( ! function_exists( 'onclinic_footer_copyright' ) ) :
	/**
	 * Show footer copyright text.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function onclinic_footer_copyright() {
		$copyright 		= onclinic_theme()->customizer->get_value( 'footer_copyright' );
		$logo_url 		= onclinic_theme()->customizer->get_value( 'footer_logo' );
		$logo_alt 		= get_bloginfo( 'name', 'display' );
		
		$logo = '';
		if( !empty( $logo_url ) ) {
			$logo = '<a class="footer-logo__link" href="' . esc_url( home_url( '/' ) ) . '" rel="home"><img src="' . esc_url( $logo_url ) . '" alt="' . esc_attr( $logo_alt ) . '" /></a>';
		}

		$format = apply_filters(
			'onclinic-theme/footer/copyright-format',
			'%1$s<div class="footer-copyright">%2$s</div>'
		);

		if ( empty( $copyright ) ) {
			return;
		}

		printf( $format, $logo, wp_kses( onclinic_render_macros( $copyright ), wp_kses_allowed_html( 'post' ) ) );
	}
endif;

if ( ! function_exists( 'onclinic_blog_page_title' ) ) :
	/**
	 * Show blog page title text.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function onclinic_blog_page_title() {
		$visible 			= onclinic_theme()->customizer->get_value( 'blog_page_title' );
		$subtitle_text 		= onclinic_theme()->customizer->get_value( 'blog_page_subtitle' );
		$sidebar_position 	= onclinic_theme()->customizer->get_value( 'blog_sidebar_position' );
		
		if( ! $visible ) {
			return;
		}

		$title_class = ( 'none' != $sidebar_position ) ? 'col-md-4' : 'col-md-5';
		$descr_class = ( 'none' != $sidebar_position ) ? 'col-md-8' : 'col-md-7';

		$subtitle = '';
		if( !empty( $subtitle_text ) ) {
			$subtitle = '<div class="archive-description ' . esc_attr( $descr_class ) . '">' . esc_html( $subtitle_text ) . '</div>';
		}

		$title = get_the_title( get_option('page_for_posts', true) );

		$format = apply_filters(
			'onclinic-theme/blog/page-title-format',
			'<header class="page-header row"><h1 class="page-title %3$s">%1$s</h1>%2$s</header>'
		);

		printf( $format, $title, $subtitle, $title_class );
	}
endif;

if ( ! function_exists( 'onclinic_footer_newsletter_popup' ) ) :
	/**
	 * Show footer newsletter popup.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function onclinic_footer_newsletter_popup() {
		

		get_template_part( 'template-parts/footer/newsletter-popup' );
	}
endif;

if ( ! function_exists( 'onclinic_sticky_label' ) ) :
/**
 * Show sticky menu label grabbed from options.
 *
 * @since  1.0.0
 * @return void
 */
function onclinic_sticky_label() {
	if ( ! is_sticky() || ! is_home() || is_paged() ) {
		return;
	}

	$sticky_type = onclinic_theme()->customizer->get_value( 'blog_sticky_type' );

	$content = '';

	$icon    = apply_filters(
		'onclinic-theme/posts/sticky-icon',
		'<svg class="svg-icon" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 0L12.4006 7.70338H20L13.852 12.3607L16.2326 20L10 15.2786L3.76739 20L6.14804 12.3607L0 7.70338H7.59939L10 0ZM10 6.74679L9.08115 9.69532H5.93854L8.48096 11.6213L7.54215 14.6339L10 12.772L12.4579 14.6339L11.519 11.6213L14.0615 9.69532H10.9189L10 6.74679Z"/></svg>'
	);

	switch ( $sticky_type ) {

		case 'icon':
		$content = $icon;
		break;

		case 'label':
		$label = onclinic_theme()->customizer->get_value( 'blog_sticky_label' );
		$content = $label;
		break;

		case 'both':
		$label = onclinic_theme()->customizer->get_value( 'blog_sticky_label' );
		$content = $icon . $label;
		break;
	}

	if ( empty( $content ) ) {
		return;
	}

	printf( '<span class="sticky-label type-%2$s">%1$s</span>', $content, $sticky_type );
}
endif;

/**
 * Adding Author Bio social icons
 */
function evatheme_core_add_remove_contactmethods( $contactmethods ) {
	$contacts = onclinic_author_contact_methods();
	
	foreach($contacts as $k=>$v) {
		$contactmethods[$k] = $v;
	}

    return $contactmethods;
}
add_filter('user_contactmethods','evatheme_core_add_remove_contactmethods',10,1);

function onclinic_author_contact_methods() {

	$contactmethods['onclinic_author_facebook'] 		= esc_html__( 'Facebook', 'onclinic' );
	$contactmethods['onclinic_author_twitter'] 		= esc_html__( 'Twitter', 'onclinic' );
	$contactmethods['onclinic_author_instagram'] 		= esc_html__( 'Instagram', 'onclinic' );
	$contactmethods['onclinic_author_linkedin'] 		= esc_html__( 'Linked In', 'onclinic' );
	$contactmethods['onclinic_author_youtube'] 		= esc_html__( 'YouTube', 'onclinic' );
	$contactmethods['onclinic_author_skype'] 			= esc_html__( 'Skype', 'onclinic' );
	$contactmethods['onclinic_author_pinterest'] 		= esc_html__( 'Pinterest', 'onclinic' );
	$contactmethods['onclinic_author_wordpress'] 		= esc_html__( 'Wordpress', 'onclinic' );
    
    return $contactmethods;
}

function onclinic_get_author_social_networks() {
	
	$options = onclinic_author_contact_methods();
	
	foreach( $options as $option => $class ) {
		
		$network 	= '';
		$title 		= $options[$option];
		$link 		= get_the_author_meta($option);
		
		if ( empty( $link ) ) {
			continue;
		}

		$format = '<a href="%1$s" title="%2$s">%2$s</a>';

		printf( $format, $link, $title );
		
	}

}
