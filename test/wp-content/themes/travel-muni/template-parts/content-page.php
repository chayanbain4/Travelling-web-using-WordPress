<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Travel_Muni
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		/**
		 * Entry Content
		 *
		 * @hooked travel_muni_entry_content - 15
		 * @hooked travel_muni_entry_footer  - 20
		 */
		do_action( 'travel_muni_page_entry_content' );
	?>
</article><!-- #post-<?php the_ID(); ?> -->
