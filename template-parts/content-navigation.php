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
				'<svg class="svg-icon" viewBox="0 0 15 9" xmlns="http://www.w3.org/2000/svg"><path d="M5.958 8.786L0.918 4.772L5.958 0.776V4.376H14.454V5.186H5.958V8.786Z"></path></svg>
				<span class="screen-reader-text">%1$s</span> %1$s',
				esc_html__( 'Prev', 'onclinic' ) ),
			'next_text' => sprintf(
				'<span class="screen-reader-text">%1$s</span> %1$s 
				<svg class="svg-icon" viewBox="0 0 15 9" xmlns="http://www.w3.org/2000/svg"><path d="M5.958 8.786L0.918 4.772L5.958 0.776V4.376H14.454V5.186H5.958V8.786Z"></path></svg>',
				esc_html__( 'Next', 'onclinic' ) ),
		)
	)
);

do_action( 'onclinic-theme/blog/posts-navigation-after' );
