<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Onclinic
 */

get_header();

	do_action( 'onclinic-theme/site/site-content-before', 'single' ); ?>

	<div <?php onclinic_content_class() ?>>
		<div class="row">

			<?php do_action( 'onclinic-theme/site/primary-before', 'single' ); ?>

			<div id="primary" <?php onclinic_primary_content_class(); ?>>

				<?php do_action( 'onclinic-theme/site/main-before', 'single' ); ?>

				<main id="main" class="site-main row"><?php
					while ( have_posts() ) : the_post();

						onclinic_theme()->do_location( 'single', 'template-parts/content-post' );

					endwhile; // End of the loop.
				?></main><!-- #main -->

				<?php do_action( 'onclinic-theme/site/main-after', 'single' ); ?>

			</div><!-- #primary -->

			<?php do_action( 'onclinic-theme/site/primary-after', 'single' ); ?>

			<?php get_sidebar(); // Loads the sidebar.php template.  ?>
		</div>

		<?php get_template_part( 'template-parts/single-post/content-author-bio' ); ?>

		<?php onclinic_related_posts(); ?>

		<?php get_template_part( 'template-parts/single-post/comments' ); ?>

	</div>

	<?php do_action( 'onclinic-theme/site/site-content-after', 'single' );

get_footer();
