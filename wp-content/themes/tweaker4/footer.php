			<div id="footer-container">
            
				<div id="footer-left">
					<?php dynamic_sidebar( 'footer-left' ); ?>
				</div><!-- close #footer-left-->
                
				<div id="footer-center">
					<?php dynamic_sidebar( 'footer-center' ); ?>
				</div><!-- close #footer-center-->
                
				<div id="footer-right">
					<?php dynamic_sidebar( 'footer-right' ); ?>
				</div><!-- close #footer-right-->
			
            </div><!-- close #footer-container-->
			
			<!-- It is completely optional, but if you like the Theme I would appreciate it if you keep the credit link at the bottom. -->
			<div id="footer-bottom">
				<span><?php _e( 'Copyright', 'tweaker4' ); ?> &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?> | 
				<?php printf( __( 'Powered by %1$s and %2$s', 'tweaker4' ), '<a href="http://wordpress.org/">WordPress</a>', '<a href="http://tweaker.co.za/">Tweaker4</a>' ); ?></span> 
			</div><!-- close #footer-bottom-->
		
		</div><!-- close #wrapper, openend in header.php -->
		
		<?php wp_footer(); ?>
	
	</body>
	
</html>