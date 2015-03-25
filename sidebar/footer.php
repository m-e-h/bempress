<?php
/**
 * Header Right Sidebar Template
 *
 * Currently not in use.
 *
 * @package     BEMpress
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, Flagship Software, LLC
 * @license     GPL-2.0+
 * @link        https://flagshipwp.com/
 * @since       1.0.0
 */


if ( ! is_active_sidebar( 'footer' ) ) {
		return;
}
?>
	<aside <?php hybrid_attr( 'sidebar', 'footer' ); ?>>
		<?php dynamic_sidebar( 'footer' ); ?>
	</aside><!-- #sidebar-footer-widgets -->
