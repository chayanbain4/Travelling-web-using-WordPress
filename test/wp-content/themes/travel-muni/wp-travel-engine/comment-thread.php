<?php
/**
 * Comment thread
 *
 * @package Travel_Muni
 */

?>
<li class="wte-review-comment-id" id="wte-review-comment-<?php comment_ID(); ?>" data-id="<?php comment_ID(); ?>">
	<?php do_action( 'comment_title' ); ?>
	<?php do_action( 'comment_reviewed_tour' ); ?>
	<?php do_action( 'comment_content' ); ?>
	<div class="client-intro-sc">
		<div class="client-dp">
			<?php do_action( 'comment_avatar' ); ?>
		</div>
		<div class="client-intro-rght">
			<?php do_action( 'comment_rating' ); ?>
			<div class="client-dap-details">
				<?php do_action( 'comment_meta_author' ); ?>
				<?php do_action( 'comment_client_location' ); ?>
			</div>
		</div>
	</div>
	<div class="trip-comment-content">
		<div class="comment-rating">
			<?php do_action( 'comment_meta_gallery' ); ?>
			<?php do_action( 'comment_experience_date' ); ?>
		</div><!--comment-rating-->
	</div><!--trip-comment-content-->
</li>
