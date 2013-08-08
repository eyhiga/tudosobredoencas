<?php get_header(); 
$kvarken_curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
?>
<div class="container">
		<h1 class="archive-title">
		<?php printf( __('About %s','kvarken'), $kvarken_curauth->display_name); ?>
		</h1>
			<div class="author-info">
			<div class="author-avatar">
				<?php echo get_avatar($kvarken_curauth->user_email, 60); ?></div>
				<div class="author-description">
					<?php	
					echo $kvarken_curauth->description;
					?>
			</div>
		</div>
		<br /><br />
		<h1><?php printf( __( 'View all posts by %s', 'kvarken' ), $kvarken_curauth->nickname ); ?></h1>
		<?php
		while ( have_posts() ) : the_post(); ?> 
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
					?>
				</div>
			</div>
<?php
endwhile; 
 
next_posts_link('<div class="newer-posts">'. __('Next page &rarr;', 'kvarken') . '</div>'); 
previous_posts_link('<div class="older-posts">' . __('&larr; Previous page','kvarken') . '</div>'); 
?>
</div>
<?php
get_sidebar(); 
get_footer();
?> 