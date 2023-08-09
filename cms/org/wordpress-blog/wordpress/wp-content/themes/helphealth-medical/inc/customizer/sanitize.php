<?php
/**
 * Helphealth Medical Sanitize Functions.
 */
 
if ( ! function_exists( 'helphealth_medical_sanitize_logo' ) ) :
	/**
	 * Sanitize the logo title select option.
	 *
	 * @since 1.0.0	 *
	 * @param string $logo_option.
	 * @return string (text-description-only|site-logo-only|site-logo-text-desc|display-none).
	 */
	 
	function helphealth_medical_sanitize_logo( $logo_option ) {
		if ( ! in_array( $logo_option, array(  'logo-only', 'title-only', 'title-desc', 'title-img' ) ) ) {
			$logo_option = 'logo-only';
		} 
		return $logo_option;
	}
endif;


if ( ! function_exists( 'helphealth_medical_sanitize_css' ) ) :
	/**
	 * Sanitize CSS code
	 *
	 * @since 1.0.0	 *
	 * @param $string
	 * @return string
	 */
	function helphealth_medical_sanitize_css($string) {
		$string = preg_replace( '@<(script|style)[^>]*?>.*?</\\1>@si', '', $string );
		$string = strip_tags($string);
		return trim( $string );
	}
endif;


if ( ! function_exists( 'helphealth_medical_sanitize_checkbox' ) ) :
	/**
	* Sanitize Checkbox
	 *
	 * @since 1.0.0
	 *	
	*/
	function helphealth_medical_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return 0;
		}
	}
endif; 


if ( ! function_exists( 'helphealth_medical_sanitize_select' ) ) :

	/**
	 * Sanitize select.
	 *
	 * @since 1.0.0
	 *	
	 */
	function helphealth_medical_sanitize_select( $input, $setting ) {

		// Ensure input is a slug.
		$input = sanitize_key( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	}

endif;


if ( ! function_exists( 'helphealth_medical_sanitize_choices' ) ) :
	/**
	 * Sanitize choices.
	 *
	 * @since 1.0.0
	 *	
	 */
	function helphealth_medical_sanitize_choices( $input, $setting ) {
		global $wp_customize; 
		$control = $wp_customize->get_control( $setting->id ); 
		if ( array_key_exists( $input, $control->choices ) ) {
			return $input;
		} else {
			return $setting->default;
		}
	}
	
endif;


if ( ! function_exists( 'helphealth_medical_sanitize_choices_array' ) ) :
	/**
	 * Sanitize choices array.
	 *
	 * @since 1.0.0
	 *	
	 */
	function helphealth_medical_sanitize_choices_array( $input, $setting ) {
		global $wp_customize;
		
		if(!empty($input)){
			$input = array_map('absint', $input);
		}

		return $input;
	} 
	
endif; 


if ( ! function_exists( 'helphealth_medical_dropdown_pages' ) ) :
	/**
	 * Sanitize dropdown pages.
	 *
	 * @since 1.0.0
	 *	
	 */
	function helphealth_medical_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	  
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}
endif;


if ( ! function_exists( 'helphealth_medical_dropdown_posts' ) ) :
	/**
	 * Post Dropdown.
	 *
	 * @since 1.0.0	 *
	 */
	function helphealth_medical_dropdown_posts() {

		$posts = get_posts( array( 'numberposts' => -1 ) );
		$choices = array();
		$choices[0] = esc_html__( '--Select--', 'helphealth-medical' );
		foreach ( $posts as $post ) {
			$choices[$post->ID] = $post->post_title;
		}
		return $choices;
	}

endif;


if ( ! function_exists( 'helphealth_medical_sanitize_html' ) ) :
	/**
	 * HTML sanitization 
	 *
	 * @see wp_filter_post_kses() https://developer.wordpress.org/reference/functions/wp_filter_post_kses/
	 *
	 * @param string $html HTML to sanitize.
	 * @return string Sanitized HTML.
	 */
	function helphealth_medical_sanitize_html( $html ) {
		return wp_kses_post( force_balance_tags( $html ) );
	}
endif;


if ( ! function_exists( 'helphealth_medical_sanitize_color_alpha' ) ) :
	// Sanitize Color Alpha
	function helphealth_medical_sanitize_color_alpha( $color ){
		$color = str_replace( '#', '', $color );
		if ( '' === $color ){
			return '';
		}
		// 3 or 6 hex digits, or the empty string.
		if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', '#' . $color ) ) {
			// convert to rgb
			$colour = $color;
			if ( strlen( $colour ) == 6 ) {
				list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
			} elseif ( strlen( $colour ) == 3 ) {
				list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
			} else {
				return false;
			}
			$r = hexdec( $r );
			$g = hexdec( $g );
			$b = hexdec( $b );
			return 'rgba('.join( ',', array( 'r' => $r, 'g' => $g, 'b' => $b, 'a' => 1 ) ).')';

		}
		return strpos( trim( $color ), 'rgb' ) !== false ?  $color : false;
	}
endif;


if ( ! function_exists( 'helphealth_medical_sanitize_number_range' ) ) :
	/**
	 * Number Range sanitization callback example.
	 *
	 * - Sanitization: number_range
	 * - Control: number, tel
	 *
	 * Sanitization callback for 'number' or 'tel' type text inputs. This callback sanitizes
	 * `$number` as an absolute integer within a defined min-max range.
	 *
	 * @see absint() https://developer.wordpress.org/reference/functions/absint/
	 *
	 * @param int                  $number  Number to check within the numeric range defined by the setting.
	 * @param WP_Customize_Setting $setting Setting instance.
	 * @return int|string The number, if it is zero or greater and falls within the defined range; otherwise,
	 *                    the setting default.
	 */
	function helphealth_medical_sanitize_number_range( $number, $setting ) {
		// Ensure input is an absolute integer.
		$number = absint( $number );

		// Get the input attributes associated with the setting.
		$atts = $setting->manager->get_control( $setting->id )->input_attrs;

		// Get minimum number in the range.
		$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

		// Get maximum number in the range.
		$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

		// Get step.
		$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

		// If the number is within the valid range, return it; otherwise, return the default
		return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
	}
endif;


if ( ! function_exists( 'helphealth_medical_sanitize_email' ) ) :
	/**
	* Sanitizes email
	* @param  $input entered value
	* @return sanitized output
	*
	* @since 1.0.0
	*/
	function helphealth_medical_sanitize_email( $input ) {

		$links = explode( '|', $input );

		// Ensure $input is an url.
		$links = array_map( 'sanitize_email', $links );
		$links = implode('|', $links);

		return $links;
	}
endif; 


if ( ! function_exists( 'helphealth_medical_sanitize_image' ) ) :
	/**
	 * Image sanitization callback example.
	 *
	 * Checks the image's file extension and mime type against a whitelist. If they're allowed,
	 * send back the filename, otherwise, return the setting default.
	 *
	 */
	function helphealth_medical_sanitize_image( $image, $setting ) {
		/*
		 * Array of valid image file types.
		 *
		 * The array includes image mime types that are included in wp_get_mime_types()
		 */
		$mimes = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png',
			'bmp'          => 'image/bmp',
			'tif|tiff'     => 'image/tiff',
			'ico'          => 'image/x-icon'
		);
		// Return an array with file extension and mime_type.
		$file = wp_check_filetype( $image, $mimes );
		// If $image has a valid mime_type, return it; otherwise, return the default.
		return ( $file['ext'] ? $image : $setting->default );
	}
endif;


if ( ! function_exists( 'helphealth_medical_sanitize_map_iframe' ) ) :
	/**
	 * Google map iframe sanitization
	 *
	 *
	 */
	function helphealth_medical_sanitize_map_iframe( $input, $setting ) {
		$allowedtags = array(
			'iframe' => array(
				'src' => array(),
				'width' => array(),
				'height' => array(),
				'frameborder' => array(),
				'style'     => array(),
				'marginwidth' => array(),
				'marginheight' => array(),
			)
		);

		$input = wp_kses( $input, $allowedtags );

		return $input;
	}
endif;
