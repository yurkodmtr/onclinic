<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ocularis
 */

get_header();

	do_action( 'ocularis-theme/site/site-content-before', 'archive' ); ?>

	<div <?php ocularis_content_class() ?>>

        <?php if ( !is_active_sidebar( 'sidebar' ) || 'none' === ocularis_theme()->sidebar_position ) : ?>
            <header class="page-header page-header__align_center">
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="archive-description">', '</div>' );
                ?>
            </header><!-- .page-header -->
        <?php endif; ?>

		<div class="row">

			<?php do_action( 'ocularis-theme/site/primary-before', 'archive' ); ?>

			<div id="primary" <?php ocularis_primary_content_class(); ?>>

                <?php if ( is_active_sidebar( 'sidebar' ) && 'none' !== ocularis_theme()->sidebar_position ) : ?>
                    <header class="page-header">
                        <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="archive-description">', '</div>' );
                        ?>
                    </header><!-- .page-header -->
                <?php endif; ?>

				<?php do_action( 'ocularis-theme/site/main-before', 'archive' ); ?>

				<main id="main" class="site-main"><?php
					if ( have_posts() ) :

						ocularis_theme()->do_location( 'archive', 'template-parts/posts-loop' );

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
				?></main><!-- #main -->

				<?php do_action( 'ocularis-theme/site/main-after', 'archive' ); ?>

			</div><!-- #primary -->

			<?php do_action( 'ocularis-theme/site/primary-after', 'archive' ); ?>

			<?php get_sidebar(); // Loads the sidebar.php template.  ?>
		</div>
	</div>

	<?php do_action( 'ocularis-theme/site/site-content-after', 'archive' );

get_footer();
