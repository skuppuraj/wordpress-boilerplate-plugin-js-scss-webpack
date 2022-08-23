import { Main }                             from "./core/Main";

function wp_boilerplate_dom_ready(fn) {
	// see if DOM is already available
	if (document.readyState === "complete" || document.readyState === "interactive") {
		// call on next available tick
		setTimeout(fn, 1);
	} else {
		document.addEventListener("DOMContentLoaded", fn);
	}
}

// Fired from compatibility-classes.ts
wp_boilerplate_dom_ready( function() {

	new Main(wp_boilerplate_object);

} );