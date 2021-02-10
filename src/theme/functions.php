<?php
/**
 * Functions used by the theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sciolism-2019
 * @since sciolism-2019 1.0.0
 */

add_action( 'after_setup_theme', 'sciolism_theme_setup' );

/**
 * Registers theme support for various WordPress functions. 
 */
function sciolism_theme_setup() {
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

	if ( ! isset( $content_width ) ) {
		$content_width = 660;
	}
}

register_nav_menus( 
	array(
		'main_menu' => __( 'Main Menu', 'sciolism-2019' ),
		'side_menu' => __( 'Side Menu', 'sciolism-2019' ),
	) 
);

add_action( 'wp_enqueue_scripts', 'sciolism_enqueue_styles' );

/**
 * Registers theme CSS files.
 */
function sciolism_enqueue_styles() {
	wp_enqueue_style(
		'sciolism-theme',
		get_template_directory_uri() . '/style.css',
		array( 'dashicons' ),
		'1.0.3', 
		'screen'
	);
}

add_action( 'wp_enqueue_scripts', 'sciolism_enqueue_scripts' );

/**
 * Registers theme JS files.
 */
function sciolism_enqueue_scripts() {
	wp_enqueue_script(
		'sciolism-theme',
		get_template_directory_uri() . '/js/sciolism.theme.js',
		array(),
		'1.0.3',
		true
	);
}

add_action( 'comment_form_before', 'sciolism_enqueue_comment_reply_script' );

/**
 * Enqueues comment-reply script.
 */
function sciolism_enqueue_comment_reply_script() {
	wp_enqueue_script( 'comment-reply' );
}

add_action( 'the_content_more_link', 'sciolism_modify_more_link', 10, 2 );

/**
 * Modifies the Read More link element.
 * 
 * @param  string $link Read More link element.
 * @return string       Modified Read More link element.
 */
function sciolism_modify_more_link( $link ) {
	return '<div class="center">' . $link . '</div>';
}

add_action( 'customize_register', 'sciolism_setup_customizer' );

/**
 * Registers fields for WordPress customizer.
 *
 * @param  object $wp_customize WP_Customize_Manager instance.
 */
function sciolism_setup_customizer( $wp_customize ) {
	$wp_customize->add_section(
		'sciolism_2019_footer',
		array(
			'title'       => esc_html__( 'Footer', 'sciolism-2019' ),
			// Translators: %1$s is replaced with a linked "WordPress Dashicons". It is done this way to keep HTML out of the text string.
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
