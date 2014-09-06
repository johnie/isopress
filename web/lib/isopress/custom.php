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