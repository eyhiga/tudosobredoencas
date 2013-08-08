<?php 
/**
*	Template Name: Front Page Template
*/
?>
<?php get_header( ); ?>			
	<div id="primary" class="content-area full-width front-page">
		<div id="content" class="site-content">
			
			<?php if( is_active_sidebar( 'frontend-grid-1' ) ) : ?>
			<?php dynamic_sidebar('frontend-grid-1'); ?>
			<?php endif; ?>
			
			<?php if( is_active_sidebar( 'frontend-grid-3' ) ) : ?>
			<?php dynamic_sidebar('frontend-grid-3'); ?>
			<?php endif; ?>			
						
		</div><!-- end of #content .site-content -->		
	</div><!-- end of #primary .content-area -->
<?php get_footer(); ?>
