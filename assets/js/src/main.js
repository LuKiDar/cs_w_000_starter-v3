/**
 * Main JS file for the project
 */

// import initBase from './modules/base.js';
// import initForms from './modules/forms.js';
import initAccordion from './modules/accordion.js';
import initModal from './modules/modal.js';
import initTabs from './modules/tabs.js';

document.addEventListener('DOMContentLoaded', () => {
	// initBase();
	initModal();
	initTabs();
	initAccordion();
	// initForms();
});