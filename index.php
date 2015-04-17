<?php
/**
 * The main template file.
 *
 * @package BEMpress
 */

get_header(); ?>

    <?php tha_content_before(); ?>

    <main <?php hybrid_attr( 'content' ); ?>>

        <?php hybrid_get_menu( 'breadcrumbs' ); ?>

        <?php tha_content_top(); ?>

            <?php
                if ( ! is_front_page() && ! is_home() ) :
                    get_template_part( 'templates/loop-meta' );
                endif;
            ?>

        <?php if ( have_posts() ) : ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <?php tha_entry_before(); ?>

                <?php hybrid_get_content_template(); ?>

                <?php tha_entry_after(); ?>

            <?php endwhile; ?>

            <?php get_template_part( 'templates/loop-nav' ); ?>

        <?php else : ?>

            <?php get_template_part( 'content/none' ); ?>

        <?php endif; ?>

        <?php tha_content_bottom(); ?>

        </main><!-- #main -->

    <?php tha_content_after(); ?>

<?php hybrid_get_sidebar( 'primary' ); ?>

<?php
get_footer();
