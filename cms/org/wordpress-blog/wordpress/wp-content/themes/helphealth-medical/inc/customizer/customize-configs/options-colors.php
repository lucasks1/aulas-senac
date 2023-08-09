<?php
/* Colors
----------------------------------------------------------------------*/
$wp_customize->add_section( 'helphealth_medical_colors_settings',
	array(
		'priority'    => 2,
		'title'       => esc_html__( 'Site Colors', 'helphealth-medical' ),
		'description' => '',
		'panel'       => 'helphealth_medical_options',
	)
);

// Primary Color
$wp_customize->add_setting( 'helphealth_medical_primary_color', array(
		'sanitize_callback'    => 'sanitize_hex_color_no_hash',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		'default'              => '#00AA9C'
	)
);
$wp_customize->add_control( new WP_Customize_Color_Control( 
	$wp_customize, 'helphealth_medical_primary_color',
		array(
			'label'       => esc_html__( 'Primary Color', 'helphealth-medical' ),
			'section'     => 'helphealth_medical_colors_settings',
			'description' => '',
			'priority'    => 1
		)
	) 
);

// Secondary Color
$wp_customize->add_setting( 'helphealth_medical_secondary_color', array(
		'sanitize_callback'    => 'sanitize_hex_color_no_hash',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		'default'              => '#DCAE1D'
	)
);
$wp_customize->add_control( new WP_Customize_Color_Control( 
	$wp_customize, 'helphealth_medical_secondary_color',
		array(
			'label'       => esc_html__( 'Secondary Color', 'helphealth-medical' ),
			'section'     => 'helphealth_medical_colors_settings',
			'description' => '',
			'priority'    => 2
		)
	) 
);

// Heading Color
$wp_customize->add_setting( 'helphealth_medical_heading_color', 
	array(
		'sanitize_callback'	=> 'sanitize_hex_color',
		'default' => '#005584',
		'transport'			=> 'postMessage'
	)
);
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'helphealth_medical_heading_color', 
		array(
			'label' => esc_html__('Headings Color', 'helphealth-medical'),
			'section' => 'helphealth_medical_colors_settings',
			'priority'    => 3
		)
	)
);

// Body Text Color
$wp_customize->add_setting( 'helphealth_medical_body_text_color', 
	array(
		'sanitize_callback'	=> 'sanitize_hex_color',
		'default'           => '#6D7379',
		'transport'			=> 'postMessage'
	)
);
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'helphealth_medical_body_text_color', 
		array(
			'label'   => esc_html__('Body Text Color', 'helphealth-medical'),
			'section' => 'helphealth_medical_colors_settings',
			'priority'    => 4
		)
	)
);

// Button BG Color
$wp_customize->add_setting( 'helphealth_medical_btn_bg_color', array(
		'sanitize_callback'    => 'sanitize_hex_color_no_hash',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		'default'              => '#ffffff'
	)
);
$wp_customize->add_control( new WP_Customize_Color_Control( 
	$wp_customize, 'helphealth_medical_btn_bg_color',
		array(
			'label'       => esc_html__( 'Button BG Color', 'helphealth-medical' ),
			'section'     => 'helphealth_medical_colors_settings',
			'description' => '',
			'priority'    => 5
		)
	) 
);

// Button BG Hover Color
$wp_customize->add_setting( 'helphealth_medical_btn_bg_hover_color', array(
		'sanitize_callback'    => 'sanitize_hex_color_no_hash',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		'default'              => '#00AA9C'
	)
);
$wp_customize->add_control( new WP_Customize_Color_Control( 
	$wp_customize, 'helphealth_medical_btn_bg_hover_color',
		array(
			'label'       => esc_html__( 'Button Hover BG Color', 'helphealth-medical' ),
			'section'     => 'helphealth_medical_colors_settings',
			'description' => '',
			'priority'    => 6
		)
	) 
);

$wp_customize->add_setting( 'helphealth_medical_btn_text_color', 
	array(
		'sanitize_callback'	=> 'sanitize_hex_color',
		'default'           => '',
		'transport'			=> 'postMessage'
	)
);
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'helphealth_medical_btn_text_color', 
		array(
			'label'   => esc_html__('Button Text Color', 'helphealth-medical'),
			'section' => 'helphealth_medical_colors_settings',
			'priority'    => 7
		)
	)
);

