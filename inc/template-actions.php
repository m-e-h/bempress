<?php
/**
 * Theme Action Hooks.
 *
 * @package BEMpress
 */

add_action( 'tha_content_before', 'doc_menu_secondary' );
add_action( 'action_bar_right', 'doc_menu_primary' );
//add_action( 'action_bar_left', 'doc_action_bar_title' );

add_action( 'tha_header_before', 'doc_toggle_panel' );
//add_action( 'action_bar_left', 'doc_action_bar_title' );
//add_action( 'action_bar_right', 'doc_panel_toggles' );
//add_action( 'tha_header_top', 'doc_logo', 5 );



function doc_menu_primary() {
    hybrid_get_menu( 'primary' );
}

function doc_menu_secondary() {
    hybrid_get_menu( 'secondary' );
}


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
    // if ( is_front_page() ) {
    //     return;
    // }
    get_template_part( 'templates/panel-toggles' );
}

function doc_action_bar_title() {
    // if ( is_front_page() ) {
    //     return;
    // }
    hybrid_site_title();
}

function doc_front_page_title() {
    if ( !is_front_page() ) {
        return;
    } ?>
                <div <?php hybrid_attr( 'branding' ); ?>>
                    <?php hybrid_site_title(); ?>
                    <?php hybrid_site_description(); ?>
                </div><!-- #branding -->
<?php }

function doc_logo() {

if( get_theme_mod( 'bempress_logo') != "" ): ?>

    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-link" rel="home">
        <img id="logo" class="site-logo" src="<?php echo get_theme_mod( 'bempress_logo' ); ?>">
    </a>

<?php endif;

}


function action_bar_right() {
    do_action( 'action_bar_right' );
}

function action_bar_left() {
    do_action( 'action_bar_left' );
}


