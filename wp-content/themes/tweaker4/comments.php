<?php
	if (!empty($_SERVER[ 'SCRIPT_FILENAME' ]) && 'comments.php' == basename($_SERVER[ 'SCRIPT_FILENAME' ]))
		die ( __( 'Please do not load this page directly. Thanks!', 'tweaker4' ) );
	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view comments.', 'tweaker4' ); ?></p>
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<div class="nav">
			<div class="nav-left"><?php next_comments_link( __( '&laquo; Newer Comments', 'tweaker4' ) ); ?></div>
			<div class="nav-right"><?php previous_comments_link( __( 'Older Comments &raquo;', 'tweaker4' ) ); ?></div>
		</div><!-- close .nav-->
	<?php endif ?>
	
	<?php if ( ! empty($comments_by_type[ 'comment' ]) ) : ?>
		
		<h3 id="comments"><?php comments_number( __( 'No Responses to', 'tweaker4' ), __( 'One Response to', 'tweaker4' ), __( '% Responses to', 'tweaker4' ) );?> '<?php the_title(); ?>'</h3>
		<ol class="commentlist">
			<?php $reply = __( 'Reply', 'tweaker4' ); ?>
			<?php wp_list_comments( 'type=comment&callback=tweaker4_comment&avatar_size=60&reply_text='.$reply ); ?>
		</ol>
	
	<?php endif; ?>
	
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<div class="nav">
			<div class="nav-left"><?php next_comments_link( __( '&laquo; Newer Comments', 'tweaker4' ) ); ?></div>
			<div class="nav-right"><?php previous_comments_link( __( 'Older Comments &raquo;', 'tweaker4' ) ); ?></div>
		</div><!-- close .nav-->
	<?php endif ?>
	
	<?php if ( ! empty($comments_by_type[ 'pings' ]) ) : ?>
		
		<h5 id="pings">Trackbacks/Pingbacks</h5>
		<ol class="commentlist">
			<?php $reply = __( 'Reply', 'tweaker4' ); ?>
			<?php wp_list_comments( 'type=pings&callback=tweaker4_comment&avatar_size=60&reply_text='.$reply ); ?>
		</ol>
	
	<?php endif; ?>
	
<?php else : ?>
	
	<?php if ( 'open' == $post->comment_status ) : ?>
	<?php else : ?>
	 	
		<?php if (is_page()): ?>
		<?php else: ?>
			
			<p class="nocomments"><?php _e( 'Comments are closed.', 'tweaker4' ); ?></p>
		
		<?php endif; ?>
	
	<?php endif; ?>

<?php endif; ?>

<?php if ( 'open' == $post->comment_status ) : ?>

	<?php $required_text = __( ' Required fields are marked <span class="required">*</span>', 'tweaker4' ); ?>
	
	<?php $tweaker3_comment_args = array( 'fields' => apply_filters( 'comment_form_default_fields', array(
    'author' => '<p class="comment-form-author">' .
                '<label for="author">' . __( 'Name', 'tweaker4' ) . '</label> ' .
                ( $req ? '<span class="required">*</span>' : '' ) .
                '<input id="author" name="author" type="text" value="' .
                esc_attr( $commenter['comment_author'] ) . '"  />' .
                '</p>',
    'email'  => '<p class="comment-form-email">' .
                '<label for="email">' . __( 'Email', 'tweaker4' ) . '</label> ' .
                ( $req ? '<span class="required">*</span>' : '' ) .
                '<input id="email" name="email" type="text" value="' . 
				esc_attr(  $commenter['comment_author_email'] ) . '" />' .
				'</p>',
    'url'    => '<p class="comment-form-url">' .
				'<label for="url">' . __( 'Website', 'tweaker4' ) . '</label>' .
	            '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></p>' ) ),
    'comment_field' => '<p class="comment-form-comment">' .
                '<label for="comment">' . __( 'Comment', 'tweaker4' ) . '</label>' .
                '<textarea id="comment" name="comment" rows="8"></textarea>' .
                '</p>',
    'comment_notes_after' => '',
	'title_reply'=> __( 'Leave a Reply', 'tweaker4' ),
	'logged_in_as'=> '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'tweaker4' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
	'label_submit'=> __( 'Post Comment', 'tweaker4' ),
	'comment_notes_before'=> '<p class="comment-notes">' . __( 'Your email address will not be published.', 'tweaker4' ) . ( $req ? $required_text : '' ) . '</p>',
	'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'tweaker4' ), wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
	'cancel_reply_link' => __( 'Cancel reply', 'tweaker4' ),
	);
	
	comment_form($tweaker3_comment_args); ?>

<?php endif; ?>