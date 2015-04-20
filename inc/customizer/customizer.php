<?php
/**
 * bempress Theme Customizer
 *
 * @package bempress
 */

if ( file_exists ( get_template_directory() . '/inc/customizer/customizer-library/customizer-library.php' ) ) :

// Helper library for the theme customizer.
require get_template_directory() . '/inc/customizer/customizer-library/customizer-library.php';

// Define options for the theme customizer.
require get_template_directory() . '/inc/customizer/options.php';

// Custom color functions.
require get_template_directory() . '/inc/customizer/Color.php';

// Output inline styles based on theme customizer selections.
require get_template_directory() . '/inc/customizer/styles.php';

// Additional filters and actions based on theme customizer selections.
require get_template_directory() . '/inc/customizer/mods.php';


endif;


