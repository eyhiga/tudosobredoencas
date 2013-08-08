<?php 
/**
 * The Page template file. 
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
					
			<?php while( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; ?>							

			<?php comments_template( '', true ); ?>
			
		</div><!-- end of #content .site-content -->		
	</div><!-- end of #primary .content-area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
