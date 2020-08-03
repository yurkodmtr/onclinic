<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Ocularis
 */
?>

<?php do_action( 'ocularis-theme/widget-area/render', 'footer-area' ); ?>

<div <?php ocularis_footer_class(); ?>>
	<div class="space-between-content"><?php
		ocularis_footer_copyright();
	?></div>
</div><!-- .container -->

<?php ocularis_footer_newsletter_popup(); ?>
