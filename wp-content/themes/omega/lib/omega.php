<?php

function omega_theme_inc() {

	/* Custom template tags for this theme. */
	require get_template_directory() . '/lib/inc/template-tags.php';

	/* Custom functions that act independently of the theme templates. */
	require get_template_directory() . '/lib/inc/extras.php';

	/* Customizer additions. */
	require get_template_directory() . '/lib/inc/customizer.php';

	/* override hybrid code. */
	require get_template_directory() . '/lib/inc/override.php';

	//require get_template_directory() . '/lib/inc/meta-box-theme-scripts.php';

}

add_action( 'after_setup_theme', 'omega_theme_inc', 20 );