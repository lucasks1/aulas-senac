<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Helphealth_Medical
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function helphealth_medical_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'blog-sidebar' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'helphealth_medical_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function helphealth_medical_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'helphealth_medical_pingback_header' );
/**
 * Default fallback menu
*/
function helphealth_medical_default_menu() {

  ?>
  <ul class="main-nav">
	  <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'helphealth-medical' ); ?></a></li>
	  <li><a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ) ; ?>"><?php esc_html_e( 'Add Menu', 'helphealth-medical' ); ?></a></li>
  </ul>
  <?php

}


if( ! function_exists( 'helphealth_medical_banner_header_image' ) ) :
/**
 * Banner Image
*/
function helphealth_medical_banner_header_image(){

    $blog_header_image    = get_header_image();
    $archive_header_image = get_theme_mod( 'helphealth_medical_archive_header_image', get_header_image() );
    $search_header_image  = get_theme_mod( 'helphealth_medical_search_header_image', get_header_image() );
    $header_image_404     = get_theme_mod( 'helphealth_medical_404_header_image', get_header_image() );

    if ( is_home() ){ 
        $banner_image_url = ( ! empty( $blog_header_image ) ) ? $blog_header_image : get_header_image();
    }
    elseif( is_singular() ){
        $banner_image_url = get_the_post_thumbnail_url( '', 'full' );
        $banner_image_url = ( ! empty( $banner_image_url) ) ? $banner_image_url : get_header_image();
    }
    elseif( is_archive() ){
        $banner_image_url = ( ! empty( $archive_header_image) ) ? $archive_header_image : get_header_image();
    }
    elseif( is_search() ){ 
        $banner_image_url = ( ! empty( $search_header_image) ) ? $search_header_image : get_header_image();
    }
    elseif( is_404() ) {
        $banner_image_url = ( ! empty( $header_image_404) ) ? $header_image_404 : get_header_image();
    }
    return $banner_image_url;
}
endif;


/**
 * Page Header
 */
if ( ! function_exists( 'helphealth_medical_page_header' ) ) {

	function helphealth_medical_page_header(){ 
	
	$helphealth_medical_banner_image_url = helphealth_medical_banner_header_image();
	$parallax = get_theme_mod( 'helphealth_medical_header_parallax_active', 1 );
	?>
	<div id="page-header" style="background:url('<?php echo esc_url( $helphealth_medical_banner_image_url ); ?>') no-repeat scroll top center;" <?php if($parallax) : ?> data-stellar-background-ratio="0.5"<?php endif; ?>>
		<div class="blog-header-overlay"></div>
		<div class="banner-content">
			<div class="dis-table">
				<div class="dis-table-cell <?php echo esc_attr(get_theme_mod( 'helphealth_medical_banner_text_align', 'text-center' )); ?>">
					<div class="container"> 
						<div class="row">
							<div class="col-md-12">

								<?php $blog_title = get_theme_mod( 'helphealth_medical_blog_page_title', __('Blog', 'helphealth-medical') );  ?>

								<?php if( is_page() ){ ?>
									<h1 class="page-title"><?php echo wp_kses_post( get_the_title() ); ?></h1>
									<?php
										$breadcrumbs = get_theme_mod( 'helphealth_medical_blog_breadcrumb_display'); 
										if( $breadcrumbs ) :
											helphealth_medical_breadcrumbs();
										endif;
									?>
								<?php } elseif( is_single() ){ ?>
									<h1 class="page-title"><?php echo wp_kses_post( get_the_title() ); ?></h1>
									<?php 
									if( get_theme_mod('helphealth_medical_single_post_meta_display', 1) ) {
										helphealth_medical_post_meta(); 
									} ?>
								<?php } elseif( is_front_page() ){ ?>
									<h1 class="page-title"><?php echo esc_html( $blog_title ); ?></h1>
									<?php
										$breadcrumbs = get_theme_mod( 'helphealth_medical_blog_breadcrumb_display'); 
										if( $breadcrumbs ) :
											helphealth_medical_breadcrumbs();
										endif;
									?>
								<?php } elseif( is_search() ){
									/* translators: %s: search term */
									$page_title = sprintf( esc_html__( 'Search Results for: %s', 'helphealth-medical' ),  get_search_query() ); 
									?>
									<h1 class="page-title"><?php echo esc_html( $page_title ); ?></h1>

								<?php } elseif( is_404() ){ ?>
									<h1 class="page-title"><?php echo esc_html( 'Uh-Oh...', 'helphealth-medical' ); ?></h1>
									<p><?php echo esc_html('The page you are looking for may have been moved, deleted, or possibly never existed.', 'helphealth-medical'); ?></p>

								<?php }elseif( is_home() ){ ?>
									<h1 class="page-title"><?php echo esc_html( $blog_title ); ?></h1>
									<?php
										$breadcrumbs = get_theme_mod( 'helphealth_medical_blog_breadcrumb_display'); 
										if( $breadcrumbs ) :
											helphealth_medical_breadcrumbs();
										endif;
									?>
								<?php } else {
									the_archive_title( '<h1 class="page-title uppercase">', '</h1>' );
									$breadcrumbs = get_theme_mod( 'helphealth_medical_blog_breadcrumb_display'); 
									if( $breadcrumbs ) :
										helphealth_medical_breadcrumbs();
									endif;
								}?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
	}
}
add_action('helphealth_medical_page_header', 'helphealth_medical_page_header');



if ( ! function_exists( 'helphealth_medical_related_posts' ) ) {
	/**
	* Display the related posts.
	*/
function helphealth_medical_related_posts() {
		wp_reset_postdata();
		global $post;
		
		$helphealth_medical_blog_sinle_layout = get_theme_mod( 'helphealth_medical_blog_single_layout', 'right-sidebar' );
		if( $helphealth_medical_blog_sinle_layout == 'left-sidebar' || $helphealth_medical_blog_sinle_layout == 'right-sidebar' ) :
			$posts_count = 2;
		else :
			$posts_count = 3;
		endif;
		
		// Define shared post arguments
		$args = array(
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			'ignore_sticky_posts'    => 1,
			'orderby'                => 'rand',
			'post__not_in'           => array( $post->ID ),
			'posts_per_page'         => $posts_count,
		);
		
		// Related by categories.
		if ( get_theme_mod( 'helphealth_medical_related_post_choice', 'categories' ) == 'categories' ) {
			$cats                 = wp_get_post_categories( $post->ID, array( 'fields' => 'ids' ) );
			$args['category__in'] = $cats;
		}
		
		// Related by tags.
		if ( get_theme_mod( 'helphealth_medical_related_post_choice', 'categories' ) == 'tags' ) {
			$tags            = wp_get_post_tags( $post->ID, array( 'fields' => 'ids' ) );
			$args['tag__in'] = $tags;

			if ( ! $tags ) {
				$break = true;
			}
		}
		$query = ! isset( $break ) ? new WP_Query( $args ) : new WP_Query();
		return $query;
	}
}

if ( ! function_exists( 'helphealth_medical_the_excerpt' ) ) :

	/**
	 * Generate excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $length Excerpt length in words.
	 * @param WP_Post $post_obj WP_Post instance (Optional).
	 * @return string Excerpt.
	 */
	function helphealth_medical_the_excerpt( $length = 0, $post_obj = null ) {

		global $post;

		if ( is_null( $post_obj ) ) {
			$post_obj = $post;
		}

		$length = absint( $length );

		if ( 0 === $length ) {
			return;
		}

		$source_content = $post_obj->post_content;

		if ( ! empty( $post_obj->post_excerpt ) ) {
			$source_content = $post_obj->post_excerpt;
		}

		$source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );
		return $trimmed_content;

	}

endif;


if( ! function_exists( 'helphealth_medical_404_latest_posts' ) ) :
    /**
     * Influencer 404 posts
    */
    function helphealth_medical_404_latest_posts(){
        $latest_posts_args = array(
            'post_status'           => 'publish', 
            'ignore_sticky_posts'   => true,  
            'posts_per_page'        => 3,
        );
        $latest_posts_qry = new WP_Query( $latest_posts_args );

        if( $latest_posts_qry->have_posts() ) { ?>
            <div class="posts-404">
                <h4 class="news-post-title"><?php esc_html_e( 'Latest Articles','helphealth-medical' ); ?></h4>
                <div class="row flex-row">
                    <?php
					while( $latest_posts_qry->have_posts() ) {
                        $latest_posts_qry->the_post(); ?>
						<div class="col-md-4 animate-box"> 					
							<article id="post-<?php the_ID(); ?>" <?php post_class( array('helphealth-medical-post') ); ?>>
								<!-- Start Post Thumbnail -->
								<?php 
								if( get_theme_mod('helphealth_medical_post_thumbnail_display', true) ) {
									helphealth_medical_post_thumbnail();
								} ?>
								<!-- End Post Thumbnail -->	
								<div class="post-content-wrap"> 
									<!-- Start Entry Header -->
									<div class="entry-header">
										<h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
									</div>
									<!-- End Entry Header -->
									
									<!-- Start Post Meta -->
									<?php 
									if( get_theme_mod('helphealth_medical_post_meta_display', true) ) {
										helphealth_medical_post_meta(); 
									} ?>
									<!-- End Post Meta -->
									
									<!-- Start Entry Content -->
									<div class="entry-content"> 
										<?php 
											the_excerpt(); 

											do_action('helphealth_medical_read_more_text');
											
											wp_link_pages( array(
												'before' => '<div class="page-links">' . __( 'Pages:', 'helphealth-medical' ),
												'after'  => '</div>',
											) );
											
										?>
									</div>
									<!-- End Entry Content -->
								</div>
							</article>
						</div>
	
                    <?php } ?>
                </div>
            </div>
            <?php wp_reset_postdata(); 
        }
    }
endif;
add_action( 'helphealth_medical_404_posts', 'helphealth_medical_404_latest_posts' );



if( ! function_exists( 'helphealth_medical_location' ) ) :
/**
    * Contact Location
	* @since 1.0.8
 */
function helphealth_medical_location(){
	
    $loc_title  = get_theme_mod( 'location_title', 'Our Office Location' );
    $details    = get_theme_mod( 'location_address', '#405, Lan Streen, Los Vegas, USA'); 
    
    if( $loc_title || $details ){  ?>
		<div class="contact-box"> 
            <div class="icon">
               <i class="fa fa-street-view" aria-hidden="true"></i>
            </div>
            <div class="contact-details">
                <?php 
                    if( $loc_title ) echo '<span class="contact-title location">' . esc_html( $loc_title ) . '</span>';
                    if( $details ) echo wp_kses_post( wpautop( $details ) );
                ?>
            </div>
		</div>
    <?php }
}
endif;
add_action( 'helphealth_medical_contact_list', 'helphealth_medical_location', 10 );


if( ! function_exists( 'helphealth_medical_mail' ) ) :
	/**
	 * Contact Mail
	 * @since 1.0.8
	 */
	function helphealth_medical_mail(){ 
		$mail_title = get_theme_mod( 'mail_title', 'Email Address');
		$details    = get_theme_mod( 'mail_address', 'helphealth@medical.com'); 
		$emails     = explode( ',', $details);

		if( $mail_title || $details ){ ?>
			<div class="contact-box"> 
				<div class="icon">
				 <i class="fa fa-envelope-o" aria-hidden="true"></i>
				</div>
				<div class="contact-details">
					<?php 
						if( $mail_title ) echo '<span class="contact-title email">' . esc_html( $mail_title ) . '</span>';
						if( $details ) {
							foreach( $emails as $email ){ ?>
								<a href="<?php echo esc_url( 'mailto:' . sanitize_email( $email ) ); ?>" class="email-link">
									<?php echo esc_html( $email ); ?>
								</a>
							<?php }
						}
					?>
				</div>
			</div>

		<?php }
	}
	endif;
add_action( 'helphealth_medical_contact_list', 'helphealth_medical_mail', 20 );


if( ! function_exists( 'helphealth_medical_phone' ) ) :
	/**
	 * Contact Phone
	 *
	 * @since 1.0.8
	 */
	function helphealth_medical_phone(){
		
		$phone_title = get_theme_mod( 'phone_title', 'Contact Number');
		$details     = get_theme_mod( 'phone_number', '+325-12345-678' ); 
		$numbers     = explode( ',', $details);

		if( $phone_title || $details ){ ?>
			<div class="contact-box"> 
				<div class="icon">
					<i class="fa fa-mobile" aria-hidden="true"></i>
				</div>
				<div class="contact-details">
					<?php 
						if( $phone_title ) echo '<span class="contact-title phone">' . esc_html( $phone_title ) . '</span>';
						if( $details ) {
							foreach( $numbers as $phone ){ ?>
								<a href="<?php echo esc_url( 'tel:' . preg_replace( '/[^\d+]/', '', $phone ) ); ?>" class="tel-link">
									<?php echo esc_html( $phone ); ?>
								</a>
							<?php }
						}
					?>
				</div>
			</div>

		<?php }
	}
endif;
add_action( 'helphealth_medical_contact_list', 'helphealth_medical_phone', 30 );



if( ! function_exists( 'helphealth_medical_contact_form' ) ) :
	/**
	 * Contact form
	 *
	 * @since 1.0.8
	 */
	function helphealth_medical_contact_form(){

		$form_title      = get_theme_mod( 'contact_form_title', __('Request a Consultation', 'helphealth-medical'));
		$form_subtitle   = get_theme_mod( 'contact_form_subtitle',  __('Your email address will not be published.', 'helphealth-medical')); 
		$shortcode       = get_theme_mod( 'contact_form_shortcode' ); 
	
		if( $form_title || $form_subtitle || $shortcode ){ ?>
			<div class="contact-form">
				<?php
				if( $form_title || $form_subtitle ) : ?>
					<div class="contact-heading"> 
						<h3><?php echo esc_html($form_title); ?></h3>
						<p><?php echo esc_html($form_subtitle); ?></p>
					</div>
				<?php endif; ?>
				
				<?php if($shortcode) : ?>
				<div class="form-wrap"> 
					<?php echo do_shortcode( $shortcode ); ?>
				</div>
				<?php endif; ?>
				
			</div>
			<?php
		}
	}
endif;
