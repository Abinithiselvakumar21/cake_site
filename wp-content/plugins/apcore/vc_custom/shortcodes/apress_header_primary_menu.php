<?php 
/*-----------------------------------------------------------------------------------*/
/* Header Primary Menu
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Header_Primary_Menu extends WPBakeryShortCode {}

$doc_link = 'http://apresswp.com/help';


if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
			"name"			=> __("Primary Menu", 'apcore'),
			"base"			=> "apress_header_primary_menu",
			"category"		=> __( "Header Modules", "apcore"),
			"description"	=> __( "Primary menu for header section", "apcore"),
			"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-menu_list.jpg",
			"params"		=> array(
				array(
					"type"			=> "dropdown",
					"heading"		=> __("Menu",'apcore'),
					"description"	=> __( "Select the menu you want to use.", "apcore"),
					"param_name"	=> "apress_primary_menu",
					"value"			=> apress_navbar_menu_choices(),
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
					'heading' 			=> __("Vertical Menu Max Width",'apcore'),
					'param_name'		=> 'vertical_menu_max_width',
					'value'				=> '',
					'suffix'			=> 'px',
					'dependency'		=> array('element' => 'orientation', 'value' => array('vertical')),
				),
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Alignment', 'apcore'),
					'param_name'		=> 'vertical_menu_alignment',
					'value'				=> 'left',
					'options'			=> array(
						esc_html__('Left', 'apcore') 	=> 'left',
						esc_html__('Center', 'apcore')	=> 'center',
						esc_html__('Right', 'apcore')	=> 'right',
					),
					'dependency'		=> array('element' => 'orientation', 'value' => array('vertical')),
				),
				array(
					'type'				=> 'zolo_single_checkbox',
					'heading'			=> esc_html__('Enable flex?', 'apcore'),
					'param_name'		=> 'apress_enable_flex_menu',
					'value'				=> 'no',
					'options'			=> array(
						'yes'			=> array(
							'on'				=> 'Yes',
							'off'				=> 'No',
						),
					),
					'dependency'		=> array('element' => 'orientation', 'value' => array('horizontal')),
				),
				array(
					'type'        => 'radio_image_select',
					'heading'     => esc_html__( 'Select a hover style for menu', 'apcore' ),
					'param_name'  => 'hover_style',
					'simple_mode' => false,
					'options'     => array(
						'menu_hover_style1' => array(
							'tooltip' => esc_attr__('Style1','apcore'),
							'src' => get_template_directory_uri().'/assets/images/headers/menu/menu-design1.jpg'
						),
						'menu_hover_style2' => array(
							'tooltip' => esc_attr__('Style2','apcore'),
							'src' => get_template_directory_uri().'/assets/images/headers/menu/menu-design2.jpg'
						),
						'menu_hover_style3' => array(
							'tooltip' => esc_attr__('Style3','apcore'),
							'src' => get_template_directory_uri().'/assets/images/headers/menu/menu-design3.jpg'
						),
						'menu_hover_style4' => array(
							'tooltip' => esc_attr__('Style4','apcore'),
							'src' => get_template_directory_uri().'/assets/images/headers/menu/menu-design4.jpg'
						),
						'menu_hover_style5' => array(
							'tooltip' => esc_attr__('Style5','apcore'),
							'src' => get_template_directory_uri().'/assets/images/headers/menu/menu-hover-style-1.gif'
						),
						'menu_hover_style6' => array(
							'tooltip' => esc_attr__('Style6','apcore'),
							'src' => get_template_directory_uri().'/assets/images/headers/menu/menu-hover-style-2.gif'
						),
						'menu_hover_style7' => array(
							'tooltip' => esc_attr__('Style7','apcore'),
							'src' => get_template_directory_uri().'/assets/images/headers/menu/menu-hover-style-3.gif'
						),
						'menu_hover_style8' => array(
							'tooltip' => esc_attr__('Style8','apcore'),
							'src' => get_template_directory_uri().'/assets/images/headers/menu/menu-hover-style-4.gif'
						),
						'menu_hover_style9' => array(
							'tooltip' => esc_attr__('Style9','apcore'),
							'src' => get_template_directory_uri().'/assets/images/headers/menu/menu-design9.jpg'
						),
						'menu_hover_style10' => array(
							'tooltip' => esc_attr__('Style10','apcore'),
							'src' => get_template_directory_uri().'/assets/images/headers/menu/menu-design10.jpg'
						),
						'menu_hover_style11' => array(
							'tooltip' => esc_attr__('Style11','apcore'),
							'src' => get_template_directory_uri().'/assets/images/headers/menu/menu-design11.jpg'
						),
						'menu_hover_style12' => array(
							'tooltip' => esc_attr__('Style12','apcore'),
							'src' => get_template_directory_uri().'/assets/images/headers/menu/menu-design12.jpg'
						),
						
						
					),					
				),
				
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Menu Border Width",'apcore'),
					'param_name'		=> 'menu_border_width',
					'value'				=> '2',
					'suffix'			=> 'px',
					'dependency'		=> array('element' => 'hover_style', 'value' => array('menu_hover_style3','menu_hover_style4','menu_hover_style5','menu_hover_style6','menu_hover_style7','menu_hover_style8')),
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Menu Hover Border Color",'apcore'),
					"param_name"		=> "menu_hover_border_color",
					"value"				=> '#1769ff',
					'dependency'		=> array('element' => 'hover_style', 'value' => array('menu_hover_style3','menu_hover_style4','menu_hover_style5','menu_hover_style6','menu_hover_style7','menu_hover_style8')),
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Menu Hover Background Color",'apcore'),
					"param_name"		=> "menu_hover_bg_color",
					"value"				=> '#1769ff',
					'dependency'		=> array('element' => 'hover_style', 'value' => array('menu_hover_style2')),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Menu Hover Background Border Radius",'apcore'),
					'param_name'		=> 'menu_hover_bg_radius',
					'value'				=> '0',
					'suffix'			=> 'px',
					'dependency'		=> array('element' => 'hover_style', 'value' => array('menu_hover_style2')),
				),
				
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Menu Padding Top",'apcore'),
					'param_name'		=> 'menu_item_padding_top',
					'value'				=> '10',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Menu Padding Right",'apcore'),
					'param_name'		=> 'menu_item_padding_right',
					'value'				=> '20',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Menu Padding Bottom",'apcore'),
					'param_name'		=> 'menu_item_padding_bottom',
					'value'				=> '10',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Menu Padding Left",'apcore'),
					'param_name'		=> 'menu_item_padding_left',
					'value'				=> '20',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Menu Margin Top",'apcore'),
					'param_name'		=> 'menu_item_margin_top',
					'value'				=> '',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Menu Margin Right",'apcore'),
					'param_name'		=> 'menu_item_margin_right',
					'value'				=> '',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Menu Margin Bottom",'apcore'),
					'param_name'		=> 'menu_item_margin_bottom',
					'value'				=> '',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Menu Margin Left",'apcore'),
					'param_name'		=> 'menu_item_margin_left',
					'value'				=> '',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
				),
				
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Menu Separator', 'apcore'),
					'param_name'		=> 'menu_separator',
					'value'				=> 'no',
					'options'			=> array(
						esc_html__('Yes', 'apcore') 	=> 'yes',
						esc_html__('No', 'apcore')	=> 'no',
					),
				),
				
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Separator Height",'apcore'),
					'param_name'		=> 'menu_separator_height',
					'value'				=> '12',
					'suffix'			=> 'px',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'dependency' => array( 'element' => 'menu_separator', 'value' => 'yes'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Separator Color",'apcore'),
					"param_name"		=> "menu_separator_color",
					"value"				=> '#ffffff',
					'dependency' => array( 'element' => 'menu_separator', 'value' => 'yes'),
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
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
					'type'				=> 'zolo_font_container',
					'heading'			=> '',
					'param_name'		=> 'menu_font_options',
					'settings'				=> array(
						'fields'				=> array(
							'font_size',							
							'line_height',
							'letter_spacing',
							'font_style',
						),
					),
					'group'				=> esc_html__('Menu Typography', 'apcore'),
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> __("Text Transform",'apcore'),
					"param_name"	=> "menu_text_transform",
					"value"			=> array(
						__("Inherit",'apcore') 		=> "inherit",
						__("Uppercase",'apcore') 	=> "uppercase",
						__("Capitalize",'apcore') 	=> "capitalize",
						__("Lowercase",'apcore') 	=> "lowercase",
					),
					'group'				=> esc_html__('Menu Typography', 'apcore'),
				),
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Custom font family', 'apcore'),
					'param_name'		=> 'menu_google_fonts',
					'value'				=> 'no',
					'options'			=> array(
						esc_html__('Yes', 'apcore')	=> 'yes',
						esc_html__('No', 'apcore') => 'no',
					),
					'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
					'group'				=> esc_html__('Menu Typography', 'apcore'),
				),
				array(
					'type'				=> 'google_fonts',
					'param_name'		=> 'menu_custom_fonts',
					'settings'			=> array(
						'fields'			=> array(
							'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
							'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
						),
					),
					'dependency' => array( 'element' => 'menu_google_fonts', 'value' => 'yes'),
					'group'				=> esc_html__('Menu Typography', 'apcore'),
				),	
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Menu Color",'apcore'),
					"param_name"		=> "menu_color",
					"value"				=> '#4f4f4f',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'group'				=> esc_html__('Menu Typography', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Menu Hover Color",'apcore'),
					"param_name"		=> "menu_hover_color",
					"value"				=> '#1769ff',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'group'				=> esc_html__('Menu Typography', 'apcore'),
				),
				
				
				array(
					'type'				=> 'zolo_param_heading',
					'text'				=> esc_html__('Dropdown Wrapper Style', 'apcore'),
					'param_name'		=> 'dropdown_wrap_heading',
					'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Dropdown Width",'apcore'),
					'param_name'		=> 'dropdown_width',
					'value'				=> '210',
					'suffix'			=> 'px',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Dropdown Border Radius",'apcore'),
					'param_name'		=> 'dropdown_border_radius',
					'value'				=> '6',
					'suffix'			=> 'px',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Padding Top",'apcore'),
					'param_name'		=> 'dropdown_padding_top',
					'value'				=> '0',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Padding Right",'apcore'),
					'param_name'		=> 'dropdown_padding_right',
					'value'				=> '0',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Padding Bottom",'apcore'),
					'param_name'		=> 'dropdown_padding_bottom',
					'value'				=> '0',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Padding Left",'apcore'),
					'param_name'		=> 'dropdown_padding_left',
					'value'				=> '0',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Alignment', 'apcore'),
					'param_name'		=> 'dropdown_menu_alignment',
					'value'				=> 'left',
					'options'			=> array(
						esc_html__('Left', 'apcore') 	=> 'left',
						esc_html__('Center', 'apcore')	=> 'center',
						esc_html__('Right', 'apcore')	=> 'right',
					),
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Dropdown Background Color",'apcore'),
					"param_name"		=> "dropdown_bg_color",
					"value"				=> '#ffffff',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
				   'type'				=> 'zolo_box_shadow_param',
				   'heading'			=> esc_html__('Dropdown Shadow', 'apcore'),
				   'param_name'			=> 'dropdown_box_shadow',
				   "value"				=> 'box_shadow_enable:enable|shadow_horizontal:4|shadow_vertical:10|shadow_blur:25|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.12)',
				   'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
					'type'				=> 'zolo_param_heading',
					'text'				=> esc_html__('Dropdown Item Style', 'apcore'),
					'param_name'		=> 'dropdown_item_heading',
					'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Hover Style', 'apcore'),
					'param_name'		=> 'dropdown_hover_style',
					'value'				=> 'background_style',
					'options'			=> array(
						esc_html__('Bg Color', 'apcore') 	=> 'background_style',
						esc_html__('Underline', 'apcore')	=> 'underline_style',
					),
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Menu Hover Background Color",'apcore'),
					"param_name"		=> "dropdown_menu_hover_bg_color",
					"value"				=> '#ffffff',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'dependency' => array( 'element' => 'dropdown_hover_style', 'value' => 'background_style'),
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Menu Hover Underline Color",'apcore'),
					"param_name"		=> "dropdown_menu_hover_underline_color",
					"value"				=> '#1769ff',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'dependency' => array( 'element' => 'dropdown_hover_style', 'value' => 'underline_style'),
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Menu Font Size",'apcore'),
					'param_name'		=> 'dropdown_menu_font_size',
					'value'				=> '',
					'suffix'			=> 'px',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				
				array(
					"type"			=> "dropdown",
					"heading"		=> __("Text Transform",'apcore'),
					"param_name"	=> "dropdown_menu_text_transform",
					"value"			=> array(
						__("Inherit",'apcore') 		=> "inherit",
						__("Uppercase",'apcore') 	=> "uppercase",
						__("Capitalize",'apcore') 	=> "capitalize",
						__("Lowercase",'apcore') 	=> "lowercase",
					),
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> __("Font Weight",'apcore'),
					"param_name"	=> "dropdown_menu_font_weight",
					"value"			=> array(
						__("Inherit",'apcore') 		=> "inherit",
						__("Normal",'apcore') 		=> "normal",
						__("Bold",'apcore') 		=> "bold",
					),
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> __("Font Style",'apcore'),
					"param_name"	=> "dropdown_menu_font_style",
					"value"			=> array(
						__("Inherit",'apcore') 		=> "inherit",
						__("Normal",'apcore') 		=> "normal",
						__("Italic",'apcore') 		=> "italic",
					),
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Menu Color",'apcore'),
					"param_name"		=> "dropdown_menu_color",
					"value"				=> '#4f4f4f',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Menu Hover Color",'apcore'),
					"param_name"		=> "dropdown_menu_hover_color",
					"value"				=> '#1769ff',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Menu Border Color",'apcore'),
					"param_name"		=> "dropdown_item_border_color",
					"value"				=> '#f4f4f4',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Item Padding Top",'apcore'),
					'param_name'		=> 'dropdown_item_padding_top',
					'value'				=> '12',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Item Padding Right",'apcore'),
					'param_name'		=> 'dropdown_item_padding_right',
					'value'				=> '30',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Item Padding Bottom",'apcore'),
					'param_name'		=> 'dropdown_item_padding_bottom',
					'value'				=> '12',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Item Padding Left",'apcore'),
					'param_name'		=> 'dropdown_item_padding_left',
					'value'				=> '30',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Mobile menu active', 'apcore'),
					'param_name'		=> 'mobile_menu_active',
					'value'				=> 'no',
					'options'			=> array(
						esc_html__('Yes', 'apcore') 	=> 'yes',
						esc_html__('No', 'apcore')	=> 'no',
					),
					"description"	=> __( "To change Responsive Breakpoint Go to WP Dashboard - Appearance - Theme Options - Header - Responsive Breakpoints.", "apcore"),
					'group'				=> esc_html__('Mobile menu', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Nav Icon Color",'apcore'),
					"param_name"		=> "mobile_nav_icon_color",
					"value"				=> '#000',
					'dependency' => array( 'element' => 'mobile_menu_active', 'value' => 'yes'),
					'group'				=> esc_html__('Mobile menu', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Mobile Menu Canvas Width",'apcore'),
					'param_name'		=> 'mobile_menu_canvas_width',
					'value'				=> '360',
					'suffix'			=> 'px',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'dependency' => array( 'element' => 'mobile_menu_active', 'value' => 'yes'),
					'group'				=> esc_html__('Mobile menu', 'apcore'),
				),
				
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Canvas Background Color",'apcore'),
					"param_name"		=> "mobile_menu_canvas_background_color",
					"value"				=> '#000',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'dependency' => array( 'element' => 'mobile_menu_active', 'value' => 'yes'),
					'group'				=> esc_html__('Mobile menu', 'apcore'),
				),
				array(
					'type'				=> 'zolo_padding',
					'heading'			=> esc_html__('Canvas Padding', 'apcore'),
					'param_name'		=> 'mobile_menu_canvas_padding',
					'positions'			=> array(
						esc_html__('Top', 'apcore') => "top",
						esc_html__('Right', 'apcore') => "right",
						esc_html__('Bottom', 'apcore') => "bottom",
						esc_html__('Left', 'apcore') => "left",
					),
					'value'				=> 'padding-top:60|padding-bottom:60|padding-left:0|padding-right:0',
					'dependency' => array( 'element' => 'mobile_menu_active', 'value' => 'yes'),
					'group'				=> esc_html__('Mobile menu', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Mobile Menu Text Color",'apcore'),
					"param_name"		=> "mobile_menu_color",
					"value"				=> '#ffffff',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'dependency' => array( 'element' => 'mobile_menu_active', 'value' => 'yes'),
					'group'				=> esc_html__('Mobile menu', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Mobile Menu Text Hover Color",'apcore'),
					"param_name"		=> "mobile_menu_hover_color",
					"value"				=> '#1769ff',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'dependency' => array( 'element' => 'mobile_menu_active', 'value' => 'yes'),
					'group'				=> esc_html__('Mobile menu', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Menu Active Background Color",'apcore'),
					"param_name"		=> "mobile_menu_active_background_color",
					"value"				=> '#333',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'dependency' => array( 'element' => 'mobile_menu_active', 'value' => 'yes'),
					'group'				=> esc_html__('Mobile menu', 'apcore'),
				),
				array(
					'type'				=> 'zolo_padding',
					'heading'			=> esc_html__('mobile Menu Padding', 'apcore'),
					'param_name'		=> 'mobile_menu_padding',
					'positions'			=> array(
						//esc_html__('Top', 'apcore') => "top",
						esc_html__('Right', 'apcore') => "right",
						//esc_html__('Bottom', 'apcore') => "bottom",
						esc_html__('Left', 'apcore') => "left",
					),
					'value'				=> 'padding-top:0|padding-bottom:0|padding-left:20|padding-right:20',
					'dependency' => array( 'element' => 'mobile_menu_active', 'value' => 'yes'),
					'group'				=> esc_html__('Mobile menu', 'apcore'),
				),
				
			
				),
			) 
		);		
		
	}		