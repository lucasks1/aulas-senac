/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ , api ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.logo-area .site-text' ).text( to );
		} );
	} );
	
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.logo-text-area p.site-description' ).text( to );
		} );
	} );

	// address
    wp.customize('helphealth_medical_office_address', function (value) {
        value.bind(function (newvalue) {
            $("#office-address").text(newvalue);
        });
    });
	
	// Blog Title
    wp.customize('helphealth_medical_blog_page_title', function (value) {
        value.bind(function (newvalue) {
            $(".banner-content .page-title").text(newvalue);
        });
    });

	// Read More
    wp.customize('helphealth_medical_more_text', function (value) {
        value.bind(function (newvalue) {
            $(".entry-content .btn-more").text(newvalue);
        });
    });
	
	// Related Post Title
    wp.customize('helphealth_medical_related_posts_label', function (value) {
        value.bind(function (newvalue) {
            $(".related-heading h4").text(newvalue);
        });
    });

	//Copyright Text
    wp.customize('helphealth_medical_copyright_text', function (value) {
        value.bind(function (newvalue) {
            $(".copyright-text").text(newvalue);
        });
    });
	
	// Homepage- CTA Title
    wp.customize('helphealth_medical_cta_title', function (value) {
        value.bind(function (newvalue) {
            $(".schedule-text h3").text(newvalue);
        });
    });

	// Homepage- CTA Description
    wp.customize('helphealth_medical_cta_desc', function (value) {
        value.bind(function (newvalue) {
            $(".schedule-text p").text(newvalue);
        });
    });
	
	// Homepage- CTA Phone
    wp.customize('helphealth_medical_cta_phone', function (value) {
        value.bind(function (newvalue) {
            $(".schedule-text a.phone").text(newvalue);
        });
    });

	// Homepage- CTA Phone
    wp.customize('helphealth_medical_cta_btn_text', function (value) {
        value.bind(function (newvalue) {
            $(".schedule-btn-wrap a.schedule-btn").text(newvalue);
        });
    });

	// Homepage- Service Heading
    wp.customize('helphealth_medical_service_heading', function (value) {
        value.bind(function (newvalue) {
            $(".service-heading h2").text(newvalue);
        });
    });

	// Homepage- Service Subheading
    wp.customize('helphealth_medical_service_subheading', function (value) {
        value.bind(function (newvalue) {
            $(".service-heading p").text(newvalue);
        });
    });

	// Homepage- Department Heading
    wp.customize('helphealth_medical_department_heading', function (value) {
        value.bind(function (newvalue) {
            $(".department-area .section-heading h2").text(newvalue);
        });
    });

	// Homepage- Department subheading
    wp.customize('helphealth_medical_department_subheading', function (value) {
        value.bind(function (newvalue) {
            $(".department-area .section-heading p").text(newvalue);
        });
    });

	// Homepage- Department Button
    wp.customize('helphealth_medical_dept_btn_text', function (value) {
        value.bind(function (newvalue) {
            $(".department-area .section-heading a.btn-default").text(newvalue);
        });
    });

	// Homepage- Mission Heading
    wp.customize('helphealth_medical_mission_heading', function (value) {
        value.bind(function (newvalue) {
            $(".mission-heading h2").text(newvalue);
        });
    });
	// Homepage- Mission Title
    wp.customize('helphealth_medical_mission_title', function (value) {
        value.bind(function (newvalue) {
            $(".mission h4").text(newvalue);
        });
    });
	// Homepage- Mission Description
    wp.customize('helphealth_medical_mission_desc', function (value) {
        value.bind(function (newvalue) {
            $(".mission p").text(newvalue);
        });
    });
	// Homepage- Mission Button Text
    wp.customize('helphealth_medical_mission_btn_text', function (value) {
        value.bind(function (newvalue) {
            $(".mission .btn").text(newvalue);
        });
    });

	// Homepage- Features Title 1
    wp.customize('helphealth_medical_feature_title_1', function (value) {
        value.bind(function (newvalue) {
            $("feature-1 h3").text(newvalue);
        });
    });
	// Homepage- Features Description 1
    wp.customize('helphealth_medical_feature_desc_1', function (value) {
        value.bind(function (newvalue) {
            $("feature-1 p").text(newvalue);
        });
    });


	// Homepage- Features Title 2
    wp.customize('helphealth_medical_feature_title_2', function (value) {
        value.bind(function (newvalue) {
            $("feature-2 h3").text(newvalue);
        });
    });
	// Homepage- Features Description 2
    wp.customize('helphealth_medical_feature_desc_2', function (value) {
        value.bind(function (newvalue) {
            $("feature-2 p").text(newvalue);
        });
    });


	// Homepage- Features Title 3
    wp.customize('helphealth_medical_feature_title_3', function (value) {
        value.bind(function (newvalue) {
            $("feature-3 h3").text(newvalue);
        });
    });
	// Homepage- Features Description 3
    wp.customize('helphealth_medical_feature_desc_3', function (value) {
        value.bind(function (newvalue) {
            $("feature-3 p").text(newvalue);
        });
    });


	//Homepage- Blog heading
    wp.customize('helphealth_medical_recent_posts_heading', function (value) {
        value.bind(function (newvalue) {
            $(".blog-section .section-heading h2").text(newvalue);
        });
    });
	//Homepage- Blog Subtitle
    wp.customize('helphealth_medical_recent_posts_subheading', function (value) {
        value.bind(function (newvalue) {
            $(".blog-section .section-heading p.subtitle").text(newvalue);
        });
    });
	//Homepage- Blog Reamore text
    wp.customize('helphealth_recentpost_readmore_text', function (value) {
        value.bind(function (newvalue) {
            $(".recent-posts a.btn-more").text(newvalue);
        });
    });
	
	//Homepage- Contact heading
    wp.customize('helphealth_medical_schedule_heading', function (value) {
        value.bind(function (newvalue) {
            $(".schedule-area .section-heading h2").text(newvalue);
        });
    });
	//Homepage- Contact Subtitle
    wp.customize('helphealth_medical_schedule_subheading', function (value) {
        value.bind(function (newvalue) {
            $(".schedule-area .section-heading p").text(newvalue);
        });
    });









	

	
    function update_css( ){
         var css_code = $( '#helphealth-medical-style-inline-css' ).html();
        // Fix Chrome Lost CSS When resize ??
        $( '#helphealth-medical-style-inline-css' ).replaceWith( '<style class="replaced-style" id="helphealth-medical-style-inline-css">'+css_code+'</style>' );

    }

    // When preview ready
    wp.customize.bind( 'preview-ready', function() {
        update_css();
    });

    $( window ).resize( function(){
        update_css();
    });

} )( jQuery , wp.customize );

