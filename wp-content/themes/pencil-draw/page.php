<?php
/*
Template Name: Single Page
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
										<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
									</div>
									<div class="postdata">
										<span class="comments"><?php comments_popup_link('No Comments', '1 Comment', '% Comments', '', 'Comments Off'); ?></span>
									</div><!--.postdata-->
									<div class="clear-both"></div>
									<div id="page-feeds">
										<a class="float-left" id="rss-feed" href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>">
										</a> 
										<a class="float-left" id="feedburner" href="#" title="<?php _e('Subscribe to receive feeds by mail'); ?>">
										</a>
										<a class="float-left" id="twitter" href="http://twitter.com/share" title="<?php _e('Share this on Twitter'); ?>">
										</a>
										<a class="float-left" id="facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>" title="<?php _e('Share this on Facebook'); ?>">
										</a>
										<div class="clear-both"></div>
									</div>
									<div class="entry">
										<?php the_content('Read&nbsp;more ...'); ?>
									</div>
									<div class="clear-both"></div>
									<div class="more-pages">
										<?php wp_link_pages('before=<p>&after=</p>&next_or_number=number&pagelink=Page no %'); ?>
									</div>
									<div class="post-tags">
										<?php //the_tags( '<p>Tags: ', ', ', '</p>'); ?>
										<?php
											$this_page = get_post($id);
											$parent_id = $this_page->post_parent;
											if ($parent_id) {
												$parent = get_page($parent_id);
												echo '<a style="margin-top:0.5em" href="'.get_permalink($parent->ID).'" title="">'.get_the_title($parent->ID).'</a>';
												}
										?>	
										<?php
											$children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0');
											if ($children) { 
											?>
											<ul class="children-pages">
												<?php echo $children; ?>
											</ul>
											<?php } ?>										
									</div>
									<div class="clear-both"></div>
									<?php if ('open' == $post->comment_status) : ?>
										<?php comments_template(); ?>
									<?php endif; ?>
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