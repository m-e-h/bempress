<?php

namespace Bempress\Utils;


add_filter('hybrid_content_template_hierarchy', __NAMESPACE__ . '\\template_hierarchy');
add_filter('get_search_form', __NAMESPACE__ . '\\get_search_form');
//add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');
add_filter('excerpt_length', __NAMESPACE__ . '\\excerpt_length');
add_filter('the_content', __NAMESPACE__ . '\\remove_empty_p', 20, 1);
add_action('after_setup_theme', __NAMESPACE__ . '\\responsive_videos', 99);




function template_hierarchy($templates) {

    if (is_search())
        $templates = array_merge(['content/search.php'], $templates);

    elseif (is_404())
        $templates = array_merge(['content/404.php'], $templates);

    return $templates;
}




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
  return ' &hellip; <a class="" href="' . get_permalink() . '">' . __('Continued', 'bempress') . '</a>';
}

function excerpt_length($length) {
    return 40;
}



function remove_empty_p($content) {
    $content = force_balance_tags($content);
    $return = preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
    $return = preg_replace('~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $return);
    return $return;
}




function responsive_videos() {

    add_filter('wp_video_shortcode', __NAMESPACE__ . '\\responsive_videos_embed_html');
    add_filter('embed_oembed_html', __NAMESPACE__ . '\\responsive_videos_embed_html');
    add_filter('video_embed_html', __NAMESPACE__ . '\\responsive_videos_embed_html');

    /* Wrap videos in Buddypress */
    add_filter('bp_embed_oembed_html', __NAMESPACE__ . '\\responsive_videos_embed_html');
}

/**
 * Adds a wrapper to videos and enqueue script
 *
 * @return string
 */
function responsive_videos_embed_html($html) {
    if (empty($html) || ! is_string($html)) {
        return $html;
    }
    return '<div class="flex-embed"><div class="flex-embed__ratio flex-embed__ratio--16by9"></div>'.$html.'</div>';
}
