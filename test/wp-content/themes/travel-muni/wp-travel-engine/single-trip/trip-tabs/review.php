<?php
/**
 * Review Comments Template
 *
 * This template can be overridden by copying it to yourtheme/wp-travel-engine/single-trip/trip-tabs/review.php.
 *
 * @package Wp_Travel_Engine
 * @subpackage Wp_Travel_Engine/includes/templates
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'wte_before_review_content' ); ?>

<div class="post-data review">
	<?php
		$wte_settings = get_option( 'wp_travel_engine_settings', true );
		$key          = isset( $wte_settings['trip_reviews']['summary_label'] ) ? $wte_settings['trip_reviews']['summary_label'] : '';
		$tab_title    = ( isset( $key ) && ! empty( $key ) ) ? $key : false;
	if ( $tab_title ) {
		echo '<h2 class="st-tc-title">' . esc_html( $tab_title ) . '</h2>';
	}
	?>
	<div class="content">
		<?php
		if ( ! empty( $title ) ) {
			echo '<h3>' . esc_html( $title ) . '</h3>';
		}

			$obj = new Wte_Trip_Review_Init();
			$obj->show_trip_rating( get_the_ID() );

			$obj->show_trip_rating_form();
		?>
	</div>
</div>

<?php
do_action( 'wte_after_review_content' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
