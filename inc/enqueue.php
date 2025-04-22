<?php
/**
 * Enqueue Assets
 */

// Theme styles and scripts
function cs__enqueue_assets(){
	// CSS
	wp_enqueue_style('theme-style', get_stylesheet_uri());
	wp_enqueue_style('theme-main-css', get_template_directory_uri(). '/assets/css/main.min.css', array(), filemtime(get_template_directory(). '/assets/css/main.min.css'), 'all');

	// JS
	wp_enqueue_script('theme-main-js', get_template_directory_uri(). '/assets/js/main.min.js', array('jquery'), filemtime(get_template_directory(). '/assets/js/dist/main.min.js'), true);
}
add_action('wp_enqueue_scripts', 'cs__enqueue_assets');


// Gutenberg styles
function cs__enqueue_gutenberg_styles(){
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor.min.css');
}
add_action('after_setup_theme', 'cs__enqueue_gutenberg_styles');