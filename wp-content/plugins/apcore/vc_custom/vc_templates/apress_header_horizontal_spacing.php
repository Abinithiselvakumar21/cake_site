<?php 
/*-----------------------------------------------------------------------------------*/
/* Header Horizontal Spacing
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract( shortcode_atts( array(
	'horizontal_spacing_width'	=> '10',
), $atts ) );
			
	$uniqid = uniqid(rand());
	$zolo_horizontal_spacing_id = 'zolo_horizontal_spacing_element_'.$uniqid;
		
	$output = '<div class="header_module_wrapper"><div id="'.$zolo_horizontal_spacing_id.'" class="header_horizontal_spacing_element" style="width:'.$horizontal_spacing_width.'px;"></div></div>';
	
	echo $output;
