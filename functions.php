<?php
/**
 * Theme Functions
 * Handles theme setup, enqueues scripts and styles.
 */

/* --- Constants --- */
define('CSWP', 'cswp');
include 'inc/constants.php';


/* --- Theme setup --- */
function cs__theme_setup(){
    // Enable translations
	load_theme_textdomain(CSWP, get_template_directory() .'/languages');

    // Add support for various theme features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('custom-logo');
	add_theme_support('menus');
	add_theme_support('responsive-embeds');
	add_theme_support('wp-block-styles');
    add_theme_support('editor-styles');
	add_theme_support('align-wide');
	//add_theme_support('woocommerce');

    // Register navigation menus
	register_nav_menus(array(
		'primary' => __('Primary Menu', CSWP),
	));
	
	add_filter('should_load_separate_core_block_assets', '__return_true'); // Disable loading core block inline styles
	remove_action('enqueue_block_editor_assets', 'wp_enqueue_editor_block_directory_assets'); // Remove the block directory
	remove_theme_support('core-block-patterns'); // Remove core block patterns
	define('CORE_UPGRADE_SKIP_NEW_BUNDLED', true); // Don't install bundled themes when WordPress updates
}
add_action('after_setup_theme', 'cs__theme_setup');

// Enable SVG Uploads
function cs__mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cs__mime_types');


/* --- Actions + Filters --- */
// Change custom logo class
add_filter('get_custom_logo', function( $html ){
	$html = str_replace('custom-logo-link', 'logo', $html);
	$html = str_replace('custom-logo', 'logo__image', $html);
	return $html;
});


/* --- Includes --- */
// Theme
require_once 'inc/enqueue.php';
require_once 'inc/wordpress-cleanup.php';
require_once 'inc/helper-functions.php';

// Functionality
require_once 'inc/gutenberg.php';
include_once 'inc/admin.php';
// require_once 'inc/post-types.php';
// require_once 'inc/cpt-post.php';
// require_once 'inc/breadcrumbs.php';
// require_once 'inc/menu-walker.php';
// include_once 'inc/pagination.php';
// require_once 'inc/post-types.php';
// include_once 'inc/shortcodes.php';
// require_once 'inc/widgets.php';

// Plugin support
require_once 'inc/plugin-acf.php';