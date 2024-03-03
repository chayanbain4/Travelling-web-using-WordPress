<?php
/**
 * Travel Muni Single Trip Banner functions lists here
 *
 * @package Travel_Muni
 */

/*****************
 * Banner Functions
 *****************/

/**
 * Removing Gallery Slider from Trip Content
 *
 * @package Wp_Travel_Engine
 */
$single_trip_hooks = WP_Travel_Engine_Template_Hooks::get_instance();
remove_action( 'wte_single_trip_content', array( $single_trip_hooks, 'display_single_trip_gallery' ), 10 );


if ( ! function_exists( 'travel_muni_single_trip_feature_image' ) ) :
	/**
	 * Single Trip Feature Image
	 *
	 * @package Travel_Muni
	 */
	function travel_muni_single_trip_feature_image(){ 
	//enqueing the fancybox
	wp_enqueue_script( 'jquery-fancy-box' );
	wp_enqueue_style( 'jquery-fancy-box' );	
	?>
	<div class="tmp-gallery">
		<?php
		/**
		 * @hooked travel_muni_post_thumbnail - 10
		 */
		do_action( 'travel_muni_before_trip_entry_content' );
		?>
		<div class="st-gal container">
			<?php travel_muni_wte_gallery_override(); ?>
			<?php echo do_shortcode( '[wte_video_gallery label="Video"]' ); ?>
		</div>


	</div>
		<?php
	}
endif;

if ( ! function_exists( 'travel_muni_wte_gallery_override' ) ) :
	/**
	 * Single Trip Gallery Override
	 *
	 * @link https://codepen.io/fancyapps/pen/wEVbdY?editors=1010
	 * @package Travel_Muni
	 */
	function travel_muni_wte_gallery_override() {
		global $post;
		$wpte_trip_images = get_post_meta( $post->ID, 'wpte_gallery_id', true );
		if ( isset( $wpte_trip_images['enable'] ) && $wpte_trip_images['enable'] == '1' ) {
			if ( count( $wpte_trip_images ) > 1 ) {
				unset( $wpte_trip_images['enable'] );
				?>
			<div class="st-gallery-wrapper">
				<button class="gallery-btn">
					<i class="fa fa-image"></i>
					<span><?php esc_html_e( 'Gallery', 'travel-muni' ); ?></span>
				</button>
			</div>
				<?php
			}
		}
	}
endif;
