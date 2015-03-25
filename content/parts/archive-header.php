<?php
/**
 * @package Abraham
 */
?>

<header class="entry-header">

	<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>

	<p class="entry-meta">
		<?php flagship_entry_author(); ?>
		<?php flagship_entry_published(); ?>
		<?php flagship_entry_comments_link(); ?>
		<?php edit_post_link(); ?>
	</p><!-- .entry-meta -->

</header><!-- .entry-header -->
