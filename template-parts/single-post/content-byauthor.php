<?php
/**
 * The template for displaying by author block.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Onclinic
 * @subpackage widgets
 */

$author 		= onclinic_theme()->customizer->get_value( 'single_post_author' );
$date 			= onclinic_theme()->customizer->get_value( 'single_post_publish_date' );
$comments 		= onclinic_theme()->customizer->get_value( 'single_post_comments' );

if ( ! $author && ! $date && ! $comments ) {
	return;
}

?>

<div class="post-by-author col-xs-12 col-md-4">
	<?php if( $author ) { ?>
		<div class="post-by-author__avatar"><?php
			onclinic_get_post_author_avatar( array(
				'size' => 60
			) );
		?></div>
	<?php } ?>
	<div class="post-by-author__content">
		<?php if( $author ) { ?>
			<p class="post-by-author__title"><?php
				onclinic_get_post_author( array(
					'prefix' 	=> esc_html__( 'by', 'onclinic' )
				) );
			?></p>
			<div class="post-by-author__content"><?php
				onclinic_get_author_meta();
			?></div>
		<?php } ?>
		<div class="post-by-author__meta"><?php
			onclinic_posted_on( array(
				'prefix' 	=> esc_html__( 'Posted', 'onclinic' ) . '<br>'
			) );
			onclinic_post_comments( array(
				'prefix' => onclinic_get_icon_svg( 'comment' )
			));
		?></div>
	</div>
</div>