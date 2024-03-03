<?php
/**
 * Table Inner.
 *
 * @package Travel_Muni
 */

?>
<div class="dd-list outer">
	<table>
		<tbody>
			<?php
			foreach ( $args as $key => $fsd ) {
				wte_fsd_get_template( 'table-row.php', $fsd );
			}
			?>
		</tbody>
	</table>
	<?php
	$globals_settings = wp_travel_engine_get_settings();

	$pagination_num = isset( $globals_settings['trip_dates']['pagination_number'] ) && ! empty( $globals_settings['trip_dates']['pagination_number'] ) ? $globals_settings['trip_dates']['pagination_number'] : 10;

	$count = count( $args );

	if ( $count > $pagination_num ) : ?>
		<button class="btn-more-dates loadMore"><?php esc_html_e( 'Load More', 'travel-muni' ); ?></button>
		<button style="display:none;" class="btn-more-dates showLess" ><?php esc_html_e( 'Show Less', 'travel-muni' ); ?></button>
	<?php endif;
	?>
	<div id="loader" style="display: none">
		<div class="table">
			<div class="table-row">
				<div class="table-cell">
					<i class="fa fa-spinner fa-spin"></i>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
