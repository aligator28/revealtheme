<?php 
if ( !empty( of_get_option('reveal_enable_slides_on_front_page') ) && of_get_option('reveal_enable_slides_on_front_page') == 1 ) {

	add_action("pre_get_posts", "reveal_custom_front_page");
}

function reveal_custom_front_page($wp_query) {
    // Compare queried page ID to front page ID.
    if($wp_query->get("page_id") == get_option("page_on_front") && !is_admin() && $wp_query->is_main_query()) {

        // Set custom parameters (values based on Isaacs question).
        $wp_query->set("post_type", "slides");
        $wp_query->set("posts_per_page", -1);

        // WP_Query shouldn't actually fetch the page in our case.
        $wp_query->set("page_id", "");

        // change order of slides
        $wp_query->set( 'order' , 'asc' );
    }
}

?>