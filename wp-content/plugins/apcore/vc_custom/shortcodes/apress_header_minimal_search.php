<?php 
/*-----------------------------------------------------------------------------------*/
/* Header Minimal Search
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Header_Minimal_Search extends WPBakeryShortCode {}

$doc_link = 'http://apresswp.com/help';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
			"name"			=> __("Minimal Search", 'apcore'),
			"base"			=> "apress_header_minimal_search",
			"category"		=> __( "Header Modules", "apcore"),
			"description"	=> __( "Search for header section", "apcore"),
			"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-minimal_search.jpg",
			"params"		=> array(

				
				array(
					"type"             => "zolo_param_heading",
					"param_name"       => "search_box_border_heading",
					"text"             => __( "Border Width", "apcore" ),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Top",'apcore'),
					'param_name'		=> 'search_box_border_top',
					'value'				=> '0',
					'suffix' 			=> 'px',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Right",'apcore'),
					'param_name'		=> 'search_box_border_right',
					'value'				=> '0',
					'suffix' 			=> 'px',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Bottom",'apcore'),
					'param_name'		=> 'search_box_border_bottom',
					'value'				=> '1',
					'suffix' 			=> 'px',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Left",'apcore'),
					'param_name'		=> 'search_box_border_left',
					'value'				=> '0',
					'suffix' 			=> 'px',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
				),
				array(
					"type"             => "zolo_param_heading",
					"param_name"       => "search_box_border_radius_heading",
					"text"             => __( "Border Radius", "apcore" ),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Border Radius",'apcore'),
					'param_name'		=> 'border_radius',
					'value'				=> '0',
					'suffix' 			=> 'px',
				),
				array(
					"type"             => "zolo_param_heading",
					"param_name"       => "search_box_width_heading",
					"text"             => __( "Search Box width", "apcore" ),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Search Box width",'apcore'),
					'param_name'		=> 'input_max_width',
					'value'				=> '240',
					'suffix' 			=> 'px',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Small Desktop",'apcore'),
					'param_name'		=> 'input_max_width_small_desktop',
					'value'				=> '',
					'suffix' 			=> 'px',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Tablet",'apcore'),
					'param_name'		=> 'input_max_width_tablet',
					'value'				=> '',
					'suffix' 			=> 'px',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Mobile",'apcore'),
					'param_name'		=> 'input_max_width_mobile',
					'value'				=> '',
					'suffix' 			=> 'px',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
				),
				array(
					"type"             => "zolo_param_heading",
					"param_name"       => "search_box_button_width_heading",
					"text"             => __( "Search Button Width", "apcore" ),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Button width",'apcore'),
					'param_name'		=> 'button_max_width',
					'value'				=> '50',
					'suffix' 			=> 'px',
				),
				array(
					"type"             => "zolo_param_heading",
					"param_name"       => "search_margin_heading",
					"text"             => __( "Margin", "apcore" ),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Margin Top",'apcore'),
					'param_name'		=> 'search_margin_top',
					'value'				=> '',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Margin Right",'apcore'),
					'param_name'		=> 'search_margin_right',
					'value'				=> '',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Margin Bottom",'apcore'),
					'param_name'		=> 'search_margin_bottom',
					'value'				=> '',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Margin Left",'apcore'),
					'param_name'		=> 'search_margin_left',
					'value'				=> '',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
				),
				
				array(
					'type'				=> 'zolo_font_container',
					'heading'			=> '',
					'param_name'		=> 'search_font_options',
					'settings'				=> array(
						'fields'				=> array(
							'font_size',							
							'line_height',
							'letter_spacing',
							'font_style',
						),
					),
					'group'				=> esc_html__('Typography', 'apcore'),
				),
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Custom font family', 'apcore'),
					'param_name'		=> 'search_google_fonts',
					'value'				=> 'no',
					'options'			=> array(
						esc_html__('Yes', 'apcore')	=> 'yes',
						esc_html__('No', 'apcore') => 'no',
					),
					'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
					'group'				=> esc_html__('Typography', 'apcore'),
				),
				array(
					'type'				=> 'google_fonts',
					'param_name'		=> 'search_custom_fonts',
					'settings'			=> array(
						'fields'			=> array(
							'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
							'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
						),
					),
					'dependency' => array( 'element' => 'search_google_fonts', 'value' => 'yes'),
					'group'				=> esc_html__('Typography', 'apcore'),
				),	
				
				//Styling
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Text Color",'apcore'),
					'param_name'		=> "text_color",
					"value"				=> '#1c1c1c',
					'group'			=> esc_html__('Styling', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Input Background Color",'apcore'),
					'param_name'		=> "input_bg_color",
					"value"				=> '#ffffff',
					'group'			=> esc_html__('Styling', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Input Border Color",'apcore'),
					'param_name'		=> "border_color",
					"value"				=> '#1c1c1c',
					'group'			=> esc_html__('Styling', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Button Background Color",'apcore'),
					'param_name'		=> "button_bg_color",
					"value"				=> '',
					'group'			=> esc_html__('Styling', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Button Icon Color",'apcore'),
					'param_name'		=> "button_icon_color",
					"value"				=> '',
					'group'			=> esc_html__('Styling', 'apcore'),
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
					'type'				=> 'zolo_video_link_param',
					'heading'			=> esc_html__('Video tutorial and theme documentation article','apcore'),
					'param_name'		=> 'tutorials',
					'doc_link'			=> $doc_link,
					'video_link'		=> 'https://youtu.be/Gk6g0uOC9V0',
				),


	
			
				),
			) 
		);		
		
	}		