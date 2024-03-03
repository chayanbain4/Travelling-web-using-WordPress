<?php
/**
 * Common content for templates registered for taxonomies by WP Travel Engine.
 *
 * @package travel-muni
 */

list( $taxonomy_name ) = $args;

$terms = get_terms(
	$taxonomy_name,
	array(
		'orderby' => apply_filters( "travel_muni_{$taxonomy_name}_terms_order_by", 'date' ),
		'order'   => apply_filters( "travel_muni_{$taxonomy_name}_terms_order", 'ASC' ),
	)
);
?>
<div class="wte-tax-page-main">
	<?php
	if ( is_array( $terms ) ) {
		foreach ( $terms as $_term ) {
			$term_link              = get_term_link( $_term );
			$child_term_description = term_description( $_term, $taxonomy_name );
			$image_id               = get_term_meta( $_term->term_id, 'category-image-id', true );
			$short_desc             = get_term_meta( $_term->term_id, 'wte-shortdesc-textarea', true );
			$parent_terms           = travel_muni_get_term_top_most_parent( $_term, $taxonomy_name );
			$children_terms         = get_term_children( $_term->term_id, $taxonomy_name );
			if ( 0 === $_term->parent ) {
				?>
					<section class="wte-tax-wrap-main-pg
					<?php
					if ( ! $children_terms ) {
						echo esc_attr( 'single-child-wte-tax' );}
					?>
					">
						<div class="container">
							<div class="page-header-wrap">
								<?php if ( ! empty( $_term->name ) ) { ?>
									<h2 class="page-sub-title">
										<?php
										echo esc_html( $_term->name );
										if ( ! empty( $_term->count ) ) {
											?>
											<span>
												<?php
												// Translators: 1. Terms Count.
												echo esc_html( sprintf( _nx( '(%s Tour)', '(%s Tours)', $_term->count, 'Tours', 'travel-muni' ), $_term->count ) );
												?>
											</span>
											<?php
										}
										?>
									</h2>
								<?php } ?>
								<div class="page-sub-desc-linkwrap">
									<?php if ( ! empty( $short_desc ) ) { ?>
										<div class="page-sub-desc"><?php echo wp_kses_post( wpautop( wp_trim_words( $short_desc ) ) ); ?></div>
									<?php }if ( ! empty( $term_link ) ) { ?>
										<a href="<?php echo esc_url( $term_link ); ?>" class="page-sub-link"><?php esc_html_e( 'See All', 'travel-muni' ); ?></a>
									<?php } ?>
								</div>
							</div>
							<div class="wte-tax-main-wrap-pg">
								<?php
								if ( $children_terms ) {
										$i = 1;
									foreach ( $children_terms as $children ) {
										$children_term_link = get_term_link( $children );
										$children_image_id  = get_term_meta( $children, 'category-image-id', true );
										$children_term      = get_term_by( 'id', $children, $taxonomy_name );
										if ( 1 === $i ) {
											$children_image_thumb = 'travel-muni-wte-tax-thumb';
										} else {
											$children_image_thumb = 'travel-muni-middle-square-thumb';
										} ?>
										<div class="wte-tax-single-wrap">
											<?php if ( isset( $children_image_id ) && '' !== $children_image_id ) { ?>
												<div class="wte-tax-single-img-wrap">
													<a href="<?php echo esc_url( $children_term_link ); ?>">
													<?php echo wp_get_attachment_image( $children_image_id, $children_image_thumb, false, array( 'itemprop' => 'image' ) ); ?>
													</a>
												</div>
												<?php
											} else {
												travel_muni_get_fallback_svg( $children_image_thumb );// Fallback.
											} ?>
											<div class="wte-tax-single-desc">
												<h3 class="wte-tax-single-title">
													<a href="<?php echo esc_url( $children_term_link ); ?>">
													<?php if ( ! empty( $children_term->name ) ) { ?>
														<strong><?php echo esc_html( $children_term->name ); ?></strong>
													<?php }if ( ! empty( $children_term->count ) ) { ?>
														<span>
															<?php
															// Translators: 1. Number of children terms.
															echo esc_html( sprintf( __( ' ( %1$s tours )', 'travel-muni' ), esc_html( $children_term->count ) ) );
															?>
														</span>
													<?php } ?>
													</a>
												</h3>
											</div>
										</div>
										<?php
										$i++;
									}
								} else {
									if ( isset( $image_id ) && '' !== $image_id ) {
										?>
										<a href="<?php echo esc_url( $term_link ); ?>">
											<?php echo wp_get_attachment_image( $image_id, 'travel-muni-wte-tax-thumb', false, array( 'itemprop' => 'image' ) ); ?>
										</a>
										<?php
									} else {
										travel_muni_get_fallback_svg( 'travel-muni-wte-tax-thumb' );// Fallback.
									}
								}
								?>

							</div>
						</div>
					</section>
				<?php
			}
		}
	}
	?>
</div>
