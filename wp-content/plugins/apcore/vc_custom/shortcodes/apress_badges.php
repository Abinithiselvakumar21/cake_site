<?php 
/*-----------------------------------------------------------------------------------*/
/* Badges
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }

class WPBakeryShortCode_Apress_Badges extends WPBakeryShortCode {}

	
			
$doc_link = 'http://apresswp.com/help';

if ( function_exists( 'vc_map' ) ) {
	vc_map( array(
	"name"			=> __("Badges", 'apcore'),
	"base"			=> "apress_badges",
	"class"			=> "",
	//"weight"		=> 2,
	"category"		=> __( "Apress", "apcore"),
	"description"	=> __("Animated multi line heading", "apcore"),
	"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-badges.jpg",
	"params"		=> array(		
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html__("Badges Name 1", "apcore"),
			"param_name"		=> "badges_name1",
			"value"				=> 'Badges Name',
			"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-8 no-top-margin",
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> __("Text Color",'apcore'),
			"param_name"		=> "badges_name_text_color1",
			"value"				=> '#dd3333',
			"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-4 no-top-margin",
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html__("Badges Name 2", "apcore"),
			"param_name"		=> "badges_name2",
			"value"				=> 'Badges Name',
			"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-8 no-top-margin",
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> __("Text Color",'apcore'),
			"param_name"		=> "badges_name_text_color2",
			"value"				=> '#dd9933',
			"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-4 no-top-margin",
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html__("Badges Name 3", "apcore"),
			"param_name"		=> "badges_name3",
			"value"				=> 'Badges Name',
			"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-8 no-top-margin",
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> __("Text Color",'apcore'),
			"param_name"		=> "badges_name_text_color3",
			"value"				=> '#81d742',
			"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-4 no-top-margin",
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html__("Badges Name 4", "apcore"),
			"param_name"		=> "badges_name4",
			"value"				=> 'Badges Name',
			"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-8 no-top-margin",
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> __("Text Color",'apcore'),
			"param_name"		=> "badges_name_text_color4",
			"value"				=> '#1e73be',
			"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-4 no-top-margin",
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html__("Badges Name 5", "apcore"),
			"param_name"		=> "badges_name5",
			"value"				=> 'Badges Name',
			"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-8 no-top-margin",
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> __("Text Color",'apcore'),
			"param_name"		=> "badges_name_text_color5",
			"value"				=> '#8224e3',
			"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-4 no-top-margin",
		),
		
		array(
			'type'				=> 'zolo_radio_advanced',
			'heading'			=> esc_html__('Background Shape', 'apcore'),
			'param_name'		=> 'background_shape',
			'value'				=> 'square',
			'options'			=> array(
				esc_html__('Square', 'apcore')	=> 'square',
				esc_html__('Rounded', 'apcore') => 'rounded',
				esc_html__('Circle', 'apcore')	=> 'circle',
			),
		),
		array(
			'type'				=> 'zolo_radio_advanced',
			'heading'			=> esc_html__('Background Shape', 'apcore'),
			'param_name'		=> 'align',
			'value'				=> 'center',
			'options'			=> array(
				esc_html__('Left', 'apcore')	=> 'left',
				esc_html__('Center', 'apcore') => 'center',
				esc_html__('Right', 'apcore')	=> 'right',
			),
		),
		array(
			"type" 				=> "zolo_number",
			"heading" 			=> __("Height",'apcore'),
			"param_name" 		=> "min_height",
			"value" 			=> '120',
			'suffix'			=> 'px',
			'edit_field_class'	=> 'vc_column vc_col-sm-6',
			'dependency'		=> array('element' => 'background_shape', 'value' => array('circle')),
		 ),	
		 array(
			"type" 				=> "zolo_number",
			"heading" 			=> __("Width",'apcore'),
			"param_name" 		=> "min_width",
			"value" 			=> '120',
			'suffix'			=> 'px',
			'edit_field_class'	=> 'vc_column vc_col-sm-6',
			'dependency'		=> array('element' => 'background_shape', 'value' => array('circle')),
		 ),	
		 array(
			"type" 				=> "zolo_number",
			"heading" 			=> __("Margin Left",'apcore'),
			"param_name" 		=> "margin_left",
			"value" 			=> '-20',
			'suffix'			=> 'px',
			'edit_field_class'	=> 'vc_column vc_col-sm-6',
			'dependency'		=> array('element' => 'background_shape', 'value' => array('circle')),
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
			'video_link'		=> 'https://youtu.be/uE3CsoShEd0',
		),
		
		array(
			'type'				=> 'zolo_param_heading',
			'text'				=> esc_html__('Badges Typography', 'apcore'),
			'param_name'		=> 'title_t_heading',
			'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
			'group'				=> esc_html__('Typography', 'apcore'),
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
			'group'				=> esc_html__('Typography', 'apcore'),
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
			'group'				=> esc_html__('Typography', 'apcore'),
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
			'group'				=> esc_html__('Typography', 'apcore'),
		),
		
		
		
	),
	) 
		);
	}
