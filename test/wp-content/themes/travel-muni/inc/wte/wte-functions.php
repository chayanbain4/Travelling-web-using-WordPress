<?php

require get_template_directory() . '/inc/wte/single-trip/banner.php';

require get_template_directory() . '/inc/wte/single-trip/trip-content.php';

require get_template_directory() . '/inc/wte/single-trip/review.php';

if ( ! function_exists( 'travel_muni_single_trip_review_count' ) ) :
	/**
	 * Get Reviews Count on Single Trip
	 */
	function travel_muni_single_trip_review_count( $post_id ) {
		 $wp_travel_engine_settings = get_option( 'wp_travel_engine_settings', true );
		if ( class_exists( 'Wte_Trip_Review_Init' ) && ! isset( $wp_travel_engine_settings['trip_reviews']['hide'] ) ) {
			if ( isset( $wp_travel_engine_settings['booking'] ) ) {
				return;
			}
			$comments = get_comments(
				array(
					'post_id' => $post_id,
					'status'  => 'approve',
				)
			);
			if ( ! empty( $comments ) ) {
				?>
				<div class="popular-trip-review">
					<?php
					do_action( 'wte_trip_average_rating_star' );
					$sum = 0;
					$i   = 0;
					foreach ( $comments as $comment ) {
						$rating = get_comment_meta( $comment->comment_ID, 'stars', true );
						$sum    = $sum + absint( $rating );
						$i++;
					}
					?>
					<span class="popular-trip-reviewcount"><?php echo absint( $i ); ?>
						<?php
						if ( $i == '1' ) {
							echo esc_html__( 'Review', 'travel-muni' );
						} else {
							echo esc_html__( 'Reviews', 'travel-muni' );
						}
						?>
					</span>
				</div><!-- .popular-trip-review -->
				<?php
			}
		}
	}
endif;

if ( ! function_exists( 'travel_muni_get_trip_currency' ) ) :
	/**
	 * Get currency for WP Travel Engine Trip
	 */
	function travel_muni_get_trip_currency() {
		$currency = '';
		if ( travel_muni_is_wpte_activated() ) {
			$wpte_setting = get_option( 'wp_travel_engine_settings', true );
			$code         = 'USD';
			if ( isset( $wpte_setting['currency_code'] ) && $wpte_setting['currency_code'] != '' ) {
				$code = $wpte_setting['currency_code'];
			}
			$obj      = new Wp_Travel_Engine_Functions();
			$currency = $obj->wp_travel_engine_currencies_symbol( $code );
		}
		return $currency;
	}
endif;

if ( ! function_exists( 'travel_muni_trip_symbol_options' ) ) :
	/**
	 * Travel Muni Trip Symbol Options
	 */
	function travel_muni_trip_symbol_options( $trip_id ) {
		if ( function_exists( 'wte_get_trip' ) ) {
			$trip = wte_get_trip( $trip_id );
			if ( $trip->price || $trip->sale_price ) {
				?>
				<div class="popular-trip-budget">
					<span class="price-holder">
						<?php
						if ( $trip->has_sale ) {
							?>
							<span class="old-price striked-price">
								<?php echo esc_html( wte_get_formated_price( $trip->price ) ); ?>
							</span>
							<span class="new-price actual-price">
								<?php echo esc_html( wte_get_formated_price( $trip->sale_price ) ); ?>
							</span>
						<?php } else { ?>
							<span class="new-price actual-price">
								<?php echo esc_html( wte_get_formated_price( $trip->price ) ); ?>
							</span>
						<?php } ?>
					</span>
				</div>
				<?php
			}
			return;
		} else {
			$meta = get_post_meta( $trip_id, 'wp_travel_engine_setting', true );
			if ( ( isset( $meta['trip_prev_price'] ) && $meta['trip_prev_price'] ) || ( isset( $meta['sale'] ) && $meta['sale'] && isset( $meta['trip_price'] ) && $meta['trip_price'] ) ) {
				?>
				<div class="popular-trip-budget">
				<?php
				if ( ( isset( $meta['trip_prev_price'] ) && $meta['trip_prev_price'] ) && ( isset( $meta['sale'] ) && $meta['sale'] ) && ( isset( $meta['trip_price'] ) && $meta['trip_price'] ) ) {
					$cost      = wp_travel_engine_get_sale_price( $trip_id );
					$prev_cost = wp_travel_engine_get_prev_price( $trip_id );
					?>
						<div class="price-holder">
							<span class="striked-price"><?php echo esc_html( wte_get_formated_price( $prev_cost ) ); ?></span>
							<span class="actual-price"><?php echo esc_html( wte_get_formated_price( $cost ) ); ?></span>
						</div>
						<?php
				} elseif ( isset( $meta['trip_prev_price'] ) && $meta['trip_prev_price'] ) {
					$prev_cost = $meta['trip_prev_price'];
					?>
						<div class="price-holder">
							<span class="actual-price"><?php echo esc_html( wte_get_formated_price( $prev_cost ) ); ?></span>
						</div>
					<?php } ?>
				</div>
				<?php
			}
		}
	}
endif;

if ( ! function_exists( 'travel_muni_trip_discounts_in_percentages' ) ) :
	/**
	 * Travel Muni Trip Symbol Options
	 */
	function travel_muni_trip_discounts_in_percentages( $trip_id ) {
		if ( function_exists( 'wte_get_trip' ) ) {
			$trip = wte_get_trip( get_the_ID() );
			if ( $trip->has_sale ) {
				?>
				<div class="popular-trip-discount">
					<span class="discount-offer">
						<?php echo wp_kses( sprintf( __( '%1$s%2$s%% %3$s Off', 'travel-muni' ), '<span class="per">' . (float) $trip->sale_percentage . '</span>', '<span>', '</span>' ), array( 'span' => array( 'class' => array() ) ) ); ?>
					</span>
				</div>
				<?php
			}
		} else {
			$meta = get_post_meta( $trip_id, 'wp_travel_engine_setting', true );
			if ( ( isset( $meta['trip_prev_price'] ) && $meta['trip_prev_price'] ) && ( isset( $meta['sale'] ) && $meta['sale'] && isset( $meta['trip_price'] ) && $meta['trip_price'] ) ) {
				$cost       = $meta['trip_price'];
				$prev_cost  = $meta['trip_prev_price'];
				$percentage = number_format( ( ( $prev_cost - $cost ) / $prev_cost ) * 100 );
				?>
				<div class="popular-trip-discount">
					<span class="discount-offer">
					<?php echo wp_kses( sprintf( __( '%1$s%2$s%% %3$s Off', 'travel-muni' ), '<span class="per">' . (float) $percentage . '</span>', '<span>', '</span>' ), array( 'span' => array( 'class' => array() ) ) ); ?>
					</span>
				</div>
				<?php
			}
		}
	}
endif;

if ( ! function_exists( 'travel_muni_trip_block' ) ) :
	/**
	 * Travel Muni Trip Block
	 */
	function travel_muni_trip_block( $trip_id, $wp_travel_engine_setting ) {
		$discout_label = apply_filters( 'travel_muni_gdlabel', __( 'Group discount Available', 'travel-muni' ) );
		$wte_global    = get_option( 'wp_travel_engine_settings', array() );
		?>
		<div class="popular-trips-single">
			<div class="popular-trips-single-inner-wrap">
				<figure class="popular-trip-fig">
					<a href="<?php the_permalink( $trip_id ); ?>">
						<?php
						if ( has_post_thumbnail( $trip_id ) ) {
							the_post_thumbnail( 'travel-muni-trip-thumb-size' );
						} else {
							travel_muni_get_fallback_svg( 'travel-muni-trip-thumb-size' );
						}
						?>
					</a>
					<?php
					if ( function_exists( 'wte_is_group_discount_enabled' ) && wte_is_group_discount_enabled( get_the_ID() ) ) {
						?>
						<div class="popular-trip-group-avil">
							<span class="pop-trip-grpavil-icon">
								<?php travel_muni_svg_helpers( 'group_discount' ); ?>
							</span>
							<span class="pop-trip-grpavil-txt"><?php echo esc_html( $discout_label ); ?></span>
						</div>
					<?php } ?>
					<?php travel_muni_trip_discounts_in_percentages( $trip_id ); ?>
					<?php travel_muni_trip_symbol_options( $trip_id ); ?>
				</figure>

				<div class="popular-trip-detail-wrap">
					<h2 class="popular-trip-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="popular-trip-desti">
						<?php
						$destinations = get_the_terms( $trip_id, 'destination' );
						usort(
							$destinations,
							function ( $a, $b ) {
								return strcasecmp(
									$a->slug,
									$b->slug
								);
							}
						);

						if ( ! empty( $destinations ) ) {
							?>
							<span class="popular-trip-loc">
								<i>
									<?php travel_muni_svg_helpers( 'destination' ); ?>
								</i>
								<span>
									<?php
									$term_list = array();
									foreach ( $destinations as $term ) {
										$term_list[] = '<a href="' . esc_url( get_term_link( $term->term_id ) ) . '">' . esc_html( $term->name ) . '</a>';
									}
									echo wp_kses( implode( ', ', $term_list ), array( 'a' => array( 'href' => array() ) ) );
									?>
								</span>
							</span>
							<?php
						}
						?>
						<?php
						if ( isset( $wp_travel_engine_setting['trip_duration'] ) && '' != $wp_travel_engine_setting['trip_duration'] ) {
							?>
							<span class="popular-trip-dur">
								<?php if (function_exists('wte_locate_template') ){
									$trip_duration        = $wp_travel_engine_setting['trip_duration'];
									$trip_duration_unit   = $wp_travel_engine_setting['trip_duration_unit'];
									$trip_duration_nights = $wp_travel_engine_setting['trip_duration_nights'];
									$set_duration_type    = $wte_global['set_duration_type'];

									wte_get_template( 'components/content-trip-card-duration.php', compact( 'trip_duration_unit', 'trip_duration', 'trip_duration_nights', 'set_duration_type' ) );														;
								} ?>
							</span>
						<?php } ?>
					</div>
					<?php travel_muni_single_trip_review_count( $trip_id ); ?>
				</div>
			</div>
		</div>
		<?php
	}
endif;

function travel_muni_company_average_rating_based_on_text() {
	ob_start();
	$review_obj    = new Wte_Trip_Review_Init();
	$comment_datas = $review_obj->pull_all_comments_data();
	?>
	<div class="aggregate-rating reviw-txt-wrap">
		<?php if ( is_page_template( array( 'templates/review.php', 'templates/about.php' ) ) ) { ?>
			<span class="rating-label-tmp">
				<span><?php echo absint( $comment_datas['aggregate'] ); echo esc_html('-'); ?></span>
				<span><?php do_action( 'wte_company_average_review_range_label' ); ?></span>
			</span>
			<span class="rating-based-on">
				<?php if( $comment_datas['i'] > 1 ){
					printf(
						esc_html__( '( Based on %s travel reviews )', 'travel-muni' ),
						(int) $comment_datas['i']
					);
				}else{
					printf(
						esc_html__( '( Based on %s travel review )', 'travel-muni' ),
						(int) $comment_datas['i']
					);
				} ?>
			</span>
			<?php
		} else {
			if( $comment_datas['i'] > 1 ){
				printf(
					esc_html__( '( Based on %s travel reviews )', 'travel-muni' ),
					(int) $comment_datas['i']
				);
			}else{
				printf(
					esc_html__( '( Based on %s travel review )', 'travel-muni' ),
					(int) $comment_datas['i']
				);
			}
		}
		?>
	</div>
	<?php
	$output = ob_get_clean();
	return $output;
}
add_filter( 'wte_filtered_company_average_rating_based_on_text', 'travel_muni_company_average_rating_based_on_text' );

function travel_muni_trip_rating_icon_type() {
	return '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><g transform="translate(-1076 -1414)"><g transform="translate(1076 1414)" fill="#fff" stroke="#18a581" stroke-width="2"><rect width="20" height="20" rx="10" stroke="none"/><rect x="1" y="1" width="18" height="18" rx="9" fill="none"/></g><rect class="rect-inner" width="10" height="10" rx="5" transform="translate(1081 1419)" fill="#18a581"/></g></svg>';
}
add_filter( 'trip_rating_icon_type', 'travel_muni_trip_rating_icon_type' );

function travel_muni_trip_rating_icon_fill_color() {
	return '#32b67a';
}
add_filter( 'trip_rating_icon_fill_color', 'travel_muni_trip_rating_icon_fill_color' );

function travel_muni_comment_meta_gallery_modified( $output, $comment ) {
	ob_start();
	$comment_id     = ( isset( $comment ) && is_object( $comment ) ) ? $comment->comment_ID : get_comment_ID();
	$gallery_images = get_comment_meta( $comment_id, 'gallery_images', true );
	if ( isset( $gallery_images ) && ! is_object( $gallery_images ) && ! empty( $gallery_images ) ) {
		?>
		<div class="trip-review-detail-gallery">
			<?php
			foreach ( $gallery_images as $keys => $id ) :
				$image_thumbnail = wp_get_attachment_image( $id, 'thumbnail' );
				$image_full      = wp_get_attachment_image_url( $id, 'large' );
				if ( ! empty( $image_thumbnail ) ) :
					?>
					<figure>
						<a class="trip-review-gallery-link" href="<?php echo esc_url( $image_full ); ?>">
							<?php echo wp_kses_post( $image_thumbnail ); ?>
						</a>
					</figure>
					<?php
				endif;
			endforeach;
			?>
		</div>
		<?php
	}
	$output = ob_get_clean();
	return $output;
}
add_filter( 'wte_filtered_comment_gallery_section', 'travel_muni_comment_meta_gallery_modified', 10, 2 );

add_action( 'wte_trip_archive_description_below_title', '__return_false' );

add_action( 'wp_travel_engine_archive_header_block_display', '__return_false' );

/********************
Partial Payment Extension
 */

add_filter( 'wte_checkout_partial_pay_heading', 'travel_muni_partial_payment_heading_modified' );

function travel_muni_partial_payment_heading_modified() {
	return esc_html__( 'Choose Down Payment', 'travel-muni' );
}

add_filter( 'wte_checkout_down_pay_label', 'wte_checkout_partial_pay_down_pay_label' );
function wte_checkout_partial_pay_down_pay_label() {
	return esc_html( '%s' );
}

add_filter( 'wte_checkout_full_pay_label', 'wte_checkout_partial_full_pay_label' );
function wte_checkout_partial_full_pay_label() {
	return esc_html__( '100%', 'travel-muni' );
}

// filter for trip search view mode
add_filter( 'wp_travel_engine_default_archive_view_mode', 'travel_muni_default_archive_view_mode' );
function travel_muni_default_archive_view_mode() {
	return 'list';
}
