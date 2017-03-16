<?php 

add_filter( 'pre_get_posts' , 'reveal_custom_cpt_order' );
function reveal_custom_cpt_order( $query ) {
	// Check if the query is for an archive
	if ( is_archive() && get_query_var("post_type") == "slides" ) {
		$query->set( 'order' , 'asc' );
	}
}



// Runs before the posts are fetched
// add_filter( 'pre_get_posts' , 'reveal_posts_order' );

// Function accepting current query
function reveal_posts_order( $query ) {
	// Check if the query is for home and alter only the primary query
	if($query->is_home && $query->is_main_query())
	// Query was for home, then set order
	$query->set( 'order' , 'asc' );
}