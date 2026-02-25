<?php 
/*-----------------------------------------------------------------------------------*/
/* Vertical Text Block
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Vertical_Text_Block extends WPBakeryShortCode {}

$doc_link = 'http://apresswp.com/help';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
					"name"			=> __("Vertical Text Block", 'apcore'),
					"base"			=> "apress_vertical_text_block",
					"weight"		=> 12,
					"class"			=> "",
					"category"		=> __( "Apress", "apcore"),
					"description"	=> __( "Beautiful Vertical Text Block", "apcore"),
					"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-vertical-text.jpg",
					"params"		=> array(						
						
						array(
							'type'				=> 'textarea_html',
							'heading'			=> esc_html__('Text', 'apcore'),
							'param_name'		=> 'content',
							'value'				=> esc_html__('I am text block.','apcore'),
							'admin_label'		=> true,
						),
						array(
							'type'				=> 'zolo_font_container',
							'heading'			=> '',
							'param_name'		=> 'vertical_text_font_options',
							'settings'				=> array(
								'fields'				=> array(
									'font_size',
									'line_height',
								),
							),
							//'group'			=> esc_html__('Title Style', 'apcore'),
						),	
						
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Light Scheme Text Color",'apcore'),
							'param_name'		=> "vertical_text_block_color_light",
							"value"				=> '#000',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Dark Scheme Text Color",'apcore'),
							'param_name'		=> "vertical_text_block_color_dark",
							"value"				=> '#fff',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),
						
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Link Hover Color",'apcore'),
							'param_name'		=> "vertical_text_block_color_hover",
							"value"				=> '#333',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),
						
						
						
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Extra features', 'apcore'),
							'param_name'		=> 'subtitle_margin_heading',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
						),
						array(
							"type"				=> "textfield",
							"heading"			=> __("Extra class name", "apcore"),
							"param_name"		=> "class",
							"description"		=> __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "apcore")
						),
						array(
							"type"				=> "zolo_video_link_param",
							"heading"			=> esc_html__("Video tutorial and theme documentation article","apcore"),
							"param_name"		=> "tutorials",
							"doc_link"			=> $doc_link,
							"video_link"		=> "https://youtu.be/4JYsV-7IPME",
						),	
						
						array(
							"type"			=> "zolo_radio_advanced",
							"heading"		=> __("Show this item in Side Panel",'apcore'),
							"param_name"	=> "show_item_in_side_panel",
							'value'			=> 'disable',
							"options"			=> array(
								__("Enable",'apcore') 		=> "enable",
								__("Disable",'apcore') 		=> "disable",
							),
							'group'				=> esc_html__('Extras', 'apcore'),
						),
						array(
							"type"			=> "zolo_radio_advanced",
							"heading"		=> __("Alignment",'apcore'),
							"param_name"	=> "side_panel_alignment",
							'value'			=> 'right',
							"options"			=> array(
								__("Left",'apcore') 		=> "left",
								__("Right",'apcore') 		=> "right",
							),
							'dependency'		=> array('element' => 'show_item_in_side_panel', 'value' => array('enable')),
							'group'				=> esc_html__('Extras', 'apcore'),
						),
						array(
							"type"			=> "zolo_radio_advanced",
							"heading"		=> __("Vertical Alignment",'apcore'),
							"param_name"	=> "side_panel_vertical_alignment",
							'value'			=> 'middle',
							"options"		=> array(
								__("Top",'apcore') 		=> "top",
								__("Middle",'apcore')	=> "middle",
								__("Bottom",'apcore') 	=> "bottom",
							),
							'dependency'		=> array('element' => 'show_item_in_side_panel', 'value' => array('enable')),
							'group'				=> esc_html__('Extras', 'apcore'),
						),
						array(
							'type' 				=> 'textfield',
							'heading' 			=> __("Top Offset",'apcore'),
							"description"		=> __("Add here offset values for ex. 10px / 10%","apcore"),
							'param_name'		=> 'side_panel_top_offset',
							'value'				=> '20px',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
							'dependency'		=> array('element' => 'side_panel_vertical_alignment', 'value' => array('top')),
							'group'				=> esc_html__('Extras', 'apcore'),
						),
						array(
							'type' 				=> 'textfield',
							'heading' 			=> __("Top Offset",'apcore'),
							"description"		=> __("Add here offset values for ex. 10px / 10%","apcore"),
							'param_name'		=> 'side_panel_middle_offset',
							'value'				=> '50%',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
							'dependency'		=> array('element' => 'side_panel_vertical_alignment', 'value' => array('middle')),
							'group'				=> esc_html__('Extras', 'apcore'),
						),
						array(
							'type' 				=> 'textfield',
							'heading' 			=> __("Bottom Offset",'apcore'),
							"description"		=> __("Add here offset values for ex. 10px / 10%","apcore"),
							'param_name'		=> 'side_panel_bottom_offset',
							'value'				=> '20px',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
							'dependency'		=> array('element' => 'side_panel_vertical_alignment', 'value' => array('bottom')),
							'group'				=> esc_html__('Extras', 'apcore'),
						),
						array(
							'type' 				=> 'textfield',
							'heading' 			=> __("Left Offset",'apcore'),
							"description"		=> __("Add here offset values for ex. 10px / 10%","apcore"),
							'param_name'		=> 'side_panel_left_offset',
							'value'				=> '0px',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
							'dependency'		=> array('element' => 'side_panel_alignment', 'value' => array('left')),
							'group'				=> esc_html__('Extras', 'apcore'),
						),
						array(
							'type' 				=> 'textfield',
							'heading' 			=> __("Right Offset",'apcore'),
							"description"		=> __("Add here offset values for ex. 10px / 10%","apcore"),
							'param_name'		=> 'side_panel_right_offset',
							'value'				=> '0px',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
							'dependency'		=> array('element' => 'side_panel_alignment', 'value' => array('right')),
							'group'				=> esc_html__('Extras', 'apcore'),
						),
						
						array(
							"type"			=> "zolo_radio_advanced",
							"heading"		=> __("Alignment",'apcore'),
							"param_name"	=> "vertical_text_block_alignment",
							'value'			=> 'left',
							"options"			=> array(
								__("Left",'apcore') 		=> "left",
								__("Right",'apcore') 		=> "right",
							),
							'dependency'		=> array('element' => 'show_item_in_side_panel', 'value' => array('disable')),
							'group'				=> esc_html__('Extras', 'apcore'),
						),
						array(
							"type"			=> "zolo_radio_advanced",
							"heading"		=> __("Position",'apcore'),
							"param_name"	=> "vertical_text_block_position",
							'value'			=> 'relative',
							"options"			=> array(
								__("Relative",'apcore') 		=> "relative",
								__("Absolute",'apcore') 		=> "absolute",
							),
							'dependency'		=> array('element' => 'show_item_in_side_panel', 'value' => array('disable')),
							'group'				=> esc_html__('Extras', 'apcore'),
						),
						array(
							'type' 				=> 'textfield',
							'heading' 			=> __("Top Offset",'apcore'),
							"description"		=> __("Add here offset values for ex. 10px / 10%","apcore"),
							'param_name'		=> 'vertical_text_block_top_offset',
							'value'				=> '20px',
							'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
							'dependency'		=> array('element' => 'vertical_text_block_position', 'value' => array('absolute')),
							'group'				=> esc_html__('Extras', 'apcore'),
						),
						array(
							'type' 				=> 'textfield',
							'heading' 			=> __("Right Offset",'apcore'),
							"description"		=> __("Add here offset values for ex. 10px / 10%","apcore"),
							'param_name'		=> 'vertical_text_block_right_offset',
							'value'				=> '',
							'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
							'dependency'		=> array('element' => 'vertical_text_block_position', 'value' => array('absolute')),
							'group'				=> esc_html__('Extras', 'apcore'),
						),
						
						array(
							'type' 				=> 'textfield',
							'heading' 			=> __("Bottom Offset",'apcore'),
							"description"		=> __("Add here offset values for ex. 10px / 10%","apcore"),
							'param_name'		=> 'vertical_text_block_bottom_offset',
							'value'				=> '',
							'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
							'dependency'		=> array('element' => 'vertical_text_block_position', 'value' => array('absolute')),
							'group'				=> esc_html__('Extras', 'apcore'),
						),
						array(
							'type' 				=> 'textfield',
							'heading' 			=> __("Left Offset",'apcore'),
							"description"		=> __("Add here offset values for ex. 10px / 10%","apcore"),
							'param_name'		=> 'vertical_text_block_left_offset',
							'value'				=> '20px',
							'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
							'dependency'		=> array('element' => 'vertical_text_block_position', 'value' => array('absolute')),
							'group'				=> esc_html__('Extras', 'apcore'),
						),
						
						array(
							'type' 				=> 'zolo_number',
							'heading' 			=> __("Hide under screen size",'apcore'),
							'param_name'		=> 'hide_under_screen_size',
							'value'				=> '',
							'suffix'			=> 'px',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
							'group'				=> esc_html__('Extras', 'apcore'),
						),
						
						
				

					),
					) );		
		
			}		