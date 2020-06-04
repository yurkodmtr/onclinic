<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Onclinic
 */
?>

<?php do_action( 'onclinic-theme/widget-area/render', 'footer-area' ); ?>

<div <?php onclinic_footer_class(); ?>>
	<div class="space-between-content"><?php
		onclinic_footer_copyright();
	?></div>
</div><!-- .container -->

<?php onclinic_footer_newsletter_popup(); ?>
