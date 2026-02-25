<?php 
/*-----------------------------------------------------------------------------------*/
/* My Account
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }


if(!class_exists('Apress_Header_MyAccount_Module')) {
	class Apress_Header_MyAccount_Module {

function __construct() {
		add_action( 'init', array( &$this, 'apress_header_myaccount_init' ) );
		add_shortcode( 'apress_header_myaccount', array( &$this, 'apress_header_myaccount' ) );
	}
	
	
function apress_header_myaccount_init() {
	
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
					"name"			=> __("My Account", 'apcore'),
					"base"			=> "apress_header_myaccount",
					"category"		=> __( "Header Modules", "apcore"),
					"description"	=> __( "Header my account designs", "apress"),
					"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-myaccount.jpg",
					"params"		=> array(						
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Style', 'apcore'),
							'param_name'		=> 'myaccount_style',
							'value'				=> 'style_icon_text',
							'options'			=> array(
								esc_html__('Icon + Text', 'apcore')	=> 'style_icon_text',
								esc_html__('Icon', 'apcore') 		=> 'style_icon',
								esc_html__('Text', 'apcore')		=> 'style_text',
							),
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Icon/Text Color",'apcore'),
							"param_name"		=> "icon_color",
							"value"				=> '#000000', 
						),
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('My Account Margin', 'apcore'),
							'param_name'		=> 'myaccount_margin_heading',
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
						
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Dropdown Alignment",'apcore'),
							"param_name"		=> "myaccount_dropdown_alignment",
							"value"				=> array(
								__("Right",'apcore') => "right",
								__("Left",'apcore') => "left", 
							),
							'group'				=> esc_html__('Dropdown', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Text Color",'apcore'),
							"param_name"		=> "dropdown_text_color",
							"value"				=> '#000000', 
							'group'				=> esc_html__('Dropdown', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Text Hover Color",'apcore'),
							"param_name"		=> "dropdown_text_hover_color",
							"value"				=> '#1769ff', 
							'group'				=> esc_html__('Dropdown', 'apcore'),
						),

					),
					) );		
		
			}		
			
}

function apress_header_myaccount( $atts, $content=null ){
	
	extract(shortcode_atts(array(
				'myaccount_style'			=> 'style_icon_text',
				'icon_color'				=> '#000000',
				'button_margin_top'			=> '',
				'button_margin_right'		=> '',
				'button_margin_bottom'		=> '',
				'button_margin_left'		=> '',
				'myaccount_dropdown_alignment'=> 'right',
				'dropdown_text_color'		=> '#000000',
				'dropdown_text_hover_color'	=> '#1769ff',
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
	$element_id = 'apcore_header_myaccount_id_'.$uniqid;


if ( class_exists( 'woocommerce' ) ) { 
echo '<div class="header_module_wrapper"><div id="'.$element_id.'" class="header_el_shopping_myaccount '.$class.' '.$animatedclass.' '.$myaccount_dropdown_alignment.' '.$myaccount_style.'" data-animation = "'.$data_animation.'" data-delay = "'.$data_delay.'" ><div class="apress_header_el_myaccount_wrap">';
?>

<?php if ( is_user_logged_in() ) { ?>
 	<a class="apress_header_el_myaccount_button apress_woo_myaccount_login_button" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','apcore'); ?>">
    <?php if ($myaccount_style == 'style_icon_text' || $myaccount_style == 'style_icon') {?>
    <i class="ap-user"></i>
    <?php }?>
    <?php if ($myaccount_style == 'style_icon_text' || $myaccount_style == 'style_text') {?>
    <span class="myaccount_text"><?php _e('My Account','apcore'); ?></span>
	<?php }?>
    </a>
<div class="apress_header_el_myaccount_navigation">
 <?php woocommerce_account_navigation();?>
</div>
 <?php } else { ?>
 	<a class="apress_header_el_myaccount_button apress_woo_myaccount_logout_button" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','apcore'); ?>">
	<?php if ($myaccount_style == 'style_icon_text' || $myaccount_style == 'style_icon') {?>
    <i class="ap-user"></i>
    <?php }?>
    <?php if ($myaccount_style == 'style_icon_text' || $myaccount_style == 'style_text') {?>
    <span class="myaccount_text"><?php _e('Login / Register','apcore'); ?></span>
	<?php }?>
    </a>
 <?php } ?>



<?php
echo '</div></div></div>';
}

$button_margintop = !empty($button_margin_top) ? 'padding-top:'.$button_margin_top.'px;' : '';
$button_marginright = !empty($button_margin_right) ? 'padding-right:'.$button_margin_right.'px;' : '';
$button_marginbottom = !empty($button_margin_bottom) ? 'padding-bottom:'.$button_margin_bottom.'px;' : '';
$button_marginleft = !empty($button_margin_left) ? 'padding-left:'.$button_margin_left.'px;' : '';

$shortcode_css = '';
if($button_margintop != '' || $button_marginright != '' || $button_marginbottom != '' || $button_marginleft != ''){
$shortcode_css .= '#'.$element_id.'.header_el_shopping_myaccount .apress_header_el_myaccount_wrap{'.$button_margintop.$button_marginright.$button_marginbottom.$button_marginleft.'}';
}
if(!empty($icon_color)){
$shortcode_css .= '#'.$element_id.'.header_el_shopping_myaccount .ap-user:before,
#'.$element_id.'.header_el_shopping_myaccount .apress_header_el_myaccount_button{color:'.$icon_color.';}';
}

if(!empty($dropdown_text_color)){
$shortcode_css .= '#'.$element_id.'.header_el_shopping_myaccount .apress_header_el_myaccount_navigation a,
#'.$element_id.'.header_el_shopping_myaccount .apress_header_el_myaccount_navigation{color:'.$dropdown_text_color.';}';
}
if(!empty($dropdown_text_hover_color)){
$shortcode_css .= '#'.$element_id.'.header_el_shopping_myaccount .apress_header_el_myaccount_navigation a:hover{color:'.$dropdown_text_hover_color.';}';
}


apcore_save_plugin_dyn_styles( $shortcode_css );

		$c++;
		wp_reset_query();
		$demolp_output = ob_get_clean();
		return $demolp_output;
		}
	}
	
	$Apress_Header_MyAccount_Module = new Apress_Header_MyAccount_Module;
}
