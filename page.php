<?php
/**
 * The template for displaying all pages.
 *
 * @package BEMpress
 */

get_header(); ?>

    <div <?php hybrid_attr( 'primary' ); ?>>

    <?php tha_content_before(); ?>

        <?php hybrid_get_menu( 'breadcrumbs' ); ?>

        <main <?php hybrid_attr( 'main' ); ?>>

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

    </div><!-- #primary -->

<?php hybrid_get_sidebar( 'primary' ); ?>

<?php
get_footer();
