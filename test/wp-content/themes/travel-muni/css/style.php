<?php
/**
 * Travel Mnui Dynamic Styles
 * 
 * @package travel_muni
*/

function travel_muni_dynamic_css(){

    $logo_width        = get_theme_mod( 'logo_width', 60 );
    
    $custom_css = '';
    $custom_css .= '  

    .custom-logo-link img{
        width    : ' . absint( $logo_width ) . 'px;
        max-width: ' . 100 . '%;
    }';

    wp_add_inline_style( 'travel-muni', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'travel_muni_dynamic_css', 99 );