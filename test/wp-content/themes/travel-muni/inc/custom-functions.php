<?php
/**
 * Travel Muni Custom functions and definitions
 *
 * @package Travel_Muni
 */

/**
 * Removes the Progress Checkout Workflow from the content
 */
add_filter( 'wp_travel_engine_show_checkout_header_steps', '__return_false' );

if ( ! function_exists( 'travel_muni_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function travel_muni_setup() {
		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Travel Muni, use a find and replace
		* to change 'travel-muni' to the name of your theme in all the template files.
		*/
		load_theme_textdomain( 'travel-muni', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
		add_theme_support( 'title-tag' );

		/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		$menus = array(
			'primary' => esc_html__( 'Primary', 'travel-muni' ),
			'footer'  => esc_html__( 'Footer', 'travel-muni' ),
		);

		if ( travel_muni_is_polylang_active() ) {
			$menus['language'] = esc_html__( 'Language', 'travel-muni' );
		}

		register_nav_menus( $menus );

		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'travel_muni_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'header-text' => array( 'site-title', 'site-description' ),
			)
		);

		/**
		 * Add support for custom header.
		 */
		add_theme_support(
			'custom-header',
			apply_filters(
				'travel_muni_custom_header_args',
				array(
					'default-image' => get_template_directory_uri() . '/images/banner-img.jpg',
					'video'         => true,
					'width'         => 1920,
					'height'        => 760,
					'header-text'   => false,
				)
			)
		);

		// Register default headers.
		register_default_headers(
			array(
				'default-banner' => array(
					'url'           => '%s/images/banner-img.jpg',
					'thumbnail_url' => '%s/images/banner-img.jpg',
					'description'   => esc_html_x( 'Default Banner', 'header image description', 'travel-muni' ),
				),

			)
		);

		/**
		 * Add Custom Images sizes.
		 */
		add_image_size( 'travel-muni-header-image-3', 960, 650, true );

		add_image_size( 'travel-muni-header-bg-img', 1920, 350 );
		add_image_size( 'travel-muni-schema', 600, 60 );

		add_image_size( 'travel-muni-middle-square-thumb', 600, 600, true );
		add_image_size( 'travel-muni-trip-thumb-size', 376, 212, true );
		add_image_size( 'travel-muni-activity-thumb-size', 640, 360, true );
		add_image_size( 'travel-muni-full-blog', 610, 343, true );
		add_image_size( 'travel-muni-404', 800, 534, true );
		add_image_size( 'travel-muni-wte-tax-thumb', 594, 400, true );

		add_image_size( 'travel-muni-single-trip-banner', 1920, 500, true );

		/** Starter Content */
		$starter_content = array(
			// Specify the core-defined pages to create and add custom thumbnails to some of them.
			'posts'     => array(
				'home',
				'blog',
			),

			// Default to a static front page and assign the front and posts pages.
			'options'   => array(
				'show_on_front'  => 'page',
				'page_on_front'  => '{{home}}',
				'page_for_posts' => '{{blog}}',
			),

			// Set up nav menus for each of the two areas registered in the theme.
			'nav_menus' => array(
				// Assign a menu to the "top" location.
				'primary' => array(
					'name'  => __( 'Primary', 'travel-muni' ),
					'items' => array(
						'page_home',
						'page_blog',
					),
				),
			),
		);

		$starter_content = apply_filters( 'travel_muni_starter_content', $starter_content );

		add_theme_support( 'starter-content', $starter_content );

		// Add theme support for Responsive Videos.
		add_theme_support( 'jetpack-responsive-videos' );

		// Add theme support for WooCommerce.
		add_theme_support( 'woocommerce' );

		// Add excerpt support for pages
		add_post_type_support( 'page', 'excerpt' );
	}
endif;
add_action( 'after_setup_theme', 'travel_muni_setup' );

if ( ! function_exists( 'travel_muni_content_width' ) ) :
	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	function travel_muni_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'travel_muni_content_width', 740 );
	}
endif;
add_action( 'after_setup_theme', 'travel_muni_content_width', 0 );

if ( ! function_exists( 'travel_muni_template_redirect_content_width' ) ) :
	/**
	 * Adjust content_width value according to template.
	 *
	 * @return void
	 */
	function travel_muni_template_redirect_content_width() {
		$sidebar = travel_muni_sidebar();
		if ( $sidebar ) {
			$GLOBALS['content_width'] = 740;
		} else {
			if ( is_singular() ) {
				if ( travel_muni_sidebar( true ) === 'full-width centered' ) {
					$GLOBALS['content_width'] = 740;
				} else {
					$GLOBALS['content_width'] = 1320;
				}
			} else {
				$GLOBALS['content_width'] = 1320;
			}
		}
	}
endif;
add_action( 'template_redirect', 'travel_muni_template_redirect_content_width' );

if ( ! function_exists( 'travel_muni_scripts' ) ) :
	/**
	 * Enqueue scripts and styles.
	 */
	function travel_muni_scripts() {
		// Use minified libraries if SCRIPT_DEBUG is false
		$build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
		$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
		wp_enqueue_script( 'all', get_template_directory_uri() . '/js' . $build . '/all' . $suffix . '.js', array( 'jquery' ), '5.6.3', true );
		wp_enqueue_script( 'v4-shims', get_template_directory_uri() . '/js' . $build . '/v4-shims' . $suffix . '.js', array( 'jquery', 'all' ), '5.6.3', true );

		wp_style_add_data( 'travel-muni', 'rtl', 'replace' );

		wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css' . $build . '/owl.carousel' . $suffix . '.css', array(), '2.3.4' );

		wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js' . $build . '/owl.carousel' . $suffix . '.js', array( 'jquery' ), '2.3.4', true );
		wp_enqueue_script( 'travel-muni-modal-accessibility', get_template_directory_uri() . '/js' . $build . '/modal-accessibility' . $suffix . '.js', array( 'jquery' ), TRAVEL_MUNI_THEME_VERSION, true );
		wp_enqueue_script( 'travel-muni', get_template_directory_uri() . '/js' . $build . '/custom' . $suffix . '.js', array( 'jquery' ), TRAVEL_MUNI_THEME_VERSION, true );

		$array = array(
			'rtl'      => is_rtl(),
			'singular' => is_singular(),
			'h_layout' => get_theme_mod( 'header_layout', 'five' ),
		);

		wp_localize_script( 'travel-muni', 'travel_muni_data', $array );

		if ( get_theme_mod( 'ed_localgoogle_fonts', false ) && ! is_customize_preview() && ! is_admin() && get_theme_mod( 'ed_preload_local_fonts', false ) ) {
	        travel_muni_preload_local_fonts( travel_muni_fonts_url() );
	    }

		wp_enqueue_style( 'travel-muni-google-fonts', travel_muni_fonts_url(), array(), TRAVEL_MUNI_THEME_VERSION );

		wp_enqueue_style( 'travel-muni', get_template_directory_uri() . '/css' . $build . '/style' . $suffix . '.css', array(), TRAVEL_MUNI_THEME_VERSION );

		if ( is_tax( array( 'activities', 'destination', 'trip_types' ) ) ) {
			wp_enqueue_script( 'jquery-masonry' );
		}
		if ( travel_muni_is_jetpack_activated( true ) ) {
			wp_enqueue_style( 'tiled-gallery', plugins_url() . '/jetpack/modules/tiled-gallery/tiled-gallery/tiled-gallery.css' ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
		}

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
endif;
add_action( 'wp_enqueue_scripts', 'travel_muni_scripts' );

if ( ! function_exists( 'travel_muni_admin_scripts' ) ) :
	/**
	 * Enqueue admin scripts and styles.
	 */
	function travel_muni_admin_scripts( $hook ) {
		$build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
		$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

		if ( in_array( $hook, array( 'post-new.php', 'post.php', 'user-new.php', 'user-edit.php', 'profile.php', 'widgets.php' ), true ) ) {
			wp_enqueue_style( 'travel-muni-admin', get_template_directory_uri() . '/inc/css' . $build . '/admin' . $suffix . '.css', '', TRAVEL_MUNI_THEME_VERSION );
		}
	}
endif;
add_action( 'admin_enqueue_scripts', 'travel_muni_admin_scripts' );

if ( ! function_exists( 'travel_muni_body_classes' ) ) :
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 * @return array
	 */
	function travel_muni_body_classes( $classes ) {
		$banner     = get_theme_mod( 'ed_banner_section', 'static_banner' );

		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		// Adds a class of custom-background-image to sites with a custom background image.
		if ( get_background_image() ) {
			$classes[] = 'custom-background-image';
		}
	    
	    // Adds a class of custom-background-color to sites with a custom background color.
	    if ( get_background_color() != 'ffffff' ) {
			$classes[] = 'custom-background-color';
		}

		if ( is_tax( array( 'destination', 'activities', 'trip_types' ) ) ) {
			$classes[] = 'archive-tax';
		}

		if ( 'no_banner' === $banner ) {
			$classes[] = 'no-banner';
		}

		if ( function_exists( 'wp_travel_engine_is_checkout_page' ) && wp_travel_engine_is_checkout_page() ) {
			$classes[] = 'tmp-checkout-page';
		}

		$classes[] = travel_muni_sidebar( true );

		return $classes;
	}
endif;
add_filter( 'body_class', 'travel_muni_body_classes' );

if ( ! function_exists( 'travel_muni_post_classes' ) ) :
	/**
	 * Add custom classes to the array of post classes.
	 */
	function travel_muni_post_classes( $classes, $class, $post_id ) {
		if ( is_search() ) {
			$classes[] = 'post';
		}

		if ( is_home() ) {
			$args = array(
				'posts_per_page'      => 1,
				'post__in'            => get_option( 'sticky_posts' ),
				'ignore_sticky_posts' => true,
			);

			$post_to_exclude = get_posts( $args );

			if ( $post_to_exclude[0]->ID !== $post_id ) {
				$classes[] = 'latest_post';
			}
		} else {
			$classes[] = 'latest_post';
		}

		return $classes;
	}
endif;
add_filter( 'post_class', 'travel_muni_post_classes', 10, 3 );

if ( ! function_exists( 'travel_muni_fonts_url' ) ) :
	/**
	 * Register custom fonts.
	 */
	function travel_muni_fonts_url() {
		$fonts_url = '';
		/*
		 * translators: If there are characters in your language that are not supported
		 * by Zilla Slab, translate this to 'off'. Do not translate into your own language.
		 */
		$zillaslab = _x( 'on', 'Zilla Lab font: on or off', 'travel-muni' );

		if ( 'off' !== $zillaslab ) {
			$font_families = array();

			if ( 'off' !== $zillaslab ) {
				$font_families[] = 'Zilla Slab:300,300i,400,400i,500,500i,600,600i,700,700i,';
			}

			$query_args = array(
				'family'  => urlencode( implode( '|', $font_families ) ),
				'display' => urlencode( 'fallback' ),
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}

		if( get_theme_mod( 'ed_localgoogle_fonts', false ) ) {
	        $fonts_url = travel_muni_get_webfont_url( add_query_arg( $query_args, 'https://fonts.googleapis.com/css' ) );
	    }
		
		return esc_url_raw( $fonts_url );
	}
endif;

if ( ! function_exists( 'travel_muni_pingback_header' ) ) :
	/**
	 * Add a pingback url auto-discovery header for singularly identifiable articles.
	 */
	function travel_muni_pingback_header() {
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
		}
	}
endif;
add_action( 'wp_head', 'travel_muni_pingback_header' );

if ( ! function_exists( 'travel_muni_change_comment_form_default_fields' ) ) :
	/**
	 * Change Comment form default fields i.e. author, email & url.
	 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
	 */
	function travel_muni_change_comment_form_default_fields( $fields ) {
		// get the current commenter if available
		$commenter = wp_get_current_commenter();

		// core functionality
		$req      = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$required = ( $req ? ' required' : '' );
		$author   = ( $req ? __( 'Name*', 'travel-muni' ) : __( 'Name', 'travel-muni' ) );
		$email    = ( $req ? __( 'Email*', 'travel-muni' ) : __( 'Email', 'travel-muni' ) );

		// Change just the author field
		$fields['author'] = '<p class="comment-form-author"><label for="author">' . esc_html__( 'Name', 'travel-muni' ) . '<span class="required">*</span></label><input id="author" name="author" placeholder="' . esc_attr( $author ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $required . ' /></p>';

		$fields['email'] = '<p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'travel-muni' ) . '<span class="required">*</span></label><input id="email" name="email" placeholder="' . esc_attr( $email ) . '" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . $required . ' /></p>';

		$fields['url'] = '<p class="comment-form-url"><label for="url">' . esc_html__( 'Website', 'travel-muni' ) . '</label><input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'travel-muni' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>';

		return $fields;
	}
endif;
add_filter( 'comment_form_default_fields', 'travel_muni_change_comment_form_default_fields' );

if ( ! function_exists( 'travel_muni_change_comment_form_defaults' ) ) :
	/**
	 * Change Comment Form defaults
	 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
	 */
	function travel_muni_change_comment_form_defaults( $defaults ) {
		$defaults['title_reply']   = __( 'Leave a reply &hellip;', 'travel-muni' );
		$defaults['comment_field'] = '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Comment', 'travel-muni' ) . '</label><textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Comment', 'travel-muni' ) . '" cols="45" rows="8" aria-required="true" required></textarea></p>';

		return $defaults;
	}
endif;
add_filter( 'comment_form_defaults', 'travel_muni_change_comment_form_defaults' );

if ( ! function_exists( 'travel_muni_excerpt_more' ) ) :
	/**
	 * Replaces "[...]" (appended to automatically generated excerpts) with ... *
	 */
	function travel_muni_excerpt_more( $more ) {
		return is_admin() ? $more : ' &hellip; ';
	}
endif;
add_filter( 'excerpt_more', 'travel_muni_excerpt_more' );

if ( ! function_exists( 'travel_muni_excerpt_length' ) ) :
	/**
	 * Changes the default 55 character in excerpt
	 */
	function travel_muni_excerpt_length( $length ) {
		$excerpt_length = get_theme_mod( 'excerpt_length', 55 );
		return is_admin() ? $length : absint( $excerpt_length );
	}
endif;
add_filter( 'excerpt_length', 'travel_muni_excerpt_length', 999 );

if ( ! function_exists( 'travel_muni_exclude_posts' ) ) :
	/**
	 * Exclude post with Category from blog and archive page.
	 */
	function travel_muni_exclude_posts( $query ) {
		if ( ! is_admin() && $query->is_main_query() && $query->is_home() ) {
			$args = array(
				'posts_per_page'      => 1,
				'post__in'            => get_option( 'sticky_posts' ),
				'ignore_sticky_posts' => true,
			);

			$post_to_exclude = get_posts( $args );
			$excludes        = array();
			foreach ( $post_to_exclude as $l ) {
				array_push( $excludes, $l->ID );
			}
			$query->set( 'post__not_in', $excludes );
		}
	}
endif;
add_filter( 'pre_get_posts', 'travel_muni_exclude_posts' );

if ( ! function_exists( 'travel_muni_get_comment_author_link' ) ) :
	/**
	 * Filter to modify comment author link
	 *
	 * @link https://developer.wordpress.org/reference/functions/get_comment_author_link/
	 */
	function travel_muni_get_comment_author_link( $return, $author, $comment_id ) {
		$comment = get_comment( $comment_id );
		$url     = get_comment_author_url( $comment );
		$author  = get_comment_author( $comment );

		if ( empty( $url ) || 'http://' == $url ) {
			$return = '<span itemprop="name">' . esc_html( $author ) . '</span>';
		} else {
			$return = '<span itemprop="name"><a href=' . esc_url( $url ) . ' rel="external nofollow noopener" class="url" itemprop="url">' . esc_html( $author ) . '</a></span>';
		}

		return $return;
	}
endif;
add_filter( 'get_comment_author_link', 'travel_muni_get_comment_author_link', 10, 3 );

if ( ! function_exists( 'travel_muni_inline_script_style' ) ) :
	/*
	This function helps to display image gallery in banner section of single trip
	*/
	function travel_muni_inline_script_style() {
		if ( is_singular( 'trip' ) ) {
			$custom_js = 'jQuery(document).ready(function($){';

			global $post;
			$wpte_trip_images 		   = get_post_meta( $post->ID, 'wpte_gallery_id', true );
			$wp_travel_engine_settings = get_option('wp_travel_engine_settings');
			$displayFeatImage          = isset($wp_travel_engine_settings['show_featured_image_in_gallery']) ? $wp_travel_engine_settings['show_featured_image_in_gallery'] : 'yes';
			$image_ID                  = get_post_thumbnail_id();

			if ( isset( $wpte_trip_images['enable'] ) && $wpte_trip_images['enable'] == '1' ) {
				if ( count( $wpte_trip_images ) > 1 ) {
					unset( $wpte_trip_images['enable'] );
					if( $displayFeatImage === 'yes') array_unshift($wpte_trip_images, $image_ID );
					$custom_js .= '$(".gallery-btn").on( "click", function(){ $.fancybox.open([';
					foreach ( $wpte_trip_images as $image ) {
						$url        = wp_get_attachment_image_url( $image, 'large' );
						$custom_js .= "{ src : '" . esc_url( $url ) . "', },";
					}
					$custom_js .= '],{
                        buttons: [
                            "zoom",
                            "slideShow",
                            "fullScreen",
                            "close"
                        ]
                    });
                });';
				}
			}

			$custom_js .= '});';

			wp_add_inline_script( 'travel-muni', $custom_js );
		}
	}
endif;

/**
 * Returns font weight and font style to use in dynamic styles.
 */
function travel_muni_get_css_variant( $font_variant ) {
	$v_array = array(
		'100'       => array(
			'weight' => '100',
			'style'  => 'normal',
		),
		'100italic' => array(
			'weight' => '100',
			'style'  => 'italic',
		),
		'200'       => array(
			'weight' => '200',
			'style'  => 'normal',
		),
		'200italic' => array(
			'weight' => '200',
			'style'  => 'italic',
		),
		'300'       => array(
			'weight' => '300',
			'style'  => 'normal',
		),
		'300italic' => array(
			'weight' => '300',
			'style'  => 'italic',
		),
		'regular'   => array(
			'weight' => '400',
			'style'  => 'normal',
		),
		'italic'    => array(
			'weight' => '400',
			'style'  => 'italic',
		),
		'500'       => array(
			'weight' => '500',
			'style'  => 'normal',
		),
		'500italic' => array(
			'weight' => '500',
			'style'  => 'italic',
		),
		'600'       => array(
			'weight' => '600',
			'style'  => 'normal',
		),
		'600italic' => array(
			'weight' => '600',
			'style'  => 'italic',
		),
		'700'       => array(
			'weight' => '700',
			'style'  => 'normal',
		),
		'700italic' => array(
			'weight' => '700',
			'style'  => 'italic',
		),
		'800'       => array(
			'weight' => '800',
			'style'  => 'normal',
		),
		'800italic' => array(
			'weight' => '800',
			'style'  => 'italic',
		),
		'900'       => array(
			'weight' => '900',
			'style'  => 'normal',
		),
		'900italic' => array(
			'weight' => '900',
			'style'  => 'italic',
		),
	);
	if ( array_key_exists( $font_variant, $v_array ) ) {
		return $v_array[ $font_variant ];
	}
}
add_action( 'wp_enqueue_scripts', 'travel_muni_inline_script_style' );

if ( ! function_exists( 'travel_muni_get_average_rating' ) ) :
	/**
	 * Return average review from WTE
	 */
	function travel_muni_get_average_rating() {
		global $post;
		if( !travel_muni_is_wpte_activated() || !travel_muni_is_wpte_tr_activated()) return false;
		
		ob_start();
		$review_obj    = new Wte_Trip_Review_Init();
        $comment_datas           = $review_obj->pull_comment_data( get_the_ID() );
        $icon_type               = '';
        $icon_fill_color         = '#F39C12';
        $review_icon_type        = apply_filters('trip_rating_icon_type', $icon_type);
        $review_icon_fill_colors = apply_filters('trip_rating_icon_fill_color', $icon_fill_color);

        if (!empty( $comment_datas)) {
            ?>
                <div 
                    class="agg-rating trip-review-stars <?php echo !empty($review_icon_type) ? 'svg-trip-adv' : 'trip-review-default'; ?>"
                    data-icon-type='<?php echo esc_attr( $review_icon_type ); ?>' data-rating-value="<?php echo esc_attr( $comment_datas['aggregate'] ); ?>"
                    data-rateyo-rated-fill="<?php echo esc_attr( $review_icon_fill_colors ); ?>" 
                    data-rateyo-read-only="true"
                >
                </div>
            <?php
        }

        $output = ob_get_clean();
        $output = apply_filters( 'wte_filtered_trip_average_rating_star', $output );
        echo $output;
	}
endif;
add_action( 'travel_muni_get_average_rating', 'travel_muni_get_average_rating' );
