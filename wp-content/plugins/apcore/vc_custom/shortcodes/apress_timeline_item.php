<?php 
/*-----------------------------------------------------------------------------------*/
/* Timeline Item
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Timeline_Item extends WPBakeryShortCode {}

$doc_link = 'http://apresswp.com/help';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(		
		"name"		=> __("Timeline Item", "apcore"),
		"base"		=> "apress_timeline_item",
		"as_child"	=> array('only' => 'apress_timeline_wrapper'), 
		"icon"		=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-vertical_timeline.jpg",
		"weight"	=> 32,
		"category"	=> __('Apress', 'apcore'),
		"params"	=> array(			
			array(
				'type'			=> 'attach_image',
				'heading'		=> __( 'Image', 'apcore' ),
				'param_name'	=> 'image',
				'value'			=> '',
			),
			array(
				'type'				=> 'textfield',
				'heading'			=> __( 'Slider Thumb Text', 'apcore' ),
				'param_name'		=> 'timeline_slider_thumb',
				'description'		=> __( 'Provide the Slider Thumb Text for this timeline item.', 'apcore' ),
			),
			array(
				'type'				=> 'textfield',
				'heading'			=> __( 'Title', 'apcore' ),
				'param_name'		=> 'timeline_title',
				'description'		=> __( 'Provide the title for this timeline item.', 'apcore' ),
			),
			array(
				'type'				=> 'textfield',
				'heading'			=> __( 'Sub Title', 'apcore' ),
				'param_name'		=> 'timeline_subtitle',
				'description'		=> __( 'Provide the sub title for this timeline item.', 'apcore' ),
			),
			
			array(
				'type'				=> 'textarea',
				'heading'			=> __( 'Description', 'apcore' ),
				'param_name'		=> 'timeline_description',
				'description'		=> __( 'Provide the description for this timeline item.', 'apcore' ),
			),
			array(
				  "type"		=> "attach_images",
				  "heading"		=> __("Awards", 'apcore'),
				  "description"	=> __("Select images from media library.", 'apcore'),
				  "param_name"	=> "images",
				  "value"		=> "",
			),
			array(
				'type'				=> 'zolo_param_heading',
				'text'				=> esc_html__('Extra features', 'apcore'),
				'param_name'		=> 'subtitle_margin_heading',
				'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
			),
			array(
				'type'				=> 'textfield',
				'heading'			=> __( 'Extra class name', 'apcore' ),
				'param_name'		=> 'el_class',
				'description'		=> __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'apcore' ),
			),	
			array(
				"type"				=> "zolo_video_link_param",
				"heading"			=> esc_html__("Video tutorial and theme documentation article","apcore"),
				"param_name"		=> "tutorials",
				"doc_link"			=> $doc_link,
				"video_link"		=> "https://youtu.be/OrK1A77Prjc",
			),
			
			
			array(
				'type'				=> 'zolo_param_heading',
				'text'				=> esc_html__('Title Typography', 'apcore'),
				'param_name'		=> 'title_heading',
				'class'				=> 'zolo-param-heading',
				'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12',
				'group'				=> esc_html__('Title Typography', 'apcore'),
			),
			array(
				'type'				=> 'zolo_font_container',
				'heading'			=> '',
				'param_name'		=> 'title_font_options',
				'settings'				=> array(
					'fields'				=> array(
						'tag' => 'h5',
						'font_size',							
						'line_height',
						'letter_spacing',
						'font_style',
						'color' => '#ef3774',
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
				'text'				=> esc_html__('Sub Title Typography', 'apcore'),
				'param_name'		=> 'subtitle_heading',
				'class'				=> 'zolo-param-heading',
				'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12',
				'group'				=> esc_html__('Sub Title Typography', 'apcore'),
			),
			array(
				'type'				=> 'zolo_font_container',
				'heading'			=> '',
				'param_name'		=> 'subtitle_font_options',
				'settings'				=> array(
					'fields'				=> array(
						'tag' => 'h3',
						'font_size',							
						'line_height',
						'letter_spacing',
						'font_style',
						'color' => '#ffffff',

					),
				),
				'group'				=> esc_html__('Sub Title Typography', 'apcore'),
			),
			array(
				'type'				=> 'zolo_radio_advanced',
				'heading'			=> esc_html__('Custom font family', 'apcore'),
				'param_name'		=> 'subtitle_google_fonts',
				'value'				=> 'no',
				'options'			=> array(
					esc_html__('Yes', 'apcore')	=> 'yes',
					esc_html__('No', 'apcore') => 'no',
				),
				'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
				'group'				=> esc_html__('Sub Title Typography', 'apcore'),
			),
			array(
				'type'				=> 'google_fonts',
				'param_name'		=> 'subtitle_custom_fonts',
				'settings'			=> array(
					'fields'			=> array(
						'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
						'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
					),
				),
				'dependency' => array( 'element' => 'subtitle_google_fonts', 'value' => 'yes'),
				'group'				=> esc_html__('Sub Title Typography', 'apcore'),
			),
			
			array(
				'type'				=> 'zolo_param_heading',
				'text'				=> esc_html__('Description Typography', 'apcore'),
				'param_name'		=> 'description_heading',
				'class'				=> 'zolo-param-heading',
				'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12',
				'group'				=> esc_html__('Description Typography', 'apcore'),
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
						'color' => '#ffffff',

					),
				),
				'group'				=> esc_html__('Description Typography', 'apcore'),
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
				'group'				=> esc_html__('Description Typography', 'apcore'),
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
				'dependency' => array( 'element' => 'description_google_fonts', 'value' => 'yes'),
				'group'				=> esc_html__('Description Typography', 'apcore'),
			),
			array(
				'type'				=> 'zolo_param_responsive_text',
				'heading'			=> esc_html__('Title responsive settings', 'apcore'),
				'param_name'		=> 'title_responsive',
				'edit_field_class'	=> 'vc_column vc_col-sm-12 no-bottom-padding no-border-bottom',
				'group'				=> esc_html__('Responsive', 'apcore'),
			),
			array(
				'type'				=> 'zolo_param_responsive_text',
				'heading'			=> esc_html__('Sub Title responsive settings', 'apcore'),
				'param_name'		=> 'subtitle_responsive',
				'edit_field_class'	=> 'vc_column vc_col-sm-12 no-bottom-padding no-border-bottom',
				'group'				=> esc_html__('Responsive', 'apcore'),
			),
			
			
		)
	) );		
		
}		