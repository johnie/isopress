<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

$path = dirname(__FILE__) . '/isopress/';
$files = array(
  'cleanup.php',
  'custom.php',
  'theme.php',
  'wrapper.php'
);

// Load all files.
foreach ($files as $file) {
  if (file_exists($path . $file)) {
    require_once $path . $file;
  }
}