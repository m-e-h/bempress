<?php
/**
 * The breadcrumbs template.
 *
 * @package     BEMpress
 */

if ( function_exists( 'breadcrumb_trail' ) ) : ?>

    <?php breadcrumb_trail(
        array(
            'container'     => 'nav',
            'separator'     => '/',
            'show_browse'   => false,
            'show_on_front' => false,
        )
    ); ?>

<?php endif; // End check for breadcrumb support. ?>
