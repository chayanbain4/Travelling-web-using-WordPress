<?php
/**
 * Single Trip Faqs Template
 *
 * This template can be overridden by copying it to yourtheme/wp-travel-engine/single-trip/trip-tabs/faqs.php.
 *
 * @package Wp_Travel_Engine
 * @subpackage Wp_Travel_Engine/includes/templates
 * @since @release-version //TODO: change after travel muni is live
 */

defined( 'ABSPATH' ) || exit;

?>
<?php do_action( 'wte_before_faq_content' ); ?>
<div class="wte-faq-wrapper">
	<div class="wte-faq-header-wrapper">
	<?php
		/**
		 * Hook - Display tab content title, left for themes.
		 */
		do_action( 'wte_faqs_tab_title' );
	?>
	<div class="tmp-button-toggle">
		<input type="checkbox" class="checkbox">
		<div class="knobs">
			<span></span>
		</div>
		<b class="togg-txt-wrap-1"><?php esc_html_e( 'Expand all', 'travel-muni' ); ?></b>
		<b class="togg-txt-wrap-2"><?php esc_html_e( 'Collapse all', 'travel-muni' ); ?></b>
	</div>
	</div>

	<div class="post-data faq">
		<?php
		if ( isset( $faq['faq_title'] ) && ! empty( $faq['faq_title'] ) ) {
			$maxlen   = max( array_keys( $faq['faq_title'] ) );
			$arr_keys = array_keys( $faq['faq_title'] );
			foreach ( $arr_keys as $key => $value ) {
				if ( array_key_exists( $value, $faq['faq_title'] ) ) {
					?>
					<div id="faq-tabs<?php echo esc_attr( $value ); ?>"
						data-id="<?php echo esc_attr( $value ); ?>" class="faq-row">
						<a class="accordion-tabs-toggle" href="javascript:void(0);">
							<span class="dashicons dashicons-arrow-down custom-toggle-tabs rotator"></span>
							<div class="faq-title">
								<?php echo ( isset( $faq['faq_title'][ $value ] ) ? esc_html( $faq['faq_title'][ $value ] ) : '' ); ?>
							</div>
						</a>
						<div class="faq-content">
							<p>
								<?php
								$faq_content = isset( $faq['faq_content'][ $value ] ) ? $faq['faq_content'][ $value ] : '';
								echo wp_kses_post( apply_filters( 'the_content', html_entity_decode( $faq_content, 3, 'UTF-8' ) ) );
								?>
							</p>
						</div>
					</div>
					<?php
				}
			}
		}
		?>
	</div>
</div>

<?php
do_action( 'wte_after_faq_content' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
