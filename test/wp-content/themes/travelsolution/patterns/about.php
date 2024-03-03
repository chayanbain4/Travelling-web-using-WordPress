<?php
/**
 * Title: About
 * Slug: travelsolution/about
 * Categories: travelsolution
 *
 * @package travelsolution
 * @since 1.0.0
 */

?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"100px","bottom":"var:preset|spacing|40"}}},"backgroundColor":"bright","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-bright-background-color has-background" style="padding-top:100px;padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:image {"id":2511,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url(get_template_directory_uri(  ));?>/assets/images/image1.jpg" alt="" class="wp-image-2511"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontSize":"25px","lineHeight":"1.2"}}} -->
<h3 class="wp-block-heading has-text-align-left" style="font-size:25px;line-height:1.2"><?php echo esc_html__( 'ABOUT US', 'travelsolution'); ?></h3>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"left","style":{"typography":{"fontSize":"36px"}}} -->
<h2 class="wp-block-heading has-text-align-left" style="font-size:36px"><strong><?php echo esc_html__( 'Discover New Horizons', 'travelsolution'); ?></strong></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"},"spacing":{"padding":{"left":"0","right":"40px"}}}} -->
<p style="padding-right:40px;padding-left:0;font-size:14px"><?php echo esc_html__( 'Wonder Tour is committed to bringing our clients the best in value and quality travel arrangements. We are passionate about travel and sharing the worlds wonders with you.', 'travelsolution'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50)"><!-- wp:button {"style":{"border":{"radius":"0px"},"color":{"background":"#01b3a7"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background wp-element-button" href="#" style="border-radius:0px;background-color:#01b3a7"><?php echo esc_html__( 'Get in Touch', 'travelsolution'); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"backgroundColor":"bright","textColor":"contrast","style":{"border":{"radius":"0px","width":"1px"},"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"borderColor":"contrast","className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a  href="#" class="wp-block-button__link has-contrast-color has-bright-background-color has-text-color has-background has-link-color has-border-color has-contrast-border-color wp-element-button" style="border-width:1px;border-radius:0px"><?php echo esc_html__( 'Read More', 'travelsolution'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->