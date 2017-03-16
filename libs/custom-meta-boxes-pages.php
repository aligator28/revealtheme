<?php

function pluta_get_page() {
	if ( isset( $_GET['post'] ) ) {
		$post_id = intval( $_GET['post'] );
	} elseif ( isset( $_POST['post_ID'] ) ) {
		$post_id = intval( $_POST['post_ID'] );
	} else {
		$post_id = false;
	}

	$post_id = (int) $post_id;
	$post    = get_post( $post_id );

	return $post;
}

// display meta boxes only for front page
	$post_id = pluta_get_page();

// varDump( site_url() . ' = ' . get_permalink( $post_id ) );
// это хак, чтобы отображать метабоксы только для фронт пейдж, и не отображать для остальных страниц (блог, корзина и пр.)
if ( 
	site_url().'/' != get_permalink( $post_id ) //for back end
	&& !empty( get_permalink( $post_id ) ) ) 
{ //for front end
	return;
}
else 
{
	add_action( 'init', 'reveal_remove_editor_front_page' );
	function reveal_remove_editor_front_page() {
		remove_post_type_support( 'page', 'editor' );
		remove_post_type_support( 'page', 'custom-fields');
	}
}

add_filter( 'rwmb_meta_boxes', 'reveal_meta_boxes_pages' );

function reveal_meta_boxes_pages( $meta_boxes ) {

	$prefix = 'reveal_';

    $meta_boxes[] = array(
        'title'      => esc_html__( 'Page Settings:', 'revealpresentation' ),
        'post_types' => array('page'),
        'fields'     => array(

/************************************** SECTION TITLES ********************************************/
			array(
				'type' => 'heading',
				'name' => esc_html__( 'Sections Titles', 'revealpresentation' ),
				'desc' => esc_html__( 'Set names for each section', 'revealpresentation' )
			),

			array(
				'name'  => esc_html__( 'Header Title', 'revealpresentation' ),
				'id'    => $prefix . "front_video_title",
				'type'  => 'textarea',
				'cols' => 20,
				'rows' => 2,
				'std'   => esc_html__( 'Don\'t waste your time, just use "Our Awesome Product"', 'revealpresentation' ),
			),

			array(
				'type' => 'divider',
			),

			array(
				'name'  => esc_html__( 'Features Section Title', 'revealpresentation' ),
				'id'    => $prefix . "features_title",
				'type'  => 'text',
				'std'   => esc_html__( 'Product Features', 'revealpresentation' ),
			),

			array(
				'type' => 'divider',
			),

			array(
				'name'  => esc_html__( 'Overview Section Title', 'revealpresentation' ),
				'id'    => $prefix . "overview_title",
				'type'  => 'text',
				'std'   => esc_html__( 'Overview', 'revealpresentation' ),
			),

			array(
				'type' => 'divider',
			),

			array(
				'name'  => esc_html__( 'Plans Section Title', 'revealpresentation' ),
				'id'    => $prefix . "plans_title",
				'type'  => 'text',
				'std'   => esc_html__( 'Plans', 'revealpresentation' ),
			),

			array(
				'type' => 'divider',
			),

			array(
				'name'  => esc_html__( 'Frequently Asked Questions Section Title', 'revealpresentation' ),
				'id'    => $prefix . "questions_title",
				'type'  => 'text',
				'std'   => esc_html__( 'Frequently Asked Questions', 'revealpresentation' ),
			),

			array(
				'type' => 'divider',
			),

			array(
				'name'  => esc_html__( 'Contact Form Section Title', 'revealpresentation' ),
				'id'    => $prefix . 'contact_form_title',
				'type'  => 'text',
				'std'   => esc_html__( 'Contact Us', 'revealpresentation' ),
			),

			array(
				'type' => 'divider',
			),

			array(
				'name'  => esc_html__( 'Download Section Title', 'revealpresentation' ),
				'id'    => $prefix . "download_title",
				'type'  => 'text',
				'std'   => esc_html__( 'Download, customize & enjoy', 'revealpresentation' ),
			),

			array(
				'type' => 'divider',
			),

			array(
				'name'  => esc_html__( 'How to find us Title', 'revealpresentation' ),
				'id'    => $prefix . "find_title",
				'type'  => 'text',
				'std'   => esc_html__( 'How to find us', 'revealpresentation' ),
			),

/**************************************************************************************************/
			array(
				'type' => 'heading',
				'name' => esc_html__( 'Page Header Options', 'revealpresentation' ),
				'desc' => esc_html__( 'Set background and text', 'revealpresentation' )
			),

			array(
				'type' => 'divider',
			),

			array(
				'name'             => esc_html__( 'Video Background', 'revealpresentation' ),
				'id'               => $prefix . "front_video_bg",
				'type'             => 'file_advanced',
				'max_file_uploads' => 1,
				'mime_type'        => 'application,audio,video', // Leave blank for all file types
				'desc' => 'NOTE! If you set Video Background, REMOVE Header Background Image!'
			),
			array(
				'type' => 'divider',
			),

			array(
				'name' => esc_html__( 'Header Background Image', 'revealpresentation' ),
				'id'   => $prefix . "front_header_bg",
				'type' => 'image_advanced',
				'max_file_uploads' => 1,
				'desc' => 'NOTE! If you set Header Background Image, REMOVE Video Background!'
			),

			array(
				'name'  => esc_html__( 'Header Quote', 'revealpresentation' ),
				'id'    => $prefix . "front_video_blockquote",
				'type'  => 'textarea',
				'cols' => 20,
				'rows' => 2,
				'std'   => esc_html__( 'Any of your business presentation idea, marketing advertizing and tutorial slides are possible', 'revealpresentation' ),
			),

			array(
				'type' => 'heading',
				'name' => esc_html__( 'Sections Options', 'revealpresentation' ),
				'desc' => esc_html__( 'Set images and colors for each section of Front Page', 'revealpresentation' )
			),
			array(
				'type' => 'divider',
			),

			array(
				'name'             => esc_html__( 'Overview Background Image', 'revealpresentation' ),
				'id'               => $prefix . "overview_bg",
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),

			array(
				'type' => 'divider',
			),

			array(
				'name'             => esc_html__( 'Frequently Asked Questions Background Image', 'revealpresentation' ),
				'id'               => $prefix . "questions_bg_image",
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),

			array(
				'type' => 'heading',
				'name' => esc_html__( 'Contact Form', 'revealpresentation' ),
			),

			array(
				'name'  => esc_html__( 'Paste Here Shortcode of Contact Form 7', 'revealpresentation' ),
				'id'    => $prefix . "contact_form_shortcode",
				'type'  => 'text',
				'desc' => esc_html__( 'NOTE! Use Contact Form 7 Plugin to create contact form and paste HERE the shortcode', 'revealpresentation' )
			),


			array(
				'type' => 'heading',
				'name' => esc_html__( 'Download Section', 'revealpresentation' ),
			),

			array(
				'name'  => esc_html__( 'Download Section Text', 'revealpresentation' ),
				'id'    => $prefix . "download_text",
				'type'  => 'textarea',
				'cols' => 20,
				'rows' => 3,
				'std' => esc_html__('You can download our application in AppStore and GooglePlay, customize it and use anytime you need', 'revealpresentation')
			),

			array(
				'name' => esc_html__( 'Download Section Background Image', 'revealpresentation' ),
				'id'   => $prefix . "download_bg_img",
				'type' => 'image_advanced',
				'max_file_uploads' => 1,
				'desc' => 'Set Background Image or not :)'
			),        


			array(
				'type' => 'heading',
				'name' => esc_html__( 'Map Section', 'revealpresentation' ),
			),

			array(
				'name' => esc_html__( 'Map Section Background Image', 'revealpresentation' ),
				'id'   => $prefix . "map_bg_img",
				'type' => 'image_advanced',
				'max_file_uploads' => 1,
				'desc' => 'Set Background Image or not :)'
			),        
			array(
				'name'  => esc_html__( 'Google Map Shortcode', 'revealpresentation' ),
				'id'    => $prefix . "google_map_shortcode",
				'type'  => 'text',
				'desc'   => esc_html__( 'Create New Map using "WP Google Maps" plugin and PASTE SHORTCODE HERE', 'revealpresentation' ),
			),
		),
    );
    return $meta_boxes;
}
