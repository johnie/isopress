<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

/**
 * Enqueue CSS + JavaScript files.
 */

function app_assets () {
  // Enqueue CSS file.
  wp_enqueue_style('app_css', get_template_directory_uri() . '/assets/css/main.css', false, null);

  // Enqueue jQuery if it don't exists.
  wp_enqueue_script('jquery');

  // Enqueue JavaScript file.
  wp_enqueue_script('app_js', get_template_directory_uri() . '/assets/js/main.js', array(), null, true);
}

add_action('wp_enqueue_scripts', 'app_assets', 100);