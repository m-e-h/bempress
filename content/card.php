<?php
/**
 * A template part for displaying an entry in both single and archive posts.
 *
 * @package BEMpress
 */

?>

<div class="block">
		<?php
		// Display a featured image if we can find something to display.
		get_the_image( [
			'size'   => 'bempress-full',
			'order'  => [ 'featured', 'attachment' ],
			'before' => '<div class="block__img featured-media image">',
			'after'  => '</div>',
		] );
		?>

<article <?php hybrid_attr( 'post' ); ?>>

	<?php tha_entry_top(); ?>

	<?php if ( is_singular( get_post_type() ) ) : ?>

		<?php get_template_part( 'templates/single', 'header' ); ?>

		<?php get_template_part( 'templates/single', 'content' ); ?>

    <?php else : // If not viewing a single post. ?>



		<?php get_template_part( 'templates/plural', 'header' ); ?>

		<?php get_template_part( 'templates/plural', 'content' ); ?>



		<?php endif; // End single post check. ?>

	<?php tha_entry_bottom(); ?>
</article><!-- .entry -->

</div>

