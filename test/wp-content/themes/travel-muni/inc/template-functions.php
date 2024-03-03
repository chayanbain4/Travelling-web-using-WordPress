<?php

/**
 * Travel Muni Template Functions which enhance the theme by hooking into WordPress
 *
 * @package Travel_Muni
 */

if ( ! function_exists( 'travel_muni_doctype' ) ) :
	/**
	 * Doctype Declaration
	 */
	function travel_muni_doctype() {
		?>
		<!DOCTYPE html>
		<html <?php language_attributes(); ?>>
		<?php
	}
endif;
add_action( 'travel_muni_doctype', 'travel_muni_doctype' );

if ( ! function_exists( 'travel_muni_head' ) ) :
	/**
	 * Before wp_head
	 */
	function travel_muni_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php
	}
endif;
add_action( 'travel_muni_before_wp_head', 'travel_muni_head' );

if ( ! function_exists( 'travel_muni_page_start' ) ) :
	/**
	 * Page Start
	 */
	function travel_muni_page_start() {
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content (Press Enter)', 'travel-muni' ); ?></a>
		<?php
	}
endif;
add_action( 'travel_muni_before_header', 'travel_muni_page_start', 20 );

if ( ! function_exists( 'travel_muni_header' ) ) :
	/**
	 * Header Start
	 */
	function travel_muni_header() {
		/**
		 * Travel Muni Header
		 */
		$header_array = array( 'one', 'five' );
		$header       = get_theme_mod( 'header_layout', 'five' );
		if ( in_array( $header, $header_array, true ) ) {
			get_template_part( 'headers/' . $header );
		}
	}
endif;
add_action( 'travel_muni_header', 'travel_muni_header', 20 );

if ( ! function_exists( 'travel_muni_polylang_language_switcher' ) ) :
	/**
	 * Template for Polylang Language Switcher
	 */
	function travel_muni_polylang_language_switcher() {
		if ( travel_muni_is_polylang_active() || travel_muni_is_wpml_active() ) {
			?>
			<div class="header-t-lang">
				<nav class="language-dropdown">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'language',
							'menu_class'     => 'languages',
							'fallback_cb'    => false,
						)
					);
				?>
				</nav><!-- .language-dropdown -->
			</div><!-- .header-t-lang -->
			<?php
		}
	}
endif;
add_action( 'travel_muni_language_switcher', 'travel_muni_polylang_language_switcher' );

if ( ! function_exists( 'travel_muni_currency_converter' ) ) :
	/**
	 * Currency Converter
	 */
	function travel_muni_currency_converter() {
		if ( travel_muni_is_currency_converter_activated() ) {
			$helper_functions           = Wte_Currency_Converter_Helper_Functions::get_instance();
			$currency_converter_enabled = $helper_functions->is_currency_converter_enabled();
			if ( $currency_converter_enabled ) {
				?>
				<div class="header-t-currnc">
					<div id="wte-cc-currency-list-container">
						<?php echo do_shortcode( '[wte_currency_converter]' ); ?>
					</div>
				</div>
				<?php
			}
		}
	}
endif;
add_action( 'travel_muni_currency_converter', 'travel_muni_currency_converter' );

if ( ! function_exists( 'travel_muni_top_bar' ) ) :
	/**
	 * Top bar for single page and post
	 */
	function travel_muni_top_bar() {
		if ( ! is_front_page() && ! is_404() ) {
			?>
			<section class="breadcrumb-wrap">
				<div class="container">
					<?php travel_muni_breadcrumb(); ?>
				</div>
			</section>
			<?php
		}
	}
endif;
add_action( 'travel_muni_after_header', 'travel_muni_top_bar', 20 );

if ( ! function_exists( 'travel_muni_inner_page_banner' ) ) :
	/**
	 * Inner Page Banner
	 */
	function travel_muni_inner_page_banner() {
		if ( is_archive() || is_search() || is_page_template( array( 'templates/template-destination.php', 'templates/template-activities.php', 'templates/template-trip_types.php', 'templates/template-trip-listing.php' ) ) || ( travel_muni_is_wte_advanced_search_active() && wte_advanced_search_is_search_page() ) ) {
			$bg_img_id = get_theme_mod( 'singular_header_image' );
			$bg_img    = wp_get_attachment_image_url( $bg_img_id, 'travel-muni-header-bg-img' );

			if ( is_page_template( array( 'templates/template-destination.php', 'templates/template-activities.php', 'templates/template-trip_types.php', 'templates/template-trip-listing.php' ) ) ) {
				if ( has_post_thumbnail( get_the_ID() ) ) {
					$bg_img = get_the_post_thumbnail_url( get_the_ID(), 'travel-muni-header-bg-img' );
				}
			}

			$style = $bg_img ? ' style="background: url(' . esc_url( $bg_img ) . ')"' : 'data-bg-img="no"';
			?>
			<section class="inner-pg-banner" <?php echo $style; // phpcs:ignore  ?>>
				<div class="container">
					<?php
					if ( is_archive() || is_search() || ( travel_muni_is_wte_advanced_search_active() && wte_advanced_search_is_search_page() ) ) {
						if ( is_author() ) {
							?>
							<div class="author-wrap">
								<div class="author-wra-f">
									<div class="img-holder"><?php echo get_avatar( get_the_author_meta( 'ID' ), 90 ); ?></div>
									<div class="author-cred">
										<h1 class="author-name"><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></h1>
									</div>
								</div>
									<?php
									if ( get_the_author_meta( 'description' ) ) {
										echo '<div class="text-holder"><div class="author-description">' . wp_kses_post( wpautop( get_the_author_meta( 'description' ) ) ) . '</div></div>';
									}
									?>
							</div>
							<?php
							travel_muni_search_post_count();
						} elseif ( is_search() ) {
							?>
							<h1 class="screen-reader-text"><?php esc_html_e( 'Search Result Page', 'travel-muni' ); ?></h1>
							<div class="search-form-wrap">
								<?php get_search_form(); ?>
							</div>
							<?php
							travel_muni_search_post_count();
						} elseif ( is_tax( array( 'destination', 'activities', 'trip_types' ) ) ) {
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							$queried_object  = get_queried_object();
							$term_id         = $queried_object->term_id;
							$tax_description = get_term_meta( $term_id, 'wte-shortdesc-textarea', true );
							if ( $tax_description ) {
								echo '<div class="tax-descriptions">';
								echo wp_kses_post( wp_trim_words( $tax_description, 20, '.' ) );
								echo '</div>';
							}
						} elseif ( travel_muni_is_wte_advanced_search_active() && wte_advanced_search_is_search_page() ) {
							the_title( '<h1 class="page-title">', '</h1>' );
							echo '<span class="tmp-no-of-trips">';
							echo '</span>';
						} else if( is_post_type_archive('trip') ){
							the_archive_title( '<h1 class="page-title">', '</h1>' );
						} else {
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="text-holder"><div class="description">', '</div></div>' );
							travel_muni_search_post_count();
						}
					} elseif ( is_page_template( array( 'templates/template-destination.php', 'templates/template-activities.php', 'templates/template-trip_types.php', 'templates/template-trip-listing.php' ) ) ) {
						the_title( '<h1 class="page-title">', '</h1>' );
					}
					?>
				</div>
			</section>
			<?php
		}
	}
endif;
add_action( 'travel_muni_after_header', 'travel_muni_inner_page_banner', 25 );

add_filter(
	'wte-trip-search-page-title',
	function () {
		return '';
	}
);

add_filter(
	'wte_advanced_filterby_title',
	function () {
		return __( 'Filter By', 'travel-muni' );
	}
);

add_filter(
	'categorised_trip_price_display_format',
	function( $output, $args ) {
		extract( $args ); // phpcs:ignore WordPress.PHP.DontExtract.extract_extract
		ob_start();
		?>
		<div class="wpte-bf-price">
			<span class="wpte-bf-reg-price">
				<span class="wpte-bf-price-from"><?php esc_html_e( 'From', 'travel-muni' ); ?></span>
				<?php if ( $has_sale ) : ?>
				<del><?php echo esc_html( \wte_get_formated_price( $price ) ); ?></del>
				<?php endif; ?>
			</span>
			<span class="wpte-bf-offer-price">
				<ins class="wpte-bf-offer-amount"><?php echo esc_html( \wte_get_formated_price( $sale_price ) ); ?></ins>
				<div class="wpte-bf-pqty"><?php echo esc_html( sprintf( '/ %s', $per_label ) ); ?></div>
			</span>
		</div>
		<?php
		return ob_get_clean();
	},
	10,
	2
);

if ( ! function_exists( 'travel_muni_content_start' ) ) :
	/**
	 * Content Start
	 */
	function travel_muni_content_start() {
		$home_sections  = travel_muni_get_home_sections();
		$ed_post_author = get_theme_mod( 'ed_post_author', false );

		if ( ! ( is_front_page() && ! is_home() && $home_sections ) ) {
			?>
		<div id="content" class="site-content">
			<?php
			if ( is_404() ) {
				$bg_img = trailingslashit( get_template_directory_uri() ) . 'images/404-image.jpg'; // from customizer
				$style  = $bg_img ? ' style="background: url(' . esc_url( $bg_img ) . ')"' : '';
				?>
					<div class="inner-pg-banner" <?php echo $style; // phpcs:ignore ?>>
						<div class="container-custom">
							<h1 class="banner-title"><?php esc_html_e( 'Sorry the page you\'re looking for is not found.', 'travel-muni' ); ?></h1>
							<div class="gotohome">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-secondary"><?php esc_html_e( 'Go To Homepage', 'travel-muni' ); ?></a>
							</div>
						</div>
						<div class="search-form-wrap">
						<?php get_search_form(); ?>
						</div>
					</div>
					<?php
			}

			if ( is_home() ) { // first post whether it's sticky or not.
				if ( ! is_front_page() ) {
					echo '<h1 class="screen-reader-text">' . single_post_title( '', false ) . '</h1>'; // For SEO.
				}

				$args = array(
					'posts_per_page'      => 1,
					'post__in'            => get_option( 'sticky_posts' ),
					'ignore_sticky_posts' => true,
				);

				$qry = new WP_Query( $args );

				if ( $qry->have_posts() ) {
					while ( $qry->have_posts() ) {
						$qry->the_post();
						if ( has_post_thumbnail() ) {
							$style = ' style="background: url(' . esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ) . ')";';
						} else {
							$style = '';
						}
						?>
							<article
							id="post-<?php the_ID(); ?>"
							<?php
							post_class( 'inner-pg-banner' );
							echo $style; // phpcs:ignore
							?>
							itemscope
							itemtype="https://schema.org/Blog">
								<div class="container-custom">
								<?php
								travel_muni_post_meta();
								the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
								if ( ! $ed_post_author ) {
									echo '<div class="entry-meta-b">';
									travel_muni_posted_by();
									echo '</div>';
								}
								?>
								</div>
								<?php
								if ( is_sticky( get_the_ID() ) ) {
									echo '<div class="container featured-ribbon"><span class="ribbon"><span class="featured-h">' . esc_html__( 'Featured', 'travel-muni' ) . '</span></span></div>';
								}
								?>
							</article><!-- #post-<?php the_ID(); ?> -->
							<?php
					}
					wp_reset_postdata();
				}
			}

			if ( is_singular( 'trip' ) ) {
				if(!travel_muni_is_elementor_activated_post()){
					travel_muni_single_trip_feature_image();
				} else {
					$post_id = get_the_ID();
					$elementor_layout = get_post_meta( $post_id ,'_wp_page_template' );
					if ( isset( $elementor_layout ) && is_array( $elementor_layout ) && isset($elementor_layout[0])
						&& ('elementor_theme' === $elementor_layout[0] || 'default' === $elementor_layout[0]) ){
							travel_muni_single_trip_feature_image();
					}
				}
			}

			if ( is_singular() && get_post_type() !== 'trip' && ! is_page_template( array( 'templates/template-destination.php', 'templates/template-activities.php', 'templates/template-trip_types.php', 'templates/template-trip-listing.php' ) ) && ( function_exists( 'wp_travel_engine_is_checkout_page' ) && ! wp_travel_engine_is_checkout_page() ) && ( function_exists( 'wte_advanced_search_is_search_page' ) && ! wte_advanced_search_is_search_page() ) ) {
				?>
				<div class="container content-meta-wrap">
					<header class="entry-header">
					<?php
					if ( 'post' === get_post_type() ) {
						travel_muni_post_meta();
					}
					the_title( '<h1 class="entry-title">', '</h1>' );
					if ( ( 'post' === get_post_type() ) && ! $ed_post_author ) {
						echo '<div class="entry-meta-b">';
						travel_muni_posted_by();
						echo '</div>';
					}
					if ( function_exists( 'wp_travel_engine_is_thank_you_page' ) && wp_travel_engine_is_thank_you_page() ) {
						$thankyou  = __( 'Thank you for booking the trip. Please check your email for confirmation.', 'travel-muni' );
						$thankyou .= __( ' Below is your booking detail:', 'travel-muni' );
						$thankyou .= '<br>';

						if ( ! empty( $wte_settings['confirmation_msg'] ) ) {
							$thankyou = $wte_settings['confirmation_msg'];
						}

						// Display thany-you message.
						echo '<div class="thank-you-message">' . wp_kses_post( $thankyou ) . '</div>';
					}
					?>
					</header>
					<?php travel_muni_post_thumbnail(); ?>
				</div>
				<?php
			}
			if ( function_exists( 'wp_travel_engine_is_checkout_page' ) && wp_travel_engine_is_checkout_page() ) {
				echo '<div class="wpte-bf-outer wpte-bf-checkout">';
				echo '<div class="container">';
				echo '<div class="wpte-bf-booking-steps">';
				/**
				 * Action hook for header steps.
				 */
				do_action( 'wp_travel_engine_checkout_header_steps' );
				echo '</div>';
				echo '</div>';
				echo '</div>';
			}
			?>
			<div class="container content-wrap-main">
			<?php

		}
	}
endif;
add_action( 'travel_muni_content', 'travel_muni_content_start' );

if ( ! function_exists( 'travel_muni_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function travel_muni_post_thumbnail() {
		$image_size = 'thumbnail';
		$sidebar    = travel_muni_sidebar();
		if ( is_home() || is_archive() || is_search() || is_404() ) {
			if ( is_404() ) {
				$image_size = 'travel-muni-404';
			} else {
				$image_size = 'travel-muni-full-blog';
			}
			echo '<a href="' . esc_url( get_permalink() ) . '" class="post-thumbnail">';
			if ( has_post_thumbnail() ) {
				if ( is_404() ) {
					the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );
				} else {
					the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );
				}
			} else {
				travel_muni_get_fallback_svg( $image_size ); // fallback
			}
			echo '</a>';
		} elseif ( is_singular() ) {
			$image_size = ( $sidebar ) ? 'travel-muni-with-sidebar' : 'travel-muni-single-trip-banner';
			if ( is_single() ) {
				if ( 'trip' === get_post_type() ) {
					?>
					<div class="post-thumbnail">
						<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'travel-muni-single-trip-banner', array( 'itemprop' => 'image' ) );
						} else {
							// Fallback.
							echo wp_kses_post( travel_muni_get_fallback_svg( 'travel-muni-single-trip-banner' ) );
						}
						?>
					</div>
					<?php
				} else {
					if ( has_post_thumbnail() ) {
						?>
						<div class="post-thumbnail">
							<?php the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) ); ?>
						</div>
						<?php
					}
				}
			} else {
				if ( has_post_thumbnail() ) {
					?>
					<div class="post-thumbnail">
						<?php the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) ); ?>
					</div>
					<?php
				}
			}
		}
	}
endif;
add_action( 'travel_muni_before_post_entry_content', 'travel_muni_post_thumbnail', 15 );
add_action( 'travel_muni_before_trip_entry_content', 'travel_muni_post_thumbnail', 10 );

if ( ! function_exists( 'travel_muni_entry_header' ) ) :
	/**
	 * Entry Header
	 */
	function travel_muni_entry_header() {
		if ( 'post' === get_post_type() && ! is_singular( 'post' ) ) {
			travel_muni_post_meta();
		}
		if ( ! is_singular( 'post' ) ) {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
	}
endif;
add_action( 'travel_muni_post_entry_content', 'travel_muni_entry_header', 10 );

if ( ! function_exists( 'travel_muni_entry_content' ) ) :
	/**
	 * Entry Content
	 */
	function travel_muni_entry_content() {
		$ed_excerpt = get_theme_mod( 'ed_excerpt', true );
		?>
		<div class="entry-content" itemprop="text">
		<?php
		if ( is_singular() || ! $ed_excerpt || ( false != get_post_format() ) ) {
			the_content();
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'travel-muni' ),
					'after'  => '</div>',
				)
			);
		} else {
			the_excerpt();
		}
		?>
		</div><!-- .entry-content -->
		<?php
	}
endif;
add_action( 'travel_muni_page_entry_content', 'travel_muni_entry_content', 15 );
add_action( 'travel_muni_post_entry_content', 'travel_muni_entry_content', 20 );

if ( ! function_exists( 'travel_muni_entry_footer' ) ) :
	/**
	 * Entry Footer
	 */
	function travel_muni_entry_footer() {
		?>
		<footer class="entry-footer">
		<?php
		if ( get_edit_post_link() ) {
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'travel-muni' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		}
		?>
		</footer><!-- .entry-footer -->
		<?php
	}
endif;
add_action( 'travel_muni_page_entry_content', 'travel_muni_entry_footer', 20 );
add_action( 'travel_muni_post_entry_content', 'travel_muni_entry_footer', 25 );

if ( ! function_exists( 'travel_muni_tag_social_share' ) ) :
	/**
	 * Social Sharing and Tags for single post.
	 */
	function travel_muni_tag_social_share() {
		echo '<div class="social-share">';
		travel_muni_tag();
		echo '</div>';
	}
endif;
add_action( 'travel_muni_after_post_content', 'travel_muni_tag_social_share', 15 );

if ( ! function_exists( 'travel_muni_author' ) ) :
	/**
	 * Author Section
	 */
	function travel_muni_author() {
		$ed_author = get_theme_mod( 'ed_author', false );
		if ( ! $ed_author && get_the_author_meta( 'description' ) ) {
			?>
			<div class="author-section">
				<div class="author-top-wrap">
					<div class="img-holder">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 90 ); ?>
					</div>
					<div class="author-meta">
						<h3 class="author-name">
						<?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?>
						</h3>
					</div>
				</div>
				<div class="author-description">
				<?php echo wp_kses_post( wpautop( get_the_author_meta( 'description' ) ) ); ?>
				</div>
			</div>
			<?php
		}
	}
endif;
add_action( 'travel_muni_after_post_content', 'travel_muni_author', 20 );

if ( ! function_exists( 'travel_muni_navigation' ) ) :
	/**
	 * Navigation
	 */
	function travel_muni_navigation() {
		if ( is_single() ) {
			$previous = get_previous_post_link(
				'<div class="nav-previous nav-holder">%link</div>',
				'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512"><path id="Path_201" data-name="Path 201" class="cls-1" d="M25.1 247.5l117.8-116c4.7-4.7 12.3-4.7 17 0l7.1 7.1c4.7 4.7 4.7 12.3 0 17L64.7 256l102.2 100.4c4.7 4.7 4.7 12.3 0 17l-7.1 7.1c-4.7 4.7-12.3 4.7-17 0L25 264.5c-4.6-4.7-4.6-12.3.1-17z"></path></svg><span class="meta-nav">' . esc_html__( 'Previous Article', 'travel-muni' ) . '</span><span class="post-title">%title</span>',
				false,
				'',
				'category'
			);

			$next = get_next_post_link(
				'<div class="nav-next nav-holder">%link</div>',
				'<span class="meta-nav">' . esc_html__( 'Next Article', 'travel-muni' ) . '</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512"><path id="Path_202" data-name="Path 202" class="cls-1" d="M166.9 264.5l-117.8 116c-4.7 4.7-12.3 4.7-17 0l-7.1-7.1c-4.7-4.7-4.7-12.3 0-17L127.3 256 25.1 155.6c-4.7-4.7-4.7-12.3 0-17l7.1-7.1c4.7-4.7 12.3-4.7 17 0l117.8 116c4.6 4.7 4.6 12.3-.1 17z" transform="translate(-8 -8)"></path></svg><span class="post-title">%title</span>',
				false,
				'',
				'category'
			);

			if ( $previous || $next ) {
				?>
				<nav class="navigation post-navigation" role="navigation">
					<h2 class="screen-reader-text"><?php esc_html_e( 'Post Navigation', 'travel-muni' ); ?></h2>
					<div class="nav-links">
					<?php
					if ( $previous ) {
						echo wp_kses_post( $previous );
					}
					if ( $next ) {
						echo wp_kses_post( $next );
					}
					?>
					</div>
				</nav>
					<?php
			}
		} else {
			the_posts_pagination(
				array(
					'prev_text'          => __( 'Previous', 'travel-muni' ),
					'next_text'          => __( 'Next', 'travel-muni' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'travel-muni' ) . ' </span>',
				)
			);
		}
	}
endif;
add_action( 'travel_muni_after_post_content', 'travel_muni_navigation', 25 );
add_action( 'travel_muni_after_posts_content', 'travel_muni_navigation' );

if ( ! function_exists( 'travel_muni_related_posts' ) ) :
	/**
	 * Related Posts
	 */
	function travel_muni_related_posts() {
		$ed_related_post = get_theme_mod( 'ed_related', true );

		if ( $ed_related_post ) {
			travel_muni_get_posts_list( 'related' );
		}
	}
endif;
add_action( 'travel_muni_after_post_content', 'travel_muni_related_posts', 30 );

if ( ! function_exists( 'travel_muni_comment' ) ) :
	/**
	 * Comments Template
	 */
	function travel_muni_comment() {
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
endif;
	}
endif;
add_action( 'travel_muni_after_post_content', 'travel_muni_comment' );
add_action( 'travel_muni_after_page_content', 'travel_muni_comment' );

if ( ! function_exists( 'travel_muni_content_end' ) ) :
	/**
	 * Content End
	 */
	function travel_muni_content_end() {
		$home_sections = travel_muni_get_home_sections();
		if ( ! ( is_front_page() && ! is_home() && $home_sections ) ) {
			?>
			</div><!-- .container/ -->
		</div><!-- .site-content -->
			<?php
		}
	}
endif;
add_action( 'travel_muni_before_footer', 'travel_muni_content_end', 20 );

if ( ! function_exists( 'travel_muni_footer_start' ) ) :
	/**
	 * Footer Start
	 */
	function travel_muni_footer_start() {
		?>
		<footer id="colophon" class="site-footer" itemscope itemtype="https://schema.org/WPFooter">
		<?php
	}
endif;
add_action( 'travel_muni_footer', 'travel_muni_footer_start', 20 );

if ( ! function_exists( 'travel_muni_footer_top' ) ) :
	/**
	 * Footer Top
	 */
	function travel_muni_footer_top() {
		$footer_sidebars = array( 'footer-one', 'footer-two', 'footer-three', 'footer-four' );
		$active_sidebars = array();
		$sidebar_count   = 0;

		foreach ( $footer_sidebars as $sidebar ) {
			if ( is_active_sidebar( $sidebar ) ) {
				array_push( $active_sidebars, $sidebar );
				$sidebar_count++;
			}
		}

		if ( $active_sidebars ) {
			?>
			<div class="footer-t">
				<div class="container">
					<div class="footer-t-wrap column-<?php echo esc_attr( $sidebar_count ); ?>">
					<?php foreach ( $active_sidebars as $active ) { ?>
						<div class="col">
							<?php dynamic_sidebar( $active ); ?>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
				<?php
		}
	}
endif;
add_action( 'travel_muni_footer', 'travel_muni_footer_top', 30 );

if ( function_exists( 'travel_muni_footer_middle' ) ) {
	// adds the content from the plugin travel booking toolkit
	add_action( 'travel_muni_footer', 'travel_muni_footer_middle', 35 );
}

if ( ! function_exists( 'travel_muni_footer_bottom' ) ) :
	/**
	 * Footer Bottom
	 */
	function travel_muni_footer_bottom() {
		?>
			<div class="footer-b">
				<div class="container">
					<div class="footer-b-wrap">
						<div class="site-info">
							<div class="footer-cop">
							<?php
							travel_muni_get_footer_copyright();
							travel_muni_ed_author_link();
							travel_muni_ed_wp_link();
							?>
							</div>
							<?php function_exists( 'travel_muni_footer_payment' ) && travel_muni_footer_payment(); ?>
						</div>
					</div>
				</div>
				<?php
	}
endif;
add_action( 'travel_muni_footer', 'travel_muni_footer_bottom', 40 );

if ( ! function_exists( 'travel_muni_footer_payment' ) ) :
	/**
	 * Footer Payments
	 */
	function travel_muni_footer_payment() {

		$payment_section_enabled = get_theme_mod( 'payments_enable', false );
		$payments_label = get_theme_mod( 'payments_label', __( 'Payments:', 'travel-muni' ) );
		$payments_image = get_theme_mod( 'payments_image' );

		if ( $payment_section_enabled && $payments_label && $payments_image ) { ?>
			<div class="payments-showcase">
			<?php
			echo '<span>' . esc_html( $payments_label ) . '</span>';
			echo '<img src="' . esc_url( $payments_image ) . '" alt="' . esc_html__( 'Payments Image', 'travel-muni' ) . '" alt="' . esc_html( $payments_label ) . '"/>';
			?>
			</div>
			<?php
		}
	}
endif;

if ( ! function_exists( 'travel_muni_footer_end' ) ) :
	/**
	 * Footer End
	 */
	function travel_muni_footer_end() {
		?>
		</footer><!-- #colophon -->
		<?php
	}
endif;
add_action( 'travel_muni_footer', 'travel_muni_footer_end', 50 );

if ( ! function_exists( 'travel_muni_back_to_top' ) ) :
	/**
	 * Back to top
	 */
	function travel_muni_back_to_top() {
		?>
		<div id="back-top">
			<span><i class="fas fa-angle-up"></i></span>
		</div>
		<div class="overlay"></div>
		<?php
	}
endif;
add_action( 'travel_muni_after_footer', 'travel_muni_back_to_top', 15 );

if ( ! function_exists( 'travel_muni_page_end' ) ) :
	/**
	 * Page End
	 */
	function travel_muni_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'travel_muni_after_footer', 'travel_muni_page_end', 20 );

// Filter Thank You Page Content.
add_filter(
	'pre_do_shortcode_tag',
	function( $content, $tag ) {
		if ( 'WP_TRAVEL_ENGINE_THANK_YOU' === $tag ) {
			$data = \WTE_Booking::get_callback_token_payload( 'thankyou' );
			if ( ! $data ) {
				$content = '';
			}
		}
		return $content;
	},
	10,
	2
);

// Advanced Itinerary Template.
add_filter(
	'wte_get_template',
	function( $template, $template_name ) {
		if ( ( 'single-trip/trip-tabs/itinerary-tab.php' === $template_name ) && defined( 'WTEAD_FRONT_TEMPLATE_DIR' ) ) {
			$template = get_template_directory() . '/wp-travel-engine/single-trip/trip-tabs/advanced-itinerary-tab.php';
		}
		return $template;
	},
	11,
	2
);