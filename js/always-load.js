( function( $ ) {
	"use strict";

// var vasya = { 
//  name: "Вася", 
//  age: 23 
//  };
// var masha = { 
//  name: "Маша",
//  age: 18 
//  };
// var vovochka = { 
//  name: "Вовочка",
//  age: 6 
//  };

// var people = [ vasya , masha , vovochka ];

// // функция для сортировки по возрастанию
// function acsSort(a, b) {
//   return parseInt(a.age, 10) - parseInt(b.age, 10);
// }
// // функция для сортировки по убыванию
// function descSort(a, b) {
//   return parseInt(b.age, 10) - parseInt(a.age, 10);
// }

// // сортируем по убыванию
// people.sort(descSort);

// // просто выводим понятные сообщения
// console.log('Сортировка по убыванию');
// for (var i = 0; i < people.length; i++) {
// 	console.log(people[i].name + ' - ' + people[i].age);
// }

// // сортируем по возрастанию
// people.sort(acsSort);
// // просто выводим понятные сообщения
// console.log('Сортировка по возрастанию');
// for (var i = 0; i < people.length; i++) {
// 	console.log(people[i].name + ' - ' + people[i].age);
// }



// function compaireNum(a,b) {
//  return a - b;
// }

// var hum = [];
// var counter = [];


// function sortPeople (arr) {
//  for(var i = 0; i < people.length; i++) {
//   hum[i] = people[i].age;
//   counter = i;
//  }
//  hum.sort(compaireNum);
// }
// function newPeople(arr) {
//  while (counter == 3) {
//   people[i] = [counter];
//  }
//  console.log(people);
// }








// preloader
$('.cssload-wrap').fadeOut('slow');
$('.body-wrapper').delay(500).fadeIn('slow');
$('.footer-section').delay(500).fadeIn('slow');

// move navigation down when admin console is shown on front page
setTimeout(function() {
	if ( $('#wpadminbar').length > 0 ) {
		$('.nav').css('top', '32px');
	}
}, 1000);



// when page is reloaded define last url segment
var lastSegment = lastUrlSegment();
var section = '';
// last segment may be empty if this is first visit to webpage
isEmptyString(lastSegment) ? section = 'section1' : section = lastSegment;

// find current active menu item
var current_menu = $('#top_main_nav').find('a[title="' + section + '"]');
// highlight current menu item
current_menu.parent('li.menu-item').addClass('menu-item-active');




var cont_wrap = $('.content__wrapper');
var nav = $('.nav');
var nav_lbl = $('#nav__label');


if ($(window).width() <= 768) { //on mobile devices always show menu button
	
	nav_lbl.removeClass('hide'); //if set in admin->Theme Options->Navigation Settings->Always display top navigation (then in header.php will be set hide css class)
	nav.hide(); //hide main menu on mobile devices

	$('.section').css('margin-top', '0'); //always move up main sections when on mobile devices
}

if ( nav.hasClass('nav-hide') ) { // if hidden mode (see Dashboard -> Appearance -> Theme Options)
	nav.hide();
	$('.reveal .slides').addClass('full-height-slide');
}
else if ($(window).width() > 768) { // just move down content to free space for nav menu
	$('.reveal .slides').addClass('part-height-slide').removeClass('full-height-slide');
	
	// move FRONT page down if menu is displayed
	$('.content__wrapper').css({'top': '100px'});
}
else if ($(window).width() <= 768) {
	$('.reveal .slides').addClass('full-height-slide');	
}


// show and hide main navigation, apply styles
nav_lbl.on('click', function () {
	nav.dispatchNav(cont_wrap, nav_lbl);

	if ($(window).width() <= 768) {
		// move all navigation on mobile devices to free space for search form
		nav.css({top: '85px'});
	}
});


	// обработка нажатий пуктов главного меню
	// $('.menu-item').on('click', function () {
		// if (nav.hasClass('nav-hide') || $(window).width() <= 768) { // if navigation is in hidden mode (see Dashboard -> Appearance -> Theme Options)
		// nav.dispatchNav(cont_wrap, nav_lbl);
	// }

	// });

// make footer with contacts half transparent
if ($('.footer-section-bottom').length > 1) { //if element exists
	var footer_el = $('.footer-section-bottom');
	var footer_bg_color = footer_el.css('background-color');
	if( footer_bg_color.indexOf('a') == -1 ) { // проверяем не rgba ли уже цвет у элемента?
	    var new_bg_color = footer_bg_color.replace(')', ', 0.8)').replace('rgb', 'rgba');
	}
	footer_el.css({backgroundColor: new_bg_color});
}


if ( $('.slides-video').length > 0 ) {
	if (display_menu == 1) {
		$('.slides-video').css({height: 'calc(100vh - 100px)'});
	} else {
		$('.slides-video').css({height: '100vh'});		
	}
}


$.fn.dispatchNav = function (wrapper, nav_lbl) {

	$("#sandwich").toggleClass("active");

	var w = wrapper;
	var speed = 700;
		if (w.attr('data-down') == 'false') {
			
			if ($(window).width() > 768) {
				w.css("margin", "0 auto")
				.transition({rotateX: '0.2deg', "width": "95%", "height": "90%", "top": "2%", "box-shadow": "0 -5px 100px 5px rgba(0, 0, 0, .5)"}, speed);
			}

			w.attr('data-down', 'true');
			$('.toggle_mnu').transition({'background-color': 'rgba(179, 32, 32, 1)'}, speed);

			$(this).delay(500).slideDown(800);

			// // search form
			// var search = $('#search-form-container');
			// search.css({right: '90px'});

			return false;
		} 
		else {

			$(this).delay(500).slideUp(800);

			if ($(window).width() > 768) {
				w.transition({rotateX: '0deg'})
				.animate({"width": "100%", "height": "100%", "top": "0"}, speed);
			}

			w.attr('data-down', 'false');
			$('.toggle_mnu').transition({'background-color': 'rgba(0, 0, 0, .5)'}, speed);
		}
}

$.fn.isInViewport = function() {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();

    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    return elementBottom > viewportTop && elementTop < viewportBottom;
};

function isEmptyString (value) {
  return typeof value == 'string' && !value.trim() || typeof value == 'undefined' || value === null;
}

function lastUrlSegment() {
	var url = window.location.href;
	var lastSegment = url.split('/').pop();
	return lastSegment;
}

//check if exist and is visible
function isVisible(id) {
    var element = $('#' + id);
    if (element.length > 0 && element.css('visibility') !== 'hidden' && element.css('display') !== 'none') {
        return true;
    } else {
        return false;
    }
}

function hexToRGB(hex, alphaYes, alpha) {
	// console.log(hex);
	hex = hex.toUpperCase();
	var h = "0123456789ABCDEF";
	var r = h.indexOf(hex[1])*16+h.indexOf(hex[2]);
	var g = h.indexOf(hex[3])*16+h.indexOf(hex[4]);
	var b = h.indexOf(hex[5])*16+h.indexOf(hex[6]);
	if(alphaYes) return "rgba("+r+", "+g+", "+b+", "+alpha+")";
	else return "rgb("+r+", "+g+", "+b+")";
}


var nav_color = $('.menu-main-navigation-container').css('background-color');

$(window).on('resize scroll', function() {

	if ($(window).width() > 768) {
		if ( $(window).scrollTop() < 100 ) {
			nav.animate({height: '100px'}, 500);
			$('#top_main_nav li').animate({height: '100px'});

			$('.menu-main-navigation-container').animate({backgroundColor: nav_color}, 500);

			$('.nav__logo-image').animate({width: '40%'}, 500);
		}
		if ( $(window).scrollTop() > 100 && $(window).scrollTop() < 300 ) {
			nav.animate({height: '70px'}, 500);
			$('#top_main_nav li').animate({height: '70px'});
// console.log('hei');
			$('.menu-main-navigation-container').animate({backgroundColor: 'rgba(255, 255, 255, 0.8)'});

			$('.nav__logo-image').animate({width: '25%'}, 500);
		}
	}
	// var count = $('div.slides').find('section.section');
    // if ($('section').isInViewport()) {
	// console.log(count.length);
        // do something
    // } else {
        // do something else
    // }
});



} )( jQuery );