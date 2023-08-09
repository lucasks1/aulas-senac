<?php
/**
 * Template part for displaying Depeartment Section
 *
 * @package Helphealth_Medical
 */
 
if(get_theme_mod('helphealth_medical_department_status')) : ?>

<!-- Start Department Area -->
<div class="section department-area gray-bg" id="department-section">
	<div class="shape-ring"></div>
	<div class="shape-circle"></div>
	<div class="container-fluid"> 
		<div class="row">
			<?php
				$heading = get_theme_mod('helphealth_medical_department_heading');
				$subheading = get_theme_mod('helphealth_medical_department_subheading');
				$dept_btn_text = get_theme_mod('helphealth_medical_dept_btn_text');
				$dept_btn_url = get_theme_mod('helphealth_medical_dept_btn_url');
				$dept_btn_target = get_theme_mod('helphealth_medical_dept_btn_target');
			?>
			
			<div class="col-md-8 col-lg-3 col-lg-offset-2">
				<?php if($heading) : ?>
				<div class="section-heading">
					<h2><?php echo esc_html($heading); ?></h2>
					<?php if($subheading): ?>
					<p><?php echo esc_html($subheading); ?></p>
					<?php endif; ?>
					
					<?php if($dept_btn_text && $dept_btn_url) : ?>
					<a href="<?php echo esc_url($dept_btn_url); ?>" class="btn btn-default" <?php if($dept_btn_target) :?> target="_blank" <?php endif;?>>
						<?php echo esc_html($dept_btn_text); ?>
					</a>
					<?php endif; ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="col-md-12 col-lg-7">
				<?php 
					$dept_item_count = get_theme_mod('helphealth_medical_total_dept_count', 4); 
					$dept_content_type = get_theme_mod('depeartment_content_type', 'depeartment_featured_page');
					
					if( $dept_content_type == 'depeartment_featured_page' ) :
						for( $i=1; $i<=$dept_item_count; $i++ ) :
							$featured_dept_posts[] = get_theme_mod( 'featured_dept_page_'.$i );
						endfor;  
						$args = array (
							'post_type'     => 'page',
							'posts_per_page' => absint( $dept_item_count ),
							'post__in'      => $featured_dept_posts,
							'orderby'       =>'post__in',
						);
					elseif( $dept_content_type == 'depeartment_featured_post' ) :
						for( $i=1; $i<=$dept_item_count; $i++ ) :
							$featured_dept_posts[] = get_theme_mod( 'featured_dept_post_'.$i );
						endfor;
						$args = array (
							'post_type'     => 'post',
							'posts_per_page' => absint( $dept_item_count ),
							'post__in'      => $featured_dept_posts,
							'orderby'       =>'post__in',
							'ignore_sticky_posts' => true,
						);
					endif;
					$post_loop = new WP_Query($args);                        
					if ( $post_loop->have_posts() ) :
				?>
				<div class="dept-shape"></div>
				<div class="department-carousel slide-controls nav-topright">
					<?php
					while ($post_loop->have_posts()) : $post_loop->the_post();?>
					<div class="figitem">
						<figure>
							<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php the_post_thumbnail( 'helphealth-medical-dept-thumb'); ?>
								</a>
							<?php endif; ?>
							<figcaption>
								<h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
								<p><?php
								if ( ! has_excerpt() ) {
									echo esc_html( wp_trim_words( get_the_content(), 20 ) );
								} else { 
									the_excerpt();
								} 
								?></p>
							</figcaption>
						</figure>
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
<!-- End Department Area -->