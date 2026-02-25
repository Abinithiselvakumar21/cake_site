<?php 
/*-----------------------------------------------------------------------------------*/
/* Testimonial Slider
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
extract( shortcode_atts( array(
	'testimonialstyle'   		=> 'testimonials_style1',
	'excerpt_length'			=> '30',
	'link_to_testimonials'		=> 'no',
	'num' 						=> '4',
	'desktop_no_of_items' 		=> '1',
    'tablet_no_of_items'		=> '1',
    'mobile_no_of_items'		=> '1',
	'slider_gutter' 			=> '20',
	'testimonialalignment'      => 'center',
	'testimonialfontsize'		=> '16',
	'testimoniallineheight'		=> '24',
	'testimonialnamefontsize'	=> '18',
	'testimonialfontcolor'		=> '#747474',
	'testimonialnamefontcolor'	=> '#6f57db',
	'testimonialimgborradi'		=> '0',
	'testimonialbox_active_bg_color'=> '#3d81f0',
	'testimonialbox_active_text_color'=> '#ffffff',
	'testimonialbox_bg_color'	=> '#ffffff',
	'testimonialbox_border_color'=> 'rgba(0,0,0,0.09)',
	'border_radius'				=> '0',
	'author_image'				=> 'yes',
	'enable_rating'				=> 'yes',
	'color_scheme'				=> 'primary_color_scheme',
	'star_color'				=> '',
	'box_top_padding'			=> '40',
	'box_right_padding'			=> '40',
	'box_bottom_padding'		=> '40',
	'box_left_padding'			=> '40',
	'box_swing'					=> 'no',
	'box_shadow'				=> 'box_shadow_enable:disable|shadow_horizontal:0|shadow_vertical:2|shadow_blur:10|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
	'box_hover_shadow'			=> 'box_shadow_enable:enable|shadow_horizontal:0|shadow_vertical:7|shadow_blur:15|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
	'carousel_loop'				=> 'no',
	'carousel_autoplay'			=> 'no',
	'carousel_overflow_visible'	=> 'no',
	'client_font_options'		=> '',
	'client_google_fonts'		=> '',
	'client_custom_fonts'		=> '',
	'designation_font_options'	=> '',
	'designation_google_fonts'	=> '',
	'designation_custom_fonts'	=> '',
	'description_font_options'	=> '',
	'description_google_fonts'	=> '',
	'description_custom_fonts'	=> '',
	'icon_image'				=> '',
	'image_width'				=> '40',
	'hide_arrow_navigation'		=> 'yes',
	'navigation_arrow_position'	=> 'arrow_position_middle',
	'arrows_style'				=> 'arrows_style1',
	'arrows_color'				=> '#000000',
	'arrows_bg'					=> '#eee',
	'bullet_navigation'			=> 'no',
	'navigation_bullet_position'=> 'bullet_position_bottomcenter',
	'bullet_navigation_style'	=> 'dots_style1',
	'bullet_bg'					=> '#000000',
	'description_responsive'	=> '',
	'clientname_responsive'		=> '',
	'hide_numbered_pagination'	=> 'no',
	'numbered_pagination_alignment'	=> 'center',
	'numbered_pagination_color'	=> '#000000',
	'data_animation'			=> 'No Animation',
	'data_delay'				=> '500'
), $atts ) );

//Animation
if($data_animation == 'No Animation'){
	$animatedclass = 'noanimation';
}else{
	$animatedclass = 'animated hiding';
}		

if($color_scheme == 'design_your_own'){
	$key = '';
}else{
	$key = $color_scheme;
} 
$color_scheme_css = apcore_shortcodes_text_color_scheme($key);

if($icon_image != ''){
$img = wp_get_attachment_image_src($icon_image,'full');
$icon_image = $img[0];
}

$uniqid = uniqid(rand());
$c = 'acp_'.$uniqid;

if(substr_count($box_shadow, 'disable') == 0) {
	$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
}
if(substr_count($box_hover_shadow, 'disable') == 0) {
	$box_hover_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_hover_shadow);
}

// Typo
$client_options = _zolo_parse_text_shortcode_params($client_font_options, '', $client_google_fonts, $client_custom_fonts);
$designation_options = _zolo_parse_text_shortcode_params($designation_font_options, '', $designation_google_fonts, $designation_custom_fonts);
$description_options = _zolo_parse_text_shortcode_params($description_font_options, '', $description_google_fonts, $description_custom_fonts);

$slider_gutter_value = $slider_gutter/2;

//RTL Code
if ( is_rtl() ){
		if($testimonialalignment == 'left'){
			$testimonialalignment = 'right';
		}else if($testimonialalignment == 'right'){
			$testimonialalignment = 'left';
		}else{
			$testimonialalignment = 'center';
		}
		
	}else{
		$testimonialalignment = $testimonialalignment;
	}
	

if($testimonialstyle == 'testimonials_style2'){
	
	$sliderpagi_showhide = 'true';
	$slidernav_showhide = 'false';
	$sliderthumb_showhide = 'true';

}else{
	
	
/*	if($testimonialsliderpagi == 'pagi_none'){
		$sliderpagi_showhide = 'false';
	}else{
		$sliderpagi_showhide = 'true';
	}
	if($testimonialslidernav == 'nav_none'){
		$slidernav_showhide = 'false';
	}else{
		$slidernav_showhide = 'true';
	}*/

if($hide_arrow_navigation == 'yes'){
		$sliderarrow_showhide_class = 'slider_has_arrow '.$navigation_arrow_position;
	}else{
		$sliderarrow_showhide_class = '';
	}
	
if($bullet_navigation == 'yes'){
		$sliderpagi_showhide_class = 'slider_has_pagination '.$navigation_bullet_position;
	}else{
		$sliderpagi_showhide_class = '';
	}
	
if($hide_arrow_navigation == 'yes'){$slidernav_showhide = 'true';}else{$slidernav_showhide = 'false';}
if($bullet_navigation == 'yes'){$sliderpagi_showhide = 'true';}else{$sliderpagi_showhide = 'false';}

$sliderthumb_showhide = 'false';

	}

if($carousel_loop == 'yes'){$carousel_loop_val = 'true';}else{$carousel_loop_val = 'false';}
if($carousel_autoplay == 'yes'){$carousel_autoplay_val = 'true';}else{$carousel_autoplay_val = 'false';}
	
if($testimonialstyle == 'testimonials_style8'){
	$data_center_value = 'true';
}else{
	$data_center_value = 'false';
	}

if($hide_numbered_pagination == 'yes'){
		$mobile_no_of_items_value = 1;
		$tablet_no_of_items_value = 1;
		$desktop_no_of_items_value = 1;
	}else{
		$mobile_no_of_items_value = $mobile_no_of_items;
		$tablet_no_of_items_value = $tablet_no_of_items;
		$desktop_no_of_items_value = $desktop_no_of_items;
		}

// settings
$options_array = array(
	'class'                     => 'owl-carousel zolo_owl_slider zolo_testimonial_slider zolotestimonialcarousel'.$c,
	// General
	//'data-slide-type'           => $testimonialstyle,
	'data-margin'               => 0,
	'data-slide-by'             => 1,
	'data-loop'                 => $carousel_loop_val,
	'data-lazy-load'            => false,
	'data-stage-padding'        => 0,
	'data-auto-height'			=> 0,
	'data-auto-width'           => 0,
	// Navigation
	'data-nav'                  => $slidernav_showhide,
	'data-dots'                 => $sliderpagi_showhide,
	'data-dots-container'		=>	0,
	'data-nav-container'		=>	0,
	// Autoplay
	'data-autoplay'             => $carousel_autoplay_val,
	'data-autoplay-timeout'     => 5000,
	'data-autoplay-speed'       => false,
	'data-autoplay-hover-pause' => false,
	// Responsive
	'data-colums-mobile'  		=> $mobile_no_of_items_value,
	'data-colums-tablet'        => $tablet_no_of_items_value,
	'data-colums-desktop'       => $desktop_no_of_items_value,
	
	// Class for CSS3 animation
	'data-animate-out'			=> false,
	'data-animate-in'			=> false,
	'data-center'				=> $data_center_value,	
);
$uniqid = uniqid(rand());
$uniqclass = 'zolo_testimonial_slider_element_'.$uniqid;
?>

<div class="zolo_testimonial_slider_area zolo_owl_slider_default_setting <?php echo $uniqclass.' '.$testimonialstyle.' '.$testimonialalignment.' '.$bullet_navigation_style.' '.$arrows_style.' '.$sliderarrow_showhide_class.' '.$sliderpagi_showhide_class.' '.$animatedclass;?>" data-animation="<?php echo $data_animation?>" data-delay="<?php echo $data_delay?>">
<div class="zolo_testimonial_slider_area_wrap" style="margin:0 <?php echo '-'.$slider_gutter_value.'px';?>;">
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
            

<?php if($testimonialstyle == 'testimonials_style1' || $testimonialstyle == 'testimonials_style2'){?>
    	<div class="zolo_testimonialbox">
      	<div class="zolo_testimonialbox_content">
      <div class="zolo_author_img"><img src="<?php echo $thumb_url ?>" /></div>
      
      <div class="zolo_author_text" <?php echo $description_options['style']?>>
        <?php $content = wp_trim_words( get_the_content(), $excerpt_length, '' );
    	echo  preg_replace( '/\[[^\]]+\]/', '', $content );	?>
      </div>
      
      <span class="zolo_author_name entry-title" <?php echo $client_options['style']?>>
      <?php if($link_to_testimonials == 'yes'){?>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
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
    	</div>
    
   <?php }elseif($testimonialstyle == 'testimonials_style3'){?>
   		<div class="zolo_testimonialbox">
      
      <div class="zolo_testimonialbox_area">
      <div class="zolo_author_text" <?php echo $description_options['style']?>>
        <?php $content = wp_trim_words( get_the_content(), $excerpt_length, '' );
    	echo  preg_replace( '/\[[^\]]+\]/', '', $content );	?>
      </div>
      </div>
      <div class="zolo_testimonial_author_area">
      <div class="zolo_author_img"><img src="<?php echo $thumb_url ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) );?>"/></div>
      <div class="zolo_author_name_area">
      <span class="zolo_author_name entry-title" <?php echo $client_options['style']?>>
      <?php if($link_to_testimonials == 'yes'){?>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
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
        </div>
        
    </div>
    
    <?php }elseif($testimonialstyle == 'testimonials_style4'){?>
    	<div class="zolo_testimonialbox">
      <div class="zolo_testimonialbox_area">
      <div class="zolo_author_text" <?php echo $description_options['style']?>>
        <?php $content = wp_trim_words( get_the_content(), $excerpt_length, '' );
    	echo  preg_replace( '/\[[^\]]+\]/', '', $content );	?>
      </div>
      
      <span class="zolo_author_name entry-title" <?php echo $client_options['style']?>>
      <?php if($link_to_testimonials == 'yes'){?>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
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
            <div class="quote_icon">
<svg xmlns="http://www.w3.org/2000/svg" width="58" height="42" viewBox="0 0 58 42" preserveAspectRatio="none">
		<path d="M72.7773438,74.171875 C76.4231953,76.5807412 78.2460938,80.0637793 78.2460938,84.6210938 C78.2460938,88.3320498 77.0742305,91.391915 74.7304688,93.8007812 C72.386707,96.2096475 69.4244971,97.4140625 65.84375,97.4140625 C62.5234209,97.4140625 59.6588662,96.2421992 57.25,93.8984375 C54.8411338,91.5546758 53.6367188,88.4622588 53.6367188,84.6210938 C53.6367188,81.1705557 54.8411338,77.6875176 57.25,74.171875 L68.578125,56.7890625 L80.3945312,56.7890625 L72.7773438,74.171875 Z M102.5625,74.171875 C106.208352,76.5807412 108.03125,80.0637793 108.03125,84.6210938 C108.03125,88.3320498 106.859387,91.391915 104.515625,93.8007812 C102.171863,96.2096475 99.2096533,97.4140625 95.6289062,97.4140625 C92.3085771,97.4140625 89.4440225,96.2421992 87.0351562,93.8984375 C84.62629,91.5546758 83.421875,88.4622588 83.421875,84.6210938 C83.421875,81.1705557 84.62629,77.6875176 87.0351562,74.171875 L98.3632812,56.7890625 L110.179688,56.7890625 L102.5625,74.171875 Z" transform="translate(-53 -56)"/>
	</svg></div>
    </div>
    </div>
    
    <?php }elseif($testimonialstyle == 'testimonials_style5'){?>
    	<div class="zolo_testimonialbox">
      <div class="zolo_testimonialbox_area">
      <div class="zolo_author_img"><img src="<?php echo $thumb_url ?>" /></div>
      <div class="zolo_author_text" <?php echo $description_options['style']?>>
        <?php $content = wp_trim_words( get_the_content(), $excerpt_length, '' );
    	echo  preg_replace( '/\[[^\]]+\]/', '', $content );	?>
      </div>
      
      <span class="zolo_author_name entry-title" <?php echo $client_options['style']?>>
      <?php if($link_to_testimonials == 'yes'){?>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
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
    </div>
    <?php }elseif($testimonialstyle == 'testimonials_style6'){?>
    	<div class="zolo_testimonialbox">
      <div class="zolo_testimonialbox_area">
      <div class="zolo_author_img"><img src="<?php echo $thumb_url ?>" /></div>
      <span class="zolo_author_name entry-title" <?php echo $client_options['style']?>>
      <?php if($link_to_testimonials == 'yes'){?>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      <?php }else{the_title();}?>
      
        </span>
		<?php $testimonial_designation = get_post_meta( get_the_ID(), 'zt_testimonial_designation', true ); 
		if($testimonial_designation){ echo '<span class="zolo_author_designation" '. $designation_options['style'].'>'.$testimonial_designation.'</span>';}
		?>
      <div class="zolo_author_text" <?php echo $description_options['style']?>>
        <?php $content = wp_trim_words( get_the_content(), $excerpt_length, '' );
    	echo  preg_replace( '/\[[^\]]+\]/', '', $content );	?>
      </div>
      
      <?php $rating_option = get_post_meta( get_the_ID(), 'zt_rating_option', true ); 
			if($rating_option != '0%' & $enable_rating == 'yes'){
				echo '<div class="testimonial_star_wrap"><div class="testimonial_star">
				<div class="star_rating"><span class="filled" style="width:'.$rating_option.'"></span></div>
				</div></div>';
			} ?>
    </div>
    </div>
    
    <?php }elseif($testimonialstyle == 'testimonials_style7'){?>
    
      <div class="zolo_testimonialbox">
      <div class="zolo_testimonialbox_area">
      
      <?php if($icon_image != ''){ echo '<span class="zolo_quote_icon_wrap"><span class="zolo_quote_icon" style=" max-width:'.$image_width.'px;"><img src="'.$icon_image.'"/></span></span>';}?>
      
      <?php if($author_image == 'yes'){?>
      <div class="zolo_author_img"><img src="<?php echo $thumb_url ?>" /></div>
      <?php }?>
      
	  <?php $rating_option = get_post_meta( get_the_ID(), 'zt_rating_option', true ); 
			if($rating_option != '0%' & $enable_rating == 'yes'){
				echo '<div class="testimonial_star_wrap"><div class="testimonial_star">
				<div class="star_rating"><span class="filled" style="width:'.$rating_option.'"></span></div>
				</div></div>';
			} ?>
            
      <div class="zolo_author_text" <?php echo $description_options['style']?>>
        <?php $content = wp_trim_words( get_the_content(), $excerpt_length, '' );
    	echo  preg_replace( '/\[[^\]]+\]/', '', $content );	?>
      </div>
      
      <div class="zolo_author_name_wrap">
      <span class="zolo_author_name entry-title" <?php echo $client_options['style']?>>
      <?php if($link_to_testimonials == 'yes'){?>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      <?php }else{the_title();}?>
	  </span><?php $testimonial_designation = get_post_meta( get_the_ID(), 'zt_testimonial_designation', true ); 
		if($testimonial_designation){ echo '<span class="zolo_author_designation" '. $designation_options['style'].'>, &nbsp; '.$testimonial_designation.'</span>';}
		?>
		</div>
      
      
    </div>
    </div>
    
    <?php }elseif($testimonialstyle == 'testimonials_style8'){?>
    	
          <div class="zolo_testimonialbox">
          
          <div class="zolo_author_text_area">
          <div class="zolo_author_text" <?php echo $description_options['style']?>>
            <?php $content = wp_trim_words( get_the_content(), $excerpt_length, '' );
            echo  preg_replace( '/\[[^\]]+\]/', '', $content );	?>
          </div>
          </div>
          
          <div class="zolo_testimonial_author_area">
          <div class="zolo_author_img"><img src="<?php echo $thumb_url ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) );?>"/></div>
          <span class="zolo_author_name entry-title" <?php echo $client_options['style']?>>
          <?php if($link_to_testimonials == 'yes'){?>
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
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
            
        </div>
    
    <?php }else{ ?>
    
    	<div class="zolo_testimonialbox">
      
      <div class="zolo_author_text_area">
      <div class="zolo_author_text" <?php echo $description_options['style']?>>
        <?php $content = wp_trim_words( get_the_content(), $excerpt_length, '' );
    	echo  preg_replace( '/\[[^\]]+\]/', '', $content );	?>
      </div>
      </div>
      <div class="zolo_testimonial_author_area">
      <div class="zolo_author_img"><img src="<?php echo $thumb_url ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) );?>"/></div>
      <span class="zolo_author_name entry-title" <?php echo $client_options['style']?>>
      <?php if($link_to_testimonials == 'yes'){?>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
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
        
    </div>
    
    <?php } ?>
    
    <?php endwhile; ?>
  </div>
  <?php if($hide_numbered_pagination == 'yes'){ echo '<div class="zolo_owl_slider_counter"></div>';}?>
  	
</div></div>

<?php
$custom_css = '';
if(isset($description_responsive) && $description_responsive != '') {
$custom_css .= Zolo_Resposive_Text_Param::responsive_css($description_responsive, '.zolo_testimonial_slider_area .zolotestimonialcarousel' . esc_js($c) . ' .zolo_testimonialbox .zolo_author_text');
	}
if(isset($clientname_responsive) && $clientname_responsive != '') {
$custom_css .= Zolo_Resposive_Text_Param::responsive_css($clientname_responsive, '.zolo_testimonial_slider_area .zolotestimonialcarousel' . esc_js($c) . ' .zolo_testimonialbox .zolo_author_name');
$custom_css .= Zolo_Resposive_Text_Param::responsive_css($clientname_responsive, '.zolo_testimonial_slider_area .zolotestimonialcarousel' . esc_js($c) . ' .zolo_testimonialbox .zolo_author_name a');
	}
	
if($box_swing == 'yes'){
$custom_css .= '.zolo_testimonial_slider_area .zolotestimonialcarousel'.$c.' .zolo_testimonialbox_area:hover{ transform:translateY(-10px);-moz-transform:translateY(-10px);-webkit-transform:translateY(-10px);-ms-transform:translateY(-10px);-o-transform:translateY(-10px);}';
}
$custom_css .= '.zolo_testimonial_slider_area .zolotestimonialcarousel'.$c.' .zolo_testimonialbox .zolo_author_text{ color:'.$testimonialfontcolor.'; font-size:'.$testimonialfontsize.'px; line-height:'.$testimoniallineheight.'px;}';

$custom_css .= '.zolo_testimonial_slider_area .zolotestimonialcarousel'.$c.' .zolo_testimonialbox .zolo_author_name a,
.zolo_testimonial_slider_area .zolotestimonialcarousel'.$c.' .zolo_testimonialbox .zolo_author_name{ color:'.$testimonialnamefontcolor.'; font-size:'.$testimonialnamefontsize.'px;}
';

$custom_css .= '.zolo_testimonial_slider_area.testimonials_style2 .zolotestimonialcarousel'.$c.' .owl-thumb-item img,
.zolo_testimonial_slider_area .zolotestimonialcarousel'.$c.' .zolo_testimonialbox .zolo_author_img img,
.zolo_testimonial_slider_area .zolotestimonialcarousel'.$c.' .zolo_testimonialbox .zolo_author_img{
	-moz-border-radius:'.$testimonialimgborradi.'px;
-webkit-border-radius:'.$testimonialimgborradi.'px;
-ms-border-radius:'.$testimonialimgborradi.'px;
-o-border-radius:'.$testimonialimgborradi.'px;
border-radius:'.$testimonialimgborradi.'px;
}';

if($color_scheme == 'design_your_own'){
	$custom_css .= '.zolo_testimonial_slider_area .zolotestimonialcarousel'.$c.' .testimonial_star .star_rating .filled::before{color:'.$star_color.';}';
}else{
	$custom_css .= '.zolo_testimonial_slider_area .zolotestimonialcarousel'.$c.' .testimonial_star .star_rating .filled::before{'.$color_scheme_css.'}';
}
$custom_css .= '.zolo_testimonial_slider_area .zolotestimonialcarousel'.$c.' .zolo_testimonialbox_area .quote_icon svg{fill:'.$testimonialfontcolor.';}';

$custom_css .= '.zolo_testimonial_slider_area .zolotestimonialcarousel'.$c.' .zolo_testimonialbox_area{padding:'.$box_top_padding.'px '.$box_right_padding.'px '.$box_bottom_padding.'px '.$box_left_padding.'px ; 
-moz-border-radius:'.$border_radius.'px;
-ms-border-radius:'.$border_radius.'px;
-webkit-border-radius:'.$border_radius.'px;
-o-border-radius:'.$border_radius.'px;
border-radius:'.$border_radius.'px;
}';

if(!empty($testimonialbox_border_color)){
$custom_css .= '.zolo_testimonial_slider_area .zolotestimonialcarousel'.$c.' .zolo_testimonialbox_area{border-color:'.$testimonialbox_border_color.';}';
}
if(!empty($testimonialbox_bg_color)){
$custom_css .= '.zolo_testimonial_slider_area .zolotestimonialcarousel'.$c.' .zolo_testimonialbox_area{ background:'.$testimonialbox_bg_color.';}';
}
if(!empty($testimonialbox_border_color)){
$custom_css .= '.zolo_testimonial_slider_area.testimonials_style3 .zolotestimonialcarousel'.$c.' .zolo_testimonialbox_area:after{border-top: 15px solid '.$testimonialbox_border_color.';}';
}
if(!empty($testimonialbox_bg_color)){
$custom_css .= '.zolo_testimonial_slider_area.testimonials_style3 .zolotestimonialcarousel'.$c.' .zolo_testimonialbox_area:before{border-top: 15px solid '.$testimonialbox_bg_color.';}';
}


if($testimonialstyle == 'testimonials_style6' && $carousel_overflow_visible == 'yes'){
	$custom_css .= '.zolo_testimonial_slider_area .zolotestimonialcarousel'.$c.' .zolo_testimonialbox{ padding:0px '.$slider_gutter.'px;}';
	$custom_css .= '.zolo_testimonial_slider_area .zolotestimonialcarousel'.$c.' .owl-item.active .zolo_testimonialbox{ padding:0px '.$slider_gutter_value.'px;}';
}else{
	$custom_css .= '.zolo_testimonial_slider_area .zolotestimonialcarousel'.$c.' .zolo_testimonialbox{ padding:0px '.$slider_gutter_value.'px;}';
	}

$custom_css .= '.zolo_testimonial_slider_area .zolotestimonialcarousel'.$c.' .zolo_testimonialbox_area{'.$box_shadow.'}';
$custom_css .= '.zolo_testimonial_slider_area .zolotestimonialcarousel'.$c.' .zolo_testimonialbox_area:hover{'.$box_hover_shadow.'}';

$custom_css .= '.zolo_testimonial_slider_area .zolotestimonialcarousel'.$c.' .owl-controls{padding-left:'.$slider_gutter_value.'px;padding-right:'.$slider_gutter_value.'px;}';

	if($carousel_overflow_visible == 'yes'){
		if ( is_rtl() ){
			$custom_css .= '.zolo_testimonial_slider_area .zolotestimonialcarousel'.$c.' .owl-stage-outer{margin-left: -100%;}';
		}else{
			$custom_css .= '.zolo_testimonial_slider_area .zolotestimonialcarousel'.$c.' .owl-stage-outer{margin-right: -100%;}';
		}
	}

if($testimonialstyle == 'testimonials_style8'){
	
$custom_css .= '.zolo_testimonial_slider_area.testimonials_style8 .zolotestimonialcarousel'.$c.' .owl-item.active.center .zolo_author_text_area{ background:'.$testimonialbox_active_bg_color.';color:'.$testimonialbox_active_text_color.';}';

$custom_css .= '.zolo_testimonial_slider_area.testimonials_style8 .zolotestimonialcarousel'.$c.' .owl-item.active.center .zolo_testimonialbox .zolo_author_text_area:after{ border-top: 15px solid '.$testimonialbox_active_bg_color.';}';

$custom_css .= '.zolo_testimonial_slider_area.testimonials_style8 .zolotestimonialcarousel'.$c.' .zolo_testimonialbox .zolo_author_text_area{ padding:'.$box_top_padding.'px '.$box_right_padding.'px '.$box_bottom_padding.'px '.$box_left_padding.'px ; 
-moz-border-radius:'.$border_radius.'px;
-ms-border-radius:'.$border_radius.'px;
-webkit-border-radius:'.$border_radius.'px;
-o-border-radius:'.$border_radius.'px;
border-radius:'.$border_radius.'px;
}';
}


//nav & pagi

if($navigation_arrow_position == 'arrow_position_middle'){
if($carousel_overflow_visible == 'yes'){
$custom_css .= '.zolo_owl_slider_default_setting .zolotestimonialcarousel'.$c.' .owl-nav button.owl-prev{ left:'.$slider_gutter_value.'px;right: auto;}';
$custom_css .= '.zolo_owl_slider_default_setting .zolotestimonialcarousel'.$c.' .owl-nav button.owl-next{ right:'.$slider_gutter_value.'px;left: auto;}';
}else{
$custom_css .= '.zolo_owl_slider_default_setting .zolotestimonialcarousel'.$c.' .owl-nav button.owl-prev{ left:0px;right: auto;}';
$custom_css .= '.zolo_owl_slider_default_setting .zolotestimonialcarousel'.$c.' .owl-nav button.owl-next{ right:0px;left: auto;}';
	}
}

$custom_css .= '.zolo_owl_slider_default_setting .zolotestimonialcarousel'.$c.' .owl-dot span:after{ box-shadow: 0 0 0 5px '.$bullet_bg.' inset;}';
$custom_css .= '.zolo_owl_slider_default_setting .zolotestimonialcarousel'.$c.' .owl-dot.active span:after{ box-shadow: 0 0 0 1px '.$bullet_bg.' inset;}';
$custom_css .= '.zolo_owl_slider_default_setting.dots_style3 .zolotestimonialcarousel'.$c.' .owl-dot.active span:after{ background:'.$bullet_bg.';}';

$custom_css .= '.zolo_owl_slider_default_setting .zolotestimonialcarousel'.$c.' .owl-nav button span:after{background:'.$arrows_color.';}';
$custom_css .= '.zolo_owl_slider_default_setting .zolotestimonialcarousel'.$c.' .owl-nav button span{color:'.$arrows_color.';}';
$custom_css .= '.zolo_owl_slider_default_setting.arrows_style4 .zolotestimonialcarousel'.$c.' .owl-nav button.owl-prev span:before{border-color: transparent '.$arrows_color.' transparent transparent;}';

$custom_css .= '.zolo_owl_slider_default_setting.arrows_style4 .zolotestimonialcarousel'.$c.' .owl-nav button.owl-next span:before{border-color: transparent transparent transparent '.$arrows_color.';}';

if($arrows_style == 'arrows_style2' || $arrows_style == 'arrows_style3'){
$custom_css .= '.zolo_owl_slider_default_setting .zolotestimonialcarousel'.$c.' .owl-nav button span{background:'.$arrows_bg.';}';
}


if($hide_numbered_pagination == 'yes'){
	$slider_gutter_numbered_pad = $slider_gutter_value + 25;
	if ( ! empty( $numbered_pagination_color ) ) {
	$custom_css .= '.zolo_owl_slider_default_setting.'.$uniqclass.' .zolo_owl_slider_counter{color:'.$numbered_pagination_color.';}';
	}
	$custom_css .= '.zolo_owl_slider_default_setting.'.$uniqclass.' .zolo_owl_slider_counter{text-align:'.$numbered_pagination_alignment.';padding-left:'.$slider_gutter_numbered_pad.'px;padding-right:'.$slider_gutter_numbered_pad.'px;}';
	
}
		
apcore_save_plugin_dyn_styles( $custom_css );
