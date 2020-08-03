<?php
/**
 * Template part for posts navigation.
 *
 * @package Ocularis
 */

do_action( 'ocularis-theme/blog/posts-navigation-before' );

the_posts_pagination(
	apply_filters( 'ocularis-theme/posts/navigation-args',
		array(
			'prev_text' => sprintf(
				'< <span class="screen-reader-text">%1$s</span> %1$s',
				esc_html__( 'Prev', 'ocularis' ) ),
			'next_text' => sprintf(
				'<span class="screen-reader-text">%1$s</span> %1$s >',
				esc_html__( 'Next', 'ocularis' ) ),
		)
	)
);

do_action( 'ocularis-theme/blog/posts-navigation-after' );
