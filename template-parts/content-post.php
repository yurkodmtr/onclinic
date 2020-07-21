<?php
/**
 * Post content template (fallback for single location)
 */
?>

<?php //get_template_part( 'template-parts/single-post/content-byauthor' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-12 col-xs-12' ); ?>><?php

	get_template_part( 'template-parts/single-post/header', get_post_format() );
    get_template_part( 'template-parts/single-post/content-byauthor' );
	get_template_part( 'template-parts/single-post/content', get_post_format() );
	get_template_part( 'template-parts/single-post/footer' );
	get_template_part( 'template-parts/single-post/post_navigation' );

?></article>
