<?php
/**
 * Theme Setup Functions and Definitions.
 *
 * @package     BEMpress
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, Flagship Software, LLC
 * @license     GPL-2.0+
 * @link        https://flagshipwp.com/
 * @since       1.0.0
 */

// Include Hybrid Core.
require_once( trailingslashit( get_template_directory() ) . 'hybrid-core/hybrid.php' );
new Hybrid();

add_action( 'after_setup_theme', 'bempress_setup', 10 );
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since   1.0.0
 * @return  void
 */
function bempress_setup() {
	// http://themehybrid.com/docs/theme-layouts
	add_theme_support(
		'theme-layouts',
		array(
			'1c'        => __( '1 Column Wide',                'bempress' ),
			'1c-narrow' => __( '1 Column Narrow',              'bempress' ),
			'2c-l'      => __( '2 Columns: Content / Sidebar', 'bempress' ),
			'2c-r'      => __( '2 Columns: Sidebar / Content', 'bempress' )
		),
		array( 'default' => is_rtl() ? '2c-r' :'2c-l' )
	);

	// http://themehybrid.com/docs/hybrid_set_content_width
	hybrid_set_content_width( 1140 );

	// http://codex.wordpress.org/Automatic_Feed_Links
	add_theme_support( 'automatic-feed-links' );

	// http://themehybrid.com/docs/hybrid-core-styles
	add_theme_support( 'hybrid-core-styles', array( 'style', 'google-fonts', ) );

	// https://github.com/FlagshipWP/flagship-library/wiki/Flagship-Site-Logo
	add_theme_support( 'site-logo' );

	// Add navigation menus.
	register_nav_menu( 'primary',   _x( 'Primary Menu', 'nav menu location', 'bempress' ) );
	register_nav_menu( 'secondary', _x( 'Secondary Menu', 'nav menu location', 'bempress' ) );

	$formats = array(
		'aside',
		'gallery',
		'link',
		'image',
		'quote',
		'status',
		'video',
		'audio',
		'chat',
	);

	// http://codex.wordpress.org/Post_Formats
	add_theme_support( 'post-formats', $formats );

	// https://github.com/justintadlock/breadcrumb-trail
	add_theme_support( 'breadcrumb-trail' );

	// https://github.com/justintadlock/get-the-image
	add_theme_support( 'get-the-image' );

	// http://themehybrid.com/docs/template-hierarchy
	add_theme_support( 'hybrid-core-template-hierarchy' );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bempress_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// https://github.com/FlagshipWP/flagship-library/wiki/Flagship-Author-Box
	add_theme_support( 'flagship-author-box' );

	// https://github.com/FlagshipWP/flagship-library/wiki/Flagship-Footer-Widgets
	add_theme_support( 'flagship-footer-widgets', 3 );
}

add_action( 'after_setup_theme', 'bempress_includes', 10 );
/**
 * Load all required theme files.
 *
 * @since   1.0.0
 * @return  void
 */
function bempress_includes() {
	// Set the includes directories.
	$includes_dir = trailingslashit( get_template_directory() ) . 'inc/';

	// Load the main file in the Flagship library directory.
	require_once $includes_dir . 'flagship-library/flagship-library.php';

	// Load all PHP files in the includes directory.
	require_once $includes_dir . 'tha-theme-hooks.php';
	require_once $includes_dir . 'general.php';
	require_once $includes_dir . 'scripts.php';
	require_once $includes_dir . 'widgetize.php';
	require_once $includes_dir . 'css-classes.php';
	require_once $includes_dir . 'html-min.php';
}

// Add a hook for child themes to execute code.
do_action( 'flagship_after_setup_parent' );
