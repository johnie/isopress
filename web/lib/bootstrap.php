<?php

/**
 * Bootstrap libraries.
 *
 * Lib is the "mu-plugins" directory with a new name.
 * This file will load all libs in sub directories.
 *
 * @version 1.0.0
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

/**
 * Load files in directories.
 *
 * @param string $lib_root
 */

function isopress_load_files ($lib_root) {
  $libs_dir = @opendir($lib_root);
  $lib_files = array();

  while (($file = readdir($libs_dir)) !== false) {
    if (substr($file, 0, 1) == '.' ) {
      continue;
    }

    if (is_dir($lib_root . '/' . $file)) {
      $base_path = $lib_root . '/' . $file;

      // Load libraries, will search for this files and require them:
      // - directory/directory.php
      // - directory/lib/directory.php

      if (is_file($base_path . '/' . $file . '.php')) {
        $lib_files[] = $base_path . '/' . $file . '.php';
      } else if (is_file($base_path . '/lib/' . $file . '.php')) {
        $lib_files[] = $base_path . '/lib/' . $file . '.php';
      }
    }
  }

  foreach ($lib_files as $lib_file) {
    require_once $lib_file;
  }
}

// Load all directories in this directory.
isopress_load_files(dirname(__FILE__));

function test_load () {
  register_ptb_directory(dirname(__FILE__) . '/page-types');
}

add_action('plugins_loaded', 'test_load');