<?php
/**
 * Theme Customizer.
 *
 * @package Onclinic
 */

/**
 * Retrieve a holder for Customizer options.
 *
 * @since  1.0.0
 * @return array
 */

function onclinic_get_customizer_options() {
	/**
	 * Filter a holder for Customizer options (for theme/plugin developer customization).
	 *
	 * @since 1.0.0
	 */
	return apply_filters( 'onclinic-theme/customizer/options' , array(
		'prefix'        => 'onclinic',
		'path'          => get_theme_file_path( 'framework/modules/customizer/' ),
		'capability'    => 'edit_theme_options',
		'type'          => 'theme_mod',
		'fonts_manager' => new CX_Fonts_Manager(),
		'options'       => array(

			/** `Site Identity` section */
			'logo_retina' => array(
				'title' 			=> esc_html__( 'Retina Logo', 'onclinic' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 8,
				'field' 			=> 'image',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'logo_retina_height' => array(
				'title' 			=> esc_html__( 'Logo Height, px', 'onclinic' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 9,
				'default' 			=> 40,
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => 20,
					'max'  => 100,
					'step' => 1,
				),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'site_tagline' => array(
				'title' 			=> esc_html__( 'Show Site Tagline', 'onclinic' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 10,
				'default' 			=> false,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),

			/** `General` panel */
			'general_settings' => array(
				'title'       => esc_html__( 'General Site settings', 'onclinic' ),
				'priority'    => 40,
				'type'        => 'panel',
			),

			/** `Favicon` section */
			'favicon' => array(
				'title'       => esc_html__( 'Favicon', 'onclinic' ),
				'priority'    => 25,
				'panel'       => 'general_settings',
				'type'        => 'section',
			),

			/** `Preloader` section */
			'preloader_section' => array(
				'title'    => esc_html__( 'Page Preloader', 'onclinic' ),
				'priority' => 30,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'page_preloader' => array(
				'title'    => esc_html__( 'Show page preloader', 'onclinic' ),
				'section'  => 'preloader_section',
				'priority' => 30,
				'default'  => false,
				'field'    => 'checkbox',
				'type'     => 'control',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs' => array(
				'title'    => esc_html__( 'Breadcrumbs', 'onclinic' ),
				'priority' => 30,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'breadcrumbs_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs', 'onclinic' ),
				'section' => 'breadcrumbs',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_front_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs on front page', 'onclinic' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_path_type' => array(
				'title'   => esc_html__( 'Show full/minified path', 'onclinic' ),
				'section' => 'breadcrumbs',
				'default' => 'full',
				'field'   => 'select',
				'choices' => array(
					'full'     => esc_html__( 'Full', 'onclinic' ),
					'minified' => esc_html__( 'Minified', 'onclinic' ),
				),
				'type'    => 'control',
			),
			'breadcrumbs_text_color' => array(
				'title'       => esc_html__( 'Text Color', 'onclinic' ),
				'description' => esc_html__( 'Here you can choose whether your text should be light or dark. If you are working with a dark background, then your text should be light. If your background is light, then your text should be set to dark.', 'onclinic' ),
				'section'     => 'breadcrumbs',
				'default'     => 'dark',
				'field'       => 'select',
				'choices'     => onclinic_get_text_color(),
				'type'        => 'control',
			),

			/** `Page Layout` section */
			'page_layout' => array(
				'title' 			=> esc_html__( 'Page Layout', 'onclinic' ),
				'priority' 			=> 55,
				'type' 				=> 'section',
				'panel' 			=> 'general_settings',
			),
			'container_type' => array(
				'title' 			=> esc_html__( 'Container Type', 'onclinic' ),
				'section' 			=> 'page_layout',
				'default' 			=> 'boxed',
				'field' 			=> 'select',
				'choices' 			=> array(
					'boxed'     => esc_html__( 'Boxed', 'onclinic' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'onclinic' ),
				),
				'type' 				=> 'control',
			),
			'container_width' => array(
				'title' 			=> esc_html__( 'Container Width, px', 'onclinic' ),
				'section' 			=> 'page_layout',
				'default' 			=> 1160,
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => 700,
					'max'  => 2000,
					'step' => 1,
				),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'sidebar_width' => array(
				'title' 			=> esc_html__( 'Sidebar width', 'onclinic' ),
				'section' 			=> 'page_layout',
				'default' 			=> '1/4',
				'field' 			=> 'select',
				'choices' 			=> array(
					'1/3' => '1/3',
					'1/4' => '1/4',
				),
				'sanitize_callback' => 'sanitize_text_field',
				'type' 				=> 'control',
			),

			/* Sticky Sidebar */
			'sticky_sidebar' => array(
				'title' 			=> esc_html__( 'Sticky Sidebar', 'onclinic' ),
				'section' 			=> 'page_layout',
				'default' 			=> false,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),

			/** `Preloader` section */
			'totop_section' => array(
				'title'    => esc_html__( 'ToTop Button', 'onclinic' ),
				'priority' => 60,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'totop_visibility' => array(
				'title'   => esc_html__( 'Show ToTop Button', 'onclinic' ),
				'section' => 'totop_section',
				'priority' => 60,
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Color Scheme` panel */
			'color_scheme' => array(
				'title'       => esc_html__( 'Color Scheme', 'onclinic' ),
				'description' => esc_html__( 'Configure Color Scheme', 'onclinic' ),
				'priority'    => 40,
				'type'        => 'section',
			),

            'dark_blue_color' => array(
                'title'   => esc_html__( 'Dark blue', 'onclinic' ),
                'section' => 'color_scheme',
                'default' => '#121F4B',
                'field'   => 'hex_color',
                'type'    => 'control',
            ),
            'dark_blue_lighter_1_color' => array(
                'title'   => esc_html__( 'Dark blue lighter 1', 'onclinic' ),
                'section' => 'color_scheme',
                'default' => '#1E306E',
                'field'   => 'hex_color',
                'type'    => 'control',
            ),
            'dark_blue_lighter_2_color' => array(
                'title'   => esc_html__( 'Dark blue lighter 2', 'onclinic' ),
                'section' => 'color_scheme',
                'default' => '#DDE0E9',
                'field'   => 'hex_color',
                'type'    => 'control',
            ),
            'dark_blue_lighter_3_color' => array(
                'title'   => esc_html__( 'Dark blue lighter 3', 'onclinic' ),
                'section' => 'color_scheme',
                'default' => '#F6F7F9',
                'field'   => 'hex_color',
                'type'    => 'control',
            ),
            'blue_color' => array(
                'title'   => esc_html__( 'Blue color', 'onclinic' ),
                'section' => 'color_scheme',
                'default' => '#298CD3',
                'field'   => 'hex_color',
                'type'    => 'control',
            ),
            'blue_color_lighter_1' => array(
                'title'   => esc_html__( 'Blue color lighter 1', 'onclinic' ),
                'section' => 'color_scheme',
                'default' => '#89CCF7',
                'field'   => 'hex_color',
                'type'    => 'control',
            ),
            'blue_color_lighter_2' => array(
                'title'   => esc_html__( 'Blue color lighter 2', 'onclinic' ),
                'section' => 'color_scheme',
                'default' => '#BCE0F7',
                'field'   => 'hex_color',
                'type'    => 'control',
            ),
            'blue_color_lighter_3' => array(
                'title'   => esc_html__( 'Blue color lighter 3', 'onclinic' ),
                'section' => 'color_scheme',
                'default' => '#E0F3FD',
                'field'   => 'hex_color',
                'type'    => 'control',
            ),
            'blue_color_lighter_4' => array(
                'title'   => esc_html__( 'Blue color lighter 4', 'onclinic' ),
                'section' => 'color_scheme',
                'default' => '#EFF9FE',
                'field'   => 'hex_color',
                'type'    => 'control',
            ),
            'purple_color' => array(
                'title'   => esc_html__( 'Purple color', 'onclinic' ),
                'section' => 'color_scheme',
                'default' => '#8067BD',
                'field'   => 'hex_color',
                'type'    => 'control',
            ),
            'purple_color_lighter_1' => array(
                'title'   => esc_html__( 'Purple color lighter 1', 'onclinic' ),
                'section' => 'color_scheme',
                'default' => '#9985CA',
                'field'   => 'hex_color',
                'type'    => 'control',
            ),
            'purple_color_lighter_2' => array(
                'title'   => esc_html__( 'Purple color lighter 2', 'onclinic' ),
                'section' => 'color_scheme',
                'default' => '#F8F5FF',
                'field'   => 'hex_color',
                'type'    => 'control',
            ),

			'accent_color' => array(
				'title'   => esc_html__( 'Accent color', 'onclinic' ),
				'section' => 'color_scheme',
				'default' => '#558dd9',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'primary_text_color' => array(
				'title'   => esc_html__( 'Primary Text color', 'onclinic' ),
				'section' => 'color_scheme',
				'default' => '#1E306E',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'secondary_text_color' => array(
				'title'   => esc_html__( 'Secondary Text color', 'onclinic' ),
				'section' => 'color_scheme',
				'default' => '#298CD3',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'link_color' => array(
				'title'   => esc_html__( 'Link color', 'onclinic' ),
				'section' => 'color_scheme',
				'default' => '#298CD3',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'onclinic' ),
				'section' => 'color_scheme',
				'default' => '#8067BD',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'onclinic' ),
				'section' => 'color_scheme',
				'default' => '#1E306E',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'onclinic' ),
				'section' => 'color_scheme',
				'default' => '#1E306E',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'onclinic' ),
				'section' => 'color_scheme',
				'default' => '#1E306E',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'onclinic' ),
				'section' => 'color_scheme',
				'default' => '#1E306E',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'onclinic' ),
				'section' => 'color_scheme',
				'default' => '#1E306E',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'onclinic' ),
				'section' => 'color_scheme',
				'default' => '#1E306E',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'grey_color_1' => array(
				'title'   => esc_html__( 'Grey color (1)', 'onclinic' ),
				'section' => 'color_scheme',
				'default' => '#f8f8f8', // new !
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_text_color' => array(
				'title'   => esc_html__( 'Invert Text color', 'onclinic' ),
				'section' => 'color_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			'btn_text_color' => array(
				'title'   => esc_html__( 'Button Text Color', 'onclinic' ),
				'section' => 'color_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'btn_border_color' => array(
				'title'   => esc_html__( 'Button Border Color', 'onclinic' ),
				'section' => 'color_scheme',
				'default' => '#222222',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'btn_bg_color' => array(
				'title'   => esc_html__( 'Button Background Color', 'onclinic' ),
				'section' => 'color_scheme',
				'default' => '#222222',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Typography Settings` panel */
			'typography' => array(
				'title'       => esc_html__( 'Typography', 'onclinic' ),
				'description' => esc_html__( 'Configure typography settings', 'onclinic' ),
				'priority'    => 45,
				'type'        => 'panel',
			),

			/** `Body text` section */
			'body_typography' => array(
				'title'       => esc_html__( 'Body Text', 'onclinic' ),
				'priority'    => 5,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'body_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'onclinic' ),
				'section' => 'body_typography',
				'default' => 'Gothic A1, serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'body_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'onclinic' ),
				'section' => 'body_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => onclinic_get_font_styles(),
				'type'    => 'control',
			),
			'body_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'onclinic' ),
				'section' => 'body_typography',
				'default' => '300',
				'field'   => 'select',
				'choices' => onclinic_get_font_weight(),
				'type'    => 'control',
			),
			'body_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'onclinic' ),
				'section'     => 'body_typography',
				'default'     => '18',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'body_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'onclinic' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'onclinic' ),
				'section'     => 'body_typography',
				'default'     => '1.222',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'body_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'onclinic' ),
				'section'     => 'body_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'body_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'onclinic' ),
				'section' => 'body_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => onclinic_get_character_sets(),
				'type'    => 'control',
			),
			'body_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'onclinic' ),
				'section' => 'body_typography',
				'default' => 'left',
				'field'   => 'select',
				'choices' => onclinic_get_text_aligns(),
				'type'    => 'control',
			),
			'body_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'onclinic' ),
				'section' => 'body_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => onclinic_get_text_transform(),
				'type'    => 'control',
			),

			/** `H1 Heading` section */
			'h1_typography' => array(
				'title'       => esc_html__( 'H1 Heading', 'onclinic' ),
				'priority'    => 10,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h1_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'onclinic' ),
				'section' => 'h1_typography',
				'default' => 'Gothic A1, serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h1_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'onclinic' ),
				'section' => 'h1_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => onclinic_get_font_styles(),
				'type'    => 'control',
			),
			'h1_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'onclinic' ),
				'section' => 'h1_typography',
				'default' => '500',
				'field'   => 'select',
				'choices' => onclinic_get_font_weight(),
				'type'    => 'control',
			),
			'h1_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'onclinic' ),
				'section'     => 'h1_typography',
				'default'     => '60',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h1_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'onclinic' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'onclinic' ),
				'section'     => 'h1_typography',
				'default'     => '1.25',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h1_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'onclinic' ),
				'section'     => 'h1_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h1_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'onclinic' ),
				'section' => 'h1_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => onclinic_get_character_sets(),
				'type'    => 'control',
			),
			'h1_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'onclinic' ),
				'section' => 'h1_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => onclinic_get_text_aligns(),
				'type'    => 'control',
			),
			'h1_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'onclinic' ),
				'section' => 'h1_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => onclinic_get_text_transform(),
				'type'    => 'control',
			),

			/** `H2 Heading` section */
			'h2_typography' => array(
				'title'       => esc_html__( 'H2 Heading', 'onclinic' ),
				'priority'    => 15,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h2_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'onclinic' ),
				'section' => 'h2_typography',
				'default' => 'Gothic A1, serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h2_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'onclinic' ),
				'section' => 'h2_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => onclinic_get_font_styles(),
				'type'    => 'control',
			),
			'h2_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'onclinic' ),
				'section' => 'h2_typography',
				'default' => '500',
				'field'   => 'select',
				'choices' => onclinic_get_font_weight(),
				'type'    => 'control',
			),
			'h2_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'onclinic' ),
				'section'     => 'h2_typography',
				'default'     => '48',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h2_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'onclinic' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'onclinic' ),
				'section'     => 'h2_typography',
				'default'     => '1.25',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h2_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'onclinic' ),
				'section'     => 'h2_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h2_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'onclinic' ),
				'section' => 'h2_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => onclinic_get_character_sets(),
				'type'    => 'control',
			),
			'h2_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'onclinic' ),
				'section' => 'h2_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => onclinic_get_text_aligns(),
				'type'    => 'control',
			),
			'h2_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'onclinic' ),
				'section' => 'h2_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => onclinic_get_text_transform(),
				'type'    => 'control',
			),

			/** `H3 Heading` section */
			'h3_typography' => array(
				'title'       => esc_html__( 'H3 Heading', 'onclinic' ),
				'priority'    => 20,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h3_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'onclinic' ),
				'section' => 'h3_typography',
				'default' => 'Gothic A1, serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h3_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'onclinic' ),
				'section' => 'h3_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => onclinic_get_font_styles(),
				'type'    => 'control',
			),
			'h3_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'onclinic' ),
				'section' => 'h3_typography',
				'default' => '500',
				'field'   => 'select',
				'choices' => onclinic_get_font_weight(),
				'type'    => 'control',
			),
			'h3_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'onclinic' ),
				'section'     => 'h3_typography',
				'default'     => '34',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h3_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'onclinic' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'onclinic' ),
				'section'     => 'h3_typography',
				'default'     => '1.23',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h3_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'onclinic' ),
				'section'     => 'h3_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h3_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'onclinic' ),
				'section' => 'h3_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => onclinic_get_character_sets(),
				'type'    => 'control',
			),
			'h3_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'onclinic' ),
				'section' => 'h3_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => onclinic_get_text_aligns(),
				'type'    => 'control',
			),
			'h3_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'onclinic' ),
				'section' => 'h3_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => onclinic_get_text_transform(),
				'type'    => 'control',
			),

			/** `H4 Heading` section */
			'h4_typography' => array(
				'title'       => esc_html__( 'H4 Heading', 'onclinic' ),
				'priority'    => 25,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h4_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'onclinic' ),
				'section' => 'h4_typography',
				'default' => 'Gothic A1, serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h4_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'onclinic' ),
				'section' => 'h4_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => onclinic_get_font_styles(),
				'type'    => 'control',
			),
			'h4_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'onclinic' ),
				'section' => 'h4_typography',
				'default' => '600',
				'field'   => 'select',
				'choices' => onclinic_get_font_weight(),
				'type'    => 'control',
			),
			'h4_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'onclinic' ),
				'section'     => 'h4_typography',
				'default'     => '24',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h4_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'onclinic' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'onclinic' ),
				'section'     => 'h4_typography',
				'default'     => '1.25',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h4_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'onclinic' ),
				'section'     => 'h4_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h4_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'onclinic' ),
				'section' => 'h4_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => onclinic_get_character_sets(),
				'type'    => 'control',
			),
			'h4_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'onclinic' ),
				'section' => 'h4_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => onclinic_get_text_aligns(),
				'type'    => 'control',
			),
			'h4_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'onclinic' ),
				'section' => 'h4_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => onclinic_get_text_transform(),
				'type'    => 'control',
			),

			/** `H5 Heading` section */
			'h5_typography' => array(
				'title'       => esc_html__( 'H5 Heading', 'onclinic' ),
				'priority'    => 30,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h5_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'onclinic' ),
				'section' => 'h5_typography',
				'default' => 'Gothic A1, serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h5_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'onclinic' ),
				'section' => 'h5_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => onclinic_get_font_styles(),
				'type'    => 'control',
			),
			'h5_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'onclinic' ),
				'section' => 'h5_typography',
				'default' => '600',
				'field'   => 'select',
				'choices' => onclinic_get_font_weight(),
				'type'    => 'control',
			),
			'h5_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'onclinic' ),
				'section'     => 'h5_typography',
				'default'     => '20',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h5_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'onclinic' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'onclinic' ),
				'section'     => 'h5_typography',
				'default'     => '1.25',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h5_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'onclinic' ),
				'section'     => 'h5_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h5_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'onclinic' ),
				'section' => 'h5_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => onclinic_get_character_sets(),
				'type'    => 'control',
			),
			'h5_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'onclinic' ),
				'section' => 'h5_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => onclinic_get_text_aligns(),
				'type'    => 'control',
			),
			'h5_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'onclinic' ),
				'section' => 'h5_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => onclinic_get_text_transform(),
				'type'    => 'control',
			),

			/** `H6 Heading` section */
			'h6_typography' => array(
				'title'       => esc_html__( 'H6 Heading', 'onclinic' ),
				'priority'    => 35,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h6_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'onclinic' ),
				'section' => 'h6_typography',
				'default' => 'Gothic A1, serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h6_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'onclinic' ),
				'section' => 'h6_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => onclinic_get_font_styles(),
				'type'    => 'control',
			),
			'h6_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'onclinic' ),
				'section' => 'h6_typography',
				'default' => '600',
				'field'   => 'select',
				'choices' => onclinic_get_font_weight(),
				'type'    => 'control',
			),
			'h6_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'onclinic' ),
				'section'     => 'h6_typography',
				'default'     => '16',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h6_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'onclinic' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'onclinic' ),
				'section'     => 'h6_typography',
				'default'     => '1.25',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h6_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'onclinic' ),
				'section'     => 'h6_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h6_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'onclinic' ),
				'section' => 'h6_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => onclinic_get_character_sets(),
				'type'    => 'control',
			),
			'h6_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'onclinic' ),
				'section' => 'h6_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => onclinic_get_text_aligns(),
				'type'    => 'control',
			),
			'h6_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'onclinic' ),
				'section' => 'h6_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => onclinic_get_text_transform(),
				'type'    => 'control',
			),

			/** `Logo text` section */
			'logo_typography' => array(
				'title'       => esc_html__( 'Logo Text', 'onclinic' ),
				'priority'    => 40,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'header_logo_font_family' => array(
				'title'           => esc_html__( 'Font Family', 'onclinic' ),
				'section'         => 'logo_typography',
				'default'         => 'Gothic A1, serif',
				'field'           => 'fonts',
				'type'            => 'control',
			),
			'header_logo_font_style' => array(
				'title'           => esc_html__( 'Font Style', 'onclinic' ),
				'section'         => 'logo_typography',
				'default'         => 'normal',
				'field'           => 'select',
				'choices'         => onclinic_get_font_styles(),
				'type'            => 'control',
			),
			'header_logo_font_weight' => array(
				'title'           => esc_html__( 'Font Weight', 'onclinic' ),
				'section'         => 'logo_typography',
				'default'         => '400',
				'field'           => 'select',
				'choices'         => onclinic_get_font_weight(),
				'type'            => 'control',
			),
			'header_logo_font_size' => array(
				'title'           => esc_html__( 'Font Size, px', 'onclinic' ),
				'section'         => 'logo_typography',
				'default'         => '30',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'            => 'control',
			),
			'header_logo_character_set' => array(
				'title'           => esc_html__( 'Character Set', 'onclinic' ),
				'section'         => 'logo_typography',
				'default'         => 'latin',
				'field'           => 'select',
				'choices'         => onclinic_get_character_sets(),
				'type'            => 'control',
			),

			/** `Menu` section */
			'menu_typography' => array(
				'title'       => esc_html__( 'Menu', 'onclinic' ),
				'priority'    => 45,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'menu_font_family' => array(
				'title'           => esc_html__( 'Font Family', 'onclinic' ),
				'section'         => 'menu_typography',
				'default'         => 'Gothic A1, serif',
				'field'           => 'fonts',
				'type'            => 'control',
			),
			'menu_font_style' => array(
				'title'           => esc_html__( 'Font Style', 'onclinic' ),
				'section'         => 'menu_typography',
				'default'         => 'normal',
				'field'           => 'select',
				'choices'         => onclinic_get_font_styles(),
				'type'            => 'control',
			),
			'menu_font_weight' => array(
				'title'           => esc_html__( 'Font Weight', 'onclinic' ),
				'section'         => 'menu_typography',
				'default'         => '500',
				'field'           => 'select',
				'choices'         => onclinic_get_font_weight(),
				'type'            => 'control',
			),
			'menu_font_size' => array(
				'title'           => esc_html__( 'Font Size, px', 'onclinic' ),
				'section'         => 'menu_typography',
				'default'         => '16',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'            => 'control',
			),
			'menu_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'onclinic' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'onclinic' ),
				'section'     => 'menu_typography',
				'default'     => '1.25',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'menu_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'onclinic' ),
				'section'     => 'menu_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'menu_character_set' => array(
				'title' 			=> esc_html__( 'Character Set', 'onclinic' ),
				'section' 			=> 'menu_typography',
				'default' 			=> 'latin',
				'field' 			=> 'select',
				'choices' 			=> onclinic_get_character_sets(),
				'type' 				=> 'control',
			),
			'menu_text_transform' => array(
				'title' 			=> esc_html__( 'Text Transform', 'onclinic' ),
				'section' 			=> 'menu_typography',
				'default' 			=> 'none',
				'field' 			=> 'select',
				'choices' 			=> onclinic_get_text_transform(),
				'type' 				=> 'control',
			),

			/** `Meta` section */
			'meta_typography' => array(
				'title'       => esc_html__( 'Meta', 'onclinic' ),
				'priority'    => 50,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'meta_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'onclinic' ),
				'section' => 'meta_typography',
				'default' => 'Gothic A1, serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'meta_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'onclinic' ),
				'section' => 'meta_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => onclinic_get_font_styles(),
				'type'    => 'control',
			),
			'meta_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'onclinic' ),
				'section' => 'meta_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => onclinic_get_font_weight(),
				'type'    => 'control',
			),
			'meta_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'onclinic' ),
				'section'     => 'meta_typography',
				'default'     => '12',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'meta_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'onclinic' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'onclinic' ),
				'section'     => 'meta_typography',
				'default'     => '1.75',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'meta_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'onclinic' ),
				'section'     => 'meta_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'meta_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'onclinic' ),
				'section' => 'meta_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => onclinic_get_character_sets(),
				'type'    => 'control',
			),
			'meta_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'onclinic' ),
				'section' => 'meta_typography',
				'default' => 'uppercase',
				'field'   => 'select',
				'choices' => onclinic_get_text_transform(),
				'type'    => 'control',
			),

			/** `Button` section */
			'button_typography' => array(
				'title' 			=> esc_html__( 'Button', 'onclinic' ),
				'priority' 			=> 55,
				'panel' 			=> 'typography',
				'type' 				=> 'section',
			),
			'button_font_family' => array(
				'title' 			=> esc_html__( 'Font Family', 'onclinic' ),
				'section' 			=> 'button_typography',
				'default' 			=> 'Gothic A1, serif',
				'field' 			=> 'fonts',
				'type' 				=> 'control',
			),
			'button_font_style' => array(
				'title' 			=> esc_html__( 'Font Style', 'onclinic' ),
				'section' 			=> 'button_typography',
				'default' 			=> 'normal',
				'field' 			=> 'select',
				'choices' 			=> onclinic_get_font_styles(),
				'type' 				=> 'control',
			),
			'button_font_weight' => array(
				'title' 			=> esc_html__( 'Font Weight', 'onclinic' ),
				'section' 			=> 'button_typography',
				'default' 			=> '500',
				'field' 			=> 'select',
				'choices' 			=> onclinic_get_font_weight(),
				'type' 				=> 'control',
			),
			'button_text_transform' => array(
				'title' 			=> esc_html__( 'Text Transform', 'onclinic' ),
				'section' 			=> 'button_typography',
				'default' 			=> 'none',
				'field' 			=> 'select',
				'choices' 			=> onclinic_get_text_transform(),
				'type' 				=> 'control',
			),
			'button_font_size' => array(
				'title' 			=> esc_html__( 'Font Size, px', 'onclinic' ),
				'section' 			=> 'button_typography',
				'default' 			=> '18',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' 				=> 'control',
			),
			'button_line_height' => array(
				'title' 			=> esc_html__( 'Line Height', 'onclinic' ),
				'description' 		=> esc_html__( 'Relative to the font-size of the element', 'onclinic' ),
				'section' 			=> 'button_typography',
				'default' 			=> '1.7',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' 				=> 'control',
			),
			'button_letter_spacing' => array(
				'title' 			=> esc_html__( 'Letter Spacing, px', 'onclinic' ),
				'section' 			=> 'button_typography',
				'default' 			=> '0',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' 				=> 'control',
			),
			'button_character_set' => array(
				'title' 			=> esc_html__( 'Character Set', 'onclinic' ),
				'section' 			=> 'button_typography',
				'default' 			=> 'latin',
				'field' 			=> 'select',
				'choices' 			=> onclinic_get_character_sets(),
				'type' 				=> 'control',
			),

			/** `Header` panel */
			'header_panel' => array(
				'title' 			=> esc_html__( 'Header', 'onclinic' ),
				'priority' 			=> 105,
				'type' 				=> 'panel',
			),

			'header_styles' => array(
				'title' 			=> esc_html__( 'Style', 'onclinic' ),
				'panel' 			=> 'header_panel',
				'type' 				=> 'section',
			),
			'header_layout_type' => array(
				'title' 			=> esc_html__( 'Layout', 'onclinic' ),
				'section' 			=> 'header_styles',
				'default' 			=> 'style-3',
				'choices' 			=> array(
					'style-1' => esc_html__( 'Style 1 (Logo by Center)', 'onclinic' ),
					'style-2' => esc_html__( 'Style 2 (Hamburger Menu)', 'onclinic' ),
					'style-3' => esc_html__( 'Style 3 (Logo by Left)', 'onclinic' ),
				),
				'field' 			=> 'select',
				'type' 				=> 'control',
			),
			'header_container_type' => array(
				'title' 			=> esc_html__( 'Container Type', 'onclinic' ),
				'section' 			=> 'header_styles',
				'default' 			=> 'boxed',
				'field' 			=> 'select',
				'choices' 			=> array(
					'boxed'     => esc_html__( 'Boxed', 'onclinic' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'onclinic' ),
				),
				'type' 				=> 'control',
			),
			'header_social_links' => array(
				'title' 			=> esc_html__( 'Show Social Links', 'onclinic' ),
				'section' 			=> 'header_styles',
				'default' 			=> false,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),

			'header_search_section' => array(
				'title' 			=> esc_html__( 'Search Popup', 'onclinic' ),
				'panel' 			=> 'header_panel',
				'type' 				=> 'section',
			),
			'header_search_visible' => array(
				'title' 			=> esc_html__( 'Show Search', 'onclinic' ),
				'section' 			=> 'header_search_section',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'header_search_label' => array(
				'title' 			=> esc_html__( 'Label Text', 'onclinic' ),
				'section' 			=> 'header_search_section',
				'default' 			=> esc_html__( 'What are you looking for?', 'onclinic' ),
				'field' 			=> 'text',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'header_search_visible' 	=> true,
				),
			),
			'header_search_placeholder' => array(
				'title' 			=> esc_html__( 'Placeholder Text', 'onclinic' ),
				'section' 			=> 'header_search_section',
				'default' 			=> esc_html__( 'Enter keyword...', 'onclinic' ),
				'field' 			=> 'text',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'header_search_visible' 	=> true,
				),
			),

			/** `Footer` panel */
			'footer_options' => array(
				'title' 			=> esc_html__( 'Footer', 'onclinic' ),
				'priority' 			=> 110,
				'type' 				=> 'section',
			),
			'footer_bg' => array(
				'title' 			=> esc_html__( 'Background Color', 'onclinic' ),
				'section' 			=> 'footer_options',
				'default' 			=> '#f8f8f8',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'footer_text_color' => array(
				'title' 			=> esc_html__( 'Text Color', 'onclinic' ),
				'section' 			=> 'footer_options',
				'default' 			=> '#888888',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'footer_copyright' => array(
				'title' 			=> esc_html__( 'Copyright text', 'onclinic' ),
				'section' 			=> 'footer_options',
				'default' 			=> onclinic_get_default_footer_copyright(),
				'field' 			=> 'textarea',
				'type' 				=> 'control',
			),
			'footer_logo' => array(
				'title' 			=> esc_html__( 'Footer Logo', 'onclinic' ),
				'section' 			=> 'footer_options',
				'field' 			=> 'image',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),

			/** `Blog Settings` panel */
			'blog_settings' => array(
				'title' 			=> esc_html__( 'Blog Settings', 'onclinic' ),
				'priority' 			=> 115,
				'type' 				=> 'panel',
			),

			/** `Blog` section */
			'blog' => array(
				'title' 			=> esc_html__( 'Blog', 'onclinic' ),
				'panel' 			=> 'blog_settings',
				'priority' 			=> 10,
				'type' 				=> 'section',
			),

			/* Blog Page Title */
			'blog_page_title' => array(
				'title' 			=> esc_html__( 'Show Blog Page Title', 'onclinic' ),
				'section' 			=> 'blog',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'blog_page_subtitle' => array(
				'title' 			=> esc_html__( 'Blog Page Subtitle', 'onclinic' ),
				'section' 			=> 'blog',
				'default' 			=> '',
				'field' 			=> 'textarea',
				'type' 				=> 'control',
			),

			'blog_layout_columns' => array(
				'title' 			=> esc_html__( 'Columns', 'onclinic' ),
				'section' 			=> 'blog',
				'default'			=> '2-cols',
				'field' 			=> 'select',
				'choices' 			=> array(
					'2-cols' => esc_html__( '2 columns', 'onclinic' ),
					'3-cols' => esc_html__( '3 columns', 'onclinic' ),
				),
				'type' 				=> 'control',
				'active_callback' 	=> 'onclinic_is_blog_columns_enabled',
			),
			'blog_sidebar_position' => array(
				'title' 			=> esc_html__( 'Sidebar', 'onclinic' ),
				'section' 			=> 'blog',
				'default' 			=> 'one-right-sidebar',
				'field' 			=> 'select',
				'choices' 			=> array(
					'one-left-sidebar' 	=> esc_html__( 'Sidebar on left side', 'onclinic' ),
					'one-right-sidebar' => esc_html__( 'Sidebar on right side', 'onclinic' ),
					'none' 				=> esc_html__( 'No sidebar', 'onclinic' ),
				),
				'type' 				=> 'control',
				'active_callback' 	=> 'onclinic_is_blog_sidebar_enabled',
			),
			'blog_sticky_type' => array(
				'title' 			=> esc_html__( 'Sticky label type', 'onclinic' ),
				'section' 			=> 'blog',
				'default' 			=> 'icon',
				'field' 			=> 'select',
				'choices' 			=> array(
					'label' => esc_html__( 'Text Label', 'onclinic' ),
					'icon'  => esc_html__( 'Font Icon', 'onclinic' ),
					'both'  => esc_html__( 'Text with Icon', 'onclinic' ),
				),
				'type' 				=> 'control',
			),
			'blog_sticky_label' => array(
				'description' 		=> esc_html__( 'Label for sticky post', 'onclinic' ),
				'section' 			=> 'blog',
				'default' 			=> esc_html__( 'Featured', 'onclinic' ),
				'field' 			=> 'text',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'blog_sticky_type' => array( 'label', 'both' ),
				),
			),
			'blog_post_author' => array(
				'title' 			=> esc_html__( 'Show post author', 'onclinic' ),
				'section' 			=> 'blog',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'blog_post_publish_date' => array(
				'title' 			=> esc_html__( 'Show publish date', 'onclinic' ),
				'section' 			=> 'blog',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'blog_post_categories' => array(
				'title' 			=> esc_html__( 'Show categories', 'onclinic' ),
				'section' 			=> 'blog',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'blog_post_tags' => array(
				'title' 			=> esc_html__( 'Show tags', 'onclinic' ),
				'section' 			=> 'blog',
				'default' 			=> false,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'blog_post_comments' => array(
				'title' 			=> esc_html__( 'Show comments', 'onclinic' ),
				'section' 			=> 'blog',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'blog_post_excerpt' => array(
				'title' 			=> esc_html__( 'Show Excerpt', 'onclinic' ),
				'section' 			=> 'blog',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control'
			),
			'blog_post_excerpt_words_count' => array(
				'title' 			=> esc_html__( 'Excerpt Words Count', 'onclinic' ),
				'section' 			=> 'blog',
				'default' 			=> '25',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
				'type' 				=> 'control',
			),
			'blog_read_more_type' => array(
				'title' 			=> esc_html__( 'Read more button type', 'onclinic' ),
				'section' 			=> 'blog',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'blog_read_more_text' => array(
				'title' 			=> esc_html__( 'Read more button text', 'onclinic' ),
				'section' 			=> 'blog',
				'default' 			=> esc_html__( 'Learn more', 'onclinic' ),
				'field' 			=> 'text',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'blog_read_more_type' => true,
				)
			),

			/** `Post` section */
			'blog_post' => array(
				'title'           => esc_html__( 'Post', 'onclinic' ),
				'panel'           => 'blog_settings',
				'priority'        => 20,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'single_sidebar_position' => array(
				'title'   => esc_html__( 'Sidebar', 'onclinic' ),
				'section' => 'blog_post',
				'default' => 'one-right-sidebar',
				'field'   => 'select',
				'choices' => array(
					'one-left-sidebar'  => esc_html__( 'Sidebar on left side', 'onclinic' ),
					'one-right-sidebar' => esc_html__( 'Sidebar on right side', 'onclinic' ),
					'none'              => esc_html__( 'No sidebar', 'onclinic' ),
				),
				'type' => 'control',
			),
			'single_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'onclinic' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'onclinic' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'onclinic' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'onclinic' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'onclinic' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_navigation' => array(
				'title'   => esc_html__( 'Enable post navigation', 'onclinic' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Author Bio` section */
			'post_authorbio' => array(
				'title' 			=> esc_html__( 'Author Bio Block', 'onclinic' ),
				'panel' 			=> 'blog_settings',
				'priority' 			=> 25,
				'type' 				=> 'section',
				'active_callback' 	=> 'callback_single',
			),
			'post_authorbio_block' => array(
				'title' 			=> esc_html__( 'Show Author Bio Block', 'onclinic' ),
				'section' 			=> 'post_authorbio',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'post_authorbio_bg' => array(
				'title' 			=> esc_html__( 'Author Bio BG Color', 'onclinic' ),
				'section' 			=> 'post_authorbio',
				'default' 			=> '#222222',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'post_authorbio_block' => true,
				),
			),
			'post_authorbio_color' => array(
				'title' 			=> esc_html__( 'Author Bio Text Color', 'onclinic' ),
				'section' 			=> 'post_authorbio',
				'default' 			=> '#ffffff',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'post_authorbio_block' => true,
				),
			),

			/** `Related Posts` section */
			'related_posts' => array(
				'title' 			=> esc_html__( 'Related Posts Block', 'onclinic' ),
				'panel' 			=> 'blog_settings',
				'priority' 			=> 30,
				'type' 				=> 'section',
				'active_callback' 	=> 'callback_single',
			),
			'related_posts_visible' => array(
				'title' 			=> esc_html__( 'Show related posts block', 'onclinic' ),
				'section' 			=> 'related_posts',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'related_posts_block_title' => array(
				'title' 			=> esc_html__( 'Related posts block title', 'onclinic' ),
				'section' 			=> 'related_posts',
				'default' 			=> esc_html__( 'Related Posts', 'onclinic' ),
				'field' 			=> 'text',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_count' => array(
				'title' 			=> esc_html__( 'Number of post', 'onclinic' ),
				'section' 			=> 'related_posts',
				'default' 			=> '2',
				'field' 			=> 'text',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_grid' => array(
				'title' 			=> esc_html__( 'Layout', 'onclinic' ),
				'section' 			=> 'related_posts',
				'default' 			=> '3',
				'field' 			=> 'select',
				'choices' 			=> array(
					'2' 	=> esc_html__( '2 columns', 'onclinic' ),
					'3' 	=> esc_html__( '3 columns', 'onclinic' ),
				),
				'type' 				=> 'control',
				'conditions' 		=> array(
					'related_posts_visible' => true,
				),
			),

			'related_posts_bg' => array(
				'title' 			=> esc_html__( 'BG Color', 'onclinic' ),
				'section' 			=> 'related_posts',
				'default' 			=> '#255957',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_color' => array(
				'title' 			=> esc_html__( 'Text Color', 'onclinic' ),
				'section' 			=> 'related_posts',
				'default' 			=> '#ffffff',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'related_posts_visible' => true,
				),
			),

			'related_posts_image' => array(
				'title' 			=> esc_html__( 'Show post image', 'onclinic' ),
				'section' 			=> 'related_posts',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_categories' => array(
				'title' 			=> esc_html__( 'Show post categories', 'onclinic' ),
				'section' 			=> 'related_posts',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_title' => array(
				'title' 			=> esc_html__( 'Show post title', 'onclinic' ),
				'section' 			=> 'related_posts',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_excerpt' => array(
				'title' 			=> esc_html__( 'Display excerpt', 'onclinic' ),
				'section' 			=> 'related_posts',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_excerpt_words_count' => array(
				'title' 			=> esc_html__( 'Excerpt Words Count', 'zemix' ),
				'section' 			=> 'related_posts',
				'default' 			=> '20',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
				'type' 				=> 'control',
				'conditions' 		=> array(
					'related_posts_visible' => true,
					'related_posts_excerpt' => true,
				),
			),
			'related_posts_author' => array(
				'title' 			=> esc_html__( 'Show post author', 'onclinic' ),
				'section' 			=> 'related_posts',
				'default' 			=> false,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_publish_date' => array(
				'title' 			=> esc_html__( 'Show post publish date', 'onclinic' ),
				'section' 			=> 'related_posts',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_comment_count' => array(
				'title' 			=> esc_html__( 'Show post comment count', 'onclinic' ),
				'section' 			=> 'related_posts',
				'default' 			=> false,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_tags' => array(
				'title' 			=> esc_html__( 'Show post tags', 'onclinic' ),
				'section' 			=> 'related_posts',
				'default' 			=> false,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_learn_more' => array(
				'title' 			=> esc_html__( 'Show Learn More', 'onclinic' ),
				'section' 			=> 'related_posts',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'related_posts_visible' => true,
				),
			),
	) ) );
}

/**
 * Return true if value of passed setting is not equal with passed value.
 *
 * @param  object $control Parent control.
 * @param  string $setting Setting name to check.
 * @param  string $value   Setting value to compare.
 * @return bool
 */
function onclinic_is_not_setting( $control, $setting, $value ) {

	if ( $value !== $control->manager->get_setting( $setting )->value() ) {
		return true;
	}

	return false;

}

/**
 * Move native `site_icon` control (based on WordPress core) into custom section.
 *
 * @since 1.0.0
 * @param  object $wp_customize
 * @return void
 */
function onclinic_customizer_change_core_controls( $wp_customize ) {
	$wp_customize->get_control( 'site_icon' )->section      = 'onclinic_favicon';
	$wp_customize->get_control( 'background_color' )->label = esc_html__( 'Body Background Color', 'onclinic' );
}

// Move native `site_icon` control (based on WordPress core) in custom section.
add_action( 'customize_register', 'onclinic_customizer_change_core_controls', 20 );

/**
 * Get font styles
 *
 * @since 1.0.0
 * @return array
 */
function onclinic_get_font_styles() {
	return apply_filters( 'onclinic-theme/font/styles', array(
		'normal'  => esc_html__( 'Normal', 'onclinic' ),
		'italic'  => esc_html__( 'Italic', 'onclinic' ),
		'oblique' => esc_html__( 'Oblique', 'onclinic' ),
		'inherit' => esc_html__( 'Inherit', 'onclinic' ),
	) );
}

/**
 * Get character sets
 *
 * @since 1.0.0
 * @return array
 */
function onclinic_get_character_sets() {
	return apply_filters( 'onclinic-theme/font/character_sets', array(
		'latin'        => esc_html__( 'Latin', 'onclinic' ),
		'greek'        => esc_html__( 'Greek', 'onclinic' ),
		'greek-ext'    => esc_html__( 'Greek Extended', 'onclinic' ),
		'vietnamese'   => esc_html__( 'Vietnamese', 'onclinic' ),
		'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'onclinic' ),
		'latin-ext'    => esc_html__( 'Latin Extended', 'onclinic' ),
		'cyrillic'     => esc_html__( 'Cyrillic', 'onclinic' ),
	) );
}

/**
 * Get text aligns
 *
 * @since 1.0.0
 * @return array
 */
function onclinic_get_text_aligns() {
	return apply_filters( 'onclinic-theme/font/text-aligns', array(
		'inherit' => esc_html__( 'Inherit', 'onclinic' ),
		'center'  => esc_html__( 'Center', 'onclinic' ),
		'justify' => esc_html__( 'Justify', 'onclinic' ),
		'left'    => esc_html__( 'Left', 'onclinic' ),
		'right'   => esc_html__( 'Right', 'onclinic' ),
	) );
}

/**
 * Get font weights
 *
 * @since 1.0.0
 * @return array
 */
function onclinic_get_font_weight() {
	return apply_filters( 'onclinic-theme/font/weight', array(
		'100' => '100',
		'200' => '200',
		'300' => '300',
		'400' => '400',
		'500' => '500',
		'600' => '600',
		'700' => '700',
		'800' => '800',
		'900' => '900',
	) );
}

/**
 * Get text transform.
 *
 * @since 1.0.0
 * @return array
 */
function onclinic_get_text_transform() {
	return apply_filters( 'onclinic_get_text_transform', array(
		'none'       => esc_html__( 'None ', 'onclinic' ),
		'uppercase'  => esc_html__( 'Uppercase ', 'onclinic' ),
		'lowercase'  => esc_html__( 'Lowercase', 'onclinic' ),
		'capitalize' => esc_html__( 'Capitalize', 'onclinic' ),
	) );
}

// Background utility function
/**
 * Get background position
 *
 * @since 1.0.0
 * @return array
 */
function onclinic_get_bg_position() {
	return apply_filters( 'onclinic_get_bg_position', array(
		'top-left'      => esc_html__( 'Top Left', 'onclinic' ),
		'top-center'    => esc_html__( 'Top Center', 'onclinic' ),
		'top-right'     => esc_html__( 'Top Right', 'onclinic' ),
		'center-left'   => esc_html__( 'Middle Left', 'onclinic' ),
		'center'        => esc_html__( 'Middle Center', 'onclinic' ),
		'center-right'  => esc_html__( 'Middle Right', 'onclinic' ),
		'bottom-left'   => esc_html__( 'Bottom Left', 'onclinic' ),
		'bottom-center' => esc_html__( 'Bottom Center', 'onclinic' ),
		'bottom-right'  => esc_html__( 'Bottom Right', 'onclinic' ),
	) );
}

/**
 * Get background size
 *
 * @since 1.0.0
 * @return array
 */
function onclinic_get_bg_size() {
	return apply_filters( 'onclinic_get_bg_size', array(
		'auto'    => esc_html__( 'Auto', 'onclinic' ),
		'cover'   => esc_html__( 'Cover', 'onclinic' ),
		'contain' => esc_html__( 'Contain', 'onclinic' ),
	) );
}

/**
 * Get background repeat
 *
 * @since 1.0.0
 * @return array
 */
function onclinic_get_bg_repeat() {
	return apply_filters( 'onclinic_get_bg_repeat', array(
		'no-repeat' => esc_html__( 'No Repeat', 'onclinic' ),
		'repeat'    => esc_html__( 'Tile', 'onclinic' ),
		'repeat-x'  => esc_html__( 'Tile Horizontally', 'onclinic' ),
		'repeat-y'  => esc_html__( 'Tile Vertically', 'onclinic' ),
	) );
}

/**
 * Get background attachment
 *
 * @since 1.0.0
 * @return array
 */
function onclinic_get_bg_attachment() {
	return apply_filters( 'onclinic_get_bg_attachment', array(
		'scroll' => esc_html__( 'Scroll', 'onclinic' ),
		'fixed'  => esc_html__( 'Fixed', 'onclinic' ),
	) );
}

/**
 * Get text color
 *
 * @since 1.0.0
 * @return array
 */
function onclinic_get_text_color() {
	return apply_filters( 'onclinic_get_text_color', array(
		'light' => esc_html__( 'Light', 'onclinic' ),
		'dark'  => esc_html__( 'Dark', 'onclinic' ),
	) );
}


/**
 * Return array of arguments for dynamic CSS module
 *
 * @return array
 */

function onclinic_get_dynamic_css_options() {
	return apply_filters( 'onclinic-theme/dynamic_css/options', array(
		'prefix'        => 'onclinic',
		'type'          => 'theme_mod',
		'parent_handles' => array(
			'css' => 'onclinic-theme-style',
			'js'  => 'onclinic-theme-js',
		),
		'css_files'      => array(
			get_theme_file_path( 'assets/css/dynamic.css' ),
			get_theme_file_path( 'assets/css/dynamic/header.css' ),
			get_theme_file_path( 'assets/css/dynamic/footer.css' ),
			get_theme_file_path( 'assets/css/dynamic/menus.css' ),
			get_theme_file_path( 'assets/css/dynamic/social.css' ),
			get_theme_file_path( 'assets/css/dynamic/navigation.css' ),
			get_theme_file_path( 'assets/css/dynamic/buttons.css' ),
			get_theme_file_path( 'assets/css/dynamic/forms.css' ),
			get_theme_file_path( 'assets/css/dynamic/post.css' ),
			get_theme_file_path( 'assets/css/dynamic/page.css' ),
			get_theme_file_path( 'assets/css/dynamic/post-grid.css' ),
			get_theme_file_path( 'assets/css/dynamic/widgets.css' ),
			get_theme_file_path( 'assets/css/dynamic/plugins.css' ),
		),
		'options_cb'     => 'get_theme_mods',
	) );
}

/**
 * Return true if setting is value. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @param  string $setting Setting name to check.
 * @param  string $value   Setting value to compare.
 * @return bool
 */
function onclinic_is_setting( $control, $setting, $value ) {

	if ( $value == $control->manager->get_setting( $setting )->value() ) {
		return true;
	}

	return false;
}

/**
 * Get default footer copyright.
 *
 * @since  1.0.0
 * @return string
 */
function onclinic_get_default_footer_copyright() {
	return esc_html__( 'Copyright &copy; %%year%% Onclinic. Powered by ', 'onclinic' ) . '<a href="https://zemez.io/">' . esc_html__( 'Zemez', 'onclinic' ) . '</a>.';
}

/**
 * Return true if blog sidebar enabled.
 *
 * @return bool
 */
function onclinic_is_blog_sidebar_enabled() {
	return apply_filters( 'onclinic-theme/customizer/blog-sidebar-enabled', true );
}

/**
 * Return true if blog columns enabled.
 *
 * @return bool
 */
function onclinic_is_blog_columns_enabled() {
	return apply_filters( 'onclinic-theme/customizer/blog-columns-enabled', true );
}

/**
 * Load dynamic logic for the customizer controls area.
 *
 * @since 1.0.0
 */
function onclinic_customize_controls_assets() {
	wp_enqueue_script( 'onclinic-theme-customizer-controls', get_theme_file_uri('assets/js/customizer-controls.js' ), array( 'customize-controls' ), onclinic_theme()->version, true );

	wp_localize_script( 'onclinic-theme-customizer-controls', 'onclinicControlsConditions', onclinic_get_customize_controls_conditions() );
}

add_action( 'customize_controls_enqueue_scripts', 'onclinic_customize_controls_assets' );

/**
 * Get customize controls conditions.
 *
 * @since  1.0.0
 * @return array
 */
function onclinic_get_customize_controls_conditions() {

	$customize_options = onclinic_get_customizer_options();
	$controls_args     = $customize_options['options'];

	$results = array();

	foreach ( $controls_args as $control => $args ) {
		if ( isset( $args['conditions'] ) ) {
			$results[ $control ] = $args['conditions'];
		}
	}

	return $results;
}