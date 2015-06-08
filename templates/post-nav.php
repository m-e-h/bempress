<?php
/**
 * A template part to display posts navigation.
 *
 * @package BEMpress
 */

if ( is_singular( 'post' ) ) : // If viewing a single post page.

    the_post_navigation( array(
        'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'bempress' ) . '</span> ' .
            '<span class="screen-reader-text">' . __( 'Next post:', 'bempress' ) . '</span> ' .
            '<span class="post-title">%title</span>',
        'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'bempress' ) . '</span> ' .
            '<span class="screen-reader-text">' . __( 'Previous post:', 'bempress' ) . '</span> ' .
            '<span class="post-title">%title</span>',
    ) );

elseif ( is_home() || is_archive() || is_search() ) :

    the_posts_pagination( array(
        'prev_text'          => __( 'Previous page', 'bempress' ),
        'next_text'          => __( 'Next page', 'bempress' ),
        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bempress' ) . ' </span>',
    ) );

endif; // End check for type of page being viewed.
