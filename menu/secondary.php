<?php
/**
 * The secondary nav menu template.
 *
 * @package     BEMpress
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, Flagship Software, LLC
 * @license     GPL-2.0+
 * @link        https://flagshipwp.com/
 * @since       1.0.0
 */
?>
<?php if ( has_nav_menu( 'secondary' ) ) : ?>

	<nav <?php hybrid_attr( 'menu', 'secondary' ); ?>>

		<span id="menu-secondary-title" class="screen-reader-text">
			<?php
			// Translators: %s is the nav menu name. This is the nav menu title shown to screen readers.
			printf( _x( '%s', 'nav menu title', 'bempress' ), hybrid_get_menu_location_name( 'secondary' ) );
			?>
		</span>

		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'secondary',
				'container'       => '',
				'menu_id'         => 'secondary',
				'menu_class'      => 'menu__list menu-secondary__list',
				'fallback_cb'     => '',
			)
		);
		?>

	</nav><!-- #menu-secondary -->

	<?php

endif;
