<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Helphealth_Medical
 */

$helphealth_medical_post_cols = get_theme_mod( 'helphealth_medical_columns', 'three-columns' );
if( $helphealth_medical_post_cols == 'two-columns' ) :
	$helphealth_medical_post_class = 'col-sm-6 col-md-6 col-lg-6';
elseif( $helphealth_medical_post_cols == 'three-columns' ) :
	$helphealth_medical_post_class = 'col-sm-6 col-md-4 col-lg-4';
else :
	$helphealth_medical_post_class = 'col-sm-12 col-md-12';
endif;
 
?>
<div class="masonry-item <?php echo esc_attr( $helphealth_medical_post_class ); ?> animate-box"> 
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