<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Helphealth_Medical
 */

?>

<?php if( is_page() ) { ?>
	<aside id="secondary" class="widget-area">	
		<?php dynamic_sidebar( 'page-sidebar' ); ?>
	</aside>
	
<?php } else { ?> 
	<aside id="secondary" class="widget-area">	
		<?php dynamic_sidebar( 'blog-sidebar' ); ?>
	</aside>
<?php } ?>