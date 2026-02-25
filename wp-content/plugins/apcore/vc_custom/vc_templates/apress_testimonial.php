<?php 
/*-----------------------------------------------------------------------------------*/
/* Testimonial shortcode
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
extract( shortcode_atts( array(
	'testimonialstyle'   		=> 'testimonials_style1',
	'rating_option'				=> '0%',
	'color_scheme'				=> 'primary_color_scheme',
	'star_color'				=> '',
	'authorimage'   			=> '',
	'testimonialimgborradi' 	=> '0',
	'by'						=> 'Matt Tucker',
	'designation'				=> 'Designer',
	'testimonialfontcolor'		=> '#777777',
	'testimonialbackgroundcolor'=> '#ffffff',
	'testimonialbordercolor'	=> '#cccccc',
	'testimonialauthorcolor'	=> '#777777',
	'author_font_options'		=> '',
	'author_google_fonts'		=> '',
	'author_custom_fonts'		=> '',
	'designation_font_options'	=> '',
	'designation_google_fonts'	=> '',
	'designation_custom_fonts'	=> '',
	'description_font_options'	=> '',
	'description_google_fonts'	=> '',
	'description_custom_fonts'	=> '',
	'box_shadow'				=> 'box_shadow_enable:disable|shadow_horizontal:0|shadow_vertical:2|shadow_blur:10|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
	'box_hover_shadow'			=> 'box_shadow_enable:enable|shadow_horizontal:0|shadow_vertical:7|shadow_blur:15|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
	'class'						=> '',
	'data_animation'			=> 'No Animation',
	'data_delay'				=> '500',
), $atts ) );

//Animation
if($data_animation == 'No Animation'){
	$animatedclass = 'noanimation';
}else{
	$animatedclass = 'animated hiding';
}

$uniqid = uniqid(rand());
$c = 'acp_'.$uniqid;

if($color_scheme == 'design_your_own'){
	$key = '';
}else{
	$key = $color_scheme;
} 
$color_scheme_css = apcore_shortcodes_text_color_scheme($key);
$color_scheme_css_for_background = apcore_shortcodes_background_color_scheme($key);

if(substr_count($box_shadow, 'disable') == 0) {
	$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
}
if(substr_count($box_hover_shadow, 'disable') == 0) {
	$box_hover_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_hover_shadow);
}

// Typo
$author_options = _zolo_parse_text_shortcode_params($author_font_options, '', $author_google_fonts, $author_custom_fonts);
$designation_options = _zolo_parse_text_shortcode_params($designation_font_options, '', $designation_google_fonts, $designation_custom_fonts);
$description_options = _zolo_parse_text_shortcode_params($description_font_options, '', $description_google_fonts, $description_custom_fonts);

$img_id = preg_replace( '/[^\d]/', '', $authorimage );
$img = wpb_getImageBySize( array( 'attach_id' => $img_id, 'thumb_size' => '80'  ) );?>

<div class="<?php echo 'zolotestimonial'.$c.' '.$testimonialstyle.' '.$animatedclass.' '.$class;?> zolo-testimonial zolo" data-animation = "<?php echo $data_animation;?>" data-delay = "<?php echo $data_delay;?>">

<?php if($testimonialstyle == 'testimonials_style4'){?>

		<div class="zolotestimonial_box">
			<?php if(!empty($img['thumbnail'])){?>
            <div class="zolo-testimonial-image"><?php echo $img['thumbnail'];?></div>
            <?php }?>
            
        <div class="zolo-testimonial-content_area">
	  	<?php if($rating_option != '0%'){
            echo '<div class="testimonial_star_wrap"><div class="testimonial_star">
            <div class="star_rating"><span class="filled" style="width:'.$rating_option.'"></span></div>
            </div></div>';
            }?>
        
		<div class="zolo-testimonial-content" <?php echo $description_options['style']?>> <?php echo $content;?> </div>
    
		<?php if($by || $designation){?>
    
	<div class="zolo-testimonial-author">
	  <span class="author"><strong <?php echo $author_options['style']?>><?php echo $by;?></strong> <span class="designation" <?php echo $designation_options['style']?>><?php echo $designation;?></span> 
      </span> </div>
      
	<?php }?>
    
  		</div>
        </div>

<?php }else if($testimonialstyle == 'testimonials_style5'){?>

		<div class="zolotestimonial_box">
			<div class="zolotestimonial_star_img">
			<?php if(!empty($img['thumbnail'])){?>
            <div class="zolo-testimonial-image"><?php echo $img['thumbnail'];?></div>
            <?php }?>
            <?php if($rating_option != '0%'){
            echo '<div class="testimonial_star_wrap">
			<div class="zolo_testimonial_icon_star_content">
			<ul class="zolo_testimonial_icon_star_list"><li><i class="ap-star"></i></li><li><i class="ap-star"></i></li><li><i class="ap-star"></i></li><li><i class="ap-star"></i></li><li><i class="ap-star"></i></li></ul>
			<ul class="zolo_testimonial_icon_star_list testimonial_icon_star_active">';
			
			if($rating_option == '20%' || $rating_option == '40%' || $rating_option == '60%' || $rating_option == '80%' || $rating_option == '100%'){
			echo '<li><i class="ap-star"></i></li>';
			}
			if($rating_option == '40%' || $rating_option == '60%' || $rating_option == '80%' || $rating_option == '100%'){
			echo '<li><i class="ap-star"></i></li>';
			}
			if( $rating_option == '60%' || $rating_option == '80%' || $rating_option == '100%'){
			echo '<li><i class="ap-star"></i></li>';
			}
			if($rating_option == '80%' || $rating_option == '100%'){
			echo '<li><i class="ap-star"></i></li>';
			}
			if($rating_option == '100%'){
			echo '<li><i class="ap-star"></i></li>';
			}
			echo '</ul></div></div>';
			
            }?>
            </div>
            
        <div class="zolo-testimonial-content_area">
	  	<?php if($by || $designation){?>
        <div class="zolo-testimonial-author">
          <span class="author"><strong <?php echo $author_options['style']?>><?php echo $by;?></strong> <span class="designation" <?php echo $designation_options['style']?>><?php echo $designation;?></span></span></div>
        <?php }?>
        
		<div class="zolo-testimonial-content" <?php echo $description_options['style']?>> <?php echo $content;?> </div>
  		</div>
        </div>

<?php }else{?>

  <?php if($testimonialstyle == 'testimonials_style3' && !empty($img['thumbnail']) ){?>
  <div class="zolo-testimonial-image"><?php echo $img['thumbnail'];?></div>
  <?php }?>
  <div class="zolotestimonial_box">
  <?php if($testimonialstyle != 'testimonials_style1'){
		if($rating_option != '0%'){
		echo '<div class="testimonial_star_wrap"><div class="testimonial_star">
		<div class="star_rating"><span class="filled" style="width:'.$rating_option.'"></span></div>
		</div></div>';
		}} ?>
            
	<div class="zolo-testimonial-content" <?php echo $description_options['style']?>> <?php echo $content;?> </div>
	<?php if($by || $designation){?>
	<div class="zolo-testimonial-author">
	  <?php if($testimonialstyle == 'testimonials_style1'){?>
	  <div class="zolo-testimonial-image"><?php if(!empty($img['thumbnail'])){ echo $img['thumbnail'];}?></div>
	  <?php }?>
	  <span class="author"><strong <?php echo $author_options['style']?>><?php echo $by;?></strong> <span class="designation" <?php echo $designation_options['style']?>><?php echo $designation;?></span> 
      <?php if($testimonialstyle == 'testimonials_style1'){
		if($rating_option != '0%'){
		echo '<div class="testimonial_star_wrap"><div class="testimonial_star">
		<div class="star_rating"><span class="filled" style="width:'.$rating_option.'"></span></div>
		</div></div>';
		}}?>
      </span> </div>
	<?php }?>
  </div>
  
  <?php }?>

</div>
<?php
$custom_css = '';
$testimonialborder_color = !empty($testimonialbordercolor) ? 'border:1px solid '.$testimonialbordercolor.';' : '';
$custom_css .= '.zolotestimonial'.$c.'.testimonials_style2.zolo-testimonial, 
.zolotestimonial'.$c.'.testimonials_style5.zolo-testimonial, 
.zolotestimonial'.$c.'.testimonials_style4.zolo-testimonial, 
.zolotestimonial'.$c.'.testimonials_style3.zolo-testimonial{background:'.$testimonialbackgroundcolor.';'.$testimonialborder_color.' color:'.$testimonialfontcolor.';}';
$custom_css .= '.zolotestimonial'.$c.' .zolo-testimonial-image img{
-moz-border-radius:'.$testimonialimgborradi.'px;
-webkit-border-radius:'.$testimonialimgborradi.'px;
-ms-border-radius:'.$testimonialimgborradi.'px;
-o-border-radius:'.$testimonialimgborradi.'px;
border-radius:'.$testimonialimgborradi.'px;
}';
$custom_css .= '.zolotestimonial'.$c.'.testimonials_style1 .zolo-testimonial-content{ background:'.$testimonialbackgroundcolor.'; '.$testimonialborder_color.' color:'.$testimonialfontcolor.';}';
$custom_css .= '.zolotestimonial'.$c.'.testimonials_style1 .zolo-testimonial-content:after{border-right: 15px solid transparent;border-left: 15px solid transparent;border-top: 15px solid '.$testimonialbordercolor.';}';
$custom_css .= '.zolotestimonial'.$c.'.testimonials_style1 .zolo-testimonial-content:before{border-right: 14px solid transparent;border-left: 14px solid transparent;border-top: 15px solid '.$testimonialbackgroundcolor.';}';
$custom_css .= '.zolotestimonial'.$c.'.'.$testimonialstyle.' .zolo-testimonial-author{color:'.$testimonialauthorcolor.';}';

//echo $color_scheme;

if($color_scheme == 'design_your_own'){
	$custom_css .= '.zolotestimonial'.$c.' .testimonial_star .star_rating .filled::before{color:'.$star_color.';}';
	$custom_css .= '.zolotestimonial'.$c.' .zolo_testimonial_icon_star_list.testimonial_icon_star_active li{background-color:'.$star_color.';}';
	
}else{
	$custom_css .= '.zolotestimonial'.$c.' .testimonial_star .star_rating .filled::before{'.$color_scheme_css.'}';
	$custom_css .= '.zolotestimonial'.$c.' .zolo_testimonial_icon_star_list.testimonial_icon_star_active li{'.$color_scheme_css_for_background.'}';
}


$custom_css .= '
.zolotestimonial'.$c.'.testimonials_style1.zolo-testimonial .zolo-testimonial-content,
.zolotestimonial'.$c.'.testimonials_style2.zolo-testimonial, 
.zolotestimonial'.$c.'.testimonials_style5.zolo-testimonial, 
.zolotestimonial'.$c.'.testimonials_style4.zolo-testimonial, 
.zolotestimonial'.$c.'.testimonials_style3.zolo-testimonial{'.$box_shadow.'}';

$custom_css .= '
.zolotestimonial'.$c.'.testimonials_style1.zolo-testimonial:hover .zolo-testimonial-content,
.zolotestimonial'.$c.'.testimonials_style2.zolo-testimonial:hover, 
.zolotestimonial'.$c.'.testimonials_style5.zolo-testimonial:hover, 
.zolotestimonial'.$c.'.testimonials_style4.zolo-testimonial:hover, 
.zolotestimonial'.$c.'.testimonials_style3.zolo-testimonial:hover{'.$box_hover_shadow.'}';



apcore_save_plugin_dyn_styles( $custom_css );
