<?php
/**
 * Page Template for WTE Destinations.
 *
 * @package travel-muni
 */

get_header();
get_template_part( 'wp-travel-engine/content', 'taxonomy-page-template', array( 'destination' ) );
get_footer();
