<?php 
/*-----------------------------------------------------------------------------------*/
/* Photo Gallery
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract( shortcode_atts( array(
	'style'									=> 'slider_style1',
	'images'								=> '',
	'img_size' 								=> 'full',
    'desktop_no_of_items' 					=> '1',
	'desktop_no_of_items2' 					=> '3',
    'small_desktop_no_of_items' 			=> '1',
    'tablet_no_of_items'					=> '1',
	'mobile_no_of_items'					=> '1',
	'slider_gutter' 						=> '10',
    'slick_center_desktop_padding'			=> '100px',
    'slick_center_small_desktop_padding'	=> '80px',
    'slick_center_tablet_padding'			=> '60px',
	'slick_fade_effect'						=> 'no',
	'slick_focusonselect'					=> 'no',
    'slick_autoplay' 						=> 'no',
    'slick_autoplay_duration'				=> '2000',
	'slick_item_shadow'						=> 'no',
	'slick_lazyload'						=> 'no',
	'slick_hide_arrow_navigation'			=> 'yes',
	'arrows_style'							=> 'arrows_style1',
	'arrows_color'							=> '#ffffff',
	'arrows_bg'								=> '#549ffc',
	'slick_bullet_navigation' 				=> 'yes',
    'bullet_navigation_style' 				=> '',
	'bullet_bg'								=> '#000000',
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
$zolo_image_slider_id = 'image_slider_'.$uniqid;
	
$slick_variable_width = ($style == 'slider_style4')? 'true' : 'false';
$slick_center_mode = ($style == 'slider_style2' || $style == 'slider_style5')? 'true' : 'false';

$slick_autoplay = ($slick_autoplay == 'yes')? 'true' : 'false';



if($style == 'slider_style6'){
	$slick_hide_arrow_navigation = 'true';
}else{
	$slick_hide_arrow_navigation = ($slick_hide_arrow_navigation == 'yes')? 'true' : 'false';
	}


$slick_bullet_navigation = ($slick_bullet_navigation == 'yes')? 'true' : 'false';
$slick_focusonselect = ($slick_focusonselect == 'yes')? 'true' : 'false';

if($slick_lazyload == 'yes'){
		$lazyload_option = 'ondemand';
	}else{
		$lazyload_option = 'progressive';
	}

if($slick_fade_effect == 'yes'){
	$slick_fade_effect = 'true';
}else{
	$slick_fade_effect = 'false';
}

if($style == 'slider_style4'){
	
	$slidesToShow_variable_width = $slick_variable_width;
	
	$desktop_no_of_items = '3';
	$small_desktop_no_of_items = '';
	$tablet_no_of_items = '';
	$mobile_no_of_items = '';
	
	$image_slider_wrap_class = 'variable_slider';
}else{				
	if($style == 'slider_style3'){
		$desktop_no_of_items = $desktop_no_of_items2;
	}else{
		$desktop_no_of_items = $desktop_no_of_items;
		}
	$desktop_no_of_items = $desktop_no_of_items;

	$small_desktop_no_of_items = $small_desktop_no_of_items;
	$tablet_no_of_items = $tablet_no_of_items;
	$mobile_no_of_items = $mobile_no_of_items;
	$image_slider_wrap_class = '';
}


if($slick_bullet_navigation != 'false'){
	$wrap_class[] = 'slick_bullet_active';
	}
$wrap_class[] = 'zolo_slick_slider_holder';
$wrap_class[] = $image_slider_wrap_class;
$wrap_class[] = $bullet_navigation_style;
$wrap_class[] = $arrows_style;
$wrap_class[] = $style;

$wrap_class = implode( ' ', $wrap_class );

$options_array = array(
		'class'                     	=> 'zolo_slick_slider zolo_image_slider '.$wrap_class.' '.$class.' '.$animatedclass,
		
		'data-center-mode'				=> $slick_center_mode,
		'data-desktop-center-padding'	=> $slick_center_desktop_padding,
		'data-small-desktop-padding'	=> $slick_center_small_desktop_padding,
		'data-tablet-padding'			=> $slick_center_tablet_padding,		
		'data-lazy-load' 				=> $lazyload_option,
		
		'data-dots'						=> $slick_bullet_navigation,
		'data-infinite'					=> 'true',
		'data-speed'					=> 900,
		'data-desktop-show'				=> $desktop_no_of_items,
		'data-small-desktop-show'		=> $small_desktop_no_of_items,
		'data-tablet-show'				=> $tablet_no_of_items,
		'data-mobile-show'				=> $mobile_no_of_items,
		'data-slidestoscroll'			=> 1,
		
		'data-autoplay'					=> $slick_autoplay,
		'data-autoplay-speed'			=> 2000,
		'data-arrows'					=> $slick_hide_arrow_navigation,
		'data-focusonselect'			=> 'false',
		
		'data-fade'						=> $slick_fade_effect,
		'data-variable-width'			=> $slick_variable_width,
		'data-mouse-wheel'				=> 'off',
		
		'data-animation'				=> $data_animation,
		'data-delay'					=> $data_delay,
		
	);
	
$default_src = vc_asset_url( 'vc/no_image.png' );
$gallery_images = '';
$images = explode( ',', $images );

foreach ( $images as $i => $image ) {
	
	if ( $image > 0 ) {
		$img = wpb_getImageBySize( array(
			'attach_id' => $image,
			'thumb_size' => $img_size,
		) );
		$thumbnail = $img['thumbnail'];
		if(!empty($img['p_img_large'])){
			$large_img_src = $img['p_img_large'][0];
		}
	} else {
		$large_img_src = $default_src;
		$thumbnail = '<img src="' . $default_src . '"/>';
	}
	
	if($slick_lazyload == 'yes'){
		$thumbnail = str_replace( 'src', 'data-lazy', $img['thumbnail'] );
	}

	$gallery_images .= '<li><div>'. $thumbnail .'</div></li>';
}

?>	

<?php
$output = '<div id="'.$zolo_image_slider_id.'" '.array_to_data( $options_array ).'>';

$output .= '<ul class="zolo_slick_slider_holder image_slider_holder">'.$gallery_images.'</ul>';

$output .= '</div>';

echo $output;

// CSS
$shortcode_css = '';

$shortcode_css .= '#'.$zolo_image_slider_id.'.zolo_image_slider{ width:100%; float:left;}';
$shortcode_css .= '#'.$zolo_image_slider_id.'.zolo_image_slider .slick-arrow{ color:'.$arrows_color.'}';
$shortcode_css .= '#'.$zolo_image_slider_id.'.zolo_image_slider .slick-arrow:after{ background:'.$arrows_color.'}';
$shortcode_css .= '#'.$zolo_image_slider_id.'.zolo_image_slider.arrows_style4 .slick-arrow.slick-next:before{border-color: transparent transparent transparent '.$arrows_color.';}';
$shortcode_css .= '#'.$zolo_image_slider_id.'.zolo_image_slider.arrows_style4 .slick-arrow.slick-prev:before{border-color: transparent '.$arrows_color.' transparent transparent;}';
if($arrows_style == 'arrows_style2' || $arrows_style == 'arrows_style3'){
$shortcode_css .= '#'.$zolo_image_slider_id.'.zolo_image_slider .slick-arrow{ background:'.$arrows_bg.'}';
}

if($style == 'slider_style2' || $style == 'slider_style3' || $style == 'slider_style4'){
	$shortcode_css .= '#'.$zolo_image_slider_id.'.zolo_image_slider ul.image_slider_holder li.slick-slide{ padding:0 '.$slider_gutter.'px;}';
}
if($style == 'slider_style5'){
$shortcode_css .= '#'.$zolo_image_slider_id.'.zolo_image_slider ul.image_slider_holder li.slick-slide{ padding:0 50px;}';
$shortcode_css .= '#'.$zolo_image_slider_id.'.zolo_image_slider .slick-arrow{left:'.$slick_center_desktop_padding.';}';
$shortcode_css .= '#'.$zolo_image_slider_id.'.zolo_image_slider .slick-arrow.slick-next{ left:auto;right:'.$slick_center_desktop_padding.';}';

$shortcode_css .= '@media (max-width:1050px) {';
$shortcode_css .= '#'.$zolo_image_slider_id.'.zolo_image_slider .slick-arrow{ display:none; opacity:0; visibility:hidden;}';
$shortcode_css .= '#'.$zolo_image_slider_id.'.zolo_image_slider ul.image_slider_holder li.slick-slide{ padding:0 20px;}';
$shortcode_css .= '}';
$shortcode_css .= '@media (max-width:800px) {';
	$shortcode_css .= '#'.$zolo_image_slider_id.'.zolo_image_slider ul.image_slider_holder li.slick-slide{ padding:0 15px;}';
$shortcode_css .= '}';
}

if($style == 'slider_style3' || $style == 'slider_style4'){
$shortcode_css .= '#'.$zolo_image_slider_id.'.zolo_image_slider{ overflow:hidden;}';
$shortcode_css .= '#'.$zolo_image_slider_id.'.zolo_image_slider ul{margin:0 '.'-'.$slider_gutter.'px;}';

$arrow_position = $slider_gutter + 46;
$shortcode_css .= '#'.$zolo_image_slider_id.'.zolo_image_slider .slick-arrow{ left:'.$arrow_position.'px}';
$shortcode_css .= '#'.$zolo_image_slider_id.'.zolo_image_slider .slick-arrow.slick-next{ right:'.$arrow_position.'px; left: auto;}';
}

$shortcode_css .= '#'.$zolo_image_slider_id.'.zolo_image_slider ul.slick-dots li.slick-active button:after{ box-shadow:inset 0 0 0 1px '.$bullet_bg.';}';
$shortcode_css .= '#'.$zolo_image_slider_id.'.zolo_image_slider ul.slick-dots li button::after{box-shadow: 0 0 0 5px '.$bullet_bg.' inset;}';
$shortcode_css .= '#'.$zolo_image_slider_id.'.zolo_image_slider.dots_style3 ul.slick-dots li button::after{ background:'.$bullet_bg.';}';


if($slick_item_shadow == 'yes'){
$shortcode_css .= '#'.$zolo_image_slider_id.'.zolo_image_slider .slick-slide img{box-shadow:0 12px 75px rgba(0, 0, 0, 0.35);}';
}

if($style == 'slider_style6'){

}

apcore_save_plugin_dyn_styles( $shortcode_css ); ?>
