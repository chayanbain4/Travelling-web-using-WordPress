<?php
/**
 * Themeclub Panel.
 *
 * @package Travel_Muni
 */
?>
<!-- More themes -->
<div id="themes-panel" class="panel-left">
	<div class="theme-intro">
		<div class="theme-intro-left">
			<p>
			<?php
			printf(
				__(
					'For just a few bucks more, you will find a number of premium add-ons, designed especially for travel and tour websites and compatible with the %1$sTravel Muni%2$s theme. You can add extensive functionality to your travel website, be it setting a fixed tour departure date or a group discount or adding those glorious reviews on your website.  
				<br><br>
				All the addons come with %1$sSingle Site%2$s, %1$s2-5 Sites%2$s and %1$sUnlimited Sites Package%2$s, and support and product updates for a year.',
					'travel-muni'
				),
				'<strong>',
				'</strong>'
			);
			?>
			</p>
		</div>
		<div class="theme-intro-right">
			<a class="button-primary club-button" href="<?php echo esc_url( 'https://wptravelengine.com/plugins/' ); ?>" target="_blank"><?php esc_html_e( 'Learn about the Add-ons', 'travel-muni' ); ?>
				<i class="fas fa-arrow-right"></i>
			</a>
		</div>
	</div>
	<span class="theme-loader" style="display: none;"><i class="fas fa-spinner fa-spin"></i></span>
	<div class="theme-list"></div><!-- .theme-list -->
</div><!-- .panel-left updates -->
