<?php
define('THEMENAME', preg_replace("/\W/", "", strtolower(theme_data_variable('Name')) ) );

/**
 * Load Theme Variable Data
 * @param string $var
 * @return string 
 */
function theme_data_variable($var) {
	if (!is_file(STYLESHEETPATH . '/style.css')) {
		return '';
	}

	$theme_data = wp_get_theme();
	return $theme_data->{$var};
}


/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	// This gets the theme name from the stylesheet (lowercase and without spaces)
	
	$optionsframework_settings = get_option('revealpresentation');
	$optionsframework_settings['id'] = THEMENAME;
	update_option('revealpresentation', $optionsframework_settings);
}


/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'revealpresentation'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_'revealpresentation'
 */

/**
 * Loads the child theme textdomain.
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => esc_html__( 'One', 'revealpresentation' ),
		'two' => esc_html__( 'Two', 'revealpresentation' ),
		'three' => esc_html__( 'Three', 'revealpresentation' ),
		'four' => esc_html__( 'Four', 'revealpresentation' ),
		'five' => esc_html__( 'Five', 'revealpresentation' )
	);
	
	// Multicheck Array
	$multicheck_array = array(
		'one' => esc_html__( 'French Toast', 'revealpresentation' ),
		'two' => esc_html__( 'Pancake', 'revealpresentation' ),
		'three' => esc_html__( 'Omelette', 'revealpresentation' ),
		'four' => esc_html__( 'Crepe', 'revealpresentation' ),
		'five' => esc_html__( 'Waffle', 'revealpresentation' )
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/libs/theme-options-framework/images/';

	$options = array();

	$prefix = 'reveal_';


/**************************** NAVIGATION SETTINGS ********************************/

	$options[] = array(
		'name' => esc_html__( 'Navigation Settings', 'revealpresentation' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => esc_html__( 'Always display top navigation', 'revealpresentation' ),
		// 'desc' => esc_html__( 'If not checked, navigation displays on click', 'revealpresentation' ),
		'id' => $prefix . 'display_navigation',
		'std' => '1',
		'type' => 'checkbox'
	);

	// LOGO
	$options[] = array(
		'name' => esc_html__( 'Your logo image', 'revealpresentation' ),
		'desc' => esc_html__( 'Paste your logo image (displays in top left corner of main navigation)', 'revealpresentation' ),
		'id' => $prefix . 'logo_image',
		'type' => 'upload'
	);
	$options[] = array(
		'name' => esc_html__( 'Text for logo', 'revealpresentation' ),
		'desc' => esc_html__( 'If no picture specified, this text will be displayed', 'revealpresentation' ),
		'id' => $prefix . 'logo_text',
		'placeholder' => 'Your logo text',
		'std' => 'Logo',
		'type' => 'text'
	);


/********************************* Slides Settings *************************************/
	$options[] = array(
		'name' => esc_html__( 'Slides Settings', 'revealpresentation' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => esc_html__( 'Enable Presentation Slides on Front Page', 'revealpresentation' ),
		'desc' => esc_html__( 'If enabled, Presentation Slides show on Front Page', 'revealpresentation' ),
		'id' => $prefix . 'enable_slides_on_front_page',
		'std' => '1',
		'type' => 'checkbox'
	);

	if ( $options_categories ) {
		$options[] = array(
			'name' => __( 'Select a Category to display Presentation Slides on Front Page', 'revealpresentation' ),
			'desc' => __( 'Choose category to display on Home Page instead of default Front Page', 'revealpresentation' ),
			'id' => $prefix . 'category_slides_on_front_page',
			'type' => 'select',
			'options' => $options_categories
		);
	}

	$options[] = array(
		'name' => esc_html__( 'Enable Autoslide', 'revealpresentation' ),
		'desc' => esc_html__( 'If enabled, pages changing automatically every 15 seconds, but you can change time when you edit every slide. Go to Slides->Edit Slide', 'revealpresentation' ),
		'id' => $prefix . 'enable_autoslide',
		'std' => '0',
		'type' => 'checkbox'
	);
	$options[] = array(
		'name' => esc_html__( 'Autoslide Time (in seconds)', 'revealpresentation' ),
		'desc' => esc_html__( 'Set time of changing slides (You can redeclare it on every post Go to Slides->Edit)', 'revealpresentation' ),
		'id' => $prefix . 'autoslide_time',
		'std' => '15',
		'type' => 'text'
	);

	$options[] = array(
		'name' => esc_html__( 'Enable Loop Presentation', 'revealpresentation' ),
		'desc' => esc_html__( 'If enabled, after last slide goes first (click left arrow or right arrow or swipe left - right on mobile devices)', 'revealpresentation' ),
		'id' => $prefix . 'loop_presentation',
		'std' => '0',
		'type' => 'checkbox'
	);
	

/********************************** Preloader ****************************************/
	$options[] = array(
		'name' => esc_html__( 'Preloader Settings', 'revealpresentation' ),
		'type' => 'heading'
	);

	$wp_editor_settings = array(
		// 'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress,wplink' )
	);

	$options[] = array(
		'name' => esc_html__( 'Preloader Text', 'revealpresentation' ),
		'id' => $prefix . 'preloader_text',
		'type' => 'editor',
		'std' => esc_html__( 'Do you want to be strong and healthy', 'revealpresentation' ),
		'settings' => $wp_editor_settings
	);
	
/********************************** BLOG-SHOP ****************************************/
	$options[] = array(
		'name' => esc_html__( 'Blog and Shop Styles', 'revealpresentation' ),
		'type' => 'heading'
	);
	$options[] = array(
		'name' => esc_html__( 'Blog background image', 'revealpresentation' ),
		'desc' => esc_html__( 'Paste your blog background image ', 'revealpresentation' ),
		'id' => $prefix . 'blog_bg_image',
		'type' => 'upload'
	);	
	$options[] = array(
		'name' => esc_html__( 'Shop background image', 'revealpresentation' ),
		'desc' => esc_html__( 'Paste your shop background image ', 'revealpresentation' ),
		'id' => $prefix . 'shop_bg_image',
		'type' => 'upload'
	);	

/********************** Social Media Settings ******************************/
	$options[] = array(
		'name' => esc_html__( 'Social Media Settings', 'revealpresentation' ),
		'type' => 'heading'
	);
	$options[] = array(
		'name' => esc_html__( 'YouTube Channel Link', 'revealpresentation' ),
		'desc' => esc_html__( 'Paste you youtube channel link like https://www.youtube.com/channel/YOUR_UNIQUE_CODE', 'revealpresentation' ),
		'id' => $prefix . 'youtube_link',
		'std' => 'http://youtube.com',
		'type' => 'text'
	);
	$options[] = array(
		'name' => esc_html__( 'Facebook Link', 'revealpresentation' ),
		'desc' => esc_html__( 'Facebook Link to your social page https://www.facebook.com/YOUR_PAGE_NAME', 'revealpresentation' ),
		'id' => $prefix . 'facebook_link',
		'std' => 'http://facebook.com',
		'type' => 'text'
	);
	$options[] = array(
		'name' => esc_html__( 'Twitter Link', 'revealpresentation' ),
		'desc' => esc_html__( 'Twitter Link to your social page http://twitter.com/YOUR_PAGE_NAME', 'revealpresentation' ),
		'id' => $prefix . 'twitter_link',
		'std' => 'http://twitter.com',
		'type' => 'text'
	);
	$options[] = array(
		'name' => esc_html__( 'Instagram Link', 'revealpresentation' ),
		'desc' => esc_html__( 'Link to your Instagram page http://instagram.com/YOUR_PAGE_NAME', 'revealpresentation' ),
		'id' => $prefix . 'instagram_link',
		'std' => 'http://instagram.com',
		'type' => 'text'
	);

	/*********************************** App Store and Google Play *******************************************/
	$options[] = array(
		'name' => esc_html__( 'App Store and Google Play Settings', 'revealpresentation' ),
		'type' => 'heading'
	);
	$options[] = array(
		'name' => esc_html__( 'App Store badge url', 'revealpresentation' ),
		'desc' => esc_html__( 'You can generate it on http://linkmaker.itunes.apple.com/, or additional information on https://developer.apple.com/app-store/marketing/guidelines/ EXAMPLE for Angry Birds Game is "https://itunes.apple.com/us/app/angry-birds-2/id880047117?mt=8"', 'revealpresentation' ),
		'id' => $prefix . 'app_store_url',
		'placeholder' => '',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => esc_html__( 'Google Play badge url', 'revealpresentation' ),
		'desc' => esc_html__( 'Full information on https://play.google.com/intl/en_gb/badges/ EXAMPLE for Tiny Flashlight App is "https://play.google.com/store/apps/details?id=com.devuni.flashlight&pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1"', 'revealpresentation' ),
		'id' => $prefix . 'google_play_url',
		'placeholder' => '',
		'type' => 'text'
	);


	return $options;
}




add_action('optionsframework_after','optionscheck_display_sidebar', 100);

function optionscheck_display_sidebar() { ?>
    <div class="metabox-holder">
        <div class="postbox">
            <h3>Info Screen</h3>
                <div class="inside">
                    <p>Here is some relevant information about the options panel.</p>
                </div>
        </div>
    </div>
<?php }
