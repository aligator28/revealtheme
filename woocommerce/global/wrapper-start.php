<?php
/**
 * Content wrappers
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/wrapper-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$template = get_option( 'template' );

// varDump($template);
 // !empty( of_get_option('reveal_shop_bg_image') ) ? $shop_bg = 'style="background-image: url(' . esc_html(of_get_option('reveal_shop_bg_image')). '); "' : $shop_bg = '';

switch( $template ) {
	case 'twentyeleven' :
		echo '<div id="primary"><div id="content"  class="twentyeleven">';
		break;
	case 'twentytwelve' :
		echo '<div id="primary" class="site-content"><div id="content"  class="twentytwelve">';
		break;
	case 'twentythirteen' :
		echo '<div id="primary" class="site-content"><div id="content"  class="entry-content twentythirteen">';
		break;
	case 'twentyfourteen' :
		echo '<div id="primary" class="content-area"><div id="content"  class="site-content twentyfourteen"><div class="tfwc">';
		break;
	case 'twentyfifteen' :
		echo '<div id="primary"  class="content-area twentyfifteen"><div id="main" class="site-main t15wc">';
		break;
	case 'twentysixteen' :
		echo '<div id="primary" class="content-area twentysixteen"><main id="main" class="site-main" >';
		break;
	default :
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			$width = 'style="width: 70%"';
		}
		else {
			$width = 'style="width: 100%"';
		}
		echo '<div id="container" '. $width .'><div id="content">';
		break;
}
