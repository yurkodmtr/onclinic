<?php
/**
 * Template part for displaying default posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Onclinic
 */

$sidebar 				= onclinic_theme()->customizer->get_value( 'blog_sidebar_position' );
$categories_visible 	= onclinic_theme()->customizer->get_value( 'blog_post_categories' );
$thumbnail 				= ( 'none' != $sidebar ) ? 'onclinic-thumb-listing2' : 'onclinic-thumb-listing';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('posts-list__item default-item clear'); ?>>

    <?php onclinic_post_thumbnail( $thumbnail ); ?>

    <div class="posts-list__item-content">

        <div class="posts-list__item-content__top">
            <header class="entry-header">
                <div class="entry-meta"><?php
                    onclinic_posted_in( array(
                        'prefix'  => '',
                        'visible' => $categories_visible
                    ) );
                    ?></div><!-- .entry-meta -->
                <h3 class="entry-title"><?php
                    onclinic_sticky_label();
                    the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
                    ?></h3>
            </header><!-- .entry-header -->
            <?php onclinic_post_excerpt(); ?>
            <footer class="entry-footer">
                <div class="entry-footer-container">
                    <div class="post__button-wrap"><?php
                        onclinic_post_link();
                        ?></div>
                </div>
            </footer><!-- .entry-footer -->
        </div>

        <div class="entry-meta entry-meta__footer">
            <div class="entry-meta__left_side">
                <?php
                onclinic_posted_by();
                onclinic_posted_on(array(
                    'prefix' => 'posted '
                ));
                ?>
                <div class="tag_list">
                    <?php onclinic_post_tags();?>
                </div>
            </div>
            <div class="entry-meta__right_side">
                <?php
                onclinic_post_comments( array(
                    'prefix' => onclinic_get_icon_svg( 'comment' ),
                    'postfix' => ''
                ));
                ?>
            </div>

        </div><!-- .entry-meta -->

    </div><!-- .posts-list__item-content -->

</article><!-- #post-<?php the_ID(); ?> -->
