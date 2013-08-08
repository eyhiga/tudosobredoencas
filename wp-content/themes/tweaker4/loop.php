<?php while (have_posts()) : the_post(); ?>
	
	<div <?php post_class('loop') ?> id="post-<?php the_ID(); ?>">
			
		<?php if ( get_post_format() == '' ): ?>
			
			<div class="entry-title">
				
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( __( 'Permalink to %s', 'tweaker4' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h2>
			
			</div><!-- close .entry-title-->
		
		<?php endif; ?>
		
		<?php if ( get_post_format() == '' ): ?>
			
			<div class="entry-meta">
				
				<?php if (is_sticky()): ?>
					<p><?php _e('Featured | By ', 'tweaker4' ); ?><?php the_author_posts_link(); ?><?php _e( ' on ', 'tweaker4' ); ?><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( __( 'Permalink to %s', 'tweaker4' ), the_title_attribute( 'echo=0' ) ); ?>"><?php echo get_the_date(); ?></a></p>
				<?php else: ?>
					<p><?php _e('By ', 'tweaker4' ); ?><?php the_author_posts_link(); ?><?php _e( ' on ', 'tweaker4' ); ?><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( __( 'Permalink to %s', 'tweaker4' ), the_title_attribute( 'echo=0' ) ); ?>"><?php echo get_the_date(); ?></a></p>
				<?php endif; ?>
			
			</div><!-- close .entry-meta-->
		
		<?php endif; ?>
		
		<div class="entry-content">
		
			<?php if ( has_post_thumbnail()) : ?>
			   <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail', array('class' => 'alignleft', 'title' => '', 'alt' => '' )); ?></a>
			<?php endif; ?>
			<?php if(!empty($post->post_excerpt)): ?>
				<?php the_excerpt(); ?>
			<?php else: ?>
				<?php the_content(__( "Continue reading ", "tweaker4" ) . the_title('', '', false)); ?>
			<?php endif; ?>
		
		</div><!-- close .entry-content-->
		
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'tweaker4' ), 'after' => '</div>' ) ); ?>

		<?php if ( get_post_format() == '' ): ?>
		
			<div class="entry-meta">
				<?php if ( 'post' == $post->post_type ) : ?>
					<?php tweaker4_cats_and_tags(); ?><?php comments_popup_link( __( '', 'tweaker4' ), ' | 1 ' . __( 'Comment', 'tweaker4' ), ' | % ' . __( 'Comments', 'tweaker4' ), '', '' ); ?><?php edit_post_link( __( 'Edit', 'tweaker4' ), ' | ', ''); ?></p>
				<?php endif; ?>
			</div><!-- close .entry-meta-->
		<?php endif; ?>
		
		<?php if ( get_post_format() != '' ): ?>
			
			<div class="entry-format">
				<p><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( __( 'Permalink to %s', 'tweaker4' ), the_title_attribute( 'echo=0' ) ); ?>">'<?php echo ( ucwords (get_post_format()) ); ?>' <?php _e( 'Post', 'tweaker4' ); ?></a> | <?php _e('By ', 'tweaker4' ); ?><?php the_author_posts_link(); ?><?php _e( ' on ', 'tweaker4' ); ?><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( __( 'Permalink to %s', 'tweaker4' ), the_title_attribute( 'echo=0' ) ); ?>"><?php echo get_the_date(); ?></a><?php edit_post_link( __( 'Edit', 'tweaker4' ), ' | ', ''); ?></p>
			</div><!-- close .entry-format-->
		
		<?php endif; ?>
		
	</div><!-- close #post-->
	
<?php endwhile; ?>