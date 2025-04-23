<?php
/**
 * Gutenberg
 */

/* --- Register core block variations --- */
function cs__register_block_styles(){
	register_block_style('core/button', ['name' => 'outlined', 'label' => __('Outlined', CSWP)]);
}
add_action('init', 'cs__register_block_styles');


/* --- Register block categories --- */
function cs__register_block_categories( $categories, $post ){
	return array_merge(
		array(
			array(
				'slug' => 'cs-blocks',
				'title' => __('Theme blocks', CSWP),
			),
		),
		$categories
	);
}
add_filter('block_categories_all', 'cs__register_block_categories', 10, 2);


/* --- Get Blocks --- */
function cs__get_blocks(){
	$blocks = scandir(get_stylesheet_directory() .'/parts/block/');
	$blocks = array_values(array_diff($blocks, array('..', '.', '.DS_Store', '_base-block')) );
	return $blocks;
}


/* --- Load Blocks --- */
function cs__load_blocks(){
	$blocks = cs__get_blocks();

	foreach ( $blocks as $block ){
		if ( file_exists(get_stylesheet_directory() .'/parts/block/'. $block .'/block.json') ){
			register_block_type( get_stylesheet_directory() .'/parts/block/'. $block .'/block.json');

			if ( file_exists(get_stylesheet_directory() .'/parts/block/'. $block .'/style.min.css') ){
				wp_register_style('block-'. $block, get_stylesheet_directory_uri() .'/parts/block/'. $block .'/style.min.css', array(), filemtime(get_stylesheet_directory() .'/parts/block/'. $block .'/style.min.css'));
			}
			if ( file_exists(get_stylesheet_directory() .'/parts/block/'. $block .'/script.js') ){
				wp_enqueue_script('block-'. $block, get_stylesheet_directory_uri() .'/parts/block/'. $block .'/script.js', array(), false, filemtime(get_stylesheet_directory() .'/parts/block/'. $block .'/script.js'), true);
			}
		}
	}
}
add_action('init', 'cs__load_blocks', 5);


/* --- Load ACF field groups for blocks --- */
function cs__load_acf_field_group( $paths ){
	$blocks = cs__get_blocks();

	foreach ( $blocks as $block ){
		$paths[] = get_stylesheet_directory() .'/parts/block/'. $block;
	}
	return $paths;
}
add_filter('acf/settings/load_json', 'cs__load_acf_field_group');