<?php

add_filter( 'rwmb_meta_boxes', 'reveal_meta_boxes_features' );

function reveal_meta_boxes_features( $meta_boxes ) {
	$prefix = 'reveal_';

    $meta_boxes[] = array(
        'title'      => esc_html__( 'Features Settings:', 'revealpresentation' ),
        'post_types' => array('features'),
        'fields'     => array(
// TEXT
			array(
				'name'  => esc_html__( 'Short Description for Front Page (HTML allowed)', 'revealpresentation' ),
				'id'    => $prefix . "short_description",
				'type'  => 'textarea',
				'cols' => 20,
				'rows' => 6,
				'desc' => 'NOTE! This description is for FRONT PAGE. And you can use HTML code'
			),
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Feature icon', 'revealpresentation' ),
				'id'    => $prefix . "feature_icon",
				'desc'  => esc_html__( 'Insert "fontawesome" (see http://fontawesome.io/) or "icofont" (see http://icofont.com/) class name for icon. For example: "fa fa-address-book" or " icofont icofont-island-alt"', 'revealpresentation' ),
				'type'  => 'text',
				'std'   => esc_html__( 'fa fa-address-book', 'revealpresentation' ),
			),
        ),
    );
    return $meta_boxes;
}



