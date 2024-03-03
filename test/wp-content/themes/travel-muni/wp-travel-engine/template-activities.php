<?php
/**
 * Page Template for WTE Activities.
 *
 * @package travel-muni
 */

get_header();
get_template_part( 'wp-travel-engine/content', 'taxonomy-page-template', array( 'activities' ) );
get_footer();
