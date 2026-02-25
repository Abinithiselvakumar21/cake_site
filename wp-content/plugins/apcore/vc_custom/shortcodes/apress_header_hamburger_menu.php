<?php 
/*-----------------------------------------------------------------------------------*/
/* Header Hamburger Menu
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Header_Hamburger_Menu extends WPBakeryShortCode {}

/*function apress_navbar_menu_choices1() {
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
}*/

/*function apress_hamburger_menu_choices() {
	$hamburger_menu_options[''] = 'Select';
	
	$hamburger_menu_template = get_posts( array( 'post_type' => 'apcore_footer', 'posts_per_page' => -1 ) );
	
	foreach ( $hamburger_menu_template as $hamburger_menu_template ) {
		$hamburger_menu_options[$hamburger_menu_template->ID] = $hamburger_menu_template->post_title;
	}
	//$hamburger_menu_options = str_replace(' ', '-', $hamburger_menu_options); 
	return $hamburger_menu_options;
}*/

function apress_hamburger_menu_choices() {
	
	$hamburger_menu_options['Select'] = '';
	$hamburger_menu_template_type = get_posts( array( 'post_type' => 'apcore_template', 'posts_per_page' => -1 ) );	
	
	if ( $hamburger_menu_template_type ) {
		foreach ( $hamburger_menu_template_type as $hamburger_menu_template ) {
			$hamburger_menu_options[ $hamburger_menu_template->post_title ] = $hamburger_menu_template->ID;
		}
	} 
	return $hamburger_menu_options;
}

$doc_link = 'http://apresswp.com/help';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
			"name"			=> __("Hamburger Menu", 'apcore'),
			"base"			=> "apress_header_hamburger_menu",
			"category"		=> __( "Header Modules", "apcore"),
			"description"	=> __( "Hamburger Menu for header section", "apcore"),
			"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-hamburger.jpg",
			"params"		=> array(

				array(
					'type'        => 'radio_image_select',
					'heading'     => esc_html__( 'Select a style', 'apcore' ),
					'param_name'  => 'style',
					'simple_mode' => false,
					'options'     => array(
						'style1' => array(
							'tooltip' => esc_attr__('Style1','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/hamburger_menu/style1.jpg'
						),
						'style2' => array(
							'tooltip' => esc_attr__('Style2','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/hamburger_menu/style2.jpg'
						),
						'style3' => array(
							'tooltip' => esc_attr__('Style3','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/hamburger_menu/style3.jpg'
						),
						'style4' => array(
							'tooltip' => esc_attr__('Style4','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/hamburger_menu/style4.jpg'
						),
						'style5' => array(
							'tooltip' => esc_attr__('Style5','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/hamburger_menu/style5.jpg'
						),
						'style6' => array(
							'tooltip' => esc_attr__('Style6','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/hamburger_menu/style6.jpg'
						),
						'style7' => array(
							'tooltip' => esc_attr__('Style7','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/hamburger_menu/style7.jpg'
						),
						'style8' => array(
							'tooltip' => esc_attr__('Style8','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/hamburger_menu/style8.jpg'
						),
						'style9' => array(
							'tooltip' => esc_attr__('Style9','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/hamburger_menu/style9.jpg'
						),
						'custom_icon' => array(
							'tooltip' => esc_attr__('Custom Icon','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/hamburger_menu/custom_icon.jpg'
						),
						
					),					
				),
				array(
					"type"				=> "attach_image",
					"class"				=> "",
					"heading"			=> __("Icon Image", "apcore"),
					"param_name"		=> "icon_image",
					"value"				=> "",
					'dependency'		=> array('element' => 'style', 'value' => array('custom_icon')),
				),
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("Button Text Left","apcore"),
					"param_name"		=> "button_text_left",
					"value"				=> "",
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
				),
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("Button Text Right","apcore"),
					"param_name"		=> "button_text_right",
					"value"				=> "",
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
				),
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("Button Text Bottom","apcore"),
					"param_name"		=> "button_text_bottom",
					"value"				=> "",
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
				),
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("Button Text on Hover","apcore"),
					"param_name"		=> "button_text_on_hover",
					"value"				=> "",
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Button Text Font Size",'apcore'),
					'param_name'		=> 'button_text_font_size',
					'value'				=> '14',
					'suffix'			=> 'px',
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Icon Color",'apcore'),
					"param_name"		=> "border_color",
					"value"				=> '#1769ff',
					'edit_field_class'	=> 'vc_column vc_col-sm-4 crum_vc',
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Text Color",'apcore'),
					"param_name"		=> "icon_text_color",
					"value"				=> '#4f4f4f',
					'edit_field_class'	=> 'vc_column vc_col-sm-4 crum_vc',
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Text Hover Color",'apcore'),
					"param_name"		=> "icon_text_hover_color",
					"value"				=> '#1769ff',
					'edit_field_class'	=> 'vc_column vc_col-sm-4 crum_vc',
				),
				
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Icon Background",'apcore'),
					"param_name"		=> "icon_background_color",
					"value"				=> '',
					'edit_field_class'	=> 'vc_column vc_col-sm-4 crum_vc',
				),
				array(
					"type"				=> "dropdown",
					"class"				=> "",
					"heading"			=> __("Background Shape",'apcore'),
					"param_name"		=> "background_shape",
					"value"			=> array (
						"Square" 	=> "square", 
						"Rounded" 	=> "rounded", 
						"Round" 	=> "round" 
					), 
					"admin_label"	=> true,
					'edit_field_class'	=> 'vc_column vc_col-sm-4 crum_vc',
				),
				array(
				   'type'    => 'zolo_box_shadow_param',
				   'heading'	=> esc_html__('Shadow', 'apcore'),
				   'param_name' => 'icon_shadow',
				   "value"		=> 'box_shadow_enable:disable|shadow_horizontal:4|shadow_vertical:10|shadow_blur:25|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
				),	
				array(
					'type'				=> 'zolo_padding',
					'heading'			=> esc_html__('Icon Padding', 'apcore'),
					'param_name'		=> 'icon_padding',
					'positions'			=> array(
						esc_html__('Top', 'apcore') => "top",
						esc_html__('Right', 'apcore') => "right",
						esc_html__('Bottom', 'apcore') => "bottom",
						esc_html__('Left', 'apcore') => "left",
					),
					'value'				=> 'padding-top:14|padding-bottom:14|padding-left:10|padding-right:10',
				),
				array(
					'type'				=> 'zolo_padding',
					'heading'			=> esc_html__('Icon Margin', 'apcore'),
					'param_name'		=> 'icon_margin',
					'positions'			=> array(
						esc_html__('Top', 'apcore') => "top",
						esc_html__('Right', 'apcore') => "right",
						esc_html__('Bottom', 'apcore') => "bottom",
						esc_html__('Left', 'apcore') => "left",
					),
					'value'				=> '',
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> __("Hamburger Menu Action",'apcore'),
					"param_name"	=> "hamburger_menu_action",
					"value"			=> array(
						__("Menu",'apcore')				=> "extended_menu",
						__("Extended Sidebar",'apcore') => "extended_sidebar"
					),
				),
				
				array(
					"type"			=> "dropdown",
					"heading"		=> __("Extended Sidebar Position",'apcore'),
					"param_name"	=> "extended_sidebar_position",
					'value'			=> 'right',
					"value"			=> array(
						__("Right",'apcore')	=> "right",
						__("Left",'apcore')		=> "left",
						__("Top",'apcore')		=> "top",
						__("Bottom",'apcore')	=> "bottom",
					),
					'dependency'		=> array('element' => 'hamburger_menu_action', 'value' => array('extended_sidebar')),
				),
				array(
					'type'				=> 'zolo_number',
					'heading'			=> esc_html__('Canvas Width','apcore'),
					'param_name'		=> 'canvas_width',
					'step'				=> '1',
					'value'				=> '400',
					'suffix'			=> 'px',
					'dependency'		=> array('element' => 'extended_sidebar_position', 'value' => array('left', 'right')),
				),
				array(
					'type'				=> 'zolo_number',
					'heading'			=> esc_html__('Canvas Height','apcore'),
					'param_name'		=> 'canvas_height',
					'step'				=> '1',
					'value'				=> '400',
					'suffix'			=> 'px',
					'dependency'		=> array('element' => 'extended_sidebar_position', 'value' => array('top', 'bottom')),
				),
				
				array(
					"type"			=> "dropdown",
					"heading"		=> __("Menu Style",'apcore'),
					"param_name"	=> "menu_style",
					"value"			=> array(
						__("Vertical Menu",'apcore') 	=> "vertical_menu",
						__("Horizontal Menu",'apcore') 	=> "horizontal_menu",
						__("Full Screen Menu",'apcore')=> "full_screen_menu",
					),
					'dependency'		=> array('element' => 'hamburger_menu_action', 'value' => array('extended_menu')),
					'group'				=> esc_html__('Menu', 'apcore'),
				),
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Select Type', 'apcore'),
					'param_name'		=> 'select_type',
					'value'				=> 'default',
					'options'			=> array(
						esc_html__('Default', 'apcore') 		=> 'default',
						esc_html__('Page Builder', 'apcore')=> 'page_builder',
					),
					'dependency'		=> array('element' => 'menu_style', 'value' => array('full_screen_menu')),
					'group'				=> esc_html__('Menu', 'apcore'),
				),
				
				array(
					"type"			=> "dropdown",
					"heading"		=> __("Template",'apcore'),
					"description"	=> __( "First make your footer from footer custom types then select it from here.", "apcore"),
					"param_name"	=> "apress_hamburger_menu_template",
					"value"			=> apress_hamburger_menu_choices(),
					'dependency'	=> array('element' => 'select_type', 'value' => array('page_builder')),
					'group'				=> esc_html__('Menu', 'apcore'),
				),
				
				array(
					"type"			=> "dropdown",
					"heading"		=> __("Select Menu",'apcore'),
					"description"	=> __( "Select the menu you want to use.", "apcore"),
					"param_name"	=> "apress_primary_menu",
					"value"			=> apress_navbar_menu_choices(),
					'dependency'		=> array('element' => 'menu_style', 'value' => array('vertical_menu', 'horizontal_menu')),
					'group'				=> esc_html__('Menu', 'apcore'),
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> __("Select Menu",'apcore'),
					"description"	=> __( "Select the menu you want to use.", "apcore"),
					"param_name"	=> "apress_primary_menu2",
					"value"			=> apress_navbar_menu_choices(),
					'dependency'	=> array('element' => 'select_type', 'value' => array('default')),
					'group'			=> esc_html__('Menu', 'apcore'),
				),
				
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Open Menu', 'apcore'),
					'param_name'		=> 'open_menu',
					'value'				=> 'open_left_side',
					'options'			=> array(
						esc_html__('Left Side', 'apcore') 	=> 'open_left_side',
						esc_html__('Right Side', 'apcore')	=> 'open_right_side',
					),
					'dependency'		=> array('element' => 'menu_style', 'value' => array('vertical_menu', 'horizontal_menu')),
					'group'				=> esc_html__('Menu', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Menu Padding Top",'apcore'),
					'param_name'		=> 'menu_item_padding_top',
					'value'				=> '12',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'dependency'		=> array('element' => 'menu_style', 'value' => array('vertical_menu', 'horizontal_menu')),
					'group'				=> esc_html__('Menu', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Menu Padding Right",'apcore'),
					'param_name'		=> 'menu_item_padding_right',
					'value'				=> '20',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'dependency'		=> array('element' => 'menu_style', 'value' => array('vertical_menu', 'horizontal_menu')),
					'group'				=> esc_html__('Menu', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Menu Padding Bottom",'apcore'),
					'param_name'		=> 'menu_item_padding_bottom',
					'value'				=> '12',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'dependency'		=> array('element' => 'menu_style', 'value' => array('vertical_menu', 'horizontal_menu')),
					'group'				=> esc_html__('Menu', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Menu Padding Left",'apcore'),
					'param_name'		=> 'menu_item_padding_left',
					'value'				=> '20',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'dependency'		=> array('element' => 'menu_style', 'value' => array('vertical_menu', 'horizontal_menu')),
					'group'				=> esc_html__('Menu', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Menu Margin Top",'apcore'),
					'param_name'		=> 'menu_item_margin_top',
					'value'				=> '3',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'dependency'		=> array('element' => 'menu_style', 'value' => array('vertical_menu', 'horizontal_menu')),
					'group'				=> esc_html__('Menu', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Menu Margin Right",'apcore'),
					'param_name'		=> 'menu_item_margin_right',
					'value'				=> '0',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'dependency'		=> array('element' => 'menu_style', 'value' => array('vertical_menu', 'horizontal_menu')),
					'group'			=> esc_html__('Menu', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Menu Margin Bottom",'apcore'),
					'param_name'		=> 'menu_item_margin_bottom',
					'value'				=> '3',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'dependency'		=> array('element' => 'menu_style', 'value' => array('vertical_menu', 'horizontal_menu')),
					'group'				=> esc_html__('Menu', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Menu Margin Left",'apcore'),
					'param_name'		=> 'menu_item_margin_left',
					'value'				=> '0',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'dependency'		=> array('element' => 'menu_style', 'value' => array('vertical_menu', 'horizontal_menu')),
					'group'				=> esc_html__('Menu', 'apcore'),
				),
				
				
				
				
				//sidebar Content
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Select Type', 'apcore'),
					'param_name'		=> 'select_sidebar_type',
					'value'				=> 'default',
					'options'			=> array(
						esc_html__('Default', 'apcore') 		=> 'default',
						esc_html__('Page Builder', 'apcore')=> 'page_builder',
					),
					'dependency'		=> array('element' => 'hamburger_menu_action', 'value' => array('extended_sidebar')),
					'group'				=> esc_html__('Sidebar', 'apcore'),
				),
				
				array(
					"type"			=> "dropdown",
					"heading"		=> __("Template",'apcore'),
					"description"	=> __( "First make your footer from footer custom types then select it from here.", "apcore"),
					"param_name"	=> "apress_hamburger_sidebar_template",
					"value"			=> apress_hamburger_menu_choices(),
					'dependency'	=> array('element' => 'select_sidebar_type', 'value' => array('page_builder')),
					'group'				=> esc_html__('Sidebar', 'apcore'),
				),
				
				//Styling
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Canvas Video Background', 'apcore'),
					'param_name'		=> 'canvas_video_bg_option',
					'value'				=> 'disable',
					'options'			=> array(
						esc_html__('Enable', 'apcore') 	=> 'enable',
						esc_html__('Disable', 'apcore')	=> 'disable',
					),
					'group'				=> esc_html__('Styling', 'apcore'),
				),
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("Self Hosted URL","apcore"),
					"param_name"		=> "canvas_self_hosted_video_url",
					"value"				=> "",
					'dependency'		=> array('element' => 'canvas_video_bg_option', 'value' => array('enable')),
					'group'				=> esc_html__('Styling', 'apcore'),
				),
				
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Extended Sidebar - BG Image', 'apcore'),
					'param_name'		=> 'extended_sidebar_bg_image',
					'value'				=> 'fixed',
					'options'			=> array(
						esc_html__('Fixed', 'apcore') 	=> 'fixed',
						esc_html__('Slide', 'apcore')	=> 'slide',
					),
					'dependency'		=> array('element' => 'extended_sidebar_position', 'value' => array('left', 'right')),
					'group'				=> esc_html__('Styling', 'apcore'),
				),
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Content Animated', 'apcore'),
					'param_name'		=> 'extended_sidebar_content_animated',
					'value'				=> 'on',
					'options'			=> array(
						esc_html__('On', 'apcore') 	=> 'on',
						esc_html__('Off', 'apcore')	=> 'off',
					),
					'dependency'		=> array('element' => 'extended_sidebar_bg_image', 'value' => array('fixed')),
					'group'				=> esc_html__('Styling', 'apcore'),
				),
				
				array(
					"type"				=> "attach_image",
					"class"				=> "",
					"heading"			=> __("Canvas Background Image", "apcore"),
					"param_name"		=> "canvas_image",
					"value"				=> "",
					'edit_field_class'	=> 'vc_column vc_col-sm-4 crum_vc',
					'group'				=> esc_html__('Styling', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Canvas Background Color",'apcore'),
					'param_name'		=> "canvas_color",
					"value"				=> '#ffffff',
					'edit_field_class'	=> 'vc_column vc_col-sm-4 crum_vc',
					'group'			=> esc_html__('Styling', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Background Overlay Color",'apcore'),
					'param_name'		=> "canvas_bg_overlay_color",
					"value"				=> '',
					'edit_field_class'	=> 'vc_column vc_col-sm-4 crum_vc',
					'group'			=> esc_html__('Styling', 'apcore'),
				),
				
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Text Color",'apcore'),
					'param_name'		=> "text_color",
					"value"				=> '#1c1c1c',
					'edit_field_class'	=> 'vc_column vc_col-sm-4 crum_vc',
					'group'			=> esc_html__('Styling', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Link Color",'apcore'),
					'param_name'		=> "link_color",
					"value"				=> '#1c1c1c',
					'edit_field_class'	=> 'vc_column vc_col-sm-4 crum_vc',
					'group'			=> esc_html__('Styling', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Link Hover Color",'apcore'),
					'param_name'		=> "link_hover_color",
					"value"				=> '#1769ff',
					'edit_field_class'	=> 'vc_column vc_col-sm-4 crum_vc',
					'group'			=> esc_html__('Styling', 'apcore'),
				),
				
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Background Color",'apcore'),
					'param_name'		=> "link_bg_color",
					"value"				=> '#1c1c1c',
					'dependency'		=> array('element' => 'menu_style', 'value' => array('vertical_menu')),
					'group'			=> esc_html__('Styling', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Hover Background Color",'apcore'),
					'param_name'		=> "link_hover_bg_color",
					"value"				=> '#1769ff',
					'dependency'		=> array('element' => 'menu_style', 'value' => array('vertical_menu')),
					'group'			=> esc_html__('Styling', 'apcore'),
				),

				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Item Border Color",'apcore'),
					'param_name'		=> "sidebar_item_border_color",
					"value"				=> '#1c1c1c',
					'dependency'		=> array('element' => 'hamburger_menu_action', 'value' => array('extended_sidebar')),
					'group'				=> esc_html__('Styling', 'apcore'),
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
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Hover Style', 'apcore'),
					'param_name'		=> 'dropdown_hover_style',
					'value'				=> 'background_style',
					'options'			=> array(
						esc_html__('Bg Color', 'apcore') 	=> 'background_style',
						esc_html__('Underline', 'apcore')	=> 'underline_style',
					),
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
					'heading' 			=> __("Wrapper Padding Top",'apcore'),
					'param_name'		=> 'dropdown_padding_top',
					'value'				=> '0',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Wrapper Padding Right",'apcore'),
					'param_name'		=> 'dropdown_padding_right',
					'value'				=> '0',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Wrapper Padding Bottom",'apcore'),
					'param_name'		=> 'dropdown_padding_bottom',
					'value'				=> '0',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'group'				=> esc_html__('Dropdown Menu', 'apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Wrapper Padding Left",'apcore'),
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
					'type' 				=> 'zolo_number',
					'heading' 			=> __("Menu Font Size",'apcore'),
					'param_name'		=> 'dropdown_menu_font_size',
					'value'				=> '',
					'suffix'			=> 'px',
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
					"type"			=> "dropdown",
					"heading"		=> __("Loader Style",'apcore'),
					"param_name"	=> "loader_style",
					"value"			=> array(
						__("Default",'apcore') 	=> "default",
						__("Slide In-Out",'apcore') => "slide_in_out",
						__("Layer",'apcore') 		=> "layer",
						__("SVG",'apcore')			=> "svg",
					),
					"description"	=> __( "Video and Image background will not work on SVG loader style", "apcore"),
					"admin_label"		=> true,
					'dependency'		=> array('element' => 'menu_style', 'value' => array('full_screen_menu')),
					'group'				=> esc_html__('Loader', 'apcore'),
				),
				array(
					"type"			=> "zolo_radio_advanced",
					"heading"		=> __("Choose an effect",'apcore'),
					"param_name"	=> "layer_effect",
					'value'			=> 'single_layer',
					"options"			=> array(
						__("Single Layer",'apcore') 		=> "single_layer",
						__("Double Layers",'apcore') 		=> "double_layer",
						__("Triple Layers",'apcore')		=> "triple_layer",
					),
					'dependency'		=> array('element' => 'loader_style', 'value' => array('layer')),
					'group'				=> esc_html__('Loader', 'apcore'),
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> __("Direction",'apcore'),
					"param_name"	=> "loader_direction",
					"value"			=> array(
						__("Top",'apcore') 			=> "top",
						__("Left",'apcore') 		=> "left",
						__("Right",'apcore')		=> "right",
						__("Bottom",'apcore') 		=> "bottom",
						__("Corner Top Left",'apcore') 		=> "cornertopleft",
						__("Corner Top Right",'apcore')		=> "cornertopright",
						__("Corner Bottom Left",'apcore') 	=> "cornerbottomleft",
						__("Corner Bottom Right",'apcore')	=> "cornerbottomright",
					),
					'dependency'		=> array('element' => 'loader_style', 'value' => array('layer')),
					'group'				=> esc_html__('Loader', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Color 1",'apcore'),
					"param_name"		=> "layer1_color",
					"value"				=> '#f4f4f4',
					'edit_field_class'	=> 'vc_column vc_col-sm-4 crum_vc',
					'dependency'		=> array('element' => 'layer_effect', 'value' => array('single_layer' , 'double_layer' , 'triple_layer')),
					'group'				=> esc_html__('Loader', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Color 2",'apcore'),
					"param_name"		=> "layer2_color",
					"value"				=> '#2a2a2a',
					'edit_field_class'	=> 'vc_column vc_col-sm-4 crum_vc',
					'dependency'		=> array('element' => 'layer_effect', 'value' => array('double_layer', 'triple_layer')),
					'group'				=> esc_html__('Loader', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Color 3",'apcore'),
					"param_name"		=> "layer3_color",
					"value"				=> '#0092dd',
					'edit_field_class'	=> 'vc_column vc_col-sm-4 crum_vc',
					'dependency'		=> array('element' => 'layer_effect', 'value' => array('triple_layer')),
					'group'				=> esc_html__('Loader', 'apcore'),
				),
/*				array(
					"type"				=> "heading",
					"heading"			=> __("Note -- When using SVG Reveal , the First layer color itself is the canvas color. So Canvas color in Styling tab will not work for SVG reveal.", "apcore"),
					"param_name"		=> "svg_note",
					'dependency'		=> array('element' => 'loader_style', 'value' => array('svg')),
					'group'				=> esc_html__('Loader', 'apcore'),
				),*/
				array(
					"type"			=> "zolo_radio_advanced",
					"heading"		=> __("SVG Reveal Style",'apcore'),
					"param_name"	=> "svgloader_style",
					'value'			=> 'svgstyle1',
					"options"			=> array(
						__("Style 1",'apcore') 		=> "svgstyle1",
						__("Style 2",'apcore') 		=> "svgstyle2",
						__("Style 3",'apcore') 		=> "svgstyle3",
						__("Style 4",'apcore') 		=> "svgstyle4",
						__("Style 5",'apcore') 		=> "svgstyle5",
						__("Style 6",'apcore') 		=> "svgstyle6",

					),
					'dependency'		=> array('element' => 'loader_style', 'value' => array('svg')),
					'group'				=> esc_html__('Loader', 'apcore'),
				),
				array(
					"type"			=> "zolo_radio_advanced",
					"heading"		=> __("Choose Layer",'apcore'),
					"param_name"	=> "svg_layer_effect",
					'value'			=> 'layer1',
					"options"			=> array(
						__("Layer 1",'apcore') 		=> "layer1",
						__("Layer 2",'apcore') 		=> "layer2",
						__("Layer 3",'apcore')		=> "layer3",
						__("Layer 4",'apcore')		=> "layer4",
					),
					'dependency'		=> array('element' => 'loader_style', 'value' => array('svg')),
					'group'				=> esc_html__('Loader', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Color 1",'apcore'),
					"param_name"		=> "svg_layer1_color",
					"value"				=> '#f4f4f4',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'dependency'		=> array('element' => 'svg_layer_effect', 'value' => array('layer1' , 'layer2' , 'layer3' , 'layer4')),
					'group'				=> esc_html__('Loader', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Color 2",'apcore'),
					"param_name"		=> "svg_layer2_color",
					"value"				=> '#2a2a2a',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'dependency'		=> array('element' => 'svg_layer_effect', 'value' => array('layer2' , 'layer3' , 'layer4')),
					'group'				=> esc_html__('Loader', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Color 3",'apcore'),
					"param_name"		=> "svg_layer3_color",
					"value"				=> '#0092dd',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'dependency'		=> array('element' => 'svg_layer_effect', 'value' => array('layer3' , 'layer4')),
					'group'				=> esc_html__('Loader', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Color 4",'apcore'),
					"param_name"		=> "svg_layer4_color",
					"value"				=> '#08b200',
					'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
					'dependency'		=> array('element' => 'svg_layer_effect', 'value' => array('layer4')),
					'group'				=> esc_html__('Loader', 'apcore'),
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


				),
			) 
		);		
		
	}		