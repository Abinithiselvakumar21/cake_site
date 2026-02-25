<?php 
/*-----------------------------------------------------------------------------------*/
/* Portfolio shortcode
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
if(!class_exists('Apress_Portfolio_Video_Module')) {
	class Apress_Portfolio_Video_Module {
		function __construct() {
			add_action( 'init', array( &$this, 'apress_portfolio_video_init' ) );
			add_shortcode( 'apress_portfolio_video', array( &$this, 'apress_portfolio_video' ) );
		}
		
		function apress_portfolio_video_init() {
			$is_admin = is_admin();	
			$portfolio_types = ($is_admin) ? get_terms('catportfolio') : array('All' => 'all');
			$types_options = array("All" => "all");
			if($is_admin) {
				foreach ($portfolio_types as $type) {
					$types_options[$type->name] = $type->slug;
				}
			} else {
				$types_options['All'] = 'all';
			}
			
			$doc_link = 'http://apresswp.com/help';
			
			if ( function_exists( 'vc_map' ) ) {
				vc_map( array(
					"name"				=> __("Portfolio Videos", 'apcore'),
					"base"				=> "apress_portfolio_video",
					"class"				=> "",
					"weight"			=> 16,
					"category"			=> __( "Apress", "apcore"),
					"description"		=> __("Amazing Portfolio Video", "apcore"),
					"icon"				=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-portfolio.png",
					"params"			=> array(		
						array(
							'type'        => 'radio_image_select',
							'heading'     => esc_html__( 'Choose Style', 'apcore' ),
							"holder"	  => "div",
							'param_name'  => 'style',
							'simple_mode' => false,
							'admin_label' => true,
							'options'     => array(								
								'style1' => array(
									'tooltip' => esc_attr__('Portfolio Video','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/portfolio/portfolio_style/portfolio_style2.jpg'
								),								
					
							),
						),
												
						array(
							"type"				=> "zolo_taxonomy_multiselect",
							"heading"			=> __("Categories", "apcore"),
							"param_name"		=> "category",
							"admin_label"		=> true,
							"value"				=> $types_options,
							'save_always'		=> true,
							"description"		=> __("Please select the categories you would like to display for your portfolio. <br/> You can select multiple categories too (ctrl + click on PC and command + click on Mac).", "apcore")
						),								
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Choose Layout",'apcore'),
							"param_name"		=> "layoutstyle",
							'value'				=> array(
								__("Grid square",'apcore') => "grid",
								__("Grid Retangular",'apcore') => "grid_retangular",
								__("Masonry",'apcore') => "masonry",
								__("Packery",'apcore') => "packery"
							),
						),						
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Gutter Space",'apcore'),
							"description"		=> __("Dont leave it blank. Enter value from 0 - 100", "apcore"),
							"param_name"		=> "portfolio_packery_gutter",
							'value'				=> '0',
							'dependency'		=> array( 'element' => 'layoutstyle', 'value' => array('packery'))
						),														
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Number of Posts",'apcore'),
							"description"		=> __("Leave blank or -1 to show all.",'apcore'),
							"param_name"		=> "num",
							'value'				=> '4', 
						),
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Number of Items per row (Two, Three will not work for Packery)",'apcore'),
							"param_name"		=> "portfoliocrslcolprw",
							'value'				=> array(
								__("Four",'apcore') => "Four",
								__("Five",'apcore') => "Five",
								__("Six",'apcore') => "Six",
								__("Three",'apcore') => "Three",
								__("Two",'apcore') => "Two"
							),
						),
						array(
							"type"				=> "dropdown",
							'heading'			=> esc_html__('Box Border Radius','apcore'),
							"param_name"		=> "portfoliocrslcolradi",
							'value'				=> array(
								__("Square",'apcore') => "0",
								__("Rounded",'apcore') => "6",
								__("Round",'apcore') => "10",								
								
								),							
						),
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Box Padding(Top, Right, Bottom, Left)",'apcore'),
							"param_name"		=> "portfoliocrslcolpad2",
							'value'				=> '0,0,0,0',
							'dependency'		=> array( 'element' => 'layoutstyle', 'value' => array('masonry','grid','grid_retangular'))
						),
						
						array(
						   'type'    => 'zolo_box_shadow_param',
						   'heading'	=> esc_html__('Box Shadow', 'apcore'),
						   'param_name' => 'box_shadow',
						   "value"		=> 'box_shadow_enable:disable|shadow_horizontal:2|shadow_vertical:2|shadow_blur:7|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
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
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('3D Effect', 'apcore'),
							'param_name'		=> 'apress_hover_3deffect',
							'value'				=> 'no',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
						),
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Expand On Hover', 'apcore'),
							'param_name'		=> 'apress_hover_expand',
							'value'				=> 'no',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
						),
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Show filter', 'apcore'),
							'param_name'		=> 'portfoliofilter',
							'value'				=> 'no',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
							'group'				=> esc_html__('Filter', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-top-margin',
						),
						array(
							'type'        => 'radio_image_select',
							'heading'     => esc_html__( 'Style', 'apcore' ),
							'param_name'  => 'filter_button_style',
							'simple_mode' => false,
							'options'     => array(
								'filter_button_style1' => array(
									'tooltip' => esc_attr__('Filter Button Style1','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/filter/filter_button_style1.jpg'
								),
								'filter_button_style2' => array(
									'tooltip' => esc_attr__('Filter Button Style2','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/filter/filter_button_style2.jpg'
								),
							),
							'dependency'		=> array('element' => 'portfoliofilter', 'value' => 'yes'),
							'group'				=> esc_html__('Filter', 'apcore'),
						),
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Filter button alignment",'apcore'),
							"param_name"		=> "filter_button_align",
							'value'				=> array(__("Left",'apcore') => "left",__("Center",'apcore') => "center",__("Right",'apcore') => "right"),
							'dependency'		=> array('element' => 'portfoliofilter', 'value' => 'yes'),
							'group'				=> esc_html__('Filter', 'apcore'),
						),
						array(
							"type"				=> "textarea",
							"class"				=> "",
							"heading"			=> __("Filter Description",'apcore'),
							"param_name"		=> "portfoliofilter_des",
							'value'				=> 'Enter your description',
							'dependency'		=> array('element' => 'portfoliofilter', 'value' => 'yes'),
							'group'				=> esc_html__('Filter', 'apcore'),
						),							  
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Filter button Font Size",'apcore'),
							"param_name"		=> "filter_fontsize",
							'value'				=> '16',
							'dependency'		=> array('element' => 'portfoliofilter', 'value' => 'yes'),
							'group'				=> esc_html__('Filter', 'apcore'),
						),						 
						array(
							"type"				=> "dropdown",
							'heading'			=> esc_html__('Filter Button Border Radius','apcore'),
							"param_name"		=> "filter_buttonborradi",
							'value'				=> array(
								__("Square",'apcore') => "0",
								__("Rounded",'apcore') => "6",
								__("Round",'apcore') => "10",								
								
								),
							'dependency'		=> array('element' => 'filter_button_style', 'value' => 'filter_button_style1'),
							'group'				=> esc_html__('Filter', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Filter button text color",'apcore'),
							"param_name"		=> "filter_button_text_color",
							"value"				=> '#fff',
							"description"		=> __("Filter button text color",'apcore'),	
							'dependency'		=> array('element' => 'portfoliofilter', 'value' => 'yes'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'group'				=> esc_html__('Filter', 'apcore'),		
						 ),		
						 array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Filter button hover text color",'apcore'),
							"param_name"		=> "filter_button_text_hover_color",
							"value"				=> '#fff',
							"description"		=> __("Filter button hover text color",'apcore'),	
							'dependency'		=> array('element' => 'portfoliofilter', 'value' => 'yes'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'group'				=> esc_html__('Filter', 'apcore'),		
						 ),						 				 
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Filter button background color",'apcore'),
							"param_name"		=> "filter_button_bg_color",
							"value"				=> '#549ffc',
							"description"		=> __("Filter button background color",'apcore'),
							'dependency'		=> array('element' => 'filter_button_style', 'value' => 'filter_button_style1'),	
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'group'				=> esc_html__('Filter', 'apcore'),		
						),	
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Filter button hover background color",'apcore'),
							"param_name"		=> "filter_button_bg_hover_color",
							"value"				=> '#3174c8',
							"description"		=> __("Filter button hover background color",'apcore'),	
							'dependency'		=> array('element' => 'filter_button_style', 'value' => 'filter_button_style1'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'group'				=> esc_html__('Filter', 'apcore'),		
						),					 
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Filter button border color",'apcore'),
							"param_name"		=> "filter_button_border_color",
							"value"				=> '#3174c8',
							"description"		=> __("Filter button border color",'apcore'),	
							'dependency'		=> array('element' => 'filter_button_style', 'value' => 'filter_button_style1'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'group'				=> esc_html__('Filter', 'apcore'),
						),							
						
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Navigation type",'apcore'),
							"param_name"		=> "portfolio_navigation",
							'value'				=> array(__("None",'apcore') => "none",__("Default",'apcore') => "default",__("Classic navigation",'apcore') => "classic_nav"),							
							'group'				=> esc_html__('Navigation', 'apcore'),
						),							
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Navigation text color",'apcore'),
							"param_name"		=> "nav_color",
							"value"				=> '#000000',
							"description"		=> __("navigation text color",'apcore'),			
							'dependency'		=> array( 'element' => 'portfolio_navigation', 'value' => array('classic_nav')),
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
							'dependency'		=> array( 'element' => 'portfolio_navigation', 'value' => array('classic_nav')),
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
							'dependency'		=> array( 'element' => 'portfolio_navigation', 'value' => array('classic_nav')),
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
							'dependency'		=> array( 'element' => 'portfolio_navigation', 'value' => array('classic_nav')),
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
							'dependency'		=> array( 'element' => 'portfolio_navigation', 'value' => array('classic_nav')),
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
							'video_link'		=> 'https://youtu.be/kjPMqC8JVXs',
						),	
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Title Style', 'apcore'),
							'param_name'		=> 'title_heading',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
							'group'				=> esc_html__('Title Style', 'apcore'),
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
									'color' => '#ffffff',
								),
							),
							'group'			=> esc_html__('Title Style', 'apcore'),
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
							'group'				=> esc_html__('Title Style', 'apcore'),
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
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'dependency' => array( 'element' => 'title_google_fonts', 'value' => 'yes'),
							'group'				=> esc_html__('Title Style', 'apcore'),
						),
						
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Categories Style', 'apcore'),
							'param_name'		=> 'categories_heading',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
							'group'				=> esc_html__('Categories Style', 'apcore'),							
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
							'group'			=> esc_html__('Categories Style', 'apcore'),							
						),
						 array(
							"type"				=> "colorpicker",
							"heading"			=> __("Categories color",'apcore'),
							"param_name"		=> "categories_color",
							"value"				=> '#ffffff',
							'group'				=> esc_html__('Categories Style', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						 ),
						 array(
							"type"				=> "colorpicker",
							"heading"			=> __("Categories Hover color",'apcore'),
							"param_name"		=> "categories_hover_color",
							"value"				=> '#ffffff',
							'group'				=> esc_html__('Categories Style', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
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
							'group'				=> esc_html__('Categories Style', 'apcore'),							
						),
						array(
							'type'				=> 'google_fonts',
							'param_name'		=> 'categories_custom_fonts',
							'settings'			=> array(
								'fields'			=> array(
									'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
									'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
								),
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'dependency' => array( 'element' => 'categories_google_fonts', 'value' => 'yes'),
							'group'				=> esc_html__('Categories Style', 'apcore'),
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
		}

		function apress_portfolio_video( $atts, $content=null ){
		   extract(shortcode_atts(array(
						'style'								=> 'style1',
						'category'							=> '',
						'layoutstyle'						=> 'grid',
						'portfoliohovertype_opt2'			=> 'hover_default',
						'num'								=> '4',
						'portfoliocrslcolprw'				=> 'Four',
						'portfoliocrslcolradi'				=> '0',
						'portfoliocrslcolpad2'				=> '0,0,0,0',
						'box_shadow'						=> 'box_shadow_enable:disable|shadow_horizontal:2|shadow_vertical:2|shadow_blur:7|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
						'box_swing'							=>'no',
						'apress_hover_3deffect'				=>'no',
						'apress_hover_expand'				=>'no',
						'portfolio_packery_gutter'			=> '0',
						'captionbg'							=> '#ffffff',
						'caption_border_radius'				=> '0',
						'color_scheme'						=> 'primary_color_scheme',
						'portfoliocrslimgoverlay' 			=> '#000000',
						'portfoliocrsloverlayhovercolor'	=> '#000000',
						
										
						'portfolio_navigation'				=> 'none',
						'portfolio_click'					=> '4',
						'nav_bg'							=> '#eeeeee',
						'nav_color'							=> '#000000',
						'nav_border'						=> '#eeeeee',
						'nav_hover_color'					=> '#ffffff',
						'nav_hover_bg'						=> '#549ffc',
						'button_bg'							=> '#549ffc',
						'button_title'						=> '#fff',
						'button_border'						=> '#549ffc',
						'button_hover_title'				=> '#fff',
						'button_hover_bg'					=> '#549ffc',
						'portfoliofilter'					=> 'no',	
						'filter_button_style'				=> 'filter_button_style1',
						'portfoliofilter_des'				=> 'Enter your description',
						'filter_button_align'				=> 'left',
						'filter_fontsize'					=> '16',
						'filter_buttonborradi'				=> '0',
						'filter_button_text_color'			=> '#fff',
						'filter_button_bg_color'			=> '#549ffc',
						'filter_button_border_color'		=> '#3174c8',
						'filter_button_text_hover_color'	=> '#fff',
						'filter_button_bg_hover_color'		=> '#3174c8',	
						
						'title_font_options'				=> '',
						'title_google_fonts'				=> '',
						'title_custom_fonts'				=> '',
						'categories_font_options'			=> '',
						'categories_google_fonts'			=> '',
						'categories_custom_fonts'			=> '',	
						'categories_hover_color'			=> '#ffffff',		
						'categories_color'					=> '#ffffff',		
						'content_alignment'					=> 'left',	
						'title_responsive'					=> '',
						'data_animation'					=> 'No Animation',
						'data_delay'						=> '500'
						
						
				), $atts));
				ob_start();	
				$id = RandomString(20);	
				if($portfoliocrslcolprw == 'Six'){
						$portfoliocrslcolprw = 6;
					}elseif($portfoliocrslcolprw == 'Five'){
							$portfoliocrslcolprw = 5;
						}elseif($portfoliocrslcolprw == 'Four'){
								$portfoliocrslcolprw = 4;
							}elseif($portfoliocrslcolprw == 'Three'){
									$portfoliocrslcolprw = 3;
								}elseif($portfoliocrslcolprw == 'Two'){
										$portfoliocrslcolprw = 2;
									}
				
				//Animation
				if($data_animation == 'No Animation'){
						$animatedclass = 'noanimation';
					}else{
						$animatedclass = 'animated hiding';
					}
									
				static $c = 1;
				
			if($color_scheme == 'design_your_own'){
				$key = '';
			}else{
				$key = $color_scheme;
			} 
			$color_scheme_css = apcore_shortcodes_background_color_scheme($key);
			
			//Layout Style
			if($layoutstyle == 'grid' || $layoutstyle == 'grid_retangular'){
				$layoutstyle_class = 'layoutstyle_normal';
				$layout_class = 'grid-item';
				$layoutmode = 'fitRows';
				
			}else if($layoutstyle == 'masonry'){
				$layoutstyle_class = 'shortcode_blog_layout_masonry';
				$layout_class = 'masonry-item';
				$layoutmode = 'masonry';
				
			}else if($layoutstyle == 'packery'){
				$layoutstyle_class = 'shortcode_blog_layout_packery';
				$layout_class = 'packery-item';
				$layoutmode = 'masonry';
			}
				
				
			
					?>
				<script type="text/javascript">
					jQuery.noConflict();
					var j$ = jQuery;
					"use strict";
					j$(window).on('load',function () {
					var $container = j$(".site-content.<?php echo $id.$layoutstyle_class; ?>");	
					
					var $window = j$(window);
					if(j$($container).length){
						$container.animate({opacity:1});
						resizeMasonry($container);
					}
					
					
					var $grid = $container.imagesLoaded( function() {
							// init Isotope
							$container.isotope({
							// options
								itemSelector : '<?php echo '.'.$layout_class;?>',
								layoutMode : '<?php echo $layoutmode; ?>'
							})
						});
					
					
					if(j$($container).length){
						$window.resize(function() {resizeMasonry($container); });
					}
						// filter functions
						  var filterFns = {
							// show if number is greater than 50
							numberGreaterThan50: function() {
							  var number = j$(this).find('.number').text();
							  return parseInt( number, 10 ) > 50;
							},
							// show if name ends with -ium
							ium: function() {
							  var name = j$(this).find('.name').text();
							  return name.match( /ium$/ );
							}
						  };
						  // bind filter button click
						  j$('.portfoliofilter-<?php echo $id; ?>').on( 'click', 'button', function() {
							var filterValue = j$( this ).attr('data-filter');
							// use filterFn if matches value
							filterValue = filterFns[ filterValue ] || filterValue;
							$grid.isotope({ filter: filterValue });
						  });
						  // change is-checked class on buttons
						  j$('.portfoliofilter-<?php echo $id; ?>').each( function( i, buttonGroup ) {
							var $buttonGroup = j$( buttonGroup );
							$buttonGroup.on( 'click', 'button', function() {
							  $buttonGroup.find('.is-checked').removeClass('is-checked');
							  j$( this ).addClass('is-checked');
							});
						  });  				
					});
					
					
					
					var portfolio_width;
					function resizeMasonry(container){
					"use strict";
					
					var $window = j$(window);
					portfolio_width = j$('.zolo_portfolio_area').innerWidth();
					
					container.width(portfolio_width);
					var largeItemHeight = container.find('div[class*="packery_portfolio_squared_small"]:first img').height();
					var largeWidthItemHeight = container.find('div[class*="packery_portfolio_squared_small"]:first img').height();	
					var double = ($window.innerWidth() > 800) ? 2 : 1 ;
					if(container.hasClass('portfolio_gallery_gutter_on')) {
					//var gutter_space = container.data('gutter-space');
					largeItemHeight += <?php echo $portfolio_packery_gutter;?>;
					container.find('div[class*="packery_portfolio_landscape"] img').css('height',(largeWidthItemHeight));
					}
					container.find('div[class*="packery_portfolio_squared_big"] img, div[class*="packery_portfolio_portrait"] img').css('height',(largeItemHeight*double));
					
					container.isotope({
					masonry: { columnWidth: portfolio_width / <?php echo $portfoliocrslcolprw;?>}
					
					});
					}
					
					</script>

<?php
					global $post;
					$portfoliocrslcolpad2 = explode(",",$portfoliocrslcolpad2);
					if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
						elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
						else { $paged = 1; }
					
					
					if($category == 'all') {
						$category = null;
					}				
					$portfolio = array(
						'posts_per_page' => $num,
						'post_type' => 'zt_portfolio',
						'catportfolio'=> $category,
						'post_status' => 'publish',
						'paged' => $paged
					);
					$loop = new WP_Query($portfolio);	
					
			// Typo
			$title_options = _zolo_parse_text_shortcode_params($title_font_options, '', $title_google_fonts, $title_custom_fonts);
			$categories_options = _zolo_parse_text_shortcode_params($categories_font_options, '', $categories_google_fonts, $categories_custom_fonts);
					?>
<!--Blog Row Start-->

<div class="zolo_video_portfolio_area <?php echo ' zoloportfoliostyle'.$c;?>">
  <?php
			if($portfoliofilter == 'yes'){
				
				if($filter_button_align == 'left'){
				?>
  <div class="filter_button_area filter_button_align-<?php echo $filter_button_align;?>">
    <div class="portfolio_filter_col_2 portfolio_filter_button"> <?php echo isotope_portfolio_categories($id);?> </div>
    <div class="portfolio_filter_col_2 portfolio_filter_des"> <?php echo $portfoliofilter_des;?> </div>
  </div>
  <?php }else{?>
  <div class="filter_button_area filter_button_align-<?php echo $filter_button_align;?>">
    <div class="portfolio_filter_col_2 portfolio_filter_des"> <?php echo $portfoliofilter_des;?> </div>
    <div class="portfolio_filter_col_2 portfolio_filter_button"> <?php echo isotope_portfolio_categories($id);?> </div>
  </div>
  <?php }	
			}?>
  <?php 	
	if($layoutstyle == 'packery'){
		$portfolio_row_margin = '0px';
		$portfolio_col_padding = $portfolio_packery_gutter.'px';
	}else{
		$portfolio_row_margin = '0 -'.$portfoliocrslcolpad2[1].'px 0 -'.$portfoliocrslcolpad2[3].'px';
		$portfolio_col_padding = $portfoliocrslcolpad2[0].'px '.$portfoliocrslcolpad2[1].'px '.$portfoliocrslcolpad2[2].'px '.$portfoliocrslcolpad2[3].'px';
		}
  ?>
  <div class="zolo_portfolio_row" style=" margin:<?php echo $portfolio_row_margin;?>">
    <div class="zolo_row site-content portfolio_gallery_gutter_on <?php echo $id.$layoutstyle_class;?>">

      <?php
		$i = 1;
		while ($loop->have_posts()) : $loop->the_post();  
		$current = $loop->query_vars['paged'];
		$maxpages = $loop->max_num_pages;
		?>
      <?php  
		if($portfoliofilter == 'yes'){
		$terms = get_the_terms( $post->ID, 'catportfolio' );  
		
		if ( $terms && ! is_wp_error( $terms ) ) :   
		$links = array();  
		
		foreach ( $terms as $term )   
		{  
		$links[] = $term->name;  
		}  
		$links = str_replace(' ', '-', $links);   
		$tax = join( " ", $links );       
		else :    
		$tax = '';    
		endif; 
		}
		?>
      <?php if($portfoliofilter == 'yes'){$filterclasselector = strtolower($tax);}else{$filterclasselector='';} ?>

      <!--Blog Box Area Start-->
      
      <?php 
			 //Layout Style
				$packery_layout_thumbnail = get_post_meta( $post->ID, 'zt_packery_layout_thumbnail', true ); 	
				$packery_thumbnail_class = '';	
				$portfoliostyle_thumb = '';
				if($layoutstyle == 'grid'){	
					$portfoliostyle_thumb = 'apcore_blogstyle_thumb';	
				}else if($layoutstyle == 'grid_retangular'){
						$portfoliostyle_thumb = 'apcore_blog_medium';
				}else if($layoutstyle == 'masonry'){	
					$portfoliostyle_thumb = 'full';			
				}else if($layoutstyle == 'packery'){			
					if($packery_layout_thumbnail == 'portfolio_small_squared'){
						$portfoliostyle_thumb = 'apcore_shortcode_portfolio_small_squared';
						$packery_thumbnail_class = 'packery_portfolio_squared_small';				
					}else if($packery_layout_thumbnail == 'portfolio_squared'){				
						$portfoliostyle_thumb = 'apcore_shortcode_portfolio_squared';
						$packery_thumbnail_class = 'packery_portfolio_squared_big';				
					}else if($packery_layout_thumbnail == 'portfolio_landscape'){				
						$portfoliostyle_thumb = 'apcore_shortcode_portfolio_landscape';
						$packery_thumbnail_class = 'packery_portfolio_landscape';			
					}else if($packery_layout_thumbnail == 'portfolio_portrait'){				
						$portfoliostyle_thumb = 'apcore_shortcode_portfolio_portrait';
						$packery_thumbnail_class = 'packery_portfolio_portrait';			
					}			
				}
				
				$video_format = get_post_meta($post->ID, 'zt_video_format', true );
				if($apress_hover_3deffect == 'yes'){
					$data_tilt = ' data-tilt data-tilt-glare="false" data-tilt-max="10"'; 
				}else{
					$data_tilt = '';
					}
	  ?>
      <div class="zolo_portfolio_col zolo_portfolio_col<?php echo $portfoliocrslcolprw;?> <?php echo $layout_class.' '.$filterclasselector.' '.$packery_thumbnail_class;?>" style="padding:<?php echo $portfolio_col_padding;?>;" >
      	<div class="zolo_video_portfolio_animation_wrap <?php echo $animatedclass;?>" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
        <div class="zolo_video_portfolio_item">
        <div class="zolo_video_portfolio_box" <?php echo $data_tilt;?>>
        
          <!--Thumb Area Start-->
          <div class="zolo_portfolio_thumb">
            <?php //zolo_zilla_likes
			if( function_exists('zolo_zilla_likes') ){ 
			echo '<span class="zolo_zilla_likes_box"> ';
			zolo_zilla_likes();
			echo '</span>';
			}?>
            
            <?php apress_theme_shortcode_portfolio_thumbnail($portfoliostyle_thumb, $title_options['style'], $categories_options['style']);?>
            
            <?php if($video_format != 'self_hosted'){?>
            <div class="zolo_video_portfolio_caption">
                <h2 class="zolo_video_portfolio_title entry-title"> 
                <a href="<?php the_permalink(); ?>" <?php echo $title_options['style']?>><?php the_title(); ?></a> 
                </h2>
                <span class="zolo_video_portfolio_categories" <?php echo $categories_options['style']?>>
                <?php if(get_the_term_list($post->ID, 'catportfolio', '', '<br />', '')){ ?>
                <?php echo get_the_term_list($post->ID, 'catportfolio', '', ', ', ''); ?>
                <?php } ?>
                </span> </div>
            <a href="<?php the_permalink(); ?>" class="zolo_video_portfolio_link"></a>
            <?php }?>
            
          </div>
          
          <!--Thumb Area End-->
          </div>
        </div>
        </div>
      </div>
      <?php 
	  
	  ?>
      
      <!--Blog Box Area End-->
      <?php $i++;  endwhile; 
	  ?>
    </div>
  </div>
  <?php
		 
		if($portfolio_navigation != 'none'){
			if($portfolio_navigation == 'classic_nav'){ 
				if(isset($maxpages)){ apcore_portfolio_pagination($maxpages);}
			}elseif($portfolio_navigation == 'default'){
				?>
  <nav class="navigation paging-navigation" role="navigation">
    <h1 class="screen-reader-text">
      <?php _e( 'Posts navigation', 'apcore' ); ?>
    </h1>
    <div class="nav-links">
      <div class="nav-previous">
        <?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'apcore' ),$loop->max_num_pages ); ?>
      </div>
      <div class="nav-next">
        <?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'apcore' ) ); ?>
      </div>
    </div>
    <!-- .nav-links --> 
  </nav>
  <?php
			}
		}?>
  <?php 
		// clean up after the query and pagination
		//wp_reset_postdata(); 
		//wp_reset_query();
		?>
</div>

<?php 
$shortcode_css = '';
if($box_swing == 'yes'){
	$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_video_portfolio_box:hover{ transform:translateY(-3px); -moz-transform:translateY(-3px); -webkit-transform:translateY(-3px); -ms-transform:translateY(-3px); -o-transform:translateY(-3px);}';
}

if($apress_hover_expand == 'yes'){
	$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_video_portfolio_item:hover{transform:scale(1.1); -moz-transform:scale(1.1); -webkit-transform:scale(1.1); -ms-transform:scale(1.1); -o-transform:scale(1.1);}';
}

if(substr_count($box_shadow, 'disable') == 0) {
	$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
	$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_video_portfolio_box:hover{'.$box_shadow.'}';
}
$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_video_portfolio_box{border-radius:'.$portfoliocrslcolradi.'px; border-radius:'.$portfoliocrslcolradi.'px;}';
$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_video_portfolio_categories,
.zoloportfoliostyle'.$c.' .zolo_video_portfolio_categories a{ color:'.$categories_color.';}';
$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_video_portfolio_categories a:hover{ color:'.$categories_hover_color.';}';


$shortcode_css .= '.zoloportfoliostyle'.$c.' .portfolio_load_more_cont button.btn_load_more{background:'.$button_bg.';  color:'.$button_title.';}';
if($button_border){
	$shortcode_css .= '.zoloportfoliostyle'.$c.' .portfolio_load_more_cont button.btn_load_more{border:1px solid '.$button_border.';}';
}
$shortcode_css .= '.zoloportfoliostyle'.$c.' .portfolio_load_more_cont button.btn_load_more:hover{ background:'.$button_hover_bg.'; color:'.$button_hover_title.';border-color: '.$button_border.';}';

$shortcode_css .= '.zoloportfoliostyle'.$c.' .page-numbers li a{background:'.$nav_bg.';  color:'.$nav_color.'!important;border:1px solid '.$nav_border.'!important;}';
$shortcode_css .= '.zoloportfoliostyle'.$c.' .page-numbers li span,
.zoloportfoliostyle'.$c.' .page-numbers li a:hover{background:'.$nav_hover_bg.';color:'.$nav_hover_color.'!important;border:1px solid '.$nav_border.'!important;}';	


/*Filters CSS Start*/
$shortcode_css .= '.zoloportfoliostyle'.$c.' .filters-button-group{ text-align:'.$filter_button_align.';}';

$shortcode_css .= '.zoloportfoliostyle'.$c.' .filters-button-group button.button{color:'.$filter_button_text_color.'; font-size:'.$filter_fontsize.'px; line-height:'.$filter_fontsize.'px;}';

$shortcode_css .= '.zoloportfoliostyle'.$c.' .filters-button-group button.button.is-checked,
.zoloportfoliostyle'.$c.' .filters-button-group button.button:hover{color:'.$filter_button_text_hover_color.';opacity:1}';

if($filter_button_style == 'filter_button_style1'){
	$shortcode_css .= '.zoloportfoliostyle'.$c.' .filters-button-group button.button{background:'.$filter_button_bg_color.';
	-moz-border-radius:'.$filter_buttonborradi.'px;
	-webkit-border-radius:'.$filter_buttonborradi.'px;
	-ms-border-radius:'.$filter_buttonborradi.'px;
	-o-border-radius:'.$filter_buttonborradi.'px;
	border-radius:'.$filter_buttonborradi.'px;
	}';
	if($filter_button_border_color){
		$shortcode_css .= '.zoloportfoliostyle'.$c.' .filters-button-group button.button{border:1px solid '.$filter_button_border_color.';}';
	}	
	$shortcode_css .= '.zoloportfoliostyle'.$c.' .filters-button-group button.button.is-checked,
	.zoloportfoliostyle'.$c.' .filters-button-group button.button:hover{background:'.$filter_button_bg_hover_color.';border-color:'.$filter_button_border_color.';}';
	
}else{
	$shortcode_css .= '.zoloportfoliostyle'.$c.' .filters-button-group button.button{background: none;box-shadow:none;
	-moz-border-radius:0px;
	-webkit-border-radius:0px;
	-ms-border-radius:0px;
	-o-border-radius:0px;
	border-radius:0px;
	}';
	
	$shortcode_css .= '.filter_button_align-center .filters-button-group button.button{ margin:0 10px;}';
	$shortcode_css .= '.filter_button_align-left .filters-button-group button.button{margin-right:20px;}';
	$shortcode_css .= '.filter_button_align-right .filters-button-group button.button{margin-left:20px;}';
	
	
	$shortcode_css .= '.zoloportfoliostyle'.$c.' .filters-button-group button.button{ overflow:hidden; position:relative; padding:10px 2px 10px;}';
	$shortcode_css .= '.zoloportfoliostyle'.$c.' .filters-button-group button.button:before { position:absolute; content:""; transition:all 0.7s;-webkit-transition:all 0.7s;
	left: 0;
	bottom: 0;
	width: 100%;
	border-bottom: 2px  solid '.$filter_button_text_hover_color.';
	-moz-transform:  translateX(-100%);
	-ms-transform:  translateX(-100%);
	-o-transform:  translateX(-100%);
	-webkit-transform:  translateX(-100%);
	transform:  translateX(-100%);
	}';
	$shortcode_css .= '.zoloportfoliostyle'.$c.' .filters-button-group button.button.is-checked:before,
	'.'.zoloportfoliostyle'.$c.' .filters-button-group button.button:hover:before {
	-moz-transform:  translateX(0);
	-ms-transform:  translateX(0);
	-o-transform:  translateX(0);
	-webkit-transform:  translateX(0);
	transform:  translateX(0);
	}';
}		
/*Filters CSS End*/

$shortcode_css .= '.site-content.'.$id.$layoutstyle_class.'{ opacity:0;}	';	  
if(isset($title_responsive) && $title_responsive != '') {
	$shortcode_css .= Zolo_Resposive_Text_Param::responsive_css($title_responsive, '.zoloportfoliostyle'.$c.' .zolo_video_portfolio_title a');
	}
	
apcore_save_plugin_dyn_styles( $shortcode_css );
?>
<?php
			$c++;
			wp_reset_query();
			$demolp_output = ob_get_clean();
			return $demolp_output;
			}
	}
	
	$Apress_Portfolio_Video_Module = new Apress_Portfolio_Video_Module;
}


