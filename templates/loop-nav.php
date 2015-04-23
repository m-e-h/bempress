<?php
/**
 * A template part to display posts navigation.
 *
 * @package BEMpress
 */

if ( is_singular( 'post' ) ) : // If viewing a single post page.

    flagship_post_navigation( [
        'next_text' => '<span class="meta-nav button button--transparent next" aria-hidden="true">' . __( 'Next', 'bempress' ) .
            '</span>',
        'prev_text' => '<span class="meta-nav button button--transparent prev" aria-hidden="true">' . __( 'Previous', 'bempress' ) .
            '</span>',
    ] );

elseif ( is_home() || is_archive() || is_search() ) :

    flagship_posts_navigation();

endif; // End check for type of page being viewed.
