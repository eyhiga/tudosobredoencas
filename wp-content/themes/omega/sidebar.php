<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Omega
 */
?>
	
	<?php do_action( 'before_sidebar' ); ?>

	<?php 
	if ( is_active_sidebar( 'primary' ) ) : 
	?>

		<aside class="sidebar-primary widget-area <?php echo apply_atomic( 'omega_sidebar_class', 'sidebar' );?>" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
			<?php dynamic_sidebar( 'primary' ); ?>
	  	</aside><!-- .sidebar -->

	<?php 
	elseif ('1c' != get_theme_mod( 'theme_layout' )) : 
	?>
		<aside class="sidebar-primary widget-area <?php echo apply_atomic( 'omega_sidebar_class', 'sidebar' );?>" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
			<section id="search" class="widget widget_search">
				<div class="widget-wrap">
					<?php get_search_form(); ?>
				</div><!-- .widget-wrap -->
			</section>

			<section id="archives" class="widget">
				<div class="widget-wrap">
					<h4 class="widget-title"><?php _e( 'Archives', 'omega' ); ?></h4>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</div><!-- .widget-wrap -->
			</section>

			<section id="meta" class="widget">
				<div class="widget-wrap">
					<h4 class="widget-title"><?php _e( 'Meta', 'omega' ); ?></h4>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</div><!-- .widget-wrap -->
			</section>
		</aside><!-- .sidebar -->

	<?php 
	endif; // end sidebar widget area 
	?>