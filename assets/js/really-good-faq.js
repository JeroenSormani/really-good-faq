jQuery(function($) {

	/** Style 1 */
	$( '.faq-list.style-1 .faq-head, .faq-list.style-2 .faq-head, .faq-list.style-4 .faq-head' ).on('click', function(e) {
		var faq = $(this).parents('.faq');
		faq.toggleClass('open');
		faq.find('.answer').slideToggle();
	});


});