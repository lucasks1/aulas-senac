<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Helphealth_Medical
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<div id="page">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'helphealth-medical' ); ?></a>
		<header id="masthead" class="site-header <?php if( get_theme_mod( 'helphealth_medical_sticky_header' ) ) : ?>sticky-header<?php endif; ?>">
			<div class="site-branding">
				<div class="<?php echo esc_attr( get_theme_mod('helphealth_medical_header_width', 'container') ); ?>">
					<div class="row vertical-align">
						<?php   $address  = get_theme_mod('helphealth_medical_office_address');
								$cta_phone = get_theme_mod('helphealth_medical_cta_phone'); 
								$cta_title = get_theme_mod('helphealth_medical_cta_title'); 
								$social_display = get_theme_mod('helphealth_medical_header_social_display', false); 
								$btn_url = get_theme_mod('helphealth_medical_donate_btn_url');
								$btn_text = get_theme_mod('helphealth_medical_donate_btn_text');
								$btn_target = get_theme_mod('helphealth_medical_donate_btn_target');
						?>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
							<?php if(!empty($address)) : ?>
							<div class="header-left"> 
								<p class="location">
									<i class="fa fa-map-marker" aria-hidden="true"></i> <span id="office-address"><?php echo esc_html($address); ?></span>
								</p>
							</div>
							<?php endif; ?>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
							<div class="row xs-vertical-align">
								<div class="col-xs-3 visible-xs-block"> 
									<button class="nav-toggle"><span></span></button>
									<nav class="side-nav">
										<?php if($cta_phone || $cta_title) : ?>
										<div class="menu-phone">
											<?php if($cta_title) : ?>
											<p><?php echo esc_html($cta_title); ?></p>
											<?php endif; ?>
											<?php if($cta_phone) : ?>
											<h3><?php echo esc_html( $cta_phone ); ?></h3>
											<?php endif; ?>
										</div>
										<?php endif; ?>
										<?php if ( has_nav_menu( 'mobile-menu' ) ) {
											wp_nav_menu( array(
												'theme_location' => 'mobile-menu',
												'container' => 'ul',
												'menu_class' => 'mobile-nav',
											) ); 
										}
										?>
										<?php if( $btn_text ) : ?>
										<div class="mb-menu-footer"> 
											<a href="<?php echo esc_url( $btn_url ); ?>" class="mb-dotate-btn" <?php if($btn_target == true) { ?> target="_blank"<?php }  ?>><?php echo esc_html( $btn_text ); ?></a>
										</div>
										<?php endif; ?>
									</nav>
								</div>
								<div class="col-xs-6 col-sm-12"> 
									<div class="logo-area">
									<?php $logo_option = get_theme_mod( 'site_logo_option' );
									if ( 'logo-only' == $logo_option )  { ?>
										<div class="logo">
											<?php 
											if( has_custom_logo() ) {  
												the_custom_logo(); 
											} ?>
										</div>   
									<?php } elseif( 'title-only' == $logo_option  ) { ?>
										<div class="text-logo">
											<?php if( is_home() && is_front_page() ) : ?>
											<h1 class="site-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h1>
											<?php else : ?>
											<h2 class="site-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h2>
											<?php endif; ?>
										</div>
									<?php } elseif( 'title-img' == $logo_option ) { ?>
										<div class="logo-title"> 
											<?php 
											if( has_custom_logo() ) {  
												the_custom_logo(); 
											}  ?>
											<?php if( is_home() && is_front_page() ) : ?>
											<h1 class="site-text hidden-xs"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h1>
											<?php else : ?>
											<h2 class="site-text hidden-xs"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h2>
											<?php endif; ?>
										</div>		
									<?php } else {  ?>	
										<div class="text-logo-desc">
											<?php if( is_home() && is_front_page() ) : ?>
											<h1 class="site-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h1>
											<?php else : ?>
											<h2 class="site-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h2>
											<?php endif; ?>
											<p class="site-description"><?php echo esc_html( bloginfo( 'description' ) ); ?></p>
										</div>
									<?php } ?>
									</div>
								</div>
								<div class="col-xs-3 visible-xs-block">
									<?php if( $social_display == true ) :?>
									<div class="header-right text-right"> 
										<div class="social-list"> 
											<?php helphealth_medical_social_icons(); ?>
										</div>
									</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-right hidden-xs">
							<?php if( $social_display || $btn_text ) :?>
							<div class="header-right"> 
								<?php if( $social_display == true ) :?>
								<div class="social-list"> 
									<?php helphealth_medical_social_icons(); ?>
								</div>
								<?php endif; ?>
								<?php if( $btn_text ) : ?>
								<a href="<?php echo esc_url( $btn_url ); ?>" class="mb-dotate-btn" <?php if($btn_target == true) { ?> target="_blank"<?php }  ?>><?php echo esc_html( $btn_text ); ?></a>
								<?php endif; ?>

							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<div id="site-navigation" class="site-navigation">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<nav class="text-center" role="navigation"> 
								<?php if (function_exists('wp_nav_menu')) {
										wp_nav_menu( array( 
											'theme_location' => 'primary-menu',
											'container' => 'ul',
											'menu_class' => 'main-nav',
											'fallback_cb' => 'helphealth_medical_default_menu' 
										) );
									}
									else {
										helphealth_medical_default_menu();
									}
								?>
							</nav>
						</div>
					</div>
				</div>
			</div>
        </header>
		