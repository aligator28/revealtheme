<?php

add_filter( 'rwmb_meta_boxes', 'reveal_meta_boxes_woo_products' );

function reveal_meta_boxes_woo_products( $meta_boxes ) {
	$prefix = 'reveal_';

    $meta_boxes[] = array(
        'title'      => esc_html__( 'Use this product in Pricing Table for Front Page:', 'revealpresentation' ),
        'post_types' => array('product'),
        'fields'     => array(
			// CHECKBOX
			array(
				'name' => esc_html__( 'Use', 'revealpresentation' ),
				'id'   => $prefix . "pricing_table_product",
				'type' => 'checkbox',
				'desc' => 'ONLY for Front Page',
				// Value can be 0 or 1
				'std'  => 0,
			),
			// CHECKBOX
			array(
				'name' => esc_html__( 'Make this product popular', 'revealpresentation' ),
				'id'   => $prefix . "popular_product",
				'type' => 'checkbox',
				'desc' => 'ONLY for Front Page',
				// Value can be 0 or 1
				'std'  => 0,
			),
        ),
    );
    return $meta_boxes;
}



