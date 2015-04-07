<?php
/**
 * The template for displaying search results pages.
 *
 * @package BEMpress
 */

get_header(); ?>

    <div <?php hybrid_attr( 'primary' ); ?>>

    <?php tha_content_before(); ?>

        <?php hybrid_get_menu( 'breadcrumbs' ); ?>

        <main <?php hybrid_attr( 'main' ); ?>>

        <?php tha_content_top(); ?>

		<?php if ( have_posts() ) : ?>

			<?php get_template_part( 'templates/loop-meta' ); ?>

			<?php while ( have_posts() ) : the_post(); ?>

                <?php tha_entry_before(); ?>

				<?php get_template_part( 'content/search' ); ?>

                <?php tha_entry_after(); ?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content/none' ); ?>

		<?php endif; ?>

        <?php tha_content_bottom(); ?>

        </main><!-- #main -->

    <?php tha_content_after(); ?>

    </div><!-- #primary -->


<?php hybrid_get_sidebar( 'primary' ); ?>

<?php
get_footer();
