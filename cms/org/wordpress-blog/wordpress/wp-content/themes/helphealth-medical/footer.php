<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Helphealth_Medical
 */
 ?>
		<!-- Start Footer Area -->
		<footer class="footer-area">
			<?php 
			do_action('helphealth_medical_before_site_info');
			?>
			<!-- End Footer Widgets Area  -->
			
			<!-- Start Footer Bottom -->
			<?php
			/**
			 * hooked helphealth_medical_footer_copyright
			 * @see helphealth_medical_footer_copyright
			 */
			do_action('helphealth_medical_footer_copyright');
			?>
		</footer>	
	</div>	
	
	<!-- Start Preloader -->
	<?php $preloader = get_theme_mod( 'helphealth_medical_preloader_display', 1 ); ?>
	<?php if( $preloader ) : ?>
	<div class="preloader-bg">
		<div class="hwh-circle">
		<div class="hwh-circle1 hwh-child"></div>
		<div class="hwh-circle2 hwh-child"></div>
		<div class="hwh-circle3 hwh-child"></div>
		<div class="hwh-circle4 hwh-child"></div>
		<div class="hwh-circle5 hwh-child"></div>
		<div class="hwh-circle6 hwh-child"></div>
		<div class="hwh-circle7 hwh-child"></div>
		<div class="hwh-circle8 hwh-child"></div>
		<div class="hwh-circle9 hwh-child"></div>
		<div class="hwh-circle10 hwh-child"></div>
		<div class="hwh-circle11 hwh-child"></div>
		<div class="hwh-circle12 hwh-child"></div>
		</div>
	</div>
	<?php endif; ?>
	<!-- End Preloader  -->
	
	<?php $backtotop = get_theme_mod( 'helphealth_medical_backto_top_display', 1 ); ?>
	<?php if( $backtotop ) : ?>
	<a href="#page" class="back-to-top" id="back-to-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
	<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>