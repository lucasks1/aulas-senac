<?php
/**
 * Front Page Settings
 * @since 1.0.0
 * ----------------------------------------------------------------------
 */
$wp_customize->add_section( 'helphealth_medical_home_slider_options',
	array(
		'title'       => esc_html__( 'Slider Section', 'helphealth-medical' ),
		'description' => '',
		'panel'       => 'helphealth_medical_frontpage_options',
		'priority' => 1,
		'divider' => 'before',
	)
);

		$wp_customize->add_setting( 'helphealth_medical_slider_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'helphealth_medical_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'helphealth_medical_slider_status', 
			array(
			  'label'   => esc_html__( 'Show/hide Slider Section', 'helphealth-medical' ),
			  'description'   => esc_html__( 'Check/Uncheck this box to show/hide slider section on front page template.', 'helphealth-medical' ),
			  'section' => 'helphealth_medical_home_slider_options',
			  'type'    => 'checkbox',
			  'priority' => 1,
			)
		);

		// Total Number
        $wp_customize->add_setting( 'slides_total_items_show', 
		 	array(
				'default' => 3,
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'helphealth_medical_sanitize_number_range',
			) 
		);
		$wp_customize->add_control( 'slides_total_items_show', 
			array(
				'label' => esc_html__( 'Total Slides to Show','helphealth-medical' ),
				'description' => esc_html__( 'After changing default value please save and reload','helphealth-medical' ),
				'type' => 'number',
				'section' => 'helphealth_medical_home_slider_options',
				'input_attrs' => array(
					'min'	=> 1,
					'max'	=> 3,
					'step'	=> 1,
				),
				'active_callback' => function(){
					 if(get_theme_mod('helphealth_medical_slider_status')){
						return true;
					 } else {
						 return false;
					 }
				},
				'priority' => 3,
			)
		);
		
		// Content Type
		$wp_customize->add_setting('slides_content_type', 
			array(
			'default' 			=> 'slides_page',
			'capability'        => 'edit_theme_options',	
			'sanitize_callback' => 'helphealth_medical_sanitize_select'
			)
		);
		$wp_customize->add_control('slides_content_type', 
			array(
				'label'       => __('Content Type', 'helphealth-medical'),
				'section'     => 'helphealth_medical_home_slider_options',   
				'settings'    => 'slides_content_type',		
				'type'        => 'select',
				'choices' => array(
						'slides_page'	   => __('Page','helphealth-medical'),
						'slides_post'	   => __('Post','helphealth-medical'),
				),
				'active_callback' => function(){
					 if(get_theme_mod('helphealth_medical_slider_status')){
						return true;
					 } else {
						 return false;
					 }
				},
				'priority' => 4,
			)
		);

	$slide_items = get_theme_mod( 'slides_total_items_show', 3);
	for( $i=1; $i<=$slide_items; $i++ ) {
		// Page
		$wp_customize->add_setting('featured_slide_page_'.$i.'', 
			array(
				'capability'        => 'edit_theme_options',	
				'sanitize_callback' => 'helphealth_medical_dropdown_pages'
			)
		);
		$wp_customize->add_control('featured_slide_page_'.$i.'', 
			array(
				/* translators: %1$s is replaced with number */
				'label'       => sprintf( __('Slide #%1$s', 'helphealth-medical'), $i),
				/* translators: %1$s is replaced with number */
				'description'       => sprintf( __('Select a Page for slide #%1$s title, text and image', 'helphealth-medical'), $i),
				'section'     => 'helphealth_medical_home_slider_options',   
				'settings'    => 'featured_slide_page_'.$i.'',		
				'type'        => 'dropdown-pages',
				'active_callback' => function(){
					$slider_status = get_theme_mod('helphealth_medical_slider_status');
					$slides_content_type = get_theme_mod('slides_content_type');
					if($slides_content_type == 'slides_page' && $slider_status == true ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);
		
		// Posts
		$wp_customize->add_setting('featured_slide_post_'.$i.'', 
			array(
				'capability'        => 'edit_theme_options',	
				'sanitize_callback' => 'helphealth_medical_dropdown_pages'
			)
		);
		$wp_customize->add_control('featured_slide_post_'.$i.'', 
			array(
				/* translators: %1$s is replaced with number */
				'label'       => sprintf( __('Slide #%1$s', 'helphealth-medical'), $i),
				/* translators: %1$s is replaced with number */
				'description' => sprintf( __('Select a Post for slide #%1$s title, text and image', 'helphealth-medical'), $i),
				'section'     => 'helphealth_medical_home_slider_options',   
				'settings'    => 'featured_slide_post_'.$i.'',		
				'type'        => 'select',
				'choices'	  => helphealth_medical_dropdown_posts(),
				'active_callback' => function(){
					$slider_status = get_theme_mod('helphealth_medical_slider_status');
					$slides_content_type = get_theme_mod('slides_content_type');
					if($slides_content_type == 'slides_post' && $slider_status == true ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);
	}

		// Slide Title Color
		$wp_customize->add_setting( 'helphealth_medical_slide_title_color', 
			array(
					'sanitize_callback'    => 'sanitize_hex_color_no_hash',
					'sanitize_js_callback' => 'maybe_hash_hex_color',
					'default'              => '#ffffff',
				) 
			);
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'helphealth_medical_slide_title_color', 
			array(
				'label' => esc_html__( 'Title Color', 'helphealth-medical' ),
				'description'   => '',
				'section' => 'helphealth_medical_home_slider_options',
				'active_callback' => function(){
					 if(get_theme_mod('helphealth_medical_slider_status')){
						return true;
					 } else {
						 return false;
					 }
				},
				'priority' => 11
			) ) 
		);
		
		// Slide Text Color
		$wp_customize->add_setting( 'helphealth_medical_slide_text_color', 
			array(
					'sanitize_callback'    => 'sanitize_hex_color_no_hash',
					'sanitize_js_callback' => 'maybe_hash_hex_color',
					'default'              => '#ffffff',
				) 
			);
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'helphealth_medical_slide_text_color', 
			array(
				'label' => esc_html__( 'Description Color', 'helphealth-medical' ),
				'description'   => '',
				'section' => 'helphealth_medical_home_slider_options',
				'active_callback' => function(){
					 if(get_theme_mod('helphealth_medical_slider_status')){
						return true;
					 } else {
						 return false;
					 }
				},
				'priority' => 12
			) ) 
		);

		// Overlay color
		$wp_customize->add_setting( 'helphealth_medical_slide_overlay_color',
			array(
				'sanitize_callback' => 'helphealth_medical_sanitize_color_alpha',
				'default'           => 'rgba(0,0,0,.6)',
				'transport'         => 'postMessage'
			)
		);
		$wp_customize->add_control( new HallWorth_Alpha_Color_Control(
				$wp_customize, 'helphealth_medical_slide_overlay_color',
				array(
					'label'   => esc_html__( 'Overlay Color', 'helphealth-medical' ),
					'section' => 'helphealth_medical_home_slider_options',
					'active_callback' => function(){
						 $banner_status = get_theme_mod('helphealth_medical_slider_status');
						 if( $banner_status){
							return true;
						 } else {
							 return false;
						 }
					},
					'priority' 	=> 13,
				)
			)
		);

		// Text Alignment
		$wp_customize->add_setting( 'slider_text_alignment', 
	        array(
	            'default'           => 'text-left',
	            'sanitize_callback' => 'helphealth_medical_sanitize_choices'
	        ) 
	    );
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'slider_text_alignment',
				array(
					'label'       => esc_html__('Text Alignment', 'helphealth-medical'),
					'description' => '',
					'section'	  => 'helphealth_medical_home_slider_options',
					'type'        => 'select',
					'choices'	  => array(
						'text-left'  => esc_html__('Left','helphealth-medical'),
						'text-center'  => esc_html__('Center','helphealth-medical'),
						'text-right'  => esc_html__('right','helphealth-medical'),
					),
					'priority'   => 14,
					'active_callback' => function(){
						 $banner_status = get_theme_mod('helphealth_medical_slider_status');
						 if( $banner_status){
							return true;
						 } else {
							 return false;
						 }
					},
					
				)
			)
		);

/* CTA
----------------------------------------------------------------------*/
	
$wp_customize->add_section( 'helphealth_medical_cta_options',
	array(
		'title'       => esc_html__( 'CTA Button', 'helphealth-medical' ),
		'description' => '',
		'panel'       => 'helphealth_medical_frontpage_options',
		'priority' => 2,
		'divider' => 'before',
	)
);

		$wp_customize->add_setting( 'helphealth_medica_cta_status', 
			array(
			  'default'  =>  false,
			  'sanitize_callback' => 'helphealth_medical_sanitize_checkbox'
			)
		);
		$wp_customize->add_control( 'helphealth_medica_cta_status', 
			array(
			  'label'         => esc_html__( 'Show/hide CTA', 'helphealth-medical' ),
			  'description'   => esc_html__( 'Check/uncheck this box to show/hide CTA button on front page template.', 'helphealth-medical' ),
			  'section'       => 'helphealth_medical_cta_options',
			  'settings'      => 'helphealth_medica_cta_status',
			  'type'          => 'checkbox',
			  'priority'      => 1
			)
		);
		
		// CTA Title
		$wp_customize->add_setting( 'helphealth_medical_cta_title',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => esc_html__( 'Qustions?', 'helphealth-medical' ),
				'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'helphealth_medical_cta_title',
			array(
				'label'       => esc_html__( 'Title', 'helphealth-medical' ),
				'description' => '',
				'type'    => 'text',
				'section'     => 'helphealth_medical_cta_options',
				'active_callback' => function(){
					if( get_theme_mod( 'helphealth_medica_cta_status' ) ) {
					return true;
					} else {
					return false;
					}
				},
				'priority' => 3,
			)
		);

		// CTA Description
		$wp_customize->add_setting( 'helphealth_medical_cta_desc',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => esc_html__( 'We\'re happy to help', 'helphealth-medical' ),
				'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'helphealth_medical_cta_desc',
			array(
				'label'       => esc_html__( 'Description', 'helphealth-medical' ),
				'description' => '',
				'type'    => 'text',
				'section'     => 'helphealth_medical_cta_options',
				'active_callback' => function(){
					if( get_theme_mod( 'helphealth_medica_cta_status' ) ) {
					return true;
					} else {
					return false;
					}
				},
				'priority' => 4,
			)
		);
		
		// CTA Phone
		$wp_customize->add_setting( 'helphealth_medical_cta_phone',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => esc_html__( '123-456-7890', 'helphealth-medical' ),
				'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'helphealth_medical_cta_phone',
			array(
				'label'       => esc_html__( 'Phone', 'helphealth-medical' ),
				'description' => '',
				'type'    => 'text',
				'section'     => 'helphealth_medical_cta_options',
				'active_callback' => function(){
					if( get_theme_mod( 'helphealth_medica_cta_status' ) ) {
					return true;
					} else {
					return false;
					}
				},
				'priority' => 5,
			)
		);

		// Button Text
		$wp_customize->add_setting('helphealth_medical_cta_btn_text',
			 array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => esc_html__( 'Schedule A Tour', 'helphealth-medical' ),
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control('helphealth_medical_cta_btn_text',
			 array(
				'label'     => esc_html__('Button Text', 'helphealth-medical'),
				'description' => '',
				'type'    => 'text',
				'section'   => 'helphealth_medical_cta_options',
				'active_callback' => function(){
					if( get_theme_mod( 'helphealth_medica_cta_status' ) ) {
					return true;
					} else {
					return false;
					}
				},
				'priority' => 6,
			)
		);
		// Button URL
		$wp_customize->add_setting('helphealth_medical_cta_btn_url', 
			array(
				'sanitize_callback' => 'esc_url_raw',
				'default'           => '',
				//'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control('helphealth_medical_cta_btn_url', 
			array(
				'label'    => esc_html__('Button Link', 'helphealth-medical'),
				'description' => esc_html__( 'Start with http:// or https://', 'helphealth-medical' ),
				'type'    => 'url',
				'section'  => 'helphealth_medical_cta_options',
				'active_callback' => function(){
					if( get_theme_mod( 'helphealth_medica_cta_status' ) ) {
					return true;
					} else {
					return false;
					}
				},
				'priority' => 7,
			)
		);
		// Button Target
		$wp_customize->add_setting( 'helphealth_medical_cta_btn_target',
			array(
				'sanitize_callback' => 'helphealth_medical_sanitize_checkbox',
				'default'           => 1,
				//'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 'helphealth_medical_cta_btn_target',
			array(
				'type'        => 'checkbox',
				'label'       => esc_html__( 'Open on new tab?', 'helphealth-medical' ),
				'section'     => 'helphealth_medical_cta_options',
				'active_callback' => function(){
					if( get_theme_mod( 'helphealth_medica_cta_status' ) ) {
					return true;
					} else {
					return false;
					}
				},
				'priority' => 8,
			)
		);
		
		// Button BG Color
		$wp_customize->add_setting( 'helphealth_medical_cta_btn_bg_color', array(
				'sanitize_callback'    => 'sanitize_hex_color_no_hash',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
				'default'              => '#005584'
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 'helphealth_medical_cta_btn_bg_color',
				array(
					'label'       => esc_html__( 'Button BG Color', 'helphealth-medical' ),
					'section'     => 'helphealth_medical_cta_options',
					'description' => '',
					'active_callback' => function(){
						if( get_theme_mod( 'helphealth_medica_cta_status' ) ) {
						return true;
						} else {
						return false;
						}
					},
					'priority'    => 9
				)
			) 
		);
		
/* Service Section
----------------------------------------------------------------------*/
$wp_customize->add_section( 'helphealth_medical_service_options',
	array(
		'title'       => esc_html__( 'Services Section', 'helphealth-medical' ),
		'description' => '',
		'panel'       => 'helphealth_medical_frontpage_options',
		'priority' => 3,
		'divider' => 'before',
	)
);
		$wp_customize->add_setting( 'helphealth_medical_service_status', 
			array(
			  'default'  =>  false,
			  'sanitize_callback' => 'helphealth_medical_sanitize_checkbox',
			)
		);
		$wp_customize->add_control( 'helphealth_medical_service_status', 
			array(
			  'label'   => esc_html__( 'Show/hide Services Section', 'helphealth-medical' ),
			  'description'   => esc_html__( 'Check/Uncheck this box to show/hide service section on front page template.', 'helphealth-medical' ),
			  'section' => 'helphealth_medical_service_options',
			  'settings' => 'helphealth_medical_service_status',
			  'type'    => 'checkbox',
			  'priority' => 1
			)
		);

		//Section Heading
		$wp_customize->add_setting( 'helphealth_medical_service_heading', 
			array(
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'helphealth_medical_service_heading', 
			array(
			    'label'   => esc_html__( 'Section Heading', 'helphealth-medical' ),
				'section' => 'helphealth_medical_service_options',
				'type'    => 'text',
				'active_callback' => function(){
					 $service_status = get_theme_mod('helphealth_medical_service_status');
					 if($service_status){
						return true;
					 } else {
						 return false;
					 }
				},
				'priority'=> 2,
			) 
		);

		// Section subheading
		$wp_customize->add_setting( 'helphealth_medical_service_subheading', 
			array(
				'default' => '',
				'sanitize_callback' => 'sanitize_textarea_field',
				'transport' => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'helphealth_medical_service_subheading', 
			array(
				'label' => esc_html__('Section Subheading', 'helphealth-medical'),
				'description'=> '',
				'section' => 'helphealth_medical_service_options',
				'type' => 'textarea',
				'active_callback' => function(){
					 $service_status = get_theme_mod('helphealth_medical_service_status');
					 if($service_status){
						return true;
					 } else {
						 return false;
					 }
				},
				'priority' => 3,
			)
		);




// Total Number
$wp_customize->add_setting( 'services_total_items_show', 
	array(
		'default' => 6,
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'helphealth_medical_sanitize_number_range',
	)
);
$wp_customize->add_control( 'services_total_items_show', 
	array(
		'label' => esc_html__( 'Total Items to Show','helphealth-medical' ),
		'description' => esc_html__( 'After changing default value please save and reload','helphealth-medical' ),
		'type' => 'number',
		'section' => 'helphealth_medical_service_options',
		'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 6,
			'step'	=> 1,
		),
		'active_callback' => function(){
			 if(get_theme_mod('helphealth_medical_service_status')){
				return true;
			 } else {
				 return false;
			 }
		},
		'priority' => 4,
	)
);

// Content Type
$wp_customize->add_setting('services_content_type', 
	array(
	'default' 			=> 'services_page',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'helphealth_medical_sanitize_select'
	)
);
$wp_customize->add_control('services_content_type', 
	array(
		'label'       => __('Content Type', 'helphealth-medical'),
		'section'     => 'helphealth_medical_service_options',   
		'settings'    => 'services_content_type',		
		'type'        => 'select',
		'choices' => array(
				'services_page'	   => __('Page','helphealth-medical'),
				'services_post'	   => __('Post','helphealth-medical'),
		),
		'active_callback' => function(){
			 if(get_theme_mod('helphealth_medical_service_status')){
				return true;
			 } else {
				 return false;
			 }
		},
		'priority' => 5,
	)
);

$service_items = get_theme_mod( 'services_total_items_show', 6);
for( $i=1; $i<=$service_items; $i++ ) {
	//Icon
	$wp_customize->add_setting(
		'helphealth_medical_service_icon'.$i,
		array(
			'default'			=> '',
			'sanitize_callback' => 'sanitize_text_field' // Done
		)
	);

	$wp_customize->add_control( 'helphealth_medical_service_icon'.$i,
		array(
			/* translators: %1$s is replaced with number */
			'label'       => sprintf( __('Service #%1$s', 'helphealth-medical'), $i),
			/* translators: %1$s is replaced with number */
			'description'       => sprintf( __('Select a icon for service #%1$s from <a target="_blank" href="https://fontawesome.com/v4.7/icons/">Font Awesome icons</a> and enter it\'s class name. Example- fa-stethoscope', 'helphealth-medical'), $i),
			'section'		=> 'helphealth_medical_service_options',
			'type'			=> 'text',
			'active_callback' => function(){
				 $service_status = get_theme_mod('helphealth_medical_service_status');
				 if($service_status){
					return true;
				 } else {
					 return false;
				 }
			},
		)
	);

	//Page
	$wp_customize->add_setting('featured_service_page_'.$i.'', 
		array(
			'capability'        => 'edit_theme_options',	
			'sanitize_callback' => 'helphealth_medical_dropdown_pages'
		)
	);
	$wp_customize->add_control('featured_service_page_'.$i.'', 
		array(
			/* translators: %1$s is replaced with number */
			'description'       => sprintf( __('Select a page for Service #%1$s title and description', 'helphealth-medical'), $i),
			'section'     => 'helphealth_medical_service_options',   
			'settings'    => 'featured_service_page_'.$i.'',		
			'type'        => 'dropdown-pages',
			'active_callback' => function(){
				$service_status = get_theme_mod('helphealth_medical_service_status');
				$services_content_type = get_theme_mod('services_content_type');
				if($services_content_type == 'services_page' && $service_status == true ){
					return true;
				} else {
					 return false;
				}
			},
		)
	);

	// Posts
	$wp_customize->add_setting('featured_service_post_'.$i.'', 
		array(
			'capability'        => 'edit_theme_options',	
			'sanitize_callback' => 'helphealth_medical_dropdown_pages'
		)
	);
	$wp_customize->add_control('featured_service_post_'.$i.'', 
		array(
			/* translators: %1$s is replaced with number */
			'description' => sprintf( __('Select a Post for Service #%1$s title and text', 'helphealth-medical'), $i),
			'section'     => 'helphealth_medical_service_options',   
			'settings'    => 'featured_service_post_'.$i.'',		
			'type'        => 'select',
			'choices'	  => helphealth_medical_dropdown_posts(),
			'active_callback' => function(){
				$service_status = get_theme_mod('helphealth_medical_service_status');
				$services_content_type = get_theme_mod('services_content_type');
				if($services_content_type == 'services_post' && $service_status == true ){
					return true;
				} else {
					 return false;
				}
			},
		)
	);
}
	
/* Our Department Section
----------------------------------------------------------------------*/
$wp_customize->add_section( 'helphealth_medical_departments_options',
	array(
		'title'       => esc_html__( 'Department Section', 'helphealth-medical' ),
		'description' => '',
		'panel'       => 'helphealth_medical_frontpage_options',
		'priority' => 4,
		'divider' => 'before',
	)
);

		$wp_customize->add_setting( 'helphealth_medical_department_status', 
			array(
			  'default'  =>  false,
			  'sanitize_callback' => 'helphealth_medical_sanitize_checkbox',
			)
		);
		$wp_customize->add_control( 'helphealth_medical_department_status', 
			array(
			  'label'   => esc_html__( 'Show/hide Department Section', 'helphealth-medical' ),
			  'description'   => esc_html__( 'Check/Uncheck this box to show/hide Department section on front page template.', 'helphealth-medical' ),
			  'section' => 'helphealth_medical_departments_options',
			  'settings' => 'helphealth_medical_department_status',
			  'type'    => 'checkbox',
			  'priority' => 1
			)
		);

		//Section Heading
		$wp_customize->add_setting( 'helphealth_medical_department_heading', 
			array(
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			) 
		);
		$wp_customize->add_control( 'helphealth_medical_department_heading', 
			array(
			    'label'   => esc_html__( 'Section Heading', 'helphealth-medical' ),
				'section' => 'helphealth_medical_departments_options',
				'type'    => 'text',
				'priority'=> 2,
				'active_callback' => function(){
					 $department_status = get_theme_mod('helphealth_medical_department_status');
					 if($department_status){
						return true;
					 } else {
						 return false;
					 }
				},
			) 
		);

		// Section subheading
		$wp_customize->add_setting( 'helphealth_medical_department_subheading', 
			array(
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			) 
		);
		$wp_customize->add_control( 'helphealth_medical_department_subheading', 
			array(
				'label' => esc_html__('Section Subheading', 'helphealth-medical'),
				'description'=> '',
				'section' => 'helphealth_medical_departments_options',
				'type' => 'text',
				'priority' => 3,
				'active_callback' => function(){
					 $department_status = get_theme_mod('helphealth_medical_department_status');
					 if($department_status){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
		
		// Total Number
        $wp_customize->add_setting( 'helphealth_medical_total_dept_count', 
		 	array(
				'default' => 4,
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'helphealth_medical_sanitize_number_range',
			) 
		);
		$wp_customize->add_control( 'helphealth_medical_total_dept_count', 
			array(
				'label' => esc_html__( 'Total Items to Show','helphealth-medical' ),
				'description' => esc_html__( 'After changing default value please save and reload','helphealth-medical' ),
				'type' => 'number',
				'section' => 'helphealth_medical_departments_options',
				'input_attrs' => array(
					'min'	=> 1,
					'max'	=> 5,
					'step'	=> 1,
				),
				'active_callback' => function(){
					 $department_status = get_theme_mod('helphealth_medical_department_status');
					 if($department_status){
						return true;
					 } else {
						 return false;
					 }
				},
				'priority' => 4,
			)
		);
		// Content Type
		$wp_customize->add_setting('depeartment_content_type', 
			array(
			'default' 			=> 'depeartment_featured_page',
			'capability'        => 'edit_theme_options',	
			'sanitize_callback' => 'helphealth_medical_sanitize_select'
			)
		);
		$wp_customize->add_control('depeartment_content_type', 
			array(
				'label'       => __('Content Type', 'helphealth-medical'),
				'section'     => 'helphealth_medical_departments_options',   
				'settings'    => 'depeartment_content_type',		
				'type'        => 'select',
				'active_callback' => function(){
					 $department_status = get_theme_mod('helphealth_medical_department_status');
					 if($department_status){
						return true;
					 } else {
						 return false;
					 }
				},
				'choices' => array(
						'depeartment_featured_page'	   => __('Page','helphealth-medical'),
						'depeartment_featured_post'	   => __('Post','helphealth-medical'),
				),
				'priority' => 5,
			)
		);
		$dept_items = get_theme_mod( 'helphealth_medical_total_dept_count', 4);
		for( $i=1; $i<=$dept_items; $i++ ) {
			// Page
			$wp_customize->add_setting('featured_dept_page_'.$i.'', 
				array(
					'capability'        => 'edit_theme_options',	
					'sanitize_callback' => 'helphealth_medical_dropdown_pages'
				)
			);
			$wp_customize->add_control('featured_dept_page_'.$i.'', 
				array(
					/* translators: %1$s is replaced with number */
					'label'       => sprintf( __('Item #%1$s', 'helphealth-medical'), $i),
					/* translators: %1$s is replaced with number */
					'description'       => sprintf( __('Select a Page for item #%1$s title, text and picture ', 'helphealth-medical'), $i),
					'section'     => 'helphealth_medical_departments_options',   
					'settings'    => 'featured_dept_page_'.$i.'',		
					'type'        => 'dropdown-pages',
					'active_callback' => function(){
						$dept_content_type = get_theme_mod('depeartment_content_type');
						$department_status = get_theme_mod('helphealth_medical_department_status');
						if($dept_content_type == 'depeartment_featured_page' && $department_status == true){
							return true;
						} else {
							 return false;
						}
					},
					'priority' => 6,
				)
			);
			// Posts
			$wp_customize->add_setting('featured_dept_post_'.$i.'', 
				array(
					'capability'        => 'edit_theme_options',	
					'sanitize_callback' => 'helphealth_medical_dropdown_pages'
				)
			);
			$wp_customize->add_control('featured_dept_post_'.$i.'', 
				array(
					/* translators: %1$s is replaced with number */
					'label'       => sprintf( __('Item #%1$s', 'helphealth-medical'), $i),
					/* translators: %1$s is replaced with number */
					'description'       => sprintf( __('Select a Post for item #%1$s title, text and picture', 'helphealth-medical'), $i),
					'section'     => 'helphealth_medical_departments_options',   
					'settings'    => 'featured_dept_post_'.$i.'',		
					'type'        => 'select',
					'choices'	  => helphealth_medical_dropdown_posts(),
					'active_callback' => function(){
						 $dept_content_type = get_theme_mod('depeartment_content_type');
						 $department_status = get_theme_mod('helphealth_medical_department_status');
						 if( $dept_content_type == 'depeartment_featured_post' && $department_status == true ){
							return true;
						 } else {
							 return false;
						 }
					},
					'priority' => 7,
				)
			);

		}

		// Button Text
		$wp_customize->add_setting('helphealth_medical_dept_btn_text',
			 array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => '',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control('helphealth_medical_dept_btn_text',
			 array(
				'label'     => esc_html__('Button Text', 'helphealth-medical'),
				'description' => '',
				'type'    => 'text',
				'section'   => 'helphealth_medical_departments_options',
				'priority' => 8,
				'active_callback' => function(){
					 $department_status = get_theme_mod('helphealth_medical_department_status');
					 if($department_status){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);

		// Button URL
		$wp_customize->add_setting('helphealth_medical_dept_btn_url', 
			array(
				'sanitize_callback' => 'esc_url_raw',
				'default'           => '',
			)
		);
		$wp_customize->add_control('helphealth_medical_dept_btn_url', 
			array(
				'label'    => esc_html__('Button Link', 'helphealth-medical'),
				'description' => esc_html__( 'Start with http:// or https://', 'helphealth-medical' ),
				'type'    => 'url',
				'section'  => 'helphealth_medical_departments_options',
				'priority' => 9,
				'active_callback' => function(){
					 $department_status = get_theme_mod('helphealth_medical_department_status');
					 if($department_status){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);

		// Button Target
		$wp_customize->add_setting( 'helphealth_medical_dept_btn_target',
			array(
				'sanitize_callback' => 'helphealth_medical_sanitize_checkbox',
				'default'           => 1,
				//'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 'helphealth_medical_dept_btn_target',
			array(
				'type'        => 'checkbox',
				'label'       => esc_html__( 'Open on new tab?', 'helphealth-medical' ),
				'section'     => 'helphealth_medical_departments_options',
				'priority' => 10,
				'active_callback' => function(){
					 $department_status = get_theme_mod('helphealth_medical_department_status');
					 if($department_status){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);

/* Our Mission Section
----------------------------------------------------------------------*/
$wp_customize->add_section( 'helphealth_medical_mission_options',
	array(
		'title'       => esc_html__( 'Mission Section', 'helphealth-medical' ),
		'description' => '',
		'panel'       => 'helphealth_medical_frontpage_options',
		'priority' => 5,
		'divider' => 'before',
	)
);
		$wp_customize->add_setting( 'helphealth_medical_mission_status', 
			array(
			  'default'  =>  false,
			  'sanitize_callback' => 'helphealth_medical_sanitize_checkbox',
			)
		);
		$wp_customize->add_control( 'helphealth_medical_mission_status', 
			array(
			  'label'   => esc_html__( 'Show/hide Mission Section', 'helphealth-medical' ),
			  'description'   => esc_html__( 'Check/Uncheck this box to show/hide mission section on front page template.', 'helphealth-medical' ),
			  'section' => 'helphealth_medical_mission_options',
			  'settings' => 'helphealth_medical_mission_status',
			  'type'    => 'checkbox',
			  
			  'priority' => 1
			)
		);
		
		//Section Heading
		$wp_customize->add_setting( 'helphealth_medical_mission_heading', 
			array(
				'default' => esc_html__('Our Mission & Values', 'helphealth-medical'),
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'helphealth_medical_mission_heading', 
			array(
			    'label'   => esc_html__( 'Section Heading', 'helphealth-medical' ),
				'section' => 'helphealth_medical_mission_options',
				'type'    => 'text',
				'priority'=> 2,
				'active_callback' => function(){
					 $mission_status = get_theme_mod('helphealth_medical_mission_status');
					 if($mission_status){
						return true;
					 } else {
						 return false;
					 }
				},
			) 
		);
		// Background Image
		$wp_customize->add_setting( 'helphealth_medical_mission_bg_image', 
			array(
				'default'           => get_template_directory_uri() . '/assets/img/mission.jpg',
				'sanitize_callback'   =>  'helphealth_medical_sanitize_image',
			)
		);
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'helphealth_medical_mission_bg_image', 
			array(
				'label'             => esc_html__('Background Image', 'helphealth-medical'),
				'description'       => esc_html__('Recommended image is is 1920px by 1080px', 'helphealth-medical'),
				'section'           => 'helphealth_medical_mission_options',
				'settings'          => 'helphealth_medical_mission_bg_image',
				'priority' 			=> 3,
				'active_callback' => function(){
					 $mission_status = get_theme_mod('helphealth_medical_mission_status');
					 if($mission_status){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		));
		// Title
		$wp_customize->add_setting( 'helphealth_medical_mission_title', 
			array(
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'helphealth_medical_mission_title', 
			array(
				'label' => esc_html__('Title', 'helphealth-medical'),
				'description'=> '',
				'section' => 'helphealth_medical_mission_options',
				'type' => 'text',
				'priority' => 4,
				'active_callback' => function(){
					 $mission_status = get_theme_mod('helphealth_medical_mission_status');
					 if($mission_status){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
		
		// Description
		$wp_customize->add_setting( 'helphealth_medical_mission_desc', 
			array(
				'default' => '',
				'sanitize_callback' => 'sanitize_textarea_field',
				'transport' => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'helphealth_medical_mission_desc', 
			array(
				'label' => esc_html__('Description', 'helphealth-medical'),
				'description'=> '',
				'section' => 'helphealth_medical_mission_options',
				'type' => 'textarea',
				'priority' => 5,
				'active_callback' => function(){
					 $mission_status = get_theme_mod('helphealth_medical_mission_status');
					 if($mission_status){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);

		// Button Text
		$wp_customize->add_setting('helphealth_medical_mission_btn_text',
			 array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control('helphealth_medical_mission_btn_text',
			 array(
				'label'     => esc_html__( 'Button Text', 'helphealth-medical' ),
				'description' => '',
				'type'    => 'text',
				'section'   => 'helphealth_medical_mission_options',
				'priority'    => 6,
				'active_callback' => function(){
					 $mission_status = get_theme_mod('helphealth_medical_mission_status');
					 if($mission_status){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);

		// Button URL
		$wp_customize->add_setting('helphealth_medical_mission_btn_url', 
			array(
				'sanitize_callback' => 'esc_url_raw',
				'default'           => '',
				//'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control('helphealth_medical_mission_btn_url', 
			array(
				'label'    => esc_html__('Button Link', 'helphealth-medical'),
				'description' => esc_html__( 'Start with http:// or https://', 'helphealth-medical' ),
				'type'    => 'url',
				'section'  => 'helphealth_medical_mission_options',
				'priority'    => 7,
				'active_callback' => function(){
					 $mission_status = get_theme_mod('helphealth_medical_mission_status');
					 if($mission_status){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);

		// Button Target
		$wp_customize->add_setting( 'helphealth_medical_banner_btn_trgt',
			array(
				'sanitize_callback' => 'helphealth_medical_sanitize_checkbox',
				'default'           => false,
				//'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 'helphealth_medical_banner_btn_trgt',
			array(
				'type'        => 'checkbox',
				'label'       => esc_html__( 'Open in New Tab?', 'helphealth-medical' ),
				'section'     => 'helphealth_medical_mission_options',
				'priority'    => 8,
				'active_callback' => function(){
					 $mission_status = get_theme_mod('helphealth_medical_mission_status');
					 if($mission_status){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);

		// Background color
		$wp_customize->add_setting( 'helphealth_medical_mission_bg_color', array(
				'sanitize_callback'    => 'sanitize_hex_color_no_hash',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
				'default'              => ''
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 'helphealth_medical_mission_bg_color',
				array(
					'label'       => esc_html__( 'Background Color', 'helphealth-medical' ),
					'description' => '',
					'section'     => 'helphealth_medical_mission_options',
					'active_callback' => function(){
						 $mission_status = get_theme_mod('helphealth_medical_mission_status');
						 if($mission_status){
							return true;
						 } else {
							 return false;
						 }
					},
					'priority'    => 9
				)
			) 
		);
		
	

/* Features Section
----------------------------------------------------------------------*/
$wp_customize->add_section( 'helphealth_medical_features_options',
	array(
		'title'       => esc_html__( 'Features Section', 'helphealth-medical' ),
		'description' => '',
		'panel'       => 'helphealth_medical_frontpage_options',
		'priority' => 6,
	)
);
		$wp_customize->add_setting( 'helphealth_medical_features_status', 
			array(
			  'default'  =>  false,
			  'sanitize_callback' => 'helphealth_medical_sanitize_checkbox',
			)
		);
		$wp_customize->add_control( 'helphealth_medical_features_status', 
			array(
			  'label'   => esc_html__( 'Show/hide Features Section', 'helphealth-medical' ),
			  'description'   => esc_html__( 'Check/Uncheck this box to show/hide features section on front page template.', 'helphealth-medical' ),
			  'section' => 'helphealth_medical_features_options',
			  'settings' => 'helphealth_medical_features_status',
			  'type'    => 'checkbox',
			  'priority' => 1
			)
		);
		

	for( $i = 1; $i <=3; $i++ ) {
		//Title
		$wp_customize->add_setting( 'helphealth_medical_feature_title_'.$i,
			array(
				'dafult'=> '',
				'sanitize_callback'=> 'sanitize_text_field', 
				'transport' => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'helphealth_medical_feature_title_'.$i, 
			array(
				'label' => esc_html__('Title ', 'helphealth-medical' ) .$i,
				'description' => '',
			    'type'    => 'text',
				'section' => 'helphealth_medical_features_options',
				'active_callback' => function(){
					 if( get_theme_mod('helphealth_medical_features_status') ){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
		//Description
		$wp_customize->add_setting( 'helphealth_medical_feature_desc_'.$i,
			array(
				'dafult'=> '',
				'sanitize_callback'=> 'sanitize_text_field',
				'transport' => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'helphealth_medical_feature_desc_'.$i, 
			array(
				'label' => esc_html__('Description ', 'helphealth-medical' ) .$i,
				'description' => '',
				'section' => 'helphealth_medical_features_options',
				'type' => 'text',
				'active_callback' => function(){
					 if( get_theme_mod('helphealth_medical_features_status') ){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
	}
		// BG Color
		$wp_customize->add_setting( 'helphealth_medical_features_bg_color',
			array(
				'sanitize_callback'    => 'sanitize_hex_color_no_hash',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
				'default'              => ''
			) 
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 'helphealth_medical_features_bg_color',
				array(
					'label'                 => esc_html__( 'Background Color', 'helphealth-medical' ),
					'description'           => '',
					'section'               => 'helphealth_medical_features_options',
					'active_callback' => function(){
						 if( get_theme_mod('helphealth_medical_features_status') ){
							return true;
						 } else {
							 return false;
						 }
					},
				)
			) 
		);

/* Testimonials Section
----------------------------------------------------------------------*/
$wp_customize->add_section( 'helphealth_medical_testimonial_options',
	array(
		'title'       => esc_html__( 'Testimonials Section', 'helphealth-medical' ),
		'description' => '',
		'panel'       => 'helphealth_medical_frontpage_options',
		'priority' => 7,
	)
);
		// Section Hide/show
		$wp_customize->add_setting( 'helphealth_medical_testimonial_status', 
			array(
			  'default'  =>  false,
			  'sanitize_callback' => 'helphealth_medical_sanitize_checkbox',
			)
		);
		$wp_customize->add_control( 'helphealth_medical_testimonial_status', 
			array(
			  'label'   => esc_html__( 'Show/hide Testimonials Section', 'helphealth-medical' ),
			  'description'   => esc_html__( 'Check/Uncheck this box to show/hide testimonials section on front page template.', 'helphealth-medical' ),
			  'section' => 'helphealth_medical_testimonial_options',
			  'settings' => 'helphealth_medical_testimonial_status',
			  'type'    => 'checkbox',
			  'priority' => 1
			)
		);
		// Total Number
        $wp_customize->add_setting( 'testimonials_total_items_show', 
		 	array(
				'default' => 3,
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'helphealth_medical_sanitize_number_range',
			) 
		);
		$wp_customize->add_control( 'testimonials_total_items_show', 
			array(
				'label' => esc_html__( 'Total Testimonials to Show','helphealth-medical' ),
				'description' => '',
				'type' => 'number',
				'section' => 'helphealth_medical_testimonial_options',
				'input_attrs' => array(
					'min'	=> 1,
					'max'	=> 5,
					'step'	=> 1,
				),
				'active_callback' => function(){
					 $testimonial_status = get_theme_mod('helphealth_medical_testimonial_status');
					 if($testimonial_status){
						return true;
					 } else {
						 return false;
					 }
				},
				'priority' => 2,
			)
		);
		// Content Type
		$wp_customize->add_setting('testimonial_content_type', 
			array(
			'default' 			=> '',
			'capability'        => 'edit_theme_options',	
			'sanitize_callback' => 'helphealth_medical_sanitize_select'
			)
		);
		$wp_customize->add_control('testimonial_content_type', 
			array(
				'label'       => __('Content Type', 'helphealth-medical'),
				'section'     => 'helphealth_medical_testimonial_options',   
				'settings'    => 'testimonial_content_type',		
				'type'        => 'select',
				'active_callback' => function(){
					 $testimonial_status = get_theme_mod('helphealth_medical_testimonial_status');
					 if($testimonial_status){
						return true;
					 } else {
						 return false;
					 }
				},
				'choices' => array(
						'testimonial_page'	   => __('Page','helphealth-medical'),
						'tesimonial_post'	   => __('Post','helphealth-medical'),
				),
				'priority' => 3,
			)
		);
		$testimonial_items = get_theme_mod( 'testimonials_total_items_show', 3);
		for( $i=1; $i<=$testimonial_items; $i++ ) {
			// Page
			$wp_customize->add_setting('featured_testimonial_page_'.$i.'', 
				array(
					'capability'        => 'edit_theme_options',	
					'sanitize_callback' => 'helphealth_medical_dropdown_pages'
				)
			);
			$wp_customize->add_control('featured_testimonial_page_'.$i.'', 
				array(
					/* translators: %1$s is replaced with number */
					'label'       => sprintf( __('Testimonial #%1$s', 'helphealth-medical'), $i),
					/* translators: %1$s is replaced with number */
					'description'       => sprintf( __('Select a Page for client #%1$s Name, Quote and picture ', 'helphealth-medical'), $i),
					'section'     => 'helphealth_medical_testimonial_options',   
					'settings'    => 'featured_testimonial_page_'.$i.'',		
					'type'        => 'dropdown-pages',
					'active_callback' => function(){
						$testi_content_type = get_theme_mod('testimonial_content_type');
						if($testi_content_type == 'testimonial_page'){
							return true;
						} else {
							 return false;
						}
					},
				)
			);
			// Posts
			$wp_customize->add_setting('featured_testimonial_post_'.$i.'', 
				array(
					'capability'        => 'edit_theme_options',	
					'sanitize_callback' => 'helphealth_medical_dropdown_pages'
				)
			);
			$wp_customize->add_control('featured_testimonial_post_'.$i.'', 
				array(
					/* translators: %1$s is replaced with number */
					'label'       => sprintf( __('Testimonial #%1$s', 'helphealth-medical'), $i),
					/* translators: %1$s is replaced with number */
					'description'       => sprintf( __('Select a Post for client #%1$s Name, Quote and picture', 'helphealth-medical'), $i),
					'section'     => 'helphealth_medical_testimonial_options',   
					'settings'    => 'featured_testimonial_post_'.$i.'',		
					'type'        => 'select',
					'choices'	  => helphealth_medical_dropdown_posts(),
					'active_callback' => function(){
						 $testi_content_type = get_theme_mod('testimonial_content_type');
						 if($testi_content_type == 'tesimonial_post'){
							return true;
						 } else {
							 return false;
						 }
					},
				)
			);
			// Position
			$wp_customize->add_setting('featured_testimonial_position_'.$i.'', 
				array(
					'capability'        => 'edit_theme_options',	
					'sanitize_callback' => 'sanitize_text_field'
				)
			);
			$wp_customize->add_control('featured_testimonial_position_'.$i.'', 
				array(
					'label'       => '',
					/* translators: %1$s is replaced with number */
					'description'       => sprintf( __('Client #%1$s designation', 'helphealth-medical'), $i),
					'type'        => 'text',
					'section'     => 'helphealth_medical_testimonial_options',   
					'settings'    => 'featured_testimonial_position_'.$i.'',		
					'active_callback' => function(){
						 $testimonial_status = get_theme_mod('helphealth_medical_testimonial_status');
						 if( !empty($testimonial_status) ){
							return true;
						 } else {
							 return false;
						 }
					},	

				)
			);
		}

		// BG Color
		$wp_customize->add_setting( 'helphealth_medical_testimonial_bg_color',
			array(
				'sanitize_callback'    => 'sanitize_hex_color_no_hash',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
				'default'              => '#FFF7F8'
			) 
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 'helphealth_medical_testimonial_bg_color',
				array(
					'label'                 => esc_html__( 'Background Color', 'helphealth-medical' ),
					'section'               => 'helphealth_medical_testimonial_options',
					'description'           => '',
					'active_callback' => function(){
						 $testimonial_status = get_theme_mod('helphealth_medical_testimonial_status');
						 if($testimonial_status){
							return true;
						 } else {
							 return false;
						 }
					},
				)
			) 
		);

		// To BG Color
		$wp_customize->add_setting( 'helphealth_medical_testimonial_topbg_color',
			array(
				'sanitize_callback'    => 'sanitize_hex_color_no_hash',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
				'default'              => '#005584'
			) 
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 'helphealth_medical_testimonial_topbg_color',
				array(
					'label'                 => esc_html__( 'Top Background Color', 'helphealth-medical' ),
					'section'               => 'helphealth_medical_testimonial_options',
					'description'           => '',
					'active_callback' => function(){
						 $testimonial_status = get_theme_mod('helphealth_medical_testimonial_status');
						 if($testimonial_status){
							return true;
						 } else {
							 return false;
						 }
					},
				)
			) 
		);

		
/* Blog Section
----------------------------------------------------------------------*/
$wp_customize->add_section( 'helphealth_medical_recent_posts_options',
	array(
		'title'       => esc_html__( 'Blog Section', 'helphealth-medical' ),
		'description' => '',
		'panel'       => 'helphealth_medical_frontpage_options',
		'priority' => 8,
	)
);
		// Section Hide/show
		$wp_customize->add_setting( 'helphealth_medical_recent_posts_status', 
			array(
			  'default'  =>  false,
			  'sanitize_callback' => 'helphealth_medical_sanitize_checkbox',
			)
		);
		$wp_customize->add_control( 'helphealth_medical_recent_posts_status', 
			array(
			  'label'   => esc_html__( 'Show/hide Blog Section', 'helphealth-medical' ),
			  'description'   => esc_html__( 'Check/Uncheck this box to show/hide recent posts section on front page template.', 'helphealth-medical' ),
			  'section' => 'helphealth_medical_recent_posts_options',
			  'settings' => 'helphealth_medical_recent_posts_status',
			  'type'    => 'checkbox',
			  'priority' => 1
			)
		);

		//Section Heading
		$wp_customize->add_setting( 'helphealth_medical_recent_posts_heading', 
			array(
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'helphealth_medical_recent_posts_heading', 
			array(
			    'label'   => esc_html__( 'Section Heading', 'helphealth-medical' ),
				'section' => 'helphealth_medical_recent_posts_options',
				'type'    => 'text',
				'priority'=> 2,
				'active_callback' => function(){
					 $blog_status = get_theme_mod('helphealth_medical_recent_posts_status');
					 if($blog_status){
						return true;
					 } else {
						 return false;
					 }
				},
			) 
		);
		// Section subheading
		$wp_customize->add_setting( 'helphealth_medical_recent_posts_subheading', 
			array(
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'helphealth_medical_recent_posts_subheading', 
			array(
				'label' => esc_html__('Section Subheading', 'helphealth-medical'),
				'description'=> '',
				'section' => 'helphealth_medical_recent_posts_options',
				'type' => 'text',
				'priority' => 3,
				'active_callback' => function(){
					 $blog_status = get_theme_mod('helphealth_medical_recent_posts_status');
					 if($blog_status){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
		
		// Latest Posts
		$wp_customize->add_setting( 'helphealth_medical_recent_post_type', 
	        array(
	            'default'           => 'latest-post',
	            'sanitize_callback' => 'helphealth_medical_sanitize_choices'
	        ) 
	    );
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'helphealth_medical_recent_post_type',
				array(
					'label'		  => esc_html__( 'Choose Post Type', 'helphealth-medical' ),
					'description' => '',
					'section'	  => 'helphealth_medical_recent_posts_options',
					'type'        => 'select',
					'choices'	  => array(
						'latest-post'  => esc_html__('Latest Posts','helphealth-medical'),
						'select-category'  => esc_html__('Select Category','helphealth-medical'),
					),
					'priority' => 4,
					'active_callback' => function(){
						 $blog_status = get_theme_mod('helphealth_medical_recent_posts_status');
						 if($blog_status){
							return true;
						 } else {
							 return false;
						 }
					},
				)
			)
		);

		// Select Category
		$wp_customize->add_setting('helphealth_medical_recent_category_choice',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			new Helphealth_Medical_Dropdown_Taxonomies_Control( $wp_customize, 
			'helphealth_medical_recent_category_choice',
			    array(
			        'label'       => esc_html__('Select Category', 'helphealth-medical'),
			        'description' => '',
			        'section'     => 'helphealth_medical_recent_posts_options',
			        'type'        => 'dropdown-taxonomies',
			        'taxonomy'    => 'category',
			        'settings'	  => 'helphealth_medical_recent_category_choice',
			        'priority'    => 5,
					'active_callback' => function(){
						 $blog_status = get_theme_mod('helphealth_medical_recent_posts_status');
						 $blog_type = get_theme_mod('helphealth_medical_recent_post_type');
						 if($blog_status && $blog_type == 'select-category' ){
							return true;
						 } else {
							 return false;
						 }
					},
		    	)
			)
		);

		// Display Post Thumbnail.
		$wp_customize->add_setting( 'helphealth_medical_recent_post_thumb_display',
			array(
				'default'			=> true,
				'sanitize_callback'	=> 'helphealth_medical_sanitize_checkbox'
			)
		);
		$wp_customize->add_control( 'helphealth_medical_recent_post_thumb_display',
			array(
				'label'			=> __( 'Display Post Thumbnail?', 'helphealth-medical' ),
				'description'	=> __( 'Check/Uncheck to show/hide post thumbnail image', 'helphealth-medical' ),
				'section'		=> 'helphealth_medical_recent_posts_options',
				'type'			=> 'checkbox',
				'active_callback' => function(){
					 if(get_theme_mod('helphealth_medical_recent_posts_status')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);

		// Display Post Meta.
		$wp_customize->add_setting( 'helphealth_medical_recent_post_meta_display',
			array(
				'default'			=> true,
				'sanitize_callback'	=> 'helphealth_medical_sanitize_checkbox'
			)
		);
		$wp_customize->add_control( 'helphealth_medical_recent_post_meta_display',
			array(
				'label'			=> __( 'Display post meta?', 'helphealth-medical' ),
				'description'	=> __( 'Check/Uncheck to show/hide meta information', 'helphealth-medical' ),
				'section'		=> 'helphealth_medical_recent_posts_options',
				'type'			=> 'checkbox',
				'active_callback' => function(){
					 if(get_theme_mod('helphealth_medical_recent_posts_status')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);

		// Display Categories Meta.
		$wp_customize->add_setting( 'helphealth_medical_recent_post_cat_display',
			array(
				'default'			=> true,
				'sanitize_callback'	=> 'helphealth_medical_sanitize_checkbox'
			)
		);
		$wp_customize->add_control( 'helphealth_medical_recent_post_cat_display',
			array(
				'section'		=> 'helphealth_medical_recent_posts_options',
				'type'			=> 'checkbox',
				'label'			=> __( 'Display Categories', 'helphealth-medical' ),
				'active_callback' => function(){
					 $blog_status = get_theme_mod('helphealth_medical_recent_posts_status');
					 $meta_display = get_theme_mod('helphealth_medical_recent_post_meta_display');
					 if($blog_status && $meta_display == true){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);	

		// Display Date Meta.
		$wp_customize->add_setting( 'helphealth_medical_recent_post_date_display',
			array(
				'default'			=> true,
				'sanitize_callback'	=> 'helphealth_medical_sanitize_checkbox'
			)
		);
		$wp_customize->add_control( 'helphealth_medical_recent_post_date_display',
			array(
				'section'		=> 'helphealth_medical_recent_posts_options',
				'type'			=> 'checkbox',
				'label'			=> __( 'Display Date', 'helphealth-medical' ),
				'active_callback' => function(){
					 $blog_status = get_theme_mod('helphealth_medical_recent_posts_status');
					 $meta_display = get_theme_mod('helphealth_medical_recent_post_meta_display');
					 if($blog_status && $meta_display == true){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);

		// Read More Text
		$wp_customize->add_setting( 'helphealth_recentpost_readmore_text', 
		 	array(
				'default'    => esc_html__( 'Read More', 'helphealth-medical' ),
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'helphealth_recentpost_readmore_text', 
			array(
				'label' => esc_html__( 'Read More Text','helphealth-medical' ),
				'description' => '',
				'type' => 'text',
				'section' => 'helphealth_medical_recent_posts_options',
				'active_callback' => function(){
					 if(get_theme_mod('helphealth_medical_recent_posts_status')){
						return true;
					 } else {
						 return false;
					 }
				},

			)
		);
				
		// Post height settings
		$wp_customize->add_setting( 'helphealth_medical_recent_post_style',
			array(
				'sanitize_callback' => 'helphealth_medical_sanitize_choices',
				'default'           => 'equal-height',
			)
		);
		$wp_customize->add_control( 'helphealth_medical_recent_post_style',
			array(
				'type'        => 'select',
				'label'       => esc_html__( 'Post height', 'helphealth-medical' ),
				'section'     => 'helphealth_medical_recent_posts_options',
				'choices'     => array(
					'equal-height'  => esc_html__( 'Equal Height', 'helphealth-medical' ),
					'no-height' => esc_html__( 'Not Equal Height', 'helphealth-medical' ),
				),
				'active_callback' => function(){
					 if(get_theme_mod('helphealth_medical_recent_posts_status')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);


/* Contact Section
----------------------------------------------------------------------*/
$wp_customize->add_section( 'helphealth_medical_schedule_options',
	array(
		'title'       => esc_html__( 'Contact Section', 'helphealth-medical' ),
		'description' => '',
		'panel'       => 'helphealth_medical_frontpage_options',
		'priority' => 9,
	)
);
		// Section Hide/show
		$wp_customize->add_setting( 'helphealth_medical_schedule_status', 
			array(
			  'default'  =>  false,
			  'sanitize_callback' => 'helphealth_medical_sanitize_checkbox',
			)
		);
		$wp_customize->add_control( 'helphealth_medical_schedule_status', 
			array(
			  'label'   => esc_html__( 'Show/hide Contact Section', 'helphealth-medical' ),
			  'description'   => esc_html__( 'Check/Uncheck this box to show/hide contact section on front page template.', 'helphealth-medical' ),
			  'section' => 'helphealth_medical_schedule_options',
			  'settings' => 'helphealth_medical_schedule_status',
			  'type'    => 'checkbox',
			  'priority' => 1
			)
		);
		
		//Section Heading
		$wp_customize->add_setting( 'helphealth_medical_schedule_heading', 
			array(
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'helphealth_medical_schedule_heading', 
			array(
			    'label'   => esc_html__( 'Section Heading', 'helphealth-medical' ),
				'section' => 'helphealth_medical_schedule_options',
				'type'    => 'text',
				'priority'=> 2,
				'active_callback' => function(){
					 $testimonial_status = get_theme_mod('helphealth_medical_schedule_status');
					 if($testimonial_status){
						return true;
					 } else {
						 return false;
					 }
				},
			) 
		);
		
		// Section subheading
		$wp_customize->add_setting( 'helphealth_medical_schedule_subheading', 
			array(
				'default' => '',
				'sanitize_callback' => 'sanitize_textarea_field',
				'transport' => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'helphealth_medical_schedule_subheading', 
			array(
				'label' => esc_html__('Section Subheading', 'helphealth-medical'),
				'description'=> '',
				'section' => 'helphealth_medical_schedule_options',
				'type' => 'textarea',
				'priority' => 3,
				'active_callback' => function(){
					 $testimonial_status = get_theme_mod('helphealth_medical_schedule_status');
					 if($testimonial_status){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
		
		// Office Name
		$wp_customize->add_setting( 'helphealth_medical_contact_office_1', 
			array(
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'helphealth_medical_contact_office_1', 
			array(
				'label' => esc_html__('Office 1 Title', 'helphealth-medical'),
				'description'=> '',
				'section' => 'helphealth_medical_schedule_options',
				'type' => 'text',
				'priority' => 4,
				'active_callback' => function(){
					 $testimonial_status = get_theme_mod('helphealth_medical_schedule_status');
					 if($testimonial_status){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
		
		// Address
		$wp_customize->add_setting( 'helphealth_medical_office_1_adderess', 
			array(
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
				//'transport' => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'helphealth_medical_office_1_adderess', 
			array(
				'label' => '',
				'description' => esc_html__('Office 1 Address', 'helphealth-medical'),
				'section' => 'helphealth_medical_schedule_options',
				'type' => 'text',
				'priority' => 5,
				'active_callback' => function(){
					 $testimonial_status = get_theme_mod('helphealth_medical_schedule_status');
					 if($testimonial_status){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
		
		// Phone
		$wp_customize->add_setting( 'helphealth_medical_office_1_phone', 
			array(
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
				//'transport' => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'helphealth_medical_office_1_phone', 
			array(
				'label' => '',
				'description' => esc_html__('Office 1 Phone', 'helphealth-medical'),
				'section' => 'helphealth_medical_schedule_options',
				'type' => 'text',
				'priority' => 6,
				'active_callback' => function(){
					 $testimonial_status = get_theme_mod('helphealth_medical_schedule_status');
					 if($testimonial_status){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);

		// Email
		$wp_customize->add_setting( 'helphealth_medical_office_1_email', 
			array(
				'default' => '',
				'sanitize_callback' => 'helphealth_medical_sanitize_email',
				//'transport' => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'helphealth_medical_office_1_email', 
			array(
				'label' => '',
				'description' => esc_html__('Office 1 Email', 'helphealth-medical'),
				'section' => 'helphealth_medical_schedule_options',
				'type' => 'text',
				'priority' => 7,
				'active_callback' => function(){
					 $testimonial_status = get_theme_mod('helphealth_medical_schedule_status');
					 if($testimonial_status){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);

		// Office Name
		$wp_customize->add_setting( 'helphealth_medical_contact_office_2', 
			array(
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'helphealth_medical_contact_office_2', 
			array(
				'label' => esc_html__('Office 2 Title', 'helphealth-medical'),
				'description'=> '',
				'section' => 'helphealth_medical_schedule_options',
				'type' => 'text',
				'priority' => 8,
				'active_callback' => function(){
					 $testimonial_status = get_theme_mod('helphealth_medical_schedule_status');
					 if($testimonial_status){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
		
		// Address
		$wp_customize->add_setting( 'helphealth_medical_office_2_adderess', 
			array(
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
				//'transport' => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'helphealth_medical_office_2_adderess', 
			array(
				'label' => '',
				'description' => esc_html__('Office 2 Address', 'helphealth-medical'),
				'section' => 'helphealth_medical_schedule_options',
				'type' => 'text',
				'priority' => 9,
				'active_callback' => function(){
					 $testimonial_status = get_theme_mod('helphealth_medical_schedule_status');
					 if($testimonial_status){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
		
		// Phone
		$wp_customize->add_setting( 'helphealth_medical_office_2_phone', 
			array(
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
				//'transport' => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'helphealth_medical_office_2_phone', 
			array(
				'label' => '',
				'description' => esc_html__('Office 2 Phone', 'helphealth-medical'),
				'section' => 'helphealth_medical_schedule_options',
				'type' => 'text',
				'priority' => 10,
				'active_callback' => function(){
					 $testimonial_status = get_theme_mod('helphealth_medical_schedule_status');
					 if($testimonial_status){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);

		// Email
		$wp_customize->add_setting( 'helphealth_medical_office_2_email', 
			array(
				'default' => '',
				'sanitize_callback' => 'helphealth_medical_sanitize_email',
				//'transport' => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'helphealth_medical_office_2_email', 
			array(
				'label' => '',
				'description' => esc_html__('Office 2 Email', 'helphealth-medical'),
				'section' => 'helphealth_medical_schedule_options',
				'type' => 'text',
				'priority' => 11,
				'active_callback' => function(){
					 $testimonial_status = get_theme_mod('helphealth_medical_schedule_status');
					 if($testimonial_status){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);

		// Form Shortcoe
		$wp_customize->add_setting( 'schedule_form_shortcode', 
		 	array(
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
				'capability' => 'edit_theme_options',
			) 
		);
		$wp_customize->add_control( 'schedule_form_shortcode', 
			array(
				'label' => esc_html__('Form Shortcode','helphealth-medical'),
				'description' => esc_html__('Shortcode of conatct form 7 for Form','helphealth-medical'),
				'section' => 'helphealth_medical_schedule_options',
				'type' => 'text',
				'priority' => 12,
				'active_callback' => function(){
					 $testimonial_status = get_theme_mod('helphealth_medical_schedule_status');
					 if($testimonial_status){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);

		// BG Color
		$wp_customize->add_setting( 'helphealth_medical_schedule_bg_color',
			array(
				'sanitize_callback'    => 'sanitize_hex_color_no_hash',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
				'default'              => '#00273D'
			) 
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 'helphealth_medical_schedule_bg_color',
				array(
					'label'                 => esc_html__( 'Background Color', 'helphealth-medical' ),
					'section'               => 'helphealth_medical_schedule_options',
					'description'           => '',
					'active_callback' => function(){
						 $testimonial_status = get_theme_mod('helphealth_medical_schedule_status');
						 if($testimonial_status){
							return true;
						 } else {
							 return false;
						 }
					},
					'priority' => 13,
				)
			) 
		);

/* Map Section
----------------------------------------------------------------------*/
$wp_customize->add_section( 'helphealth_medical_map_options',
	array(
		'title'       => esc_html__( 'Map Section', 'helphealth-medical' ),
		'description' => '',
		'panel'       => 'helphealth_medical_frontpage_options',
		'priority' => 10,
	)
);
		// Section Hide/show
		$wp_customize->add_setting( 'helphealth_medical_map_status', 
			array(
			  'default'  =>  false,
			  'sanitize_callback' => 'helphealth_medical_sanitize_checkbox',
			)
		);
		$wp_customize->add_control( 'helphealth_medical_map_status', 
			array(
			  'label'   => esc_html__( 'Show/hide Map Section', 'helphealth-medical' ),
			  'description'   => esc_html__( 'Check/Uncheck this box to show/hide map section on front page template.', 'helphealth-medical' ),
			  'section' => 'helphealth_medical_map_options',
			  'settings' => 'helphealth_medical_map_status',
			  'type'    => 'checkbox',
			  'priority' => 1
			)
		);
		// Map Image
		$wp_customize->add_setting( 'helphealth_medical_map_image', 
			array(
				'default'           => '',
				'sanitize_callback'   =>  'helphealth_medical_sanitize_image',
				'transport'           => 'refresh',
			)
		);
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'helphealth_medical_map_image', 
			array(
				'label'             => esc_html__('Background Image', 'helphealth-medical'),
				'description'       => '',
				'section'           => 'helphealth_medical_map_options',
				'settings'          => 'helphealth_medical_map_image',
				'active_callback' => function(){
					 $testimonial_status = get_theme_mod('helphealth_medical_map_status');
					 if($testimonial_status){
						return true;
					 } else {
						 return false;
					 }
				},
				'priority' 			=> 2,
		
			)
		));
		// Button URL
		$wp_customize->add_setting('helphealth_medical_map_url', 
			array(
				'sanitize_callback' => 'esc_url_raw',
				'default'           => '',
				//'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control('helphealth_medical_map_url', 
			array(
				'label'       => esc_html__('Map Link', 'helphealth-medical'),
				'description' => esc_html__( 'Start with http:// or https://', 'helphealth-medical' ),
			    'type'        => 'url',
				'section'     => 'helphealth_medical_map_options',
				'active_callback' => function(){
					 $testimonial_status = get_theme_mod('helphealth_medical_map_status');
					 if($testimonial_status){
						return true;
					 } else {
						 return false;
					 }
				},
				'priority' => 3,
			)
		);
		// Button Target
		$wp_customize->add_setting( 'helphealth_medical_map_target',
			array(
				'sanitize_callback' => 'helphealth_medical_sanitize_checkbox',
				'default'           => 0,
				//'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 'helphealth_medical_map_target',
			array(
				'type'        => 'checkbox',
				'label'       => esc_html__( 'Open on new tab?', 'helphealth-medical' ),
				'section'     => 'helphealth_medical_map_options',
				'active_callback' => function(){
					 $testimonial_status = get_theme_mod('helphealth_medical_map_status');
					 if($testimonial_status){
						return true;
					 } else {
						 return false;
					 }
				},
				'priority' => 4,
			)
		);
		// BG Color
		$wp_customize->add_setting( 'helphealth_medical_map_bg_color',
			array(
				'sanitize_callback'    => 'sanitize_hex_color_no_hash',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
				'default'              => '#00273D'
			) 
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 'helphealth_medical_map_bg_color',
				array(
					'label'                 => esc_html__( 'Background Color', 'helphealth-medical' ),
					'section'               => 'helphealth_medical_map_options',
					'description'           => '',
					'active_callback' => function(){
						 $testimonial_status = get_theme_mod('helphealth_medical_map_status');
						 if($testimonial_status){
							return true;
						 } else {
							 return false;
						 }
					},
					'priority' => 5,
				)
			) 
		);

	