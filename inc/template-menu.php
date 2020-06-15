<?php
/**
 * Menu Template Functions.
 *
 * @package Onclinic
 */

/**
 * Show main menu.
 *
 * @since  1.0.0
 * @param  string $mode Default or vertical.
 * @return void
 */
function onclinic_main_menu( $mode = 'default' ) {

	$classes[] = 'main-navigation';

	$classes[] = 'main-navigation__' . esc_attr( $mode );

	?>
	<nav id="site-navigation" class="<?php echo join( ' ', $classes ); ?>" role="navigation">
		<div class="main-navigation-inner">
		<?php
			$args = apply_filters( 'onclinic-theme/menu/main-menu-args', array(
				'theme_location'   => 'main',
				'container'        => '',
				'menu_id'          => 'main-menu',
				'fallback_cb'      => 'onclinic_set_nav_menu',
				'fallback_message' => esc_html__( 'Set main menu', 'onclinic' ),
			) );

			wp_nav_menu( $args );
		?>
		</div>

		<?php onclinic_social_list( 'header' ); ?>
	</nav><!-- #site-navigation -->
	<?php
}

/**
 * Show main mobile menu.
 *
 * @since  1.0.0
 * @param  string $mode Default or vertical.
 * @return void
 */
function onclinic_main_menu_mobile( ) {
    ?>
    <nav class="stack-menu" role="navigation">
        <?php
            $args = apply_filters( 'onclinic-theme/menu/main-menu-args', array(
                'theme_location'   => 'main',
                'container'        => '',
                'menu_id'          => 'main-menu-mobile',
                'fallback_cb'      => 'onclinic_set_nav_menu',
                'fallback_message' => esc_html__( 'Set main menu', 'onclinic' ),
            ) );

            wp_nav_menu( $args );
        ?>
        <?php onclinic_social_list( 'header' ); ?>
    </nav><!-- #site-navigation -->
    <?php
}



/**
 * Get social nav menu.
 *
 * @since  1.0.0
 * @since  1.0.1  Added arguments to the filter.
 * @param  string $context Current post context - 'single' or 'loop'.
 * @param  string $type    Content type - icon, text or both.
 * @return string
 */
function onclinic_get_social_list( $context, $type = 'icon' ) {
	static $instance = 0;
	$instance++;

	$container_class = array( 'social-list' );

	if ( ! empty( $context ) ) {
		$container_class[] = sprintf( 'social-list--%s', sanitize_html_class( $context ) );
	}

	$container_class[] = sprintf( 'social-list--%s', sanitize_html_class( $type ) );

	$args = apply_filters( 'onclinic-theme/social/list-args', array(
		'theme_location'   => 'social',
		'container'        => 'div',
		'container_class'  => join( ' ', $container_class ),
		'menu_id'          => "social-list-{$instance}",
		'menu_class'       => 'social-list__items inline-list',
		'depth'            => 1,
		'link_before'      => ( 'icon' == $type ) ? '<span class="screen-reader-text">' : '',
		'link_after'       => ( 'icon' == $type ) ? '</span>' : '',
		'echo'             => false,
		'fallback_cb'      => 'onclinic_set_nav_menu',
		'fallback_message' => esc_html__( 'Set social menu', 'onclinic' ),
	), $context, $type );

	return wp_nav_menu( $args );
}

/**
 * Set callback function for nav menu.
 *
 * @param  array $args Nav menu arguments.
 * @return void
 */
function onclinic_set_nav_menu( $args ) {

	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return null;
	}

	$format = '<div class="set-menu %3$s"><a href="%2$s" target="_blank" class="set-menu_link">%1$s</a></div>';
	$label  = $args['fallback_message'];
	$url    = esc_url( admin_url( 'nav-menus.php' ) );

	printf( $format, $label, $url, $args['container_class'] );
}

/**
 * Show main menu toggle.
 *
 * @since  1.0.0
 * @param  bool  $echo Return or print.
 * @return string|bool
 */
function onclinic_main_menu_toggle( $echo = true ) {
	$toggle_html = apply_filters(
		'onclinic_main_menu_toggle_html',
		'<div class="menu-toggle-wrapper"><button class="menu-toggle btn-initial" aria-controls="main-menu" aria-expanded="false"><span class="menu-toggle-box"></button></div>'
	);

	echo wp_kses_post( $toggle_html );
}