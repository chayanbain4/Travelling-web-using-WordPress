<?php
/**
 * Footer Settings
 *
 * @package Travel_Muni
 */

function travel_muni_customize_register_footer_settings( $wp_customize ) {
	/** Footer Settings */
	$wp_customize->add_panel(
		'footer_settings',
		array(
			'priority'   => 199,
			'capability' => 'edit_theme_options',
			'title'      => __( 'Footer Settings', 'travel-muni' ),
		)
	);

	$wp_customize->add_section(
		'copyright_settings',
		array(
			'title' => __( 'Copyright Settings', 'travel-muni' ),
			'panel' => 'footer_settings',
		)
	);

	/**
	* Enable Payment Section.
	*/
	$wp_customize->add_setting(
		'payments_enable',
		array(
			'default'           => false,
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'payments_enable',
		array(
			'label'   => __( 'Enable Payments', 'travel-muni' ),
			'section' => 'copyright_settings',
			'type'    => 'checkbox',
		)
	);

	/** Payments Image */
	$wp_customize->add_setting(
		'payments_image',
		array(
			'default'           => '',
			'sanitize_callback' => 'travel_muni_sanitize_image',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'payments_image',
			array(
				'label'   => __( 'Payments Image', 'travel-muni' ),
				'section' => 'copyright_settings',
			)
		)
	);
	/** Footer Copyright */
	$wp_customize->add_setting(
		'footer_copyright',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'footer_copyright',
		array(
			'label'   => __( 'Footer Copyright Text', 'travel-muni' ),
			'section' => 'copyright_settings',
			'type'    => 'textarea',
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'footer_copyright',
		array(
			'selector'        => '.site-info .copyright',
			'render_callback' => 'travel_muni_get_footer_copyright',
		)
	);
}
add_action( 'customize_register', 'travel_muni_customize_register_footer_settings' );
