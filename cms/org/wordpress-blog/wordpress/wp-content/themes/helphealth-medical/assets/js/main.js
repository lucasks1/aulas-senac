/*
    Template  Name: Helphealth Medical;
	Description: Helphealth Medical is a clean, modern and fully responsive health and medical WordPress theme.
	Version:  1.0.8
    Authot:   Bootitems

	[Note: This file contains all jquery plugins activation codes.]
*/
/*================================================
[  Table of contents  ]
================================================
	01. STICKY HEADER ACTIVE
	02. KEYBOARD NAVIGATION ACTIVE
	03. FADEUP ANIMATION
	04. MASONARY ACTIVE
	05. WELCOME CAROUSEL
	06. DEPARTMENT CAROUSEL
	07. TESTIMONIALS CAROUSEL
	08. PARALLAX EFFECT
	09. SEARCH BOX TOGGLE
	10. BACK TO TOP
	11. SMOOTH SCROLLING
	12. PRELOADER
======================================
[ End table content ]
======================================*/
(function ($) {
 "use strict";

	/*==== 01. STICKY HEADER ACTIVE ====*/		  
	var bottom = $('.site-navigation').offset().top;
	$(window).scroll(function(){    
		if ($(this).scrollTop() > bottom){ 
			$('.sticky-header').addClass('header-sticky'); 
		}
		else{
			$('.sticky-header').removeClass('header-sticky');
		}
	});
	
	/*==== 02. KEYBOARD NAVIGATION ACTIVE ====*/	
	$('.main-nav').tabNav();
	
	/*==== 03. FADEUP ANIMATION ====*/
	var contentWayPoint = function() {
		var i = 0;
		$('.animate-box').waypoint( function( direction ) {
			if( direction === 'down' && !$(this.element).hasClass('animated-fast') ) {
				i++;
				$(this.element).addClass('item-animate');
				setTimeout(function(){
					$('body .animate-box.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn animated-fast');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft animated-fast');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight animated-fast');
							} else {
								el.addClass('fadeInUp animated-fast');
							}
							el.removeClass('item-animate');
						},  k * 200, 'easeInOutExpo' );
					});
				}, 100);
			}
		} , { offset: '85%' } );
	};
	$(function(){
	contentWayPoint();
	});

	/* ==== 04. MASONARY ACTIVE ====  */				
	$('.grip-wrap').imagesLoaded( function() {	   
		$('.grip-wrap').masonry({ singleMode: true });	
	});	

	$(document).ready(function() {
		
		/* ==== 05. WELCOME CAROUSEL ==== */
		$('#helphealth-slider').addClass("owl-carousel").owlCarousel({
			autoplay:false,
			autoplayTimeout:5000,
			loop:true,
			nav:true,
			dots:true,
			autoplayHoverPause: false,
			items:1,
			smartSpeed: 500,
			margin:0,
			navText:['<span class="slidenav left"><i></i><i></i></span>','<span class="slidenav right"><i></i><i></i></span>'],

		}) 

		/* ==== 06. DEPARTMENT CAROUSEL ==== */
		$(".department-carousel").addClass("owl-carousel").owlCarousel({
			autoplay:false,
			autoplayTimeout:5000,
			nav:true,
			dots:true,
			loop:true,
			pagination: true,
			margin:30,
			navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
			autoHeight : true,
			responsive:{
				0:{
					items:1
				},
				479:{
					items:1
				},
				768:{
					items:2
				},
				980:{
					items:2
				},
				1170:{
					items:3
				}
			}
		});
		
		/* ==== 07. TESTIMONIALS CAROUSEL ==== */
		jQuery(".testimonial-carousel").addClass("owl-carousel").owlCarousel({
			autoplay:false,
			autoplayTimeout:5000,
			nav:true,
			dots:false,
			loop:true,
			pagination: true,
			margin:30,
			navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
			autoHeight : true,
			responsive:{
				0:{
					items:1
				},
				479:{
					items:1
				},
				768:{
					items:2
				},
				980:{
					items:2
				},
				1170:{
					items:3
				}
			}
		});
	});
	
	/* ==== 08. PARALLAX EFFECT ==== */	  
	$.stellar({
		horizontalScrolling:false,
		hideDistantElements: false,
		verticalOffset: 0,
		horizontalOffset: 0		
	});		

	
   /* ==== 09. SEARCH BOX TOGGLE ==== */
   jQuery('.search-toggle').addClass('close');
	//Toggle close/open on click of toggle
	jQuery('.search-toggle').click(function(e) {
		if (jQuery(this).hasClass('close')) {
			jQuery(this).removeClass('close').addClass('open');
			jQuery('.search-toggle, .search-container').addClass('open');
		}
		else {
			jQuery(this).removeClass('open').addClass('close');
			jQuery('.search-toggle, .search-container').removeClass('open');
		}
	});
	// Close when click off of container
	jQuery(document).on('click touchstart', function (e){
		if (!jQuery(e.target).is('.search-toggle, .search-toggle *, .search-container, .search-container *')) {
			jQuery('.search-toggle, .search-container').removeClass('open');
			jQuery('.search-toggle').addClass('close');
		}
	});
	
	
	
	
	/* ==== 10. KEYBOARD NAVIGATION ==== */
    $(window).on('load resize', function() {
        if ($(window).width() < 768) {
            $('.site-navigation').find("li").last().bind('keydown', function(e) {
                if (e.which === 9) {
                    e.preventDefault();
                    $('#masthead').find('.menu-toggle').focus();
                }
            });
        } else {
            $('.main-navigation').find("li").unbind('keydown');
        }
    });

    var primary_menu_toggle = $('#masthead .menu-toggle');
    primary_menu_toggle.on('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        var shiftKey = e.shiftKey;

        if (primary_menu_toggle.hasClass('open')) {
            if (shiftKey && tabKey) {
                e.preventDefault();
                $('.main-navigation').toggleClass('toggled');
                primary_menu_toggle.removeClass('open');
            };
        }
    });

	/* ==== 11. BACK TO TOP ==== */
	var $scroll_obj = $( '#back-to-top' );
	$( window ).scroll(function(){
		if ( $( this ).scrollTop() > 350 ) {
		  $scroll_obj.fadeIn();
		} else {
		  $scroll_obj.fadeOut();
		}
	});
	$scroll_obj.click(function(){
		$( 'html, body' ).animate( { scrollTop: 0 }, 800 );
		return false;
	});

   /* ==== 12. SMOOTH SCROLLING	 ==== */
	$(function() {
	  $('a[href*="#"]:not([href="#"])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		  var target = $(this.hash);
		  var headerH = '150';
		  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		  if (target.length) {
			$('html, body').animate({
			  scrollTop: target.offset().top - headerH + "px"
			}, 1000);
			return false;
		  }
		}
	  });
	});	
	
	/* ==== 13. PRELOADER ==== */
	$(window).load(function(){
		$('.hwh-circle').fadeOut(500);
		$('.preloader-bg').delay('500').fadeOut(700);

	});
	
})(jQuery); 