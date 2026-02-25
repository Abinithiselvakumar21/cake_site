<?php 
/*-----------------------------------------------------------------------------------*/
/* Header Social Icon
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Header_Social_Icon extends WPBakeryShortCode {}

$doc_link = 'http://apresswp.com/help';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
			"name"			=> __("Header Social Icon", 'apcore'),
			"base"			=> "apress_header_social_icon",
			"category"		=> __( "Header Modules", "apcore"),
			"description"	=> __( "Social icon for header section", "apcore"),
			"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-social.png",
			"params"		=> array(
				array(
					'type'        => 'radio_image_select',
					'heading'     => esc_html__( 'Style', 'apcore' ),
					'param_name'  => 'style',
					'simple_mode' => false,
					'options'     => array(
						'social_style1' => array(
							'tooltip' => esc_attr__('Style1','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/social_icon/social_icon_style1.jpg'
						),
						'social_style2' => array(
							'tooltip' => esc_attr__('Style2','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/social_icon/social_icon_style2.jpg'
						),
						'social_style3' => array(
							'tooltip' => esc_attr__('Style3','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/social_icon/social_icon_style3.jpg'
						),
						'social_style4' => array(
							'tooltip' => esc_attr__('Style4','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/social_icon/social_icon_style4.jpg'
						),
						'social_style5' => array(
							'tooltip' => esc_attr__('Style5','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/social_icon/social_icon_style5.jpg'
						),
						'social_style6' => array(
							'tooltip' => esc_attr__('Style6','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/social_icon/social_icon_style6.jpg'
						),
						'social_style7' => array(
							'tooltip' => esc_attr__('Style7','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/social_icon/social_icon_style7.jpg'
						),
					),					
				),
				
				array(
					"type"			=> "dropdown",
					"heading"		=> __("Select Color Scheme",'apcore'),
					"param_name"	=> "color_scheme",
					"value"			=> array(
						__("Brand Color",'apcore') 		=> "brand_color",
						__("Primary Color",'apcore') 	=> "primary_color_scheme",
						__("Color Scheme 1",'apcore') 	=> "color_scheme1",
						__("Color Scheme 2",'apcore') 	=> "color_scheme2",
						__("Gradient Scheme 1",'apcore')=> "gradient_scheme1",
						__("Gradient Scheme 2",'apcore')=> "gradient_scheme2",
						__("Gradient Scheme 3",'apcore')=> "gradient_scheme3",
						__("Custom Color",'apcore') 	=> "design_your_own"
					),
					'dependency'	=> array('element' => 'style', 'value' => array('social_style1', 'social_style2', 'social_style3', 'social_style4')),
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> __("Select Color Scheme",'apcore'),
					"param_name"	=> "color_scheme2",
					"value"			=> array(
						__("Brand Color",'apcore') 		=> "brand_color",
						__("Custom Color",'apcore') 	=> "design_your_own"
					),
					'dependency'	=> array('element' => 'style', 'value' => array('social_style5')),
				),
				
				
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Icon Color",'apcore'),
					"param_name"		=> "icon_color",
					"value"				=> '#ffffff',
					'dependency'		=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Icon Hover Color",'apcore'),
					"param_name"		=> "icon_hover_color",
					"value"				=> '#ffffff',
					'dependency'		=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Icon Background Color",'apcore'),
					"param_name"		=> "icon_bg_color",
					"value"				=> '#34a6ff',
					'dependency'		=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Icon Hover Background Color",'apcore'),
					"param_name"		=> "icon_hover_bg_color",
					"value"				=> '#34a6ff',
					'dependency'		=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
				),
				
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Icon Color",'apcore'),
					"param_name"		=> "icon_color2",
					"value"				=> '#34a6ff',
					'dependency'		=> array('element' => 'color_scheme2', 'value' => array('design_your_own')),
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Icon Hover Color",'apcore'),
					"param_name"		=> "icon_hover_color2",
					"value"				=> '#34a6ff',
					'dependency'		=> array('element' => 'color_scheme2', 'value' => array('design_your_own')),
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Icon Border Color",'apcore'),
					"param_name"		=> "icon_border_color2",
					"value"				=> '#34a6ff',
					'dependency'		=> array('element' => 'color_scheme2', 'value' => array('design_your_own')),
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Icon Hover Border Color",'apcore'),
					"param_name"		=> "icon_hover_border_color2",
					"value"				=> '#34a6ff',
					'dependency'		=> array('element' => 'color_scheme2', 'value' => array('design_your_own')),
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
				),		
				array(
					"type"			=> "dropdown",
					"heading"		=> __("Select Icon Hover Style",'apcore'),
					"param_name"	=> "icon_hover_style",
					"value"			=> array(
						__("None",'apcore') 		=> "social_hover_none",
						__("Fade",'apcore') 		=> "social_hover_fade",
						__("Slide",'apcore') 		=> "social_hover_scroll"
					),
					'dependency'	=> array('element' => 'style', 'value' => array('social_style1', 'social_style2', 'social_style3', 'social_style4', 'social_style5')),
				),
				
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Icon Background Color",'apcore'),
					"param_name"		=> "style6_icon_bg_color",
					"value"				=> '#ffffff',
					'dependency'	=> array('element' => 'style', 'value' => array('social_style6','social_style7')),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Icon Color",'apcore'),
					"param_name"		=> "style7_icon_color",
					"value"				=> '#333',
					'dependency'	=> array('element' => 'style', 'value' => array('social_style7')),
				),
				array(
					"type"				=> "dropdown",
					"class"				=> "",
					"heading"			=> __("Orientation",'apcore'),
					"param_name"		=> "orientation",
					'value'				=> array(
						__("Horizontal",'apcore') 	=> "horizontal",
						__("Vertical",'apcore') 	=> "vertical",
					),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Icon Size",'apcore'),
					'param_name'		=> 'icon_size',
					'value'				=> '20',
					'suffix'			=> 'px',
				),
				array(
				   'type'    => 'zolo_box_shadow_param',
				   'heading'	=> esc_html__('Social Shadow', 'apcore'),
				   'param_name' => 'box_shadow',
				   "value"		=> 'box_shadow_enable:enable|shadow_horizontal:0|shadow_vertical:5|shadow_blur:15|shadow_spread:-5|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
				   'dependency'	=> array('element' => 'style', 'value' => array('social_style2', 'social_style3', 'social_style4', 'social_style5', 'social_style6')),
				),
				array(
				   'type'    => 'zolo_box_shadow_param',
				   'heading'	=> esc_html__('Social Hover Shadow', 'apcore'),
				   'param_name' => 'box_hover_shadow',
				   "value"		=> 'box_shadow_enable:enable|shadow_horizontal:0|shadow_vertical:5|shadow_blur:20|shadow_spread:-5|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
				   'dependency'	=> array('element' => 'style', 'value' => array('social_style2', 'social_style3', 'social_style4', 'social_style5', 'social_style6')),
				),
				array(
					'type' => 'param_group',
					'heading' => esc_html__( 'Profiles', 'apcore' ),
					'param_name' => 'values',
					'params' => array(
					
						array(
							"type"				=> "dropdown",
							"heading"			=> __("Website",'apcore'),
							"param_name"		=> "website_name",
							"value"				=> apress_data_header_social(),
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
						),
						array(
							"type"				=> "textfield",
							"heading"			=> __("URL (Link)","apcore"),
							"param_name"		=> "website_url",
							"value"				=> "",
							"description"		=> __("Add social link","apcore"),
							'edit_field_class'	=> 'vc_column vc_col-sm-6  no-top-margin',
						),

						),
					'dependency' => array(
					'element' => 'add_extended',
					'value' => 'yes'
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
					'video_link'		=> 'https://youtu.be/Gk6g0uOC9V0',
				),
				
				
				array(
					"type"			=> "zolo_radio_advanced",
					"heading"		=> __("Show this item in Side Panel",'apcore'),
					"param_name"	=> "show_item_in_side_panel",
					'value'			=> 'disable',
					"options"			=> array(
						__("Enable",'apcore') 		=> "enable",
						__("Disable",'apcore') 		=> "disable",
					),
					'group'				=> esc_html__('Extras', 'apcore'),
				),
				array(
					"type"			=> "zolo_radio_advanced",
					"heading"		=> __("Alignment",'apcore'),
					"param_name"	=> "side_panel_alignment",
					'value'			=> 'right',
					"options"			=> array(
						__("Left",'apcore') 		=> "left",
						__("Right",'apcore') 		=> "right",
					),
					'dependency'		=> array('element' => 'show_item_in_side_panel', 'value' => array('enable')),
					'group'				=> esc_html__('Extras', 'apcore'),
				),
				array(
					"type"			=> "zolo_radio_advanced",
					"heading"		=> __("Vertical Alignment",'apcore'),
					"param_name"	=> "side_panel_vertical_alignment",
					'value'			=> 'middle',
					"options"		=> array(
						__("Top",'apcore') 		=> "top",
						__("Middle",'apcore')	=> "middle",
						__("Bottom",'apcore') 	=> "bottom",
					),
					'dependency'		=> array('element' => 'show_item_in_side_panel', 'value' => array('enable')),
					'group'				=> esc_html__('Extras', 'apcore'),
				),
				array(
					'type' 				=> 'textfield',
					'heading' 			=> __("Top Offset",'apcore'),
					"description"		=> __("Add here offset values for ex. 10px / 10%","apcore"),
					'param_name'		=> 'side_panel_top_offset',
					'value'				=> '20px',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'dependency'		=> array('element' => 'side_panel_vertical_alignment', 'value' => array('top')),
					'group'				=> esc_html__('Extras', 'apcore'),
				),
				array(
					'type' 				=> 'textfield',
					'heading' 			=> __("Top Offset",'apcore'),
					"description"		=> __("Add here offset values for ex. 10px / 10%","apcore"),
					'param_name'		=> 'side_panel_middle_offset',
					'value'				=> '50%',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'dependency'		=> array('element' => 'side_panel_vertical_alignment', 'value' => array('middle')),
					'group'				=> esc_html__('Extras', 'apcore'),
				),
				array(
					'type' 				=> 'textfield',
					'heading' 			=> __("Bottom Offset",'apcore'),
					"description"		=> __("Add here offset values for ex. 10px / 10%","apcore"),
					'param_name'		=> 'side_panel_bottom_offset',
					'value'				=> '20px',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'dependency'		=> array('element' => 'side_panel_vertical_alignment', 'value' => array('bottom')),
					'group'				=> esc_html__('Extras', 'apcore'),
				),
				array(
					'type' 				=> 'textfield',
					'heading' 			=> __("Left Offset",'apcore'),
					"description"		=> __("Add here offset values for ex. 10px / 10%","apcore"),
					'param_name'		=> 'side_panel_left_offset',
					'value'				=> '0px',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'dependency'		=> array('element' => 'side_panel_alignment', 'value' => array('left')),
					'group'				=> esc_html__('Extras', 'apcore'),
				),
				array(
					'type' 				=> 'textfield',
					'heading' 			=> __("Right Offset",'apcore'),
					"description"		=> __("Add here offset values for ex. 10px / 10%","apcore"),
					'param_name'		=> 'side_panel_right_offset',
					'value'				=> '0px',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'dependency'		=> array('element' => 'side_panel_alignment', 'value' => array('right')),
					'group'				=> esc_html__('Extras', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Hide under screen size",'apcore'),
					'param_name'		=> 'hide_under_screen_size',
					'value'				=> '',
					'suffix'			=> 'px',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'dependency'		=> array('element' => 'show_item_in_side_panel', 'value' => array('enable')),
					'group'				=> esc_html__('Extras', 'apcore'),
				),
				
				
				array(
					'type'				=> 'zolo_single_checkbox',
					'heading'			=> esc_html__('Enable Title', 'apcore'),
					'param_name'		=> 'enable_title',
					'value'				=> 'no',
					'options'			=> array(
						'yes'			=> array(
							'on'				=> 'Yes',
							'off'				=> 'No',
						),
					),
					'dependency'		=> array('element' => 'orientation', 'value' => array('horizontal')),
					'group'				=> esc_html__('Title', 'apcore'),
				),
				array(
					"type"				=> "textfield",
					"heading"			=> __("Title", "apcore"),
					"param_name"		=> "title_text",
					'dependency'		=> array('element' => 'enable_title', 'value' => array('yes')),
					'group'				=> esc_html__('Title', 'apcore'),
				),
				
				
				
				array(
					'type'				=> 'zolo_param_heading',
					'text'				=> esc_html__('Title Typography', 'apcore'),
					'param_name'		=> 'title_t_heading',
					'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
					'group'				=> esc_html__('Title', 'apcore'),
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
							'color',
						),
					),
					'group'				=> esc_html__('Title', 'apcore'),
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
					'group'				=> esc_html__('Title', 'apcore'),
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
					'group'				=> esc_html__('Title', 'apcore'),
				),
				
				
				
				
				

	
			
				),
			) 
		);		
		
	}		