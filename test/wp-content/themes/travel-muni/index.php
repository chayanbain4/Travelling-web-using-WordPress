<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Travel_Muni
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<?php
		/**
		 * Before Posts hook
		 */
		do_action( 'travel_muni_before_posts_content' );
		?>

		<main id="main" class="site-main posts-wrap">

		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				* Include the Post-Format-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Format name) and that will be used instead.
				*/
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			/**
			 * After Posts hook
			 *
			 * @hooked travel_muni_navigation
			 */
			do_action( 'travel_muni_after_posts_content' );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->

	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
