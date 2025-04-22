<?php
/**
 * Page Template
 */

get_header(); ?>

<main>
	<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
		<article>
			<h1><?php the_title(); ?></h1>
			
			<a class="icon-test" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

			<div><?php the_content(); ?></div>
		</article>
	<?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>