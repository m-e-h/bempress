<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package BEMpress
 */

get_header(); ?>

    <?php tha_content_before(); ?>

    <main <?php hybrid_attr( 'content' ); ?>>

        <?php tha_content_top(); ?>

        <?php if ( have_posts() ) : ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <div <?php hybrid_attr( 'wrap', 'card' ); ?>>

                <?php tha_entry_before(); ?>

                <?php hybrid_get_content_template(); ?>

                <?php tha_entry_after(); ?>

                </div>

            <?php endwhile; ?>

            <?php get_template_part( 'templates/post-nav' ); ?>

        <?php else : ?>

            <?php get_template_part( 'content/none' ); ?>

        <?php endif; ?>

        <?php tha_content_bottom(); ?>

        </main><!-- #main -->

    <?php tha_content_after(); ?>

<?php hybrid_get_sidebar( 'primary' ); ?>

<?php
get_footer();
