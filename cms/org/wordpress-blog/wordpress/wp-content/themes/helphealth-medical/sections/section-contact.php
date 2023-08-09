<?php
/**
 * Template part for displaying Contact Form Section
 *
 * @package Helphealth_Medical
 */

if(get_theme_mod('helphealth_medical_schedule_status')) : ?>

<!-- Start Schedule Area -->
<div class="schedule-area" id="schedule">
	<div class="container">
		<?php
			$heading = get_theme_mod('helphealth_medical_schedule_heading');
			$subheading = get_theme_mod('helphealth_medical_schedule_subheading');
		?>
		<?php if($heading) : ?>
		<div class="row"> 
			<div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
				<div class="section-heading text-white text-center">
					<h2><?php echo esc_html($heading); ?></h2>
					<?php if($subheading): ?>
					<p><?php echo esc_html($subheading); ?></p>
					<?php endif; ?>
					
				</div>
			</div>
		</div>
		<?php endif; ?>
	
		<div class="row">
			<div class="col-sm-5 col-md-5 col-lg-5">
				<?php
					$office_1 = get_theme_mod('helphealth_medical_contact_office_1');
					$office_1_addrs_ = get_theme_mod('helphealth_medical_office_1_adderess');
					$office_1_phone = get_theme_mod('helphealth_medical_office_1_phone');
					$office_1_email = get_theme_mod('helphealth_medical_office_1_email');
				if($office_1) : ?>
					<div class="address office-1">
						<h5><?php echo esc_html($office_1); ?></h5>
						<?php if($office_1_addrs_) : ?>
						<p><?php echo esc_html($office_1_addrs_); ?></p>
						<?php endif; ?>

						<?php if($office_1_phone || $office_1_email ) : ?>
						<p class="phone-email">
							<?php if($office_1_phone) : ?>
							<span class="phone"><a href="tel:<?php echo esc_attr($office_1_phone); ?>"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo esc_html($office_1_phone); ?></a></span>
							<?php endif; ?>
							
							<?php if($office_1_email) : ?>
							<span class="email"><a href="mailto:<?php echo esc_attr($office_1_email); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo esc_html($office_1_email); ?></a></span>
							<?php endif; ?>
						</p>
						<?php endif; ?>
					</div> 
				<?php endif; ?>
				<?php
					$office_2 = get_theme_mod('helphealth_medical_contact_office_2');
					$office_2_addrs_ = get_theme_mod('helphealth_medical_office_2_adderess');
					$office_2_phone = get_theme_mod('helphealth_medical_office_2_phone');
					$office_2_email = get_theme_mod('helphealth_medical_office_2_email');
				if($office_2) : ?>
					<div class="address office-2">
						<h5><?php echo esc_html($office_2); ?></h5>
						<?php if($office_2_addrs_) : ?>
						<p><?php echo esc_html($office_2_addrs_); ?></p>
						<?php endif; ?>

						<?php if($office_2_phone || $office_2_email ) : ?>
						<p class="phone-email">
						
							<?php if($office_2_phone) : ?>
							<span class="phone"><a href="tel:<?php echo esc_attr($office_2_phone); ?>"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo esc_html($office_2_phone); ?></a></span>
							<?php endif; ?>
							
							<?php if($office_2_email) : ?>
							<span class="email"><a href="mailto:<?php echo esc_attr($office_2_email); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo esc_html($office_2_email); ?></a></span>
							<?php endif; ?>
						</p>
						<?php endif; ?>
					</div> 
				<?php endif; ?>
			</div>
			<div class="col-sm-7 col-md-7 col-lg-7">
				<?php 
					$from_shortcode = get_theme_mod('schedule_form_shortcode'); 
				?>
				<?php if($from_shortcode) : ?>
				<div class="shedule-form"> 
					<?php echo do_shortcode( wp_kses_post( $from_shortcode ) ); ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<!-- End Schedule Area -->
<?php endif; ?>
