<?php
/**
 * Title: Latest Post
 * Slug: travelsolution/latestpost
 * Categories: travelsolution
 *
 * @package travelsolution
 * @since 1.0.0
 */

?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"50px","bottom":"50px"}},"color":{"background":"#f7f7f7"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background" style="background-color:#f7f7f7;padding-top:50px;padding-bottom:50px"><!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"36px"}}} -->
<h3 class="wp-block-heading has-text-align-center" style="font-size:36px"><strong><?php echo esc_html__( 'Latest Blog Posts', 'travelsolution'); ?></strong></h3>
<!-- /wp:heading -->

<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"30px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide" style="margin-top:30px"><!-- wp:query {"queryId":21,"query":{"perPage":"3","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[]},"enhancedPagination":true,"align":"wide"} -->
<div class="wp-block-query alignwide"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"0"}},"backgroundColor":"bright","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-bright-background-color has-background"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3","align":"wide","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} /-->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"20px","left":"20px","top":"20px","bottom":"20px"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px"><!-- wp:post-title {"textAlign":"center","isLink":true,"style":{"typography":{"fontSize":"18px"},"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}}}} /-->

<!-- wp:post-date {"textAlign":"center","style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"#01b3a7"}}},"color":{"text":"#01b3a7"}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->