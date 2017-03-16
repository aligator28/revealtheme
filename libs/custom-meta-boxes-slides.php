<?php

add_filter( 'rwmb_meta_boxes', 'reveal_meta_boxes_slides' );

function reveal_meta_boxes_slides( $meta_boxes ) {
	$prefix = 'reveal_';

    $meta_boxes[] = array(
        'title'      => esc_html__( 'Slide Settings:', 'revealpresentation' ),
        'post_types' => array('slides'),
        'fields'     => array(
			array(
				'type' => 'heading',
				'name' => esc_html__( 'Use this slide in slideshow', 'revealpresentation' ),
				'desc' => esc_html__( 'If not checked this slide won\'t display on frontend slideshow', 'revealpresentation' )
			),
			array(
				'name' => esc_html__( 'Use', 'revealpresentation' ),
				'id'   => $prefix . "use_slide",
				'type' => 'checkbox',
				'std'  => 1
			),        	
			array(
				'type' => 'heading',
				'name' => esc_html__( 'Autoslide Time', 'revealpresentation' ),
				'desc' => esc_html__( 'Option works if enabled in Theme Options->Advaced Settings->Enable Autoslide', 'revealpresentation' )
			),
			// SLIDER
			array(
				'name'       => esc_html__( 'Set Autoslide Time', 'revealpresentation' ),
				'id'         => $prefix . "autoslide_time",
				'type'       => 'slider',
				// Text labels displayed before and after value
				// 'prefix'     => esc_html__( '$', 'your-prefix' ),
				'suffix'     => esc_html__( ' sec', 'revealpresentation' ),
				// jQuery UI slider options. See here http://api.jqueryui.com/slider/
				'js_options' => array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
				// Default value
				'std' 		=> 15,
			),

			array(
				'type' => 'divider',
			),

			array(
				'type' => 'heading',
				'name' => esc_html__( 'Speaker Notes:', 'revealpresentation' )
			),
			array(
				'name' => esc_html__( 'Enter Speaker Notes here (HTML allowed)', 'revealpresentation' ),
				'desc' => esc_html__('You can add any notes for each slide', 'revealpresentation'),
				'id'   => $prefix . "slide_notes",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 10,
			),


        	// HEADING
			array(
				'type' => 'heading',
				'name' => esc_html__( 'Background Settings:', 'revealpresentation' )
			),
			// // heading
			// array(
			// 	'type' => 'heading',
			// 	'name' => esc_html__( 'Animated Background with Particles.js', 'revealpresentation' ),
			// 	'desc' => __('<strong>http://vincentgarreau.com/particles.js</strong> You can tune particles there', 'revealpresentation')
			// ),
   //          // CHECKBOX
			// array(
			// 	'name' => esc_html__( 'Use Particles.js? (moving objects) for background', 'revealpresentation' ),
			// 	'id'   => $prefix . "particles",
			// 	'type' => 'checkbox',
			// 	// Value can be 0 or 1
			// 	'std'  => 0,
			// ),
			// // TEXTAREA
			// array(
			// 	'name' => esc_html__( 'Custom CSS for Particles.js', 'revealpresentation' ),
			// 	'desc' => __('Get CSS on <strong>http://vincentgarreau.com/particles.js</strong>', 'revealpresentation'),
			// 	'id'   => $prefix . "particles_css",
			// 	'type' => 'textarea',
			// 	'cols' => 20,
			// 	'rows' => 3,
			// ),
			// // TEXTAREA
			// array(
			// 	'name' => esc_html__( 'Custom JavaScript for Particles.js', 'revealpresentation' ),
			// 	'desc' =>__('Get JavaScript on <strong>http://vincentgarreau.com/particles.js</strong>', 'revealpresentation'),
			// 	'id'   => $prefix . "particles_js",
			// 	'type' => 'textarea',
			// 	'cols' => 20,
			// 	'rows' => 3,
			// ),
			// background color
			array(
				'type' => 'heading',
				'name' => esc_html__( 'Slide Background Color', 'revealpresentation' )
			),
			// COLOR
			array(
				'name' => esc_html__( 'Select color', 'revealpresentation' ),
				'id'   => $prefix . "background_color",
				'type' => 'color',
			),
			// background image
			array(
				'type' => 'heading',
				'name' => esc_html__( 'Full Background Image', 'revealpresentation' )
			),
			// IMAGE ADVANCED (WP 3.5+)
			array(
				'name'             => esc_html__( 'Select image for background', 'revealpresentation' ),
				'id'               => $prefix . "background_image",
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),
			array(
				'type' => 'heading',
				'name' => esc_html__( 'Full Background Video', 'revealpresentation' )
			),
			// FILE ADVANCED (WP 3.5+)
			array(
				'name'             => esc_html__( 'Upload video for background', 'revealpresentation' ),
				'id'               => $prefix . "background_video",
				'type'             => 'file_advanced',
				'max_file_uploads' => 1,
				'mime_type'        => 'application,audio,video', // Leave blank for all file types
			),
			array(
				'name' => esc_html__( 'Or insert external source video code (Youtube, Vimeo, etc.)', 'poa-presentation-slides' ),
				'id'   => $prefix . "external_video",
				'type' => 'text',
				'desc' => sprintf( wp_kses( __( 'Use embed code wich Video Hosting companies provide. For Youtube, read instructions <a href="%1s" target="_blank">HERE</a>, <br/>for Vimeo <a href="%3s" target="_blank">HERE</a>', 'poa-presentation-slides' ), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://support.google.com/youtube/answer/171780?hl=en' ), esc_url('https://help.vimeo.com/hc/en-us/articles/224969968-Embedding-videos-overview') )
			),
			array(
				'name' => esc_html__( 'Autoplay video?', 'poa-presentation-slides' ),
				'id'   => $prefix . "autoplay_video",
				'type' => 'checkbox',
				'std'  => 0,
				'desc' => esc_html__('If enabled video will start immediately when slide appears.', 'poa-presentation-slides')
			),        	
        ),
    );
    return $meta_boxes;
}



