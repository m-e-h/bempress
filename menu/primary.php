<?php
if ( has_nav_menu( 'primary' ) ) : ?>

	<nav <?php hybrid_attr( 'menu', 'primary' ); ?>>

		<?php
    		wp_nav_menu( [
        		'theme_location'  => 'primary',
        		'container'       => '',
        		'menu_id'         => 'primary',
        		'menu_class'      => 'menu__list menu-primary__list u-flex u-flex--j-sb ',
        		'fallback_cb'     => '',
                'items_wrap'      => '<ul id="%s" class="%s">%s</ul>'
    		] );
		?>

	</nav>

<?php
endif;
