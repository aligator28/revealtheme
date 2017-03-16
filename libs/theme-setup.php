<?php 
/**
* WordPress snippet
* Admin page redirection
* Put this inside theme setup function
*/

global $pagenow;

if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
    wp_redirect(admin_url("themes.php")); // Your admin page URL
}