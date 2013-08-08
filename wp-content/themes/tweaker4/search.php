<?php get_header(); ?>

<div id="content">
	
	<div class="archive-results">
		<span><?php printf( __( 'Search Results for: %s', 'tweaker4' ), '<strong>' . get_search_query() . '</strong>' ); ?></span>
	</div><!-- close .archive-results-->
	
	<?php if (have_posts()) : ?>
		
		<?php get_template_part( 'loop' ); ?>
		
		<?php if(function_exists( 'wp_pagenavi' )) { ?>
			
			<div class="page-navi">
				<?php wp_pagenavi(); ?>
			</div><!-- close .page-navi-->
		
		<?php } else { ?>
			
			<div class="nav">
				<div class="nav-left"><?php previous_posts_link( __( '&laquo; Newer Entries', 'tweaker4') ) ?></div>
				<div class="nav-right"><?php next_posts_link( __( 'Older Entries &raquo;', 'tweaker4') ) ?></div>
			</div><!-- close .nav-->
		
		<?php } ?>
	
	<?php else : ?>
		
		<p><?php _e( 'You have searched for something that could not be found. The following might be of assistance in finding whatever you are looking for:', 'tweaker4' ); ?></p>
		<?php get_template_part( 'find' ); ?>
	
	<?php endif; ?>
</div><!-- close #content-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>