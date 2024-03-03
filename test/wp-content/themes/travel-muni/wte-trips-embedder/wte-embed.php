<?php
/**
 * WTE Grid Layout.
 *
 * @package WTE_Trips_Embedder
 */

global $post;

$nofollow = isset( $args['nofollow'] ) && $args['nofollow'] ? true : false;
$nof_attr = $nofollow ? 'rel=nofollow' : '';
$target   = $nofollow ? '_blank' : '_self';

$trip_id       = get_the_ID();
$wte           = new Wp_Travel_Engine_Functions();
$trip_settings = get_post_meta( $trip_id, 'wp_travel_engine_setting', true );
$wte_global    = get_option( 'wp_travel_engine_settings', true );

$code     = wp_travel_engine_get_currency_code();
$currency = wp_travel_engine_get_currency_symbol( $code );

$trip_price    = isset( $trip_settings['trip_prev_price'] ) ? $trip_settings['trip_prev_price'] : 0;
$is_sale       = false;
$display_price = $trip_price;

if ( '' !== $trip_price && isset( $trip_settings['sale'] ) ) {
	$is_sale       = true;
	$sale_price    = isset( $trip_settings['trip_price'] ) ? $trip_settings['trip_price'] : 0;
	$display_price = $sale_price;
}

$discount_percent = wte_trips_embedder_get_discount_percent( $trip_id );
$trip_duration    = isset( $trip_settings['trip_duration'] ) && ! empty( $trip_settings['trip_duration'] ) ? $trip_settings['trip_duration'] : false;
$destinations     = wte_get_the_term_list( $trip_id, 'destination', '', ', ', '', $nofollow );
$destination      = '';

if ( ! empty( $destinations ) && ! is_wp_error( $destinations ) ) {
	$destination = $destinations;
}
?>
<!-- .te-post-wrap -->
<article class="te-post">
	<div class="te-inner-wrap">
		<figure class="te-post-img">
			<?php if ( has_post_thumbnail() ) : ?>
				<a <?php echo esc_attr( $nof_attr ); ?> target="<?php echo esc_attr( $target ); ?>" href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'wte-embed-' . esc_attr( $args['layout']  ). '-image' ); ?>
				</a>
				<?php
			endif;
			if ( $discount_percent ) :
				?>
				<span class="te-post-discount">
					<?php
					// Translators: 1. Discount Percent in number.
					echo esc_html( sprintf( __( '%1$s%% Off', 'travel-muni' ), $discount_percent ) );
					?>
				</span>
				<?php
			endif;

			if ( class_exists( 'Wp_Travel_Engine_Group_Discount' ) && isset( $wte_global['group']['discount'] ) ) {

				if ( isset( $trip_settings['group']['discount'] ) && isset( $trip_settings['group']['traveler'] ) && ! empty( $trip_settings['group']['traveler'] ) ) { ?>

					<span class="te-post-group">
						<span class="te-group-icon"><i class="fa fa-users"></i></span>
						<span class="te-tooltip"><?php esc_html_e( 'You have group discount in this trip.', 'travel-muni' ); ?></span>
					</span>

					<?php
				}
			} ?>
		</figure><!-- .te-post-img -->
		<div class="te-post-content-wrap">
			<div class="te-post-content-wrapper">
				<div class="te-title-wrap">
					<div class="te-post-title">
						<a <?php echo esc_attr( $nof_attr ); ?> target="<?php echo esc_attr( $target ); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</div>
					<?php if ( ! empty( $destination ) ) : ?>
						<span class="te-post-location">
							<i><?php travel_muni_svg_helpers( 'destination' ); ?></i>
							<?php echo wp_kses_post( $destination ); ?>
						</span>
					<?php endif; ?>
					<?php if ( $trip_duration ) : ?>
						<span class="te-post-days">
							<?php travel_muni_svg_helpers( 'duration' ); ?>
							<span class="te-post-day">
								<?php
								// Translators: 1. Trip Duration.
								printf( esc_html( _nx( '%1$d Day', '%1$d Days', (int) $trip_duration, 'trip duration', 'travel-muni' ) ), (int) $trip_duration );
								?>
							</span>
						</span>
					<?php endif; ?>
				</div>
				<div class="te-post-meta">
					<?php if ( ! empty( $display_price ) ) : ?>
						<span class="te-post-price">
							<?php if ( $is_sale ) : ?>
								<del><?php echo esc_html( $currency ) . esc_html( $trip_price ); ?></del>
							<?php endif; ?>
							<ins><?php echo esc_html( $currency ) . esc_html( $display_price ); ?></ins>
						</span>
					<?php endif; ?>
					<span class="te-post-rating">
						<?php travel_muni_single_trip_review_count( $trip_id ); ?>
					</span>
				</div>
			</div>

			<?php
			$trip_starting_dates = wp_travel_engine_get_fixed_departure_dates( $trip_id );
			$wte_settings        = get_option( 'wp_travel_engine_settings', array() );
			$num                 = isset( $wte_settings['trip_dates']['number'] ) ? $wte_settings['trip_dates']['number'] : 3;
			$trip_starting_dates = array_slice( $trip_starting_dates, 0, $num );
			if ( ! empty( $trip_starting_dates ) && is_array( $trip_starting_dates ) ) :
				?>
				<div class="te-footer">
					<span class="te-post-departure">
						<b><?php esc_html_e( 'Next Departure:', 'travel-muni' ); ?> </b>
						<ul class="wte-next-departure-list">
							<?php
							foreach ( $trip_starting_dates as $key => $date ) :
								echo '<li><span class="te-departure-date">' . esc_html( wte_get_formated_date( $date['start_date'] ) ) . '</span></li>';
							endforeach;
							?>
						</ul>
					</span>
				</div>
				<?php
			endif;
			?>
		</div><!-- .te-post-content-wrap -->
	</div>
</article>
<!-- .te-post -->
