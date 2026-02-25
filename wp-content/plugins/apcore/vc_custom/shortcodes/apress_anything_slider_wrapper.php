<?php 
/*-----------------------------------------------------------------------------------*/
/* Anything Slider Wrapper
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Anything_Slider_Wrapper extends WPBakeryShortCodesContainer {}

if ( function_exists( 'vc_map' ) ) {
vc_map( array(
		"name"						=>  __( 'Anything Slider Wrapper', 'apcore' ),
		"base"						=> "apress_anything_slider_wrapper",
		"as_parent"					=> array( 'except' => 'apress_anything_slider_wrapper' ),
		"content_element"			=> true,
		"category"					=> __( "Apress", "apcore"),
		"description"				=> __("Anything Slider Design", "apcore"),
		"icon"						=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-video_slider.jpg",
		"show_settings_on_create" 	=> true,
		"controls"                	=> "full",
		"js_view"					=> 'VcColumnView',
		'params'					=> array(
			
			array(
				'type'        => 'radio_image_select',
				'heading'     => esc_html__( 'Choose Style', 'apcore' ),
				"holder"	  => "div",
				'param_name'  => 'style',
				'simple_mode' => false,
				'admin_label' => true,
				'options'     => array(
					'style1' => array(
						'tooltip' => esc_attr__('Style 1','apcore'),
						'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/anythingslider/anything_slider1.jpg'
					),
					'style2' => array(
						'tooltip' => esc_attr__('Style 2','apcore'),
						'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/anythingslider/anything_slider2.jpg'
					),
				),
			),
			array(
			  "type"		=> "dropdown",
			  "heading"		=> __("Slider Type", 'apcore'),
			  "param_name"	=> "slider_type",
			  "value"		=> array(
					esc_html__("Horizontal") => "horizontal",
					esc_html__("Vertical") => "vertical",
				),
				"dependency"	=> array('element' => "style", 'value' => array('style1'))
			),
			array(
				'type'				=> 'zolo_single_checkbox',
				'heading'			=> esc_html__('Overflow Visible?', 'apcore'),
				'param_name'		=> 'slick_overflow_visible2',
				'value'				=> 'no',
				'options'			=> array(
					'yes'			=> array(
						'on'				=> 'Yes',
						'off'				=> 'No',
					), 				
				),
				"dependency"	=> array('element' => "slider_type", 'value' => array('horizontal'))
			),
			array(
				'type'				=> 'zolo_single_checkbox',
				'heading'			=> esc_html__('Overflow Visible?', 'apcore'),
				'param_name'		=> 'slick_overflow_visible',
				'value'				=> 'no',
				'options'			=> array(
					'yes'			=> array(
						'on'				=> 'Yes',
						'off'				=> 'No',
					), 				
				),
				"dependency"	=> array('element' => "style", 'value' => array('style2'))
			),
			array(
			  "type"		=> "dropdown",
			  "heading"		=> __("Desktop Items", 'apcore'),
			  "param_name"	=> "desktop_no_of_items",
			  "value"		=> array(
					"1" => "1",
					"2" => "2",
					"3" => "3",
					"4" => "4",
					"5" => "5",
					"6" => "6",
					"7" => "7",
					"8" => "8",
					"9" => "9",
					"10" => "10"
				),
			  "description" => __("No of slides to show.", 'apcore'),
			  'save_always'	=> true,
			  'edit_field_class' => 'vc_column vc_col-sm-4',
			),
			array(
				  "type"		=> "dropdown",
				  "heading"		=> __("Small Desktop Items", 'apcore'),
				  "param_name"	=> "small_desktop_no_of_items",
				  "value"		=> array(
						"1" => "1",
						"2" => "2",
						"3" => "3",
						"4" => "4",
						"5" => "5",
						"6" => "6",
					),
				  "description" => __("No of slides to show.", 'apcore'),
				  'save_always'	=> true,
				  'edit_field_class' => 'vc_column vc_col-sm-4',
			),
			array(
				  "type"		=> "dropdown",
				  "heading"		=> __("Tablet Items", 'apcore'),
				  "param_name"	=> "tablet_no_of_items",
				  "value"		=> array(
						"1" => "1",
						"2" => "2",
						"3" => "3",
						"4" => "4",
						"5" => "5",
						"6" => "6",
					),
				  "description" => __("No of slides to show.", 'apcore'),
				  'save_always'	=> true,
				  'edit_field_class' => 'vc_column vc_col-sm-4',
			),
			array(
				  "type"		=> "dropdown",
				  "heading"		=> __("Mobile Items", 'apcore'),
				  "param_name"	=> "mobile_no_of_items",
				  "value"		=> array(
						"1" => "1",
						"2" => "2",
						"3" => "3",
						"4" => "4",
						"5" => "5",
						"6" => "6",
					),
				  "description" => __("No of slides to show.", 'apcore'),
				  'save_always'	=> true,
				  'edit_field_class' => 'vc_column vc_col-sm-4',
			),
			
			array(
				"type"             => "zolo_param_heading",
				"param_name"       => "slidestoscroll",
				"text"             => __( "Slides To Scroll", 'apcore' ),
			),
			array(
			  "type"		=> "dropdown",
			  "heading"		=> __("Desktop Items", 'apcore'),
			  "param_name"	=> "desktop_no_of_items_scroll",
			  "value"		=> array(
					"1" => "1",
					"2" => "2",
					"3" => "3",
					"4" => "4",
					"5" => "5",
					"6" => "6",
					"7" => "7",
					"8" => "8",
					"9" => "9",
					"10" => "10"
				),
			  "description" => __("No of slides to scroll.", 'apcore'),
			  'save_always'	=> true,
			  'edit_field_class' => 'vc_column vc_col-sm-4',
			),
			array(
				  "type"		=> "dropdown",
				  "heading"		=> __("Small Desktop Items", 'apcore'),
				  "param_name"	=> "small_desktop_no_of_items_scroll",
				  "value"		=> array(
						"1" => "1",
						"2" => "2",
						"3" => "3",
						"4" => "4",
						"5" => "5",
						"6" => "6",
					),
				  "description" => __("No of slides to scroll.", 'apcore'),
				  'save_always'	=> true,
				  'edit_field_class' => 'vc_column vc_col-sm-4',
			),
			array(
				  "type"		=> "dropdown",
				  "heading"		=> __("Tablet Items", 'apcore'),
				  "param_name"	=> "tablet_no_of_items_scroll",
				  "value"		=> array(
						"1" => "1",
						"2" => "2",
						"3" => "3",
						"4" => "4",
						"5" => "5",
						"6" => "6",
					),
				  "description" => __("No of slides to scroll.", 'apcore'),
				  'save_always'	=> true,
				  'edit_field_class' => 'vc_column vc_col-sm-4',
			),
			array(
				  "type"		=> "dropdown",
				  "heading"		=> __("Mobile Items", 'apcore'),
				  "param_name"	=> "mobile_no_of_items_scroll",
				  "value"		=> array(
						"1" => "1",
						"2" => "2",
						"3" => "3",
						"4" => "4",
						"5" => "5",
						"6" => "6",
					),
				  "description" => __("No of slides to scroll.", 'apcore'),
				  'save_always'	=> true,
				  'edit_field_class' => 'vc_column vc_col-sm-4',
			),
			array(
				'type'			=> 'zolo_number',
				'heading'		=> esc_html__('Item Gutter', 'apcore'),
				'param_name'	=> 'slider_gutter',
				'value'			=> 10,
				'suffix' 		=> 'px',
			),
			array(
				'type'				=> 'zolo_single_checkbox',
				'heading'			=> esc_html__('Enable Auto Play', 'apcore'),
				"description"	=> __("Will cause your images to auto play until user interaction", 'apcore'),
				'param_name'		=> 'slick_autoplay',
				'value'				=> 'no',
				'options'			=> array(
					'yes'			=> array(
						'on'				=> 'Yes',
						'off'				=> 'No',
					),
				),
				'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
			),
			array(
				"type"			=> 'textfield',
				"heading"		=> __("Auto Play Duration", 'apcore'),
				"param_name"	=> "slick_autoplay_duration",
				"description"	=> __("Enter a custom duration in milliseconds between auto play advances e.g. 5000", 'apcore'),
				"value"			=> '2000',
				'save_always'	=> true,
				"dependency"	=> array('element' => "slick_autoplay", 'value' => array('yes')),
				'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
			),
			
			
			array(
				'type'				=> 'textfield',
				'heading'			=> esc_html__('Heading', 'apcore'),
				'param_name'		=> 'slider_title',
				'value'				=> esc_html__('Heading','apcore'),
				'admin_label'		=> true,
				'group'			=> esc_html__('Content','apcore'),
				"dependency"	=> array('element' => "style", 'value' => array('style2'))
			),

			array(
			  "type" 		=> "textarea",
			  "class" 		=> "",
			  "heading" 	=> __( "Description", "apcore" ),
			  "param_name" 	=> "slider_description",
			  "value" 		=> __( "I am test text block. Click edit button to change this text 1.", "apcore" ),
			  'group'		=> esc_html__('Content','apcore'),
				"dependency"	=> array('element' => "style", 'value' => array('style2'))
			 ),
 			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Description Font color",'apcore'),
				"param_name" => "slider_description_color",
				"value" => '#ffffff',
				'group'=> esc_html__('Content','apcore'),
				"dependency"	=> array('element' => "style", 'value' => array('style2'))
			),
 
			array(
				'type'				=> 'zolo_param_heading',
				'text'				=> esc_html__('Heading Typography', 'apcore'),
				'param_name'		=> 'heading_t_heading',
				'class'				=> 'zolo-param-heading',
				'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12',
				'group'				=> esc_html__('Content', 'apcore'),
				"dependency"	=> array('element' => "style", 'value' => array('style2'))
			),
			array(
				'type'				=> 'zolo_font_container',
				'heading'			=> '',
				'param_name'		=> 'heading_font_options',
				'settings'			=> array(
					'fields'			=> array(
						'tag' => 'div',
						'font_size',
						'line_height',
						'letter_spacing',
						'font_style',
						'color',
					),
				),
				'group'				=> esc_html__('Content', 'apcore'),
				"dependency"	=> array('element' => "style", 'value' => array('style2'))
			),
			array(
				'type'				=> 'zolo_radio_advanced',
				'heading'			=> esc_html__('Custom font family', 'apcore'),
				'param_name'		=> 'heading_google_fonts',
				'value'				=> 'no',
				'options'			=> array(
					esc_html__('Yes', 'apcore')	=> 'yes',
					esc_html__('No', 'apcore') => 'no',
				),
				'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
				'group'				=> esc_html__('Content', 'apcore'),
				"dependency"	=> array('element' => "style", 'value' => array('style2'))
			),
			array(
				'type'				=> 'google_fonts',
				'param_name'		=> 'heading_custom_fonts',
				'settings'			=> array(
					'fields'			=> array(
						'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
						'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
					),
				),
				'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
				'dependency' => array( 'element' => 'heading_google_fonts', 'value' => 'yes'),
				'group'				=> esc_html__('Content', 'apcore'),
			),
			array(
				'type'				=> 'zolo_param_heading',
				'text'				=> esc_html__('Section Heading Responsive Settings', 'apcore'),
				'param_name'		=> 'section_responsive_heading',
				'class'				=> 'zolo-param-heading',
				'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12',
				"dependency"	=> array('element' => "style", 'value' => array('style2')),
				'group'				=> esc_html__('Content', 'apcore'),
			),
			array(
				'type'				=> 'zolo_param_responsive_text',
				'heading'			=> esc_html__('Heading responsive settings', 'apcore'),
				'param_name'		=> 'heading_responsive',
				'edit_field_class'	=> 'vc_column vc_col-sm-12 no-bottom-padding no-border-bottom',
				"dependency"	=> array('element' => "style", 'value' => array('style2')),
				'group'				=> esc_html__('Content', 'apcore'),
			),
			
			
			
			
			array(
				"type"             => "zolo_param_heading",
				"param_name"       => "navigation_arrows",
				"text"             => __( "Navigation Arrows", 'apcore' ),
				'group'=> esc_html__('Navigation','apcore'),
			),
			array(
			  "type"		=> "dropdown",
			  "heading"		=> __("Navigation Position?", 'apcore'),
			  "param_name"	=> "slider_navigation_position",
			  "value"		=> array(
					esc_html__("Left") => "navigation_position_left",
					esc_html__("Right") => "navigation_position_right",
				),
			  "dependency"	=> array('element' => "slider_type", 'value' => array('vertical')),
			  'group'=> esc_html__('Navigation','apcore'),
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
				'group'			=> esc_html__('Navigation','apcore'),
			),
			array(
				'type'				=> 'zolo_single_checkbox',
				'heading'			=> esc_html__('Navigation Appear On Hover', 'apcore'),
				'param_name'		=> 'navigation_appear_on_hover',
				'value'				=> 'no',
				'options'			=> array(
					'yes'			=> array(
						'on'				=> 'Yes',
						'off'				=> 'No',
					),
				),
				"dependency"	=> array('element' => "slick_hide_arrow_navigation", 'value' => array('yes')),
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
			  "type"		=> "dropdown",
			  "heading"		=> __("Navigation Arrow Position (This will work on style one only)", 'apcore'),
			  "param_name"	=> "navigation_arrow_position",
			  "description"	=> __("This will work on style one only", 'apcore'),
			  "value"		=> array(
								esc_html__("Middle Inside") 	=> "arrow_position_middle",
								esc_html__("Middle Outside") 	=> "arrow_position_middle_outside",
								esc_html__("Top Left") 			=> "arrow_position_topleft",
								esc_html__("Top Right") 		=> "arrow_position_topright",
							),
				"dependency"	=> array('element' => "slick_hide_arrow_navigation", 'value' => array('yes')),
				'group'			=> esc_html__('Navigation','apcore'),
			),
			
			array(
				'type'			=> 'zolo_number',
				'heading'		=> esc_html__('Navigation Arrows Top Offset (This will work on style one only)', 'apcore'),
				'param_name'	=> 'navigation_arrow_top_offset',
				'value'			=> '',
				'suffix' 		=> 'px',
				"dependency"	=> array('element' => "navigation_arrow_position", 'value' => array('arrow_position_topleft', 'arrow_position_topright')),
				'group'			=> esc_html__('Navigation','apcore'),
			),
			array(
				'type'			=> 'zolo_number',
				'heading'		=> esc_html__('Navigation Arrows Right Offset (This will work on style one only)', 'apcore'),
				'param_name'	=> 'navigation_arrow_right_offset',
				'value'			=> '15',
				'suffix' 		=> 'px',
				"dependency"	=> array('element' => "navigation_arrow_position", 'value' => array('arrow_position_topright')),
				'group'			=> esc_html__('Navigation','apcore'),
			),
			array(
				'type'			=> 'zolo_number',
				'heading'		=> esc_html__('Navigation Arrows Left Offset (This will work on style one only)', 'apcore'),
				'param_name'	=> 'navigation_arrow_left_offset',
				'value'			=> '15',
				'suffix' 		=> 'px',
				"dependency"	=> array('element' => "navigation_arrow_position", 'value' => array('arrow_position_topleft')),
				'group'			=> esc_html__('Navigation','apcore'),
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
			array(
				"type"             => "zolo_param_heading",
				"param_name"       => "navigation_dots",
				"text"             => __( "Navigation dots", 'apcore' ),
				'group'=> esc_html__('Navigation','apcore'),
			),
			
			array(
				'type'				=> 'zolo_single_checkbox',
				'heading'			=> esc_html__('Dots Navigation?', 'apcore'),
				"description"	=> __("Would you like this slider to display bullets on the bottom?", 'apcore'),
				'param_name'		=> 'slick_bullet_navigation',
				'value'				=> 'yes',
				'options'			=> array(
					'yes'			=> array(
						'on'				=> 'Yes',
						'off'				=> 'No',
					), 				
				),
				'group'			=> esc_html__('Navigation','apcore'),
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
				'group'=> esc_html__('Navigation','apcore'),
				"dependency"	=> array('element' => "slick_bullet_navigation", 'value' => array('yes'))
			),
			
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Bullet background",'apcore'),
				"param_name" => "bullet_bg",
				"value" => '#000000',
				'group'=> esc_html__('Navigation','apcore'),
				"dependency"	=> array('element' => "slick_bullet_navigation", 'value' => array('yes'))
			),
			
			array(
				"type"             => "zolo_param_heading",
				"param_name"       => "numbered_pagination",
				"text"             => __( "Numbered Pagination", 'apcore' ),
				'group'=> esc_html__('Navigation','apcore'),
			),
			array(
				'type'				=> 'zolo_single_checkbox',
				'heading'			=> esc_html__('Numbered Pagination?', 'apcore'),
				'param_name'		=> 'slick_numbered_pagination',
				'value'				=> 'no',
				'options'			=> array(
					'yes'			=> array(
						'on'				=> 'Yes',
						'off'				=> 'No',
					), 				
				),
				'group'			=> esc_html__('Navigation','apcore'),
			),
			array(
				'type'				=> 'zolo_radio_advanced',
				'heading'			=> esc_html__('Alignment', 'apcore'),
				'param_name'		=> 'numbered_pagination_alignment',
				'value'				=> 'right',
				'options'			=> array(
					esc_html__('Left', 'apcore')	=> 'left',
					esc_html__('Center', 'apcore') => 'center',
					esc_html__('Right', 'apcore')	=> 'right'
				),
				'group'=> esc_html__('Navigation','apcore'),
				"dependency"	=> array('element' => "slick_numbered_pagination", 'value' => array('yes'))
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Numbered Pagination Color",'apcore'),
				"param_name" => "slick_numbered_pagination_color",
				"value" => '#000000',
				'group'=> esc_html__('Navigation','apcore'),
				"dependency"	=> array('element' => "slick_numbered_pagination", 'value' => array('yes'))
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
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Extra class name', 'apcore'),
				'param_name'	=> 'el_class',
				'description'	=> esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'apcore')
			),
			
		)
	));		
}		



