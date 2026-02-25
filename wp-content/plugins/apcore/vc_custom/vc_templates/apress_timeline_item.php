<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract( shortcode_atts( array(
	'image'					=> '',
	'timeline_slider_thumb' => '',
	'timeline_title' 		=> '',
	'timeline_subtitle' 	=> '',
	'timeline_description' 	=> '',
	'images'				=> '',
	'el_class'				=> '',
	'title_font_options'	=> '',
	'title_google_fonts'	=> '',
	'title_custom_fonts'	=> '',
	'subtitle_font_options'	=> '',
	'subtitle_google_fonts'	=> '',
	'subtitle_custom_fonts'	=> '',
	'description_font_options'	=> '',
	'description_google_fonts'	=> '',
	'description_custom_fonts'	=> '',
	'title_responsive'			=> '',
	'subtitle_responsive'		=> '',
	
	
), $atts ) );

$img = wp_get_attachment_image_src($image,'full');
if(!empty($img)){
$image = $img[0];
}

$img_size = 'full';
$thumbnail = $awards_images = '';
$images = explode( ',', $images );

foreach ( $images as $i => $galleryimage ) {
	
	if ( $galleryimage > 0 ) {
		$img = wpb_getImageBySize( array(
			'attach_id' => $galleryimage,
			'thumb_size' => $img_size,
		) );
		$thumbnail = $img['thumbnail'];
	}
	$awards_images .= '<li><div>'. $thumbnail .'</div></li>';
}

$uniqid = uniqid(rand());
$apress_id = 'apress_timeline_item_id_'.$uniqid;

$title_options = _zolo_parse_text_shortcode_params($title_font_options, '', $title_google_fonts, $title_custom_fonts);
$subtitle_options = _zolo_parse_text_shortcode_params($subtitle_font_options, '', $subtitle_google_fonts, $subtitle_custom_fonts);
$description_options = _zolo_parse_text_shortcode_params($description_font_options, '', $description_google_fonts, $description_custom_fonts);
?>

<div id="<?php echo $apress_id;?>" class="<?php echo 'apress_timeline_item '.$el_class;?>" data-year="<?php echo $timeline_slider_thumb;?>" data-thmltag="h6">
  <div class="apress_timeline_nav_item"><?php echo '<span class="apress_timeline_thumb">'.$timeline_slider_thumb.'</span>'?></div>
  <div class="apress_timeline_item_bg" style="background: url(<?php echo $image;?>) no-repeat center center;"></div>
  <div class="apress_timeline_content_wrap">
    <div class="zolo-container">
      <div class="apress_timeline_item_content_box">
        <div class="apress_timeline_item_content"> <?php echo '<'.$title_options['tag'].' class="apress_timeline_title" '.$title_options['style'].'>'.$timeline_title.'</'.$title_options['tag'].'>'?> <?php echo '<'.$subtitle_options['tag'].' class="apress_timeline_sub_title" '.$subtitle_options['style'].'>'.$timeline_subtitle.'</'.$subtitle_options['tag'].'>'?> <?php echo '<div class="apress_timeline_description" '.$description_options['style'].'>'.$timeline_description.'</div>'?> </div>
        <?php if($thumbnail != ''){?>
        <ul class="apress_timeline_awards">
          <?php echo $awards_images;?>
        </ul>
        <?php }?>
      </div>
    </div>
  </div>
</div>

<?php 
$shortcode_css = '';

if(isset($title_responsive) && $title_responsive != '') {
	$shortcode_css .= Zolo_Resposive_Text_Param::responsive_css($title_responsive, '#' . esc_js($apress_id) . ' .apress_timeline_title');
	}
if(isset($subtitle_responsive) && $subtitle_responsive != '') {
	$shortcode_css .= Zolo_Resposive_Text_Param::responsive_css($subtitle_responsive, '#' . esc_js($apress_id) . ' .apress_timeline_sub_title');
}

apcore_save_plugin_dyn_styles( $shortcode_css );
	
?>