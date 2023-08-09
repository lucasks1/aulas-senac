<?php
/**
 *
 * @package HallWorth
 */

?>
<div class="col-sm-12 col-md-12 col-lg-12"> 
	<article id="post-<?php the_ID(); ?>" <?php post_class( array('post-detail') ); ?>>

		<!-- Start Entry Content -->
		<div class="entry-content"> 
			<?php
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'helphealth-medical' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);
				
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'helphealth-medical' ),
					'after'  => '</div>',
				) );
			?>
		</div>
		<!-- End Entry Content -->

	</article>
</div>