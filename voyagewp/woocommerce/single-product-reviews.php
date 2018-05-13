<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews" class="woocommerce-Reviews">
	<div id="comments">
		<h2 class="woocommerce-Reviews-title"><?php
			if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' && ( $count = $product->get_review_count() ) )
                printf( esc_html( _n( '%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'woocommerce' ) ), esc_html( $count ), '<span>' . get_the_title() . '</span>' );
			else
				esc_html_e( 'Reviews', 'voyage' );
		?></h2>

		<?php if ( have_comments() ) : ?>

			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
					'prev_text' => '&larr;',
					'next_text' => '&rarr;',
					'type'      => 'list',
				) ) );
				echo '</nav>';
			endif; ?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'voyage' ); ?></p>

		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>

		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
					$commenter = wp_get_current_commenter();

					$comment_form = array(
						'title_reply'          => have_comments() ? esc_html__( 'Add a review', 'voyage' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'voyage' ), get_the_title() ),
						'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'voyage' ),
                        'title_reply_before'   => '<span id="reply-title" class="comment-reply-title">',
                        'title_reply_after'    => '</span>',
						'comment_notes_before' => '',
						'comment_notes_after'  => '',
						'fields'               => array(
							'author' => '<p class="comment-form-author">' .
							            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" placeholder="'.esc_html__( 'Name*', 'voyage' ).'" /></p>',
							'email'  => '<p class="comment-form-email">' .
							            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" placeholder="'.esc_html__( 'Email*', 'voyage' ).'" /></p>',
						),
						'label_submit'  => esc_html__( 'Submit', 'voyage' ),
						'logged_in_as'  => '',
						'comment_field' => '',
					);

					if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
						$comment_form['must_log_in'] = '<p class="must-log-in">' .  sprintf( '%s <a href="%s">%s</a> %s', esc_html__( 'You must be', 'voyage' ), esc_url( $account_page_url ), esc_html__( 'logged in', 'voyage' ), esc_html__( 'to post a review.', 'voyage' ) ) . '</p>';
					}

					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
						$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . esc_html__( 'Your Rating', 'voyage' ) .'</label><select name="rating" id="rating">
							<option value="">' . esc_html__( 'Rate&hellip;', 'voyage' ) . '</option>
							<option value="5">' . esc_html__( 'Perfect', 'voyage' ) . '</option>
							<option value="4">' . esc_html__( 'Good', 'voyage' ) . '</option>
							<option value="3">' . esc_html__( 'Average', 'voyage' ) . '</option>
							<option value="2">' . esc_html__( 'Not that bad', 'voyage' ) . '</option>
							<option value="1">' . esc_html__( 'Very Poor', 'voyage' ) . '</option>
						</select></p>';
					}

					$comment_form['comment_field'] .= '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="'.esc_html__( 'Your review', 'voyage' ).'" ></textarea></p>';

					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'voyage' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>
