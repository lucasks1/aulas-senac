<?php

/**
 * Blog Post Settings
 * @since 2.1.0
 * ----------------------------------------------------------------------
 */
$wp_customize->add_section( 'helphealth_medical_social_settings',
	array(
		'priority'    => 10,
		'title'       => esc_html__( 'Social Settings', 'helphealth-medical' ),
		'description' => esc_html__( 'Set social profile links', 'helphealth-medical' ),
		'panel'       => 'helphealth_medical_options',
	)
);

//Facebook URL
$wp_customize->add_setting( 'helphealth_medical_facebook_link', 
	array( 
		'sanitize_callback' => 'esc_url_raw',
		'default'           => '',
	) 
);
$wp_customize->add_control( 'helphealth_medical_facebook_link', 
	array( 
		'label'       => esc_html__( 'Facebook', 'helphealth-medical' ),
		'description' =>  esc_html__( 'e.g: http://example.com', 'helphealth-medical' ), 
		'section'     => 'helphealth_medical_social_settings', 
		'type'        => 'url'
	) 
);

//Twitter URL
$wp_customize->add_setting( 'helphealth_medical_twitter_link', 
	array( 
		'sanitize_callback' => 'esc_url_raw',
		'default'           => '',
	) 
);
$wp_customize->add_control( 'helphealth_medical_twitter_link', 
	array( 
		'label'       => esc_html__( 'Twitter', 'helphealth-medical' ),
		'description' =>  esc_html__( 'e.g: http://example.com', 'helphealth-medical' ), 
		'section'     => 'helphealth_medical_social_settings', 
		'type'        => 'url'
	) 
);

//Linkedin URL
$wp_customize->add_setting( 'helphealth_medical_linkedin_link', 
	array( 
		'sanitize_callback' => 'esc_url_raw',
		'default'           => '',
	) 
);
$wp_customize->add_control( 'helphealth_medical_linkedin_link', 
	array( 
		'label'       => esc_html__( 'Linkedin', 'helphealth-medical' ),
		'description' =>  esc_html__( 'e.g: http://example.com', 'helphealth-medical' ), 
		'section'     => 'helphealth_medical_social_settings', 
		'type'        => 'url'
	) 
);



