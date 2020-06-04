<?php
/**
 * The template for displaying author bio.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Onclinic
 * @subpackage widgets
 */

$is_enabled = onclinic_theme()->customizer->get_value( 'post_authorbio_block' );

if ( ! $is_enabled ) {
	return;
}

?>

<div class="post-author-bio col-md-7">
	<div class="post-author__holder textaligncenter">
			<div class="post-author__avatar"><?php
			onclinic_get_post_author_avatar();
		?></div>
		<div class="post-author__content">
			<h3 class="post-author__title h4-style"><?php
				onclinic_get_post_author();
			?></h3>
			<p class="post-author__role"><?php
				onclinic_get_author_role_name();
			?></p>
			<div class="post-author__content"><?php
				onclinic_get_author_meta();
			?></div>
			<div class="post-author__social"><?php
				echo onclinic_get_author_social_networks();
			?></div>
		</div>
	</div>
	<div class="post-author__overlay"></div>
</div>