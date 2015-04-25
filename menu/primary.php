<?php
/**
 * The primary nav menu template.
 *
 * @package BEMpress
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
		wp_nav_menu( [
    		'theme_location'  => 'primary',
    		'container'       => '',
    		'menu_id'         => 'primary',
    		'menu_class'      => 'menu__list menu-primary__list flex flex--justify ',
    		'fallback_cb'     => '',
            'items_wrap'      => '<ul id="%s" class="%s">%s</ul>'
		] );
		?>

	</nav><!-- #menu-primary -->

<?php
endif;
