<?php
/**
 * Title: Post
 * Slug: travelsolution/post
 * Categories: travelsolution
 *
 * @package travelsolution
 * @since 1.0.0
 */

?>
<!-- wp:cover {"useFeaturedImage":true,"dimRatio":50,"minHeight":300,"isDark":false,"style":{"spacing":{"margin":{"bottom":"50px"},"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light" style="margin-bottom:50px;min-height:300px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:post-title {"textAlign":"center","level":1,"style":{"elements":{"link":{"color":{"text":"var:preset|color|bright"}}},"typography":{"fontSize":"38px"}},"textColor":"bright"} /-->

<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|bright"}}}},"textColor":"bright","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group has-bright-color has-text-color has-link-color"><!-- wp:paragraph -->
<p><?php echo esc_html__( 'Posted Date: ', 'travelsolution'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:post-date {"textAlign":"center","fontSize":"small"} /--></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:0;padding-bottom:0"><!-- wp:post-featured-image {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} /-->

<!-- wp:post-content /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"spacing":{"padding":{"right":"var:preset|spacing|20"}}}} -->
<p style="padding-right:var(--wp--preset--spacing--20)"><?php echo esc_html__( 'Categories: ', 'travelsolution'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:post-terms {"term":"category"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"spacing":{"padding":{"right":"var:preset|spacing|20"}}}} -->
<p style="padding-right:var(--wp--preset--spacing--20)"><?php echo esc_html__( 'Tags: ', 'travelsolution'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:post-terms {"term":"post_tag"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"color":{"background":"#e1e1e1"},"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|70","right":"var:preset|spacing|50","left":"var:preset|spacing|50"},"margin":{"top":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#e1e1e1;margin-top:var(--wp--preset--spacing--70);padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)"><!-- wp:comments -->
<div class="wp-block-comments"><!-- wp:comments-title /-->

<!-- wp:comment-template {"style":{"typography":{"lineHeight":"1.5"}},"fontSize":"extra-small"} -->
<!-- wp:columns {"backgroundColor":"base"} -->
<div class="wp-block-columns has-base-background-color has-background"><!-- wp:column {"width":"40px"} -->
<div class="wp-block-column" style="flex-basis:40px"><!-- wp:avatar {"size":40,"style":{"border":{"radius":"20px"}}} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:comment-author-name {"fontSize":"small"} /-->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"flex"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px"><!-- wp:comment-date {"fontSize":"small"} /-->

<!-- wp:comment-edit-link {"fontSize":"small"} /--></div>
<!-- /wp:group -->

<!-- wp:comment-content /-->

<!-- wp:comment-reply-link {"fontSize":"small"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
<!-- /wp:comment-template -->

<!-- wp:comments-pagination -->
<!-- wp:comments-pagination-previous /-->

<!-- wp:comments-pagination-numbers /-->

<!-- wp:comments-pagination-next /-->
<!-- /wp:comments-pagination -->

<!-- wp:post-comments-form /--></div>
<!-- /wp:comments --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->