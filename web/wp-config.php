<?php

/**
 * Do not edit this file. Edit the config files found in the config/ dir instead.
 * This file is required in the root directory so WordPress can find it.
 */

require_once(dirname(__DIR__) . '/vendor/autoload.php');
require_once(dirname(__DIR__) . '/config/application.php');

/**
 * This will fix so stuff like page templates and screenshot is loaded.
 */

global $wp_theme_directories;
$wp_theme_directories[] = WP_CONTENT_DIR;

/**
 * Sets up WordPress vars and included files.
 */

require_once(ABSPATH . 'wp-settings.php');
