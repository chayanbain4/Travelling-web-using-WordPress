<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Travel_Muni
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single' );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->

		<?php
		/**
		 * @hooked travel_muni_tag_social_share - 15
		 * @hooked travel_muni_author           - 20
		 * @hooked travel_muni_navigation       - 25
		 * @hooked travel_muni_related_posts    - 30
		 * @hooked travel_muni_comment          - 35
		 */
		do_action( 'travel_muni_after_post_content' );
		?>

	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
