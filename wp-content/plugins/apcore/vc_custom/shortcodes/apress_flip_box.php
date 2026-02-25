<?php 
/*-----------------------------------------------------------------------------------*/
/* Flip Box
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Flip_Box extends WPBakeryShortCodesContainer {}

if ( function_exists( 'vc_map' ) ) {
vc_map( array(
		"name"						=>  __( 'Flip Box', 'apcore' ),
		"base"						=> "apress_flip_box",
		"as_parent"					=> array('only' => 'apress_flip_box_front,apress_flip_box_back'), 
		"content_element"			=> true,
		"category"					=> __( "Apress", "apcore"),
		"description"				=> __( "Flip Box", "apcore"),
		"icon"						=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-flipbox.jpg",
		"show_settings_on_create"	=> false,
		"js_view"					=> 'VcColumnView',
		'params'					=> array(
			array(
				'type'				=> 'dropdown',
				'heading'			=> esc_html__('Flip Type', 'apcore'),
				'param_name'		=> 'flip_type',
				'value'				=> array(
					esc_html__('Horizontal', 'apcore')	=> 'flip_horizontal',
					esc_html__('Vertical', 'apcore')	=> 'flip_vertical'
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
	
class WPBakeryShortCode_Apress_Flip_Box_Front  extends WPBakeryShortCodesContainer {}
if ( function_exists( 'vc_map' ) ) {
vc_map( array(
		"name"						=>  __( 'Flip Box Front', 'apcore' ),
		"base"						=> "apress_flip_box_front",
		'as_parent'					=> array('except' => 'apress_flip_box'),
  		'as_child'					=> array('only' => 'apress_flip_box'),
		"content_element"			=> true,
		"category"					=> __( "Apress", "apcore"),
		"icon"						=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-flipbox-front.jpg",
		"show_settings_on_create" 	=> true,
		"js_view"					=> 'VcColumnView',
		"params"				=> array(			
			array(
				'type'				=> 'textfield',
				'heading'			=> esc_html__('Extra class name', 'apcore'),
				'param_name'		=> 'el_class',
				'description'		=> esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'apcore')
			),
			array(
				"type"				=> "css_editor",
				"heading"			=> __( "CSS box", "apcore" ),
				"param_name"		=> "css",
				"group"				=> __( "Design Options", "apcore" ),
			),
				
		)
	) );		
}	

class WPBakeryShortCode_Apress_Flip_Box_Back  extends WPBakeryShortCodesContainer {}
if ( function_exists( 'vc_map' ) ) {
vc_map( array(
		"name"						=>  __( 'Flip Box Back', 'apcore' ),
		"base"						=> "apress_flip_box_back",
		'as_parent'					=> array('except' => 'apress_flip_box'),
  		'as_child'					=> array('only' => 'apress_flip_box'),
		"content_element"			=> true,
		"category"					=> __( "Apress", "apcore"),
		"icon"						=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-flipbox-back.jpg",
		"show_settings_on_create" 	=> true,
		"js_view"					=> 'VcColumnView',
		"params"				=> array(			
			array(
				'type'				=> 'textfield',
				'heading'			=> esc_html__('Extra class name', 'apcore'),
				'param_name'		=> 'el_class',
				'description'		=> esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'apcore')
			),
			
			array(
				"type"				=> "css_editor",
				"heading"			=> __( "CSS box", "apcore" ),
				"param_name"		=> "css",
				"group"				=> __( "Design Options", "apcore" ),
			),
				
		)
	) );		
}	