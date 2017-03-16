<?php

if ( ! function_exists( 'reveal_show_cart_total' ) ) {
	function reveal_show_cart_total( $args = array() ) {
		if ( ! class_exists( 'woocommerce' ) ) {
			return;
		}

		$defaults = array(
			'no_text' => false,
		);

		$args = wp_parse_args( $args, $defaults );

		$items_number = WC()->cart->get_cart_contents_count();

		if ($items_number != 0) :
			printf(
				'<a href="%1$s" class="reveal-cart-info">
					<span><i class="icofont icofont-shopping-cart"></i> %2$s</span>
				</a>',
				esc_url( WC()->cart->get_cart_url() ),
				( ! $args['no_text']
					? esc_html( sprintf(
						_nx( '1 Item', '%1$s Items', $items_number, 'WooCommerce items number', 'revealpresentation' ),
						number_format_i18n( $items_number )
					) )
					: ''
				)
			);
		endif;
	}
}