<?php

namespace Bempress\Titles;

/**
 * Page titles.
 */
function title() {
    if (is_archive()) {
        return get_the_archive_title();
    } elseif (is_search()) {
        return sprintf(esc_html__('Search Results for %s', 'bempress'), get_search_query());
    } elseif (is_404()) {
        return esc_html__('Not Found', 'bempress');
    } elseif (!hybrid_is_plural() && !is_404()) {
        return get_the_title();
    }
}
