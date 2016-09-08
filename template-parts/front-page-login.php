<?php if ( is_user_logged_in() ) {
    global $current_user;
    get_currentuserinfo();
    wp_redirect( get_site_url() . "/member/" . $current_user->user_login . "/" );
    exit;
     
} else {
    wp_redirect( get_site_url() . "/login/" );
    exit;
} ?>