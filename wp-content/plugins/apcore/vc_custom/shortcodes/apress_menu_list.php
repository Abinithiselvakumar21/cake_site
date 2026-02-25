<?php 
/*-----------------------------------------------------------------------------------*/
/* Header Primary Menu
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Menu_List extends WPBakeryShortCode {}

$doc_link = 'http://apresswp.com/help';


if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
			"name"			=> __("Menu List", 'apcore'),
			"base"			=> "apress_menu_list",
			"category"		=> __( "Apress", "apcore"),
			"description"	=> __( "Menu List for megamenu section", "apcore"),
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
					"type"				=> "colorpicker",
					"heading"			=> __("Menu Color",'apcore'),
					"param_name"		=> "menu_color",
					"value"				=> '',
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Menu Hover Color",'apcore'),
					"param_name"		=> "menu_hover_color",
					"value"				=> '',
				),
			
				),
			) 
		);		
		
	}		