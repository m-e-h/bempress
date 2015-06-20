<?php
/**
 * Theme includes
 *
 * @link https://github.com/roots/sage/pull/1042
 */

$bempress_includes = [
    'hybrid-core/hybrid.php',           // Hybrid Core library
    'inc/attr-trumps.php',              // Css class selectors
    'inc/utils.php',                    // Utility functions
    'inc/init.php',                     // Initial theme setup
    'inc/assets.php',                   // Scripts and styles
    'inc/titles.php',                   // Page titles
    'inc/html-min.php',                 // Minify html output
    'inc/tiny-mce.php',                 // Initial theme setup
    'inc/shortcodes.php',               // Scripts and styles
    'inc/shortcodes-ui.php',            // Page titles
    'inc/customizer/customizer.php',    // Minify html output
];

foreach ($bempress_includes as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__(
        'Error locating %s','bempress'
        ),$file),E_USER_ERROR);
    }
    require_once $filepath;
}
unset($file, $filepath);

new Hybrid();
