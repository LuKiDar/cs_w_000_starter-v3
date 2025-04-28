<?php
/**
 * Header Template
 */

$button_text = get_option('cs_header_button_text');
$button_url = get_option('cs_header_button_url');
$button_new_tab = get_option('cs_header_button_new_tab'); ?>


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
		<a class="screen-reader-shortcut" href="#main" aria-label="Skip to main content">Skip to main content</a>
		<a class="screen-reader-shortcut" href="#footer" aria-label="Skip to footer content">Skip to footer content</a>

		<header id="masthead" class="site-header container" role="banner">
			<div class="site-header__inner alignwide">
				<div class="site-logo">
					<?php if ( has_custom_logo() ){ ?>
						<?php the_custom_logo(); ?>
					<?php } else { ?>
						<a href="<?= esc_url(home_url('/')); ?>" class="site-title"><?php bloginfo('name'); ?></a>
					<?php } ?>
				</div>

				<?php if ( has_nav_menu('primary') ){ ?>
					<nav class="site-header__navigation" role="navigation" aria-label="<?= __('Main Menu', CSWP); ?>">
						<?php wp_nav_menu(array(
							'theme_location'	=> 'primary',
							'menu_class'		=> 'primary-menu',
							'container'			=> false,
							'walker'			=> new cs__primary_menu_walker()
						)); ?>

						<?php if ( $button_text!='' && $button_url!='' ){ ?>
							<div class="site-header__button-wrapper">
								<a class="site-header__button button is-outlined" href="<?= $button_url; ?>" <?= ( $button_new_tab ) ? 'target="_blank"' : ''; ?>><?= $button_text; ?></a>
							</div>	
						<?php } ?>
					</nav>
				<?php } ?>

				<button class="nav-toggle" aria-controls="mobile-menu" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle Navigation', CSWP); ?>">
					<span class="nav-toggle__bar" aria-hidden="true"></span>
					<span class="screen-reader-text"><?php esc_html_e('Menu', CSWP); ?></span>
				</button>
			</div>

			<nav id="mobile-menu" class="mobile-navigation" role="navigation" aria-label="<?php esc_attr_e('Mobile Menu', CSWP); ?>" hidden>
				<?php wp_nav_menu(array(
					'theme_location'	=> 'primary',
					'menu_class'		=> 'primary-menu',
					'container'			=> false,
					'walker'			=> new cs__primary_menu_walker()
				)); ?>
			</nav>
		</header>

		<main id="main" class="site-main">