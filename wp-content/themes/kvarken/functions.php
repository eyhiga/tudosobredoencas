<?php
/* width     bredd */
if ( ! isset( $content_width ) ) $content_width = 560;

if ( ! function_exists( 'kvarken_setup' ) ) :
	function kvarken_setup() {
		$kvarken_ch = array( //custom header settings
		'default-image'          => get_template_directory_uri() . '/images/headers/seagull.png',
		'random-default'         => false,
		'width'                  => 960,
		'height'                 => 300,
		'flex-height'            => false,
		'flex-width'             => false,
		'uploads'                => true,
		'header-text'            => false
		);
		add_theme_support( 'custom-header', $kvarken_ch );
		add_theme_support( 'custom-background');
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 190, 190 );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-formats', array( 'aside','link','status'));
		
		/* translate */
		load_theme_textdomain( 'kvarken', get_template_directory() . '/languages' );
		
		/* add menu */
		register_nav_menus( array('header' => __( 'Header Navigation', 'kvarken' ) ) );	

		register_default_headers( array(
			'sunset' => array(
				'url' => '%s/images/headers/sunset.png',
				'thumbnail_url' => '%s/images/headers/sunset-thumb.png',
				/* translators: header image description */
				'description' => __( 'Sunset', 'kvarken' )
			),
			'stones' => array(
				'url' => '%s/images/headers/stones.png',
				'thumbnail_url' => '%s/images/headers/stones-thumb.png',
				/* translators: header image description */
				'description' => __( 'Stones', 'kvarken' )
			),
			'flower' => array(
				'url' => '%s/images/headers/flora.png',
				'thumbnail_url' => '%s/images/headers/flora-thumb.png',
				/* translators: header image description */
				'description' => __( 'Flower', 'kvarken' )
			),
			'cloudy' => array(
				'url' => '%s/images/headers/acloudyday.png',
				'thumbnail_url' => '%s/images/headers/acloudyday-thumb.png',
				/* translators: header image description */
				'description' => __( 'A cloudy day', 'kvarken' )
			),
			'seagull' => array(
				'url' => '%s/images/headers/seagull.png',
				'thumbnail_url' => '%s/images/headers/seagull-thumb.png',
				/* translators: header image description */
				'description' => __( 'Seagull', 'kvarken' )
			),
			'birdsonrock' => array(
				'url' => '%s/images/headers/birdsonrock.png',
				'thumbnail_url' => '%s/images/headers/birdsonrock-thumb.png',
				/* translators: header image description */
				'description' => __( 'Birds On Rock', 'kvarken' )
			),
			'sunset2' => array(
				'url' => '%s/images/headers/sunset2.png',
				'thumbnail_url' => '%s/images/headers/sunset2-thumb.png',
				/* translators: header image description */
				'description' => __( 'Sunset', 'kvarken' )
			),
			'sunset2' => array(
				'url' => '%s/images/headers/sunset3.png',
				'thumbnail_url' => '%s/images/headers/sunset3-thumb.png',
				/* translators: header image description */
				'description' => __( 'Sunset', 'kvarken' )
			)
		) );
}
endif;
add_action( 'after_setup_theme', 'kvarken_setup' );


/* add 'home' button to menu            'hem' knapp i menyn*/
function kvarken_menu( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'kvarken_menu' );


function kvarken_editor_styles() {
    add_editor_style();
}
add_action( 'init', 'kvarken_editor_styles' );


/* Enqueue fonts */
 function kvarken_fonts_styles() {
    wp_register_style('kvarken_Font','//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic');
	wp_register_style('kvarken_Font2','//fonts.googleapis.com/css?family=Oswald&subset=latin,latin-ext');

	wp_enqueue_style('kvarken_style', get_stylesheet_uri() );
    wp_enqueue_style('kvarken_Font');
	wp_enqueue_style('kvarken_Font2');
	
	if( get_theme_mod( 'kvarken_hide_shadows' ) == '') {
		wp_register_style('kvarken_shadow', get_template_directory_uri() . '/shadow.css');
		wp_enqueue_style('kvarken_shadow');
	}

}
 add_action('wp_print_styles', 'kvarken_fonts_styles');
 
 
/* Enqueue comment reply / threaded comments. */
function kvarken_enqueue_comment_reply() {
	if ( ! is_admin() ){
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
			wp_enqueue_script( 'comment-reply' ); 
		}
	}
}
add_action( 'wp_enqueue_scripts', 'kvarken_enqueue_comment_reply' );


/* Add title to read more links */
add_filter( 'get_the_excerpt', 'kvarken_custom_excerpt_more',100 );
add_filter( 'excerpt_more', 'kvarken_excerpt_more',100 );
add_filter( 'the_content_more_link', 'kvarken_content_more', 100 );

 function kvarken_continue_reading($id ) {
	return '<a href="'.get_permalink( $id ).'">' . __( 'Read more: ', 'kvarken' ) . get_the_title($id) . '</a>';
}
 
function kvarken_content_more($more) {
	global $id;
	return kvarken_continue_reading( $id );
}
 
function kvarken_excerpt_more($more) {
	global $id;
	return '... '.kvarken_continue_reading( $id );
}

function kvarken_custom_excerpt_more($output) {
	if (has_excerpt() && !is_attachment()) {
		global $id;
		$output .= ' '.kvarken_continue_reading( $id );
	}
	return $output;
}

/* Register widget areas (Sidebars)        Skapa sidebars*/
function kvarken_widgets_init() {
	register_sidebar(
		array(
		'name' => __( 'Right Hand Sidebar', 'kvarken' ),
  		'description' => __( 'Widgets in this area will be shown on the right-hand side.', 'kvarken' ),
		)
	);
	
	register_sidebar(
		array(
		'name' => __( 'Footer Sidebar', 'kvarken' ),
  		'description' => __( 'Widgets in this area will be shown in the footer.', 'kvarken' ),
		)
	);
}
add_action( 'widgets_init', 'kvarken_widgets_init' );


/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 */
function kvarken_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'kvarken' ), max( $paged, $page ) );
		
	if ( is_404() ) {
        $title .=  " $sep " . sprintf( __( 'Page not found', 'kvarken' ) );
    }
	
	return $title;
}
add_filter( 'wp_title', 'kvarken_wp_title', 11, 2 );


function kvarken_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'kvarken_section_one',
        array(
            'title' => __( 'Breadcrumbs', 'kvarken' ),
            'priority' => 195 //Place it last
        )
    );
	
	 $wp_customize->add_section(
        'kvarken_section_two',
        array(
            'title' => __( 'Author info', 'kvarken' ),
            'priority' => 205
        )
    );
	
	 $wp_customize->add_section(
        'kvarken_section_three',
        array(
            'title' => __( 'Header image placement', 'kvarken' ),
            'priority' => 210
        )
    );
	
	 $wp_customize->add_section(
        'kvarken_section_four',
        array(
            'title' => __( 'Hide shadows', 'kvarken' ),
            'priority' => 215
        )
    );
	
	$wp_customize->add_setting( 'kvarken_hide_breadcrumbs',
		array(
			'sanitize_callback' => 'kvarken_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_setting( 'kvarken_hide_authorinfo',
		array(
			'sanitize_callback' => 'kvarken_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_setting( 'kvarken_header_image',
		array(
			'sanitize_callback' => 'kvarken_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_setting( 'kvarken_hide_shadows',
		array(
			'sanitize_callback' => 'kvarken_sanitize_checkbox',
		)
	);

	$wp_customize->add_control('kvarken_hide_breadcrumbs',
		array(
			'type' => 'checkbox',
			'label' =>  __( 'Check this box to hide the breadcrumb navigation.', 'kvarken' ),
			'section' => 'kvarken_section_one',
		)
	);
	
	$wp_customize->add_control('kvarken_hide_authorinfo',
		array(
			'type' => 'checkbox',
			'label' =>  __( 'Check this box to hide the author information and avatar that are displayed in single post view.', 'kvarken' ),
			'section' => 'kvarken_section_two',
		)
	);
	
	$wp_customize->add_control('kvarken_header_image',
		array(
			'type' => 'checkbox',
			'label' =>  __( 'Check this box to place the header image above the menu instead of below.', 'kvarken' ),
			'section' => 'kvarken_section_three',
		)
	);
	
	$wp_customize->add_control('kvarken_hide_shadows',
		array(
			'type' => 'checkbox',
			'label' =>  __( 'Check this box to hide all shadows.', 'kvarken' ),
			'section' => 'kvarken_section_four',
		)
	);
 
}
add_action( 'customize_register', 'kvarken_customizer' );

function kvarken_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

function kvarken_breadcrumbs(){
	if( get_theme_mod( 'kvarken_hide_breadcrumbs' ) == '') { 
	?>
		<div class="crumbs"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e('Home', 'kvarken');?></a>
				<?php
				if ( count( get_the_category() ) ) : 
					$kvarken_category = get_the_category(); 
					if($kvarken_category[0]){
						echo '} <a href="'.get_category_link($kvarken_category[0]->term_id ).'">'.$kvarken_category[0]->cat_name.'</a>';
					}
				endif;
				?>
				} <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</div>
	<?php
	}
}

function kvarken_author(){
	if( get_theme_mod( 'kvarken_hide_authorinfo' ) == '') {				
	?>
		<div class="author-info">
			<div class="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), 60); ?></div>
				<div class="author-description">
					<h2><?php printf( __('About %s','kvarken'), get_the_author() ); ?></h2>
					<?php	
					if ( get_the_author_meta( 'description' ) ) :  
						the_author_meta( 'description' ); 
					endif;
					?>
					<div class="author-link"><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' ) ); ?>">
					<?php printf( __( 'View all posts by %s', 'kvarken' ), get_the_author() ); ?></a>
				</div>
			</div>
		</div>
	<?php
	}
}
?>