<?php

/**
 * Home and site urls.
 */

define( 'WP_HOME', 'http://dev.isopress.com' );
define( 'WP_SITEURL', 'http://dev.isopress.com/wp' );

/**
 * Tell the application that we are running tests.
 */

define( 'UNIT_TEST_ENVIRONMENT', true );

// Load the application configuration.
require 'application.php';

/**
 * The database that the WordPress tests should use.
 */

define( 'DB_NAME', 'wptests' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

$table_prefix = 'wptests_';

/**
 * Test settings.
 */

define( 'WP_TESTS_DOMAIN', 'dev.isopress.com' );
define( 'WP_TESTS_EMAIL', 'admin@dev.isopress.com' );
define( 'WP_TESTS_TITLE', 'Isopress tests' );
define( 'WP_CACHE_KEY_SALT', 'isopresstests' );

define( 'WP_PHP_BINARY', 'php' );