<?php 
/**
 * The Footer template file. 
 *
 *
 * @package      Tuned
 * @author       Elod Horvath
 * @copyright    2013-... Elod Horvath
 * @since        1.0
 */
?>
	</div><!-- end of .tuned-row -->
	</div><!-- end of #main .site-main -->
	
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="tuned-row">
		<div class="site-info">
		<p>
			<?php do_action( 'tuned_credits' ); ?>
			<?php echo esc_attr( '&copy; ' ) . date('Y '); ?> <a href="<?php esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
		</p>
		<p>
			<a href="<?php echo esc_url( 'http://www.wordpress.org' ); ?>" title="<?php echo esc_attr( 'Wordpress' ); ?>" target="_blank"><?php _e( 'Powered by WordPress', 'tuned' ); ?></a> <?php _e( 'and', 'tuned' ) ?>
			<a href="<?php echo esc_url( 'http://www.tunedthemes.com' ); ?>" title="<?php esc_attr_e( 'Tuned Themes' ); ?>" target="_blank"><?php _e( 'Tuned Themes', 'tuned' ); ?></a>
		</p>
		</div><!-- end of .site-info -->
		</div><!-- end of .tuned-row -->
	</footer><!-- end of #colophon .site-footer -->

</div><!-- end of #container .site -->

<?php wp_footer(); ?>
</body>
</html>