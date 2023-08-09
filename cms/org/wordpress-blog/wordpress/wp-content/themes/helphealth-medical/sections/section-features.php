<?php
/**
 * Template part for displaying Features Section on home page template
 *
 * @package Helphealth_Medical
 */
 
if(get_theme_mod('helphealth_medical_features_status')) : ?>
<!-- Start Features Area -->
<div class="features-area" id="features-section">
	<div class="container">
		<div class="row">
			<?php
			for( $i = 1; $i <= 3; $i++ ) {
				$feature_title = get_theme_mod( 'helphealth_medical_feature_title_'.$i ); 
				$feature_desc = get_theme_mod( 'helphealth_medical_feature_desc_'.$i ); 
			?>
			<div class="col-sm-4 col-lg-4"> 
				<div class="feature feature-<?php echo esc_attr($i); ?>"> 
					<?php if($feature_title) : ?>
					<h3><?php echo esc_html($feature_title); ?></h3>
					<?php endif; ?>
					<?php if($feature_desc) : ?>
					<p><?php echo esc_html($feature_desc); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<?php } ?>

		</div>
	</div>
</div>
<?php endif; ?>
<!-- End Features Area -->