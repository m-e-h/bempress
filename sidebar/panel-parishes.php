<?php
/**
 * The Sidebar containing the parishes widget area.
 *
 * @package doc
 */

if ( ! is_active_sidebar( 'panel-parishes' ) ) {
        return;
}
?>
	<aside <?php hybrid_attr( 'sidebar', 'panel-parishes' ); ?>>
		<?php dynamic_sidebar( 'panel-parishes' ); ?>
	</aside>
