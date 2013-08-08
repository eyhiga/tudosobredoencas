<?php get_header(); ?>
<div class="container">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="post-title"><?php the_title(); ?></h1>
				<?php kvarken_breadcrumbs();?>		
				<?php
				if ( is_attachment() ) {
					echo '<div class="fullimg">' . wp_get_attachment_image('','full'). '</div>';
					if ( ! empty( $post->post_excerpt ) ) :
							echo '<br /><p>' . the_excerpt() .'</p>';
					endif; 					
					next_image_link();
					previous_image_link();
				} else {
					the_content();
					wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages: ', 'kvarken' ), 'after' => '</div>' ) ); 
					}
				?>					
				<div class="meta">
					<?php 					
					printf( __('<a href="%1$s">Written by</a> <a href="%3$s" title="%4$s" rel="author">%5$s</a> <a href="%1$s" rel="bookmark">%2$s</a>. ', 'kvarken' ),
					esc_url( get_permalink() ),
					esc_html( get_the_date(get_option('date_format')) ),
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					esc_attr( sprintf( __( 'View all posts by %s', 'kvarken' ), get_the_author() ) ),
					get_the_author()
					);
									
					if ( count( get_the_category() ) ) : 
					?>
						<span class="cat-links"><?php printf( __( 'Category: %1s', 'kvarken' ), get_the_category_list(', ')); ?>. </span>
					<?php
					endif; 
					if(get_the_tag_list()) {
						$kvarken_tags_list = get_the_tag_list( '', ', ' );
						printf( __( 'Tagged: %1$s. ', 'kvarken' ), $kvarken_tags_list );
					}
					edit_post_link( __( 'Edit', 'kvarken' ) );
					
					kvarken_author();	
					?>
			</div>
		</div>
<?php
endwhile;
next_post_link('<div class="newer-posts">%link &rarr;</div>');
previous_post_link('<div class="older-posts">&larr; %link </div>');
comments_template( '', true ); 
?>
</div>
<?php
get_sidebar(); 
get_footer(); 
?>