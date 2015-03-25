<?php
/**
 * @package Abraham
 */
?>

<?php if ( has_term( '', 'category' ) || has_term( '', 'post_tag' ) ) : ?>

	<footer class="entry-footer">
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
