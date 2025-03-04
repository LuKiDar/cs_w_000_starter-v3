<?php
/**
 * Enqueue Assets
 * Loads styles and scripts for the theme.
 */

function cs__enqueue_assets(){
	// CSS
	wp_enqueue_style('theme-style', get_stylesheet_uri());
	wp_enqueue_style('theme-global-css', get_template_directory_uri(). '/assets/css/global.min.css', array(), filemtime(get_template_directory(). '/assets/css/global.min.css'), 'all');

	// JS
	wp_enqueue_script('theme-main-js', get_template_directory_uri(). '/assets/js/main.min.js', array('jquery'), filemtime(get_template_directory(). '/assets/js/dist/main.min.js'), true);
}
add_action('wp_enqueue_scripts', 'cs__enqueue_assets');