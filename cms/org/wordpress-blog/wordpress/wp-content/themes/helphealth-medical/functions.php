<?php
/**
 * Helphealth Medical functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Helphealth_Medical
 */
 
if ( ! defined('ABSPATH') ) {
	exit;
}

if ( ! defined( 'HELPHEALTH_MEDICA_THEME_DIR' ) ) {
	define( 'HELPHEALTH_MEDICA_THEME_DIR', get_template_directory() );
}

if ( ! defined( 'HELPHEALTH_MEDICA_THEME_DIR_URI' ) ) {
	define( 'HELPHEALTH_MEDICA_THEME_DIR_URI', get_template_directory_uri() );
}

if ( ! defined( 'HELPHEALTH_MEDICA_ASSETS_DIR' ) ) {
	define( 'HELPHEALTH_MEDICA_ASSETS_DIR', HELPHEALTH_MEDICA_THEME_DIR_URI . '/assets' );
}

if ( ! defined( 'HELPHEALTH_MEDICA_THEME_INC_DIR' ) ) {
	define( 'HELPHEALTH_MEDICA_THEME_INC_DIR', HELPHEALTH_MEDICA_THEME_DIR . '/inc' );
}
 
/**
 * Load Typpgraphy Options
 */
require get_template_directory() . '/inc/fonts.php';

if ( ! function_exists( 'helphealth_medical_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function helphealth_medical_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on helphead medical, use a find and replace
		 * to change 'helphealth-medical' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'helphealth-medical', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'helphealth-medical-blog-thumb', 660, 400, true );
		add_image_size( 'helphealth-medical-dept-thumb', 375, 388, true );
		add_image_size( 'helphealth-medical-client-thumb', 360, 200, true );
		add_image_size( 'helphealth-medical-widget-thumb', 90, 90, true );
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary Menu', 'helphealth-medical' ),
			'mobile-menu' => esc_html__( 'Mobile Menu', 'helphealth-medical' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'helphealth-medical' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'helphealth_medical_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );
		
		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );
		
		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
		add_post_type_support( 'page', 'excerpt' );
		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 305,
			'width'       => 715,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Admin notice for plugins installation.
		function helphealth_medical_plugins_admin_notice() {

			$list 				= '';
			$plugins 			= array();
			include_once ABSPATH . 'wp-admin/includes/plugin.php';

			if(!class_exists('wpcf7')){
				$URL			= 'https://wordpress.org/plugins/contact-form-7/';
				$element		= '<a href="'.esc_url($URL).'" target="_blank">Contact Form 7</a>';
				array_push($plugins,$element);
			}

			if(!empty($plugins)){
				$list 	= '<strong>'; $separator = ', ';
				$count	= count($plugins);
				foreach($plugins as $key => $plugin){
					if(($count > 1) && ($key === ($count - 1))){
						$list 	= rtrim($list,$separator);
						$list .= ' and ';
					}
					$list .= $plugin . $separator;
				}
				$list  = rtrim($list,$separator);
				$list .= '</strong>';
			}

			if($list != ''){
				$class = 'notice notice-warning is-dismissible';
				$arr = array( 
					'strong' => array(),    
					'a' => array(
						'href' => array(),
						'target' => array()
					),
					'em' => array(), 
				);
				printf( '<div class="%1$s"><p>We recommend installing the following plugins: %2$s.<br /> Please download the plugins and install them.</p></div>', esc_attr( $class ), wp_kses( $list, $arr ) );

			}
		}

		add_action( 'admin_notices', 'helphealth_medical_plugins_admin_notice' );

	}
endif;
add_action( 'after_setup_theme', 'helphealth_medical_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function helphealth_medical_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'helphealth_medical_content_width', 750 );
}
add_action( 'after_setup_theme', 'helphealth_medical_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function helphealth_medical_widgets_init() {
	
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'helphealth-medical' ),
		'id'            => 'blog-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'helphealth-medical' ),
		'before_widget' => '<div id="%1$s" class="widget clearfix animate-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Page Sidebar', 'helphealth-medical' ),
		'id'            => 'page-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'helphealth-medical' ),
		'before_widget' => '<div id="%1$s" class="widget clearfix animate-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Widget 1', 'helphealth-medical' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'helphealth-medical' ),
		'before_widget' => '<div id="%1$s" class="footer-widget clearfix %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar(array(
		'name'          => esc_html__( 'Footer Widget 2', 'helphealth-medical' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'helphealth-medical' ),
		'before_widget' => '<div id="%1$s" class="footer-widget clearfix %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar(array(
		'name'          => esc_html__( 'Footer Widget 3', 'helphealth-medical' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'helphealth-medical' ),
		'before_widget' => '<div id="%1$s" class="footer-widget clearfix %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar(array(
		'name'          => esc_html__( 'Footer Widget 4', 'helphealth-medical' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'helphealth-medical' ),
		'before_widget' => '<div id="%1$s" class="footer-widget clearfix %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));

}
add_action( 'widgets_init', 'helphealth_medical_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function helphealth_medical_scripts() {
	
	$helphealth_medical_version = wp_get_theme('Helphealth Medical');
	$version = $helphealth_medical_version->get( 'Version' );
	
	// All CSS Here -->
	// Bootstrap fremwork main css -->		
	wp_enqueue_style( 'bootstrap', HELPHEALTH_MEDICA_ASSETS_DIR . '/css/bootstrap.min.css' );
	
	// Animate CSS -->
	wp_enqueue_style( 'animate', HELPHEALTH_MEDICA_ASSETS_DIR . '/css/animate.css' );
	
	// OWL CSS
	wp_enqueue_style( 'owl-carousel', HELPHEALTH_MEDICA_ASSETS_DIR . '/css/owl.carousel.min.css' );
	
	// FontAwesome CSS -->
	wp_enqueue_style( 'font-awesome', HELPHEALTH_MEDICA_ASSETS_DIR . '/css/font-awesome.min.css' );
	
	// Main CSS
	wp_enqueue_style( 'helphealth-medical-style', get_template_directory_uri().'/style.css', array(), esc_attr( $version ) );
    $custom_css = helphealth_medical_custom_inline_style();
    wp_add_inline_style( 'helphealth-medical-style', $custom_css );
	
	// Responsive CSS
	wp_enqueue_style( 'helphealth-medical-responsive', HELPHEALTH_MEDICA_ASSETS_DIR . '/css/responsive.css' );
	
	
	// WordPress Masonry
	wp_enqueue_script( 'jquery-masonry',array('jquery') );
	
	// Bootstrap js -->
	wp_enqueue_script( 'bootstrap', HELPHEALTH_MEDICA_ASSETS_DIR . '/js/bootstrap.min.js', array('jquery'), '3.3.5', true );

	//modernizr JS
	wp_enqueue_script( 'jquery-modernizr', HELPHEALTH_MEDICA_ASSETS_DIR . '/js/modernizr-2.6.2.min.js', null, '2.6.2', false ); 
	
	//Waypoints JS
	wp_enqueue_script( 'jquery-waypoints', HELPHEALTH_MEDICA_ASSETS_DIR . '/js/jquery.waypoints.min.js', array('jquery'), '4.0.0', true );
	
	// OWL Carousel
	wp_enqueue_script( 'owl-carousel', HELPHEALTH_MEDICA_ASSETS_DIR . '/js/owl.carousel.min.js', array('jquery'), '2.3.4', true );
	
	// stellar Script
	wp_enqueue_script( 'jquery-stellar-min', HELPHEALTH_MEDICA_ASSETS_DIR . '/js/stellar.min.js', array('jquery'), '0.6.2', true );	
	
	//Tabnav Menu
	wp_enqueue_script( 'jquery-tab-nav', HELPHEALTH_MEDICA_ASSETS_DIR . '/js/jquery-tab-nav.js', array(), '1.0.0', true );
	
	//navigation
	wp_enqueue_script( 'helphealth-medical-navigation', HELPHEALTH_MEDICA_ASSETS_DIR . '/js/navigation.js', array(), esc_attr( $version ), true );
	
	//fastclick
	wp_enqueue_script( 'jquery-fastclick', HELPHEALTH_MEDICA_ASSETS_DIR . '/js/jquery.fastclick.js', array(), '1.0.0', true );

	
	wp_enqueue_script( 'helphealth-medical-skip-link-focus-fix', HELPHEALTH_MEDICA_ASSETS_DIR . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	// Main Script
	wp_enqueue_script( 'helphealth-medical-main-jquery', HELPHEALTH_MEDICA_ASSETS_DIR . '/js/main.js', array('jquery'), esc_attr( $version ), true );	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'helphealth_medical_scripts' );


/**
*Custom Admin Style 
*/
function helphealth_medical_admin_acripts(){
	wp_enqueue_style( 'font-awesome', HELPHEALTH_MEDICA_ASSETS_DIR . '/css/font-awesome.min.css' );
	wp_register_style( 'helphealth_medical_custom_wp_admin_css', HELPHEALTH_MEDICA_ASSETS_DIR . '/css/admin-style.css', false, '1.0.0' );
	
	wp_enqueue_style( 'helphealth_medical_custom_wp_admin_css' );
}
add_action('admin_enqueue_scripts','helphealth_medical_admin_acripts');


/**
 * Implement the Custom Header feature.
 */
require HELPHEALTH_MEDICA_THEME_INC_DIR . '/custom-header.php';


/**
 * Custom template tags for this theme.
 */
require HELPHEALTH_MEDICA_THEME_INC_DIR . '/template-tags.php';


/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require HELPHEALTH_MEDICA_THEME_INC_DIR . '/template-functions.php';


/**
 * Load Sanitize
 */
require HELPHEALTH_MEDICA_THEME_INC_DIR . '/customizer/sanitize.php';


/**
 * Customizer additions.
 */
require HELPHEALTH_MEDICA_THEME_INC_DIR . '/customizer/customizer.php';

/**
 * Breadcrumb.
 */
require HELPHEALTH_MEDICA_THEME_INC_DIR . '/breadcrumb.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require HELPHEALTH_MEDICA_THEME_INC_DIR . '/jetpack.php';
}