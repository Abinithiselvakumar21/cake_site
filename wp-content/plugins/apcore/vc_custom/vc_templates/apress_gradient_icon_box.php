<?php 
/*-----------------------------------------------------------------------------------*/
/* Gradient Icon Box
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract( shortcode_atts( array(
	'style'						=> 'iconbox_style1',
	'description'				=> 'Description area',
	'box_link'					=> '',
	'color_scheme'				=> 'primary_color_scheme',
	'custom_color'				=> '#549ffc',
	'icon_alignment'			=> 'center',
	'box_top_padding'			=> '40px',
	'box_right_padding'			=> '40px',
	'box_bottom_padding'		=> '40px',
	'box_left_padding'			=> '40px',
	'box_bg_color'				=> '#ffffff',
	'box_shadow'				=> 'box_shadow_enable:disable|shadow_horizontal:0|shadow_vertical:2|shadow_blur:10|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.08)',
	'box_hover_shadow'			=> 'box_shadow_enable:enable|shadow_horizontal:0|shadow_vertical:7|shadow_blur:90|shadow_spread:-38|box_shadow_color:rgba(0%2C0%2C0%2C0.3)',
	'icon_shadow'				=> 'yes',
	'box_shadow_color'			=> '#000000',
	'title_font_options'		=> '',
	'title_google_fonts'		=> '',
	'title_custom_fonts'		=> '',
	'description_font_options'	=> '',
	'description_google_fonts'	=> '',
	'description_custom_fonts'	=> '',
	'icon_family'				=> 'fontawesome',
	'icon_fontawesome'			=> 'fa fa-angle-right',
	'icon_openiconic'			=> 'vc-oi vc-oi-dial',
	'icon_typicons'				=> 'typcn typcn-adjust-brightness',
	'icon_entypo'				=> 'entypo-icon entypo-icon-note',
	'icon_linecons'				=> 'vc_li vc_li-heart',
	'icon_monosocial'			=> 'vc-mono vc-mono-fivehundredpx',
	'icon_linea'				=> 'icon-basic-heart',
	'gradient_icon_size'		=> '30',
	'icon_type'					=> 'icon',
	'icon_image' 				=> '',
	'icon_svg_animation_duration' => '100',
	'highlight_border_width'	=> '3',
	'highlight_border_color'	=> '#e5e5e5',
	'border_hover_color_scheme'	=> 'primary_color_scheme',
	'border_hover_color'		=> '#003ba3',
	'start_color'				=> '#0467e6',
	'end_color'					=> '#5295ea',
	'gradient_icon_color_scheme'	=> 'design_your_own',
	'gradient_icon_color'			=> '#3ed2a7',
	'icon_background_color_scheme'	=> 'design_your_own',
	'icon_background_color'			=> 'rgba(62, 210, 167, 0.26)',
	'icon_hover_background_color_scheme'=> 'design_your_own',
	'icon_hover_background_color'	=> '#3ed2a7',
	'icon_top_padding'				=> '0',
	'icon_bottom_padding'			=> '0',
	'icon_bg_enable'				=> 'no',
	'icon_bg_type'					=> 'image',
	'image_bg' 						=> '',
	'gradient_icon_bg_size'			=> '60',
	'icon_bg_position'				=> 'position_icon_bg',
	'bg_position_top'				=> '',
	'bg_position_right'				=> '',
	'bg_position_bottom'			=> '',
	'bg_position_left'				=> '',
	'on_hover_icon_bg_animation'	=> 'zolo_icon_bg_animation_no',
	'wrapbox_styling_enable'		=> 'no',
	'wrapbox_overflow'				=> 'no',
	'wrapbox_bg_color_scheme'		=> 'design_your_own',
	'wrapbox_bg_color'				=> '#f9f9f9',
	'wrapbox_bg_color_opacity'		=> '1',
	'wrapbox_bg_image'				=> '',
	'wrapbox_hover_bg_color_scheme'	=> 'primary_color_scheme',
	'wrapbox_hover_bg_color'		=> '',
	'wrapbox_hover_bg_color_opacity'=> '1',
	'wrapbox_hover_bg_image'		=> '',
	'wrapbox_hover_text_color'		=> '#ffffff',
	'wrapbox_border_radius'			=> '0',
	'box_top_padding_style1'		=> '40px',
	'box_right_padding_style1'		=> '40px',
	'box_bottom_padding_style1'		=> '40px',
	'box_left_padding_style1'		=> '40px',
	'box_shadow_style1'				=> 'box_shadow_enable:disable|shadow_horizontal:0|shadow_vertical:2|shadow_blur:10|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.08)',
	'box_hover_shadow_style1'		=> 'box_shadow_enable:enable|shadow_horizontal:0|shadow_vertical:7|shadow_blur:90|shadow_spread:-38|box_shadow_color:rgba(0%2C0%2C0%2C0.3)',
	'button_enable'							=> 'no',
	'appear_on_hover'						=> 'no',
	'button_text'							=> 'Button',
	'button_top_margin'						=> '30',
	'button_color_scheme_1'					=> 'default_button_color_scheme',
	'button_color_scheme_2'					=> 'default_button_color_scheme',
	'button_border_height_for_style4'		=> '2',
	'button_border_color_for_style4'		=> '#e5e5e5',
	'button_border_height_for_style4'		=> '2',
	'padding_top_bottom_for_style4'			=> '12',
	'button_border_color_for_style5'		=> '#e5e5e5',
	'button_hover_border_color_for_style5'	=> '#549ffc',
	'button_icon_bg_color_for_style6'		=> '#e5e5e5',
	'button_icon_hover_bg_color_for_style6'	=> '#549ffc',
	'button_icon_bg_color_show'				=> 'no',
	'button_bg_color'						=> '#5295ea',
	'button_bg_color_h'						=> '#418aea',
	'button_text_color'						=> '',
	'button_text_color_h'					=> '',
	'button_border_color'					=> '#5295ea',
	'button_border_color_h'					=> '#418aea',
	'button_hover_style'					=> 'hoverstyle1',
	'button_shape'							=> 'square',
	'button_size'							=> 'small',
	'padding_top_bottom'					=> '15',
	'padding_right_left'					=> '25',
	'button_shadow'							=> 'box_shadow_enable:enable|shadow_horizontal:1|shadow_vertical:2|shadow_blur:4|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
	'button_hover_shadow'					=> 'box_shadow_enable:enable|shadow_horizontal:2|shadow_vertical:2|shadow_blur:7|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
	'button_swing'							=> 'no',
	'button_icon_enable'					=> 'no',
	'button_icon_family'					=> 'fontawesome',
	'button_icon_fontawesome'				=> 'fa fa-angle-right',
	'button_icon_openiconic'				=> 'vc-oi vc-oi-dial',
	'button_icon_typicons'					=> 'typcn typcn-adjust-brightness',
	'button_icon_entypo'					=> 'entypo-icon entypo-icon-note',
	'button_icon_linecons'					=> 'vc_li vc_li-heart',
	'button_icon_monosocial'				=> 'vc-mono vc-mono-fivehundredpx',
	'button_icon_linea'						=> 'icon-basic-heart',
	'button_icon_size'						=> '16',
	'button_icon_color'						=> '#333333',
	'button_icon_hover_color'				=> '#ffffff',
	'button_icon_alignment'					=> 'right',
	'button_font_options'					=> '',
	'button_google_fonts'					=> '',
	'button_custom_fonts'					=> '',
	'title_responsive'						=> '',
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
$wrapbox_bg_image_url = $wrapbox_hover_bg_image_url = '';

//icon
switch($icon_family) {
	case 'fontawesome':
		$icon = $icon_fontawesome;
		break;
	case 'openiconic':
		$icon = $icon_openiconic;
		break;
	case 'typicons':
		$icon = $icon_typicons;
		break;
	case 'entypo':
		$icon = $icon_entypo;
		break;
	case 'linecons':
		$icon = $icon_linecons;
		break;
	case 'monosocial':
		$icon = $icon_monosocial;
		break;
	case 'linea':
		$icon = $icon_linea;
		break;	
	case 'default_arrow':
		$icon = 'icon-button-arrow';
		break;
	default:
		$icon = '';
		break;
}
if(!empty($icon_family) && $icon_family != 'none') {
	$circle_icon = $icon;
} 
else {
	$circle_icon = null;
}
// Enqueue needed icon font.
vc_icon_element_fonts_enqueue( $icon_family );

//regular(grad) linea
if(!empty($icon_family) && $icon_family == 'linea') {
	wp_enqueue_style('zt-linea'); 
}
		
	global $apress_data;
	
	$attributes = array();
	$button_wrap_class = array();
	
	$uniqid = uniqid(rand());
	$zolo_gradient_icon_id = 'zolo_gradient_icon_'.$uniqid;
	
	$title_html = $description_html = '';

	$title_google_fonts = 'yes';
	
//parse link
$box_link = ( '||' === $box_link ) ? '' : $box_link;
$box_link = vc_build_link( $box_link );
$use_box_link = false;
if ( strlen( $box_link['url'] ) > 0 ) {
	$use_box_link = true;
	$a_href = $box_link['url'];
	$a_title = $box_link['title'];
	$a_target = $box_link['target'];
	$a_rel = $box_link['rel'];
}

if ( $use_box_link ) {
	$attributes[] = 'href="' . trim( $a_href ) . '"';
	$attributes[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
	if ( ! empty( $a_target ) ) {
		$attributes[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
	}
	if ( ! empty( $a_rel ) ) {
		$attributes[] = 'rel="' . esc_attr( trim( $a_rel ) ) . '"';
	}
}


//RTL Colde
if ( is_rtl() ){
		if($icon_alignment == 'top_left'){
			$iconalignment = 'top_right';
		}else if($icon_alignment == 'top_right'){
			$iconalignment = 'top_left';
		}else if($icon_alignment == 'left'){
			$iconalignment = 'right';
		}else if($icon_alignment == 'right'){
			$iconalignment = 'left';
		}else{
			$iconalignment = 'center';
		}
	}else{
		$iconalignment = $icon_alignment;
	}

$button_appear_on_hover = '';
if($appear_on_hover == 'yes'){
	$button_appear_on_hover = 'button_appear_on_hover';
	}

$gradient_icon_wrap_class[] = 'zolo_gradient_icon_box_element '.$button_appear_on_hover;
$gradient_icon_wrap_class[] = 'zolo_gradient_icon_'.$style;
$gradient_icon_wrap_class[] = 'zolo_gradient_icon_alignment_'.$iconalignment;


$attributes = implode( ' ', $attributes );
$gradient_icon_wrap_class = implode( ' ', $gradient_icon_wrap_class );

if ( $use_box_link ) {
		$link_start =  '<a ' . $attributes . '>';
		$link_end =  '</a>';
	}else{
		$link_start =  '';
		$link_end =  '';
		}

//iconbox_style9 icon color
if($style == 'iconbox_style9'){
	
	if($gradient_icon_color_scheme == 'design_your_own'){
		$key = '';
		$gradient_iconcolor_scheme = 'color:'.$gradient_icon_color.';';
	}else{
		$key = $gradient_icon_color_scheme;
		$gradient_iconcolor_scheme = apcore_shortcodes_text_color_scheme($key);
	}
	
	if($icon_background_color_scheme == 'design_your_own'){
		$key = '';
		$icon_backgroundcolor_scheme = 'background:'.$icon_background_color.';';
	}else{
		$key = $icon_background_color_scheme;
		$icon_backgroundcolor_scheme = apcore_shortcodes_background_color_scheme($key);
	}
	
	
	if($icon_hover_background_color_scheme == 'design_your_own'){
		$key = '';
		$icon_hover_backgroundcolor_scheme = 'background:'.$icon_hover_background_color.';';
	}else{
		$key = $icon_hover_background_color_scheme;
		$icon_hover_backgroundcolor_scheme = apcore_shortcodes_background_color_scheme($key);
	}
	
	
}

	

if($wrapbox_bg_color_scheme == 'design_your_own'){
	$key = '';
	
	$wrapbox_background_color_scheme = 'background:'.$wrapbox_bg_color.';';
}else{
	$key = $wrapbox_bg_color_scheme;
	$wrapbox_background_color_scheme = apcore_shortcodes_background_color_scheme($key);
	}
if($wrapbox_hover_bg_color_scheme == 'design_your_own'){
	$key = '';
	
	$wrapbox_hover_background_color_scheme = 'background:'.$wrapbox_hover_bg_color.';';
}else{
	$key = $wrapbox_hover_bg_color_scheme;
	$wrapbox_hover_background_color_scheme = apcore_shortcodes_background_color_scheme($key);
	}
	
$img = wp_get_attachment_image_src($wrapbox_bg_image,'full');
if ( ! empty( $img ) ) {
$wrapbox_bg_image_url = $img[0];
}

$img = wp_get_attachment_image_src($wrapbox_hover_bg_image,'full');
if ( ! empty( $img ) ) {
$wrapbox_hover_bg_image_url = $img[0];
}

$key = $color_scheme;
$background_color_scheme = apcore_shortcodes_background_color_scheme($key);
$text_color_scheme = apcore_shortcodes_text_color_scheme($key);
$border_color_scheme = apcore_shortcodes_border_color_scheme($key);

if($style == 'iconbox_style8'){
	$key = $border_hover_color_scheme;
	if($border_hover_color_scheme == 'design_your_own'){
		$border_hover_colorscheme = 'background:'.$border_hover_color.';';
	}else{
		$border_hover_colorscheme = apcore_shortcodes_background_color_scheme($key);
	}
}else{
	$border_hover_colorscheme = '';
	}

if($color_scheme == 'design_your_own'){
	
	if($style == 'iconbox_style1' || $style == 'iconbox_style5' || $style == 'iconbox_style6' || $style == 'iconbox_style8' || $style == 'iconbox_style10'){
	
		$icon_color = 'color:'.$custom_color.';';
		$icon_background = 'background:none;';
		
	}else if($style == 'iconbox_style3' || $style == 'iconbox_style7'){
	
		$icon_color = 'color:'.$custom_color.';';
		$icon_background = 'background:'.$custom_color.';';
	
	}else{
		$icon_color = 'color:#fff;';
		$icon_background = 'background:'.$custom_color.';';
	}
	$border_color = 'border-color:'.$custom_color.';';
	
}else{
	$border_color = $border_color_scheme;
	if($style == 'iconbox_style1' || $style == 'iconbox_style5' || $style == 'iconbox_style6' || $style == 'iconbox_style8' || $style == 'iconbox_style10'){
	
		$icon_color = $text_color_scheme;
		$icon_background = 'background:none;';
		
	}else if($style == 'iconbox_style3' || $style == 'iconbox_style7'){
	
		$icon_color = $text_color_scheme;
		$icon_background = $background_color_scheme;
	
	}else{
		$icon_color = 'color:#fff;';
		$icon_background = $background_color_scheme;
	}
}

$img = wp_get_attachment_image_src($icon_image,'full');
if ( ! empty( $img ) ) {
$icon_image = $img[0];
}
$image_alt = get_post_meta($icon_image, '_wp_attachment_image_alt', true);
$img = wp_get_attachment_image_src($image_bg,'full');
if ( ! empty( $img ) ) {
$image_bg = $img[0];
}

if(substr_count($box_shadow, 'disable') == 0) {
	$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
}
if(substr_count($box_hover_shadow, 'disable') == 0) {
	$box_hover_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_hover_shadow);
}

$gradient_icon_bg_html = $gradient_icon_box_bg_html = '';
if($icon_bg_enable == 'yes'){
if($icon_bg_position == 'position_icon_bg'){
		$gradient_icon_bg_html = '<div class="zolo_gradient_icon_bg"></div>';
	}else{
		$gradient_icon_box_bg_html = '<div class="zolo_gradient_icon_bg"></div>';
		}
}


// SVG Gradient color
$svg = array();

if ( ! empty( $start_color ) ) {
	$svg['color'] = $start_color;
}
if ( ! empty( $end_color ) ) {
	$svg['color'] .= ',' . $end_color;
}


?>	

<?php
//Button Code Start

if(substr_count($button_shadow, 'disable') == 0) {
	$button_shadow = Zolo_Box_Shadow_Param::box_shadow_css($button_shadow);
}
if(substr_count($button_hover_shadow, 'disable') == 0) {
	$button_hover_shadow = Zolo_Box_Shadow_Param::box_shadow_css($button_hover_shadow);
}
	global $apress_data;
	
//icon
switch($button_icon_family) {
	case 'fontawesome':
		$button_icon = $button_icon_fontawesome;
		break;
	case 'openiconic':
		$button_icon = $button_icon_openiconic;
		break;
	case 'typicons':
		$button_icon = $button_icon_typicons;
		break;
	case 'entypo':
		$button_icon = $button_icon_entypo;
		break;
	case 'linecons':
		$button_icon = $button_icon_linecons;
		break;
	case 'monosocial':
		$button_icon = $button_icon_monosocial;
		break;
	case 'linea':
		$button_icon = $button_icon_linea;
		break;	
	case 'default_arrow':
		$button_icon = 'icon-button-arrow';
		break;
	default:
		$button_icon = '';
		break;
}
if(!empty($button_icon_family) && $button_icon_family != 'none') {
	$circle_icon = $button_icon;
} 
else {
	$circle_icon = null;
}
// Enqueue needed icon font.
vc_icon_element_fonts_enqueue( $button_icon_family );

//regular(grad) linea
if(!empty($button_icon_family) && $button_icon_family == 'linea') {
	wp_enqueue_style('zt-linea'); 
}

	$button_class = array();
	$button_wrap_class = array();
	$zolo_button_id = 'zolo_button_element_'.$uniqid;
	$button_html = '';
	$title_google_fonts = 'yes';
	

$button_class[] = 'zolo_button';
$button_class[] = 'zolo_button_'.$button_shape;
$button_class[] = 'zolo_ripplelink';

if(empty($button_text)){
$button_wrap_class[] = 'zolo_button_icon_margin_none';
}
$button_wrap_class[] = 'zolo_button_size_'.$button_size;

if($button_shape == 'square' || $button_shape == 'rounded' || $button_shape == 'round' || $button_shape == 'style4'){
$button_wrap_class[] = 'zolo_icon_alignment_'.$button_icon_alignment;
}
if($button_icon_enable == 'yes'){
$button_wrap_class[] = 'zolo_button_icon_enable';
}

if($button_shape == 'square' || $button_shape == 'rounded' || $button_shape == 'round' || $button_shape == 'style7' || $button_shape == 'style10'){
$button_wrap_class[] = 'zolo_button_'.$button_hover_style;
}
	
	
$button_class = implode( ' ', $button_class );
$button_wrap_class = implode( ' ', $button_wrap_class );



	if($button_shape == 'square' || $button_shape == 'rounded' || $button_shape == 'round' || $button_shape == 'style7' || $button_shape == 'style10'){
		if($color_scheme == 'design_your_own'){
			$key = '';
		}else{
			$key = $button_color_scheme_1;
		} 
	}else if($button_shape == 'style4' || $button_shape == 'style6' || $button_shape == 'style8'){
		$key = $button_color_scheme_2;
	}

if($button_shape == 'square' || $button_shape == 'rounded' || $button_shape == 'round' || $button_shape == 'style4' || $button_shape == 'style6' || $button_shape == 'style7' || $button_shape == 'style8' || $button_shape == 'style10'){
	$color_scheme_css = apcore_shortcodes_background_color_scheme($key);
}else{
	$color_scheme_css = '';
	}
$button_icon_html = '';

if($button_icon_enable == 'yes'){
$button_icon_html = '<span class="button_icon" style="font-size:'.$button_icon_size.'px;"><i class="'.$button_icon.'"></i></span>';
}

	
if($button_shape == 'style7' || $button_shape == 'style10'){
echo '<script>
(function($) {
"use strict";
$(document).ready(function(){
var zolo_buttonheight = $(".'.$zolo_button_id.' .zolo_button_style7, .'.$zolo_button_id.' .zolo_button_style10").outerHeight();
$(".'.$zolo_button_id.' .zolo_button_style7 .button_icon, .'.$zolo_button_id.' .zolo_button_style10 .button_icon").height(zolo_buttonheight);
$(".'.$zolo_button_id.' .zolo_button_style7 .button_icon, .'.$zolo_button_id.' .zolo_button_style10 .button_icon").width(zolo_buttonheight);
$(".'.$zolo_button_id.' .zolo_button_style7 .button_icon, .'.$zolo_button_id.' .zolo_button_style10 .button_icon").css("line-height", zolo_buttonheight+"px");

})
})(jQuery);
</script>';
}


// Button Text HTML.
	if ($button_enable == 'yes') {
		$button_options = _zolo_parse_text_shortcode_params($button_font_options, 'zolo_button_text', $button_google_fonts, $button_custom_fonts);
		$button_html = '<span class="zolo_button_text" ' . $button_options['style'] . '>' . esc_html($button_text) . '</span>'.$button_icon_html;
	}

//Button Code End
?>

<?php 
	// Title HTML.
	if (!empty($content)) {
		$title_options = _zolo_parse_text_shortcode_params($title_font_options, 'zolo_gradient_icon_title', $title_google_fonts, $title_custom_fonts);
		$title_html .= $link_start.'<'.$title_options['tag'].' class="zolo_gradient_icon_title" ' . $title_options['style'] . '>' . wpb_js_remove_wpautop($content) .'</'.$title_options['tag'].'>'.$link_end;
	}
	
	// Description Text HTML.
	if (!empty($description)) {
		$description_options = _zolo_parse_text_shortcode_params($description_font_options, 'zolo_gradient_icon_description', $description_google_fonts, $description_custom_fonts);
		$description_html .= '<span class="zolo_gradient_icon_description" ' . $description_options['style'] . '>' . esc_html($description) . '</span>';
	}
	

	$output = '<div class="'.$zolo_gradient_icon_id.' '.$gradient_icon_wrap_class.' '.$animatedclass.' '.$class.'" data-animation = "'.$data_animation.'" data-delay = "'.$data_delay.'">';
	
	if($style == 'iconbox_style8'){
		
	$output .= '<div class="zolo_gradient_icon_box_area"><div class="zolo_gradient_icon_area_box">';
	if($icon_type == 'icon'){
		
			$output .= '<div class="zolo_gradient_icon_wrap"><div class="zolo_gradient_icon">'.$link_start.$link_end.'<i class="'.$icon.'"></i></div></div>';
		}else if($icon_type == 'icon_svg'){
			
			$output .= '<div class="zolo_gradient_icon_wrap"><div class="zolo_gradient_icon">'.$link_start.$link_end.'<div class="zolo_gradient_svg_icon" id="' . uniqid('apcore-svg-') . '" data-file="' . esc_url( $icon_image ) . '" data-duration="' . esc_attr( $icon_svg_animation_duration ) . '" data-color="'.$svg['color'].'" style="width:'.$gradient_icon_size.'px;height: auto;"></div></div></div>';
		}else{
			
			$output .= '<div class="zolo_gradient_icon zolo_gradient_icon_wrap"><div class="zolo_gradient_icon icon_style_image" style="max-width:'.$gradient_icon_size.'px;width:100%;height: auto;">'.$link_start.$link_end.'<img src="'.$icon_image.'" alt="'.$image_alt.'"/></div></div>';
			}
	
	$output .= '<div class="zolo_gradient_iconbox_content_wrap">'.$title_html;
	
	$output .= $description_html;
	
	// Button
	if ( $button_enable == 'yes' ) {
		$output .= '<div class="zolo_gradient_iconbox_button_wrap"> <div class="zolo_button_element zolo_gradient_iconbox_button '.$zolo_button_id.' '.$button_wrap_class.' '.$color_scheme.'" ' . $button_options['style'] . '>';

	if ( $use_box_link ) {
		$output .=  '<a ' . $attributes . ' class="'.$button_class.'" ' . $button_options['style'] . '>' . $button_html . '</a>';
	}else{
		$output .=  '<button ' . $attributes . ' class="'.$button_class.'" ' . $button_options['style'] . '>' . $button_html . '</button>';
	}
	
	$output .= '</div></div>';
		
	}
	
	$output .= '</div>';
	$output .= '</div></div>';
	
	}else if($style == 'iconbox_style1'){
		
		$output .= '<div class="zolo_gradient_icon_box_area zolo_'.$icon_bg_position.' '.$on_hover_icon_bg_animation.'">';
		$output .= '<div class="zolo_gradient_icon_box_element_bg"></div>'. $gradient_icon_box_bg_html;
		if($icon_type == 'icon'){
			$output .= '<div class="zolo_gradient_icon_wrap"><div class="zolo_gradient_icon">'.$link_start.$link_end.' '.$gradient_icon_bg_html.'<i class="'.$icon.'"></i></div></div>';
			
		}else if($icon_type == 'icon_svg'){
			$output .= '<div class="zolo_gradient_icon_wrap"><div class="zolo_gradient_icon">'.$link_start.$link_end.' '.$gradient_icon_bg_html.'<div class="zolo_gradient_svg_icon" id="' . uniqid('apcore-svg-') . '" data-file="' . esc_url( $icon_image ) . '" data-duration="' . esc_attr( $icon_svg_animation_duration ) . '" data-color="'.$svg['color'].'" style="width:'.$gradient_icon_size.'px;height: auto;"></div></div></div>';
		
		}else{
			$output .= '<div class="zolo_gradient_icon_wrap"><div class="zolo_gradient_icon icon_style_image" style="max-width:'.$gradient_icon_size.'px;width:100%;height: auto;">'.$link_start.$link_end.' '.$gradient_icon_bg_html.'<img src="'.$icon_image.'" alt="'.$image_alt.'"/></div></div>';
		}
	
	$output .= '<div class="zolo_gradient_iconbox_content_wrap">'.$title_html;
	
	$output .= $description_html;
	
	// Button
	if ( $button_enable == 'yes' ) {
		$output .= '<div class="zolo_gradient_iconbox_button_wrap"> <div class="zolo_button_element zolo_gradient_iconbox_button '.$zolo_button_id.' '.$button_wrap_class.' '.$color_scheme.'" ' . $button_options['style'] . '>';

	if ( $use_box_link ) {
		$output .=  '<a ' . $attributes . ' class="'.$button_class.'" ' . $button_options['style'] . '>' . $button_html . '</a>';
	}else{
		$output .=  '<button ' . $attributes . ' class="'.$button_class.'" ' . $button_options['style'] . '>' . $button_html . '</button>';
	}
	
	$output .= '</div></div>';
		
	}
	
	$output .= '</div>';
	$output .= '</div>';
	
	
	}else if($style == 'iconbox_style9' || $style == 'iconbox_style10'){
		
		$output .= '<div class="zolo_gradient_icon_box_area zolo_'.$icon_bg_position.' '.$on_hover_icon_bg_animation.'">';
		$output .= '<div class="zolo_gradient_icon_box_element_bg"></div>'. $gradient_icon_box_bg_html;
		if($icon_type == 'icon'){
			$output .= '<div class="zolo_gradient_icon_wrap"><div class="zolo_gradient_icon">'.$link_start.$link_end.' '.$gradient_icon_bg_html.'<i class="'.$icon.'"></i></div></div>';
			
		}else if($icon_type == 'icon_svg'){
			$output .= '<div class="zolo_gradient_icon_wrap"><div class="zolo_gradient_icon">'.$link_start.$link_end.' '.$gradient_icon_bg_html.'<div class="zolo_gradient_svg_icon" id="' . uniqid('apcore-svg-') . '" data-file="' . esc_url( $icon_image ) . '" data-duration="' . esc_attr( $icon_svg_animation_duration ) . '" data-color="'.$svg['color'].'" style="width:'.$gradient_icon_size.'px;height: auto;"></div></div></div>';
		
		}else{
			$output .= '<div class="zolo_gradient_icon_wrap"><div class="zolo_gradient_icon icon_style_image" style="max-width:'.$gradient_icon_size.'px;width:100%;height: auto;">'.$link_start.$link_end.' '.$gradient_icon_bg_html.'<img src="'.$icon_image.'" alt="'.$image_alt.'"/></div></div>';
		}
	
	$output .= '<div class="zolo_gradient_iconbox_content_wrap">'.$title_html;
	
	$output .= $description_html;
	
	// Button
	if ($style == 'iconbox_style9' ) {
		// Button
	if ( $button_enable == 'yes' ) {
		$output .= '<div class="zolo_gradient_iconbox_button_wrap"> <div class="zolo_button_element zolo_gradient_iconbox_button '.$zolo_button_id.' '.$button_wrap_class.' '.$color_scheme.'" ' . $button_options['style'] . '>';

	if ( $use_box_link ) {
		$output .=  '<a ' . $attributes . ' class="'.$button_class.'" ' . $button_options['style'] . '>' . $button_html . '</a>';
	}else{
		$output .=  '<button ' . $attributes . ' class="'.$button_class.'" ' . $button_options['style'] . '>' . $button_html . '</button>';
	}
	
	$output .= '</div></div>';
	}	
	}
	
	$output .= '</div>';
	
	$output .= '</div>';
	}else{
		
		if($icon_type == 'icon'){
			$output .= '<div class="zolo_gradient_icon_wrap"><div class="zolo_gradient_icon">'.$link_start.$link_end.'<i class="'.$icon.'"></i></div></div>';
		}else if($icon_type == 'icon_svg'){
			$output .= '<div class="zolo_gradient_icon_wrap"><div class="zolo_gradient_icon">'.$link_start.$link_end.' <div class="zolo_gradient_svg_icon" id="' . uniqid('apcore-svg-') . '" data-file="' . esc_url( $icon_image ) . '" data-duration="' . esc_attr( $icon_svg_animation_duration ) . '" data-color="'.$svg['color'].'" style="width:'.$gradient_icon_size.'px;height: auto;"></div></div></div>';
		}else{
			$output .= '<div class="zolo_gradient_icon_wrap"><div class="zolo_gradient_icon icon_style_image" style="max-width:'.$gradient_icon_size.'px;width:100%;height: auto;">'.$link_start.$link_end.'<img src="'.$icon_image.'" alt="'.$image_alt.'"/></div></div>';
		}
	
	$output .= '<div class="zolo_gradient_iconbox_content_wrap">'.$title_html;
	
	$output .= $description_html;
	// Button
	if ( $button_enable == 'yes' ) {
		$output .= '<div class="zolo_gradient_iconbox_button_wrap"> <div class="zolo_button_element zolo_gradient_iconbox_button '.$zolo_button_id.' '.$button_wrap_class.' '.$color_scheme.'" ' . $button_options['style'] . '>';

	if ( $use_box_link ) {
		$output .=  '<a ' . $attributes . ' class="'.$button_class.'" ' . $button_options['style'] . '>' . $button_html . '</a>';
	}else{
		$output .=  '<button ' . $attributes . ' class="'.$button_class.'" ' . $button_options['style'] . '>' . $button_html . '</button>';
	}
	
	$output .= '</div></div>';
		
	}
	
	$output .= '</div>';
	
		}
	
	$output .= '</div>';
	
	echo $output;

// CSS
$shortcode_css = '';
	
	
if(isset($title_responsive) && $title_responsive != '') {
$shortcode_css .= Zolo_Resposive_Text_Param::responsive_css($title_responsive, '.' . esc_js($zolo_gradient_icon_id) . ' .zolo_gradient_icon_title');
	}
$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon{font-size:'.$gradient_icon_size.'px; margin:'.$icon_top_padding.'px 0px '.$icon_bottom_padding.'px 0px;}';
$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon,
.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon i,
.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon i:before{'.$icon_color.'display:inline-block;}';

$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style3 .zolo_gradient_icon:before,
.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style2 .zolo_gradient_icon,
.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style4 .zolo_gradient_icon{'.$icon_background.'}';

$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style5 .zolo_gradient_icon:after{'.$border_color.'}';

$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style7:after{'.$icon_background.'}';

if($icon_shadow == 'yes'){
$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style4 .zolo_gradient_icon,
.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style2 .zolo_gradient_icon{box-shadow: 3px 4px 18px 1px rgba(8, 21, 42, 0.26);}';

$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style8 .zolo_gradient_icon_area_box{ border:'.$highlight_border_width.'px solid '.$highlight_border_color.';}';

$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style8 .zolo_gradient_icon_area_box:before,
.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style8 .zolo_gradient_icon_box_area:before{height:'.$highlight_border_width.'px;'.$border_hover_colorscheme.'}';

$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style8 .zolo_gradient_icon_box_area:after,
.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style8 .zolo_gradient_icon_area_box:after{width:'.$highlight_border_width.'px;'.$border_hover_colorscheme.'}';

}else{echo '';}

if($style == 'iconbox_style7'){
$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style7{padding:'.$box_top_padding.' '.$box_right_padding.' '.$box_bottom_padding.' '.$box_left_padding.'; background:'.$box_bg_color.'}';


$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style7{'.$box_shadow.'}';
$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style7:hover{'.$box_hover_shadow.'}';

}else if($style == 'iconbox_style8'){
$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style8 .zolo_gradient_icon_area_box{padding:'.$box_top_padding.' '.$box_right_padding.' '.$box_bottom_padding.' '.$box_left_padding.'; background:'.$box_bg_color.';}';
$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style8{'.$box_shadow.'}';
$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style8:hover{'.$box_hover_shadow.'}';

}else if($style == 'iconbox_style1' || $style == 'iconbox_style9' || $style == 'iconbox_style10'){

//box_styling_enable Start
if($wrapbox_styling_enable == 'yes'){

if($wrapbox_bg_image_url){
	$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon_box_area{background-image: url('.$wrapbox_bg_image_url.');}';
	 }
$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon_box_area:after{ opacity:'.$wrapbox_bg_color_opacity.'; '.$wrapbox_background_color_scheme.'}';

if($wrapbox_hover_bg_image_url){
 $shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon_box_element_bg{background-image: url('.$wrapbox_hover_bg_image_url.');}';
}
$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon_box_element_bg:after{opacity:'.$wrapbox_hover_bg_color_opacity.';'.$wrapbox_hover_background_color_scheme.'}';

$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element:hover .zolo_gradient_icon_title,
.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element:hover .zolo_gradient_icon_description{color:'.$wrapbox_hover_text_color.'!important;}';

	if($button_color_scheme_1 == 'design_your_own'){
		
		if($button_border_color != ''){
		$button_bordercolor_value = 'border:1px solid '.$button_border_color.';';
		}
		
		$shortcode_css .= '.zolo_gradient_icon_box_element .'.$zolo_button_id.'.zolo_button_hoverstyle6 .zolo_button,
		.zolo_gradient_icon_box_element .'.$zolo_button_id.'.zolo_button_hoverstyle1 .zolo_button,
		.zolo_gradient_icon_box_element .'.$zolo_button_id.' .zolo_button{'.$button_bordercolor_value.' background:'.$button_bg_color.';}';
		
		$shortcode_css .= '.zolo_gradient_icon_box_element:hover .'.$zolo_button_id.'.zolo_button_hoverstyle6 .zolo_button,
		.zolo_gradient_icon_box_element:hover .'.$zolo_button_id.'.zolo_button_hoverstyle1 .zolo_button,
		.zolo_gradient_icon_box_element:hover .'.$zolo_button_id.' .zolo_button:after{background:'.$button_bg_color_h.';border-color:'.$button_border_color_h.'; }';		
	
	}else{
		
		$shortcode_css .= '.zolo_gradient_icon_box_element .'.$zolo_button_id.' .zolo_button,.zolo_gradient_icon_box_element:hover .'.$zolo_button_id.' .zolo_button{'.$color_scheme_css.'}';
	}
	if($button_text_color != ''){
		
		$shortcode_css .= '.zolo_gradient_icon_box_element .'.$zolo_button_id.'.zolo_button_hoverstyle6 .zolo_button,
		.zolo_gradient_icon_box_element .'.$zolo_button_id.'.zolo_button_hoverstyle1 .zolo_button,
		.zolo_gradient_icon_box_element .'.$zolo_button_id.' .zolo_button{color:'.$button_text_color.';}';
		
		$shortcode_css .= '.zolo_gradient_icon_box_element:hover .'.$zolo_button_id.'.zolo_button_hoverstyle6 .zolo_button,
		.zolo_gradient_icon_box_element:hover .'.$zolo_button_id.'.zolo_button_hoverstyle1 .zolo_button,
		.zolo_gradient_icon_box_element:hover .'.$zolo_button_id.' .zolo_button:after,
		.zolo_gradient_icon_box_element:hover .'.$zolo_button_id.' .zolo_button:focus,
		.zolo_gradient_icon_box_element:hover .'.$zolo_button_id.' .zolo_button{color:'.$button_text_color_h.';}';
		
	}else{
		
		$shortcode_css .= '.zolo_gradient_icon_box_element .'.$zolo_button_id.' .zolo_button,
		.zolo_gradient_icon_box_element .'.$zolo_button_id.' .zolo_button:focus,
		.zolo_gradient_icon_box_element:hover .'.$zolo_button_id.' .zolo_button{'.$color_scheme_css.' color:'.$apress_data["button_text_color"].';}';
	}

$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element:hover .zolo_gradient_icon,
.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element:hover .zolo_gradient_icon i,
.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element:hover .zolo_gradient_icon i:before{ color:'.$wrapbox_hover_text_color.'!important; background:none; display:inline-block;}';

$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element:hover .zolo_gradient_iconbox_button{color:'.$wrapbox_hover_text_color.';}';
$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon_box_area{padding:'.$box_top_padding_style1.' '.$box_right_padding_style1.' '.$box_bottom_padding_style1.' '.$box_left_padding_style1.';}';






if($wrapbox_overflow == 'yes'){
	$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element{overflow:visible;}';

if(substr_count($box_shadow_style1, 'disable') == 0) {
	$box_shadow_style1 = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow_style1);
	$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon_box_area{-moz-transition: all 0.5s;
-webkit-transition: all 0.5s;
-ms-transition: all 0.5s;
-o-transition: all 0.5s;
transition: all 0.5s;'.$box_shadow_style1.'}';
}
if(substr_count($box_hover_shadow_style1, 'disable') == 0) {
	$box_hover_shadow_style1 = Zolo_Box_Shadow_Param::box_shadow_css($box_hover_shadow_style1);
	$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element:hover .zolo_gradient_icon_box_element_bg{'.$box_hover_shadow_style1.'}';
}
$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element:hover .zolo_gradient_icon_box_area{box-shadow:none;}';

}else{
	$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element{overflow:hidden;}';

if(substr_count($box_shadow_style1, 'disable') == 0) {
	$box_shadow_style1 = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow_style1);
	$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element{'.$box_shadow_style1.'}';
}

if(substr_count($box_hover_shadow_style1, 'disable') == 0) {
	$box_hover_shadow_style1 = Zolo_Box_Shadow_Param::box_shadow_css($box_hover_shadow_style1);
	$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element:hover{'.$box_hover_shadow_style1.'}';
}

$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element{ border-radius:'.$wrapbox_border_radius.'px;}';
	}

$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon_box_element_bg,
.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon_box_area:after,
.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon_box_area{ border-radius:'.$wrapbox_border_radius.'px;overflow: hidden;}';

}
//box_styling_enable End 

$bg_positiontop = !empty($bg_position_top) ? 'top:'.$bg_position_top.';' : '';
$bg_positionright = !empty($bg_position_right) ? 'right:'.$bg_position_right.';' : '';
$bg_positionleft = !empty($bg_position_left) ? 'left:'.$bg_position_left.';' : '';
$bg_positionbottom = !empty($bg_position_bottom) ? 'bottom:'.$bg_position_bottom.';' : '';
$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon_bg{background-image: url('.$image_bg.');width:'.$gradient_icon_bg_size.'px; height:'.$gradient_icon_bg_size.'px;'.$bg_positiontop.$bg_positionright.$bg_positionleft.$bg_positionbottom.'}';

//box_button 
if($button_text != ''){
	$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_iconbox_button{color:'.$button_text_color.';}';
	$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_iconbox_button:hover{color:'.$button_text_color_h.';}';
	
	$button_underlinecolor = !empty($button_underline_color) ? 'background:'.$button_underline_color.';' : '';
	$button_hover_underlinecolor = !empty($button_hover_underline_color) ? 'background:'.$button_hover_underline_color.';' : '';
	
	$button_hover_underlineheight = !empty($button_hover_underline_height) ? 'height:'.$button_hover_underline_height.'px;' : '';
	
	$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_iconbox_button:before{'.$button_underlinecolor.'}';
	$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_iconbox_button:after{'.$button_hover_underlinecolor.'}';
	
	$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_iconbox_button:before,
	.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_iconbox_button:after{'.$button_hover_underlineheight.'}';
	
	
	}

}

if($style == 'iconbox_style9'){
	
$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style9 .zolo_gradient_icon,
.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style9 .zolo_gradient_icon i,
.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style9 .zolo_gradient_icon i:before{'.$gradient_iconcolor_scheme.'display:inline-block;}';

$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style9:hover .zolo_gradient_icon,
.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style9:hover .zolo_gradient_icon i,
.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style9:hover .zolo_gradient_icon i:before{ color:#fff;}';

$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style9 .zolo_gradient_icon{'.$icon_backgroundcolor_scheme.'}';

$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style9:hover .zolo_gradient_icon{'.$icon_hover_backgroundcolor_scheme.'}';

	}
/*if($style == 'iconbox_style10'){	
$box_bottom_paddingstyle1 = $box_bottom_padding_style1 + 10; 
$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style10 .zolo_gradient_icon_description{margin-bottom:-'.$box_bottom_paddingstyle1.'px;}';

}*/




// Button CSS Code Start

if($button_swing == 'yes'){
	$shortcode_css .= '.'.$zolo_button_id.' .zolo_button:hover{ transform:translateY(-3px); -moz-transform:translateY(-3px); -webkit-transform:translateY(-3px); -ms-transform:translateY(-3px); -o-transform:translateY(-3px);}';
}

$shortcode_css .= '.zolo_gradient_icon_box_element .zolo_gradient_iconbox_button_wrap .zolo_button_element{margin-bottom:0;}';

$shortcode_css .= '.'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_iconbox_button_wrap{ padding-top:'.$button_top_margin.'px;}';

if($button_shape == 'square' || $button_shape == 'rounded' || $button_shape == 'round' || $button_shape == 'style7' || $button_shape == 'style10'){
	$shortcode_css .= '.'.$zolo_button_id.' .zolo_button{'.$button_shadow.'}';
	$shortcode_css .= '.zolo_gradient_icon_box_element:hover .'.$zolo_button_id.' .zolo_button{'.$button_hover_shadow.'}';
	$shortcode_css .= '.'.$zolo_button_id.'.zolo_button_size_design_your_own .zolo_button{padding:'.$padding_top_bottom.'px '.$padding_right_left.'px;}';

	if($button_color_scheme_1 == 'design_your_own'){
		
		if($button_border_color != ''){
		$button_bordercolor_value = 'border:1px solid '.$button_border_color.';';
		}
		
		$shortcode_css .= '.'.$zolo_button_id.'.zolo_button_hoverstyle6 .zolo_button,
		.'.$zolo_button_id.'.zolo_button_hoverstyle1 .zolo_button,
		.'.$zolo_button_id.' .zolo_button{'.$button_bordercolor_value.' background:'.$button_bg_color.';}';
		
		$shortcode_css .= '.zolo_gradient_icon_box_element:hover .'.$zolo_button_id.'.zolo_button_hoverstyle6 .zolo_button,
		.zolo_gradient_icon_box_element:hover .'.$zolo_button_id.'.zolo_button_hoverstyle1 .zolo_button,
		.'.$zolo_button_id.' .zolo_button:after{ background:'.$button_bg_color_h.';border-color:'.$button_border_color_h.'; }';	
		
		$shortcode_css .= '.zolo_gradient_icon_box_element:hover .'.$zolo_button_id.' .zolo_button{ border-color:'.$button_border_color_h.'; }';		
	
	}else{
		
		$shortcode_css .= '.zolo_gradient_icon_box_element:hover .'.$zolo_button_id.' .zolo_button,.'.$zolo_button_id.' .zolo_button{'.$color_scheme_css.'}';
	}


}else if($button_shape == 'style4'){ 

	$shortcode_css .= '.'.$zolo_button_id.' .zolo_button_style4{color:'.$apress_data["button_text_color"].';}';
	$shortcode_css .= '.'.$zolo_button_id.'.zolo_button_element .zolo_button_style4:before{ background-color:'.$button_border_color_for_style4.'; height:'.$button_border_height_for_style4.'px;}';
	$shortcode_css .= '.'.$zolo_button_id.'.zolo_button_element .zolo_button_style4:after{height:'.$button_border_height_for_style4.'px;'.$color_scheme_css.'}';
	$shortcode_css .= '.'.$zolo_button_id.' .zolo_button{padding:'.$padding_top_bottom_for_style4.'px 0px;}';

}else if($button_shape == 'style5' || $button_shape == 'style9'){
			
	$shortcode_css .= '.'.$zolo_button_id.'.zolo_button_element .zolo_button{ border-color:'.$button_border_color_for_style5.';}';
	$shortcode_css .= '.zolo_gradient_icon_box_element:hover .'.$zolo_button_id.'.zolo_button_element .zolo_button{border-color:'.$button_hover_border_color_for_style5.';}';
	$shortcode_css .= '.'.$zolo_button_id.'.zolo_button_element .zolo_button .button_icon{ background:'.$button_border_color_for_style5.';color:'.$button_icon_color.';}';
	$shortcode_css .= '.zolo_gradient_icon_box_element:hover .'.$zolo_button_id.'.zolo_button_element .zolo_button .button_icon{ background:'.$button_hover_border_color_for_style5.';color:'.$button_icon_hover_color.';}';
	$shortcode_css .= '.'.$zolo_button_id.'.zolo_button_size_design_your_own .zolo_button{padding:'.$padding_top_bottom.'px '.$padding_right_left.'px;}';
	
}else if($button_shape == 'style6' || $button_shape == 'style8'){	
		
	$shortcode_css .= '.'.$zolo_button_id.' .zolo_button_style6.zolo_button{padding:'.$padding_top_bottom_for_style4.'px 5px '.$padding_top_bottom_for_style4.'px 0px;}';
	$shortcode_css .= '.'.$zolo_button_id.' .zolo_button_style8.zolo_button{padding:'.$padding_top_bottom_for_style4.'px 0px '.$padding_top_bottom_for_style4.'px 5px;}';
	
		if($button_icon_bg_color_show == 'yes'){
			$shortcode_css .= '.'.$zolo_button_id.'.zolo_button_element .zolo_button .button_icon{ background:'.$icon_bg_color_for_style6.';color:'.$button_icon_color.';margin-left:12px;width:2em; height:2em; line-height:1.9em;line-height: 31px;}';
			$shortcode_css .= '.zolo_gradient_icon_box_element:hover .'.$zolo_button_id.'.zolo_button_element .zolo_button .button_icon{ background:'.$icon_hover_bg_color_for_style6.';color:'.$button_icon_hover_color.';}';
		} 
}
if($button_shape == 'style7' || $button_shape == 'style10'){
		
	$shortcode_css .= '.'.$zolo_button_id.'.zolo_button_element .zolo_button .button_icon{ color:'.$button_icon_color.'; width:40px; height:40px; line-height:40px;}';
	$shortcode_css .= '.zolo_gradient_icon_box_element:hover .'.$zolo_button_id.'.zolo_button_element .zolo_button .button_icon{ color:'.$button_icon_hover_color.';}';
}

if(!empty($button_text_color)){
	
	$shortcode_css .= '.'.$zolo_button_id.'.zolo_button_hoverstyle6 .zolo_button,
	.'.$zolo_button_id.'.zolo_button_hoverstyle1 .zolo_button,
	.'.$zolo_button_id.' .zolo_button{color:'.$button_text_color.';}';
	
	$shortcode_css .= '.zolo_gradient_icon_box_element:hover .'.$zolo_button_id.'.zolo_button_hoverstyle6 .zolo_button,
	.zolo_gradient_icon_box_element:hover .'.$zolo_button_id.'.zolo_button_hoverstyle1 .zolo_button,
	.'.$zolo_button_id.' .zolo_button:after,
	.'.$zolo_button_id.' .zolo_button:focus,
	.zolo_gradient_icon_box_element:hover .'.$zolo_button_id.' .zolo_button{color:'.$button_text_color_h.';}';
	
}else{
	
	$shortcode_css .= '.'.$zolo_button_id.' .zolo_button,
	.'.$zolo_button_id.' .zolo_button:focus,
	.zolo_gradient_icon_box_element:hover .'.$zolo_button_id.' .zolo_button{'.$color_scheme_css.' color:'.$apress_data["button_text_color"].';}';
}
// Button CSS Code End


apcore_save_plugin_dyn_styles( $shortcode_css );