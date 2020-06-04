<?php
/**
 * Template part for displaying default posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Onclinic
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-default'); ?>>

	<header class="entry-header">
		<h3 class="entry-title"><?php 
			onclinic_sticky_label();
			the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
		?></h3>
		<div class="entry-meta">
			<?php
				onclinic_posted_by();
				onclinic_posted_in( array(
					'prefix' => __( 'In', 'onclinic' ),
				) );
				onclinic_posted_on( array(
					'prefix' => __( 'Posted', 'onclinic' )
				) );
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php onclinic_post_thumbnail( 'onclinic-thumb-l' ); ?>

	<?php onclinic_post_excerpt(); ?>

	<footer class="entry-footer">
		<div class="entry-meta">
			<?php
				onclinic_post_tags( array(
					'prefix' => __( 'Tags:', 'onclinic' )
				) );
			?>
			<div><?php
				onclinic_post_comments( array(
					'prefix' => '<i class="fa fa-comment" aria-hidden="true"></i>',
					'class'  => 'comments-button'
				) );
				onclinic_post_link();
			?></div>
		</div>
		<?php onclinic_edit_link(); ?>
	</footer><!-- .entry-footer -->
	
</article><!-- #post-<?php the_ID(); ?> -->
