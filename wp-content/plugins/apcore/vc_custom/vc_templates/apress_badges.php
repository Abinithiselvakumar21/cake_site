<?php 
/*-----------------------------------------------------------------------------------*/
/* Badges
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }

extract(shortcode_atts(array(
	'title_font_options'		=> '',
	'title_google_fonts'		=> '',
	'title_custom_fonts'		=> '',
	'badges_name1'				=> 'Badges Name',
	'badges_name2'				=> 'Badges Name',
	'badges_name3'				=> 'Badges Name',
	'badges_name4'				=> 'Badges Name',
	'badges_name5'				=> 'Badges Name',
	'badges_name_text_color1'	=> '#dd3333',
	'badges_name_text_color2'	=> '#dd9933',
	'badges_name_text_color3'	=> '#81d742',
	'badges_name_text_color4'	=> '#1e73be',
	'badges_name_text_color5'	=> '#8224e3',
	'background_shape'			=> 'square',
	'align'						=> 'center',
	'min_height'				=> '120',
	'min_width'					=> '120',
	'margin_left'				=> '-20',
	'class'						=> '',
	'data_animation'			=> 'No Animation',
	'data_delay'				=> '100',
),$atts));	

//Animation
if($data_animation == 'No Animation'){
	$animatedclass = 'noanimation';
}else{
	$animatedclass = 'animated hiding';
}

$uniqid = uniqid(rand());
$apcore_badges_element_id = 'apcore_badges_element_'.$uniqid;

$title_options = _zolo_parse_text_shortcode_params($title_font_options, '', $title_google_fonts, $title_custom_fonts);


echo '<div class="apcore_badges_element_wrap '.$apcore_badges_element_id.' '.$class.' background_shape_'.$background_shape.'" '.$title_options['style'].'>';

echo '<ul class="apcore_badges_element">';
if(!empty($badges_name1)){
echo '<li class="badges_name1 '.$animatedclass.'" data-animation = "'.$data_animation.'" data-delay = "'.$data_delay.'"><span>'.$badges_name1.'</span></li>';
}
if(!empty($badges_name2)){
echo '<li class="badges_name2 '.$animatedclass.'" data-animation = "'.$data_animation.'" data-delay = "'.($data_delay + 200).'"><span>'.$badges_name2.'</span></li>';
}
if(!empty($badges_name3)){
echo '<li class="badges_name3 '.$animatedclass.'" data-animation = "'.$data_animation.'" data-delay = "'.($data_delay + 400).'"><span>'.$badges_name3.'</span></li>';
}
if(!empty($badges_name4)){
echo '<li class="badges_name4 '.$animatedclass.'" data-animation = "'.$data_animation.'" data-delay = "'.($data_delay + 600).'"><span>'.$badges_name4.'</span></li>';
}
if(!empty($badges_name5)){
echo '<li class="badges_name5 '.$animatedclass.'" data-animation = "'.$data_animation.'" data-delay = "'.($data_delay + 800).'"><span>'.$badges_name5.'</span></li>';
}
echo '</ul>';



echo '</div>';




$custom_css = '';

$custom_css .= '.'.$apcore_badges_element_id.'{text-align:'.$align.';}';	
if(!empty($badges_name_text_color1)){
$custom_css .= '.'.$apcore_badges_element_id.' .apcore_badges_element .badges_name1{color:'.$badges_name_text_color1.';}';	
$custom_css .= '.'.$apcore_badges_element_id.' .apcore_badges_element .badges_name1:before{background:'.$badges_name_text_color1.';}';	
}

if(!empty($badges_name_text_color2)){
$custom_css .= '.'.$apcore_badges_element_id.' .apcore_badges_element .badges_name2{color:'.$badges_name_text_color2.';}';	
$custom_css .= '.'.$apcore_badges_element_id.' .apcore_badges_element .badges_name2:before{background:'.$badges_name_text_color2.';}';	
}
if(!empty($badges_name_text_color3)){
$custom_css .= '.'.$apcore_badges_element_id.' .apcore_badges_element .badges_name3{color:'.$badges_name_text_color3.';}';	
$custom_css .= '.'.$apcore_badges_element_id.' .apcore_badges_element .badges_name3:before{background:'.$badges_name_text_color3.';}';	
}
if(!empty($badges_name_text_color4)){
$custom_css .= '.'.$apcore_badges_element_id.' .apcore_badges_element .badges_name4{color:'.$badges_name_text_color4.';}';	
$custom_css .= '.'.$apcore_badges_element_id.' .apcore_badges_element .badges_name4:before{background:'.$badges_name_text_color4.';}';	
}
if(!empty($badges_name_text_color5)){
$custom_css .= '.'.$apcore_badges_element_id.' .apcore_badges_element .badges_name5{color:'.$badges_name_text_color5.';}';	
$custom_css .= '.'.$apcore_badges_element_id.' .apcore_badges_element .badges_name5:before{background:'.$badges_name_text_color5.';}';	
}
if($background_shape == 'circle'){
	
$custom_css .= '.'.$apcore_badges_element_id.'.background_shape_circle .apcore_badges_element{ margin-left: '.abs($margin_left).'px;}';
$custom_css .= '.'.$apcore_badges_element_id.'.background_shape_circle .apcore_badges_element li{border-radius:'.$min_width.'px; -webkit-border-radius:'.$min_width.'px; -ms-border-radius:'.$min_width.'px;overflow: hidden; margin-left: '.$margin_left.'px;}';
$custom_css .= '.'.$apcore_badges_element_id.'.background_shape_circle .apcore_badges_element li span{height:'.$min_height.'px;width:'.$min_width.'px;}';	
	}



$custom_css .= '.'.$apcore_badges_element_id.'{text-align:'.$align.';}';




apcore_save_plugin_dyn_styles( $custom_css );
