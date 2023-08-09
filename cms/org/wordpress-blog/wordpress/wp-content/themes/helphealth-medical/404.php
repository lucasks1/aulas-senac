<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Helphealth_Medical
 */

get_header();
?>
	<!-- Start Page Banner -->
	<?php do_action('helphealth_medical_page_header'); ?>
	<!-- End Page Banner -->
	<!-- Start Site Content -->
	<div class="site-content pt-60 pb-75">	
		<div class="container">
			<div class="row">			
				<div class="col-xs-12 col-sm-12 col-md-12"> 
					<!-- Start Content Area -->
					<div id="primary"  class="content-area not-found"> 
					
						<div class="content-404 text-center">
							<h1 class="page-title"><?php esc_html_e( '404','helphealth-medical' ); ?></h1>
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'helphealth-medical' ); ?></p>

							<?php get_search_form(); ?>

						</div><!-- .page-content -->
						
						<?php 
						/**
						 * Latest Posts On 404
						 * 
						 * @hooked influencer_404_latest_posts
						*/
						do_action( 'helphealth_medical_404_posts' ); ?>
							
					</div>
					<!-- End Content Area -->
				</div>
			</div>
		</div>
	</div>
	<!-- End Site Content -->
<?php get_footer(); ?>