<?php // Based on options page included in the twentyeleven theme.

wp_enqueue_style( 'tweaker4-theme-options', get_template_directory_uri() . '/options/options.css' );

function tweaker4_theme_options_init() {

	if ( false === tweaker4_get_theme_options() )
		add_option( 'tweaker4_theme_options', tweaker4_get_default_theme_options() );

	register_setting(
		'tweaker4_options', 
		'tweaker4_theme_options',
		'tweaker4_theme_options_validate'
	);
}
add_action( 'admin_init', 'tweaker4_theme_options_init' );

function tweaker4_theme_options_add_page() {
	add_theme_page(
		__( 'Theme Options', 'tweaker4' ),
		__( 'Theme Options', 'tweaker4' ),
		'edit_theme_options', 
		'theme_options', 
		'theme_options_render_page'
	);
}
add_action( 'admin_menu', 'tweaker4_theme_options_add_page' );

function tweaker4_color_schemes() {
	$color_scheme_options = array(
		'white' => array(
			'value' => 'white',
			'label' => __( 'White', 'tweaker4' ),
			'thumbnail' => get_template_directory_uri() . '/options/images/white.png',
		),
		'black' => array(
			'value' => 'black',
			'label' => __( 'Black', 'tweaker4' ),
			'thumbnail' => get_template_directory_uri() . '/options/images/black.png',
		),
	);

	return apply_filters( 'tweaker4_color_schemes', $color_scheme_options );
}

function tweaker4_get_default_theme_options() {
	$default_theme_options = array(
		'color_scheme' => 'light',
	);

	return apply_filters( 'tweaker4_default_theme_options', $default_theme_options );
}

function tweaker4_get_theme_options() {
	return get_option( 'tweaker4_theme_options' );
}

function theme_options_render_page() {
	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2><?php printf( __( '%s Theme Options', 'tweaker4' ), get_current_theme() ); ?></h2>
		<?php settings_errors(); ?>

		<form method="post" action="options.php">
			<?php
				settings_fields( 'tweaker4_options' );
				$options = tweaker4_get_theme_options();
				$default_options = tweaker4_get_default_theme_options();
			?>

			<table class="form-table">

				<tr valign="top" class="image-radio-option"><th scope="row"><?php _e( 'Color Scheme', 'tweaker4' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Color Scheme', 'tweaker4' ); ?></span></legend>
						<?php
							foreach ( tweaker4_color_schemes() as $color ) {
								?>
								<div class="layout">
								<label class="description">
									<input type="radio" name="tweaker4_theme_options[color_scheme]" value="<?php echo esc_attr( $color['value'] ); ?>" <?php checked( $options['color_scheme'], $color['value'] ); ?> />
									<span>
										<img src="<?php echo esc_url( $color['thumbnail'] ); ?>"/>
									</span>
								</label>
								</div>
								<?php
							}
						?>
						</fieldset>
					</td>
				</tr>

				<tr valign="top" class="image-radio-option">
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Color Scheme', 'tweaker4' ); ?></span></legend>
						</fieldset>
					</td>
				</tr>
				
				
				
			</table>
			
			<p><?php _e( 'Remember that you can customize the <strong>Widgets</strong>, <strong>Menus</strong>, <strong>Background</strong> and <strong>Header</strong> from the <strong>Appearance</strong> menu.', 'tweaker4' ); ?></p>
			
			<?php submit_button(); ?>
			
			<?php screen_icon(); ?>
			<h2><?php printf( __( '%s Support', 'tweaker4' ), get_current_theme() ); ?></h2>
			<p><?php _e( 'Should you experience any problem with the theme please visit the <a href="http://forum.tweaker.co.za/" title="">Support Forum</a>.', 'tweaker4' ); ?></p>
			
		</form>
	</div>
	<?php
}

function tweaker4_theme_options_validate( $input ) {
	$output = $defaults = tweaker4_get_default_theme_options();

	if ( isset( $input['color_scheme'] ) && array_key_exists( $input['color_scheme'], tweaker4_color_schemes() ) )
		$output['color_scheme'] = $input['color_scheme'];

	return apply_filters( 'tweaker4_theme_options_validate', $output, $input, $defaults );
}

function tweaker4_enqueue_color_scheme() {
	$options = tweaker4_get_theme_options();
	$color_scheme = $options['color_scheme'];

	if ( 'black' == $color_scheme )
		wp_enqueue_style( 'black', get_template_directory_uri() . '/css/black.css', array(), null );

	do_action( 'tweaker4_enqueue_color_scheme', $color_scheme );
}
add_action( 'wp_enqueue_scripts', 'tweaker4_enqueue_color_scheme' );
?>