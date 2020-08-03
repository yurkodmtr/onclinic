<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ocularis
 */

?>

<footer class="entry-footer">
	<div class="entry-footer-container">
		<div class="entry-meta">
			<?php
				ocularis_post_tags ( array(
					'prefix'    => '<strong>' . esc_html__( 'Tag cloud:', 'ocularis' ) . '</strong>',
					'delimiter' => ''
				) );
			?>
		</div>
	</div>
</footer><!-- .entry-footer -->