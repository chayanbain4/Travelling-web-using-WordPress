<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package travelsolution
 * @since 1.0.0
 */


function travelsolution_styles() {

	wp_enqueue_style(
		'travelsolution-style',
		get_stylesheet_uri(),
		[],
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_style( 
		'travelsolution-frontend-style', 
		get_template_directory_uri() . '/assets/css/frontend.css', 
		[], 
		wp_get_theme()->get( 'Version' )
	);


}
add_action( 'wp_enqueue_scripts', 'travelsolution_styles' );


register_block_style(
	'core/quote',
	array(
		'name'         => 'secondary-quote',
		'label'        => __( 'Secondary Quote', 'travelsolution' ),
		'is_default'   => true,
		'inline_style' => '.wp-block-quote.is-style-blue-quote { color: #162E44; }',
	)
);



function travelsolution_register_block_pattern_categories(){
    register_block_pattern_category(
        'travelsolution',
        array( 'label' => __( 'Travel Soultion', 'travelsolution' ) )
    );

}
add_action('init', 'travelsolution_register_block_pattern_categories');

require get_template_directory() . '/tgm-plugin/tgm-hook.php';
