<?php 
/*-----------------------------------------------------------------------------------*/
/* Horizontal Scrolling Text
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract( shortcode_atts( array(
	'scrolling_duration'		=> '30s',
	'title_font_options'		=> '',
	'title_google_fonts'		=> '',
	'title_custom_fonts'		=> '',
	'title_responsive'			=> '',
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
	
	$uniqid = uniqid(rand());
	$zolo_element_id = 'zolo_element_'.$uniqid;
	$title_html = '';

?>	

<?php
	// Title HTML.
	if (!empty($content)) {
		$title_options = _zolo_parse_text_shortcode_params($title_font_options, '', $title_google_fonts, $title_custom_fonts);		
		$title_html .= '<'.$title_options['tag']. ' class="zolo_horizontal_scrolling_text" ' . $title_options['style'] . '>'.wpb_js_remove_wpautop($content).'</' . $title_options['tag'].'>';
	}
	
	$output = '<div class="'.$zolo_element_id.' zolo_horizontal_scrolling_text_element '.$animatedclass.' '.$class.'" data-animation = "'.$data_animation.'" data-delay = "'.$data_delay.'" ' . $title_options['style'] . '>';
	$output .= '<div class="zolo_horizontal_scrolling_text_wrap"><div class="zolo_horizontal_scrolling_title">';
	$output .= $title_html;
	$output .= ' '.$title_html;
	$output .= '</div></div></div>';
	
	echo $output;
	
	$custom_css = '';
	if(isset($title_responsive) && $title_responsive != '') {
		$custom_css .= Zolo_Resposive_Text_Param::responsive_css($title_responsive, '.' . esc_js($zolo_element_id) . '.zolo_horizontal_scrolling_text_element,.' . esc_js($zolo_element_id) . ' .zolo_horizontal_scrolling_text');
	}
	$custom_css .= '.'.$zolo_element_id.' .zolo_horizontal_scrolling_text_wrap > .zolo_horizontal_scrolling_title{-webkit-animation-duration: '.$scrolling_duration.'; animation-duration: '.$scrolling_duration.';}';
	
	apcore_save_plugin_dyn_styles( $custom_css );
	?>