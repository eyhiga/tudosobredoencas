<?php get_header(); ?>
<div class="container">
		<h2><?php _e('Page not found', 'kvarken');?></h2>
		<?php get_search_form(); ?><br /><br />
		<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
		<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?> 