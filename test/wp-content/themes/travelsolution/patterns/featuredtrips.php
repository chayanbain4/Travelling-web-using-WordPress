<?php
/**
 * Title: Featured Trips
 * Slug: travelsolution/featuredtrips
 * Categories: travelsolution
 *
 * @package travelsolution
 * @since 1.0.0
 */

?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"50px","bottom":"50px"}},"color":{"background":"#f7f7f7"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background" style="background-color:#f7f7f7;padding-top:50px;padding-bottom:50px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"700","fontSize":"36px"}}} -->
<h2 class="wp-block-heading has-text-align-center" style="font-size:36px;font-style:normal;font-weight:700"><strong><?php echo esc_html__( 'Featured Trips', 'travelsolution'); ?></strong></h2>
<!-- /wp:heading -->

<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"30px"}}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignwide" style="margin-top:30px"><!-- wp:wptravel/trips-list {"query":{"numberOfItems":3,"orderBy":"title","order":"desc"},"layoutType":"layout-one"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->