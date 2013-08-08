<?php get_header(); ?>

<div id="content">
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div <?php post_class('single-page') ?> id="post-<?php the_ID(); ?>">
		
			<h2 class="entry-title"><?php the_title(); ?></h2>
			<p class="entry-meta"><?php _e('By ', 'tweaker4' ); ?><?php the_author_posts_link(); ?><?php _e( ' on ', 'tweaker4' ); ?><?php echo get_the_date(); ?><?php edit_post_link( __( 'Edit', 'tweaker4' ), ' | ', ''); ?></p>
			<div class="entry-content">
				
				<?php the_content(); ?>
				
			</div><!-- close .entry-content -->
			
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'tweaker4' ), 'after' => '</div>' ) ); ?>
            
			<?php if (!is_attachment()): ?>
				<div class="entry-meta-single">
					<?php tweaker4_cats_and_tags(); ?>
				</div><!-- close .entry-meta-single -->
			<?php endif; ?>
		
		</div><!-- close #post -->
		
		<div id="single">
		
			<div class="single-block">
			
				<?php comments_template('', true); ?>
			
			</div><!-- close .single-block -->
			
			<div class="nav">
			
				<div class="nav-left"><?php next_post_link( '&laquo; %link' ) ?></div>
				<div class="nav-right"><?php previous_post_link( '%link &raquo;' ) ?></div>
			
			</div><!-- close .nav -->
		
		</div><!-- close #single -->
		
	<?php endwhile; else: ?>
	
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<p><?php _e( 'Sorry, there does not appear to be any posts here.', 'tweaker4' ); ?></p>
		</div><!-- close #post -->
		
	<?php endif; ?>

</div><!-- close #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>