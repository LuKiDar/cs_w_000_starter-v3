<?php
/**
 * Theme Functions
 * Handles theme setup, enqueues scripts and styles.
 */

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