<?php
/**
 * Template part for displaying Google Map Section on home page template
 *
 * @package Helphealth_Medical
 */
$map_status = get_theme_mod('helphealth_medical_map_status');
$gmap_img = get_theme_mod('helphealth_medical_map_image'); 
$map_url = get_theme_mod('helphealth_medical_map_url'); 
$map_target = get_theme_mod('helphealth_medical_map_target'); 
if( !empty($gmap_img) && $map_status ) : ?>

<!-- Start Map Area -->
<div class="section-map primary-bg" id="map-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="location-map" style="background:url(<?php echo esc_url($gmap_img); ?>) no-repeat scroll center center;"> 
					<a class="gmap-btn" href="<?php echo esc_url($map_url); ?>" <?php if($map_target) { ?>target="_blank"<?php } ?>></a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Map Area -->
<?php endif; ?>
