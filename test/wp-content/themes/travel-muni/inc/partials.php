<?php
/**
 * Travel Muni Customizer Partials
 *
 * @package Travel_Muni
 */

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function travel_muni_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return travel_muni_customize_partial_blogdescription
 */
function travel_muni_customize_partial_blogdescription() {
	return bloginfo( 'description' );
}

/*************
----Front Page
 */

/*************
 * Banner Section
 *
 * @section-- Homepage
 */
if ( ! function_exists( 'travel_muni_get_banner_title' ) ) :
	/**
	 * Banner Title
	 */
	function travel_muni_get_banner_title() {
		return esc_html( get_theme_mod( 'banner_title', __( 'Find Your Best Holiday', 'travel-muni' ) ) );
	}

endif;

if ( ! function_exists( 'travel_muni_get_banner_sub_title' ) ) :
	/**
	 * Banner Subtitle
	 */
	function travel_muni_get_banner_sub_title() {
		return wp_kses_post( wpautop( get_theme_mod( 'banner_subtitle', __( 'Find great adventure holidays and activities around the planet.', 'travel-muni' ) ) ) );
	}

endif;

if ( ! function_exists( 'travel_muni_get_banner_label' ) ) :
	/**
	 * Banner Button label
	 */
	function travel_muni_get_banner_label() {
		return esc_html( get_theme_mod( 'banner_label', __( 'Explore All', 'travel-muni' ) ) );
	}
endif;

if ( ! function_exists( 'travel_muni_get_phone' ) ) :
	/**
	 * Phone
	 */
	function travel_muni_get_phone() {
		return esc_html( get_theme_mod( 'phone' ) );
	}

endif;

if ( ! function_exists( 'travel_muni_get_phone_label' ) ) :
	/**
	 * Phone Label
	 */
	function travel_muni_get_phone_label() {
		return esc_html( get_theme_mod( 'phone_label' ) );
	}
endif;
if ( ! function_exists( 'travel_muni_get_email' ) ) :
	/**
	 * Email
	 */
	function travel_muni_get_email() {
		return esc_html( get_theme_mod( 'email' ) );
	}

endif;

if ( ! function_exists( 'travel_muni_get_header_email_label' ) ) :
	/**
	 * Email Label
	 */
	function travel_muni_get_header_email_label() {
		return esc_html( get_theme_mod( 'header_email_label' ) );
	}
endif;


/*************
 * Intro Section
 *
 * @section-- Homepage
 */
if ( ! function_exists( 'travel_muni_get_intro_title' ) ) :
	/**
	 * Intro Title
	 */
	function travel_muni_get_intro_title() {
		return esc_html( get_theme_mod( 'intro_title', __( 'Create Your Travel Booking Website with Travel Muni Theme', 'travel-muni' ) ) );
	}

endif;

if ( ! function_exists( 'travel_muni_get_intro_readmore' ) ) :
	/**
	 * Intro Readmore label
	 */
	function travel_muni_get_intro_readmore() {
		return esc_html( get_theme_mod( 'intro_readmore', __( 'Know More About Us', 'travel-muni' ) ) );
	}

endif;

/*************
 * Top Destination Section
 *
 * @section-- Homepage
 */
if ( ! function_exists( 'travel_muni_get_destination_title' ) ) :
	/**
	 * Destination Title
	 */
	function travel_muni_get_destination_title() {
		return esc_html( get_theme_mod( 'destination_title', __( 'Top Destinations', 'travel-muni' ) ) );
	}

endif;

if ( ! function_exists( 'travel_muni_get_destination_desc' ) ) :
	/**
	 * Destination Desc
	 */
	function travel_muni_get_destination_desc() {
		return wp_kses_post( wpautop( get_theme_mod( 'destination_desc', __( 'For the Tours in Nepal, Trekking in Nepal, Holidays and Air Ticketing. We offer and we are committed to making your time in Nepal.', 'travel-muni' ) ) ) );
	}
endif;

if ( ! function_exists( 'travel_muni_get_destination_more_label' ) ) :
	/**
	 * Destination Label
	 */
	function travel_muni_get_destination_more_label() {
		return esc_html( get_theme_mod( 'destination_more_label', __( '28+ Top Destinations', 'travel-muni' ) ) );
	}

endif;

if ( ! function_exists( 'travel_muni_get_destination_view_more_label' ) ) :
	/**
	 * Destination More Label
	 */
	function travel_muni_get_destination_view_more_label() {
		return esc_html( get_theme_mod( 'destination_view_more_label', __( 'View All', 'travel-muni' ) ) );
	}

endif;

/*************
 * Clients Testimonial Section
 *
 * @section-- Homepage
 */

if ( ! function_exists( 'travel_muni_get_testimonial_title' ) ) :
	/**
	 * Testimonial Title
	 */
	function travel_muni_get_testimonial_title() {
		return esc_html( get_theme_mod( 'testimonial_title', __( 'Clients Testimonials', 'travel-muni' ) ) );
	}
endif;

if ( ! function_exists( 'travel_muni_get_testimonial_section_btn_label' ) ) :
	/**
	 * Testimonial Label
	 */
	function travel_muni_get_testimonial_section_btn_label() {
		return esc_html( get_theme_mod( 'testimonial_section_btn_label', __( 'Read More Reviews', 'travel-muni' ) ) );
	}
endif;

/*************
 * Popular Section
 *
 * @section-- Homepage
 */

if ( ! function_exists( 'travel_muni_get_popular_title' ) ) :
	/**
	 * Popular Title
	 */
	function travel_muni_get_popular_title() {
		return esc_html( get_theme_mod( 'popular_title', __( 'Popular Trips', 'travel-muni' ) ) );
	}
endif;

if ( ! function_exists( 'travel_muni_get_popular_desc' ) ) :
	/**
	 * Popular Desc
	 */
	function travel_muni_get_popular_desc() {
		return wp_kses_post( wpautop( get_theme_mod( 'popular_desc', __( 'The origin of the word travel is most likely lost to history. The term travel may originate from the Old French word travail.', 'travel-muni' ) ) ) );
	}
endif;

if ( ! function_exists( 'travel_muni_get_popular_view_more_label' ) ) :
	/**
	 * Popular More Label
	 */
	function travel_muni_get_popular_view_more_label() {
		return esc_html( get_theme_mod( 'popular_view_more_label', __( 'View More Trips', 'travel-muni' ) ) );
	}
endif;

/*************
 * Activities Section
 *
 * @section-- Homepage
 */

if ( ! function_exists( 'travel_muni_get_activities_title' ) ) :
	/**
	 * Activity Title
	 */
	function travel_muni_get_activities_title() {
		return esc_html( get_theme_mod( 'activities_title', __( 'Category', 'travel-muni' ) ) );
	}
endif;

if ( ! function_exists( 'travel_muni_get_activities_desc' ) ) :
	/**
	 * Activity Desc
	 */
	function travel_muni_get_activities_desc() {
		return wp_kses_post( wpautop( get_theme_mod( 'activities_desc', __( 'The origin of the word travel is most likely lost to history. The term travel may originate from the Old French word travail.', 'travel-muni' ) ) ) );
	}
endif;

/*************
 * Special Section
 *
 * @section-- Homepage
 */

if ( ! function_exists( 'travel_muni_get_special_offer_title' ) ) :
	/**
	 * Special Title
	 */
	function travel_muni_get_special_offer_title() {
		return esc_html( get_theme_mod( 'special_offer_title', __( 'Special Offers', 'travel-muni' ) ) );
	}
endif;

if ( ! function_exists( 'travel_muni_get_special_offer_desc' ) ) :
	/**
	 * Special Desc
	 */
	function travel_muni_get_special_offer_desc() {
		return esc_html( get_theme_mod( 'special_offer_desc', __( 'The origin of the word travel is most likely lost to history.', 'travel-muni' ) ) );
	}
endif;

/*************
 * CTA Section
 *
 * @section-- Homepage
 */

if ( ! function_exists( 'travel_muni_get_cta_title' ) ) :
	/**
	 * CTA Title
	 */
	function travel_muni_get_cta_title() {
		return esc_html( get_theme_mod( 'cta_title', __( 'Why Book With Us', 'travel-muni' ) ) );
	}
endif;

if ( ! function_exists( 'travel_muni_get_cta_desc' ) ) :
	/**
	 * CTA Desc
	 */
	function travel_muni_get_cta_desc() {
		return wp_kses_post( wpautop( get_theme_mod( 'cta_desc', __( 'Let your visitors know why they should trust you. You can modify this section from Appearance > Customize > Home Page Settings > Why Book with Us.', 'travel-muni' ) ) ) );
	}
endif;

/*************
 * Blog Section
 *
 * @section-- Homepage
 */
if ( ! function_exists( 'travel_muni_get_blog_section_title' ) ) :
	/**
	 * Blog Section Title
	 */
	function travel_muni_get_blog_section_title() {
		return esc_html( get_theme_mod( 'blog_section_title', __( 'From Our Blog', 'travel-muni' ) ) );
	}
endif;

if ( ! function_exists( 'travel_muni_get_blog_section_subtitle' ) ) :
	/**
	 * Blog Section Subtitle
	 */
	function travel_muni_get_blog_section_subtitle() {
		return wp_kses_post( wpautop( get_theme_mod( 'blog_section_subtitle' ) ) );
	}
endif;

if ( ! function_exists( 'travel_muni_get_footer_copyright' ) ) :
	/**
	 * Footer Copyright
	 */
	function travel_muni_get_footer_copyright() {
		$copyright = get_theme_mod( 'footer_copyright' );
		echo '<span class="copyright">';
		if ( $copyright ) {
			echo wp_kses_post( $copyright );
		} else {
			esc_html_e( '&copy; Copyright ', 'travel-muni' );
			echo esc_html( date_i18n( 'Y' ) );
			echo ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>. ';
		}
		echo '</span>';
	}
endif;

if ( ! function_exists( 'travel_muni_ed_author_link' ) ) :
	/**
	 * Show/Hide Author link in footer
	 */
	function travel_muni_ed_author_link() {
		esc_html_e( ' Travel Muni by ', 'travel-muni' );
		echo '<span class="author-link"><a href="' . esc_url( 'https://wptravelengine.com/' ) . '" rel="nofollow" target="_blank">' . esc_html__( 'WP Travel Engine', 'travel-muni' ) . '</a></span>.';
	}
endif;

if ( ! function_exists( 'travel_muni_ed_wp_link' ) ) :
	/**
	 * Show/Hide WordPress link in footer
	 */
	function travel_muni_ed_wp_link() {
		// Translators: 1. Span opening tag, 2. Link to WordPress.org,  3. Span closing tag.
		printf( esc_html__( '%1$s Powered by %2$s%3$s.', 'travel-muni' ), '<span class="wp-link">', '<a href="' . esc_url( __( 'https://wordpress.org/', 'travel-muni' ) ) . '" rel="nofollow" target="_blank">WordPress</a>', '</span>' );
	}
endif;
