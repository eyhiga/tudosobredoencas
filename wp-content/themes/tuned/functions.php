<?php
/**
 * Tuned functions and definitions.
 *
 * @package      Tuned
 * @author       Elod Horvath
 * @copyright    2013-... Elod Horvath
 * @since        1.0
 */

 
 if ( ! isset( $content_width ) )
	$content_width = 900;
	
 
/* Tuned theme setup 
----------------------------------------------------------*/
function tuned_setup() {
	
	/* Add editor style */
	add_editor_style();
	
	/* Custom header */
	$args_ch = array( 
		// Header image default
	       'default-image'			=> get_template_directory_uri() . '/images/default-logo.png',
	        // Header text display default
	       'header-text'			=> false,
	        // Header image flex width
		   'flex-width'             => true,
	        // Header image width (in pixels)
	       'width'				    => 300,
		    // Header image flex height
		   'flex-height'            => true,
	        // Header image height (in pixels)
	       'height'			        => 100
	);
	add_theme_support( 'custom-header', $args_ch );
	
	/* Post thumbnails */
	add_theme_support( 'post-thumbnails' );
	//set_post_thumbnail_size( 624, 9999 );
	
	/* Make theme available for translation */
	load_theme_textdomain( 'tuned', get_template_directory() . '/languages' );
	
	/* Add Primary Navigation Menu */
	register_nav_menu( 'primary', __( 'Primary Menu', 'tuned' ) );
	
	/* Add posts and comments RSS feed links to <head> */
	add_theme_support( 'automatic-feed-links' );
	
	/* Add support for custom backgrounds. */
	$args_cb = array( 
		'default-color' => 'FFF',
		//'default-image' => ''
	);
	add_theme_support( 'custom-background', $args_cb );
	
	
	
}
add_action( 'after_setup_theme', 'tuned_setup' );



/* Add styles, and/or javascripts to theme 
-----------------------------------------------------------*/
function tuned_scripts() {
	
	// Add styles
	wp_enqueue_style( 'tuned-style', get_stylesheet_uri() );
	wp_enqueue_style( 'tuned-ie', get_template_directory_uri() .'/css/ie.css' );
	wp_enqueue_style( 'Montserrat', 'http://fonts.googleapis.com/css?family=Montserrat:400,700' );
	wp_enqueue_style( 'flexslider', get_template_directory_uri() .'/js/vendor/flexslider/flexslider.css' );
	
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() )
		wp_enqueue_script( 'comment-reply' );
	
	// Add FlexSlider
	wp_enqueue_script( 'tuned_flexslider', get_template_directory_uri() .'/js/vendor/flexslider/jquery.flexslider.js', array( 'jquery' ) );
	
	// Add Infinite Scroll
	wp_enqueue_script( 'tuned_infinite_scroll', get_template_directory_uri() .'/js/vendor/infinite-scroll/jquery.infinitescroll.js', array( 'jquery' ) );
	
	// Add Masonry
	wp_enqueue_script( 'tuned_masonry', get_template_directory_uri() .'/js/vendor/masonry/jquery.masonry.js', array( 'jquery' ) );
	
	// Add Tuned javascript file
	wp_enqueue_script( 'tuned_scripts', get_template_directory_uri() .'/js/tuned_scripts.js' );
	
	//Add Infinite Scroll with Masonry for Infinite Scrolled Blog
	if( basename( get_page_template() ) == 'infinite-scrolled-blog.php' ) {
		wp_enqueue_script( 'isb', get_template_directory_uri() .'/js/isb.js' );
		wp_localize_script( 'isb', 'isb_vars', array( 
			'loader_img' => get_template_directory_uri() . '/js/vendor/infinite-scroll/ajax-loader.gif',
			'loader_text' => __( 'Loading...', 'tuned' ),
			'loading_finished_text' => __( 'All posts loaded.', 'tuned' )
		) );
	}
	

}
add_action( 'wp_enqueue_scripts', 'tuned_scripts' );


/* Register widgets 
-------------------------------------------------------------*/
function tuned_widgets_init() {

	register_sidebar( array( 
		'name'            => __( 'Main sidebar', 'tuned' ),
		'id'              => 'sidebar-1',
		'before_widget'   => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'    => '</aside>',
		'before_title'    => '<h3 class="widget-title">',
		'after_title'     => '</h3>'
	) );
	
	register_sidebar(array(
		'name'          => __('FrontPage - Total Width Box', 'tuned'),
		'description' => __( 'Appears on the Front Page. This is a total width box. Ideal for the Hero Widget', 'tuned' ),
		'id'            => 'front-page-hero-total-width',
		'before_widget' => '<div class="fullbox">',
		'after_widget'  => '</div>',		
	));
	
	register_sidebar(array(
		'name'          => __('FrontPage - Carousel Box', 'tuned'),
		'description' => __( 'Appears on the Front Page. This is a total width box ONLY for Carousel Widget', 'tuned' ),
		'id'            => 'front-page-carousel-total-width',
		'before_widget' => '<div class="fullbox">
						<div class="flexslider">
							<ul class="slides">',
		'after_widget'  => '</ul>
						</div>			
					</div>',		
	));
	
	register_sidebar(array(
		'name'          => __('Front Page - Full Width Box', 'tuned'),
		'description' => __( 'Appears on the Front Page. Ideal for the Text Widget, and for the Category Posts Widget', 'tuned' ),
		'id'            => 'frontend-grid-1',
		'before_widget' => '<div id="grid1" class="grid">',
		'after_widget'  => '</div>',		
	));
	
	register_sidebar(array(
		'name'          => __('Front Page - 3 Column Grid Box', 'tuned'),
		'description' => __( 'Appears on the Front Page. Ideal for the Category Posts Widget. This is a 3 Column grid, ONLY FOR the Category Posts Widget. (Other widgets appears only in one column)', 'tuned' ),
		'id'            => 'frontend-grid-3',
		'before_widget' => '<div id="grid3" class="grid">',
		'after_widget'  => '<div style="clear: both"></div>
						</div>',		
	));
	
	register_widget('Tuned_Hero_Widget');
	register_widget('Tuned_Category_Widget');
	register_widget('Tuned_Carousel_Widget');

}
add_action( 'widgets_init', 'tuned_widgets_init' );
require_once( 'inc/widgets.php' );


/* Content navigation 
----------------------------------------------------------*/
if( !function_exists( 'tuned_content_nav' ) ) {

	function tuned_content_nav( $nav_id ) {

		global $wp_query;
		$nav_id = esc_attr( $nav_id );
	
		if( $wp_query->max_num_pages > 1 ) : ?>
	
			<nav id="<?php echo $nav_id; ?>" class="nav-content" role="navigation">
				<?php if( get_next_posts_link() ) : ?>
					<span class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'tuned' ) ); ?></span>
				<?php endif; ?>
				<?php if( get_previous_posts_link() ) : ?>
					<span class="nav-next"><?php previous_posts_link( __( 'Newer posts <span>&rarr;</span>', 'tuned' ) ); ?></span>
				<?php endif; ?>
			</nav>
	
		<?php endif;

	}
	
}


/* Single content navigation 
----------------------------------------------------------*/
if( !function_exists( 'tuned_single_nav' ) ) {

	function tuned_single_nav() {

		?>
		
		<nav class="nav-single">
			<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . __( '&larr;', 'tuned' ) . '</span> %title' ); ?></span>				
			<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . __( '&rarr;', 'tuned' ) . '</span>' ); ?></span>		
		</nav>
		
		<?php
	}
	
}




/* Entry meta author
------------------------------------------------------------*/
if( !function_exists( 'tuned_entry_meta_author' ) ) {

	function tuned_entry_meta_author() {
					
		$date          = esc_attr( get_the_date() );
		$time          = esc_attr( get_the_time( 'c' ) );
		$author        = esc_attr( get_the_author() );
		$link_to_author_posts  = esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
	
		?>
		<time class="entry-date" datetime="<?php echo $time; ?>"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo $date; ?></a></time>
		<span class="author vcard"> - <a href="<?php echo $link_to_author_posts; ?>"><?php echo __( 'By', 'tuned' ) . ' ' . $author; ?></a></span><br />		
		<?php
	}
	
}

/* Entry meta categories, tags
------------------------------------------------------------*/
if( !function_exists( 'tuned_entry_meta_ct' ) ) {

	function tuned_entry_meta_ct() {
			
		$category_list = get_the_category_list( __( ', ', 'tuned' ) );
		$tag_list      = get_the_tag_list( __( 'Tags', 'tuned' ) . ': ' , __( ', ', 'tuned' ) );		
	
		?>		
		<span class="category-list"><?php echo __( 'Categories', 'tuned' ) . ': ' . $category_list; ?></span>
		<span class="tag-list"><?php echo $tag_list; ?></span>
		<?php
	}
	
}

/* Filters wp_title */
function tuned_wp_title( $title, $sep ) {

	global $page, $paged;
	
	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'tuned' ), max( $paged, $page ) );

	return $title;

}
add_filter( 'wp_title', 'tuned_wp_title', 10, 2 );

?>