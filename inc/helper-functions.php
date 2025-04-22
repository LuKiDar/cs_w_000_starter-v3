<?php
/**
 * Helper functions
 */

/*** Get template page ID ***/
function cs__get_template_page_ID( $template, $index=0 ){
	$pages = get_posts(array(
		'post_type' =>'page',
		'meta_key'  =>'_wp_page_template',
		'meta_value'=> 'templates/'. $template .'.php',
		'orderby' => 'ID',
		'order' => 'ASC'
	));

	return $pages[$index]->ID;
}


/*** Set block styles from ACF ***/
function cs__set_block_styles( $block_id, $margin_desktop, $margin_mobile ){ ?>
	<style scoped>
		#<?= $block_id; ?> {
			@media screen and (min-width: 1025px) {
				<?php if ( isset($margin_desktop['bottom']) && $margin_desktop['bottom']!='' ){?>
					margin-bottom: <?= $margin_desktop['bottom']/16 .'rem'; ?>;
				<?php } ?>

				<?php if ( isset($margin_desktop['top']) && $margin_desktop['top']!='' ){?>
					margin-top: <?= $margin_desktop['top']/16 .'rem'; ?>;
				<?php } ?>
			}

			@media screen and (max-width: 1024px) {
				<?php if ( isset($margin_mobile['bottom']) && $margin_mobile['bottom']!='' ){?>
					margin-bottom: <?= $margin_mobile['bottom']/16 .'rem'; ?>;
				<?php } ?>

				<?php if ( isset($margin_mobile['top']) && $margin_mobile['top']!='' ){?>
					margin-top: <?= $margin_mobile['top']/16 .'rem'; ?>;
				<?php } ?>
			}
		}
	</style>
<?php }


/*** Parse content in search of a block ***/
function cs__has_block( $post_content, $block_name='' ){
	$blocks = parse_blocks($post_content);

	foreach ( $blocks as $block ){
		if ( $block['blockName']===$block_name ){
			return true;
		}

		if ( !empty($block['innerBlocks']) ){
			foreach ( $block['innerBlocks'] as $innerBlock ){
				if ( $innerBlock['blockName']===$block_name ){
					return true;
				}
			}
		}
	}

	return false;
}


/*** Generate URL handle from text line ***/
function cs__generate_url_handle( $text ){
	$handle = strtolower($text);
	$handle = preg_replace('/[^\w\s]/u', '', $handle);
	$handle = preg_replace('/\s+/', '-', $handle);
	$handle = trim($handle, '-');

	return $handle;
}