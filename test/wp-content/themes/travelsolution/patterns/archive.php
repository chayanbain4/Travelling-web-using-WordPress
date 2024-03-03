<?php
/**
 * Title: Archive
 * Slug: travelsolution/archive
 * Categories: travelsolution
 *
 * @package travelsolution
 * @since 1.0.0
 */

?>

<!-- wp:group {"tagName":"main","align":"full","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<main class="wp-block-group alignfull"><!-- wp:group {"tagName":"main","style":{"spacing":{"padding":{"bottom":"0","top":"0"},"blockGap":"0","margin":{"bottom":"50px"}}},"layout":{"type":"default"}} -->
<main class="wp-block-group" style="margin-bottom:50px;padding-top:0;padding-bottom:0"><!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri(  ));?>/assets/images/image3.jpg","id":35,"dimRatio":50,"minHeight":300,"style":{"spacing":{"margin":{"bottom":"50px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-cover" style="margin-bottom:50px;min-height:300px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-35" alt="" src="<?php echo esc_url(get_template_directory_uri(  ));?>/assets/images/image3.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:query-title {"type":"archive","textAlign":"center","style":{"typography":{"fontSize":"38px"}}} /--></div></div>
<!-- /wp:cover -->

<!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"layout":{"type":"constrained"}} -->
<div class="wp-block-query"><!-- wp:post-template {"align":"wide","layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"0"}},"backgroundColor":"bright","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-bright-background-color has-background"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3","align":"wide","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} /-->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"20px","left":"20px","top":"20px","bottom":"20px"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px"><!-- wp:post-title {"textAlign":"center","isLink":true,"style":{"typography":{"fontSize":"18px"},"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}}}} /-->

<!-- wp:post-date {"textAlign":"center","style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"#01b3a7"}}},"color":{"text":"#01b3a7"}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"20px"} -->
<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->
<!-- /wp:post-template -->

<!-- wp:query-pagination {"paginationArrow":"chevron","style":{"typography":{"lineHeight":"4.1"}},"layout":{"type":"flex","justifyContent":"space-between"},"fontSize":"small"} -->
<!-- wp:query-pagination-previous {"label":"Previous","fontSize":"medium"} /-->

<!-- wp:query-pagination-next {"label":"Next","fontSize":"medium"} /-->
<!-- /wp:query-pagination --></div>
<!-- /wp:query --></main>
<!-- /wp:group --></main>
<!-- /wp:group -->