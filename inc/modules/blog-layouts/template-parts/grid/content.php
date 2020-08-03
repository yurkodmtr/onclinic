<?php
/**
 * Template part for displaying default posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ocularis
 */

$sidebar 		= ocularis_theme()->customizer->get_value( 'blog_sidebar_position' );
$columns 		= ocularis_theme()->customizer->get_value( 'blog_layout_columns' );

$thumbnail 		= 'ocularis-thumb-grid-3col';
if( ( 'none' == $sidebar ) && ( '2-cols' == $columns ) ) {
    $thumbnail 		= 'ocularis-thumb-grid-2col';
} elseif( 'none' != $sidebar ) {
    $thumbnail 		= 'ocularis-thumb-grid-2col-sidebar';
}

$categories_visible 	= ocularis_theme()->customizer->get_value( 'blog_post_categories' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item grid-item' ); ?>>

    <?php ocularis_post_thumbnail( $thumbnail ); ?>

    <div class="posts-list__item-content">
        <div class="posts-list__item-top">
            <header class="entry-header">
                <div class="entry-meta"><?php
                    ocularis_posted_in( array(
                        'prefix'  => '',
                        'visible' => $categories_visible
                    ) );
                    ?></div><!-- .entry-meta -->
                <h4>
                    <?php
                    ocularis_sticky_label();
                    the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
                    ?>
                </h4>
            </header><!-- .entry-header -->

            <?php ocularis_post_excerpt(); ?>

            <div class="entry-meta">
                <?php
                ocularis_posted_by();

                ocularis_post_tags();

                ?>
            </div><!-- .entry-meta -->
        </div>
        <footer class="entry-footer">
            <?php
                ocularis_posted_on();
                ocularis_post_comments( array(
                    'prefix' => ocularis_get_icon_svg( 'comment' ),
                    'postfix' => ''
                ));
            ?>
        </footer><!-- .entry-footer -->
    </div><!-- .posts-list__item-content -->
</article><!-- #post-<?php the_ID(); ?> -->
