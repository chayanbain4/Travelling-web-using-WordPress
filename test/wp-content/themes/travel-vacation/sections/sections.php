<?php

/**
 * Render homepage sections.
 */
function travel_vacation_homepage_sections() {
	$homepage_sections = array_keys( travel_vacation_get_homepage_sections() );

	foreach ( $homepage_sections as $section ) {
		require get_template_directory() . '/sections/' . $section . '.php';
	}
}