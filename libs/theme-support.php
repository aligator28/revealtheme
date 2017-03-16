<?php

add_action( 'after_setup_theme', 'reveal_theme_setup' );

if ( ! function_exists( 'reveal_theme_setup' ) ) :

  function reveal_theme_setup() {

    add_theme_support( 'woocommerce' );

    $args = array(
      'default-color' => 'ffffff',
    );
    add_theme_support( 'custom-background', $args );


    load_theme_textdomain( 'revealpresentation' );

    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1200, 9999 );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
      'primary' => __( 'Primary Menu', 'revealpresentation' )
    ) );

    /*
     * Enable support for Post Formats.
     *
     * See: https://codex.wordpress.org/Post_Formats
     */
    add_theme_support( 'post-formats', array(
      'aside',
      'image',
      'video',
      // 'quote',
      // 'link',
      'gallery',
      // 'status',
      // 'audio',
      // 'chat',
    ) );

    add_theme_support( 'customize-selective-refresh-widgets' );
  }

endif;
?>