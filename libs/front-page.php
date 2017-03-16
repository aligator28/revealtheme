<?php 
add_filter( 'woocommerce_product_add_to_cart_text', 'reveal_archive_custom_cart_button_text' );    // 2.1 +
function reveal_archive_custom_cart_button_text() {
	return __( 'Buy', 'revealpresentation' );
}