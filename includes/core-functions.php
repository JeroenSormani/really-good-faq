<?php
namespace Really_Good_FAQ;

/**
 * Enqueue scripts.
 *
 * Enqueue script as javascript and style sheets.
 *
 * @since  1.0.0
 */
function enqueue_scripts() {

	wp_register_style( 'really-good-faq-style-1' , plugins_url( 'assets/css/style-1.css', \Really_Good_FAQ\Really_Good_FAQ()->file ), array(), \Really_Good_FAQ\Really_Good_FAQ()->version );
	wp_register_style( 'really-good-faq-style-2' , plugins_url( 'assets/css/style-2.css', \Really_Good_FAQ\Really_Good_FAQ()->file ), array(), \Really_Good_FAQ\Really_Good_FAQ()->version );
	wp_register_style( 'really-good-faq-style-3' , plugins_url( 'assets/css/style-3.css', \Really_Good_FAQ\Really_Good_FAQ()->file ), array(), \Really_Good_FAQ\Really_Good_FAQ()->version );
	wp_register_style( 'really-good-faq-style-4' , plugins_url( 'assets/css/style-4.css', \Really_Good_FAQ\Really_Good_FAQ()->file ), array(), \Really_Good_FAQ\Really_Good_FAQ()->version );
}
add_action( 'wp_enqueue_scripts', 'Really_Good_FAQ\enqueue_scripts' );

/**
 * Include JS directly in footer.
 */
function print_scripts() {
    ?><script type="text/javascript">
		var selector = ".faq-list.style-1 .faq-head, .faq-list.style-2 .faq-head, .faq-list.style-4 .faq-head";
		[].forEach.call(document.querySelectorAll(selector), function(el) {
			el.addEventListener("click", function() {
				var faq = el.parentNode,
					answer = faq.querySelector('.answer');

				// The following 2 lines are ONLY needed if you ever want to start in a 'open' state. Due to the way browsers
				// work it needs a double of this (or something like console.log(el.scrollHeight);) to prevent the render skipping
				answer.style.height = answer.scrollHeight + 'px';
				answer.scrollHeight = answer.scrollHeight + 'px'; // Something like console.log(answer.scrollHeight); also works, just something to prevent render skipping

				faq.classList.toggle('open');
				answer.style.height = faq.classList.contains('open') ? answer.scrollHeight + 'px' : 0;
			});
		});
	</script><?php
}
add_action( 'wp_footer', '\Really_Good_FAQ\print_scripts' );