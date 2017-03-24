<?php
function reveal_pluta_scripts() { 
	$theme_dir = get_template_directory_uri();//get_stylesheet_directory_uri();

// styles
if ( is_front_page() && !is_home() ) {
	wp_enqueue_style( 'reveal_zaccordion_css', $theme_dir . '/css/zaccordion.css', array() );
	wp_register_script( 'reveal_front_end_js', $theme_dir . '/js/front-end.js', array('jquery'), '3.7.3', '1.0', true );
	wp_enqueue_script( 'reveal_front_end_js' );


	wp_register_script( 'zaccordion_js', $theme_dir . '/js/libs/zaccordion/js/jquery.zaccordion.js', array('jquery'), '3.7.3', '1.0', true );
	wp_enqueue_script( 'zaccordion_js' );

	wp_register_script( 'reveal_zaccordion_js', $theme_dir . '/js/zaccordion.js', array('jquery'), '3.7.3', '1.0', true );
	wp_enqueue_script( 'reveal_zaccordion_js' );

	wp_register_script( 'reveal_simple_accordion_js', $theme_dir . '/js/simple-accordion.js', array('jquery'), '3.7.3', '1.0', true );
	wp_enqueue_script( 'reveal_simple_accordion_js' );

	wp_register_script( 'reveal_animate_color_js', $theme_dir . '/js/animate.color.min.js', array('jquery'), '3.7.3', '1.0', true );
	wp_enqueue_script( 'reveal_animate_color_js' );
}

	wp_enqueue_style( 'reveal_preloader_css', $theme_dir . '/css/preloader.css', array() );
	wp_enqueue_style( 'icofont_css', $theme_dir . '/fonts/icofont/css/icofont.css', array(), '20160816' );
	wp_enqueue_style( 'fontawesome_css', $theme_dir . '/fonts/css/font-awesome.min.css', array(), '20160816' );
	wp_enqueue_style( 'google_fonts', 'https://fonts.googleapis.com/css?family=Aref+Ruqaa|Oswald|Raleway|Source+Sans+Pro&amp;subset=latin-ext', array(), '20160816' );
	wp_enqueue_style( 'parent_twentysixteen_style', $theme_dir . '/css/parent-twentysixteen-style.css', array(), '20160816' );
	wp_enqueue_style( 'reveal_style', get_stylesheet_uri(), array(), '20160816' );
	wp_enqueue_style( 'reveal_custom_theme', $theme_dir . '/css/custom-reveal-theme.css', array(), '20160816' );

if ( function_exists( 'is_shop' ) ) {
	wp_enqueue_style( 'reveal_shop_css', $theme_dir . '/css/shop.css', array() );
}
// scripts

	wp_register_script( 'jquery_transit', $theme_dir . '/js/libs/jquery.transit.min.js', array('jquery'), '3.7.3', '1.0', true );
	wp_enqueue_script( 'jquery_transit' );

	wp_register_script( 'reveal_always_load', $theme_dir . '/js/always-load.js', array('jquery'), '3.7.3', '1.0', true );
	
	$display_menu = esc_html( of_get_option('reveal_display_navigation', 0) );
	wp_localize_script( 'reveal_always_load', 'display_menu', $display_menu );
	wp_enqueue_script( 'reveal_always_load' );

// load specific styles and scripts for reveal.js
if ( 
	!empty( of_get_option('reveal_enable_slides_on_front_page') ) 
	&& of_get_option('reveal_enable_slides_on_front_page') == 1
	&& !is_home()
	&& is_front_page()
	|| get_post_type() == 'slides'
	|| check_if_has_categories_for_slides()
	) :

	// reveal.js styles
	wp_enqueue_style( 'reveal_css', $theme_dir . '/js/libs/reveal/css/reveal.css', array(), '20160816' );
	// reveal.js scripts
	wp_register_script( 'reveal_js', $theme_dir . '/js/libs/reveal/js/reveal.js', array('jquery'), '3.7.3', '1.0', true );
	wp_enqueue_script( 'reveal_js' );

	wp_register_script( 'reveal_speaker_notes_js', $theme_dir . '/js/libs/reveal/plugin/notes/notes.js', array(), null, true );
	wp_enqueue_script( 'reveal_speaker_notes_js' );

	// reveal.js current config and work
	wp_register_script( 'reveal_pluta_js', $theme_dir . '/js/pluta-js.js', array(), '3.7.3', true );
	// Localize the script with new data
	$php_vars = array(
		'enable_autoslide' => esc_html( of_get_option('reveal_enable_autoslide') ),
		'autoslide_time' => esc_html( of_get_option('reveal_autoslide_time') ),
		'loop_presentation' => esc_html ( of_get_option('reveal_loop_presentation') )
	);
	wp_localize_script( 'reveal_pluta_js', 'php_vars', $php_vars );

	wp_enqueue_script( 'reveal_pluta_js' );

endif;

}
add_action( 'wp_enqueue_scripts', 'reveal_pluta_scripts' );



// CALL FOR PARTICLES.JS
// function reveal_switch_on($js_id, $counter) {

// 	if ( empty( rwmb_meta( 'reveal_particles' ) ) ) {
// 		return false;
// 	}

// 	// include custom particles styles and scripts
// 	$custom_css = rwmb_meta( 'reveal_particles_css' );
// 	if ( !empty($custom_css) ) {
		
// 		$custom_css = str_replace('particles-js', $js_id, $custom_css);

// 		wp_enqueue_style( 'reveal-custom-css-style', get_template_directory_uri() . '/css/particles-custom.css' );
// 		wp_add_inline_style( 'reveal-custom-css-style', esc_html($custom_css) );
// 	} else {
// 		// include default particles styles and scripts
// 		wp_enqueue_style( 'reveal-css-style', get_template_directory_uri() . '/css/particles.css' );
// 	}

// 	$custom_js = rwmb_meta( 'reveal_particles_js' );

// 	if ( !empty($custom_js) ) {

// 		wp_register_script( 'reveal-particles-custom', get_template_directory_uri() . '/js/particles-custom.js', array(), '1.0', true );
// 		wp_enqueue_script( 'reveal-particles-custom' );

// 		$custom_js = str_replace('particles-js', $js_id, $custom_js);
		
// 		wp_add_inline_script('reveal-particles-custom', $custom_js );

// 	} else {
// 		wp_register_script( 'reveal_particles', get_template_directory_uri() . '/js/particles.js', array(), '1.0', true );
// 		wp_enqueue_script( 'reveal_particles' );
// 	}
// }
// add_action( 'wp_enqueue_scripts', 'reveal_switch_on' );


// CALL FOR PARTICLES.JS ENDS
