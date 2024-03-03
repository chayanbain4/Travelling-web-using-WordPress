<?php
/**
 * Page Template for WTE Trip_Types.
 *
 * @package travel-muni
 */

get_header();
get_template_part( 'wp-travel-engine/content', 'taxonomy-page-template', array( 'trip_types' ) );
get_footer();
