<?php
/**
 * @package Abraham
 */

if ( is_front_page() ) {
		return;
}
?>

<header class="entry-header">

	<h1 <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>

	<p class="entry-meta">
		<?php flagship_entry_author(); ?>
		<?php flagship_entry_published(); ?>
		<?php flagship_entry_comments_link(); ?>
		<?php edit_post_link(); ?>
	</p><!-- .entry-meta -->

</header><!-- .entry-header -->
