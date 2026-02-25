<?php 
/*-----------------------------------------------------------------------------------*/
/* Product Card
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Product_Card extends WPBakeryShortCode {}

$doc_link = 'http://apresswp.com/help';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
					"name"			=> __("Product Card", 'apcore'),
					"base"			=> "apress_product_card",
					"weight"		=> 12,
					"class"			=> "",
					"category"		=> __( "Apress", "apcore"),
					"description"	=> __( "Beautiful Product Card", "apcore"),
					"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-product-card.jpg",
					"params"		=> array(						
						array(
							'type'        => 'radio_image_select',
							'heading'     => esc_html__( 'Product Card Style', 'apcore' ),
							"holder"	  => "div",
							'param_name'  => 'product_card_style',
							'simple_mode' => false,
							'admin_label' => true,
							'options'     => array(
								'style1' => array(
									'tooltip' => esc_attr__('Style 1','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/product_card/product_card_style1.jpg'
								),
								'style2' => array(
									'tooltip' => esc_attr__('Style 2','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/product_card/product_card_style2.jpg'
								),
								'style3' => array(
									'tooltip' => esc_attr__('Style 3','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/product_card/product_card_style3.jpg'
								),
								'style4' => array(
									'tooltip' => esc_attr__('Style 4','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/product_card/product_card_style4.jpg'
								),
							),
						),
						array(
							"type"				=> "attach_image",
							"class"				=> "",
							"heading"			=> __("Image", "apcore"),
							"param_name"		=> "product_card_image",
							"value"				=> "",
						),
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Image Align', 'apcore'),
							'param_name'		=> 'product_card_image_align',
							'value'				=> 'left',
							'options'			=> array(
								esc_html__('Left', 'apcore') 	=> 'left',
								esc_html__('Right', 'apcore')	=> 'right',
							),
							'dependency'		=> array( 'element' => 'product_card_style', 'value' => array('style1')),
						),
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Transform Scale?', 'apcore'),
							'param_name'		=> 'transform_scale',
							'value'				=> 'no',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
							'dependency'		=> array( 'element' => 'product_card_style', 'value' => array('style2')),
						),
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Title",'apcore'),
							"param_name"		=> "product_card_title",
							"value"				=> 'Your Title',
							"admin_label"		=> true,
						),
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Price",'apcore'),
							"param_name"		=> "product_card_price",
							"value"				=> '$2999',
							"admin_label"		=> true,
						),
						array(
							"type"				=> "textarea_html",
							"class"				=> "",
							"heading"			=> __("Description Text Area",'apcore'),
							"param_name"		=> "content",
							"value"				=> 'Your Description Eos movet legimus euripidis ea. Cu eos minim aeque interpretaris, vel te eirmod dissentiet, homero utroque ut mea.',
						),
						array(
							"type"				=> "textarea_raw_html",
							"class"				=> "",
							"heading"			=> __("Features",'apcore'),
							"param_name"		=> "product_card_features",
							"value"				=> base64_encode( '<ul class="product_card_info">
<li><span class="ap-basic_lightbulb"></span> Diesel</li>
<li><span class="ap-basic_lightbulb"></span> 30</li>
<li><span class="ap-basic_lightbulb"></span> 1st-owner </li>
<li><span class="ap-basic_lightbulb"></span> Blue</li>
</ul>
' ),
						),
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Text Align', 'apcore'),
							'param_name'		=> 'product_card_align',
							'value'				=> 'left',
							'options'			=> array(
								esc_html__('Left', 'apcore') 	=> 'left',
								esc_html__('Right', 'apcore')	=> 'right',
								esc_html__('Center', 'apcore')	=> 'center'
							),
						),
						array(
							"type"				=> "vc_link",
							"class"				=> "",
							"heading"			=> __("Link",'apcore'),
							"param_name"		=> "box_link",
							"description"		=> __("http://example.com",'apcore')
						),
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Box Swing On Hover', 'apcore'),
							'param_name'		=> 'box_swing',
							'value'				=> 'on',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
						),
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Extra features', 'apcore'),
							'param_name'		=> 'subtitle_margin_heading',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
						),
						array(
							"type"				=> "textfield",
							"heading"			=> __("Extra class name","apcore"),
							"param_name"		=> "class",
							"value"				=> "",
							"description"		=> __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.","apcore"),
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
							"type"				=> "zolo_video_link_param",
							"heading"			=> esc_html__("Video tutorial and theme documentation article","apcore"),
							"param_name"		=> "tutorials",
							"doc_link"			=> $doc_link,
							"video_link"		=> "https://youtu.be/4JYsV-7IPME",
						),
						
						
						array(
							'type' 		=> 'zolo_number',
							'heading' 	=> __("Min Height",'apcore'),
							'param_name'=> 'min_height',
							'value'		=> '500',
							'suffix'	=> 'px',
							'dependency'		=> array('element' => 'product_card_style', 'value' => array('style3', 'style4')),
							'group'				=> esc_html__('Style', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Box Background Color",'apcore'),
							"param_name"		=> "product_card_bg_color",
							'value'				=> '#ffffff',
							'group'				=> esc_html__('Style', 'apcore'),
						),
						array(
							"type" 			=> "textfield",
							"heading" 		=> __("Box top Padding",'apcore'),
							'description' 	=> __( 'Enter value with px OR % (ex: 5px OR 5%)', 'apcore' ),
							"param_name" 	=> "box_top_padding",
							"value" 		=> '45px',
							'edit_field_class'	=> 'vc_column vc_col-sm-3',
							'group'				=> esc_html__('Style', 'apcore'),
						 ),
						 array(
							"type" 			=> "textfield",
							"heading" 		=> __("Box Right Padding",'apcore'),
							'description' 	=> __( 'Enter value with px OR % (ex: 5px OR 5%)', 'apcore' ),
							"param_name" 	=> "box_right_padding",
							"value" 		=> '45px',
							'edit_field_class'=> 'vc_column vc_col-sm-3',
							'group'				=> esc_html__('Style', 'apcore'),
						 ),					 
						 array(
							"type" 			=> "textfield",
							"heading" 		=> __("Box Bottom Padding",'apcore'),
							'description' 	=> __( 'Enter value with px OR % (ex: 5px OR 5%)', 'apcore' ),
							"param_name" 	=> "box_bottom_padding",
							"value" 		=> '40px',
							'edit_field_class'=> 'vc_column vc_col-sm-3',
							'group'				=> esc_html__('Style', 'apcore'),
						 ),	
						 array(
							"type" 			=> "textfield",
							"heading" 		=> __("Box Left Padding",'apcore'),
							'description' 	=> __( 'Enter value with px OR % (ex: 5px OR 5%)', 'apcore' ),
							"param_name" 	=> "box_left_padding",
							"value" 		=> '45px',
							'edit_field_class'=> 'vc_column vc_col-sm-3',
							'group'				=> esc_html__('Style', 'apcore'),
						 ),
						 array(
							'type' 		=> 'zolo_number',
							'heading' 	=> __("Border Radius",'apcore'),
							'param_name'=> 'box_border_radius',
							'value'		=> '0',
							'suffix'	=> 'px',
							'group'				=> esc_html__('Style', 'apcore'),
						),
						array(
						   'type'    => 'zolo_box_shadow_param',
						   'heading'	=> esc_html__('Box Shadow', 'apcore'),
						   'param_name' => 'box_shadow',
						   "value"		=> 'box_shadow_enable:enable|shadow_horizontal:0|shadow_vertical:2|shadow_blur:10|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.08)',
						   'group'				=> esc_html__('Style', 'apcore'),
						),
						array(
						   'type'    => 'zolo_box_shadow_param',
						   'heading'	=> esc_html__('Box Hover Shadow', 'apcore'),
						   'param_name' => 'box_hover_shadow',
						   "value"		=> 'box_shadow_enable:enable|shadow_horizontal:0|shadow_vertical:7|shadow_blur:90|shadow_spread:-38|box_shadow_color:rgba(0%2C0%2C0%2C0.1)',
						   'group'				=> esc_html__('Style', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Image Background Color",'apcore'),
							"param_name"		=> "product_card_img_bg_color",
							'value'				=> '#e7e9e7',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
							'group'				=> esc_html__('Style', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Hover Image Background Color",'apcore'),
							"param_name"		=> "product_card_img_bg_color_h",
							'value'				=> '#b0b5ae',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
							'group'				=> esc_html__('Style', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Price Background Color",'apcore'),
							"param_name"		=> "product_card_price_bg_color",
							'value'				=> '#b0b5ae',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
							'group'				=> esc_html__('Style', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Price Text Color",'apcore'),
							"param_name"		=> "product_card_price_color",
							'value'				=> '#ffffff',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
							'group'				=> esc_html__('Style', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Description Text Color",'apcore'),
							"param_name"		=> "product_card_description_color",
							'value'				=> '#777777',
							'group'				=> esc_html__('Style', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Features Background Color",'apcore'),
							"param_name"		=> "product_card_features_bg_color",
							'value'				=> '#e7e9e7',
							'group'				=> esc_html__('Style', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Features Text Color",'apcore'),
							"param_name"		=> "product_card_features_color",
							'value'				=> '#777777',
							'group'				=> esc_html__('Style', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Features Icon Color",'apcore'),
							"param_name"		=> "product_card_features_icon_color",
							'value'				=> '#777777',
							'group'				=> esc_html__('Style', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
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
									'tag' => 'h3',
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
							'type'				=> 'zolo_param_responsive_text',
							'heading'			=> esc_html__('Title responsive settings', 'apcore'),
							'param_name'		=> 'title_responsive',
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-bottom-padding no-border-bottom',
							'group'				=> esc_html__('Responsive', 'apcore'),
						),	
						
						
						
							
					),
					) );		
		
			}		