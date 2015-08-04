<?php

function doc_login_drop() {
    $current_user = wp_get_current_user();
    $user_ID = get_current_user_id();

    if ( is_user_logged_in() ) {
    $username = $current_user->display_name;
} else {
    $username = 'Sign In';
}

ob_start();
?>

    <div class="dropdown-basic inline-block" data-dropdown>
    <a class="btn" href="#"><?php echo $username ?></a>
    <div class="bg-white p2 black dropdown-menu-basic dropdown-right absolute br shadow6" data-dropdown-menu>
    <?php
        if ( is_user_logged_in() ) {

            global $wp_query;
            $post_id = $wp_query->get_queried_object_id();
            $post_link = get_permalink($post_id);

    		echo get_avatar( $current_user, 60 ). '<p class="grid__item center u-2/3"><a class="btn" href="'. wp_logout_url() .'">Sign Out</a></p>';

            if (class_exists('SimpleFavorites')) { ?>
            <div class="pt2 pb1"> <?php the_favorites_button($post_id); ?> </div> <?php
            the_user_favorites_list($user_id = null, $site_id = null, $include_links = true, $filters = null);
            }
        } else {
    	echo wp_login_form( array( 'echo' => false ) ). '<p class="small mt2 center"><a href="' . wp_lostpassword_url() . '" title="Lost Password">Forgot password?</a></p>';
        } ?>
    </div>
    </div>

<?php
    $output = ob_get_clean();

    return $output;
}
