<?php

add_filter( 'rwmb_meta_boxes', 'reveal_meta_boxes_overviews' );

function reveal_meta_boxes_overviews( $meta_boxes ) {
	$prefix = 'reveal_';

    $meta_boxes[] = array(
        'title'      => esc_html__( 'Overview Section Accordion Slider Settings:', 'revealpresentation' ),
        'post_types' => array('overviews'),
        'fields'     => array(
			// background image
			array(
				'type' => 'heading',
				'name' => esc_html__( 'Overview Section Accordion Slider Image', 'revealpresentation' ),
				'desc' => esc_html__( 'Add image for a slide', 'revealpresentation' )
			),
			// IMAGE ADVANCED (WP 3.5+)
			array(
				'name'             => esc_html__( 'Select image for a slide', 'revealpresentation' ),
				'id'               => $prefix . "overview_slide_img",
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),
			// background color
			array(
				'type' => 'heading',
				'name' => esc_html__( 'Overview Slider Background Color', 'revealpresentation' ),
			),
			// COLOR
			array(
				'name' => esc_html__( 'Select color', 'revealpresentation' ),
				'id'   => $prefix . "overview_slider_bg_color",
				'type' => 'color',
				'std'  => '#333'
			),
        ),
    );
    return $meta_boxes;
}



