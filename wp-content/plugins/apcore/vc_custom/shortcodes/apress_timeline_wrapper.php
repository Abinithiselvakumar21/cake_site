<?php 
/*-----------------------------------------------------------------------------------*/
/* Timeline Parent
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Timeline_Wrapper extends WPBakeryShortCodesContainer {}

if ( function_exists( 'vc_map' ) ) {
vc_map( array(
		"name"						=>  __( 'Timeline Wrapper', 'apcore' ),
		"base"						=> "apress_timeline_wrapper",
		"as_parent"					=> array('only' => 'apress_timeline_item'), 
		"content_element"			=> true,
		"category"					=> __( "Apress", "apcore"),
		"description"				=> __("Beutiful Timeline Design", "apcore"),
		"icon"						=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-vertical_timeline.jpg",
		"show_settings_on_create" 	=> false,
		"js_view"					=> 'VcColumnView',
		'params'					=> array(
			array(
				'type'				=> 'colorpicker',
				'heading'			=> esc_html__('Pagination/Navigation Color', 'apcore'),
				'param_name'		=> 'pagination_color',
				"value" 			=> '#ef3774',
				'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
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
