/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize(
		'blogname',
		function( value ) {
			value.bind(
				function( to ) {
					$( '.site-title a' ).text( to );
				}
			);
		}
	);

	// Site Blog Description
	wp.customize(
		'blogdescription',
		function( value ) {
			value.bind(
				function( to ) {
					$( '.site-description' ).text( to );
				}
			);
		}
	);

	// Header text color.
	wp.customize(
		'header_textcolor',
		function( value ) {
			value.bind(
				function( to ) {
					if ( 'blank' === to ) {
						$( '.site-title, .site-description' ).css(
							{
								'clip': 'rect(1px, 1px, 1px, 1px)',
								'position': 'absolute'
							}
						);
					} else {
						$( '.site-title, .site-description' ).css(
							{
								'clip': 'auto',
								'position': 'relative'
							}
						);
						$( '.site-, .site-description' ).css(
							{
								'color': to
							}
						);
					}
				}
			);
		}
	);

	// Logo width
	wp.customize(
		'logo_width',
		function( value ) {
			value.bind(
				function( to ) {
					$( '.custom-logo-link img' ).css( 'width',to + 'px' );
				}
			);
		}
	);
	// Site title font size
	wp.customize(
		'site_title_font_size',
		function( value ) {
			value.bind(
				function( to ) {
					$( '.site-title' ).css( 'font-size',to + 'px' );
				}
			);
		}
	);

	// site title color
	wp.customize(
		'site_title_color',
		function( value ) {
			value.bind(
				function( to ) {
					$( '.site-title a' ).css( 'color',to );
				}
			);
		}
	);

} )( jQuery );
