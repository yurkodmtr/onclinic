<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Onclinic
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('search-item'); ?>>
	
	<?php onclinic_post_thumbnail( 'onclinic-thumb-search-result' ); ?>

	<div class="posts-list__item-content">
		<header class="entry-header">
			<div class="entry-meta"><?php
				onclinic_posted_by();
				onclinic_posted_in( array(
					'prefix' 		=> esc_html__( 'In', 'onclinic' ),
					'delimiter' 	=> ', ',
				) );
				onclinic_posted_on();
			?></div><!-- .entry-meta -->
			<?php the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<div class="entry-footer-container">
				<div class="post__button-wrap"><?php
					onclinic_post_link();
				?></div>
			</div>
		</footer><!-- .entry-footer -->
	</div><!-- .posts-list__item-content -->
</article><!-- #post-<?php the_ID(); ?> -->
