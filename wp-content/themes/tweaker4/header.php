<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' - '; } ?><?php bloginfo('name'); if(is_home()) { echo ' - '; bloginfo('description'); } ?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<!--[if IE]>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/ie.css" type="text/css" media="screen, projection" />
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php if (function_exists('body_class')) body_class(); ?>>
	
	<div id="wrapper"><!-- closed in footer.php -->
		
		<div id="skip">
			<a href="#content" title="">Skip to Content</a>
		</div><!-- close #skip-->
		
		<div id="title-container">
			
			<div id="title">
				<h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title=""><?php bloginfo( 'name' ); ?></a></h1>
			</div><!-- close #title-->
			
			<div id="search">
				<?php get_search_form(); ?>
			</div><!-- close #search-->
			
		</div><!-- close #title-container-->
		
		<div id="header">
		
			<?php $header_image = get_header_image();
			if ( ! empty( $header_image ) ) : ?>
				<a href="<?php echo home_url( '/' ); ?>"><img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" /> </a>
			<?php endif; ?>

		
		</div><!-- close #header-->
		
		<div id="access">
			
			<?php if (function_exists( 'wp_nav_menu' )) {
				wp_nav_menu(array( 'theme_location' => 'tweaker4-main-menu', 'menu_class' => '', 'fallback_cb' => 'tweaker4_default_menu' ));
			} else {
				tweaker4_default_menu(); 
			} ?>
			
		</div><!-- close #access-->
		
		<div id="container"><!-- closed in sidebar.php -->