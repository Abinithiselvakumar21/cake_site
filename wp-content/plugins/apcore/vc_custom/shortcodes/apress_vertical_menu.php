<?php 
/*-----------------------------------------------------------------------------------*/
/* Vertical Menu
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Vertical_Menu extends WPBakeryShortCode {}

$doc_link = 'http://apresswp.com/help';

function apress_navbar_menu_choices3() {
	$menus = wp_get_nav_menus();
	$items = array();
	$i     = 0;
	foreach ( $menus as $menu ) {
		if ( $i == 0 ) {
			$default = $menu->slug;
			$i ++;
		}
		$items[ $menu->slug ] = $menu->name;
	}

	return $items;
}

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
			"name"			=> __("Vertical Menu", 'apcore'),
			"base"			=> "apress_vertical_menu",
			"category"		=> __( "Header Modules", "apcore"),
			"description"	=> __( "Primary menu for page section", "apcore"),
			"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-menu_list.jpg",
			"params"		=> array(
				array(
					'type'        => 'radio_image_select',
					'heading'     => esc_html__( 'Menu Design', 'apcore' ),
					'param_name'  => 'menu_design',
					'simple_mode' => false,
					'options'     => array(
						'menu_design1' => array(
							'tooltip' => esc_attr__('Style1','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/vertical_menu/style-1.jpg'
						),
						'menu_design2' => array(
							'tooltip' => esc_attr__('Style2','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/vertical_menu/style-2.jpg'
						),
						'menu_design3' => array(
							'tooltip' => esc_attr__('Style3','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/vertical_menu/style-3.jpg'
						),
						'menu_design4' => array(
							'tooltip' => esc_attr__('Style4','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/vertical_menu/style-4.jpg'
						),
						'menu_design5' => array(
							'tooltip' => esc_attr__('Style5','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/vertical_menu/style-5.jpg'
						),
						'menu_design6' => array(
							'tooltip' => esc_attr__('Style6','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/vertical_menu/style-6.jpg'
						),
						'menu_design7' => array(
							'tooltip' => esc_attr__('Style7','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/vertical_menu/style-7.jpg'
						),
						'menu_design8' => array(
							'tooltip' => esc_attr__('Style8','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/vertical_menu/style-8.jpg'
						),
						'menu_design9' => array(
							'tooltip' => esc_attr__('Style9','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/vertical_menu/style-9.jpg'
						),
						
						'menu_design10' => array(
							'tooltip' => esc_attr__('Style10','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/vertical_menu/style-10.jpg'
						),
						'menu_design11' => array(
							'tooltip' => esc_attr__('Style11','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/vertical_menu/style-11.jpg'
						),
						'menu_design12' => array(
							'tooltip' => esc_attr__('Style12','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/vertical_menu/style-12.jpg'
						),
						
						
					),					
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> __("Menu",'apcore'),
					"description"	=> __( "Select the menu you want to use.", "apcore"),
					"param_name"	=> "apress_primary_menu",
					"value"			=> apress_navbar_menu_choices3(),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Vertical Menu Max Width",'apcore'),
					'param_name'		=> 'vertical_menu_max_width',
					'value'				=> '',
					'suffix'			=> 'px',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
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
					'dependency'		=> array('element' => 'menu_design', 'value' => array('menu_design1','menu_design2','menu_design3','menu_design4','menu_design5','menu_design7','menu_design8','menu_design9','menu_design10','menu_design11','menu_design12')),
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Menu Description Overlay Color",'apcore'),
					"param_name"		=> "menu_description_overlay_color",
					"value"				=> '#ffffff',
					'dependency'		=> array('element' => 'menu_design', 'value' => array('menu_design4')),	
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Underline Width",'apcore'),
					'param_name'		=> 'underline_width',
					'value'				=> '3',
					'suffix'			=> 'em',
					'dependency'		=> array('element' => 'menu_design', 'value' => array('menu_design9')),	
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Underline Height",'apcore'),
					'param_name'		=> 'underline_height',
					'value'				=> '4',
					'suffix'			=> 'px',
					'dependency'		=> array('element' => 'menu_design', 'value' => array('menu_design9')),	
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Underline Color",'apcore'),
					"param_name"		=> "underline_color",
					"value"				=> '#dddddd',
					'dependency'		=> array('element' => 'menu_design', 'value' => array('menu_design9')),	
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Underline Hover Color",'apcore'),
					"param_name"		=> "underline_hover_color",
					"value"				=> '#1769ff',
					'dependency'		=> array('element' => 'menu_design', 'value' => array('menu_design9')),	
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
					'dependency'		=> array('element' => 'menu_design', 'value' => array('menu_design1')),				
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
					'type'				=> 'zolo_padding',
					'heading'			=> esc_html__('Menu Padding', 'apcore'),
					'param_name'		=> 'menu_padding',
					'positions'			=> array(
						esc_html__('Top', 'apcore') => "top",
						esc_html__('Right', 'apcore') => "right",
						esc_html__('Bottom', 'apcore') => "bottom",
						esc_html__('Left', 'apcore') => "left",
					),
					'value'				=> 'padding-top:10|padding-bottom:10|padding-left:20|padding-right:20',
					'dependency'		=> array('element' => 'menu_design', 'value' => array('menu_design1')),	
				),
				array(
					'type'				=> 'zolo_padding',
					'heading'			=> esc_html__('Menu Margin', 'apcore'),
					'param_name'		=> 'menu_margin',
					'positions'			=> array(
						esc_html__('Top', 'apcore') => "top",
						esc_html__('Right', 'apcore') => "right",
						esc_html__('Bottom', 'apcore') => "bottom",
						esc_html__('Left', 'apcore') => "left",
					),
				),
				array(
					'type'				=> 'zolo_param_heading',
					'text'				=> esc_html__('Extra features', 'apcore'),
					'param_name'		=> 'subtitle_margin_heading',
					'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
				),
			/*	array(
					"type"				=> "dropdown",
					"class"				=> "",
					"heading"			=> __("CSS Animation",'apcore'),
					"param_name"		=> "data_animation",
					"value"				=> apress_data_animations(),
					"description"		=> __("Select type of animation. Note: Works only in modern browsers.",'apcore'),
					"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-8 no-top-margin",
				),  
				*/
				
				array(
					"type"				=> "dropdown",
					"class"				=> "",
					"heading"			=> __("CSS Animation",'apcore'),
					"param_name"		=> "data_animation",
					//"value"				=> apress_data_animations(),
					"value"			=> array(
						__("No Animation",'apcore') => "noanimation",
						__("FadeIn",'apcore') 		=> "ascending_fade_in",
						__("Fadein Up",'apcore') 	=> "ascending_fadein_up",
						__("Fadein Left",'apcore') 	=> "ascending_fadein_left",
						__("Fadein Right",'apcore') => "ascending_fadein_right",
						__("Reveal",'apcore') 		=> "ascending_reveal",
					),
					//"description"		=> __("Select type of animation. Note: Works only in modern browsers.",'apcore'),
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
					'dependency'		=> array('element' => 'menu_design', 'value' => array('menu_design1', 'menu_design3', 'menu_design4', 'menu_design6', 'menu_design7', 'menu_design8', 'menu_design9', 'menu_design10', 'menu_design11', 'menu_design12')),
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'group'				=> esc_html__('Menu Typography', 'apcore'),
				),
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Hover Styling', 'apcore'),
					'param_name'		=> 'vertical_hover_styling',
					'value'				=> 'single_color',
					'options'			=> array(
						esc_html__('Multi Color', 'apcore') 	=> 'multi_color',
						esc_html__('Single Color', 'apcore')	=> 'single_color',
					),
					'group'				=> esc_html__('Menu Typography', 'apcore'),
					'dependency'		=> array('element' => 'menu_design', 'value' => array('menu_design2', 'menu_design5')),
				),
				
				
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Menu Hover Color 1",'apcore'),
					"param_name"		=> "vertical_hover_color1",
					"value"				=> '#D9250C',
					'edit_field_class'	=> 'vc_column vc_col-sm-4 crum_vc',
					'group'				=> esc_html__('Menu Typography', 'apcore'),
					'dependency'		=> array('element' => 'vertical_hover_styling', 'value' => array('multi_color')),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Menu Hover Color 2",'apcore'),
					"param_name"		=> "vertical_hover_color2",
					"value"				=> '#F2670D',
					'edit_field_class'	=> 'vc_column vc_col-sm-4 crum_vc',
					'group'				=> esc_html__('Menu Typography', 'apcore'),
					'dependency'		=> array('element' => 'vertical_hover_styling', 'value' => array('multi_color')),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Menu Hover Color 3",'apcore'),
					"param_name"		=> "vertical_hover_color3",
					"value"				=> '#EBD789',
					'edit_field_class'	=> 'vc_column vc_col-sm-4 crum_vc',
					'group'				=> esc_html__('Menu Typography', 'apcore'),
					'dependency'		=> array('element' => 'vertical_hover_styling', 'value' => array('multi_color')),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Menu Hover Color 4",'apcore'),
					"param_name"		=> "vertical_hover_color4",
					"value"				=> '#A450D9',
					'edit_field_class'	=> 'vc_column vc_col-sm-4 crum_vc',
					'group'				=> esc_html__('Menu Typography', 'apcore'),
					'dependency'		=> array('element' => 'vertical_hover_styling', 'value' => array('multi_color')),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Menu Hover Color 5",'apcore'),
					"param_name"		=> "vertical_hover_color5",
					"value"				=> '#5D23BF',
					'edit_field_class'	=> 'vc_column vc_col-sm-4 crum_vc',
					'group'				=> esc_html__('Menu Typography', 'apcore'),
					'dependency'		=> array('element' => 'vertical_hover_styling', 'value' => array('multi_color')),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Menu Hover Color 6",'apcore'),
					"param_name"		=> "vertical_hover_color6",
					"value"				=> '#D2A918',
					'edit_field_class'	=> 'vc_column vc_col-sm-4 crum_vc',
					'group'				=> esc_html__('Menu Typography', 'apcore'),
					'dependency'		=> array('element' => 'vertical_hover_styling', 'value' => array('multi_color')),
				),
				
				
				
				
				
				
				
				
				
				
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Single Color ",'apcore'),
					"param_name"		=> "vertical_hover_single_color",
					"value"				=> '#6ca0ff',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'dependency'		=> array('element' => 'vertical_hover_styling', 'value' => array('single_color')),
					'group'				=> esc_html__('Menu Typography', 'apcore'),
				),
				
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Menu Description Color",'apcore'),
					"param_name"		=> "menu_description_color",
					"value"				=> '#1769ff',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'dependency'		=> array('element' => 'menu_design', 'value' => array('menu_design7','menu_design8', 'menu_design5')),		
					'group'				=> esc_html__('Menu Typography', 'apcore'),
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
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Alignment', 'apcore'),
					'param_name'		=> 'dropdown_menu_alignment',
					'value'				=> 'left',
					'options'			=> array(
						esc_html__('Left', 'apcore') 	=> 'left',
						esc_html__('Center', 'apcore')	=> 'center',
						esc_html__('Right', 'apcore')	=> 'right',
					),
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Menu Font Size",'apcore'),
					'param_name'		=> 'dropdown_menu_font_size',
					'value'				=> '',
					'suffix'			=> 'px',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Hover Style', 'apcore'),
					'param_name'		=> 'dropdown_hover_style',
					'value'				=> 'dropdown_hover_style_none',
					'options'			=> array(
						esc_html__('None', 'apcore') 	=> 'dropdown_hover_style_none',
						esc_html__('Underline', 'apcore')	=> 'underline_style',
						esc_html__('Left Border', 'apcore')	=> 'dropdown_hover_style_border',
					),
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
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Item Padding Top",'apcore'),
					'param_name'		=> 'dropdown_item_padding_top',
					'value'				=> '10',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Item Padding Right",'apcore'),
					'param_name'		=> 'dropdown_item_padding_right',
					'value'				=> '0',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Item Padding Bottom",'apcore'),
					'param_name'		=> 'dropdown_item_padding_bottom',
					'value'				=> '10',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Item Padding Left",'apcore'),
					'param_name'		=> 'dropdown_item_padding_left',
					'value'				=> '0',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
					'type'				=> 'zolo_param_responsive_text',
					'heading'			=> esc_html__('Menu responsive settings', 'apcore'),
					'param_name'		=> 'menu_responsive',
					'edit_field_class'	=> 'vc_column vc_col-sm-12 no-bottom-padding no-border-bottom',
					'group'				=> esc_html__('Responsive', 'apcore'),
				),

			
				),
			) 
		);		
		
	}		