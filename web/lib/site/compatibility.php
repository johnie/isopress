<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add backward compatibility for title tag.
 *
 * @link https://codex.wordpress.org/Title_Tag
 */

if ( ! function_exists( '_wp_render_title_tag' ) || ! current_theme_supports('title-tag') ) {
  function site_title_tag() {
    ?><title><?php echo isopress_title(); ?></title><?php
  }

  add_action( 'wp_head', 'site_title_tag' );
}
