<?php 
/*-----------------------------------------------------------------------------------*/
/* Testimonial shortcode
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
extract( shortcode_atts( array(
	'style'   					=> 'blockquote_style1',
	'blockquote_image'			=> '',
	'author_image'   			=> '',
	'author_name'				=> 'Matt Tucker',
	'color_scheme'				=> 'design_your_own',
	'box_background_color'		=> '#f2f2f2',
	'box_border_color'			=> '#3b65d6',
	'box_shadow'				=> 'box_shadow_enable:disable|shadow_horizontal:0|shadow_vertical:2|shadow_blur:10|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
	'box_top_padding'			=> '40px',
	'box_right_padding'			=> '40px',
	'box_bottom_padding'		=> '40px',
	'box_left_padding'			=> '40px',
	'title_font_options'		=> '',
	'title_google_fonts'		=> '',
	'title_custom_fonts'		=> '',
	'description_font_options'	=> '',
	'description_google_fonts'	=> '',
	'description_custom_fonts'	=> '',
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
	
	$wrap_class = array();
	$title_html = $description_html = '';

	$uniqid = uniqid(rand());
	$c = 'acp_'.$uniqid;
	
	$wrap_class[] = 'zolo_blockquote'.$c;
	$wrap_class[] = 'zolo_blockquote_element';
	$wrap_class[] = 'zolo_'.$style;
	$wrap_class[] = $animatedclass;
	$wrap_class[] = $class;
	
	
	if($color_scheme == 'design_your_own'){
		$key = '';
	}else{
		$key = $color_scheme;
	} 
	$color_scheme_css_for_background = apcore_shortcodes_background_color_scheme($key);
	
	// Title HTML.
	if (!empty($content)) {
		$title_options = _zolo_parse_text_shortcode_params($title_font_options, '', $title_google_fonts, $title_custom_fonts);
		$title_html .= '<'.$title_options['tag'].' class="zolo_blockquote_title" ' . $title_options['style'] . '>' . wpb_js_remove_wpautop($content) .'</'.$title_options['tag'].'>';
	}
	
	// Description Text HTML.
	if (!empty($author_name)) {
		$description_options = _zolo_parse_text_shortcode_params($description_font_options, '', $description_google_fonts, $description_custom_fonts);
		$description_html .= '<span class="zolo_blockquote_author_name" ' . $description_options['style'] . '>' . esc_html($author_name) . '</span>';
	}


	$img = wp_get_attachment_image_src($blockquote_image,'full');
	if ( ! empty( $img ) ) {
	$blockquote_image = $img[0];
	}
	$img2 = wp_get_attachment_image_src($author_image,'full');
	if ( ! empty( $img2 ) ) {
	$author_image = $img2[0];
	}
	
	$wrap_class = implode( ' ', $wrap_class );


$output = '';

$output .= '<div class="'.$wrap_class.'" data-animation = "'.$data_animation.'" data-delay = "'.$data_delay.'">';

$output .= '<div class="zolo_blockquote_content">';

$output .= '<div class="zolo_blockquote_content_top">';
if(!empty($blockquote_image)){
$output .= '<span class="zolo_blockquote_icon_img"><img src="'.$blockquote_image.'"/></span>';
}
$output .= $title_html;
$output .= '</div>';

if(!empty($description_html) || !empty($author_image)){
$output .= '<span class="zolo_blockquote_author_area">';
if(!empty($author_image)){
$output .= '<span class="zolo_blockquote_author_img"><img src="'.$author_image.'"/></span>';
}
$output .= $description_html;
$output .= '</span>';
}


$output .= '</div>';


$output .= '</div>';


echo $output;




$custom_css = '';


if(substr_count($box_shadow, 'disable') == 0) {
	$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
	$custom_css .= '.zolo_blockquote'.$c.'{'.$box_shadow.'}';
}
if($color_scheme == 'design_your_own'){
	if(!empty($box_background_color)){
	$custom_css .= '.zolo_blockquote'.$c.' .zolo_blockquote_content{background-color:'.$box_background_color.';}';
	}
	
}else{
	$custom_css .= '.zolo_blockquote'.$c.' .zolo_blockquote_content{'.$color_scheme_css_for_background.'}';
}

$custom_css .= '.zolo_blockquote'.$c.' .zolo_blockquote_content{padding:'.$box_top_padding.' '.$box_right_padding.' '.$box_bottom_padding.' '.$box_left_padding.';}';

//blockquote_style1
if($style == 'blockquote_style1'){
	if(!empty($box_border_color)){
		$custom_css .= '.zolo_blockquote'.$c.'{border-color:'.$box_border_color.';}';
	}
}

//blockquote_style2
if($style == 'blockquote_style2'){
	if(!empty($box_border_color)){
		$custom_css .= '.zolo_blockquote'.$c.'{border-color:'.$box_border_color.';}';
		$custom_css .= '.zolo_blockquote'.$c.'.zolo_blockquote_element.zolo_blockquote_style2:after,
		.zolo_blockquote'.$c.'.zolo_blockquote_element.zolo_blockquote_style2:before,
		.zolo_blockquote'.$c.'.zolo_blockquote_element.zolo_blockquote_style2 .zolo_blockquote_content:after,
		.zolo_blockquote'.$c.'.zolo_blockquote_element.zolo_blockquote_style2 .zolo_blockquote_content:before{background:'.$box_border_color.';}';
	}
}

apcore_save_plugin_dyn_styles( $custom_css );
