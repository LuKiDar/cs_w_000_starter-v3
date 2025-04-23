<?php
/**
 * 404 Template
 */

get_header(); ?>

<main class="container">
	<h1>Page Not Found</h1>
	<p>Sorry, the page you are looking for does not exist.</p>
	<a href="<?= home_url(); ?>">Go to Homepage</a>
</main>

<?php get_footer(); ?>