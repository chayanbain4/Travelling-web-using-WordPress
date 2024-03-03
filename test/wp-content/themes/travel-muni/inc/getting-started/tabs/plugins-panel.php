<?php
/**
 * Help Panel.
 *
 * @package Travel_Muni
 */
?>
<!-- Updates panel -->
<div id="plugins-panel" class="panel-left visible">
	<h4><?php esc_html_e( 'Recommended Plugins', 'travel-muni' ); ?></h4>
	<p><?php esc_html_e( 'Below is a list of recommended plugins to install that will help you get the best out of Travel Muni. Though every plugin is optional, it is recommended that you at least install WP Travel Engine & One Click Demo Import plugin to create a website similar to the Travel Muni demo.', 'travel-muni' ); ?></p>

	<hr/>

	<?php
	$free_plugins = array(
		'wp-travel-engine'       => array(
			'plugin_name'        => __( 'WP Travel Engine', 'travel-muni' ),
			'slug'               => 'wp-travel-engine',
			'filename'           => 'wp-travel-engine/wp-travel-engine.php',
			'settings-link'      => admin_url( 'edit.php?post_type=trip&page=class-wp-travel-engine-admin.php' ),
			'settings-link-text' => __( 'Settings', 'travel-muni' ),
		),
		'travel-booking-toolkit' => array(
			'plugin_name' => __( 'Travel Booking Toolkit', 'travel-muni' ),
			'slug'        => 'travel-booking-toolkit',
			'filename'    => 'travel-booking-toolkit/travel-booking-toolkit.php',
		),
		'one-click-demo-import'  => array(
			'plugin_name'        => __( 'One Click Demo Import', 'travel-muni' ),
			'slug'               => 'one-click-demo-import',
			'filename'           => 'one-click-demo-import/one-click-demo-import.php',
			'settings-link'      => admin_url( 'themes.php?page=pt-one-click-demo-import' ),
			'settings-link-text' => __( 'Settings', 'travel-muni' ),
		),
		'contact-form-7'         => array(
			'plugin_name'        => __( 'Contact Form 7', 'travel-muni' ),
			'slug'               => 'contact-form-7',
			'filename'           => 'contact-form-7/wp-contact-form-7.php',
			'settings-link'      => admin_url( 'admin.php?page=wpcf7' ),
			'settings-link-text' => __( 'Settings', 'travel-muni' ),
		),
		'regenerate-thumbnails'  => array(
			'plugin_name'        => __( 'Regenerate Thumbnails', 'travel-muni' ),
			'slug'               => 'regenerate-thumbnails',
			'filename'           => 'regenerate-thumbnails/regenerate-thumbnails.php',
			'settings-link'      => admin_url( 'tools.php?page=regenerate-thumbnails#/' ),
			'settings-link-text' => __( 'Settings', 'travel-muni' ),
		),
	);

	if ( $free_plugins ) {
		?>
		<h4 class="recomplug-title"><?php esc_html_e( 'Free Plugins', 'travel-muni' ); ?></h4>
		<p><?php esc_html_e( 'These Free Plugins might be handy for you.', 'travel-muni' ); ?></p>
		<div class="recomended-plugin-wrap">
			<?php
			foreach ( $free_plugins as $slug => $plugin ) {
				$info                 = travel_muni_call_plugin_api( $plugin['slug'] );
				$icon_url             = travel_muni_check_for_icon( $info->icons );
				$plugin_active_status = '';
				if ( is_plugin_active( $plugin['filename'] ) ) {
					$plugin_active_status = ' active';
				}
				?>
				<div class="recom-plugin-wrap">
					<div class="plugin-img-wrap">
						<img src="<?php echo esc_url( $icon_url ); ?>" alt="<?php echo esc_attr__( 'Plugin Icon', 'travel-muni' ); ?>"/>
						<div class="version-author-info">
							<span class="version"><?php printf( esc_html__( 'Version %s', 'travel-muni' ), $info->version ); ?></span>
							<span class="seperator">|</span>
							<span class="author"><?php echo esc_html( strip_tags( $info->author ) ); ?></span>
						</div>
					</div>
					<div class="plugin-title-install clearfix">
						<span class="title" title="<?php echo esc_attr( $info->name ); ?>">
							<?php echo esc_html( $info->name ); ?>
						</span>
						<div class="button-wrap <?php echo esc_attr( $plugin_active_status ); ?>" id="gs-<?php echo esc_attr( $slug ); ?>" data-slug="gs-<?php echo esc_attr( $slug ); ?>">
						   <div class="gs-recommended-plugin">
							<?php
							if ( ! is_plugin_active( $plugin['filename'] ) ) {
								if ( file_exists( WP_CONTENT_DIR . '/plugins/' . $plugin['filename'] ) ) {
									// activate if there is file on the wp-content/plugins
									?>
										<a
											class="activate-now button button-primary"
											data-slug="<?php echo esc_attr( $slug ); ?>"
											href="#"
											aria-label="<?php echo esc_attr( $plugin['plugin_name'] ); ?>"
											data-init="<?php echo esc_attr( $plugin['filename'] ); ?>"
											data-settings-link="<?php ( isset( $plugin['settings-link'] ) ) && print esc_url( $plugin['settings-link'] ); ?>"
											data-settings-link-text="<?php ( isset( $plugin['settings-link-text'] ) ) && print esc_attr( $plugin['settings-link-text'] ); ?>">
												<?php echo esc_html__( 'Activate', 'travel-muni' ); ?>
											</a>
									<?php } else { // install if there are not any plugins which are listed on wp-content/plugins ?>
										<a
											class="install-now button"
											data-slug="<?php echo esc_attr( $slug ); ?>"
											href="#"
											aria-label="<?php echo esc_attr( $plugin['plugin_name'] ); ?>"
											data-init="<?php echo esc_attr( $plugin['filename'] ); ?>"
											data-settings-link="<?php ( isset( $plugin['settings-link'] ) ) && print esc_url( $plugin['settings-link'] ); ?>"
											data-settings-link-text="<?php ( isset( $plugin['settings-link-text'] ) ) && print esc_attr( $plugin['settings-link-text'] ); ?>">
												<?php echo esc_html__( 'Install and Activate', 'travel-muni' ); ?>
											</a>
									<?php
									}
							} else {
								?>
								<a href="#" class="deactivate-now button" data-init="<?php echo esc_attr( $plugin['filename'] ); ?>"
									aria-label="<?php echo esc_attr( $plugin['plugin_name'] ); ?>"
									data-settings-link="<?php ( isset( $plugin['settings-link'] ) ) && print esc_url( $plugin['settings-link'] ); ?>"
									data-settings-link-text="<?php ( isset( $plugin['settings-link-text'] ) ) && print esc_attr( $plugin['settings-link-text'] ); ?>">
									<?php echo esc_html__( 'Deactivate', 'travel-muni' ); ?>
								</a>
								<?php
								if ( isset( $plugin['settings-link'] ) ) {
									?>
									<a class="gs-recommended-plugin-links button" data-slug="<?php echo esc_attr( $slug ); ?>" href="<?php ( isset( $plugin['settings-link'] ) ) && print esc_url( $plugin['settings-link'] ); ?>">
									<?php
									if ( isset( $plugin['settings-link-text'] ) ) {
										echo esc_attr( $plugin['settings-link-text'] );
									}
								}
								?>
								<?php
							}
							?>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	}
	?>
</div><!-- .panel-left -->
