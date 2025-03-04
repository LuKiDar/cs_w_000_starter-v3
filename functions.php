<?php
/**
 * Theme Functions
 * Handles theme setup, enqueues scripts and styles.
 */

// Constants
define('CSWP', 'cswp');
include 'inc/constants.php';

// Theme setup
function cs__theme_setup() {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
	register_nav_menus(array(
		'primary' => __('Primary Menu', 'cstheme'),
	));
}
add_action('after_setup_theme', 'cs__theme_setup');


/*** Includes ***/
// Theme
require_once 'inc/enqueue.php';
// require_once 'inc/helper-functions.php';
// require_once 'inc/wordpress-cleanup.php';

// Functionality
require_once 'inc/gutenberg.php';
// include_once 'inc/admin.php';
// require_once 'inc/post-types.php';
// require_once 'inc/cpt-post.php';
// require_once 'inc/breadcrumbs.php';
// require_once 'inc/menu-walker.php';
// include_once 'inc/pagination.php';
// require_once 'inc/post-types.php';
// include_once 'inc/shortcodes.php';
// require_once 'inc/widgets.php';

// Plugin support
// require_once 'inc/acf.php';