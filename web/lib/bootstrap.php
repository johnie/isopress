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

// Load all directories in this directory.
isopress_load_files(dirname(__FILE__));