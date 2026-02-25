<?php 
/*-----------------------------------------------------------------------------------*/
/* Pricing Table Switch
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Pricing_Table_Switch extends WPBakeryShortCode {}

$doc_link = 'http://apresswp.com/help';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
					"name"			=> __("Pricing Table Switch", 'apcore'),
					"base"			=> "apress_pricing_table_switch",
					"weight"		=> 12,
					"class"			=> "",
					"category"		=> __( "Apress", "apcore"),
					"description"	=> __( "Amazing Pricing Table Switch", "apcore"),
					"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-switch.jpg",
					"params"		=> array(						
						
						array(
							"type"				=> "textfield",
							"heading"			=> __("Heading 1",'apcore'),
							"param_name"		=> "pricing_table_switch_heading1",
							"value"				=> 'Monthly',
						),
						array(
							"type"				=> "textfield",
							"heading"			=> __("Heading 2",'apcore'),
							"param_name"		=> "pricing_table_switch_heading2",
							"value"				=> 'Annually',
						),
						array(
							"type"				=> "textfield",
							"heading"			=> __("Offer Text",'apcore'),
							"param_name"		=> "pricing_table_switch_off_text",
							"value"				=> '30%',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Heading Color",'apcore'),
							"param_name"		=> "switch_heading_color",
							'value'				=> '#000000',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Active Heading Color",'apcore'),
							"param_name"		=> "switch_active_heading_color",
							'value'				=> '#5270d0',
						),
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Alignment', 'apcore'),
							'param_name'		=> 'switch_alignment',
							'value'				=> 'center',
							'options'			=> array(
								esc_html__('Left', 'apcore') 	=> 'left',
								esc_html__('Center', 'apcore')	=> 'center',
								esc_html__('Right', 'apcore')	=> 'right',
							),
						),
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Switch Color",'apcore'),
							"param_name"		=> "switch_color",
							'value'				=> '#000000',
						),
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Active Switch Color",'apcore'),
							"param_name"		=> "active_switch_color",
							'value'				=> '#5270d0',
						),
						array(
						   'type'    => 'zolo_box_shadow_param',
						   'heading'	=> esc_html__('Box Shadow', 'apcore'),
						   'param_name' => 'box_shadow',
						   "value"		=> 'box_shadow_enable:enable|shadow_horizontal:0|shadow_vertical:7|shadow_blur:15|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
						),
					
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Extra features', 'apcore'),
							'param_name'		=> 'subtitle_margin_heading',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
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
							"value"				=> "500",
							"description"		=> __("Delay","apcore"),
							"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-4 no-top-margin",
						),
						array(
							"type"				=> "zolo_video_link_param",
							"heading"			=> esc_html__("Video tutorial and theme documentation article","apcore"),
							"param_name"		=> "tutorials",
							"doc_link"			=> $doc_link,
							"video_link"		=> "https://youtu.be/4JYsV-7IPME",
						),	
					),
					) );		
		
			}		