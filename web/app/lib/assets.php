<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

/**
 * Enqueue CSS + JavaScript files.
 */

function app_assets () {
  // Enqueue CSS file.
  wp_enqueue_style('app_css', WP_CONTENT_URL . 'assets/css/main.css', false, null);

  // Enqueue JavaScript file.
  wp_enqueue_script('app_js', WP_CONTENT_URL . 'assets/js/main.js', array(), null, true);
}

add_action('wp_enqueue_scripts', 'app_assets', 100);