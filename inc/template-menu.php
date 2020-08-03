<?php
/**
 * Menu Template Functions.
 *
 * @package Ocularis
 */

/**
 * Show main menu.
 *
 * @since  1.0.0
 * @param  string $mode Default or vertical.
 * @return void
 */
function ocularis_main_menu( $mode = 'default' ) {

	$classes[] = 'main-navigation';

	$classes[] = 'main-navigation__' . esc_attr( $mode );

	?>
	<nav id="site-navigation" class="<?php echo join( ' ', $classes ); ?>" role="navigation">
		<div class="main-navigation-inner">
		<?php
			$args = apply_filters( 'ocularis-theme/menu/main-menu-args', array(
				'theme_location'   => 'main',
				'container'        => '',
				'menu_id'          => 'main-menu',
				'fallback_cb'      => 'ocularis_set_nav_menu',
				'fallback_message' => esc_html__( 'Set main menu', 'ocularis' ),
			) );

			wp_nav_menu( $args );
		?>
		</div>

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
function ocularis_main_menu_mobile( ) {
    ?>
    <nav class="stack-menu" role="navigation">
        <?php
            $args = apply_filters( 'ocularis-theme/menu/main-menu-args', array(
                'theme_location'   => 'main',
                'container'        => '',
                'menu_id'          => 'main-menu-mobile',
                'fallback_cb'      => 'ocularis_set_nav_menu',
                'fallback_message' => esc_html__( 'Set main menu', 'ocularis' ),
            ) );

            wp_nav_menu( $args );
        ?>
    </nav><!-- #site-navigation -->
    <?php
}



/**
 * Set callback function for nav menu.
 *
 * @param  array $args Nav menu arguments.
 * @return void
 */
function ocularis_set_nav_menu( $args ) {

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
function ocularis_main_menu_toggle( $echo = true ) {
	$toggle_html = apply_filters(
		'ocularis_main_menu_toggle_html',
		'<div class="menu-toggle-wrapper"><button class="menu-toggle btn-initial" aria-controls="main-menu" aria-expanded="false"><span class="menu-toggle-box"></button></div>'
	);

	echo wp_kses_post( $toggle_html );
}