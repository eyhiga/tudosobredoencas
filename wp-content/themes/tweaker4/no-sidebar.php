<?php 
/*
 * Template Name: 	No Sidebar
 * Template no-sidebar.php
 */
get_header(); ?>
	
    <div id="content-wide">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
                <h2><?php the_title(); ?></h2>
								
                <div class="entry-content">
					<?php the_content(); ?>
				</div><!-- close .entry-content-->
				
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'tweaker4' ), 'after' => '</div>' ) ); ?>
				
				<p class="entry-meta"><?php edit_post_link( __( 'Edit', 'tweaker4' ), '', ''); ?></p>
                
			</div><!-- close #post-->
			
            <div id="single">
				
                <div class="single-block">
					<?php comments_template( '', true ); ?>
				</div><!-- close .single-block-->
                
			</div><!-- close #single-->
		
		<?php endwhile; endif; ?>
	
    </div><!-- close #content-wide-->
    
</div><!-- close #container, opened in header.php-->
	
<?php get_footer(); ?>