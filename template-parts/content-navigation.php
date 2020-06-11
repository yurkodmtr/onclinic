<?php
/**
 * Template part for posts navigation.
 *
 * @package Onclinic
 */

do_action( 'onclinic-theme/blog/posts-navigation-before' );

the_posts_pagination(
	apply_filters( 'onclinic-theme/posts/navigation-args',
		array(
			'prev_text' => sprintf(
				'< <span class="screen-reader-text">%1$s</span> %1$s',
				esc_html__( 'Prev', 'onclinic' ) ),
			'next_text' => sprintf(
				'<span class="screen-reader-text">%1$s</span> %1$s >',
				esc_html__( 'Next', 'onclinic' ) ),
		)
	)
);

do_action( 'onclinic-theme/blog/posts-navigation-after' );
