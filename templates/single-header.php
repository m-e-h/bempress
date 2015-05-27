<?php
/**
 * @package Abraham
 */
?>

<header class="entry__header entry__header--feature u-mb@respond">

    <?php
    // Display a featured image if we can find something to display.
    get_the_image( [
        'size'   => 'bempress-md',
        'srcset_sizes' => array(
            'bempress-full' => '1920w',
            'bempress-sm' => '640w',
            'bempress-full-cropped' => '1280w',
            'bempress-retina' => '2560w',
            ),
        'order'  => [ 'featured', 'attachment' ],
        'link_to_post' => false,
        'order'         => [ 'featured' ],
        'before'        => '<div class="featured-media image">',
        'after'         => '</div>',
    ] );
    ?>

    <div class="feature-text">
    <div <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></div>
    </div>

</header><!-- .entry-header -->
