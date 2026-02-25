<?php 
/*-----------------------------------------------------------------------------------*/
/* Header Search
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Header_Search extends WPBakeryShortCode {}

$doc_link = 'http://apresswp.com/help';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
			"name"			=> __("Header Search", 'apcore'),
			"base"			=> "apress_header_Search",
			"category"		=> __( "Header Modules", "apcore"),
			"description"	=> __( "Search for header section", "apcore"),
			"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-search.jpg",
			"params"		=> array(

				array(
					'type'        => 'radio_image_select',
					'heading'     => esc_html__( 'Select a style', 'apcore' ),
					'param_name'  => 'style',
					'simple_mode' => false,
					'options'     => array(
						'style1' => array(
							'tooltip' => esc_attr__('Style1','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/search_icon/style1.jpg'
						),
						'style2' => array(
							'tooltip' => esc_attr__('Style2','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/search_icon/style2.jpg'
						),
						
					),					
				),
				array(
					'type'				=> 'zolo_number',
					'heading'			=> esc_html__('Icon Size','apcore'),
					'param_name'		=> 'icon_size',
					'step'				=> '1',
					'value'				=> '26',
					'suffix'			=> 'px',
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Search Icon Color",'apcore'),
					"param_name"		=> "search_icon_color",
					"value"				=> '#1769ff',
				),
				array(
					"type"             => "zolo_param_heading",
					"param_name"       => "button_margin",
					"text"             => __( "Button Margin", "apcore" ),
					"value"            => "",
					"class"            => ""
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Margin Top",'apcore'),
					'param_name'		=> 'button_margin_top',
					'value'				=> '',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Margin Right",'apcore'),
					'param_name'		=> 'button_margin_right',
					'value'				=> '',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Margin Bottom",'apcore'),
					'param_name'		=> 'button_margin_bottom',
					'value'				=> '',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Margin Left",'apcore'),
					'param_name'		=> 'button_margin_left',
					'value'				=> '',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
				),
				
				
				
				//sidebar Content
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Search Design', 'apcore'),
					'param_name'		=> 'select_search_design',
					'value'				=> 'full_screen',
					'options'			=> array(
						esc_html__('Default', 'apcore') 		=> 'default',
						esc_html__('Expanded', 'apcore')	=> 'expanded',
						esc_html__('Full Screen', 'apcore')	=> 'full_screen',
						esc_html__('Slide Down', 'apcore')	=> 'slide_down',
					),
					
					'group'				=> esc_html__('Search', 'apcore'),
				),
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Search position', 'apcore'),
					'param_name'		=> 'expanded_search_position',
					'value'				=> 'right',
					'options'			=> array(
						esc_html__('Left', 'apcore')	=> 'left',
						esc_html__('Right', 'apcore') 	=> 'right',
					),
					'dependency'	=> array('element' => 'select_search_design', 'value' => array('expanded')),
					'group'				=> esc_html__('Search', 'apcore'),
				),
				
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Select Type', 'apcore'),
					'param_name'		=> 'select_search_type',
					'value'				=> 'default',
					'options'			=> array(
						esc_html__('Default', 'apcore') 		=> 'default',
						esc_html__('Page Builder', 'apcore')=> 'page_builder',
					),
					'dependency'	=> array('element' => 'select_search_design', 'value' => array('full_screen')),
					'group'				=> esc_html__('Search', 'apcore'),
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> __("Template",'apcore'),
					"description"	=> __( "First make your footer from footer custom types then select it from here.", "apcore"),
					"param_name"	=> "apress_hamburger_search_template",
					"value"			=> apress_hamburger_menu_choices(),
					'dependency'	=> array('element' => 'select_search_type', 'value' => array('page_builder')),
					'group'				=> esc_html__('Search', 'apcore'),
				),
				array(
					'type'				=> 'zolo_number',
					'heading'			=> esc_html__('Search Box Position','apcore'),
					'param_name'		=> 'search_box_position',
					'step'				=> '1',
					'value'				=> '',
					'suffix'			=> 'px',
					'dependency'		=> array('element' => 'select_search_design', 'value' => array('default')),
					'group'				=> esc_html__('Search', 'apcore'),
				),
				array(
				   'type'    => 'zolo_box_shadow_param',
				   'heading'	=> esc_html__('Box Shadow', 'apcore'),
				   'param_name' => 'box_shadow',
				   "value"		=> 'box_shadow_enable:disable|shadow_horizontal:0|shadow_vertical:2|shadow_blur:10|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
				   'dependency'	=> array('element' => 'select_search_design', 'value' => array('default')),
				   'group'				=> esc_html__('Search', 'apcore'),
				),
				array(
					'type'				=> 'zolo_param_heading',
					'text'				=> esc_html__('Search Box Border Radius', 'apcore'),
					'param_name'		=> 'search_box_border_radius_heading',
					'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
					'dependency'		=> array('element' => 'select_search_design', 'value' => array('default')),
					'group'				=> esc_html__('Search', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Top Left",'apcore'),
					'param_name'		=> 'radius_top_left',
					'value'				=> '',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'dependency'		=> array('element' => 'select_search_design', 'value' => array('default')),
					'group'				=> esc_html__('Search', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Top Right",'apcore'),
					'param_name'		=> 'radius_top_right',
					'value'				=> '',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'dependency'		=> array('element' => 'select_search_design', 'value' => array('default')),
					'group'				=> esc_html__('Search', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Bottom Right",'apcore'),
					'param_name'		=> 'radius_bottom_right',
					'value'				=> '',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'dependency'		=> array('element' => 'select_search_design', 'value' => array('default')),
					'group'				=> esc_html__('Search', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Bottom Left",'apcore'),
					'param_name'		=> 'radius_bottom_left',
					'value'				=> '',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'dependency'		=> array('element' => 'select_search_design', 'value' => array('default')),
					'group'				=> esc_html__('Search', 'apcore'),
				),
				
				
				
				//Styling
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("canvas Color",'apcore'),
					'param_name'		=> "canvas_color",
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
					"heading"			=> __("Text Color",'apcore'),
					'param_name'		=> "text_color",
					"value"				=> '#1c1c1c',
					'group'			=> esc_html__('Styling', 'apcore'),
				),
				
				array(
					"type"				=> "dropdown",
					"heading"			=> __("Button Color Scheme",'apcore'),
					"param_name"		=> "color_scheme",
					"value"				=> array(
						__("Primary Color",'apcore') 	=> "primary_color_scheme",
						__("Color Scheme 1",'apcore') 	=> "color_scheme1",
						__("Color Scheme 2",'apcore') 	=> "color_scheme2",
						__("Gradient Scheme 1",'apcore') 	=> "gradient_scheme1",
						__("Gradient Scheme 2",'apcore') 	=> "gradient_scheme2",
						__("Gradient Scheme 3",'apcore') 	=> "gradient_scheme3",
						__("Custom Color",'apcore') 		=> "design_your_own"
					),
					'dependency'		=> array('element' => 'select_search_design', 'value' => array('default')),
					'group'				=> esc_html__('Styling', 'apcore'),
				),	
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Button Color",'apcore'),
					"param_name"		=> "button_custom_color",
					"value"				=> '#1769ff',
					'dependency'		=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
					'group'				=> esc_html__('Styling', 'apcore'),
				),
				
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Link Color",'apcore'),
					'param_name'		=> "link_color",
					"value"				=> '#1c1c1c',
					'dependency'		=> array('element' => 'select_search_design', 'value' => array('full_screen')),
					'group'			=> esc_html__('Styling', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Link Hover Color",'apcore'),
					'param_name'		=> "link_hover_color",
					"value"				=> '#1769ff',
					'dependency'		=> array('element' => 'select_search_design', 'value' => array('full_screen')),
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