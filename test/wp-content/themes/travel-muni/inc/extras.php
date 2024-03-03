<?php

/**
 * Travel Muni Standalone Functions.
 *
 * @package Travel_Muni
 */

if ( ! function_exists( 'travel_muni_get_template_part' ) ) :
	/**
	 * Get template from plus, companion or theme.
	 *
	 * @param string $template Name of the section.
	 */
	function travel_muni_get_template_part( $template ) {

		if ( locate_template( 'sections/' . $template . '.php' ) ) {
			get_template_part( 'sections/' . $template );
		} else {
			if ( defined( 'TBT_PLUGIN_DIR' ) ) {
				if ( file_exists( TBT_PLUGIN_DIR . 'includes/travel-muni/sections/' . $template . '.php' ) ) {
					require_once TBT_PLUGIN_DIR . 'includes/travel-muni/sections/' . $template . '.php';
				}
			}
		}
	}
endif;

if ( ! function_exists( 'travel_muni_header_phone' ) ) :
	/**
	 * Header Phone
	 */
	function travel_muni_header_phone() {
		if ( travel_muni_is_header_five_activated() ) {
			$class = 'head-5-dtls';
		} else {
			$class = 'tel-link';
		}
		$phone = get_theme_mod( 'phone' );
		if ( $phone ) { ?>
			<div class="contact-phone-wrap">
				<?php if ( travel_muni_is_header_five_activated() ) { ?>
					<span class="head-cont-whats">
						<svg id="Icons" xmlns="http://www.w3.org/2000/svg" width="19.785" height="19.785" viewBox="0 0 19.785 19.785">
							<g id="Color-">
								<path id="Whatsapp" d="M709.89,360a9.886,9.886,0,0,0-8.006,15.691l-1.232,3.676,3.8-1.215A9.891,9.891,0,1,0,709.9,360Zm-2.762,5.025c-.192-.459-.337-.477-.628-.488q-.166-.011-.331-.011a1.435,1.435,0,0,0-1.012.354,3.159,3.159,0,0,0-1.012,2.408,5.653,5.653,0,0,0,1.174,2.984,12.385,12.385,0,0,0,4.924,4.35c2.273.942,2.948.855,3.465.744a2.787,2.787,0,0,0,1.942-1.4,2.456,2.456,0,0,0,.169-1.373c-.07-.122-.262-.192-.552-.337s-1.7-.843-1.971-.936a.552.552,0,0,0-.709.215,12.075,12.075,0,0,1-.773,1.023.624.624,0,0,1-.7.11,7.288,7.288,0,0,1-2.32-1.43,8.8,8.8,0,0,1-1.6-1.995c-.169-.291-.017-.459.116-.616.146-.181.285-.308.43-.477a1.756,1.756,0,0,0,.32-.453.591.591,0,0,0-.041-.536c-.069-.145-.651-1.564-.889-2.14Z" transform="translate(-700 -360)" fill="#67c15e" fill-rule="evenodd"></path>
							</g>
						</svg>
					</span>
					<span class="head-cont-vib">
						<svg id="Icons" xmlns="http://www.w3.org/2000/svg" width="19.785" height="19.785" viewBox="0 0 19.785 19.785">
							<g id="Color-">
								<path id="Viber" d="M607.893-810a9.892,9.892,0,0,1,9.893,9.893,9.892,9.892,0,0,1-9.893,9.893A9.892,9.892,0,0,1,598-800.107,9.892,9.892,0,0,1,607.893-810Zm.592,4.029a5.457,5.457,0,0,1,1.813.537,4.93,4.93,0,0,1,1.459,1.052,4.735,4.735,0,0,1,1,1.369,6.54,6.54,0,0,1,.635,2.677c.014.342,0,.418-.074.516a.363.363,0,0,1-.587-.055.955.955,0,0,1-.057-.4,7.086,7.086,0,0,0-.107-1.016,4.673,4.673,0,0,0-1.815-3.014,4.76,4.76,0,0,0-2.749-.97c-.372-.022-.436-.035-.52-.1a.382.382,0,0,1-.014-.547c.092-.084.156-.1.475-.086.166.006.411.026.544.041Zm-4.47.211a1.329,1.329,0,0,1,.235.117,9.47,9.47,0,0,1,1.744,2.228,1.243,1.243,0,0,1,.2.863c-.063.223-.166.34-.63.713a3.409,3.409,0,0,0-.387.345.909.909,0,0,0-.128.441,3.28,3.28,0,0,0,.491,1.372,5.88,5.88,0,0,0,.982,1.154,5.418,5.418,0,0,0,1.289.91c.573.285.923.358,1.179.238a.938.938,0,0,0,.154-.086c.019-.017.17-.2.334-.4.317-.4.389-.463.606-.537a1.049,1.049,0,0,1,.841.076c.215.111.684.4.987.613a14.508,14.508,0,0,1,1.367,1.113.887.887,0,0,1,.1.923,4.325,4.325,0,0,1-1.1,1.371,1.558,1.558,0,0,1-.941.388,1.365,1.365,0,0,1-.737-.154,15.508,15.508,0,0,1-6.677-5.135,14.532,14.532,0,0,1-2.075-3.768c-.276-.759-.289-1.089-.063-1.478a4.343,4.343,0,0,1,.818-.8,2.823,2.823,0,0,1,.923-.553,1.069,1.069,0,0,1,.489.045Zm4.605,1.2a3.782,3.782,0,0,1,2.708,1.619,3.879,3.879,0,0,1,.622,1.73,3.231,3.231,0,0,1,0,.727.444.444,0,0,1-.178.193.436.436,0,0,1-.328-.011c-.151-.076-.2-.2-.2-.525a3.132,3.132,0,0,0-.358-1.453,2.969,2.969,0,0,0-1.091-1.134,3.729,3.729,0,0,0-1.5-.451.5.5,0,0,1-.37-.139.355.355,0,0,1-.029-.441C608-804.6,608.153-804.625,608.62-804.555Zm.416,1.474a1.867,1.867,0,0,1,.933.465,1.931,1.931,0,0,1,.581,1.21c.053.347.031.484-.092.6a.379.379,0,0,1-.458.01c-.094-.071-.123-.145-.145-.346a1.852,1.852,0,0,0-.152-.629,1.108,1.108,0,0,0-.987-.623c-.241-.029-.313-.056-.391-.149a.363.363,0,0,1,.11-.546c.074-.037.105-.041.27-.032A2.6,2.6,0,0,1,609.036-803.081Z" transform="translate(-598 810)" fill="#7f4da0" fill-rule="evenodd"></path>
							</g>
						</svg>
					</span>
				<?php } ?>
				<a href="<?php echo esc_url( 'tel:' . preg_replace( '/[^\d+]/', '', $phone ) ); ?>" class="<?php echo esc_attr( $class ); ?>">
					<?php echo esc_html( $phone ); ?>
				</a>
			</div>
			<?php
		}
	}
endif;

if ( ! function_exists( 'travel_muni_header_email' ) ) :
	/**
	 * Header Email
	 */
	function travel_muni_header_email() {
		$email = get_theme_mod( 'email' );
		if ( $email ) {
			echo '<div class="contact-email-wrap"><a href="' . esc_url( 'mailto:' . sanitize_email( $email ) ) . '" class="email-link">' . esc_html( $email ) . '</div></a>';
		}
	}
endif;

if ( ! function_exists( 'travel_muni_header_image_block' ) ) :
	/**
	 * Header Image Block
	 *
	 * @package Header Image
	 */
	function travel_muni_header_image_block() {
		$ed_banner               = get_theme_mod( 'ed_banner_section', 'static_banner' );
		$banner_title            = get_theme_mod( 'banner_title', __( 'Find Your Best Holiday', 'travel-muni' ) );
		$banner_subtitle         = get_theme_mod( 'banner_subtitle', __( 'Find great adventure holidays and activities around the planet.', 'travel-muni' ) );
		$banner_label            = get_theme_mod( 'banner_label', __( 'Explore All', 'travel-muni' ) );
		$banner_link             = get_theme_mod( 'banner_link', '#' );
		$banner_slider_layout    = get_theme_mod( 'banner_slider_layout', 'three' );
		$slider_caption_position = get_theme_mod( 'slider_caption_position', 'center' );

		switch ( $slider_caption_position ) {
			case 'left':
				$position = ' left';
				break;
			case 'center':
				$position = ' center';
				break;
			case 'right':
				$position = ' right';
				break;
			default:
				$position = ' left';
				break;
		}

		switch ( $banner_slider_layout ) {
			case 'two':
				$banner_box_class          = '';
				$banner_content_wrap_class = '';
				break;
			case 'three':
				$banner_box_class          = ' container';
				$banner_content_wrap_class = '';
				break;
			case 'four':
				$banner_box_class          = '';
				$banner_content_wrap_class = ' container';
				break;
			default:
				$banner_box_class          = '';
				$banner_content_wrap_class = '';
				break;
		}

		if ( $ed_banner === 'static_banner' && ( $banner_title || $banner_subtitle || ( $banner_label && $banner_link ) ) ) {
			?>
			<div class="banner-box
			<?php
			echo esc_attr( $banner_box_class );
			( $banner_slider_layout === 'three' ) && print esc_attr( $position );
			?>
			">
				<div class="banner-content-wrap<?php echo esc_attr( $banner_content_wrap_class ); ?>">
					<?php if ( $banner_title || $banner_subtitle ) { ?>
						<div class="text-wrap">
							<?php if ( $banner_title ) { ?>
								<h2 class="banner-title"><?php echo esc_html( travel_muni_get_banner_title() ); ?></h2>
								<?php
							}
							if ( $banner_subtitle ) {
								?>
								<div class="banner-desc"><?php echo wp_kses_post( wpautop( travel_muni_get_banner_sub_title() ) ); ?></div>
							<?php } ?>
						</div>
						<?php
					}
					if ( $banner_label && $banner_link ) {
						?>
						<div class="btn-explore">
							<a class="btn-secondary" href="<?php echo esc_url( $banner_link ); ?>">
								<?php echo esc_html( travel_muni_get_banner_label() ); ?>
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
			<?php
		}
	}
endif;


if ( ! function_exists( 'travel_muni_search_post_count' ) ) :
	/**
	 * Search Result Page Count
	 */
	function travel_muni_search_post_count() {
		global $wp_query;
		$found_posts  = $wp_query->found_posts;
		$paged        = get_query_var( 'paged', 0 );
		$visible_post = get_option( 'posts_per_page' );
		$paged_index  = $found_posts / $visible_post;

		if ( $found_posts > 0 ) {
			echo '<div class="banner-meta">';
			if ( $found_posts > $visible_post ) {
				if ( $paged == 0 ) {
					$start_post = 1;
					$end_post   = $visible_post;
				} elseif ( $paged < $paged_index ) {
					$start_post = ( ( $paged - 1 ) * $visible_post ) + 1;
					$end_post   = $paged * $visible_post;
				} else {
					$start_post = ( ( $paged - 1 ) * $visible_post ) + 1;
					$end_post   = ( $paged - 1 ) * $visible_post + ( $found_posts - ( ( $paged - 1 ) * $visible_post ) );
				}
				if ( ! is_post_type_archive( 'trip' ) ) {
					echo esc_html(
						sprintf(
							__( 'Showing: %1$s - %2$s of %3$s Articles', 'travel-muni' ),
							number_format_i18n( $start_post ),
							number_format_i18n( $end_post ),
							number_format_i18n( $found_posts )
						)
					);
				}
			} else {
				if ( ! is_post_type_archive( 'trip' ) ) {
					/* translators: 1: found posts. */
					echo esc_html( sprintf( _nx( '%s Article', '%s Articles', $found_posts, 'found posts', 'travel-muni' ), number_format_i18n( $found_posts ) ) );
				}
			}
			echo '</div>';
		}
	}
endif;

if ( ! function_exists( 'travel_muni_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function travel_muni_posted_on() {

		$ed_updated_post_date = get_theme_mod( 'ed_post_update_date', true );
		$on = __( 'on ', 'travel-muni' );

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			if( $ed_updated_post_date ){
	            $time_string = '<time class="entry-date published updated" datetime="%3$s" itemprop="dateModified">%4$s</time></time><time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time>';
	            $on = __( 'updated on ', 'travel-muni' );		  
			}else{
	            $time_string = '<time class="entry-date published" datetime="%1$s" itemprop="datePublished">%2$s</time><time class="updated" datetime="%3$s" itemprop="dateModified">%4$s</time>';  
			}        
		}else{
		   $time_string = '<time class="entry-date published updated" datetime="%1$s" itemprop="datePublished">%2$s</time><time class="updated" datetime="%3$s" itemprop="dateModified">%4$s</time>';   
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf( '%1$s %2$s', esc_html( $on ), $time_string );

		echo '<span class="entry-date">' . $posted_on . '</span>'; // phpcs:ignore.

	}
endif;

if ( ! function_exists( 'travel_muni_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function travel_muni_posted_by() {
		global $post;
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'travel-muni' ),
			'<span itemprop="name"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID', $post->post_author ) ) ) . '" itemprop="url">' . esc_html( get_the_author_meta( 'display_name', $post->post_author ) ) . '</a></span>'
		);

		echo wp_kses_post( '<span class="byline" itemprop="author" itemscope itemtype="https://schema.org/Person">' . get_avatar( get_the_author_meta( 'ID' ), 35 ) . $byline . '</span>' );
	}
endif;

if ( ! function_exists( 'travel_muni_category' ) ) :
	/**
	 * Prints categories
	 */
	function travel_muni_category() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'travel-muni' ) );
			if ( $categories_list ) {
				echo wp_kses_post( '<span class="category" itemprop="about">' . $categories_list . '</span>' );
			}
		}
	}
endif;

if ( ! function_exists( 'travel_muni_post_meta' ) ) :
	/**
	 * Post Meta
	 */
	function travel_muni_post_meta() {
		$ed_cat_single = get_theme_mod( 'ed_category', false );
		$ed_post_date  = get_theme_mod( 'ed_post_date', false );

		echo '<div class="entry-meta">';
		if ( ! $ed_cat_single ) {
			travel_muni_category();
		}
		if ( ! $ed_post_date ) {
			travel_muni_posted_on();
		}
		echo '</div><!-- .entry-meta -->';
	}
endif;

if ( ! function_exists( 'travel_muni_tag' ) ) :
	/**
	 * Prints tags
	 */
	function travel_muni_tag() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			$tags_list = get_the_tag_list( '', ' ' );
			if ( $tags_list ) {
				/* translators: 1: html tag - span 2: list of tags. 3. html closing tag - span */
				echo wp_kses_post( sprintf( '<div class="tags" itemprop="about">' . __( '%1$sTags:%2$s %3$s', 'travel-muni' ) . '</div>', '<span>', '</span>', $tags_list ) );
			}
		}
	}
endif;

if ( ! function_exists( 'travel_muni_get_posts_list' ) ) :
	/**
	 * Returns Related Posts
	 */
	function travel_muni_get_posts_list() {
		global $post;

		$latest_post_title = get_theme_mod( 'related_post_title', __( 'Keep Reading', 'travel-muni' ) );
		$see_all_title     = get_theme_mod( 'related_view_all_title', __( 'See All', 'travel-muni' ) );
		$ed_post_author    = get_theme_mod( 'ed_post_author', false );
		$post_page         = get_option( 'page_for_posts' );
		$args              = array(
			'ignore_sticky_posts' => true,
			'posts_per_page'      => 2,
			'post__not_in'        => array( $post->ID ),
			'orderby'             => 'rand',
		);

		$qry = new WP_Query( $args );

		if ( $qry->have_posts() ) {
			?>
			<div class="related-posts">
				<?php if ( $latest_post_title || $see_all_title || ( $post_page && $post_page > 0 ) ) { ?>
					<h3 class="heading-title">
					<?php
					if ( $latest_post_title ) {
						echo esc_html( $latest_post_title );}
					?>
						<?php if ( $see_all_title || ( $post_page && $post_page > 0 ) ) { ?>
							<a href="<?php ( $post_page && $post_page > 0 ) && print esc_url( get_permalink( $post_page ) ); ?>" class="see-all-artc">
							<?php
							$see_all_title && print esc_html( $see_all_title );
							travel_muni_svg_helpers( 'caret-right' );
							?>
							</a>
						<?php } ?>
					</h3>
					<?php
				}
				echo '<div class="posts-holder">';
				while ( $qry->have_posts() ) {
					$qry->the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-holder-single' ); ?>>
						<a href="<?php the_permalink(); ?>" class="post-thumbnail">
							<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail( 'travel-muni-trip-thumb-size', array( 'itemprop' => 'image' ) );
							} else {
								travel_muni_get_fallback_svg( 'travel-muni-trip-thumb-size' ); // fallback
							}
							?>
						</a>
						<div class="text-holder">
							<?php
							travel_muni_post_meta();
							the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
							if ( ! $ed_post_author ) {
								echo '<div class="entry-meta-b">';
								travel_muni_posted_by();
								echo '</div>';
							}
							?>
						</div>
					</article><!-- #post-<?php the_ID(); ?> -->
					<?php
				}
				echo '</div><!-- .posts-holder -->';
				?>
			</div>
			<?php
			wp_reset_postdata();
		}
	}
endif;

if ( ! function_exists( 'travel_muni_site_branding' ) ) :
	/**
	 * Site Branding
	 */
	function travel_muni_site_branding( $mobile = false ) {
		$itemscope           = $mobile ? '' : ' itemscope itemtype="https://schema.org/Organization"';
		$display_header_text = get_theme_mod( 'header_text', 1 );
		$site_title          = get_bloginfo( 'name', 'display' );
		$description         = get_bloginfo( 'description', 'display' );
		if ( ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) && $display_header_text && ( $site_title || $description ) ) {
			$branding_class = ' logo-with-site-identity';
		} else {
			$branding_class = '';
		}
		?>
		<div class="site-branding<?php echo esc_attr( $branding_class ); // phpcs:ignore ?>">
			<div class="text-logo" <?php echo $itemscope; // phpcs:ignore ?>>
				<?php
				if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) {
					echo '<div class="logos-wrap">';
					the_custom_logo();
					echo '</div><!-- .logos-wrap -->';
				}
				if ( $site_title || $description ) {
					echo '<div class="site-title-description">';
					if ( $mobile ) {
						?>
						<p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					} else {
						if ( is_front_page() ) {
							?>
							<h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
						} else {
							?>
							<p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></p>
							<?php
						}
					}
					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) {
						?>
						<p class="site-description" itemprop="description"><?php echo wp_kses_post( $description ); ?></p>
						<?php

					}
					echo '</div><!-- .site-title-description -->';
				}
				?>
			</div>
		</div>
		<?php
	}
endif;

if ( ! function_exists( 'travel_muni_mobile_header' ) ) :
	/**
	 * Travel Muni Mobile Header
	 */
	function travel_muni_mobile_header() {
		?>
		<div class="mobile-header">
			<div class="mobile-header-t">
				<div class="container">
					<div class="social-media-wrap">
						<?php
						$social_links = get_theme_mod( 'social_links' );
						$ed_social    = get_theme_mod( 'ed_social_links', true );

						if ( $ed_social && $social_links ) {
							?>
							<ul>
								<?php
								foreach ( $social_links as $link ) {
									if ( $link['link'] ) {
										?>
										<li>
											<a href="<?php echo esc_url( $link['link'] ); ?>" target="_blank" rel="nofollow noopener">
												<i class="<?php echo esc_attr( $link['font'] ); ?>"></i>
											</a>
										</li>
										<?php
									}
								}
								?>
							</ul>
							<?php
						}
						?>
					</div>
					<div class="srch-moblop-wrap">
						<?php travel_muni_header_search( true ); ?>
						<div class="mobile-menu-op-wrap">
							<button class="mobile-menu-opener" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".close-main-nav-toggle">
								<span></span>
							</button>
							<span class="mob-menu-op-txt"><?php esc_html_e( 'MENU', 'travel-muni' ); ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="mobile-header-b">
				<div class="container">
					<?php travel_muni_site_branding( true ); ?>
					<?php
					if ( function_exists( 'travel_muni_header_customize_trip' ) ) {
						travel_muni_header_customize_trip();
					}
					?>
				</div>
			</div>
			<div class="mobile-menu-wrapper">
				<nav id="mobile-site-navigation" class="mobile-navigation">
					<div class="primary-menu-list main-menu-modal cover-modal" data-modal-target-string=".main-menu-modal">
						<button class="btn-menu-close close-main-nav-toggle" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".main-menu-modal"></button>
						<div class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'travel-muni' ); ?>">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'primary',
									'menu_id'        => 'primary-mobile-menu',
									'fallback_cb'    => 'travel_muni_primary_menu_fallback',
								)
							);
							$phone = get_theme_mod( 'phone' );
							$email = get_theme_mod( 'email' );
							if ( $phone || $email ) { ?>
								<ul class="contact-info-lists">
									<?php if( $phone ){ ?>
										<li class="tel-link">
											<?php travel_muni_svg_helpers( 'tel' ); ?>
											<?php travel_muni_header_phone(); ?>
										</li>
									<?php } if( $email ) { ?>
										<li class="email-link">
											<?php travel_muni_svg_helpers( 'email' ); ?>
											<?php travel_muni_header_email(); ?>
										</li>
									<?php } ?>
								</ul>
							<?php } ?>
						</div>
					</div>
				</nav><!-- #mobile-site-navigation -->
			</div>
		</div><!-- mobile-header -->
		<?php
	}
endif;

if ( ! function_exists( 'travel_muni_social_links' ) ) :
	/**
	 * Social Links
	 */
	function travel_muni_social_links( $echo = true ) {
		$social_links = get_theme_mod( 'social_links' );
		$ed_social    = get_theme_mod( 'ed_social_links', true );

		if ( $ed_social && $social_links && $echo ) {
			?>
			<ul class="social-networks">
				<?php
				foreach ( $social_links as $link ) {
					if ( $link['link'] ) {
						?>
						<li>
							<a href="<?php echo esc_url( $link['link'] ); ?>" target="_blank" rel="nofollow noopener">
								<i class="<?php echo esc_attr( $link['font'] ); ?>"></i>
							</a>
						</li>
						<?php
					}
				}
				?>
			</ul>
			<?php
		} elseif ( $ed_social && $social_links ) {
			return true;
		} else {
			return false;
		}
		?>
		<?php
	}
endif;

if ( ! function_exists( 'travel_muni_primary_nagivation' ) ) :
	/**
	 * Primary Navigation.
	 */
	function travel_muni_primary_nagivation() {
		?>
		<nav id="site-navigation" class="main-navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
			<?php
			$args = array(
				'theme_location' => 'primary',
				'menu_id'        => 'primary-menu',
				'container'      => false,
				'fallback_cb'    => 'travel_muni_primary_menu_fallback',
			);
			wp_nav_menu( $args );
			?>
		</nav><!-- #site-navigation -->
		<?php
	}
endif;

if ( ! function_exists( 'travel_muni_primary_menu_fallback' ) ) :
	/**
	 * Fallback for primary menu
	 */
	function travel_muni_primary_menu_fallback() {
		if ( current_user_can( 'manage_options' ) ) {
			echo '<ul id="primary-menu" class="menu">';
			echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Click here to add a menu', 'travel-muni' ) . '</a></li>';
			echo '</ul>';
		}
	}
endif;

if ( ! function_exists( 'travel_muni_header_search' ) ) :
	/**
	 * Header Search
	 */
	function travel_muni_header_search( $mobile = false ) {
		$ed_header_search = get_theme_mod( 'ed_header_search', true );
		if ( $mobile ) {
			$class = 'mobile-search-modal';
		} else {
			$class = 'search-modal';
		}

		if ( $ed_header_search ) {
			?>
			<div class="search-form-section">
				<button class="search-icon" data-toggle-target=".<?php echo esc_attr( $class ); ?>" data-toggle-body-class="showing-search-modal" aria-expanded="false" data-set-focus=".<?php echo esc_attr( $class ); ?> .search-field">
					<?php travel_muni_svg_helpers( 'search-icon' ); ?>
				</button>
				<div class="search header-searh-wrap <?php echo esc_attr( $class ); ?> cover-modal" data-modal-target-string=".<?php echo esc_attr( $class ); ?>">
					<?php get_search_form(); ?>
					<button class="btn-form-close" data-toggle-target=".<?php echo esc_attr( $class ); ?>" data-toggle-body-class="showing-search-modal" aria-expanded="false" data-set-focus=".<?php echo esc_attr( $class ); ?>"><?php esc_html_e( 'Close', 'travel-muni' ); ?></button>
				</div>
			</div>
			<?php
		}
	}
endif;

if ( ! function_exists( 'travel_muni_breadcrumb' ) ) :
	/**
	 * Breadcrumbs
	 */
	function travel_muni_breadcrumb() {
		global $post;
		$post_page  = get_option( 'page_for_posts' ); // The ID of the page that displays posts.
		$show_front = get_option( 'show_on_front' ); // What to show on the front page
		$home       = get_theme_mod( 'home_text', __( 'Home', 'travel-muni' ) ); // text for the 'Home' link
		$delimiter  = '<span class="separator"><i class="fas fa-angle-right"></i></span>';
		$before     = '<span class="current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">'; // tag before the current crumb
		$after      = '</span>'; // tag after the current crumb

		if ( get_theme_mod( 'ed_breadcrumb', true ) ) {
			$depth = 1;
			echo '<div id="crumbs" class="crumbs" itemscope itemtype="https://schema.org/BreadcrumbList">
                <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a href="' . esc_url( home_url() ) . '" itemprop="item"><span itemprop="name">' . esc_html( $home ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . wp_kses(
				$delimiter,
				array(
					'span' => array( 'class' => array() ),
					'i'    => array( 'class' => array() ),
				)
			) . '</span>';

			if ( is_home() ) {
				$depth = 2;
				echo wp_kses_post( $before . '<a itemprop="item" href="' . esc_url( get_the_permalink() ) . '"><span itemprop="name">' . esc_html( single_post_title( '', false ) ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after );
			} elseif ( is_category() ) {
				$depth   = 2;
				$thisCat = get_category( get_query_var( 'cat' ), false );
				if ( $show_front === 'page' && $post_page ) { // If static blog post page is set
					$p = get_post( $post_page );
					echo wp_kses_post( '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_permalink( $post_page ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $p->post_title ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $delimiter . '</span>' );
					$depth++;
				}
				if ( $thisCat->parent != 0 ) {
					$parent_categories = get_category_parents( $thisCat->parent, false, ',' );
					$parent_categories = explode( ',', $parent_categories );
					foreach ( $parent_categories as $parent_term ) {
						$parent_obj = get_term_by( 'name', $parent_term, 'category' );
						if ( is_object( $parent_obj ) ) {
							$term_url  = get_term_link( $parent_obj->term_id );
							$term_name = $parent_obj->name;
							echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="' . esc_url( $term_url ) . '"><span itemprop="name">' . esc_html( $term_name ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . wp_kses(
								$delimiter,
								array(
									'span' => array( 'class' => array() ),
									'i'    => array( 'class' => array() ),
								)
							) . '</span>';
							$depth++;
						}
					}
				}
				echo wp_kses_post( $before . '<a itemprop="item" href="' . esc_url( get_term_link( $thisCat->term_id ) ) . '"><span itemprop="name">' . esc_html( single_cat_title( '', false ) ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after );
			} elseif ( travel_muni_is_woocommerce_activated() && ( is_product_category() || is_product_tag() ) ) { // For Woocommerce archive page
				$depth        = 2;
				$current_term = $GLOBALS['wp_query']->get_queried_object();
				if ( wc_get_page_id( 'shop' ) ) { // Displaying Shop link in woocommerce archive page
					$_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
					if ( ! $_name ) {
						$product_post_type = get_post_type_object( 'product' );
						$_name             = $product_post_type->labels->singular_name;
					}
					echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $_name ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . wp_kses(
						$delimiter,
						array(
							'span' => array( 'class' => array() ),
							'i'    => array( 'class' => array() ),
						)
					) . '</span>';
					$depth++;
				}
				if ( is_product_category() ) {
					$ancestors = get_ancestors( $current_term->term_id, 'product_cat' );
					$ancestors = array_reverse( $ancestors );
					foreach ( $ancestors as $ancestor ) {
						$ancestor = get_term( $ancestor, 'product_cat' );
						if ( ! is_wp_error( $ancestor ) && $ancestor ) {
							echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_term_link( $ancestor ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $ancestor->name ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . wp_kses(
								$delimiter,
								array(
									'span' => array( 'class' => array() ),
									'i'    => array( 'class' => array() ),
								)
							) . '</span>';
							$depth++;
						}
					}
				}
				echo wp_kses_post( $before . '<a itemprop="item" href="' . esc_url( get_term_link( $current_term->term_id ) ) . '"><span itemprop="name">' . esc_html( $current_term->name ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after );
			} elseif ( travel_muni_is_woocommerce_activated() && is_shop() ) { // Shop Archive page
				$depth = 2;
				if ( get_option( 'page_on_front' ) == wc_get_page_id( 'shop' ) ) {
					return;
				}
				$_name    = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
				$shop_url = ( wc_get_page_id( 'shop' ) && wc_get_page_id( 'shop' ) > 0 ) ? get_the_permalink( wc_get_page_id( 'shop' ) ) : home_url( '/shop' );
				if ( ! $_name ) {
					$product_post_type = get_post_type_object( 'product' );
					$_name             = $product_post_type->labels->singular_name;
				}
				echo wp_kses_post( $before . '<a itemprop="item" href="' . esc_url( $shop_url ) . '"><span itemprop="name">' . esc_html( $_name ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after );
			} elseif ( travel_muni_is_wpte_activated() && is_tax( array( 'activities', 'destination', 'trip_types' ) ) ) { // Trip Taxonomy pages
				$current_term = $GLOBALS['wp_query']->get_queried_object();
				$tax          = array(
					'activities'  => 'templates/template-activities.php',
					'destination' => 'templates/template-destination.php',
					'trip_types'  => 'templates/template-trip_types.php',
				);

				foreach ( $tax as $k => $v ) {
					if ( is_tax( $k ) ) {
						$p_id = travel_muni_get_page_id_by_template( $v );
						if ( $p_id ) {
							echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_permalink( $p_id[0] ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title( $p_id[0] ) ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . wp_kses(
								$delimiter,
								array(
									'span' => array( 'class' => array() ),
									'i'    => array( 'class' => array() ),
								)
							) . '</span>';
						} else {
							$post_type = get_post_type_object( 'trip' );
							if ( $post_type->has_archive == true ) { // For CPT Archive Link

								// Add support for a non-standard label of 'archive_title' (special use case).
								$label = ! empty( $post_type->labels->archive_title ) ? $post_type->labels->archive_title : $post_type->labels->name;
								printf( '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="%1$s"><span itemprop="name">%2$s</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />', esc_url( get_post_type_archive_link( get_post_type() ) ), esc_html( $label ) );
								echo '' . wp_kses(
									$delimiter,
									array(
										'span' => array( 'class' => array() ),
										'i'    => array( 'class' => array() ),
									)
								) . '</span>';
							}
						}

						$depth = 3;
						// For trip taxonomy hierarchy
						$ancestors = get_ancestors( $current_term->term_id, $k );
						$ancestors = array_reverse( $ancestors );
						foreach ( $ancestors as $ancestor ) {
							$ancestor = get_term( $ancestor, $k );
							if ( ! is_wp_error( $ancestor ) && $ancestor ) {
								echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_term_link( $ancestor ) ) . '"><span itemprop="name">' . esc_html( $ancestor->name ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . wp_kses(
									$delimiter,
									array(
										'span' => array( 'class' => array() ),
										'i'    => array( 'class' => array() ),
									)
								) . '</span>';
								$depth++;
							}
						}
					}
				}

				echo wp_kses_post( $before . '<a itemprop="item" href="' . esc_url( get_term_link( $current_term->term_id ) ) . '"><span itemprop="name">' . esc_html( $current_term->name ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after );
			} elseif ( is_tag() ) {
				$depth          = 2;
				$queried_object = get_queried_object();
				echo wp_kses_post( $before . '<a itemprop="item" href="' . esc_url( get_term_link( $queried_object->term_id ) ) . '"><span itemprop="name">' . esc_html( single_tag_title( '', false ) ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after );
			} elseif ( is_author() ) {
				global $author;
				$depth    = 2;
				$userdata = get_userdata( $author );
				echo wp_kses_post( $before . '<a itemprop="item" href="' . esc_url( get_author_posts_url( $author ) ) . '"><span itemprop="name">' . esc_html( $userdata->display_name ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after );
			} elseif ( is_search() ) {
				$depth       = 2;
				$request_uri = isset( $_SERVER['REQUEST_URI'] ) ? esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '#';
				echo wp_kses_post( $before . '<a itemprop="item" href="' . esc_url( $request_uri ) . '"><span itemprop="name">' . sprintf( __( 'Search Results for "%s"', 'travel-muni' ), esc_html( get_search_query() ) ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after );
			} elseif ( is_day() ) {
				$depth = 2;
				echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'travel-muni' ) ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_time( __( 'Y', 'travel-muni' ) ) ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . wp_kses(
					$delimiter,
					array(
						'span' => array( 'class' => array() ),
						'i'    => array( 'class' => array() ),
					)
				) . '</span>';
				$depth++;
				echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_month_link( get_the_time( __( 'Y', 'travel-muni' ) ), get_the_time( __( 'm', 'travel-muni' ) ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_time( __( 'F', 'travel-muni' ) ) ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . wp_kses(
					$delimiter,
					array(
						'span' => array( 'class' => array() ),
						'i'    => array( 'class' => array() ),
					)
				) . '</span>';
				$depth++;
				echo wp_kses_post( $before . '<a itemprop="item" href="' . esc_url( get_day_link( get_the_time( __( 'Y', 'travel-muni' ) ), get_the_time( __( 'm', 'travel-muni' ) ), get_the_time( __( 'd', 'travel-muni' ) ) ) ) . '"><span itemprop="name">' . esc_html( get_the_time( __( 'd', 'travel-muni' ) ) ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after );
			} elseif ( is_month() ) {
				$depth = 2;
				echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'travel-muni' ) ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_time( __( 'Y', 'travel-muni' ) ) ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . wp_kses(
					$delimiter,
					array(
						'span' => array( 'class' => array() ),
						'i'    => array( 'class' => array() ),
					)
				) . '</span>';
				$depth++;
				echo wp_kses_post( $before . '<a itemprop="item" href="' . esc_url( get_month_link( get_the_time( __( 'Y', 'travel-muni' ) ), get_the_time( __( 'm', 'travel-muni' ) ) ) ) . '"><span itemprop="name">' . esc_html( get_the_time( __( 'F', 'travel-muni' ) ) ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after );
			} elseif ( is_year() ) {
				$depth = 2;
				echo wp_kses_post( $before . '<a itemprop="item" href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'travel-muni' ) ) ) ) . '"><span itemprop="name">' . esc_html( get_the_time( __( 'Y', 'travel-muni' ) ) ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after );
			} elseif ( is_single() && ! is_attachment() ) {
				$depth = 2;
				if ( travel_muni_is_woocommerce_activated() && 'product' === get_post_type() ) { // For Woocommerce single product
					if ( wc_get_page_id( 'shop' ) ) { // Displaying Shop link in woocommerce archive page
						$_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
						if ( ! $_name ) {
							$product_post_type = get_post_type_object( 'product' );
							$_name             = $product_post_type->labels->singular_name;
						}
						echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $_name ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . wp_kses(
							$delimiter,
							array(
								'span' => array( 'class' => array() ),
								'i'    => array( 'class' => array() ),
							)
						) . '</span>';
						$depth++;
					}
					if ( $terms = wc_get_product_terms(
						$post->ID,
						'product_cat',
						array(
							'orderby' => 'parent',
							'order'   => 'DESC',
						)
					) ) {
						$main_term = apply_filters( 'woocommerce_breadcrumb_main_term', $terms[0], $terms );
						$ancestors = get_ancestors( $main_term->term_id, 'product_cat' );
						$ancestors = array_reverse( $ancestors );
						foreach ( $ancestors as $ancestor ) {
							$ancestor = get_term( $ancestor, 'product_cat' );
							if ( ! is_wp_error( $ancestor ) && $ancestor ) {
								echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_term_link( $ancestor ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $ancestor->name ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . wp_kses(
									$delimiter,
									array(
										'span' => array( 'class' => array() ),
										'i'    => array( 'class' => array() ),
									)
								) . '</span>';
								$depth++;
							}
						}
						echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_term_link( $main_term ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $main_term->name ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . wp_kses(
							$delimiter,
							array(
								'span' => array( 'class' => array() ),
								'i'    => array( 'class' => array() ),
							)
						) . '</span>';
						$depth++;
					}
					echo wp_kses_post( $before . '<a href="' . esc_url( get_the_permalink() ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after );
				} elseif ( travel_muni_is_wpte_activated() && get_post_type() === 'trip' ) { // For Single Trip
					$depth                   = 2;
					$breadcrumb_selected_tax = get_theme_mod( 'related_trip_taxonomy', 'destination' );

					// Check for page templage
					$tax_template = travel_muni_get_page_id_by_template( 'templates/template-' . $breadcrumb_selected_tax . '.php' );

					if ( $tax_template ) {
						echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_permalink( $tax_template[0] ) ) . '"><span itemprop="name">' . esc_html( get_the_title( $tax_template[0] ) ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . wp_kses(
							$delimiter,
							array(
								'span' => array( 'class' => array() ),
								'i'    => array( 'class' => array() ),
							)
						) . '</span>';
					} else {
						$post_type = get_post_type_object( 'trip' );
						if ( $post_type->has_archive == true ) { // For CPT Archive Link

							// Add support for a non-standard label of 'archive_title' (special use case).
							$label = ! empty( $post_type->labels->archive_title ) ? $post_type->labels->archive_title : $post_type->labels->name;
							printf( '<itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="%1$s"><span itemprop="name">%2$s</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />', esc_url( get_post_type_archive_link( get_post_type() ) ), esc_html( $label ) );
							echo wp_kses(
								$delimiter,
								array(
									'span' => array( 'class' => array() ),
									'i'    => array( 'class' => array() ),
								)
							);
						}
					}
					// Check for destination taxonomy hierarchy
					$depth = 3;
					$terms = wp_get_post_terms(
						$post->ID,
						$breadcrumb_selected_tax,
						array(
							'orderby' => 'parent',
							'order'   => 'DESC',
						)
					);
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) { // Parents terms
						$ancestors = get_ancestors( $terms[0]->term_id, $breadcrumb_selected_tax );
						$ancestors = array_reverse( $ancestors );
						foreach ( $ancestors as $ancestor ) {
							$ancestor = get_term( $ancestor, $breadcrumb_selected_tax );
							if ( ! is_wp_error( $ancestor ) && $ancestor ) {
								echo wp_kses_post( '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_term_link( $ancestor ) ) . '"><span itemprop="name">' . esc_html( $ancestor->name ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $delimiter . '</span>' );
								$depth++;
							}
						}
						// Last child term
						echo wp_kses_post( '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_term_link( $terms[0] ) ) . '"><span itemprop="name">' . esc_html( $terms[0]->name ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $delimiter . '</span>' );
						$depth++;
					}

					echo wp_kses_post( $before . '<a href="' . esc_url( get_the_permalink() ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after );
				} elseif ( get_post_type() != 'post' ) {
					$post_type = get_post_type_object( get_post_type() );
					if ( $post_type->has_archive == true ) { // For CPT Archive Link
						// Add support for a non-standard label of 'archive_title' (special use case).
						$label = ! empty( $post_type->labels->archive_title ) ? $post_type->labels->archive_title : $post_type->labels->name;
						echo wp_kses_post( '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_post_type_archive_link( get_post_type() ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $label ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $delimiter . '</span>' );
						$depth++;
					}
					echo wp_kses_post( $before . '<a href="' . esc_url( get_the_permalink() ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after );
				} else { // For Post
					$cat_object       = get_the_category();
					$potential_parent = 0;

					if ( $show_front === 'page' && $post_page ) { // If static blog post page is set
						$p = get_post( $post_page );
						echo wp_kses_post( '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_permalink( $post_page ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $p->post_title ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $delimiter . '</span>' );
						$depth++;
					}

					if ( $cat_object ) { // Getting category hierarchy if any
						// Now try to find the deepest term of those that we know of
						$use_term = key( $cat_object );
						foreach ( $cat_object as $key => $object ) {
							// Can't use the next($cat_object) trick since order is unknown
							if ( $object->parent > 0 && ( $potential_parent === 0 || $object->parent === $potential_parent ) ) {
								$use_term         = $key;
								$potential_parent = $object->term_id;
							}
						}
						$cat  = $cat_object[ $use_term ];
						$cats = get_category_parents( $cat, false, ',' );
						$cats = explode( ',', $cats );
						foreach ( $cats as $cat ) {
							$cat_obj = get_term_by( 'name', $cat, 'category' );
							if ( is_object( $cat_obj ) ) {
								$term_url  = get_term_link( $cat_obj->term_id );
								$term_name = $cat_obj->name;
								echo wp_kses_post( '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="' . esc_url( $term_url ) . '"><span itemprop="name">' . esc_html( $term_name ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $delimiter . '</span>' );
								$depth++;
							}
						}
					}
					echo wp_kses_post( $before . '<a itemprop="item" href="' . esc_url( get_the_permalink() ) . '"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after );
				}
			} elseif ( ! is_single() && ! is_page() && get_post_type() != 'post' && ! is_404() ) { // For Custom Post Archive
				$depth     = 2;
				$post_type = get_post_type_object( get_post_type() );
				if ( get_query_var( 'paged' ) ) {
					echo wp_kses_post( '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_post_type_archive_link( $post_type->name ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $post_type->label ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $delimiter . '/</span>' );
					echo wp_kses_post( $before . sprintf( __( 'Page %s', 'travel-muni' ), get_query_var( 'paged' ) ) . $after ); // @todo need to check this
				} else {
					echo wp_kses_post( $before . '<a itemprop="item" href="' . esc_url( get_post_type_archive_link( $post_type->name ) ) . '"><span itemprop="name">' . esc_html( $post_type->label ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after );
				}
			} elseif ( is_attachment() ) {
				$depth = 2;
				echo wp_kses_post( $before . '<a itemprop="item" href="' . esc_url( get_the_permalink() ) . '"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after );
			} elseif ( is_page() && ! $post->post_parent ) {
				$depth = 2;
				echo wp_kses_post( $before . '<a itemprop="item" href="' . esc_url( get_the_permalink() ) . '"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after );
			} elseif ( is_page() && $post->post_parent ) {
				$depth       = 2;
				$parent_id   = $post->post_parent;
				$breadcrumbs = array();
				while ( $parent_id ) {
					$current_page  = get_post( $parent_id );
					$breadcrumbs[] = $current_page->ID;
					$parent_id     = $current_page->post_parent;
				}
				$breadcrumbs = array_reverse( $breadcrumbs );
				$count       = count( $breadcrumbs );
				for ( $i = 0; $i < $count; $i++ ) {
					echo wp_kses_post( '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_permalink( $breadcrumbs[ $i ] ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title( $breadcrumbs[ $i ] ) ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $delimiter . '</span>' );
					$depth++;
				}
				echo wp_kses_post( $before . '<a href="' . get_permalink() . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" /></span>' . $after );
			} elseif ( is_404() ) {
				$depth = 2;
				echo wp_kses_post( $before . '<a itemprop="item" href="' . esc_url( home_url() ) . '"><span itemprop="name">' . esc_html__( '404 Error - Page Not Found', 'travel-muni' ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after );
			}

			if ( get_query_var( 'paged' ) ) {
				printf( esc_html__( ' (Page %s)', 'travel-muni' ), (int) get_query_var( 'paged' ) );
			}

			echo '</div><!-- .crumbs -->';
		}
	}
endif;

if ( ! function_exists( 'travel_muni_theme_comment' ) ) :
	/**
	 * Callback function for Comment List *
	 *
	 * @link https://codex.wordpress.org/Function_Reference/wp_list_comments
	 */
	function travel_muni_theme_comment( $comment, $args, $depth ) {
		if ( 'div' == $args['style'] ) {
			$tag       = 'div';
			$add_below = 'comment';
		} else {
			$tag       = 'li';
			$add_below = 'div-comment';
		}
		?>
		<<?php echo esc_html( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">

			<?php if ( 'div' != $args['style'] ) : ?>
				<article id="div-comment-<?php comment_ID(); ?>" class="comment-body" itemscope itemtype="https://schema.org/UserComments">
				<?php endif; ?>

				<footer class="comment-meta">
					<div class="comment-author vcard">
						<?php
						if ( $args['avatar_size'] != 0 ) {
							echo get_avatar( $comment, $args['avatar_size'] );}
						?>
					</div><!-- .comment-author vcard -->
				</footer>

				<div class="text-holder">
					<div class="top">
						<div class="left">
							<?php if ( $comment->comment_approved == '0' ) : ?>
								<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'travel-muni' ); ?></em>
								<br />
							<?php endif; ?>
							<?php echo wp_kses_post( sprintf( __( '<b class="fn" itemprop="creator" itemscope itemtype="https://schema.org/Person">%s</b> <span class="says">says:</span>', 'travel-muni' ), get_comment_author_link() ) ); ?>
							<div class="comment-metadata commentmetadata">
								<a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>">
									<time itemprop="commentTime" datetime="<?php echo esc_attr( get_gmt_from_date( get_comment_date() . get_comment_time(), 'Y-m-d H:i:s' ) ); ?>"><?php echo esc_html( sprintf( __( '%1$s at %2$s', 'travel-muni' ), get_comment_date(), get_comment_time() ) ); ?></time>
								</a>
							</div>
						</div>
					</div>
					<div class="comment-content" itemprop="commentText"><?php comment_text(); ?></div>
					<div class="reply">
						<?php
						comment_reply_link(
							array_merge(
								$args,
								array(
									'add_below' => $add_below,
									'depth'     => $depth,
									'max_depth' => $args['max_depth'],
								)
							)
						);
						?>
					</div>
				</div><!-- .text-holder -->

				<?php if ( 'div' != $args['style'] ) : ?>
				</article><!-- .comment-body -->
					<?php
			endif;
	}
endif;

if ( ! function_exists( 'travel_muni_sidebar' ) ) :
	/**
	 * Return sidebar layouts for pages/posts
	 */
	function travel_muni_sidebar( $class = false ) {
		global $post;
		$return = $return = $class ? 'full-width' : false; // Fullwidth
		$layout = get_theme_mod( 'layout_style', 'right-sidebar' ); // Default Layout Style for Styling Settings

		if ( ( is_front_page() && is_home() ) || is_home() ) { // blog/home page

			if ( $layout == 'no-sidebar' ) {
				$return = $class ? 'full-width' : false; // Fullwidth
			} elseif ( is_active_sidebar( 'sidebar' ) ) {
				if ( $class ) {
					if ( $layout == 'right-sidebar' ) {
						$return = 'rightsidebar';
					}
					if ( $layout == 'left-sidebar' ) {
						$return = 'leftsidebar';
					}
				} else {
					$return = 'sidebar'; // With Sidebar
				}
			} else {
				$return = $class ? 'full-width' : false; // Fullwidth
			}
		}

		if ( is_archive() ) {

			if ( $layout == 'no-sidebar' ) {
				$return = $class ? 'full-width' : false; // Fullwidth
			} elseif ( is_active_sidebar( 'sidebar' ) ) {
				if ( $class ) {
					if ( $layout == 'right-sidebar' ) {
						$return = 'rightsidebar'; // With Sidebar
					}
					if ( $layout == 'left-sidebar' ) {
						$return = 'leftsidebar'; // With Sidebar
					}
				} else {
					$return = 'sidebar'; // With Sidebar
				}
			} else {
				$return = $class ? 'full-width' : false; // Fullwidth
			}
		}

		if ( is_singular() ) {
			$page_layout = get_theme_mod( 'page_sidebar_layout', 'right-sidebar' ); // Global Layout/Position for Pages.
			$post_layout = get_theme_mod( 'post_sidebar_layout', 'right-sidebar' ); // Global Layout/Position for Posts.

			/**
			 * Individual post/page layout
			 */
			if ( get_post_meta( $post->ID, '_travel_muni_sidebar_layout', true ) ) {
				$sidebar_layout = get_post_meta( $post->ID, '_travel_muni_sidebar_layout', true );
			} else {
				$sidebar_layout = 'default-sidebar';
			}

			if ( is_page() ) {
				if ( is_active_sidebar( 'sidebar' ) ) {
					if ( $sidebar_layout == 'no-sidebar' || ( $sidebar_layout == 'default-sidebar' && $page_layout == 'no-sidebar' ) ) {
						$return = $class ? 'full-width' : false;
					} elseif ( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) {
						if ( $class ) {
							if ( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) {
								$return = 'rightsidebar';
							}
						} else {
							$return = 'sidebar';
						}
					} elseif ( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) {
						if ( $class ) {
							if ( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) {
								$return = 'leftsidebar';
							}
						} else {
							$return = 'sidebar';
						}
					} elseif ( $sidebar_layout == 'centered' || ( $sidebar_layout == 'default-sidebar' && $page_layout == 'centered' ) ) {
						$return = $class ? 'full-width centered nosidebar' : false;
					}
				} else {
					$return = $class ? 'full-width' : false; // Fullwidth
				}
			}

			if ( is_single() ) {
				if ( 'product' === get_post_type() ) { // For Product Post Type
					if ( $post_layout == 'no-sidebar' || $post_layout == 'centered' ) {
						$return = $class ? 'full-width' : false; // Fullwidth
					} elseif ( is_active_sidebar( 'shop-sidebar' ) ) {
						if ( $class ) {
							if ( $post_layout == 'right-sidebar' ) {
								$return = 'rightsidebar'; // With Sidebar
							}
							if ( $post_layout == 'left-sidebar' ) {
								$return = 'leftsidebar';
							}
						}
					} else {
						$return = $class ? 'full-width' : false; // Fullwidth
					}
				} elseif ( 'post' === get_post_type() ) { // For default post type
					if ( $sidebar_layout == 'no-sidebar' || ( $sidebar_layout == 'default-sidebar' && $post_layout == 'no-sidebar' ) ) {
						$return = $class ? 'full-width' : false;
					} elseif ( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) {
						if ( $class ) {
							if ( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) {
								$return = 'rightsidebar';
							}
						} else {
							$return = 'sidebar';
						}
					} elseif ( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) {
						if ( $class ) {
							if ( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) {
								$return = 'leftsidebar';
							}
						} else {
							$return = 'sidebar';
						}
					} elseif ( $sidebar_layout == 'centered' || ( $sidebar_layout == 'default-sidebar' && $post_layout == 'centered' ) ) {
						$return = $class ? 'full-width centered nosidebar' : false;
					} else {
						$return = $class ? 'full-width' : false; // Fullwidth
					}
				} else { // Custom Post Type
					if ( $post_layout == 'no-sidebar' ) {
						$return = $class ? 'full-width' : false;
					} elseif ( $post_layout == 'centered' ) {
						$return = $class ? 'full-width centered nosidebar' : false;
					} elseif ( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) {
						if ( $class ) {
							if ( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) {
								$return = 'rightsidebar';
							}
						} else {
							$return = 'sidebar';
						}
					} elseif ( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) {
						if ( $class ) {
							if ( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) {
								$return = 'leftsidebar';
							}
						} else {
							$return = 'sidebar';
						}
					} else {
						$return = $class ? 'full-width' : false; // Fullwidth
					}
				}
			}
		}

		return $return;
	}
endif;

if ( ! function_exists( 'travel_muni_get_page_id_by_template' ) ) :
	/**
	 * Returns Page ID by Page Template
	 */
	function travel_muni_get_page_id_by_template( $template_name ) {
		$args         = array(
			'meta_key'   => '_wp_page_template',
			'meta_value' => $template_name,
		);
		return $pages = get_pages( $args );
	}
endif;

if ( ! function_exists( 'travel_muni_get_home_sections' ) ) :
	/**
	 * Returns Home Sections
	 */
	function travel_muni_get_home_sections() {
		$sections      = array();
		$ed_banner     = get_theme_mod( 'ed_banner_section', 'static_banner' );
		$ed_search_bar = get_theme_mod( 'ed_search_bar', true );
		$ed_blog       = get_theme_mod( 'ed_blog', true );

		if ( $ed_banner == 'static_banner' ) {
			array_push( $sections, 'banner' );
		}

		if ( $ed_search_bar === true && travel_muni_is_wte_advanced_search_active() ) {
			array_push( $sections, 'search' );
		}

		// Comes from travel booking toolkit plugin.
		$ed_intro          = get_theme_mod( 'ed_intro', true );
		$ed_activities     = get_theme_mod( 'ed_activities', true );
		$ed_cta            = get_theme_mod( 'ed_cta', true );
		$ed_destination    = get_theme_mod( 'ed_destination', true );
		$ed_popular        = get_theme_mod( 'ed_popular', true );
		$ed_recommendation = get_theme_mod( 'ed_recommendation', true );
		$ed_associated     = get_theme_mod( 'ed_associated', true );
		$ed_special        = get_theme_mod( 'ed_special', true );
		$ed_testimonial    = get_theme_mod( 'ed_testimonial', true );

		// Sections from travel booking toolkit plugin
		if ( $ed_intro ) {
			array_push( $sections, 'intro' );
		}
		if ( $ed_destination ) {
			array_push( $sections, 'destination' );
		}
		if ( $ed_testimonial ) {
			array_push( $sections, 'testimonials' );
		}
		if ( $ed_popular ) {
			array_push( $sections, 'popular' );
		}
		if ( $ed_activities ) {
			array_push( $sections, 'activity' );
		}
		if ( $ed_special ) {
			array_push( $sections, 'special' );
		}
		if ( $ed_cta ) {
			array_push( $sections, 'cta' );
		}
		if ( is_active_sidebar( 'info' ) ) {
			array_push( $sections, 'info' );
		}
		if ( $ed_blog ) {
			array_push( $sections, 'blog' );
		}
		if ( $ed_recommendation ) {
			array_push( $sections, 'recommendation' );
		}
		if ( $ed_associated ) {
			array_push( $sections, 'associated' );
		}

		return apply_filters( 'travel_muni_home_sections', $sections );
	}
endif;

if ( ! function_exists( 'travel_muni_get_image_sizes' ) ) :
	/**
	 * Get information about available image sizes
	 */
	function travel_muni_get_image_sizes( $size = '' ) {
		global $_wp_additional_image_sizes;

		$sizes                        = array();
		$get_intermediate_image_sizes = get_intermediate_image_sizes();

		// Create the full array with sizes and crop info
		foreach ( $get_intermediate_image_sizes as $_size ) {
			if ( in_array( $_size, array( 'thumbnail', 'medium', 'medium_large', 'large' ) ) ) {
				$sizes[ $_size ]['width']  = get_option( $_size . '_size_w' );
				$sizes[ $_size ]['height'] = get_option( $_size . '_size_h' );
				$sizes[ $_size ]['crop']   = (bool) get_option( $_size . '_crop' );
			} elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
				$sizes[ $_size ] = array(
					'width'  => $_wp_additional_image_sizes[ $_size ]['width'],
					'height' => $_wp_additional_image_sizes[ $_size ]['height'],
					'crop'   => $_wp_additional_image_sizes[ $_size ]['crop'],
				);
			}
		}
		// Get only 1 size if found
		if ( $size ) {
			if ( isset( $sizes[ $size ] ) ) {
				return $sizes[ $size ];
			} else {
				return false;
			}
		}
		return $sizes;
	}
endif;

if ( ! function_exists( 'travel_muni_get_fallback_svg' ) ) :
	/**
	 * Get Fallback SVG
	 */
	function travel_muni_get_fallback_svg( $post_thumbnail ) {
		if ( ! $post_thumbnail ) {
			return;
		}

		$image_size = travel_muni_get_image_sizes( $post_thumbnail );

		if ( $image_size ) { ?>
			<div class="svg-holder">
				<svg class="fallback-svg" viewBox="0 0 <?php echo esc_attr( $image_size['width'] ); ?> <?php echo esc_attr( $image_size['height'] ); ?>" preserveAspectRatio="none">
					<rect width="<?php echo esc_attr( $image_size['width'] ); ?>" height="<?php echo esc_attr( $image_size['height'] ); ?>" style="fill:#f2f2f2;"></rect>
				</svg>
			</div>
		<?php
		}
	}
endif;

if ( ! function_exists( 'travel_muni_get_term_top_most_parent' ) ) :
	/**
	 * Reading Time Calculate Function.
	 * Determine the top-most parent of a term.
	 */
	function travel_muni_get_term_top_most_parent( $term, $taxonomy ) {
		// Start from the current term.
		$parent = get_term( $term, $taxonomy );
		// Climb up the hierarchy until we reach a term with parent = '0'.
		while ( $parent->parent != '0' ) {
			$term_id = $parent->parent;
			$parent  = get_term( $term_id, $taxonomy );
		}
		return $parent;
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Fire the wp_body_open action.
	 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
	 */
	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 */
		do_action( 'wp_body_open' );
	}
endif;

if ( ! function_exists( 'travel_muni_escape_text_tags' ) ) :
	/**
	 * Remove new line tags from string
	 *
	 * @param $text
	 * @return string
	 */
	function travel_muni_escape_text_tags( $text ) {
		return (string) str_replace( array( "\r", "\n" ), '', strip_tags( $text ) );
	}
endif;

/**
 * Is Travel Muni Header Five is active or not
 */
function travel_muni_is_header_five_activated() {
	return ( get_theme_mod( 'header_layout', 'five' ) === 'five' );
}

/**
 * Query WooCommerce activation
 */
function travel_muni_is_woocommerce_activated() {
	return class_exists( 'woocommerce' );
}

/**
 * Check if Polylang is active
 */
function travel_muni_is_polylang_active() {
	return class_exists( 'Polylang' );
}

/**
 * Check if WPML is active
 */
function travel_muni_is_wpml_active() {
	return class_exists( 'SitePress' );
}

/**
 * Check if WP Travel Engine Plugin is installed
 */
function travel_muni_is_wpte_activated() {
	return class_exists( 'Wp_Travel_Engine' );
}

/**
 * Check if Toolkit plugin is installed
 */
function travel_muni_is_tbt_activated() {
	return class_exists( 'Travel_Booking_Toolkit' );
}

/**
 * Check if WTE Advance Search is active
 */
function travel_muni_is_wte_advanced_search_active() {
	return class_exists( 'Wte_Advanced_Search' );
}

/**
 * Check if WP Travel Engine - Trip Reviews Plugin is installed
 */
function travel_muni_is_wpte_tr_activated() {
	return class_exists( 'Wte_Trip_Review_Init' );
}

/**
 * Check if WP Travel Engine - Group Discount Plugin is installed
 */
function travel_muni_is_wpte_gd_activated() {
	return class_exists( 'Wp_Travel_Engine_Group_Discount' );
}

/**
 * Check if WP Travel Engine - Wte_Currency_Converter is installed
 */
function travel_muni_is_currency_converter_activated() {
	return class_exists( 'Wte_Currency_Converter' );
}

/**
 * Check if WP Travel Engine - Wte_Itinerary_Downloader is installed
 */
function travel_muni_is_itinerary_downloader_activated() {
	return class_exists( 'Wte_Itinerary_Downloader_Public' );
}

/**
 * Query Jetpack activation
 */
function travel_muni_is_jetpack_activated( $gallery = false ) {
	if ( $gallery ) {
		return ( class_exists( 'jetpack' ) && Jetpack::is_module_active( 'tiled-gallery' ) );
	} else {
		return class_exists( 'jetpack' );
	}
}

/**
 * WP backend function to check whether its checkout page or not
 */
function travel_muni_is_admin_checkout_page() {
	global $post;
	if ( $post ) {
		$content = $post->post_content;
		return has_shortcode( $content, 'wp_travel_engine_checkout' );
	} else {
		return false;
	}
}

if (!function_exists('travel_muni_is_elementor_activated')):
    /**
     * Check if Elementor is activated or not
     */
    function travel_muni_is_elementor_activated() {
        return class_exists('\Elementor\Plugin') ? true : false;
    }
endif;

if (!function_exists('travel_muni_is_elementor_activated_post')):
/**
 * Checks if elementor has override that particular page/post or not
 */
function travel_muni_is_elementor_activated_post() {
    if (travel_muni_is_elementor_activated() && is_singular()) {
        global $post;
        $post_id = $post->ID;
        return \Elementor\Plugin::$instance->documents->get($post_id)->is_built_with_elementor($post_id) ? true : false;
    }
    else {
        return false;
    }
}
endif;