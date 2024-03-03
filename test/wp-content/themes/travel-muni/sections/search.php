<?php
/**
 * Search Section
 *
 * @package Travel_Muni
 */

$ed_search = get_theme_mod( 'ed_search_bar', true );
if ( travel_muni_is_wte_advanced_search_active() && $ed_search ) { ?>
	<div class="trip-search">
		<div class="container">
			<?php echo do_shortcode( '[Wte_Advanced_Search_Form]' ); ?>
		</div>
	</div>
	<?php
}
