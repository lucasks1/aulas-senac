<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Helphealth_Medical
 */

get_header();

$helphealth_medical_blog_layout = get_theme_mod( 'helphealth_medical_layout', 'no-sidebar' );
if( $helphealth_medical_blog_layout == 'left-sidebar' || $helphealth_medical_blog_layout == 'right-sidebar' ) :
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
	<div class="site-content pt-95 pb-75">	
		<div class="container">
			<div class="row">	

				<!--Start Sidebar -->
				<?php if($helphealth_medical_blog_layout == 'left-sidebar') : ?>
				<div class="col-xs-12 <?php echo esc_attr( $aside_class ); ?>">
					<?php get_sidebar(); ?>
				</div>	
				<?php endif; ?>
				<!--End Sidebar -->

				<div class="col-xs-12 <?php echo esc_attr( $content_class ); ?>"> 
					<!-- Start Content Area -->
					<div id="primary"  class="content-area"> 
						<?php if ( have_posts() ) : ?>
						
						<?php $blog_style = get_theme_mod( 'helphealth_medical_post_style', 'masonry' ); ?>
						<div class="row <?php if( $blog_style == 'equal-height') : ?>flex-row <?php else : ?>grip-wrap<?php endif; ?>">

							<?php 
							/* Start the Loop */
							while ( have_posts() ) : the_post();
								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_type() );
							endwhile;
							?>

						</div>	
						<!-- Start Pagination row -->
						<?php helphealth_medical_posts_pagination(); ?>
						<!-- End Pagination row -->
						
						<?php else : ?>
							<?php get_template_part( 'template-parts/content', 'none' ); ?>
						<?php endif; ?>
					</div>
					<!-- End Content Area -->
				</div>
				
				<!--Start Sidebar -->
				<?php if($helphealth_medical_blog_layout == 'right-sidebar') : ?>
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
