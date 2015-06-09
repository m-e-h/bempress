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
require_once $includes_dir . 'inc/scripts.php';
require_once $includes_dir . 'inc/customizer/fonts.php';
require_once $includes_dir . 'inc/attr.php';
require_once $includes_dir . 'inc/tha-theme-hooks.php';
require_once $includes_dir . 'inc/general.php';
require_once $includes_dir . 'inc/widgetize.php';
require_once $includes_dir . 'inc/template-actions.php';
require_once $includes_dir . 'inc/shortcodes.php';
require_once $includes_dir . 'inc/shortcodes-ui.php';
require_once $includes_dir . 'inc/html-min.php';
require_once $includes_dir . 'inc/customizer/custom-header.php';
require_once $includes_dir . 'inc/customizer/Color.php';
require_once $includes_dir . 'inc/customizer/custom-styles.php';
require_once $includes_dir . 'inc/css-classes.php';
new AttrTrumps();

add_action( 'after_setup_theme', 'bempress_setup', 5 );
add_action( 'after_setup_theme', 'bempress_includes');
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function bempress_setup() {
    // http://themehybrid.com/docs/hybrid_set_content_width
    //hybrid_set_content_width( 1140 );
    // http://codex.wordpress.org/Automatic_Feed_Links
    add_theme_support( 'automatic-feed-links' );
    // https://github.com/FlagshipWP/flagship-library/wiki/Flagship-Site-Logo
    //add_theme_support( 'site-logo' );
    // https://github.com/justintadlock/breadcrumb-trail
    add_theme_support( 'breadcrumb-trail' );
    // https://github.com/justintadlock/get-the-image
    add_theme_support( 'get-the-image' );
    // http://themehybrid.com/docs/template-hierarchy
    add_theme_support( 'hybrid-core-template-hierarchy' );
    // https://developer.wordpress.org/themes/functionality/navigation-menus/
    register_nav_menus( [
        'primary'   => _x( 'Primary', 'bempress' ),
        'secondary' => _x( 'Secondary', 'bempress' ),
        'panel-dpc' => _x( 'Panel Menu', 'bempress' ),
    ] );
    // http://codex.wordpress.org/Post_Formats
    add_theme_support( 'post-formats', [
        'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'
    ] );

// In theme setup
add_theme_support( 'theme-layouts', array( 'default' => '1c' ) );
add_action( 'hybrid_register_layouts', 'my_register_layouts' );
function my_register_layouts() {
    hybrid_get_layout( 'default' )->image = '%s/images/default.svg';
    hybrid_register_layout(
        '1c',
        array(
            'label'            => _x( '1 Column Wide', 'theme layout', 'hybrid-core' ),
            'is_global_layout' => true,
            'is_post_layout'   => true,
            'image'            => '%s/images/one-column.svg',
        )
    );
    hybrid_register_layout(
        '1c-narrow',
        array(
            'label'            => _x( '1 Column Narrow', 'theme layout', 'hybrid-core' ),
            'is_global_layout' => true,
            'is_post_layout'   => true,
            'image'            => '%s/images/one-column-narrow.svg',
        )
    );
    hybrid_register_layout(
        '2c-l',
        array(
            'label'            => _x( '2 Columns: Content / Sidebar', 'theme layout', 'hybrid-core' ),
            'is_global_layout' => true,
            'is_post_layout'   => true,
            'image'            => '%s/images/sidebar-right.svg',
        )
    );
    hybrid_register_layout(
        '2c-r',
        array(
            'label'            => _x( '2 Columns: Sidebar / Content', 'theme layout', 'hybrid-core' ),
            'is_global_layout' => true,
            'is_post_layout'   => true,
            'image'            => '%s/images/sidebar-left.svg',
        )
    );
}
// In theme setup
//add_theme_support( 'category-layouts', array( 'default' => 'cards' ) );
add_action( 'hybrid_register_layouts', 'cat_register_layouts' );
function cat_register_layouts() {
    hybrid_register_layout(
        'blog',
        array(
            'label'            => _x( '1 Column Wide', 'theme layout', 'hybrid-core' ),
            'is_global_layout' => false,
            'is_post_layout'   => false,
            'image'            => '%s/images/blog.svg',
        )
    );
    hybrid_register_layout(
        'cards',
        array(
            'label'            => _x( 'Card View', 'theme layout', 'hybrid-core' ),
            'is_global_layout' => false,
            'is_post_layout'   => false,
            'image'            => '%s/images/cards.svg',
        )
    );
}
    add_theme_support( 'whistles', array( 'styles' => true ) );
    /* Editor styles. */
    add_editor_style( bempress_get_editor_styles() );
}



/**
 * Filters the header font to set the default.
 *
 * @since  1.0.0
 * @access public
 * @param  string  $hfont
 * @return string
 */
function bempress_theme_mod_heading_font( $hfont ) {
    return 'default' === $hfont ? 'sans-serif' : $hfont;
}

function bempress_theme_mod_body_font( $bfont ) {
    return 'default' === $bfont ? 'sans-serif' : $bfont;
}

add_filter( 'theme_mod_heading_font',  'bempress_theme_mod_heading_font', 95 );
add_filter( 'theme_mod_body_font',  'bempress_theme_mod_body_font', 95 );








/**
 * Load all required theme files.
 */
function bempress_includes() {
    // Set the includes directories.
    $includes_dir = trailingslashit( get_template_directory() );

require_once $includes_dir . 'inc/customizer/customizer.php';
}
