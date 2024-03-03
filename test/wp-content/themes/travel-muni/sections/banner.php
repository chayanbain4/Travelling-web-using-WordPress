<?php
/**
 * Banner Section
 *
 * @package Travel_Muni
 */

$ed_banner            = get_theme_mod( 'ed_banner_section', 'static_banner' );
$header_image         = get_header_image();
$randomized_headers   = get_uploaded_header_images();
$banner_style         = 'background:url(' . esc_url( $header_image ) . ') no-repeat center center';
$banner_slider_layout = get_theme_mod( 'banner_slider_layout', 'three' );
if ( ( 'static_banner' === $ed_banner ) && has_custom_header() ) {
	/*
	** Header four slider layout here
	*/
	if ( 'three' === $banner_slider_layout ) { ?>
	<div id="banner_section" class="banner<?php echo has_header_video() ? esc_attr( ' video-banner' ) : esc_attr( ' default-banner' ); ?> layout-3">
		<div class="banner-slider-layout-3">
			<div class="item">
				<div class="banner-slider-inner">
						<?php travel_muni_header_image_block(); ?>
					<div class="banner-bg-wrap">
							<?php the_custom_header_markup(); ?>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- banner -->
	<?php } elseif ( 'two' === $banner_slider_layout ) { ?>
	<div id="banner_section" class="banner<?php echo has_header_video() ? esc_attr( ' video-banner' ) : esc_attr( ' default-banner' ); ?> layout-2">
		<div class="banner-slider-inner">
				<?php travel_muni_header_image_block(); ?>
			<div class="banner-bg-wrap">
					<?php if ( is_random_header_image() && $randomized_headers ) { ?>
					<div class="banner-slider-img-only banner-slider-com owl-carousel">
						<?php
						foreach ( $randomized_headers as $headers ) {
							$attachment_id = $headers['attachment_parent'];
							?>
							<div class="item">
								<div class="banner-bg-wrap-inner">
									<?php echo wp_get_attachment_image( $attachment_id, 'travel-muni-header-image-3' ); ?>
								</div>
							</div>
							<?php
						}
						?>
					</div>
					<?php } else { ?>
						<div class="banner-slider-img-only">
							<div class="item">
								<div class="banner-bg-wrap-inner">
									<?php the_custom_header_markup(); ?>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div> <!-- banner -->
	<?php } else { ?>
	<div id="banner_section" class="banner<?php echo has_header_video() ? esc_attr( ' video-banner' ) : esc_attr( ' default-banner' ); ?>">
		<div class="main-banner" style="<?php ( ! has_header_video() ) && print( esc_attr( $banner_style ) ); ?>">
			<?php
			if ( ! has_header_video() ) {
					travel_muni_header_image_block();
			} else {
				the_custom_header_markup();
				travel_muni_header_image_block();
			}
			?>
		</div><!-- .main-banner -->
	</div><!-- banner -->
	<?php } ?>
	<?php
}
