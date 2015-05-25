<?php
/**
 * A template part for displaying an entry in both single and archive posts.
 *
 * @package BEMpress
 */
?>
<article <?php hybrid_attr( 'post' ); ?>>

	<?php tha_entry_top(); ?>

	<?php if ( is_singular( get_post_type() ) ) : ?>

		<?php get_template_part( 'templates/single', 'header' ); ?>

		<?php get_template_part( 'templates/single', 'content' ); ?>

		<?php get_template_part( 'templates/single', 'footer' ); ?>

    <?php else : // If not viewing a single post. ?>

		<?php
		// Display a featured image if we can find something to display.
		get_the_image( [
			'size'   => 'bempress-full',
			'order'  => [ 'featured', 'attachment' ],
			'before' => '<div class="featured-media image wrap">',
			'after'  => '</div>',
		] );
		?>

		<?php get_template_part( 'templates/plural', 'header' ); ?>

		<?php get_template_part( 'templates/plural', 'content' ); ?>

		<?php get_template_part( 'templates/plural', 'footer' ); ?>

		<?php endif; // End single post check. ?>

	<?php tha_entry_bottom(); ?>

</article><!-- .entry -->
