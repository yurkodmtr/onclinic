<?php
/**
 * The template for displaying by author block.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Ocularis
 * @subpackage widgets
 */

$author 		= ocularis_theme()->customizer->get_value( 'single_post_author' );
$date 			= ocularis_theme()->customizer->get_value( 'single_post_publish_date' );
$comments 		= ocularis_theme()->customizer->get_value( 'single_post_comments' );

if ( ! $author && ! $date && ! $comments ) {
	return;
}

?>

<div class="post_by_author">
    <div class="left_side">
        <div class="post_by_author__ava">
            <?php
                ocularis_get_post_author_avatar( array(
                    'size' => 64
                ) );
            ?>
        </div>
        <div class="post_by_author__by">
            <?php
                ocularis_get_post_author( array(
                    'prefix' 	=> esc_html__( 'by', 'ocularis' )
                ) );
                ocularis_posted_on( array(
                    'prefix' 	=> esc_html__( 'posted', 'ocularis' )
                ) );
            ?>
        </div>
    </div>
    <div class="right_side">
        <?php
            ocularis_post_comments( array(
                'prefix' => ocularis_get_icon_svg( 'comment' ),
                'postfix' => ''
            ));
        ?>
    </div>
</div>

<div class="post-by-author col-xs-12 col-md-4" style="display:none;">
	<?php if( $author ) { ?>
		<div class="post-by-author__avatar"><?php
			ocularis_get_post_author_avatar( array(
				'size' => 60
			) );
		?></div>
	<?php } ?>
	<div class="post-by-author__content">
		<?php if( $author ) { ?>
			<p class="post-by-author__title"><?php
				ocularis_get_post_author( array(
					'prefix' 	=> esc_html__( 'by', 'ocularis' )
				) );
			?></p>
			<div class="post-by-author__content"><?php
				ocularis_get_author_meta();
			?></div>
		<?php } ?>
		<div class="post-by-author__meta"><?php
			ocularis_posted_on( array(
				'prefix' 	=> esc_html__( 'Posted', 'ocularis' ) . '<br>'
			) );
			ocularis_post_comments( array(
				'prefix' => ocularis_get_icon_svg( 'comment' )
			));
		?></div>
	</div>
</div>