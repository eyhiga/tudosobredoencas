<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?> >
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
<!--Don't forget to add a favicon for your site!-->
<link rel="icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico" />
<!--Favicon-->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--[if lte IE 7]>
<link type="text/css" rel="stylesheet" media="screen" href="<?php bloginfo('template_directory'); ?>/ie.css" />
<![endif]-->
<!--[if IE 6]>
<script src="<?php bloginfo('template_directory'); ?>/js/DD_belatedPNG_0.0.8a.js" type="text/javascript"></script>
<script type="text/javascript">
	DD_belatedPNG.fix('#main-block, #left-block, #header, .top-green, .bottom-green, .top-blue, .bottom-blue, .transparent, .top-widget, .bottom-widget, #footer, .more-pages p, post-tags p, .nav-entries .prev a, .nav-entries .next a, .comments-navigation .prev a, .comments-navigation .next a, input, textarea, h1, h1 a, h2, h2 a, h3, h4, h5, h6, p');
</script>
<![endif]-->
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_get_archives('type=monthly&format=link'); ?>
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="header">
		<div class="top-green">
			<div class="bottom-green">
				<div class="transparent">
					<div class="float-left w600">
						<h1>
							<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
						</h1>
						<div id="description"><span><?php bloginfo('description'); ?></span></div>
					</div>
					<div class="float-right" id="header-searchform">
						<form role="search" method="get" class="searchform" action="<?php bloginfo('url'); ?>">
						<div>
							<label class="screen-reader-text display-none" for="search-term">Search for:</label>
							<input type="text" onblur="if (this.value == '') {this.value = 'Input search term(s)';}" onfocus="if (this.value == 'Input search term(s)') {this.value = '';}" value="<?php echo esc_attr(__('Input search term(s)')); ?>" name="s" id="search-term" />
							<input type="submit" id="header-searchsubmit" value="Search" />
						</div>
						</form>
					</div>
					<div class="clear-both"></div>
					<div id="menu">						
						<?php wp_nav_menu( array( 'menu' => '', 'fallback_cb' => 'wp_page_menu', 'depth' => 3, 'container' => false )); ?>
						<div class="clear-both"></div>
					</div>
				</div>
			</div>
		</div>
	</div><!--#header-->
<div id="main">