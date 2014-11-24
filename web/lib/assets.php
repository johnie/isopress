<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue CSS + JavaScript files.
 */

function site_assets() {
	wp_enqueue_style( 'app_css', home_url() . '/assets/css/main.css', false, null );
	wp_enqueue_script( 'app_js', home_url() . '/assets/js/main.js', array(), null, true );
}

add_action( 'wp_enqueue_scripts', 'site_assets', 100 );
