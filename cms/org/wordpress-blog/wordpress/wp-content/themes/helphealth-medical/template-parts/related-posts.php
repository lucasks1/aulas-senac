<?php 
/**
 * Template part for displaying related posts
 *
 * @package Medica
 */
$related_posts = helphealth_medical_related_posts(); 
 
if ( $related_posts->have_posts() ): ?>

	<div class="related-posts tg-column-wrapper clearfix">
		<div class="col-md-12">
		<?php 
			$related_posts_label = get_theme_mod( 'helphealth_medical_related_posts_label', __( 'You May Also Like...', 'helphealth-medical' ) ); 
		?>
			<?php if($related_posts_label) : ?>
			<div class="related-heading">
				<h4><?php echo esc_html( $related_posts_label ); ?></h4>
			</div>
			<?php endif; ?>
			<div class="row flex-row">
				<?php 

				while ( $related_posts->have_posts() ) : $related_posts->the_post();

				$helphealth_medical_blog_sinle_layout = get_theme_mod( 'helphealth_medical_blog_single_layout', 'right-sidebar' );
				if( $helphealth_medical_blog_sinle_layout == 'left-sidebar' || $helphealth_medical_blog_sinle_layout == 'right-sidebar' ) :
					$content_class = 'col-md-6 col-lg-6';
				else :
					$content_class = 'col-md-4 col-lg-4';
				endif;

				?>
				<div class="col-sm-12 <?php echo esc_attr( $content_class ); ?> animate-box"> 
					<article id="post-<?php the_ID(); ?>" <?php post_class( array('helphealth-medical-post') ); ?>>
						<!-- Start Post Thumbnail -->
						<?php 
						if( get_theme_mod('helphealth_medical_post_thumbnail_display', 1) ) {
							helphealth_medical_post_thumbnail();
						} ?>
						<!-- End Post Thumbnail -->	
						<div class="post-content-wrap"> 
							<!-- Start Entry Header -->
							<div class="entry-header">
								<h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							</div>
							<!-- End Entry Header -->

							<!-- Start Post Meta -->
							<?php 
							if( get_theme_mod('helphealth_medical_post_meta_display', 1) ) {
								helphealth_medical_post_meta(); 
							} ?>
							<!-- End Post Meta -->

							<!-- Start Entry Content -->
							<div class="entry-content"> 
								<?php 
									the_excerpt(); 

									do_action('helphealth_medical_read_more_text');
									
									wp_link_pages( array(
										'before' => '<div class="page-links">' . __( 'Pages:', 'helphealth-medical' ),
										'after'  => '</div>',
									) );
								?>
							</div>
							<!-- End Entry Content -->
						</div>
					</article>
				</div>

				<?php
				endwhile;
				wp_reset_postdata();
				?>

			</div>
		</div>
	</div>
<?php endif; ?>