/*! jQuery Ticker Plugin v1.2.1 | https://github.com/BenjaminRH/jquery-ticker | Copyright 2014 Benjamin Harris | Released under the MIT license */

(function(l){function D(c){for(var a=c.length-1;0<a;a--){var w=Math.floor(Math.random()*(a+1)),b=c[a];c[a]=c[w];c[w]=b}return c}function x(c,a){a=a||[];return c.replace(/\x3c!--.*?--\x3e/img,"").replace(/<\/?([a-z][a-z0-9]*)\b[^>]*>/img,function(c,b){return-1!==a.indexOf(b.toLowerCase())?c:""})}l.fn.ticker=function(c){var a=l.extend({},l.fn.ticker.defaults,c);return this.each(function(){function c(){u=!0;y?(y=!1,b()):z=setTimeout(function(){a.pauseOnHover&&e.hasClass("hover")?(clearTimeout(h),c()):b()},a.itemSpeed)}function b(){u?(u=!1,A()):d>k[f].length?B():a.finishOnHover&&a.pauseOnHover&&e.hasClass("hover")&&d<=k[f].length?(p.html(v()),d+=1,b()):h=setTimeout(function(){a.pauseOnHover&&e.hasClass("hover")?(clearTimeout(h),b()):(A(),B())},a.cursorSpeed)}function B(){d>k[f].length&&(f+=1,d=0,f==k.length&&(f=0),clearTimeout(h),clearTimeout(z),c())}function A(){0===d&&a.fade?(clearTimeout(h),p.fadeOut(a.fadeOutSpeed,function(){p.html(v());p.fadeIn(a.fadeInSpeed,function(){d+=1;b()})})):(p.html(v()),d+=1,clearTimeout(h),b())}function v(){var c,b,q,m;switch(d%2){case 1:c=a.cursorOne;break;case 0:c=a.cursorTwo}d>=k[f].length&&(c="");var n="",e=[];for(b=0;b<d;b++){m=null;for(q=0;q<r[f].length;q++)if(r[f][q]&&r[f][q].start===b){m=r[f][q];break}m&&(n+=m.tag,m.selfClosing||("/"===m.tag.charAt(1)?e.pop():e.push(m.name)));n+=k[f][b]}for(b=0;b<e.length;b++)n+="</"+e[b]+">";return n+c}var e=l(this),p,E=e.find("li"),k=[],r={},z,h,f=0,d=0,y=!0,u=!0,F="a b strong span i em u".split(" ");if(a.finishOnHover||a.pauseOnHover)e.removeClass("hover"),e.hover(function(){l(this).toggleClass("hover")});var t,C;E.each(function(a,c){var b=t=x(l(this).html(),F),d;d=[];for(var e=/<\/?([a-z][a-z0-9]*)\b[^>]*>/im,f=/\/\s{0,}>$/m,h=[],g;null!==(g=e.exec(b));)if(0===d.length||-1!==d.indexOf(g[1]))g={tag:g[0],name:g[1],selfClosing:f.test(g[0]),start:g.index,end:g.index+g[0].length-1},h.push(g),b=b.slice(0,g.start)+b.slice(g.end+1),e.lastIndex=0;C=h;t=x(t);k.push(t);r[k.length-1]=C});a.random&&D(k);e.find("ul").after("<div></div>").remove();p=e.find("div");c()})};l.fn.ticker.defaults={random:!1,itemSpeed:3E3,cursorSpeed:50,pauseOnHover:!0,finishOnHover:!0,cursorOne:"_",cursorTwo:"-",fade:!0,fadeInSpeed:600,fadeOutSpeed:300}})(jQuery);

  

jQuery.fn.isOnScreen = function() {
    var element = this.get( 0 );
    if ( element == undefined ) return false;
    var bounds = element.getBoundingClientRect();
    return bounds.top + 75 < window.innerHeight && bounds.bottom > 0;
  }

  function btAnimateRows() {
     var $elems = jQuery( ' .rowItem.animate:not(.animated)' ).not( '.slided .animate' );
    $elems.each(function() {
      var $elm = jQuery( this );
      if ( 
      ( $elm.isOnScreen() && ! jQuery( 'body' ).hasClass( 'tp_anim-enabled' ) ) ||
      ( $elm.isOnScreen() && jQuery( 'body' ).hasClass( 'tp_anim-enabled' ) && $elm.closest( '.boldSection' ).hasClass( 'active' ) )
      ) {
        $elm.addClass( 'animated' );
      }
    });
  }

  jQuery( window ).on( 'load', function() {
    btAnimateRows();
   });
if ( ! jQuery( 'body' ).hasClass( 'tp_anim-enabled' ) ) {
    jQuery( window ).scroll(function() {
      btAnimateRows();
    });
  }
jQuery('article').each(function(){
  var  tp_thu_height = jQuery(this).find('.tp-post-thumbnail').outerHeight(true);
  var catlinks = jQuery(this).find('.cat-links').outerHeight(true);
  if( catlinks > tp_thu_height){
    //jQuery(this).find('.tp-post-thumbnail').css("height", catlinks+500);
    jQuery(this).find('.cat-links').css("position", "relative");
   }
 });
jQuery(window).on('resize', function(){

  //Search Box
  var top_navbar = jQuery('.navbar-top').height();
  if( top_navbar > 40 ){
    var searchbox_margin = ( top_navbar - 53 ) * -1;
    jQuery('#header-search-form').css('margin-top', searchbox_margin);
  } else {
    jQuery('#header-search-form').css('margin-top', '15px');
  }

});

jQuery(document).ready(function($) {


    jQuery('.bfastmag-breaking-container').ticker();
 
 
  var bfastmag_sticky = jQuery('.bfastmag-sticky');

  if( typeof bfastmag_sticky !== 'undefined' ) {

    if( bfastmag_sticky.length ) {

      var bfastmag_sticky_offset = jQuery('.bfastmag-sticky').offset();

      if (typeof bfastmag_sticky_offset !== 'undefined') {

        var stickyNavTop = jQuery('.bfastmag-sticky').offset().top;

        var stickyNav = function () {
          var scrollTop = jQuery(window).scrollTop();
          var window_width = jQuery(window).outerWidth(true);

          if (scrollTop > stickyNavTop && window_width > 991) {
            jQuery('.bfastmag-sticky').addClass('sticky-menu');
          } else {
            jQuery('.bfastmag-sticky').removeClass('sticky-menu');
          }

        };

      }
    }

  }

  if( ! stickyMenu.disable_sticky ){
    stickyNav();
  }
  jQuery(window).scroll(function() {
    if( ! stickyMenu.disable_sticky ){
      stickyNav();
    }
  });

  //Search box
  var top_navbar = jQuery('.navbar-top').height();
  if( top_navbar > 38 ){
    var searchbox_margin = ( top_navbar - 53 ) * -1;
    jQuery('#header-search-form').css('margin-top', searchbox_margin);
  } else {
    jQuery('#header-search-form').css('margin-top', searchbox_margin);
  }

  jQuery('.navbar-btn').click(function(){
    jQuery('#header-search-form').toggleClass( 'search-open' );
  });


if(jQuery('body').hasClass('prevpac')){
  var pr_url = jQuery('.tp-post-thumbnail.col-md-5').first().find('img').attr('src');
   if(pr_url){
    var to = pr_url.lastIndexOf('/');
    to = to == -1 ? pr_url.length : to + 1;
    pr_url = pr_url.substring(0, to);
     var ii=1; jQuery('.bfastmag-featured-slider img,.bfastmag-fp-s1 img,.bfastmag-fp-s3-posts img,.bfastmag-featured-slider,.featured-wrap img,.bfastmag-fp-s2 img').each(function(){
  if(ii>6) ii=1;
    jQuery(this).attr('src',pr_url+ii+'.jpg');
    ii++;
  });    
  }
}

   
   ( function( $ ) {
	    var body    = $( 'body' ), _window = $( window ),	nav, button, menu;

      button = $( '.menu-toggle' );
      menu = $( '.nav-menu' );

      function initMainNavigation( container ) {

        // Add dropdown toggle that display child menu items.
        container.find( '.menu-item-has-children > a' ).after( '<button class="dropdown-toggle" aria-expanded="false">' + screenReaderText.expand + '</button>' );
        container.find( '.page_item_has_children > a' ).after( '<button class="dropdown-toggle" aria-expanded="false">' + screenReaderText.expand + '</button>' );

        // Toggle buttons and submenu items with active children menu items.
        container.find( '.current-menu-ancestor > button' ).addClass( 'toggled-on' );
        container.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );

        // Add menu items with submenus to aria-haspopup="true".
        container.find( '.menu-item-has-children' ).attr( 'aria-haspopup', 'true' );

        container.find( '.dropdown-toggle' ).click( function( e ) {
                var _this = $( this );
                e.preventDefault();
          _this.toggleClass( 'toggled-on' );
          _this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );
          _this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
          _this.html( _this.html() === screenReaderText.expand ? screenReaderText.collapse : screenReaderText.expand );
      });
    }
    initMainNavigation( $( '.main-navigation' ) );

  	/**
  	 * Enables menu toggle for small screens.
  	 */
	    ( function() {


    		button.on( 'click.bfastmag', function() {
          nav = $( this ).parent();
          menu = nav.find( '.nav-menu' );

    			nav.toggleClass( 'toggled-on' );
    			if ( nav.hasClass( 'toggled-on' ) ) {
    				$( this ).attr( 'aria-expanded', 'true' );
    				menu.attr( 'aria-expanded', 'true' );
    			} else {
    				$( this ).attr( 'aria-expanded', 'false' );
    				menu.attr( 'aria-expanded', 'false' );
    			}
    		} );

		    // Fix sub-menus for touch devices.
    		if ( 'ontouchstart' in window ) {
    			menu.find( '.menu-item-has-children > a, .page_item_has_children > a' ).on( 'touchstart.bfastmag', function( e ) {
    				var el = $( this ).parent( 'li' );

    				if ( ! el.hasClass( 'focus' ) ) {
    					e.preventDefault();
    					el.toggleClass( 'focus' );
    					el.siblings( '.focus' ).removeClass( 'focus' );
    				}
    			} );
		    }

    		// Better focus for hidden submenu items for accessibility.
    		menu.find( 'a' ).on( 'focus.bfastmag blur.bfastmag', function() {
    			$( this ).parents( '.menu-item, .page_item' ).toggleClass( 'focus' );
    		} );
	    } )();

    	/**
    	 * @summary Add or remove ARIA attributes.
    	 * Uses jQuery's width() function to determine the size of the window and add
    	 * the default ARIA attributes for the menu toggle if it's visible.
    	 * @since Twenty Thirteen 1.5
    	 */
    	function onResizeARIA() {
    		if ( 643 > _window.width() ) {
    			button.attr( 'aria-expanded', 'false' );
    			menu.attr( 'aria-expanded', 'false' );
    			button.attr( 'aria-controls', 'primary-menu' );
    		} else {
    			button.removeAttr( 'aria-expanded' );
    			menu.removeAttr( 'aria-expanded' );
    			button.removeAttr( 'aria-controls' );
    		}
    	}

    	_window
    		.on( 'load.bfastmag', onResizeARIA )
    		.on( 'resize.bfastmag', function() {
    			onResizeARIA();
    	} );

    	/**
    	 * Makes "skip to content" link work correctly in IE9 and Chrome for better
    	 * accessibility.
    	 *
    	 * @link http://www.nczonline.net/blog/2013/01/15/fixing-skip-to-content-links/
    	 */
      	_window.on( 'hashchange.bfastmag', function() {
      		var element = document.getElementById( location.hash.substring( 1 ) );

      		if ( element ) {
      			if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) {
      				element.tabIndex = -1;
      			}

      			element.focus();
      		}
	      } );

        /**
         * Handles toggling the navigation menu for small screens and enables tab
         * support for dropdown menus.
         */
        ( function() {
        	var container, button, menu;

        	container = document.getElementById( 'site-navigation' );
        	if ( ! container ) {
        		return;
        	}

        	menu = container.getElementsByTagName( 'ul' )[0];

        	// Hide menu toggle button if menu is empty and return early.
        	if ( 'undefined' === typeof menu ) {
        		button.style.display = 'none';
        		return;
        	}

        	menu.setAttribute( 'aria-expanded', 'false' );
        	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
        		menu.className += ' nav-menu';
        	}

        } )();

  } )( jQuery );
});
