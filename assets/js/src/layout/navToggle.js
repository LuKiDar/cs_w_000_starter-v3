/**
 * Navbar toggle
 */

export default function initNavToggle(){
	const toggle = document.querySelector('.nav-toggle');
	const mobileMenu = document.getElementById('mobile-menu');

	if ( !toggle || !mobileMenu ) return;

	toggle.addEventListener('click', () => {
		const expanded = toggle.getAttribute('aria-expanded') === 'true';

		toggle.setAttribute('aria-expanded', !expanded);
		mobileMenu.hidden = expanded;

		if ( !expanded ){
			document.body.classList.add('is-menu-active');
		} else {
			document.body.classList.remove('is-menu-active');
		}
	});
}