<?php get_header(); ?>
<div class="container">
		<div class="search-post">
		<h1 class="post-title"><?php printf( __( 'Search Results for: %s', 'kvarken'), get_search_query()); ?></h1>		
		<?php get_search_form(); ?>
		</div><br/><br/>
			<?php while ( have_posts() ) : the_post(); ?> 					
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<?php kvarken_breadcrumbs();?>					
					<?php
					  if (strpos($post->post_content,'[gallery') === false){
					   if ( has_post_thumbnail()) {
							the_post_thumbnail();
					   }
					}
					the_content(); 
					wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages: ', 'kvarken' ), 'after' => '</div>' ) ); 
					?>						
				<div class="meta">
					<?php printf( __('<a href="%1$s">Written by</a> <a href="%3$s" title="%4$s" rel="author">%5$s</a> <a href="%1$s" rel="bookmark">%2$s</a>. ', 'kvarken' ),
					esc_url( get_permalink() ),
					esc_html( get_the_date(get_option('date_format')) ),
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					esc_attr( sprintf( __( 'View all posts by %s', 'kvarken' ), get_the_author() ) ),
					get_the_author()
					);
					
					if ( comments_open() ) :
						comments_popup_link();
						echo '.';					
					endif;
					
					if ( count( get_the_category() ) ) : ?>
						<span class="cat-links"><?php printf( __( 'Category: %1s', 'kvarken' ), get_the_category_list(', ')); ?>. </span>
					<?php 
					endif;
					if(get_the_tag_list()) {
						$kvarken_tags_list = get_the_tag_list( '', ', ' );
						printf( __( 'Tagged: %1$s. ', 'kvarken' ), $kvarken_tags_list );
					} 
					edit_post_link( __( 'Edit', 'kvarken' ) );
					?>
				</div>
				</div>
<?php endwhile; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?> 