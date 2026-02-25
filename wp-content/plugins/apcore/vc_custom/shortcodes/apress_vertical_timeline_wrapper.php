<?php 
/*-----------------------------------------------------------------------------------*/
/* Vertical Timeline Parent
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Vertical_Timeline_Wrapper extends WPBakeryShortCodesContainer {}

if ( function_exists( 'vc_map' ) ) {
vc_map( array(
		"name"						=>  __( 'Vertical Timeline Wrapper', 'apcore' ),
		"base"						=> "apress_vertical_timeline_wrapper",
		"as_parent"					=> array('only' => 'apress_vertical_timeline_item'), 
		"content_element"			=> true,
		"category"					=> __( "Apress", "apcore"),
		"description"				=> __("Beutiful Timeline Design", "apcore"),
		"icon"						=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-vertical_timeline.jpg",
		"show_settings_on_create" 	=> false,
		"js_view"					=> 'VcColumnView',
		'params'					=> array(
			
			array(
				"type"				=> "colorpicker",
				"heading"			=> __("Border Color",'apcore'),
				"param_name"		=> "border_color",
				"value"				=> '#1769ff',
				'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
			),
			array(
				'type'				=> 'zolo_radio_advanced',
				'heading'			=> esc_html__('Style', 'apcore'),
				'param_name'		=> 'apress_vertical_timeline_style',
				'value'				=> 'apress_vertical_timeline_style1',
				'options'			=> array(
					esc_html__('Style 1', 'apcore')		=> 'apress_vertical_timeline_style1',
					esc_html__('Style 2', 'apcore') 	=> 'apress_vertical_timeline_style2',
				),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Extra class name', 'apcore'),
				'param_name'	=> 'el_class',
				'description'	=> esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'apcore')
			),
		)
	));		
}		
