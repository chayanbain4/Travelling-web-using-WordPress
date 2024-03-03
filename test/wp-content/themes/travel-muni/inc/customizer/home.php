<?php
/**
 * Front Page Settings
 *
 * @package Travel_Muni
 */

function travel_muni_customize_register_frontpage( $wp_customize ) {

	/** Front Page Settings */
	$wp_customize->add_panel(
		'frontpage_settings',
		array(
			'priority'    => 40,
			'capability'  => 'edit_theme_options',
			'title'       => __( 'Front Page Settings', 'travel-muni' ),
			'description' => __( 'Static Home Page settings.', 'travel-muni' ),
		)
	);

	// Banner Section starts
	$wp_customize->get_section( 'header_image' )->panel                    = 'frontpage_settings';
	$wp_customize->get_section( 'header_image' )->title                    = __( 'Banner Section', 'travel-muni' );
	$wp_customize->get_section( 'header_image' )->priority                 = 10;
	$wp_customize->get_control( 'header_image' )->active_callback          = 'travel_muni_banner_ac';
	$wp_customize->get_control( 'header_video' )->active_callback          = 'travel_muni_banner_ac';
	$wp_customize->get_control( 'external_header_video' )->active_callback = 'travel_muni_banner_ac';
	$wp_customize->get_section( 'header_image' )->description              = '';
	$wp_customize->get_setting( 'header_image' )->transport                = 'refresh';
	$wp_customize->get_setting( 'header_video' )->transport                = 'refresh';
	$wp_customize->get_setting( 'external_header_video' )->transport       = 'refresh';

	/** Banner Options */
	$wp_customize->add_setting(
		'ed_banner_section',
		array(
			'default'           => 'static_banner',
			'sanitize_callback' => 'travel_muni_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'ed_banner_section',
		array(
			'label'       => __( 'Banner Options', 'travel-muni' ),
			'description' => __( 'Enable/Disable static image/video Banner', 'travel-muni' ),
			'section'     => 'header_image',
			'type'        => 'select',
			'choices'     => array(
				'no_banner'     => __( 'Disable Banner Section', 'travel-muni' ),
				'static_banner' => __( 'Static/Video CTA Banner', 'travel-muni' ),
			),
			'priority'    => 5,
		)
	);

	/** Title */
	$wp_customize->add_setting(
		'banner_title',
		array(
			'default'           => __( 'Find Your Best Holiday', 'travel-muni' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'banner_title',
		array(
			'selector'        => '.banner .banner-box .banner-title',
			'render_callback' => 'travel_muni_get_banner_title',
		)
	);

	$wp_customize->add_control(
		'banner_title',
		array(
			'label'           => __( 'Title', 'travel-muni' ),
			'section'         => 'header_image',
			'type'            => 'text',
			'active_callback' => 'travel_muni_banner_ac',
		)
	);

	/** Sub Title */
	$wp_customize->add_setting(
		'banner_subtitle',
		array(
			'default'           => __( 'Find great adventure holidays and activities around the planet.', 'travel-muni' ),
			'sanitize_callback' => 'wp_kses_post',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'banner_subtitle',
		array(
			'selector'        => '.banner .banner-box .banner-desc p',
			'render_callback' => 'travel_muni_get_banner_sub_title',
		)
	);

	$wp_customize->add_control(
		'banner_subtitle',
		array(
			'label'           => __( 'Sub Title', 'travel-muni' ),
			'section'         => 'header_image',
			'type'            => 'textarea',
			'active_callback' => 'travel_muni_banner_ac',
		)
	);

	/** Banner Label */
	$wp_customize->add_setting(
		'banner_label',
		array(
			'default'           => __( 'Explore All', 'travel-muni' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'banner_label',
		array(
			'selector'        => '.banner .banner-box .btn-secondary',
			'render_callback' => 'travel_muni_get_banner_label',
		)
	);

	$wp_customize->add_control(
		'banner_label',
		array(
			'label'           => __( 'Banner Label', 'travel-muni' ),
			'section'         => 'header_image',
			'type'            => 'text',
			'active_callback' => 'travel_muni_banner_ac',
		)
	);

	/** Banner Link */
	$wp_customize->add_setting(
		'banner_link',
		array(
			'default'           => '#',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'banner_link',
		array(
			'label'           => __( 'Banner Link', 'travel-muni' ),
			'section'         => 'header_image',
			'type'            => 'text',
			'active_callback' => 'travel_muni_banner_ac',
		)
	);

	//Banner Section ends

	/** Search Section */
	$wp_customize->add_section(
		'search_section',
		array(
			'title'    => __( 'Search Section', 'travel-muni' ),
			'priority' => 11,
			'panel'    => 'frontpage_settings',
		)
	);

	if ( travel_muni_is_wte_advanced_search_active() ) {
		/** Enable Search Bar */
		$wp_customize->add_setting(
			'ed_search_bar',
			array(
				'default'           => true,
				'sanitize_callback' => 'travel_muni_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'ed_search_bar',
			array(
				'type'        => 'checkbox',
				'section'     => 'search_section',
				'label'       => __( 'Search Bar', 'travel-muni' ),
				'description' => __( 'Enable Search Bar', 'travel-muni' ),
			)
		);
	}
	//Search Section ends

	/** Blog Section */
	$wp_customize->add_section(
		'blog_section',
		array(
			'title'    => __( 'Blog Section', 'travel-muni' ),
			'priority' => 75,
			'panel'    => 'frontpage_settings',
		)
	);

	$wp_customize->add_setting(
		'ed_blog',
		array(
			'default'           => true,
			'sanitize_callback' => 'travel_muni_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'ed_blog',
		array(
			'type'    => 'checkbox',
			'section' => 'blog_section',
			'label'   => __( 'Enable Section', 'travel-muni' ),
		)
	);

	/** Blog title */
	$wp_customize->add_setting(
		'blog_section_title',
		array(
			'default'           => __( 'From Our Blog', 'travel-muni' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'blog_section_title',
		array(
			'selector'        => '.our-blog .section-content-wrap .section-title',
			'render_callback' => 'travel_muni_get_blog_section_title',
		)
	);

	$wp_customize->add_control(
		'blog_section_title',
		array(
			'section' => 'blog_section',
			'label'   => __( 'Blog Title', 'travel-muni' ),
			'type'    => 'text',
		)
	);

	/** Blog description */
	$wp_customize->add_setting(
		'blog_section_subtitle',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'blog_section_subtitle',
		array(
			'selector'        => '.our-blog .section-content-wrap.algnlft .section-desc p',
			'render_callback' => 'travel_muni_get_blog_section_subtitle',
		)
	);

	$wp_customize->add_control(
		'blog_section_subtitle',
		array(
			'section' => 'blog_section',
			'label'   => __( 'Blog Description', 'travel-muni' ),
			'type'    => 'textarea',
		)
	);
	/** Blog Section Ends */
}
add_action( 'customize_register', 'travel_muni_customize_register_frontpage' );
