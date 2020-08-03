<?php
/**
 * Template part for displaying default posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ocularis
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-default'); ?>>

	<header class="entry-header">
		<h3 class="entry-title"><?php 
			ocularis_sticky_label();
			the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
		?></h3>
		<div class="entry-meta">
			<?php
				ocularis_posted_by();
				ocularis_posted_in( array(
					'prefix' => __( 'In', 'ocularis' ),
				) );
				ocularis_posted_on( array(
					'prefix' => __( 'Posted', 'ocularis' )
				) );
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php ocularis_post_thumbnail( 'ocularis-thumb-l' ); ?>

	<?php ocularis_post_excerpt(); ?>

	<footer class="entry-footer">
		<div class="entry-meta">
			<?php
				ocularis_post_tags( array(
					'prefix' => __( 'Tags:', 'ocularis' )
				) );
			?>
			<div><?php
				ocularis_post_comments( array(
					'prefix' => '<i class="fa fa-comment" aria-hidden="true"></i>',
					'class'  => 'comments-button'
				) );
				ocularis_post_link();
			?></div>
		</div>
		<?php ocularis_edit_link(); ?>
	</footer><!-- .entry-footer -->
	
</article><!-- #post-<?php the_ID(); ?> -->
