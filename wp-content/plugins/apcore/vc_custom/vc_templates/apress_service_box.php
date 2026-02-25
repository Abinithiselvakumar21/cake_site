<?php 
/*-----------------------------------------------------------------------------------*/
/* Pricing List
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }

extract(shortcode_atts(array(
			'style'								=> 'style1',
			'image'								=> '',
			'box_title'							=> 'Your Title',
			'box_description'					=> 'Description area',
			'image2'							=> '',
			'box_swing'							=> 'no',
			'box_background_color'				=> '#ffffff',
			'border_radius'						=> '0',
			'box_shadow'						=> 'box_shadow_enable:disable|shadow_horizontal:0|shadow_vertical:2|shadow_blur:10|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
			'box_hover_shadow'					=> 'box_shadow_enable:enable|shadow_horizontal:0|shadow_vertical:7|shadow_blur:15|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
			'height_type'						=> 'auto_height',
			'min_height'						=> '300',
			'box_top_padding'					=> '30px',
			'box_right_padding'					=> '40px',
			'box_bottom_padding'				=> '40px',
			'box_left_padding'					=> '40px',
			'title_font_options'				=> '',
			'title_google_fonts'				=> '',
			'title_custom_fonts'				=> '',
			'description_font_options'			=> '',
			'description_google_fonts'			=> '',
			'description_custom_fonts'			=> '',
			
			'button1_enable'						=> 'yes',
			'button1_shape'							=> 'square',
			'button1_text'							=> 'Button',
			'button1_link'							=> '',
			'button1_border_color_for_style5'		=> '#e5e5e5',
			'button1_hover_border_color_for_style5'	=> '#549ffc',
			'button1_color_scheme'					=> 'default_button_color_scheme',
			'button1_border_height_for_style4'		=> '2',
			'button1_border_color_for_style4'		=> '#e5e5e5',
			'button1_color_scheme2'					=> 'default_button_color_scheme',
			'button1_bg_color'						=> '#5295ea',
			'button1_bg_color_h'					=> '#418aea',
			'button1_border_color'					=> '#5295ea',
			'button1_border_color_h'				=> '#418aea',
			'button1_hover_style'					=> 'hoverstyle1',
			'button1_size'							=> 'small',
			'button1_padding_top_bottom'			=> '15',
			'button1_padding_right_left'			=> '25',
			'button1_padding_top_bottom_for_style4'	=> '12',
			'button1_shadow'						=> 'box_shadow_enable:enable|shadow_horizontal:1|shadow_vertical:2|shadow_blur:4|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
			'button1_hover_shadow'					=> 'box_shadow_enable:enable|shadow_horizontal:2|shadow_vertical:2|shadow_blur:7|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
			'button1_icon_enable'					=> 'yes',
			'button1_icon_family'					=> 'fontawesome',
			'button1_icon_fontawesome'				=> 'fas fa-long-arrow-alt-right',
			'button1_icon_openiconic'				=> 'vc-oi vc-oi-dial',
			'button1_icon_typicons'					=> 'typcn typcn-adjust-brightness',
			'button1_icon_entypo'					=> 'entypo-icon entypo-icon-note',
			'button1_icon_linecons'					=> 'vc_li vc_li-heart',
			'button1_icon_monosocial'				=> 'vc-mono vc-mono-fivehundredpx',
			'button1_icon_linea'					=> 'icon-basic-heart',
			'button1_icon_size'						=> '16',
			'button1_icon_color'					=> '#333333',
			'button1_icon_hover_color'				=> '#ffffff',
			'button1_icon_bg_color_show'			=> 'no',
			'button1_icon_bg_color_for_style6'		=> '#e5e5e5',
			'button1_icon_hover_bg_color_for_style6'=> '#549ffc',
			'button1_icon_alignment'				=> 'right',
			'button1_font_options'					=> '',
			'button1_google_fonts'					=> '',
			'button1_custom_fonts'					=> '',
			'button1_text_color'					=> '',
			'button1_text_color_h'					=> '',

			'button2_enable'						=> 'yes',
			'button2_shape'							=> 'square',
			'button2_text'							=> 'Button',
			'button2_link'							=> '',
			'button2_border_color_for_style5'		=> '#e5e5e5',
			'button2_hover_border_color_for_style5'	=> '#549ffc',
			'button2_color_scheme'					=> 'default_button_color_scheme',
			'button2_border_height_for_style4'		=> '2',
			'button2_border_color_for_style4'		=> '#e5e5e5',
			'button2_color_scheme2'					=> 'default_button_color_scheme',
			'button2_bg_color'						=> '#5295ea',
			'button2_bg_color_h'					=> '#418aea',
			'button2_border_color'					=> '#5295ea',
			'button2_border_color_h'				=> '#418aea',
			'button2_hover_style'					=> 'hoverstyle1',
			'button2_size'							=> 'small',
			'button2_padding_top_bottom'			=> '15',
			'button2_padding_right_left'			=> '25',
			'button2_padding_top_bottom_for_style4'	=> '12',
			'button2_shadow'						=> 'box_shadow_enable:enable|shadow_horizontal:1|shadow_vertical:2|shadow_blur:4|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
			'button2_hover_shadow'					=> 'box_shadow_enable:enable|shadow_horizontal:2|shadow_vertical:2|shadow_blur:7|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
			'button2_icon_enable'					=> 'yes',
			'button2_icon_family'					=> 'fontawesome',
			'button2_icon_fontawesome'				=> 'fas fa-long-arrow-alt-right',
			'button2_icon_openiconic'				=> 'vc-oi vc-oi-dial',
			'button2_icon_typicons'					=> 'typcn typcn-adjust-brightness',
			'button2_icon_entypo'					=> 'entypo-icon entypo-icon-note',
			'button2_icon_linecons'					=> 'vc_li vc_li-heart',
			'button2_icon_monosocial'				=> 'vc-mono vc-mono-fivehundredpx',
			'button2_icon_linea'					=> 'icon-basic-heart',
			'button2_icon_size'						=> '16',
			'button2_icon_color'					=> '#333333',
			'button2_icon_hover_color'				=> '#ffffff',
			'button2_icon_bg_color_show'			=> 'no',
			'button2_icon_bg_color_for_style6'		=> '#e5e5e5',
			'button2_icon_hover_bg_color_for_style6'=> '#549ffc',
			'button2_icon_alignment'				=> 'right',
			'button2_font_options'					=> '',
			'button2_google_fonts'					=> '',
			'button2_custom_fonts'					=> '',
			'button2_text_color'					=> '',
			'button2_text_color_h'					=> '',
			
			'class' 								=> '',
			'data_animation'						=> 'No Animation',
			'data_delay'							=> '500',			
	), $atts));
	
	//Animation
	if($data_animation == 'No Animation'){
		$animatedclass = 'noanimation';
	}else{
		$animatedclass = 'animated hiding';
	}
	
$wrap_class = array();	

$title_html = $description_html = '';

$uniqid = uniqid(rand());
$zolo_service_box_element_id = 'zolo_service_box_element_'.$uniqid;
	
$wrap_class[] = 'zolo_service_box_element';
$wrap_class[] = 'zolo_service_box_element_'.$style;
$wrap_class[] = $animatedclass;
$wrap_class[] = $class;


// 1st Button Code Start
if($button1_enable == 'yes'){
//icon
switch($button1_icon_family) {
	case 'fontawesome':
		$button1_icon = $button1_icon_fontawesome;
		break; 
	case 'openiconic':
		$button1_icon = $button1_icon_openiconic;
		break;
	case 'typicons':
		$button1_icon = $button1_icon_typicons;
		break;
	case 'entypo':
		$button1_icon = $button1_icon_entypo;
		break;
	case 'linecons':
		$button1_icon = $button1_icon_linecons;
		break;
	case 'monosocial':
		$button1_icon = $button1_icon_monosocial;
		break;
	case 'linea':
		$button1_icon = $button1_icon_linea;
		break;	
	case 'default_arrow':
		$button1_icon = 'icon-button-arrow';
		break;
	default:
		$button1_icon = '';
		break;
}
if(!empty($button1_icon_family) && $button1_icon_family != 'none') {
	$circle_icon = $button1_icon;
} 
else {
	$circle_icon = null;
}
// Enqueue needed icon font.
vc_icon_element_fonts_enqueue( $button1_icon_family );

//regular(grad) linea
if(!empty($button1_icon_family) && $button1_icon_family == 'linea') {
	wp_enqueue_style('zt-linea'); 
}

if(substr_count($button1_shadow, 'disable') == 0) {
	$button1_shadow = Zolo_Box_Shadow_Param::box_shadow_css($button1_shadow);
}
if(substr_count($button1_hover_shadow, 'disable') == 0) {
	$button1_hover_shadow = Zolo_Box_Shadow_Param::box_shadow_css($button1_hover_shadow);
}
	global $apress_data;
	
	$attributes1 = array();
	$button1_class = array();
	$button1_wrap_class = array();
	$uniqid = uniqid(rand());
	$zolo_button1_id = 'zolo_button1_element_'.$uniqid;
	$button1_html = '';
	$title_google_fonts = 'yes';
	
//parse link
$button1_link = ( '||' === $button1_link ) ? '' : $button1_link;
$button1_link = vc_build_link( $button1_link );
$use_button1_link = false;
if ( strlen( $button1_link['url'] ) > 0 ) {
	$use_button1_link = true;
	$a_href = $button1_link['url'];
	$a_title = $button1_link['title'];
	$a_target = $button1_link['target'];
	$a_rel = $button1_link['rel'];
}

if ( $use_button1_link ) {
	$attributes1[] = 'href="' . trim( $a_href ) . '"';
	$attributes1[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
	if ( ! empty( $a_target ) ) {
		$attributes1[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
	}
	if ( ! empty( $a_rel ) ) {
		$attributes1[] = 'rel="' . esc_attr( trim( $a_rel ) ) . '"';
	}
}

$button1_class[] = 'zolo_button';
$button1_class[] = 'zolo_button_'.$button1_shape;
$button1_class[] = 'zolo_ripplelink';

$button1_wrap_class[] = 'zolo_button_size_'.$button1_size;
$button1_wrap_class[] = $button1_color_scheme;
$button1_wrap_class[] = 'zolo_button_element';
$button1_wrap_class[] = 'zolo_service_box_1st_button_element';

if($button1_shape == 'square' || $button1_shape == 'rounded' || $button1_shape == 'round' || $button1_shape == 'style4'){
$button1_wrap_class[] = 'zolo_icon_alignment_'.$button1_icon_alignment;
}
if($button1_icon_enable == 'yes'){
$button1_wrap_class[] = 'zolo_button1_icon_enable';
}

if($button1_shape == 'square' || $button1_shape == 'rounded' || $button1_shape == 'round' || $button1_shape == 'style7' || $button1_shape == 'style10'){
$button1_wrap_class[] = 'zolo_button_'.$button1_hover_style;
}
	
$attributes1 = implode( ' ', $attributes1 );
$button1_class = implode( ' ', $button1_class );
$button1_wrap_class = implode( ' ', $button1_wrap_class );

	if($button1_shape == 'square' || $button1_shape == 'rounded' || $button1_shape == 'round' || $button1_shape == 'style7' || $button1_shape == 'style10'){
		if($button1_color_scheme == 'design_your_own'){
			$key = '';
		}else{
			$key = $button1_color_scheme;
		} 
	}else if($button1_shape == 'style4' || $button1_shape == 'style6' || $button1_shape == 'style8'){
		$key = $button1_color_scheme2;
	}

if($button1_shape == 'square' || $button1_shape == 'rounded' || $button1_shape == 'round' || $button1_shape == 'style4' || $button1_shape == 'style6' || $button1_shape == 'style7' || $button1_shape == 'style8' || $button1_shape == 'style10'){
	$button1_color_scheme_css = apcore_shortcodes_background_color_scheme($key);
}else{
	$button1_color_scheme_css = '';
	}
$button1_icon_html = '';
//if($button1_shape == 'style5' || $button1_shape == 'style6' || $button1_shape == 'style7' || $button1_shape == 'style8' || $button1_shape == 'style9' || $button1_shape == 'style10'){

if($button1_icon_enable == 'yes'){
$button1_icon_html = '<span class="button_icon" style="font-size:'.$button1_icon_size.'px;"><i class="'.$button1_icon.'"></i></span>';
}
//	}
	
if($button1_shape == 'style7' || $button1_shape == 'style10'){
echo '<script>
(function($) {
"use strict";
$(document).ready(function(){
var zolo_buttonheight = $("#'.$zolo_button1_id.' .zolo_button_style7, #'.$zolo_button1_id.' .zolo_button_style10").outerHeight();
$("#'.$zolo_button1_id.' .zolo_button_style7 .button_icon, #'.$zolo_button1_id.' .zolo_button_style10 .button_icon").height(zolo_buttonheight);
$("#'.$zolo_button1_id.' .zolo_button_style7 .button_icon, #'.$zolo_button1_id.' .zolo_button_style10 .button_icon").width(zolo_buttonheight);
$("#'.$zolo_button1_id.' .zolo_button_style7 .button_icon, #'.$zolo_button1_id.' .zolo_button_style10 .button_icon").css("line-height", zolo_buttonheight+"px");

})
})(jQuery);
</script>';
}

?>

<?php
// Button Text HTML.
if (!empty($button1_text)) {
	$button1_options = _zolo_parse_text_shortcode_params($button1_font_options, '', $button1_google_fonts, $button1_custom_fonts);
	if($button1_icon_alignment == 'left'){
		$button1_html .= $button1_icon_html.'<span class="zolo_button_text">' . esc_html($button1_text) . '</span>';
	}else{
		if($button1_shape == 'style8' || $button1_shape == 'style9' || $button1_shape == 'style10'){
			$button1_html .= $button1_icon_html.'<span class="zolo_button_text">' . esc_html($button1_text) . '</span>';
		}else{
			$button1_html .= '<span class="zolo_button_text">' . esc_html($button1_text) . '</span>'.$button1_icon_html;
		}
		}
	
}

}
// 1st Button Code Start




// 2nd Button Code Start
if($button2_enable == 'yes'){
//icon
switch($button2_icon_family) {
	case 'fontawesome':
		$button2_icon = $button2_icon_fontawesome;
		break; 
	case 'openiconic':
		$button2_icon = $button2_icon_openiconic;
		break;
	case 'typicons':
		$button2_icon = $button2_icon_typicons;
		break;
	case 'entypo':
		$button2_icon = $button2_icon_entypo;
		break;
	case 'linecons':
		$button2_icon = $button2_icon_linecons;
		break;
	case 'monosocial':
		$button2_icon = $button2_icon_monosocial;
		break;
	case 'linea':
		$button2_icon = $button2_icon_linea;
		break;	
	case 'default_arrow':
		$button2_icon = 'icon-button-arrow';
		break;
	default:
		$button2_icon = '';
		break;
}
if(!empty($button2_icon_family) && $button2_icon_family != 'none') {
	$circle_icon = $button2_icon;
} 
else {
	$circle_icon = null;
}
// Enqueue needed icon font.
vc_icon_element_fonts_enqueue( $button2_icon_family );

//regular(grad) linea
if(!empty($button2_icon_family) && $button2_icon_family == 'linea') {
	wp_enqueue_style('zt-linea'); 
}

if(substr_count($button2_shadow, 'disable') == 0) {
	$button2_shadow = Zolo_Box_Shadow_Param::box_shadow_css($button2_shadow);
}
if(substr_count($button2_hover_shadow, 'disable') == 0) {
	$button2_hover_shadow = Zolo_Box_Shadow_Param::box_shadow_css($button2_hover_shadow);
}
	global $apress_data;
	
	$attributes2 = array();
	$button2_class = array();
	$button2_wrap_class = array();
	$uniqid = uniqid(rand());
	$zolo_button2_id = 'zolo_button2_element_'.$uniqid;
	$button2_html = '';
	$title_google_fonts = 'yes';
	
//parse link
$button2_link = ( '||' === $button2_link ) ? '' : $button2_link;
$button2_link = vc_build_link( $button2_link );
$use_button2_link = false;
if ( strlen( $button2_link['url'] ) > 0 ) {
	$use_button2_link = true;
	$a_href = $button2_link['url'];
	$a_title = $button2_link['title'];
	$a_target = $button2_link['target'];
	$a_rel = $button2_link['rel'];
}

if ( $use_button2_link ) {
	$attributes2[] = 'href="' . trim( $a_href ) . '"';
	$attributes2[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
	if ( ! empty( $a_target ) ) {
		$attributes2[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
	}
	if ( ! empty( $a_rel ) ) {
		$attributes2[] = 'rel="' . esc_attr( trim( $a_rel ) ) . '"';
	}
}

$button2_class[] = 'zolo_button';
$button2_class[] = 'zolo_button_'.$button2_shape;
$button2_class[] = 'zolo_ripplelink';

$button2_wrap_class[] = 'zolo_button_size_'.$button2_size;
$button2_wrap_class[] = $button2_color_scheme;
$button2_wrap_class[] = 'zolo_button_element';
$button2_wrap_class[] = 'zolo_service_box_2nd_button_element';

if($button2_shape == 'square' || $button2_shape == 'rounded' || $button2_shape == 'round' || $button2_shape == 'style4'){
$button2_wrap_class[] = 'zolo_icon_alignment_'.$button2_icon_alignment;
}
if($button2_icon_enable == 'yes'){
$button2_wrap_class[] = 'zolo_button2_icon_enable';
}

if($button2_shape == 'square' || $button2_shape == 'rounded' || $button2_shape == 'round' || $button2_shape == 'style7' || $button2_shape == 'style10'){
$button2_wrap_class[] = 'zolo_button_'.$button2_hover_style;
}
	
$attributes2 = implode( ' ', $attributes2 );
$button2_class = implode( ' ', $button2_class );
$button2_wrap_class = implode( ' ', $button2_wrap_class );

	if($button2_shape == 'square' || $button2_shape == 'rounded' || $button2_shape == 'round' || $button2_shape == 'style7' || $button2_shape == 'style10'){
		if($button2_color_scheme == 'design_your_own'){
			$key = '';
		}else{
			$key = $button2_color_scheme;
		} 
	}else if($button2_shape == 'style4' || $button2_shape == 'style6' || $button2_shape == 'style8'){
		$key = $button2_color_scheme2;
	}

if($button2_shape == 'square' || $button2_shape == 'rounded' || $button2_shape == 'round' || $button2_shape == 'style4' || $button2_shape == 'style6' || $button2_shape == 'style7' || $button2_shape == 'style8' || $button2_shape == 'style10'){
	$button2_color_scheme_css = apcore_shortcodes_background_color_scheme($key);
}else{
	$button2_color_scheme_css = '';
	}
$button2_icon_html = '';

if($button2_icon_enable == 'yes'){
$button2_icon_html = '<span class="button_icon" style="font-size:'.$button2_icon_size.'px;"><i class="'.$button2_icon.'"></i></span>';
}

	
if($button2_shape == 'style7' || $button2_shape == 'style10'){
echo '<script>
(function($) {
"use strict";
$(document).ready(function(){
var zolo_buttonheight = $("#'.$zolo_button2_id.' .zolo_button_style7, #'.$zolo_button2_id.' .zolo_button_style10").outerHeight();
$("#'.$zolo_button2_id.' .zolo_button_style7 .button_icon, #'.$zolo_button2_id.' .zolo_button_style10 .button_icon").height(zolo_buttonheight);
$("#'.$zolo_button2_id.' .zolo_button_style7 .button_icon, #'.$zolo_button2_id.' .zolo_button_style10 .button_icon").width(zolo_buttonheight);
$("#'.$zolo_button2_id.' .zolo_button_style7 .button_icon, #'.$zolo_button2_id.' .zolo_button_style10 .button_icon").css("line-height", zolo_buttonheight+"px");

})
})(jQuery);
</script>';
}

?>

<?php
// Button Text HTML.
if (!empty($button2_text)) {
	$button2_options = _zolo_parse_text_shortcode_params($button2_font_options, '', $button2_google_fonts, $button2_custom_fonts);
	if($button2_icon_alignment == 'left'){
		$button2_html .= $button2_icon_html.'<span class="zolo_button_text">' . esc_html($button2_text) . '</span>';
	}else{
		if($button2_shape == 'style8' || $button2_shape == 'style9' || $button2_shape == 'style10'){
			$button2_html .= $button2_icon_html.'<span class="zolo_button_text">' . esc_html($button2_text) . '</span>';
		}else{
			$button2_html .= '<span class="zolo_button_text">' . esc_html($button2_text) . '</span>'.$button2_icon_html;
		}
		}
	
}

}
// 2nd Button Code End
?>	

<?php

	$img = wp_get_attachment_image_src($image,'full');
	if(!empty($img)){
	$image = $img[0];
	}
	$img2 = wp_get_attachment_image_src($image2,'full');
	if(!empty($img2)){
	$image2 = $img2[0];
	}

	// Title HTML.
	if (!empty($box_title)) {
		$title_options = _zolo_parse_text_shortcode_params($title_font_options, '', $title_google_fonts, $title_custom_fonts);
		$title_html .= '<'.$title_options['tag'].' class="zolo_service_box_title" ' . $title_options['style'] . '>' . esc_html($box_title) .'</'.$title_options['tag'].'>';
	}
	
	// Title HTML.
	if (!empty($box_description)) {
		$description_options = _zolo_parse_text_shortcode_params($description_font_options, '', $description_google_fonts, $description_custom_fonts);
		$description_html .= '<div class="zolo_service_box_description" ' . $description_options['style'] . '>' . esc_html($box_description) .'</div>';
	}
	
	$wrap_class = implode( ' ', $wrap_class );
	
	
	$output = '';
	
	if($box_swing == 'yes'){
		$output .=  '<div class="zolo_box_swing zolo_box_swing10px">';
		}
		
		
		
	
		
	// Code Start
		
	$output .= '<div id="'.$zolo_service_box_element_id.'" class="'.$wrap_class.'" data-animation = "'.$data_animation.'" data-delay = "'.$data_delay.'">';
	
	//Image Start
	if(!empty($image)){
	$output .= '<div class="zolo_service_box_img_wrap">';
	$output .= '<div class="zolo_service_box_img_box"><img class="zolo_service_box_img" src="'.$image.'" alt="Apress"/></div>';
	
	if(!empty($image)){
	$output .= '<div class="zolo_service_box_img_icon">';
	$output .= '<img src="'.$image2.'" alt="Apress"/>';
	$output .= '</div>';
	}
	$output .= '</div>';
	}
	//Image End
	
	$output .= '<div class="zolo_service_box_content">';
	
	$output .= '<div class="zolo_service_box_content_top">' .$title_html.$description_html. '</div>';
	
	
	//Button Group Start
	if($button1_enable == 'yes' || $button2_enable == 'yes'){
	$output .= '<div class="zolo_service_box_button_group">';
	
	// 1St Button Start
	if($button1_enable == 'yes'){
	$output .= '<div id="'.$zolo_button1_id.'" class="'.$button1_wrap_class.'" ' . $button1_options['style'] . '>';

	if ( $use_button1_link ) {
		$output .=  '<a ' . $attributes1 . ' class="'.$button1_class.'" ' . $button1_options['style'] . '><span class="zolo_button_element_content">' . $button1_html . '</span></a>';
	}else{
		$output .=  '<button ' . $attributes1 . ' class="'.$button1_class.'" ' . $button1_options['style'] . '><span class="zolo_button_element_content">' . $button1_html . '</span></button>';
	}
	$output .= '</div>';
	}
	// 1St Button End
	
	// 2nd Button Start
	if($button2_enable == 'yes'){
	$output .= '<div id="'.$zolo_button2_id.'" class="'.$button2_wrap_class.'" ' . $button2_options['style'] . '>';

	if ( $use_button2_link ) {
		$output .=  '<a ' . $attributes2 . ' class="'.$button2_class.'" ' . $button2_options['style'] . '><span class="zolo_button_element_content">' . $button2_html . '</span></a>';
	}else{
		$output .=  '<button ' . $attributes2 . ' class="'.$button2_class.'" ' . $button2_options['style'] . '><span class="zolo_button_element_content">' . $button2_html . '</span></button>';
	}
	$output .= '</div>';
	}
	// 2nd Button End
	
	$output .= '</div>';
	}
	//Button Group End
	
	$output .= '</div>';
	
	$output .= '</div>';
	
	// Code End
	if($box_swing == 'yes'){ 
		$output .=  '</div>'; 
		}
	echo $output;
	

// CSS Start

$custom_css = '';
	
if(substr_count($box_shadow, 'disable') == 0) {
	$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
	$custom_css .= '#'.$zolo_service_box_element_id .'.zolo_service_box_element{ '.$box_shadow.'}';
}
if(substr_count($box_hover_shadow, 'disable') == 0) {
	$box_hover_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_hover_shadow);
	$custom_css .= '#'.$zolo_service_box_element_id .'.zolo_service_box_element:hover{ '.$box_hover_shadow.'}';
}
if(!empty($box_background_color)){
$custom_css .= '#'.$zolo_service_box_element_id .'.zolo_service_box_element{ background:'.$box_background_color.'}';
}
if(!empty($border_radius)){
$custom_css .= '#'.$zolo_service_box_element_id .'.zolo_service_box_element{ border-radius:'.$border_radius.'px; -webkit-border-radius:'.$border_radius.'px;}';
}

$custom_css .= '#'.$zolo_service_box_element_id .'.zolo_service_box_element .zolo_service_box_content{padding:'.$box_top_padding.' '.$box_right_padding.' '.$box_bottom_padding.' '.$box_left_padding.';}';
	
if($height_type == 'custom_height'){
$custom_css .= '#'.$zolo_service_box_element_id .'.zolo_service_box_element .zolo_service_box_img_box{ height:'.$min_height.'px;}';
	}




// 1St Button CSS Start
if($button1_enable == 'yes'){
$custom_css .= '#'.$zolo_button1_id.'.zolo_button_element .zolo_button .button_icon{color:'.$button1_icon_color.';}';
$custom_css .= '#'.$zolo_button1_id.'.zolo_button_element .zolo_button:hover .button_icon{color:'.$button1_icon_hover_color.';}';

if($button1_shape == 'square' || $button1_shape == 'rounded' || $button1_shape == 'round' || $button1_shape == 'style7' || $button1_shape == 'style10'){
	$custom_css .= '#'.$zolo_button1_id.' .zolo_button{'.$button1_shadow.'}';
	$custom_css .= '#'.$zolo_button1_id.' .zolo_button:hover{'.$button1_hover_shadow.'}';
	$custom_css .= '#'.$zolo_button1_id.'.zolo_button_size_design_your_own .zolo_button{padding:'.$button1_padding_top_bottom.'px '.$button1_padding_right_left.'px;}';

	if($button1_color_scheme == 'design_your_own'){

		$custom_css .= '#'.$zolo_button1_id.'.zolo_button_hoverstyle6 .zolo_button,
		#'.$zolo_button1_id.'.zolo_button_hoverstyle1 .zolo_button,
		#'.$zolo_button1_id.' .zolo_button{background:'.$button1_bg_color.';border-color:'.$button1_border_color.';}';
		
		$custom_css .= '#'.$zolo_button1_id.'.zolo_button_hoverstyle6 .zolo_button:hover,
		#'.$zolo_button1_id.'.zolo_button_hoverstyle1 .zolo_button:hover,
		#'.$zolo_button1_id.' .zolo_button:after{ background:'.$button1_bg_color_h.';border-color:'.$button1_border_color_h.'; }';	
		
		$custom_css .= '#'.$zolo_button1_id.' .zolo_button:hover{ background:'.$button1_bg_color_h.';border-color:'.$button1_border_color_h.'; }';		
	
	}else{
		
		$custom_css .= '#'.$zolo_button1_id.' .zolo_button,#'.$zolo_button1_id.' .zolo_button:hover{'.$button1_color_scheme_css.'}';
	}


}else if($button1_shape == 'style4'){ 

	$custom_css .= '#'.$zolo_button1_id.' .zolo_button_style4{color:'.$apress_data["button_text_color"].';}';
	$custom_css .= '#'.$zolo_button1_id.'.zolo_button_element .zolo_button_style4:before{ background-color:'.$button1_border_color_for_style4.'; height:'.$button1_border_height_for_style4.'px;}';
	$custom_css .= '#'.$zolo_button1_id.'.zolo_button_element .zolo_button_style4:after{height:'.$button1_border_height_for_style4.'px;'.$button1_color_scheme_css.'}';
	
	if($button2_icon_enable == 'yes'){
		$custom_css .= '#'.$zolo_button1_id.' .zolo_button{padding:'.$button1_padding_top_bottom_for_style4.'px 5px '.$button1_padding_top_bottom_for_style4.'px 0px;}';
	}else{
		$custom_css .= '#'.$zolo_button1_id.' .zolo_button{padding:'.$button1_padding_top_bottom_for_style4.'px 0px;}';
	}
}else if($button1_shape == 'style5' || $button1_shape == 'style9'){
			
	$custom_css .= '#'.$zolo_button1_id.'.zolo_button_element .zolo_button{ border-color:'.$button1_border_color_for_style5.';}';
	$custom_css .= '#'.$zolo_button1_id.'.zolo_button_element .zolo_button:hover{border-color:'.$button1_hover_border_color_for_style5.';}';
	$custom_css .= '#'.$zolo_button1_id.'.zolo_button_element .zolo_button .button_icon{ background:'.$button1_border_color_for_style5.';color:'.$button1_icon_color.';}';
	$custom_css .= '#'.$zolo_button1_id.'.zolo_button_element .zolo_button:hover .button_icon{ background:'.$button1_hover_border_color_for_style5.';color:'.$button1_icon_hover_color.';}';
	$custom_css .= '#'.$zolo_button1_id.'.zolo_button_size_design_your_own .zolo_button{padding:'.$button1_padding_top_bottom.'px '.$button1_padding_right_left.'px;}';
	
}else if($button1_shape == 'style6' || $button1_shape == 'style8'){	
		
	$custom_css .= '#'.$zolo_button1_id.' .zolo_button_style6.zolo_button{padding:'.$button1_padding_top_bottom_for_style4.'px 5px '.$button1_padding_top_bottom_for_style4.'px 0px;}';
	$custom_css .= '#'.$zolo_button1_id.' .zolo_button_style8.zolo_button{padding:'.$button1_padding_top_bottom_for_style4.'px 0px '.$button1_padding_top_bottom_for_style4.'px 5px;}';
	
		if($button1_icon_bg_color_show == 'yes'){
			$custom_css .= '#'.$zolo_button1_id.'.zolo_button_element .zolo_button .button_icon{ background:'.$button1_icon_bg_color_for_style6.';color:'.$button1_icon_color.';margin-left:12px;width:2em; height:2em; line-height:1.9em;line-height: 31px;}';
			$custom_css .= '#'.$zolo_button1_id.'.zolo_button_element .zolo_button:hover .button_icon{ background:'.$button1_icon_hover_bg_color_for_style6.';color:'.$button1_icon_hover_color.';}';
		} 
}
if($button1_shape == 'style7' || $button1_shape == 'style10'){
		
	$custom_css .= '#'.$zolo_button1_id.'.zolo_button_element .zolo_button .button_icon{ color:'.$button1_icon_color.'; width:40px; height:40px; line-height:40px;}';
	$custom_css .= '#'.$zolo_button1_id.'.zolo_button_element .zolo_button:hover .button_icon{ color:'.$button1_icon_hover_color.';}';
}

if($button1_text_color != ''){
	
	$custom_css .= '#'.$zolo_button1_id.'.zolo_button_hoverstyle6 .zolo_button,
	#'.$zolo_button1_id.'.zolo_button_hoverstyle1 .zolo_button,
	#'.$zolo_button1_id.' .zolo_button{color:'.$button1_text_color.';}';
	
	$custom_css .= '#'.$zolo_button1_id.'.zolo_button_hoverstyle6 .zolo_button:hover,
	#'.$zolo_button1_id.'.zolo_button_hoverstyle1 .zolo_button:hover,
	#'.$zolo_button1_id.' .zolo_button:after,
	#'.$zolo_button1_id.' .zolo_button:focus,
	#'.$zolo_button1_id.' .zolo_button:hover{color:'.$button1_text_color_h.';}';
	
}else{
	
	$custom_css .= '#'.$zolo_button1_id.' .zolo_button,
	#'.$zolo_button1_id.' .zolo_button:focus,
	#'.$zolo_button1_id.' .zolo_button:hover{'.$button1_color_scheme_css.' color:'.$apress_data["button_text_color"].';}';
}

}
// 1St Button CSS END





// 2nd Button CSS Start
if($button2_enable == 'yes'){
$custom_css .= '#'.$zolo_button2_id.'.zolo_button_element .zolo_button .button_icon{color:'.$button2_icon_color.';}';
$custom_css .= '#'.$zolo_button2_id.'.zolo_button_element .zolo_button:hover .button_icon{color:'.$button2_icon_hover_color.';}';

if($button2_shape == 'square' || $button2_shape == 'rounded' || $button2_shape == 'round' || $button2_shape == 'style7' || $button2_shape == 'style10'){
	$custom_css .= '#'.$zolo_button2_id.' .zolo_button{'.$button2_shadow.'}';
	$custom_css .= '#'.$zolo_button2_id.' .zolo_button:hover{'.$button2_hover_shadow.'}';
	$custom_css .= '#'.$zolo_button2_id.'.zolo_button_size_design_your_own .zolo_button{padding:'.$button2_padding_top_bottom.'px '.$button2_padding_right_left.'px;}';

	if($button2_color_scheme == 'design_your_own'){

		$custom_css .= '#'.$zolo_button2_id.'.zolo_button_hoverstyle6 .zolo_button,
		#'.$zolo_button2_id.'.zolo_button_hoverstyle1 .zolo_button,
		#'.$zolo_button2_id.' .zolo_button{background:'.$button2_bg_color.';border-color:'.$button2_border_color.';}';
		
		$custom_css .= '#'.$zolo_button2_id.'.zolo_button_hoverstyle6 .zolo_button:hover,
		#'.$zolo_button2_id.'.zolo_button_hoverstyle1 .zolo_button:hover,
		#'.$zolo_button2_id.' .zolo_button:after{ background:'.$button2_bg_color_h.';border-color:'.$button2_border_color_h.'; }';	
		
		$custom_css .= '#'.$zolo_button2_id.' .zolo_button:hover{ background:'.$button2_bg_color_h.';border-color:'.$button2_border_color_h.'; }';		
	
	}else{
		
		$custom_css .= '#'.$zolo_button2_id.' .zolo_button,#'.$zolo_button2_id.' .zolo_button:hover{'.$button2_color_scheme_css.'}';
	}


}else if($button2_shape == 'style4'){ 

	$custom_css .= '#'.$zolo_button2_id.' .zolo_button_style4{color:'.$apress_data["button_text_color"].';}';
	$custom_css .= '#'.$zolo_button2_id.'.zolo_button_element .zolo_button_style4:before{ background-color:'.$button2_border_color_for_style4.'; height:'.$button2_border_height_for_style4.'px;}';
	$custom_css .= '#'.$zolo_button2_id.'.zolo_button_element .zolo_button_style4:after{height:'.$button2_border_height_for_style4.'px;'.$button2_color_scheme_css.'}';
	$custom_css .= '#'.$zolo_button2_id.' .zolo_button{padding:'.$button2_padding_top_bottom_for_style4.'px 0px;}';

}else if($button2_shape == 'style5' || $button2_shape == 'style9'){
			
	$custom_css .= '#'.$zolo_button2_id.'.zolo_button_element .zolo_button{ border-color:'.$button2_border_color_for_style5.';}';
	$custom_css .= '#'.$zolo_button2_id.'.zolo_button_element .zolo_button:hover{border-color:'.$button2_hover_border_color_for_style5.';}';
	$custom_css .= '#'.$zolo_button2_id.'.zolo_button_element .zolo_button .button_icon{ background:'.$button2_border_color_for_style5.';color:'.$button2_icon_color.';}';
	$custom_css .= '#'.$zolo_button2_id.'.zolo_button_element .zolo_button:hover .button_icon{ background:'.$button2_hover_border_color_for_style5.';color:'.$button2_icon_hover_color.';}';
	$custom_css .= '#'.$zolo_button2_id.'.zolo_button_size_design_your_own .zolo_button{padding:'.$button2_padding_top_bottom.'px '.$button2_padding_right_left.'px;}';
	
}else if($button2_shape == 'style6' || $button2_shape == 'style8'){	
		
	$custom_css .= '#'.$zolo_button2_id.' .zolo_button_style6.zolo_button{padding:'.$button2_padding_top_bottom_for_style4.'px 5px '.$button2_padding_top_bottom_for_style4.'px 0px;}';
	$custom_css .= '#'.$zolo_button2_id.' .zolo_button_style8.zolo_button{padding:'.$button2_padding_top_bottom_for_style4.'px 0px '.$button2_padding_top_bottom_for_style4.'px 5px;}';
	
		if($button2_icon_bg_color_show == 'yes'){
			$custom_css .= '#'.$zolo_button2_id.'.zolo_button_element .zolo_button .button_icon{ background:'.$button2_icon_bg_color_for_style6.';color:'.$button2_icon_color.';margin-left:12px;width:2em; height:2em; line-height:1.9em;line-height: 31px;}';
			$custom_css .= '#'.$zolo_button2_id.'.zolo_button_element .zolo_button:hover .button_icon{ background:'.$button2_icon_hover_bg_color_for_style6.';color:'.$button2_icon_hover_color.';}';
		} 
}
if($button2_shape == 'style7' || $button2_shape == 'style10'){
		
	$custom_css .= '#'.$zolo_button2_id.'.zolo_button_element .zolo_button .button_icon{ color:'.$button2_icon_color.'; width:40px; height:40px; line-height:40px;}';
	$custom_css .= '#'.$zolo_button2_id.'.zolo_button_element .zolo_button:hover .button_icon{ color:'.$button2_icon_hover_color.';}';
}

if($button2_text_color != ''){
	
	$custom_css .= '#'.$zolo_button2_id.'.zolo_button_hoverstyle6 .zolo_button,
	#'.$zolo_button2_id.'.zolo_button_hoverstyle1 .zolo_button,
	#'.$zolo_button2_id.' .zolo_button{color:'.$button2_text_color.';}';
	
	$custom_css .= '#'.$zolo_button2_id.'.zolo_button_hoverstyle6 .zolo_button:hover,
	#'.$zolo_button2_id.'.zolo_button_hoverstyle1 .zolo_button:hover,
	#'.$zolo_button2_id.' .zolo_button:after,
	#'.$zolo_button2_id.' .zolo_button:focus,
	#'.$zolo_button2_id.' .zolo_button:hover{color:'.$button2_text_color_h.';}';
	
}else{
	
	$custom_css .= '#'.$zolo_button2_id.' .zolo_button,
	#'.$zolo_button2_id.' .zolo_button:focus,
	#'.$zolo_button2_id.' .zolo_button:hover{'.$button2_color_scheme_css.' color:'.$apress_data["button_text_color"].';}';
}

}
// 2nd Button CSS END


	
	apcore_save_plugin_dyn_styles( $custom_css );