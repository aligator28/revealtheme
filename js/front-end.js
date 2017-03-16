(function($) {
	"use strict";

if ($(window).width() > 768) {

	// parallax background
	var header = $('.front-header-bg');

	if (header.length == 0) return; // if no image in header, but video background

	var faq_sect = $('.questions');


	$(window).on('resize scroll', function() {
		var win_pos = $(window).scrollTop();
		var h_offset = header.offset().top;

		if ( win_pos < (h_offset + header.height()) ) {
			// console.log( '-' + win_pos + 'px' );
			// header.css({'background-position-y': '-' + win_pos + 'px'});
			
			win_pos =  (win_pos + 100) + '%';
			header.css({'background-size': win_pos});
		}

		
		var fs_offset = faq_sect.offset().top;

		if (win_pos > fs_offset - $(window).height() && win_pos < fs_offset + faq_sect.height() ) {

			faq_sect.css({'background-position-y': win_pos/57 + 'px', 'background-size': win_pos/35 + '%'})
			// console.log(win_pos + " < " + fs_offset + " = " + faq_sect.height());
		}


	});
// parallax end
}

})(jQuery);