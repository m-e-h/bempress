<?php
/**
 * @package Abraham
 */
?>

	<footer class="entry-footer">

    <?php if ( has_term( '', 'category' ) || has_term( '', 'post_tag' ) ) : ?>

		<?php
		hybrid_post_terms(
			array(
				'taxonomy' => 'category',
				'before'   => '<p class="tax-links tax-links--cat">',
				'after'    => '</p>',
                'sep'        => _x( ' ', 'taxonomy terms separator', 'bempress' ),
			)
		);
		hybrid_post_terms(
			array(
				'taxonomy' => 'post_tag',
				'before'   => '<p class="tax-links tax-links--tag">',
				'after'    => '</p>',
                'sep'        => _x( ' ', 'taxonomy terms separator', 'bempress' ),
			)
		);

    endif; ?>

        <p class="entry-meta">
            <?php flagship_entry_author(); ?>
            <?php flagship_entry_published(); ?>
            <?php flagship_entry_comments_link(); ?>
            <?php edit_post_link(); ?>
        </p><!-- .entry-meta -->

	</footer><!-- .entry-footer -->

	<?php
