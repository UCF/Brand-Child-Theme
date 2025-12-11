<?php
/**
 * Handle all theme configuration here
 **/
namespace BrandChildTheme\Theme\Includes\Config;

define( 'BCT_THEME_URL', get_stylesheet_directory_uri() );
define( 'BCT_THEME_STATIC_URL', BCT_THEME_URL . '/static' );
define( 'BCT_THEME_CSS_URL', BCT_THEME_STATIC_URL . '/css' );
define( 'BCT_THEME_JS_URL', BCT_THEME_STATIC_URL . '/js' );
define( 'BCT_THEME_IMG_URL', BCT_THEME_STATIC_URL . '/img' );
define( 'BCT_THEME_CUSTOMIZER_PREFIX', 'ucfbct_' );

/**
 * Enqueues theme specific fonts
 * @author Jim Barnes
 * @since 0.2.0
 *
 * @return void
 */
function ucf_bct_enqueue_fonts() {
	wp_enqueue_style(
		'din-font-stylesheet',
		'https://use.typekit.net/efd2jyc.css'
	);
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\ucf_bct_enqueue_fonts', 10, 0 );

/**
 * Sets up theme specific customizer sections
 *
 * @author Jim Barnes
 * @since 0.3.0
 *
 * @param WP_Customize_Manager $wp_customize
 *
 * @return void
 */
function ucf_bct_define_customizer_sections( $wp_customize ) {
	$wp_customize->add_section(
		BCT_THEME_CUSTOMIZER_PREFIX . 'headers',
		array(
			'title' => 'Header Settings'
		)
	);
}

add_action( 'customize_register', __NAMESPACE__ . '\ucf_bct_define_customizer_sections' );

/**
 * Sets up theme specific customizer settings and fields
 *
 * @author Jim Barnes
 * @since 0.3.0
 *
 * @param WP_Customize_Manager $wp_customize
 *
 * @return void
 */
function ucf_bct_add_customizer_settings( $wp_customize ) {
	$wp_customize->add_setting(
		'default_header_desktop'
	);

	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			'defaul_header_desktop',
			array(
				'label'    => __( 'Header Image (Desktop - 1600x380)' ),
				'section'  => BCT_THEME_CUSTOMIZER_PREFIX . 'headers',
				'settings' => 'default_header_desktop'
			)
		)
	);

	$wp_customize->add_setting(
		'default_header_mobile'
	);

	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			'default_header_mobile',
			array(
				'label'    => __( 'Header Image (Mobile - 575x575)' ),
				'section'  => BCT_THEME_CUSTOMIZER_PREFIX . 'headers',
				'settings' => 'default_header_mobile'
			)
		)
	);
}

add_action( 'customize_register', __NAMESPACE__ . '\ucf_bct_add_customizer_settings', 10, 1 );
