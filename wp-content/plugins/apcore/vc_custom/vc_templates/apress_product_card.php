

<?php 
/*-----------------------------------------------------------------------------------*/
/* Process
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract( shortcode_atts( array(
	'product_card_style'				=> 'style1',
	'product_card_image'				=> '',
	'product_card_image_align'			=> 'left',
	'transform_scale'					=> 'no',
	'product_card_title'				=> 'Your Title',
	'product_card_price'				=> '$2999',
	'product_card_description'			=> 'Your Description Eos movet legimus euripidis ea. Cu eos minim aeque interpretaris, vel te eirmod dissentiet, homero utroque ut mea.',
	'product_card_features'				=> '<ul class="product_card_info">
<li><span class="ap-basic_lightbulb"></span> Diesel</li>
<li><span class="ap-basic_lightbulb"></span> 30</li>
<li><span class="ap-basic_lightbulb"></span> 1st-owner </li>
<li><span class="ap-basic_lightbulb"></span> Blue</li>
</ul>',
	'product_card_align'				=> 'left',
	'box_link'							=> '',	
	'box_swing'							=>'no',
	'min_height'						=> '500',
	'box_border_radius'					=> '0',
	'product_card_bg_color'				=> '#ffffff',
	'box_top_padding'					=> '45px',
	'box_right_padding'					=> '45px',
	'box_bottom_padding'				=> '40px',
	'box_left_padding'					=> '45px',
	'box_shadow'						=> 'box_shadow_enable:enable|shadow_horizontal:0|shadow_vertical:2|shadow_blur:10|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.08)',
	'box_hover_shadow'					=> 'box_shadow_enable:enable|shadow_horizontal:0|shadow_vertical:7|shadow_blur:90|shadow_spread:-38|box_shadow_color:rgba(0%2C0%2C0%2C0.3)',
	'product_card_img_bg_color'			=> '#e7e9e7',
	'product_card_img_bg_color_h'		=> '#b0b5ae',
	'product_card_price_bg_color'		=> '#b0b5ae',
	'product_card_price_color'			=> '#ffffff',
	'product_card_description_color'	=> '#777777',
	'product_card_features_bg_color'	=> '#e7e9e7',
	'product_card_features_color'		=> '#777777',
	'product_card_features_icon_color'	=> '#777777',
	'title_font_options'				=> '',
	'title_google_fonts'				=> '',
	'title_custom_fonts'				=> '',
	'title_responsive'					=> '',	
	'data_animation'					=> 'No Animation',
	'data_delay'						=> '500',
	'class'								=> '',
	
), $atts ) );
	
	$attributes = array();
	
	//Animation
	if($data_animation == 'No Animation'){
		$animatedclass = 'noanimation';
	}else{
		$animatedclass = 'animated hiding';
	}

$product_card_image_align_class = $title_html = $transform_scale_class = '';

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

$img = wp_get_attachment_image_src($product_card_image,'full');
if ( ! empty( $img ) ) {
$product_card_image_url = $img[0];
}

$uniqid = uniqid(rand());
$zolo_product_card_id = 'zolo_product_card_'.$uniqid;

if($product_card_style == 'style1'){
$product_card_image_align_class = 'product_card_image_align_'.$product_card_image_align;
}

if($product_card_style == 'style2'){
	if($transform_scale == 'yes'){
		$transform_scale_class = 'transform_scale_active';
	}
}

$wrap_class = array();
$wrap_class[] = $zolo_product_card_id. ' zolo_product_card_wrap '.$class.' '.$product_card_style.' '.$animatedclass.' '.$product_card_image_align_class.' '.$transform_scale_class;
$wrap_class = implode( ' ', $wrap_class );

if (!empty($product_card_title)) {
	$title_options = _zolo_parse_text_shortcode_params($title_font_options, '', $title_google_fonts, $title_custom_fonts);
	$title_html .= $link_start.'<'.$title_options['tag'].' class="product_card_title" ' . $title_options['style'] . '>' . $product_card_title .'</'.$title_options['tag'].'>'.$link_end;
}
?>

<?php if($box_swing == 'yes'){echo '<div class="zolo_box_swing zolo_box_swing10px">';}?>
<div class="<?php echo $wrap_class;?>" data-animation="<?php echo $data_animation; ?>" data-delay="<?php echo $data_delay;?>">
<div class="zolo_product_card">
   
  <?php //Image Code
  if(! empty( $product_card_image_url )){
		  echo '<div class="zolo_product_card_thumbnail">';
		  echo '<img src="'.$product_card_image_url.'" class="zolo_product_card_thumbnail_img"/> ';
		  
		  if($product_card_style == 'style1' || $product_card_style == 'style2'){
		  	if(! empty( $product_card_price )){echo '<span class="zolo_product_card_price">'.$product_card_price.'</span>';}
		  }
		  echo '</div>';
	  }?>
  
  <div class="product_card_content">
  <div class="product_card_content_top">
  	<?php if($product_card_style == 'style3' || $product_card_style == 'style4'){
		if(! empty( $product_card_price )){echo '<span class="zolo_product_card_price">'.$product_card_price.'</span>';}
	  }?>
      
    <?php echo $title_html;?>
    
	<?php if(! empty( $content )){
    	echo '<div class="product_card_description">'.apply_filters('the_content', $content).'</div>';
    }?>
    </div>
    
    <?php if(! empty(rawurldecode( base64_decode( wp_strip_all_tags( $product_card_features ) ) ))){echo '<div class="product_card_info_wrap">'.rawurldecode( base64_decode( wp_strip_all_tags( $product_card_features ) ) ).'</div>';}?>
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
$shortcode_css .= Zolo_Resposive_Text_Param::responsive_css($title_responsive, '.' . esc_js($zolo_product_card_id) . ' .zolo_product_card .product_card_title');
	}

$shortcode_css .= '.'.$zolo_product_card_id.' .zolo_product_card{'.$box_shadow.'}';
$shortcode_css .= '.'.$zolo_product_card_id.' .zolo_product_card:hover{'.$box_hover_shadow.'}';

$shortcode_css .= '.'.$zolo_product_card_id.' .zolo_product_card{border-radius:'.$box_border_radius.'px;-webkit-border-radius:'.$box_border_radius.'px;}';


if($product_card_style == 'style1'){
	$shortcode_css .= '.'.$zolo_product_card_id.' .zolo_product_card .product_card_content_top{ padding-bottom:'.$box_bottom_padding.';}';
	$shortcode_css .= '.'.$zolo_product_card_id.' .zolo_product_card{padding:'.$box_top_padding.' '.$box_right_padding.' 0px '.$box_left_padding.';}';
	$shortcode_css .= '.'.$zolo_product_card_id.' .zolo_product_card .product_card_info_wrap{padding:15px '.$box_right_padding.' 15px '.$box_left_padding.';margin:0 -'.$box_right_padding.' 0 -'.$box_left_padding.';}';
	$shortcode_css .= '.'.$zolo_product_card_id.' .zolo_product_card .product_card_info_wrap{border-radius:0px 0px '.$box_border_radius.'px '.$box_border_radius.'px; -webkit-border-radius:0px 0px '.$box_border_radius.'px '.$box_border_radius.'px;}';
$shortcode_css .= '.'.$zolo_product_card_id.' .zolo_product_card .zolo_product_card_thumbnail,
.'.$zolo_product_card_id.' .zolo_product_card .zolo_product_card_thumbnail:before{border-radius:'.$box_border_radius.'px '.$box_border_radius.'px 0px 0px; -webkit-border-radius:'.$box_border_radius.'px '.$box_border_radius.'px 0px 0px;}';

}else if($product_card_style == 'style2'){
	$shortcode_css .= '.'.$zolo_product_card_id.' .product_card_content_top{padding:'.$box_top_padding.' '.$box_right_padding.' '.$box_bottom_padding.' '.$box_left_padding.';}';
	$shortcode_css .= '.'.$zolo_product_card_id.' .zolo_product_card .product_card_info_wrap{padding:15px '.$box_right_padding.' 15px '.$box_left_padding.';}';
	$shortcode_css .= '.'.$zolo_product_card_id.' .zolo_product_card .product_card_info_wrap{border-radius:0px 0px '.$box_border_radius.'px '.$box_border_radius.'px; -webkit-border-radius:0px 0px '.$box_border_radius.'px '.$box_border_radius.'px;}';
$shortcode_css .= '.'.$zolo_product_card_id.' .zolo_product_card .zolo_product_card_thumbnail,
.'.$zolo_product_card_id.' .zolo_product_card .zolo_product_card_thumbnail:before{border-radius:'.$box_border_radius.'px '.$box_border_radius.'px 0px 0px; -webkit-border-radius:'.$box_border_radius.'px '.$box_border_radius.'px 0px 0px;}';
	
}else if($product_card_style == 'style3' || $product_card_style == 'style4'){
	$shortcode_css .= '.'.$zolo_product_card_id.' .product_card_content{padding:'.$box_top_padding.' '.$box_right_padding.' '.$box_bottom_padding.' '.$box_left_padding.';}';
	$shortcode_css .= '.'.$zolo_product_card_id.' .zolo_product_card .zolo_product_card_price{top:'.$box_top_padding.';left:'.$box_left_padding.';bottom: auto;right: auto;}';
	$shortcode_css .= '.'.$zolo_product_card_id.' .zolo_product_card{min-height:'.$min_height.'px;}';
	}


$shortcode_css .= '.'.$zolo_product_card_id.' .zolo_product_card{ background:'.$product_card_bg_color.';text-align:'.$product_card_align.';}';

$shortcode_css .= '.'.$zolo_product_card_id.' .zolo_product_card_thumbnail{ background:'.$product_card_img_bg_color.';}';
$shortcode_css .= '.'.$zolo_product_card_id.':hover .zolo_product_card_thumbnail:before{ background:'.$product_card_img_bg_color_h.';}';

$shortcode_css .= '.'.$zolo_product_card_id.' .zolo_product_card .zolo_product_card_price{ background:'.$product_card_price_bg_color.';color:'.$product_card_price_color.';}';

$shortcode_css .= '.'.$zolo_product_card_id.' .product_card_description,
.'.$zolo_product_card_id.' .product_card_description p{color:'.$product_card_description_color.';}';

if($product_card_style == 'style1' || $product_card_style == 'style2'){
$shortcode_css .= '.'.$zolo_product_card_id.' .product_card_info_wrap{background:'.$product_card_features_bg_color.';}';
}
$shortcode_css .= '.'.$zolo_product_card_id.' .product_card_info_wrap{color:'.$product_card_features_color.';}';
$shortcode_css .= '.'.$zolo_product_card_id.' .product_card_info_wrap i{color:'.$product_card_features_icon_color.';}';




apcore_save_plugin_dyn_styles( $shortcode_css );