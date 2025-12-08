<?php
/**
 * Handle all theme configuration here
 **/
namespace MyProject\Theme\Includes\Config;


define( 'MYPROJECT_THEME_URL', get_stylesheet_directory_uri() );
define( 'MYPROJECT_THEME_STATIC_URL', MYPROJECT_THEME_URL . '/static' );
define( 'MYPROJECT_THEME_CSS_URL', MYPROJECT_THEME_STATIC_URL . '/css' );
define( 'MYPROJECT_THEME_JS_URL', MYPROJECT_THEME_STATIC_URL . '/js' );
define( 'MYPROJECT_THEME_IMG_URL', MYPROJECT_THEME_STATIC_URL . '/img' );

function ucf_bct_enqueue_fonts() {
	wp_enqueue_style(
		'din-font-stylesheet',
		'https://use.typekit.net/efd2jyc.css'
	);
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\ucf_bct_enqueue_fonts', 10, 0 );
