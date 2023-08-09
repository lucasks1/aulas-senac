<?php
/**
 * Template Name: Contact Page
 *
 * @package Helphealth_Medical
*/
	get_header();
	$contact_title    = get_theme_mod( 'contact_title', 'Get in Touch'); 
	$contact_subtitle = get_theme_mod( 'contact_subtitle', ' We\'re always eager to hear from you!	'); 
	$google_map       = get_theme_mod( 'contact_google_map_iframe' );
?>

<!-- Start Site Content -->
<div class="site-content">	
	<div class="contact-wrap">
		<div class="container">
			<div class="row">
				<div class="col-md-6"> 
					<div class="contact-info"> 
						
					<?php
						if( $contact_title || $contact_subtitle ){
							?>
							<div class="contact-heading"> 
								<?php
									if( $contact_title ) echo '<h3>' . esc_html( $contact_title ) . '</h3>';
									if( $contact_subtitle ) echo '<p>' . esc_html( $contact_subtitle ) . '</p>';
								?>
							</div>
							<?php
						}
					?>
					<?php
                        /**
                         * 
                         * @hooked helphealth_medical_location       - 10
                         * @hooked helphealth_medical_center_mail    - 20
                         * @hooked helphealth_medical_phone          - 30
                         */
                        do_action( 'helphealth_medical_contact_list' );
                    ?>
					</div>
				</div>
				
				<div class="col-md-6">
					<?php helphealth_medical_contact_form(); ?>
				</div>
				
			</div>

			<?php if( $google_map ){ ?> 
			<div class="row">
				<div class="col-md-12">
					<div class="contact-map"> 
						<?php echo htmlspecialchars_decode( $google_map ); ?>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>