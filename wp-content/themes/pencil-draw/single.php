<?php
/*
Template Name: Single Post
*/
?>
<?php get_header(); ?>
<div id="main-block">
	<div id="content">
		<?php if (have_posts()) : ?>
			<ul>
				<?php while (have_posts()) : the_post(); ?>
					<li <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						<?php if(!is_sticky()) :?>
						<div class="blue-draw">
							<div class="top-blue">
								<div class="bottom-blue">
						<?php else : ?>
						<div class="green-draw">
							<div class="top-green">
								<div class="bottom-green">
						<?php endif ; ?>
									<div class="transparent">
										<div class="title">
											<h2>
												<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
											</h2>
										</div>
										<div class="postdata">
											<?php if(!is_attachment()) : ?>
												<span class="category"><?php the_category(', ') ?></span>
											<?php endif ; ?>
											<span class="date"><?php the_time('D, M j, Y') ?></span>
										</div><!--.postdata-->
										<div class="clear-both"></div><!--Fixing IE overlap-->
										<?php if(!is_attachment()) : ?>
											<div id="page-feeds">
												<a class="float-left" id="rss-feed" href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>">
												</a>
												<!--Don't forget to add the feedburner link-->
												<a class="float-left" id="feedburner" href="#" title="<?php _e('Subscribe to receive feeds by mail'); ?>">
												</a>
												<!--Feedburner link-->
												<a class="float-left" id="twitter" href="http://twitter.com/share" title="<?php _e('Share this on Twitter'); ?>">
												</a>
												<a class="float-left" id="facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>" title="<?php _e('Share this on Facebook'); ?>">
												</a>
												<div class="clear-both"></div>
											</div>
										<?php endif; ?>
										<div class="entry">
											<?php the_content('Read&nbsp;more ...'); ?>
										</div>
										<div class="clear-both"></div>
										<div class="more-pages">
											<?php wp_link_pages('before=<p style="margin-top:0.5em">&after=</p>&next_or_number=number&pagelink=Page no %'); ?>
										</div>
										<?php //Check if first name, last name exist and display them else, display user login name
											$author_id = get_current_user_id();
											$post_author_info = get_userdata($author_id);
										?>
										<?php if (($post_author_info->first_name) != null || ($post_author_info->last_name) != null) : ?>
											<p id="author-post">Posted by <strong><a class="url fn n" href="<?php echo (get_home_url() . '/?author=' . get_the_author_meta('ID')); ?>" title="<?php printf( __( 'View all posts by %s %s', 'pencil-draw' ), $authordata->user_firstname, $authordata->user_lastname ); ?>"><?php the_author_meta('first_name'); ?> <?php the_author_meta('last_name'); ?></a></strong> @ <?php the_time() ?> for <?php the_category(", ") ?> | <?php edit_post_link(__('Edit')); ?></p>
										<?php else : ?>
											<p id="author-post">Posted by <strong><a class="url fn n" href="<?php echo (get_home_url() . '/?author=' . get_the_author_meta('ID')); ?>" title="<?php printf( __( 'View all posts by %s', 'pencil-draw' ), $authordata->user_login ); ?>"><?php the_author_meta('user_login'); ?></a></strong> @ <?php the_time() ?> for <?php the_category(", ") ?> | <?php edit_post_link(__('Edit')); ?></p>
										<?php endif ; ?>
										<?php if(has_tag()!=null) { ?>
											<div class="post-tags">
												<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
											</div>
										<?php } ?>
										<div class="posts-navigation">
											<span class="prev"> <?php next_post_link('%link', 'Next post in category', TRUE); ?></span>
											<span class="next"> <?php previous_post_link('%link', 'Previous post in category', TRUE); ?></span>
											<div class="clear-both"></div>
										</div>
										<?php comments_template(); ?>
									</div>
								</div>
							</div>
						</div>
					</li>
				<?php endwhile; ?>
			</ul>
		<?php else : ?>
		<div class="blue-draw">
			<div class="top-blue">
				<div class="bottom-blue">
					<div class="transparent">
						<div class="title">
							<h2 class="text-center">Word(s) not found in any sentence.</h2>
						</div>
						<div class="entry">
							<p id="not-found" class="text-center">Sorry, but you are looking for something that isn't here.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div><!--#content-->
</div><!--#main-block-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>