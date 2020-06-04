<?php
/**
 * The template for displaying search form.
 *
 * @package Onclinic
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="search-form__input-wrap">
		<label></label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'onclinic' ) ?></span>
		<input type="search" class="search-form__field" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'onclinic' ) ?>" value="<?php echo get_search_query() ?>" name="s">
		<button type="submit" class="search-form__submit btn btn-initial"><?php echo onclinic_get_icon_svg( 'search' ); ?></button>
	</div>
</form>
