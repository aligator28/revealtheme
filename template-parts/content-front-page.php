<header class="video-container">
	<?php 
	if ( !empty(rwmb_meta( 'reveal_front_video_bg' )) ) :
		$video_bg = rwmb_meta( 'reveal_front_video_bg' );
		foreach ($video_bg as $video) {
			$video_bg = $video['url'];
		}

		// else: $video_bg = get_template_directory_uri() . '/video/Clock.mp4';
	?>
		<video id="fullscreen-video" class="fullscreen-video" poster="<?php echo get_template_directory_uri(); ?>/images/macbook.jpeg" autoplay="true" loop muted>
			<source src="<?php echo esc_html($video_bg); ?>" type="video/mp4"></source>
		</video>

		<div class="fullscreen-video mobile" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/clock.jpg); background-repeat: no-repeat; background-position: center; background-size: cover;"></div>
	<?php endif; // !empty(rwmb_meta( 'reveal_front_video_bg' )) ?>
		
	<?php 
		if ( !empty(rwmb_meta( 'reveal_front_header_bg' )) ) :
			$header_bg = rwmb_meta( 'reveal_front_header_bg' );
		foreach ($header_bg as $header_bg_image) {
			$header_bg_image = $header_bg_image['full_url'];
		}
	else: $header_bg_image = get_template_directory_uri().'/images/clock.jpg'; 
	endif; ?>
	
	<?php if ( empty(rwmb_meta( 'reveal_front_video_bg' )) ) : ?>
		<div class="front-header-bg" style="background-image: url( <?php echo esc_html( $header_bg_image ); ?> )"></div>
	<?php endif; ?>

		<?php 
			$video_title = !empty(rwmb_meta( 'reveal_front_video_title' )) ? esc_html( rwmb_meta( 'reveal_front_video_title' ) ) :  esc_html__( 'Don\'t waste your time, just use "Our Awesome Product"', 'revealpresentation' );
		?>
		<h1 class="video-title"><?php echo $video_title ?></h1>


		<?php
			$video_bloquote = !empty(rwmb_meta( 'reveal_front_video_blockquote' )) ? esc_html( rwmb_meta( 'reveal_front_video_blockquote' ) ) : esc_html__( 'Any of your business presentation idea, marketing advertizing and tutorial slides are possible', 'revealpresentation' );
		?>

		<blockquote class="video-blockquote"><?php echo $video_bloquote ?></blockquote>

</header> <!-- .video-container -->


<div class="front-socials row">
	<div class="front-socials-btn">
		<div class="front-socials-container">
			<i class="fa fa-share-alt" aria-hidden="true"></i>
		</div>
	</div>
	<a target="_blank" href="<?php 
		if ( !empty( of_get_option('reveal_youtube_link') ) ) : 
			echo esc_html( of_get_option('reveal_youtube_link') ); 
		else : echo 'http://youtube.com'; 
		endif; ?>"><div class="col-3 front-socials-item youtube"></div></a>
	<a target="_blank" href="<?php 
		if ( !empty( of_get_option('reveal_facebook_link') ) ) : 
			echo esc_html( of_get_option('reveal_facebook_link') ); 
		else : echo 'http://facebook.com'; 
		endif; ?>"><div class="col-3 front-socials-item facebook"></div></a>
	<a target="_blank" href="<?php 
		if ( !empty( of_get_option('reveal_twitter_link') ) ) : 
			echo esc_html( of_get_option('reveal_twitter_link') ); 
		else : echo 'http://twitter.com'; 
		endif; ?>"><div class="col-3 front-socials-item twitter"></div></a>
	<a target="_blank" href="<?php 
		if ( !empty( of_get_option('reveal_instagram_link') ) ) : 
			echo esc_html( of_get_option('reveal_instagram_link') ); 
		else : echo 'http://instagram.com'; 
		endif; ?>"><div class="col-3 front-socials-item instagram"></div></a>
</div>


<div class="wrap">
<?php // <div class="content-area"> ?>


<section class="page-section page-section-features">
	<h2 class="section-main-title">
		<?php if ( !empty( rwmb_meta('reveal_features_title') ) ) 
		echo esc_html( rwmb_meta('reveal_features_title') ); ?>	
	</h2>

	<div class="features-row">
	<?php 
		$features_loop = new WP_Query( array( 
			'post_type' => 'features', 
			'posts_per_page' => -1, 
			'order' => 'asc' 
		) );
		while ( $features_loop->have_posts() ) : $features_loop->the_post();
	?>
	<div class="features-item">
		<?php if ( !empty( rwmb_meta('reveal_feature_icon') ) ) : 
		$icon = esc_html( rwmb_meta('reveal_feature_icon') ); ?>
		<div class="features-item-icon">
			<i class="<?php echo $icon; ?>"></i>
		</div>
		<?php endif; ?>
			<div class="features-item-content">
				<h4 class="features-item-title"><?php wp_kses_post( the_title() ); ?></h4> 
				<div class="features-item-text"><?php if ( !empty( rwmb_meta('reveal_short_description') ) ) : echo wp_kses_post( rwmb_meta('reveal_short_description') ); endif; ?>
				</div>
			</div>
		<a class="features-more-link" href="<?php the_permalink(); ?>">More...</a>
	</div>

	<?php	// End of the loop.
		endwhile;
	if ( !$features_loop->have_posts() ) : ?>
	<div class="not-found">
		<h2><?php echo esc_html__("No features found", 'revealpresentation'); ?></h2>
		<p><?php echo __("Add new features in <a href=\"/wp-admin/post-new.php?post_type=features\">admin dashboard</a>", 'revealpresentation'); ?></p>
	</div>
	<?php endif; wp_reset_query();	?>
	</div><!-- .features-row -->
</section><!-- page-section features -->

<section class="page-section overview">
	<h2 class="section-main-title overview-title">
		<?php if ( !empty( rwmb_meta('reveal_overview_title') ) ) 
		echo esc_html( rwmb_meta('reveal_overview_title') ); ?>		
	</h2>
	
	<?php 
		if ( !empty(rwmb_meta( 'reveal_overview_bg' )) ) :
			$overview_bg = rwmb_meta( 'reveal_overview_bg' );
		foreach ($overview_bg as $overview_bg_image) {
			$overview_bg_image = $overview_bg_image['full_url'];
		}
	else: $overview_bg_image = get_template_directory_uri().'/images/clock.jpg'; 
	endif; ?>

	<div class="row row-overview" style="background-image: url(<?php echo esc_html($overview_bg_image); ?>)">
		<div class="col-12 overview-content">
			<div id="overview_accordion">
				<div id="accordion-inner">
					<ul class="accordion-container accordion-inner">
	<?php 
		$overviews_loop = new WP_Query( array( 
			'post_type' => 'overviews',
			'posts_per_page' => -1, 
			'order' => 'asc' 
		) ); ?>
	<?php while ( $overviews_loop->have_posts() ) : $overviews_loop->the_post(); ?>
	<?php 
		if ( !empty( rwmb_meta( 'reveal_overview_slide_img' ) ) ) :
			$overview_slider = rwmb_meta( 'reveal_overview_slide_img' );
		
			foreach ($overview_slider as $overview_slider_image) {
				$overview_slider_image = $overview_slider_image['full_url'];
			}
		endif;
	?>
			<?php
				$slide_bg_color = '#333'; !empty(rwmb_meta( 'reveal_overview_slider_bg_color' )) ? $slide_bg_color = esc_html( rwmb_meta( 'reveal_overview_slider_bg_color' ) ) : $slide_bg_color = '#333';
			?>
			<li class="frame-<?php echo the_ID(); ?> frame frame-open" style="z-index: <?php echo the_ID(); ?>; background-color: <?php echo $slide_bg_color; ?>; ">
				<div class="frame-content">
					<h3><?php wp_kses_post( the_title() ); ?></h3>
					<?php wp_kses_post( the_content() ); ?>
				</div>
				<div class="frame-image" style="<?php if ( !empty($overview_slider_image) ) : ?> background-image: url('<?php echo esc_html($overview_slider_image); ?>');<?php endif; ?>">
				</div>
				<?php // <div class="frame-image-triangle" style="border-color: transparent <?php echo $slide_bg_color; ?> <?php // transparent transparent"></div> ?>
			</li>
	
<?php 
$overview_slider_image = ''; //reset slide image
endwhile; 
?>
			</ul>
		</div>
	</div><!-- id="overview_accordion" -->

	<?php if ( !$overviews_loop->have_posts() ) :?>
		<div class="not-found">
			<h2><?php echo esc_html__('No overview slides found', 'revealpresentation'); ?></h2>
			<p><?php echo __("Add new overview slides in <a href=\"/wp-admin/post-new.php?post_type=overviews\">admin dashboard</a>", 'revealpresentation'); ?></p>
		</div>
	<?php endif; wp_reset_query();	?>


		</div>
	</div><!-- class="row row-overview" -->
</section>

<section class="page-section plans">
	<h2 class="section-main-title plans-title">
	<?php if ( !empty( rwmb_meta('reveal_plans_title') ) ) 
		echo esc_html( rwmb_meta('reveal_plans_title') ); ?>	
	</h2>
	<?php
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => -1,
			'order' => 'asc'
			);
		global $front_page_product_loop;
		$front_page_product_loop = new WP_Query( $args );
		
	if ( $front_page_product_loop->have_posts() ) : 
		$no_front_page_product = true;
	?>
	<div class="pricelist-row">
	<?php
		while ( $front_page_product_loop->have_posts() ) : $front_page_product_loop->the_post();
				// varDump($loop->posts);
			if ( null !== rwmb_meta('reveal_pricing_table_product') 
				&& rwmb_meta('reveal_pricing_table_product') == 1 ) :
				
				if ( function_exists('wc_get_template_part') ) {
					wc_get_template_part( 'content', 'pricelist' );
				} else {
					get_template_part( 'template-parts/content', 'no-shop' );
					break;
				}

				$no_front_page_product = false;

			endif;
		endwhile; 
	?>
	</div><!--/.pricelist-->
	<?php endif; // $loop->have_posts(); ?>

	<?php if ($no_front_page_product) :	?>
		<div class="not-found">
			<h2><?php echo esc_html__('There is no product for front page', 'revealpresentation'); ?></h2>
			<p><?php echo __("Go to Products -> Edit Product find \"Use this product in Pricing Table for Front Page\" option and check \"Use\" <a href=\"/wp-admin/edit.php?post_type=product\">Go to admin dashboard</a>", 'revealpresentation'); ?></p>
		</div>
	<?php endif; //($no_front_page_product) ?>

	<?php if ( !$front_page_product_loop->have_posts() ) : ?>
	<div class="not-found">
		<h2><?php echo esc_html__('No Price List Items found', 'revealpresentation'); ?></h2>
		<p><?php echo __("Add Price List Items in <a href=\"/wp-admin/post-new.php?post_type=product\">admin dashboard</a>", 'revealpresentation'); ?></p>
	</div>
	<?php endif; wp_reset_postdata(); ?>
	<div class="plans-bottom bottom-skew"></div>
</section>

<div class="row page-section contacts">
	<?php if ( !empty( get_theme_mod('reveal_phone_setting') ) ) {
		$phone = esc_html( get_theme_mod('reveal_phone_setting') ); 
	} else {
		$phone = __('Set phone number in Appearance->Customize->Contact Details', 'revealpresentation');
	} ?>
	<a href="tel:<?php echo $phone; ?>">
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
	<a href="#contact_form">
		<div class="col-4 contacts-item">
			<div class="contact-icon"><i class="icofont icofont-ui-email"></i></div>
			<p><?php echo $email; ?></p>		
		</div>
	</a>
	<a href="#google_map">
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
	<div class="contacts-bottom bottom-skew"></div>
</div>

<section class="page-section questions"<?php 
		if ( !empty(rwmb_meta( 'reveal_questions_bg_image' )) ) :
			$questions_bg = rwmb_meta( 'reveal_questions_bg_image' );
		
		foreach ($questions_bg as $questions_bg_image) {
			$questions_bg_image = $questions_bg_image['full_url'];
		}
			
	?>
	<?php 
		else:
			$questions_bg_image = get_template_directory_uri().'/images/overview.jpg';
		endif; 
	?> style="background-image: url(<?php echo esc_html( $questions_bg_image ); ?>)">

	<h2 class="section-main-title questions-title">
	<?php if ( !empty( rwmb_meta('reveal_questions_title') ) ) 
		echo esc_html( rwmb_meta('reveal_questions_title') ); ?>	
	</h2>

	<dl class="accordion">

	<?php 
		$faqs_loop = new WP_Query( array( 
			'post_type' => 'questions', 
			'posts_per_page' => -1, 
			'order' => 'asc' 
		) );
		if ( $faqs_loop->have_posts() ) :
	?>
	<!-- <h2>Accordion 1</h2> -->
	<?php while ( $faqs_loop->have_posts() ) : $faqs_loop->the_post(); ?>	

	  <dt><?php echo the_title(); ?></dt>
	  <dd>
	  	<?php wp_strip_all_tags( the_content() ); // if ( !empty( rwmb_meta('reveal_fa_answer') ) ) 
		//echo esc_html( rwmb_meta('reveal_fa_answer') ); ?>
	  </dd>

	<?php endwhile; ?>

	<?php endif; //$faqs_loop->have_posts() ?>

	<?php if ( !$faqs_loop->have_posts() ) : ?>
	<div class="not-found">
		<h2><?php echo esc_html__('No FAQs found', 'revealpresentation')?></h2>
		<p><?php echo __("Add new FAQs in <a href=\"/wp-admin/post-new.php?post_type=questions\">admin dashboard</a>", 'revealpresentation') ?></p>
	</div>
	<?php endif; wp_reset_query();	?>

	</dl>
	<div class="questions-bottom bottom-skew"></div>
</section>

<section class="row page-section contact-form" id="contact_form">
	<div class="contact-form-bg"><i class="icofont icofont-email"></i></div>
	<h2 class="section-main-title contact-form-title">
		<?php 
		if ( !empty( rwmb_meta('reveal_contact_form_title') ) ) { 
			echo esc_html( rwmb_meta('reveal_contact_form_title') ); }
		else {
				echo esc_html__('Contact Us', 'revealpresentation');
			}
		?>	
	</h2>
	<div class="contact-form-content">
		<?php if ( !empty( rwmb_meta('reveal_contact_form_shortcode') ) ) :
			echo do_shortcode( wp_kses_post(rwmb_meta('reveal_contact_form_shortcode')) );
			else:
		?>
		<div class="not-found">
			<h2><?php echo esc_html__("No Contact Form found", 'revealpresentation'); ?></h2>
			<p><?php echo __("Install \"Contact Form 7\" Plugin and add new map in <a href=\"/wp-admin/admin.php?page=wpcf7\">admin dashboard</a>", 'revealpresentation'); ?></p>
		</div>
		<?php endif; ?>	
	</div>
	<div class="contact-form-bottom"></div>
</section>

<section class="row page-section download">
	<div class="download-bg"></div>
	<h2 class="section-main-title download-title">
		<?php if ( !empty( rwmb_meta('reveal_download_title') ) ) 
		echo esc_html( rwmb_meta('reveal_download_title') ); ?>	
	</h2>
	
	<?php
		if ( !empty( rwmb_meta( 'reveal_download_bg_img' ) ) ) :
			$download = rwmb_meta( 'reveal_download_bg_img' );
		
			foreach ($download as $download_image) {
				$download_image = $download_image['full_url'];
			}
		else:
			$download_image = get_template_directory_uri().'/images/apple.jpg';
		endif;
	?>

	<div class="download-content-bg" style="background-image: url(<?php echo esc_html($download_image); ?>)">
		<div class="download-content">
			<p>
			<?php echo !empty( rwmb_meta('reveal_download_text') ) ? esc_html( rwmb_meta('reveal_download_text') ) : esc_html__('You can download our application in AppStore and GooglePlay, customize it and use anytime you need Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi asperiores necessitatibus doloremque quis fuga porro numquam quaerat minus et adipisci hic, modi omnis perspiciatis rerum aut! Odit quidem ex possimus, velit dolor nihil nostrum magni maxime nisi dolore sapiente nulla qui, facere delectus et vero dolorum voluptatum iusto. Dignissimos, voluptates.', 'revealpresentation'); 
			?>	
			</p>
			<div class="apps-bages download-bages">
				<a class="app-store" target="_blank" href="<?php if ( !empty( of_get_option('reveal_app_store_url') ) ) echo of_get_option('reveal_app_store_url'); ?>">
				</a>
				<a class="google-play" target="_blank" href="<?php if ( !empty( of_get_option('reveal_google_play_url') ) ) echo of_get_option('reveal_google_play_url'); ?>">
					<img alt='Get it on Google Play' src='https://play.google.com/intl/en_gb/badges/images/generic/en_badge_web_generic.png'/>
				</a>
			</div>
		</div>
	</div>
</section>


<?php
	if ( !empty( rwmb_meta( 'reveal_map_bg_img' ) ) ) :
		$map = rwmb_meta( 'reveal_map_bg_img' );
	
		foreach ($map as $map_image) {
			$map_image = $map_image['full_url'];
		}
	else:
		$map_image = get_template_directory_uri().'/images/map_bg2.png';
	endif;
?>
<section class="page-section map-section" id="google_map" style="background-image: url(<?php echo esc_html($map_image) ?>)">
	<h2 class="section-main-title map-title">
		<?php if ( !empty( rwmb_meta('reveal_find_title') ) ) 
		echo esc_html( rwmb_meta('reveal_find_title') ); ?>	
	</h2>
	
	<div class="map-section-container">
		<?php 
		if ( !empty( rwmb_meta('reveal_google_map_shortcode') ) ) : 
			echo do_shortcode( wp_kses_post(rwmb_meta('reveal_google_map_shortcode')) ); 
		else: 
		?>
		<div class="not-found">
			<h2><?php echo esc_html__("No map found", 'revealpresentation'); ?></h2>
			<p><?php echo __("Install \"WP Google Map\" Plugin and add new map in <a href=\"/wp-admin/admin.php?page=wp-google-maps-menu\">admin dashboard</a>", 'revealpresentation'); ?></p>
		</div>
		<?php endif; ?>
	</div><!-- .map-section-container -->

</section>

<?php // </div>.content-area ?>
</div><!-- .wrap -->

