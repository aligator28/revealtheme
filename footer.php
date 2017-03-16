<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?>

</div><!-- .content__wrapper -->
</div><!-- .content -->
</div><!-- .body-wrapper -->

<footer class="page-section footer-section">
	
	<div class="row footer-socials">
		<a target="_blank" href="<?php if ( !empty( of_get_option('reveal_youtube_link') ) ) echo esc_html( of_get_option('reveal_youtube_link') ); ?>"><div class="col-3 front-socials-item youtube"></div></a>
		<a target="_blank" href="<?php if ( !empty( of_get_option('reveal_facebook_link') ) ) echo esc_html( of_get_option('reveal_facebook_link') ); ?>"><div class="col-3 front-socials-item facebook"></div></a>
		<a target="_blank" href="<?php if ( !empty( of_get_option('reveal_twitter_link') ) ) echo esc_html( of_get_option('reveal_twitter_link') ); ?>"><div class="col-3 front-socials-item twitter"></div></a>
		<a target="_blank" href="<?php if ( !empty( of_get_option('reveal_instagram_link') ) ) echo esc_html( of_get_option('reveal_instagram_link') ); ?>"><div class="col-3 front-socials-item instagram"></div></a>
	</div>

	<div class="footer-section-bottom">

		<div class="row">
			<?php if ( !empty( get_theme_mod('reveal_phone_setting') ) ) {
				$phone = esc_html( get_theme_mod('reveal_phone_setting') ); 
			} else {
				$phone = __('Set phone number in Appearance->Customize->Contact Details', 'revealpresentation');
			} ?>
			
			<a href="tel:<?php echo $phone; ?>" title="Tap to call">
				<div class="col-4 contacts-item">
					<div class="contact-icon">
					<i class="icofont icofont-ui-dial-phone"></i></div>
					<p><?php echo $phone; ?></p>
				</div>
			</a>

			<?php if ( !empty( get_theme_mod('reveal_email_setting') ) ) {
				$email = esc_html( get_theme_mod('reveal_email_setting') );
			} else {
				$email = __('Set email in Appearance->Customize->Contact Details', 'revealpresentation');
			} ?>

			<a href="#contact_form" title="Send an email">
			<div class="col-4 contacts-item">
				<div class="contact-icon"><i class="icofont icofont-ui-email"></i></div>
				<p><?php echo $email; ?></p>		
			</div>
			</a>
			<a href="#google_map" title="See the map">
				<div class="col-4 contacts-item">
					<div class="contact-icon"><i class="icofont icofont-social-google-map"></i></div>
					<p>
					<?php 
					if ( !empty( get_theme_mod('reveal_address_setting') ) ) {
						$address = esc_html( get_theme_mod('reveal_address_setting') );
					} else {
						$address = __('Set address in Appearance->Customize->Contact Details', 'revealpresentation');
					} 
					echo $address;
					?>
			 		</p>
				</div>
			</a>
		</div>

		<p class="footer-section-copy"><?php bloginfo( 'name' ); ?> &copy; <?php echo date('Y'); ?></p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
