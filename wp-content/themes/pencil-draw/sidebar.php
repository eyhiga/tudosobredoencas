<?php
/*
Template Name: Sidebar
*/
?>
<div id="left-block">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
		<div class="widget">
			<div class="top-widget">
				<div class="bottom-widget">
					<div class="transparent">
						<h3><?php _e('Category:'); ?></h3>
						<ul>
							<?php wp_list_categories( 'orderby=id&order=DESC&title_li=' ); ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="widget">
			<div class="top-widget">
				<div class="bottom-widget">
					<div class="transparent">
						<h3><?php _e('Blogroll:'); ?></h3>
						<?php $args = array(
							'orderby'          => 'name',
							'order'            => 'ASC',
							'limit'            => -1,
							'category'         => '',
							'exclude_category' => '',
							'category_name'    => '',
							'hide_invisible'   => 1,
							'show_updated'     => 0,
							'echo'             => 1,
							'categorize'       => 0,
							'title_li'         => '',
							'title_before'     => '',
							'title_after'      => '',
							'category_orderby' => 'name',
							'category_order'   => 'ASC',
							'class'            => '',
							'category_before'  => '',
							'category_after'   => '' ); ?>
						<ul>
							<?php wp_list_bookmarks( $args ); ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="widget">
			<div class="top-widget">
				<div class="bottom-widget">
					<div class="transparent">
						<h3><?php _e('Archives:'); ?></h3>
						<ul>
							<?php wp_get_archives('type=monthly'); ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="widget">
			<div class="top-widget">
				<div class="bottom-widget">
					<div class="transparent">
						<h3><?php _e('Meta:'); ?></h3>
						<ul>
							<li><?php wp_loginout(); ?></li>
							<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
							<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
							<li><a href="http://validator.w3.org/check/referer" title="<?php _e('This page validates as XHTML 1.0 Transitional'); ?>"><?php _e('Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr>'); ?></a></li>
							<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
							<?php wp_meta(); ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div><!--#right-block-->