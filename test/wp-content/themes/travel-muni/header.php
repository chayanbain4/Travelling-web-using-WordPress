<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travel_Muni
 */

/**
 * Doctype Hook
 *
 * @hooked travel_muni_doctype
 */
do_action( 'travel_muni_doctype' );
?>
<head itemscope itemtype="https://schema.org/WebSite">
	<?php
	/**
	 * Before wp_head
	 *
	 * @hooked travel_muni_head
	 */
	do_action( 'travel_muni_before_wp_head' );

	wp_head();
	?>
</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">

<?php
	wp_body_open();

	/**
	 * Before Header
	 *
	 * @hooked travel_muni_page_start - 20
	*/
	do_action( 'travel_muni_before_header' );

	/**
	 * Header
	 *
	 * @hooked travel_muni_header - 20
	*/
	do_action( 'travel_muni_header' );

	/**
	 * Before Content
	 *
	 * @hooked travel_muni_top_bar           - 20
	 * @hooked travel_muni_inner_page_banner - 25
	*/
	do_action( 'travel_muni_after_header' );

	/**
	 * Content
	 *
	 * @hooked travel_muni_content_start
	*/
	do_action( 'travel_muni_content' );
