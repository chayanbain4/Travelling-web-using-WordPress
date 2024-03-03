<?php
/**
 * Header One
 *
 * @package Travel_Muni
 */

// Mobile Header.
travel_muni_mobile_header(); ?>

<!-- Header of the site -->
<header id="masthead" class="site-header header-layout-1" itemscope itemtype="https://schema.org/WPHeader">
	<?php if ( travel_muni_social_links( false ) || travel_muni_is_tbt_activated() || travel_muni_is_currency_converter_activated() || travel_muni_is_polylang_active() || travel_muni_is_wpml_active() ) { ?>
	<div class="header-t">
		<div class="container-full">
			<div class="header-t-rght-wrap">
				<div class="social-media-wrap">
					<?php
					if ( function_exists( 'travel_muni_social_links' ) && travel_muni_social_links( false ) ) {
						travel_muni_social_links();
					}
					?>
				</div>
				<?php
				if ( travel_muni_is_tbt_activated() ) {
					travel_muni_header_email();}
				?>
			</div>
			<div class="header-t-lft-wrap">
				<?php
				if ( travel_muni_is_tbt_activated() ) {
					travel_muni_header_phone();}
				?>
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
	</div> <!-- header-t -->
	<?php } ?>
	<div class="header-m"></div>
	<div class="sticky-holder"></div>
	<div class="header-b">
		<div class="container-full">
			<?php travel_muni_site_branding(); ?>
			<div class="navigation-wrap">
				<?php travel_muni_primary_nagivation(); ?>
				<?php travel_muni_header_search(); ?>
			</div>
			<?php
			if ( function_exists( 'travel_muni_header_customize_trip' ) ) {
				travel_muni_header_customize_trip();
			}
			?>
		</div>
	</div> <!-- header-b -->
</header> <!-- site-header -->
