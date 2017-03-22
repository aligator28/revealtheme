<?php 


function pluta_customize_register( $wp_customize ) {

	require_once get_stylesheet_directory() . '/libs/customizer/customizer_sections_generator.php';
	// Color picker with transparency
	// CHANGE PATH FOR CURRENT THEME 
	require_once get_stylesheet_directory() . '/libs/alpha-color-picker/alpha-color-picker.php';
	include_once get_stylesheet_directory() . '/libs/customizer/class_customize_textarea_control.php';

	// $wp_customize->add_panel( 'front_page_panel', array(
	//   'title' => esc_html__( 'Front Page Options', 'revealpresentation' ),
	//   'description' => 'some desc', // Include html tags such as <p>.
	//   'priority' => 160, // Mixed with top-level-section hierarchy.
	// ) );

	$text_domain = 'pluta_customize';

	$sections = [
		'contact_section' =>
		[
	/***************** contact details section ****************************/
			'id' => 'pluta_contacts',
			'title' => 'Contact Details',

	// settings for contact section
			'settings' => [
				'address' => [
					'setting_id' => 'reveal_address_setting',
					'setting_title' => 'Your address',

					'control_label' => esc_html__('Address', 'revealpresentation'),
					'type' => 'textarea',
					'setting_type' => 'theme_mod',
					'default' => 'Your address'
				],
				'phone' => [
					'setting_id' => 'reveal_phone_setting',
					'setting_title' => 'Your phone number',

					'control_label' => esc_html__('Telephone number', 'revealpresentation'),
					'type' => 'textarea',
					'setting_type' => 'theme_mod',
					'default' => 'your phone'
				],
				'email' => [
					'setting_id' => 'reveal_email_setting',
					'setting_title' => 'Your email',

					'control_label' => esc_html__('Email', 'revealpresentation'),
					'type' => 'textarea',
					'setting_type' => 'theme_mod',
					'default' => 'your@email'
				]
			]
		],
/********************* menu section *************************/
// 'front_page_section' =>
// 		[
// 			'id' => 'pluta_front_page_images',
// 			'title' => 'Navigation Header Styling',
// 			'panel' => 'nav_menus',

// 			// settings for front section
// 			'settings' => [
// 				'header_bg_image' => [
// 					'setting_id' => 'pluta_front_page_bg_image',
// 					'control_label' => esc_html__('Header Background Image', 'revealpresentation'),
// 					'type' => 'image_upload'
// 				],
// 				'header_title_color' => [
// 					'setting_id' => 'pluta_header_background_color',
// 					'control_label' => esc_html__('Header Background Color', 'revealpresentation'),
// 					'description' => esc_html__('When Background Image is set you can set not only color, but opacity too. Try to change opacity when Background Image set!', 'revealpresentation'),
// 					'default' => 'rgba(255, 255, 255, 0)',
// 					'type' => 'alpha-color-picker',
// 				]
// 			]
// 		],
/***************** color section ****************************/
		'color_section' =>
		[
			'id' => 'pluta_colors',
			'title' => 'Theme Skin',
			'priority' => 1,

			//
			'settings' => [
				// 'bg_image' => [
				// 	'setting_id' => 'pluta_bg_image',
				// 	'control_label' => esc_html__('Body Background Image', 'revealpresentation'),
				// 	'description' => esc_html__('Background Image can be seen only if Main Background color is transparent or partial transparent', 'revealpresentation'),
				// 	'type' => 'image_upload'
				// ],
				'header_bg_image' => [
					'setting_id' => 'pluta_front_page_bg_image',
					'control_label' => esc_html__('Header Background Image', 'revealpresentation'),
					'type' => 'image_upload'
				],
				// 'header_title_color' => [
				// 	'setting_id' => 'pluta_header_background_color',
				// 	'control_label' => esc_html__('Header Background Color', 'revealpresentation'),
				// 	'description' => esc_html__('When Background Image is set you can set not only color, but opacity too. Try to change opacity when Background Image set!', 'revealpresentation'),
				// 	'default' => 'rgba(255, 75, 20, 0.8)',
				// 	'type' => 'alpha-color-picker',
				// ]
			]
		],
	/***************** front page section ****************************/
		// 'front_page_section' =>
		// [
		// 	'id' => 'pluta_front_page_images',
		// 	'title' => 'Header',
		// 	'panel' => 'front_page_panel',

		// 	// settings for front section
		// 	'settings' => [
		// 		'header_bg_image' => [
		// 			'setting_id' => 'pluta_front_page_bg_image',
		// 			'setting_title' => 'Header Background Image',

		// 			'control_label' => 'Header Background Image',
		// 			'type' => 'image_upload'
		// 		],
		// 		'header_title_en' => [
		// 			'setting_id' => 'pluta_front_page_header_title_en_US',
		// 			'setting_title' => 'Header Title',

		// 			'control_label' => 'Header Title English',
		// 			'type' => 'text'
		// 		],
		// 		'header_title_ru' => [
		// 			'setting_id' => 'pluta_front_page_header_title_ru_RU',
		// 			'setting_title' => 'Header Title',

		// 			'control_label' => 'Header Title Русский',
		// 			'type' => 'text'
		// 		],
		// 		'header_subtitle_en' => [
		// 			'setting_id' => 'pluta_front_page_header_subtitle_en_US',
		// 			'setting_title' => 'Header Subtitle English',

		// 			'control_label' => 'Header Subtitle English',
		// 			'type' => 'text'
		// 		],
		// 		'header_subtitle_ru' => [
		// 			'setting_id' => 'pluta_front_page_header_subtitle_ru_RU',
		// 			'setting_title' => 'Header Subtitle',

		// 			'control_label' => 'Header Subtitle Russian',
		// 			'type' => 'text'
		// 		],
		// 		'header_button_text_en_US' => [
		// 			'setting_id' => 'pluta_front_page_header_button_text_en_US',
		// 			'setting_title' => 'Header Button Text',

		// 			'control_label' => 'Header Button Text English',
		// 			'type' => 'text'
		// 		],
		// 		'header_button_text_ru_RU' => [
		// 			'setting_id' => 'pluta_front_page_header_button_text_ru_RU',
		// 			'setting_title' => 'Header Button Text',

		// 			'control_label' => 'Header Button Text Russian',
		// 			'type' => 'text'
		// 		],
		// 		'header_bg_image_tint' => [
		// 			'setting_id' => 'pluta_bg_image_tint',
		// 			'setting_title' => 'Header Background Image Tint',

		// 			'control_label' => 'Header Background Image Tint',
		// 			'type' => 'radio',
		// 			'choices' => [
		// 							'lighten' => __( 'Lighten', $text_domain ),
		// 							'darken' => __( 'Darken', $text_domain ),
		// 							'notint' => __( 'No Tint', $text_domain ) 
		// 						 ],
		// 		],
		// 		'header_title_color' => [
		// 			'setting_id' => 'pluta_header_title_color',
		// 			'setting_title' => 'Header Title Color',

		// 			'control_label' => 'Header Title Color',
		// 			'type' => 'color'
		// 		]
		// 	]
		// ],

	];


	$textcolors[] = array(
		'slug' => 'main_background_color',
		'default' => 'rgba(254,254,254,1)',
		'label' => esc_html( 'Main Background Color' ),
		'description' => esc_html__('Set transparency to 0 to see background image', 'revealpresentation')
	);

	$textcolors[] = array(
		'slug' => 'accent_color',
		'default' => 'rgba(255, 75, 20, 1)',
		'label' => esc_html( 'Accent color'  ),
		
	);

	$textcolors[] = array(
		'slug' => 'sections_bg_color',
		'default' => 'rgba(33, 33, 33, 1)',
		'label' => esc_html( 'Main Sections Background Color'  ),
		'description' => esc_html__('Background of Post Content on Blog Page, Color Sections of Front Page', 'revealpresentation')		
	);

	$textcolors[] = array(
		'slug' => 'links_color',
		'default' => 'rgba(238, 238, 238, 1)',
		'label' => esc_html( 'Links color'  ),
		
	);


	reveal_generate_color_controls($textcolors);

	reveal_generate_sections($sections);
}

add_action( 'customize_register', 'pluta_customize_register' );



function reveal_styles_skins() {

	wp_enqueue_style( 'reveal_skin_style', get_template_directory_uri() . '/css/skin.css' );

	$main_background = !empty( get_theme_mod('main_background_color')) ?esc_html( get_theme_mod('main_background_color') ) : 'rgba(254,254,254,1)';
	$accent_color = !empty( get_theme_mod('accent_color')) ? esc_html( get_theme_mod('accent_color') ) : 'rgba(255, 75, 20, 1)';
	$sections_bg_color = !empty( get_theme_mod('sections_bg_color')) ? esc_html( get_theme_mod('sections_bg_color') ) : 'rgba(33, 33, 33, 1)';
	$links_color = !empty( get_theme_mod('links_color') ) ? esc_html( get_theme_mod('links_color') ) : 'rgba(238, 238, 238, 1)';

	$custom_css = '';

	// $main_navigation_bg = 'transparent';
	// if ( !empty( get_theme_mod('pluta_header_background_color') ) ) {
	// 	$main_navigation_bg = get_theme_mod('pluta_header_background_color');
	// 	$custom_css .=
	// 	".menu-main-navigation-container {
	// 		background-color: {$main_navigation_bg}
	// 	}";
	// }
	$nav_bg_image = get_template_directory_uri().'/images/overview_bg.png';
	if ( !empty( get_theme_mod('pluta_front_page_bg_image') ) ) {
		$nav_bg_image = get_theme_mod('pluta_front_page_bg_image');
	}
	$custom_css .= "
	.nav {
		background-image: url('{$nav_bg_image}');
		background-size: cover;
	}
	";
	if ( !empty(get_theme_mod('pluta_bg_image') ) ) {

		$bg_image = get_theme_mod('pluta_bg_image');
		$custom_css .= "
		.content {
			background-image: url('{$bg_image}');
			background-size: 100% 100%;
			background-repeat: no-repeat;
		}";
	}

	$custom_css .= "
.content__wrapper {
	background-color: {$main_background};
}

.phone-heading h1 {
	border-bottom: 2px solid {$accent_color} !important;
	border-top: 2px solid {$accent_color} !important;
	color: {$accent_color} !important;
}

.contact__info-heading .icofont {
	color: {$accent_color} !important;
}

.nav__logo-text {
	color: {$main_background};
}

.menu-item,
.main-navigation ul ul li {
	border-bottom-color: {$accent_color};
	border-top-color: transparent;
}
.menu-item:hover, 
.menu-item-active,
#top_main_nav .current_page_item,
#top_main_nav .current-menu-item {
	border-top-color: {$accent_color};
	border-bottom-color: transparent;
}

#top_main_nav li a {
	color: {$links_color};
}
.search-submit:before {
	color: {$accent_color};
}

/* BLOG */

.cssload-cssload-spinner:before {
	border-color: {$accent_color};
}
a {
	color: {$accent_color};
}

.front-socials-btn {
	border-right: 2px solid {$accent_color};
}
.video-container .video-blockquote {
	border-left: 3px solid {$accent_color};
}
.fa-share-alt {
	color: {$accent_color};
}

.features-item:hover .features-item-icon {
	box-shadow: 0 0 0 25px #fefefe, 0 0 0 60px {$accent_color};
}
.features-item:hover {
	box-shadow: 0 0 0 5px #fefefe, 0 0 0 30px {$accent_color};
}

.row-overview::before {
	border-color: {$accent_color} transparent transparent transparent;
}
.plans-title::after {
	color: {$accent_color};
}
.pricelist-item::before {
	border-color: {$accent_color} transparent transparent transparent;
}
.accordion dt:hover {
	background-color: {$accent_color};
}

.contact-icon {
	background-color: {$accent_color};
	box-shadow: 0 0 0 3px {$accent_color}, 0 0 0 10px #fff, 0 0 0 11px {$accent_color};
}
.contact-form {
	background-color: {$accent_color};
}
.questions-title::after {
	color: {$accent_color};
}
.pricelist-item-button button .add_to_cart_button:hover {
	background-color: {$accent_color};
}
.overview-title {
	background-color: {$accent_color};
}
.features-item:hover .features-item-icon i {
	color: {$accent_color};
}
.footer-section-bottom {
	background-color: {$accent_color};
}
.reveal .controls .navigate-up.enabled {
	border-bottom-color: {$accent_color} !important;
}
.reveal .controls .navigate-down.enabled {
	border-top-color: {$accent_color} !important;	
}
.reveal .progress span {
    background-color: {$accent_color} !important;
}
.footer-section-bottom .contact-icon {
	box-shadow: 0 0 0 7px {$accent_color}, 0 0 0 11px #fff, 0 0 0 11px {$accent_color};
}
.contacts-item p {
	color: {$accent_color};
}

.contact-form-bottom::before {
	border-color: {$accent_color} transparent transparent transparent;
}
.plans {
	background-color: {$sections_bg_color};
}
section.overview::before {
	border-color: transparent transparent {$sections_bg_color};
}
.contacts {
	background-color: {$main_background};
}
.bottom-skew::after {
	background-color: {$sections_bg_color};
}
.contacts-bottom::after {
	background-color: {$main_background};
}
.questions-bottom::after {
	background-color: {$accent_color};
}
.frame-closed {
	transition: background-color 1s;
}
.frame-closed:hover {
	background-color: {$accent_color} !important;
}
.post-navigation a .post-title, 
.post-navigation a .post-title {
	transition: all .5s;
}
.post-navigation a:hover .post-title, 
.post-navigation a:focus .post-title {
	color: {$accent_color};
}
.archive-entry:hover .entry-title,
.archive-entry:hover .entry-title a {
	color: {$accent_color};
}
.entry-title a:hover:after {
	border-bottom: 1px solid {$accent_color};
}


@media only screen and (max-width : 480px) {
	.archive-entry {
		border-bottom: 3px solid {$accent_color};
	}
}


/* blog */
/*
.site-main > article {
	box-shadow: 0 0 0 10px {$accent_color}, 0 0 0 20px #EFEFEF;
	transition: all .6s;
	padding: 4%;
}

.site-main > article:hover {
	box-shadow: 0 0 0 10px #EFEFEF, 0 0 0 20px {$accent_color};
}
*/
.entry-date {
	color: {$accent_color};
}
.entry-title a:hover, 
.entry-title a:focus {
	color: {$accent_color};
}

.post-thumbnail::after {
	background-color: {$accent_color};
}
.comment-reply-link,
.comment-reply-link:hover, 
.comment-reply-link:focus {
	color: {$accent_color};
}
.pagination .prev:hover, 
.pagination .prev:focus, 
.pagination .next:hover, 
.pagination .next:focus {
	background-color: {$accent_color};
}

";

    wp_add_inline_style( 'reveal_skin_style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'reveal_styles_skins' );