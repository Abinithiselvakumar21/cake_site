<?php 
/*-----------------------------------------------------------------------------------*/
/* Header Logo
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Header_Text extends WPBakeryShortCode {}

if ( function_exists( 'vc_map' ) ) {
vc_map( array(
		"name"						=>  __( 'Logo', 'apcore' ),
		"base"						=> "apress_header_logo",
		"category"					=> __( "Header Modules", "apcore"),
		"description"				=> __( "Logo for Header Section", "apcore"),
		"icon"						=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-logo.jpg",
		'params'					=> array(
			
			
			array(
				'type'				=> 'zolo_single_checkbox',
				'heading'			=> esc_html__('Use Image instead of Logo', 'apcore'),
				'param_name'		=> 'image_instead',
				"description"		=> __( "Select the logo source.", "apcore"),
				'value'				=> 'no',
				'options'			=> array(
					'yes'			=> array(
						'on'				=> 'Yes',
						'off'				=> 'No',
					),
				),
			),
			array(
				'type' 				=> 'zolo_number',
				'heading' 			=> __("Standard Logo Width",'apcore'),
				'param_name'		=> 'logo_width',
				'value'				=> '84',
				'suffix'			=> 'px',
				"edit_field_class"	=> "vc_column vc_col-sm-6 crum_vc apress-number-wrap",
				'dependency'		=> array('element' => 'image_instead', 'value' => array('yes')),
			),
			array(
				'type' 				=> 'zolo_number',
				'heading' 			=> __("Standard Logo Height",'apcore'),
				'param_name'		=> 'logo_height',
				'value'				=> '34',
				'suffix'			=> 'px',
				"edit_field_class"	=> "vc_column vc_col-sm-6 crum_vc apress-number-wrap",
				'dependency'		=> array('element' => 'image_instead', 'value' => array('yes')),
			),
			array(
				"type"				=> "attach_image",
				"heading"			=> __("Image", "apcore"),
				"description"		=> __( "Select image.", "apcore"),
				"param_name"		=> "image",
				"value"				=> "",
				"edit_field_class"	=> "vc_column vc_col-sm-6 crum_vc apress-number-wrap",
				'dependency'	=> array('element' => 'image_instead', 'value' => array('yes')),
			),
			array(
				"type"				=> "attach_image",
				"heading"			=> __("Retina Image", "apcore"),
				"description"		=> __( "Select retina image.", "apcore"),
				"param_name"		=> "retina_image",
				"value"				=> "",
				"edit_field_class"	=> "vc_column vc_col-sm-6 crum_vc apress-number-wrap",
				'dependency'	=> array('element' => 'image_instead', 'value' => array('yes')),
			),
			
			
			array(
				"type"				=> "attach_image",
				"heading"			=> __("Light Image", "apcore"),
				"description"		=> __( "Select light image.", "apcore"),
				"param_name"		=> "light_image",
				"value"				=> "",
				"edit_field_class"	=> "vc_column vc_col-sm-6 crum_vc apress-number-wrap",
				'dependency'	=> array('element' => 'image_instead', 'value' => array('yes')),
			),
			array(
				"type"				=> "attach_image",
				"heading"			=> __("Retina Light Image", "apcore"),
				"description"		=> __( "Select retina light image.", "apcore"),
				"param_name"		=> "light_retina_image",
				"value"				=> "",
				"edit_field_class"	=> "vc_column vc_col-sm-6 crum_vc apress-number-wrap",
				'dependency'	=> array('element' => 'image_instead', 'value' => array('yes')),
			),
			
			array(
				"type"				=> "attach_image",
				"heading"			=> __("Dark Image", "apcore"),
				"description"		=> __( "Select dark image.", "apcore"),
				"param_name"		=> "dark_image",
				"value"				=> "",
				"edit_field_class"	=> "vc_column vc_col-sm-6 crum_vc apress-number-wrap",
				'dependency'	=> array('element' => 'image_instead', 'value' => array('yes')),
			),
			array(
				"type"				=> "attach_image",
				"heading"			=> __("Retina Dark Image", "apcore"),
				"description"		=> __( "Select retina dark image.", "apcore"),
				"param_name"		=> "dark_retina_image",
				"value"				=> "",
				"edit_field_class"	=> "vc_column vc_col-sm-6 crum_vc apress-number-wrap",
				'dependency'	=> array('element' => 'image_instead', 'value' => array('yes')),
			),
			
			
			array(
				'type'				=> 'zolo_single_checkbox',
				'heading'			=> esc_html__('Use Image instead of sticky Logo', 'apcore'),
				'param_name'		=> 'sticky_image_instead',
				"description"		=> __( "Select the sticky logo source.", "apcore"),
				'value'				=> 'no',
				'options'			=> array(
					'yes'			=> array(
						'on'				=> 'Yes',
						'off'				=> 'No',
					),
				),
			),
			
			array(
				"type"				=> "attach_image",
				"heading"			=> __("Sticky Image", "apcore"),
				"description"		=> __( "Select sticky image.", "apcore"),
				"param_name"		=> "sticky_image",
				"value"				=> "",
				"edit_field_class"	=> "vc_column vc_col-sm-6 crum_vc apress-number-wrap",
				'dependency'	=> array('element' => 'sticky_image_instead', 'value' => array('yes')),
			),
			array(
				"type"				=> "attach_image",
				"heading"			=> __("Retina Sticky Image", "apcore"),
				"description"		=> __( "Select sticky dark image.", "apcore"),
				"param_name"		=> "sticky_retina_image",
				"value"				=> "",
				"edit_field_class"	=> "vc_column vc_col-sm-6 crum_vc apress-number-wrap",
				'dependency'	=> array('element' => 'sticky_image_instead', 'value' => array('yes')),
			),
			
			
			array(
				'type'				=> 'zolo_single_checkbox',
				'heading'			=> esc_html__('External Logo Link', 'apcore'),
				'param_name'		=> 'link_homepage',
				"description"		=> __( "Default logo links to homepage.", "apcore"),
				'value'				=> 'no',
				'options'			=> array(
					'yes'			=> array(
						'on'				=> 'Yes',
						'off'				=> 'No',
					),
				),
				"edit_field_class"	=> "vc_column vc_col-sm-6 crum_vc apress-number-wrap",
			),
			array(
				"type"			=> "vc_link",
				"heading"		=> __("Logo Link",'apcore'),
				"param_name"	=> "logo_link",
				"description"	=> __("http://example.com",'apcore'),
				"edit_field_class"	=> "vc_column vc_col-sm-6 crum_vc apress-number-wrap",
				'dependency'	=> array('element' => 'link_homepage', 'value' => array('yes')),
			 ),
			 
			 array(
				'type'       => 'dropdown',
				'param_name' => 'alignment',
				'heading'    => esc_html__( 'Logo Alignment', 'apcore' ),
				'value'      => array(
					esc_html__( 'Default', 'apcore' ) => 'inherit',
					esc_html__( 'Center', 'apcore' )  => 'center',
					esc_html__( 'Right', 'apcore' )   => 'right',
				),
			),
			
			 array(
				'type'				=> 'zolo_param_heading',
				'text'				=> esc_html__('Extra features', 'apcore'),
				'param_name'		=> 'subtitle_margin_heading',
				'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'apcore' ),
				'param_name' => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'apcore' ),
			),
			array(
				'type'				=> 'zolo_radio_advanced',
				'heading'			=> esc_html__('Animations', 'apcore'),
				'param_name'		=> 'animation_type',
				'value'				=> 'default',
				'options'			=> array(
					esc_html__('Default', 'apcore')	=> 'default',
					esc_html__('Clipping', 'apcore')=> 'clipping',
				),
			),
			array(
				"type"				=> "dropdown",
				"heading"			=> __("Choose Style",'apcore'),
				"param_name"		=> "clipping_animation_type",
				'value' => array(
					__("Clipping left to right",'apcore') 	=> "clipping_left_to_right",
					__("Clipping right to left",'apcore') 	=> "clipping_right_to_left",
					__("Clipping bottom to top",'apcore') 	=> "clipping_bottom_to_top",
					__("Clipping top to bottom",'apcore') 	=> "clipping_top_to_bottom",
				),
				'dependency'		=> array('element' => 'animation_type', 'value' => 'clipping'),
				'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
			),
			array(
				'type'				=> 'colorpicker',
				'heading'			=> esc_html__('Clipping Color', 'apcore'),
				'param_name'		=> 'clipping_color',
				"value" 			=> '#f2f2f2',
				'dependency'		=> array('element' => 'animation_type', 'value' => 'clipping'),
				'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
			),	
			array(
				"type"				=> "dropdown",
				"class"				=> "",
				"heading"			=> __("CSS Animation",'apcore'),
				"param_name"		=> "data_animation",
				"value"				=> apress_data_animations(),
				"description"		=> __("Select type of animation. Note: Works only in modern browsers.",'apcore'),
				"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-8 no-top-margin",
				'dependency'		=> array('element' => 'animation_type', 'value' => 'default'),
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
