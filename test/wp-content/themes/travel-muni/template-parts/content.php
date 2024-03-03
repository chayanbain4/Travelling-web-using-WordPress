<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Travel_Muni
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php ( ! is_404() ) && print( 'itemscope itemtype="https://schema.org/Blog"' ); ?>>
	<?php
		/**
		 * Post Thumbnail.
		 *
		 * @hooked travel_muni_post_thumbnail - 15
		 */
		do_action( 'travel_muni_before_post_entry_content' );

		echo '<div class="text-holder">';
			/**
			 * Hook firing priority.
			 *
			 * @hooked travel_muni_entry_header  - 15
			 * @hooked travel_muni_entry_content - 20
			 * @hooked travel_muni_entry_footer  - 25
			*/
			do_action( 'travel_muni_post_entry_content' );
		echo '</div><!-- .text-holder -->'
	?>
</article><!-- #post-<?php the_ID(); ?> -->
