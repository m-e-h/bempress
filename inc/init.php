<?php

namespace Bempress\Init;

//use Bempress\Assets;

/**
 * Theme setup
 */

add_action('after_setup_theme', __NAMESPACE__ . '\\setup', 5);
add_action('widgets_init', __NAMESPACE__ . '\\widgets', 5);
add_action('init', __NAMESPACE__ . '\\image_sizes', 5);
add_action('hybrid_register_layouts', __NAMESPACE__ . '\\layouts');


function setup() {

    // http://codex.wordpress.org/Automatic_Feed_Links
    add_theme_support('automatic-feed-links');

    // https://github.com/justintadlock/breadcrumb-trail
    add_theme_support('breadcrumb-trail');

    // https://github.com/justintadlock/get-the-image
    add_theme_support('get-the-image');

    // http://themehybrid.com/docs/template-hierarchy
    add_theme_support('hybrid-core-template-hierarchy');

    // Layouts
    add_theme_support('theme-layouts', [ 'default' => 'single-column' ]);

    // http://codex.wordpress.org/Function_Reference/register_nav_menus
    register_nav_menus([
      'primary' => __('Primary', 'bempress')
    ]);

  // http://codex.wordpress.org/Post_Formats
    add_theme_support('post-formats', [
        'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'
    ]);

    add_theme_support('custom-background',
        apply_filters('bempress_background_args', [
        'default-color' => 'ffffff',
        'default-image' => '',
        ])
   );

  // Tell the TinyMCE editor to use a custom stylesheet
    add_editor_style(trailingslashit(get_template_directory_uri()) . 'assets/css/editor-style.css');
}


/**
 * Register sidebars
 */
function widgets() {
  hybrid_register_sidebar([
    'name'          => __('Primary', 'bempress'),
    'id'            => 'primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>'
  ]);

  hybrid_register_sidebar([
    'name'          => __('Footer', 'bempress'),
    'id'            => 'footer',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>'
  ]);
}




function image_sizes() {
    // Set the 'post-thumbnail' size.
    set_post_thumbnail_size(150, 150, true);
    // Add the 'bempress-full' image size.
    add_image_size('bempress-retina', 2560, 720, true);
    add_image_size('bempress-md', 1024, 288, true);
    add_image_size('bempress-full-cropped', 1280, 720, true);
    add_image_size('bempress-full', 1920, 740, true);
    add_image_size('bempress-hd', 1920, 1080, true);
    add_image_size('bempress-sm', 640, 360, true);
}




function layouts() {

    hybrid_get_layout('default')->image = '%s/images/default.svg';

    hybrid_register_layout('single-column', [
        'label'            => _x('Single Column', 'theme layout', 'bempress'),
        'is_global_layout' => true,
        'is_post_layout'   => true,
        'image'            => '%s/assets/images/single-column.svg',
    ]);

    hybrid_register_layout('single-column--wide', [
        'label'            => _x('Single Column Wide', 'theme layout', 'bempress'),
        'is_global_layout' => true,
        'is_post_layout'   => true,
        'image'            => '%s/assets/images/single-column-wide.svg',
    ]);

    hybrid_register_layout('sidebar-right', [
        'label'            => _x('Sidebar Right', 'theme layout', 'bempress'),
        'is_global_layout' => true,
        'is_post_layout'   => true,
        'image'            => '%s/assets/images/sidebar-right.svg',
    ]);

    hybrid_register_layout('sidebar-left', [
        'label'            => _x('Sidebar Left', 'theme layout', 'bempress'),
        'is_global_layout' => true,
        'is_post_layout'   => true,
        'image'            => '%s/assets/images/sidebar-left.svg',
    ]);
}
