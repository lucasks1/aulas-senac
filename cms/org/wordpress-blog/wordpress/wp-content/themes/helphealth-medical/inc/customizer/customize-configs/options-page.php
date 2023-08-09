<?php

/**
 * Page Settings
 * @since 1.0.0
 * ----------------------------------------------------------------------
 */
$wp_customize->add_section( 'helphealth_medical_page_settings',
	array(
		'priority'    => 8,
		'title'       => esc_html__( 'Page Settings', 'helphealth-medical' ),
		'panel'       => 'helphealth_medical_options',
	)
);

// Page Layout
$wp_customize->add_setting( 'helphealth_medical_page_layout',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 'no-sidebar',
	)
);
$wp_customize->add_control( 'helphealth_medical_page_layout',
	array(
		'type'        => 'select',
		'label'       => esc_html__( 'Page Layout', 'helphealth-medical' ),
		'description' => esc_html__( 'Page Layout, apply for all pages, exclude blog related pages and custom page templates.', 'helphealth-medical' ),
		'section'     => 'helphealth_medical_page_settings',
		'choices'     => array(
			'right-sidebar' => esc_html__( 'Right sidebar', 'helphealth-medical' ),
			'left-sidebar'  => esc_html__( 'Left sidebar', 'helphealth-medical' ),
			'no-sidebar'    => esc_html__( 'No sidebar', 'helphealth-medical' ),
		)
	)
);

// Display comments on page.
$wp_customize->add_setting( 'helphealth_medical_page_comments_display',
	array(
		'default'			=> true,
		'sanitize_callback'	=> 'helphealth_medical_sanitize_checkbox'
	)
);
$wp_customize->add_control( 'helphealth_medical_page_comments_display',
	array(
		'label'			=> esc_html__( 'Display page comments.', 'helphealth-medical' ),
		'section'		=> 'helphealth_medical_page_settings',
		'type'			=> 'checkbox',
		'description'	=> esc_html__( 'Check/Uncheck to show/hide comments on page', 'helphealth-medical' )
	)
);