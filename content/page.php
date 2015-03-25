<?php
/**
 * A template part for displaying single pages.
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

	<?php get_template_part( 'templates/single', 'header' ); ?>

	<?php get_template_part( 'templates/single', 'content' ); ?>

	<?php if ( current_user_can( 'edit_pages' ) ) : ?>
		<footer class="entry-footer">
			<?php edit_post_link(); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>

	<?php tha_entry_bottom(); ?>

</article><!-- .entry -->
