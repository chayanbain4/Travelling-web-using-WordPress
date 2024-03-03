<?php

/**
 * Footer Options
 *
 * @package travel_vacation
 */

$wp_customize->add_section(
	'travel_vacation_footer_options',
	array(
		'panel' => 'travel_vacation_theme_options',
		'title' => esc_html__( 'Footer Options', 'travel-vacation' ),
	)
);

$wp_customize->add_setting(
	'travel_vacation_footer_copyright_text',
	array(
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'travel_vacation_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'travel-vacation' ),
		'section'  => 'travel_vacation_footer_options',
		'settings' => 'travel_vacation_footer_copyright_text',
		'type'     => 'textarea',
	)
);

// Footer Options - Scroll Top.
$wp_customize->add_setting(
	'travel_vacation_scroll_top',
	array(
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_scroll_top',
		array(
			'label'   => esc_html__( 'Enable Scroll Top Button', 'travel-vacation' ),
			'section' => 'travel_vacation_footer_options',
		)
	)
);
