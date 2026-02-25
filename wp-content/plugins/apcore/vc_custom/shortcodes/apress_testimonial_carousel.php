<?php 
/*-----------------------------------------------------------------------------------*/
/* Testimonial Carousel
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Testimonial_Carousel extends WPBakeryShortCode {}

$doc_link = 'http://apresswp.com/help';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
					"name" => __("Testimonial Carousel", 'apcore'),
					"base" => "apress_testimonial_carousel",
					"class" => "",
					"weight" => 26,
					"category" => __( "Apress", "apcore"),
					"description"	=> __( "beautiful Testimonial Carousel", "apcore"),
					"icon"	=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-testmonials-plus.png",
					"params" => array(						
						array(
							"type"			=> "textfield",
							"class"			=> "",
							"heading"		=> __("Number of testimonials to show",'apcore'),
							"description"	=> __("Leave blank or -1 to show all.",'apcore'),  
							"param_name"	=> "num",
							"value"			=> '4',							 
						),
						array(
							"type"			=> "textfield",
							"class"			=> "",
							"heading"		=> __("Excerpt Length",'apcore'),
							"param_name"	=> "excerpt_length",
							"value"			=> '30',							 
						 ),
						
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Link To Single Testimonials', 'apcore'),
							'param_name'		=> 'link_to_testimonials',
							'value'				=> 'no',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
						),	 						
						 array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Box Background Color",'apcore'),
							"param_name"		=> "testimonialbox_bg_color",
							"value"				=> '#ffffff',
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
						 ),	
						 array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Box Border Color",'apcore'),
							"param_name"		=> "testimonialbox_border_color",
							"value"				=> 'rgba(0,0,0,0.09)',
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
						 ),	
						 
						 array(
							'type' 				=> 'zolo_number',
							'heading' 			=> __("Border Radius",'apcore'),
							'param_name'		=> 'border_radius',
							'value'				=> '0',
							'suffix'			=> 'px',
						),
						 array(
							"type" 				=> "zolo_number",
							"heading" 			=> __("Box top Padding",'apcore'),
							'description' 		=> __( 'Enter value without px', 'apcore' ),
							"param_name" 		=> "box_top_padding",
							"value" 			=> '0',
							'edit_field_class'	=> 'vc_column vc_col-sm-3',
						 ),
						 array(
							"type" 				=> "zolo_number",
							"heading" 			=> __("Box Right Padding",'apcore'),
							'description' 		=> __( 'Enter value without px', 'apcore' ),
							"param_name" 		=> "box_right_padding",
							"value" 			=> '60',
							'edit_field_class'	=> 'vc_column vc_col-sm-3',
						 ),						 
						 array(
							"type" 				=> "zolo_number",
							"heading" 			=> __("Box Bottom Padding",'apcore'),
							'description' 		=> __( 'Enter value without px', 'apcore' ),
							"param_name" 		=> "box_bottom_padding",
							"value" 			=> '70',
							'edit_field_class'	=> 'vc_column vc_col-sm-3',
						 ),	
						 array(
							"type" 				=> "zolo_number",
							"heading" 			=> __("Box Left Padding",'apcore'),
							'description' 		=> __( 'Enter value without px', 'apcore' ),
							"param_name" 		=> "box_left_padding",
							"value" 			=> '60',
							'edit_field_class'	=> 'vc_column vc_col-sm-3',
						 ),
						 array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Enable Rating?', 'apcore'),
							'param_name'		=> 'enable_rating',
							'value'				=> 'yes',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
						),
						array(
							"type"			=> "dropdown",
							"heading"		=> __("Rating Star Color Scheme",'apcore'),
							"param_name"	=> "color_scheme",
							"value"			=> array(
								__("Primary Color",'apcore') 	=> "primary_color_scheme",
								__("Color Scheme 1",'apcore') 	=> "color_scheme1",
								__("Color Scheme 2",'apcore') 	=> "color_scheme2",
								__("Gradient Scheme 1",'apcore') 	=> "gradient_scheme1",
								__("Gradient Scheme 2",'apcore') 	=> "gradient_scheme2",
								__("Gradient Scheme 3",'apcore') 	=> "gradient_scheme3",
								__("Custom Color",'apcore') 	=> "design_your_own"
							),
							'dependency'		=> array( 'element' => 'enable_rating', 'value' => array('yes')),
						),
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Rating Star Color",'apcore'),
							"param_name"		=> "star_color",
							"value"				=> '',
							'dependency'		=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
						),
						array(
						   'type'    => 'zolo_box_shadow_param',
						   'heading'	=> esc_html__('Box Shadow', 'apcore'),
						   'param_name' => 'box_shadow',
						   "value"		=> 'box_shadow_enable:disable|shadow_horizontal:0|shadow_vertical:2|shadow_blur:10|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
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
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-8 no-top-margin',
						),  
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Delay",'apcore'),
							"param_name"		=> "data_delay",
							"value"				=> '500',
							"description"		=> __("Delay",'apcore'),
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-4 no-top-margin',
						),
						array(
							"type"				=> "textfield",
							"heading"			=> __("Extra class name", "apcore"),
							"param_name"		=> "el_class",
							"description"		=> __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "apcore")
						),
						array(
							'type'				=> 'zolo_video_link_param',
							'heading'			=> esc_html__('Video tutorial and theme documentation article','apcore'),
							'param_name'		=> 'tutorials',
							'doc_link'			=> $doc_link,
							'video_link'		=> 'https://youtu.be/FMfFFB_imXY',
						),
						
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Client Name Style', 'apcore'),
							'param_name'		=> 'client_heading',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
							'group'				=> esc_html__('Client Name Style', 'apcore'),
						),
						array(
							'type'				=> 'zolo_font_container',
							'heading'			=> '',
							'param_name'		=> 'client_font_options',
							'settings'			=> array(
								'fields'		=> array(
									'font_size',							
									'line_height',
									'letter_spacing',
									'color',
									'font_style',
								),
							),
							'group'				=> esc_html__('Client Name Style', 'apcore'),
						),
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Custom font family', 'apcore'),
							'param_name'		=> 'client_google_fonts',
							'value'				=> 'no',
							'options'			=> array(
								esc_html__('Yes', 'apcore')	=> 'yes',
								esc_html__('No', 'apcore') => 'no',
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'group'				=> esc_html__('Client Name Style', 'apcore'),
						),
						array(
							'type'				=> 'google_fonts',
							'param_name'		=> 'client_custom_fonts',
							'settings'			=> array(
								'fields'			=> array(
									'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
									'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
								),
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'dependency'		=> array( 'element' => 'client_google_fonts', 'value' => 'yes'),
							'group'				=> esc_html__('Client Name Style', 'apcore'),
						),	
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Designation Style', 'apcore'),
							'param_name'		=> 'designation_heading',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
							'group'				=> esc_html__('Designation Style', 'apcore'),
						),
						array(
							'type'				=> 'zolo_font_container',
							'heading'			=> '',
							'param_name'		=> 'designation_font_options',
							'settings'			=> array(
								'fields'		=> array(
									'font_size',							
									'line_height',
									'letter_spacing',
									'color',
									'font_style',
								),
							),
							'group'				=> esc_html__('Designation Style', 'apcore'),
						),
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Custom font family', 'apcore'),
							'param_name'		=> 'designation_google_fonts',
							'value'				=> 'no',
							'options'			=> array(
								esc_html__('Yes', 'apcore')	=> 'yes',
								esc_html__('No', 'apcore') => 'no',
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'group'				=> esc_html__('Designation Style', 'apcore'),
						),
						array(
							'type'				=> 'google_fonts',
							'param_name'		=> 'designation_custom_fonts',
							'settings'			=> array(
								'fields'			=> array(
									'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
									'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
								),
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'dependency'		=> array( 'element' => 'designation_google_fonts', 'value' => 'yes'),
							'group'				=> esc_html__('Designation Style', 'apcore'),
						),
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Description Style', 'apcore'),
							'param_name'		=> 'description_heading',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
							'group'				=> esc_html__('Description Style', 'apcore'),
						),
						array(
							'type'				=> 'zolo_font_container',
							'heading'			=> '',
							'param_name'		=> 'description_font_options',
							'settings'				=> array(
								'fields'				=> array(
									'font_size',							
									'line_height',
									'letter_spacing',
									'color',
									'font_style',
								),
							),
							'group'				=> esc_html__('Description Style', 'apcore'),
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
							'group'				=> esc_html__('Description Style', 'apcore'),
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
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'dependency'		=> array( 'element' => 'description_google_fonts', 'value' => 'yes'),
							'group'				=> esc_html__('Description Style', 'apcore'),
						),
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Enable Loop?', 'apcore'),
							'param_name'		=> 'carousel_loop',
							'value'				=> 'no',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
							'group'			=> esc_html__('Carousel','apcore'),
						),
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Enable AutoPlay?', 'apcore'),
							'param_name'		=> 'carousel_autoplay',
							'value'				=> 'no',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
							'group'			=> esc_html__('Carousel','apcore'),
						),	
						
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Navigation Color",'apcore'),
							"param_name"		=> "testimonialimgborcolor",
							"value"				=> '#549ffc',
							'group'				=> esc_html__('Carousel','apcore'),
						 ),	
					),
				) );		
		
	}		