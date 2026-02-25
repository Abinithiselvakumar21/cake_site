<?php 
/*-----------------------------------------------------------------------------------*/
/* Header Logo
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


extract( shortcode_atts( array(
	'image_instead'				=> 'no',
	'logo_width'				=> '84',
	'logo_height'				=> '34',
	'image'						=> '',
	'retina_image'				=> '',
	'light_image'				=> '',
	'light_retina_image'		=> '',
	'dark_image'				=> '',
	'dark_retina_image'			=> '',
	'sticky_image_instead'		=> 'no',
	'sticky_image'				=> '',
	'sticky_retina_image'		=> '',
	'link_homepage'				=> 'no',
	'logo_link'					=> '',
	'alignment'					=> 'inherit',
	'el_class'					=> '',
	'animation_type'			=>'default',
	'clipping_animation_type'	=>'clipping_left_to_right',
	'clipping_color'			=>'#f2f2f2',
	'data_animation'			=> 'No Animation',
	'data_delay'				=> '500',
	
), $atts ) );
	
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
	$zolo_logo_id = 'zolo_logo_element_'.$uniqid;

	global $apress_data;
	$header_sticky_opt = isset($apress_data["header_sticky_opt"]) ? $apress_data["header_sticky_opt"] : 'on';
	$logo_url = isset($apress_data['logo']['url']) ? $apress_data['logo']['url'] : '';
	$logo_retina_url = isset($apress_data['logo_retina']['url']) ? $apress_data['logo_retina']['url'] : '';
	$fullpage_scroll_logo_showhide = isset($apress_data["fullpage_scroll_logo_showhide"]) ? $apress_data["fullpage_scroll_logo_showhide"] : 'on';
	$attributes = array();
	
	
//parse link
$logo_link = ( '||' === $logo_link ) ? '' : $logo_link;
$logo_link = vc_build_link( $logo_link );
$use_logo_link = false;
if ( strlen( $logo_link['url'] ) > 0 ) {
	$use_logo_link = true;
	$a_href = $logo_link['url'];
	$a_title = $logo_link['title'];
	$a_target = $logo_link['target'];
	$a_rel = $logo_link['rel'];
}

if ( $use_logo_link ) {
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

$logo_width_height = 'style="max-width:'.$logo_width.'px;max-height:'.$logo_height.'px;"';
$img = wp_get_attachment_image_src($image,'full');
if ( ! empty( $img ) ) {
$image = $img[0];
}

$img = wp_get_attachment_image_src($retina_image,'full');
if ( ! empty( $img ) ) {
$retina_image = $img[0];
}

$img = wp_get_attachment_image_src($light_image,'full');
if ( ! empty( $img ) ) {
$light_image = $img[0];
}

$img = wp_get_attachment_image_src($light_retina_image,'full');
if ( ! empty( $img ) ) {
$light_retina_image = $img[0];
}

$img = wp_get_attachment_image_src($dark_image,'full');
if ( ! empty( $img ) ) {
$dark_image = $img[0];
}
$img = wp_get_attachment_image_src($dark_retina_image,'full');
if ( ! empty( $img ) ) {
$dark_retina_image = $img[0];
}

$img = wp_get_attachment_image_src($sticky_image,'full');
if ( ! empty( $img ) ) {
	$sticky_image = $img[0];
}

$img = wp_get_attachment_image_src($sticky_retina_image,'full');
if ( ! empty( $img ) ) {
	$sticky_retina_image = $img[0];
}

if($image_instead == 'yes'){
	$zolo_hd_element_logo_type = 'zolo_instead_logo_image';
	}else{
		$zolo_hd_element_logo_type = 'zolo_themeoption_logo_image';
		}
?>

<div class="header_module_wrapper">
  <div id="<?php echo $zolo_logo_id;?>" class="zolo_logo_element_wrap">
	<div class="zolo_logo_element_content_box">
	  <div class="zolo_logo_element_content <?php echo $zolo_hd_element_logo_type. ' ' .$el_class.' '.$animatedclass;?>" data-animation ="<?php echo $data_animation_value; ?>" data-delay ="<?php echo $data_delay;?>">
		<?php if($image_instead == 'yes'){
		if($link_homepage == 'yes'){	
			$link_href_value = 	$attributes;
		}else{
			$link_href_value = 'href="'.esc_url( home_url( '/' ) ).'"';
		}
		?>
		<div class="zolo_logo_element">
		
		<?php if($image_instead=='yes'){
		// Get standard logo	
			echo '<div class="logo-box"><a '.$link_href_value.' '.$logo_width_height.'>';
						
			//if($page_full_screen_rows == 'on' && $fullpage_scroll_logo_showhide == 'on'){
				if($dark_image){
				echo '<img src="'.esc_url($dark_image).'" srcset="'.esc_url($dark_image).' 1x, '.esc_url($dark_retina_image).' 2x" alt="'.esc_attr( get_bloginfo( 'name' ) ).'" class="logo fullpage_scroll_dark_logo" '.$logo_width_height.' />';
				}
				if($light_image){
				echo '<img src="'.esc_url($light_image).'" srcset="'.esc_url($light_image).' 1x, '.esc_url($light_retina_image).' 2x" alt="'.esc_attr( get_bloginfo( 'name' ) ).'" class="logo fullpage_scroll_light_logo" '.$logo_width_height.'/>';	
				}
				
			//}else{
				if($image){
				echo '<img src="'.esc_url($image).'" srcset="'.esc_url($image).' 1x, '.esc_url($retina_image).' 2x" alt="'.esc_attr( get_bloginfo( 'name' ) ).'" class="logo default_logo" '.$logo_width_height.'/>';
				}
			//}
				
			echo '</a></div>';
			
		}else{
		// Get default Logo from theme options		
			if($logo_url){	
			echo '<div class="logo-box"><a '.$link_href_value.' '.$logo_width_height.'>';
			
			echo '<img src="'.esc_url($logo_url).'" srcset="'.esc_url($logo_url).' 1x, '.esc_url($logo_retina_url).' 2x" alt="'.esc_attr( get_bloginfo( 'name' ) ).'" class="logo" '.$logo_width_height.'/>';
			
			echo '</a></div>';
			}
		}
		
		// Get sticky logo	
		if($sticky_image_instead=='yes' && $sticky_image){
			echo '<div class="logo-box sticky_logo"> <a '.$link_href_value.' '.$logo_width_height.'>';
			echo '<img src="'.esc_url($sticky_image).'" srcset="'.esc_url($sticky_image).' 1x, '.esc_url($sticky_retina_image).' 2x" alt="'.esc_attr( get_bloginfo( 'name' ) ).'" class="logo" '.$logo_width_height.'/>'; 
			echo '</a></div>';
		}else{
			if($header_sticky_opt == 'on'){							
				if($apress_data['sticky_header_logo_showhide'] == 'on' && $apress_data['sticky_logo']['url'] !== ''){             
				echo '<div class="logo-box sticky_logo"> <a '.$link_href_value.' '.$logo_width_height.'>';	
				echo '<img src="'.esc_url($apress_data['sticky_logo']['url']).'" srcset="'.esc_url($apress_data['sticky_logo']['url']).' 1x, '.esc_url($apress_data['retina_sticky_logo']['url']).' 2x" alt="'.esc_attr( get_bloginfo( 'name' ) ).'" class="logo" '.$logo_width_height.'/>'; 
				echo '</a></div>'; 
				}	
			}
		}
		
		?>
		</div>
		<?php }else{ ?>
		<ul class="zolo_logo_element">
		  <?php apress_theme_header_logo();?>
		</ul>
		<?php }?>
	  </div>
	</div>
  </div>
</div>
<?php

// CSS Start
$shortcode_css = '';
$shortcode_css .= '#'.$zolo_logo_id.' .apcore-clipping-overlay{ background:'.$clipping_color.'}';
$shortcode_css .= '#'.$zolo_logo_id.'.zolo_logo_element_wrap{ text-align: '.$alignment.';}';
apcore_save_plugin_dyn_styles( $shortcode_css );	

