<?php
/*************************** OPTIONS FRAMEWORK *******************************/
$theme = wp_get_theme();

define('THEME_FULL_NAME', $theme->get('Name'));
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/libs/theme-options-framework/inc/' );
require_once dirname( __FILE__ ) . '/libs/theme-options-framework/inc/options-framework.php';
// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );
/*************************** OPTIONS FRAMEWORK *******************************/


/**
 * Please note that missing files will produce a fatal error.
 */
$reveal_includes = [
    'libs/theme-setup.php',
    'libs/_assets.php',    // Scripts and stylesheets

    'libs/class-tgm-plugin-activation.php',
    'libs/activation-required-plugins.php',
    'libs/deactivate-plugins.php',

    'libs/slides-functions.php',

    'libs/admin-dashboard.php',
    'libs/custom-meta-boxes-features.php',
    'libs/custom-meta-boxes-overviews.php',
    'libs/custom-meta-boxes-questions.php',
    'libs/custom-meta-boxes-slides.php',
    'libs/custom-meta-boxes-woo-products.php',
    'libs/custom-meta-boxes-pages.php',  
    'libs/posts-order-asc.php',
    'libs/posts-functions.php',
    'libs/customizer/customizer.php',
    'libs/theme-support.php',
    'libs/switch-slides-on.php',
    'libs/front-page.php',
    'libs/search-results-custom-post-types.php',
    'libs/shop.php',


    'inc/template-tags.php',
    'inc/icon-functions.php',
    'inc/breadcrumbs.php'
];



foreach ($reveal_includes as $file) {

  if (!$filepath = locate_template($file)) {  
    trigger_error(sprintf(__('Error locating %s for inclusion', 'revealpresentation'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
//below include required for activation-required-plugins.php
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

/**
 * Debug function
 * @param mixed $var
 * @param string $label
 * @param boolean $die 
 */
function varDump($var, $label = '', $die = true) {
    echo $label . ': <pre>';
    print_r($var);
    echo '</pre>';
    if ($die) {
        die();
    }
}








function reveal_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Sidebar', 'revealpresentation' ),
    'id'            => 'sidebar-1',
    'description'   => __( 'Add widgets here to appear in your sidebar.', 'revealpresentation' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}

// uncomment if widgets is needed
add_action( 'widgets_init', 'reveal_widgets_init' );


/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Sixteen 1.0
 */
function reveal_javascript_detection() {
  echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'reveal_javascript_detection', 0 );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function reveal_body_classes( $classes ) {
  // Adds a class of custom-background-image to sites with a custom background image.
  if ( get_background_image() ) {
    $classes[] = 'custom-background-image';
  }

  // Adds a class of group-blog to sites with more than 1 published author.
  if ( is_multi_author() ) {
    $classes[] = 'group-blog';
  }

  // Adds a class of no-sidebar to sites without active sidebar.
  if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    $classes[] = 'no-sidebar';
  }

  // Adds a class of hfeed to non-singular pages.
  if ( ! is_singular() ) {
    $classes[] = 'hfeed';
  }

  return $classes;
}
add_filter( 'body_class', 'reveal_body_classes' );


function reveal_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'reveal_content_width', 840 );
}
add_action( 'after_setup_theme', 'reveal_content_width', 0 );




global $slides_on_front;
$slides_on_front = false;

  if ( !empty( of_get_option('reveal_enable_slides_on_front_page') ) 
    && of_get_option('reveal_enable_slides_on_front_page') == 1 ) {
    $slides_on_front = true;
  }





  