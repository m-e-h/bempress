<?php

function doc_login_drop() {
    $current_user = wp_get_current_user();

    if ( is_user_logged_in() ) {
    $username = $current_user->display_name;
} else {
    $username = 'Log In';
}

ob_start();
?>

    <div class="dropdown-basic inline-block" data-dropdown>
    <a class="btn" href="#"><?php echo $username ?></a>
    <div class="bg-white p2 black dropdown-menu-basic dropdown-right absolute br shadow6" data-dropdown-menu>
    <?php
        if ( is_user_logged_in() ) {

    		echo get_avatar( $current_user, 60 ). '<p class="grid__item center u-2/3"><a class="btn" href="'. wp_logout_url() .'">Logout</a></p>';
        } else {
    	echo wp_login_form( array( 'echo' => false ) ). '<p class="small mt2 center"><a href="' . wp_lostpassword_url() . '" title="Lost Password">Forgot password?</a></p>';
        } ?>
    </div>
    </div>

<?php
    $output = ob_get_clean();

    return $output;
}
