<?php
/**
 * Footer Template
 */

$logo = get_option('cs_footer_logo');
$button_text = get_option('cs_footer_button_text');
$button_url = get_option('cs_footer_button_url');
$button_new_tab = get_option('cs_footer_button_new_tab');
$contact_info = get_option('cs_footer_contact_info');
$copyright = get_option('cs_footer_copyright'); ?>


			</main><!-- .site-main -->

			<footer id="colophon" class="site-footer">
				<div class="site-footer__top-container container">
					<div class="site-footer__top-inner">
						<?php if ( $contact_info!='' ){ ?>
							<div class="site-footer__contact-info">
								<h5 class="site-footer__heading"><?= __('Contact', CSWP); ?></h5>

								<address class="site-footer__address"><?= $contact_info; ?></address>
							</div>
						<?php } ?>

						<?php if ( has_nav_menu('footer') ){ ?>
							<nav class="site-footer__navigation" aria-label="<?= __('Footer Menu', CSWP); ?>">
								<h5 class="site-footer__heading"><?= __('Navigate', CSWP); ?></h5>

								<?php wp_nav_menu(array(
									'theme_location'	=> 'footer',
									'menu_class'		=> 'footer-menu',
									'container'			=> false,
									'depth'				=> 1
								)); ?>
							</nav>
						<?php } ?>

						<?php if ( $logo || ( $button_text!='' && $button_url!='' ) ){ ?>
							<div class="site-footer__branding">
								<?php if ( $logo!='' ){ ?>
									<a href="<?= esc_url(home_url('/')); ?>" class="site-footer__logo">
										<?= wp_get_attachment_image($logo, 'full', false, array('class' => 'footer-logo')); ?>
									</a>
								<?php } ?>

								<?php if ( $button_text!='' && $button_url!='' ){ ?>
									<div class="site-footer__button-wrapper">
										<a class="site-footer__button button" href="<?= $button_url; ?>" <?= ( $button_new_tab ) ? 'target="_blank"' : ''; ?>><?= $button_text; ?></a>
									</div>	
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</div>

				<div class="site-footer__bottom-container container">
					<div class="site-footer__bottom-inner">
						<?php if ( $copyright!='' ){ ?>
							<p class="site-footer__copyright"><?= $copyright; ?></p>
						<?php } ?>

						<?php if ( has_nav_menu('footer-legal') ){ ?>
							<nav class="site-footer__legal" aria-label="<?= __('Footer Legal Menu', CSWP); ?>">
								<?php wp_nav_menu(array(
									'theme_location'	=> 'footer-legal',
									'menu_class'		=> 'footer-legal-menu',
									'container'			=> false,
									'depth'				=> 1
								)); ?>
							</nav>
						<?php } ?>
					</div>
				</div>
			</footer>
		</div><!-- .site-container -->

		<div id="site-overlay" class="site-overlay"></div>

		<?php wp_footer(); ?>
	</body>
</html>