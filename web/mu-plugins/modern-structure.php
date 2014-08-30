<?php

/**
 * Change theme root.
 *
 * @return string
 */

function ms_change_theme_root () {
  return apply_filters('ms_change_theme_root', ABSPATH . '..');
}

add_filter('theme_root', 'ms_change_theme_root');

/**
 * Change theme root uri.
 *
 * @return string
 */

function ms_change_theme_uri () {
  return apply_filters('ms_change_theme_uri', home_url() . '/app');
}

add_filter('theme_root_uri', 'ms_change_theme_uri');

/**
 * Change theme to the app directory theme.
 *
 * @return string
 */

function ms_change_theme () {
  return apply_filters('ms_change_theme', 'app');
}

add_filter('template', 'ms_change_theme');
add_filter('option_template', 'ms_change_theme');
add_filter('option_stylesheet', 'ms_change_theme');
add_filter('stylesheet', 'ms_change_theme');