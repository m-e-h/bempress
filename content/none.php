<?php
/**
 * A template to display when no contet can be found.
 *
 * @package     BEMpress
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, Flagship Software, LLC
 * @license     GPL-2.0+
 * @link        https://flagshipwp.com/
 * @since       1.0.0
 */
?>

<?php tha_entry_before(); ?>

<article <?php hybrid_attr( 'post' ); ?>>

	<?php tha_entry_top(); ?>

	<header class="entry-header">
		<h1 class="entry-title"><?php _e( 'Nothing found', 'bempress' ); ?></h1>
	</header><!-- .entry-header -->

	<div <?php hybrid_attr( 'entry-content' ); ?>>
		<?php if ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search. Perhaps try some different search terms.', 'bempress' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

<h3><?php _e('It looks like this was the result of either:', 'bempress'); ?></h3>
<ul>
  <li><?php _e('a mistyped address', 'bempress'); ?></li>
  <li><?php _e('an out-of-date link', 'bempress'); ?></li>
</ul>

			<p><?php _e( 'Perhaps one of the links below or a search will help?', 'bempress' ); ?></p>
			<p><?php get_search_form(); ?></p>
							<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

				<?php
				$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives.', 'bempress' ) ) . '</p>';
				the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2> $archive_content" );
				?>

				<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

		<?php endif; ?>

	</div><!-- .entry-content -->

	<?php tha_entry_bottom(); ?>

</article><!-- .entry -->

<?php
tha_entry_after();
