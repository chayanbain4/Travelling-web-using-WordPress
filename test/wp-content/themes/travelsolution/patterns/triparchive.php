<?php
/**
 * Title: Trip Archive
 * Slug: travelsolution/triparchive
 * Categories: travelsolution
 *
 * @package travelsolution
 * @since 1.0.0
 */

?>
<!-- wp:cover {"url":"wp-content/themes/travelsolution/patterns/bannerslider.php","id":32,"dimRatio":50,"minHeight":300,"style":{"spacing":{"margin":{"bottom":"50px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover" style="margin-bottom:50px;min-height:300px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-32" alt="" src="wp-content/themes/travelsolution/patterns/bannerslider.php" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:query-title {"type":"archive","textAlign":"center","level":2,"style":{"elements":{"link":{"color":{"text":"var:preset|color|bright"}}},"typography":{"fontSize":"38px"}},"textColor":"bright"} /--></div></div>
<!-- /wp:cover -->

<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"50px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-bottom:50px"><!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"30%"} -->
<div class="wp-block-column" style="flex-basis:30%"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|60","right":"var:preset|spacing|60"}}},"backgroundColor":"bright","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-bright-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--60)"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo esc_html__( 'Trip Filter', 'travelsolution'); ?></h3>
<!-- /wp:heading -->

<!-- wp:wptravel/trip-filters /--></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"70%"} -->
<div class="wp-block-column" style="flex-basis:70%"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|60","right":"var:preset|spacing|60"}}},"backgroundColor":"bright","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group has-bright-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--60)"><!-- wp:wptravel/trips-list {"inheritTrips":true,"layoutType":"layout-one"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

