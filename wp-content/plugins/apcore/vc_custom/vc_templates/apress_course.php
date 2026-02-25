

<?php 
/*-----------------------------------------------------------------------------------*/
/* Course
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract( shortcode_atts( array(
	'course_style'				=> 'style1',
	'course_image'				=> '',
	'course_title'				=> 'Your Title',
	'course_features'			=> 'Best',
	'course_description'		=> '<p>Your Description Eos movet legimus euripidis ea. Cu eos minim aeque interpretaris, vel te eirmod dissentiet, homero utroque ut mea.</p>',
	'course_student'			=> '28 Students',
	'course_price'				=> '$99',
	'course_align'				=> 'left',
	'box_link'					=> '',	
	'box_swing'					=>'no',
	'course_bg_color'			=> '#ffffff',
	'course_bor_color'			=> '#9f9f9f',
	'box_top_padding'			=> '45px',
	'box_right_padding'			=> '45px',
	'box_bottom_padding'		=> '40px',
	'box_left_padding'			=> '45px',
	'box_border_radius'			=> '0',
	'box_shadow'				=> 'box_shadow_enable:enable|shadow_horizontal:0|shadow_vertical:2|shadow_blur:10|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.08)',
	'box_hover_shadow'			=> 'box_shadow_enable:enable|shadow_horizontal:0|shadow_vertical:7|shadow_blur:90|shadow_spread:-38|box_shadow_color:rgba(0%2C0%2C0%2C0.3)',
	'course_features_bg_color'	=> '#b0b5ae',
	'course_features_color'		=> '#ffffff',
	'course_description_color'	=> '#777777',
	'course_box_footer_bg_color'=> '#e7e9e7',
	'course_box_footer_color'	=> '#777777',
	'title_font_options'		=> '',
	'title_google_fonts'		=> '',
	'title_custom_fonts'		=> '',
	'title_responsive'			=> '',	
	'data_animation'			=> 'No Animation',
	'data_delay'				=> '500',
	'class'						=> '',
	
), $atts ) );
	
	$attributes = array();
	
	//Animation
	if($data_animation == 'No Animation'){
		$animatedclass = 'noanimation';
	}else{
		$animatedclass = 'animated hiding';
	}

$course_image_align_class = $title_html = $transform_scale_class = '';

//parse link
$box_link = ( '||' === $box_link ) ? '' : $box_link;
$box_link = vc_build_link( $box_link );
$use_box_link = false;
if ( strlen( $box_link['url'] ) > 0 ) {
	$use_box_link = true;
	$a_href = $box_link['url'];
	$a_title = $box_link['title'];
	$a_target = $box_link['target'];
	$a_rel = $box_link['rel'];
}

if ( $use_box_link ) {
	$attributes[] = 'href="' . trim( $a_href ) . '"';
	$attributes[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
	if ( ! empty( $a_target ) ) {
		$attributes[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
	}
	if ( ! empty( $a_rel ) ) {
		$attributes[] = 'rel="' . esc_attr( trim( $a_rel ) ) . '"';
	}
}
$attributes = implode( ' ', $attributes );

if ( $use_box_link ) {
		$link_start =  '<a ' . $attributes . '>';
		$link_end =  '</a>';
	}else{
		$link_start =  '';
		$link_end =  '';
		}

$img = wp_get_attachment_image_src($course_image,'full');
if ( ! empty( $img ) ) {
$course_image_url = $img[0];
}

$uniqid = uniqid(rand());
$zolo_course_id = 'zolo_course_'.$uniqid;


$wrap_class = array();
$wrap_class[] = $zolo_course_id. ' zolo_course_wrap '.$class.' '.$course_style.' '.$animatedclass;
$wrap_class = implode( ' ', $wrap_class );

if (!empty($course_title)) {
	$title_options = _zolo_parse_text_shortcode_params($title_font_options, '', $title_google_fonts, $title_custom_fonts);
	$title_html .= $link_start.'<'.$title_options['tag'].' class="course_title" ' . $title_options['style'] . '>' . $course_title .'</'.$title_options['tag'].'>'.$link_end;
}
?>

<?php if($box_swing == 'yes'){echo '<div class="zolo_box_swing zolo_box_swing10px">';}?>
<div class="<?php echo $wrap_class;?>" data-animation="<?php echo $data_animation; ?>" data-delay="<?php echo $data_delay;?>">
<div class="zolo_course">
   
  <?php //Image Code
  if(! empty( $course_image_url )){
		  echo '<div class="zolo_course_thumbnail">';
		  echo '<img src="'.$course_image_url.'" class="zolo_course_thumbnail_img"/> ';
		  	if(! empty( $course_features )){echo '<span class="zolo_course_features">'.$course_features.'</span>';}

		  echo '</div>';
	  }?>
  
  <div class="course_content">
  <div class="course_content_top">
    <div class="zolo_course_head"><?php echo $title_html;?></div>
    
    <?php if(! empty(rawurldecode( base64_decode( wp_strip_all_tags( $course_description ) ) ))){echo '<div class="course_description">'.rawurldecode( base64_decode( wp_strip_all_tags( $course_description ) ) ).'</div>';}?>
    </div>
    
    <?php if(! empty($course_student) || ! empty($course_price)){
    echo '<div class="course_info_wrap"> 
    <ul class="course_info">';
	if(! empty($course_student)){echo '<li class="zolo_course_student"><span class="ap-users"></span> '.$course_student.'</li>';}
    if(! empty($course_price)){echo '<li class="zolo_course_price">'.$course_price.'</li>';}
    echo '</ul></div>';
    }?>
    
  </div>
  
</div>
</div>
<?php if($box_swing == 'yes'){echo '</div>';}?>

<?php
if(substr_count($box_shadow, 'disable') == 0) {
	$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
}
if(substr_count($box_hover_shadow, 'disable') == 0) {
	$box_hover_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_hover_shadow);
}

$shortcode_css = '';

if(isset($title_responsive) && $title_responsive != '') {
$shortcode_css .= Zolo_Resposive_Text_Param::responsive_css($title_responsive, '.' . esc_js($zolo_course_id) . ' .zolo_course .course_title');
	}
$shortcode_css .= '.'.$zolo_course_id.' .zolo_course{'.$box_shadow.'}';
$shortcode_css .= '.'.$zolo_course_id.' .zolo_course:hover{'.$box_hover_shadow.'}';
if($course_bor_color != ''){
$shortcode_css .= '.'.$zolo_course_id.' .zolo_course{border:1px solid '.$course_bor_color.';}';
}
if($box_border_radius != ''){
$shortcode_css .= '.'.$zolo_course_id.' .zolo_course{border-radius:'.$box_border_radius.'px;}';
$shortcode_css .= '.'.$zolo_course_id.' .zolo_course .zolo_course_thumbnail,
.'.$zolo_course_id.' .zolo_course .zolo_course_thumbnail img{border-radius:'.$box_border_radius.'px '.$box_border_radius.'px 0px 0px;}';
$shortcode_css .= '.'.$zolo_course_id.' .zolo_course .course_info_wrap{border-radius:0px 0px '.$box_border_radius.'px '.$box_border_radius.'px;}';
}
$shortcode_css .= '.'.$zolo_course_id.' .zolo_course .course_info_wrap{padding:15px '.$box_right_padding.' 15px '.$box_left_padding.';}';
$shortcode_css .= '.'.$zolo_course_id.' .course_content_top{padding:'.$box_top_padding.' '.$box_right_padding.' '.$box_bottom_padding.' '.$box_left_padding.';}';
$shortcode_css .= '.'.$zolo_course_id.' .zolo_course{ background:'.$course_bg_color.';text-align:'.$course_align.';}';

$shortcode_css .= '.'.$zolo_course_id.' .zolo_course .zolo_course_features{ background:'.$course_features_bg_color.';color:'.$course_features_color.';}';

$shortcode_css .= '.'.$zolo_course_id.' .course_description,
.'.$zolo_course_id.' .course_description p{color:'.$course_description_color.';}';

$shortcode_css .= '.'.$zolo_course_id.' .course_info_wrap{background:'.$course_box_footer_bg_color.';color:'.$course_box_footer_color.';}';


apcore_save_plugin_dyn_styles( $shortcode_css );