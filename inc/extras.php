<?php

namespace Roots\Bempress\Extras;


/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'bempress') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');
