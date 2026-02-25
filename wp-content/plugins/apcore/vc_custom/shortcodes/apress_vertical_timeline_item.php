<?php 
/*-----------------------------------------------------------------------------------*/
/* Timeline Item
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Vertical_Timeline_Item extends WPBakeryShortCode {}

$doc_link = 'http://apresswp.com/help';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(		
		"name"		=> __("Vertical Timeline Item", "apcore"),
		"base"		=> "apress_vertical_timeline_item",
		"as_child"	=> array('only' => 'apress_vertical_timeline_wrapper'), 
		"icon"		=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-vertical_timeline.jpg",
		"weight"	=> 32,
		"category"	=> __('Apress', 'apcore'),
		"params"	=> array(
		
			array(
				'type'				=> 'zolo_radio_advanced',
				'heading'			=> esc_html__('Icon Show/hide', 'apcore'),
				'param_name'		=> 'vertical_timeline_iconshowhide',
				'value'				=> 'on',
				'options'			=> array(
					esc_html__('On', 'apcore') 	=> 'on',
					esc_html__('Off', 'apcore')	=> 'off',
				),
			),
			array(
				'type'				=> 'dropdown',
				'heading'			=> __( 'Icon library', 'apcore' ),
				'value'				=> array(
					__( 'Font Awesome', 'apcore' )	=> 'fontawesome',
					__( 'Open Iconic', 'apcore' )	=> 'openiconic',
					__( 'Typicons', 'apcore' )		=> 'typicons',
					__( 'Entypo', 'apcore' )		=> 'entypo',
					__( 'Linecons', 'apcore' )		=> 'linecons',
					__( 'Mono Social', 'apcore' )	=> 'monosocial',
					__( 'Linea', 'apcore' ) 	=> 'linea',
				),
				'save_always' 		=> true,
				'param_name' 		=> 'icon_family',
				'description' 		=> __( 'Select icon library.', 'apcore' ),
				'dependency'		=> array('element' => 'vertical_timeline_iconshowhide', 'value' => 'on'),

			),
			array(
				'type'				=> 'iconpicker',
				'heading'			=> __('Icon', 'apcore'),
				'param_name'		=> 'icon_fontawesome',
				'value'				=> 'icon_fontawesome',
				'settings'			=> array( 'emptyIcon' => false, 'iconsPerPage' => 100),
				'dependency'		=> array('element' => 'icon_family', 'value' => 'fontawesome'),
				'description'		=> __('Select icon from library.', 'apcore'),
			),	
			array(
				'type'				=> 'iconpicker',
				'heading'			=> __( 'Icon', 'apcore' ),
				'param_name'		=> 'icon_openiconic',
				'value'				=> 'vc-oi vc-oi-dial',
				'settings'			=> array('emptyIcon' => false, 'type' => 'openiconic', 'iconsPerPage' => 100),
				'dependency'		=> array('element' => 'icon_family','value' => 'openiconic'),
				'description'		=> __( 'Select icon from library.', 'apcore' ),
			),	
			array(
				'type'				=> 'iconpicker',
				'heading'			=> __( 'Icon', 'apcore' ),
				'param_name'		=> 'icon_typicons',
				'value'				=> 'typcn typcn-adjust-brightness',
				'settings'			=> array('emptyIcon' => false,'type' => 'typicons','iconsPerPage' => 100),
				'dependency'		=> array('element' => 'icon_family','value' => 'typicons'),
				'description'		=> __( 'Select icon from library.', 'apcore'),
			),
			array(
				'type' 				=> 'iconpicker',
				'heading' 			=> __( 'Icon', 'apcore' ),
				'param_name' 		=> 'icon_entypo',
				'value' 			=> 'entypo-icon entypo-icon-note',
				'settings' 			=> array('emptyIcon' => false,'type' => 'entypo','iconsPerPage' => 100),
				'dependency' 		=> array('element' => 'icon_family','value' => 'entypo'),
				'description' 		=> __( 'Select icon from library.', 'apcore' ),
			),
			array(
				'type' 				=> 'iconpicker',
				'heading' 			=> __( 'Icon', 'apcore' ),
				'param_name' 		=> 'icon_linecons',
				'value' 			=> 'vc_li vc_li-heart',
				'settings' 			=> array('emptyIcon' => false,'type' => 'linecons','iconsPerPage' => 100),
				'dependency' 		=> array('element' => 'icon_family','value' => 'linecons'),
				'description' 		=> __( 'Select icon from library.', 'apcore' ),
			),	
			array(
				'type'				=> 'iconpicker',
				'heading'			=> __( 'Icon', 'apcore' ),
				'param_name'		=> 'icon_monosocial',
				'value'				=> 'vc-mono vc-mono-fivehundredpx',
				'settings'			=> array('emptyIcon' => false,'type' => 'monosocial','iconsPerPage' => 100),
				'dependency'		=> array('element' => 'icon_family','value' => 'monosocial'),
				'description'		=> __( 'Select icon from library.', 'apcore' ),
			),	
			array(
				'type'				=> 'iconpicker',
				'heading'			=> __('Icon', 'apcore'),
				'param_name'		=> 'icon_linea',
				'value'				=> 'icon-basic-heart',
				'settings'			=> array( 'emptyIcon' => true, 'type' => 'linea', 'iconsPerPage' => 100),
				'dependency'		=> array('element' => 'icon_family', 'value' => 'linea'),
				'description'		=> __('Select icon from library.', 'apcore'),
			),
			array(
				"type"				=> "colorpicker",
				"heading"			=> __("Icon Color",'apcore'),
				"param_name"		=> "icon_color",
				"value"				=> '#fff',
				'dependency'		=> array('element' => 'vertical_timeline_iconshowhide', 'value' => 'on'),
				'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
			),
			array(
				"type"				=> "colorpicker",
				"heading"			=> __("Circle background Color",'apcore'),
				"param_name"		=> "icon_bg_color",
				"value"				=> '#0a43ac',
				'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
			),
			array(
				"type"				=> "colorpicker",
				"heading"			=> __("Circle Border Color",'apcore'),
				"param_name"		=> "icon_border_color",
				"value"				=> '#1769ff',
				'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
			),
			
			array(
				"type"				=> "colorpicker",
				"heading"			=> __("Box background Color",'apcore'),
				"param_name"		=> "box_bg_color",
				"value"				=> '#dfdfdf',
				'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
			),
			array(
				"type"				=> "colorpicker",
				"heading"			=> __("Text Color",'apcore'),
				"param_name"		=> "box_text_color",
				"value"				=> '#333',
				'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc',
			),
			array(
					'type'				=> 'zolo_padding',
					'heading'			=> esc_html__('Box Padding', 'apcore'),
					'param_name'		=> 'box_padding',
					'positions'			=> array(
						esc_html__('Top', 'apcore') => "top",
						esc_html__('Right', 'apcore') => "right",
						esc_html__('Bottom', 'apcore') => "bottom",
						esc_html__('Left', 'apcore') => "left",
					),
					'value'				=> 'padding-top:30|padding-bottom:30|padding-left:30|padding-right:30',
				),
			
			array(
				"type"				=> "textfield",
				"heading"			=> __("Date/Year","apcore"),
				"param_name"		=> "vertical_timeline_dateyear",
				"value"				=> "",
				'group'				=> esc_html__('Content', 'apcore'),	
			),
			array(
				"type"				=> "textfield",
				"heading"			=> __("Sub Heading","apcore"),
				"param_name"		=> "vertical_timeline_subheading",
				"value"				=> "",
				'group'				=> esc_html__('Content', 'apcore'),	
			),
			array(
				"type"				=> "textfield",
				"heading"			=> __("Company Name","apcore"),
				"param_name"		=> "vertical_timeline_company_name",
				"value"				=> "",
				'group'				=> esc_html__('Content', 'apcore'),	
			),	
			array(
				"type"				=> "textfield",
				"heading"			=> __("Job  Title","apcore"),
				"param_name"		=> "vertical_timeline_jobtitle",
				"value"				=> "",
				'group'				=> esc_html__('Content', 'apcore'),	
			),
			array(
				"type"				=> "textfield",
				"heading"			=> __("Job Duration","apcore"),
				"param_name"		=> "vertical_timeline_job_duration",
				"value"				=> "",
				'group'				=> esc_html__('Content', 'apcore'),	
			),
			array(
				'type'				=> 'textarea_html',
				'heading'			=> esc_html__('Job Description', 'apcore'),
				'param_name'		=> 'content',
				'value'				=> esc_html__('Job Description','apcore'),
				'admin_label'		=> true,
				'group'				=> esc_html__('Content', 'apcore'),
			),
			array(
				"type"				=> "textfield",
				"heading"			=> __("Tags","apcore"),
				"param_name"		=> "vertical_timeline_tags",
				"value"				=> "",
				'group'				=> esc_html__('Content', 'apcore'),	
			),
			

			array(
				'type'				=> 'zolo_param_heading',
				'text'				=> esc_html__('Date/Year', 'apcore'),
				'param_name'		=> 'heading_dateyear',
				'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
				'group'				=> esc_html__('Typography', 'apcore'),
			),
			array(
				'type'				=> 'zolo_font_container',
				'heading'			=> '',
				'param_name'		=> 'dateyear_font_options',
				'settings'				=> array(
					'fields'				=> array(
						'font_size',							
						'line_height',
						'letter_spacing',
						'color',
						'font_style',
					),
				),
				'group'				=> esc_html__('Typography', 'apcore'),
			),
			array(
				'type'				=> 'zolo_radio_advanced',
				'heading'			=> esc_html__('Custom font family', 'apcore'),
				'param_name'		=> 'dateyear_google_fonts',
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
				'param_name'		=> 'dateyear_custom_fonts',
				'settings'			=> array(
					'fields'			=> array(
						'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
						'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
					),
				),
				'dependency' => array( 'element' => 'dateyear_google_fonts', 'value' => 'yes'),
				'group'				=> esc_html__('Typography', 'apcore'),
			),
			array(
				'type'				=> 'zolo_param_heading',
				'text'				=> esc_html__('Sub Heading', 'apcore'),
				'param_name'		=> 'heading_subheading',
				'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
				'group'				=> esc_html__('Typography', 'apcore'),
			),
			array(
				'type'				=> 'zolo_font_container',
				'heading'			=> '',
				'param_name'		=> 'subheading_font_options',
				'settings'				=> array(
					'fields'				=> array(
						'font_size',							
						'line_height',
						'letter_spacing',
						'color',
						'font_style',
					),
				),
				'group'				=> esc_html__('Typography', 'apcore'),
			),
			array(
				'type'				=> 'zolo_radio_advanced',
				'heading'			=> esc_html__('Custom font family', 'apcore'),
				'param_name'		=> 'subheading_google_fonts',
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
				'param_name'		=> 'subheading_custom_fonts',
				'settings'			=> array(
					'fields'			=> array(
						'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
						'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
					),
				),
				'dependency' => array( 'element' => 'subheading_google_fonts', 'value' => 'yes'),
				'group'				=> esc_html__('Typography', 'apcore'),
			),
			array(
				'type'				=> 'zolo_param_heading',
				'text'				=> esc_html__('Company Name', 'apcore'),
				'param_name'		=> 'heading_companyname',
				'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
				'group'				=> esc_html__('Typography', 'apcore'),
			),
			array(
				'type'				=> 'zolo_font_container',
				'heading'			=> '',
				'param_name'		=> 'companyname_font_options',
				'settings'				=> array(
					'fields'				=> array(
						'tag' => 'div',
						'font_size',							
						'line_height',
						'letter_spacing',
						'color',
						'font_style',
					),
				),
				'group'				=> esc_html__('Typography', 'apcore'),
			),
			array(
				'type'				=> 'zolo_radio_advanced',
				'heading'			=> esc_html__('Custom font family', 'apcore'),
				'param_name'		=> 'companyname_google_fonts',
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
				'param_name'		=> 'companyname_custom_fonts',
				'settings'			=> array(
					'fields'			=> array(
						'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
						'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
					),
				),
				'dependency' => array( 'element' => 'companyname_google_fonts', 'value' => 'yes'),
				'group'				=> esc_html__('Typography', 'apcore'),
			),
			array(
				'type'				=> 'zolo_param_heading',
				'text'				=> esc_html__('Job Description', 'apcore'),
				'param_name'		=> 'heading_jobdescription',
				'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
				'group'				=> esc_html__('Typography', 'apcore'),
			),
			array(
				'type'				=> 'zolo_font_container',
				'heading'			=> '',
				'param_name'		=> 'jobdescription_font_options',
				'settings'				=> array(
					'fields'				=> array(
						'font_size',							
						'line_height',
						'letter_spacing',
						'color',
						'font_style',
					),
				),
				'group'				=> esc_html__('Typography', 'apcore'),
			),
			array(
				'type'				=> 'zolo_radio_advanced',
				'heading'			=> esc_html__('Custom font family', 'apcore'),
				'param_name'		=> 'jobdescription_google_fonts',
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
				'param_name'		=> 'jobdescription_custom_fonts',
				'settings'			=> array(
					'fields'			=> array(
						'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
						'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
					),
				),
				'dependency' => array( 'element' => 'jobdescription_google_fonts', 'value' => 'yes'),
				'group'				=> esc_html__('Typography', 'apcore'),
			),
			array(
				'type'				=> 'zolo_param_heading',
				'text'				=> esc_html__('Meta', 'apcore'),
				'param_name'		=> 'heading_meta',
				'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
				'group'				=> esc_html__('Typography', 'apcore'),
			),
			array(
				'type'				=> 'zolo_font_container',
				'heading'			=> '',
				'param_name'		=> 'meta_font_options',
				'settings'				=> array(
					'fields'				=> array(
						'font_size',							
						'line_height',
						'letter_spacing',
						'color',
						'font_style',
					),
				),
				'group'				=> esc_html__('Typography', 'apcore'),
			),
			array(
				'type'				=> 'zolo_radio_advanced',
				'heading'			=> esc_html__('Custom font family', 'apcore'),
				'param_name'		=> 'meta_google_fonts',
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
				'param_name'		=> 'meta_custom_fonts',
				'settings'			=> array(
					'fields'			=> array(
						'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
						'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
					),
				),
				'dependency' => array( 'element' => 'meta_google_fonts', 'value' => 'yes'),
				'group'				=> esc_html__('Typography', 'apcore'),
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
				'type'				=> 'zolo_param_responsive_text',
				'heading'			=> esc_html__('Company Name responsive settings', 'apcore'),
				'param_name'		=> 'companyname_responsive',
				'edit_field_class'	=> 'vc_column vc_col-sm-12 no-bottom-padding no-border-bottom',
				'group'				=> esc_html__('Responsive', 'apcore'),
			),
		
		
		
		)
	) );		
		
}		