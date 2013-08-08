<?php get_header(); ?>

<div id="content">
    
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
        
		<h2><?php _e( 'Not Found', 'tweaker4' ); ?></h2>
        <p><?php _e( 'Sorry, but you are looking for something that is not here.', 'tweaker4' ); ?></p>
    
	<?php endif; ?>

</div><!-- close #content-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>