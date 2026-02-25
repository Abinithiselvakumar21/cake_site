<?php 
/*-----------------------------------------------------------------------------------*/
/* Gradient Icon Box
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$social_profiles = $website_name = '';

extract( shortcode_atts( array(
	'hover_style'					=> 'menu_hover_style1',
	'apress_primary_menu'			=> '',
	'orientation'					=> 'horizontal',
	'vertical_menu_max_width'		=> '',
	'vertical_menu_alignment'		=> 'left',
	'apress_enable_flex_menu'		=> 'no',
	'menu_border_width'				=> '2',
	'menu_hover_border_color'		=> '#1769ff',
	'menu_hover_bg_color'			=> '#1769ff',
	'menu_hover_bg_radius'			=> '0',
	'menu_color'					=> '#4f4f4f',
	'menu_hover_color'				=> '#1769ff',
	'menu_font_options'				=> '',
	'menu_google_fonts'				=> '',
	'menu_custom_fonts'				=> '',
	'menu_text_transform'			=> 'inherit',
	'dropdown_menu_text_transform'	=> 'inherit',
	'dropdown_menu_font_weight'		=> 'inherit',
	'dropdown_menu_font_style'		=> 'inherit',
	'dropdown_hover_style'			=> 'background_style',
	'dropdown_width'				=> '210',
	'dropdown_border_radius'		=> '6',
	'dropdown_menu_alignment'		=> 'left',
	'dropdown_bg_color'				=> '#ffffff',
	'dropdown_menu_hover_bg_color'	=> '#ffffff',
	'dropdown_menu_hover_underline_color'=> '#1769ff',
	'dropdown_menu_color'			=> '#4f4f4f',
	'dropdown_menu_hover_color'		=> '#1769ff',
	'dropdown_item_border_color'	=> '#f4f4f4',
	'dropdown_box_shadow'			=> 'box_shadow_enable:enable|shadow_horizontal:4|shadow_vertical:10|shadow_blur:25|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.12)',
	
	'dropdown_padding_top'			=> '0',
	'dropdown_padding_right'		=> '0',
	'dropdown_padding_bottom'		=> '0',
	'dropdown_padding_left'			=> '0',
	
	'dropdown_item_padding_top'		=> '12',
	'dropdown_item_padding_right'	=> '30',
	'dropdown_item_padding_bottom'	=> '12',
	'dropdown_item_padding_left'	=> '30',
	'dropdown_menu_font_size'		=> '',
	
	'menu_item_padding_top'		=> '10',
	'menu_item_padding_right'	=> '20',
	'menu_item_padding_bottom'	=> '10',
	'menu_item_padding_left'	=> '20',
	'menu_item_margin_top'		=> '',
	'menu_item_margin_right'	=> '',
	'menu_item_margin_bottom'	=> '',
	'menu_item_margin_left'		=> '',
	'menu_separator'			=> 'no',
	'menu_separator_color'		=> '#ffffff',
	'menu_separator_height'		=> '12',
	
	'mobile_menu_active'					=> 'no',
	'mobile_nav_icon_color'					=> '#000',
	'mobile_menu_canvas_width'				=> '360',
	'mobile_menu_canvas_background_color'	=> '#000',
	'mobile_menu_color'						=> '#ffffff',
	'mobile_menu_hover_color'				=> '#1769ff',
	'mobile_menu_active_background_color'	=> '#333',
	'mobile_menu_padding'					=> 'padding-top:0|padding-bottom:0|padding-left:20|padding-right:20',
	'mobile_menu_canvas_padding'			=> 'padding-top:60|padding-bottom:60|padding-left:0|padding-right:0',
	'class'									=> '',
	'data_animation'						=> 'No Animation',
	'data_delay'							=> '500',
	
), $atts ) );
			
	//Animation
	if($data_animation == 'No Animation'){
		$animatedclass = 'noanimation';
	}else{
		$animatedclass = 'animated hiding';
	}
	
	if($mobile_menu_active == 'yes'){
		$mobile_menu_active_class = 'header_element_mobile_menu_active';
	}else{
		$mobile_menu_active_class = '';
		}
    if($apress_enable_flex_menu == 'yes'){$apress_enable_flex_menu_class = 'apress_header_builder_flex_menu';}else{$apress_enable_flex_menu_class = '';}
	$uniqid = uniqid(rand());
	$zolo_primary_menu_id = 'zolo_primary_menu_'.$uniqid;
	
	$menu_typo_options = _zolo_parse_text_shortcode_params($menu_font_options, 'zolo_button_text', $menu_google_fonts, $menu_custom_fonts);
	?>
	
    
    <div class="menu_<?php echo $uniqid;?> header_module_wrapper ap_custom_header_builder <?php echo $mobile_menu_active_class.' '.$apress_enable_flex_menu_class; ?>" id="menu_<?php echo $uniqid;?>">
    
    <?php 
	global $apress_data; 
	$dropdown_loading = isset($apress_data["dropdown_loading"]) ? $apress_data["dropdown_loading"] : 'dropdown_loading_fade';
		echo '<div id="'.$zolo_primary_menu_id.'" class="zolo_header_element_primary_menu  '.esc_attr($dropdown_loading.' '.$zolo_primary_menu_id).'">';
		
        echo '<nav class="main-navigation zolo_header_primary_menu apc-navigation '.$hover_style.' '.$orientation.' '.$dropdown_hover_style.' '.$dropdown_menu_alignment.'" >';
		
		if( is_nav_menu( $apress_primary_menu ) ) :
		
		wp_nav_menu(  
			array(  
				'theme_location'  	=> 'primary-nav', 
				'menu'           	=> $apress_primary_menu,
				'container'       	=> false,            
				'container_id'    	=> 'main-nav',
				'container_class' 	=> '',  
				'menu_class' 	  	=> 'nav zolo-navbar-nav',
				'items_wrap'      	=> '<ul class="%2$s" '. $menu_typo_options['style'].'>%3$s</ul>',
				'menu_id'         	=> 'primary' ,
				'fallback_cb'       => 'ZOLOCoreFrontendWalker::fallback',
				'link_before'    	=> '<span class="menu-text">',
				'link_after'    	=> '</span>',
				'walker'    		=> new ZOLOCoreFrontendWalker()
			)
		);  
		
		else:

			wp_nav_menu( array(
				'container'       	=> false,            
				'container_id'    	=> 'main-nav',  
				'container_class' 	=> '',  
				'menu_class' 	  	=> 'nav zolo-navbar-nav',
				'items_wrap'      	=> '<ul id="%1$s" class="%2$s" '. $menu_typo_options['style'].'>%3$s</ul>',
				'fallback_cb'       => 'ZOLOCoreFrontendWalker::fallback',
				'link_before'    	=> '<span class="menu-text">',
				'link_after'    	=> '</span>',
				'walker'    		=> new ZOLOCoreFrontendWalker()
			));
	
		endif;
		
		echo '</nav>';
		echo '</div>';
	 ?>
    

<?php 
	$shortcode_css = '';
	
	$menu_item_padding_top = !empty($menu_item_padding_top) ? $menu_item_padding_top : '0';
	$menu_item_padding_right = !empty($menu_item_padding_right) ? $menu_item_padding_right : '0';
	$menu_item_padding_bottom = !empty($menu_item_padding_bottom) ? $menu_item_padding_bottom : '0';
	$menu_item_padding_left = !empty($menu_item_padding_left) ? $menu_item_padding_left : '0';
	
	$menu_item_margin_top = !empty($menu_item_margin_top) ? $menu_item_margin_top : '0';
	$menu_item_margin_right = !empty($menu_item_margin_right) ? $menu_item_margin_right : '0';
	$menu_item_margin_bottom = !empty($menu_item_margin_bottom) ? $menu_item_margin_bottom : '0';
	$menu_item_margin_left = !empty($menu_item_margin_left) ? $menu_item_margin_left : '0';
	
	
	if($menu_separator == 'yes'){
	$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > li:after{background:'.$menu_separator_color.'; width: 1px; height:'.$menu_separator_height.'px; content: ""; position: absolute; right:-1px; top:50%;transform: translateY(-50%);-moz-transform: translateY(-50%);-webkit-transform: translateY(-50%);}';
	$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > li:last-child:after{display: none;}';
	}
	
	$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li > a{color:'.$menu_color.'; padding:'.$menu_item_padding_top.'px '.$menu_item_padding_right.'px '.$menu_item_padding_bottom.'px '.$menu_item_padding_left.'px;}';
	
	$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li{padding:'.$menu_item_margin_top.'px 0px '.$menu_item_margin_bottom.'px 0px;}';
	$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li{margin:0px '.$menu_item_margin_right.'px 0px '.$menu_item_margin_left.'px;}';
	
	$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu > li > a.current,.'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current-menu-ancestor > a,.'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current_page_item > a, .'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current-menu-item > a,.'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current-menu-parent > a, .'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li:hover > a{color:'.$menu_hover_color.';}';
	
$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu .zolo-navbar-nav{text-transform:'.$menu_text_transform.';}';
	
if($hover_style == 'menu_hover_style2'){
	
	$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu > li > a.current,.'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current-menu-ancestor > a,.'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current_page_item > a, .'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current-menu-item > a,.'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current-menu-parent > a, .'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li:hover > a{background:'.$menu_hover_bg_color.';}';

if($menu_hover_bg_radius != ''){
	$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li > a{
-moz-border-radius:'.$menu_hover_bg_radius.'px; 
-webkit-border-radius:'.$menu_hover_bg_radius.'px; 
-ms-border-radius:'.$menu_hover_bg_radius.'px;
border-radius:'.$menu_hover_bg_radius.'px;
	}';
}


}else if($hover_style == 'menu_hover_style3' || $hover_style == 'menu_hover_style4' || $hover_style == 'menu_hover_style5' || $hover_style == 'menu_hover_style6' || $hover_style == 'menu_hover_style7' || $hover_style == 'menu_hover_style8'){
	
	$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li > a:after{border-color:'.$menu_hover_border_color.';}';
	$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li > a:before{border-color:'.$menu_hover_border_color.';}';
	
	}
	
if($hover_style == 'menu_hover_style3' || $hover_style == 'menu_hover_style4' || $hover_style == 'menu_hover_style5' || $hover_style == 'menu_hover_style7'){
	
	$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li > a:after{border-bottom-width:'.$menu_border_width.'px;border-top-width:'.$menu_border_width.'px;}';
	
	}

if($hover_style == 'menu_hover_style6'){
	
	$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li > a:before{border-width: '.$menu_border_width.'px 0 '.$menu_border_width.'px 0;}';
	$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li > a:after{border-width: 0 '.$menu_border_width.'px 0 '.$menu_border_width.'px;}';

	
	}
if($hover_style == 'menu_hover_style8'){
	
	$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li > a:after,.'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li > a:before{border-bottom-width:'.$menu_border_width.'px;}';
	
	}

if($hover_style == 'menu_hover_style9'){
	
	$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li:hover > a:after,
	.'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current-menu-parent > a:after,
	.'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current-menu-item > a:after,
	.'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current_page_item > a:after,
	.'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current-menu-ancestor > a:after,
	.'.$zolo_primary_menu_id.' .zolo_header_primary_menu > li > a.current:after{text-shadow: 10px 0 '.$menu_hover_color.', -10px 0 '.$menu_hover_color.';
	color: '.$menu_hover_color.';}';
	
	}
	
if($hover_style == 'menu_hover_style10'){
	
	$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li > a:after,
	.'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li > a:before{border-color:'.$menu_hover_color.';}';
	
	}
if($hover_style == 'menu_hover_style12'){
	
	$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li > a:after{background-color:'.$menu_hover_color.';}';
	
	}	
	
	

// Dropdown Menu
if(substr_count($dropdown_box_shadow, 'disable') == 0) {
	$dropdown_box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($dropdown_box_shadow);
}

$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul li ul.sub-menu,
.'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul li div.zolo-megamenu-wrapper{text-align:'.$dropdown_menu_alignment.'; text-transform:'.$dropdown_menu_text_transform.'; font-weight:'.$dropdown_menu_font_weight.'; font-style:'.$dropdown_menu_font_style.';}';

$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul li ul.sub-menu{background:'.$dropdown_bg_color.';width:'.$dropdown_width.'px; -moz-border-radius:'.$dropdown_border_radius.'px; -webkit-border-radius:'.$dropdown_border_radius.'px; -ms-border-radius:'.$dropdown_border_radius.'px;border-radius:'.$dropdown_border_radius.'px; padding:'.$dropdown_padding_top.'px '.$dropdown_padding_right.'px '.$dropdown_padding_bottom.'px '.$dropdown_padding_left.'px; '.$dropdown_box_shadow.'}';

$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul li div.zolo-megamenu-wrapper{-moz-border-radius:'.$dropdown_border_radius.'px; -webkit-border-radius:'.$dropdown_border_radius.'px; -ms-border-radius:'.$dropdown_border_radius.'px;border-radius:'.$dropdown_border_radius.'px;'.$dropdown_box_shadow.'}';

$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul li div.zolo-megamenu-wrapper .zolo-megamenu-holder{background:'.$dropdown_bg_color.';}';

$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu .zolo-megamenu-wrapper .zolo-megamenu-submenu{padding:'.$dropdown_padding_top.'px 0px '.$dropdown_padding_bottom.'px 0px;}';

$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul ul.sub-menu li > a{padding:'.$dropdown_item_padding_top.'px '.$dropdown_item_padding_right.'px '.$dropdown_item_padding_bottom.'px '.$dropdown_item_padding_left.'px;}';

$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu .zolo-megamenu-wrapper div.zolo-megamenu-title{padding:'.$dropdown_item_padding_top.'px '.$dropdown_item_padding_right.'px '.$dropdown_item_padding_bottom.'px '.$dropdown_item_padding_left.'px;}';

if($dropdown_menu_font_size != ''){
	$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul ul.sub-menu li > a{font-size:'.$dropdown_menu_font_size.'px;}';
	}


if($dropdown_padding_top == '' || $dropdown_padding_top == '0'){

$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul li ul.sub-menu li:first-child > a{ 
-moz-border-top-left-radius:'.$dropdown_border_radius.'px; 
-webkit-border-top-left-radius:'.$dropdown_border_radius.'px; 
-ms-border-top-left-radius:'.$dropdown_border_radius.'px;
border-top-left-radius:'.$dropdown_border_radius.'px; 
-moz-border-top-right-radius:'.$dropdown_border_radius.'px; 
-webkit-border-top-right-radius:'.$dropdown_border_radius.'px; 
-ms-border-top-right-radius:'.$dropdown_border_radius.'px;
border-top-right-radius:'.$dropdown_border_radius.'px;
}';
}

if($dropdown_padding_bottom == '' || $dropdown_padding_bottom == '0'){
$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul li ul.sub-menu li:last-child > a{ 
-moz-border-bottom-left-radius:'.$dropdown_border_radius.'px; 
-webkit-border-bottom-left-radius:'.$dropdown_border_radius.'px; 
-ms-border-bottom-left-radius:'.$dropdown_border_radius.'px;
border-bottom-left-radius:'.$dropdown_border_radius.'px; 
-moz-border-bottom-right-radius:'.$dropdown_border_radius.'px; 
-webkit-border-bottom-right-radius:'.$dropdown_border_radius.'px; 
-ms-border-bottom-right-radius:'.$dropdown_border_radius.'px;
border-bottom-right-radius:'.$dropdown_border_radius.'px;
}';
}

$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu .zolo-megamenu-wrapper div.zolo-megamenu-title a,
.'.$zolo_primary_menu_id.' .zolo_header_primary_menu .zolo-megamenu-wrapper div.zolo-megamenu-title{color:'.$dropdown_menu_color.';}';	
$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul ul.sub-menu li a{color:'.$dropdown_menu_color.';border-top:1px solid '.$dropdown_item_border_color.';}';	
$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul ul.sub-menu li > a:hover,
.'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul ul.sub-menu li.current-menu-item > a,
.'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul ul.sub-menu li.current_page_item > a{color:'.$dropdown_menu_hover_color.';}';

if($dropdown_hover_style == 'background_style'){
	
$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu.background_style ul ul.sub-menu li > a:hover,
.'.$zolo_primary_menu_id.' .zolo_header_primary_menu.background_style ul ul.sub-menu li.current-menu-item > a,
.'.$zolo_primary_menu_id.' .zolo_header_primary_menu.background_style ul ul.sub-menu li.current_page_item > a{background:'.$dropdown_menu_hover_bg_color.';}';
$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul ul.sub-menu li > a .menu-text:after{display:none;}';

}else if($dropdown_hover_style == 'underline_style'){
	
$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu.underline_style ul ul.sub-menu li > a .menu-text:after{background-color:'.$dropdown_menu_hover_underline_color.';}';

}

$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu .zolo-megamenu-wrapper ul.sub-menu li a{border-top:1px solid '.$dropdown_item_border_color.'!important;}';	
$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu .zolo-megamenu-wrapper .zolo-megamenu-submenu{border-right-color:'.$dropdown_item_border_color.'!important;}';	
// Dropdown Menu


if($vertical_menu_max_width == '' ){
		$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu.vertical > ul{width:auto;}';	
	}else{
		$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu.vertical > ul{width:'.$vertical_menu_max_width.'px;}';	
		}
$shortcode_css .= '.'.$zolo_primary_menu_id.' .zolo_header_primary_menu.vertical > ul > li{text-align:'.$vertical_menu_alignment.';}';	


if($mobile_menu_active == 'yes'){
	
$shortcode_css .= '.menu_'.$uniqid.'.header_element_mobile_menu_active .header_element_mobile_menu_canvas{max-width:'.$mobile_menu_canvas_width.'px;background:'.$mobile_menu_canvas_background_color.';color:'.$mobile_menu_color.';}';

$shortcode_css .= '.menu_'.$uniqid.'.header_element_mobile_menu_active .header_element_mobile_menu_canvas{' . esc_js(Zolo_Param_Padding::paddings_css($mobile_menu_canvas_padding)) . '}';
$shortcode_css .= '.menu_'.$uniqid.'.header_element_mobile_menu_active .header_element_mobile_menu_canvas .mobile-nav ul li a{' . esc_js(Zolo_Param_Padding::paddings_css($mobile_menu_padding)) . ';color:'.$mobile_menu_color.';}';

$shortcode_css .= '.menu_'.$uniqid.'.header_element_mobile_menu_active .header_element_mobile_menu_canvas .mobile-nav ul li a:hover,
.menu_'.$uniqid.'.header_element_mobile_menu_active .header_element_mobile_menu_canvas .mobile-nav ul li.mobile-current-nav-item>a{color:'.$mobile_menu_hover_color.';background:'.$mobile_menu_active_background_color.';}';
$shortcode_css .= '.menu_'.$uniqid.'.header_element_mobile_menu_active .header_element_mobile_menu_canvas a{color:'.$mobile_menu_color.';}';
$shortcode_css .= '.menu_'.$uniqid.'.header_element_mobile_menu_active .header_element_mobile_menu_canvas a:hover{color:'.$mobile_menu_hover_color.';}';

$shortcode_css .= '.menu_'.$uniqid.'.header_element_mobile_menu_active .zolo_header_hamburger_bar{background:'.$mobile_nav_icon_color.';}';

}

echo '<style>'.$shortcode_css.'</style>';
//apcore_save_plugin_dyn_styles( $shortcode_css );
?>
<!--Menu area Start--> 

<?php if($mobile_menu_active == 'yes'){?>

<div class="header_element_mobile_menu_content">
<span  class="zolo_mobile_menu_icon">
<span class="zolo_header_hamburger_menu hamburger_menu_style1">
<span class="zolo_header_hamburger_bar zolo_header_hamburger_bar1"></span>
<span class="zolo_header_hamburger_bar zolo_header_hamburger_bar2"></span>
<span class="zolo_header_hamburger_bar zolo_header_hamburger_bar3"></span>
</span>
</span> 
<!--Menu area End--> 
<div class="hamburger_extended_sidebar_mask"></div>
<div class="zolo_mobile_navigation_menu header_element_mobile_menu_canvas">
<a class="zolo_mobile_primary_close_button">Close</a>
  <div class="mobile-nav">
    <div class="mobile-nav-holder main-menu"></div>
  </div>
</div>
</div>
<?php }?>

</div>


