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

		<?php get_template_part( 'templates/single', 'content' ); ?>

		<?php get_template_part( 'templates/single', 'footer' ); ?>


<?php else : // If not viewing a single post. ?>


		<?php
		// Display a featured image if we can find something to display.
		get_the_image( [
			'size'   => 'bempress-full',
			'before' => '<div class="featured-media image">',
			'after'  => '</div>',
		] );
		?>

		<?php get_template_part( 'templates/archive', 'header' ); ?>

		<div <?php hybrid_attr( 'entry-summary' ); ?>>
			<?php the_excerpt(); ?>
			<?php $count = hybrid_get_gallery_item_count(); ?>
			<p class="gallery-count"><?php printf( _n( 'This gallery contains %s item.', 'This gallery contains %s items.', $count, 'bempress' ), $count ); ?></p>
		</div><!-- .entry-summary -->


<?php endif; // End single post check. ?>


	<?php tha_entry_bottom(); ?>

</article><!-- .entry -->
