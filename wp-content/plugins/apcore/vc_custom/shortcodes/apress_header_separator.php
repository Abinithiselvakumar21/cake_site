<?php 
/*-----------------------------------------------------------------------------------*/
/* Header Separator
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Header_Separator extends WPBakeryShortCode {}

if ( function_exists( 'vc_map' ) ) {
vc_map( array(
		"name"						=>  __( 'Separator', 'apcore' ),
		"base"						=> "apress_header_separator",
		"category"					=> __( "Header Modules", "apcore"),
		"description"				=> __( "Separator for Header Section", "apcore"),
		"icon"						=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-vertical_separator.png",
		'params'					=> array(
			
			array(
				'type' 				=> 'zolo_number',
				'heading' 			=> __("Separator Width",'apcore'),
				'param_name'		=> 'separator_width',
				'value'				=> '1',
				'suffix'			=> 'px',
			),
			array(
				'type'				=> 'colorpicker',
				'heading'			=> esc_html__('Separator Color', 'apcore'),
				'param_name'		=> 'separator_color',
				"value" 			=> '#f2f2f2',
				'dependency'		=> array('element' => 'animation_type', 'value' => 'clipping'),
				'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
			),
			
			 
			array(
				'type' 				=> 'zolo_number',
				'heading' 			=> __("Left Margin",'apcore'),
				'param_name'		=> 'left_margin',
				'value'				=> '0',
				'suffix'			=> 'px',
			),
			array(
				'type' 				=> 'zolo_number',
				'heading' 			=> __("Right Margin",'apcore'),
				'param_name'		=> 'right_margin',
				'value'				=> '0',
				'suffix'			=> 'px',
			),
			
		)
	));		
}		
