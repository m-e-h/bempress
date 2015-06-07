<?php
/**
 * Script and Style Loaders and Related Functions.
 *
 * @package BEMpress
 */

//add_action( 'admin_init', 'bempress_get_editor_styles' );
add_action( 'wp_enqueue_scripts', 'bempress_rtl_add_data' );
add_action( 'wp_enqueue_scripts', 'bempress_enqueue_styles', 4 );
add_action( 'wp_enqueue_scripts', 'bempress_scripts' );
add_filter( 'tiny_mce_before_init', 'bempress_tiny_mce_before_init' );



/**
 * Callback function for adding editor styles.  Use along with the add_editor_style() function.
 *
 * @since  1.0.0
 * @access public
 * @return array
 */
function bempress_get_editor_styles() {
    /* Set up an array for the styles. */
    $editor_styles = array();
    /* Add the theme's editor styles. */
    $editor_styles[] = trailingslashit( get_template_directory_uri() ) . 'css/editor-style.css';
    /* If a child theme, add its editor styles. Note: WP checks whether the file exists before using it. */
    if ( is_child_theme() && file_exists( trailingslashit( get_stylesheet_directory() ) . 'css/editor-style.css' ) )
        $editor_styles[] = trailingslashit( get_stylesheet_directory_uri() ) . 'css/editor-style.css';
    /* Add the locale stylesheet. */
    $editor_styles[] = get_locale_stylesheet_uri();
    /* Uses Ajax to display custom theme styles added via the Theme Mods API. */
    $editor_styles[] = add_query_arg( 'action', 'bempress_editor_styles', admin_url( 'admin-ajax.php' ) );
    /* Return the styles. */
    return $editor_styles;
}

/**
 * Adds the <body> class to the visual editor.
 *
 * @since  1.0.0
 * @access public
 * @param  array  $settings
 * @return array
 */
function bempress_tiny_mce_before_init( $settings ) {
    $settings['body_class'] = join( ' ', get_body_class() );
    return $settings;
}

/**
 * Editor styles.
 */
// function bempress_add_editor_styles() {
// 	// Set up editor styles
//     $editor_styles = [
//     '//fonts.googleapis.com/css?family=Raleway:400,600|Lato:400,400italic,700',
//     'css/editor-style.css',
//     ];

// 	// Add the editor styles.
// 	add_editor_style( $editor_styles );
// }


/**
 * Replace the default theme stylesheet with a RTL version when a RTL
 * language is being used.
 */
function bempress_rtl_add_data() {
    wp_style_add_data( 'style', 'rtl', 'replace' );
    wp_style_add_data( 'style', 'suffix', hybrid_get_min_suffix() );
}


/**
 * Enqueue theme styles.
 */
function bempress_enqueue_styles() {

    $suffix = hybrid_get_min_suffix();

    wp_enqueue_style(
        'bem-material-icons',
        '//fonts.googleapis.com/icon?family=Material+Icons'
    );

if ( is_child_theme() )
    wp_enqueue_style(
        'parent',
        trailingslashit( get_template_directory_uri() ) . "style{$suffix}.css"
    );
    wp_enqueue_style(
        'style',
        get_stylesheet_uri()
    );
}






// Register Script
function bempress_scripts() {

        wp_register_script(
        'bempress-gs',
        "//cdnjs.cloudflare.com/ajax/libs/gsap/1.17.0/TweenMax.min.js", false, false, true );
        //wp_enqueue_script( 'bempress-gs' );

        wp_register_script(
        'bempress-headroom',
        "//cdn.jsdelivr.net/headroomjs/0.7.0/headroom.min.js", false, false, true );
        wp_enqueue_script( 'bempress-headroom' );

    wp_register_script( 'bempress-nav',
        trailingslashit( get_template_directory_uri() ) . "js/nav.js", false, false, true );
    wp_enqueue_script( 'bempress-nav' );



    wp_register_script( 'bempress-panel',
        trailingslashit( get_template_directory_uri() ) . "js/panel.js", false, false, true );

    if ( is_active_sidebar( 'panel-one' ) || is_active_sidebar( 'panel-two' ) || is_active_sidebar( 'panel-three' ) ) :

        wp_enqueue_script( 'bempress-panel' );

    endif;
}
