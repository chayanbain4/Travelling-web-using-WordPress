<?php
/**
 * Blog Section
 *
 * @package Travel_Muni
 */

$ed_blog   = get_theme_mod( 'ed_blog', true );
$maintitle = get_theme_mod( 'blog_section_title', __( 'From Our Blog', 'travel-muni' ) );
$sub_title = get_theme_mod( 'blog_section_subtitle' );
$args      = array(
	'post_type'           => 'post',
	'post_status'         => 'publish',
	'posts_per_page'      => 3,
	'ignore_sticky_posts' => true,
);

$qry = new WP_Query( $args );
if ( $ed_blog && ( $maintitle || $sub_title || $qry->have_posts() ) ) { ?>
<!-- Blog -->
<section id="blog_section" class="our-blog">
	<div class="our-blog-top-wrap">
		<div class="container">
			<?php if ( $maintitle || $sub_title ) { ?>
				<div class="section-content-wrap algnlft">
					<?php
					if ( $maintitle ) {
						echo '<h2 class="section-title">' . esc_html( travel_muni_get_blog_section_title() ) . '</h2>';
					}
					if ( $sub_title ) {
						echo '<div class="section-desc">' . wp_kses_post( wpautop( travel_muni_get_blog_section_subtitle() ) ) . '</div>';
					}
					?>
				</div>
			<?php } ?>
		</div>
	</div>
	<?php if ( $qry->have_posts() ) { ?>
	<div class="container">
		<div class="blog-section-main-wrap">
			<?php
			while ( $qry->have_posts() ) {
				$qry->the_post();
				?>
					<div class="blog-single-wrap">
						<figure>
							<?php
							if ( 0 === $qry->current_post ) {
								$thumbnail_size = 'travel-muni-full-blog';
							} else {
								$thumbnail_size = 'travel-muni-middle-square-thumb';
							}
							if ( has_post_thumbnail() ) {
								the_post_thumbnail( $thumbnail_size, array( 'itemprop' => 'image' ) );
							} else {
								travel_muni_get_fallback_svg( $thumbnail_size ); // Fallback.
							}
							?>

						</figure>
						<div class="blog-single-content-wrap">
							<?php travel_muni_category(); ?>
							<header class="entry-header">
								<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							</header>
						</div>
					</div>
			<?php } ?>
		</div>
	</div>
	<?php } wp_reset_postdata(); ?>
</section><!-- Blog -->
	<?php
}
