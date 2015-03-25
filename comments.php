<?php
/**
 * The template for displaying comments.
 *
 * @package     BEMpress
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, Flagship Software, LLC
 * @license     GPL-2.0+
 * @link        https://flagshipwp.com/
 * @since       1.0.0
 */

// If a post password is required or no comments are given and comments/pings are closed, return.
if ( post_password_required() || ( ! have_comments() && ! comments_open() && ! pings_open() ) ) {
	return;
}
?>

<?php tha_comments_before(); ?>

<section id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

		<h3 class="comments-number" id="comments-number"><?php comments_number(); ?></h3>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'        => 'ol',
					'callback'     => 'hybrid_comments_callback',
					'end-callback' => 'hybrid_comments_end_callback',
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php get_template_part( 'comment/navigation' ); ?>

	<?php endif; // End check for comments. ?>

	<?php get_template_part( 'comment/error' ); ?>

	<?php comment_form(); ?>

</section><!-- #comments -->

<?php
tha_comments_after();
