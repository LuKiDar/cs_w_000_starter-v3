<?php
/**
 * Search Template
 * Displays search results
 */

get_header(); ?>

<div class="container">
	<h1>Search Results for "<?= get_search_query(); ?>"</h1>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article>
			<h1><?php the_title(); ?></h1>
			
			<div><?php the_content(); ?></div>
		</article>

	<?php endwhile; else: ?>
		<p>No results found.</p>

	<?php endif; ?>
</div>

<?php get_footer(); ?>