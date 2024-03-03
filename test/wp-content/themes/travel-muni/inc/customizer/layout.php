<?php
/**
 * Layout Settings
 *
 * @package Travel_Muni
 */

function travel_muni_customize_register_layout( $wp_customize ) {

	/** Layout Settings */
	$wp_customize->add_panel(
		'layout_settings',
		array(
			'priority'    => 30,
			'capability'  => 'edit_theme_options',
			'title'       => __( 'Layout Settings', 'travel-muni' ),
			'description' => __( 'Change different page layout from here.', 'travel-muni' ),
		)
	);

	/** Header Layout Settings */
	$wp_customize->add_section(
		'header_layout_settings',
		array(
			'title'    => __( 'Header Layout', 'travel-muni' ),
			'priority' => 10,
			'panel'    => 'layout_settings',
		)
	);

	/** Page Sidebar layout */
	$wp_customize->add_setting(
		'header_layout',
		array(
			'default'           => 'five',
			'sanitize_callback' => 'travel_muni_sanitize_radio',
		)
	);

	$wp_customize->add_control(
		new Travel_Muni_Radio_Image_Control(
			$wp_customize,
			'header_layout',
			array(
				'section'     => 'header_layout_settings',
				'label'       => __( 'Header Layout', 'travel-muni' ),
				'description' => __( 'Choose the layout of the header for your site.', 'travel-muni' ),
				'choices'     => array(
					'one'  => get_template_directory_uri() . '/images/header/header-layout-one.svg',
					'five' => get_template_directory_uri() . '/images/header/header-layout-five.svg',
				),
			)
		)
	);

	/** Header Layout Settings Ends*/

	/** Banner Layout Settings */
	$wp_customize->add_section(
		'banner_slider_layout_settings',
		array(
			'title'    => __( 'Banner Layout', 'travel-muni' ),
			'priority' => 20,
			'panel'    => 'layout_settings',
		)
	);

	/** Page Sidebar layout */
	$wp_customize->add_setting(
		'banner_slider_layout',
		array(
			'default'           => 'three',
			'sanitize_callback' => 'travel_muni_sanitize_radio',
		)
	);

	$wp_customize->add_control(
		new Travel_Muni_Radio_Image_Control(
			$wp_customize,
			'banner_slider_layout',
			array(
				'section'     => 'banner_slider_layout_settings',
				'label'       => __( 'Banner Layout', 'travel-muni' ),
				'description' => __( 'Choose the layout of the header for your site.', 'travel-muni' ),
				'choices'     => array(
					'two'   => get_template_directory_uri() . '/images/slider-layout/slider-layout-2.svg',
					'three' => get_template_directory_uri() . '/images/slider-layout/slider-layout-3.svg',
				),
			)
		)
	);

	/** Banner Layout Settings Ends */

	/** Home Page Layout Settings */
	$wp_customize->add_section(
		'general_layout_settings',
		array(
			'title'    => __( 'General Sidebar Layout', 'travel-muni' ),
			'priority' => 55,
			'panel'    => 'layout_settings',
		)
	);

	/** Page Sidebar layout */
	$wp_customize->add_setting(
		'page_sidebar_layout',
		array(
			'default'           => 'right-sidebar',
			'sanitize_callback' => 'travel_muni_sanitize_radio',
		)
	);

	$wp_customize->add_control(
		new Travel_Muni_Radio_Image_Control(
			$wp_customize,
			'page_sidebar_layout',
			array(
				'section'     => 'general_layout_settings',
				'label'       => __( 'Page Sidebar Layout', 'travel-muni' ),
				'description' => __( 'This is the general sidebar layout for pages. You can override the sidebar layout for individual page in respective page.', 'travel-muni' ),
				'choices'     => array(
					'no-sidebar'    => get_template_directory_uri() . '/images/1c.jpg',
					'centered'      => get_template_directory_uri() . '/images/1cc.jpg',
					'left-sidebar'  => get_template_directory_uri() . '/images/2cl.jpg',
					'right-sidebar' => get_template_directory_uri() . '/images/2cr.jpg',
				),
			)
		)
	);

	/** Post Sidebar layout */
	$wp_customize->add_setting(
		'post_sidebar_layout',
		array(
			'default'           => 'right-sidebar',
			'sanitize_callback' => 'travel_muni_sanitize_radio',
		)
	);

	$wp_customize->add_control(
		new Travel_Muni_Radio_Image_Control(
			$wp_customize,
			'post_sidebar_layout',
			array(
				'section'     => 'general_layout_settings',
				'label'       => __( 'Post Sidebar Layout', 'travel-muni' ),
				'description' => __( 'This is the general sidebar layout for posts & custom post. You can override the sidebar layout for individual post in respective post.', 'travel-muni' ),
				'choices'     => array(
					'no-sidebar'    => get_template_directory_uri() . '/images/1c.jpg',
					'centered'      => get_template_directory_uri() . '/images/1cc.jpg',
					'left-sidebar'  => get_template_directory_uri() . '/images/2cl.jpg',
					'right-sidebar' => get_template_directory_uri() . '/images/2cr.jpg',
				),
			)
		)
	);

	/** Post Sidebar layout */
	$wp_customize->add_setting(
		'layout_style',
		array(
			'default'           => 'right-sidebar',
			'sanitize_callback' => 'travel_muni_sanitize_radio',
		)
	);

	$wp_customize->add_control(
		new Travel_Muni_Radio_Image_Control(
			$wp_customize,
			'layout_style',
			array(
				'section'     => 'general_layout_settings',
				'label'       => __( 'Default Sidebar Layout', 'travel-muni' ),
				'description' => __( 'This is the general sidebar layout for whole site.', 'travel-muni' ),
				'choices'     => array(
					'no-sidebar'    => get_template_directory_uri() . '/images/1c.jpg',
					'left-sidebar'  => get_template_directory_uri() . '/images/2cl.jpg',
					'right-sidebar' => get_template_directory_uri() . '/images/2cr.jpg',
				),
			)
		)
	);
	/** General Layout Settings Ends */
}
add_action( 'customize_register', 'travel_muni_customize_register_layout' );
