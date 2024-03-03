<?php
/**
 * General Settings
 *
 * @package Travel_Muni
 */

function travel_muni_customize_register_general( $wp_customize ) {

	/** General Settings */
	$wp_customize->add_panel(
		'general_settings',
		array(
			'priority'    => 60,
			'capability'  => 'edit_theme_options',
			'title'       => __( 'General Settings', 'travel-muni' ),
			'description' => __( 'Customize Header, Social, Sharing, SEO, Post/Page, Newsletter, Performance and Miscellaneous settings.', 'travel-muni' ),
		)
	);

	/** Header Settings */
	$wp_customize->add_section(
		'header_settings',
		array(
			'title'    => __( 'Header Settings', 'travel-muni' ),
			'priority' => 20,
			'panel'    => 'general_settings',
		)
	);

	/** Enable Header Search */
	$wp_customize->add_setting(
		'ed_header_search',
		array(
			'default'           => true,
			'sanitize_callback' => 'travel_muni_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'ed_header_search',
		array(
			'type'        => 'checkbox',
			'section'     => 'header_settings',
			'label'       => __( 'Enable Header Search', 'travel-muni' ),
			'description' => __( 'Enable to show Search button in header.', 'travel-muni' ),
		)
	);

	/** Singular Header Image */
	$wp_customize->add_setting(
		'singular_header_image',
		array(
			'default'           => '',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Cropped_Image_Control(
			$wp_customize,
			'singular_header_image',
			array(
				'label'       => __( 'Header Image', 'travel-muni' ),
				'description' => __( 'Upload the images for archive and other pages', 'travel-muni' ),
				'section'     => 'header_settings',
				'flex_width'  => true,
				'flex_height' => true,
				'width'       => 1920,
				'height'      => 350,
			)
		)
	);

	// vip image
	$wp_customize->add_setting(
		'header_vip_image',
		array(
			'default'           => '',
			'sanitize_callback' => 'travel_muni_sanitize_image',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'header_vip_image',
			array(
				'label'           => __( 'Upload Vip Image', 'travel-muni' ),
				'section'         => 'header_settings',
				'active_callback' => 'travel_muni_is_header_five_activated',
			)
		)
	);

	/** Phone Label*/
	$wp_customize->add_setting(
		'phone_label',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'phone_label',
		array(
			'selector'        => '.header-layout-5 .header-m .header-m-mid-wrap .contact-wrap-head .head5-titl',
			'render_callback' => 'travel_muni_get_phone_label',
		)
	);

	$wp_customize->add_control(
		'phone_label',
		array(
			'type'            => 'text',
			'section'         => 'header_settings',
			'label'           => __( 'Phone Label', 'travel-muni' ),
			'description'     => __( 'This works only with the Header 5 Layout', 'travel-muni' ),
			'active_callback' => 'travel_muni_is_header_five_activated',
		)
	);

	// phone
	$wp_customize->add_setting(
		'phone',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'phone',
		array(
			'selector'        => '.header-t .header-t-lft-wrap .contact-phone-wrap',
			'render_callback' => 'travel_muni_get_phone',
		)
	);

	$wp_customize->add_control(
		'phone',
		array(
			'type'    => 'text',
			'section' => 'header_settings',
			'label'   => __( 'Phone', 'travel-muni' ),
		)
	);	

	/** Email Label */
	$wp_customize->add_setting(
		'header_email_label',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'header_email_label',
		array(
			'selector'        => '.header-layout-5 .header-m .header-m-mid-wrap .contact-wrap-head .head-5-contlinks .head5-titl',
			'render_callback' => 'travel_muni_get_header_email_label',
		)
	);

	$wp_customize->add_control(
		'header_email_label',
		array(
			'type'            => 'text',
			'section'         => 'header_settings',
			'label'           => __( 'Email Label', 'travel-muni' ),
			'description'     => __( 'This works only with the Header 5 Layout', 'travel-muni' ),
			'active_callback' => 'travel_muni_is_header_five_activated',
		)
	);

	/** Email */
	$wp_customize->add_setting(
		'email',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_email',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'email',
		array(
			'selector'        => '.header-t .header-t-rght-wrap .contact-email-wrap',
			'render_callback' => 'travel_muni_get_email',
		)
	);

	$wp_customize->add_control(
		'email',
		array(
			'type'    => 'text',
			'section' => 'header_settings',
			'label'   => __( 'Email', 'travel-muni' ),
		)
	);

	/** Header Settings Ends */

	/** SEO Settings */
	$wp_customize->add_section(
		'seo_settings',
		array(
			'title'    => __( 'SEO Settings', 'travel-muni' ),
			'priority' => 60,
			'panel'    => 'general_settings',
		)
	);

	/** Enable Last Update Post Date */
    $wp_customize->add_setting( 
        'ed_post_update_date', 
        array(
            'default'           => true,
            'sanitize_callback' => 'travel_muni_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		'ed_post_update_date',
		array(
			'type'        => 'checkbox',
			'section'     => 'seo_settings',
			'label'	      => __( 'Enable Last Update Post Date', 'travel-muni' ),
            'description' => __( 'Enable to show last updated post date on listing as well as in single post.', 'travel-muni' ),
		)
	);  

	/** Enable Social Links */
	$wp_customize->add_setting(
		'ed_breadcrumb',
		array(
			'default'           => true,
			'sanitize_callback' => 'travel_muni_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'ed_breadcrumb',
		array(
			'type'        => 'checkbox',
			'section'     => 'seo_settings',
			'label'       => __( 'Enable Breadcrumb', 'travel-muni' ),
			'description' => __( 'Enable to show breadcrumb in inner pages.', 'travel-muni' ),
		)
	);

	/** Breadcrumb Home Text */
	$wp_customize->add_setting(
		'home_text',
		array(
			'default'           => __( 'Home', 'travel-muni' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'home_text',
		array(
			'type'    => 'text',
			'section' => 'seo_settings',
			'label'   => __( 'Breadcrumb Home Text', 'travel-muni' ),
		)
	);
	/** SEO Settings Ends */

	/** Posts(Blog) & Pages Settings */
	$wp_customize->add_section(
		'post_page_settings',
		array(
			'title'    => __( 'Posts(Blog) & Pages Settings', 'travel-muni' ),
			'priority' => 70,
			'panel'    => 'general_settings',
		)
	);

	/** Blog Excerpt */
	$wp_customize->add_setting(
		'ed_excerpt',
		array(
			'default'           => true,
			'sanitize_callback' => 'travel_muni_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'ed_excerpt',
		array(
			'type'        => 'checkbox',
			'section'     => 'post_page_settings',
			'label'       => __( 'Enable Blog Excerpt', 'travel-muni' ),
			'description' => __( 'Enable to show excerpt or disable to show full post content.', 'travel-muni' ),
		)
	);

	/** Excerpt Length */
	$wp_customize->add_setting(
		'excerpt_length',
		array(
			'default'           => 55,
			'sanitize_callback' => 'travel_muni_sanitize_number_absint',
		)
	);

	$wp_customize->add_control(
		'excerpt_length',
		array(
			'section'     => 'post_page_settings',
			'label'       => __( 'Excerpt Length', 'travel-muni' ),
			'description' => __( 'Automatically generated excerpt length (in words).', 'travel-muni' ),
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 10,
				'max'  => 100,
				'step' => 5,
			),
		)
	);

	/** Note */
	$wp_customize->add_setting(
		'post_note_text',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	$wp_customize->add_control(
		new Travel_Muni_Note_Control(
			$wp_customize,
			'post_note_text',
			array(
				'section'     => 'post_page_settings',
				'description' => sprintf( __( '%s These options affect your individual posts.', 'travel-muni' ), '<hr/>' ),
			)
		)
	);

	/** Hide Author Section */
	$wp_customize->add_setting(
		'ed_author',
		array(
			'default'           => false,
			'sanitize_callback' => 'travel_muni_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'ed_author',
		array(
			'type'        => 'checkbox',
			'section'     => 'post_page_settings',
			'label'       => __( 'Hide Author Section', 'travel-muni' ),
			'description' => __( 'Enable to hide author section.', 'travel-muni' ),
		)
	);

	/** Show Related Posts */
	$wp_customize->add_setting(
		'ed_related',
		array(
			'default'           => true,
			'sanitize_callback' => 'travel_muni_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'ed_related',
		array(
			'type'        => 'checkbox',
			'section'     => 'post_page_settings',
			'label'       => __( 'Show Related Posts', 'travel-muni' ),
			'description' => __( 'Enable to show related posts in single page.', 'travel-muni' ),
		)
	);

	/** Related Posts section title */
	$wp_customize->add_setting(
		'related_post_title',
		array(
			'default'           => __( 'Keep Reading', 'travel-muni' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'related_post_title',
		array(
			'selector'        => '.related-posts .title',
			'render_callback' => 'travel_muni_get_related_title',
		)
	);

	$wp_customize->add_control(
		'related_post_title',
		array(
			'type'            => 'text',
			'section'         => 'post_page_settings',
			'label'           => __( 'Related Posts Section Title', 'travel-muni' ),
			'active_callback' => 'travel_muni_post_page_ac',
		)
	);

	/** Related Posts section see all title */
	$wp_customize->add_setting(
		'related_view_all_title',
		array(
			'default'           => __( 'See All', 'travel-muni' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'related_view_all_title',
		array(
			'type'            => 'text',
			'section'         => 'post_page_settings',
			'label'           => __( 'Related Posts Link label', 'travel-muni' ),
			'active_callback' => 'travel_muni_post_page_ac',
		)
	);

	/** Hide Category */
	$wp_customize->add_setting(
		'ed_category',
		array(
			'default'           => false,
			'sanitize_callback' => 'travel_muni_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'ed_category',
		array(
			'type'        => 'checkbox',
			'section'     => 'post_page_settings',
			'label'       => __( 'Hide Category', 'travel-muni' ),
			'description' => __( 'Enable to hide category.', 'travel-muni' ),
		)
	);

	/** Hide Post Author */
	$wp_customize->add_setting(
		'ed_post_author',
		array(
			'default'           => false,
			'sanitize_callback' => 'travel_muni_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'ed_post_author',
		array(
			'type'        => 'checkbox',
			'section'     => 'post_page_settings',
			'label'       => __( 'Hide Post Author', 'travel-muni' ),
			'description' => __( 'Enable to hide post author.', 'travel-muni' ),
		)
	);

	/** Hide Posted Date */
	$wp_customize->add_setting(
		'ed_post_date',
		array(
			'default'           => false,
			'sanitize_callback' => 'travel_muni_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'ed_post_date',
		array(
			'type'        => 'checkbox',
			'section'     => 'post_page_settings',
			'label'       => __( 'Hide Posted Date', 'travel-muni' ),
			'description' => __( 'Enable to hide posted date.', 'travel-muni' ),
		)
	);
	/** Posts(Blog) & Pages Settings Ends */
}
add_action( 'customize_register', 'travel_muni_customize_register_general' );
