<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Helphealth_Medical
 */


if ( ! function_exists( 'helphealth_medical_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */

	function helphealth_medical_post_thumbnail() {
		
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}
		
		if ( is_singular() ) :
			?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail('full', array( 'class'=> 'img-fluid' ) ); ?>
			</div><!-- .post-thumbnail -->
			<?php
		else : 
			?>
			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<?php
					the_post_thumbnail( 'helphealth-medical-blog-thumb', array(
						'alt' => the_title_attribute( array(
							'echo' => false,
						) ),
					) );
					?>
				</a>
			</div>
			<?php
		endif; // End is_singular().
	}
endif;


/**
 * Post meta info
 */
if ( ! function_exists( 'helphealth_medical_post_meta' ) ) :
function helphealth_medical_post_meta() {
	?>
	<div class="post-meta"> 
	   <p>
		<?php 
		if( get_theme_mod('helphealth_medical_author_display', false ) ) { ?>
			<span><i class="fa fa-user-secret" aria-hidden="true"></i> <?php esc_html_e('By:', 'helphealth-medical'); ?> <?php the_author_posts_link(); ?> </span>
		<?php } ?>
		
		<?php 
		if( get_theme_mod('helphealth_medical_cat_display', true ) ) { ?>
		<span><i class="fa fa-folder-open" aria-hidden="true"></i> <?php the_category( __( ', ', 'helphealth-medical' ));?> </span>
		<?php } ?>
		
		<?php 
		if( get_theme_mod('helphealth_medical_date_display', true ) ) { ?> 
		<span><i class="fa fa-clock-o" aria-hidden="true"></i> <a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></span> 
		<?php } ?>
		
		<?php 
		if ( get_theme_mod( 'helphealth_medical_meta_comments_display', false ) ) {
			if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
				<span><i class="fa fa-commenting-o" aria-hidden="true"></i> <a href="<?php comments_link(); ?>"> <?php comments_number(); ?></a></span>
			<?php endif; 
		}
		?>
		</p>
	</div>
	<?php 
}
endif;

/**
 * Excerpt length
 * 
 */
if ( ! function_exists( 'helphealth_medical_excerpt_length' ) ) :
	function helphealth_medical_excerpt_length( $length ){
		if ( is_admin() ) {
			return $length;
		}
		
		$length = get_theme_mod( 'helphealth_medical_exceprt_count', 20 );
		return absint( $length );
	}
endif;
add_filter( 'excerpt_length', 'helphealth_medical_excerpt_length', 999);


/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 */
function helphealth_medical_custom_excerpt_more() {
	if ( ! is_attachment() ) {
		 echo wp_kses_post( helphealth_medical_read_more_link() );
	}
}
add_action( 'helphealth_medical_read_more_text', 'helphealth_medical_custom_excerpt_more', 10 );


/**
 * Returns a "Read More" link for excerpts
 */
function helphealth_medical_read_more_link() {
	$medic_read_more = get_theme_mod('helphealth_medical_more_text', __('Read More', 'helphealth-medical') );
	return '<a class="btn-more" href="'. esc_url( get_permalink() ) . '">' . wp_kses_post( $medic_read_more ). '</a>';
}
add_filter( 'the_content_more_link', 'helphealth_medical_read_more_link' );


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and helphealth_medical_read_more_link().
 */
function helphealth_medical_auto_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	}
	$excerpt_dots = get_theme_mod('helphealth_medical_excerpt_dots');
	return '<span class="exprt-dot">' . wp_kses_post( $excerpt_dots ). '</span>';
}
add_filter( 'excerpt_more', 'helphealth_medical_auto_excerpt_more' );


/**
 * Pagination
 * 
 */

if ( ! function_exists( 'helphealth_medical_posts_pagination' ) ) :
    function helphealth_medical_posts_pagination( $query = null ) {

        $classes = [];

        if ( empty( $query ) ) {
            $query = $GLOBALS['wp_query'];
        }

        if ( empty( $query->max_num_pages ) 
                || ! is_numeric( $query->max_num_pages )
                || $query->max_num_pages < 2 ) {
            return;
        }

        $paged = get_query_var( 'paged' );

        if ( ! $paged && is_front_page() && ! is_home() ) {
            $paged = get_query_var( 'page' );
        }

        $paged = $paged ? intval( $paged ) : 1;

        $pagenum_link = html_entity_decode( get_pagenum_link() );
        $query_args   = array();
        $url_parts    = explode( '?', $pagenum_link );

        if ( isset( $url_parts[1] ) ) {
            wp_parse_str( $url_parts[1], $query_args );
        }

        $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
        $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

        $html_prev = '<i class="fa fa-angle-double-left"></i>';
        $html_next = '<i class="fa fa-angle-double-right"></i>';
        $links = paginate_links( array(
            'base'      => $pagenum_link,
            'total'     => $query->max_num_pages,
            'current'   => $paged,
            'mid_size'  => 2,
            'add_args'  => array_map( 'urlencode', $query_args ),
            'prev_text' => $html_prev,
            'next_text' => $html_next,
            'type'      => 'array',
        ) );

        if ( is_array( $links ) ) {
            $r = '<div class="pagination-wrap">';
            $r .= "<ul class='pagination pagination-lg'>\n\t<li class='page-item'>";
            $r .= str_replace( 'page-numbers', 'page-link', join( "</li>\n\t<li class='page-item'>", $links ) );
            $r .= "</li>\n</ul>\n";
            $r .= "</div>";

            printf( $r ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
    }
endif;


/**
 * Helphealth Social Icons
 */
if ( ! function_exists( 'helphealth_medical_social_icons' ) ) :
function helphealth_medical_social_icons() {
	?>
		<?php  
			$facebook_url = get_theme_mod('helphealth_medical_facebook_link'); 
			$twitter_url = get_theme_mod('helphealth_medical_twitter_link'); 
			$linkedin_url = get_theme_mod('helphealth_medical_linkedin_link'); 
		?>
		<?php if( $facebook_url != '' ) { ?>
			<a href="<?php echo esc_url( $facebook_url ); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
		<?php } ?>

		<?php if( $twitter_url != '' ) { ?>
			<a href="<?php echo esc_url( $twitter_url ); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
		<?php } ?>

		<?php if( $linkedin_url != '' ) { ?>
			<a href="<?php echo esc_url( $linkedin_url ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
		<?php } ?>
	<?php 
}
endif;


/**
 * helphealth_medical_before_site_info
 */
// 
if ( ! function_exists( 'helphealth_medical_footer_widgets' ) ) {
    function helphealth_medical_footer_widgets(){
		
		$social_display = get_theme_mod('helphealth_medical_social_display', false); 
		
		if( $social_display ||  has_nav_menu( 'footer-menu' ) ) : ?>
		<div class="footer-widgets">
			<div class="container">
				<div class="row">
					<div class="col-md-12"> 
						<?php if( $social_display ) : ?>
						<div class="footer-socials text-center"> 
							<div class="social-icons"> 
								<?php helphealth_medical_social_icons(); ?>
							</div>
						</div>
						<?php endif; ?>
						
						<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
						<div class="text-center">
							<?php
							wp_nav_menu( array(
								'theme_location' => 'footer-menu',
								'container' => 'ul',
								'menu_class' => 'list-none list-inline footer-menu',
								'depth' => 1,
							) ); 
							?>
						</div>
						<?php endif; ?>

					</div>
				</div>
			</div>
		</div>
		<?php
		endif; 
    }
}
add_action( 'helphealth_medical_before_site_info', 'helphealth_medical_footer_widgets', 15 );


/**
 * Add Copyright and Credit text to footer
 */
if ( ! function_exists( 'helphealth_medical_footer_copyright' ) ) {
    function helphealth_medical_footer_copyright(){
		$copyright_text = get_theme_mod( 'helphealth_medical_copyright_text');
        ?>
		<div class="copyright-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12"> 
						<div class="copy-rights text-center"> 
							<?php if ( $copyright_text ): ?>
								<p class="copyright-text"><?php echo esc_html( $copyright_text ); ?></p>
							<?php else: ?>
								<p class="copyright-text"><?php bloginfo(); ?> &copy; <?php echo esc_html( date_i18n( esc_html__( 'Y', 'helphealth-medical' ) ) ); ?>. <?php esc_html_e( 'All Rights Reserved.', 'helphealth-medical' ); ?></p>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
        <?php
    }
}
add_action( 'helphealth_medical_footer_copyright', 'helphealth_medical_footer_copyright' );


if ( ! function_exists( 'helphealth_medical_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function helphealth_medical_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'helphealth-medical' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'helphealth-medical' ) . '</span>', esc_html($categories_list) );
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'helphealth-medical' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'helphealth-medical' ) . '</span>', esc_html($tags_list) );
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'helphealth-medical' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'helphealth-medical' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;


/**
 * Add custom css to header
 */
if ( ! function_exists( 'helphealth_medical_custom_inline_style' ) ) {
	function helphealth_medical_custom_inline_style( ) {

            ob_start();

            /**
             * Site Colors
             */
			 
			 //Primary Colors
            $primary_color = sanitize_hex_color_no_hash( get_theme_mod( 'helphealth_medical_primary_color' ) );
            if ( $primary_color != '' ) {
				?>
                a,.post-meta p span i,.widget-area .widget ul li::after,.pagination-wrap .pagination-lg > li > a,.breadcrumbs a::after,.sticky .entry-header .entry-title::before, .pagination-wrap .pagination-lg > li > span,.entry-content ul li::before,.banner-content .post-meta i,.schedule-text h3,.slide-controls .owl-nav button:hover i,.mission h4,.service-box .icon i
                {
                    color: #<?php echo esc_attr( $primary_color ); ?>;
                }

                .widget-area .widget-title::before,.search-form label[for="search-button"],.pagination > li > span.current,.mb-dotate-btn,.btn-default, button, input[type="button"], input[type="reset"], input[type="submit"],.wp-block-search .wp-block-search__button,.widget-area .widget-title::before, .widget-area h2::before, .widget-area .wp-block-search__label::before,nav ul.main-nav > li > a::before,.preloader-bg,.service-box:hover .icon
                {
                    background-color: #<?php echo esc_attr( $primary_color ); ?>;
                }

                .pagination > li > span.current
                {
                    border-color : #<?php echo esc_attr( $primary_color ); ?>;
                }
                <?php
            } // End $primary_color

			//Secondary Colors
            $secondary_color = sanitize_hex_color_no_hash( get_theme_mod( 'helphealth_medical_secondary_color' ) );
            if ( $secondary_color != '' ) {
				?>
                a:hover, a:focus, a:active,.entry-header .entry-title a:hover,.post-meta p a:hover,nav ul.main-nav li.menu-item-has-children > a::after,.side-nav li.menu-item-has-children > a:after,.schedule-btn-wrap,.comment-meta a:hover,.content-404 h1,.widget-area .widget ul li a:hover,.feature h3,.social-icons a:hover,.footer-menu li a:hover,.copy-rights a:hover,.section-heading h2,.client-thumb i,.client-name .name,.side-nav ul li a:hover,.header-right .social-list a:hover, .header-right .social-list a:focus
                {
                    color: #<?php echo esc_attr( $secondary_color ); ?>;
                }

                .mb-dotate-btn:hover,.schedule-btn:hover,.pagination-wrap .pagination-lg > li > a:hover, .pagination-wrap .pagination-lg > li > span:hover,.back-to-top:hover,.btn-default:hover, button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, .wp-block-search .wp-block-search__button:hover,.search-form label[for="search-button"]:hover,.schedule-btn-wrap .schedule-btn:hover,.slide-controls .owl-dot.active span,.client-name .name::before
                {
                    background-color: #<?php echo esc_attr( $secondary_color ); ?>;
                }
				
                <?php
            } // End $secondary_color

			// Heading Color
			$heading_color = get_theme_mod('helphealth_medical_heading_color');
			if ($heading_color) {
				?>
					h1, h2, h3, h4, h5, h6, .entry-header .entry-title a,.widget-area .wp-block-search__label{
						color:<?php echo esc_attr( $heading_color ); ?>;
					}
				<?php
			} // END $helphealth_medical_heading_font_family

			// Body Text Color
			$body_text_color = get_theme_mod('helphealth_medical_body_text_color');
			if ( $body_text_color ) {
				?>
				body, p, .widget-area .widget ul li a,.post-meta p a,.schedule-text p {
					color: <?php echo esc_attr( $body_text_color ); ?>;
				}
				<?php
			} // END $body_text_color

            // Button BG Color
            $btn_bg_color = sanitize_hex_color_no_hash( get_theme_mod( 'helphealth_medical_btn_bg_color' ) );
            if ( $btn_bg_color != '' ) { ?>
                .entry-content .btn-more,.banner-content .cat a{
                    background-color: #<?php echo esc_attr( $btn_bg_color ); ?>;
                }
                <?php
            } // End $btn_bg_color

            // Button Hover BG Color
            $btn_bg_hover_color = sanitize_hex_color_no_hash( get_theme_mod( 'helphealth_medical_btn_bg_hover_color' ) );
            if ( $btn_bg_hover_color != '' ) {
				?>
                .entry-content .btn-more:hover,.banner-content .cat a:hover
                {
                    background-color: #<?php echo esc_attr( $btn_bg_hover_color ); ?>;
                }
                <?php
            } // End $btn_bg_hover_color

			// Button Text Color
			$btn_text_color = get_theme_mod('helphealth_medical_btn_text_color');
			if ( $btn_text_color ) {
				?>
				.entry-content .btn-more, .btn {
					color: <?php echo esc_attr( $btn_text_color ); ?>;
				}
				<?php
			} // END $btn_text_color

            /**
             * Typography
             */
			// Heading Fonts
			$heading_font_family = get_theme_mod('helphealth_medical_heading_font_family');
			if ( $heading_font_family ) {
				?>
					h1, h2, h3, h4, h5, h6, .entry-header .entry-title a,.widget-area .wp-block-search__label{
						font-family:<?php echo esc_attr( $heading_font_family ); ?>;
					}
				<?php
			} // END $heading_font_family
			
			// Body Font Family
			$body_font_family = get_theme_mod('helphealth_medical_body_font_family');
			if ( $body_font_family ) {
				?>
				body, p, .widget-area .widget ul li a,.post-meta p a {
					font-family: <?php echo esc_attr( $body_font_family ); ?>;
				}
				<?php
			} // END $body_font_family

			$body_font_size = get_theme_mod('helphealth_medical_body_font_size');
			if ( $body_font_size ) {
				?>
				body, p, .widget-area .widget ul li a,.post-meta p a {
					font-size: <?php echo esc_attr( $body_font_size ); ?>px;
				}
				<?php
			} // END $body_font_size
			
			// Button Font Family
			$btn_font_family = get_theme_mod('helphealth_medical_btn_font');
			if ( $btn_font_family ) {
				?>
				.btn, a.btn-more {
					font-family: <?php echo esc_attr( $btn_font_family ); ?> !important;
				}
				<?php
			} // END $btn_font_family

            /**
             * Header Settings
             */
			 // Header Backgrond
            $header_bg_color = sanitize_hex_color_no_hash( get_theme_mod( 'helphealth_medical_header_bg_color' ) );
            if ( $header_bg_color ) {
                ?>
                .site-header{
                    background-color: #<?php echo esc_attr( $header_bg_color ); ?>;
                }
                <?php
            } // END $header_bg_color

            /**
             * Navigation Settings
             */
            $navigation_bg = helphealth_medical_sanitize_color_alpha( get_theme_mod( 'helphealth_medical_navigation_bg' ) );
            if ( $navigation_bg ) {
				?>
                .site-navigation {
					background-color: <?php echo esc_attr( $navigation_bg ); ?>;
				}
            <?php }  // END $navigation_bg

			// Menu Fonts
			$menu_font = get_theme_mod('helphealth_medical_menu_font_family');
			if ( $menu_font ) {
				?>
				nav ul.main-nav li a,.side-nav ul li a{
					font-family: <?php echo esc_attr( $menu_font ); ?>;
				}
				<?php
			} //END $menu_font


            // Menu color
            $menu_color = sanitize_hex_color_no_hash( get_theme_mod( 'helphealth_medical_menu_color') );
            if ( $menu_color ) {
                ?>
                nav ul.main-nav > li > a{
                    color: #<?php echo esc_attr( $menu_color ); ?>;
                }
                <?php
            } // END $menu_color
			
            //Menu hover color
            $menu_hover_color = sanitize_hex_color_no_hash( get_theme_mod( 'helphealth_medical_menu_hover_color' ) );
            if ( $menu_hover_color ) {
                ?>
                nav ul.main-nav > li:hover > a, nav ul.main-nav ul li a:hover{
                    color: #<?php echo esc_attr( $menu_hover_color ); ?>;
                }
				<?php
            } // END $menu_hover_color

            /**
             * Dropdown Background
             */
            $navigation_dropdown_bg = helphealth_medical_sanitize_color_alpha( get_theme_mod( 'helphealth_medical_navigation_dropdown_bg' ) );
            if ( $navigation_dropdown_bg ) {
				?>
				   nav ul.main-nav ul.sub-menu, nav ul.main-nav > li:hover > a {
						background-color: <?php echo esc_attr( $navigation_dropdown_bg ); ?>;
					}
				<?php 	
            }//END $navigation_dropdown_bg

            /**
             * Banner Image
            */
			 // Overlay Color
            $banner_overlay = helphealth_medical_sanitize_color_alpha( get_theme_mod( 'banner_overlay_color' ) );
            if ( $banner_overlay ) { 
				?>
					.blog-header-overlay {
						background-color: <?php echo esc_attr( $banner_overlay ); ?>;
					}
				<?php
			} //END $banner_overlay
			
			// Banner Text Color
            $banner_text_color = sanitize_hex_color_no_hash( get_theme_mod( 'helphealth_medical_banner_text_color' ) );
            if ( $banner_text_color != '' ) {
				?>
					.banner-content .page-title, .breadcrumbs span, .breadcrumbs a, .banner-content .post-meta a {
						color: #<?php echo esc_attr( $banner_text_color ); ?>;
					}
				<?php
            } // End $banner_text_color


            /**
             * Footer Settings
             */
			 
			 // Background color
            $footer_bg_color = sanitize_hex_color_no_hash( get_theme_mod( 'helphealth_medical_footer_bg' ) );
            if ( $footer_bg_color != '' ) {
				?>
                .footer-area {
                    background-color: #<?php echo esc_attr($footer_bg_color); ?>;
                }
                <?php
            } // End $footer_bg_color
			
			// Social Icon Color
            $footer_social_color = sanitize_hex_color_no_hash( get_theme_mod( 'helphealth_medical_footer_social_color' ) );
            if ( $footer_social_color != '' ) {
				?>
                .footer-socials .social-icons a{
                    color: #<?php echo esc_attr( $footer_social_color ); ?>;
                }
                <?php
            } // End $footer_social_color

            //Footer Link Color
            $footer_link_color = sanitize_hex_color_no_hash( get_theme_mod( 'helphealth_medical_footer_link_color' ) );
            if ( $footer_link_color != '' ) {
				?>
                .footer-area .footer-menu li a  {
                    color: #<?php echo esc_attr($footer_link_color); ?>;
                }
                <?php
            } // End $footer_link_color

            //Footer Link hover Color
            $footer_link_hover_color = sanitize_hex_color_no_hash( get_theme_mod( 'helphealth_medical_footer_link_hover_color' ) );
            if ( $footer_link_hover_color != '' ) {
				?>
                .footer-area .footer-menu li a:hover,.footer-socials .social-icons a:hover{
                    color: #<?php echo esc_attr( $footer_link_hover_color ); ?>;
                }
                <?php
            } // End $footer_link_hover_color

            // Footer Copyright Text Color
            $copyright_text_color = sanitize_hex_color_no_hash( get_theme_mod( 'helphealth_medical_copyright_text_color' ) );
            if ( $copyright_text_color != '' ) {
				?>
                .copy-rights p,.copy-rights {
                    color: #<?php echo esc_attr($copyright_text_color); ?>;
                }
                <?php
            } // End $copyright_text_color


            // Homepage- slider 
			// Title color
            $slide_title_color = sanitize_hex_color_no_hash( get_theme_mod( 'helphealth_medical_slide_title_color' ) );
			if ( $slide_title_color != "" ) {
				?>
				.slide-content h2, .slide-content h2 a{
					color: #<?php echo esc_attr( $slide_title_color ); ?>;
				}
				<?php
			} //END $slide_title_color
			
            // CTA Button BG Color
            $cta_btn_bg_color = sanitize_hex_color_no_hash( get_theme_mod( 'helphealth_medical_cta_btn_bg_color' ) );
            if ( $cta_btn_bg_color != '' ) { ?>
                .schedule-btn-wrap .schedule-btn{
                    background-color: #<?php echo esc_attr( $cta_btn_bg_color ); ?>;
                }
                <?php
            } // End $cta_btn_bg_color
			
			
			// Description Color
            $slide_text_color = sanitize_hex_color_no_hash( get_theme_mod( 'helphealth_medical_slide_text_color' ) );
			if ( $slide_text_color != "" ) {
				?>
				.slide-content p{
					color: #<?php echo esc_attr( $slide_text_color ); ?>;
				}
				<?php
			} //END $slide_text_color

			 // Overlay Color
            $slide_overlay_color = helphealth_medical_sanitize_color_alpha( get_theme_mod( 'helphealth_medical_slide_overlay_color' ) );
            if ( $slide_overlay_color ) { 
				?>
					.single-slide .overlay {
						background-color: <?php echo esc_attr( $slide_overlay_color ); ?>;
					}
				<?php
			} //END $slide_overlay_color

            /**
             * Front Page Mission Background Color
             */
            $mission_bg = sanitize_hex_color_no_hash( get_theme_mod( 'helphealth_medical_mission_bg_color' ) );
            if ( $mission_bg != "" ) {
				?>
                .mission-area {
                    background-color: #<?php echo esc_attr( $mission_bg ); ?>;
                }
                <?php
            } // End $mission_bg

            /**
             * Front Page- Features Background
             */
            $features_bg_color = sanitize_hex_color_no_hash( get_theme_mod( 'helphealth_medical_features_bg_color' ) );
            if ( $features_bg_color ) {
                ?>
                .features-area{
                    background-color: #<?php echo esc_attr( $features_bg_color ); ?>;
                }
                <?php
            } // END $features_bg_color


            /**
             * Testimonial Background
             */
            $testimonial_bg_color = sanitize_hex_color_no_hash( get_theme_mod( 'helphealth_medical_testimonial_bg_color' ) );
            if ( $testimonial_bg_color ) {
                ?>
                .testimonials-area{
                    background-color: #<?php echo esc_attr( $testimonial_bg_color ); ?>;
                }
                <?php
            } // END $testimonial_topbg_color

            /**
             * Testimonial Top Background
             */
            $testimonial_topbg_color = sanitize_hex_color_no_hash( get_theme_mod( 'helphealth_medical_testimonial_topbg_color' ) );
            if ( $testimonial_topbg_color ) {
                ?>
                .testimonials-bg{
                    background-color: #<?php echo esc_attr( $testimonial_topbg_color ); ?>;
                }
                <?php
            } // END $testimonial_topbg_color

            /**
             * Schedule Background
             */
            $schedule_pbg_color = sanitize_hex_color_no_hash( get_theme_mod( 'helphealth_medical_schedule_bg_color' ) );
            if ( $schedule_pbg_color ) {
                ?>
                .schedule-area{
                    background-color: #<?php echo esc_attr( $schedule_pbg_color ); ?>;
                }
                <?php
            } // END $schedule_pbg_color

            /**
             * Front Page- Map
             */
            $map_bg_color = sanitize_hex_color_no_hash( get_theme_mod( 'helphealth_medical_map_bg_color' ) );
            if ( $map_bg_color ) {
                ?>
                .section-map{
                    background-color: #<?php echo esc_attr( $map_bg_color ); ?>;
                }
                <?php
            } // END $map_bg_color



			// Site title font
			$site_title_font_family = get_theme_mod('helphealth_medical_site_title_font_family');
			if ( $site_title_font_family ) {
				?>
				.logo-area .site-text{
					font-family: <?php echo esc_attr( $site_title_font_family ); ?>;
				}
				<?php
			} //END $site_title_font_family
			
			// Font Size
			$site_title_font_size =  get_theme_mod( 'helphealth_medical_site_title_font_size');
			if ( $site_title_font_size ) {
				?>
				.logo-area .site-text{
                    font-size: <?php echo esc_attr( $site_title_font_size ); ?>px;
				}
				<?php
			} //END $site_title_font_family
			
            // Site Title Color
            $site_title_color = sanitize_hex_color_no_hash( get_theme_mod( 'helphealth_medical_site_title_color' ) );
			if ( $site_title_color ) {
				?>
				.logo-area .site-text a{
					color: #<?php echo esc_attr( $site_title_color ); ?>;
				}
				<?php
			} //END $site_title_color
			

            // Site Tagline
			$site_tagline_font_family = get_theme_mod('helphealth_medical_tagline_font_family');
			$site_tagline_font_size =  get_theme_mod( 'helphealth_medical_tagline_font_size');
            $tagline_color = sanitize_hex_color_no_hash( get_theme_mod( 'helphealth_medical_tagline_text_color' ) );
			
			if ( $site_tagline_font_family || $site_tagline_font_size || $tagline_color ) {
				?>
				.text-logo-desc .site-description{
					font-family: <?php echo esc_attr( $site_tagline_font_family ); ?>;
					font-size: <?php echo esc_attr( $site_tagline_font_size ); ?>px;
					color: #<?php echo esc_attr( $tagline_color ); ?>;
				<?php
			} //END $site_tagline_font_family


        $css = ob_get_clean();

        if ( trim( $css ) == "" ) {
            return ;
        }
		$css = apply_filters( 'helphealth_medical_custom_css', $css ) ;
        if ( ! is_customize_preview() ) {
	        $css = preg_replace(
		        array(
			        // Remove comment(s)
			        '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')|\/\*(?!\!)(?>.*?\*\/)|^\s*|\s*$#s',
			        // Remove unused white-space(s)
			        '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\'|\/\*(?>.*?\*\/))|\s*+;\s*+(})\s*+|\s*+([*$~^|]?+=|[{};,>~+]|\s*+-(?![0-9\.])|!important\b)\s*+|([[(:])\s++|\s++([])])|\s++(:)\s*+(?!(?>[^{}"\']++|"(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')*+{)|^\s++|\s++\z|(\s)\s+#si',
		        ),
		        array(
			        '$1',
			        '$1$2$3$4$5$6$7',
		        ),
		        $css
	        );
        }
        if ( ! function_exists( 'wp_get_custom_css' ) ) {  // Back-compat for WordPress < 4.7.
            $custom = get_option('helphealth_medical_custom_css');
            if ($custom) {
                $css .= "\n/* --- Begin custom CSS --- */\n" . $custom . "\n/* --- End custom CSS --- */\n";
            }
        }
       return $css ;
	}

}
