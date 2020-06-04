<?php
/**
 * The template for displaying related posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Onclinic
 * @subpackage single-post
 */

$columns 		= onclinic_theme()->customizer->get_value( 'related_posts_grid' );
$thumb 			= ( '3' != $columns ) ? 'onclinic-thumb-related2' : 'onclinic-thumb-related';
$words_count 	= $settings['excerpt_length'];
$more 			= apply_filters( 'onclinic_post_excerpt_more_text', '&hellip;' );
$excerpt 		= wp_trim_words( get_the_excerpt(), $words_count, $more );
?>

<div class="<?php echo esc_attr( $grid_class ); ?>">
	<article class="related-post hentry <?php echo esc_attr( $thumb_class ); ?>">
		<?php
		if ( has_post_thumbnail() && $settings['image_visible'] ) {
			onclinic_post_thumbnail(
				$thumb,
				array( 'visible' => $settings['image_visible'] )
			);
		}
		?>
		<div class="related-post__content"><?php
			if ( $settings['categories_visible'] ) :
				echo '<div class="entry-meta">';
					onclinic_posted_in( array(
						'prefix'  => '\\',
						'visible' => $settings['categories_visible']
					) );
				echo '</div>';
			endif; ?>
			
			<header class="entry-header"><?php
				if ( $settings['title_visible'] ) :
					printf(
						'<h4 class="entry-title"><a href="%s" rel="bookmark">%s</a></h4>',
						esc_url( get_permalink() ),
						get_the_title()
					);
				endif; ?>
			</header>

			<?php
				if( $settings['excerpt_visible'] ) :
					echo '<div class="entry-content">';
						echo wp_trim_words( get_the_excerpt(), $words_count, $more );
					echo '</div>';
				endif;
			?>

			<div class="entry-meta"><?php
				if ( $settings['author_visible'] ) :
					onclinic_posted_by( array(
						'visible' => $settings['author_visible']
					));
				endif;

				onclinic_posted_on( array(
					'visible' => $settings['date_visible']
				));

				if ( $settings['comment_count_visible'] ) :
					onclinic_post_comments( array(
						'visible' => $settings['comment_count_visible']
					));
				endif;

				if ( $settings['tags_visible'] ) :
					onclinic_post_tags( array(
						'delimiter' => ', ',
						'before' 	=> '<div class="post__tags">',
						'after' 	=> '</div>',
						'visible' 	=> $settings['tags_visible']
					));
				endif; ?>
			</div>

			<?php if ( $settings['button_learn_more'] ) : ?>
				<footer class="entry-footer">
					<div class="entry-footer-container">
						<div class="post__button-wrap"><?php
							onclinic_post_link();
						?></div>
					</div>
				</footer><!-- .entry-footer -->
			<?php endif; ?>
		</div>
	</article><!--.related-post-->
</div>
