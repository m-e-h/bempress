<?php
/**
 * The Sidebar containing the schools widget area.
 *
 * @package doc
 */

if ( ! is_active_sidebar( 'panel-schools' ) ) {
        return;
}
?>
	<aside <?php hybrid_attr( 'sidebar', 'panel-schools' ); ?>>
		<?php dynamic_sidebar( 'panel-schools' ); ?>
	</aside>
