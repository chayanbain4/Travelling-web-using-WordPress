<?php
/**
 * Travel Muni Custom Control
 *
 * @package Travel_Muni
 */

if ( ! function_exists( 'travel_muni_register_custom_controls' ) ) :
	/**
	 * Register Custom Controls
	 */
	function travel_muni_register_custom_controls( $wp_customize ) {
		// Load our custom control.
		require_once get_template_directory() . '/inc/custom-controls/note/class-note-control.php';
		require_once get_template_directory() . '/inc/custom-controls/radiobtn/class-radio-buttonset-control.php';
		require_once get_template_directory() . '/inc/custom-controls/radioimg/class-radio-image-control.php';

		// Register the control type.
		$wp_customize->register_control_type( 'Travel_Muni_Radio_Buttonset_Control' );
		$wp_customize->register_control_type( 'Travel_Muni_Radio_Image_Control' );
	}
	endif;
	add_action( 'customize_register', 'travel_muni_register_custom_controls' );

