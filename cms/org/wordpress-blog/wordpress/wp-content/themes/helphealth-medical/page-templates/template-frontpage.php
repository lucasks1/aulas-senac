<?php
/**
 * Template Name: Front Page
 *
 * @package Helphealth_Medical
 */

get_header();


		/**
		 * Slider 
		*/
		get_template_part( 'sections/section', 'slider' );

		/**
		 * Services
		*/
		get_template_part( 'sections/section', 'services' );
		
		/**
		 * Department
		*/
		get_template_part( 'sections/section', 'department' );
		
		/**
		 * Mission
		*/
		get_template_part( 'sections/section', 'mission' );
		
		/**
		 * Features
		*/
		get_template_part( 'sections/section', 'features' );
		
		/**
		 * Testimonials
		*/
		get_template_part( 'sections/section', 'testimonials' );
		
		/**
		 * Recent Posts
		*/
		get_template_part( 'sections/section', 'recentpost' );
		
		/**
		 * Contact Form
		*/
		get_template_part( 'sections/section', 'contact' );
		
		/**
		 * Map
		*/
		get_template_part( 'sections/section', 'map' );

		
 get_footer();