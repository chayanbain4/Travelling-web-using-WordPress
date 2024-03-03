<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Travel_Muni
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="text-holder">
		<?php
			/**
			 * Hook Firing hierarchy.
			 *
			 * @hooked travel_muni_entry_content - 15
			 * @hooked travel_muni_entry_footer  - 20
			 */
			do_action( 'travel_muni_post_entry_content' );
		?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
