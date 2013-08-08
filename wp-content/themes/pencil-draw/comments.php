<?php
/*
Template Name: Comments
*/
?>
<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>
<!-- You can start editing here. -->
<?php // Begin Comments & Trackbacks ?>
<?php if ( have_comments() ) : ?>
<div id="comments">
	<h3 class="leavecomment"><?php comments_number('No Comments', 'One Comment', '% Comments' );?> to "<?php the_title(); ?>"</h3>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<div class="comments-navigation">
			<div class="prev"><?php previous_comments_link() ?></div>
			<div class="next"><?php next_comments_link() ?></div>
			<div class="clear-both"></div>
		</div>
	<?php endif; // check for comment navigation ?>
	<ul class="comments-list">
		<?php
		$commentargs = array(
			'max_depth' => 3, // edit here.
			'avatar_size' => 48,
			'reply_text' => 'Answer'
		);
		wp_list_comments($commentargs);
		?>
	</ul>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<div class="comments-navigation">
			<div class="prev"><?php previous_comments_link() ?></div>
			<div class="next"><?php next_comments_link() ?></div>
			<div class="clear-both"></div>
		</div>
	<?php endif; // check for comment navigation ?>
</div>
<?php endif; // End Comments ?>
<?php if ('open' == $post->comment_status) : ?>
	<!-- If comments are open, but there are no comments. -->
	<?php comment_form(); ?>
<?php else : // comments are closed ?>
	<!-- If comments are closed. -->
	<?php if (!is_page()) : // And is not a page ?>
		<p class="nocomments"><?php _e('Sorry, the comment form is closed at this time.'); ?></p>
	<?php endif; ?>
<?php endif; ?>