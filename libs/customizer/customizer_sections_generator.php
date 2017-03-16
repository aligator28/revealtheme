<?php 


function reveal_generate_color_controls($textcolors) {

global $wp_customize;

	foreach ( $textcolors as $textcolor ) {

		// settings
		$wp_customize->add_setting(
			$textcolor[ 'slug' ], array (
				'default' => $textcolor[ 'default' ],
				'type' => 'theme_mod'
			),
			array('sanitize_callback' => '__return_false')
		);
		// controls
		$wp_customize->add_control( new Customize_Alpha_Color_Control(
			$wp_customize,
			$textcolor[ 'slug' ],
			array (
				'label' => $textcolor[ 'label' ],
				'section' => 'pluta_colors',
				'description' => !empty($textcolor['description']) ? $textcolor['description'] : '',
				'settings' => $textcolor[ 'slug' ],
                'show_opacity'  => true, // Optional.
                'palette'   => array(
                    'rgb(150, 50, 220)', // RGB, RGBa, and hex values supported
                    'rgba(50,50,50,0.8)',
                    'rgba( 255, 255, 255, 0.2 )', // Different spacing = no problem
                    '#00CC99' // Mix of color types = no problem
                )
			)
		));
	}
}

function reveal_generate_sections($sections) {

global $wp_customize;

	foreach ($sections as $section) {

		$wp_customize->add_section( $section['id'] , array(
			'title' => $section['title'],
			'panel' => !empty($section['panel']) ? $section['panel'] : ''  
		) );

		if (!empty($section['settings'])) {
			
			foreach ($section['settings'] as $key => $setting) {

				// $type = 'theme_mod';
				// if ($setting['type'] === 'color') {
				// 	$type = 'option';
				// }

				$wp_customize->add_setting( $setting['setting_id'], array (
					'default' => !empty($setting['default']) ? $setting['default']: '',
					'type' => empty($setting['setting_type']) ? 'theme_mod' : $setting['setting_type'],
				),
				array('sanitize_callback' => '__return_false')
				);


				switch ( $setting['type'] ) {
					case 'textarea':
						// textarea
						$wp_customize->add_control( new pluta_Customize_Textarea_Control(
							$wp_customize,
							$setting['setting_id'],
							array( 
								'label' => $setting['control_label'],
								'description' => !empty($setting['description']) ? $setting['description'] : '',
								'section' => $section['id'],
								'settings' => $setting['setting_id']
						)));
					break;
					case 'image_upload':
						// image upload	
						$wp_customize->add_control( 
							new WP_Customize_Image_Control( 
								$wp_customize, 
								$setting['setting_id'], 
								array(
									'section'    => $section['id'],
									'settings'   => $setting['setting_id'],
									'label'      => $setting['control_label'],
									'description' => !empty($setting['description']) ? $setting['description'] : '',
								) 
							) 
						);
					break;

					case 'color':
							$wp_customize->add_control( new WP_Customize_Color_Control(
							$wp_customize,
							$setting['setting_id'],
							array (
								'label' => $setting['control_label'],
								'section' => $section['id'],
								'description' => !emtpy($setting['description']) ? $setting['description'] : '',
								'settings' => $setting['setting_id']
							)
						));
							break;
					
					case 'alpha-color-picker':
							$wp_customize->add_control( new Customize_Alpha_Color_Control(
							$wp_customize,
							$setting['setting_id'],
							array (
								'label' => $setting['control_label'],
								'section' => $section['id'],
								'description' => !empty($setting['description']) ? $setting['description'] : '',
								'settings' => $setting['setting_id'],
				                'show_opacity'  => true, // Optional.
				                'palette'   => array(
				                    'rgb(150, 50, 220)', // RGB, RGBa, and hex values supported
				                    'rgba(50,50,50,0.8)',
				                    'rgba( 255, 255, 255, 0.2 )', // Different spacing = no problem
				                    '#00CC99' // Mix of color types = no problem
				                )
							)
						));
							break;
					default:
						$choices = '';
						if ($setting['type'] == 'radio') {
							$choices = $setting['choices'];
						}

						$wp_customize->add_control( 
							new WP_Customize_Control( 
								$wp_customize, 
								$setting['setting_id'], 
								array(
									'label' => $setting['control_label'],
									'section' => $section['id'],
									'settings' => $setting['setting_id'],
									'type' => $setting['type'],
									'choices' => $choices,
								) 
							) 
						);
						break;
				}
			} //foreach
		}
	}//first foreach


function __return_false_value($value) {
    return $value;
}

add_filter('__return_false', '__return_false_value');



}