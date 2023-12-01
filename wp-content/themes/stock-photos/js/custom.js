jQuery(function($){
	"use strict";
	jQuery('.main-menu-navigation > ul').superfish({
		delay: 500,
		animation: {opacity:'show',height:'show'},
		speed:'fast'
	});
});

function stock_photos_menu_open() {
	jQuery(".side-menu").addClass('open');
}
function stock_photos_menu_close() {
	jQuery(".side-menu").removeClass('open');
}

function stock_photos_search_show() {
	jQuery(".search-outer").addClass('show');
	jQuery(".search-outer").fadeIn();
}
function stock_photos_search_hide() {
	jQuery(".search-outer").removeClass('show');
	jQuery(".search-outer").fadeOut();
}

(function( $ ) {

	$(window).scroll(function(){
		var sticky = $('.sticky-header'),
		scroll = $(window).scrollTop();

		if (scroll >= 100) sticky.addClass('fixed-header px-lg-3 px-2');
		else sticky.removeClass('fixed-header px-lg-3 px-2');
	});

	// Back to top
	jQuery(document).ready(function () {
	    jQuery(window).scroll(function () {
	        if (jQuery(this).scrollTop() > 0) {
	        	jQuery('.scrollup').fadeIn();
	        } else {
	            jQuery('.scrollup').fadeOut();
	        }
	    });
	    jQuery('.scrollup').click(function () {
	        jQuery("html, body").animate({
	            scrollTop: 0
	        }, 600);
	        return false;
	    });
	});

	// Window load function
	window.addEventListener('load', (event) => {
		jQuery(".preloader").delay(2000).fadeOut("slow");
	});

	jQuery(document).ready(function(){
		jQuery(".product-cat").hide();
    jQuery("button.product-btn").click(function(){
      jQuery(".product-cat").toggle();
    });
	});	

})( jQuery );

( function( window, document ) {
	function stock_photos_keepFocusInMenu() {
		document.addEventListener( 'keydown', function( e ) {
			const stock_photos_nav = document.querySelector( '.side-menu' );

			if ( ! stock_photos_nav || ! stock_photos_nav.classList.contains( 'open' ) ) {
				return;
			}

			const elements = [...stock_photos_nav.querySelectorAll( 'input, a, button' )],
				stock_photos_lastEl = elements[ elements.length - 1 ],
				stock_photos_firstEl = elements[0],
				stock_photos_activeEl = document.activeElement,
				tabKey = e.keyCode === 9,
				shiftKey = e.shiftKey;

			if ( ! shiftKey && tabKey && stock_photos_lastEl === stock_photos_activeEl ) {
				e.preventDefault();
				stock_photos_firstEl.focus();
			}

			if ( shiftKey && tabKey && stock_photos_firstEl === stock_photos_activeEl ) {
				e.preventDefault();
				stock_photos_lastEl.focus();
			}
		} );
	}
	
	function stock_photos_keepfocus_search() {
		document.addEventListener( 'keydown', function( e ) {
			const stock_photos_search = document.querySelector( '.search-outer' );

			if ( ! stock_photos_search || ! stock_photos_search.classList.contains( 'show' ) ) {
				return;
			}

			const elements = [...stock_photos_search.querySelectorAll( 'input, a, button' )],
				stock_photos_lastEl = elements[ elements.length - 1 ],
				stock_photos_firstEl = elements[0],
				stock_photos_activeEl = document.activeElement,
				tabKey = e.keyCode === 9,
				shiftKey = e.shiftKey;

			if ( ! shiftKey && tabKey && stock_photos_lastEl === stock_photos_activeEl ) {
				e.preventDefault();
				stock_photos_firstEl.focus();
			}

			if ( shiftKey && tabKey && stock_photos_firstEl === stock_photos_activeEl ) {
				e.preventDefault();
				stock_photos_lastEl.focus();
			}
		} );
	}

	stock_photos_keepFocusInMenu();

	stock_photos_keepfocus_search();
} )( window, document );

jQuery(document).ready(function () {
	jQuery( ".tablinks" ).first().addClass( "active" );
});

function stock_photos_project_tab(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  jQuery('#'+ cityName).show()
  evt.currentTarget.className += " active";
}

jQuery(document).ready(function () {
	jQuery('.tabcontent').hide();
	jQuery('.tabcontent:first').show();
});