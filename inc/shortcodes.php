<?php
add_action( 'init', 'meh_add_shortcodes' );

function meh_add_shortcodes() {
add_shortcode( 'meh_block', 'meh_block_shortcode' );
}




/**
 * BLOCK
 */
function meh_block_shortcode( $atts, $content = null ) {
    global $mehsc_atts;
    $mehsc_atts   = shortcode_atts( array(
        'icon'      => '',
        'width'     => '',
        'page'      => '',
        'block_type' => '',
        'show_image'      => '',
        'show_content'      => '',
    ), $atts, 'meh_block' );

$output = '<section class="row pages-highlight"><div class="block-row grid u-flex u-flex--row@md u-flex--w wrap">';

// Get pages set in the customizer (if any)
$pages = $mehsc_atts['page'];

$args = array(
    'posts_per_page' => 5,
    'post_type' => 'page',
    'post__in' => explode(",", $pages),
    'orderby' => 'post__in'
);

$query2 = new WP_Query( $args );
while ( $query2->have_posts() ) : $query2->the_post();
ob_start();
get_template_part( 'templates/section', 'block' );
$output .= ob_get_clean();

    endwhile;

$output .= '</div></section>';
    return $output;
}
