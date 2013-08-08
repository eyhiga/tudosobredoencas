<?php 
/**
 * The Search template file. 
 *
 *
 * @package      Tuned
 * @author       Elod Horvath
 * @copyright    2013-... Elod Horvath
 * @since        1.0
 */
?>
<?php get_header(); ?>
	
	<div id="primary" class="content-area">
		<div id="content" class="site-content">		
			<?php if( have_posts() ) : ?>

				<header class="entry-header">			
					<h1 class="entry-title"><?php printf( __('Search results for: %s', 'tuned'), '<span>' . get_search_query() . '</span>' ); ?></h1>					
				</header><!-- end of .entry-header -->
			
				<?php while( have_posts() ) : the_post(); ?>
					<?php /* Include the Post-Format-specific template for the content.*/ 
						get_template_part( 'content', get_post_format() );
					?>
				<?php endwhile; ?>
				
				<?php tuned_content_nav( 'nav-below' ); ?>
				
			<?php else : ?>	
			
				<article id="post-0" class="post no-results">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing found', 'tuned' ); ?></h1>
					</header><!-- end of .entry-header -->
					<div class="entry-content">
						<p>
							<?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'tuned' ); ?>
						</p>
						<?php get_search_form(); ?>
					</div>
				</article><!-- end of #post-0 -->							
				
			<?php endif; ?>
			
		</div><!-- end of #content .site-content -->		
	</div><!-- end of #primary .content-area -->
<?php get_sidebar(); ?>
	
<?php get_footer(); ?>
