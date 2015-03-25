<?php
/**
 * Register and Display Widget Areas.
 *
 * @package     BEMpress
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, Flagship Software, LLC
 * @license     GPL-2.0+
 * @link        https://flagshipwp.com/
 * @since       1.0.0
 */

add_action( 'widgets_init', 'bempress_register_sidebars', 5 );
/**
 * Registers sidebars.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function bempress_register_sidebars() {
	hybrid_register_sidebar( [
		'id'          => 'primary',
		'name'        => _x( 'Primary Sidebar', 'sidebar', 'bempress' ),
		'description' => __( 'The main sidebar.', 'bempress' ),
		'before_widget'	=> '<section id="%1$s" class="widget widget-primary %2$s">',
		'after_widget'	=> '</section>',
		'before_title'  => '<h3 class="widget-title widget-primary__title">',
		'after_title'	=> '</h3>',
	] );

	hybrid_register_sidebar( [
		'id'			=> 'footer',
		'name'			=> _x( 'Footer Widgets', 'sidebar', 'bempress' ),
		'description' => __( 'You can see these at the bottom of the site.', 'bempress' ),
		'before_widget' => '<section id="%1$s" class="widget widget-footer %2$s">',
		'after_widget'	=> '</section>',
		'before_title'  => '<h3 class="widget-title widget-footer__title">',
		'after_title'   => '</h3>',
	] );
}
