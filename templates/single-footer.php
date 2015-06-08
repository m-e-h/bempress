<?php
/**
 * @package Abraham
 */
?>

	<footer class="entry__footer">

    <?php if ( has_term( '', 'category' ) || has_term( '', 'post_tag' ) ) : ?>

		<?php
		hybrid_post_terms( [
            'taxonomy' => 'category',
            'before'   => '<p class="tax-links wrap tax-links--cat">',
            'after'    => '</p>',
            'sep'        => _x( ' ', 'taxonomy terms separator', 'bempress' ),
		] );
		hybrid_post_terms( [
    		'taxonomy' => 'post_tag',
    		'before'   => '<p class="tax-links wrap tax-links--tag">',
    		'after'    => '</p>',
            'sep'        => _x( ' ', 'taxonomy terms separator', 'bempress' ),
		] );

    endif; ?>

        <p class="entry__meta">
                <span <?php hybrid_attr( 'entry-author' ); ?>><?php the_author_posts_link(); ?></span>
                <time <?php hybrid_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>
                <?php comments_popup_link( number_format_i18n( 0 ), number_format_i18n( 1 ), '%', 'comments-link', '' ); ?>
                <?php edit_post_link(); ?>
        </p><!-- .entry-meta -->

	</footer><!-- .entry-footer -->

	<?php
