<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link    https://codex.wordpress.org/Creating_an_Error_404_Page
 * @package Travel_Muni
 */

get_header();

$args = array(
	'posts_per_page'      => 4,
	'ignore_sticky_posts' => true,
);

$qry = new WP_Query( $args );

if ( $qry->have_posts() ) { ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main posts-wrap">
			<h2 class="header-title"><?php esc_html_e( 'You might also enjoy', 'travel-muni' ); ?></h2>
			<?php
			while ( $qry->have_posts() ) {
				$qry->the_post();
				get_template_part( 'template-parts/content', get_post_format() );
			}
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php
	wp_reset_postdata();
}
get_footer();
