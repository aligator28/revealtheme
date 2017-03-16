<?php 

add_action('switch_theme', 'reveal_deativate_plugins');

function reveal_deativate_plugins() {
    deactivate_plugins(WP_PLUGIN_DIR . '/revealthemecustomposttypes/revealthemecustomposttypes.php');
}