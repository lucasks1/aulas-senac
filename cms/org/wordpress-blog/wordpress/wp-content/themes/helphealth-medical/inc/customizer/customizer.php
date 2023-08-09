<?php
/**
 * Helphealth Medical Theme Customizer
 *
 * @package Helphealth_Medical
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function helphealth_medical_customize_register( $wp_customize ) {
	
	// Load custom controls.
	require_once HELPHEALTH_MEDICA_THEME_INC_DIR . '/customizer/customizer-controls.php';
	
	
	// Custom WP default control & settings.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	// Move to panel
	$wp_customize->get_section( 'header_image' )->panel 	= 'helphealth_medical_options';
	$wp_customize->get_section( 'header_image' )->title     = __( 'Banner Settings', 'helphealth-medical' );
	$wp_customize->get_section( 'header_image' )->priority 	= 7;
	
	/**
	 * Load Customize Configs
	 */
	// Site Identity.
	require_once HELPHEALTH_MEDICA_THEME_INC_DIR . '/customizer/customize-configs/site-identity.php';
	
	//Site Options
	require_once HELPHEALTH_MEDICA_THEME_INC_DIR . '/customizer/customize-configs/options.php';
	require_once HELPHEALTH_MEDICA_THEME_INC_DIR . '/customizer/customize-configs/options-global.php';
	require_once HELPHEALTH_MEDICA_THEME_INC_DIR . '/customizer/customize-configs/options-frontpage.php';
	require_once HELPHEALTH_MEDICA_THEME_INC_DIR . '/customizer/customize-configs/options-typography.php';
	require_once HELPHEALTH_MEDICA_THEME_INC_DIR . '/customizer/customize-configs/options-header.php';
	require_once HELPHEALTH_MEDICA_THEME_INC_DIR . '/customizer/customize-configs/options-navigation.php';
	require_once HELPHEALTH_MEDICA_THEME_INC_DIR . '/customizer/customize-configs/options-blog.php';
	require_once HELPHEALTH_MEDICA_THEME_INC_DIR . '/customizer/customize-configs/options-page.php';
	require_once HELPHEALTH_MEDICA_THEME_INC_DIR . '/customizer/customize-configs/options-single.php';
	require_once HELPHEALTH_MEDICA_THEME_INC_DIR . '/customizer/customize-configs/options-socials.php';
	require_once HELPHEALTH_MEDICA_THEME_INC_DIR . '/customizer/customize-configs/options-colors.php';
	require_once HELPHEALTH_MEDICA_THEME_INC_DIR . '/customizer/customize-configs/options-footer.php';
	require_once HELPHEALTH_MEDICA_THEME_INC_DIR . '/customizer/customize-configs/options-contact.php';
	
}
add_action( 'customize_register', 'helphealth_medical_customize_register' );

/**
 * Selective refresh
 */
require HELPHEALTH_MEDICA_THEME_INC_DIR . '/customizer/customizer-selective-refresh.php';

/**
 * Upgrade
 */
require HELPHEALTH_MEDICA_THEME_INC_DIR .'/customizer/upgrade-pro/class-upgrade.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function helphealth_medical_customize_preview_js() {
    wp_enqueue_script( 'helphealth_medical_customizer_liveview', HELPHEALTH_MEDICA_THEME_DIR_URI . '/customizer/assets/js/customizer-liveview.js', array( 'customize-preview', 'customize-selective-refresh' ), false, true );
}
add_action( 'customize_preview_init', 'helphealth_medical_customize_preview_js', 65 );



