<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

$root = dirname(__FILE__);
$files = array(
  'cleanup.php',
  'custom.php',
  'theme.php',
  'wrapper.php'
);

foreach ($files as $file) {
  require_once($root . '/' . $file);
}