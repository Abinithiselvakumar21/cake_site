<?php 
/*-----------------------------------------------------------------------------------*/
/* Pricing Table
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract( shortcode_atts( array(
	'pricing_table_switch_heading1'		=> 'Monthly',
	'pricing_table_switch_heading2'		=> 'Annually',
	'pricing_table_switch_off_text'		=> '30%',
	'switch_heading_color'				=> '#000000',
	'switch_active_heading_color'		=> '#5270d0',
	'switch_alignment'					=> 'center',
	'switch_color'						=> '#000000',
	'active_switch_color'				=> '#5270d0',
	'box_shadow'						=> 'box_shadow_enable:enable|shadow_horizontal:0|shadow_vertical:7|shadow_blur:15|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
	'class'								=> '',
	'data_animation'					=> 'No Animation',
	'data_delay'						=> '500',
	
), $atts ) );
			
//Animation
if($data_animation == 'No Animation'){
	$animatedclass = 'noanimation';
}else{
	$animatedclass = 'animated hiding';
}


//RTL Colde
if ( is_rtl() ){
	if($switch_alignment == 'left'){
		$switch_alignment = 'right';
	}else if($switch_alignment == 'right'){
		$switch_alignment = 'left';
	}else{
		$switch_alignment = 'center';
	}
	
}else{
	$switch_alignment = $switch_alignment;
}

if(substr_count($box_shadow, 'disable') == 0) {
	$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
}




$uniqid = uniqid(rand());
$zolo_pricing_table_switch_id = 'zolo_pricing_table_switch_element_'.$uniqid;
	

$switch_wrap_class[] = $zolo_pricing_table_switch_id;
$switch_wrap_class[] = 'zolo_pricing_table_switch_element';
$switch_wrap_class[] = $animatedclass;

$switch_wrap_class = implode( ' ', $switch_wrap_class );

$pricing_table_switch_off_text_html = '';
if(!empty($pricing_table_switch_off_text)){
$pricing_table_switch_off_text_html = '<span class="zolo_pricing_table_switch_off">'.$pricing_table_switch_off_text.'</span>';
}
$output = '';

	$output .= '<div class="'.$switch_wrap_class.'" data-animation = "'.$data_animation.'" data-delay = "'.$data_delay.'">';
	
	$output .= '<div class="zolo_pricing_table_switch_toggle"><div class="zolo_pricing_table_switch_toggle_content">
        <span id="zolo_pricing_table_switch_monthly" class="zolo_pricing_table_switch_text zolo_pricing_table_switch_monthly">'.$pricing_table_switch_heading1.'</span>
        <label class="zolo_pricing_table_switch">
          <input type="checkbox" id="zolo_pricing_table_switch_checbox" onclick="switch_element_check()" ;/>
          <span class="zolo_pricing_table_switch_slider round"></span>
        </label>
        <span id="zolo_pricing_table_switch_annually" class="zolo_pricing_table_switch_text zolo_pricing_table_switch_annually">'.$pricing_table_switch_heading2 . $pricing_table_switch_off_text_html.'</span></div></div>';
	
	
	$output .= '</div>';	
		

	
	echo $output;
	

$custom_css = '';


$custom_css .= '.'.$zolo_pricing_table_switch_id.'{text-align:'.$switch_alignment.';}';
$custom_css .= '.'.$zolo_pricing_table_switch_id.' input:checked + .zolo_pricing_table_switch_slider{background-color:'.$active_switch_color.';}';

$custom_css .= '.'.$zolo_pricing_table_switch_id.' .zolo_pricing_table_switch_slider{background-color:'.$switch_color.';}';
$custom_css .= '.'.$zolo_pricing_table_switch_id.' .zolo_pricing_table_switch_text{color:'.$switch_heading_color.';}';
$custom_css .= '.'.$zolo_pricing_table_switch_id.' .zolo_pricing_table_switch_text.active{color:'.$switch_active_heading_color.';}';
$custom_css .= '.'.$zolo_pricing_table_switch_id.' .zolo_pricing_table_switch{'.$box_shadow.';}';

$custom_css .= '.'.$zolo_pricing_table_switch_id.' .zolo_pricing_table_switch_off{background-color:'.$active_switch_color.';}';
$custom_css .= '.'.$zolo_pricing_table_switch_id.' .zolo_pricing_table_switch_off:after{border-top:6px solid '.$active_switch_color.';}';

apcore_save_plugin_dyn_styles( $custom_css );