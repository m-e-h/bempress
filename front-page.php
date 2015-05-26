<?php
/**
 * The Front Page template file.
 *
 * @package BEMpress
 */

get_header(); ?>



    <?php tha_content_before(); ?>

        <div <?php hybrid_attr( 'site-inner' ); ?>>

    <main <?php hybrid_attr( 'content' ); ?>>

        <?php tha_content_top(); ?>

        <?php if ( have_posts() ) : ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <?php tha_entry_before(); ?>

                <?php get_template_part( 'content/front' ); ?>

                <?php tha_entry_after(); ?>

            <?php endwhile; ?>

        <?php else : ?>

            <?php get_template_part( 'content/none' ); ?>

        <?php endif; ?>

        <?php tha_content_bottom(); ?>

        </main><!-- #main -->

    <?php tha_content_after(); ?>

<?php hybrid_get_sidebar( 'primary' ); ?>

<?php
get_footer();
