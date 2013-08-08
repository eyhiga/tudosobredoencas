<?php
/*
Template Name: Search Page
*/
?>
<?php get_header(); ?>
<div id="main-block">
	<div id="content">
		<div class="green-draw">
			<div class="top-green">
				<div class="bottom-green">
					<div class="transparent">
					<h2 id="search-results-title" class="page-title">
						<?php _e( 'Search Results for: ', 'pencil-draw' ); ?><span><?php the_search_query(); ?></span>
					</h2>
					<?php if (have_posts()) : ?>
					<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
					<div class="comments-navigation">
						<span class="prev"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'pencil-draw' )) ?></span>
						<span class="next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'pencil-draw' )) ?></span>
						<div class="clear-both"></div>
					</div>
					<?php } ?>
					<?php while (have_posts()) : the_post(); ?>
					<div <?php post_class(); ?>>
						<h2 class="entry-title">
							<a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'pencil-draw'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a>
						</h2>
						<?php if ( $post->post_type == 'post' ) { ?>
						<div class="entry-meta">
							<span class="meta-prep meta-prep-author"><?php _e('By ', 'pencil-draw'); ?></span>
							<span class="author vcard"><a class="url fn n" href="<?php echo ('?author=' . get_the_author_meta('ID')); ?>" title="<?php printf( __( 'View all posts by %s', 'pencil-draw' ), $authordata->display_name ); ?>"><?php the_author_meta('first_name'); ?> <?php the_author_meta('last_name'); ?></a></span>
							<span class="meta-sep"> | </span>
							<span class="meta-prep meta-prep-entry-date"><?php _e('Published ', 'pencil-draw'); ?></span>
							<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
							<?php edit_post_link( __( 'Edit', 'pencil-draw' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
						</div>
					<?php } ?>
					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div>
					<?php if ( $post->post_type == 'post' ) { ?>        
						<div class="entry-utility">
							<span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in ', 'pencil-draw' ); ?></span><?php echo get_the_category_list(', '); ?></span>
							<span class="meta-sep"> | </span>
							<?php the_tags( '<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __('Tagged ', 'pencil-draw' ) . '</span>', ", ", "</span>\n\t\t\t\t\t\t<span class=\"meta-sep\">|</span>\n" ) ?>
							<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'pencil-draw' ), __( '1 Comment', 'pencil-draw' ), __( '% Comments', 'pencil-draw' ) ) ?></span>
							<?php edit_post_link( __( 'Edit', 'pencil-draw' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ) ?>
						</div>
					<?php } ?>
					</div>
					<?php endwhile; ?>
					<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
					<div class="comments-navigation">
						<span class="prev"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'pencil-draw' )) ?></span>
						<span class="next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'pencil-draw' )) ?></span>
						<div class="clear-both"></div>
					</div>
					<?php } ?>
					<div id="search-again" >
						<h3>Use the search form for more queries:</h3>
						<?php get_search_form(); ?>
					</div>
					<?php else : ?>
					<div class="title">
						<div id="post-0" class="post no-results not-found">
							<h2 class="entry-title"><?php _e( 'Nothing Found', 'pencil-draw' ) ?></h2>
							<div class="entry-content">
								<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'pencil-draw' ); ?></p>
								<?php get_search_form(); ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
				</div>
				</div>
			</div>
		</div>
	</div><!--#content-->
</div><!--#main-block-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>