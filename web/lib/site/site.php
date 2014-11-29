<?php


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Set timezone.
 */

date_default_timezone_set( 'Europe/Stockholm' );

/**
 * Set up the content width value based on the theme's design.
 */

if ( ! isset( $content_width ) ) {
	$content_width = 860;
}

/**
 * Setup the site.
 */

function site_setup() {
	// Setup language.
	$domain = 'isopress';
	$path   = get_template_directory() . '/languages/' . $domain . '-' . get_locale() . '.mo';
	load_textdomain( $domain, $path );

	// Add support for post thumbnails.
	add_theme_support( 'post-thumbnails' );

	// Add theme support for title tag.
	add_theme_support( 'title-tag' );

	// Add post formats.
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio' ) );

	// Don't use the default gallery style.
	add_filter( 'use_default_gallery_style', '__return_false' );

	// Add HTML5 markup for captions
	add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list' ) );

	// Register wp_nav_menu() menus
	register_nav_menus( array(
    'primary_navigation' => __( 'Primary Navigation', 'isopress' )
  ) );
}

add_action( 'after_theme_setup', 'site_setup' );
