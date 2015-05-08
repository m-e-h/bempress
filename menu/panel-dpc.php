<?php
/**
 * The panel nav menu template.
 *
 * @package doc
 */
?>
<?php if ( has_nav_menu( 'panel-dpc' ) ) : ?>

	<nav class="menu--horizontal u-p@all u-1of1@sm flex flex-j--center" <?php hybrid_attr( 'menu', 'panel-dpc' ); ?>>

		<span id="menu-panel-title" class="screen-reader-text">
			<?php
			// Translators: %s is the nav menu name. This is the nav menu title shown to screen readers.
			printf( _x( '%s', 'nav menu title', 'bempress' ), hybrid_get_menu_location_name( 'panel-dpc' ) );
			?>
		</span>

		<?php
		wp_nav_menu( [
			'theme_location'  => 'panel-dpc',
			'container'       => '',
			'menu_id'         => 'panel-dpc',
			'menu_class'      => 'menu__list menu-panel__list',
			'fallback_cb'     => '',
		] );
		?>

	</nav><!-- #menu-panel -->

<?php
endif;
