<?php 
/*-----------------------------------------------------------------------------------*/
/* Info Tabs Parent
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Info_Tabs_Wrapper extends WPBakeryShortCodesContainer {}

if ( function_exists( 'vc_map' ) ) {
vc_map( array(
		"name"						=>  __( 'Info Tabs Wrapper', 'apcore' ),
		"base"						=> "apress_info_tabs_wrapper",
		"as_parent"					=> array('only' => 'apress_info_tab_item'), 
		"content_element"			=> true,
		"category"					=> __( "Apress", "apcore"),
		"description"				=> __("Beutiful info tabs design", "apcore"),
		"icon"						=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-tab.png",
		"show_settings_on_create" 	=> false,
		"js_view"					=> 'VcColumnView',
		'params'					=> array(
			
			array(
				'type'        => 'radio_image_select',
				'heading'     => esc_html__( 'Style', 'apcore' ),
				'param_name'  => 'info_tabs_style',
				'simple_mode' => false,
				'options'     => array(
					'info_tabs_style1' => array(
						'tooltip' => esc_attr__('Info Tabs Style1','apcore'),
						'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/info_tab/info_tab_style1.jpg'
					),
					'info_tabs_style2' => array(
						'tooltip' => esc_attr__('Info Tabs Style2','apcore'),
						'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/info_tab/info_tab_style2.jpg'
					),
				),					
			),
			
			array(
				'type'				=> 'zolo_radio_advanced',
				'heading'			=> esc_html__('Tabs Alignment', 'apcore'),
				'param_name'		=> 'info_tabs_alignment',
				'value'				=> 'left',
				'options'			=> array(
					esc_html__('Left', 'apcore') 	=> 'left',
					esc_html__('Right', 'apcore')	=> 'right',
					esc_html__('Top', 'apcore')		=> 'top',
					esc_html__('Bottom', 'apcore')	=> 'bottom'
				),
			),
			
			array(
				"type"				=> "colorpicker",
				"heading"			=> __("Background Color",'apcore'),
				'param_name'		=> "infotab_bg_color",
				"value"				=> '#ffffff',
			),
			array(
				"type"				=> "colorpicker",
				"heading"			=> __("Active Start Color",'apcore'),
				'param_name'		=> "infotab_active_bg_start_color",
				"value"				=> '#3d81f0',
				'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
			),
			array(
				"type"				=> "colorpicker",
				"heading"			=> __("Active End Color",'apcore'),
				'param_name'		=> "infotab_active_bg_end_color",
				"value"				=> '#3d81f0',
				'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
			),
			
			array(
				"type"				=> "colorpicker",
				"heading"			=> __("Active Text Color",'apcore'),
				'param_name'		=> "infotab_active_text_color",
				"value"				=> '#ffffff',
			),
			array(
				'type'				=> 'textfield',
				'heading'			=> __( 'Extra class name', 'apcore' ),
				'param_name'		=> 'el_class',
				'description'		=> __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'apcore' ),
			),	
			array(
				"type"				=> "dropdown",
				"class"				=> "",
				"heading"			=> __("CSS Animation",'apcore'),
				"param_name"		=> "data_animation",
				"value"				=> apress_data_animations(),
				"description"		=> __("Select type of animation. Note: Works only in modern browsers.",'apcore'),
				"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-8 no-top-margin",
			),  
			array(
				"type"				=> "textfield",
				"class"				=> "",
				"heading"			=> __("Delay","apcore"),
				"param_name"		=> "data_delay",
				"value"				=> "0",
				"description"		=> __("Delay","apcore"),
				"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-4 no-top-margin",
			),
			array(
				"type"				=> "zolo_video_link_param",
				"heading"			=> esc_html__("Video tutorial and theme documentation article","apcore"),
				"param_name"		=> "tutorials",
				"doc_link"			=> $doc_link,
				"video_link"		=> "https://youtu.be/OrK1A77Prjc",
			),
			
		)
	));		
}		
