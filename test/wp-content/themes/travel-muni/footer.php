<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travel_Muni
 */

	/**
	 * After Content
	 *
	 * @hooked travel_muni_content_end - 20
	 */
	do_action( 'travel_muni_before_footer' );

	/**
	 * Footer
	 *
	 * @hooked travel_muni_footer_start  - 20
	 * @hooked travel_muni_footer_top    - 30
	 * @hooked travel_muni_footer_middle - 35
	 * @hooked travel_muni_footer_bottom - 40
	 * @hooked travel_muni_footer_end    - 50
	*/
	do_action( 'travel_muni_footer' );

	/**
	 * After Footer
	 *
	 * @hooked travel_muni_back_to_top - 15
	 * @hooked travel_muni_page_end    - 20
	*/
	do_action( 'travel_muni_after_footer' );

	wp_footer(); ?>

</body>
</html>
