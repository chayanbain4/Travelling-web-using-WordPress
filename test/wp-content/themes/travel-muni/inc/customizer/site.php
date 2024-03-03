<?php
/**
 * Site Title Setting
 *
 * @package Travel_Muni
 */

function travel_muni_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'refresh';
	$wp_customize->get_setting( 'background_image' )->transport = 'refresh';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'travel_muni_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'travel_muni_customize_partial_blogdescription',
			)
		);
	}

	/** Logo Width */
    $wp_customize->add_setting(
        'logo_width',
        array(
            'default'           => 60,
            'sanitize_callback' => 'travel_muni_sanitize_number_absint',
            'transport'         => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'logo_width',
        array(
            'label'       => __( 'Logo Width', 'travel-muni' ),
            'description' => __( 'Set the width(px) of your Site Logo.', 'travel-muni' ),
            'section'     => 'title_tagline',
            'type'        => 'number',
            'input_attrs' => array(
                'min' => 1
            )
        )
    );
}
add_action( 'customize_register', 'travel_muni_customize_register' );
