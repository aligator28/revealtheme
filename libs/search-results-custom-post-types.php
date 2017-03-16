<?php
add_filter( 'pre_get_posts', 'reveal_cpt_search' );
/**
 * This function modifies the main WordPress query to include an array of 
 * post types instead of the default 'post' post type.
 *
 * @param object $query  The original query.
 * @return object $query The amended query.
 */
function reveal_cpt_search( $query ) {
	
    if ( $query->is_search && !is_admin() ) {
		$query->set( 'post_type', array( 'post', 'slides', 'questions', 'overviews', 'features' ) );
    }
    
    return $query;
    
}