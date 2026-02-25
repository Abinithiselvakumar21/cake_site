<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
$el_class = $output = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$uniqid = 'apress_timeline_items_wrap_'.uniqid(rand());

$output .= '<div id="'.$uniqid.'" class="apress_timeline_items_wrap">';

$output .= '<div class="apress_timeline_items_slider">';
$output .= do_shortcode($content);
$output .= '</div>';

$output .= '<div class="apress_timeline_nav_wrap"><div class="zolo-container"><div class="apress_timeline_nav"></div></div></div>';

$output .= '</div>';

print $output;

$shortcode_css = '';
$shortcode_css .= '#'.$uniqid.'.apress_timeline_items_wrap .apress_timeline_nav .apress_timeline_thumb{color:'.$pagination_color.';}';
$shortcode_css .= '#'.$uniqid.'.apress_timeline_items_wrap button::after{color:'.$pagination_color.';}';
$shortcode_css .= '#'.$uniqid.'.apress_timeline_items_wrap .apress_timeline_nav .slick-track > li::after{background-color:'.$pagination_color.';}';



apcore_save_plugin_dyn_styles( $shortcode_css );

?>
<script type="text/javascript">
  jQuery(document).ready(function($){
	$(".apress_timeline_items_wrap").each( function (){
		$( "div.apress_timeline_nav_item" , this ).appendTo( $( ".apress_timeline_nav" , this ) );
	} );
  });
</script>
<script type="text/javascript">
	var j$ = jQuery;
	j$.noConflict();
	"use strict";
	j$(function() {
		if(j$("body").hasClass("rtl")){ var rtlvar = true }else{ var rtlvar = false }
	j$(".apress_timeline_items_slider").slick({
				  infinite: true,
				  rtl: rtlvar,
				  fade: true,
				  speed: 1500,
				  adaptiveHeight: true,
				  //cssEase: 'linear',
				  cssEase: 'cubic-bezier(0.68, -0.4, 0.27, 1.34) 0.2s',
				  dots: false,
				  arrows: false,
				  slidesToShow: 1,
				  slidesToScroll: 1,
				});
				
				
	j$('.apress_timeline_nav').slick({
	  infinite:true,
	  slidesToShow:5,
	  slidesToScroll:1,
	  initialSlide:0,
	  vertical:true,
	  asNavFor: '.apress_timeline_items_slider',
	  dots: false,
	  //centerMode: true,
	  centerPadding: '10px',
	  focusOnSelect: true,
	  
	  responsive: [
				{
				  breakpoint: 1050,
				  settings: {
					slidesToShow:3,
					slidesToScroll: 1,
				  }
				},
				{
				  breakpoint: 800,
				  settings: {
				  slidesToShow:1,
				  slidesToScroll: 1,
				  }
				},
			  ]
	  
	});
				
				
		});
	</script>


