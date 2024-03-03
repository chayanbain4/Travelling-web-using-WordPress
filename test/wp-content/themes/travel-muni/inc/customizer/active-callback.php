<?php
/**
 * Active Callback
 *
 * @package Travel_Muni
 */

/**
 * Active Callback for Banner Slider
 */
function travel_muni_banner_ac( $control ) {
	$banner     = $control->manager->get_setting( 'ed_banner_section' )->value();
	$control_id = $control->id;
	if ( $control_id == 'header_image' && $banner == 'static_banner' ) {
		return true;
	}
	if ( $control_id == 'header_video' && $banner == 'static_banner' ) {
		return true;
	}
	if ( $control_id == 'external_header_video' && $banner == 'static_banner' ) {
		return true;
	}
	if ( $control_id == 'banner_title' && $banner == 'static_banner' ) {
		return true;
	}
	if ( $control_id == 'banner_subtitle' && $banner == 'static_banner' ) {
		return true;
	}
	if ( $control_id == 'banner_label' && $banner == 'static_banner' ) {
		return true;
	}
	if ( $control_id == 'banner_link' && $banner == 'static_banner' ) {
		return true;
	}

	return false;
}
/**
 * Active Callback for post/page
 */
function travel_muni_post_page_ac( $control ) {

	$ed_related = $control->manager->get_setting( 'ed_related' )->value();
	$control_id = $control->id;

	if ( $control_id == 'related_post_title' && $ed_related == true ) {
		return true;
	}
	if ( $control_id == 'related_view_all_title' && $ed_related == true ) {
		return true;
	}
	return false;
}

/**
 * Active Callback for local fonts
*/
function travel_muni_ed_localgoogle_fonts(){
    $ed_localgoogle_fonts = get_theme_mod( 'ed_localgoogle_fonts' , false );

    if( $ed_localgoogle_fonts ) return true;
    
    return false; 
}