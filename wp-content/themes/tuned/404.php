<?php 
/**
 * The Error-404 template file. 
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
			<article id="post-0" class="post error404">
			
			<header class="entry-header">			
				<h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'tuned' ); ?></h1>					
			</header><!-- .entry-header -->
			
			<div class="entry-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'tuned' ); ?></p>
					<?php get_search_form(); ?>
			</div><!-- .entry-content -->
			
			</article>
			
		</div><!-- end of #content .site-content -->		
	</div><!-- end of #primary .content-area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
