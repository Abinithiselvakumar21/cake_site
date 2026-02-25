<?php 
/*-----------------------------------------------------------------------------------*/
/* Gradient Icon Box
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$social_profiles = $website_name = '';

extract( shortcode_atts( array(
	'style'							=> 'social_style1',
	'orientation'					=> 'horizontal',
	'values'						=> '',
	'website_name'					=> '',
	'website_url'					=> '',
	'color_scheme'					=> 'brand_color',
	'color_scheme2'					=> 'brand_color',
	'icon_color'					=> '#ffffff',
	'icon_hover_color'				=> '#ffffff',
	'icon_bg_color'					=> '#34a6ff',
	'icon_hover_bg_color'			=> '#34a6ff',
	'icon_color2'					=> '#34a6ff',
	'icon_hover_color2'				=> '#34a6ff',
	'icon_border_color2'			=> '#34a6ff',
	'icon_hover_border_color2'		=> '#34a6ff',
	'style6_icon_bg_color'			=> '#ffffff',
	'style7_icon_color'				=> '#333',
	'icon_hover_style'				=> 'social_hover_none',
	'icon_size'						=> '20',
	'box_shadow'					=> 'box_shadow_enable:enable|shadow_horizontal:0|shadow_vertical:5|shadow_blur:15|shadow_spread:-5|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
	'box_hover_shadow'				=> 'box_shadow_enable:enable|shadow_horizontal:0|shadow_vertical:5|shadow_blur:20|shadow_spread:-5|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
	'show_item_in_side_panel'		=> 'disable',
	'side_panel_alignment'			=> 'right',
	'side_panel_vertical_alignment'	=> 'middle',
	'side_panel_top_offset'			=> '20px',
	'side_panel_middle_offset'		=> '50%',
	'side_panel_bottom_offset'		=> '20px',
	'side_panel_left_offset'		=> '0px',
	'side_panel_right_offset'		=> '0px',
	'hide_under_screen_size'		=> '',
	'enable_title'					=> '',
	'title_text'					=> '',
	'title_font_options'			=> '',
	'title_google_fonts'			=> '',
	'title_custom_fonts'			=> '',
	'class'							=> '',
	'data_animation'				=> 'No Animation',
	'data_delay'					=> '500',
	
), $atts ) );
			
	//Animation
	if($data_animation == 'No Animation'){
		$animatedclass = 'noanimation';
	}else{
		$animatedclass = 'animated hiding';
	}
	
	if($show_item_in_side_panel == 'enable'){
		$show_item_in_side_panel_class = 'show_item_in_side_panel_enable';
		}else{
			$show_item_in_side_panel_class = '';
			}
			
	$color_scheme_class = '';
	if($style == 'social_style1'){
		
			if($color_scheme == 'brand_color'){
					$color_scheme_class = 'brand_text_color';
				}else{
					$color_scheme_class = $color_scheme;
					}
					
		}else if($style == 'social_style2' || $style == 'social_style3' || $style == 'social_style4'){
			
			$color_scheme_class = $color_scheme;
			
		}else if($style == 'social_style5'){
			
			if($color_scheme == 'brand_color'){
				$color_scheme_class = 'brand_text_color brand_border_color';
			}else{
				$color_scheme_class = $color_scheme;
				}
			
			}
	
	
	if($color_scheme == 'design_your_own'){
		$key = '';
	}else{
		$key = $color_scheme;
	}
	$color_scheme_css = apcore_shortcodes_text_color_scheme($key);
	$color_scheme_bg_css = apcore_shortcodes_background_color_scheme($key);


	$uniqid = uniqid(rand());
	$zolo_social_icon_id = 'zolo_social_icon_'.$uniqid;
	
	
	$values = (array) vc_param_group_parse_atts( $values );
	$item_data = array();
	$counter = 0;
	
	
	$enable_title_class = '';
	if($enable_title == 'yes' && $orientation == 'horizontal'){
		$enable_title_class = 'zolo_header_social_title_active';
	}
	if (!empty($title_text)) {
		$title_options = _zolo_parse_text_shortcode_params($title_font_options, '', $title_google_fonts, $title_custom_fonts);
	}
	
	echo '<div class="header_module_wrapper"><ul id="'.$zolo_social_icon_id.'" class="zolo_header_social_icon zolo_social_icon '.$style.' '.$orientation.' '.$color_scheme_class.' '.$icon_hover_style.' '.$class.' '.$animatedclass.' '.$show_item_in_side_panel_class.' '.$side_panel_alignment.' '.$side_panel_vertical_alignment.' '.$enable_title_class.'" data-animation = "'.$data_animation.'" data-delay = "'.$data_delay.'">';
	
    if($enable_title == 'yes' && $orientation == 'horizontal'){
    	echo '<li class="zolo_header_social_title" '.$title_options['style'].'>'.$title_text.'</li>';
    }
    
	foreach ( $values as $data ) {
	    $new_data = $data;
	    $new_data_website_name = isset( $data['website_name'] ) ? $data['website_name'] : 'ap-behance1';
		$new_data_website_url = isset( $data['website_url'] ) ? $data['website_url'] : '';
		
		if($icon_hover_style == 'social_hover_scroll'){
				echo '<li><a href="'.$new_data_website_url.'" target="_blank"><span><i class="fa '.$new_data_website_name.'"></i><i class="social_hover_scroll_icon fa '.$new_data_website_name.'"></i></span></a></li>';
			}else{
				echo '<li><a href="'.$new_data_website_url.'" target="_blank"><span><i class="fa '.$new_data_website_name.'"></i></span></a></li>';
				}
		
		
		$counter++;
	}
	echo '</ul></div>';


	if(substr_count($box_shadow, 'disable') == 0) {
		$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
	}
	if(substr_count($box_hover_shadow, 'disable') == 0) {
		$box_hover_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_hover_shadow);
	}

	$shortcode_css = '';
	$shortcode_css .= '#'.$zolo_social_icon_id.'.zolo_header_social_icon li a i{font-size:'.$icon_size.'px;}';
	
	if($style != 'social_style1'){
	$shortcode_css .= '#'.$zolo_social_icon_id.'.zolo_header_social_icon li a{'.$box_shadow.'}';
	$shortcode_css .= '#'.$zolo_social_icon_id.'.zolo_header_social_icon li a:hover{'.$box_hover_shadow.'}';
	}
	
	if($style == 'social_style6'){
	$shortcode_css .= '#'.$zolo_social_icon_id.'.zolo_header_social_icon li a i,#'.$zolo_social_icon_id.'.zolo_header_social_icon li a{background:'.$style6_icon_bg_color.'}';
	}
	
	if($style == 'social_style7'){
	$shortcode_css .= '#'.$zolo_social_icon_id.'.zolo_header_social_icon li a{background:'.$style6_icon_bg_color.'; color:'.$style7_icon_color.';}';
	}
	
	
	if($color_scheme != 'brand_color'){
	if($style == 'social_style1'){
		
		if($color_scheme == 'design_your_own'){
	
			$shortcode_css .= '#'.$zolo_social_icon_id.'.zolo_header_social_icon li a i{color:'.$icon_color.';}';
			$shortcode_css .= '#'.$zolo_social_icon_id.'.zolo_header_social_icon li a:hover i{color:'.$icon_hover_color.';}';
			
			}else{
				
			$shortcode_css .= '#'.$zolo_social_icon_id.'.zolo_header_social_icon li a i{'.$color_scheme_css.'}';
			
			}
		
	}else if($style == 'social_style2' || $style == 'social_style3' || $style == 'social_style4'){
	
		if($color_scheme == 'design_your_own'){
			$shortcode_css .= '#'.$zolo_social_icon_id.'.zolo_header_social_icon li a i{background:'.$icon_bg_color.';}';
			$shortcode_css .= '#'.$zolo_social_icon_id.'.zolo_header_social_icon li a:hover i{background:'.$icon_hover_bg_color.';}';
			$shortcode_css .= '#'.$zolo_social_icon_id.'.zolo_header_social_icon li a i{color:'.$icon_color.';}';
			$shortcode_css .= '#'.$zolo_social_icon_id.'.zolo_header_social_icon li a:hover i{color:'.$icon_hover_color.';}';
			
			}else{
				
			$shortcode_css .= '#'.$zolo_social_icon_id.'.zolo_header_social_icon li a i{'.$color_scheme_bg_css.'}';
			$shortcode_css .= '#'.$zolo_social_icon_id.'.zolo_header_social_icon li a i{ color:#fff;}';
			
			}
		
		}
		
	}
		
		
	if($color_scheme2 != 'brand_color'){
		
		if($style == 'social_style5'){
			
			if($color_scheme2 == 'design_your_own'){
	
			$shortcode_css .= '#'.$zolo_social_icon_id.'.zolo_header_social_icon li a i{border:1px solid '.$icon_border_color2.';color:'.$icon_color2.';}';
			$shortcode_css .= '#'.$zolo_social_icon_id.'.zolo_header_social_icon li a:hover i{color:'.$icon_hover_color2.';border:1px solid '.$icon_hover_border_color2.';}';
			
			}
		}
		
	}
if($show_item_in_side_panel == 'enable'){
	
	if($side_panel_alignment == 'right'){
		$shortcode_css .= '#'.$zolo_social_icon_id.'.zolo_header_social_icon.show_item_in_side_panel_enable{right:'.$side_panel_right_offset.';}';
	}else{
		$shortcode_css .= '#'.$zolo_social_icon_id.'.zolo_header_social_icon.show_item_in_side_panel_enable{left:'.$side_panel_left_offset.';}';
	}
	
	if($side_panel_vertical_alignment == 'top'){
		$shortcode_css .= '#'.$zolo_social_icon_id.'.zolo_header_social_icon.show_item_in_side_panel_enable{top:'.$side_panel_top_offset.';}';

	}else if($side_panel_vertical_alignment == 'middle'){
		$shortcode_css .= '#'.$zolo_social_icon_id.'.zolo_header_social_icon.show_item_in_side_panel_enable{top:'.$side_panel_middle_offset.';}';
	
	}else if($side_panel_vertical_alignment == 'bottom'){
		$shortcode_css .= '#'.$zolo_social_icon_id.'.zolo_header_social_icon.show_item_in_side_panel_enable{bottom:'.$side_panel_bottom_offset.';top: auto;}';
	}
if($hide_under_screen_size != ''){
$shortcode_css .= '@media (max-width:'.$hide_under_screen_size.'px) {#'.$zolo_social_icon_id.'.zolo_header_social_icon.show_item_in_side_panel_enable{display: none;} }';
}

}


//apcore_save_plugin_dyn_styles( $shortcode_css );
echo '<style>'.$shortcode_css.'</style>';