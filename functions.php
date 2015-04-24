<?php
/**
 * Theme Setup Functions and Definitions.
 *
 * @package BEMpress
 */

// Get the template directory and make sure it has a trailing slash
$includes_dir = trailingslashit( get_template_directory() );

// Include Hybrid Core.
require_once( $includes_dir . 'hybrid-core/hybrid.php' );
new Hybrid();





add_action( 'after_setup_theme', 'bempress_setup', 10 );

add_action( 'after_setup_theme', 'bempress_includes', 10 );


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since   1.0.0
 * @return  void
 */
function bempress_setup() {

    // http://themehybrid.com/docs/hybrid_set_content_width
    //hybrid_set_content_width( 1140 );

    // http://codex.wordpress.org/Automatic_Feed_Links
    add_theme_support( 'automatic-feed-links' );

	// http://themehybrid.com/docs/hybrid-core-styles
	add_theme_support( 'hybrid-core-styles', ['style', 'google-fonts'] );

	// https://github.com/FlagshipWP/flagship-library/wiki/Flagship-Site-Logo
	add_theme_support( 'site-logo' );

	// https://github.com/justintadlock/breadcrumb-trail
	add_theme_support( 'breadcrumb-trail' );

	// https://github.com/justintadlock/get-the-image
	add_theme_support( 'get-the-image' );

	// http://themehybrid.com/docs/template-hierarchy
	add_theme_support( 'hybrid-core-template-hierarchy' );

	// https://github.com/FlagshipWP/flagship-library/wiki/Flagship-Author-Box
	add_theme_support( 'flagship-author-box' );

    // https://developer.wordpress.org/themes/functionality/navigation-menus/
    register_nav_menus( [
        'primary'   => _x( 'Primary', 'bempress' ),
        'secondary' => _x( 'Secondary', 'bempress' ),
    ] );

    // http://codex.wordpress.org/Post_Formats
    add_theme_support( 'post-formats', [
        'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'
    ] );

    // http://themehybrid.com/docs/theme-layouts
    add_theme_support( 'theme-layouts', [
            '1c'        => __( '1 Column Wide',                'bempress' ),
            '1c-narrow' => __( '1 Column Narrow',              'bempress' ),
            '2c-l'      => __( '2 Columns: Content / Sidebar', 'bempress' ),
            '2c-r'      => __( '2 Columns: Sidebar / Content', 'bempress' )
    ], ['default' => is_rtl() ? '2c-r' :'2c-l'] );
}


/**
 * Load all required theme files.
 */
function bempress_includes() {
	// Set the includes directories.
	$includes_dir = trailingslashit( get_template_directory() ) . 'inc/';

	//require_once $includes_dir . 'flagship-library/flagship-library.php';
    require_once $includes_dir . 'flagship.php';
    require_once $includes_dir . 'tha-theme-hooks.php';
    require_once $includes_dir . 'general.php';
    require_once $includes_dir . 'scripts.php';
    require_once $includes_dir . 'widgetize.php';
    require_once $includes_dir . 'html-min.php';
    require_once $includes_dir . 'customizer/customizer.php';
    require_once $includes_dir . 'customizer/custom-background.php';
    require_once $includes_dir . 'css-classes.php';
    new AttrTrumps();
}


// Add a hook for child themes to execute code.
do_action( 'flagship_after_setup_parent' );
