<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Onclinic
 */

if ( ! get_theme_mod( 'single_post_navigation', onclinic_theme()->customizer->get_default( 'single_post_navigation' ) ) ) {
	return;
}

$in_same_cat = true;

$previous_post = get_previous_post( $in_same_cat );
$next_post     = get_next_post( $in_same_cat );

// Return if there're no previous or next posts.
if ( ! ( $previous_post || $next_post ) ) {
	return;
}

$post_ids = array();

if ( $previous_post ) {
	$post_ids[] = $previous_post->ID;
}

if ( $next_post ) {
	$post_ids[] = $next_post->ID;
}

$args = array(
	'post__in'            => $post_ids,
	'order'               => 'ASC',
	'ignore_sticky_posts' => true,
);

// Add filter for the query.
$the_query = new WP_Query( $args );

// Check if there're enough posts in the query.
if ( $the_query->have_posts() ) { ?>

	<nav class="navigation post-navigation">
		<h2 class="screen-reader-text"><?php echo esc_html__( 'Post navigation', 'onclinic' ); ?></h2>
		
		<div class="nav-links">
			
			<?php
			
			while ( $the_query->have_posts() ) :
				
				$the_query->the_post();

				$nav_label 		= '';
				$permalink 		= get_permalink();
				$title 			= get_the_title();

				if ( $previous_post && get_the_ID() === $previous_post->ID ) {
					$nav_label 			= '< Previous post';
                    $nav_class = 'nav-previous ';
				} elseif ( $next_post && get_the_ID() === $next_post->ID ) {
					$nav_label 			= 'Next post >';
                    $nav_class = 'nav-next ';
				}


				?>

					<div class="nav-links__item <?php echo esc_attr( $nav_class ); ?>">
                        <?php  onclinic_post_thumbnail(); ?>
                        <div class="nav-description">
                            <h5 class="h6-style">
                                <a href="<?php echo esc_url( $permalink ); ?>"><?php echo wp_kses_post( wp_unslash( $title ) ); ?></a>
                            </h5>
                            <a class="nav-links__label" href="<?php echo esc_url( $permalink ); ?>">
                                <?php echo esc_html( $nav_label ); ?>
                            </a>
                        </div>
					</div>

			<?php endwhile; ?>

		</div>
	</nav>

	<?php wp_reset_postdata(); ?>

<?php
}