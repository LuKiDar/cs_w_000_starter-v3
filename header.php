<?php
/**
 * Header Template
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class('is-header-fixed'); ?>>
	<!-- Page -->
	<div id="page" class="site-container">
		<a class="screen-reader-shortcut" href="#menu-primary-menu" aria-label="Skip to primary menu">Skip to primary menu</a>
		<a class="screen-reader-shortcut" href="#main-content" aria-label="Skip to main content">Skip to main content</a>
		<a class="screen-reader-shortcut" href="#colophon" aria-label="Skip to footer content">Skip to footer content</a>

		<header id="masthead" class="site-header container" role="banner">
			<div class="site-header__inner">
				<div class="site-logo">
					<?php if ( has_custom_logo() ){ ?>
						<?php the_custom_logo(); ?>
					<?php } else { ?>
						<a href="<?= esc_url(home_url('/')); ?>" class="site-title"><?php bloginfo('name'); ?></a>
					<?php } ?>
				</div>

				<?php if ( has_nav_menu('primary') ){ ?>
					<nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Main Menu', CSWP); ?>">
						<?php wp_nav_menu(array(
							'theme_location'	=> 'primary',
							'menu_class'		=> 'primary-menu menu--desktop',
							'container'			=> false
						)); ?>
					</nav>
				<?php } ?>

				<button class="nav-toggle" aria-controls="mobile-menu" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle Navigation', CSWP); ?>">
					<span class="nav-toggle__icon" aria-hidden="true"></span>
					<span class="screen-reader-text"><?php esc_html_e('Menu', CSWP); ?></span>
				</button>

			</div>

			<nav id="mobile-menu" class="mobile-navigation" role="navigation" aria-label="<?php esc_attr_e('Mobile Menu', CSWP); ?>" hidden>
				<?php wp_nav_menu(array(
					'theme_location' => 'primary',
					'menu_class'     => 'menu menu--mobile',
					'container'      => false
				)); ?>
			</nav>
		</header>

		<main id="main-content" class="site-main">