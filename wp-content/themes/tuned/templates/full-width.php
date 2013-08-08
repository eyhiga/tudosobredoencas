<?php 
/**
	Template Name: Full Width
*/
?>
<?php get_header(); ?>
	
	<div id="primary" class="content-area full-width">
		<div id="content" class="site-content">		
					
			<?php while( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; ?>							

			<?php comments_template( '', true ); ?>
			
		</div><!-- end of #content .site-content -->		
	</div><!-- end of #primary .content-area -->
<?php get_footer(); ?>
