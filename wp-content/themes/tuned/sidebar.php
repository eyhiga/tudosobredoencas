<?php 
/**
 * The Sidebar template file. 
 *
 *
 * @package      Tuned
 * @author       Elod Horvath
 * @copyright    2013-... Elod Horvath
 * @since        1.0
 */
?>
	<div id="secondary" class="widget-area">
		<?php if( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		<?php endif; ?>
	</div><!-- end of #secondary .widget-area -->