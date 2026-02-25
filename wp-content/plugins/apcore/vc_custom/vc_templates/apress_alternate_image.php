<?php 
/*-----------------------------------------------------------------------------------*/
/* Alternate Image
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }

	extract(shortcode_atts(array(
		'image' 					=>'',
		'image2' 					=>'',
		'box_link' 					=>'',
		'image_hover_effects'		=>'no',
		'box_shadow'				=>'box_shadow_enable:disable|shadow_horizontal:7|shadow_vertical:5|shadow_blur:30|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',	
		'borderradius' 				=>'0',
		'animation_type'			=>'default',
		'clipping_animation_type'	=>'clipping_left_to_right',
		'clipping_color'			=>'#f2f2f2',
		'class' 					=>'',
		'data_animation'			=>'No Animation',
		'data_delay'				=>'500',
	), $atts));
		
		//Animation
		if($animation_type == 'clipping'){
			
			$animatedclass = 'clipping animated clipping-hide apcore-clipping-animation';
			$data_animation_value = $clipping_animation_type;
		
		}else{
			
			if($data_animation == 'No Animation'){
				$animatedclass = 'noanimation';
			}else{
				$animatedclass = 'animated hiding';
				}
			$data_animation_value = $data_animation;
			
			}
		
		$uniqid = uniqid(rand());
		$alternate_image_id = 'zolo_alternate_image_'.$uniqid;
		
		$img = wp_get_attachment_image_src($image,'full');
		if(!empty($img)){
			$image = $img[0];
		}
		$image_alt = get_post_meta($image, '_wp_attachment_image_alt', true);
		
		$img = wp_get_attachment_image_src($image2,'full');
		if(!empty($img)){
			$image2 = $img[0];
		}
		$image_alt2 = get_post_meta($image2, '_wp_attachment_image_alt', true);
		//link
		$box_link = vc_build_link( $box_link );
		
		if($image_hover_effects == 'yes'){
			$image_hover_effects_class = 'zolo_alternate_image_animation2';
			}else{
				$image_hover_effects_class = 'zolo_alternate_image_animation1';
				}

echo '<script type="text/javascript" charset="utf-8">
var j$ = jQuery;
	j$.noConflict();
	"use strict";
	j$(document).on("ready", function() {
j$("#'.$alternate_image_id.' .zolo_alternate_image_animation1").hover(
   function () {
	  j$("#'.$alternate_image_id.' img.alternate_image1").fadeOut("slow");
	  j$("#'.$alternate_image_id.' img.alternate_image2").fadeIn("slow");
   }, 
   function () {
	  j$("#'.$alternate_image_id.' img.alternate_image1").fadeIn("slow");
	  j$("#'.$alternate_image_id.' img.alternate_image2").fadeOut("slow");
   }
);
});
j$( window ).load(function() {
	var zolo_alternate_imageHeight = j$("#'.$alternate_image_id.' .zolo_alternate_image .alternate_image1").outerHeight();
	var zolo_alternate_imageWidth = j$("#'.$alternate_image_id.' .zolo_alternate_image .alternate_image1").outerWidth();
	j$("#'.$alternate_image_id.' .zolo_alternate_image").height(zolo_alternate_imageHeight);
	j$("#'.$alternate_image_id.' .zolo_alternate_image").width(zolo_alternate_imageWidth);
});

</script>';
?>

<!--zolo Image Box Row Start-->

<div id="<?php echo $alternate_image_id;?>" class="zolo_alternate_image_wrap <?php echo $class.' '.$animatedclass;?>" data-animation ="<?php echo $data_animation_value; ?>" data-delay ="<?php echo $data_delay;?>">
	
    <div class="zolo_alternate_image <?php echo $image_hover_effects_class;?>">
    <?php if (!empty($box_link['url'])) {?>
    <a title="<?php echo esc_attr( $box_link['title'] );?>" href="<?php echo esc_attr( $box_link['url'] );?>" target="<?php echo ( strlen( $box_link['target'] ) > 0 ? esc_attr( $box_link['target'] ) : '_self' )?>" rel="<?php if( isset( $box_link['rel'] ) && $box_link['rel'] !== '' ) { echo esc_attr($box_link['rel']); }else{ echo  '';} ?>">
    <?php }?>
    	<?php if(!empty($image)){ echo '<img class="alternate_image1" src="'.$image.'" alt="'.$image_alt.'"/>'; }?>
        <?php if(!empty($image2)){ echo '<img class="alternate_image2" src="'.$image2.'" alt="'.$image_alt2.'"/>'; }?>
        <?php if (!empty($box_link['url'])) {?></a><?php }?>
  	</div>
</div>

<?php
$style = '';
if(substr_count($box_shadow, 'disable') == 0) {
	$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
	$style .= '#'.$alternate_image_id.' .zolo_alternate_image{'.$box_shadow.'}';
}
$style .= '#'.$alternate_image_id.' .zolo_alternate_image{border-radius:'.$borderradius.'px;-moz-border-radius:'.$borderradius.'px;-webkit-border-radius:'.$borderradius.'px;}';
$style .= '#'.$alternate_image_id.' .apcore-clipping-overlay{ background:'.$clipping_color.'}';

apcore_save_plugin_dyn_styles( $style );

			
