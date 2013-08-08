<?php 
/**
 * The Comments template file. 
 *
 *
 * @package      Tuned
 * @author       Elod Horvath
 * @copyright    2013-... Elod Horvath
 * @since        1.0
 */
?>
<?php if( post_password_required() )
	return; 
?>

<div id="comments" class="comment-area">

	<?php if( have_comments() ) : ?>
		<h3 class="comment-title"><?php comments_number(  __( 'No Responses to', 'tuned' ), __( 'One Response to', 'tuned' ), __( '% Responses to', 'tuned' )  ); ?> &quot;<?php the_title(); ?>&quot;</h3>	
	
	<ol class="commentlist">
		<?php wp_list_comments( array( 'style'=>'ol', 'avatar_size' => 44 ) ); ?>
	</ol><!-- end of .commentlist -->
	
	<nav id="comment-nav-below" class="navigation">
		<span class="nav-previous"><?php previous_comments_link(); ?></span>
		<span class="nav-next"><?php next_comments_link(); ?></span>
	</nav><!-- end of #comment-nav-below .navigation -->
	
	<?php endif; ?>
	
	<?php if( !comments_open() && have_comments() ) : ?>
		<p class="nocomments">
			<?php _e( 'Comments are closed.' , 'tuned' ); ?>
		</p>
	<?php endif; ?>
	
	<?php comment_form(); ?>
	
</div><!-- end of #comments .comment-area -->