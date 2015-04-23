<?php
/**
 * The template for displaying search results pages.
 *
 * @package BEMpress
 */

get_header(); ?>

    <?php tha_content_before(); ?>

    <main <?php hybrid_attr( 'content' ); ?>>

        <?php hybrid_get_menu( 'breadcrumbs' ); ?>

        <?php tha_content_top(); ?>

		<?php if ( have_posts() ) : ?>

			<?php get_template_part( 'templates/loop-meta' ); ?>

			<?php while ( have_posts() ) : the_post(); ?>

                <?php tha_entry_before(); ?>

				<?php get_template_part( 'content/search' ); ?>

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
