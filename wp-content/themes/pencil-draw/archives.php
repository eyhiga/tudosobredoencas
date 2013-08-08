<?php
/*
Template Name: Archives Page
*/
?>
<?php get_header(); ?>
<div id="main-block">
	<div id="content">
		<div class="green-draw">
			<div class="top-green">
				<div class="bottom-green">
					<div class="transparent">
						<div class="entry">
							<h3 style="margin-top:1em">Latest posts for <?php bloginfo('name'); ?></h2>
							<?php
							if(have_posts()) { ?>
							<ul>
								<?php wp_get_archives('type=postbypost&limit=6&format=html'); ?>
							</ul>
							<?php } ?>
							<div class="clear-both"></div>
							<h3 style="margin-top:1em">Authors for <?php bloginfo('name'); ?></h2>
							<ul>
								<?php wp_list_authors('show_fullname=true&optioncount=true'); ?>
							</ul>
							<h3 style="margin-top:1em">Categories for <?php bloginfo('name'); ?></h2>
							<ul>
								<?php wp_list_categories('show_count=true&title_li='); ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!--#content-->
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>