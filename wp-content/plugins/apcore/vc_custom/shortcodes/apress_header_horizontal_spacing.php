<?php 
/*-----------------------------------------------------------------------------------*/
/* Header Horizontal Spacing
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Header_Horizontal_Spacing extends WPBakeryShortCode {}

if ( function_exists( 'vc_map' ) ) {
vc_map( array(
		"name"						=>  __( 'Horizontal Spacing', 'apcore' ),
		"base"						=> "apress_header_horizontal_spacing",
		"category"					=> __( "Header Modules", "apcore"),
		"description"				=> __( "Horizontal spacing for Header Section", "apcore"),
		"icon"						=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-horizontal_spacing.jpg",
		'params'					=> array(
			
			array(
				'type' 				=> 'zolo_number',
				'heading' 			=> __("Horizontal Spacing Width",'apcore'),
				'param_name'		=> 'horizontal_spacing_width',
				'value'				=> '10',
				'suffix'			=> 'px',
			),
			
			
		)
	));		
}		
