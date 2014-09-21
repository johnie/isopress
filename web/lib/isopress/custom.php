<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

/**
 * Change login error message.
 *
 * @param $content
 * @return string
 */

function isopress_change_login_errors ($content) {
  // Fixes so you can't guess the username.
  return "<strong><?php _e('ERROR', 'isopress'); ?></strong><?php _e('You have entered incorrect login details', 'isopress'); ?>";
}

add_filter('login_errors', 'isopress_change_login_errors');

/**
 * Shortcut function for WordPress site title.
 */

function isopress_title () {
  bloginfo('name') ?> | <?php is_home() ? bloginfo('description') : wp_title('|', true, 'right');
}

/**
 * Change the upload path.
 *
 * @return string
 */

function isopress_upload_path () {
  return get_template_directory() . 'assets/uploads';
}

add_filter('option_upload_path', 'isopress_upload_path');

/**
 * Change the upload url path.
 *
 * @return string
 */

function isopress_upload_url_path () {
  return get_template_directory_uri() . 'assets/uploads';
}

add_filter('option_upload_url_path', 'isopress_upload_url_path');