<?php

namespace Roots\Bempress\Utils;


add_filter('get_search_form', __NAMESPACE__ . '\\get_search_form');
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');
add_filter('excerpt_length', __NAMESPACE__ . '\\excerpt_length');
add_action('after_setup_theme', __NAMESPACE__ . '\\responsive_videos', 99);




/**
 * Tell WordPress to use searchform.php from the components/ directory
 */
function get_search_form() {
  $form = '';
  locate_template('/components/searchform.php', true, false);
  return $form;
}

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'bempress') . '</a>';
}

function excerpt_length( $length ) {
    return 60;
}



function responsive_videos() {

    add_filter( 'wp_video_shortcode', 'bempress_responsive_videos_embed_html' );
    add_filter( 'embed_oembed_html',  'bempress_responsive_videos_embed_html' );
    add_filter( 'video_embed_html',   'bempress_responsive_videos_embed_html' );

    /* Wrap videos in Buddypress */
    add_filter( 'bp_embed_oembed_html', 'bempress_responsive_videos_embed_html' );
}

/**
 * Adds a wrapper to videos and enqueue script
 *
 * @return string
 */
function bempress_responsive_videos_embed_html( $html ) {
    if ( empty( $html ) || ! is_string( $html ) ) {
        return $html;
    }
    return '<div class="flex-embed"><div class="flex-embed__ratio flex-embed__ratio--16by9"></div>' . $html .'</div>';
}
