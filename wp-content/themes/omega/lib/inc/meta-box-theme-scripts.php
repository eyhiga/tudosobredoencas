<?php
/**
 * Creates a meta box for the theme settings page, which holds a textarea for custom scripts within 
 * the theme.  To use this feature, the theme must support the 'scripts' argument for the 
 * 'hybrid-core-theme-settings' feature.
 *
 * @package    Omega
 * @subpackage inc
 * @author     Han <hello@themehall.com>
 * @copyright  Copyright (c) 2013, themehall.com
 * @link       http://themehall.com/hybrid-core
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* Create the scripts meta box on the 'add_meta_boxes' hook. */
add_action( 'add_meta_boxes', 'hybrid_meta_box_theme_add_scripts' );

/* Sanitize the scripts settings before adding them to the database. */
add_filter( 'sanitize_option_' . hybrid_get_prefix() . '_theme_settings', 'hybrid_meta_box_theme_save_scripts' );

/**
 * Adds the core theme scripts meta box to the theme settings page in the admin.
 *
 * @since 0.3.0
 * @return void
 */
function hybrid_meta_box_theme_add_scripts() {

	add_meta_box( 'hybrid-core-scripts', __( 'Header and Footer Scripts', 'hybrid-core' ), 'hybrid_meta_box_theme_display_scripts', hybrid_get_settings_page_name(), 'normal', 'high' );
}

/**
 * Creates a meta box that allows users to customize their scripts.
 *
 * @since 0.3.0
 * @uses wp_editor() Creates an instance of the WordPress text/content editor.
 * @return void
 */
function hybrid_meta_box_theme_display_scripts() {

?>
	<p>
			<label for="<?php echo hybrid_settings_field_id( 'header_scripts' ); ?>">Enter scripts or code you would like output to <code>wp_head()</code>:</label>
		</p>
	
	<textarea name="<?php echo hybrid_settings_field_name( 'header_scripts' ) ?>" id="<?php echo hybrid_settings_field_id( 'header_scripts' ); ?>" cols="78" rows="8"><?php echo hybrid_get_setting( 'header_scripts' ); ?></textarea>

	<p><span class="description"><?php printf( __( 'The %1$s hook executes immediately before the closing %2$s tag in the document source.', 'genesis' ), '<code>wp_head()</code>', '<code>&lt;/head&gt;</code>' ); ?></span></p>

	<hr class="div" />

	<p>
		<label for="<?php echo hybrid_settings_field_id( 'footer_scripts' ); ?>"><?php printf( __( 'Enter scripts or code you would like output to %s:', 'genesis' ), '<code>wp_footer()</code>' ); ?></label>
	</p>

	<textarea name="<?php echo hybrid_settings_field_name( 'footer_scripts' ); ?>" id="<?php echo hybrid_settings_field_id( 'footer_scripts' ); ?>" cols="78" rows="8"><?php echo hybrid_get_setting( 'footer_scripts' ) ; ?></textarea>

	<p><span class="description"><?php printf( __( 'The %1$s hook executes immediately before the closing %2$s tag in the document source.', 'genesis' ), '<code>wp_footer()</code>', '<code>&lt;/body&gt;</code>' ); ?></span></p>
	

<?php }

/**
 * Saves the scripts meta box settings by filtering the "sanitize_option_{$prefix}_theme_settings" hook.
 *
 * @since 0.3.0
 * @param array $settings Array of theme settings passed by the Settings API for validation.
 * @return array $settings
 */
function hybrid_meta_box_theme_save_scripts( $settings ) {

	/* Make sure we kill evil scripts from users without the 'unfiltered_html' cap. */
	if ( isset( $settings['footer_scripts'] ) && !current_user_can( 'unfiltered_html' ) )
		$settings['footer_scripts'] = stripslashes( wp_filter_post_kses( addslashes( $settings['footer_scripts'] ) ) );

	if ( isset( $settings['header_scripts'] ) && !current_user_can( 'unfiltered_html' ) )
		$settings['header_scripts'] = stripslashes( wp_filter_post_kses( addslashes( $settings['header_scripts'] ) ) );

	/* Return the theme settings. */
	return $settings;
}

?>