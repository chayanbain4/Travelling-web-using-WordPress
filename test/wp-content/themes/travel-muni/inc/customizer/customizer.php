<?php

/**
 * Travel Muni Theme Customizer
 *
 * @package Travel_Muni
 */

/**
 * Requiring customizer panels & sections
 */
$travel_muni_sections     = array( 'info', 'site', 'appearance', 'layout', 'home', 'general', 'footer' );

foreach ( $travel_muni_sections as $section ) {
	require get_template_directory() . '/inc/customizer/' . $section . '.php';
}

/**
 * Sanitization Functions
 */
require get_template_directory() . '/inc/customizer/sanitization-functions.php';

/**
 * Active Callbacks
 */
require get_template_directory() . '/inc/customizer/active-callback.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function travel_muni_customize_preview_js() {
	$build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script( 'travel-muni-customizer', get_template_directory_uri() . '/inc/js' . $build . '/customizer' . $suffix . '.js', array( 'customize-preview' ), TRAVEL_MUNI_THEME_VERSION, true );
}
add_action( 'customize_preview_init', 'travel_muni_customize_preview_js' );

function travel_muni_customize_script() {
	$build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	$array  = array(
		'home' => get_permalink( get_option( 'page_on_front' ) ),
		'flushFonts'        => wp_create_nonce( 'travel-muni-local-fonts-flush' ),
	);
	wp_enqueue_style( 'travel-muni-customize', get_template_directory_uri() . '/inc/css' . $build . '/customize' . $suffix . '.css', array(), TRAVEL_MUNI_THEME_VERSION );
	wp_enqueue_script( 'travel-muni-customize', get_template_directory_uri() . '/inc/js' . $build . '/customize' . $suffix . '.js', array( 'jquery', 'customize-controls' ), TRAVEL_MUNI_THEME_VERSION, true );
	wp_localize_script( 'travel-muni-customize', 'travel_muni_cdata', $array );
}
add_action( 'customize_controls_enqueue_scripts', 'travel_muni_customize_script' );

/*
 * Notifications in customizer
 */
require get_template_directory() . '/inc/customizer-plugin-recommend/customizer-notice/class-customizer-notice.php';

require get_template_directory() . '/inc/customizer-plugin-recommend/plugin-install/class-plugin-install-helper.php';

require get_template_directory() . '/inc/customizer-plugin-recommend/plugin-install/class-plugin-recommend.php';

$config_customizer = array(
	'recommended_plugins'       => array(
		// change the slug for respective plugin recomendation
		'travel-booking-toolkit' => array(
			'recommended' => true,
			'description' => sprintf(
				/* translators: %s: plugin name */
				esc_html__( 'If you want to take full advantage of the features this theme has to offer, please install and activate %s plugin.', 'travel-muni' ),
				'<strong>Travel Booking Toolkit</strong>'
			),
		),
	),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'travel-muni' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'travel-muni' ),
	'activate_button_label'     => esc_html__( 'Activate', 'travel-muni' ),
	'deactivate_button_label'   => esc_html__( 'Deactivate', 'travel-muni' ),
);
Travel_Muni_Customizer_Notice::init( apply_filters( 'travel_muni_customizer_notice_array', $config_customizer ) );

/**
 * Reset font folder
 *
 * @access public
 * @return void
 */
function travel_muni_ajax_delete_fonts_folder() {
	// Check request.
	if ( ! check_ajax_referer( 'travel-muni-local-fonts-flush', 'nonce', false ) ) {
		wp_send_json_error( 'invalid_nonce' );
	}
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_send_json_error( 'invalid_permissions' );
	}
	if ( class_exists( '\Travel_Muni_WebFont_Loader' ) ) {
		$font_loader = new \Travel_Muni_WebFont_Loader( '' );
		$removed = $font_loader->delete_fonts_folder();
		if ( ! $removed ) {
			wp_send_json_error( 'failed_to_flush' );
		}
		wp_send_json_success();
	}
	wp_send_json_error( 'no_font_loader' );
}
add_action( 'wp_ajax_travel_muni_flush_fonts_folder', 'travel_muni_ajax_delete_fonts_folder' );