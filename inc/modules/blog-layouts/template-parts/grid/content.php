<?php
/**
 * Template part for displaying default posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package onclinic
 */

$sidebar 		= onclinic_theme()->customizer->get_value( 'blog_sidebar_position' );
$columns 		= onclinic_theme()->customizer->get_value( 'blog_layout_columns' );

$thumbnail 		= 'onclinic-thumb-grid-3col';
if( ( 'none' == $sidebar ) && ( '2-cols' == $columns ) ) {
	$thumbnail 		= 'onclinic-thumb-grid-2col';
} elseif( 'none' != $sidebar ) {
	$thumbnail 		= 'onclinic-thumb-grid-2col-sidebar';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item grid-item' ); ?>>
	
	<?php onclinic_post_thumbnail( $thumbnail ); ?>
	
	<div class="posts-list__item-content">
		<header class="entry-header">
			<div class="entry-meta"><?php
				onclinic_posted_in( array(
					'prefix'  => '\\',
				) );
			?></div><!-- .entry-meta -->
			<h3 class="entry-title"><?php 
				onclinic_sticky_label();
				the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
			?></h3>
		</header><!-- .entry-header -->

		<?php onclinic_post_excerpt(); ?>

		<div class="entry-meta"><?php
			onclinic_posted_by();
			onclinic_posted_on();
			onclinic_post_comments( array(
				'prefix' => onclinic_get_icon_svg( 'comment' )
			));
		?></div><!-- .entry-meta -->

		<footer class="entry-footer">
			<div class="entry-footer-container">
				<div class="post__button-wrap"><?php
					onclinic_post_link();
				?></div>
			</div>
		</footer><!-- .entry-footer -->
	</div><!-- .posts-list__item-content -->
</article><!-- #post-<?php the_ID(); ?> -->
