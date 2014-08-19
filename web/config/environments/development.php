<?php
/* Development */
define('DB_NAME', 'isopress');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_HOST', 'localhost');

define('WP_HOME', 'http://dev.isopress.com');
define('WP_SITEURL', 'http://dev.isopress.com/wp');

define('SAVEQUERIES', true);
define('WP_DEBUG', true);
define('SCRIPT_DEBUG', true);

/* Get this keys at https://api.wordpress.org/secret-key/1.1/salt/ */
define('AUTH_KEY',         '');
define('SECURE_AUTH_KEY',  '');
define('LOGGED_IN_KEY',    '');
define('NONCE_KEY',        '');
define('AUTH_SALT',        '');
define('SECURE_AUTH_SALT', '');
define('LOGGED_IN_SALT',   '');
define('NONCE_SALT',       '');