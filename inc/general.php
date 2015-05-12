<?php
/**
 * General Theme-Specific Functions.
 *
 * @package     BEMpress
 */

add_action( 'init', 'bempress_register_image_sizes', 5 );
add_filter( 'excerpt_length', 'bempress_excerpt_length' );
add_filter( 'excerpt_more', 'bempress_excerpt_more' );
//add_action( 'tha_entry_bottom', 'abraham_do_format_icon' );
add_action( 'after_setup_theme', 'bempress_responsive_videos_init', 99 );
add_filter( 'hybrid_attr_comments-area', 'flagship_attr_comments_area' );
add_filter( 'walker_nav_menu_start_el', 'bempress_nav_description', 10, 4 );
add_filter('upload_mimes', 'bempress_mime_types');


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


function bempress_excerpt_more( $more ) {
    $link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
        esc_url( get_permalink( get_the_ID() ) ),
        /* translators: %s: Name of current post */
        sprintf( __( 'Continue reading %s', 'bempress' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
        );
    return '&hellip; ' . $link;
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







/**
 * Comment area attributes.
 *
 * @since  1.0.0
 * @access public
 * @param  array $attr
 * @return array
 */
function flagship_attr_comments_area( $attr ) {
    $attr['id']    = 'comments-area';
    $attr['class'] = 'comments-area';
    return $attr;
}




function bempress_nav_description( $item_output, $item, $depth, $args ) {
    if ( $item->description ) {
        $item_output = str_replace( $args->link_after . '</a>', '</a><a data-tip="true" class="tip--left tip--large tip--bottom menu-item__description info" data-tip-content="' . $item->description . '"><i class="fa fa-info-circle"></i></a>' . $args->link_after , $item_output );
    }
    return $item_output;
}




function bempress_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
