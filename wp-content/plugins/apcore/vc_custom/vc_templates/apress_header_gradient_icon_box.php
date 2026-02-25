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
	'icon_alignment'			=> 'left',
	'box_top_padding'			=> '40',
	'box_right_padding'			=> '40',
	'box_bottom_padding'		=> '40',
	'box_left_padding'			=> '40',
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
	'icon_fontawesome'			=> 'fa fa-rocket',
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
	'icon_left_right_gap'			=> '14',
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
	'box_top_padding_style1'		=> '40',
	'box_right_padding_style1'		=> '40',
	'box_bottom_padding_style1'		=> '40',
	'box_left_padding_style1'		=> '40',
	'box_shadow_style1'				=> 'box_shadow_enable:disable|shadow_horizontal:0|shadow_vertical:2|shadow_blur:10|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.08)',
	'box_hover_shadow_style1'		=> 'box_shadow_enable:enable|shadow_horizontal:0|shadow_vertical:7|shadow_blur:90|shadow_spread:-38|box_shadow_color:rgba(0%2C0%2C0%2C0.3)',
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
	$attributes[] = 'class="header_gradient_icon_link"';
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



$gradient_icon_wrap_class[] = 'zolo_header_gradient_icon_box_element zolo_gradient_icon_box_element';
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
	// Title HTML.
	if (!empty($content)) {
		$title_options = _zolo_parse_text_shortcode_params($title_font_options, 'zolo_gradient_icon_title', $title_google_fonts, $title_custom_fonts);
		$title_html .= '<'.$title_options['tag'].' class="zolo_gradient_icon_title" ' . $title_options['style'] . '>' . wpb_js_remove_wpautop($content) .'</'.$title_options['tag'].'>';
	}
	
	// Description Text HTML.
	if (!empty($description)) {
		$description_options = _zolo_parse_text_shortcode_params($description_font_options, 'zolo_gradient_icon_description', $description_google_fonts, $description_custom_fonts);
		$description_html .= '<span class="zolo_gradient_icon_description" ' . $description_options['style'] . '>' . esc_html($description) . '</span>';
	}
	

	$output = '<div class="header_module_wrapper"><div id="'.$zolo_gradient_icon_id.'" class="'.$gradient_icon_wrap_class.' '.$animatedclass.' '.$class.'" data-animation = "'.$data_animation.'" data-delay = "'.$data_delay.'">';
	
	
	if($style == 'iconbox_style8'){
		
	$output .= '<div class="zolo_gradient_icon_box_area"><div class="zolo_gradient_icon_area_box">';
	if($icon_type == 'icon'){
		
			$output .= '<div class="zolo_gradient_icon_wrap"><div class="zolo_gradient_icon"><i class="'.$icon.'"></i></div></div>';
		}else if($icon_type == 'icon_svg'){
			
			$output .= '<div class="zolo_gradient_icon_wrap"><div class="zolo_gradient_icon"><div class="zolo_gradient_svg_icon" id="' . uniqid('apcore-svg-') . '" data-file="' . esc_url( $icon_image ) . '" data-duration="' . esc_attr( $icon_svg_animation_duration ) . '" data-color="'.$svg['color'].'" style="width:'.$gradient_icon_size.'px;height: auto;"></div></div></div>';
		}else{
			
			$output .= '<div class="zolo_gradient_icon zolo_gradient_icon_wrap"><div class="zolo_gradient_icon icon_style_image" style="width:'.$gradient_icon_size.'px;height: auto;"><img src="'.$icon_image.'"/></div></div>';
			}
	
	$output .= '<div class="zolo_gradient_iconbox_content_wrap">'.$title_html;
	
	$output .= $description_html;
	
	
	$output .= '</div>';
	$output .= '</div></div>';
	
	}else if($style == 'iconbox_style1'){
		
		$output .= '<div class="zolo_gradient_icon_box_area zolo_'.$icon_bg_position.' '.$on_hover_icon_bg_animation.'">';
		$output .= '<div class="zolo_gradient_icon_box_element_bg"></div>'. $gradient_icon_box_bg_html;
		if($icon_type == 'icon'){
			$output .= '<div class="zolo_gradient_icon_wrap"><div class="zolo_gradient_icon">'.$gradient_icon_bg_html.'<i class="'.$icon.'"></i></div></div>';
			
		}else if($icon_type == 'icon_svg'){
			$output .= '<div class="zolo_gradient_icon_wrap"><div class="zolo_gradient_icon">'.$gradient_icon_bg_html.'<div class="zolo_gradient_svg_icon" id="' . uniqid('apcore-svg-') . '" data-file="' . esc_url( $icon_image ) . '" data-duration="' . esc_attr( $icon_svg_animation_duration ) . '" data-color="'.$svg['color'].'" style="width:'.$gradient_icon_size.'px;height: auto;"></div></div></div>';
		
		}else{
			$output .= '<div class="zolo_gradient_icon_wrap"><div class="zolo_gradient_icon icon_style_image" style="width:'.$gradient_icon_size.'px;height: auto;">'.$gradient_icon_bg_html.'<img src="'.$icon_image.'"/></div></div>';
		}
	
	$output .= '<div class="zolo_gradient_iconbox_content_wrap">'.$title_html;
	
	$output .= $description_html;
	
	
	$output .= '</div>';
	$output .= '</div>';
	
	
	}else if($style == 'iconbox_style9' || $style == 'iconbox_style10'){
		
		$output .= '<div class="zolo_gradient_icon_box_area zolo_'.$icon_bg_position.' '.$on_hover_icon_bg_animation.'">';
		$output .= '<div class="zolo_gradient_icon_box_element_bg"></div>'. $gradient_icon_box_bg_html;
		if($icon_type == 'icon'){
			$output .= '<div class="zolo_gradient_icon_wrap"><div class="zolo_gradient_icon">'.$gradient_icon_bg_html.'<i class="'.$icon.'"></i></div></div>';
			
		}else if($icon_type == 'icon_svg'){
			$output .= '<div class="zolo_gradient_icon_wrap"><div class="zolo_gradient_icon">'.$gradient_icon_bg_html.'<div class="zolo_gradient_svg_icon" id="' . uniqid('apcore-svg-') . '" data-file="' . esc_url( $icon_image ) . '" data-duration="' . esc_attr( $icon_svg_animation_duration ) . '" data-color="'.$svg['color'].'" style="width:'.$gradient_icon_size.'px;height: auto;"></div></div></div>';
		
		}else{
			$output .= '<div class="zolo_gradient_icon_wrap"><div class="zolo_gradient_icon icon_style_image" style="width:'.$gradient_icon_size.'px;height: auto;">'.$gradient_icon_bg_html.'<img src="'.$icon_image.'"/></div></div>';
		}
	
	$output .= '<div class="zolo_gradient_iconbox_content_wrap">'.$title_html;
	
	$output .= $description_html;
	
	$output .= '</div>';
	
	$output .= '</div>';
	
	}else{
		if($icon_type == 'icon'){
			$output .= '<div class="zolo_gradient_icon_wrap"><div class="zolo_gradient_icon"><i class="'.$icon.'"></i></div></div>';
		}else if($icon_type == 'icon_svg'){
			$output .= '<div class="zolo_gradient_icon_wrap"><div class="zolo_gradient_icon"><div class="zolo_gradient_svg_icon" id="' . uniqid('apcore-svg-') . '" data-file="' . esc_url( $icon_image ) . '" data-duration="' . esc_attr( $icon_svg_animation_duration ) . '" data-color="'.$svg['color'].'" style="width:'.$gradient_icon_size.'px;height: auto;"></div></div></div>';
		}else{
			$output .= '<div class="zolo_gradient_icon_wrap"><div class="zolo_gradient_icon icon_style_image" style="width:'.$gradient_icon_size.'px;height: auto;"><img src="'.$icon_image.'"/></div></div>';
		}
	
	$output .= '<div class="zolo_gradient_iconbox_content_wrap">'.$title_html;
	
	$output .= $description_html;
		
	$output .= '</div>';
	
		}
		
	$output .= $link_start.$link_end;
	
	$output .= '</div></div>';
	
	echo $output;

// CSS
$shortcode_css = '';
	
$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon{ font-size:'.$gradient_icon_size.'px; 
margin-top: '.$icon_top_padding.'px; margin-bottom:'.$icon_bottom_padding.'px;}';

if($iconalignment == 'left'){
$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon_wrap{ margin-right: '.$icon_left_right_gap.'px;}';
}else if($iconalignment == 'right'){
$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon_wrap{ margin-left: '.$icon_left_right_gap.'px;}';
}




$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon,
#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon i,
#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon i:before{'.$icon_color.'display:inline-block;}';

$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style3 .zolo_gradient_icon:before,
#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style2 .zolo_gradient_icon,
#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style4 .zolo_gradient_icon{'.$icon_background.'}';

$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style5 .zolo_gradient_icon:after{'.$border_color.'}';

$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style7:after{'.$icon_background.'}';

if($icon_shadow == 'yes'){
$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style4 .zolo_gradient_icon,
#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style2 .zolo_gradient_icon{box-shadow: 3px 4px 18px 1px rgba(8, 21, 42, 0.26);}';

$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style8 .zolo_gradient_icon_area_box{ border:'.$highlight_border_width.'px solid '.$highlight_border_color.';}';

$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style8 .zolo_gradient_icon_area_box:before,
#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style8 .zolo_gradient_icon_box_area:before{height:'.$highlight_border_width.'px;'.$border_hover_colorscheme.'}';

$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style8 .zolo_gradient_icon_box_area:after,
#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style8 .zolo_gradient_icon_area_box:after{width:'.$highlight_border_width.'px;'.$border_hover_colorscheme.'}';

}else{echo '';}

if($style == 'iconbox_style7'){
$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style7{padding:'.$box_top_padding.'px '.$box_right_padding.'px '.$box_bottom_padding.'px '.$box_left_padding.'px '.'; background:'.$box_bg_color.'}';


$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style7{'.$box_shadow.'}';
$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style7:hover{'.$box_hover_shadow.'}';

}else if($style == 'iconbox_style8'){
$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style8 .zolo_gradient_icon_area_box{padding:'.$box_top_padding.'px '.$box_right_padding.'px '.$box_bottom_padding.'px '.$box_left_padding.'px '.'; background:'.$box_bg_color.';}';
$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style8{'.$box_shadow.'}';
$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style8:hover{'.$box_hover_shadow.'}';

}else if($style == 'iconbox_style1' || $style == 'iconbox_style9' || $style == 'iconbox_style10'){


//box_styling_enable Start
if($wrapbox_styling_enable == 'yes'){

if($wrapbox_bg_image_url){
	$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon_box_area{background-image: url('.$wrapbox_bg_image_url.');}';
	 }
$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon_box_area:after{ opacity:'.$wrapbox_bg_color_opacity.'; '.$wrapbox_background_color_scheme.'}';

if($wrapbox_hover_bg_image_url){
 $shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon_box_element_bg{background-image: url('.$wrapbox_hover_bg_image_url.');}';
}
$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon_box_element_bg:after{opacity:'.$wrapbox_hover_bg_color_opacity.';'.$wrapbox_hover_background_color_scheme.'}';

$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element:hover .zolo_gradient_icon_title,
#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element:hover .zolo_gradient_icon_description{color:'.$wrapbox_hover_text_color.'!important;}';

$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element:hover .zolo_gradient_icon,
#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element:hover .zolo_gradient_icon i,
#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element:hover .zolo_gradient_icon i:before{ color:'.$wrapbox_hover_text_color.'!important; background:none; display:inline-block;}';

$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element:hover .zolo_gradient_iconbox_button{color:'.$wrapbox_hover_text_color.';}';

if(substr_count($box_shadow_style1, 'disable') == 0) {
	$box_shadow_style1 = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow_style1);
	$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon_box_element_bg{'.$box_shadow_style1.'}';
}
if(substr_count($box_hover_shadow_style1, 'disable') == 0) {
	$box_hover_shadow_style1 = Zolo_Box_Shadow_Param::box_shadow_css($box_hover_shadow_style1);
	$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element:hover .zolo_gradient_icon_box_element_bg{'.$box_hover_shadow_style1.'}';
}
$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon_box_area{padding:'.$box_top_padding_style1.'px '.$box_right_padding_style1.'px '.$box_bottom_padding_style1.'px '.$box_left_padding_style1.'px '.';}';

if($wrapbox_overflow == 'yes'){
	$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element{overflow:visible;}';
}else{
	$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element{overflow:hidden;}';
	}

$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon_box_element_bg,
#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon_box_area:after,
#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon_box_area{ border-radius:'.$wrapbox_border_radius.'px;overflow: hidden;}';

}
//box_styling_enable End 

$bg_positiontop = !empty($bg_position_top) ? 'top:'.$bg_position_top.';' : '';
$bg_positionright = !empty($bg_position_right) ? 'right:'.$bg_position_right.';' : '';
$bg_positionleft = !empty($bg_position_left) ? 'left:'.$bg_position_left.';' : '';
$bg_positionbottom = !empty($bg_position_bottom) ? 'bottom:'.$bg_position_bottom.';' : '';
$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element .zolo_gradient_icon_bg{background-image: url('.$image_bg.');width:'.$gradient_icon_bg_size.'px; height:'.$gradient_icon_bg_size.'px;'.$bg_positiontop.$bg_positionright.$bg_positionleft.$bg_positionbottom.'}';

}

if($style == 'iconbox_style9'){
	
$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style9 .zolo_gradient_icon,
#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style9 .zolo_gradient_icon i,
#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style9 .zolo_gradient_icon i:before{'.$gradient_iconcolor_scheme.'display:inline-block;}';

$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style9:hover .zolo_gradient_icon,
#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style9:hover .zolo_gradient_icon i,
#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style9:hover .zolo_gradient_icon i:before{ color:#fff;}';

$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style9 .zolo_gradient_icon{'.$icon_backgroundcolor_scheme.'}';

$shortcode_css .= '#'.$zolo_gradient_icon_id.'.zolo_gradient_icon_box_element.zolo_gradient_icon_iconbox_style9:hover .zolo_gradient_icon{'.$icon_hover_backgroundcolor_scheme.'}';

	}

apcore_save_plugin_dyn_styles( $shortcode_css );