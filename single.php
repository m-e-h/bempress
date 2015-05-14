<?php
/**
 * The template for displaying all single posts.
 *
 * @package BEMpress
 */

get_header(); ?>

    <?php tha_content_before(); ?>

    <main <?php hybrid_attr( 'content' ); ?>>

        <?php tha_content_top(); ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <?php tha_entry_before(); ?>

                <?php hybrid_get_content_template(); ?>

                <?php tha_entry_after(); ?>

                <?php get_template_part( 'templates/post-nav' ); ?>

                <?php comments_template( '', true ); ?>

            <?php endwhile; // end of the loop. ?>

        <?php tha_content_bottom(); ?>

        </main><!-- #main -->

    <?php tha_content_after(); ?>

<?php hybrid_get_sidebar( 'primary' ); ?>

<?php
get_footer();
