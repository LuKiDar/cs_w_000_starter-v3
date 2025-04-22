<?php
/**
 * Block / Example
 */

$content = get_field('content');

$modifier = ( isset($block['className']) ) ? $block['className'] : '';


if ( $content!='' ): ?>
	<section id="<?= isset($block['anchor']) ? $block['anchor'] : $block['id']; ?>" class="block-example <?= $modifier; ?>">
		<?= $content; ?>
	</section>
<?php endif; ?>