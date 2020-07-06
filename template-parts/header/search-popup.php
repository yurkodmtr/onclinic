<?php
/**
 * The template for displaying the header search form
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Onclinic
 */

$label 			= onclinic_theme()->customizer->get_value( 'header_search_label' );
$placeholder 	= onclinic_theme()->customizer->get_value( 'header_search_placeholder' );
?>

<div class="header-search-popup">
	<button class="header-search-popup-close"><?php echo onclinic_get_icon_svg( 'close' ); ?></button>
	<div class="header-search-popup__inner">
		<form role="search" method="get" class="header-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <div class="header-search-form__icon"><?php echo onclinic_get_icon_svg( 'search' ); ?></div>
			<label class="header-search-form__label"><?php echo esc_html( $label ); ?></label>
			<input type="search" class="header-search-form__field" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo get_search_query() ?>" name="s">
		</form>
	</div>
</div>
