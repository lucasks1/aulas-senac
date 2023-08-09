<?php
/**
 * Contact Page Settings
 * ----------------------------------------------------------------------
 */
	$wp_customize->add_section( 'contact_details_settings',
		array(
			'priority'    => 1,
			'title'       => esc_html__( 'Contact Details', 'helphealth-medical' ),
			'description' => '',
			'panel'       => 'contact_page_template',
		)
	);

	 /** Title */
    $wp_customize->add_setting(
        'contact_title', 
        array(
            'default'           => '', 
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        ) 
    );
    $wp_customize->add_control(
        'contact_title',
        array(
            'section'         => 'contact_details_settings',
            'label'           => __( 'Section Title', 'helphealth-medical' ),
            'type'            => 'text',
        )   
    );

	/** Subtitle */
    $wp_customize->add_setting(
        'contact_subtitle', 
        array(
            'default'           => '', 
            'sanitize_callback' => 'sanitize_text_field',
            //'transport'			=> 'postMessage',
        ) 
    );
    $wp_customize->add_control(
        'contact_subtitle',
        array(
            'section'         => 'contact_details_settings',
            'label'           => __( 'Subtitle', 'helphealth-medical' ),
            'type'            => 'text',
        )   
    );
	
	// Location Title
	$wp_customize->add_setting(
		'location_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	$wp_customize->add_control(
		'location_title',
		array(
			'section'           => 'contact_details_settings',
			'label'             => __( 'Location Title', 'helphealth-medical' ),
			'type'              => 'text',
		)
	);
	
	// Location address
	$wp_customize->add_setting(
		'location_address',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'location_address',
		array(
			'section'           => 'contact_details_settings',
			'label'             => __( 'Location Address', 'helphealth-medical' ),
			'type'              => 'text',
		)
	);

	// Mail Title
	$wp_customize->add_setting(
		'mail_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	$wp_customize->add_control(
		'mail_title',
		array(
			'section'           => 'contact_details_settings',
			'label'             => __( 'Mail Title', 'helphealth-medical' ),
			'type'              => 'text',
		)
	);
	
	// Mail Address
	$wp_customize->add_setting(
		'mail_address',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'mail_address',
		array(
			'section'           => 'contact_details_settings',
			'label'             => __( 'Email Address', 'helphealth-medical' ),
			'description'		=> __( 'You can add multiple emails by seperating it with comma. For example: xyz@gmail.com, abc@yahoo.com', 'helphealth-medical' ), 
			'type'              => 'text',
		)
	);
	
    // Phone title  
	$wp_customize->add_setting(
		'phone_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			//'transport'			=> 'postMessage'
		)
	);
	$wp_customize->add_control(
		'phone_title',
		array(
			'section'           => 'contact_details_settings',
			'label'             => __( 'Phone Us Title', 'helphealth-medical' ),
			'type'              => 'text',
		)
	);
	
	// Phone Number
	$wp_customize->add_setting(
		'phone_number',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'phone_number',
		array(
			'section'           => 'contact_details_settings',
			'label'             => __( 'Phone Number', 'helphealth-medical' ),
			'description'       => __( 'You can add multiple phone number seperating with comma', 'helphealth-medical' ),
			'type'              => 'text',
		)
	);

	// Form Settings
	$wp_customize->add_section( 'contact_form_settings',
		array(
			'priority'    => 2,
			'title'       => esc_html__( 'Contact Form', 'helphealth-medical' ),
			'description' => '',
			'panel'       => 'contact_page_template',
		)
	);

	$wp_customize->add_setting(
		'contact_form_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	$wp_customize->add_control(
		'contact_form_title',
		array(
			'section'           => 'contact_form_settings',
			'label'             => __( 'Contact Form Title', 'helphealth-medical' ),
			'type'              => 'text',
		)
	);

	$wp_customize->add_setting(
		'contact_form_subtitle',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			//'transport'			=> 'postMessage'
		)
	);
	$wp_customize->add_control(
		'contact_form_subtitle',
		array(
			'section'           => 'contact_form_settings',
			'label'             => __( 'Contact Form Subtitle', 'helphealth-medical' ),
			'type'              => 'text',
		)
	);

	$wp_customize->add_setting(
		'contact_form_shortcode',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control(
		'contact_form_shortcode',
		array(
			'section'           => 'contact_form_settings',
			'label'             => __( 'Contact Form Shortcode', 'helphealth-medical' ),
            'description'       => __( 'Please generate the shortcode from contact form 7 widget', 'helphealth-medical' ),
			'type'              => 'text',
		)
	);

	// Map Settings
	$wp_customize->add_section( 'contact_map_settings',
		array(
			'priority'    => 3,
			'title'       => esc_html__( 'Contact Map', 'helphealth-medical' ),
			'description' => '',
			'panel'       => 'contact_page_template',
		)
	);

    $wp_customize->add_setting(
        'contact_google_map_iframe',
        array(
            'default'           => '',
            'sanitize_callback' => 'helphealth_medical_sanitize_map_iframe',
        )
    );
    
    $wp_customize->add_control(
        'contact_google_map_iframe',
        array(
            'section'         => 'contact_map_settings',
            'label'           => __( 'Embeded Google Map', 'helphealth-medical' ),
            'type'            => 'text',
        )
    );
