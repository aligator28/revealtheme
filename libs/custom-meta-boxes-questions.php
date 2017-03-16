<?php

// add_filter( 'rwmb_meta_boxes', 'reveal_meta_boxes_faq' );

// function reveal_meta_boxes_faq( $meta_boxes ) {
// 	$prefix = 'reveal_';
	
//     $meta_boxes[] = array(
//         'title'      => esc_html__( 'FAQ Settings:', 'revealpresentation' ),
//         'post_types' => array('questions'),
//         'fields'     => array(
//         	// HEADING
// 			array(
// 				'type' => 'heading',
// 				'name' => esc_html__( 'NOTE! The title is a question and the content is the answer. HTML IS NOT ALLOWED', 'revealpresentation' ),
// 				'desc' => esc_html__( '', 'revealpresentation' )
// 			),
// 			// TEXTAREA
// 			array(
// 				'name' => esc_html__( 'Answer', 'revealpresentation' ),
// 				'desc' => __('Add answer here', 'revealpresentation'),
// 				'id'   => $prefix . "fa_answer",
// 				'type' => 'textarea',
// 				'cols' => 20,
// 				'rows' => 5,
// 			),
//         ),
//     );
//     return $meta_boxes;
// }

// hide all toolbars in editor, because for questions we don't need ability to add html for content (answer)
function reveal_myadmin_stylesheet() { 

	if ( get_post_type() == 'questions' ) {
    	wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/css/admin-custom-style.css' );
	}
}
add_action('admin_head', 'reveal_myadmin_stylesheet' );

function reveal_add_content_before_editor() {
	if ( get_post_type() == 'questions' ) {
	    echo '<h2>Add your answer below. NOTE! HTML is not allowed!</h2>';
	}
}
add_action( 'edit_form_after_title', 'reveal_add_content_before_editor' );