<?php

/* Footer  Settings
----------------------------------------------------------------------*/
$wp_customize->add_section( 'helphealth_medical_footer_settings',
	array(
		'title'       => esc_html__( 'Footer Area', 'helphealth-medical' ),
		'panel'       => 'helphealth_medical_options',
		'priority'    => 10,
	)
);

// Footer Background Color
$wp_customize->add_setting( 'helphealth_medical_footer_bg',
	array(
		'sanitize_callback'    => 'sanitize_hex_color',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		'default'              => '#00273D',
	)
);
$wp_customize->add_control( new WP_Customize_Color_Control( 
	$wp_customize, 'helphealth_medical_footer_bg',
		array(
			'label'       => esc_html__( 'Background', 'helphealth-medical' ),
			'section'     => 'helphealth_medical_footer_settings',
			'description' => '',
		)
	) 
);

// Display Solical Icons
$wp_customize->add_setting( 'helphealth_medical_social_display',
	array(
		'sanitize_callback' => 'helphealth_medical_sanitize_checkbox',
		'default'           => false,
	)
);
$wp_customize->add_control( 'helphealth_medical_social_display',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__( 'Show social icons', 'helphealth-medical' ),
		'section'     => 'helphealth_medical_footer_settings',
		'description' => esc_html__( 'Check/uncheck to show/hide social icons', 'helphealth-medical' ),
	)
);

// Footer Text Color
$wp_customize->add_setting( 'helphealth_medical_footer_social_color', 
	array(
		'sanitize_callback'    => 'sanitize_hex_color',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		'default'              => '#ffffff',
	) 
);
$wp_customize->add_control( new WP_Customize_Color_Control( 
	$wp_customize, 'helphealth_medical_footer_social_color',
		array(
			'label'       => esc_html__( 'Social Icons Color', 'helphealth-medical' ),
			'section'     => 'helphealth_medical_footer_settings',
			'description' => '',
			'active_callback' => function(){
				 $social_status = get_theme_mod('helphealth_medical_social_display');
				 if($social_status){
					return true;
				 } else {
					 return false;
				 }
			},
		)
	) 
);

// Link Color
$wp_customize->add_setting( 'helphealth_medical_footer_link_color',
	array(
		'sanitize_callback'    => 'sanitize_hex_color',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		'default'              => '#ffffff',
	) 
);
$wp_customize->add_control( new WP_Customize_Color_Control(
	$wp_customize, 'helphealth_medical_footer_link_color',
		array(
			'label'       => esc_html__( 'Link Color', 'helphealth-medical' ),
			'section'     => 'helphealth_medical_footer_settings',
			'description' => '',
		)
	) 
);

// Link Hover Color
$wp_customize->add_setting( 'helphealth_medical_footer_link_hover_color', 
	array(
		'sanitize_callback'    => 'sanitize_hex_color',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		'default'              => '#DCAE1D',
	) 
);
$wp_customize->add_control( new WP_Customize_Color_Control( 
	$wp_customize, 'helphealth_medical_footer_link_hover_color',
		array(
			'label'       => esc_html__( 'Link Hover Color', 'helphealth-medical' ),
			'section'     => 'helphealth_medical_footer_settings',
			'description' => '',
		)
	) 
);

/* Footer Copyright Settings
----------------------------------------------------------------------*/

$wp_customize->add_section( 'helphealth_medical_footer_copyright',
	array(
		'title'       => esc_html__( 'Copyright Info', 'helphealth-medical' ),
		'description' => '',
		'panel'       => 'helphealth_medical_options',
		'priority'    => 11,
	)
);

// Copyright Text
$wp_customize->add_setting( 'helphealth_medical_copyright_text',
	 array(
	    'default'			  => '',
		'transport'			  => 'postMessage',
		'sanitize_callback' => 'sanitize_textarea_field'
	)
);
$wp_customize->add_control('helphealth_medical_copyright_text',
	array(
		'label'    => esc_html__('Copyright Text', 'helphealth-medical'),
		'section'  => 'helphealth_medical_footer_copyright',
		'type'     => 'textarea'
	)
);


// Footer Text Color
$wp_customize->add_setting( 'helphealth_medical_copyright_text_color', 
	array(
		'sanitize_callback'    => 'sanitize_hex_color',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		'default'              => '#FFFFFF',
	) 
);
$wp_customize->add_control( new WP_Customize_Color_Control( 
	$wp_customize, 'helphealth_medical_copyright_text_color',
		array(
			'label'       => esc_html__( 'Text Color', 'helphealth-medical' ),
			'section'     => 'helphealth_medical_footer_copyright',
			'description' => '',
		)
	) 
);


