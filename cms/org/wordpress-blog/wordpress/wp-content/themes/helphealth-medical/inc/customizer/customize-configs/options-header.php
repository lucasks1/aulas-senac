<?php
/* Header
----------------------------------------------------------------------*/
$wp_customize->add_section( 'helphealth_medical_header_settings',
	array(
		'title'       => esc_html__( 'Header Settings', 'helphealth-medical' ),
		'description' => '',
		'panel'       => 'helphealth_medical_options',
		'priority'    => 4,
	)
);

// Header width.
$wp_customize->add_setting(
	'helphealth_medical_header_width',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 'container',
		//'transport'         => 'postMessage',
	)
);

$wp_customize->add_control(
	'helphealth_medical_header_width',
	array(
		'type'    => 'select',
		'label'   => esc_html__( 'Header Width', 'helphealth-medical' ),
		'section' => 'helphealth_medical_header_settings',
		'choices' => array(
			'container-fluid' => esc_html__( 'Full Width', 'helphealth-medical' ),
			'container'  => esc_html__( 'Contained', 'helphealth-medical' ),
		),
	)
);

// Disable Sticky Header
$wp_customize->add_setting( 'helphealth_medical_sticky_header',
	array(
		'sanitize_callback' => 'helphealth_medical_sanitize_checkbox',
		'default'           => false,
	)
);
$wp_customize->add_control( 'helphealth_medical_sticky_header',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__( 'Make Header Sticky', 'helphealth-medical' ),
		'section'     => 'helphealth_medical_header_settings',
		'description' => esc_html__( 'Check/uncheck to enable/disable sticky header when scroll.', 'helphealth-medical' )
	)
);

// Office Address
$wp_customize->add_setting( 'helphealth_medical_office_address',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__( '', 'helphealth-medical' ),
		'transport'			=> 'postMessage'
	)
);
$wp_customize->add_control( 'helphealth_medical_office_address',
	array(
		'label'       => esc_html__( 'Office Address', 'helphealth-medical' ),
		'description' => esc_html__( 'The address will be visible on header area.', 'helphealth-medical' ),
		'type'     => 'text',
		'section'     => 'helphealth_medical_header_settings',
	)
);

// Display Solical Icons
$wp_customize->add_setting( 'helphealth_medical_header_social_display',
	array(
		'sanitize_callback' => 'helphealth_medical_sanitize_checkbox',
		'default'           => false,
	)
);
$wp_customize->add_control( 'helphealth_medical_header_social_display',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__( 'Show social icons?', 'helphealth-medical' ),
		'section'     => 'helphealth_medical_header_settings',
		'description' => esc_html__( 'First go to Theme Options>Social Settings>Insert social profile links and then Check this box toshow social icons on header area', 'helphealth-medical' ),
	)
);

// Button Text
$wp_customize->add_setting('helphealth_medical_donate_btn_text',
	 array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__( '', 'helphealth-medical' ),
		'transport'         => 'postMessage',
	)
);
$wp_customize->add_control('helphealth_medical_donate_btn_text',
	 array(
		'label'     => esc_html__('Button Text', 'helphealth-medical'),
		'description' => esc_html__( 'Button Will be visible on header area', 'helphealth-medical' ),
		'type'    => 'text',
		'section'   => 'helphealth_medical_header_settings',
	)
);

// Button URL
$wp_customize->add_setting('helphealth_medical_donate_btn_url', 
	array(
		'sanitize_callback' => 'esc_url_raw',
		'default'           => '',
	)
);
$wp_customize->add_control('helphealth_medical_donate_btn_url', 
	array(
		'label'    => esc_html__('Button URL', 'helphealth-medical'),
		'section'  => 'helphealth_medical_header_settings',
		'description' => esc_html__( 'Start with http:// or https://', 'helphealth-medical' ),
		'type'    => 'text'
	)
);

// Button Target
$wp_customize->add_setting( 'helphealth_medical_donate_btn_target',
	array(
		'sanitize_callback' => 'helphealth_medical_sanitize_checkbox',
		'default'           => false,
	)
);
$wp_customize->add_control( 'helphealth_medical_donate_btn_target',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__( 'Open on new tab?', 'helphealth-medical' ),
		'section'     => 'helphealth_medical_header_settings',
	)
);

// Header BG Color
$wp_customize->add_setting( 'helphealth_medical_header_bg_color',
	array(
		'sanitize_callback'    => 'sanitize_hex_color_no_hash',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		'default'              => ''
	) 
);
$wp_customize->add_control( new WP_Customize_Color_Control( 
	$wp_customize, 'helphealth_medical_header_bg_color',
		array(
			'label'                 => esc_html__( 'Background Color', 'helphealth-medical' ),
			'section'               => 'helphealth_medical_header_settings',
			'description'           => '',
		)
	) 
);


/* Banner Image
----------------------------------------------------------------------*/
// Enable Parallax
$wp_customize->add_setting( 'helphealth_medical_header_parallax_active',
	array(
		'sanitize_callback' => 'helphealth_medical_sanitize_checkbox',
		'default'           => 1,
	)
);
$wp_customize->add_control( 'helphealth_medical_header_parallax_active',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__( 'Enable Parallax', 'helphealth-medical' ),
		'section'     => 'header_image',
	    'description'	=> __( 'Check/Uncheck to enable/disable parallax effect.', 'helphealth-medical' )
	)
);

// Overlay color
$wp_customize->add_setting( 'banner_overlay_color',
	array(
		'sanitize_callback' => 'helphealth_medical_sanitize_color_alpha',
		'default'           => 'rgba(0,0,0,.6)',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_control( new HallWorth_Alpha_Color_Control(
		$wp_customize, 'banner_overlay_color',
		array(
			'label'   => esc_html__( 'Overlay Color', 'helphealth-medical' ),
			'section' => 'header_image',
		)
	)
);

// Breadcrumb display
$wp_customize->add_setting( 'helphealth_medical_blog_breadcrumb_display',
	array(
		'sanitize_callback' => 'helphealth_medical_sanitize_checkbox',
		'default'           => false,
	)
);
$wp_customize->add_control( 'helphealth_medical_blog_breadcrumb_display',
	array(
		'label'       => esc_html__( 'Display Breadcrumb', 'helphealth-medical' ),
	    'description'	=> esc_html__( 'Check/Uncheck this box to show/hide breadcrumb.', 'helphealth-medical' ),
		'type'        => 'checkbox',
		'section'     => 'header_image',

	)
);

// Header Text Align
$wp_customize->add_setting( 'helphealth_medical_banner_text_align',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 'text-center',
	)
);
$wp_customize->add_control( 'helphealth_medical_banner_text_align',
	array(
		'type'        => 'select',
		'label'       => esc_html__( 'Text Align', 'helphealth-medical' ),
		'description' => esc_html__( 'Align text and links', 'helphealth-medical' ),
		'section'     => 'header_image',
		'choices'     => array(
			'text-left' => esc_html__( 'Align Left', 'helphealth-medical' ),
			'text-center'  => esc_html__( 'Align Center', 'helphealth-medical' ),
			'text-right'    => esc_html__( 'Align Right', 'helphealth-medical' ),
		)
	)
);

// Banner Text Color
  $wp_customize->add_setting( 'helphealth_medical_banner_text_color',
	array(
		'sanitize_callback'    => 'sanitize_hex_color_no_hash',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		'default'              => '#ffffff',
		'transport'         => 'postMessage'
	) );
$wp_customize->add_control( new WP_Customize_Color_Control( 
	$wp_customize, 'helphealth_medical_banner_text_color',
		array(
			'label'       => esc_html__( 'Text Color', 'helphealth-medical' ),
			'section'     => 'header_image',
			'description' => '',
		)
	) 
);

/** Archive Banner Image */
$wp_customize->add_setting( 'helphealth_medical_archive_header_image',
	array(
		'default'           => get_template_directory_uri() . '/assets/img/banner/banner.jpg',
		'sanitize_callback' => 'helphealth_medical_sanitize_image',
	)
);
$wp_customize->add_control( 
	new WP_Customize_Image_Control( $wp_customize, 'helphealth_medical_archive_header_image',
		array(
			'label'         => esc_html__( 'Banner Image For Archive Page', 'helphealth-medical' ),
			'description'   => esc_html__( 'Choose Banner Image of your choice for Archive Pages. Recommended size for this image is 1920px by 1090px.', 'helphealth-medical' ),
			'section'       => 'header_image',
			'type'          => 'image',
		)
	)
);

/** Search Banner Image */
$wp_customize->add_setting( 'helphealth_medical_search_header_image',
	array(
		'default'           => get_template_directory_uri() . '/assets/img/banner/banner.jpg',
		'sanitize_callback' => 'helphealth_medical_sanitize_image',
	)
);
$wp_customize->add_control( 
	new WP_Customize_Image_Control( $wp_customize, 'helphealth_medical_search_header_image',
		array(
			'label'         => esc_html__( 'Banner Image For Search Page', 'helphealth-medical' ),
			'description'   => esc_html__( 'Choose Banner Image of your choice for Search Page. Recommended size for this image is 1920px by 1090px', 'helphealth-medical' ),
			'section'       => 'header_image',
			'type'          => 'image',
		)
	)
);

/** 404 Banner Image */
$wp_customize->add_setting( 'helphealth_medical_404_header_image',
	array(
		'default'           => get_template_directory_uri() . '/assets/img/banner/banner.jpg',
		'sanitize_callback' => 'helphealth_medical_sanitize_image',
	)
);
$wp_customize->add_control( 
	new WP_Customize_Image_Control( $wp_customize, 'helphealth_medical_404_header_image',
		array(
			'label'         => esc_html__( 'Banner Image For 404 Page', 'helphealth-medical' ),
			'description'   => esc_html__( 'Choose Banner Image of your choice for 404 Page. Recommended size for this image is 1920px by 1090px', 'helphealth-medical' ),
			'section'       => 'header_image',
			'type'          => 'image',
		)
	)
);
