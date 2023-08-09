<?php
/**
 * Template part for displaying Blog Posts Section on home page template
 *
 * @package Helphealth_Medical
 */
 
if(get_theme_mod('helphealth_medical_recent_posts_status')) :
?>
<!-- Start Blog Area -->
<div class="blog-section" id="recent-posts-section">
	<div class="container">
		<?php
			$heading = get_theme_mod('helphealth_medical_recent_posts_heading');
			$subheading = get_theme_mod('helphealth_medical_recent_posts_subheading');
		?>
		<?php if($heading) : ?>
		<div class="row"> 
			<div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2"> 
				<div class="section-heading text-center">
					<?php if($subheading): ?>
					<p class="subtitle"><?php echo esc_html($subheading); ?></p>
					<?php endif; ?>
					<h2><?php echo esc_html($heading); ?></h2>
				</div>
			</div>
		</div>
		<?php endif; ?>
		
		<?php
			$recent_post_type = esc_attr(get_theme_mod('helphealth_medical_recent_posts_options'));
			$recent_post_cat = esc_attr(get_theme_mod('helphealth_medical_recent_category_choice'));
			$recent_post_style = esc_attr(get_theme_mod('helphealth_medical_recent_post_style'));
			$sticky = get_option( 'sticky_posts' );
			
			if( $recent_post_type=='latest-post' ){
				$args = array( 'post_type' => 'post', 'order'=> 'DESC', 'posts_per_page' => 3, 'ignore_sticky_posts' => 1,'post__not_in' => $sticky); 
			} else {
				$args =  array( 'post_type' => 'post', 'order'=> 'DESC', 'posts_per_page' => 3, 'category_name' => $recent_post_cat, 'ignore_sticky_posts' => 1,'post__not_in' => $sticky);
			}
			
			$recent_post_query = new WP_Query($args); ?>
		<?php
		 if ( $recent_post_query->have_posts() ) : ?>
		<div class="row <?php if($recent_post_style == 'equal-height') { ?>flex-row<?php } ?>">

			<?php
			while ( $recent_post_query->have_posts() ) : $recent_post_query->the_post();?>
			<div class="col-sm-6 col-md-4 col-lg-4"> 
				<article class="helphealth-medical-post recent-posts">
					<!-- Start Post Thumbnail -->
					<?php
						$thubmnail_dispay = get_theme_mod('helphealth_medical_recent_post_thumb_display', true );
						if( $thubmnail_dispay == true && has_post_thumbnail() ) : ?>
						<div class="post-thumbnail"> 
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('helphealth-medical-blog-thumb'); ?></a>
						</div>
						<?php endif; ?>
					<!-- End Post Thumbnail -->

					<div class="post-content-wrap">
						<!-- Start Entry Header -->
						<div class="entry-header">
							<h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						</div>
						<!-- End Entry Header -->
						<?php
							 $post_meta_display = get_theme_mod('helphealth_medical_recent_post_meta_display', true );
							 $recent_post_cat = get_theme_mod('helphealth_medical_recent_post_cat_display', true );
							 $recent_post_date = get_theme_mod('helphealth_medical_recent_post_date_display', true );
						?>
						<!-- Start Post Meta -->
						<?php if($post_meta_display == true) : ?>
						<div class="post-meta"> 
						   <p>
							<?php 
							if($recent_post_cat == true ) { ?>
							<span><i class="fa fa-folder-open" aria-hidden="true"></i> <?php the_category( __( ', ', 'helphealth-medical' ));?> </span>
							<?php } ?>
							
							<?php 
							if( $recent_post_date == true ) { ?> 
							<span><i class="fa fa-clock-o" aria-hidden="true"></i> <a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></span> 
							<?php } ?>
							</p>
						</div>
						<?php endif; ?>
						<!-- End Post Meta -->
						
						<!-- Start Entry Content -->
						<div class="entry-content">
							<p><?php
							if ( ! has_excerpt() ) {
								echo esc_html( wp_trim_words( get_the_content(), 15 ) );
							} else { 
								the_excerpt();
							} 
							?></p>
							<a href="<?php the_permalink();?>" class="btn-more"><?php echo esc_html(get_theme_mod('helphealth_recentpost_readmore_text', 'Read More'));?></a>
						</div>
						<!-- End Entry Content -->
					</div>
				</article>
			</div>
			<?php
			endwhile;
				wp_reset_query(); 
			?>
		</div>
		<?php 
		endif;
		wp_reset_postdata(); ?>
			
	</div>
</div>
<!-- End Blog Area -->
<?php endif; ?>
