<?php 
/*-----------------------------------------------------------------------------------*/
/* Horizontal Scrolling Text
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Horizontal_Scrolling_Text extends WPBakeryShortCode {}

$doc_link = 'http://apresswp.com/help';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
			"name"			=> __("Horizontal Scrolling Text", 'apcore'),
			"base"			=> "apress_horizontal_scrolling_text",
			"class"			=> "",
			"weight"		=> 7,
			"category"		=> __( "Apress", "apcore"),
			"description"	=> __("Beutiful Horizontal Scrolling Text Designs", "apcore"),
			"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-horizontal_scrolling_text.jpg",
			"params"		=> array(
				array(
					'type'				=> 'textarea_html',
					'heading'			=> esc_html__('Heading', 'apcore'),
					'param_name'		=> 'content',
					'value'				=> esc_html__('Heading','apcore'),
					'admin_label'		=> true,
				),
				array(
					"type"				=> "dropdown",
					"heading"			=> __("Scrolling Duration",'apcore'),
					"param_name"		=> "scrolling_duration",
					'value' => array(
						__("5s",'apcore') 	=> "5s",
						__("10s",'apcore') 	=> "10s",
						__("20s",'apcore') 	=> "20s",
						__("30s",'apcore') 	=> "30s",
						__("40s",'apcore') 	=> "40s",
						__("50s",'apcore') 	=> "50s",
						__("60s",'apcore') 	=> "60s",
						__("70s",'apcore') 	=> "70s",
						__("80s",'apcore') 	=> "80s",
						__("90s",'apcore') 	=> "90s",
					),
					'std'				=> '30s',
				),
				array(
					'type'				=> 'zolo_param_heading',
					'text'				=> esc_html__('Extra features', 'apcore'),
					'param_name'		=> 'subtitle_margin_heading',
					'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
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
					'type'				=> 'zolo_param_heading',
					'text'				=> esc_html__('Title Typography', 'apcore'),
					'param_name'		=> 'title_heading',
					'class'				=> 'zolo-param-heading',
					'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12',
					'group'				=> esc_html__('Typography', 'apcore'),
				),
				array(
					'type'				=> 'zolo_font_container',
					'heading'			=> '',
					'param_name'		=> 'title_font_options',
					'settings'				=> array(
						'fields'				=> array(
							'tag' => 'h4',
							'font_size',							
							'line_height',
							'letter_spacing',
							'font_style',
							'color',
						),
					),
					'group'				=> esc_html__('Typography', 'apcore'),
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
					'group'				=> esc_html__('Typography', 'apcore'),
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
					'dependency' => array( 'element' => 'title_google_fonts', 'value' => 'yes'),
					'group'				=> esc_html__('Typography', 'apcore'),
				),
				array(
					'type'				=> 'zolo_param_responsive_text',
					'heading'			=> esc_html__('Title responsive settings', 'apcore'),
					'param_name'		=> 'title_responsive',
					'edit_field_class'	=> 'vc_column vc_col-sm-12 no-bottom-padding no-border-bottom',
					'group'				=> esc_html__('Responsive', 'apcore'),
				),
					
				),
			) 
		);		
		
	}		