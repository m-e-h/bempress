<?php
/**
 * Theme includes
 *
 * @link https://github.com/roots/sage/pull/1042
 */

$bempress_includes = [
  'hybrid-core/hybrid.php',        // Hybrid Core library
  'inc/utils.php',                 // Utility functions
  'inc/init.php',                  // Initial theme setup
  'inc/assets.php',                // Scripts and stylesheets
  'inc/extras.php',                // Custom functions
];

foreach ($bempress_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__(
        'Error locating %s for inclusion', 'bempress'
        ), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

new Hybrid();
