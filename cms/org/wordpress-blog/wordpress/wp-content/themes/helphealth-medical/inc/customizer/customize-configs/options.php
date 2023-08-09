<?php
/**
 * Site Options
 */

$wp_customize->add_panel( 'helphealth_medical_options',
	array(
		'priority'       => 30,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__( 'Theme Options', 'helphealth-medical' ),
		'description'    => '',
	)
);

$wp_customize->add_panel( 'helphealth_medical_frontpage_options',
	array(
		'priority'       => 40,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__( 'Front Page Settings', 'helphealth-medical' ),
		'description'    => '',
	)
);

$wp_customize->add_panel( 'contact_page_template',
	array(
		'priority'       => 40,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__( 'Contact Page Settings', 'helphealth-medical' ),
		'description'    => '',
	)
);

if ( ! function_exists( 'wp_get_custom_css' ) ) {  // Back-compat for WordPress < 4.7.

	/* Custom CSS Settings
	----------------------------------------------------------------------*/
	$wp_customize->add_section(
		'helphealth_medical_custom_code',
		array(
			'title' => __( 'Custom CSS', 'helphealth-medical' ),
			'panel' => 'helphealth_medical_options',
		)
	);
	$wp_customize->add_setting(
		'helphealth_medical_custom_css',
		array(
			'default'           => '',
			'sanitize_callback' => 'helphealth_medical_sanitize_css',
			'type'              => 'option',
		)
	);
	$wp_customize->add_control(
		'helphealth_medical_custom_css',
		array(
			'label'   => __( 'Custom CSS', 'helphealth-medical' ),
			'section' => 'helphealth_medical_custom_code',
			'type'    => 'textarea'
		)
	);
} else {
	$wp_customize->get_section( 'custom_css' )->priority = 994;
}