<?php 
/*-----------------------------------------------------------------------------------*/
/* Header Separator
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract( shortcode_atts( array(
	'separator_width'				=> '1',
	'separator_color'				=> '#f2f2f2',
	'left_margin'					=> '0',
	'right_margin'					=> '0',
), $atts ) );
			
	$uniqid = uniqid(rand());
	$zolo_separator_id = 'zolo_separator_element_'.$uniqid;
	
$output = '<div class="header_module_wrapper"><div id="'.$zolo_separator_id.'" class="header_separator_element header_separator"><div class="header_separator_shape"></div></div></div>';

echo $output;

// CSS Start
$shortcode_css = '';
$shortcode_css .= '#'.$zolo_separator_id.'.header_separator_element.header_separator{ width:'.$separator_width.'px;margin-right:'.$right_margin.'px;margin-left: '.$left_margin.'px;}';
$shortcode_css .= '#'.$zolo_separator_id.'.header_separator_element .header_separator_shape{ background:'.$separator_color.';}';
apcore_save_plugin_dyn_styles( $shortcode_css );
