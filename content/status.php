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


	<?php if ( get_option( 'show_avatars' ) ) : // If avatars are enabled. ?>

		<header class="entry-header">
			<?php echo get_avatar( get_the_author_meta( 'email' ) ); ?>
		</header><!-- .entry-header -->

	<?php endif; // End avatars check. ?>

		<?php get_template_part( 'templates/single', 'content' ); ?>

		<footer class="entry-footer">
			<p class="entry-meta">
				<?php hybrid_post_format_link(); ?>
				<?php flagship_entry_author(); ?>
				<?php flagship_entry_published(); ?>
				<?php edit_post_link(); ?>
				<?php hybrid_post_terms( array( 'taxonomy' => 'category', ) ); ?>
				<?php hybrid_post_terms( array( 'taxonomy' => 'post_tag', ) ); ?>
			</p>
		</footer><!-- .entry-footer -->


<?php else : // If not viewing a single post. ?>


	<?php if ( get_option( 'show_avatars' ) ) : // If avatars are enabled. ?>

		<header class="entry-header">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_avatar( get_the_author_meta( 'email' ) ); ?></a>
		</header><!-- .entry-header -->

	<?php endif; // End avatars check. ?>

		<?php get_template_part( 'templates/single', 'content' ); ?>

	<?php if ( ! get_option( 'show_avatars' ) ) : // If avatars are not enabled. ?>

		<footer class="entry-footer">
			<p class="entry-meta">
				<?php hybrid_post_format_link(); ?>
				<?php flagship_entry_published(); ?>
				<a class="entry-permalink" href="<?php the_permalink(); ?>" rel="bookmark" itemprop="url"><?php _e( 'Permalink', 'bempress' ); ?></a>
				<?php flagship_entry_comments_link(); ?>
				<?php edit_post_link(); ?>
			</p>
		</footer><!-- .entry-footer -->

	<?php endif; // End avatars check. ?>


<?php endif; // End single post check. ?>


	<?php tha_entry_bottom(); ?>

</article><!-- .entry -->
