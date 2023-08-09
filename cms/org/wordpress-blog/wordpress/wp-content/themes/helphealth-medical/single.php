<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Helphealth_Medical
 */

get_header();

$helphealth_medical_blog_sinle_layout = get_theme_mod( 'helphealth_medical_blog_single_layout', 'right-sidebar' );
if( $helphealth_medical_blog_sinle_layout == 'left-sidebar' || $helphealth_medical_blog_sinle_layout == 'right-sidebar' ) :
	$content_class = 'col-sm-7 col-md-9 col-lg-9';
	$aside_class = 'col-sm-5 col-md-3 col-lg-3';
else :
	$content_class = 'col-md-12';
endif;
	
?>
	<!-- Start Page Banner -->
	<?php do_action('helphealth_medical_page_header'); ?>
	<!-- End Page Banner -->
	<!-- Start Site Content -->
	<div class="site-content pt-70 pb-75">	
		<div class="container">
			<div class="row">	
			
				<!--Start Sidebar -->
				<?php if($helphealth_medical_blog_sinle_layout == 'left-sidebar') : ?>
				<div class="col-xs-12 <?php echo esc_attr( $aside_class ); ?>">
					<?php get_sidebar(); ?>
				</div>	
				<?php endif; ?>
				<!--End Sidebar -->

				<div class="col-xs-12 <?php echo esc_attr( $content_class ); ?>"> 
					<!-- Start Content Area -->
					<div id="primary"  class="content-area"> 
						<div class="row">

							<?php 
							/* Start the Loop */
							while ( have_posts() ) : the_post();
								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								get_template_part( 'template-parts/content', 'single' );

								?>
								
								<div class="col-sm-12 col-md-12 col-lg-12"> 
								<?php
								the_post_navigation( array(
									'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Article', 'helphealth-medical' ) . '</span> ' .
										'<span class="post-title">%title</span>',
									'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous Article', 'helphealth-medical' ) . '</span> ' .
										'<span class="post-title">%title</span>',
								) );
								?>
								</div>
								
								<?php 
								if ( get_theme_mod( 'helphealth_medical_related_post_display', 1) ) {
									get_template_part( 'template-parts/related-posts' );
								}

							    if ( get_theme_mod( 'helphealth_medical_post_comments_display', 1 ) ) {
									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;
							    }

							endwhile;
							?>

						</div>	
					</div>
					<!-- End Content Area -->
				</div>

				<!--Start Sidebar -->
				<?php if($helphealth_medical_blog_sinle_layout == 'right-sidebar') : ?>
				<div class="col-xs-12 <?php echo esc_attr( $aside_class ); ?>">
					<?php get_sidebar(); ?>
				</div>	
				<?php endif; ?>
				<!--End Sidebar -->

			</div>
		</div>
	</div>
	<!-- End Site Content -->
<?php get_footer(); ?>