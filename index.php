<?php
/**
 * @package     BEMpress
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, Flagship Software, LLC
 * @license     GPL-2.0+
 * @link        https://flagshipwp.com/
 * @since       1.0.0
 */

get_header(); ?>

<?php
tha_content_before(); ?>

	<div <?php hybrid_attr( 'primary' ); ?>>

		<?php hybrid_get_menu( 'breadcrumbs' ); ?>

		<main <?php hybrid_attr( 'main' ); ?>>

<?php
tha_content_top(); ?>

			<?php
				if ( !is_front_page() && !is_singular() && !is_404() ) :
					get_template_part( 'templates/loop-meta' );
				endif;
			?>

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

<?php
tha_entry_before(); ?>

					<?php hybrid_get_content_template(); ?>

<?php
tha_entry_after(); ?>

				<?php endwhile; ?>

				<?php flagship_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'content/error' ); ?>

			<?php endif; ?>

<?php
tha_content_bottom(); ?>

		</main><!-- #content -->
	</div>

<?php
tha_content_after(); ?>

	<?php hybrid_get_sidebar( 'primary' ); ?>

<?php get_footer();
