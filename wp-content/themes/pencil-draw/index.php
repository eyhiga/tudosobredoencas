<?php
/*
Template Name: Index, Main Page
*/
?>
<?php get_header(); ?>
<div id="main-block">
	<div id="content">
		<?php if (have_posts()) : ?>
			<ul>
				<?php while (have_posts()) : the_post(); ?>
					<li <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						<?php if(!is_sticky()) : ?>
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
										<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
									</div>
									<div class="postdata">
										<span class="category"><span><?php the_category(', ') ?></span></span>
										<span class="date"><?php the_time('D, M j, Y') ?></span>
										<span class="comments">
											<?php if ( post_password_required() ) : //only for WPMU instance? ?>
												<?php echo __('Enter password'); ?>
											<?php else : ?>
												<?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>
											<?php endif ; ?>
										</span>
									</div><!--.postdata-->
									<div class="entry">
										<?php the_content('Read&nbsp;more ...'); ?>
									</div>
									<div class="clear-both"></div>
									<div class="more-pages">
										<?php wp_link_pages('before=<p>&after=</p>&next_or_number=number&pagelink=Page no %'); ?>
									</div>
									<div class="more-pages">
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
										if ($children ) { 
											?>
											<ul>
												<?php echo $children; ?>
											</ul>
											<?php } ?>
									</div>
									<?php if(has_tag()!=null) { ?>
										<div class="post-tags">
											<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
										</div>
									<?php } ?>
									<div class="clear-both"></div>
									</div>
								</div>
							</div>
						</div>
					</li>
			<?php endwhile; ?>
			</ul>
			<div class="nav-entries">
				<span class="prev"><?php next_posts_link('<span>&laquo; Previous Entries</span>') ?></span>
				<span class="next"><?php previous_posts_link('<span>Next Entries &raquo;</span>') ?></span>
				<div class="clear-both"></div>
			</div>
			<div class="clear-both"></div><!--an issue of IE6-->
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