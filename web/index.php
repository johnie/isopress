<?php
// WordPress view bootstrapper
error_reporting(E_ALL);
ini_set('display_errors', '1');
define('WP_USE_THEMES', true);
require(dirname( __FILE__ ) . '/wp/wp-blog-header.php');