<?php 
/*-----------------------------------------------------------------------------------*/
/* Testimonial Carousel
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
extract( shortcode_atts( array(
	'num' 						=> '4',
	'excerpt_length'			=> '30',
	'link_to_testimonials'		=> 'no',
	'testimonialimgborradi'		=> '0',
	'testimonialbox_bg_color'	=> '#ffffff',
	'testimonialbox_border_color'=> 'rgba(0,0,0,0.09)',
	'border_radius'				=> '0',
	'enable_rating'				=> 'yes',
	'color_scheme'				=> 'primary_color_scheme',
	'star_color'				=> '',
	'box_top_padding'			=> '0',
	'box_right_padding'			=> '60',
	'box_bottom_padding'		=> '70',
	'box_left_padding'			=> '60',
	'box_shadow'				=> 'box_shadow_enable:disable|shadow_horizontal:0|shadow_vertical:2|shadow_blur:10|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
	'carousel_loop'				=> 'no',
	'carousel_autoplay'			=> 'no',
	'testimonialimgborcolor'	=> '#549ffc',
	'client_font_options'		=> '',
	'client_google_fonts'		=> '',
	'client_custom_fonts'		=> '',
	'designation_font_options'	=> '',
	'designation_google_fonts'	=> '',
	'designation_custom_fonts'	=> '',
	'description_font_options'	=> '',
	'description_google_fonts'	=> '',
	'description_custom_fonts'	=> '',
	'el_class'					=> '',
	'data_animation'			=> 'No Animation',
	'data_delay'				=> '500'
), $atts ) );

//Animation
if($data_animation == 'No Animation'){
	$animatedclass = 'noanimation';
}else{
	$animatedclass = 'animated hiding';
}		

$uniqid = uniqid(rand());

$c = 'acp_'.$uniqid;
if(substr_count($box_shadow, 'disable') == 0) {
	$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
}

if($color_scheme == 'design_your_own'){
	$key = '';
}else{
	$key = $color_scheme;
} 
$color_scheme_css = apcore_shortcodes_text_color_scheme($key);

// Typo
$client_options = _zolo_parse_text_shortcode_params($client_font_options, '', $client_google_fonts, $client_custom_fonts);
$designation_options = _zolo_parse_text_shortcode_params($designation_font_options, '', $designation_google_fonts, $designation_custom_fonts);
$description_options = _zolo_parse_text_shortcode_params($description_font_options, '', $description_google_fonts, $description_custom_fonts);


if($carousel_loop == 'yes'){$carousel_loop_val = 'true';}else{$carousel_loop_val = 'false';}
if($carousel_autoplay == 'yes'){$carousel_autoplay_val = 'true';}else{$carousel_autoplay_val = 'false';}

// settings center:true
$options_array = array(
	'class'                     => 'owl-carousel feedback-slider zolotestimonialcarousel_'.$c.' '.$animatedclass,
	'data-loop'                 => $carousel_loop_val,
	// Autoplay
	'data-autoplay'             => $carousel_autoplay_val,
);
?>

<div class="zolo_testimonial_carousel_area <?php echo $el_class;?>">
<div class="zolo_testimonial_carousel_area_wrap">
<div <?php echo array_to_data( $options_array ); ?>>
    

    
    <?php
		$args = array( 'post_type' => 'zt_testimonial', 'posts_per_page' => $num );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post(); 
		
		?>
    <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'thumbnail'); 
			if ( $thumb ){
				$thumb_url = $thumb['0'];
			}
			else {
				$thumb_url = get_stylesheet_directory_uri() . '/assets/images/post_thumb/testimonial_author_thumb.jpg';
			} ?>
            


          <div class="zolo_testimonial_carousel_box">
          <div class="zolo_testimonial_author_area">
          <div class="zolo_author_img"><img src="<?php echo $thumb_url ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) );?>"/></div>
          <span class="zolo_author_name entry-title" <?php echo $client_options['style']?>>
          <?php if($link_to_testimonials == 'yes'){?>
          <a href="<?php the_permalink(); ?>" <?php echo $client_options['style']?>><?php the_title(); ?></a>
          <?php }else{the_title();}?>
          </span>
          
          <?php $testimonial_designation = get_post_meta( get_the_ID(), 'zt_testimonial_designation', true ); 
            if($testimonial_designation){ echo '<span class="zolo_author_designation" '. $designation_options['style'].'>'.$testimonial_designation.'</span>';}
            ?>
            
            <?php $rating_option = get_post_meta( get_the_ID(), 'zt_rating_option', true ); 
                if($rating_option != '0%' & $enable_rating == 'yes'){
                    echo '<div class="testimonial_star_wrap"><div class="testimonial_star">
                    <div class="star_rating"><span class="filled" style="width:'.$rating_option.'"></span></div>
                    </div></div>';
                } ?>
                
            </div>
          <div class="zolo_author_text_area">
          <div class="zolo_author_text" <?php echo $description_options['style']?>>
            <?php $content = wp_trim_words( get_the_content(), $excerpt_length, '' );
            echo  preg_replace( '/\[[^\]]+\]/', '', $content );	?>
          </div>
          </div>
        </div>

    
    
    
    
    
    <?php endwhile; ?>
  </div>
  
<div class="feedback-slider-thumb hidden-xs">

<div class="thumb-prev">
<span>
<?php
$args = array(
        'post_type' =>'zt_testimonial',
        'posts_per_page' => 1,
        'orderby'=>'post_date',
        'order' => 'ASC',
        );
$query = new WP_query ( $args );
if ( $query->have_posts() ) { ?>	
		<?php while ( $query->have_posts() ) : $query->the_post(); 
			
            $thumb_prev = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'thumbnail'); 
			if ( $thumb_prev ){
			$thumb_prev_url = $thumb_prev['0'];?>
			<img src="<?php echo $thumb_prev_url;?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) );?>"/>
			<?php }?>
            
  		<?php endwhile; ?>
  		<?php wp_reset_postdata(); ?>
<?php } ?>

    </span>    
</div>
                        
<div class="thumb-next">
<span>

<?php
$args = array(
        'post_type' =>'zt_testimonial',
        'posts_per_page' => 1,
		'offset'	=>	1, 
        'orderby'=>'post_date',
        'order' => 'DESC',
        );
$query = new WP_query ( $args );
if ( $query->have_posts() ) { ?>	
		<?php while ( $query->have_posts() ) : $query->the_post(); 
			
			$thumb_next = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'thumbnail'); 
			if ( $thumb_next ){
			$thumb_next_url = $thumb_next['0'];?>
			<img src="<?php echo $thumb_next_url;?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) );?>"/>
			<?php }?>
            
  		<?php endwhile; ?>
  		<?php wp_reset_postdata(); ?>
<?php } ?>
</span>
</div>
        

</div>



</div></div>

<?php
$custom_css = '';


$custom_css .= '.zolo_testimonial_carousel_area .zolotestimonialcarousel_'.$c.' .zolo_testimonial_carousel_box:after{ background:'.$testimonialbox_bg_color.';border-color:'.$testimonialbox_border_color.'; -moz-border-radius:'.$border_radius.'px; -webkit-border-radius: '.$border_radius.'px; -o-border-radius: '.$border_radius.'px; -ms-border-radius: '.$border_radius.'px;border-radius: '.$border_radius.'px;'.$box_shadow.'}';
$custom_css .= '.zolo_testimonial_carousel_area .zolotestimonialcarousel_'.$c.' .owl-nav button[type="button"]{ color:'.$testimonialimgborcolor.';}';

if($color_scheme == 'design_your_own'){
	$custom_css .= '.zolo_testimonial_carousel_area .zolotestimonialcarousel_'.$c.' .testimonial_star .star_rating .filled::before{color:'.$star_color.';}';
}else{
	$custom_css .= '.zolo_testimonial_carousel_area .zolotestimonialcarousel_'.$c.' .testimonial_star .star_rating .filled::before{'.$color_scheme_css.'}';
}
$custom_css .= '.zolo_testimonial_carousel_area .zolotestimonialcarousel_'.$c.' .zolo_testimonial_carousel_box{ padding:'.$box_top_padding.'px '.$box_right_padding.'px '.$box_bottom_padding.'px '.$box_left_padding.'px;}';
			
apcore_save_plugin_dyn_styles( $custom_css );
