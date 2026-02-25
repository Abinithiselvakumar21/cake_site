<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract( shortcode_atts( array(
	'image'					=> '',
	'img_size' 				=> 'full',
	'offset_x' 				=> '0%',
	'offset_y' 				=> '0%',
	'image_shadow' 			=> '',
	'border_radius' 		=> '0',  
	'class'					=> '',
	'data_animation'		=> 'No Animation',
	'data_delay'			=> '500',
), $atts ) );

	//Animation
	if($data_animation == 'No Animation'){
		$animatedclass = 'noanimation';
	}else{
		$animatedclass = 'animated hiding';
	}

	$img = wpb_getImageBySize( array(
		'attach_id' => $image,
		'thumb_size' => $img_size,
	) );
	$thumbnail = $img['thumbnail'];

$uniqid = uniqid(rand());
$cascading_image_id = 'apress_cascading_image_id_'.$uniqid;

$wrapperClass = 'apress_cascading_image';

if(!empty($thumbnail)){
?>
<div id="<?php echo $cascading_image_id;?>" class="<?php echo $wrapperClass.' '.$class;?>">
  <div class="apress_cascading_inner_wrap">
    <div class="apress_cascading_image_box <?php echo $animatedclass;?>" data-animation ="<?php echo $data_animation; ?>" data-delay ="<?php echo $data_delay;?>"> <?php echo $thumbnail;?> </div>
  </div>
</div>

<?php
}
$shortcode_css = '';

if(substr_count($image_shadow, 'disable') == 0) {
	$image_shadow = Zolo_Box_Shadow_Param::box_shadow_css($image_shadow);
	$shortcode_css .= '#'.$cascading_image_id.'.apress_cascading_image .apress_cascading_image_box{'.$image_shadow.'}';
}

$shortcode_css .= '#'.$cascading_image_id.'.apress_cascading_image .apress_cascading_image_box{border-radius:'.$border_radius.'px;overflow: hidden;}';

$shortcode_css .= '#'.$cascading_image_id.'.apress_cascading_image .apress_cascading_image_box{transform: translateX('.$offset_x.') translateY('.$offset_y.');-moz-transform: translateX('.$offset_x.') translateY('.$offset_y.');-webkit-transform: translateX('.$offset_x.') translateY('.$offset_y.');-ms-transform: translateX('.$offset_x.') translateY('.$offset_y.');-o-transform: translateX('.$offset_x.') translateY('.$offset_y.');}';


apcore_save_plugin_dyn_styles( $shortcode_css ); ?>
