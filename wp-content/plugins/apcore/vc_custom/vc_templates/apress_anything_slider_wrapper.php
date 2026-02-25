<?php 
/*-----------------------------------------------------------------------------------*/
/* Anything Slider Wrapper
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
$el_class = $output = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

extract( $atts );
$uniqid = uniqid(rand());
$apress_anything_slider_class = 'apress_anything_slider_wrapper_'.$uniqid;

$slidertitle_html = $slick_numbered_pagination_class  = '';
if($slick_numbered_pagination == 'yes'){$slick_numbered_pagination_class = 'slick_numbered_pagination_active';}	

if($data_animation == 'No Animation'){
	$animatedclass = 'noanimation';
}else{
	$animatedclass = 'animated hiding';
	}

$wrap_class = array();
$wrap_class[] = $apress_anything_slider_class. ' apress_anything_slider_wrapper '.$el_class.' '.$animatedclass;
$wrap_class[] = $slider_type;
$wrap_class[] = $style;
$wrap_class[] = $slick_numbered_pagination_class;
if($navigation_appear_on_hover == 'yes'){
$wrap_class[] = 'navigation_appear_on_hover';
}

if($style == 'style1'){
$wrap_class[] = $navigation_arrow_position;
}

$wrap_class = implode( ' ', $wrap_class );

	$slidertype = ($slider_type == 'vertical')? 'true' : 'false';
	$slidesToShow_variable = 'slidesToShow: '.$desktop_no_of_items.',';
	$slidesToShow_small_desktop_no_of_items = 'slidesToShow: '.$small_desktop_no_of_items.',';
	$slidesToShow_tablet_no_of_items = 'slidesToShow: '.$tablet_no_of_items.',';
	$slidesToShow_mobile_no_of_items = 'slidesToShow: '.$mobile_no_of_items.',';	
	 
	$slidesToScroll_desktop_no_of_items_scroll = 'slidesToScroll: '.$desktop_no_of_items_scroll.',';
	$slidesToScroll_small_desktop_no_of_items_scroll = 'slidesToScroll: '.$small_desktop_no_of_items_scroll.',';
	$slidesToScroll_tablet_no_of_items_scroll = 'slidesToScroll: '.$tablet_no_of_items_scroll.',';	
	$slidesToScroll_mobile_no_of_items_scroll = 'slidesToScroll: '.$mobile_no_of_items_scroll.',';	
	
	$slick_autoplay = ($slick_autoplay == 'yes')? 'true' : 'false';
	$slick_autoplay_duration = $slick_autoplay_duration;
	$slick_hidearrow_navigation = ($slick_hide_arrow_navigation == 'yes')? 'true' : 'false';
	
	
	$slickbullet_navigation = ($slick_bullet_navigation == 'yes' || $slick_numbered_pagination == 'yes')? 'true' : 'false';
	
	$slick_arrow_true_class = ($slick_hide_arrow_navigation == 'yes')? 'slick_arrow_true' : 'slick_arrow_false';
	$slick_bullet_true_class = ($slick_bullet_navigation == 'yes')? 'slick_bullet_true' : 'slick_bullet_false';
	
	if( $slider_type == 'vertical' ){ $slidernavigation_position = $slider_navigation_position; }else{ $slidernavigation_position = ''; }
	
	
	if (!empty($slider_title)) {
		$heading_options = _zolo_parse_text_shortcode_params($heading_font_options, '', $heading_google_fonts, $heading_custom_fonts);
		$slidertitle_html .= '<' . $heading_options['tag'] . ' class="zolo_anything_slider_title" ' . $heading_options['style'] . '>' . esc_html($slider_title) . '</' . $heading_options['tag'] . '>';
	}
	//echo $heading_options['tag'];

?>

<div class="<?php echo $wrap_class;?>" data-animation ="<?php echo $data_animation; ?>" data-delay ="<?php echo $data_delay;?>">


<?php if($style == 'style2'){?>
<div class="apress_anything_slider_style2_wrap">
<div class="apress_anything_slider_content">
<?php 

echo $slidertitle_html;

if (!empty($slider_description)) {
	echo '<span class="zolo-slider_description">'.$slider_description.'</span>';
}
?>
</div>
<div class="apress_anything_slider_style2_slider_area">
<?php }?>

<div class="apress_anything_slider apress_slick_slider <?php echo 'apress_anything_slider_'.$uniqid.' '.$bullet_navigation_style.' '.$arrows_style.' '.$slidernavigation_position.' '.$slick_arrow_true_class.' '.$slick_bullet_true_class;?>"><?php echo do_shortcode($content);?> </div>

<?php if($style == 'style2'){?>
</div></div>
<?php }?>

<?php if($slick_numbered_pagination == 'yes'){echo '<span class="apress_anything_slider_paging_info" style="color:'.$slick_numbered_pagination_color.';text-align:'.$numbered_pagination_alignment.';"></span>';}?>

</div>

<?php echo '<script type="text/javascript">
	var j$ = jQuery;
	j$.noConflict();
	"use strict";
	j$(document).on("ready", function() {
		
	if(j$("body").hasClass("rtl")){ var rtlvar = true }else{ var rtlvar = false }
		
	var $status = j$(".'.$apress_anything_slider_class.' .apress_anything_slider_paging_info");	

	j$(".apress_anything_slider_'.$uniqid.'").on("init reInit afterChange", function (event, slick, currentSlide, nextSlide) {
		if(!slick.$dots){
			return;
		}  
		var i = (currentSlide ? currentSlide : 0) + 1;
			$status.text(i + "/" + (slick.$dots[0].children.length));
	});

j$(".apress_anything_slider_'.$uniqid.'").slick({
		  dots: '.$slickbullet_navigation.',
		  infinite: true,
		  vertical: '.$slidertype.',
		  speed: 900,
		  rtl: rtlvar,
		  autoplay: '.$slick_autoplay.',
  		  autoplaySpeed:'.$slick_autoplay_duration.',
		  arrows: '.$slick_hidearrow_navigation.',
		  '.$slidesToShow_variable.$slidesToScroll_desktop_no_of_items_scroll.'
		  
		  responsive: [
			{
			  breakpoint: 1050,
			  settings: {
				'.$slidesToShow_small_desktop_no_of_items.$slidesToScroll_small_desktop_no_of_items_scroll.'
			  }
			},
			{
			  breakpoint: 800,
			  settings: {
			  '.$slidesToShow_tablet_no_of_items.$slidesToScroll_tablet_no_of_items_scroll.'
			  }
			},
			{
			  breakpoint: 450,
			  settings: {
				  '.$slidesToShow_mobile_no_of_items.$slidesToScroll_mobile_no_of_items_scroll.'
			  }
			},
			
		  ]
		});
	});
	</script>';

// CSS
$shortcode_css = '';

if(isset($heading_responsive) && $heading_responsive != '') {
$shortcode_css .= Zolo_Resposive_Text_Param::responsive_css($heading_responsive, '.' . esc_js($apress_anything_slider_class) . ' .zolo_anything_slider_title');
	}
	
$shortcode_css .= '.'.$apress_anything_slider_class.' .apress_slick_slider .slick-arrow{ color:'.$arrows_color.'}';
$shortcode_css .= '.'.$apress_anything_slider_class.' .apress_slick_slider .slick-arrow:after{ background:'.$arrows_color.'}';
$shortcode_css .= '.'.$apress_anything_slider_class.' .apress_slick_slider.arrows_style4 .slick-arrow.slick-next:before{border-color: transparent transparent transparent '.$arrows_color.';}';
$shortcode_css .= '.'.$apress_anything_slider_class.' .apress_slick_slider.arrows_style4 .slick-arrow.slick-prev:before{border-color: transparent '.$arrows_color.' transparent transparent;}';
if($arrows_style == 'arrows_style2' || $arrows_style == 'arrows_style3'){
$shortcode_css .= '.'.$apress_anything_slider_class.' .apress_slick_slider .slick-arrow{ background:'.$arrows_bg.'}';
}

$shortcode_css .= '.'.$apress_anything_slider_class.' .apress_slick_slider ul.slick-dots li.slick-active button:after{ box-shadow:inset 0 0 0 1px '.$bullet_bg.';}';
$shortcode_css .= '.'.$apress_anything_slider_class.' .apress_slick_slider ul.slick-dots li button::after{box-shadow: 0 0 0 5px '.$bullet_bg.' inset;}';
$shortcode_css .= '.'.$apress_anything_slider_class.' .apress_slick_slider.dots_style3 ul.slick-dots li button::after{ background:'.$bullet_bg.';}';

$shortcode_css .= '.'.$apress_anything_slider_class.' .apress_slick_slider .slick-list .slick-track > div{margin:0 '.$slider_gutter.'px;}';
$shortcode_css .= '.'.$apress_anything_slider_class.' .apress_slick_slider .slick-list{margin:0 -'.$slider_gutter.'px;}';

$shortcode_css .= '.'.$apress_anything_slider_class.' .apress_slick_slider.slick-vertical .slick-list .slick-track > div{padding:'.$slider_gutter.'px 0;}';
$shortcode_css .= '.'.$apress_anything_slider_class.' .apress_slick_slider.slick-vertical .slick-list{margin:-'.$slider_gutter.'px 0;}';

if($style == 'style1'){

if ( ! empty( $navigation_arrow_top_offset ) ) {
$shortcode_css .= '.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper.arrow_position_topleft .apress_anything_slider .slick-arrow.slick-next,
.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper.arrow_position_topleft .apress_anything_slider .slick-arrow,
.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper.arrow_position_topright .apress_anything_slider .slick-arrow.slick-next,
.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper.arrow_position_topright .apress_anything_slider .slick-arrow{ top:'.$navigation_arrow_top_offset.'px;}';
}
if ( ! empty( $navigation_arrow_right_offset ) ) {
$topright_prev_value = $navigation_arrow_right_offset + '52';
$shortcode_css .= '.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper.arrow_position_topright .apress_anything_slider .slick-arrow{ right:'.$topright_prev_value.'px;}';
$shortcode_css .= '.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper.arrow_position_topright .apress_anything_slider .slick-arrow.slick-next{ right:'.$navigation_arrow_right_offset.'px;}';
}
if ( ! empty( $navigation_arrow_left_offset ) ) {
$topleft_prev_value = $navigation_arrow_left_offset + 52;
$shortcode_css .= '.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper.arrow_position_topleft .apress_anything_slider .slick-arrow.slick-next{ left:'.$topleft_prev_value.'px;}';
$shortcode_css .= '.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper.arrow_position_topleft .apress_anything_slider .slick-arrow{ left:'.$navigation_arrow_left_offset.'px;}';
}

if($slick_overflow_visible2 == 'yes'){
$shortcode_css .= '.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper .slick-list{margin-right: -500px;}';
$shortcode_css .= '@media (max-width:1450px) {.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper .slick-list{margin-right: -240px;}}';
$shortcode_css .= '@media (max-width:1050px) {.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper .slick-list{margin-right: 0px;}}';

}

$shortcode_css .= '@media (max-width:767px) {
.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper.arrow_position_topleft .apress_anything_slider .slick-arrow.slick-next,
.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper.arrow_position_topleft .apress_anything_slider .slick-arrow,
.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper.arrow_position_topright .apress_anything_slider .slick-arrow.slick-next,
.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper.arrow_position_topright .apress_anything_slider .slick-arrow{ top:20px;}

.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper.arrow_position_topleft .apress_anything_slider .slick-arrow.slick-next{ left:52px;}
.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper.arrow_position_topleft .apress_anything_slider .slick-arrow{ left:0px;}

.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper.arrow_position_topright .apress_anything_slider .slick-arrow{ left:0px;}
.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper.arrow_position_topright .apress_anything_slider .slick-arrow.slick-next{ left:52px;}

.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper.arrow_position_topright .apress_anything_slider.arrows_style4 .slick-arrow {top:5px;}


}';



}

if($style == 'style2'){
$shortcode_css .= '.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper .zolo-slider_description,
.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper .zolo-slider_description h1,
.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper .zolo-slider_description h2,
.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper .zolo-slider_description h3,
.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper .zolo-slider_description h4,
.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper .zolo-slider_description h5,
.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper .zolo-slider_description h6,
.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper .zolo-slider_description p{ color:'.$slider_description_color.';}';

if($slick_overflow_visible == 'yes'){
$shortcode_css .= '.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper .apress_anything_slider{margin-right: -500px;}';
$shortcode_css .= '@media (max-width:1450px) {.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper .apress_anything_slider{margin-right: -240px;}}';
$shortcode_css .= '@media (max-width:1050px) {.'.$apress_anything_slider_class.'.apress_anything_slider_wrapper .apress_anything_slider{margin-right: 0px;}}';

}

}

apcore_save_plugin_dyn_styles( $shortcode_css ); ?>