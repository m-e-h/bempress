<?php

namespace Roots\Bempress\Init;

use Roots\Bempress\Assets;

/**
 * Theme setup
 */

add_action('after_setup_theme', __NAMESPACE__ . '\\setup', 5 );
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init', 5 );
add_action( 'hybrid_register_layouts', __NAMESPACE__ . '\\register_layouts' );


function setup() {

    // http://codex.wordpress.org/Automatic_Feed_Links
    add_theme_support( 'automatic-feed-links' );

    // https://github.com/justintadlock/breadcrumb-trail
    add_theme_support( 'breadcrumb-trail' );

    // https://github.com/justintadlock/get-the-image
    add_theme_support( 'get-the-image' );

    // http://themehybrid.com/docs/template-hierarchy
    add_theme_support( 'hybrid-core-template-hierarchy' );

    // Layouts
    add_theme_support( 'theme-layouts', [ 'default' => 'single-column' ] );

    // http://codex.wordpress.org/Function_Reference/register_nav_menus
    register_nav_menus([
      'primary' => __('Primary', 'bempress')
    ]);

  // http://codex.wordpress.org/Post_Formats
    add_theme_support('post-formats', [
        'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'
    ]);

  // Tell the TinyMCE editor to use a custom stylesheet
    add_editor_style(trailingslashit( get_template_directory_uri() ) . 'css/editor-style.css');
}


/**
 * Register sidebars
 */
function widgets_init() {
  hybrid_register_sidebar([
    'name'          => __('Primary', 'bempress'),
    'id'            => 'primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);

  hybrid_register_sidebar([
    'name'          => __('Footer', 'bempress'),
    'id'            => 'footer',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);
}


function register_layouts() {

    hybrid_get_layout( 'default' )->image = '%s/images/default.svg';

    hybrid_register_layout( 'single-column', [
        'label'            => _x( 'Single Column', 'theme layout', 'bempress' ),
        'is_global_layout' => true,
        'is_post_layout'   => true,
        'image'            => '%s/images/single-column.svg',
    ] );

    hybrid_register_layout( 'single-column--wide', [
        'label'            => _x( 'Single Column Wide', 'theme layout', 'bempress' ),
        'is_global_layout' => true,
        'is_post_layout'   => true,
        'image'            => '%s/images/single-column-wide.svg',
    ] );

    hybrid_register_layout( 'sidebar-right', [
        'label'            => _x( 'Sidebar Right', 'theme layout', 'bempress' ),
        'is_global_layout' => true,
        'is_post_layout'   => true,
        'image'            => '%s/images/sidebar-right.svg',
    ] );

    hybrid_register_layout( 'sidebar-left', [
        'label'            => _x( 'Sidebar Left', 'theme layout', 'bempress' ),
        'is_global_layout' => true,
        'is_post_layout'   => true,
        'image'            => '%s/images/sidebar-left.svg',
    ] );
}
