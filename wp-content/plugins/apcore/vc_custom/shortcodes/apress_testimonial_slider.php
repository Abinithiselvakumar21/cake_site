<?php 
/*-----------------------------------------------------------------------------------*/
/* Testimonial Slider
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Testimonial_Slider extends WPBakeryShortCode {}

$doc_link = 'http://apresswp.com/help';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
					"name" => __("Testimonials Slider", 'apcore'),
					"base" => "apress_testimonial_slider",
					"class" => "",
					"weight" => 26,
					"category" => __( "Apress", "apcore"),
					"description"	=> __( "Custom Post Types", "apcore"),
					"icon"	=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-testmonials-plus.png",
					"params" => array(						
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
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/testimonial/testimonial_slider/testimonial_style1.jpg'
								),
								'testimonials_style2' => array(
									'tooltip' => esc_attr__('Style 2','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/testimonial/testimonial_slider/testimonial_style2.jpg'
								),
								'testimonials_style3' => array(
									'tooltip' => esc_attr__('Style 3','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/testimonial/testimonial_style/testimonial_style1.jpg'
								),
								'testimonials_style4' => array(
									'tooltip' => esc_attr__('Style 4','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/testimonial/testimonial_style/testimonial_style2.jpg'
								),
								'testimonials_style5' => array(
									'tooltip' => esc_attr__('Style 5','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/testimonial/testimonial_slider/testimonial_style5.jpg'
								),
								'testimonials_style6' => array(
									'tooltip' => esc_attr__('Style 6','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/testimonial/testimonial_slider/testimonial_style6.jpg'
								),
								'testimonials_style7' => array(
									'tooltip' => esc_attr__('Style 7','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/testimonial/testimonial_slider/testimonial_style7.jpg'
								),
								'testimonials_style8' => array(
									'tooltip' => esc_attr__('Style 8','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/testimonial/testimonial_slider/testimonial_style8.jpg'
								),
							),
						),
						array(
							"type"			=> "textfield",
							"class"			=> "",
							"heading"		=> __("Excerpt Length",'apcore'),
							"param_name"	=> "excerpt_length",
							"value"			=> '30',							 
						 ),
						array(
							  "type"				=> "dropdown",
							  "heading"				=> __("Desktop Items", 'apcore'),
							  "param_name"			=> "desktop_no_of_items",
							  "value"				=> array(
									"1" => "1",
									"2" => "2",
									"3" => "3",
									"4" => "4",
									"5" => "5",
									"6" => "6",
								),
							  "description" 		=> __("No of slides to show.", 'apcore'),
							  'save_always'			=> true,
							  'std'					=> '1',
							  'edit_field_class'	=> 'vc_column vc_col-sm-4',
						),
						array(
							  "type"				=> "dropdown",
							  "heading"				=> __("Small Desktop Items", 'apcore'),
							  "param_name"			=> "tablet_no_of_items",
							  "value"				=> array(
									"1" => "1",
									"2" => "2",
									"3" => "3",
									"4" => "4",
									"5" => "5",
									"6" => "6",
								),
							  "description"			=> __("No of slides to show.", 'apcore'),
							  'save_always'			=> true,
							  'std'  				=> '1',
							  'edit_field_class' 	=> 'vc_column vc_col-sm-4',
						),
						array(
							  "type"				=> "dropdown",
							  "heading"				=> __("Tablet Items", 'apcore'),
							  "param_name"			=> "mobile_no_of_items",
							  "value"				=> array(
									"1" => "1",
									"2" => "2",
									"3" => "3",
									"4" => "4",
								),
							  "description" 		=> __("No of slides to show.", 'apcore'),
							  'save_always'			=> true,
							  'std'  				=> '1',
							  'edit_field_class' 	=> 'vc_column vc_col-sm-4',
						),
						array(
							'type' 		=> 'zolo_number',
							'heading' 	=> __("Item Gutter",'apcore'),
							'param_name'=> 'slider_gutter',
							'value'		=> '20',
							'suffix'	=> 'px',
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
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Author Image', 'apcore'),
							'param_name'		=> 'author_image',
							'value'				=> 'yes',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
						),
						array(
							"type"			=> "textfield",
							"class"			=> "",
							"heading"		=> __("Number of testimonials to show",'apcore'),
							"description"	=> __("Leave blank or -1 to show all.",'apcore'),  
							"param_name"	=> "num",
							"value"			=> '4',							 
						 ),
						array(
							"type"			=> "dropdown",
							"class"			=> "",
							"heading"		=> __("Testimonials Alignment",'apcore'),
							"param_name"	=> "testimonialalignment",
							"value"			=> array(__("Center",'apcore') => "center",__("Left",'apcore') => "left",__("Right",'apcore') => "right"),
							'dependency'	=> array( 'element' => 'testimonialstyle', 'value' => array('testimonials_style1', 'testimonials_style3', 'testimonials_style4', 'testimonials_style5', 'testimonials_style6', 'testimonials_style7', 'testimonials_style8'))
						),					 						
						array(
							"type"			=> "dropdown",
							"class"			=> "",
							"heading"		=> __("Client Image Border Radius",'apcore'),
							"param_name"	=> "testimonialimgborradi",
							"value"			=> array(
							__("Square",'apcore')	=> "0",
							__("Rounded",'apcore')	=> "6",
							__("Circle",'apcore')	=> "100"
							),
						 ),	
						 array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Box Background Color",'apcore'),
							"param_name"		=> "testimonialbox_bg_color",
							"value"				=> '#ffffff',
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
							'dependency'		=> array( 'element' => 'testimonialstyle', 'value' => array('testimonials_style3', 'testimonials_style4', 'testimonials_style5', 'testimonials_style6', 'testimonials_style7')),
						 ),	
						 array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Box Border Color",'apcore'),
							"param_name"		=> "testimonialbox_border_color",
							"value"				=> 'rgba(0,0,0,0.09)',
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
							'dependency'		=> array( 'element' => 'testimonialstyle', 'value' => array('testimonials_style3', 'testimonials_style4', 'testimonials_style5', 'testimonials_style6', 'testimonials_style7')),
						 ),	
						 array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Active Box Background Color",'apcore'),
							"param_name"		=> "testimonialbox_active_bg_color",
							"value"				=> '#3d81f0',
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
							'dependency'		=> array( 'element' => 'testimonialstyle', 'value' => array('testimonials_style8')),
						 ),	
						 array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Active Box Text Color",'apcore'),
							"param_name"		=> "testimonialbox_active_text_color",
							"value"				=> '#ffffff',
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
							'dependency'		=> array( 'element' => 'testimonialstyle', 'value' => array('testimonials_style8')),
						 ),	
						 array(
							'type' 				=> 'zolo_number',
							'heading' 			=> __("Border Radius",'apcore'),
							'param_name'		=> 'border_radius',
							'value'				=> '0',
							'suffix'			=> 'px',
							'dependency'		=> array( 'element' => 'testimonialstyle', 'value' => array('testimonials_style3', 'testimonials_style4', 'testimonials_style5', 'testimonials_style6', 'testimonials_style7', 'testimonials_style8')),
						),
						 array(
							"type" 				=> "zolo_number",
							"heading" 			=> __("Box top Padding",'apcore'),
							'description' 		=> __( 'Enter value without px', 'apcore' ),
							"param_name" 		=> "box_top_padding",
							"value" 			=> '40',
							'edit_field_class'	=> 'vc_column vc_col-sm-3',
							'dependency'		=> array( 'element' => 'testimonialstyle', 'value' => array('testimonials_style3', 'testimonials_style4', 'testimonials_style5', 'testimonials_style6', 'testimonials_style7', 'testimonials_style8')),
						 ),
						 array(
							"type" 				=> "zolo_number",
							"heading" 			=> __("Box Right Padding",'apcore'),
							'description' 		=> __( 'Enter value without px', 'apcore' ),
							"param_name" 		=> "box_right_padding",
							"value" 			=> '40',
							'edit_field_class'	=> 'vc_column vc_col-sm-3',
							'dependency'		=> array( 'element' => 'testimonialstyle', 'value' => array('testimonials_style3', 'testimonials_style4', 'testimonials_style5', 'testimonials_style6', 'testimonials_style7', 'testimonials_style8')),
						 ),						 
						 array(
							"type" 				=> "zolo_number",
							"heading" 			=> __("Box Bottom Padding",'apcore'),
							'description' 		=> __( 'Enter value without px', 'apcore' ),
							"param_name" 		=> "box_bottom_padding",
							"value" 			=> '40',
							'edit_field_class'	=> 'vc_column vc_col-sm-3',
							'dependency'		=> array( 'element' => 'testimonialstyle', 'value' => array('testimonials_style3', 'testimonials_style4', 'testimonials_style5', 'testimonials_style6', 'testimonials_style7', 'testimonials_style8')),
						 ),	
						 array(
							"type" 				=> "zolo_number",
							"heading" 			=> __("Box Left Padding",'apcore'),
							'description' 		=> __( 'Enter value without px', 'apcore' ),
							"param_name" 		=> "box_left_padding",
							"value" 			=> '40',
							'edit_field_class'	=> 'vc_column vc_col-sm-3',
							'dependency'		=> array( 'element' => 'testimonialstyle', 'value' => array('testimonials_style3', 'testimonials_style4', 'testimonials_style5', 'testimonials_style6', 'testimonials_style7', 'testimonials_style8')),
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
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Box Swing', 'apcore'),
							'param_name'		=> 'box_swing',
							'value'				=> 'no',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
							'dependency'		=> array( 'element' => 'testimonialstyle', 'value' => array('testimonials_style3', 'testimonials_style4', 'testimonials_style5', 'testimonials_style6', 'testimonials_style7')),
						),
						array(
						   'type'    => 'zolo_box_shadow_param',
						   'heading'	=> esc_html__('Box Shadow', 'apcore'),
						   'param_name' => 'box_shadow',
						   "value"		=> 'box_shadow_enable:disable|shadow_horizontal:0|shadow_vertical:2|shadow_blur:10|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
						   'dependency' 		=> array( 'element' => 'testimonialstyle', 'value' => array('testimonials_style3', 'testimonials_style4', 'testimonials_style5', 'testimonials_style6', 'testimonials_style7')),
						),
						array(
						   'type'    => 'zolo_box_shadow_param',
						   'heading'	=> esc_html__('Box Hover Shadow', 'apcore'),
						   'param_name' => 'box_hover_shadow',
						   "value"		=> 'box_shadow_enable:enable|shadow_horizontal:0|shadow_vertical:7|shadow_blur:15|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
						   'dependency' 		=> array( 'element' => 'testimonialstyle', 'value' => array('testimonials_style3', 'testimonials_style4', 'testimonials_style5', 'testimonials_style6', 'testimonials_style7')),
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
							"param_name"		=> "class",
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
							"type" 				=> "zolo_number",
							"class" 			=> "",
							"heading" 			=> __("Font Size",'apcore'),
							'description' 		=> __( 'Enter value without px', 'apcore' ),
							"param_name" 		=> "testimonialnamefontsize",
							"value" 			=> '18',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-4 no-top-margin',
							'group'				=> esc_html__('Client Name Style', 'apcore'),
						 ),	
						 array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Font Color",'apcore'),
							"param_name"		=> "testimonialnamefontcolor",
							"value"				=> '#6f57db',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-4 no-top-margin',
							'group'				=> esc_html__('Client Name Style', 'apcore'),
						 ),	
						array(
							'type'				=> 'zolo_font_container',
							'heading'			=> '',
							'param_name'		=> 'client_font_options',
							'settings'				=> array(
								'fields'				=> array(
									'letter_spacing',
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
							'settings'				=> array(
								'fields'				=> array(
									'font_size' => '13',
									'line_height',
									'letter_spacing',
									'font_style',
									'color',
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
							"type" 				=> "zolo_number",
							"class" 			=> "",
							"heading" 			=> __("Font Size",'apcore'),
							'description' 		=> __( 'Enter value without px', 'apcore' ),
							"param_name" 		=> "testimonialfontsize",
							"value" 			=> '16',
							'edit_field_class'	=> 'vc_column vc_col-sm-4',
							'group'				=> esc_html__('Description Style', 'apcore'),
						 ),
						 array(
							"type" 				=> "zolo_number",
							"class" 			=> "",
							"heading" 			=> __("Line Height",'apcore'),
							'description' 		=> __( 'Enter value without px', 'apcore' ),
							"param_name" 		=> "testimoniallineheight",
							"value" 			=> '24',
							'edit_field_class'	=> 'vc_column vc_col-sm-4',
							'group'				=> esc_html__('Description Style', 'apcore'),
						 ),						 
						array(
							'type'				=> 'zolo_font_container',
							'heading'			=> '',
							'param_name'		=> 'description_font_options',
							'settings'				=> array(
								'fields'				=> array(
									'letter_spacing',
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
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Testimonial Font Color",'apcore'),
							"param_name"		=> "testimonialfontcolor",
							"value"				=> '#747474',
							'group'				=> esc_html__('Description Style', 'apcore'),
						 ),
						 array(
							"type"				=> "attach_image",
							"class"				=> "",
							"heading"			=> __("Image", "apcore"),
							"param_name"		=> "icon_image",
							"value"				=> "",
							'dependency'		=> array( 'element' => 'testimonialstyle', 'value' => array('testimonials_style7')),
							'group'				=> esc_html__('Icon Image', 'apcore'),
						),
						array(
							'type' 				=> 'zolo_number',
							'heading' 			=> __("Image Width",'apcore'),
							'param_name'		=> 'image_width',
							'value'				=> '40',
							'suffix'			=> 'px',
							'dependency' 		=> array( 'element' => 'testimonialstyle', 'value' => array('testimonials_style7')),
							'group'				=> esc_html__('Icon Image', 'apcore'),
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
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Overflow Visible?', 'apcore'),
							'param_name'		=> 'carousel_overflow_visible',
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
							"type"             => "zolo_param_heading",
							"param_name"       => "numbered_pagination",
							"text"             => __( "Numbered Pagination", 'apcore' ),
							'group'=> esc_html__('Carousel','apcore'),
						),
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Numbered Pagination?', 'apcore'),
							'param_name'		=> 'hide_numbered_pagination',
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
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Alignment', 'apcore'),
							'param_name'		=> 'numbered_pagination_alignment',
							'value'				=> 'center',
							'options'			=> array(
								esc_html__('Left', 'apcore') 	=> 'left',
								esc_html__('Center', 'apcore')	=> 'center',
								esc_html__('Right', 'apcore')	=> 'right',
							),
							'group'=> esc_html__('Carousel','apcore'),
							"dependency"	=> array('element' => "hide_numbered_pagination", 'value' => array('yes'))
						),
						array(
							"type" => "colorpicker",
							"class" => "",
							"heading" => __("Color",'apcore'),
							"param_name" => "numbered_pagination_color",
							"value" => '#000000',
							'group'=> esc_html__('Carousel','apcore'),
							"dependency"	=> array('element' => "hide_numbered_pagination", 'value' => array('yes'))
						),
						
						
						
						 array(
							"type"             => "zolo_param_heading",
							"param_name"       => "navigation_arrows",
							"text"             => __( "Navigation Arrows", 'apcore' ),
							'group'=> esc_html__('Carousel','apcore'),
						),
						
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Arrow Navigation?', 'apcore'),
							'param_name'		=> 'hide_arrow_navigation',
							'value'				=> 'yes',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
							'group'			=> esc_html__('Carousel','apcore'),
						),
						array(
						  "type"		=> "dropdown",
						  "heading"		=> __("Navigation Arrow Position", 'apcore'),
						  "param_name"	=> "navigation_arrow_position",
						  "value"		=> array(
								esc_html__("Middle") => "arrow_position_middle",
								esc_html__("Bottom Left") => "arrow_position_bottomleft",
								esc_html__("Bottom center") => "arrow_position_bottomcenter",
								esc_html__("Bottom Right") => "arrow_position_bottomright",
							),
							"dependency"	=> array('element' => "hide_arrow_navigation", 'value' => array('yes')),
							'group'			=> esc_html__('Carousel','apcore'),
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
							'group'=> esc_html__('Carousel','apcore'),
							"dependency"	=> array('element' => "hide_arrow_navigation", 'value' => array('yes'))
		
						),
						array(
							"type" => "colorpicker",
							"class" => "",
							"heading" => __("Arrows color",'apcore'),
							"param_name" => "arrows_color",
							"value" => '#000000',
							'group'=> esc_html__('Carousel','apcore'),
							"dependency"	=> array('element' => "hide_arrow_navigation", 'value' => array('yes'))
						),
						array(
							"type" => "colorpicker",
							"class" => "",
							"heading" => __("Arrows background",'apcore'),
							"param_name" => "arrows_bg",
							"value" => '#eee',
							'dependency' => array( 'element' => 'arrows_style', 'value' => array('arrows_style2', 'arrows_style3')),
							'group'=> esc_html__('Carousel','apcore'),
						),			
						array(
							"type"             => "zolo_param_heading",
							"param_name"       => "navigation_dots",
							"text"             => __( "Navigation dots", 'apcore' ),
							'group'=> esc_html__('Carousel','apcore'),
						),
						
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Dots Navigation?', 'apcore'),
							"description"	=> __("Would you like this slider to display bullets on the bottom?", 'apcore'),
							'param_name'		=> 'bullet_navigation',
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
						  "type"		=> "dropdown",
						  "heading"		=> __("Dots Navigation Position", 'apcore'),
						  "param_name"	=> "navigation_bullet_position",
						  "value"		=> array(
						  		esc_html__("Bottom center") => "bullet_position_bottomcenter",
								esc_html__("Bottom Left") 	=> "bullet_position_bottomleft",
								esc_html__("Bottom Right") 	=> "bullet_position_bottomright",
							),
							"dependency"	=> array('element' => "hide_arrow_navigation", 'value' => array('yes')),
							'group'			=> esc_html__('Carousel','apcore'),
						),
						array(
							'type'        => 'radio_image_select',
							'heading'     => esc_html__( 'Bullet Style', 'apcore' ),
							'param_name'  => 'bullet_navigation_style',
							'simple_mode' => false,
							'options'     => array(
								'dots_style1' => array(
									'tooltip' => esc_attr__('Dots Style 1','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/dots/dots_style1.jpg'
								),
								'dots_style2' => array(
									'tooltip' => esc_attr__('Dots Style 2','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/dots/dots_style2.jpg'
								),
								'dots_style3' => array(
									'tooltip' => esc_attr__('Dots Style 3','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/dots/dots_style3.jpg'
								),	
							),
							'group'=> esc_html__('Carousel','apcore'),
							"dependency"	=> array('element' => "bullet_navigation", 'value' => array('yes'))
						),
						
						array(
							"type" => "colorpicker",
							"class" => "",
							"heading" => __("Bullet background",'apcore'),
							"param_name" => "bullet_bg",
							"value" => '#000000',
							'group'=> esc_html__('Carousel','apcore'),
							"dependency"	=> array('element' => "bullet_navigation", 'value' => array('yes'))
						),
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Description responsive', 'apcore'),
							'param_name'		=> 'description_responsive_heading',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
							'group'				=> esc_html__('Responsive', 'apcore'),
						),
						array(
							'type'				=> 'zolo_param_responsive_text',
							'heading'			=> esc_html__('Description responsive settings', 'apcore'),
							'param_name'		=> 'description_responsive',
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-bottom-padding no-border-bottom',
							'group'				=> esc_html__('Responsive', 'apcore'),
						),
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Client Name responsive', 'apcore'),
							'param_name'		=> 'clientname_responsive_heading',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
							'group'				=> esc_html__('Responsive', 'apcore'),
						),
						array(
							'type'				=> 'zolo_param_responsive_text',
							'heading'			=> esc_html__('Title responsive settings', 'apcore'),
							'param_name'		=> 'clientname_responsive',
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-bottom-padding no-border-bottom',
							'group'				=> esc_html__('Responsive', 'apcore'),
						),
							 
					),
				) );		
		
	}		