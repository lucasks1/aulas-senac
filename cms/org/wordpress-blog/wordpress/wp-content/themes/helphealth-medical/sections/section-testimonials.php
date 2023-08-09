<?php
/**
 * Template part for displaying Testimonials Section on home page template
 *
 * @package Helphealth_Medical
 */

if(get_theme_mod('helphealth_medical_testimonial_status')) : ?>
 
<!-- Start Testimonials Area -->
<div class="section testimonials-area gray-bg" id="testimonials-section">
	<div class="testimonials-bg"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php 
					$testimonials_count = get_theme_mod('testimonials_total_items_show', 3); 
					$testimonials_content_type = get_theme_mod('testimonial_content_type');
					
					if( $testimonials_content_type == 'testimonial_page' ) :
						for( $i=1; $i<=$testimonials_count; $i++ ) :
								$testimonial_posts[] = get_theme_mod( 'featured_testimonial_page_'.$i );
						endfor;
						$args = array (
							'post_type'     => 'page',
							'posts_per_page' => absint( $testimonials_count ),
							'post__in'      => $testimonial_posts,
							'orderby'       =>'post__in',
						);
					elseif( $testimonials_content_type == 'tesimonial_post' ) :
						for( $i=1; $i<=$testimonials_count; $i++ ) :
							$testimonial_posts[] = get_theme_mod( 'featured_testimonial_post_'.$i );
						endfor;
						$args = array (
							'post_type'     => 'post',
							'posts_per_page' => absint( $testimonials_count ),
							'post__in'      => $testimonial_posts,
							'orderby'       =>'post__in',
							'ignore_sticky_posts' => true,
						); 
					endif;
					$testi_loop = new WP_Query($args);                        
					if ( $testi_loop->have_posts() ) : 
					$i=-1; $j=0; 
				?>
				<div class="testimonial-carousel slide-controls">
					<?php
					while ($testi_loop->have_posts()) : $testi_loop->the_post(); $i++; $j++;
					$position[$j] = get_theme_mod('featured_testimonial_position_'.$j); 
					?>
					<div class="testimonial"> 
						<div class="client-thumb"> 
							<?php if ( has_post_thumbnail() ) : 
								the_post_thumbnail( 'helphealth-medical-client-thumb');
								else : 
								?>
								<i class="fa fa-quote-left" aria-hidden="true"></i>
								<?php
							 endif; ?>
						</div>
						<div class="client-info">
							<div class="client"> 
                                <?php
                                    $excerpt = helphealth_medical_the_excerpt( 20 );
                                    echo wp_kses_post( wpautop( $excerpt ) );
                                ?>
							</div>
							<div class="client-name">
								<p class="name"><?php the_title();?></p>
								<?php if( !empty($position[$j]) ):?>
								<p class="designation"><?php echo esc_html($position[$j]);?></p>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<!-- End Testimonials Area -->