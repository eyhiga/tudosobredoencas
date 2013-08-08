<div class="content-container">
	
	<div class="content-left">
		
		<div class="widget">
			<h4 class="widget-title"><?php _e( 'Search', 'tweaker4' ); ?></h4>
			<div>
				<?php get_search_form(); ?>
			</div>
		</div><!-- close .widget-->
	
	</div><!-- close .content-left-->
	
	<div class="content-right">
		
		<div class="widget">
			<h4 class="widget-title"><?php _e( 'Monthly Archives', 'tweaker4' ); ?></h4>
			<ul>
				<?php wp_get_archives( 'type=monthly&limit=12' ); ?>
			</ul>
		</div><!-- close .widget-->
	
	</div><!-- close .content-right-->

</div><!-- close .content-container-->

<div class="content-container">
	
	<div class="content-left">
		
		<div class="widget">
			<h4 class="widget-title"><?php _e( 'Categories', 'tweaker4' ); ?></h4>
			<ul>
				<p><?php wp_tag_cloud( array( 'number' => 0, 'taxonomy' => 'category', 'smallest' => 10, 'largest' => 16 ) ); ?></p>
			</ul>
		</div><!-- close .widget-->
	
	</div><!-- close .content-left-->
	
	<div class="content-right">
		
		<div class="widget">
			<h4 class="widget-title"><?php _e( 'Tags', 'tweaker4' ); ?></h4>
			<p><?php wp_tag_cloud( array( 'number' => 0, 'taxonomy' => 'post_tag', 'smallest' => 10, 'largest' => 16 ) ); ?></p>
		</div><!-- close .widget-->
	
	</div><!-- close .content-right-->

</div><!-- close .content-container-->

<div class="content-left">
	
	<div class="widget">
		<h4 class="widget-title"><?php _e( 'Recent Posts', 'tweaker4' ); ?></h4>
		<ul>
			<?php $myposts = get_posts( 'numberposts=20&offset=0&order=DESC' ); ?>
			<?php foreach($myposts as $post) : ?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php endforeach; ?>
		</ul>
	
	</div><!-- close .widget-->

</div><!-- close .content-left-->