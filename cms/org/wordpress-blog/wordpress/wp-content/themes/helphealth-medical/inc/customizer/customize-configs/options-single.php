<?php

/* Single Settings
----------------------------------------------------------------------*/
$wp_customize->add_section( 'helphealth_medical_single',
	array(
		'priority'    => 9,
		'title'       => esc_html__( 'Single Post', 'helphealth-medical' ),
		'description' => '',
		'panel'       => 'helphealth_medical_options',
	)
);

// Blog Layout settings
$wp_customize->add_setting( 'helphealth_medical_blog_single_layout',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 'right-sidebar',
		//'transport'			=> 'postMessage'
	)
);

$wp_customize->add_control( 'helphealth_medical_blog_single_layout',
	array(
		'type'        => 'select',
		'label'       => esc_html__( 'Single Post Layout', 'helphealth-medical' ),
		'description' => esc_html__( 'Single Layout, apply for single blog post page only.', 'helphealth-medical' ),
		'section'     => 'helphealth_medical_single',
		'choices'     => array(
			'right-sidebar' => esc_html__( 'Right sidebar', 'helphealth-medical' ),
			'left-sidebar'  => esc_html__( 'Left sidebar', 'helphealth-medical' ),
			'no-sidebar'    => esc_html__( 'No sidebar', 'helphealth-medical' ),
		)
	)
);

// Thumbnail
$wp_customize->add_setting( 'single_thumbnail',
	array(
		'sanitize_callback' => 'helphealth_medical_sanitize_checkbox',
		'default'           => 1,
	)
);
$wp_customize->add_control( 'single_thumbnail',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__( 'Display single post thumbnail', 'helphealth-medical' ),
		'section'     => 'helphealth_medical_single',
		'description' => esc_html__( 'Check this box to show post thumbnail on single post.', 'helphealth-medical' )
	)
);

// Display Post Meta.
$wp_customize->add_setting( 'helphealth_medical_single_post_meta_display',
	array(
		'default'			=> 1,
		'sanitize_callback'	=> 'helphealth_medical_sanitize_checkbox'
	)
);
$wp_customize->add_control( 'helphealth_medical_single_post_meta_display',
	array(
		'section'		=> 'helphealth_medical_single',
		'type'			=> 'checkbox',
		'label'			=> __( 'Display post meta information.', 'helphealth-medical' ),
		'description'	=> __( 'Check/Uncheck to show/hide post meta such as post date, author, category...', 'helphealth-medical' )
	)
);	

// Display comments on posts.
$wp_customize->add_setting(
	'helphealth_medical_post_comments_display',
	array(
		'default'			=> 1,
		'sanitize_callback'	=> 'helphealth_medical_sanitize_checkbox'
	)
);
$wp_customize->add_control(
	'helphealth_medical_post_comments_display',
	array(
		'label'			=> esc_html__( 'Display post comments.', 'helphealth-medical' ),
		'section'		=> 'helphealth_medical_single',
		'type'			=> 'checkbox',
		'description'	=> esc_html__( 'Check/Uncheck this box to show/hide comments on post', 'helphealth-medical' )
	)
);


/** Related Posts label */
$wp_customize->add_setting( 'helphealth_medical_related_posts_label',
	array(
		'default'           => esc_html__( 'You May Also Like...', 'helphealth-medical' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	)
);

$wp_customize->add_control( 'helphealth_medical_related_posts_label',
	array(
		'label'         => esc_html__( 'Related Posts Label', 'helphealth-medical' ),
		'description'   => esc_html__( 'Option to change label for related posts on single.', 'helphealth-medical' ),
		'section'       => 'helphealth_medical_single',
		'type'          => 'text',
	)
);

// Display Related Post
$wp_customize->add_setting( 'helphealth_medical_related_post_display',
	array(
		'sanitize_callback' => 'helphealth_medical_sanitize_checkbox',
		'default'           => 1,
	)
);
$wp_customize->add_control( 'helphealth_medical_related_post_display',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__( 'Display related posts', 'helphealth-medical' ),
		'section'     => 'helphealth_medical_single',
		'description' => esc_html__( 'Check/uncheck this box to show/hide related posts.', 'helphealth-medical' )
	)
);

// Related Post Choice
$wp_customize->add_setting( 'helphealth_medical_related_post_choice',
	 array(
		'default'   => 'category',
		'sanitize_callback' => 'helphealth_medical_sanitize_choices',
	)
);
$wp_customize->add_control( 'helphealth_medical_related_post_choice', 
	array(
		'label'    => esc_html__( 'Display Related Posts By:', 'helphealth-medical' ),
		'section'  => 'helphealth_medical_single',
		'type'     => 'radio',
		'choices'  => array(
			'category' => esc_html__( 'Categories ', 'helphealth-medical' ),
			'choice2' => esc_html__( 'Tags', 'helphealth-medical' ),
		),
		'active_callback' 		=> 'callback_helphealth_medical_related_post_choice'
	)
);


function callback_helphealth_medical_related_post_choice() {
	if ( get_theme_mod( 'helphealth_medical_related_post_display', 1 ) ) {
		return true;
	} else {
		return false;
	}
}
