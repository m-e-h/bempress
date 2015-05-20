<?php
/**
 * Register and Display Widget Areas.
 *
 * @package BEMpress
 */

add_action( 'widgets_init', 'bempress_register_sidebars', 5 );


function bempress_register_sidebars() {
	hybrid_register_sidebar( [
		'id'          => 'primary',
		'name'        => _x( 'Primary Sidebar', 'sidebar', 'bempress' ),
		'before_widget'	=> '<section id="%1$s" class="widget widget-primary %2$s t-bg__white br u-p@all u-mb- u-mb@md u-mb+@lg shadow--z1">',
		'after_widget'	=> '</section>',
		'before_title'  => '<h3 class="widget-title widget-primary__title">',
		'after_title'	=> '</h3>',
	] );

	hybrid_register_sidebar( [
		'id'			=> 'footer',
		'name'			=> _x( 'Footer Widgets', 'sidebar', 'bempress' ),
		'before_widget' => '<section id="%1$s" class="widget widget-footer %2$s u-pr- u-pr@md u-pr+@lg u-mb- u-mb@md u-mb+@lg grid__item grid__item--flexed"><div class="br widget__wrap u-p@all t-bg__1">',
		'after_widget'	=> '</div></section>',
		'before_title'  => '<h3 class="widget-title widget-footer__title">',
		'after_title'   => '</h3>',
	] );

    hybrid_register_sidebar( [
        'id'            => 'panel-one',
        'name'          => _x( 'Panel One Widgets', 'doc' ),
        'before_widget' => '<section id="%1$s" class="widget widget-panel %2$s u-pr- u-pr@md u-pr+@lg u-mb- u-mb@md u-mb+@lg grid__item grid__item--flexed"><div class="br widget__wrap u-p@all t-bg__1--glass shadow--z1">',
        'after_widget'  => '</div></section>',
        'before_title'  => '<h3 class="widget-title widget-panel__title">',
        'after_title'   => '</h3>',
    ] );
    hybrid_register_sidebar( [
        'id'            => 'panel-two',
        'name'          => _x( 'Panel Two Widgets', 'doc' ),
        'before_widget' => '<section id="%1$s" class="widget widget-panel %2$s u-pr- u-pr@md u-pr+@lg u-mb- u-mb@md u-mb+@lg grid__item grid__item--flexed"><div class="br widget__wrap u-p@all t-bg__1--glass shadow--z1">',
        'after_widget'  => '</div></section>',
        'before_title'  => '<h3 class="widget-title widget-panel__title">',
        'after_title'   => '</h3>',
    ] );
    hybrid_register_sidebar( [
        'id'            => 'panel-three',
        'name'          => _x( 'Panel Three Widgets', 'doc' ),
        'before_widget' => '<section id="%1$s" class="widget widget-panel %2$s u-pr- u-pr@md u-pr+@lg u-mb- u-mb@md u-mb+@lg grid__item grid__item--flexed"><div class="br widget__wrap u-p@all t-bg__1--glass shadow--z1">',
        'after_widget'  => '</div></section>',
        'before_title'  => '<h3 class="widget-title widget-panel__title">',
        'after_title'   => '</h3>',
    ] );
}
