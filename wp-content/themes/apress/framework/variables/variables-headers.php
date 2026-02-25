<?php
// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
    die;
}
global $apress_data;
$cur_id = is_search() ? '' : apress_theme_current_page_id(); 

// Header show and hide

$display_header_to = isset($apress_data["display_header"]) ? $apress_data["display_header"] : 'on';
$header_builder_to = isset($apress_data["header_builder"]) ? $apress_data["header_builder"] : 'default';
$header_builder_page_id_to = (!empty($apress_data["header_builder_template"])) ? $apress_data["header_builder_template"] : '';

$display_header_po = get_post_meta( $cur_id, 'zt_header_display', true ); 
$header_builder_po = get_post_meta( $cur_id, 'zt_header_builder', true ); 
$header_builder_page_id_po = get_post_meta( $cur_id, 'zt_header_builder_template', true ); 


// Theme panel Option
$header_position = isset($apress_data["header_position"]) ? $apress_data["header_position"] : 'Top';
$header_type = isset($apress_data["header_layout"]) ? $apress_data["header_layout"] : 'v1';

$page_slider_pos  = get_post_meta($cur_id, 'zt_page_slider_pos', true ); 
$page_slider_type = get_post_meta($cur_id, 'zt_page_slider_type', true ); 

$enable_onepage = isset($apress_data["enable_onepage"]) ? $apress_data["enable_onepage"] : 'off';

$onepage_home = $enable_onepage == 'on' ? 'onepage_home' : '';
		
$custom_header_dragdrop = isset($apress_data["custom_header_dragdrop"]) ? $apress_data["custom_header_dragdrop"] : 'preset';	
$left_right_slider_screen = isset($apress_data["left_right_slider_screen"]) ? $apress_data["left_right_slider_screen"] : 'full_screen_slider';	


//Header Sticky Code Start
$header_sticky_opt = isset($apress_data["header_sticky_opt"]) ? $apress_data["header_sticky_opt"] : 'on';
$mobile_header_multilingual = isset($apress_data["mobile_header_multilingual"]) ? $apress_data["mobile_header_multilingual"] : 'on';

$mobile_header_search_icon_show_hide = isset($apress_data["mobile_header_search_icon_show_hide"]) ? $apress_data["mobile_header_search_icon_show_hide"] : 'on';
$mobile_header_cart_show_hide = isset($apress_data["mobile_header_cart_show_hide"]) ? $apress_data["mobile_header_cart_show_hide"] : 'on';

$header_sticky_display = isset($apress_data["header_sticky_display"]) ? $apress_data["header_sticky_display"] : 'section2';
$top_search_design = isset($apress_data["search_design"]) ? $apress_data["search_design"] : 'full_screen_search_but';

$zolo_header_sticky = $header_sticky_opt ? 'zolo_header_sticky' : '';
	
//Header Sticky Code End
// Mobile Header
$mobile_menu_design = isset($apress_data["mobile_menu_design"]) ? $apress_data["mobile_menu_design"] : 'compact';
$mobile_header_sticky_show_hide = isset($apress_data["mobile_header_sticky_show_hide"]) ? $apress_data["mobile_header_sticky_show_hide"] : 'off';
$mobile_header_top_bar_show_hide = isset($apress_data["mobile_header_top_bar_show_hide"]) ? $apress_data["mobile_header_top_bar_show_hide"] : 'off';
$mobile_header_logo_showhide = isset($apress_data["mobile_header_logo_showhide"]) ? $apress_data["mobile_header_logo_showhide"] : 'off';
$logo_url = isset($apress_data['logo']['url']) ? $apress_data['logo']['url'] :'';


$header_phone_number = isset($apress_data['header_phone_number']) ? $apress_data['header_phone_number'] : '+1.208.567.1234';
$header_fax_number = isset($apress_data['header_fax_number']) ? $apress_data['header_fax_number'] : '+44-208-1234567';
$header_email = isset($apress_data['header_email']) ? $apress_data['header_email'] : 'admin@yoursite.com';
$header_tagline = isset($apress_data['header_tagline']) ? $apress_data['header_tagline'] : 'Insert Tagline Here';

$mobile_special_button_show_hide = isset($apress_data["mobile_special_button_show_hide"]) ? $apress_data["mobile_special_button_show_hide"] : 'off';
$mobile_special_button2_show_hide = isset($apress_data["mobile_special_button2_show_hide"]) ? $apress_data["mobile_special_button2_show_hide"] : 'off';

$mobile_header_button_color_scheme = isset($apress_data["mobile_header_special_button_color_scheme"]) ? $apress_data["mobile_header_special_button_color_scheme"] : 'default';
$mobile_header_button2_color_scheme = isset($apress_data["mobile_header_special_button2_color_scheme"]) ? $apress_data["mobile_header_special_button2_color_scheme"] : 'default';

$section2_border_style_width = isset($apress_data["section2_border_style_width"]) ? $apress_data["section2_border_style_width"] : 'border_style_full_width';

$multilingual_code = isset($apress_data["multilingual_code"]) ? $apress_data["multilingual_code"] : '';


// Header Show/hide
if($display_header_po == 'default' || $display_header_po == ''){
	
		$header_show_hide = $display_header_to == 'on' ? 'yes' : 'no';	
		$header_builder_type = $header_builder_to;
		$header_builder_page_id = $header_builder_page_id_to;		
			
}else if($display_header_po == 'yes'  || $display_header_po == 'no'){

	$header_show_hide = $display_header_po == 'yes' ? 'yes' : 'no';	
	$header_builder_type = $header_builder_to;
	$header_builder_page_id = $header_builder_page_id_po;		

} else {

	$header_show_hide = $display_header_to == 'yes' ? 'yes' : 'no';	
	$header_builder_type = $header_builder_to;
	$header_builder_page_id = $header_builder_page_id_to;			
}

// Sticky header
if($header_sticky_opt == 'on'){
	if($header_sticky_display == 'section2' || $header_sticky_display == 'section3' || $header_sticky_display == 'section2_3'){
		$header_sticky_wrapper_start = '<div class="sticky_header_wrapper"><div class="sticky_header fadeInDown">';
		$header_sticky_wrapper_end = '</div></div>';
	}else{
		$header_sticky_wrapper_start = $header_sticky_wrapper_end = '';
		}
}else{
	$header_sticky_wrapper_start = $header_sticky_wrapper_end = '';
}		