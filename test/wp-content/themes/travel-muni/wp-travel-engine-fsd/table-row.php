<?php
/**
 * Row template.
 *
 * @package Travel_Muni
 */

$start_date   = isset( $args['start_date'] ) ? $args['start_date'] : '';
$end_date     = isset( $args['end_date'] ) ? $args['end_date'] : '';
$availability = isset( $args['availability'] ) ? $args['availability'] : 'guaranteed';
$seats_left   = isset( $args['seats_left'] ) ? $args['seats_left'] : '';
$fsd_cost     = isset( $args['fsd_cost'] ) ? $args['fsd_cost'] : '';

$availability_options = WTE_Fixed_Starting_Dates_Functions::availability();
$availability_label   = isset( $availability_options[ $availability ] ) ? $availability_options[ $availability ] : __( 'Guaranteed', 'travel-muni' );
if ( 0 === (int) $seats_left && $seats_left !== '' ) {
	$sold_out = 'sold_out';
} else {
	$sold_out = '';
}
?>
<tr style="display: table-row;" <?php echo 'class="' . esc_attr( $sold_out ) . '"'; ?>>
	<td data-label="<?php esc_attr_e( 'TRIP DATES', 'travel-muni' ); ?>" dates="" class="accordion-sdate" data-id="<?php echo esc_attr( $args['content_id'] ); ?>">
	<div class="wte-start-end-wrap">
		<div class="wte-sew">
			<!-- start date starts  -->
			<?php esc_html_e( 'From', 'travel-muni' ); ?>
			<span class="start-date" data-id="<?php echo esc_attr( $start_date ); ?>">
				<?php echo esc_html( date_i18n( get_option( 'date_format' ), strtotime( $start_date ) ) ); ?>
			</span>
		</div>
		<div class="wte-sew">
			<!-- end date starts -->
			<?php esc_html_e( 'To', 'travel-muni' ); ?>
			<span class="end-date" data-id="<?php echo esc_attr( $end_date ); ?>">
				<?php echo esc_html( date_i18n( get_option( 'date_format' ), strtotime( $end_date ) ) ); ?>
			</span>
		</div>
	</div>
	</td>
	<td data-label="<?php esc_attr_e( 'AVAILABILITY', 'travel-muni' ); ?>" class="accordion-availability" data-id="<?php echo esc_attr( $availability ); ?>">
	<div class="seats-available">
		<?php
		if ( 0 < $seats_left ) :
			// Translators: 1. Span opening tag 2. Seats Left 3. Span Closing tag.
			$space_left_filter = apply_filters( 'wte_fsd_space_left_lbl', esc_html__( '%1$s%2$s Spaces Left%3$s', 'travel-muni' ) );
			echo wp_kses( sprintf( $space_left_filter, '<span class="seats">', $seats_left, '</span>' ), array( 'span' => array( 'class' => array() ) ) );
		elseif( $seats_left === '' ) :
			echo '';
		else :
			echo wp_kses( '<span class="sold-out">' . __( 'Sold out', 'travel-muni' ) . '</span>', array( 'span' => array( 'class' => array() ) ) );
		endif;
		?>
		<span class="<?php echo esc_attr( $availability ); ?>"><?php echo esc_html( $availability_label ); ?></span>
	</div>
	</td>
	<td data-label="<?php echo esc_attr__( 'PRICE', 'travel-muni' ); ?>" class="accordion-cost">
		<strong class="trip-cost-holder"><?php echo esc_html( wte_get_formated_price( $fsd_cost ) ); ?></strong>
		<span><?php echo esc_html( apply_filters( 'tmp_fsd_per_person_label', __( 'per person', 'travel-muni' ) ) ); ?></span>
	</td>
	<?php
	$btn_txt      = __( 'Book Now ', 'travel-muni' );
	$wte_settings = get_option( 'wp_travel_engine_settings', true );
	$btn_txt      = isset( $wte_settings['book_btn_txt'] ) && ! empty( $wte_settings['book_btn_txt'] ) ? $wte_settings['book_btn_txt'] : $btn_txt;

	if ( 0 < $seats_left || $seats_left === '' ){
		?>
			<td data-label="<?php echo esc_attr( $fsd_cost ); ?>" class="accordion-book" data-id="<?php echo esc_attr( $args['content_id'] ); ?>">
			<button
				disabled
				data-info="<?php echo esc_attr( strtotime( $start_date ) ); ?>"
				class="book-btn wte-fsd-list-booknow-btn btn-loading"
			><?php echo esc_html( $btn_txt ); ?>
			</button>
		</td>
	<?php } else { ?>
		<td class="accordion-book"><a href="#" class="book-btn sold-btn"><?php esc_html_e( 'Sold Out', 'travel-muni' ); ?> </a></td>
	<?php } ?>
</tr>
<?php
