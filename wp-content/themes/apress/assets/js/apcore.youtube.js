(function($) {
	
		"use strict";
				
        var initAPI = false;
        var process = false;
        var contex = [];
        var players = [];
        var attrs = [];
        var YTdeferred = $.Deferred();
        window.onYouTubePlayerAPIReady = function() {
            YTdeferred.resolve(window.YT);
        };

		function embedYoutubeAPI() {
			var tag = document.createElement('script');
			var protocol = location.protocol;
			if(protocol=='http:'){
				tag.src = "http://www.youtube.com/iframe_api";
			}else{
				tag.src = "https://www.youtube.com/iframe_api";
			}
			
			var firstScriptTag = document.getElementsByTagName('script')[0];
			firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
		}
		function rescaleVideoBackground() {
			$('.apc-video-init').each(function() {
				var w = $(this).parent().width();
				var h = $(this).parent().height();
				var hideControl = 400;
				var id = $(this).attr('data-uid');
				//console.log(players[id]);	
				if (w / h > 16 / 9) {
					players[id].setSize(w, w / 16 * 9 + hideControl);
				} else {
					players[id].setSize(h / 9 * 16, h + hideControl);
				}
			});
		}
	
		function initVideoBackground(){
		
			if (process) {
				return;
			}
			process = true;
			if (!initAPI) {
				var elements = $('.apc-video-wrapper[data-video-id]');
				if (elements.length) {
					embedYoutubeAPI();
					initAPI = true;
				}
			}
			if (!initAPI) {
				process = false;
				return;
			}
			YTdeferred.done(function(YT) {	
				$('.apc-video-inner').each(function() {
										  
					var isInit = $(this).hasClass('apc-video-init');
					
					var id = null;
					if (!isInit) {
						id = Math.random().toString(36).substr(2, 9);
					} else {
						id = $(this).attr('data-uid');
					}
										
					contex[id] = this;	
					
					var isVisible = $(contex[id]).parent().hasClass('visible');
						
					if (isVisible && !isInit) {			
						$(contex[id]).addClass('apc-video-init');
						$(contex[id]).attr('data-uid', id);
						
						var videoID = $(contex[id]).parent().data('video-id');
						var videoStart = $(contex[id]).parent().data('video-start');
						var videoEnd = $(contex[id]).parent().data('video-end');
						if (typeof videoID === 'undefined' || !videoID) {
							return;
						}
						
						//console.log(videoID);
						
						var attrs = [];
							attrs[id] = {
								'videoId': videoID,
								'startSeconds': videoStart,
								'endSeconds': videoEnd,
								'suggestedQuality': 'small'
							};
							// whenever youtube callback was called = deferred resolved
							// your custom function will be executed with YT as an argument
							//YTdeferred.done(function(YT) {
							  //console.log(attrs);
							  // creating a player
							  // https://developers.google.com/youtube/iframe_api_reference#Getting_Started
							  players[id] = new YT.Player(contex[id], {						  
								playerVars: {
									'autoplay': 0,
									'autohide': 1,
									'modestbranding': 1,
									'rel': 0,
									'showinfo': 0,
									'controls': 0,
									'disablekb': 1,
									'enablejsapi': 0,
									'iv_load_policy': 3,
									'playsinline': 1,
									'loop': 1,
									'origin': 'http://www.youtube.com',					
									
								},
								events: {
									'onReady': function() {
										players[id].loadVideoById(attrs[id]);
										players[id].mute();
									},							
									'onStateChange': function(e){						
									  //console.log('State is:', e.data);
										if (e.data === 1) {	
											$(e.target.a).parents('.apc-overlay, .apc-video-wrap').addClass('apc-video-bg-init');
											$(e.target.a).addClass('active');	
											$(contex[id]).addClass('active');	
										} else if (e.data === 0) {
											players[id].seekTo(attrs[id].startSeconds);
										}
									},
								//'onError': onPlayerError
								}
							});	
							//console.log(players[id]);	
							//rescaleVideoBackground();						
						//});	
						}
					});
				});	
				process = false;
			}	
		
		
			$(document).on('click', '.apc-player-state', function() {
				var container = $(this).parents('.apc-overlay, .apc-video-wrap').find('.apc-video-inner');
				var id = $(container).attr('data-uid');
				$(this).toggleClass('ap-music_pause_button ap-music_play_button');
				if ($(this).hasClass('ap-music_pause_button')) {
					$(this).removeClass('apc-player-upause');
					players[id].playVideo();
				} else {
					$(this).addClass('apc-player-upause');
					players[id].pauseVideo();
				}
			});
			$(document).on('click', '.apc-player-stop', function() {
				var container = $(this).parents('.apc-overlay, .apc-video-wrap').find('.apc-video-inner');
				var id = $(container).attr('data-uid');
				$(this).siblings('.apc-player-state').removeClass('ap-music_pause_button').addClass('ap-music_play_button');
				$(this).siblings('.apc-player-state').addClass('apc-player-upause');
				players[id].pauseVideo();
			});
			$(document).on('click', '.apc-player-volume', function() {
				var container = $(this).parents('.apc-overlay, .apc-video-wrap').find('.apc-video-inner');
				var id = $(container).attr('data-uid');
				$(this).toggleClass('ap-mute ap-music_volume_up');
				if ($(this).hasClass('ap-music_volume_up')) {
					players[id].unMute();
				} else {
					players[id].mute();
				}
			}); 
			
			$(window).on('scroll resize scrollstop', function() {
				initVideoBackground();
			});
			$(document).ready(function() {
				initVideoBackground();
			});
			$(window).on('load', function() {
				rescaleVideoBackground();
			});
			$(window).on('scroll resize', function() {
				rescaleVideoBackground();
			});
			
				initVideoBackground();
			

})(jQuery);