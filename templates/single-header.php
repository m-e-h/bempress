<?php
/**
 * @package Abraham
 */

if ( is_front_page() ) {
		return;
}
?>

<header class="entry__header">

	<h1 <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>

</header><!-- .entry-header -->
