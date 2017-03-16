( function( $ ) {
	"use strict";



	setTimeout( function() {
		
		// display or hide categories if front page slides enabled
		$("#reveal_enable_slides_on_front_page").on('click', function() {
			$(this).is(':checked') ? $('#section-reveal_category_slides_on_front_page').css('display', 'block') :  $('#section-reveal_category_slides_on_front_page').css('display', 'none');
		});

		$(window).on('resize scroll', function() {
			if ($('#publish').length > 0) {
				var pub_btn = $('#publish');
				var but_pos = pub_btn.offset().top;
				var win_pos = $(window).scrollTop();
				if ( win_pos > but_pos && win_pos < 400 ) {
					// console.log('#publish button move down');
					pub_btn.css( { top: '329px', right: '45px', position: 'fixed', 'z-index': 9999, width: '100px', height: '50px', 'font-size': '20px' } );
				}
			}

			if ( $('#optionsframework-submit input[name="update"]').length > 0 ) {
				var opt_sbt_btn = $('#optionsframework-submit input[name="update"]');

				opt_sbt_btn.css( { top: '50%', right: '45px', position: 'fixed', 'z-index': 9999, width: '200px', height: '50px', 'font-size': '20px' } );
			}
		});

	}, 1000);



} )( jQuery );