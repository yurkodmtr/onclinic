<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Onclinic
 */

?>

<footer class="entry-footer">
	<div class="entry-footer-container">
		<div class="entry-meta">
			<?php
				onclinic_post_tags ( array(
					'prefix'    => '<strong>' . esc_html__( 'Tag cloud:', 'onclinic' ) . '</strong>',
					'delimiter' => ''
				) );
			?>
		</div>
	</div>
</footer><!-- .entry-footer -->