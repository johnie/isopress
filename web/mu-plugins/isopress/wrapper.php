<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

/**
 * Theme wrapper. This is a modified version of Roots theme wrapper.
 * So all credits to them and scribu.
 *
 * @link http://roots.io/an-introduction-to-the-roots-theme-wrapper/
 * @link http://scribu.net/wordpress/theme-wrappers.html
 */

/**
 * Get the template path to include in our base file.
 *
 * @return string
 */

function isopress_template_path () {
  return Isopress_Wrapping::$main_template;
}

/**
 * The wrapper class.
 */

class Isopress_Wrapping {

  // Stores the full path to the main template file
  public static $main_template;

  // Stores the base name of the template file; e.g. 'page' for 'page.php' etc.
  public static $base;

  /**
   * Create a new instance of the wrapper.
   *
   * @param string $template
   */

  public function __construct ($template = 'base.php') {
    $this->slug = basename($template, '.php');
    $this->templates = array($template);
    if (self::$base) {
      $str = substr($template, 0, -4);
      array_unshift($this->templates, sprintf($str . '-%s.php', self::$base));
    }
  }

  /**
   * Get the path to the template file.
   *
   * @return string
   */

  public function __toString () {
    $this->templates = apply_filters('isopress_wrap_' . $this->slug, $this->templates);
    return locate_template($this->templates);
  }

  /**
   * Wrap the template.
   *
   * @return Isopress_Wrapping
   */

  public static function wrap ($main) {
    self::$main_template = $main;
    self::$base = basename(self::$main_template, '.php');

    if (self::$base === 'index') {
      self::$base = false;
    }

    return new Isopress_Wrapping();
  }

}

add_filter('template_include', array('Isopress_Wrapping', 'wrap'));