<?php

namespace Bempress\Assets;

/*
 * Scripts and stylesheets
 */
add_action('wp_enqueue_scripts', __NAMESPACE__.'\\assets', 100);

function assets() {
    $suffix = hybrid_get_min_suffix();

    wp_enqueue_style(
        'material-icons',
        '//fonts.googleapis.com/icon?family=Material+Icons'
    );

    if (is_child_theme()) {
        wp_enqueue_style(
        'parent',
        trailingslashit(get_template_directory_uri())."style{$suffix}.css"
        );
    }
    wp_enqueue_style(
        'style',
        get_stylesheet_uri()
    );

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script(
        'comment-reply'
        );
    }

    wp_enqueue_script(
        'bempress_js',
        trailingslashit(get_template_directory_uri())."assets/js/main{$suffix}.js",
        false, null, true
    );

    wp_register_script(
        'meh_tabs',
        trailingslashit(get_template_directory_uri())."assets/js/tabby{$suffix}.js",
        false, null, true
    );

    wp_register_script(
        'meh_toggles',
        trailingslashit(get_template_directory_uri())."assets/js/houdini{$suffix}.js",
        false, null, true
    );
}
