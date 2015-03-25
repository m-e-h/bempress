<?php
/**
 * A template part for displaying an entry in both single and archive posts.
 *
 * @package     BEMpress
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, Flagship Software, LLC
 * @license     GPL-2.0+
 * @link        https://flagshipwp.com/
 * @since       1.0.0
 */
?>
<article <?php hybrid_attr( 'post' ); ?>>

	<?php tha_entry_top(); ?>


<?php if ( is_singular( get_post_type() ) ) : //single posts. ?>


		<?php get_template_part( 'templates/single', 'header' ); ?>

	<div class="entry-content">
		<?php hybrid_attachment(); // Function for handling non-image attachments. ?>
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<p class="entry-meta">
			<?php flagship_entry_published(); ?>
			<?php edit_post_link(); ?>
		</p>
	</footer><!-- .entry-footer -->


<?php else : // If not viewing a single post. ?>


		<?php
		// Display a featured image if we can find something to display.
		get_the_image(
			array(
				'size'   => 'bempress-full',
				'order'  => array( 'featured', 'attachment' ),
				'before' => '<div class="featured-media image">',
				'after'  => '</div>',
			)
		);
		?>

		<?php get_template_part( 'templates/archive', 'header' ); ?>

		<?php get_template_part( 'templates/archive', 'content' ); ?>


<?php endif; // End single post check. ?>


	<?php tha_entry_bottom(); ?>

</article><!-- .entry -->
