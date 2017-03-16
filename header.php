<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<noscript>
	<div class="no-js-cont">JavaScript should be enabled to view this webpage</div>
</noscript>

<div class="cssload-wrap">
	<div class="welcome"><h2><?php if (!empty( of_get_option('reveal_preloader_text') )) {
	 echo esc_html( of_get_option('reveal_preloader_text') ); } ?></h2></div>
	<div class="cssload-cssload-spinner"></div>
</div>


<div class="body-wrapper">

<header>

	<!-- navigation begins -->
	<?php 
	$theme_location = 'primary';
	if ( has_nav_menu( 'primary' ) ) : ?>

		<?php 
			$display_menu = esc_html( of_get_option('reveal_display_navigation', 0) );
			$display_menu == 0 ? $show_class = 'show' : $show_class = 'hide';
		?>

		<div class="nav__label <?php echo $show_class; ?>" id="nav__label">
			<button class="toggle_mnu">
			<span id="sandwich" class="">
			  <span class="sw-topper"></span>
			  <span class="sw-bottom"></span>
			  <span class="sw-footer"></span>
			</span>
			</button>
		</div>

		<div class="nav main-navigation <?php echo $display_menu == 0 ? "nav-hide" : "nav-show" ?> " role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'revealpresentation' ); ?>">
			
			<!-- logo -->
			<div class="nav__logo">
			<?php if ( !empty( of_get_option('reveal_logo_image') ) ) : ?>
				<img class="nav__logo-image" src="<?php echo esc_html( of_get_option('reveal_logo_image') ) ?> " alt="logo">
			<?php endif; ?>
			<?php if ( !empty( of_get_option('reveal_logo_text') ) && empty( of_get_option('reveal_logo_image') ) ) : ?> 
				<span class="nav__logo-text">
				<?php echo esc_html(of_get_option('reveal_logo_text')); ?>
				</span>
			<?php endif; ?>
			</div>
			<!-- logo ends -->

			<!-- contact info -->
			<div class="contact__info">
				<div class="contact__info-heading">
					<p><?php if ( !empty( get_theme_mod('reveal_address_setting') ) ) { ?>
						<i class="icofont icofont-social-google-map"></i>
						<?php echo esc_html( get_theme_mod('reveal_address_setting') ); } ?></p>
					
					<p><?php if ( !empty( get_theme_mod('reveal_phone_setting') ) ) : ?>
						<i class="icofont icofont-iphone"></i>
						<?php echo esc_html( get_theme_mod('reveal_phone_setting') ); ?>
						<!-- <a href="tel:<?php// echo esc_html( get_theme_mod('reveal_phone_setting') );?>" class="contact__info-call-btn">Call Us Now</a> -->
						<?php endif; ?>
					</p>

					<p><?php if ( !empty( get_theme_mod('reveal_email_setting') ) ) { ?>
						<i class="icofont icofont-ui-email"></i>
						<?php echo esc_html( get_theme_mod('reveal_email_setting') ); } ?></p>
				</div>
			</div>
			<!-- contact info ends -->
		<?php
				wp_nav_menu( array(
					'theme_location'  => $theme_location,
					'menu'            => 'Main navigation', 
					'container'       => 'div', 
					'container_class' => '', 
					'container_id'    => '',
					'menu_class'      => 'menu', 
					'menu_id'         => 'top_main_nav',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 0,
					'walker'          => '',
				) );
		?>
			<div class="search-form-container" id="search-form-container"><?php get_search_form(); ?></div>
			<div class="cart-container"><?php reveal_show_cart_total(); ?></div>
		</div><!-- .main-navigation -->
	<?php else: ?>
			<div class="not-found"><h2><?php echo esc_html__("No Primary Navigation set. Create new Primary Navigation in admin dashboard", 'revealpresentation') ?></h2></div> 
	<?php endif; // has_nav_menu( 'primary' )?>
	<!-- navigation ends -->

</header>	


<?php global $slides_on_front; ?>

<?php if ($slides_on_front) : /* ?>
	<div class="apps-bages">
		<a class="app-store" target="_blank" href="<?php if ( !empty( of_get_option('reveal_app_store_url') ) ) echo of_get_option('reveal_app_store_url'); ?>">
		</a>
		<a class="google-play" target="_blank" href="<?php if ( !empty( of_get_option('reveal_google_play_url') ) ) echo of_get_option('reveal_google_play_url'); ?>">
			<img alt='Get it on Google Play' src='https://play.google.com/intl/en_gb/badges/images/generic/en_badge_web_generic.png'/>
		</a>
	</div>
<?php */ endif; ?>

<div class="content" style="<?php if (!$slides_on_front) : ?>background-image: linear-gradient(to top, transparent, transparent); <?php endif; if ( $slides_on_front && is_front_page() && !is_home()  ): ?>height: 100vh;<?php endif; ?>">

<?php !empty( of_get_option('reveal_shop_bg_image') && function_exists( 'is_shop' ) && is_shop() ) ? $shop_bg = esc_html(of_get_option('reveal_shop_bg_image')) : $shop_bg = false;
?>
<div class="content__wrapper" <?php if ($shop_bg) : echo 'style="background-image: url(' . $shop_bg . '); background-repeat: no-repeat; background-size: cover;"'; endif; ?> data-down="false">
