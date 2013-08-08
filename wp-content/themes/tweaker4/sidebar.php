    <div id="sidebar">
	
		<?php if (is_active_sidebar( 'sidebar' )) : ?>

			<?php dynamic_sidebar( 'sidebar' ); ?>

		<?php else : ?>

			<div class="widget">
				
				<h4 class="widget-title"><?php _e( 'Recent Posts', 'tweaker4' ) ?></h4>
				<?php
				$show = 5; 
				$r = new WP_Query(array('showposts' => $show, 'what_to_show' => 'posts', 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1));
				if ($r->have_posts()) : ?>
					<ul>
						<?php  while ($r->have_posts()) : $r->the_post(); ?>
							<li><a href="<?php the_permalink() ?>"><?php if ( get_the_title() ) the_title(); else echo __( 'No Title Added', 'tweaker4' ) ?></a></li>
						<?php endwhile; ?>
					</ul>	
					<?php wp_reset_query();
				endif; ?>
			
			</div><!-- close .widget-->
			
		<?php endif; ?>
	
    </div><!-- close #sidebar-->

</div><!-- close #container, opened in header.php-->