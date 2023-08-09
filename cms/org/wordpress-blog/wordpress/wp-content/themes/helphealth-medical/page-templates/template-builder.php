<?php
/**
 * Template Name: Builder
 *
 * @package Helphealth_Medical
 */

get_header();
?>
<!-- Start Site Content -->
<div class="site-content">	
	<div class="page-container">
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_content(); ?>

			</article>
		<?php endwhile; ?>			
	</div>
</div>
<?php get_footer(); ?>