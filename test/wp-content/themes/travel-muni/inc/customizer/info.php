<?php
/**
 * Travel Muni Theme Info
 *
 * @package Travel_Muni
 */

if ( ! function_exists( 'travel_muni_customizer_theme_info' ) ) :

	/**
	 * Add theme info
	 */
	function travel_muni_customizer_theme_info( $wp_customize ) {

		$wp_customize->add_section(
			'theme_info_section',
			array(
				'title'    => __( 'Demo & Documentation', 'travel-muni' ),
				'priority' => 6,
			)
		);

		/** Important Links */
		$wp_customize->add_setting(
			'theme_info_setting',
			array(
				'default'           => '',
				'sanitize_callback' => 'wp_kses_post',
			)
		);

		$theme_info = '<p>';

		/* translators: 1: string, 2: preview url, 3: string */
		$theme_info .= sprintf( '%1$s<a href="%2$s" target="_blank">%3$s</a>', esc_html__( 'Demo Link : ', 'travel-muni' ), esc_url( __( 'https://wptravelenginedemo.com/travel-muni/', 'travel-muni' ) ), esc_html__( 'Click here.', 'travel-muni' ) );

		$theme_info .= '</p><p>';

		/* translators: 1: string, 2: documentation url, 3: string */
		$theme_info .= sprintf( '%1$s<a href="%2$s" target="_blank">%3$s</a>', esc_html__( 'Documentation Link : ', 'travel-muni' ), esc_url( 'https://docs.wptravelengine.com/docs/travel-muni/' ), esc_html__( 'Click here.', 'travel-muni' ) );

		$theme_info .= '</p>';

		$theme_info .= sprintf(
			'<p>%3$s<a href="%2$s" target="_blank">%1$s</a></p>',
			__( 'Click Here', 'travel-muni' ),
			esc_url( 'https://wptravelengine.com/support-ticket/' ),
			__( 'Support Link : ', 'travel-muni' )
		);

		$wp_customize->add_control(
			new Travel_Muni_Note_Control(
				$wp_customize,
				'theme_info_setting',
				array(
					'section'     => 'theme_info_section',
					'description' => $theme_info,
				)
			)
		);

	}
endif;
add_action( 'customize_register', 'travel_muni_customizer_theme_info' );

if ( class_exists( 'WP_Customize_Section' ) ) :
	/**
	 * Adding Go to Pro Section in Customizer
	 * https://github.com/justintadlock/trt-customizer-pro
	 */
	class Travel_Muni_Customize_Section_Pro extends WP_Customize_Section {

		/**
		 * The type of customize section being rendered.
		 *
		 * @since  1.0.0
		 * @access public
		 * @var    string
		 */
		public $type = 'travel-muni-pro-section';

		/**
		 * Custom button text to output.
		 *
		 * @since  1.0.0
		 * @access public
		 * @var    string
		 */
		public $pro_text = '';

		/**
		 * Custom pro button URL.
		 *
		 * @since  1.0.0
		 * @access public
		 * @var    string
		 */
		public $pro_url = '';

		/**
		 * Add custom parameters to pass to the JS via JSON.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		public function json() {
			$json = parent::json();

			$json['pro_text'] = $this->pro_text;
			$json['pro_url']  = esc_url( $this->pro_url );

			return $json;
		}

		/**
		 * Outputs the Underscore.js template.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		protected function render_template() { ?>
		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
			<h3 class="accordion-section-title">
				{{ data.title }}
				<# if ( data.pro_text && data.pro_url ) { #>
					<a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
				<# } #>
			</h3>
		</li>
			<?php
		}
	}
endif;

add_action( 'customize_register', 'travel_muni_page_sections_pro' );

function travel_muni_page_sections_pro( $manager ) {
	// Register custom section types.
	$manager->register_section_type( 'Travel_Muni_Customize_Section_Pro' );

	// Register sections.
	$manager->add_section(
		new Travel_Muni_Customize_Section_Pro(
			$manager,
			'travel_muni_view_pro',
			array(
				'title'    => esc_html__( 'Pro Available', 'travel-muni' ),
				'priority' => 5,
				'pro_text' => esc_html__( 'VIEW PRO THEME', 'travel-muni' ),
				'pro_url'  => esc_url( 'https://wptravelengine.com/wordpress-travel-themes/travel-muni-pro/' ),
			)
		)
	);
}
