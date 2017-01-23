<?php
/**
 * Child Comment Form
 *
 * This file calls the defines the output for the HTML5 blog comment form.
 *
 * @category     Child
 * @package      Structure
 * @author       Web Savvy Marketing
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since        2.0.0
 */

/** Edit comments form text **/

add_filter( 'comment_form_defaults', 'deborah_genesis_comment_form_args' );

function deborah_genesis_comment_form_args( $defaults ) {

	global $user_identity, $id;

	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? ' aria-required="true"' : '' );

	$author = '<p class="comment-form-author">' .
			 '<input id="author" name="author" type="text" placeholder="' . __( 'Name', 'deborah' ) .   ( $req ? '*' : '' ) .'" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" tabindex="1"' . $aria_req . ' />' .
			 '<label for="author">' . __( 'Name', 'deborah' ) .   ( $req ? '<span class="required">*</span>' : '' ) .'</label> ' .
			 '</p><!-- .form-section-author .form-section -->';

	$email = '<p class="comment-form-email">' .
			'<input id="email" name="email" type="text" placeholder="' . __( 'Email', 'deborah' ) .   ( $req ? '*' : '' ) .'" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" tabindex="2"' . $aria_req . ' />' .
			'<label for="email">' . __( 'Email', 'deborah' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label> ' .
			'</p><!-- .form-section-email .form-section -->';

		$url = '<p class="comment-form-url">' .
			'<input id="url" name="url" type="text" placeholder="' . __( 'Website', 'deborah' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" tabindex="2" />' .
	         '<label for="url">' . __( 'Website', 'deborah' ) . '</label> ' .
	         '</p><!-- .form-section-url .form-section -->';

	$comment_field = '<p class="comment-form-comment">' .
					'<label for="comment">' . __( 'Comment', 'deborah' ) . '</label>' .
	                  '<textarea id="comment" name="comment" placeholder="' . __( 'Comment', 'deborah' ) . '" cols="45" rows="8" tabindex="4" aria-required="true"></textarea>' .
	                 '</p>';

	$args = array(
		'fields'               => array(
			'author' => $author,
			'email'  => $email,
			'url'    => $url,
		),
		'comment_field'        => $comment_field,
		'title_reply'          => __( 'Leave a Comment', 'deborah' ),
		'label_submit' => __( 'Submit >>', 'deborah' ), //default='Post Comment'
		'title_reply_to' => __( 'Reply', 'deborah' ), //Default: __( 'Leave a Reply to %s' )
		'cancel_reply_link' => __( 'Cancel', 'deborah' ),//Default: __( 'Cancel reply' )
		'comment_notes_before' => '',
		'comment_notes_after'  => '',
	);

	/** Merge $args with $defaults */
	$args = wp_parse_args( $args, $defaults );

		/** Return filterable array of $args, along with other optional variables */
	return apply_filters( 'genesis_comment_form_args', $args, $user_identity, $id, $commenter, $req, $aria_req );

}

// Remove comments from Post types
add_action( 'init', 'deborah_remove_store_comments', 10 );
function deborah_remove_store_comments() {
    remove_post_type_support( 'store_page', 'comments' );
}