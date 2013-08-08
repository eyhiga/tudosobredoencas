<?php 
/**
 * The Header template file. 
 *
 *
 * @package      Tuned
 * @author       Elod Horvath
 * @copyright    2013-... Elod Horvath
 * @since        1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />	
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri() ?>/js/vendor/html5shiv.js" type="text/javascript"></script>	
	<![endif]-->	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="container" class="site">

	<header id="masthead" class="site-header" role="banner">
		<div class="tuned-row">
		<?php if( get_header_image() == '' ) : ?>
			<hgroup class="logo">			
				<h1 class="site-name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>						
			</hgroup><!-- end of .logo -->
		<?php else : ?>
		<div class="logo">			
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_header_image() ); ?>" alt="<?php echo bloginfo( 'name' ); ?>" width="<?php echo get_custom_header()->width ?>" height="<?php echo get_custom_header()->height; ?>" /></a>			
		</div><!-- end of .logo -->
		<?php endif; ?>
		
		<nav class="main-navigation" role="navigation">
			<h3 class="menu-toggle"><?php _e( 'Menu', 'tuned' ); ?></h3>
			<div class="assistive-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'tuned' ); ?>"><?php _e( 'Skip to content', 'tuned' ); ?></a></div>			
			<?php wp_nav_menu( array('theme_location' => 'primary' )); ?>
		</nav><!-- end of .main-navigation -->
		</div>
	</header><!-- end of #masthead .site-header -->

	<?php if( (is_front_page()) && is_active_sidebar( 'front-page-hero-total-width' ) ) : ?>		
			<?php dynamic_sidebar('front-page-hero-total-width'); // This is the Carousel Box ?>
	<?php endif; ?>
	
	<?php if( (is_front_page()) && is_active_sidebar( 'front-page-carousel-total-width' ) ) : ?>		
			<?php dynamic_sidebar('front-page-carousel-total-width'); // This is the Carousel Box ?>
	<?php endif; ?>
	
	<div id="main" class="site-main">
	<div class="tuned-row">