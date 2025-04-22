<?php
/**
 * TinyMCE editor
 * 
 * TO DO:
 * - add TinyMCE shortcodes
 */

/* --- TinyMCE: add style selector --- */
function cs__mce_add_more_buttons( $buttons ){
	$buttons[] = 'styleselect';
	return $buttons;
}
add_filter('mce_buttons_2', 'cs__mce_add_more_buttons');

function cs__mce_before_init( $settings ){
	$textcolor_map = array(
		'000000', 'Black',
		'333333', 'Gray 900',
		'B0B0B0', 'Gray 500',
		'F5F5F5', 'Gray 100',
		'FFFFFF', 'White',
	);
	$style_formats = array(
		array(
			'title' => 'Inline',
			'items' => array(
				['title' => 'Bold',				'icon' => 'bold',			'format' => 'bold'],
				['title' => 'Italic',			'icon' => 'italic',			'format' => 'italic'],
				['title' => 'Underline',		'icon' => 'underline',		'format' => 'underline'],
				['title' => 'Strikethrough',	'icon' => 'strikethrough',	'format' => 'strikethrough'],
				['title' => 'Superscript',		'icon' => 'superscript',	'format' => 'superscript'],
				['title' => 'Subscript',		'icon' => 'subscript',		'format' => 'subscript'],
				['title' => 'Code',				'icon' => 'code',			'format' => 'code'],
			)
		),
		array(
			'title' => 'Font sizes',
			'items' => array(
				['title' => 'Heading 1',				'selector' => 'p,h1,h2,h3,h4,h5,h6',	'classes' => 'has-xx-large-font-size'],
				['title' => 'Heading 2',				'selector' => 'p,h1,h2,h3,h4,h5,h6',	'classes' => 'has-x-large-font-size'],
				['title' => 'Heading 2',				'selector' => 'p,h1,h2,h3,h4,h5,h6',	'classes' => 'has-large-font-size'],
				['title' => 'Body large, Heading 4',	'selector' => 'p,h1,h2,h3,h4,h5,h6',	'classes' => 'has-medium-font-size'],
				['title' => 'Body regular, Heading 5',	'selector' => 'p,h1,h2,h3,h4,h5,h6',	'classes' => 'has-small-font-size'],
				['title' => 'Body small, Heading 6',	'selector' => 'p,h1,h2,h3,h4,h5,h6',	'classes' => 'has-x-small-font-size'],
			)
		),
		// array(
		// 	'title' => 'Buttons',
		// 	'items' => array(
		// 		['title' => 'Default button',	'selector' => 'a',	'classes' => 'button--fill',		'icon' => 'link'],
		// 		['title' => 'Outlined button',	'selector' => 'a',	'classes' => 'button--outline',		'icon' => 'link'],
		// 	)
		// )
	);
	$settings['textcolor_cols'] = 6;
	$settings['textcolor_map'] = json_encode($textcolor_map);
	$settings['style_formats'] = json_encode($style_formats);
	return $settings;
}
add_filter('tiny_mce_before_init', 'cs__mce_before_init');


/* --- TinyMCE: remove the Color Picker plugin --- */
function cs__mce_remove_custom_colors( $plugins ){
	foreach ( $plugins as $key=>$plugin_name ){
		if ( $plugin_name==='colorpicker' ){
			unset($plugins[$key]);
			return $plugins;            
		}
	}
	return $plugins;
}
add_filter('tiny_mce_plugins', 'cs__mce_remove_custom_colors');