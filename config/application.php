<?php
$root_dir = dirname(dirname(__FILE__)) . '/web';

/**
 * Load right environment.
 */

require_once 'environment.php';

/**
 * Custom Content Directory
 */

define('CONTENT_DIR', '/');
define('WP_CONTENT_DIR', $root_dir . CONTENT_DIR);
define('WP_CONTENT_URL', WP_HOME . CONTENT_DIR);

/**
 * DB settings
 */

define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
$table_prefix = 'wp_';

/**
 * WordPress Localized Language
 * Default: English
 *
 * A corresponding MO file for the chosen language must be installed to app/languages
 */

define('WPLANG', '');

/**
 * Custom Settings
 */

define('AUTOMATIC_UPDATER_DISABLED', true);
define('DISABLE_WP_CRON', true);
define('DISALLOW_FILE_EDIT', true);
define('FS_METHOD', 'direct');

/**
 * Plugins directory settings.
 */

$plugins_dir = CONTENT_DIR . 'vendor/plugins';
define('WP_PLUGIN_DIR', $root_dir . $plugins_dir);
define('WP_PLUGIN_URL', WP_HOME . $plugins_dir);
define('PLUGINDIR', $plugins_dir);

/**
 * MU-Plugins directory settings.
 */

$muplugins_dir = CONTENT_DIR . 'lib';
define('WPMU_PLUGIN_DIR', $root_dir . $muplugins_dir);
define('WPMU_PLUGIN_URL', WP_HOME . $muplugins_dir);

/**
 * Bootstrap WordPress
 */

if (!defined('ABSPATH')) {
  define('ABSPATH', $root_dir . '/wp/');
}