<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Helphealth_Medical
 */

get_header();
	$helphealth_medical_page_layout = get_theme_mod( 'helphealth_medical_page_layout', 'no-sidebar');
	if( $helphealth_medical_page_layout == 'left-sidebar' || $helphealth_medical_page_layout == 'right-sidebar' ) :
		$content_class = 'col-sm-7 col-md-9 col-lg-9';
		$aside_class = 'col-sm-5 col-md-3 col-lg-3';
	else :
		$content_class = 'col-md-12';
	endif;
?>
	<!-- Start Page Banner -->
	<?php do_action('helphealth_medical_page_header'); ?>
	<!-- End Page Banner -->
	
	<div class="site-content pt-95 pb-75">	
		<div class="container">
			<div class="row">	
			
				<?php if($helphealth_medical_page_layout == 'left-sidebar') : ?>
				<!--Start Sidebar -->
				<div class="col-xs-12 <?php echo esc_attr( $aside_class ); ?>">
					<?php get_sidebar(); ?>
				</div>	
				<!--End Sidebar -->
				<?php endif; ?>
			
				<div class="col-xs-12 <?php echo esc_attr( $content_class ); ?>"> 
					<!-- Start Content Area -->
					<div id="primary"  class="content-area"> 
						<div class="row">
							<?php 
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/content', 'page' );
								
								if ( get_theme_mod( 'helphealth_medical_page_comments_display', 1 ) ) {
									// If comments are open or we have at least one comment, load up the comment template
									if ( comments_open() || '0' != get_comments_number() ) :
										comments_template();
									endif;
								}
							endwhile;
							?>
						</div>	
					</div>
					<!-- End Content Area -->
				</div>
				
				<?php if($helphealth_medical_page_layout == 'right-sidebar') : ?>
				<!--Start Sidebar -->
				<div class="col-xs-12 <?php echo esc_attr( $aside_class ); ?>">
					<?php get_sidebar(); ?>
				</div>	
				<!--End Sidebar -->
				<?php endif; ?>
				
			</div>
		</div>
	</div>
	<!-- End Site Content -->
<?php get_footer(); ?>