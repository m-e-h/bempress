<?php
/**
 * The primary nav menu template.
 *
 * @package BEMpress
 */
?>
<?php if ( has_nav_menu( 'primary' ) ) : ?>

	<nav <?php hybrid_attr( 'menu', 'primary' ); ?>>

                <div <?php hybrid_attr( 'branding' ); ?>>
                    <?php flagship_the_logo(); ?>
                    <?php hybrid_site_title(); ?>
                    <?php hybrid_site_description(); ?>
                </div><!-- #branding -->

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
    		'menu_class'      => 'menu__list menu-primary__list',
    		'fallback_cb'     => '',
            'items_wrap'      => '<ul id="%s" class="%s">%s</ul>'
		] );
		?>

	</nav><!-- #menu-primary -->

<?php
endif;
