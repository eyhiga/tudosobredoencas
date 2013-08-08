<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="wrapper">
	<div id="header">
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			<?php 
			if(get_theme_mod( 'kvarken_header_image' ) == '') {	
			?>
				<div id="header-menu" role="navigation"><?php wp_nav_menu( array( 'theme_location' => 'header' ) ); ?></div>
			<?php
			}
			?>
		<?php
		if ( is_home() ) {
			$header_image = get_header_image();
			if ( $header_image ) :
			?>
				<div class="header-image"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></div>
			<?php 
			endif;
		}
		?>
		<?php
		if( get_theme_mod( 'kvarken_header_image' ) <> '') {
			?>
				<div id="header-menu" role="navigation"><?php wp_nav_menu( array( 'theme_location' => 'header' ) ); ?></div>
			<?php
		}
			?>
	</div>