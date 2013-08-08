<?php get_header(); ?>

<div id="content">
    
    <div class="archive-results">
        <span><strong>Error 404</strong><br />
		<?php _e( 'An error has occurred. Something has either been moved or it is no longer available.', 'tweaker4' ); ?></span>
    </div><!-- close .archive-results-->
    
    <p><?php _e( 'You have searched for something that could not be found. Hopefully the following will be of assistance to you.', 'tweaker4' ); ?></p>
    <?php get_template_part( 'find' ); ?>

</div><!-- close #content-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>