<?php
/**
 * Info Section
 *
 * @package Travel_Muni
 */

if ( is_active_sidebar( 'info' ) ) { ?>
	<section id="about_section" class="three-cols">
		<div class="container">
			<div class="three-cols-wrap">
				<?php dynamic_sidebar( 'info' ); ?>
			</div>
		</div>
	</section><!-- info-section -->
	<?php
}
