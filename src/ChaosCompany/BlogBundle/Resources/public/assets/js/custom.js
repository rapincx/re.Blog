jQuery(document).ready(function() {
	
"use strict";

/*-----------------------------------------------------------
		 navigation
--------------------------------------------------------------*/
	var windowWidht = $(window).width();
	 //Sub Menu 
    if (windowWidht>991) {
      $( '.has-sub-menu' ).each(function() { 
        $(this).removeClass('mobile');  
        $(this).hover( 
          function(){ $(this).children("ul.sub-menu").slideDown(); },
          function(){ $(this).children("ul.sub-menu").slideUp(); }
          );
      });
    } 
    else {
      $( '.has-sub-menu' ).each(function() { 
        $(this).addClass('mobile'); 
        $(this).on( 'click', '>.sub-trigger', function() {
          $(this).parent().toggleClass('sub-open');
          $(this).parent().children("ul.sub-menu").slideToggle();
        }); 
      }); 
    }
	
	if ( matchMedia( 'only screen and (min-width: 768px)' ).matches ) {
		$(window).on('scroll', function (){
			if ($(this).scrollTop() > 10){ 
				$('.navbar-fixed-top').addClass('fixed-menu'); 
			} 
			else { 
				$('.navbar-fixed-top').removeClass('fixed-menu'); 
			}
		});
	}
/*-----------------------------------------------------------
		blog-slide
--------------------------------------------------------------*/
	$('.post-thumb-slider').owlCarousel({
		
		stopOnHover : true,
		navigation : true, // Show next and prev buttons
		slideSpeed : 500,
		nav : false,
		paginationSpeed : 1000,
		autoPlay: true,
		loop: true,
		pagination: false,
		singleItem: true,
		addClassActive: true,
		navigationText: [
		'<i class="fa fa-angle-left" aria-hidden="true"></i>',
		'<i class="fa fa-angle-right" aria-hidden="true"></i>'
		],
		
	});
	
/*-----------------------------------------------------------
		magnificPopup initilize
--------------------------------------------------------------*/
	$.extend(true, $.magnificPopup.defaults, {  
    iframe: {
        patterns: {
           youtube: {
              index: 'youtube.com/', 
              id: 'v=', 
              src: 'http://www.youtube.com/embed/%id%?autoplay=1' 
          }
        }
    }
	});
	
	$('.play-video').magnificPopup({
		type: 'iframe'
	});
/*-----------------------------------------------------------
		 masonary initilize
--------------------------------------------------------------*/
	var $container = $('.masonary-two-column-container');
		$container.imagesLoaded(function(){
		$container.masonry({
			columnWidth: 0,
			itemSelector : '.masonary-item-two-column'
		});
	});
	var $container2 = $('.masonary-three-column-container');
		$container2.imagesLoaded(function(){
		$container2.masonry({
			itemSelector : '.masonary-item-three-column'
		});
	});
/*-----------------------------------------------------------
		 goto-top initilize
--------------------------------------------------------------*/
	$('.goto-btn').on( "click",function(){
	  $("html,body").animate({ scrollTop: 0 }, 750);
	  return false;
	});

});