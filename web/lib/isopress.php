<?php

/**
 * Plugin Name: Isopress
 * Plugin URI: http://github.com/frozzare/isopress
 * Description: WordPress stack
 * Author: Fredrik Forsmo
 * Version: 1.0.0
 * Author URI: http://forsmo.me/
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load files in directory.
 *
 * @param string $root
 * @param array $exlude
 * @since 1.0.0
 */

function isopress_load_files( $root, $exlude = array() ) {
	$dir    = @opendir( $root );
	$files  = array();

	while ( ( $file = readdir( $dir ) ) !== false ) {
		if ( substr( $file, 0, 1 ) == '.' ) {
			continue;
		}

		if ( is_file( $root . '/' . $file ) && ! in_array( $file, $exlude ) ) {
			$files[] = $root . '/' . $file;
		}
	}

	foreach ( $files as $file ) {
		require_once $file;
	}
}

/**
 * All plugins in the right order to load.
 * ".php" isn't required to add.
 *
 * "timber" will load "timber/timber.php"
 * "isopress/*" will load all files in "isopress" directory.
 * "timber.php" will load "timber/timber.php"
 * "path/to/plugin.php" will load "path/to/plugin.php"
 */

$plugins   = array(
	'timber',
	'isopress/*',
	'site/*'
);

foreach ( $plugins as $plugin ) {
	if ( strpos( $plugin, '/*' ) !== false ) {
		isopress_load_files( dirname( __FILE__ ) . '/' . rtrim( $plugin, '*' ) );
		continue;
	}

	if ( strpos( $plugin, '/' ) === false ) {
		$plugin .= '/' . $plugin;
	}

	if ( substr( strrchr( $plugin, '.' ), 1 ) !== 'php' ) {
		$plugin .= '.php';
	}

	require_once dirname( __FILE__ ) . '/' . $plugin;
}
