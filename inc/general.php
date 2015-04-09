<?php
/**
 * General Theme-Specific Functions.
 *
 * @package     BEMpress
 */

add_action( 'init', 'bempress_register_image_sizes', 5 );
/**
 * Register custom image sizes for the theme.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function bempress_register_image_sizes() {
	// Set the 'post-thumbnail' size.
	set_post_thumbnail_size( 175, 130, true );

	// Add the 'bempress-full' image size.
	add_image_size( 'bempress-full', 1025, 500, true );
}

add_filter( 'excerpt_length', 'bempress_excerpt_length' );
/**
 * Add a custom excerpt length.
 *
 * @since  1.0.0
 * @access public
 * @param  integer $length
 * @return integer
 */
function bempress_excerpt_length( $length ) {
	return 60;
}




/**
 * Get default footer text
 *
 * @return string $text
 */
function bempress_get_default_footer_text() {
    $text = sprintf(
        __( 'Copyright &#169; %1$s %2$s.', 'abraham' ),
    date_i18n( 'Y' ),
    hybrid_get_site_link()
    );
    return $text;
}






add_action( 'tha_entry_bottom', 'abraham_do_format_icon' );


function abraham_do_format_icon() { ?>
<span class="entry-format"><?php abe_post_format_link(); ?></span>
<?php
}
/**
 * Outputs an svg link to the post format archive.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function abe_post_format_link() {
    echo abe_get_post_format_link();
}
/**
 * Generates a link to the current post format's archive.  If the post doesn't have a post format, the link
 * will go to the post permalink.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function abe_get_post_format_link() {
    $format = get_post_format();
    get_template_part( 'images/vector/svg', $format );
    $url    = empty( $format ) ? get_permalink() : get_post_format_link( $format );
    return sprintf( '<a href="%s" class="post-format-link"></a>', esc_url( $url ) );
}













function bempress_responsive_videos_init() {

    /* If the theme does support 'bempress-responsive-videos', wrap the videos */
    add_filter( 'wp_video_shortcode', 'bempress_responsive_videos_embed_html' );
    add_filter( 'embed_oembed_html',  'bempress_responsive_videos_embed_html' );
    add_filter( 'video_embed_html',   'bempress_responsive_videos_embed_html' );
    /* Wrap videos in Buddypress */
    add_filter( 'bp_embed_oembed_html', 'bempress_responsive_videos_embed_html' );
}
add_action( 'after_setup_theme', 'bempress_responsive_videos_init', 99 );
/**
 * Adds a wrapper to videos and enqueue script
 *
 * @return string
 */
function bempress_responsive_videos_embed_html( $html ) {
    if ( empty( $html ) || ! is_string( $html ) ) {
        return $html;
    }
    return '<div class="featured-media__ratio featured-media__ratio--16by9"></div>' . $html;
}









// Attributes for major structural elements.
add_filter( 'hybrid_attr_primary',          'flagship_attr_primary' );
add_filter( 'hybrid_attr_main',             'flagship_attr_main' );


/**
 * Main content container of the page attributes.
 *
 * @since  1.0.0
 * @access public
 * @param  array $attr
 * @return array
 */
function flagship_attr_primary( $attr ) {
    $attr['id'] = 'primary';
    $attr['class'] = 'content-area';
    return $attr;
}

/**
 * Main content container of the page attributes.
 *
 * @since  2.0.0
 * @access public
 * @param  array   $attr
 * @return array
 */
function flagship_attr_main( $attr ) {
    $attr['id']       = 'main';
    $attr['class']    = 'site-main';
    $attr['role']     = 'main';
    $attr['itemprop'] = 'mainContentOfPage';
    if ( is_singular( 'post' ) || is_home() || is_archive() ) {
        $attr['itemscope'] = '';
        $attr['itemtype']  = 'http://schema.org/Blog';
    }
    elseif ( is_search() ) {
        $attr['itemscope'] = 'itemscope';
        $attr['itemtype']  = 'http://schema.org/SearchResultsPage';
    }
    return $attr;
}
