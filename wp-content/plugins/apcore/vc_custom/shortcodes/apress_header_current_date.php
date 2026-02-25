<?php 
/*-----------------------------------------------------------------------------------*/
/* Current Date
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }


if(!class_exists('Apress_Current_Date_Module')) {
	class Apress_Current_Date_Module {

function __construct() {
		add_action( 'init', array( &$this, 'apress_current_date_init' ) );
		add_shortcode( 'apress_current_date', array( &$this, 'apress_current_date' ) );
	}
	
	
function apress_current_date_init() {
	
	$is_admin = is_admin();
	$categories_types = ($is_admin) ? get_categories() : array('All' => 'all');
	$categories_options = array("All" => "all");
	if($is_admin) {
		foreach ($categories_types as $type) {
			if(isset($type->name) && isset($type->slug))
				$categories_options[htmlspecialchars($type->name)] = htmlspecialchars($type->slug);
		}
	} else {
		$categories_options['All'] = 'all';
	}
	
	$post_type_options = array();	
	foreach ( get_post_types( '', 'names' ) as $post_type ) {
		$post_type_options[] = $post_type;
	}
	
	$doc_link = 'http://apresswp.com/help';
	
	
if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
					"name"			=> __("Current Date", 'apcore'),
					"base"			=> "apress_current_date",
					"category"		=> __( "Header Modules", "apcore"),
					"description"	=> __( "current_date designs", "apress"),
					"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-date.jpg",
					"params"		=> array(						
						
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Date Format","apress"),
							"param_name"		=> "date_format",
							"value"				=> "l jS F Y",
							"description"		=> __("M d, Y – will output – Nov 06, 2014<br />
								d M, Y – will output – 06 Nov, 2014<br />
								F jS, Y – will output – November 6th, 2014<br />
								l, F jS, Y – will output – Thursday, November 6th, 2014","apress"),
						),
						array(
							'type'				=> 'apcore_param_heading',
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
							"heading"			=> __("Delay","apress"),
							"param_name"		=> "data_delay",
							"value"				=> "500",
							"description"		=> __("Delay","apress"),
							"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-4 no-top-margin",
						),
						array(
							"type"				=> "textfield",
							"heading"			=> __("Extra class name", "apress"),
							"param_name"		=> "class",
							"description"		=> __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "apress")
						),
						array(
							"type"				=> "apcore_video_link_param",
							"heading"			=> esc_html__("Video tutorial and theme documentation article","apress"),
							"param_name"		=> "tutorials",
							"doc_link"			=> $doc_link,
							"video_link"		=> "https://youtu.be/4JYsV-7IPME",
						),	
						
						array(
							'type'				=> 'zolo_font_container',
							'heading'			=> '',
							'param_name'		=> 'date_font_options',
							'settings'				=> array(
								'fields'				=> array(
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
							'param_name'		=> 'date_google_fonts',
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
							'param_name'		=> 'date_custom_fonts',
							'settings'			=> array(
								'fields'			=> array(
									'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
									'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
								),
							),
							'dependency' => array( 'element' => 'date_google_fonts', 'value' => 'yes'),
							'group'				=> esc_html__('Typography', 'apcore'),
						),	

					),
					) );		
		
			}		
			
}

function apress_current_date( $atts, $content=null ){
	
	extract(shortcode_atts(array(
				'date_format'				=> 'l jS F Y',
				'date_font_options'			=> '',
				'date_google_fonts'			=> '',
				'date_custom_fonts'			=> '',
				'class'						=> '',
				'data_animation'			=> 'No Animation',
				'data_delay'				=> '500',
				
			), $atts));
	ob_start();	
	global $post;
	
	//Animation
	if($data_animation == 'No Animation'){
		$animatedclass = 'noanimation';
	}else{
		$animatedclass = 'animated hiding';
	}

	static $c = 1;
	$uniqid = uniqid(rand());
	$element_id = 'apcore_current_date_id_'.$uniqid;
	
	$date_typo_options = _zolo_parse_text_shortcode_params($date_font_options, '', $date_google_fonts, $date_custom_fonts);

echo '<div class="header_module_wrapper">';
echo '<div id="'.$element_id.'" class="apcore_current_date' .$class.' '.$animatedclass.'" data-animation = "'.$data_animation.'" data-delay = "'.$data_delay.'" '.$date_typo_options['style'].'>';
echo '<i class="ap-clock"></i>'.date($date_format);
echo '</div></div>';

		$c++;
		wp_reset_query();
		$demolp_output = ob_get_clean();
		return $demolp_output;
		}
	}
	
	$Apress_Current_Date_Module = new Apress_Current_Date_Module;
}
