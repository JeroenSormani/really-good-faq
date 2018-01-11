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
	wp_register_script( 'really-good-faq', plugins_url( 'assets/js/really-good-faq.js', \Really_Good_FAQ\Really_Good_FAQ()->file ), array(), \Really_Good_FAQ\Really_Good_FAQ()->version, true );

	wp_enqueue_script( 'really-good-faq' );

}
add_action( 'wp_enqueue_scripts', 'Really_Good_FAQ\enqueue_scripts' );