<?php
if ( ! function_exists( 'travel_muni_comment_reviewed_tour_modified' ) ) :
	/**
	 * Single-Trip Comment Reviewed Tour Modified
	 *
	 * @package Travel Muni
	 */
	function travel_muni_comment_reviewed_tour_modified( $comment = false ) {
		ob_start();
		if ( ! $comment ) {
			$comment_id = get_comment_ID();
			$comment    = get_comment( $comment_id );
		}
		$comment_post_title = get_the_title( $comment->comment_post_ID );
		$comment_post_id    = $comment->comment_post_ID;
		do_action( 'comment_related_post_wrap_open' );
		if ( ! is_singular( 'trip' ) ) {
			?>
		<span><?php esc_html_e( 'Reviewed Tour:', 'travel-muni' ); ?></span>
		<a href="<?php echo esc_url( get_permalink( $comment_post_id ) ); ?>" title="<?php echo esc_attr( $comment_post_title ); ?>">
				<?php echo esc_html( $comment_post_title ); ?>
		</a>
			<?php
		}
		do_action( 'comment_days_ago', $comment );
		do_action( 'comment_related_post_wrap_close' );
		$output = ob_get_clean();
		return $output;
	}
endif;
add_filter( 'wte_filtered_comment_reviewed_tour_section', 'travel_muni_comment_reviewed_tour_modified' );

function travel_muni_trip_reviews_filtered_review_email_placeholder() {
	return __( 'Your Email*', 'travel-muni' );
}
add_filter( 'wte_trip_reviews_filtered_review_email_placeholder', 'travel_muni_trip_reviews_filtered_review_email_placeholder' );

function travel_muni_trip_reviews_filtered_review_name_placeholder() {
	return __( 'Your Name*', 'travel-muni' );
}
add_filter( 'wte_trip_reviews_filtered_review_name_placeholder', 'travel_muni_trip_reviews_filtered_review_name_placeholder' );

function travel_muni_trip_reviews_filtered_image_upload_field_label() {
	return __( '<span class="iufl">Drop your image here, or <span class="browse_iu">Browse</span><span class="supp_iu">Supports: JPG,PNG</span></span>', 'travel-muni' );
}
add_filter( 'wte_trip_reviews_filtered_image_upload_field_label', 'travel_muni_trip_reviews_filtered_image_upload_field_label' );
