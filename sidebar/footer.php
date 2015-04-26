<?php
/**
 * Footer Sidebar Template
 *
 * @package BEMpress
 */

if ( ! is_active_sidebar( 'footer' ) ) {
		return;
}
?>
	<aside <?php hybrid_attr( 'sidebar', 'footer' ); ?>>
		<?php dynamic_sidebar( 'footer' ); ?>
	</aside><!-- #sidebar-footer-widgets -->
