<?php
/**
 * The template for displaying author bio.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Ocularis
 * @subpackage widgets
 */

$is_enabled = ocularis_theme()->customizer->get_value('post_authorbio_block');

if (!$is_enabled) {
    return;
}

?>

<div class="post-author-bio">
    <div class="post-author__holder textaligncenter">
        <div class="post-author__avatar">
            <?php ocularis_get_post_author_avatar(); ?>
        </div>
        <div class="post-author__content">
            <div class="post-author__about_text">
                About Author
            </div>
            <h3 class="post-author__title">
                <?php ocularis_get_post_author(); ?>
            </h3>
            <div class="post-author__content">
                <?php ocularis_get_author_meta(); ?>
            </div>
            <div class="post-author__social">
                <?php echo ocularis_get_author_social_networks(); ?>
            </div>
        </div>
    </div>
</div>