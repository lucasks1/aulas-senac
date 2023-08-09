<?php
/**
 * Template part for displaying Mission Section on home page template
 *
 * @package Helphealth_Medical
 */
 
 if(get_theme_mod('helphealth_medical_mission_status')) :
 ?>
<!-- Start Missin Area -->
<div class="mission-area" id="mission-section">
	<?php 
		$missin_bg = get_theme_mod( 'helphealth_medical_mission_bg_image', get_template_directory_uri() . '/assets/img/mission.jpg');
		$section_heading = get_theme_mod( 'helphealth_medical_mission_heading', __('Our Mission & Values', 'helphealth-medical'));
		$mission_title = get_theme_mod( 'helphealth_medical_mission_title');
		$mission_desc = get_theme_mod( 'helphealth_medical_mission_desc');
		$mission_btn_text = get_theme_mod('helphealth_medical_mission_btn_text'); 
		$mission_btn_url = get_theme_mod('helphealth_medical_mission_btn_url'); 
		$mission_btn_trgt = get_theme_mod('helphealth_medical_banner_btn_trgt', false); 
	?>

	<?php if($section_heading ) : ?>
	<div class="mission-heading has-overlay" style="background:url(<?php echo esc_url($missin_bg); ?>) no-repeat scroll center center;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center"> 
					<h2><?php echo esc_html($section_heading ); ?></h2>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<?php if($mission_title || $mission_desc): ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12"> 
				<div class="mission text-center">
					<?php if($mission_title ) : ?>
					<h4><?php echo esc_html($mission_title ); ?></h4>
					<?php endif; ?>

					<?php if($mission_desc ) : ?>
					<p><?php echo esc_html($mission_desc ); ?></p>
					<?php endif; ?>

					<?php if($mission_btn_url || $mission_btn_text) : ?>
					<a href="<?php echo esc_url($mission_btn_url);?>" <?php if($mission_btn_trgt) {?>target="_blank"<?php } ?> class="btn btn-default">
						<?php echo esc_html($mission_btn_text);?>
					</a>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</div>
<!-- End Missin Area -->
<?php endif; ?>
