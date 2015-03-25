<?php
/**
 * The primary nav menu template.
 *
 * @package     BEMpress
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, Flagship Software, LLC
 * @license     GPL-2.0+
 * @link        https://flagshipwp.com/
 * @since       1.0.0
 */
?>
<?php if ( has_nav_menu( 'primary' ) ) : ?>

	<nav <?php hybrid_attr( 'menu', 'primary' ); ?>>

		<span id="menu-primary-title" class="screen-reader-text">
			<?php
			// Translators: %s is the nav menu name. This is the nav menu title shown to screen readers.
			printf( _x( '%s', 'nav menu title', 'bempress' ), hybrid_get_menu_location_name( 'primary' ) );
			?>
		</span>

		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container'       => '',
				'menu_id'         => 'primary',
				'menu_class'      => 'menu__list menu-primary__list',
				'fallback_cb'     => '',
			)
		);
		?>

	</nav><!-- #menu-primary -->

<?php elseif ( current_user_can( 'edit_theme_options' ) ) : ?>

	<div class="header-right">
		<p class="no-menu">

			<?php _e( "Ready to add your primary menu? Let's get started!", 'bempress' ); ?>

			<?php
			printf(	'<a class="button" href="%1$s">%2$s</a>',
				flagship_get_customizer_link(  array(
					'focus_type'   => 'section',
					'focus_target' => 'nav',
				) ),
				__( 'Add a Menu', 'bempress' )
			);
			?>

		</p>
	</div><!-- .header-right -->

	<?php

endif;
