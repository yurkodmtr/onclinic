<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Onclinic
 */

$categories_visible = onclinic_theme()->customizer->get_value( 'single_post_categories' );
?>

<header class="entry-header">
	
	<div class="entry-meta">
		<?php
			onclinic_posted_in( array(
				'prefix'  => '',
				'visible' => $categories_visible
			) );
		?>
	</div><!-- .entry-meta -->
	
	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
</header><!-- .entry-header -->

<?php onclinic_post_thumbnail( 'full', array( 'link' => false ) ); ?>
