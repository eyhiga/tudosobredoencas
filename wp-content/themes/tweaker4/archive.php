<?php get_header(); ?>

<div id="content">

	<?php if(get_query_var('author_name')) :
        $curauth = get_user_by('slug', get_query_var('author_name'));
    else :
        $curauth = get_userdata(get_query_var('author'));
    endif; ?>
    
	<?php if (have_posts()) : ?>
        <?php $post = $posts[0]; ?>
        <?php /* If this is a category archive */ if (is_category()) { ?>
        <div class="archive-results"><span><?php _e("Archive for the ", "tweaker4"); ?><strong><?php single_cat_title(); ?></strong> <?php _e("Category", "tweaker4"); ?></span></div>
        <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
        <div class="archive-results"><span><?php _e("Posts tagged ", "tweaker4"); ?><strong><?php single_tag_title(); ?></strong></span></div>
        <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
        <div class="archive-results"><span><?php _e("Archive for ", "tweaker4"); ?><strong><?php the_time(__( 'j F Y', 'tweaker4' )); ?></strong></span></div>
        <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
        <div class="archive-results"><span><?php _e("Archive for ", "tweaker4"); ?><strong><?php the_time(__( 'F Y', 'tweaker4' )); ?></strong></span></div>
        <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
        <div class="archive-results"><span><?php _e("Archive for ", "tweaker4"); ?><strong><?php the_time(__( 'Y', 'tweaker4' )); ?></strong></span></div>
        <?php /* If this is an author archive */ } elseif (is_author()) { ?>
        <div class="archive-results"><span><?php _e("The following articles were authored by ", "tweaker4"); ?><strong><?php echo $curauth->nickname; ?></strong></span></div>
        <?php } ?>
        
        <?php get_template_part( 'loop' ); ?>
        
        <?php if(function_exists( 'wp_pagenavi' )) { ?>
			
			<div class="page-navi">
				<?php wp_pagenavi(); ?>
			</div><!-- close .page-navi-->
		
		<?php } else { ?>
			
			<div class="nav">
				<div class="nav-left"><?php previous_posts_link( __( '&laquo; Newer Entries', 'tweaker4') ) ?></div>
				<div class="nav-right"><?php next_posts_link( __( 'Older Entries &raquo;', 'tweaker4') ) ?></div>
			</div><!-- close .nav-->
		
		<?php } ?>
        
    <?php endif; ?>

</div><!-- close #content-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>