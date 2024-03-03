<?php
/**
 * Trip FSD table template.
 *
 * @package Travel_Muni
 */

$trip_id = isset( $args['post_id'] ) ? $args['post_id'] : false;

if ( ! $trip_id ) {
	return;
}
$fsd_functions = new WTE_Fixed_Starting_Dates_Functions();
$sorted_fsd    = call_user_func(
	array( new WTE_Fixed_Starting_Dates_Shortcodes(), 'generate_fsds' ),
	$trip_id,
	array(
		'year'  => '',
		'month' => '',
	)
);
if ( empty( $sorted_fsd ) ) {
	return;
}
?>
<div id="wte-fixed-departure-dates" class="fixed-starting dates wte-fsd-list-container" data-nonce="<?php echo esc_attr( wp_create_nonce( 'wte-fsd' ) ); ?>">
	<?php
	$wte_settings            = wp_travel_engine_get_settings();
	$wte_fsd__trip_settings = get_post_meta( $args['post_id'], 'WTE_Fixed_Starting_Dates_setting', true );
	$section_title           = isset( $wte_settings['departure']['section_title'] ) && '' !== $wte_settings['departure']['section_title'] ? $wte_settings['departure']['section_title'] : __( 'Join Our Fixed Trip Starting Date', 'travel-muni' );

	$section_title = isset( $wte_fsd__trip_settings['availability_title'] ) && '' !== $wte_fsd__trip_settings['availability_title'] ? $wte_fsd__trip_settings['availability_title'] : $section_title;
	?>
	<div class="wp-travel-engine-itinerary-header">
		<h2 class="st-tc-title"><?php echo esc_html( $section_title ); ?></h2>
		<!-- FILTER -->
		<div class="wte-user-input">
			<input type='hidden' class="hidden-id" value="<?php echo esc_attr( $trip_id ); ?>">
			<select class="date-select" name="date-select" data-placeholder="<?php esc_attr_e( 'Choose a date&hellip;', 'travel-muni' ); ?>" class="wc-enhanced-select">
				<option value=" "><?php esc_html_e( 'Choose a date&hellip;', 'travel-muni' ); ?></option>
				<?php
				$monts_arr = array_unique(
					array_map(
						function ( $fsd ) {
							return gmdate( 'Y-m', strtotime( $fsd['start_date'] ) );
						},
						$sorted_fsd
					)
				);
				foreach ( $monts_arr as $key => $val ) {
					echo '<option data-month="' . esc_attr( date_i18n( 'm', strtotime( $val ) ) ) . '" value="' . esc_attr( $val ) . '">' . esc_html( date_i18n( 'F, Y', strtotime( $val ) ) ) . '</option>';
				}
				?>
			</select>
		</div>
	</div>

	<div class="wte-fsd-frontend-holder-dd dd" id="nestable1">
		<?php wte_fsd_get_template( 'table-inner.php', $sorted_fsd ); ?>
	</div>
</div>
<?php
