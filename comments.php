<?php
/**
 * The template for displaying comments.
 *
 * @package BEMpress
 */

if ( post_password_required() ) {
    return;
}
?>

    <?php tha_comments_before(); ?>

    <section <?php hybrid_attr( 'comments-area' ); ?>>

        <?php if ( have_comments() ) : ?>

            <h3 class="comments-number" id="comments-number"><?php comments_number(); ?></h3>

            <ol class="comment-list">
                <?php
                wp_list_comments( [
                    'style'        => 'ol',
                    'callback'     => 'hybrid_comments_callback',
                    'end-callback' => 'hybrid_comments_end_callback',
                ] );
                ?>
            </ol><!-- .comment-list -->

            <?php get_template_part( 'comment/navigation' ); ?>

            <?php if ( ! comments_open() || ! pings_open() ) : ?>

                <?php get_template_part( 'comment/error' ); ?>

            <?php endif; ?>

        <?php endif; // End check for comments. ?>

        <?php comment_form(); ?>

    </section><!-- #comments -->

    <?php tha_comments_after(); ?>
