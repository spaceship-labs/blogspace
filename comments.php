<div class='comments'>
<ul class="commentlist">
<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
</ul>
</div>
<?php 
$author = (esc_attr( $commenter['comment_author'] ))?esc_attr( $commenter['comment_author'] ):"Name(required)";
$email = (esc_attr(  $commenter['comment_author_email'] ))?esc_attr(  $commenter['comment_author_email'] ):"Email Address(required)";
$url = (esc_attr( $commenter['comment_author_url'] ))?esc_attr( $commenter['comment_author_url'] ):"Web Site";
$fields =  array(
	'author' => '<div class="datos"><p class="comment-form-author">' .
		'<input title="Name(required)" class="check-field" id="author" name="author" type="text" value="' . $author . '" size="30"' . $aria_req . ' /></p>',
	'email'  => '<p class="comment-form-email">' .
		'<input title="Email Address(required)                                                                                             (Not Published)" class="check-field" id="email" name="email" type="text" value="' . $email . '" size="30"' . $aria_req . ' /></p>',
	'url'    => '<p class="comment-form-url">' .
		'<input title="Web Site" class="check-field" id="url" name="url" type="text" value="' . $url . '" size="30" /></p></div>',); 
					
$defaults = array('fields'=> apply_filters( 'comment_form_default_fields', $fields ),
	'comment_field'        => '<div class="comment"><p class="comment-form-comment"><textarea class="check-field" title="Write your comment here" id="comment" aria-required="true" rows="8" cols="45" name="comment">Write your comment here</textarea></p></div><div class="comment_separation"></div>',
	'must_log_in'          => '<p class="must-log-in">',
	'logged_in_as'         => '<p class="logged-in-as">',
	'comment_notes_before' => '<p class="comment-notes">',
	'comment_notes_after'  => '<dl class="form-allowed-tags">',
	'id_form'              => 'commentform',
	'id_submit'            => 'submit_comment',
	'title_reply'          => __( 'Leave a comment:' ),
	'title_reply_to'       => __( 'Leave a Reply to %s:' ),
	'cancel_reply_link'    => __( 'Cancel reply' ),
	'label_submit'         => __( ' ' ),);

comment_form($defaults);