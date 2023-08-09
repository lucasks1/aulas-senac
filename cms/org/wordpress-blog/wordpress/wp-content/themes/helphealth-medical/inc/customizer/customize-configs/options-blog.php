<?php
/**
 * Blog Post Settings
 * @since 1.0.0
 * ----------------------------------------------------------------------
 */
$wp_customize->add_section( 'helphealth_medical_blog_settings',
	array(
		'priority'    => 7,
		'title'       => esc_html__( 'Blog/Archive Settings', 'helphealth-medical' ),
		'description' => '',
		'panel'       => 'helphealth_medical_options',
	)
);

// Blog Page Title
$wp_customize->add_setting( 'helphealth_medical_blog_page_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__( 'Blog', 'helphealth-medical' ),
		'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( 'helphealth_medical_blog_page_title',
	array(
		'label'       => esc_html__( 'Blog Page Title', 'helphealth-medical' ),
		'section'     => 'helphealth_medical_blog_settings',
	)
);

// Blog Layout settings
$wp_customize->add_setting( 'helphealth_medical_layout',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 'no-sidebar',
	)
);
$wp_customize->add_control( 'helphealth_medical_layout',
	array(
		'type'        => 'select',
		'label'       => esc_html__( 'Blog Page Layout', 'helphealth-medical' ),
		'description' => esc_html__( 'Blog page layout, apply for all blog related pages such as blog, archieve and search page.', 'helphealth-medical' ),
		'section'     => 'helphealth_medical_blog_settings',
		'choices'     => array(
			'right-sidebar' => esc_html__( 'Right sidebar', 'helphealth-medical' ),
			'left-sidebar'  => esc_html__( 'Left sidebar', 'helphealth-medical' ),
			'no-sidebar'    => esc_html__( 'No sidebar', 'helphealth-medical' ),
		)
	)
);

// Post Column settings
$wp_customize->add_setting( 'helphealth_medical_columns',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 'three-columns',
	)
);
$wp_customize->add_control( 'helphealth_medical_columns',
	array(
		'type'        => 'select',
		'label'       => esc_html__( 'Posts Column', 'helphealth-medical' ),
		'description' => esc_html__( 'Select number of columns that you want to show on blog relaged pages. ', 'helphealth-medical' ),
		'section'     => 'helphealth_medical_blog_settings',
		'choices'     => array(
			'three-columns' => esc_html__( 'Three Columns', 'helphealth-medical' ),
			'two-columns'  => esc_html__( 'Two Columns', 'helphealth-medical' ),
			'single-column'    => esc_html__( 'Single Column', 'helphealth-medical' ),
		)
	)
);

// Blog Style settings
$wp_customize->add_setting( 'helphealth_medical_post_style',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 'masonry',
	)
);
$wp_customize->add_control( 'helphealth_medical_post_style',
	array(
		'type'        => 'select',
		'label'       => esc_html__( 'Post Layout', 'helphealth-medical' ),
		'section'     => 'helphealth_medical_blog_settings',
		'choices'     => array(
			'masonry' => esc_html__( 'Masonry', 'helphealth-medical' ),
			'equal-height'  => esc_html__( 'Equal Height', 'helphealth-medical' ),
		)
	)
);

// excerpt count control and setting
$wp_customize->add_setting( 'helphealth_medical_exceprt_count', 
	array(
		'sanitize_callback' => 'helphealth_medical_sanitize_number_range',
		'validate_callback' => 'helphealth_medical_validate_excerpt_count',
		'default'          	=> 20,
	) 
);
$wp_customize->add_control( 'helphealth_medical_exceprt_count', 
	array(
		'label'             => esc_html__( 'Excerpt Length', 'helphealth-medical' ),
		'description'       => esc_html__( 'Note: Min 1 & Max 50.', 'helphealth-medical' ),
		'section'           => 'helphealth_medical_blog_settings',
		'type'				=> 'number',
		'input_attrs'		=> array(
			'min'	=> 1,
			'max'	=> 50,
			),
	) 
);

// Read More Link text
$wp_customize->add_setting( 'helphealth_medical_excerpt_dots',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '&hellip;',
	)
);
$wp_customize->add_control( 'helphealth_medical_excerpt_dots',
	array(
		'label'       => esc_html__( 'Excerpt Suffix', 'helphealth-medical' ),
		'section'     => 'helphealth_medical_blog_settings',
		'description'       => esc_html__( 'Defines the three dots \'[...]\' that are appended automatically to excerpts.', 'helphealth-medical' ),
	)
);

// Read More Link text
$wp_customize->add_setting( 'helphealth_medical_more_text',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__( 'Read More', 'helphealth-medical' ),
		'transport'			=> 'postMessage'
	)
);
$wp_customize->add_control( 'helphealth_medical_more_text',
	array(
		'label'       => esc_html__( 'Read More Text', 'helphealth-medical' ),
		'section'     => 'helphealth_medical_blog_settings',
		'description'       => esc_html__( 'Defines the \'Read More\' link text appended to post excerpts.', 'helphealth-medical' ),
	)
);

// Display Post Thumbnail.
$wp_customize->add_setting( 'helphealth_medical_post_thumbnail_display',
	array(
		'default'			=> true,
		'sanitize_callback'	=> 'helphealth_medical_sanitize_checkbox'
	)
);
$wp_customize->add_control( 'helphealth_medical_post_thumbnail_display',
	array(
		'section'		=> 'helphealth_medical_blog_settings',
		'type'			=> 'checkbox',
		'label'			=> __( 'Display blog post thumbnails.', 'helphealth-medical' ),
		'description'	=> __( 'Check/Uncheck this box to show/hide post thumbnails on main blog page', 'helphealth-medical' )
	)
);	

// Display Post Meta.
$wp_customize->add_setting( 'helphealth_medical_post_meta_display',
	array(
		'default'			=> true,
		'sanitize_callback'	=> 'helphealth_medical_sanitize_checkbox'
	)
);
$wp_customize->add_control( 'helphealth_medical_post_meta_display',
	array(
		'section'		=> 'helphealth_medical_blog_settings',
		'type'			=> 'checkbox',
		'label'			=> __( 'Display post meta information.', 'helphealth-medical' ),
		'description'	=> __( 'Check/Uncheck to show/hide post meta information', 'helphealth-medical' )
	)
);	

// Display Author Meta
$wp_customize->add_setting(
	'helphealth_medical_author_display',
	array(
		'default'			=> false,
		'sanitize_callback'	=> 'helphealth_medical_sanitize_checkbox'
	)
);
$wp_customize->add_control( 'helphealth_medical_author_display',
	array(
		'section'		=> 'helphealth_medical_blog_settings',
		'type'			=> 'checkbox',
		'label'			=> __( 'Display Author', 'helphealth-medical' ),
		'active_callback' => function(){
			return get_theme_mod( 'helphealth_medical_post_meta_display', true );
		},
	)
);	

// Display Categories Meta.
$wp_customize->add_setting( 'helphealth_medical_cat_display',
	array(
		'default'			=> true,
		'sanitize_callback'	=> 'helphealth_medical_sanitize_checkbox'
	)
);
$wp_customize->add_control( 'helphealth_medical_cat_display',
	array(
		'section'		=> 'helphealth_medical_blog_settings',
		'type'			=> 'checkbox',
		'label'			=> __( 'Display categories', 'helphealth-medical' ),
		'active_callback' => function(){
			return get_theme_mod( 'helphealth_medical_post_meta_display', true );
		},
	)
);	

// Display Date Meta.
$wp_customize->add_setting( 'helphealth_medical_date_display',
	array(
		'default'			=> true,
		'sanitize_callback'	=> 'helphealth_medical_sanitize_checkbox'
	)
);
$wp_customize->add_control( 'helphealth_medical_date_display',
	array(
		'section'		=> 'helphealth_medical_blog_settings',
		'type'			=> 'checkbox',
		'label'			=> __( 'Display Date', 'helphealth-medical' ),
		'active_callback' => function(){
			return get_theme_mod( 'helphealth_medical_post_meta_display', true );
		},
	)
);

// Display Comments Meta.
$wp_customize->add_setting( 'helphealth_medical_meta_comments_display',
	array(
		'default'			=> false,
		'sanitize_callback'	=> 'helphealth_medical_sanitize_checkbox'
	)
);
$wp_customize->add_control( 'helphealth_medical_meta_comments_display',
	array(
		'section'		  => 'helphealth_medical_blog_settings',
		'type'			  => 'checkbox',
		'label'			  => __( 'Display Comments Number', 'helphealth-medical' ),
		'active_callback' => function(){
			return get_theme_mod( 'helphealth_medical_post_meta_display', true );
		},
	)
);	
