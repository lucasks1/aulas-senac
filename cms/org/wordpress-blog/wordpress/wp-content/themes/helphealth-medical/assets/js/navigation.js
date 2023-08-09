/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function ($) {
 "use strict";
 
	var wrapper    = $("#site-wrapper"),
		menu       = $(".side-nav"),
		menuLinks  = $(".side-nav ul li a"),
		toggle     = $(".nav-toggle"),
		toggleIcon = $(".nav-toggle span");

	function toggleThatNav() {
	  if (menu.hasClass("show-nav")) {
		if (!Modernizr.csstransforms) {
		  menu.removeClass("show-nav");
		  toggle.removeClass("show-nav");
		  menu.animate({
			right: "-=300"
		  }, 500);
		  toggle.animate({
			right: "-=300"
		  }, 500);
		} else {
		  menu.removeClass("show-nav");
		  toggle.removeClass("show-nav");
		}
		
	  } else {
		if (!Modernizr.csstransforms) {
		  menu.addClass("show-nav");
		  toggle.addClass("show-nav");
		  menu.css("right", "0px");
		  toggle.css("right", "330px");
		} else {
		  menu.addClass("show-nav");
		  toggle.addClass("show-nav");
		} 
	  }
	}

	function changeToggleClass() {
	  toggleIcon.toggleClass("fa-times");
	  toggleIcon.toggleClass("fa-bars");
	}

	$(function() {
	  toggle.on("click", function(e) {
		e.stopPropagation();
		e.preventDefault();
		toggleThatNav();
		changeToggleClass();
	  });
	  
		// Keyboard Esc event support
	  $(document).keyup(function(e) {
		if (e.keyCode == 27) {
		  if (menu.hasClass("show-nav")) {
			if (!Modernizr.csstransforms) {
			  menu.removeClass("show-nav");
			  toggle.removeClass("show-nav");
			  menu.css("right", "-300px");
			  toggle.css("right", "30px");
			  changeToggleClass();
			} else {
			  menu.removeClass("show-nav");
			  toggle.removeClass("show-nav");
			  changeToggleClass();
			}
		  }
		} 
	  });
	});
	
	$('.side-nav li.menu-item-has-children > a').on('click', function(e) {
		e.preventDefault();
		var element = $(this).parent('li');
		if (element.hasClass('open')) {
			element.removeClass('open');
			element.find('li').removeClass('open');
			element.find('ul').slideUp(200);
		} else {
			element.addClass('open');
			element.children('ul').slideDown(200);
			element.siblings('li').children('ul').slideUp(200);
			element.siblings('li').removeClass('open');
			element.siblings('li').find('li').removeClass('open');
			element.siblings('li').find('ul').slideUp(200);
		}
	});
	
	jQuery(".side-nav li.menu-item-has-children > a").attr('href', "javascript:void(0)");

	const siteNavigation = document.getElementById( 'site-navigation' );

	// Return early if the navigation don't exist.
	if ( ! siteNavigation ) {
		return;
	}

	const button = siteNavigation.getElementsByTagName( 'button' )[ 0 ];

	// Return early if the button don't exist.
	if ( 'undefined' === typeof button ) {
		return;
	}




})(jQuery); 