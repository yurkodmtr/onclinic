<?php
/**
 * The template for displaying related posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Ocularis
 * @subpackage single-post
 */

$columns 		= ocularis_theme()->customizer->get_value( 'related_posts_grid' );
$thumb 			= ( '3' != $columns ) ? 'ocularis-thumb-related2' : 'ocularis-thumb-related';
$words_count 	= $settings['excerpt_length'];
$more 			= apply_filters( 'ocularis_post_excerpt_more_text', '&hellip;' );
$excerpt 		= wp_trim_words( get_the_excerpt(), $words_count, $more );
?>


<article class="related-post hentry <?php echo esc_attr( $thumb_class ); ?>">
    <div class="related-post__img">
        <?php
        if ( has_post_thumbnail() && $settings['image_visible'] ) {
            ocularis_post_thumbnail(
                $thumb,
                array( 'visible' => $settings['image_visible'] )
            );
        }
        ?>
    </div>
    <div class="related-post__content">
        <?php
            ocularis_posted_in( array(
                'prefix'  => '',
                'visible' => $settings['categories_visible']
            ) );
        ?>

        <header class="entry-header"><?php
            if ( $settings['title_visible'] ) :
                printf(
                    '<h4 class="entry-title"><a href="%s" rel="bookmark">%s</a></h4>',
                    esc_url( get_permalink() ),
                    get_the_title()
                );
            endif; ?>
        </header>

        <div class="entry-meta">
            <?php
                ocularis_posted_on( array(
                    'visible' => $settings['date_visible']
                ));
                ocularis_post_comments( array(
                    'visible' => true,
                    'postfix' => ocularis_get_icon_svg( 'comment' )
                ));
             ?>
        </div>

    </div>
</article><!--.related-post-->

