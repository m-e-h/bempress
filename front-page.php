<?php
/**
 * The Front Page template file.
 *
 * @package BEMpress
 */

get_header(); ?>

    <?php tha_content_before(); ?>

    <main <?php hybrid_attr( 'content' ); ?>>

        <?php tha_content_top(); ?>

        <?php if ( have_posts() ) : ?>

        <?php echo do_shortcode( '[slider type="slider" group="front" order="DESC" orderby="rand" limit="-1"]' ); ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <?php tha_entry_before(); ?>

                <?php get_template_part( 'content/front' ); ?>

                <?php tha_entry_after(); ?>

            <?php endwhile; ?>

        <?php get_template_part( 'templates/showcase', 'pages' ); ?>

            <?php hybrid_get_sidebar( 'front' ); ?>

        <?php get_template_part( 'templates/showcase', 'page' ); ?>

        <?php else : ?>

            <?php get_template_part( 'content/none' ); ?>

        <?php endif; ?>

        <?php tha_content_bottom(); ?>

        </main><!-- #main -->

    <?php tha_content_after(); ?>

<?php hybrid_get_sidebar( 'primary' ); ?>

<?php
get_footer();
