<?php
/**
 * Single Trip header
 *
 * This template can be overridden by copying it to yourtheme/wp-travel-engine/single-trip/title.php.
 *
 * @package Wp_Travel_Engine
 * @subpackage Wp_Travel_Engine/includes/templates
 */

defined( 'ABSPATH' ) || exit;

$wp_travel_engine_setting = get_post_meta( get_the_ID(), 'wp_travel_engine_setting', true );
?>
<header class="entry-header">
	<h1 class="entry-title" itemprop="name">
	<?php the_title(); ?>
	</h1>
	<?php if ( isset( $wp_travel_engine_setting['trip_duration'] ) && '' !== $wp_travel_engine_setting['trip_duration'] ) { ?>
		<div class="duration-days">
			<span class="duration"><?php echo esc_html( number_format_i18n( $duration ) ); ?></span>
			<span class="days">
				<?php
                    if ( 'days' === $duration_unit ) printf( _n( 'Day', 'Days', $duration, 'travel-muni' ) );
                    if ( 'hours' === $duration_unit ) printf( _n( 'Hour', 'Hours', $duration, 'travel-muni' ) );
                ?>
			</span>
		</div>
	<?php } ?>
	<?php do_action( 'wp_travel_engine_header_hook' ); ?>
</header>
<!-- ./entry-header -->
<?php
/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */