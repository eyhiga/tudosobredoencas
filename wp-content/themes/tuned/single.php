<?php 
/**
 * The Single post template file. 
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
				<?php /* Include the Post-Format-specific template for the content.*/ 
					get_template_part( 'content', get_post_format() );
				?>
			<?php endwhile; ?>
				
			<?php tuned_single_nav(); ?>

			<?php comments_template( '', true ); ?>
			
		</div><!-- end of #content .site-content -->		
	</div><!-- end of #primary .content-area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
