<?php
/**
 * Theme Action Hooks.
 *
 * @package BEMpress
 */


add_action( 'tha_header_top', 'doc_toggle_panel' );
add_action( 'tha_header_bottom', 'doc_panel_toggles_front' );
add_action( 'action_bar_right', 'doc_panel_toggles' );
add_action( 'tha_header_top', 'doc_logo_front' );
add_action( 'tha_header_before', 'doc_logo' );




function doc_toggle_panel() {
    get_template_part( 'templates/toggle-panel' );
}

function doc_panel_toggles_front() {
    if ( !is_front_page() ) {
        return;
    }
    get_template_part( 'templates/panel-toggles' );
}

function doc_panel_toggles() {
    if ( is_front_page() ) {
        return;
    }
    get_template_part( 'templates/panel-toggles' );
}

function doc_logo_front() {
    if ( !is_front_page() ) {
        return;
    }
    flagship_the_logo();
}

function doc_logo() {
    if ( is_front_page() ) {
        return;
    }
    flagship_the_logo();
}


function action_bar_right() {
    do_action( 'action_bar_right' );
}

function action_bar_left() {
    do_action( 'action_bar_left' );
}
