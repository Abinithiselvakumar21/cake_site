<?php 
/*-----------------------------------------------------------------------------------*/
/* Compare
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }


if(!class_exists('Apress_Header_Compare_Module')) {
	class Apress_Header_Compare_Module {

function __construct() {
		add_action( 'init', array( &$this, 'apress_header_compare_init' ) );
		add_shortcode( 'apress_header_compare', array( &$this, 'apress_header_compare' ) );
	}
	
	
function apress_header_compare_init() {
	
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
					"name"			=> __("Compare", 'apcore'),
					"base"			=> "apress_header_compare",
					"category"		=> __( "Header Modules", "apcore"),
					"description"	=> __( "Header compare designs", "apress"),
					"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-compare.jpg",
					"params"		=> array(						
						
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Icon Color",'apcore'),
							"param_name"		=> "icon_color",
							"value"				=> '#000000', 
						),
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Compare Margin', 'apcore'),
							'param_name'		=> 'compare_margin_heading',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
						),
						array(
							'type' 				=> 'zolo_number',
							'heading' 			=> __("Margin Top",'apcore'),
							'param_name'		=> 'button_margin_top',
							'value'				=> '',
							'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
						),
						array(
							'type' 				=> 'zolo_number',
							'heading' 			=> __("Margin Right",'apcore'),
							'param_name'		=> 'button_margin_right',
							'value'				=> '',
							'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
						),
						array(
							'type' 				=> 'zolo_number',
							'heading' 			=> __("Margin Bottom",'apcore'),
							'param_name'		=> 'button_margin_bottom',
							'value'				=> '',
							'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
						),
						array(
							'type' 				=> 'zolo_number',
							'heading' 			=> __("Margin Left",'apcore'),
							'param_name'		=> 'button_margin_left',
							'value'				=> '',
							'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc',
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
							"type"				=> "zolo_video_link_param",
							"heading"			=> esc_html__("Video tutorial and theme documentation article","apress"),
							"param_name"		=> "tutorials",
							"doc_link"			=> $doc_link,
							"video_link"		=> "https://youtu.be/4JYsV-7IPME",
						),
						

					),
					) );		
		
			}		
			
}

function apress_header_compare( $atts, $content=null ){
	
	extract(shortcode_atts(array(
				'icon_color'				=> '#000000',
				'button_margin_top'			=> '',
				'button_margin_right'		=> '',
				'button_margin_bottom'		=> '',
				'button_margin_left'		=> '',
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
	$element_id = 'apcore_header_compare_id_'.$uniqid;


if ( class_exists( 'woocommerce' ) ) { 
echo '<div class="header_module_wrapper"><div id="'.$element_id.'" class="header_el_shopping_compare '.$class.' '.$animatedclass.'" data-animation = "'.$data_animation.'" data-delay = "'.$data_delay.'" >';
echo '<a href="#" class="apress_woocompare_counter_wrap yith-woocompare-open"><i class="ap-music_shuffle_button"></i></a>';
echo '</div></div>';
}

$button_margintop = !empty($button_margin_top) ? 'padding-top:'.$button_margin_top.'px;' : '';
$button_marginright = !empty($button_margin_right) ? 'padding-right:'.$button_margin_right.'px;' : '';
$button_marginbottom = !empty($button_margin_bottom) ? 'padding-bottom:'.$button_margin_bottom.'px;' : '';
$button_marginleft = !empty($button_margin_left) ? 'padding-left:'.$button_margin_left.'px;' : '';

$shortcode_css = '';
if($button_margintop != '' || $button_marginright != '' || $button_marginbottom != '' || $button_marginleft != ''){
$shortcode_css .= '#'.$element_id.'.header_el_shopping_compare{'.$button_margintop.$button_marginright.$button_marginbottom.$button_marginleft.'}';
}
if(!empty($icon_color)){
$shortcode_css .= '#'.$element_id.'.header_el_shopping_compare .ap-music_shuffle_button:before{color:'.$icon_color.';}';
}

apcore_save_plugin_dyn_styles( $shortcode_css );

		$c++;
		wp_reset_query();
		$demolp_output = ob_get_clean();
		return $demolp_output;
		}
	}
	
	$Apress_Header_Compare_Module = new Apress_Header_Compare_Module;
}
