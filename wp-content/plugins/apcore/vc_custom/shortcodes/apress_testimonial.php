<?php 
/*-----------------------------------------------------------------------------------*/
/* Testimonial shortcode
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Testimonial extends WPBakeryShortCode {}

$doc_link = 'http://apresswp.com/help';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
					"name"			=> __("Testimonials", "apcore"),
					"base"			=> "apress_testimonial",
					"class"			=> "",
					"weight"		=> 24,
					"category"		=> __( "Apress", "apcore"),
					"description"	=> __( "Beautiful Testimonials design", "apcore"),
					"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-testmonials.png",
					"params"		=> array(	
							array(
								'type'        => 'radio_image_select',
								'heading'     => esc_html__( 'Testimonials Style', 'apcore' ),
								"holder"	  => "div",
								'param_name'  => 'testimonialstyle',
								'simple_mode' => false,
								'admin_label' => true,
								'options'     => array(
									'testimonials_style1' => array(
										'tooltip' => esc_attr__('Style 1','apcore'),
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/testimonial/testimonial_style/testimonial_style1.jpg'
									),
									'testimonials_style2' => array(
										'tooltip' => esc_attr__('Style 2','apcore'),
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/testimonial/testimonial_style/testimonial_style2.jpg'
									),
									'testimonials_style3' => array(
										'tooltip' => esc_attr__('Style 3','apcore'),
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/testimonial/testimonial_style/testimonial_style3.jpg'
									),
									'testimonials_style4' => array(
										'tooltip' => esc_attr__('Style 4','apcore'),
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/testimonial/testimonial_style/testimonial_style4.jpg'
									),
									'testimonials_style5' => array(
										'tooltip' => esc_attr__('Style 5','apcore'),
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/testimonial/testimonial_style/testimonial_style5.jpg'
									),
								),
							),
													
							array(
								"type"			=> "dropdown",
								"class"			=> "",
								"heading"		=> __("Rating","apcore"),
								"param_name"	=> "rating_option",
								"value"			=> array(
									__("None","apcore")		=> "0%",
									__("1 Star","apcore")	=> "20%",
									__("2 Stars","apcore")	=> "40%", 
									__("3 Stars","apcore")	=> "60%", 
									__("4 Stars","apcore")	=> "80%", 
									__("5 Stars","apcore")	=> "100%"
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
							),
							array(
								"type"				=> "colorpicker",
								"heading"			=> __("Rating Star Color",'apcore'),
								"param_name"		=> "star_color",
								"value"				=> '',
								'dependency'		=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
							),					
							array(
								"type"			=> "attach_image",
								//"holder"		=> "img",
								"class"			=> "",
								"heading"		=> __("Image","apcore"),
								"param_name"	=> "authorimage",
								"value"			=> "",
								"description"	=> __("Enter Image","apcore"),
								"dependency"	=> array( "element" => "testimonialstyle", "value" => array("testimonials_style1" ,"testimonials_style3" ,"testimonials_style4" ,"testimonials_style5"))
							),						
							array(
								"type"			=> "dropdown",
								"class"			=> "",
								"heading"		=> __("Client Image Border Radius",'apcore'),
								"param_name"	=> "testimonialimgborradi",
								"value"			=> array(
									__("Square",'apcore') => "0",
									__("Rounded",'apcore') => "6",
									__("Circle",'apcore') => "100"
								),
								"dependency"	=> array( "element" => "authorimage", 'not_empty' => true),
							),						 
							array(
								"type"			=> "textfield",
								"class"			=> "",
								"heading"		=> __("Author Name","apcore"),
								"param_name"	=> "by",
								"value"			=> "Matt Tucker",
							),	
							array(
								"type"			=> "textfield",
								"class"			=> "",
								"heading"		=> __("Designation","apcore"),
								"param_name"	=> "designation",
								"value"			=> "Designer",
							),	
							array(
								"type"			=> "textarea",
								"class"			=> "",
								"heading"		=> __("Description","apcore"),
								"param_name"	=> "content",
								"value"			=> "This is the best WordPress theme I have ever used!",
							),
							array(
								"type"			=> "colorpicker",
								"class"			=> "",
								"heading"		=> __("Testimonial Font Color","apcore"),
								"param_name"	=> "testimonialfontcolor",
								"value"			=> "#777777",
								'edit_field_class'	=> 'vc_column vc_col-sm-6',
							 ),
							 array(
								"type"			=> "colorpicker",
								"class"			=> "",
								"heading"		=> __("Testimonial Author Color","apcore"),
								"param_name"	=> "testimonialauthorcolor",
								"value"			=> "#777777",
								'edit_field_class'	=> 'vc_column vc_col-sm-6',
							),
							array(
								"type"			=> "colorpicker",
								"class"			=> "",
								"heading"		=> __("Testimonial Background Color","apcore"),
								"param_name"	=> "testimonialbackgroundcolor",
								"value"			=> "#ffffff",
								'edit_field_class'	=> 'vc_column vc_col-sm-6',
							),
							array(
								"type"			=> "colorpicker",
								"class"			=> "",
								"heading"		=> __("Testimonial Border Color","apcore"),
								"param_name"	=> "testimonialbordercolor",
								"value"			=> "#cccccc",
								'edit_field_class'	=> 'vc_column vc_col-sm-6',
							),
							array(
							   'type'    => 'zolo_box_shadow_param',
							   'heading'	=> esc_html__('Box Shadow', 'apcore'),
							   'param_name' => 'box_shadow',
							   "value"		=> 'box_shadow_enable:disable|shadow_horizontal:0|shadow_vertical:2|shadow_blur:10|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
							),
							array(
							   'type'    => 'zolo_box_shadow_param',
							   'heading'	=> esc_html__('Box Hover Shadow', 'apcore'),
							   'param_name' => 'box_hover_shadow',
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
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Author Name Style', 'apcore'),
							'param_name'		=> 'author_heading',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
							'group'				=> esc_html__('Author Name Style', 'apcore'),
						),
						array(
							'type'				=> 'zolo_font_container',
							'heading'			=> '',
							'param_name'		=> 'author_font_options',
							'settings'				=> array(
								'fields'				=> array(
									'font_size',							
									'line_height',
									'letter_spacing',
									'font_style',
								),
							),
							'group'			=> esc_html__('Author Name Style', 'apcore'),
						),
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Custom font family', 'apcore'),
							'param_name'		=> 'author_google_fonts',
							'value'				=> 'no',
							'options'			=> array(
								esc_html__('Yes', 'apcore')	=> 'yes',
								esc_html__('No', 'apcore') => 'no',
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'group'				=> esc_html__('Author Name Style', 'apcore'),
						),
						array(
							'type'				=> 'google_fonts',
							'param_name'		=> 'author_custom_fonts',
							'settings'			=> array(
								'fields'			=> array(
									'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
									'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
								),
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'dependency' => array( 'element' => 'author_google_fonts', 'value' => 'yes'),
							'group'				=> esc_html__('Author Name Style', 'apcore'),
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
							'settings'				=> array(
								'fields'				=> array(
									'font_size',							
									'line_height',
									'letter_spacing',
									'font_style',
								),
							),
							'group'			=> esc_html__('Designation Style', 'apcore'),
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
							'dependency' => array( 'element' => 'designation_google_fonts', 'value' => 'yes'),
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
									'font_style',
								),
							),
							'group'			=> esc_html__('Description Style', 'apcore'),
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
							'dependency' => array( 'element' => 'description_google_fonts', 'value' => 'yes'),
							'group'				=> esc_html__('Description Style', 'apcore'),
						),
								
						),
					) 
					
				);		
		
	}		