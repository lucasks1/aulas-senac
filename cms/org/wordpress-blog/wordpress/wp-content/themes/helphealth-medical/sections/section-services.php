<?php
/**
 * Template part for displaying Service Section on home page template
 *
 * @package Helphealth_Medical
 */
 
if(get_theme_mod('helphealth_medical_service_status')) :
?>

<!-- Start Services Section -->
<div class="section" id="services-section"> 
	<div class="container">

		<?php
			$heading = get_theme_mod('helphealth_medical_service_heading');
			$subheading = get_theme_mod('helphealth_medical_service_subheading');
		?>

		<?php if($heading) : ?>
		<div class="row"> 
			<div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2"> 
				<div class="section-heading service-heading text-center">
					<h2><?php echo esc_html($heading); ?></h2>
					<?php if($subheading): ?>
					<p><?php echo esc_html($subheading); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>

		<?php 
		$item_count = get_theme_mod('services_total_items_show', 6);
		$content_type = get_theme_mod('services_content_type', 'services_page');
		
		if( $content_type == 'services_page' ) :
			for( $i=1; $i<=$item_count; $i++ ) :
				$service_posts[] = get_theme_mod( 'featured_service_page_'.$i );
			endfor;  
			$args = array (
				'post_type'     => 'page',
				'posts_per_page' => absint( $item_count ),
				'post__in'      => $service_posts,
				'orderby'       =>'post__in',
			);
		elseif( $content_type == 'services_post' ) :
			for( $i=1; $i<=$item_count; $i++ ) :
				$service_posts[] = get_theme_mod( 'featured_service_post_'.$i );
			endfor;
			$args = array (
				'post_type'     => 'post',
				'posts_per_page' => absint( $item_count ),
				'post__in'      => $service_posts,
				'orderby'       =>'post__in',
				'ignore_sticky_posts' => true,
			); 
		endif;
		$post_loop = new WP_Query($args);                        
		if ( $post_loop->have_posts() ) :
		?>
			<div class="row flex-row">
				<?php
				$i= 0;
				while ($post_loop->have_posts()) : $post_loop->the_post(); $i++;
				$service_icon = get_theme_mod( 'helphealth_medical_service_icon'.$i, 'fa-stethoscope' ); 
					?>
					<div class="col-sm-6 col-md-6 col-lg-4"> 
						<div class="service-box icon-left">
							<?php if($service_icon) : ?>
							<span class="icon circle">
								<i class="fa <?php echo esc_html($service_icon); ?>" aria-hidden="true"></i>
							</span>
							<?php endif; ?>

							<div class="desc">
								<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								<p><?php
								if ( ! has_excerpt() ) {
									echo esc_html( wp_trim_words( get_the_content(), 12 ) );
								} else { 
									the_excerpt();
								} 
								?></p>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php
		endif; ?>
		<?php wp_reset_postdata(); ?>
	</div>
</div>
<!-- End Services Section -->
<?php endif; ?>
