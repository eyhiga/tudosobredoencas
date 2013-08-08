<?php 
/**
 * The main template file. 
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
				<?php while( have_posts() ) : the_post(); ?>
					<?php /* Include the Post-Format-specific template for the content.*/ 
						get_template_part( 'content', get_post_format() );
					?>
				<?php endwhile; ?>
				
				<?php tuned_content_nav( 'nav-below' ); ?>
				
			<?php elseif( current_user_can( 'edit_posts' ) ) : ?>	
			
				<article id="post-0" class="post no-results">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'No posts to display', 'tuned' ); ?></h1>
					</header><!-- end of .entry-header -->
					<div class="entry-content">
						<p>
							<?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'tuned' ), admin_url( 'post-new.php' ) ); ?>
						</p>
					</div>
				</article><!-- end of #post-0 -->
				
			<?php else : ?>
				
				<article id="post-0" class="post no-results">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'No posts to display', 'tuned' ); ?></h1>
					</header><!-- end of .entry-header -->					
				</article><!-- end of #post-0 -->
				
			<?php endif; ?>
			
		</div><!-- end of #content .site-content -->		
	</div><!-- end of #primary .content-area -->
<?php get_sidebar(); ?>
	
<?php get_footer(); ?>
