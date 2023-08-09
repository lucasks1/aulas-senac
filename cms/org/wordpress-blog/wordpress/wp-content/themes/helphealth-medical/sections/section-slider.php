<?php
/**
 * Template part for displaying Slider Section on home page template
 *
 * @package Helphealth_Medical
 */

$slider_status = get_theme_mod('helphealth_medical_slider_status'); 
$cta_status = get_theme_mod('helphealth_medica_cta_status'); 

if($slider_status || $cta_status) : 
?>
<!-- Start Slider Area -->
<div class="slider-wrap" id="slider-section"> 
	<?php 
	if($slider_status) : ?>
	<div class="slider-area">
		<?php 
		$slide_item_count = get_theme_mod('slides_total_items_show', 3);
		$slides_content_type = get_theme_mod('slides_content_type', 'slides_page');
		$slider_text_alignment = get_theme_mod('slider_text_alignment');
		?>
		<?php
			if( $slides_content_type == 'slides_page' ) :
				for( $i=1; $i<=$slide_item_count; $i++ ) :
					$slide_posts[] = get_theme_mod( 'featured_slide_page_'.$i );
				endfor; 
				$args = array (
					'post_type'     => 'page',
					'posts_per_page' => absint( $slide_item_count ),
					'post__in'      => $slide_posts,
					'orderby'       =>'post__in',
				);
			elseif( $slides_content_type == 'slides_post' ) :
				for( $i=1; $i<=$slide_item_count; $i++ ) :
					$slide_posts[] = get_theme_mod( 'featured_slide_post_'.$i );
				endfor;
				$args = array (
					'post_type'     => 'post',
					'posts_per_page' => absint( $slide_item_count ),
					'post__in'      => $slide_posts,
					'orderby'       =>'post__in',
					'ignore_sticky_posts' => true,
				); 
			endif;

			$post_loop = new WP_Query($args);                        
			if ( $post_loop->have_posts() ) :
			?>
				<div id="helphealth-slider" class="slide-controls">
					<?php
					while ($post_loop->have_posts()) : $post_loop->the_post();
					$slide_thumb = get_the_post_thumbnail_url();
						?>
						<div class="single-slide" style="background-image:url(<?php echo esc_url( $slide_thumb ); ?>);">
							<div class="overlay"></div>
							<div class="slide-content-wrap"> 
								<div class="container"> 
									<div class="row">
										<div class="col-lg-10 col-lg-offset-1"> 
											<div class="slide-inner <?php echo esc_attr($slider_text_alignment); ?>">
												<div class="slide-content"> 
													<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
													<p><?php
													if ( ! has_excerpt() ) {
														echo esc_html( wp_trim_words( get_the_content(), 15 ) );
													} else { 
														the_excerpt();
													} 
													?></p>
													<a href="<?php the_permalink(); ?>" class="btn btn-default">
													<?php esc_html_e('Learn More', 'helphealth-medical'); ?>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			<?php
			endif; ?>
			<?php wp_reset_postdata(); ?>
	</div>
	<?php
	 endif; ?>

	<?php
	if($cta_status) : 
		$cta_title = get_theme_mod('helphealth_medical_cta_title', __('Questions?', 'helphealth-medical') ); 
		$cta_desc = get_theme_mod('helphealth_medical_cta_desc', __('We\'re happy to help', 'helphealth-medical')); 
		$cta_phone = get_theme_mod('helphealth_medical_cta_phone', __('123-456-7890', 'helphealth-medical')); 
		$cta_btn_text = get_theme_mod('helphealth_medical_cta_btn_text', __('Schedule a Tour', 'helphealth-medical')); 
		$cta_btn_url = get_theme_mod('helphealth_medical_cta_btn_url'); 
		$cta_btn_target = get_theme_mod('helphealth_medical_cta_btn_target'); 
		$btn_target = $cta_btn_target ? 'target="_blank"' : '';
	if( $cta_btn_text && $cta_btn_url ) : 
		$btn_class = "has-btn";
	endif;

	?>
	<div class="schedule-btn-wrap <?php echo esc_attr($btn_class); ?>"  id="cta-section"> 
		<div class="schedule-cta">
			<div class="schedule-text">
				<?php if($cta_title) : ?>
				<h3><?php echo esc_html($cta_title); ?></h3>
				<?php endif; ?>
				
				<?php if($cta_desc) : ?>
				<p><?php echo esc_html($cta_desc); ?></p>
				<?php endif; ?>
				
				<?php if($cta_phone) : ?>
				<a class="phone" href="<?php echo esc_url('tel:' . preg_replace( '/[^\d+]/', '', $cta_phone ) ); ?>"><?php echo esc_html($cta_phone); ?></a>
				<?php endif; ?>
			</div>
			<?php if($cta_btn_text && $cta_btn_url) : ?>
			<a href="<?php echo esc_url($cta_btn_url); ?>" <?php echo $btn_target; ?> class="schedule-btn"> 
				<span><?php echo esc_html($cta_btn_text); ?></span>
			</a>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>
</div>
<!-- End Slider Area -->
<?php endif; ?>
