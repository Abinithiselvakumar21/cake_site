<?php 
/*-----------------------------------------------------------------------------------*/
/* List
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract( shortcode_atts( array(

	'list_title'				=> 'Title area',
	'list_item_margin'			=> '10',
	'list_link'					=> '',
	'list_background_color'		=> '#ffffff',
	'list_shadow'				=> 'box_shadow_enable:enable|shadow_horizontal:1|shadow_vertical:2|shadow_blur:4|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
	'list_hover_shadow'			=> 'box_shadow_enable:enable|shadow_horizontal:2|shadow_vertical:2|shadow_blur:7|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
	'list_swing'				=> 'no',
	'icon_family'				=> 'fontawesome',
	'icon_fontawesome'			=> 'fa fa-angle-right',
	'icon_openiconic'			=> 'vc-oi vc-oi-dial',
	'icon_typicons'				=> 'typcn typcn-adjust-brightness',
	'icon_entypo'				=> 'entypo-icon entypo-icon-note',
	'icon_linecons'				=> 'vc_li vc_li-heart',
	'icon_monosocial'			=> 'vc-mono vc-mono-fivehundredpx',
	'icon_linea'				=> 'icon-basic-heart',
	'icon_size'					=> '18',
	'color_scheme'				=> 'primary_color_scheme',
	'list_icon_color'			=> '#549ffc',
	'title_font_options'		=> '',
	'title_google_fonts'		=> '',
	'title_custom_fonts'		=> '',
	'class'						=> '',
	'data_animation'			=> 'No Animation',
	'data_delay'				=> '500',
	
), $atts ) );
			
	//Animation
	if($data_animation == 'No Animation'){
		$animatedclass = 'noanimation';
	}else{
		$animatedclass = 'animated hiding';
	}
if(substr_count($list_shadow, 'disable') == 0) {
	$list_shadow = Zolo_Box_Shadow_Param::box_shadow_css($list_shadow);
}
if(substr_count($list_hover_shadow, 'disable') == 0) {
	$list_hover_shadow = Zolo_Box_Shadow_Param::box_shadow_css($list_hover_shadow);
}

$attributes = array();
//parse link
$list_link = ( '||' === $list_link ) ? '' : $list_link;
$list_link = vc_build_link( $list_link );
$use_list_link = false;
if ( strlen( $list_link['url'] ) > 0 ) {
	$use_list_link = true;
	$a_href = $list_link['url'];
	$a_title = $list_link['title'];
	$a_target = $list_link['target'];
	$a_rel = $list_link['rel'];
}

if ( $use_list_link ) {
	$attributes[] = 'href="' . trim( $a_href ) . '"';
	$attributes[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
	if ( ! empty( $a_target ) ) {
		$attributes[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
	}
	if ( ! empty( $a_rel ) ) {
		$attributes[] = 'rel="' . esc_attr( trim( $a_rel ) ) . '"';
	}
}
$attributes = implode( ' ', $attributes );

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

	
	$uniqid = uniqid(rand());
	$zolo_service_list_element_id = 'zolo_list_element_'.$uniqid;
	
	$title_html = '';

	$title_google_fonts = 'yes';
	

if($color_scheme == 'design_your_own'){
	$key = '';
}else{
	$key = $color_scheme;
	}
$background_color_scheme = apcore_shortcodes_background_color_scheme($key);
$text_color_scheme = apcore_shortcodes_text_color_scheme($key);
$border_color_scheme = apcore_shortcodes_border_color_scheme($key);

if($color_scheme == 'design_your_own'){
	
	$icon_color = 'color:#fff;';
	$icon_background = 'background:'.$list_icon_color.';';
	$icon_color_hover = 'color:'.$list_icon_color.';';
	
}else{
	
	$icon_color = 'color:#fff;';
	$icon_background = $background_color_scheme;
	$icon_color_hover = $text_color_scheme;

}
?>	

<?php
	// Title HTML.
	if (!empty($list_title)) {
		$title_options = _zolo_parse_text_shortcode_params($title_font_options, '', $title_google_fonts, $title_custom_fonts);
		$title_html .= '<'.$title_options['tag'].' class="zolo_service_list_text" ' . $title_options['style'] . '>' . esc_html($list_title) .'</'.$title_options['tag'].'>';
	}
	
	$output = '';
	
	if($list_swing == 'yes'){
		$output .=  '<div class="zolo_box_swing zolo_box_swing3px">';
		}
	$output .= '<div id="'.$zolo_service_list_element_id.'" class="zolo_service_list_element '.$animatedclass.' '.$class.'" data-animation = "'.$data_animation.'" data-delay = "'.$data_delay.'">';
	
	$output .=  '<a ' . $attributes . ' class="zolo_service_list_link"></a>';
	
	$output .= '<div class="zolo_service_list_item">';
	
	$output .= '<div class="zolo_service_list_text_wrap">' .$title_html. '</div>';
	
	$output .= '<div class="zolo_service_list_icon_warp"><div class="zolo_service_list_icon"><i class="'.$icon.'"></i></div></div>';
	
	$output .= '</div></div>';
	if($list_swing == 'yes'){ 
		$output .=  '</div>'; 
		}
	
	echo $output;
	
	$custom_css = '';
	$custom_css .= '#'.$zolo_service_list_element_id .'.zolo_service_list_element{ background:'.$list_background_color.';'.$list_shadow.'}';
	$custom_css .= '#'.$zolo_service_list_element_id .'.zolo_service_list_element:hover{'.$list_hover_shadow.'}';
	$custom_css .= '#'.$zolo_service_list_element_id .'.zolo_service_list_element{ margin:'.$list_item_margin.'px 0;}';
	$custom_css .= '#'.$zolo_service_list_element_id .'.zolo_service_list_element:hover .zolo_service_list_text{ color:#fff!important;}';
	$custom_css .= '#'.$zolo_service_list_element_id .'.zolo_service_list_element:hover{'.$icon_background.'}';
	
	$custom_css .= '#'.$zolo_service_list_element_id .'.zolo_service_list_element .zolo_service_list_icon{ font-size:'.$icon_size.'px;'.$icon_background.'}';
	$custom_css .= '#'.$zolo_service_list_element_id .'.zolo_service_list_element .zolo_service_list_icon,
	#'.$zolo_service_list_element_id .'.zolo_service_list_element .zolo_service_list_icon i,
	#'.$zolo_service_list_element_id .'.zolo_service_list_element .zolo_service_list_icon i:before{'.$icon_color.'}';
	
	$custom_css .= '#'.$zolo_service_list_element_id .'.zolo_service_list_element:hover .zolo_service_list_icon{background:'.$list_background_color.'!important;}';
	
	$custom_css .= '#'.$zolo_service_list_element_id .'.zolo_service_list_element:hover .zolo_service_list_icon,
	#'.$zolo_service_list_element_id .'.zolo_service_list_element:hover .zolo_service_list_icon i,
	#'.$zolo_service_list_element_id .'.zolo_service_list_element:hover .zolo_service_list_icon i:before{'.$icon_color_hover.'}';
	
	
	apcore_save_plugin_dyn_styles( $custom_css );