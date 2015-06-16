<?php
/**
 * A template part for displaying an entry in both single and archive posts.
 *
 * @package BEMpress
 */
?>

<article <?php hybrid_attr( 'post' ); ?>>

	<?php tha_entry_top(); ?>

    <?php
    // Display an audio player if we have an audio file.
    echo $audio = hybrid_media_grabber( [
        'type'        => 'audio',
        'split_media' => true,
        'before'      => '<div class="featured-media--audio">',
        'after'       => '</div>',
    ] );
    ?>

	<?php if ( is_singular( get_post_type() ) ) : ?>

		<?php get_template_part( 'templates/single', 'header' ); ?>

		<?php get_template_part( 'templates/single', 'content' ); ?>

		<?php get_template_part( 'templates/single', 'footer' ); ?>

    <?php else : // If not viewing a single post. ?>

		<?php get_template_part( 'templates/plural', 'header' ); ?>

		<?php if ( has_excerpt() ) : // If the post has an excerpt. ?>

			<?php get_template_part( 'templates/plural', 'content' ); ?>

		<?php elseif ( empty( $audio ) ) : // Else, if no audio. ?>

			<?php get_template_part( 'templates/single', 'content' ); ?>

		<?php endif; // End excerpt/audio checks. ?>

	<?php endif; // End single post check. ?>

	<?php tha_entry_bottom(); ?>

</article><!-- .entry -->