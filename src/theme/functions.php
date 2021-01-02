<?php
/**
 * Functions used by the theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage sciolism-2019
 * @since sciolism-2019 1.0.0
 */

add_action(
	'after_setup_theme',
	function () {
		add_theme_support(
			'html5',
			array(
				'comment-list',
				'comment-form',
				'search-form',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'custom-logo', array( 'height' => 100 ) );
		add_theme_support( 'editor-styles' );

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_attr__( 'Light Blue', 'sciolism-2019' ),
					'slug'  => 'lightblue',
					'color' => '#006EDA',
				),
				array(
					'name'  => esc_attr__( 'Blue', 'sciolism-2019' ),
					'slug'  => 'blue',
					'color' => '#183c50',
				),
				array(
					'name'  => esc_attr__( 'Red', 'sciolism-2019' ),
					'slug'  => 'red',
					'color' => '#e93b45',
				),
				array(
					'name'  => esc_attr__( 'Yellow', 'sciolism-2019' ),
					'slug'  => 'yellow',
					'color' => '#FFDC00',
				),
				array(
					'name'  => esc_attr__( 'Orange', 'sciolism-2019' ),
					'slug'  => 'orange',
					'color' => '#FD671A',
				),
				array(
					'name'  => esc_attr__( 'Green', 'sciolism-2019' ),
					'slug'  => 'green',
					'color' => '#008000',
				),
				array(
					'name'  => esc_attr__( 'Purple', 'sciolism-2019' ),
					'slug'  => 'purple',
					'color' => '#b13cad',
				),
				array(
					'name'  => esc_attr__( 'Light Grey', 'sciolism-2019' ),
					'slug'  => 'lightGrey',
					'color' => '#F3F3F3',
				),
				array(
					'name'  => esc_attr__( 'Grey', 'sciolism-2019' ),
					'slug'  => 'grey',
					'color' => '#E7E7E7',
				),
				array(
					'name'  => esc_attr__( 'Dark Grey', 'sciolism-2019' ),
					'slug'  => 'darkGrey',
					'color' => '#D9D9D9',
				),
				array(
					'name'  => esc_attr__( 'Text color', 'sciolism-2019' ),
					'slug'  => 'textcolor',
					'color' => '#585858',
				),
			)
		);

		add_editor_style( 'editor-styles.css' );
	}
);

if ( ! isset( $content_width ) ) {
	$content_width = 660;
}

register_nav_menus( 
	array(
		'main_menu' => __( 'Main Menu', 'sciolism-2019' ),
		'side_menu' => __( 'Side Menu', 'sciolism-2019' ),
	) 
);

add_action(
	'wp_enqueue_scripts',
	function () {
		wp_enqueue_style(
			'sciolism-theme',
			get_template_directory_uri() . '/style.css',
			array( 'dashicons' ),
			'1.0.0', 
			'screen'
		);
	}
);

add_action(
	'wp_enqueue_scripts',
	function () {
		wp_enqueue_script(
			'sciolism-theme',
			get_template_directory_uri() . '/src/js/sciolism.theme.js',
			array(),
			'1.0.0',
			true
		);
	}
);

add_action(
	'comment_form_before', 
	function () {
		wp_enqueue_script( 'comment-reply' );
	}
);

add_action(
	'the_content_more_link',
	function ( $link ) {
		return '<div class="center">' . $link . '</div>';
	},
	10,
	2
);

add_action(
	'customize_register',
	function ( $wp_customize ) {
		$wp_customize->add_section(
			'sciolism_2019_footer',
			array(
				'title'       => esc_html__( 'Footer', 'sciolism-2019' ),
				// Translators: %1$s is replaced with a linked WordPress Dashicons. It is done this way to keep HTML out of the text string.
				'description' => sprintf( esc_html__( 'Adjust the titles of the menus in the footer. A custom CSS class can be used to customize the icon that appears at the title. The available classes can be seen in the %1$s resource.', 'sciolism-2019' ), '<a href="https://developer.wordpress.org/resource/dashicons/">WordPress Dashicons</a>' ),
				'priority'    => 120,
			)
		);

		$wp_customize->add_setting(
			'sciolism_2019_footer_main_navigation_string',
			array(
				'default'           => esc_html__( 'Navigation', 'sciolism-2019' ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_textarea_field',
			)
		);

		$wp_customize->add_control(
			'sciolism_2019_footer_main_navigation_string',
			array(
				'label'    => esc_html__( 'Main navigation title', 'sciolism-2019' ),
				'type'     => 'textarea',
				'section'  => 'sciolism_2019_footer',
				'settings' => 'sciolism_2019_footer_main_navigation_string',
			)
		);

		$wp_customize->add_setting(
			'sciolism_2019_footer_main_navigation_custom_css_class',
			array(
				'default'           => esc_html__( 'dashicons-calendar', 'sciolism-2019' ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_html_class',
			)
		);

		$wp_customize->add_control(
			'sciolism_2019_footer_main_navigation_custom_css_class',
			array(
				'label'    => esc_html__( 'Main navigation title custom CSS class', 'sciolism-2019' ),
				'type'     => 'string',
				'section'  => 'sciolism_2019_footer',
				'settings' => 'sciolism_2019_footer_main_navigation_custom_css_class',
			)
		);

		$wp_customize->add_setting(
			'sciolism_2019_footer_side_navigation_string',
			array(
				'default'           => esc_html__( 'Social', 'sciolism-2019' ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_textarea_field',
			)
		);

		$wp_customize->add_control(
			'sciolism_2019_footer_side_navigation_string',
			array(
				'label'    => esc_html__( 'Side navigation title', 'sciolism-2019' ),
				'type'     => 'textarea',
				'section'  => 'sciolism_2019_footer',
				'settings' => 'sciolism_2019_footer_side_navigation_string',
			)
		);

		$wp_customize->add_setting(
			'sciolism_2019_footer_side_navigation_custom_css_class',
			array(
				'default'           => esc_html__( 'dashicons-admin-users', 'sciolism-2019' ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_html_class',
			)
		);

		$wp_customize->add_control(
			'sciolism_2019_footer_side_navigation_custom_css_class',
			array(
				'label'    => esc_html__( 'Side navigation title custom CSS class', 'sciolism-2019' ),
				'type'     => 'string',
				'section'  => 'sciolism_2019_footer',
				'settings' => 'sciolism_2019_footer_side_navigation_custom_css_class',
			)
		);
	}
);
