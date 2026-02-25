<?php 
/*-----------------------------------------------------------------------------------*/
/* Blog Element 
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Blog_Element extends WPBakeryShortCode {}

$doc_link = 'http://apresswp.com/help';

$is_admin = is_admin();

$blog_types = ($is_admin) ? get_categories() : array('All' => 'all');
$blog_options = array("All" => "all");
if($is_admin) {
	foreach ($blog_types as $type) {
		if(isset($type->name) && isset($type->slug))
			$blog_options[htmlspecialchars($type->name)] = htmlspecialchars($type->slug);
	}
}else{
	$blog_options['All'] = 'all';
}
if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
					"name"			=> __("Blog Element", 'apcore'),
					"base"			=> "apress_blog_element",
					"weight"		=> 3,
					"class"			=> "",
					"category"		=> __( "Apress", "apcore"),
					"description"	=> __("Different Blog Post Element", "apcore"),
					"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-blog.png",
					"params"		=> array(		
						array(
							'type'        => 'radio_image_select',
							'heading'     => esc_html__( 'Choose Style', 'apcore' ),
							"holder"	  => "div",
							'param_name'  => 'style',
							'simple_mode' => false,
							'admin_label' => true,
							'options'     => array(
								'style_01' => array(
									'tooltip' => esc_attr__('Style 01','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/blog_element/blog_element1.jpg'
								),
								'style_02' => array(
									'tooltip' => esc_attr__('Style 02','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/blog_element/blog_element2.jpg'
								),
							),
						),

						array(
							"type"				=> "zolo_taxonomy_multiselect",
							"heading"			=> __("Blog Categories", "apcore"),
							"description"		=> __("Please select the categories you would like to display for your blog. <br/> You can select multiple categories too (ctrl + click on PC and command + click on Mac).", "apcore"),
							"param_name"		=> "category",
							"admin_label"		=> true,
							"value"				=> $blog_options,
							'save_always'		=> true,							
						),	
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Choose Layout",'apcore'),
							"param_name"		=> "layoutstyle",
							'value'				=> array(
								__("Grid",'apcore') => "fitRows",
								__("Masonry",'apcore') => "masonry",
								__("Carousel",'apcore') => "carousel",
							),
						),					
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Number of Posts",'apcore'),
							"param_name"		=> "num",
							"value"				=> "3", 
							"description"		=> __("Leave blank or -1 to show all.",'apcore'),   
						),
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Number of Items per row",'apcore'),
							"param_name"		=> "blgcrslcolprw",
							"value"				=> array(
								__("Four",'apcore') 	=> "4",
								__("Three",'apcore') 	=> "3",
								__("Two",'apcore') 		=> "2", 
								__("One",'apcore') 		=> "1"
							),
							'std'				=> '3',
							'dependency'		=> array( 'element' => 'layoutstyle', 'value' => array('masonry', 'fitRows')),
						),
						array(
							"type"             => "zolo_param_heading",
							"param_name"       => "carousel_options",
							"text"             => __( "Carousel Options", 'apcore' ),
							'dependency'		=> array( 'element' => 'layoutstyle', 'value' => array('carousel')),
							'group'=> esc_html__('Carousel','apcore'),
						),
						array(
						  "type"		=> "dropdown",
						  "heading"		=> __("Desktop Items", 'apcore'),
						  "param_name"	=> "desktop_no_of_items",
						  "value"		=> array(
								"1" => "1",
								"2" => "2",
								"3" => "3",
								"4" => "4",
								"5" => "5",
								"6" => "6",
								"7" => "7",
								"8" => "8",
								"9" => "9",
								"10" => "10"
							),
						  "description" => __("No of slides to show.", 'apcore'),
						  'save_always'	=> true,
						  'std'				=> '3',
						  'dependency'		=> array( 'element' => 'layoutstyle', 'value' => array('carousel')),
						  'edit_field_class' => 'vc_column vc_col-sm-4',
						  'group'=> esc_html__('Carousel','apcore'),
						),
						array(
							  "type"		=> "dropdown",
							  "heading"		=> __("Small Desktop Items", 'apcore'),
							  "param_name"	=> "small_desktop_no_of_items",
							  "value"		=> array(
									"1" => "1",
									"2" => "2",
									"3" => "3",
									"4" => "4",
									"5" => "5",
									"6" => "6",
								),
							  "description" => __("No of slides to show.", 'apcore'),
							  'save_always'	=> true,
							  'std'				=> '2',
							  'dependency'		=> array( 'element' => 'layoutstyle', 'value' => array('carousel')),
							  'edit_field_class' => 'vc_column vc_col-sm-4',
							  'group'=> esc_html__('Carousel','apcore'),
						),
						array(
							  "type"		=> "dropdown",
							  "heading"		=> __("Tablet Items", 'apcore'),
							  "param_name"	=> "tablet_no_of_items",
							  "value"		=> array(
									"1" => "1",
									"2" => "2",
									"3" => "3",
									"4" => "4",
									"5" => "5",
									"6" => "6",
								),
							  "description" => __("No of slides to show.", 'apcore'),
							  'save_always'	=> true,
							  'dependency'		=> array( 'element' => 'layoutstyle', 'value' => array('carousel')),
							  'edit_field_class' => 'vc_column vc_col-sm-4',
							  'group'=> esc_html__('Carousel','apcore'),
						),
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Enable Auto Play', 'apcore'),
							"description"		=> __("Will cause your images to auto play until user interaction", 'apcore'),
							'param_name'		=> 'slick_autoplay',
							'value'				=> 'no',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
							'dependency'		=> array( 'element' => 'layoutstyle', 'value' => array('carousel')),
							'group'=> esc_html__('Carousel','apcore'),
						),
						array(
							"type"			=> 'textfield',
							"heading"		=> __("Auto Play Duration", 'apcore'),
							"param_name"	=> "slick_autoplay_duration",
							"description"	=> __("Enter a custom duration in milliseconds between auto play advances e.g. 5000", 'apcore'),
							"value"			=> '2000',
							'save_always'	=> true,
							"dependency"	=> array('element' => "slick_autoplay", 'value' => array('yes')),
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
							'group'=> esc_html__('Carousel','apcore'),
						),
						
						array(
							"type"             => "zolo_param_heading",
							"param_name"       => "navigation_arrows",
							"text"             => __( "Navigation Arrows", 'apcore' ),
							'dependency'		=> array( 'element' => 'layoutstyle', 'value' => array('carousel')),
							'group'=> esc_html__('Carousel','apcore'),
						),
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Arrow Navigation?', 'apcore'),
							'param_name'		=> 'slick_hide_arrow_navigation',
							'value'				=> 'yes',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
							'dependency'		=> array( 'element' => 'layoutstyle', 'value' => array('carousel')),
							'group'			=> esc_html__('Carousel','apcore'),
						),
												
						array(
							'type'        => 'radio_image_select',
							'heading'     => esc_html__( 'Arrows Style', 'apcore' ),
							'param_name'  => 'arrows_style',
							'simple_mode' => false,
							'options'     => array(
								'arrows_style1' => array(
									'tooltip' => esc_attr__('Arrows Style 1','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/nav/nav_style1.jpg'
								),
								'arrows_style2' => array(
									'tooltip' => esc_attr__('Arrows Style 2','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/nav/nav_style2.jpg'
								),
								'arrows_style3' => array(
									'tooltip' => esc_attr__('Arrows Style 3','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/nav/nav_style3.jpg'
								),
								'arrows_style4' => array(
									'tooltip' => esc_attr__('Arrows Style 4','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/nav/nav_style4.jpg'
								),
							),
							'group'=> esc_html__('Carousel','apcore'),
							"dependency"	=> array('element' => "slick_hide_arrow_navigation", 'value' => array('yes'))
			
						),
						array(
							"type" => "colorpicker",
							"class" => "",
							"heading" => __("Arrows color",'apcore'),
							"param_name" => "arrows_color",
							"value" => '#ef3774',
							'group'=> esc_html__('Carousel','apcore'),
							"dependency"	=> array('element' => "slick_hide_arrow_navigation", 'value' => array('yes'))
						),
						array(
							"type" => "colorpicker",
							"class" => "",
							"heading" => __("Arrows background",'apcore'),
							"param_name" => "arrows_bg",
							"value" => '#549ffc',
							'dependency' => array( 'element' => 'arrows_style', 'value' => array('arrows_style2', 'arrows_style3')),
							'group'=> esc_html__('Carousel','apcore'),
						),			
						array(
							"type"             => "zolo_param_heading",
							"param_name"       => "navigation_dots",
							"text"             => __( "Navigation dots", 'apcore' ),
							'dependency'		=> array( 'element' => 'layoutstyle', 'value' => array('carousel')),
							'group'=> esc_html__('Carousel','apcore'),
						),
						
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Dots Navigation?', 'apcore'),
							"description"	=> __("Would you like this slider to display bullets on the bottom?", 'apcore'),
							'param_name'		=> 'slick_bullet_navigation',
							'value'				=> 'yes',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								), 				
							),
							'dependency'		=> array( 'element' => 'layoutstyle', 'value' => array('carousel')),
							'group'			=> esc_html__('Carousel','apcore'),
						),
					
						array(
							'type'        => 'radio_image_select',
							'heading'     => esc_html__( 'Bullet Style', 'apcore' ),
							'param_name'  => 'bullet_navigation_style', 	
							'simple_mode' => false,
							'options'     => array(
								'dots_style1' => array(
									'tooltip' => esc_attr__('Dots Style 1','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/dots/dots_style1.jpg'
								),
								'dots_style2' => array(
									'tooltip' => esc_attr__('Dots Style 2','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/dots/dots_style2.jpg'
								),
								'dots_style3' => array(
									'tooltip' => esc_attr__('Dots Style 3','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/dots/dots_style3.jpg'
								),	
							),
							'group'=> esc_html__('Carousel','apcore'),
							"dependency"	=> array('element' => "slick_bullet_navigation", 'value' => array('yes'))
						),
						
						array(
							"type" => "colorpicker",
							"class" => "",
							"heading" => __("Bullet background",'apcore'),
							"param_name" => "bullet_bg",
							"value" => '#000000',
							'group'=> esc_html__('Carousel','apcore'),
							"dependency"	=> array('element' => "slick_bullet_navigation", 'value' => array('yes'))
						),
						
						
						
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Gutter Space",'apcore'),
							"param_name"		=> "gutter_space",
							'value'				=> '20',
						),	
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Text Alignment",'apcore'),
							"param_name"		=> "text_alignment",
							'value'				=> array(
								__("Left",'apcore') 	=> "left",
								__("Center",'apcore')	=> "center",
								__("Right",'apcore') 	=> "right"
								),
						),					
						
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Excerpt Length",'apcore'),
							"param_name"		=> "excerptlength",
							'value'				=> '15',
						),	
						array(
						   'type'    		=> 'zolo_box_shadow_param',
						   'heading'		=> esc_html__('Shadow', 'apcore'),
						   'param_name' 	=> 'box_shadow',
						   "value"			=> 'box_shadow_enable:enable|shadow_horizontal:7|shadow_vertical:5|shadow_blur:30|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
						),	
						array(
						   'type'    => 'zolo_box_shadow_param',
						   'heading'	=> esc_html__('Box Hover Shadow', 'apcore'),
						   'param_name' => 'box_hover_shadow',
						   "value"		=> 'box_shadow_enable:disable|shadow_horizontal:0|shadow_vertical:7|shadow_blur:15|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
						),
											
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Box Swing', 'apcore'),
							'param_name'		=> 'box_swing',
							'value'				=> 'no',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
						),
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Link Color",'apcore'),
							"param_name"		=> "link_color",
							"value"				=> '#b1b1b1',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Link Hover Color",'apcore'),
							"param_name"		=> "link_hover_color",
							"value"				=> '#ef3774',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),	
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Box background color",'apcore'),
							"param_name"		=> "box_bg_color",
							"value"				=> '#ffffff',
						),
						array(
							'type'				=> 'zolo_number',
							"heading"			=> __("Min Height",'apcore'),
							"param_name"		=> "min_height",
							'step'				=> '1',
							'value'				=> '300',
							'suffix'			=> 'px',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							"dependency"		=> array( 'element' => 'style', 'value' => array('style_02')),
						),
						array(
							"type"			=> "dropdown",
							"heading"		=> __("Image Overlay Color Scheme",'apcore'),
							"param_name"	=> "color_scheme",
							"value"			=> array(
								__("Primary Color",'apcore') 	=> "primary_color_scheme",
								__("Color Scheme 1",'apcore') 	=> "color_scheme1",
								__("Color Scheme 2",'apcore') 	=> "color_scheme2",
								__("Gradient Scheme 1",'apcore') => "gradient_scheme1",
								__("Gradient Scheme 2",'apcore') => "gradient_scheme2",
								__("Gradient Scheme 3",'apcore') => "gradient_scheme3",
								__("Custom Color",'apcore') 	=> "design_your_own"
							),
							"dependency"		=> array( 'element' => 'style', 'value' => array('style_02')),
							
						),
						array(
							"type"			=> "colorpicker",
							"heading"		=> __("Image Overlay Color",'apcore'),
							"param_name"	=> "image_overlay_color2",
							"value"			=> '#000000',
							'dependency'	=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
						),
						array(
							'type' 		=> 'zolo_number',
							'heading' 	=> __("Image Opacity",'apcore'),
							'param_name'=> 'opacity',
							"value" => 0.7,
							"min" => 0.0,
							"max" => 1.0,
							"step" => 0.1,
							'suffix'	=> 'px',
							"dependency"		=> array( 'element' => 'style', 'value' => array('style_02')),
						),
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Box Hover Text color",'apcore'),
							"param_name"		=> "box_hover_text_color",
							"value"				=> '#ffffff',
							"dependency"		=> array( 'element' => 'style', 'value' => array('style_02')),
						),
						
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Show filter', 'apcore'),
							'param_name'		=> 'blgshowfilter',
							'value'				=> 'no',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
							'dependency'		=> array( 'element' => 'layoutstyle', 'value' => array('masonry', 'fitRows')),
							'group'				=> esc_html__('Filter', 'apcore'),
						),
						array(
							'type'				=> 'zolo_number',
							"heading"			=> __("Filter button Font Size",'apcore'),
							"param_name"		=> "filter_fontsize",
							'step'				=> '1',
							'value'				=> '16',
							'suffix'			=> 'px',
							'dependency'		=> array('element' => 'blgshowfilter', 'value' => 'yes'),
							'group'				=> esc_html__('Filter', 'apcore'),
						),
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Filter button alignment",'apcore'),
							"param_name"		=> "filter_button_align",
							'value'				=> array(__("Left",'apcore') => "left",__("Center",'apcore') => "center",__("Right",'apcore') => "right"),
							'std'				=> 'center',
							'dependency'		=> array('element' => 'blgshowfilter', 'value' => 'yes'),
							'group'				=> esc_html__('Filter', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Filter button text color",'apcore'),
							"param_name"		=> "filter_button_text_color",
							"value"				=> '#000000',
							"description"		=> __("Filter button text color",'apcore'),	
							'dependency'		=> array('element' => 'blgshowfilter', 'value' => 'yes'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'group'				=> esc_html__('Filter', 'apcore'),	
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Filter button hover text color",'apcore'),
							"param_name"		=> "filter_button_text_hover_color",
							"value"				=> '#ef3774',
							"description"		=> __("Filter button hover text color",'apcore'),	
							'dependency'		=> array('element' => 'blgshowfilter', 'value' => 'yes'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'group'				=> esc_html__('Filter', 'apcore'),
						),

						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Navigation type",'apcore'),
							"param_name"		=> "blog_navigation",
							'value'				=> array(
								__("None",'apcore') => "none",
								__("Default",'apcore') => "default",
								__("Classic navigation",'apcore') => "classic_nav",
								__("Load more button",'apcore') => "loadmore_nav"
							),
							'dependency'		=> array( 'element' => 'layoutstyle', 'value' => array('masonry', 'fitRows')),
							'group'				=> esc_html__('Navigation', 'apcore'),
						),						
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Navigation text color",'apcore'),
							"param_name"		=> "nav_color",
							"value"				=> '#000000',
							"description"		=> __("navigation text color",'apcore'),			
							'dependency'		=> array( 'element' => 'blog_navigation', 'value' => array('classic_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),		
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Navigation background",'apcore'),
							"param_name"		=> "nav_bg",
							"value"				=> '#eeeeee',
							"description"		=> __("navigation background",'apcore'),			
							'dependency'		=> array( 'element' => 'blog_navigation', 'value' => array('classic_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),	 			 
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Navigation border color",'apcore'),
							"param_name"		=> "nav_border",
							"value"				=> '#eeeeee',
							"description"		=> __("navigation border color",'apcore'),			
							'dependency'		=> array( 'element' => 'blog_navigation', 'value' => array('classic_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),	 
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Current navigation text color",'apcore'),
							"param_name"		=> "nav_hover_color",
							"value"				=> '#ffffff',
							"description"		=> __("Current navigation text color",'apcore'),			
							'dependency'		=> array( 'element' => 'blog_navigation', 'value' => array('classic_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),				 
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Current navigation background color",'apcore'),
							"param_name"		=> "nav_hover_bg",
							"value"				=> '#549ffc',
							"description"		=> __("Current navigation background color",'apcore'),			
							'dependency'		=> array( 'element' => 'blog_navigation', 'value' => array('classic_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),				
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Number of post to load on click",'apcore'),
							"param_name"		=> "blog_click",
							"value"				=> __("3",'apcore'),
							"description"		=> __("Number of post loaded when Load more clicked",'apcore'),			
							'dependency'		=> array( 'element' => 'blog_navigation', 'value' => array('loadmore_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Loadmore button background color",'apcore'),
							"param_name"		=> "button_bg",
							"value"				=> '#549ffc',
							"description"		=> __("button background color",'apcore'),			
							'dependency'		=> array( 'element' => 'blog_navigation', 'value' => array('loadmore_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),	 
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Loadmore button text color",'apcore'),
							"param_name"		=> "button_title",
							"value"				=> '#fff',
							"description"		=> __("button text color",'apcore'),			
							'dependency'		=> array( 'element' => 'blog_navigation', 'value' => array('loadmore_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),				 
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Loadmore button border color",'apcore'),
							"param_name"		=> "button_border",
							"value"				=> '#549ffc',
							"description"		=> __("button border color",'apcore'),			
							'dependency'		=> array( 'element' => 'blog_navigation', 'value' => array('loadmore_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),							 
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Loadmore button text color hover",'apcore'),
							"param_name"		=> "button_hover_title",
							"value"				=> '#fff',
							"description"		=> __("Text color on hover",'apcore'),			
							'dependency'		=> array( 'element' => 'blog_navigation', 'value' => array('loadmore_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),				 
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Loadmore button background color hover",'apcore'),
							"param_name"		=> "button_hover_bg",
							"value"				=> '#549ffc',
							"description"		=> __("Background color on hover",'apcore'),			
							'dependency'		=> array( 'element' => 'blog_navigation', 'value' => array('loadmore_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
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
							'type'				=> 'zolo_video_link_param',
							'heading'			=> esc_html__('Video tutorial and theme documentation article','apcore'),
							'param_name'		=> 'tutorials',
							'doc_link'			=> $doc_link,
							'video_link'		=> 'https://youtu.be/Z1bRn0uKNvE',
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
									'tag' => 'h4',
									'font_size',							
									'line_height',
									'letter_spacing',
									'font_style',
									'color' => '#252525',
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
							'text'				=> esc_html__('Categories Typography', 'apcore'),
							'param_name'		=> 'categories_heading',
							'class'				=> 'zolo-param-heading',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12',
							'group'				=> esc_html__('Categories Typography', 'apcore'),
						),
						array(
							'type'				=> 'zolo_font_container',
							'heading'			=> '',
							'param_name'		=> 'categories_font_options',
							'settings'				=> array(
								'fields'				=> array(
									'font_size',							
									'line_height',
									'letter_spacing',
									'font_style',

								),
							),
							'group'				=> esc_html__('Categories Typography', 'apcore'),
						),
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Custom font family', 'apcore'),
							'param_name'		=> 'categories_google_fonts',
							'value'				=> 'no',
							'options'			=> array(
								esc_html__('Yes', 'apcore')	=> 'yes',
								esc_html__('No', 'apcore') => 'no',
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'group'				=> esc_html__('Categories Typography', 'apcore'),
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
							'dependency' => array( 'element' => 'categories_google_fonts', 'value' => 'yes'),
							'group'				=> esc_html__('Categories Typography', 'apcore'),
						),
						
						
						
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Meta Typography', 'apcore'),
							'param_name'		=> 'meta_heading',
							'class'				=> 'zolo-param-heading',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12',
							'group'				=> esc_html__('Meta Typography', 'apcore'),
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
									'font_style',

								),
							),
							'group'				=> esc_html__('Meta Typography', 'apcore'),
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
							'group'				=> esc_html__('Meta Typography', 'apcore'),
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
							'group'				=> esc_html__('Meta Typography', 'apcore'),
						),
						
						
						
							
					),
				) );		
		
			}		