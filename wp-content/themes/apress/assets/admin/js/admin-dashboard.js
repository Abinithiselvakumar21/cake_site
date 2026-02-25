(function( $ ) {
    'use strict';

    jQuery(document).ready(function(){
        
        var wait_load = false;
        jQuery("#apcThemeActivate").on("submit", function(e) {
            e.preventDefault();
			var btn = jQuery(this);
			var purchase_item = jQuery("#apcPurchaseCode").val();
			btn.prepend('<div class="apc-spinner-wrap"><div class="wna-spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div></div>');
			
           
            jQuery.ajax({
                type : "post", 
                url : ajaxurl,
                data : {
                    action: "purchase_activation",   
                    purchaseCodeVal: purchase_item,
                },
                success: function(response) {  
     				"failed" == response ? (btn.removeClass("failed"), 
					btn.addClass("success"), 
					jQuery("#apcFailedMesaage").html("")) : (btn.removeClass("success"), 
					btn.addClass("failed"), 
					jQuery("#apcFailedMesaage").html(response)), 
					btn.find(".apc-spinner-wrap").remove()
                },
            });        
        });

		var $plugins = $( '.wn-plugins' ),
			$btn	 = $( '.apc-admin-btn' );

		// install action
		$plugins.on( 'click', '.apc-admin-btn[data-plugin-action="install"]', function( e ) {

			e.preventDefault();

			if ( $( '.apc-admin-btn' ).hasClass( 'installing' ) ) {
				return;
			}

			var $this	= $( this ),
				q_href	= $this.attr( 'href' ).split( '&' ),
				data	= {
					'action': 'apress_install_plugin',
					'plugin': q_href[1].substr( q_href[1].lastIndexOf( '=' ) + 1, q_href[1].length ),
					'tgmpa-install': 'install-plugin',
					'tgmpa-nonce': q_href[3].substr( q_href[3].lastIndexOf( '=' ) + 1, q_href[3].length ),
					'page': 'install-required-plugins'
				};
				
			$this.addClass( 'installing' );

			$btn.css( 'opacity', '0.5' );
			$this.css( 'opacity', '1' );

			$.ajax({
				type: 'GET',
				url: ajaxurl,
				data: data
			}).done(function (response) {
				console.log(response);
				$btn.css('opacity', '1');
				if ($this.closest('.wn-plugin').length) {
					$this.closest('.row-actions').replaceWith('<div class="row-actions visible active"><span class="activate"><a href="#" class="button apc-admin-btn">Activated</a></span></div>');
				} else {
					$this.removeClass('installing').attr('data-plugin-action', 'deactivate').attr('href', response.substr(response.lastIndexOf('webnusi') + 6, response.length)).text('Deactivate').closest('.theme').addClass('active');
				}
			}).fail(function () {
				alert('Something went wrong! Reload page and try again.')
			});

		});

		// update action
		$plugins.on('click', '.apc-admin-btn[data-plugin-action="update"]', function (e) {
			e.preventDefault();

			if ($('.apc-admin-btn').hasClass('installing')) {
				return;
			}

			var $this = $(this),
				q_href = $this.attr('href').split('&'),
				data = {
					'action': 'apress_update_plugin',
					'plugin': q_href[1].substr(q_href[1].lastIndexOf('=') + 1, q_href[1].length),
					'tgmpa-update': 'update-plugin',
					'tgmpa-nonce': q_href[3].substr(q_href[3].lastIndexOf('=') + 1, q_href[3].length),
					'page': 'install-required-plugins'
				};

			$this.addClass('installing');

			$btn.css('opacity', '0.5');
			$this.css('opacity', '1');

			$.ajax({
				type: 'GET',
				url: ajaxurl,
				data: data
			}).done(function (response) {
				$btn.css('opacity', '1');
				$this.closest('.row-actions').find('.update').remove();
				if ($this.closest('.wn-plugin').length) {
					$this.closest('.row-actions').replaceWith('<div class="row-actions visible active"><span class="activate"><a href="#" class="button apc-admin-btn">Activated</a></span></div>');
				} else {
					$this.removeClass('installing').attr('data-plugin-action', 'deactivate').attr('href', response.substr(response.lastIndexOf('webnusi') + 6, response.length)).text('Deactivate').closest('.theme').addClass('active');
				}
			}).fail(function () {
				alert('Something went wrong! Reload page and try again.')
			});
		});
		
		// activate action
		$plugins.on( 'click', '.apc-admin-btn[data-plugin-action="activate"]', function( e ) {

			e.preventDefault();

			if ( $( '.apc-admin-btn' ).hasClass( 'installing' ) ) {
				return;
			}

			var $this	= $( this ),
				q_href	= $this.attr( 'href' ).split( '&' ),
				data	= {
					'action': 'apress_activate_plugin',
					'plugin': q_href[1].substr( q_href[1].lastIndexOf( '=' ) + 1, q_href[1].length ),
					'tgmpa-activate': 'activate-plugin',
					'tgmpa-nonce': q_href[3].substr( q_href[3].lastIndexOf( '=' ) + 1, q_href[3].length ),
				};

			$this.addClass( 'installing' );

			$btn.css( 'opacity', '0.5' );
			$this.css( 'opacity', '1' );

			$.ajax({
				type: 'GET',
				url: ajaxurl,
				data: data,
				success: function( response ) {
					$btn.css( 'opacity', '1' );
					if ( $this.closest( '.wn-plugin' ).length ) {
						$this.closest( '.row-actions' ).replaceWith( '<div class="row-actions visible active"><span class="activate"><a href="#" class="button apc-admin-btn">Activated</a></span></div>' );
					} else {
						$this.removeClass( 'installing' ).attr( 'data-plugin-action', 'deactivate' ).attr( 'href', response ).text( 'Deactivate' ).closest( '.theme' ).addClass( 'active' );
					}
				}
			});

		});

		// deactivate action
		$plugins.on( 'click', '.apc-admin-btn[data-plugin-action="deactivate"]', function( e ) {

			e.preventDefault();

			if ( $( '.apc-admin-btn' ).hasClass( 'installing' ) ) {
				return;
			}

			var $this	= $( this ),
				q_href	= $this.attr( 'href' ).split( '&' ),
				data	= {
					'action': 'apress_deactivate_plugin',
					'plugin': q_href[1].substr( q_href[1].lastIndexOf( '=' ) + 1, q_href[1].length ),
					'tgmpa-deactivate': 'deactivate-plugin',
					'tgmpa-nonce': q_href[3].substr( q_href[3].lastIndexOf( '=' ) + 1, q_href[3].length ),
				};

			$this.addClass( 'installing' );

			$btn.css( 'opacity', '0.5' );
			$this.css( 'opacity', '1' );

			$.ajax({
				type: 'GET',
				url: ajaxurl,
				data: data,
				success: function( response ) {
					$btn.css( 'opacity', '1' );
					$this.removeClass( 'installing' ).attr( 'data-plugin-action', 'activate' ).attr( 'href', response ).text( 'Activate' ).closest( '.theme' ).removeClass( 'active' );
				}
			});

		});

		$('.whi-install-plugins').on('click', function (e) {
			e.preventDefault();

			var $installPluginsBtn = $(this);
			var $allPlugins = $installPluginsBtn.parent().next('.wn-plugins');
			var plugins = [];

			$allPlugins.find('.wn-plugin:not(:hidden)').each(function (index, element) {
				var $this = $(this);
				var $pluginActionBtn = $this.find('.apc-admin-btn');
				var q_href = $pluginActionBtn.attr('href');
				var pluginAction = $pluginActionBtn.data('plugin-action');

				if (q_href != undefined && q_href != '#') {
					plugins.push({
						elem: $pluginActionBtn[0],
						href: q_href,
						pluginAction: pluginAction
					});
				}
			});

			if (plugins.length) {
				wiInstallPlugins(plugins, $installPluginsBtn);
			} else {
				$installPluginsBtn.css({
					'background': 'linear-gradient(95deg, #6fe08a 0%, #58cf74 50%, #36cb58 100%)',
					'box-shadow': '0 5px 10px -5px #4cbf67',
					'pointer-events': 'none'
				});
			}
		});

		function wiInstallPlugins(plugins, $installPluginsBtn) {
			if (!plugins.length) {
				$installPluginsBtn.css({
					'background': 'linear-gradient(95deg, #6fe08a 0%, #58cf74 50%, #36cb58 100%)',
					'box-shadow': '0 5px 10px -5px #4cbf67',
					'pointer-events': 'none'
				});
				return;
			}

			if ($('.apc-admin-btn').hasClass('installing')) {
				return;
			}

			var $this = $(plugins[0]['elem']);
			var pluginAction = plugins[0]['pluginAction'];
			var q_href = $this.attr('href').split('&');
			var data;

			if (pluginAction == 'install') {
				data = {
					'action': 'apress_install_plugin',
					'plugin': q_href[1].substr(q_href[1].lastIndexOf('=') + 1, q_href[1].length),
					'tgmpa-install': 'install-plugin',
					'tgmpa-nonce': q_href[3].substr(q_href[3].lastIndexOf('=') + 1, q_href[3].length),
					'page': 'install-required-plugins'
				};
			} else if (pluginAction == 'activate') {
				data = {
					'action': 'apress_activate_plugin',
					'plugin': q_href[1].substr(q_href[1].lastIndexOf('=') + 1, q_href[1].length),
					'tgmpa-activate': 'activate-plugin',
					'tgmpa-nonce': q_href[3].substr(q_href[3].lastIndexOf('=') + 1, q_href[3].length),
				};
			} else if (pluginAction == 'update') {
				data = {
					'action': 'apress_update_plugin',
					'plugin': q_href[1].substr(q_href[1].lastIndexOf('=') + 1, q_href[1].length),
					'tgmpa-update': 'update-plugin',
					'tgmpa-nonce': q_href[3].substr(q_href[3].lastIndexOf('=') + 1, q_href[3].length),
					'page': 'install-required-plugins'
				};
			} else {
				plugins.shift();
				wiInstallPlugins(plugins, $installPluginsBtn);
			}

			$this.addClass('installing');

			$btn.css('opacity', '0.5');
			$this.css('opacity', '1');

			$.ajax({
				type: 'GET',
				url: ajaxurl,
				data: data
			}).done(function (response) {
				$btn.css('opacity', '1');
				if ($this.closest('.wn-plugin').length) {
					$this.closest('.row-actions').replaceWith('<div class="row-actions visible active"><span class="activate"><a href="#" class="button apc-admin-btn">Activated</a></span></div>');
				} else {
					$this.removeClass('installing').attr('data-plugin-action', 'deactivate').attr('href', response.substr(response.lastIndexOf('webnusi') + 6, response.length)).text('Deactivate').closest('.theme').addClass('active');
				}
				plugins.shift();
				wiInstallPlugins(plugins, $installPluginsBtn);
			}).fail(function () {
				alert('Something went wrong! Reload page and try again.')
			});
		}    
    });


})( jQuery );


