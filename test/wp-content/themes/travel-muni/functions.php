<?php
/**
 * Travel Muni functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Travel_Muni
 */

$travel_muni_theme_data = wp_get_theme();
if ( ! defined( 'TRAVEL_MUNI_THEME_VERSION' ) ) {
	define( 'TRAVEL_MUNI_THEME_VERSION', $travel_muni_theme_data->get( 'Version' ) );
}
if ( ! defined( 'TRAVEL_MUNI_THEME_NAME' ) ) {
	define( 'TRAVEL_MUNI_THEME_NAME', $travel_muni_theme_data->get( 'Name' ) );
}
if( ! defined( 'TRAVEL_MUNI_THEME_TEXTDOMAIN' ) ) {
	define( 'TRAVEL_MUNI_THEME_TEXTDOMAIN', $travel_muni_theme_data->get( 'TextDomain' ) );
}

/**
 * All Theme SVG Files
 */
require get_template_directory() . '/inc/svg-helpers.php';

/**
 * Custom Functions.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Standalone Functions.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Template Functions.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom functions for selective refresh.
 */
require get_template_directory() . '/inc/partials.php';

/**
 * Custom Controls
 */
require get_template_directory() . '/inc/custom-controls/custom-control.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Metabox
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Dynamic Styles
 */
require get_template_directory() . '/css/style.php';

/**
 * Plugin Recommendation
 */
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
 * Getting Started
 */
require get_template_directory() . '/inc/getting-started/getting-started.php';

/**
 * Functions for WTE trips.
 */
if ( travel_muni_is_wpte_activated() ) {
	include get_template_directory() . '/inc/wte/wte-functions.php';
}

/**
 * Implement Local Font Method functions.
 */
require get_template_directory() . '/inc/class-webfont-loader.php';