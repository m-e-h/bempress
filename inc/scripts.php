<?php
/**
 * Script and Style Loaders and Related Functions.
 *
 * @package BEMpress
 */

add_action( 'admin_init', 'bempress_add_editor_styles' );
add_action( 'wp_enqueue_scripts', 'bempress_rtl_add_data' );
add_action( 'wp_enqueue_scripts', 'bempress_enqueue_styles', 4 );
add_action( 'wp_enqueue_scripts', 'bempress_enqueue_scripts' );





/**
 * Editor styles.
 */
function bempress_add_editor_styles() {
	// Set up editor styles
    $editor_styles = [
    '//fonts.googleapis.com/css?family=Raleway:400,600|Lato:400,400italic,700',
    'css/editor-style.css',
    ];

	// Add the editor styles.
	add_editor_style( $editor_styles );
}


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
        'bem-font-awesome',
        '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'
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


/**
 * Enqueue theme scripts.
 */
function bempress_enqueue_scripts() {
    $suffix = hybrid_get_min_suffix();

    wp_enqueue_script(
        'bempress-main',
        trailingslashit( get_template_directory_uri() ) . 'js/main.js', ['jquery'], null, true
    );
}
