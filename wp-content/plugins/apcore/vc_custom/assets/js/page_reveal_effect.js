(function($){

	"use strict";
	
	$(document).ready(function(){
			$('.apress-mask').clone().addClass('apc-mask-wrapper').appendTo("body");
			var $safeButton = $('.apc-hmenu-button'),
				$area = $('.apc-hmenubutton-area'),
				$closeBtn = $('.apc-close-button'),
				$themeContent = $('.zolo_main_content_area'),
				$themeFooter = $('.zolo_footer_area'),
				openArea = false;
			
			var  winsize = { width : window.innerWidth, height : window.innerHeight };	

			$safeButton.on('click',function(e){
				e.preventDefault();
				animateMask();
			});

			$closeBtn.on('click',function(e){
				e.preventDefault();
				animateMask();
			});

			var $maskWrapper = $('.apc-mask-wrapper');
			if( $maskWrapper.length ) {
				var nmbLayers = $maskWrapper.data('layers'),
					effect = $maskWrapper.data('effect'),
					colors = $maskWrapper.data('mask-colors').split(','),
					layers = false,
					animation = false,
					strHTML = '';
				addLayers();
			}

			function addLayers(){
				$('body').addClass(effect);
				for(var i = 0; i < nmbLayers; ++i) {
					var color = colors instanceof Array && colors[i] ? colors[i] : colors[0];
					strHTML += '<div class="apc-mask-layer apc-layer-' + (i+1) + '" style="background-color:' + color + ';"></div>';
				}
				$(strHTML).appendTo( $maskWrapper );
				layers = true;
			}

			function animateMask(){
				if(layers && !animation) {
					animation = true;
					
					if( !openArea ){
						$maskWrapper.addClass('apc-layer-animate');
					}else{
						setTimeout(function() {
							$maskWrapper.addClass('apc-layer-animate');
						}, 150);
					}
					
					var widthVal, heightVal, transform,
					
					direction = $maskWrapper.data('direction');	
					$maskWrapper.addClass('revealer-' + direction);
					//console.log(winsize.width);
					//console.log(direction);
					if( direction === 'cornertopleft' || direction === 'cornertopright' || direction === 'cornerbottomleft' || direction === 'cornerbottomright' ) {
						var pageDiagonal = Math.sqrt(Math.pow(winsize.width, 2) + Math.pow(winsize.height, 2));
						widthVal = heightVal = pageDiagonal + 'px';
						
						if( direction === 'cornertopleft' ) {
							transform = 'translate3d(-50%,-50%,0) rotate3d(0,0,1,135deg) translate3d(0,' + pageDiagonal + 'px,0)';
						}
						else if( direction === 'cornertopright' ) {
							transform = 'translate3d(-50%,-50%,0) rotate3d(0,0,1,-135deg) translate3d(0,' + pageDiagonal + 'px,0)';
						}
						else if( direction === 'cornerbottomleft' ) {
							transform = 'translate3d(-50%,-50%,0) rotate3d(0,0,1,45deg) translate3d(0,' + pageDiagonal + 'px,0)';
						}
						else if( direction === 'cornerbottomright' ) {
							transform = 'translate3d(-50%,-50%,0) rotate3d(0,0,1,-45deg) translate3d(0,' + pageDiagonal + 'px,0)';
						}
					} else if( direction === 'left' || direction === 'right' ) {
						widthVal = '1920px'
						heightVal = '100vw';
						transform = 'translate3d(-50%,-50%,0) rotate3d(0,0,1,' + (direction === 'left' ? 90 : -90) + 'deg) translate3d(0,100%,0)';
					} else if( direction === 'top' || direction === 'bottom' ) {
						widthVal = '1920px';
						heightVal = '100vh';
						transform = direction === 'top' ? 'rotate3d(0,0,1,180deg)' : 'none';
					}
					
					$maskWrapper[0].style.width = widthVal;
					$maskWrapper[0].style.height = heightVal;
					$maskWrapper[0].style.WebkitTransform = $maskWrapper[0].style.transform = transform;
					
					
					var $animLayers = $('.apc-mask-layer'),
						layersLength = nmbLayers-1,
						delay = 1500 * 0.375,
						smallDelay;
					
					/*if( !openArea ){
						//var delay = 1500 * 0.375;
						onEndAnimation($animLayers[layersLength], onEnd);
					}else{
						onEndAnimation($animLayers[layersLength], onEnd);
					}*/
					
					onEndAnimation($animLayers[layersLength], onEnd);
					window.clearTimeout(smallDelay);
					smallDelay = window.setTimeout(onBeforeEnd, delay);
					
					
				}
			}

			var support = { animations : (typeof Modernizr === 'undefined' ? true : Modernizr.cssanimations) },
				animEndEventNames = { 'WebkitAnimation' : 'webkitAnimationEnd', 'OAnimation' : 'oAnimationEnd', 'msAnimation' : 'MSAnimationEnd', 'animation' : 'animationend' },
				animEndEventName = animEndEventNames[ (typeof Modernizr === 'undefined' ? 'animation' : Modernizr.prefixed( 'animation' )) ];

			function onEndAnimation(el, callback){
				var onEndCallbackFn = function( ev ) {
					if( support.animations ) {
						if( ev.target != this ) return;
						$(this).off( animEndEventName, onEndCallbackFn );
					}
					if( callback && typeof callback === 'function' ) { callback.call(); }
				};
				if( support.animations ) {
					$(el).on( animEndEventName, onEndCallbackFn );
				}
				else {
					onEndCallbackFn();
				}
			}

			function onEnd() {
				$maskWrapper.removeClass('apc-layer-animate');
				animation = false;
			}

			function onBeforeEnd() {
				if( !openArea ){
					$('body').addClass(effect );
					$area.addClass('apc-show-area');
					$('html, body').scrollTop(0);
					$('body').addClass('apc-open-safebutton-area');
					$themeContent.css({'visibility':'hidden', 'height' : 0, 'overflow':'hidden' });
					$themeFooter.css({'visibility':'hidden', 'height' : 0, 'overflow':'hidden' });
					
					openArea = true;
				} else {
					$area.removeClass('apc-show-area');
					$('html, body').scrollTop(0);
					$('body').removeClass('apc-open-safebutton-area');
					
					setTimeout(function() {
							$themeContent.css({'visibility':'', 'height' : '', 'overflow':'' });
							$themeFooter.css({'visibility':'', 'height' : '', 'overflow':'' });
						}, 1000);
						
					
					openArea = false;					
				}
			}
		});

})(jQuery);