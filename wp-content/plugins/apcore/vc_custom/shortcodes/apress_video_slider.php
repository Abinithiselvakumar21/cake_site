<?php 
/*-----------------------------------------------------------------------------------*/
/* Video Slider
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Video_Slider extends WPBakeryShortCode {}

$doc_link = 'http://apresswp.com/help';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
			"name"				=> __("Video Slider", 'apcore'),
			"base"				=> "apress_video_slider",
			"weight"			=> 11,
			"class"				=> "",
			"category"			=> __( "Apress", "apcore"),
			"description"		=> __( "Create amazing slider", "apcore"),
			"icon"				=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-video_slider.jpg",
			"params"			=> array(
				
				array(
					'type'        => 'radio_image_select',
					'heading'     => esc_html__( 'Style', 'apcore' ),
					'param_name'  => 'style',
					'simple_mode' => false,
					'options'     => array(
						'style1' => array(
							'tooltip' => esc_attr__('Style1','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/video_slider/style1.jpg'
						),
						'style2' => array(
							'tooltip' => esc_attr__('Style2','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/video_slider/style2.jpg'
						),
					),					
				),
				
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("No. of items to show","apcore"),
					"param_name"		=> "noof_items",
					"value"				=> "4",
				),
				array(
					'type' => 'param_group',
					'heading' => esc_html__( 'Video Values', 'apcore' ),
					'param_name' => 'video_values',
					'params' => array(
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Video Title', 'apcore'),
							'param_name' => 'video_title',
						),
						array(
							'type' => 'textarea',
							'heading' => esc_html__('Video iframe', 'apcore'),
							'param_name' => 'video_iframe',
						),
						
						array(
							'type' => 'attach_image',
							'heading' => esc_html__('Thumb Image', 'apcore'),
							'param_name' => 'video_thumb_image',
							'description' => esc_html__( 'Select image from media library.', 'apcore' ),
						),

						),
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
					'video_link'		=> 'https://youtu.be/ftlAOJt7px4',
				),
				
				array(
					'type'				=> 'zolo_font_container',
					'heading'			=> '',
					'param_name'		=> 'title_font_options',
					'settings'				=> array(
						'fields'				=> array(
							'font_size',							
							'line_height',
							'letter_spacing',
							'font_style',
						),
					),
					'group'				=> esc_html__('Title Typography', 'apcore'),
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
					'group'				=> esc_html__('Title Typography', 'apcore'),
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
					'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
					'dependency' => array( 'element' => 'title_google_fonts', 'value' => 'yes'),
					'group'				=> esc_html__('Title Typography', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Font Color",'apcore'),
					"param_name"		=> "title_color",
					"value"				=> '#484848',
					'group'				=> esc_html__('Title Typography', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Font Hover Color",'apcore'),
					"param_name"		=> "title_hover_color",
					"value"				=> '#1769ff',
					'group'				=> esc_html__('Title Typography', 'apcore'),
				),
				
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Border Color",'apcore'),
					"param_name"		=> "border_color",
					"value"				=> '#eeeeee',
					'group'				=> esc_html__('Title Typography', 'apcore'),
					"dependency"	=> array('element' => "style", 'value' => array('style1')),
				),
				
				array(
					"type"             => "zolo_param_heading",
					"param_name"       => "navigation_arrows",
					"text"             => __( "Navigation Arrows", 'apcore' ),
					'group'=> esc_html__('Navigation','apcore'),
					"dependency"	=> array('element' => "style", 'value' => array('style2')),
				),
				
				array(
					'type'				=> 'zolo_single_checkbox',
					'heading'			=> esc_html__('Arrow Navigation?', 'apcore'),
					'param_name'		=> 'slick_hide_arrow_navigation',
					'value'				=> 'yes',
					'options'			=> array(
						'yes'			=> array(
							'on'				=> 'Yes',
							'off'				=> 'No',
						),
					),
					"dependency"	=> array('element' => "style", 'value' => array('style2')),
					'group'			=> esc_html__('Navigation','apcore'),
				),
										
				array(
					'type'        => 'radio_image_select',
					'heading'     => esc_html__( 'Arrows Style', 'apcore' ),
					'param_name'  => 'arrows_style',
					'simple_mode' => false,
					'options'     => array(
						'arrows_style1' => array(
							'tooltip' => esc_attr__('Arrows Style 1','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/nav/nav_style1.jpg'
						),
						'arrows_style2' => array(
							'tooltip' => esc_attr__('Arrows Style 2','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/nav/nav_style2.jpg'
						),
						'arrows_style3' => array(
							'tooltip' => esc_attr__('Arrows Style 3','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/nav/nav_style3.jpg'
						),
						'arrows_style4' => array(
							'tooltip' => esc_attr__('Arrows Style 4','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/nav/nav_style4.jpg'
						),
					),
					'group'=> esc_html__('Navigation','apcore'),
					"dependency"	=> array('element' => "slick_hide_arrow_navigation", 'value' => array('yes'))

				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Arrows color",'apcore'),
					"param_name" => "arrows_color",
					"value" => '#ffffff',
					'group'=> esc_html__('Navigation','apcore'),
					"dependency"	=> array('element' => "slick_hide_arrow_navigation", 'value' => array('yes'))
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Arrows background",'apcore'),
					"param_name" => "arrows_bg",
					"value" => '#549ffc',
					'dependency' => array( 'element' => 'arrows_style', 'value' => array('arrows_style2', 'arrows_style3')),
					'group'=> esc_html__('Navigation','apcore'),
				),	
				
				
				
				
				),
			) 
		);		
		
	}		