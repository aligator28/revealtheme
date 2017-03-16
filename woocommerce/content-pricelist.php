<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
global $front_page_product_loop;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}


$popular_product = false;
if ( !empty(rwmb_meta('reveal_popular_product')) && rwmb_meta('reveal_popular_product') == 1 ) {
	$popular_product = true;
}


// var_dump($product->post->post_content);
?>
<div class="pricelist-container">
	<?php if ( $popular_product ) : ?>
		<span class='popular-product-label'>
			<?php echo esc_html__('popular', 'revealpresentation')?>
		</span>
	<?php endif; ?>

	<ul class="pricelist-item <?php if ( $popular_product ) echo 'popular-product' ?>">
		<li>
			<h2 class="pricelist-item-title"><?php echo esc_html( $product->post->post_title ); ?></h2>
		</li>
		<li class="pricelist-item-price">
			<?php
			$regular_price = '0.00';
			$sale_price = '';
			$curr_symb = get_woocommerce_currency_symbol();

			if ( !empty( $product->get_regular_price() ) ) $regular_price = esc_html( $product->get_regular_price() );
			if ( !empty( $product->get_sale_price() ) ) $sale_price = $product->get_sale_price();

			if ( $sale_price != '' ) : echo " <div class='reg-price-strike'>" . $regular_price . " " . $curr_symb . "</div><span class='sale-price-item'>" . $sale_price . " " . $curr_symb . "</span>";
			else :
				echo $regular_price . " " . $curr_symb;
			endif;
			?>
		</li>
		<li class="pricelist-item-content"><?php echo wp_kses_post( $product->post->post_content ); ?></li>
		<?php if ( $product->is_purchasable() && $product->is_in_stock() ) : ?>
		<li class="pricelist-item-button">
			<div class="pricelist-item-button_button"><?php woocommerce_template_loop_add_to_cart( $front_page_product_loop->post, $product ); ?></div>
		</li>
		<?php endif; ?>
	</ul>
</div>