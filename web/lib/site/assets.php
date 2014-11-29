<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue CSS + JavaScript files.
 */

function site_assets() {
	$css     = array();
	$scripts = array();

	if ( WP_ENV === 'development' ) {
		// CSS that should be loaded
		$css = array_merge( $scripts, array(
			'site_css' => home_url() . '/assets/css/main.css'
		) );

		// Scripts that should be loaded
		$scripts = array_merge( $scripts, array(
			'site_js' => home_url() . '/assets/js/main.js'
		) );
	} else {
		// CSS that should be loaded
		$css = array_merge( $scripts, array(
			'site_css' => home_url() . '/assets/css/main.min.css'
		) );

		// Scripts that should be loaded
		$scripts = array_merge( $scripts, array(
			'site_js' => home_url() . '/assets/js/main.min.js'
		) );
	}

	// Load css files.
	foreach ( $css as $key => $value ) {
		wp_enqueue_style( $key, $value, false, null );
	}

	// Load scripts files.
	foreach( $scripts as $key => $value ) {
		wp_enqueue_script( $key, $value, array(), null, true );
	}

}

add_action( 'wp_enqueue_scripts', 'site_assets', 100 );
