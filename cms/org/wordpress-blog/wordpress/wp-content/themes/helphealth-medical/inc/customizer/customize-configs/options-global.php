<?php
/* Global Settings
----------------------------------------------------------------------*/
$wp_customize->add_section( 'helphealth_medical_global_settings',
	array(
		'priority'    => 1,
		'title'       => esc_html__( 'Global Settings', 'helphealth-medical' ),
		'panel'       => 'helphealth_medical_options',
	)
);

// Preloader Disable
$wp_customize->add_setting( 'helphealth_medical_preloader_display',
	array(
		'sanitize_callback' => 'helphealth_medical_sanitize_checkbox',
		'default'           => 1,
	)
);
$wp_customize->add_control( 'helphealth_medical_preloader_display',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__( 'Show Preloader', 'helphealth-medical' ),
		'section'     => 'helphealth_medical_global_settings',
		'description' => esc_html__( 'Check/Uncheck to show/hide preloader.', 'helphealth-medical' )
	)
);

// Backto Top Disable
$wp_customize->add_setting( 'helphealth_medical_backto_top_display',
	array(
		'sanitize_callback' => 'helphealth_medical_sanitize_checkbox',
		'default'           => 1,
	)
);
$wp_customize->add_control( 'helphealth_medical_backto_top_display',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__( 'Display Back to Top Button', 'helphealth-medical' ),
		'section'     => 'helphealth_medical_global_settings',
		'description' => esc_html__( 'Check/uncheck to show/hide back to top button.', 'helphealth-medical' )
	)
);


