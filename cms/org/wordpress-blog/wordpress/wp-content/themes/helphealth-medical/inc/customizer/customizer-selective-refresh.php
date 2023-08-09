<?php 

/**
 * Add customizer selective refresh
 */
function helphealth_medical_customizer_partials( $wp_customize ) {

    // Abort if selective refresh is not available.
    if ( ! isset( $wp_customize->selective_refresh ) ) {
        return;
    }
	// Site Title
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector'        => '.logo-area .site-text',
		'render_callback' =>  function(){
				return bloginfo( 'name' );
		    },
	) );
	
	// Tagline
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector'        => 'p.site-description',
		'render_callback' =>  function(){
				return bloginfo( 'description' );
		    },
	) );

	// Office Address
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_office_address', array(
		'selector' => '#office-address',
		'settings' => array( 'helphealth_medical_office_address' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_office_address');
		   },
	) );
	
	// Donate Button Text
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_donate_btn_text', array(
		'selector' => '.mb-dotate-btn',
		'settings' => array( 'helphealth_medical_donate_btn_text' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_donate_btn_text');
		   },
	) );
	
	// Blog Page Title
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_blog_page_title', array(
		'selector' => '.banner-content .page-title',
		'settings' => array( 'helphealth_medical_blog_page_title' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_blog_page_title');
		    },
	) );

	// Read more text
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_more_text', array(
		'selector' => '.content-area .entry-content .btn-more',
		'settings' => array( 'helphealth_medical_more_text' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_more_text');
		    },
	) );

	// Related Post Heading
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_related_posts_label', array(
		'selector' => '.related-heading h4',
		'settings' => array( 'helphealth_medical_related_posts_label' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_related_posts_label');
		   },
	) );

	// Front Page - CTA Title
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_cta_title', array(
		'selector' => '.schedule-text h3',
		'settings' => array( 'helphealth_medical_cta_title' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_cta_title');
		   },
	) );
	// Front Page - CTA Description
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_cta_desc', array(
		'selector' => '.schedule-text p',
		'settings' => array( 'helphealth_medical_cta_desc' ),
		'render_callback' =>  function(){
					return get_theme_mod( 'helphealth_medical_cta_desc');
			   },
	) );

	// Front Page - CTA Phone
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_cta_phone', array(
		'selector' => '.schedule-text a.phone',
		'settings' => array( 'helphealth_medical_cta_phone' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_cta_phone');
		   },
	) );
	
	// Front Page - CTA Button Text
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_cta_btn_text', array(
		'selector' => '.schedule-btn-wrap a.schedule-btn',
		'settings' => array( 'helphealth_medical_cta_btn_text' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_cta_btn_text');
			},
	) );

	// Front Page - Service Heading
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_service_heading', array(
		'selector' => 'service-heading h2',
		'settings' => array( 'helphealth_medical_service_heading' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_service_heading');
		   },
	) );
	
	// Front Page - Service Sub Heading
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_service_subheading', array(
		'selector' => '.service-heading p',
		'settings' => array( 'helphealth_medical_service_subheading' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_service_subheading');
		   },
	) );

	// Front Page - Department Heading
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_department_heading', array(
		'selector' => '.department-area .section-heading h2',
		'settings' => array( 'helphealth_medical_department_heading' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_department_heading');
		   },
	) );
	// Front Page - Department Sub Heading
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_department_subheading', array(
		'selector' => '.department-area .section-heading p',
		'settings' => array( 'helphealth_medical_department_subheading' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_department_subheading');
		   },
	) );
	// Front Page - Department Button Text
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_dept_btn_text', array(
		'selector' => '.department-area .section-heading a.btn-default',
		'settings' => array( 'helphealth_medical_dept_btn_text' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_dept_btn_text');
			},
	) );

	// Front Page - Mission Heading
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_mission_heading', array(
		'selector' => '.mission-heading h2',
		'settings' => array( 'helphealth_medical_mission_heading' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_mission_heading');
			},
	) );

	// Front Page - Mission Title
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_mission_title', array(
		'selector' => '.mission  h4',
		'settings' => array( 'helphealth_medical_mission_title' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_mission_title');
			},
	) );

	// Front Page - Mission Description
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_mission_desc', array(
		'selector' => '.mission  p',
		'settings' => array( 'helphealth_medical_mission_desc' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_mission_desc');
			},
	) );

	// Front Page - Mission Button Text
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_mission_btn_text', array(
		'selector' => '.mission  .btn',
		'settings' => array( 'helphealth_medical_mission_btn_text' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_mission_btn_text');
			},
	) );

	// Front Page - Features Title 1
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_feature_title_1', array(
		'selector' => '.feature-1 h3',
		'settings' => array( 'helphealth_medical_feature_title_1' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_feature_title_1');
			},
	) );

	// Front Page - Features Description 1
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_feature_desc_1', array(
		'selector' => '.feature-1 p',
		'settings' => array( 'helphealth_medical_feature_desc_1' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_feature_desc_1');
			},
	) );
	
	// Front Page - Features Title 2
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_feature_title_2', array(
		'selector' => '.feature-2 h3',
		'settings' => array( 'helphealth_medical_feature_title_2' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_feature_title_2');
			},
	) );

	// Front Page - Features Description 2
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_feature_desc_2', array(
		'selector' => '.feature-2 p',
		'settings' => array( 'helphealth_medical_feature_desc_2' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_feature_desc_2');
			},
	) );
	
	// Front Page - Features Title 3
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_feature_title_3', array(
		'selector' => '.feature-3 h3',
		'settings' => array( 'helphealth_medical_feature_title_3' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_feature_title_3');
			},
	) );

	// Front Page - Features Description 3
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_feature_desc_3', array(
		'selector' => '.feature-3 p',
		'settings' => array( 'helphealth_medical_feature_desc_3' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_feature_desc_3');
			},
	) );
	
	// Front Page- Blog Posts heading
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_recent_posts_heading', array(
		'selector' => '.blog-section .section-heading h2',
		'settings' => array( 'helphealth_medical_recent_posts_heading' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_recent_posts_heading');
		   },
	) );
	// Front Page- Blog Posts subtitle
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_recent_posts_subheading', array(
		'selector' => '.blog-section .section-heading .subtitle',
		'settings' => array( 'helphealth_medical_recent_posts_subheading' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_recent_posts_subheading');
		   },
	) );

	// Front Page- Blog Posts button
	$wp_customize->selective_refresh->add_partial( 'helphealth_recentpost_readmore_text', array(
		'selector' => '.recent-posts .btn-more',
		'settings' => array( 'helphealth_recentpost_readmore_text' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_recentpost_readmore_text');
		   },
	) );


	// Front Page- Contact heading
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_schedule_heading', array(
		'selector' => '.schedule-area .section-heading h2',
		'settings' => array( 'helphealth_medical_schedule_heading' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_schedule_heading');
		   },
	) );
	// Front Page- Contact subtitle
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_schedule_subheading', array(
		'selector' => '.schedule-area .section-heading p',
		'settings' => array( 'helphealth_medical_schedule_subheading' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_schedule_subheading');
		   },
	) );


	// Front Page- Contact Office 1
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_contact_office_1', array(
		'selector' => '.office-1 > h5',
		'settings' => array( 'helphealth_medical_contact_office_1' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_contact_office_1');
		   },
	) );
	// Front Page- Contact Office 2
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_contact_office_2', array(
		'selector' => '.office-2 > h5',
		'settings' => array( 'helphealth_medical_contact_office_2' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_contact_office_2');
		   },
	) );
	
	// Front Page - Slider Heading
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_banner_heading', array(
		'selector' => '.slide-banner h2',
		'settings' => array( 'helphealth_medical_banner_heading' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_banner_heading');
		   },
	) );
	
	// Front Page - Slider Description
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_banner_desc', array(
		'selector' => '.slide-banner p',
		'settings' => array( 'helphealth_medical_banner_desc' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_banner_desc');
		   },
	) );
	
	// Front Page - Slider button
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_banner_btn_text', array(
		'selector' => '.slide-banner a.btn',
		'settings' => array( 'helphealth_medical_banner_btn_text' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_banner_btn_text');
		   },
	) );
	
	//Front Page- Testimonials
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_testimonial_status', array(
		'selector' => '.testimonials-area',
	) );

	// Contact Page - Section Title
	$wp_customize->selective_refresh->add_partial( 'contact_title', array(
		'selector' => '.contact-info .contact-heading h3',
		'render_callback' =>  function(){
			return get_theme_mod( 'contact_title');
		   },
	) );

	// Contact Page - Location Title
	$wp_customize->selective_refresh->add_partial( 'location_title', array(
		'selector' => '.contact-box .contact-details .contact-title.location',
		'render_callback' =>  function(){
				return get_theme_mod( 'location_title');
		   },
	) );

	// Contact Page - Mail Title
	$wp_customize->selective_refresh->add_partial( 'mail_title', array(
		'selector' => '.contact-box .contact-details .contact-title.email',
		'render_callback' =>  function(){
				return get_theme_mod( 'mail_title');
		   },
	) );

	// Contact Page - Mail Title
	$wp_customize->selective_refresh->add_partial( 'phone_title', array(
		'selector' => '.contact-box .contact-details .contact-title.phone',
		'render_callback' =>  function(){
				return get_theme_mod( 'phone_title');
		   },
	) );

	// Contact Page - Form Title
	$wp_customize->selective_refresh->add_partial( 'contact_form_title', array(
		'selector' => '.contact-form .contact-heading h3',
		'render_callback' =>  function(){
				return get_theme_mod( 'contact_form_title');
		   },
	) );

	// Copyright Text
	$wp_customize->selective_refresh->add_partial( 'helphealth_medical_copyright_text', array(
		'selector' => '.copyright-area .copyright-text',
		'settings' => array( 'helphealth_medical_copyright_text' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'helphealth_medical_copyright_text');
		   },
	) );
	
    /**
     * Selective Refresh style
     */
    $css_settings = array(

		// Site Identity
        'helphealth_medical_site_title_font_family',
        'helphealth_medical_site_title_font_size',
        'helphealth_medical_site_title_color',
        'helphealth_medical_tagline_font_family',
        'helphealth_medical_tagline_font_size',
        'helphealth_medical_tagline_text_color',

		// Site Colors
        'helphealth_medical_primary_color',
        'helphealth_medical_secondary_color',
        'helphealth_medical_heading_color',
        'helphealth_medical_body_text_color',
        'helphealth_medical_btn_bg_color',
        'helphealth_medical_btn_bg_hover_color',
        'helphealth_medical_btn_text_color',

		// Typography
        'helphealth_medical_heading_font_family',
        'helphealth_medical_body_font_family',
        'helphealth_medical_body_font_size',
        'helphealth_medical_btn_font',

		// Heading Settings
        'helphealth_medical_header_bg_color',

	    // Navigation Settings
        'helphealth_medical_navigation_bg',
        'helphealth_medical_menu_font_family',
        'helphealth_medical_menu_color',
        'helphealth_medical_menu_hover_color',
		'helphealth_medical_navigation_dropdown_bg',

		// Banner Image
        'banner_overlay_color',
        'helphealth_medical_banner_text_color',

		// Footer
        'helphealth_medical_footer_bg',
        'helphealth_medical_footer_social_color',
        'helphealth_medical_footer_link_color',
        'helphealth_medical_footer_link_hover_color',
        'helphealth_medical_copyright_text_color',

		// Front Page- Slider
		'helphealth_medical_slide_title_color',
		'helphealth_medical_slide_text_color',
		'helphealth_medical_slide_overlay_color',
		
		//Front Page- CTA
		'helphealth_medical_cta_btn_bg_color',
		
		//Front Page- Mission BG
		'helphealth_medical_mission_bg_color',

		//Front Page- Features
		'helphealth_medical_features_bg_color',

		//Front Page- Testimonials
		'helphealth_medical_testimonial_bg_color',
		'helphealth_medical_testimonial_topbg_color',

		//Front Page- Schedule
		'helphealth_medical_schedule_bg_color',

		//Front Page- Map
		'helphealth_medical_map_bg_color',

    );
	
	$css_settings = apply_filters( 'helphealth_medical_selective_refresh_css_settings', $css_settings );

    foreach( $css_settings as $index => $key ) {
        if ( $wp_customize->get_setting( $key ) ) {
            $wp_customize->get_setting( $key )->transport = 'postMessage';
        } else {
            unset( $css_settings[ $index ] );
        }
    }
	
    $wp_customize->selective_refresh->add_partial( 'helphealth-medical-style-live-css', array(
        'selector' => '#helphealth-medical-style-inline-css',
        'settings' => $css_settings,
        'container_inclusive' => false,
        'render_callback' => 'helphealth_medical_custom_inline_style',
    ) );
	
}
add_action( 'customize_register', 'helphealth_medical_customizer_partials', 199 );