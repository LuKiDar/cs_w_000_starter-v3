<?php
/**
 * Footer Template
 */

$footer = get_field('footer', 'options'); ?>


			</main><!-- .site-main -->

			<footer id="colophon" class="site-footer container">
				<div class="grid">
					<nav class="site-footer__navigation col" aria-label="<?= __('Footer Menu', CSWP); ?>">
						<?php if ( has_nav_menu('footer-menu') ){ ?>
							<?php wp_nav_menu(array(
								'menu' => 'footer-menu',
								'menu_class' => 'footer-menu',
								'container' => false
							)); ?>
						<?php } ?>
					</nav>

					<div class="site-footer__social-networks col">
						<?php get_template_part('parts/social-networks-menu'); ?>
					</div>

					<div class="site-footer__meta col">
						<?php if ( $footer['copyright']!='' ){ ?>
							<p class="site-footer__copyright"><?= $footer['copyright']; ?></p>
						<?php } ?>
					</div>
				</div>
			</footer>

		</div><!-- .site-container -->

		<?php wp_footer(); ?>
	</body>
</html>