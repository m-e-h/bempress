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




add_action( 'cmb2_init', 'bempress_register_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_init' hook.
 */
function bempress_register_metabox() {
    // Start with an underscore to hide fields from custom fields list
    $prefix = '_bempress_';

        $bem_box = new_cmb2_box( array(
        'id'            => $prefix . 'metabox',
        'title'         => __( 'Content Box', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        // 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
        //'closed'     => true, // true to keep the metabox closed by default
    ) );

    $bem_box->add_field( array(
        //'name'    => __( 'Features', 'cmb2' ),
        //'desc'    => __( 'field description (optional)', 'cmb2' ),
        'id'      => $prefix . 'wysiwyg',
        'type'    => 'wysiwyg',
        'options' => array(
            'wpautop' => false,
            'teeny' => true,
            'quicktags' => false,
            ),
    ) );
}


function bempress_wysiwyg_output( $meta_key, $post_id = 0 ) {
    global $wp_embed;

    $post_id = $post_id ? $post_id : get_the_id();

    $content = get_post_meta( $post_id, $meta_key, 1 );
    $content = $wp_embed->autoembed( $content );
    $content = $wp_embed->run_shortcode( $content );
    $content = do_shortcode( $content );

    return $content;
}
