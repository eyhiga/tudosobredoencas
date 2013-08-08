<?php 
/**
 * The Page Content template file. 
 *
 *
 * @package      Tuned
 * @author       Elod Horvath
 * @copyright    2013-... Elod Horvath
 * @since        1.0
 */
?>	
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php the_post_thumbnail(); ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>					
		</header><!-- end of .entry-header -->
				
		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'tuned' ), 'after' => '</div>' ) ); ?>
		</div><!-- end of .entry-content -->				
		
		<footer class="entry-meta">			
			<?php edit_post_link( __( 'Edit', 'tuned' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- end of .entry-meta -->
	</article><!-- end of post-<?php the_ID(); ?> -->