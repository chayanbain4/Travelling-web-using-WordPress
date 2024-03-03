<?php
/**
 * Travel Muni Single Trip Content Functions
 *
 * @package Travel_Muni
 */

/*
This file has all the functions which comes on the trip content area
	* Trip Header Reviews - travel_muni_single_trip_header_reviews()
	*
 */

// Removing all the tabs title
add_filter( 'wpte_show_tab_titles_inside_tabs', '__return_false' );

if ( ! function_exists( 'travel_muni_single_trip_header_reviews' ) ) :
	/**
	 * Single-Trip Header Reviews
	 *
	 * @package Travel Muni
	 */
	function travel_muni_single_trip_header_reviews() {
		?>
	<div class="ratingndrev">
		<?php do_action( 'wte_trip_average_rating_based_on_text' ); ?>
	</div>
		<?php
	}
endif;
add_action( 'wp_travel_engine_header_hook', 'travel_muni_single_trip_header_reviews', 20 );

if ( ! function_exists( 'travel_muni_trip_average_rating_based_on_text' ) ) :
	/**
	 * Single-Trip Header Reviews Filter
	 *
	 * @filter_hook  this function is filter for wte_trip_average_rating_based_on_text()
	 *
	 * @package Travel Muni
	 */
	function travel_muni_trip_average_rating_based_on_text() {
		if( !travel_muni_is_wpte_activated() || !travel_muni_is_wpte_tr_activated()) return false;
		global $post;
		ob_start();
		$review_obj    = new Wte_Trip_Review_Init();
		$comment_datas = $review_obj->pull_comment_data( get_the_ID() );
		$data = wptravelengine_reviews_get_trip_reviews( $post->ID );
		if ( ! empty( $comment_datas ) ) {
			?>
		<div class="aggregate-rating reviw-txt-wrap">
				<?php if ( is_singular( 'trip' ) ) { ?>
				<?php wptravelengine_reviews_star_markup( (float) $data['average'] ); ?>
				<span class="rating-label-tmp">
					<span>
					<?php
					if ( ! empty( $comment_datas ) && $comment_datas['aggregate'] ) {
						echo absint( $comment_datas['aggregate'] );}
					?>
					<?php echo esc_html('-'); ?></span>
					<span><?php do_action( 'wte_average_review_range_label' ); ?></span>
				</span>
			<?php }if ( ! empty( $comment_datas ) && $comment_datas['i'] ) { ?>
			<span class="rating-based-on">
					<?php
					if ( is_singular( 'trip' ) ) {
						if( $comment_datas['i'] > 1 ){
							printf(
								esc_html__( '( Based on %s )', 'travel-muni' ),
								'<span>' . (int) $comment_datas['i'] . ' travel reviews</span>'
							);
						}else{
							printf(
								esc_html__( '( Based on %s )', 'travel-muni' ),
								'<span>' . (int) $comment_datas['i'] . ' travel review</span>'
							);
						}
					} else {
						if( $comment_datas['i'] > 1 ){
							printf(
								esc_html__( '( %s reviews )', 'travel-muni' ),
								(int) $comment_datas['i']
							);
						}else{
							printf(
								esc_html__( '( %s review )', 'travel-muni' ),
								(int) $comment_datas['i']
							);
						}
					}
					?>
			</span>
			<?php } ?>
		</div>
			<?php
		}
		$output = ob_get_clean();
		return $output;
	}
endif;
add_filter( 'wte_filtered_trip_average_rating_based_on_text', 'travel_muni_trip_average_rating_based_on_text' );

if ( ! function_exists( 'travel_muni_single_trip_overview_content_modified' ) ) :
	/**
	 * Single-Trip Content Overview
	 *
	 * @package Travel Muni
	 */
	function travel_muni_single_trip_overview_content_modified() {

		global $post;
		$trip_id       = $post->ID;
		$trip_settings = get_post_meta( $trip_id, 'wp_travel_engine_setting', true );
		$key           = isset( $trip_settings['overview_section_title'] ) ? $trip_settings['overview_section_title'] : '';
		$tab_title     = ( isset( $key ) && ! empty( $key ) ) ? $key : false;
		if ( $tab_title ) {
			echo '<h2 class="st-tc-title">' . esc_html( $tab_title ) . '</h2>';
		}
	}
endif;
add_action( 'wte_before_overview_content', 'travel_muni_single_trip_overview_content_modified' );


if ( ! function_exists( 'travel_muni_custom_tab_content_modified' ) ) :
	/**
	 * Single-Trip Content Overview
	 *
	 * @package Travel Muni Pro
	 */
	function travel_muni_custom_tab_content_modified( $tab_key ) {
		global $post;
		$trip_id       = $post->ID;
		$trip_settings = get_post_meta( $trip_id, 'wp_travel_engine_setting', true );
		$tab_title     = isset( $trip_settings[ 'tab_' . $tab_key . '_title' ] ) && ! empty( $trip_settings[ 'tab_' . $tab_key . '_title' ] ) ? $trip_settings[ 'tab_' . $tab_key . '_title' ] : false;
		
		if ( $tab_title ) {
			echo "<h2 class='st-tc-title'>" . esc_html( $tab_title ) . '</h2>';
		}
	}
endif;
add_action( 'wte_custom_t_tab_title', 'travel_muni_custom_tab_content_modified' );

if ( ! function_exists( 'travel_muni_single_trip_cost_title_modified' ) ) :
	/**
	 * Single-Trip Content Cost
	 *
	 * @package Travel Muni
	 */
	function travel_muni_single_trip_cost_title_modified() {

		global $post;
		$trip_id       = $post->ID;
		$trip_settings = get_post_meta( $trip_id, 'wp_travel_engine_setting', true );
		$key           = $trip_settings['cost_tab_sec_title'];
		$tab_title     = isset( $key ) && ! empty( $key ) ? $key : false;
		if ( $tab_title ) {
			echo '<h2 class="st-tc-title cost-title">' . esc_html( $tab_title ) . '</h2>';
		}
	}
endif;
add_action( 'wte_before_cost_content', 'travel_muni_single_trip_cost_title_modified' );

if ( ! function_exists( 'travel_muni_single_trip_faqs_title_modified' ) ) :
	/**
	 * Single-Trip Content FAQ
	 *
	 * @package Travel Muni
	 */
	function travel_muni_single_trip_faqs_title_modified() {

		global $post;
		$trip_id       = $post->ID;
		$trip_settings = get_post_meta( $trip_id, 'wp_travel_engine_setting', true );
		$key           = isset( $trip_settings['faq_section_title'] ) ? $trip_settings['faq_section_title'] : '';
		$tab_title     = ( isset( $key ) && ! empty( $key ) ) ? $key : false;
		if ( $tab_title ) {
			echo '<h2 class="st-tc-title">' . esc_html( $tab_title ) . '</h2>';
		}
	}
endif;
add_action( 'wte_faqs_tab_title', 'travel_muni_single_trip_faqs_title_modified' );

if ( ! function_exists( 'travel_muni_single_trip_itinerary_title_modified' ) ) :
	/**
	 * Single-Trip Content Itinerary
	 *
	 * @package Travel Muni
	 */
	function travel_muni_single_trip_itinerary_title_modified() {

		global $post;
		$trip_id       = $post->ID;
		$trip_settings = get_post_meta( $trip_id, 'wp_travel_engine_setting', true );
		$key           = isset( $trip_settings['trip_itinerary_title'] ) ? $trip_settings['trip_itinerary_title'] : '';
		$tab_title     = ( isset( $key ) && ! empty( $key ) ) ? $key : false;
		if ( $tab_title ) {
			echo '<h2 class="st-tc-title">' . esc_html( $tab_title ) . '</h2>';
		}
	}
endif;
add_action( 'wte_itinerary_tab_title', 'travel_muni_single_trip_itinerary_title_modified' );

if ( ! function_exists( 'travel_muni_single_trip_map_title_modified' ) ) :
	/**
	 * Single-Trip Content Map
	 *
	 * @package Travel Muni
	 */
	function travel_muni_single_trip_map_title_modified() {

		global $post;
		$trip_id       = $post->ID;
		$trip_settings = get_post_meta( $trip_id, 'wp_travel_engine_setting', true );
		$key           = isset( $trip_settings['map_section_title'] ) ? $trip_settings['map_section_title'] : '';
		$tab_title     = ( isset( $key ) && ! empty( $key ) ) ? $key : false;
		if ( $tab_title ) {
			echo '<h2 class="st-tc-title">' . esc_html( $tab_title ) . '</h2>';
		}
	}
endif;
add_action( 'wte_before_map_content', 'travel_muni_single_trip_map_title_modified' );

if ( ! function_exists( 'travel_muni_advanced_itinerary_trip_header_section' ) ) :
	/**
	 * Single-Trip Content Itinerary Trip Header
	 *
	 * @package Travel Muni
	 */
	function travel_muni_advanced_itinerary_trip_header_section() {
		ob_start();
		?>
		<div class="wp-travel-engine-itinerary-header">
			<?php
			/**
			 * Hook - Display tab content title, left for themes.
			 */
			do_action( 'wte_itinerary_tab_title' );
			?>
			<div class="tmp-button-toggle">
				<input type="checkbox" class="checkbox" checked>
				<div class="knobs">
					<span></span>
				</div>
				<b class="togg-txt-wrap-1"><?php echo esc_html__( 'Expand all', 'travel-muni' ); ?></b>
				<b class="togg-txt-wrap-2"><?php echo esc_html__( 'Collapse all', 'travel-muni' ); ?></b>
			</div>
		</div>
		<?php
		do_action( 'wte_after_itinerary_header' );

		$itinerary_trip_header_section = ob_get_contents();
		ob_end_clean();
		echo apply_filters( 'travel_muni_advanced_itinerary_trip_header_section', $itinerary_trip_header_section ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
endif;
add_action( 'advanced_itinerary_trip_header_section', 'travel_muni_advanced_itinerary_trip_header_section' );

if ( ! function_exists( 'travel_muni_itinerary_downloader_shortcode' ) ) :
	/**
	 * Genearates shortcode for itinery downloader via action
	 */
	function travel_muni_itinerary_downloader_shortcode() {

		if ( travel_muni_is_itinerary_downloader_activated() ) {
			echo do_shortcode( '[wte_itinerary_downloader]' );
		}
	}
endif;
add_action( 'wte_after_itinerary_content', 'travel_muni_itinerary_downloader_shortcode' );


function travel_muni_filtered_advanced_itinerary_meal_before_text() {
	return esc_html__( 'Meals:', 'travel-muni' );
}
add_filter( 'wte_filtered_advanced_itinerary_meal_before_text', 'travel_muni_filtered_advanced_itinerary_meal_before_text' );