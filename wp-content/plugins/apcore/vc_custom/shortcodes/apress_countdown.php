<?php 
/*-----------------------------------------------------------------------------------*/
/* Countdown
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Countdown extends WPBakeryShortCode {}

$doc_link = 'http://apresswp.com/help';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
					"name"			=> __("Countdown", 'apcore'),
					"base"			=> "apress_countdown",
					"weight"		=> 12,
					"class"			=> "",
					"category"		=> __( "Apress", "apcore"),
					"description"	=> __( "Show different Countdown", "apcore"),
					"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-countdown.jpg",
					"params"		=> array(							
						array(
							'type'        => 'radio_image_select',
							'heading'     => esc_html__( 'Style', 'apcore' ),
							'param_name'  => 'style',
							'simple_mode' => false,
							'options'     => array(
								'style1' => array(
									'tooltip' => esc_attr__('Style1','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/button/button_style1.jpg'
								),
								'style2' => array(
									'tooltip' => esc_attr__('Style2','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/button/button_style2.jpg'
								),
								'style3' => array(
									'tooltip' => esc_attr__('Style3','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/button/button_style3.jpg'
								),
								'style4' => array(
									'tooltip' => esc_attr__('Style4','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/button/button_style4.jpg'
								),
							),					
						),
						
						
						
						
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Date / Time Limitations",'apcore'),
							"param_name"		=> "counter_scope",
							'value'				=> array(
								__("Specific Date Only",'apcore') 		=> "date_only",
								__("Specific Date and Time",'apcore') 	=> "date_time_only",
							),
						),	
						
						
						
						
						array(
							"type"				=> "datetime_picker",
							"heading"			=> __("Date","apcore"),
							"param_name"		=> "counter_date",
							"period"			=> "date",
							"value"				=> "",
							"admin_label"		=> true,
							'dependency'		=> array( 'element' => 'counter_scope', 'value' => array('date_only')),
							"description"		=> __("Select the date to which you want to count down to.","apcore"),
						),
						array(
							"type"				=> "datetime_picker",
							"heading"			=> __("Date / Time","apcore"),
							"param_name"		=> "counter_datetime",
							"period"			=> "datetime",
							"value"				=> "",
							"admin_label"		=> true,
							'dependency'		=> array( 'element' => 'counter_scope', 'value' => array('date_time_only')),
							"description"		=> __("Select the date and time to which you want to count down to.","apcore"),
						),
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Extra features', 'apcore'),
							'param_name'		=> 'subtitle_margin_heading',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
						),
						array(
							"type"				=> "textfield",
							"heading"			=> __("Extra class name","apcore"),
							"param_name"		=> "class",
							"value"				=> "",
							"description"		=> __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.","apcore"),
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