( function( $ ) {
	"use strict";

var acrd = $('#overview_accordion ul');
var inner = $('#accordion-inner');

$(window).on("scroll resize", function() {

	var win_scroll = $(this).scrollTop();
	var acrd_top = acrd.offset().top;

	if ( win_scroll > acrd_top - $(window).height() ) {
		inner.animate({opacity: '1'}, 500);

		var acco = acrd.zAccordion({
			// slideWidth: 600,
			// easing: "easeOutBounce",
			tabWidth: "10%",
			width: "95%",
			height: "100%",
			timeout: 3000,
			speed: 500,
			slideClass: "frame",
			// auto: false,
			// trigger: "mouseover"
		});

		acrd.zAccordion("start");

		var acord_height = $(window).height() - 200;// / 1.5;
		acrd.height(acord_height);
		acrd.find("li").height(acord_height);
		// console.log(win_scroll + ' < ' + (acrd_top + $(window).height() ) );
	}
	if (win_scroll > parseInt(acrd_top + $(window).height()) ) {
		acrd.zAccordion("stop");
		// console.log('accordion stopped ' + win_scroll + ' > ' + parseInt(acrd_top + $(window).height() ) );
	}
});

} )( jQuery );