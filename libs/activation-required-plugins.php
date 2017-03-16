<?php

add_action( 'tgmpa_register', 'reveal_register_required_plugins' );
// add_action('admin_notices', 'reveal_register_required_plugins');

function reveal_register_required_plugins() {

// global $wp_version;
// exit($wp_version);

    $plugins = array(
        array(
            'name'      => 'Reveal Theme Custom Post Types',
            'slug'      => 'revealthemecustomposttypes',
            'required'  => true,
            'force_activation' => true,
            'force_deactivation' => true,
            'source' => 'https://github.com/aligator28/revealtheme/raw/master/revealthemecustomposttypes.zip',
            'path'=>'revealthemecustomposttypes/revealthemecustomposttypes.php',
        ),
        array(
            'name'      => 'WP Google Maps',
            'slug'      => 'wpgooglemaps',
            'required'  => true,
            'force_activation' => true,
            'force_deactivation' => true,
            'source' => 'https://downloads.wordpress.org/plugin/wp-google-maps.zip',
            'path'=>'wpgooglemaps/wpGoogleMaps.php',
        ),
        array(
            'name'      => 'WooCommerce',
            'slug'      => 'woocommerce',
            'required'  => true,
            'force_activation' => true,
            'source' => 'https://downloads.wordpress.org/plugin/woocommerce.2.6.14.zip',
            'path'=>'woocommerce/woocommerce.php',
        ),
        array(
            'name'      => 'TinyMCE Advanced',
            'slug'      => 'tinyMCEadvanced',
            'required'  => false,
            'force_activation' => true,
            'source' => 'https://downloads.wordpress.org/plugin/tinymce-advanced.4.4.3.zip',
            'path'=>'tinyMCEadvanced/tinymce-advanced.php',
        ),
        array(
            'name'      => 'Page Builder',
            'slug'      => 'pagebuilder',
            'required'  => false,
            'force_activation' => false,
            'source' => 'https://downloads.wordpress.org/plugin/siteorigin-panels.2.4.24.zip',
            'path'=>'pagebuilder/siteorigin-panels.php',
        ),
        array(
            'name'      => 'Meta Box',
            'slug'      => 'metabox',
            'required'  => true,
            'force_activation' => true,
            'source' => 'https://downloads.wordpress.org/plugin/meta-box.4.10.1.zip',
            'path'=>'metabox/meta-box.php',
        ),
        array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contactForm7',
            'required'  => true,
            'force_activation' => true,
            'source' => 'https://downloads.wordpress.org/plugin/contact-form-7.4.6.1.zip',
            'path' => 'contactform7/wp-contact-form-7.php'
        ),
    );

    $plugins_to_istall = array();

    foreach($plugins as $key => $aPlugin) {
        // Check if plugin exists
        if( !is_plugin_active( $aPlugin['path'] ) ) {
            $plugins_to_istall[$key]['name'] = $aPlugin['name'];
            $plugins_to_istall[$key]['slug'] = $aPlugin['slug'];
            $plugins_to_istall[$key]['required'] = $aPlugin['required'];
            if ( !empty($aPlugin['force_activation']) ) {
                $plugins_to_istall[$key]['force_activation'] = $aPlugin['force_activation'];
            }
            if (!empty($aPlugin['source'])) {
                $plugins_to_istall[$key]['source'] = $aPlugin['source'];
            }
        }
    }


    $config = array(
        'id'           => 'revealpresentation',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.

    );

    tgmpa( $plugins_to_istall, $config );











//     $plugin_messages = array();
//     $aRequired_plugins = array();

//     // include_once( ABSPATH . 'wp-admin/includes/plugin.php' );//removed to functions.php

//     $aRequired_plugins = array(
//         array(
//                 'name'=>'Contact Form 7', 
//                 'download'=>'https://wordpress.org/plugins/contact-form-7/', 
//                 'path'=>'contact-form-7/wp-contact-form-7.php'
//             ),
//     	array(
// 	    		'name'=>'Meta Box', 
// 	    		'download'=>'https://wordpress.org/plugins/meta-box/', 
// 	    		'path'=>'meta-box/meta-box.php'
//     		),
//         array(
//                 'name'=>'Options Framework', 
//                 'download'=>'https://wordpress.org/plugins/options-framework/', 
//                 'path'=>'options-framework/options-framework.php'
//             ),    );

    
//     foreach($aRequired_plugins as $aPlugin){
//         // Check if plugin exists
//         if(!is_plugin_active( $aPlugin['path'] ))
//         {
//             $plugin_messages[] = '<div id="message" class="notice notice-error is-dismissible"><p style="background-color: #dc3232; padding: 5px 20px; width: 50%; color: #f9f9f9">
//             This theme requires you to install the ' . $aPlugin['name'] . ' plugin.</p> 
//             Go to Plugins->Add New->Search plugins and type ' . $aPlugin['name'] . ', or download it from <strong><a href=' . $aPlugin['download'] . '>here</a></strong><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>';
//         }
//     }

//     if (count($plugin_messages) > 0)
//     {
//         echo '
// ';

//             foreach($plugin_messages as $message)
//             {
//                 echo '<h2>
// '.$message.'

// </h2>';
//             }

//         echo '
// ';
//     }

}