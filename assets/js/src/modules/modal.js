/**
 * Module: Modal
 */

export default function initModal(){
	const triggers = document.querySelectorAll('[data-modal]');

	if ( !triggers.length ) return;

	triggers.forEach(trigger => {
		trigger.addEventListener('click', () => {
			// open modal
		});
	});
}