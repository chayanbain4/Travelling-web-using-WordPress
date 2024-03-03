<?php

/**
 * Header Five
 *
 * @package Travel_Muni
 */

$phone_label = get_theme_mod( 'phone_label' );
$email_label = get_theme_mod( 'header_email_label' );
$vip_image   = get_theme_mod( 'header_vip_image' );

$use_default_content = 'five' === get_theme_mod( 'header_layout', 'five' );


// Mobile Header.
travel_muni_mobile_header(); ?>
<!-- Header of the site -->
<header id="masthead" class="site-header header-layout-5" itemscope itemtype="https://schema.org/WPHeader">
	<div class="header-t">
	</div>
	<div class="header-m">
		<div class="container-full">
			<div class="header-m-lft-wrap">
				<?php travel_muni_site_branding( false ); ?>
			</div>
			<div class="header-m-mid-wrap">
				<?php if ( $use_default_content ) : ?>
				<div class="contact-wrap-head">
					<div class="vib-whats">
						<div class="vib-whats-txt">
							<?php
							if ( $phone_label ) {
								echo '<h6 class="head5-titl">' . esc_html( travel_muni_get_phone_label() ) . '</h6>';
							}
							travel_muni_header_phone();
							?>
						</div>
						<?php
						if ( $vip_image ) {
							?>
							<div class="vib-whats-dp">
								<img src="<?php echo esc_url( $vip_image ); ?>" alt="<?php echo esc_attr( 'Contact Person Image' ); ?>">
							</div>
						<?php } ?>
					</div>
					<div class="head-5-contlinks">
						<?php
						if ( $email_label ) {
							echo '<h6 class="head5-titl">' . esc_html( travel_muni_get_header_email_label() ) . '</h6>';
						}
						travel_muni_header_email();
						?>
					</div>
				</div>
				<?php endif; ?>
			</div>
			<div class="header-m-rght-wrap">
				<?php
				if ( function_exists( 'travel_muni_header_customize_trip' ) ) {
					travel_muni_header_customize_trip();
				}
				?>
			</div>
		</div>
	</div>
	<div class="sticky-holder"></div>
	<div class="header-b">
		<div class="container-full">
			<div class="navigation-wrap">
				<?php travel_muni_primary_nagivation(); ?>
				<?php travel_muni_header_search(); ?>
			</div>
			<div class="social-flgswrap">
				<div class="social-media-wrap">
					<?php
					if ( function_exists( 'travel_muni_social_links' ) && travel_muni_social_links( false ) ) {
						travel_muni_social_links();
					}
					?>
				</div>
				<?php if ( travel_muni_is_currency_converter_activated() || travel_muni_is_polylang_active() || travel_muni_is_wpml_active() ) { ?>
					<div class="languagendcurrency-wrap">
						<?php
						/**
						 * Language Switcher
						 */
						do_action( 'travel_muni_language_switcher' );
						?>
						<?php
						/**
						 * Currency Converter
						 */
						do_action( 'travel_muni_currency_converter' );
						?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div> <!-- header-b -->
</header> <!-- site-header -->
