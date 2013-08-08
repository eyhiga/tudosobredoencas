<?php

require( dirname( __FILE__ ) . '/options/theme-options.php' );

add_action( 'after_setup_theme', 'tweaker4_theme_setup' );

if(!function_exists( 'tweaker4_theme_setup' )) {
	function tweaker4_theme_setup() {
		global $content_width;
	
		if ( !isset( $content_width ) )
			$content_width = 600;
	
		add_editor_style();
		
		add_theme_support( 'automatic-feed-links' );
	
		add_theme_support( 'post-thumbnails' );
	
		if ( function_exists('add_custom_background') ) {
			add_custom_background();
		}
		
		if (function_exists ( 'has_post_format' )) {
			add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
		}
		
		load_theme_textdomain( 'tweaker4', TEMPLATEPATH . '/languages' );
	
		$locale = get_locale();
		$locale_file = TEMPLATEPATH . "/languages/$locale.php";
		if ( is_readable( $locale_file ) )
			get_template_part( $locale_file );
	
		if (function_exists('wp_nav_menu')) {
			add_action( 'init', 'tweaker4_register_menus' );
		}
	
		add_action( 'widgets_init', 'tweaker4_register_sidebars' );
	
		add_action( 'template_redirect', 'tweaker4_load_scripts' );
		
		define('NO_HEADER_TEXT', true );
		define('HEADER_TEXTCOLOR', '');
		define( 'HEADER_IMAGE', '' );
		define( 'HEADER_IMAGE_WIDTH', apply_filters( 'tweaker4_header_image_width', 980 ) );
		define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'tweaker4_header_image_height', 120 ) );
	
		add_custom_image_header( 'tweaker4_header_style', 'tweaker4_admin_header_style' );
		
		function tweaker4_header_style() {
			?><style type="text/css">
				#header {
					background: url(<?php header_image(); ?>);
				}
			</style><?php
		}
	
		function tweaker4_admin_header_style() {
			?><style type="text/css">
				#headimg {
					width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
					height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
				}
			</style><?php
		}

		register_default_headers( array(
		'one' => array(
			'url' => '%s/images/headers/one.jpg',
			'thumbnail_url' => '%s/images/headers/one-thumbnail.jpg',
		),
		'two' => array(
			'url' => '%s/images/headers/two.jpg',
			'thumbnail_url' => '%s/images/headers/two-thumbnail.jpg',
		),
		'three' => array(
			'url' => '%s/images/headers/three.jpg',
			'thumbnail_url' => '%s/images/headers/three-thumbnail.jpg',
		),
		'four' => array(
			'url' => '%s/images/headers/four.jpg',
			'thumbnail_url' => '%s/images/headers/four-thumbnail.jpg',
		),
		'five' => array(
			'url' => '%s/images/headers/five.jpg',
			'thumbnail_url' => '%s/images/headers/five-thumbnail.jpg',
		),
		'six' => array(
			'url' => '%s/images/headers/six.jpg',
			'thumbnail_url' => '%s/images/headers/six-thumbnail.jpg',
		),
		'seven' => array(
			'url' => '%s/images/headers/seven.jpg',
			'thumbnail_url' => '%s/images/headers/seven-thumbnail.jpg',
		),
		'eight' => array(
			'url' => '%s/images/headers/eight.jpg',
			'thumbnail_url' => '%s/images/headers/eight-thumbnail.jpg',
		),
		'nine' => array(
			'url' => '%s/images/headers/nine.jpg',
			'thumbnail_url' => '%s/images/headers/nine-thumbnail.jpg',
		)
	) );
	}
}
 
if(!function_exists( 'tweaker4_register_menus' )) {
	function tweaker4_register_menus() {
		if (function_exists( 'register_nav_menu' )) {
			register_nav_menu( 'tweaker4-main-menu', 'Main Menu');
		}
	}
}

if(!function_exists( 'tweaker4_default_menu' )) {
	function tweaker4_default_menu() {
		if (get_option( 'page_on_front' ) == 0):
			echo '<ul>';
			if(is_home() && !is_paged()) {
				echo '<li class="current_page_item"><a href="'. home_url( '/' ) . '" title="' . __( 'You are Home', 'tweaker4' ) . '" rel="nofollow">' . __( 'Home', 'tweaker4' ) . '</a></li>';
			} else {
				echo '<li><a href="'. home_url( '/' ) . '" title="' . __( 'Click for Home', 'tweaker4' ) . '" rel="nofollow">' . __( 'Home', 'tweaker4' ) . '</a></li>';
			}
			wp_list_pages( 'title_li=' );
			echo '</ul>';
		else:
			echo '<ul>';
			wp_list_pages( 'title_li=' );
			echo '</ul>';
		endif;
	}
}

add_action( 'widgets_init', 'tweaker4_register_sidebars' );

if(!function_exists( 'tweaker4_register_sidebars' )) {
	function tweaker4_register_sidebars() {
		register_sidebar(array( 
		'id' => 'sidebar',
		'name' => 'sidebar',
		'description' => __('Widgets you add here will be added to the sidebar', 'tweaker4'),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
		));
		register_sidebar(array(
		'id' => 'footer-left', 
		'name' => 'footer left',
		'description' => __('Widgets you add here will be added to left footer widget area', 'tweaker4'),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
		));
		register_sidebar(array( 
		'id' => 'footer-center',
		'name' => 'footer center',
		'description' => __('Widgets you add here will be added to center footer widget area', 'tweaker4'),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
		));
		register_sidebar(array( 
		'id' => 'footer-right',
		'name' => 'footer right',
		'description' => __('Widgets you add here will be added to right footer widget area', 'tweaker4'),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
		));
	}
}
 
if(!function_exists( 'tweaker4_load_scripts' )) {
	function tweaker4_load_scripts() {
		if ( is_singular() && get_option( 'thread_comments' ) && comments_open() ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
	}
}

if(!function_exists( 'tweaker4_cats_and_tags' )) {
	function tweaker4_cats_and_tags() {
		$tags = get_the_tag_list( '', ', ' );
		if ( $tags ) {
			$cats_tags = __( 'This entry is filed under %1$s and tagged %2$s.', 'tweaker4' );
		} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
			$cats_tags = __( 'This entry is filed under %1$s.', 'tweaker4' );
		}
		printf(
			$cats_tags,
			get_the_category_list( ', ' ),
			$tags
		);
	}
}

if(!function_exists( 'tweaker4_comment' )) {
	function tweaker4_comment($comment, $args, $depth) {
	   $GLOBALS['comment'] = $comment; ?>
	   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		 <div id="comment-<?php comment_ID(); ?>">
		  <div class="comment-author vcard">
			 <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>
	
			 <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>', 'tweaker4'), get_comment_author_link()) ?>
		  </div>
		  <?php if ($comment->comment_approved == '0') : ?>
			 <em><?php _e('Your comment is awaiting moderation.', 'tweaker4') ?></em>
			 <br />
		  <?php endif; ?>
	
		  <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s', 'tweaker4'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)', 'tweaker4'),'  ','') ?></div>
	
		  <?php comment_text() ?>
	
		  <div class="reply">
			 <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		  </div>
		 </div>
	<?php
			}
}

?>