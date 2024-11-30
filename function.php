<?php
// Force redirection to "my-account" page after login
function force_redirect_to_my_account() {
    if (is_page('login') && is_user_logged_in()) {
        wp_redirect(site_url('/my-account')); // Redirect to "my-account"
        exit;
    }
}
add_action('template_redirect', 'force_redirect_to_my_account');


// Logout user without confirmation
function logout_without_confirmation() {
    if (is_user_logged_in() && isset($_GET['action']) && $_GET['action'] === 'logout') {
        wp_logout();
        wp_redirect(home_url()); // Redirect to home page or any desired page after logout
        exit;
    }
}
add_action('init', 'logout_without_confirmation');
