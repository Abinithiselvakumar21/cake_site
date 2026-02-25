<?php
/**
 * Scripts and stylesheets
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }



if (!function_exists('apress_themes_scripts')) {
	/**
	 * Enqueue front scripts and styles
	 */
	function apress_themes_scripts() {		
		
		global $apress_data;
		
$cur_id = is_search() ? '' : apress_get_custom_header_id();
$c_pageID = is_search() ? '' : apress_theme_current_page_id();	


if( is_404() ) {
$header_enable_sticky_header = 'off';
$header_sticky_header_style = '';
}else{
$header_enable_sticky_header = get_post_meta($cur_id, 'zt_enable_sticky_header', true );
$header_sticky_header_style = get_post_meta($cur_id, 'zt_sticky_header_style', true );
}
		if($header_enable_sticky_header == '' || $header_enable_sticky_header == 'default'){
			
			$header_sticky_opt		= isset($apress_data['header_sticky_opt']) ? $apress_data['header_sticky_opt'] : 'on';
			$header_sticky_effect	= isset($apress_data['header_sticky_effect']) ? $apress_data['header_sticky_effect'] : 'default';
			
		}else{
			$header_sticky_opt		= $header_enable_sticky_header;
			$header_sticky_effect	= $header_sticky_header_style;
				}
		$apress_get_template_directory_uri = get_template_directory_uri();
		$lightbox_style			= isset($apress_data["lightbox_style"]) ? $apress_data["lightbox_style"] : 'lightbox-none';		
		
		$header_builder = isset($apress_data["header_builder"]) ? $apress_data["header_builder"] : 'default';
		$page_header_builder = get_post_meta( $c_pageID, 'zt_header_builder', true ); 
		
		if($header_builder == 'page_editor' || $page_header_builder == 'page_editor'){
			$header_position	= 'Top';
		}else{
			$header_position	= isset($apress_data["header_position"]) ? $apress_data["header_position"] : 'Top';
			}
		$header_sticky_display	= isset($apress_data['header_sticky_display']) ? $apress_data['header_sticky_display'] : 'section2';
		$enable_onepage			= isset($apress_data['enable_onepage']) ? $apress_data['enable_onepage'] : 'off';
		$button_onclick_effect	= isset($apress_data['button_onclick_effect']) ? $apress_data['button_onclick_effect'] : 'on';
		$mobile_header_sticky_show_hide = isset($apress_data["mobile_header_sticky_show_hide"]) ? $apress_data["mobile_header_sticky_show_hide"] : 'off';
		
		$theme_info = wp_get_theme();		
		
		wp_enqueue_style( 'apc-main-style', get_stylesheet_uri(), array(), $theme_info->get( 'Version' ) ); 		
				
		if($lightbox_style == 'magnific-popup-gallery'){
			wp_enqueue_style( 'magnific-popup', $apress_get_template_directory_uri . '/assets/css/magnific-popup.css', array(), $theme_info->get( 'Version' ) );
		}
		if($lightbox_style == 'photo-swipe-gallery'){
			wp_enqueue_style( 'photoswipe', $apress_get_template_directory_uri . '/assets/css/photoswipe.css', array(), $theme_info->get( 'Version' ) );
			wp_enqueue_style( 'photoswipe-default-skin', $apress_get_template_directory_uri . '/assets/css/photoswipe-default-skin.css', array(), $theme_info->get( 'Version' ) );
		}
		wp_enqueue_style( 'ap_font_style', $apress_get_template_directory_uri . '/assets/css/ap_font_style.css', array(), $theme_info->get( 'Version' ) );	
				
		wp_enqueue_style( 'apc-common', $apress_get_template_directory_uri . '/assets/css/common.css', array(), $theme_info->get( 'Version' ) );
		
		apress_theme_dynamic_css_output();	
		
		// [if lt IE 9] - internet explorer fallback
		wp_enqueue_script( 'ie_html5shiv', $apress_get_template_directory_uri . '/assets/js/html5shiv.js', null, $theme_info->get( 'Version' ) );	
		wp_script_add_data( 'ie_html5shiv', 'conditional', 'lt IE 9' );	
				
		wp_enqueue_script( 'imagesloaded' );
		
		wp_enqueue_script( 'apc-all-plugins', $apress_get_template_directory_uri . '/assets/js/all-plugins.js', array( 'jquery' ), $theme_info->get( 'Version' ), true );	
		
		if($lightbox_style == 'magnific-popup-gallery'){		
			wp_enqueue_script( 'magnific-popup',$apress_get_template_directory_uri . '/assets/js/jquery.magnific-popup.js', array ( 'jquery' ), $theme_info->get( 'Version' ), true );
		}
		if($lightbox_style == 'photo-swipe-gallery'){			
			wp_enqueue_script( 'photoswipe',$apress_get_template_directory_uri . '/assets/js/photoswipe.min.js', array ( 'jquery' ), $theme_info->get( 'Version' ), true );
			wp_enqueue_script( 'photoswipe-ui-default',$apress_get_template_directory_uri . '/assets/js/photoswipe-ui-default.min.js', array ( 'jquery' ), $theme_info->get( 'Version' ), true );
		}		
		
		//wp_enqueue_script( 'apc-vide', $apress_get_template_directory_uri . '/assets/js/jquery.vide.js', array ( 'jquery' ), $theme_info->get( 'Version' ), true );
		//wp_enqueue_script( 'apc-youtube', $apress_get_template_directory_uri . '/assets/js/apcore.youtube.js', array ( 'jquery' ), $theme_info->get( 'Version' ), true );	
		wp_enqueue_script( 'apc-vide-youtube', $apress_get_template_directory_uri . '/assets/js/jquery.vide.youtube.min.js', array ( 'jquery' ), $theme_info->get( 'Version' ), true );	
		
		wp_enqueue_script( 'apc-main-scripts', $apress_get_template_directory_uri . '/assets/js/main.js', array ( 'jquery' ), $theme_info->get( 'Version' ), true );							
		wp_enqueue_script( 'apc-mega_menu_js', $apress_get_template_directory_uri. '/assets/js/megamenu.js' );	
		
		
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
		if ( class_exists( 'woocommerce' ) ) {
		   wp_enqueue_style( 'zt-linea');
		  }
		// Localize the script with new data	
		$local_variables = array(   
			'headerpositionval'		=> $header_position,
			'header_sticky_opt'		=> $header_sticky_opt,
			'header_sticky_display' => $header_sticky_display,
			'header_sticky_effect'	=> $header_sticky_effect,
			'page_slider_pos'		=> get_post_meta(get_the_ID(), 'zt_page_slider_pos', true ),
			'button_onclick_effect' => $button_onclick_effect,
			'lightbox_style'		=> $lightbox_style,
			'enable_onepage'		=> $enable_onepage,
			'mobileheader_sticky_showhide' => $mobile_header_sticky_show_hide
		);		
		wp_localize_script( 'apc-main-scripts', 'js_local_vars', $local_variables );
		wp_localize_script( 'apc-main-scripts', 'zilla_likes', array('ajaxurl' => admin_url('admin-ajax.php')) );
		wp_localize_script( 'apc-main-scripts', 'zt_post', array('ajaxurl' => admin_url('admin-ajax.php')) );
			
	}
}
if (!function_exists('apress_themes_admin_scripts')) {
	/**
	 * Enqueue admin scripts and styles
	 */
	function apress_themes_admin_scripts($hook) {
		$theme_info = wp_get_theme();
				
		wp_register_style( 'apress_theme_dashboard', get_template_directory_uri() . '/assets/admin/css/theme_dashboard.css', array(), $theme_info->get( 'Version' ) );
		wp_enqueue_style('apress_theme_dashboard');
		
		if(class_exists( 'Vc_Manager', false )) {
			if($hook == "post.php" || $hook == "post-new.php" || $hook == "edit.php"){				
				wp_enqueue_script('zolo_addon_image_picker', get_template_directory_uri().'/assets/admin/js/image-picker.jquery.min.js', array('jquery'), false, true);
			}
		}
		
		 wp_enqueue_script( 'apc-dashboard', get_template_directory_uri().'/assets/admin/js/admin-dashboard.js', array('jquery', 'jquery-migrate'), false, true);
		 if ( isset( $_GET['page'] ) && $_GET['page'] == 'apc-plugins' ){		
			//if ( $_GET['page'] == 'apc-plugins' ) {
			
				wp_enqueue_script( 'apc-load-isotop', get_template_directory_uri() .'/assets/admin/js/isotope.pkgd.min.js', array( 'jquery' ), null, true );
				wp_enqueue_script( 'apc-plugins-iso-config', get_template_directory_uri().'/assets/admin/js/install-plugins-iso.js', array( 'jquery' ), null, true );
			
			//}
		 }
		
	}
}