<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract( shortcode_atts( array(
	'tab_title' 			=> '',
	'tab_content' 			=> '',
	'image'					=> '',
	'img_size' 				=> 'full',
	'image_shadow' 			=> '',
	'title_font_options'	=> '',
	'title_google_fonts'	=> '',
	'title_custom_fonts'	=> '',
	'content_font_options'	=> '',
	'content_google_fonts'	=> '',
	'content_custom_fonts'	=> '',
	'title_responsive'		=> '',
), $atts ) );

$img = wpb_getImageBySize( array(
	'attach_id' => $image,
	'thumb_size' => $img_size,
) );
$thumbnail = $img['thumbnail'];

$uniqid = uniqid(rand());
$info_tab_id = 'info_tab_id_'.$uniqid;

$title_options = _zolo_parse_text_shortcode_params($title_font_options, 'zolo_info_list_title', $title_google_fonts, $title_custom_fonts);
$content_options = _zolo_parse_text_shortcode_params($content_font_options, 'zolo_info_list_content', $content_google_fonts, $content_custom_fonts);
?>

<div id="<?php echo $info_tab_id;?>">
<li class="tab col-md-4">
<a href="#<?php echo $info_tab_id;?>">
<?php if(!empty($tab_title)){
echo '<h4 class="zolo_info_tab_title" '.$title_options['style'].'>'.$tab_title.'</h4>';
}?>
<?php if(!empty($tab_content)){
echo '<p class="zolo_info_tab_content" '.$content_options['style'].'>'.$tab_content.'</p>';
}?>
</a>
</li>
<div class="zolo_tab_image_container"> <?php echo $thumbnail;?> </div>
</div>

<?php
$shortcode_css = '';

if(substr_count($image_shadow, 'disable') == 0) {
	$image_shadow = Zolo_Box_Shadow_Param::box_shadow_css($image_shadow);
	$shortcode_css .= '#'.$info_tab_id.' .zolo_tab_image_container img{'.$image_shadow.'}';
}

//$shortcode_css .= '#'.$info_tab_id.'.apress_cascading_image img{border-radius:'.$border_radius.'px;}';


apcore_save_plugin_dyn_styles( $shortcode_css ); ?>
