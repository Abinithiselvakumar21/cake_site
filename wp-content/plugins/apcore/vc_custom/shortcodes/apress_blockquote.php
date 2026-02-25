<?php 
/*-----------------------------------------------------------------------------------*/
/* Blockquote shortcode
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Blockquote extends WPBakeryShortCode {}

$doc_link = 'http://apresswp.com/help';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
					"name"			=> __("Blockquote", "apcore"),
					"base"			=> "apress_blockquote",
					"class"			=> "",
					"weight"		=> 24,
					"category"		=> __( "Apress", "apcore"),
					"description"	=> __( "Beautiful Blockquote design", "apcore"),
					"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-blockquote.jpg",
					"params"		=> array(	
							array(
								'type'        => 'radio_image_select',
								'heading'     => esc_html__( 'Blockquote Style', 'apcore' ),
								"holder"	  => "div",
								'param_name'  => 'style',
								'simple_mode' => false,
								'options'     => array(
									'blockquote_style1' => array(
										'tooltip' => esc_attr__('Style 1','apcore'),
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blockquote/style1.jpg'
									),
									'blockquote_style2' => array(
										'tooltip' => esc_attr__('Style 2','apcore'),
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blockquote/style2.jpg'
									),
									'blockquote_style3' => array(
										'tooltip' => esc_attr__('Style 3','apcore'),
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blockquote/style3.jpg'
									),
									'blockquote_style4' => array(
										'tooltip' => esc_attr__('Style 4','apcore'),
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blockquote/style4.jpg'
									),
								),
							),
							
							array(
								"type"			=> "attach_image",
								"class"			=> "",
								"heading"		=> __("Blockquote Icon","apcore"),
								"param_name"	=> "blockquote_image",
								"value"			=> "",
								"description"	=> __("Enter Image","apcore"),
								'dependency'		=> array('element' => 'style', 'value' => array('blockquote_style1', 'blockquote_style3', 'blockquote_style4')),
							),	
							array(
								"type"			=> "textarea_html",
								"class"			=> "",
								"heading"		=> __("Quote Text","apcore"),
								"param_name"	=> "content",
								"value"			=> "This is the best WordPress theme I have ever used!",
							),	
							array(
								"type"			=> "attach_image",
								"class"			=> "",
								"holder"	  	=> "img",
								"heading"		=> __("Author Image","apcore"),
								"param_name"	=> "author_image",
								"value"			=> "",
								"description"	=> __("Enter Image","apcore"),
								"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin",
							),			
							array(
								"type"			=> "textfield",
								"class"			=> "",
								"holder"	 	 => "div",
								"heading"		=> __("Quote Author","apcore"),
								"param_name"	=> "author_name",
								"value"			=> "Matt Tucker",
								"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin",
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
								"video_link"		=> "https://youtu.be/BkwC8kKyVnA",
							),
							
							
							
							array(
								"type"			=> "dropdown",
								"heading"		=> __("Background Color Scheme",'apcore'),
								"param_name"	=> "color_scheme",
								"value"			=> array(
									__("Custom Color",'apcore') 	=> "design_your_own",
									__("Primary Color",'apcore') 	=> "primary_color_scheme",
									__("Color Scheme 1",'apcore') 	=> "color_scheme1",
									__("Color Scheme 2",'apcore') 	=> "color_scheme2",
									__("Gradient Scheme 1",'apcore') 	=> "gradient_scheme1",
									__("Gradient Scheme 2",'apcore') 	=> "gradient_scheme2",
									__("Gradient Scheme 3",'apcore') 	=> "gradient_scheme3",
									
								),
								'group'				=> esc_html__('Box Styling', 'apcore'),
							),
							array(
								"type"				=> "colorpicker",
								"heading"			=> __("Background Color",'apcore'),
								"param_name"		=> "box_background_color",
								"value"				=> '#f2f2f2',
								'dependency'		=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
								'group'				=> esc_html__('Box Styling', 'apcore'),
							),	
							array(
								"type"				=> "colorpicker",
								"heading"			=> __("Border Color",'apcore'),
								"param_name"		=> "box_border_color",
								"value"				=> '#3b65d6',
								'dependency'		=> array('element' => 'style', 'value' => array('blockquote_style1', 'blockquote_style2', 'blockquote_style4')),
								'group'				=> esc_html__('Box Styling', 'apcore'),
							),					
							
							array(
							   'type'    => 'zolo_box_shadow_param',
							   'heading'	=> esc_html__('Box Shadow', 'apcore'),
							   'param_name' => 'box_shadow',
							   "value"		=> 'box_shadow_enable:disable|shadow_horizontal:0|shadow_vertical:2|shadow_blur:10|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
							   'group'				=> esc_html__('Box Styling', 'apcore'),
							),
							
							
							array(
								'type'				=> 'zolo_param_heading',
								'text'				=> esc_html__('Box Padding', 'apcore'),
								'param_name'		=> 'box_padding_heading',
								'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
								'group'				=> esc_html__('Box Styling', 'apcore'),
							),
							array(
								"type" 			=> "textfield",
								"heading" 		=> __("Box top Padding",'apcore'),
								'description' 	=> __( 'Enter value with px OR % (ex: 5px OR 5%)', 'apcore' ),
								"param_name" 	=> "box_top_padding",
								"value" 		=> '40px',
								'edit_field_class'	=> 'vc_column vc_col-sm-3',
								'group'				=> esc_html__('Box Styling', 'apcore'),
							 ),
							 array(
								"type" 			=> "textfield",
								"heading" 		=> __("Box Right Padding",'apcore'),
								'description' 	=> __( 'Enter value with px OR % (ex: 5px OR 5%)', 'apcore' ),
								"param_name" 	=> "box_right_padding",
								"value" 		=> '40px',
								'edit_field_class'=> 'vc_column vc_col-sm-3',
								'group'				=> esc_html__('Box Styling', 'apcore'),
							 ),						 
							 array(
								"type" 			=> "textfield",
								"heading" 		=> __("Box Bottom Padding",'apcore'),
								'description' 	=> __( 'Enter value with px OR % (ex: 5px OR 5%)', 'apcore' ),
								"param_name" 	=> "box_bottom_padding",
								"value" 		=> '40px',
								'edit_field_class'=> 'vc_column vc_col-sm-3',
								'group'				=> esc_html__('Box Styling', 'apcore'),
							 ),	
							 array(
								"type" 			=> "textfield",
								"heading" 		=> __("Box Left Padding",'apcore'),
								'description' 	=> __( 'Enter value with px OR % (ex: 5px OR 5%)', 'apcore' ),
								"param_name" 	=> "box_left_padding",
								"value" 		=> '40px',
								'edit_field_class'=> 'vc_column vc_col-sm-3',
								'group'				=> esc_html__('Box Styling', 'apcore'),
							 ),
							 
							array(
								'type'				=> 'zolo_param_heading',
								'text'				=> esc_html__('Quote Text Typography', 'apcore'),
								'param_name'		=> 'title_heading',
								'class'				=> 'zolo-param-heading',
								'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12',
								'group'				=> esc_html__('Quote Text Typography', 'apcore'),
							),
							array(
								'type'				=> 'zolo_font_container',
								'heading'			=> '',
								'param_name'		=> 'title_font_options',
								'settings'				=> array(
									'fields'				=> array(
										'tag' => 'h4',
										'font_size',							
										'line_height',
										'letter_spacing',
										'font_style',
										'color' => '#333333',
									),
								),
								'group'				=> esc_html__('Quote Text Typography', 'apcore'),
							),
							array(
								'type'				=> 'zolo_radio_advanced',
								'heading'			=> esc_html__('Custom font family', 'apcore'),
								'param_name'		=> 'title_google_fonts',
								'value'				=> 'no',
								'options'			=> array(
									esc_html__('Yes', 'apcore')	=> 'yes',
									esc_html__('No', 'apcore') => 'no',
								),
								'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
								'group'				=> esc_html__('Quote Text Typography', 'apcore'),
							),
							array(
								'type'				=> 'google_fonts',
								'param_name'		=> 'title_custom_fonts',
								'settings'			=> array(
									'fields'			=> array(
										'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
										'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
									),
								),
								'dependency' => array( 'element' => 'title_google_fonts', 'value' => 'yes'),
								'group'				=> esc_html__('Quote Text Typography', 'apcore'),
							),
							
							array(
								'type'				=> 'zolo_param_heading',
								'text'				=> esc_html__('Quote Author Typography', 'apcore'),
								'param_name'		=> 'description_heading',
								'class'				=> 'zolo-param-heading',
								'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12',
								'group'				=> esc_html__('Quote Author Typography', 'apcore'),
							),
							array(
								'type'				=> 'zolo_font_container',
								'heading'			=> '',
								'param_name'		=> 'description_font_options',
								'settings'				=> array(
									'fields'			=> array(
										'font_size',							
										'line_height',
										'letter_spacing',
										'font_style',
										'color' => '#333333',
									),
								),
								'group'				=> esc_html__('Quote Author Typography', 'apcore'),
							),
							array(
								'type'				=> 'zolo_radio_advanced',
								'heading'			=> esc_html__('Custom font family', 'apcore'),
								'param_name'		=> 'description_google_fonts',
								'value'				=> 'no',
								'options'			=> array(
									esc_html__('Yes', 'apcore')	=> 'yes',
									esc_html__('No', 'apcore') => 'no',
								),
								'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
								'group'				=> esc_html__('Quote Author Typography', 'apcore'),
							),
							array(
								'type'				=> 'google_fonts',
								'param_name'		=> 'description_custom_fonts',
								'settings'			=> array(
									'fields'			=> array(
										'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
										'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
									),
								),
								'dependency' => array( 'element' => 'description_google_fonts', 'value' => 'yes'),
								'group'				=> esc_html__('Quote Author Typography', 'apcore'),
							),	
							
						
				
								
						),
					) 
					
				);		
		
	}		