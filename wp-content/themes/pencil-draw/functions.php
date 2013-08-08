<?php
/*
Template Name: Functions
*/
?>
<?php
//Navigation menus support
if ( function_exists( 'register_nav_menu' ) ) {
	register_nav_menu('main_menu', 'Main Navigation Menu'
	);
}

//Feed links support
add_theme_support('automatic-feed-links');

//Content width
if ( !isset( $content_width ) )
	$content_width = 1020; // Should be equal to the width the theme is designed for
	
if ( function_exists('register_sidebar') )
	register_sidebar( array(
		'name' => 'Left Sidebar',
		'before_widget' => '<div class="widget"><div class="top-widget"><div class="bottom-widget"><div class="transparent">',
		'after_widget' => '</div></div></div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

function widget_search() {
?>
	<div class="widget">
		<div class="blue-draw">
			<div class="top-blue">
				<div class="bottom-blue">
					<div class="transparent">
						<h3>Search</h3>
						<div id="sidesearch">
							<form method="get" action="<?php bloginfo('url'); ?>/">
								<input type="text" value="" name="s" class="text" />
								<input type="submit" class="search-submit button" value="Go!" />
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}
function widget_calendar() {
?>
	<div class="widget">	
		<div class="green-draw">
			<div class="top-green">
				<div class="bottom-green">
					<div class="transparent">
						<h3>Calendar</h3>
						<div>
							<?php get_calendar(); ?> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}
function widget_tag_cloud() {
	$options = get_option('widget_tag_cloud');    
	$title = empty($options['title']) ? __('Tags') : apply_filters('widget_title', $options['title']);
?>
	<div class="widget">
		<div class="green-draw">
			<div class="top-green">
				<div class="bottom-green">
					<div class="transparent">
						<h3><?php echo $title ?></h3>
						<div class="tags">
							<?php wp_tag_cloud();?>
						</div>    
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}

//Register Widgets
	wp_register_sidebar_widget(1, __('Search Form'), 'widget_search');
	wp_register_sidebar_widget(2, __('Custom Calendar'), 'widget_calendar');
	wp_register_sidebar_widget(3, __('Custom Tag Cloud'), 'widget_tag_cloud');
	
//Custom comment form fields and configuration

function template_comment_form_fields($fields) {
	$commenter = wp_get_current_commenter();
	$fields['author'] = '<p class="comment-form-author">' . '<label for="author">' . __( 'Your Name *' ) . '</label> ' . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . ' /></p>';
	$fields['email'] = '<p class="comment-form-email"><label for="email">' . __( 'Your Email Address *' ) . '</label> ' . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . ' /></p>';
	$fields['url'] = '<p class="comment-form-url"><label for="url">' . __( 'A Link to Your Website' ) . '</label>' . '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>';
	return $fields;
	}
add_filter ('comment_form_default_fields', 'template_comment_form_fields');
