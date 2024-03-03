<?php
/**
 * Travel Muni Widget Areas
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @package Travel_Muni
 */

/**
 * Widgets Init.
 */
function travel_muni_widgets_init() {
	$sidebars = array(
		'sidebar'      => array(
			'name'        => __( 'Sidebar', 'travel-muni' ),
			'id'          => 'sidebar',
			'description' => __( 'Default Sidebar', 'travel-muni' ),
		),
		'info'         => array(
			'name'        => __( 'Info Section', 'travel-muni' ),
			'id'          => 'info',
			'description' => __( 'Add "Text" widget for the title and description.', 'travel-muni' ),
		),
		'footer-one'   => array(
			'name'        => __( 'Footer One', 'travel-muni' ),
			'id'          => 'footer-one',
			'description' => __( 'Add footer one widgets here.', 'travel-muni' ),
		),
		'footer-two'   => array(
			'name'        => __( 'Footer Two', 'travel-muni' ),
			'id'          => 'footer-two',
			'description' => __( 'Add footer two widgets here.', 'travel-muni' ),
		),
		'footer-three' => array(
			'name'        => __( 'Footer Three', 'travel-muni' ),
			'id'          => 'footer-three',
			'description' => __( 'Add footer three widgets here.', 'travel-muni' ),
		),
		'footer-four'  => array(
			'name'        => __( 'Footer Four', 'travel-muni' ),
			'id'          => 'footer-four',
			'description' => __( 'Add footer four widgets here.', 'travel-muni' ),
		),
	);

	foreach ( $sidebars as $sidebar ) {
		register_sidebar(
			array(
				'name'          => esc_html( $sidebar['name'] ),
				'id'            => esc_attr( $sidebar['id'] ),
				'description'   => esc_html( $sidebar['description'] ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title" itemprop="name">',
				'after_title'   => '</h2>',
			)
		);
	}

}
add_action( 'widgets_init', 'travel_muni_widgets_init' );
