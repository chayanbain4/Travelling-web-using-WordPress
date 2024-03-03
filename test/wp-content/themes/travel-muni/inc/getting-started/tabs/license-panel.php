<?php
/**
 * Right Buttons Panel.
 *
 * @package Travel_Muni
 */
?>
<div class="panel-right">

	<!-- Knowledge base -->
	<div class="panel-aside">
		<h4><?php esc_html_e( 'Visit the Knowledge Base', 'travel-muni' ); ?></h4>
		<p><?php esc_html_e( 'Need help with using the WordPress as quickly as possible? Visit our well-organized Knowledge Base!', 'travel-muni' ); ?></p>
		<p><?php esc_html_e( 'Our Knowledge Base has step-by-step tutorials, from installing the WordPress to working with themes and more.', 'travel-muni' ); ?></p>

		<a class="button button-primary" href="<?php echo esc_url( 'https://docs.wptravelengine.com/docs/' . TRAVEL_MUNI_THEME_TEXTDOMAIN . '/' ); ?>" title="<?php esc_attr_e( 'Visit the knowledge base', 'travel-muni' ); ?>" target="_blank">
			<?php esc_html_e( 'Visit the Knowledge Base', 'travel-muni' ); ?>
		</a>
	</div><!-- .panel-aside knowledge base -->
</div><!-- .panel-right -->
