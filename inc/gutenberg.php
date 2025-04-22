<?php
/**
 * Gutenberg
 */

/*** Register core block variations ***/
function cs__register_block_styles(){
	register_block_style('core/button', ['name' => 'custom',	'label' => __('Custom', CSWP)]);
}
// add_action('init', 'cs__register_block_styles');