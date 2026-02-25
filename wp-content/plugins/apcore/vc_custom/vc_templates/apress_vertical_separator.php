<?php 
/*-----------------------------------------------------------------------------------*/
/* Vertical Separator
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

	extract( shortcode_atts( array(
		'separator_orientation'			=> 'vertical',
		'vertical_separator_width'		=> '1',
		'separator_widtht_in'			=> 'px',
		'vertical_separator_height'		=> '100',
		'separator_height_in'			=> 'px',
		'vertical_separator_style'		=> 'solid',
		'vertical_separator_color'		=> '#cccccc',
		'vertical_separator_align'		=> 'left',	
		'apress_hide_on_device_desktop'	=> 'show',
		'apress_hide_on_device_tablet_l'=> 'show',
		'apress_hide_on_device_tablet_p'=> 'show',
		'apress_hide_on_device_mobile'	=> 'show',			
		'class'							=> '',
		'data_animation'				=> 'No Animation',
		'data_delay'					=> '500'
	
	), $atts ) );
			
	//Animation
	if($data_animation == 'No Animation'){
		$animatedclass = 'noanimation';
	}else{
		$animatedclass = 'animated hiding';
	}
			
$uniqid = uniqid(rand());
$apress_vertical_separator_id = 'apress_vertical_separator_element_'.$uniqid;

$apress_hide_on_device_mobile_value = $apress_hide_on_device_tablet_p_value = $apress_hide_on_device_desktop_value = $apress_hide_on_device_tablet_l_value = $block_hide_on_ipad_class = $output = '';



if($apress_hide_on_device_desktop == 'hide'){
	$apress_hide_on_device_desktop_value = 'zolo_vc_hidden-lg';
	}
	
if($apress_hide_on_device_tablet_l == 'hide'){
	$apress_hide_on_device_tablet_l_value = 'zolo_vc_hidden-md';
	
	}
if($apress_hide_on_device_tablet_p == 'hide'){
	$apress_hide_on_device_tablet_p_value = 'zolo_vc_hidden-sm';
	}
if($apress_hide_on_device_mobile == 'hide'){
	$apress_hide_on_device_mobile_value = 'zolo_vc_hidden-xs';
	}
	
$css_classes = array(
	'vertical_separator',
	$class,
	$animatedclass,
	$apress_hide_on_device_desktop_value,
	$apress_hide_on_device_tablet_l_value,
	$apress_hide_on_device_tablet_p_value,
	$apress_hide_on_device_mobile_value,
	$separator_orientation,
);

$css_classes = implode(" ", $css_classes);


if($separator_orientation == 'vertical'){
	
$output .= '<div id="'.$apress_vertical_separator_id.'" class="'.$css_classes.'" data-animation = "'.$data_animation.'" data-delay = "'.$data_delay.'" style="text-align:'.$vertical_separator_align.'"><div class="vertical_separator_inner" style="height:'.$vertical_separator_height.$separator_height_in.';"> <div style="border-left:'.$vertical_separator_width.$separator_widtht_in.' '.$vertical_separator_style.' '.$vertical_separator_color.';"></div></div></div>';

}else{

$output .= '<div id="'.$apress_vertical_separator_id.'" class="'.$css_classes.'" data-animation = "'.$data_animation.'" data-delay = "'.$data_delay.'" style="text-align:'.$vertical_separator_align.'"><div class="vertical_separator_inner" style="height:'.$vertical_separator_height.$separator_height_in.';width:'.$vertical_separator_width.$separator_widtht_in.';"> <div style="border-top:'.$vertical_separator_height.$separator_height_in.' '.$vertical_separator_style.' '.$vertical_separator_color.';"></div></div></div>';

	}
		
echo $output;
