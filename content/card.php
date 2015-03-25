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


$layoutcards = new Doc_Attributes;
	public $post                  	= ' block__content';	// get_post_class()
	public $entry_title           	= ' block__heading';	// entry-title
	public $entry_author          	= ' block__meta entry-meta__item entry-meta__author';	// entry-author
	public $entry_published       	= ' block__meta entry-meta__item entry-meta__date';	// entry-published updated


?>

<div class="block">
		<?php
		// Display a featured image if we can find something to display.
		get_the_image(
			array(
				'size'   => 'bempress-full',
				'order'  => array( 'featured', 'attachment' ),
				'before' => '<div class="block__img featured-media image">',
				'after'  => '</div>',
			)
		);
		?>

<article <?php hybrid_attr( 'post' ); ?>>

	<?php tha_entry_top(); ?>

	<?php if ( is_singular( get_post_type() ) ) : ?>

		<?php get_template_part( 'templates/single', 'header' ); ?>

		<?php get_template_part( 'templates/single', 'content' ); ?>

    <?php else : // If not viewing a single post. ?>



		<?php get_template_part( 'templates/archive', 'header' ); ?>

		<?php get_template_part( 'templates/archive', 'content' ); ?>



		<?php endif; // End single post check. ?>

	<?php tha_entry_bottom(); ?>
</article><!-- .entry -->

<?php if ( has_term( '', 'category' ) || has_term( '', 'post_tag' ) ) : ?>

	<footer class="block__footer">
		<?php
		hybrid_post_terms(
			array(
				'taxonomy' => 'category',
				'before'   => '<p class="entry-meta categories">',
				'after'    => '</p>',
			)
		);
		hybrid_post_terms(
			array(
				'taxonomy' => 'post_tag',
				'before'   => '<p class="entry-meta tags">',
				'after'    => '</p>',
			)
		);
		?>
	</footer><!-- .entry-footer -->

<?php
endif;
?>
</div>

