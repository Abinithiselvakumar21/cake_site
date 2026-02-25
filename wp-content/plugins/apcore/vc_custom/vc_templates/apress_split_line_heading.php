<?php 
/*-----------------------------------------------------------------------------------*/
/* Split Line Heading
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }

extract(shortcode_atts(array(
	'title_font_options'		=> '',
	'title_google_fonts'		=> '',
	'title_custom_fonts'		=> '',
	'color_scheme'				=> 'primary_color_scheme',
	'main_heading_color'		=> '',
	
	'class'						=> '',
	'data_animation'			=> 'No Animation',
	'data_delay'				=> '500',
),$atts));	

//Animation
if($data_animation == 'No Animation'){
	$animatedclass = 'noanimation';
}else{
	$animatedclass = 'animated hiding';
}

$uniqid = uniqid(rand());
$apcore_split_heading_element_id = 'apcore_split_heading_element_'.$uniqid;

$title_options = _zolo_parse_text_shortcode_params($title_font_options, 'zolo-content-title-big', $title_google_fonts, $title_custom_fonts);

$array = preg_split("/\r\n|\n|\r/", $content);
$heading_lines = array_filter($array);
$i = 1;
echo '<div id="'.$apcore_split_heading_element_id.'" class="apcore-split-heading '.$class.'">';			
foreach($heading_lines as $k => $v) {
	echo '<'.$title_options['tag'].' class="heading-line '.$animatedclass.'" data-animation = "'.$data_animation.'" data-delay = "'.($data_delay*$i).'" '.$title_options['style'].'>' . do_shortcode($v) . '</'.$title_options['tag'].'>';
	$i++;
}

echo '</div>';	

$custom_css = '';
$custom_css .= '#'.$apcore_split_heading_element_id.'.apcore-split-heading .heading-line{color:'.$main_heading_color.';}';	


apcore_save_plugin_dyn_styles( $custom_css );
