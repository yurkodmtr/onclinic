<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ocularis
 */

$categories_visible = ocularis_theme()->customizer->get_value( 'single_post_categories' );
?>

<header class="entry-header">
	
	<div class="entry-meta">
		<?php
			ocularis_posted_in( array(
				'prefix'  => '',
				'visible' => $categories_visible
			) );
		?>
	</div><!-- .entry-meta -->
	
	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
</header><!-- .entry-header -->

<?php ocularis_post_thumbnail( 'full', array( 'link' => false ) ); ?>
