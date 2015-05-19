<?php
/**
 * The template for displaying all pages.
 *
 * @package BEMpress
 */

get_header(); ?>

<header class="entry__header entry__header--feature">

    <?php
    // Display a featured image if we can find something to display.
    get_the_image( [
        'size'          => 'bempress-full',
        'split_content' => true,
        'link_to_post' => false,
        'scan_raw'      => true,
        'scan'          => true,
        'order'         => [ 'featured' ],
        'before'        => '<div class="featured-media image">',
        'after'         => '</div>',
    ] );
    ?>

    <div class="feature-text">
    <div <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></div>
    </div>

</header><!-- .entry-header -->

    <?php tha_content_before(); ?>

        <div <?php hybrid_attr( 'site-inner' ); ?>>

    <main <?php hybrid_attr( 'content' ); ?>>

        <?php tha_content_top(); ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <?php tha_entry_before(); ?>

                <?php hybrid_get_content_template(); ?>

                <?php tha_entry_after(); ?>

                <?php comments_template( '', true ); ?>

            <?php endwhile; // end of the loop. ?>

        <?php tha_content_bottom(); ?>

        </main><!-- #main -->

    <?php tha_content_after(); ?>

<?php hybrid_get_sidebar( 'primary' ); ?>

<?php
get_footer();
