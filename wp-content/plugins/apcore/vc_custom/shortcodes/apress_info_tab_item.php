<?php 
/*-----------------------------------------------------------------------------------*/
/* Info Tab Item Image
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Info_tab_Item extends WPBakeryShortCode {}

$doc_link = 'http://apresswp.com/help';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(		
		"name"		=> __("Info Tab Item", "apcore"),
		"base"		=> "apress_info_tab_item",
		"as_child"	=> array('only' => 'apress_info_tabs_wrapper'), 
		"icon"		=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-tab.png",
		"weight"	=> 32,
		"category"	=> __('Apress', 'apcore'),
		"params"	=> array(	
			
			array(
				'type'			=> 'textfield',
				'heading'		=> __( 'Tab Title', 'apcore' ),
				'param_name'	=> 'tab_title',
				'value'			=> '',
				'description'	=> __( 'Enter tab title / tab anchor here.', 'apcore' ),
			),
			array(
				'type'			=> 'textarea',
				'heading'		=> __( 'Tab Content', 'apcore' ),
				'param_name'	=> 'tab_content',
				'value'			=> '',
				'description'	=> __( 'Content as list - enter one feature per line.', 'apcore' ),
			),
				
			array(
				'type'			=> 'attach_image',
				'heading'		=> __( 'Image', 'apcore' ),
				'param_name'	=> 'image',
				'value'			=> '',
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> __( 'Image size', 'apcore' ),
				'param_name'	=> 'img_size',
				'value'			=> 'full',
				'description'	=> __( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'apcore' ),
			),
			array(
			   'type'    		=> 'zolo_box_shadow_param',
			   'heading'		=> esc_html__('Shadow', 'apcore'),
			   'param_name' 	=> 'image_shadow',
			   "value"			=> 'box_shadow_enable:enable|shadow_horizontal:4|shadow_vertical:10|shadow_blur:25|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
			),
			
			
			
			array(
				'type'				=> 'zolo_param_heading',
				'text'				=> esc_html__('Title Typography', 'apcore'),
				'param_name'		=> 'title_typo_heading',
				'group'				=> esc_html__('Title Typography', 'apcore'),
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
				'group'				=> esc_html__('Title Typography', 'apcore'),
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
				'group'				=> esc_html__('Title Typography', 'apcore'),
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
				'group'				=> esc_html__('Title Typography', 'apcore'),
			),
			
			
			
			array(
				'type'				=> 'zolo_param_heading',
				'text'				=> esc_html__('Content Typography', 'apcore'),
				'param_name'		=> 'content_typo_heading',
				'group'				=> esc_html__('Content Typography', 'apcore'),
			),
			
			array(
				'type'				=> 'zolo_font_container',
				'heading'			=> '',
				'param_name'		=> 'content_font_options',
				'settings'				=> array(
					'fields'				=> array(
						'font_size',							
						'line_height',
						'letter_spacing',
						'font_style',
						'color',
					),
				),
				'group'				=> esc_html__('Content Typography', 'apcore'),
			),
			array(
				'type'				=> 'zolo_radio_advanced',
				'heading'			=> esc_html__('Custom font family', 'apcore'),
				'param_name'		=> 'content_google_fonts',
				'value'				=> 'no',
				'options'			=> array(
					esc_html__('Yes', 'apcore')	=> 'yes',
					esc_html__('No', 'apcore') => 'no',
				),
				'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
				'group'				=> esc_html__('Content Typography', 'apcore'),
			),
			array(
				'type'				=> 'google_fonts',
				'param_name'		=> 'content_custom_fonts',
				'settings'			=> array(
					'fields'			=> array(
						'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
						'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
					),
				),
				'dependency' => array( 'element' => 'content_google_fonts', 'value' => 'yes'),
				'group'				=> esc_html__('Content Typography', 'apcore'),
			),
			
			array(
				'type'				=> 'zolo_param_responsive_text',
				'heading'			=> esc_html__('Title responsive settings', 'apcore'),
				'param_name'		=> 'title_responsive',
				'edit_field_class'	=> 'vc_column vc_col-sm-12 no-bottom-padding no-border-bottom',
				'group'				=> esc_html__('Responsive', 'apcore'),
			),
			
			
		)
	) );		
		
}		