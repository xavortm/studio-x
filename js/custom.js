jQuery(document).ready(function($) {
	
	// Make the icon (search) to show the search bar in the header
	$('#primary-navigation .search-icon').click(function() {
		$('#primary-navigation .searchform').toggle();
		$('#primary-navigation .searchform').focus();
	});

	// Initialize the readin time plugin.
	$('article').each(function() {
		$(this).readingTime({
			readingTimeTarget: $(this).find('.reading-time')
		});
	});

});