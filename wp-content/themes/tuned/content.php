<?php 
/**
 * The Content template file. 
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
			<?php $featured_image_url = wp_get_attachment_image_src(get_post_thumbnail_id()); ?>
			<?php if( strpos($featured_image_url[0], '_icon') === false ) : ?>
				<?php the_post_thumbnail(); ?>
			<?php endif; ?>
			<?php if( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>						
			<?php endif; ?>
			<div class="entry-meta-author">
				<?php tuned_entry_meta_author(); ?>
			</div>
		</header><!-- end of .entry-header -->
		
		<?php if( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- end of .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __('Continue reading <span class="meta-nav">&rarr;</span>', 'tuned') ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'tuned' ), 'after' => '</div>' ) ); ?>
		</div><!-- end of .entry-content -->		
		<?php endif; ?>
		
		<footer>
			<div class="entry-meta-ct">
				<?php tuned_entry_meta_ct(); ?>
			</div>			
			<?php edit_post_link( __( 'Edit', 'tuned' ), '<span class="edit-link">', '</span>' ); ?>		
		</footer><!-- end of footer -->
	</article><!-- end of post-<?php the_ID(); ?> -->