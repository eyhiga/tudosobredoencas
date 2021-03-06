<?php
/**
 * The functions file is utilized to initialize every little thing in the theme.  It controls how the theme is loaded and 
 * sets up the supported features, default actions, and default filters.  If making customizations, users 
 * should must make a child theme and make modifications to its functions.php file (not this one).
 *
 * Child themes should do their setup on the 'after_setup_theme' hook with a priority of 11 if they want to
 * override parent theme features.  Use a priority of 9 or lower if wanting to run before the parent theme.
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * General Public License as published by the Free Software Foundation; either version 2 of the License, 
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, write 
 * to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 *
 * @package Omega
 * @subpackage Functions
 * @version 0.3.1
 * @author ThemeHall <hello@themehall.com>
 * @copyright Copyright (c) 2013, themehall.com
 * @link http://themehall.com/omega
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* Load the core theme framework. */
require ( trailingslashit( get_template_directory() ) . 'lib/hybrid.php' );
new Hybrid();

/* Load omega functions */
require get_template_directory() . '/lib/omega.php';

if ( ! function_exists( 'omega_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function omega_theme_setup() {

	/* Get the theme prefix. */
	$prefix = hybrid_get_prefix();

	/* The best thumbnail/image script ever. */
	add_theme_support( 'get-the-image' );
	
	/* Register menus. */
	add_theme_support( 
		'hybrid-core-menus', 
		array( 'primary') 
	);

	/* Register sidebars. */
	add_theme_support( 
		'hybrid-core-sidebars', 
		array( 'primary' ) 
	);

	/* Load scripts. */
	add_theme_support( 
		'hybrid-core-scripts', 
		array( 'comment-reply' ) 
	);

	/* Load shortcodes. */
	add_theme_support( 'hybrid-core-shortcodes' );
	
	add_theme_support( 'hybrid-core-theme-settings', array( 'about', 'footer' ) );
	
	/* Enable custom template hierarchy. */
	add_theme_support( 'hybrid-core-template-hierarchy' );
	

	/* Enable theme layouts (need to add stylesheet support). */
	add_theme_support( 
		'theme-layouts', 
		array( '1c', '2c-l', '2c-r' ), 
		array( 'default' => '2c-l', 'customizer' => true ) 
	);
	 
	
	/* implement editor styling, so as to make the editor content match the resulting post output in the theme. */
	add_editor_style();

	/* Support pagination instead of prev/next links. 
	add_theme_support( 'loop-pagination' );
	*/

	/* Better captions for themes to style. */
	add_theme_support( 'cleaner-caption' );

	/* Add default posts and comments RSS feed links to <head>.  */
	add_theme_support( 'automatic-feed-links' );

	/* Handle content width for embeds and images. */
	hybrid_set_content_width( 640 );

	/* custom excerpt */
	add_filter( 'excerpt_length', 'omega_excerpt_length', 999 );
	add_filter('excerpt_more', 'omega_excerpt_more');

	add_action( 'wp_enqueue_scripts', 'omega_scripts' );
	add_action( 'wp_head', 'omega_styles' );

	/* Header actions. */
	add_action( "{$prefix}_header", 'omega_site_title' );
	add_action( "{$prefix}_header", 'omega_site_description' );

	/* footer insert to the footer. */
	add_action( "{$prefix}_footer", 'omega_footer_insert' );

	/* Load the primary menu. */
	add_action( "{$prefix}_before_header", 'omega_get_primary_menu' );

	/* Add the title, byline, and entry meta before and after the entry.
	add_action( "{$prefix}_before_entry", 'omega_entry_title' );*/
	add_action( "{$prefix}_entry_header", 'omega_entry_header' );
	add_action( "{$prefix}_entry_header", 'omega_byline' );
	add_action( "{$prefix}_entry", 'omega_entry' );
	add_action( "{$prefix}_singular_entry", 'omega_singular_entry' );
	add_action( "{$prefix}_after_entry", 'omega_entry_meta' );
	add_action( "{$prefix}_singular_after_entry", 'omega_page_entry_meta' );

	/* Filter the sidebar widgets. */
	add_filter( 'sidebars_widgets', 'omega_disable_sidebars' );
	add_action( 'template_redirect', 'omega_one_column' );
}
endif; // omega_theme_setup

add_action( 'after_setup_theme', 'omega_theme_setup' );


/**
 * Dynamic element to wrap the site title in.  If it is the front page, wrap it in an <h1> element.  One other 
 * pages, wrap it in a <div> element. 
 */
function omega_site_title() {

	/* Get the site title.  If it's not empty, wrap it with the appropriate HTML. */
	if ( $title = get_bloginfo( 'name' ) )
		$title = sprintf( '<h1 class="site-title"><a href="%1$s" title="%2$s" rel="home"><span>%3$s</span></a></h1>', home_url(), esc_attr( $title ), $title );

	/* Display the site title and apply filters for developers to overwrite. */
	echo apply_atomic( 'site_title', $title );
}

/**
 * Dynamic element to wrap the site description in.  If it is the front page, wrap it in an <h2> element.  
 * On other pages, wrap it in a <div> element.*
 */
function omega_site_description() {

	/* Get the site description.  If it's not empty, wrap it with the appropriate HTML. */
	if ( $desc = get_bloginfo( 'description' ) )
		$desc = sprintf( '<h2 class="site-description"><span>%1$s</span></h2>', $desc );

	/* Display the site description and apply filters for developers to overwrite. */
	echo apply_atomic( 'site_description', $desc );
}


function omega_footer_insert() {
	hybrid_footer_content();	
}

/**
 * Loads the menu-primary.php template.
 */
function omega_get_primary_menu() {
	get_template_part( 'menu', 'primary' );
}


/**
 * Display the default page edit link
 */
function omega_page_entry_meta() {

	echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">[entry-edit-link]</div>' );
}


/**
 * Display the default entry header.
 */
function omega_entry_header() {

	if ( is_home() ) {
	?>
		<h1 class="entry-title" itemprop="headline"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	<?php		
	} else {
	?>
		<h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>
	<?php
	}
}

/**
 * Display the default page edit link
 */
function omega_byline() {

	if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php 
			if (is_multi_author()) {
				echo apply_atomic_shortcode( 'entry_byline', __( 'Posted by [entry-author] ', 'omega' ) ); 
			} else {
				echo apply_atomic_shortcode( 'entry_byline', __( 'Posted ', 'omega' ) ); 
			}?>
			<?php
				echo apply_atomic_shortcode( 'entry_byline', __( 'on [entry-published] [entry-comments-link before=" | "] [entry-edit-link before=" | "]', 'omega' ) ); 
			
			?>
		</div><!-- .entry-meta -->
	<?php endif; 
}

/**
 * Display the default entry metadata.
 */
function omega_entry() {

	if ( is_home() ) {
		get_the_image( array( 'meta_key' => 'Thumbnail', 'default_size' => 'full' ) ); 
	}

	the_content(); 

}

/**
 * Display the default singular entry metadata.
 */
function omega_singular_entry() {

	wp_link_pages( array( 'before' => '<p class="page-links">' . '<span class="before">' . __( 'Pages:', 'omega' ) . '</span>', 'after' => '</p>' ) );

}


/**
 * Display the default entry metadata.
 */
function omega_entry_meta() {

	$meta = '';

	if ( 'post' == get_post_type() ) {
		$meta = '<footer class="entry-footer"><div class="entry-meta">' . __( '[entry-terms taxonomy="category" before="Posted in: "] [entry-terms before="| Tagged: "]', 'omega' ) . '</div><!-- .entry-meta --></footer>';
	}

	echo apply_atomic_shortcode( 'entry_meta', $meta );
}

/**
 * Enqueue scripts and styles
 */
function omega_scripts() {
	wp_enqueue_style( 'omega-style', get_stylesheet_uri() );
}

/**
 * Insert conditional script / style for the theme used sitewide.
 */
function omega_styles() {
?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php 
}

/**
 * Sets the post excerpt length to 100 words.
 */
function omega_excerpt_length( $length ) {
	return 100;
}

/**
 * Replaces the excerpt "more" text by a link
 */
function omega_excerpt_more($more) {
    global $post;
	return ' ... <a class="more-link" href="'. get_permalink($post->ID) . '">'.__( '[Read more ...]', 'omega' ).'</a>';
}


/**
 * Function for deciding which pages should have a one-column layout.
 */
function omega_one_column() {

	if ( is_attachment() && wp_attachment_is_image() && 'default' == get_post_layout( get_queried_object_id() ) )
		add_filter( 'theme_mod_theme_layout', 'omega_theme_layout_one_column' );

}

/**
 * Filters 'get_theme_layout' by returning 'layout-1c'.
 */
function omega_theme_layout_one_column( $layout ) {
	return '1c';
}


/**
 * Disables sidebars if viewing a one-column page.
 */

function omega_disable_sidebars( $sidebars_widgets ) {
	global $wp_customize;

	$customize = ( is_object( $wp_customize ) && $wp_customize->is_preview() ) ? true : false;

	if ( !is_admin() && !$customize && '1c' == get_theme_mod( 'theme_layout' ) )
		$sidebars_widgets['primary'] = false;

	return $sidebars_widgets;
}