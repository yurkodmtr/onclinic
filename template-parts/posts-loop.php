<?php
/**
 * Posts loop template
 */

do_action( 'onclinic-theme/blog/before' );

?><div <?php onclinic_posts_list_class(); ?>><?php

	while ( have_posts() ) : the_post();

		/*
		* Include the Post-Format-specific template for the content.
		* If you want to override this in a child theme, then include a file
		* called content-___.php (where ___ is the Post Format name) and that will be used instead.
		*/
		get_template_part( onclinic_get_post_template_part_slug(), onclinic_get_post_style() );

	endwhile;

?></div><?php

do_action( 'onclinic-theme/blog/after' );

get_template_part( 'template-parts/content', 'navigation' );
