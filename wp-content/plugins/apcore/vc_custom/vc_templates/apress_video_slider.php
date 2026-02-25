<?php 
/*-----------------------------------------------------------------------------------*/
/* Video Slider
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract( shortcode_atts( array(
	'style'									=> 'style1',
	'title_font_options'					=> '',
	'title_google_fonts'					=> '',
	'title_custom_fonts'					=> '',
	'title_color'							=> '#484848',
	'title_hover_color'						=> '#1769ff',
	'border_color'							=> '#eeeeee',
	'noof_items'							=> '4',
	'video_values'							=> '',
	'slick_hide_arrow_navigation'			=> 'yes',
	'arrows_style'							=> 'arrows_style1',
	'arrows_color'							=> '#ffffff',
	'arrows_bg'								=> '#549ffc',
	
	'class'									=> '',
	'data_animation'						=> 'No Animation',
	'data_delay'							=> '500',
	
	
), $atts ) );
			
//Animation
	if($data_animation == 'No Animation'){
		$animatedclass = 'noanimation';
	}else{
		$animatedclass = 'animated hiding';
	}

$uniqid = uniqid(rand());
$apcore_video_slider_id = 'apcore_video_slider_'.$uniqid;

$title_options = _zolo_parse_text_shortcode_params($title_font_options, 'zolo_video_title_holder', $title_google_fonts, $title_custom_fonts);


if($style == 'style1'){
$vertical_value = 'yes';
$column_value = '';
}else{
$vertical_value = 'no';
$column_value = 'column_'.$noof_items;
	}

if($style == 'style1'){
$slick_hide_arrow_navigation = 'false';
}else{
	$slick_hide_arrow_navigation = ($slick_hide_arrow_navigation == 'yes')? 'true' : 'false';
	}

$video_values = (array) vc_param_group_parse_atts( $video_values );
	$item_data = array();

	foreach ( $video_values as $data ) {
	    $new_data = $data;
	   
		$new_data['video_thumb_image'] = isset( $data['video_thumb_image'] ) ? $data['video_thumb_image'] : '';
		$new_data['video_iframe'] = isset( $data['video_iframe'] ) ? $data['video_iframe'] : '';
		$new_data['video_title'] = isset( $data['video_title'] ) ? $data['video_title'] : '';

	    $item_data[] = $new_data;
	}
	$counter = 0;
	
	echo '<div id="'.$apcore_video_slider_id.'" class="'.$class.' '.$style.' apcore_video_slider_wrap '.$animatedclass.'" data-noofitems="'.$noof_items.'" data-vertical="'.$vertical_value.'" data-arrows="'.$slick_hide_arrow_navigation.'" data-animation = "'.$data_animation.'" data-delay = "'.$data_delay.'">';
	
	if($style == 'style1'){
	echo '<div class="apcore_video_slider_left">';
	}
	
	echo '<div class="apcore_video_slider_for slider">';
	foreach ( $item_data as $item_d ) {

			echo '<div>';
			echo $item_d['video_iframe'];
			echo '</div>';
	
		$counter++;
	}
	echo '</div>';
	
	if($style == 'style1'){
	echo '</div>';
	echo '<div class="apcore_video_slider_right">';
	}
	
	echo '<div class="apcore_video_slider_nav slider '.$column_value.' '.$arrows_style.'">';
	foreach ( $item_data as $item_d ) {

			// image
			$image_src = wp_get_attachment_image_src($item_d['video_thumb_image'], 'full');

			echo '<div>';
			if($item_d['video_thumb_image'] != ''){
			echo '<div class="video_thumb_holder"><img src="'.esc_url($image_src[0]).'" alt="" /></div>';
			}
			if($style == 'style1' || $style == 'style2'){ echo '<div class="video_title_holder" '.$title_options['style'].'>'.$item_d['video_title'].'</div>';}
			echo '</div>';
			
		$counter++;
	}
	echo '</div>';
	
	if($style == 'style1'){
	echo '</div>';
	}
	
	echo '</div>';




// CSS
$shortcode_css = '';
if($style == 'style1'){
$shortcode_css .= '#'.$apcore_video_slider_id.' .apcore_video_slider_nav .slick-slide{border-color:'.$border_color.';}';
$shortcode_css .= '#'.$apcore_video_slider_id.' .apcore_video_slider_nav .slick-slide .video_title_holder{color:'.$title_color.';}';
$shortcode_css .= '#'.$apcore_video_slider_id.' .apcore_video_slider_nav .slick-slide:hover .video_title_holder{color:'.$title_hover_color.';}';

$shortcode_css .= '#'.$apcore_video_slider_id.' .apcore_video_slider_nav .slick-slide.slick-current img{border:5px solid '.$title_hover_color.';}';
$shortcode_css .= '#'.$apcore_video_slider_id.' .apcore_video_slider_nav .slick-slide.slick-current .video_title_holder{color:'.$title_hover_color.';}';
}

if($style == 'style2'){
	$shortcode_css .= '#'.$apcore_video_slider_id.' .apcore_video_slider_nav .slick-arrow{ color:'.$arrows_color.'}';
	$shortcode_css .= '#'.$apcore_video_slider_id.' .apcore_video_slider_nav .slick-arrow:after{ background:'.$arrows_color.'}';
	$shortcode_css .= '#'.$apcore_video_slider_id.' .apcore_video_slider_nav.arrows_style4 .slick-arrow.slick-next:before{border-color: transparent transparent transparent '.$arrows_color.';}';
	$shortcode_css .= '#'.$apcore_video_slider_id.' .apcore_video_slider_nav.arrows_style4 .slick-arrow.slick-prev:before{border-color: transparent '.$arrows_color.' transparent transparent;}';
	if($arrows_style == 'arrows_style2' || $arrows_style == 'arrows_style3'){
	$shortcode_css .= '#'.$apcore_video_slider_id.' .apcore_video_slider_nav .slick-arrow{ background:'.$arrows_bg.'}';
	}
	$shortcode_css .= '#'.$apcore_video_slider_id.' .apcore_video_slider_nav .slick-slide.slick-current img{border:5px solid '.$title_hover_color.';}';
	$shortcode_css .= '#'.$apcore_video_slider_id.' .apcore_video_slider_nav .slick-slide .video_title_holder{color:'.$title_color.';}';
	$shortcode_css .= '#'.$apcore_video_slider_id.' .apcore_video_slider_nav .slick-slide:hover .video_title_holder{color:'.$title_hover_color.';}';
	$shortcode_css .= '#'.$apcore_video_slider_id.' .apcore_video_slider_nav .slick-slide.slick-current .video_title_holder{color:'.$title_hover_color.';}';
}



apcore_save_plugin_dyn_styles( $shortcode_css ); ?>
