<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travelscape
 */

if ( ! is_active_sidebar( 'sidebar-main' ) ) {
	return;
}

if(is_singular()) {		
	$travelscape_settings_disable_sidebar_ed = get_post_meta( $post->ID, 'travelscape_settings_disable_sidebar', true );
	if($travelscape_settings_disable_sidebar_ed) {
		return;
	} 	
} 
elseif ( is_home() && !is_front_page() ) {
	$pageID = get_option('page_for_posts');			
	$travelscape_settings_disable_sidebar_ed = get_post_meta( $pageID, 'travelscape_settings_disable_sidebar', true );
	if($travelscape_settings_disable_sidebar_ed) {
		return;
	} 	
}
?>
<?php travelscape_sidebars_before(); ?>
<aside id="secondary" class="widget-area">
	<?php travelscape_sidebar_top(); ?>
	<?php dynamic_sidebar( 'sidebar-main' ); ?>
	<?php travelscape_sidebar_bottom(); ?>
</aside><!-- #secondary -->
<?php travelscape_sidebars_after(); ?>