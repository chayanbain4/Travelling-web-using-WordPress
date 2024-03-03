<?php
/**
 * Appearance Settings
 *
 * @package Travel_Muni
 */

function travel_muni_customize_register_appearance( $wp_customize ) {

	$wp_customize->add_panel(
		'appearance_settings',
		array(
			'title'       => __( 'Appearance Settings', 'travel-muni' ),
			'priority'    => 25,
			'capability'  => 'edit_theme_options',
			'description' => __( 'Change color and body background.', 'travel-muni' ),
		)
	);

    /** Typography */
    $wp_customize->add_section(
        'typography_settings',
        array(
            'title'    => __( 'Typography', 'travel-muni' ),
            'priority' => 80,
            'panel'    => 'appearance_settings',
        )
    );

	$wp_customize->add_setting(
        'ed_localgoogle_fonts',
        array(
            'default'           => false,
            'sanitize_callback' => 'travel_muni_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'ed_localgoogle_fonts',
        array(
            'section'       => 'typography_settings',
            'type'          => 'checkbox',    
            'label'         => __( 'Load Google Fonts Locally', 'travel-muni' ),
            'description'   => __( 'Enable to load google fonts from your own server instead from google\'s CDN. This solves privacy concerns with Google\'s CDN and their sometimes less-than-transparent policies.', 'travel-muni' )
        )
    );   

    $wp_customize->add_setting(
        'ed_preload_local_fonts',
        array(
            'default'           => false,
            'sanitize_callback' => 'travel_muni_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'ed_preload_local_fonts',
        array(
            'section'       => 'typography_settings',
            'type'          => 'checkbox',
            'label'         => __( 'Preload Local Fonts', 'travel-muni' ),
            'description'   => __( 'Preloading Google fonts will speed up your website speed.', 'travel-muni' ),
            'active_callback' => 'travel_muni_ed_localgoogle_fonts'
        )
    );   

    ob_start(); ?>
        
        <span style="margin-bottom: 5px;display: block;"><?php esc_html_e( 'Click the button to reset the local fonts cache', 'travel-muni' ); ?></span>
        
        <input type="button" class="button button-primary travel-muni-flush-local-fonts-button" name="travel-muni-flush-local-fonts-button" value="<?php esc_attr_e( 'Flush Local Font Files', 'travel-muni' ); ?>" />
    <?php
    $travel_muni_flush_button = ob_get_clean();

    $wp_customize->add_setting(
        'ed_flush_local_fonts',
        array(
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $wp_customize->add_control(
        'ed_flush_local_fonts',
        array(
            'label'         => __( 'Flush Local Fonts Cache', 'travel-muni' ),
            'section'       => 'typography_settings',
            'description'   => $travel_muni_flush_button,
            'type'          => 'hidden',
            'active_callback' => 'travel_muni_ed_localgoogle_fonts'
        )
    );

	/** Move Background Image section to appearance panel */
	$wp_customize->get_section( 'colors' )->panel           = 'appearance_settings';
	$wp_customize->get_section( 'background_image' )->panel = 'appearance_settings';
}
add_action( 'customize_register', 'travel_muni_customize_register_appearance' );
