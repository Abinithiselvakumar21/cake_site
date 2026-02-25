<?php 
/*-----------------------------------------------------------------------------------*/
/* Header Hamburger Menu
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$social_profiles = $website_name = '';

extract( shortcode_atts( array(
	'style'							=> 'style1',
	'icon_image'					=> '',
	'border_color'					=> '#1769ff',
	'icon_text_color'				=> '#1c1c1c',
	'icon_text_hover_color'			=> '#1769ff',
	'background_shape'				=> 'square',
	'icon_background_color'			=> '',
	'icon_shadow'					=> 'box_shadow_enable:disable|shadow_horizontal:4|shadow_vertical:10|shadow_blur:25|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
	'icon_padding'					=> 'padding-top:14|padding-bottom:14|padding-left:10|padding-right:10',
	'icon_margin'					=> '',
	'hamburger_menu_action'			=> 'extended_menu',
	'canvas_image'					=> '',
	'extended_sidebar_bg_image'		=> 'fixed',
	'extended_sidebar_content_animated'	=> 'on',
	'canvas_color'					=> '#ffffff',
	'text_color'					=> '#1c1c1c',
	'link_color'					=> '#1c1c1c',
	'link_hover_color'				=> '#1769ff',
	'link_bg_color'					=> '#1769ff',
	'link_hover_bg_color'			=> '#1c1c1c',
	'sidebar_item_border_color'		=> '#1c1c1c',
	'apress_hamburger_menu_template'=> '',
	'menu_style'					=> 'vertical_menu',
	'apress_primary_menu'			=> '',
	'apress_primary_menu2'			=> '',
	'select_type'					=> 'default',
	'apress_hamburger_sidebar_template'=> '',
	'select_sidebar_type'			=> 'default',
	'extended_sidebar_position'		=> 'right',
	'canvas_width'					=> '400',
	'canvas_height'					=> '400',
	'open_menu'						=> 'open_left_side',
	'menu_item_padding_top'			=> '12',
	'menu_item_padding_right'		=> '20',
	'menu_item_padding_bottom'		=> '12',
	'menu_item_padding_left'		=> '20',
	'menu_item_margin_top'			=> '3',
	'menu_item_margin_right'		=> '0',
	'menu_item_margin_bottom'		=> '3',
	'menu_item_margin_left'			=> '0',
	'menu_font_options'				=> '',
	'menu_google_fonts'				=> '',
	'menu_custom_fonts'				=> '',
	'button_text_left'				=> '',
	'button_text_right'				=> '',
	'button_text_bottom'			=> '',
	'button_text_on_hover'			=> '',
	'button_text_font_size'			=> '14',
	'dropdown_hover_style'			=> 'background_style',
	'dropdown_width'				=> '210',
	'dropdown_border_radius'		=> '6',
	'dropdown_menu_alignment'		=> 'left',
	'dropdown_bg_color'				=> '#ffffff',
	'dropdown_menu_hover_bg_color'	=> '#ffffff',
	'dropdown_menu_hover_underline_color'=> '#1769ff',
	'dropdown_menu_color'			=> '#4f4f4f',
	'dropdown_menu_hover_color'		=> '#1769ff',
	'dropdown_item_border_color'	=> '#f4f4f4',
	'dropdown_box_shadow'			=> 'box_shadow_enable:enable|shadow_horizontal:4|shadow_vertical:10|shadow_blur:25|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.12)',
	'dropdown_padding_top'			=> '0',
	'dropdown_padding_right'		=> '0',
	'dropdown_padding_bottom'		=> '0',
	'dropdown_padding_left'			=> '0',
	'dropdown_item_padding_top'		=> '12',
	'dropdown_item_padding_right'	=> '30',
	'dropdown_item_padding_bottom'	=> '12',
	'dropdown_item_padding_left'	=> '30',
	'dropdown_menu_font_size'		=> '',
	'loader_style'					=> 'default',
	'layer_effect'					=> 'single_layer',
	'layer1_color'					=> '#f4f4f4',
	'layer2_color'					=> '#2a2a2a',
	'layer3_color'					=> '#0092dd',
	'loader_direction'				=> 'top',
	'svg_layer_effect'					=> 'layer1',
	'svg_layer1_color'					=> '#f4f4f4',
	'svg_layer2_color'					=> '#2a2a2a',
	'svg_layer3_color'					=> '#0092dd',
	'svg_layer4_color'					=> '#08b200',
	'svgloader_style'					=> 'svgstyle1',
	'canvas_video_bg_option'			=> 'disable',
	'canvas_self_hosted_video_url'		=> '',
	'canvas_bg_overlay_color'			=> '',
	'show_item_in_side_panel'			=> 'disable',
	'side_panel_alignment'				=> 'right',
	'side_panel_vertical_alignment'		=> 'middle',
	'side_panel_top_offset'				=> '20px',
	'side_panel_middle_offset'			=> '50%',
	'side_panel_bottom_offset'			=> '20px',
	'side_panel_left_offset'			=> '0px',
	'side_panel_right_offset'			=> '0px',
	'hide_under_screen_size'			=> '',
	
	'class'							=> '',
	'data_animation'				=> 'No Animation',
	'data_delay'					=> '500',
	
), $atts ) );
			
	//Animation
	if($data_animation == 'No Animation'){
		$animatedclass = 'noanimation';
	}else{
		$animatedclass = 'animated hiding';
	}
	
	$uniqid = uniqid(rand());
	$zolo_hamburger_menu_id = 'zolo_hamburger_menu_'.$uniqid;
	
	if($show_item_in_side_panel == 'enable'){
		$show_item_in_side_panel_class = 'show_item_in_side_panel_enable';
		}else{
			$show_item_in_side_panel_class = '';
			}
	
	$menu_typo_options = _zolo_parse_text_shortcode_params($menu_font_options, 'zolo_button_text', $menu_google_fonts, $menu_custom_fonts);
	if($extended_sidebar_bg_image == 'fixed'){
		$extended_sidebar_bg_image_class = 'extended_sidebar_bg_image_'.$extended_sidebar_bg_image;
	}else{
		$extended_sidebar_bg_image_class = '';   
	}
	
	if($hamburger_menu_action == 'extended_menu'){
		$hamburger_menu_action_class = 'zolo_el_header_hamburger_canvas_menu zolo_el_header_'.$menu_style.' '.$open_menu;
		$hamburger_button_class = 'zolo_el_header_'.$menu_style.'_button';
		
	}else{
		$hamburger_menu_action_class = 'zolo_el_header_hamburger_canvas_sidebar '.$extended_sidebar_position.' '.$extended_sidebar_bg_image_class;
		$hamburger_button_class = '';
		
		}
		
	$img = wp_get_attachment_image_src($canvas_image,'full');
	if ( ! empty( $img ) ) {
	$canvas_image = $img[0];
	}
	
	$img1 = wp_get_attachment_image_src($icon_image,'full');
	if ( ! empty( $img1 ) ) {
	$icon_image = $img1[0];
	}
	
	$loader_style_open_class = $loader_style_close_class = '';
	if($menu_style == 'full_screen_menu' && $loader_style == 'layer'){
		wp_enqueue_script( 'page-reveal-effect');
		wp_enqueue_script( 'modernizr-custom');
		$loader_style_open_class = 'apc-hmenu-button';
		$loader_style_close_class = 'apc-close-button';
	}
	if($menu_style == 'full_screen_menu' && $loader_style == 'svg'){
		wp_enqueue_script('svgloader');
		$loader_style_open_class = 'svg_open_button';
		$loader_style_close_class = 'svg_close_button';
	}
	
$canvas_video_bg_html = ''; 	
if($canvas_video_bg_option == 'enable' && $canvas_self_hosted_video_url != ''){
	$canvas_video_bg_html = '<div class="apcore-self-hosted-video" data-vide-bg="mp4: '.esc_url($canvas_self_hosted_video_url).'" data-vide-options="volume:1, autoplay:true, loop: true, muted: true, resizing: true"></div>';
}	
?>

    <div class="header_module_wrapper">
    
    <div id="<?php echo $zolo_hamburger_menu_id;?>" class="zolo_el_header_hamburger_menu_content <?php echo $loader_style;?>" data-id="<?php echo $zolo_hamburger_menu_id;?>" data-buttonstyle="<?php echo $style;?>" data-hamburgermenuaction="<?php echo $hamburger_menu_action;?>" data-menustyle="<?php echo $menu_style;?>" data-loaderstyle="<?php echo $loader_style;?>" data-svgloader="<?php echo $svgloader_style;?>">
    
    <?php if($menu_style == 'full_screen_menu' && $loader_style == 'svg'){
		
		if($svg_layer_effect == 'layer1'){
		echo '<svg class="shape-overlays" viewBox="0 0 100 100" preserveAspectRatio="none">
            <path class="shape-overlays__path"></path>
        </svg>';
		}else if($svg_layer_effect == 'layer2'){
		echo '<svg class="shape-overlays" viewBox="0 0 100 100" preserveAspectRatio="none">
            <path class="shape-overlays__path"></path>
			<path class="shape-overlays__path"></path>
        </svg>';
		}else if($svg_layer_effect == 'layer3'){
		echo '<svg class="shape-overlays" viewBox="0 0 100 100" preserveAspectRatio="none">
            <path class="shape-overlays__path"></path>
			<path class="shape-overlays__path"></path>
			<path class="shape-overlays__path"></path>
        </svg>';
		}else if($svg_layer_effect == 'layer4'){
		echo '<svg class="shape-overlays" viewBox="0 0 100 100" preserveAspectRatio="none">
            <path class="shape-overlays__path"></path>
			<path class="shape-overlays__path"></path>
			<path class="shape-overlays__path"></path>
			<path class="shape-overlays__path"></path>
        </svg>';
		}
	}
	if($button_text_bottom != ''){
			$button_text_bottom_class = 'button_text_bottom_visible';
		}else{
			$button_text_bottom_class = '';
		}
	?>
        
    <!-- Button Code Start -->
    <div class="zolo_el_header_hamburger_button zolo_header_hamburger_menu_area <?php echo 'zolo_header_hamburger_menu_'.$style.' '.$hamburger_button_class.' '.$loader_style_open_class.' '.$show_item_in_side_panel_class.' '.$side_panel_alignment.' '.$side_panel_vertical_alignment;?>">
    	<div class="zolo_el_header_hamburger_button_content <?php echo $background_shape. ' ' .$button_text_bottom_class;?>">
        
			<?php /*?><?php 
			if($style != 'style1' || $style != 'style2' || $style != 'style3'){
			if($hamburger_menu_action == 'extended_menu' && $menu_style == 'vertical_menu' || $hamburger_menu_action == 'extended_menu' && $menu_style == 'horizontal_menu'){
                	echo '<span class="zolo_el_header_hamburger_close_button"></span>';
                }
				}?><?php */?>
            <?php if($button_text_left != ''){ echo '<span class="zolo_header_hamburger_menu_text button_text_left"><span class="zolo_header_hamburger_text_hover_style1" data-letters="'.$button_text_left.'">'.$button_text_left.'</span></span>';}?>
            <span class="zolo_header_hamburger_bar_wrap">
	<?php if($style == 'style1' || $style == 'style2' || $style == 'style3' || $style == 'style5' || $style == 'style6' || $style == 'style7' || $style == 'style8' || $style == 'style9'){?>
    		
           	<span class="zolo_header_hamburger_menu <?php echo 'hamburger_menu_'.$style;?>">
            <?php if($button_text_on_hover != ''){ echo '<span class="zolo_header_hamburger_text_on_hover"><span class="zolo_header_hamburger_text_hover_style1" data-letters="'.$button_text_on_hover.'">'.$button_text_on_hover.'</span></span>';}?>
               <span class="zolo_header_hamburger_bar zolo_header_hamburger_bar1"></span>
               <span class="zolo_header_hamburger_bar zolo_header_hamburger_bar2"></span>
               <span class="zolo_header_hamburger_bar zolo_header_hamburger_bar3"></span>
           </span>
           
    
	<?php }else if($style == 'style4'){?>
    	
        	<span class="zolo_header_hamburger_menu <?php echo 'hamburger_menu_'.$style;?>">
               	<svg class="eldtf-amedeo-svg-burger" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="42px" height="23px" viewBox="0 0 42 23" style="enable-background:new 0 0 42 23;" xml:space="preserve">
					<rect x="0.5" y="0.5" width="41" height="7"></rect>
					<rect x="0.5" y="15.5" width="41" height="7"></rect>
					<rect x="0.5" y="0.5" width="41" height="7"></rect>
					<rect x="0.5" y="15.5" width="41" height="7"></rect>
				</svg>
           </span>
     <?php }else if($style == 'custom_icon'){?>
    		<?php if($icon_image){?>
        	<span class="zolo_header_hamburger_menu <?php echo 'hamburger_menu_'.$style;?>">
            <?php if($button_text_on_hover != ''){ echo '<span class="zolo_header_hamburger_text_on_hover"><span class="zolo_header_hamburger_text_hover_style1" data-letters="'.$button_text_on_hover.'">'.$button_text_on_hover.'</span></span>';}?>
               	<img src="<?php echo $icon_image;?>" alt="apress" class="zolo_el_header_hamburger_icon">
           </span>
           <?php }?>
	<?php }?>
    
    		</span>
           <?php if($button_text_right != ''){ echo '<span class="zolo_header_hamburger_menu_text button_text_right"><span class="zolo_header_hamburger_text_hover_style1" data-letters="'.$button_text_right.'">'.$button_text_right.'</span></span>';}?>
    
	<?php if($button_text_bottom != ''){ echo '<span class="zolo_header_hamburger_menu_text button_text_bottom"><span class="zolo_header_hamburger_text_hover_style1" data-letters="'.$button_text_bottom.'">'.$button_text_bottom.'</span></span>';}?>
    	</div>
    </div>
    <!-- Button Code End -->
    
    <?php 
	if($hamburger_menu_action == 'extended_sidebar'){?>
    <div class="hamburger_extended_sidebar_mask"></div>
    <?php }?>

    <div class="zolo_el_header_hamburger_canvas vc_row_apc_video_bg <?php echo $hamburger_menu_action_class;?>">
                
        
        
       <?php if($hamburger_menu_action == 'extended_sidebar'){
		   $extended_sidebar_content_animated_class = '';
		   
		   if($extended_sidebar_position == 'right' && $extended_sidebar_bg_image == 'fixed' || $extended_sidebar_position == 'left' && $extended_sidebar_bg_image == 'fixed'){   
			   $extended_sidebar_content_animated_class = 'extended_sidebar_content_animated_'.$extended_sidebar_content_animated;
			   }
		   
		   ?>
		   <?php // Video Background
			if($canvas_video_bg_option == 'enable' && $canvas_self_hosted_video_url != ''){
			echo $canvas_video_bg_html;
			}
			?>
           <div class="zolo_el_header_sidebar_content_wrap_content <?php echo 'sidebar_type_'.$select_sidebar_type. ' ' .$extended_sidebar_content_animated_class;?>">
		   
		   
            
            <div class="zolo_el_header_sidebar_content_wrap_padding">
            <a class="zolo_el_header_hamburger_close_button">Close</a>
           <div class="zolo_el_header_sidebar_content_wrap">
           
          
           <?php if($select_sidebar_type == 'default'){?>
          
		   	<?php if ( is_active_sidebar( 'extended_sidebar' ) ) : ?>
            <div class="zolo_el_header_default_sidebar_content_area">
                  <?php dynamic_sidebar( 'extended_sidebar' ); ?>
            </div>
            <?php endif; ?>

           <?php }else{?>
           
           <?php if ( $select_sidebar_type == 'page_builder' &&  $apress_hamburger_sidebar_template ) {
		
				$getFooterPost = get_post( $apress_hamburger_sidebar_template );  
				echo apress_theme_get_vc_custom_css( $apress_hamburger_sidebar_template );
				
				if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
					$vc_enabled	  = ( $getFooterPost->post_content && ('<p>[vc_' || substr( $getFooterPost->post_content, 0, 4 ) === '[vc_' ) ) ? true : false;
					if ( ! $vc_enabled ) {
						echo '<div class="zolo-container">'.$getFooterPost->post_content.'</div>';
					} else {
						echo '<div class="zolo-container">'.do_shortcode( $getFooterPost->post_content ).'</div>';
					}		
				}
			}?>
			   
			<?php } ?>
            
            </div>
            </div>
			</div>
            
	   <?php }else{?>
       
       <?php // Video Background
		if($menu_style == 'full_screen_menu' && $canvas_video_bg_option == 'enable' && $canvas_self_hosted_video_url != ''){
        echo $canvas_video_bg_html;
        }
		?>
        
        <?php if($menu_style == 'full_screen_menu'){
			echo '<span class="apc-hmenubutton-area"><a class="zolo_el_header_hamburger_close_button '.$loader_style_close_class.'">Close</a></span>';
		}?>
		<?php //Menu Content
		if ( $select_type == 'page_builder' &&  $apress_hamburger_menu_template ) {

		$getFooterPost = get_post( $apress_hamburger_menu_template );  
		echo apress_theme_get_vc_custom_css( $apress_hamburger_menu_template );
		
		if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
			echo '<div class="zolo_el_header_hamburger_canvas_content">';
			$vc_enabled	  = ( $getFooterPost->post_content && ('<p>[vc_' || substr( $getFooterPost->post_content, 0, 4 ) === '[vc_' ) ) ? true : false;
			if ( ! $vc_enabled ) {
				echo '<div class="zolo-container-remove">'.$getFooterPost->post_content.'</div>';
			} else {
				echo '<div class="zolo-container-remove">'.do_shortcode( $getFooterPost->post_content ).'</div>';
			}
			
			echo '</div>';
					
		}
	
	}else{?>
		
        <?php if($menu_style == 'full_screen_menu'){ echo '<div class="zolo_el_header_hamburger_canvas_content"><div class="full_screen_menu">'; }?>
        <!--<div class="zolo-navigation zolo_header_el_navigation">-->
        
        <?php if($menu_style == 'full_screen_menu' || $menu_style == 'horizontal_menu'){
					$menu_depth = 3;
				}else{
					$menu_depth = 1;
				}
			echo '<nav class="main-navigation zolo_header_primary_menu zolo_header_el_hamburger_navigation '.$dropdown_hover_style.' '.$dropdown_menu_alignment.'">';
			if($menu_style == 'full_screen_menu'){
				$apress_primarymenu = $apress_primary_menu2;
			}else{
				$apress_primarymenu = $apress_primary_menu;
			}
			
			if( is_nav_menu( $apress_primarymenu ) ) :
				wp_nav_menu(  
					array(  
						'theme_location'  	=> 'primary-nav', 
						'menu'           	=> $apress_primarymenu,
						'container'       	=> false,            
						'container_id'    	=> 'main-nav',  
						'container_class' 	=> '',  
						'menu_class' 	  	=> 'nav zolo-navbar-nav',
						'items_wrap'      	=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'menu_id'         	=> 'primary' ,
						'depth'  			=> $menu_depth,
						'link_before'    	=> '<span class="menu-text" ' . $menu_typo_options['style'] . '>',
						'link_after'    	=> '</span>',
					)
				); 
			else:
				wp_nav_menu( array(
					'container'       	=> false,            
					'container_id'    	=> 'main-nav',  
					'container_class' 	=> '',  
					'menu_class' 	  	=> 'nav zolo-navbar-nav',
					'items_wrap'      	=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
					//'fallback_cb'       => 'ZOLOCoreFrontendWalker::fallback',
					'depth'  			=> 1,
					'link_before'    	=> '<span class="menu-text" ' . $menu_typo_options['style'] . '>',
					'link_after'    	=> '</span>',
					//'walker'    		=> new ZOLOCoreFrontendWalker()
				));
		
			endif;
			
			echo '</nav>';
			?> 
    	
        <?php if($menu_style == 'full_screen_menu'){ echo '</div></div>'; }?>
        
		<?php } }?>
        
        
    </div>
            
    </div>
    <?php 
if($menu_style == 'full_screen_menu' && $loader_style == 'layer'){
if($layer_effect == 'single_layer'){
	$layer_effect_number = 1;
}else if($layer_effect == 'double_layer'){
	$layer_effect_number = 2;
}else if($layer_effect == 'triple_layer'){
	$layer_effect_number = 3;
	}
echo '<div class="apress-mask" data-layers="'.$layer_effect_number.'" data-mask-colors="'.$layer1_color.','.$layer2_color.','.$layer3_color.'" data-direction="'.$loader_direction.'" data-effect="anim-effect-'.$layer_effect_number.'"> </div>';

}?>




	
<?php 
	$shortcode_css = '';
	
	if(substr_count($icon_shadow, 'disable') == 0) {
		$icon_shadow = Zolo_Box_Shadow_Param::box_shadow_css($icon_shadow);
		$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_button_content{'.$icon_shadow.'}';
	}
	
	$menu_item_padding_top = !empty($menu_item_padding_top) ? 'padding-top:'.$menu_item_padding_top.'px;' : 'padding-top:0px;';
	$menu_item_padding_right = !empty($menu_item_padding_right) ? 'padding-right:'.$menu_item_padding_right.'px;' : 'padding-right:0px;';
	$menu_item_padding_bottom = !empty($menu_item_padding_bottom) ? 'padding-bottom:'.$menu_item_padding_bottom.'px;' : 'padding-bottom:0px;';
	$menu_item_padding_left = !empty($menu_item_padding_left) ? 'padding-left:'.$menu_item_padding_left.'px;' : 'padding-left:0px;';
	
	$menu_item_margintop = !empty($menu_item_margin_top) ? 'padding-top:'.$menu_item_margin_top.'px;' : 'padding-top:0px;';
	$menu_item_marginright = !empty($menu_item_margin_right) ? 'padding-right:'.$menu_item_margin_right.'px;' : 'padding-right:0px;';
	$menu_item_marginbottom = !empty($menu_item_margin_bottom) ? 'padding-bottom:'.$menu_item_margin_bottom.'px;' : 'padding-bottom:0px;';
	$menu_item_marginleft = !empty($menu_item_margin_left) ? 'padding-left:'.$menu_item_margin_left.'px;' : 'padding-left:0px;';
	
	$dropdown_paddingtop = !empty($dropdown_padding_top) ? 'padding-top:'.$dropdown_padding_top.'px;' : 'padding-top:0px;';
	$dropdown_paddingright = !empty($dropdown_padding_right) ? 'padding-right:'.$dropdown_padding_right.'px;' : 'padding-right:0px;';
	$dropdown_paddingbottom = !empty($dropdown_padding_bottom) ? 'padding-bottom:'.$dropdown_padding_bottom.'px;' : 'padding-bottom:0px;';
	$dropdown_paddingleft = !empty($dropdown_padding_left) ? 'padding-left:'.$dropdown_padding_left.'px;' : 'padding-left:0px;';
	
	

	if($canvas_bg_overlay_color != ''){
		$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas:after,
		#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas_sidebar:after{background:'.$canvas_bg_overlay_color.';}';
	}
	
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_button_content{' . esc_js(Zolo_Param_Padding::paddings_css($icon_padding)) . '}';
	
	if(!empty($button_text_font_size)){
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_header_hamburger_menu_text{font-size:'.$button_text_font_size.'px;}';
	}
	
	if($icon_background_color != ''){
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_button_content{background:'.$icon_background_color.';}';
	}
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content{' . esc_js(Zolo_Param_Padding::paddings_css($icon_margin)) . '}';	
	
	
	if($style == 'style1' || $style == 'style2' || $style == 'style3'){
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_header_hamburger_bar{background:'.$border_color.';}';	
	}
	if($style == 'style4'){
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_header_hamburger_menu{color:'.$border_color.';}';	
	}
	if($style == 'style5' || $style == 'style6'){
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_header_hamburger_menu .zolo_header_hamburger_bar:before,#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_header_hamburger_menu .zolo_header_hamburger_bar:after{background:'.$border_color.';}';
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_header_hamburger_menu_area .zolo_header_hamburger_bar_wrap{border-color:'.$border_color.';}';	
	}
	if($style == 'style7' || $style == 'style8' || $style == 'style9'){
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_header_hamburger_menu .zolo_header_hamburger_bar:before,#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_header_hamburger_menu .zolo_header_hamburger_bar:after{border-color:'.$border_color.';}';
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_header_hamburger_menu_area .zolo_header_hamburger_bar_wrap{border-color:'.$border_color.';}';	
	}
	
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_header_hamburger_menu_area .zolo_header_hamburger_text_hover_style1{color:'.$icon_text_color.';}';	
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_header_hamburger_menu_area .zolo_header_hamburger_text_hover_style1:before{color:'.$icon_text_hover_color.';}';	

// Menu 
if($hamburger_menu_action == 'extended_menu'){
	
if($menu_style == 'full_screen_menu'){

if($loader_style == 'svg'){
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas{background:none!important;}';
if($text_color != ''){
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas{color:'.$text_color.';}';
}
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .shape-overlays__path:nth-of-type(4) {fill:'.$svg_layer4_color.';}';
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .shape-overlays__path:nth-of-type(3){fill:'.$svg_layer3_color.';}';
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .shape-overlays__path:nth-of-type(2){fill:'.$svg_layer2_color.';}';
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .shape-overlays__path:nth-of-type(1) {fill:'.$svg_layer1_color.';}';

}else{
	
if($text_color != ''){
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas{color:'.$text_color.';}';
}
if($canvas_color != ''){
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas{background-color:'.$canvas_color.';}';
}
if($canvas_image != ''){
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas{
background-image: url('.$canvas_image.') !important;
background-position: center !important;
background-repeat: no-repeat !important;
background-size: cover !important;}';

}

	}

}

$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .full_screen_menu .zolo_header_primary_menu ul li a{color:'.$link_color.'!important;}';
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .full_screen_menu .zolo_header_primary_menu ul li a:hover{color:'.$link_hover_color.'!important;}';

$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .zolo_header_primary_menu ul li a{color:'.$link_color.';}';
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .zolo_header_primary_menu ul li a:hover{color:'.$link_hover_color.';}';


$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas{color:'.$text_color.';}';
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas a,
#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas a:before,
#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas a:after{color:'.$link_color.';}';
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas a:hover{color:'.$link_hover_color.';}';


if($menu_style == 'vertical_menu'){
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .zolo_header_primary_menu > ul > li > a{background:'.$link_bg_color.';'.$menu_item_padding_top.$menu_item_padding_right.$menu_item_padding_bottom.$menu_item_padding_left.'}';
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .zolo_header_primary_menu > ul > li{'.$menu_item_margintop.$menu_item_marginright.$menu_item_marginbottom.$menu_item_marginleft.'}';
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .zolo_header_primary_menu > ul > li > a:hover {background:'.$link_hover_bg_color.';}';
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_close_button{color:'.$border_color.';}';
}

if($menu_style == 'horizontal_menu'){
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas{background:'.$canvas_color.';}';
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .zolo_header_primary_menu > ul > li > a{'.$menu_item_padding_top.$menu_item_padding_right.$menu_item_padding_bottom.$menu_item_padding_left.'}';
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .zolo_header_primary_menu > ul > li{'.$menu_item_margintop.$menu_item_marginright.$menu_item_marginbottom.$menu_item_marginleft.'}';
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_close_button{color:'.$border_color.';}';
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas_menu.zolo_el_header_horizontal_menu .zolo_header_primary_menu > ul > li a .menu-text:after{background-color:'.$link_hover_color.';}';

// Dropdown Menu
if(substr_count($dropdown_box_shadow, 'disable') == 0) {
	$dropdown_box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($dropdown_box_shadow);
}

$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .zolo_header_primary_menu > ul li.menu-item-has-children ul.sub-menu{background:'.$dropdown_bg_color.';width:'.$dropdown_width.'px; -moz-border-radius:'.$dropdown_border_radius.'px; -webkit-border-radius:'.$dropdown_border_radius.'px; -ms-border-radius:'.$dropdown_border_radius.'px;border-radius:'.$dropdown_border_radius.'px;'.$dropdown_paddingtop.$dropdown_paddingright.$dropdown_paddingbottom.$dropdown_paddingleft.$dropdown_box_shadow.';text-align:'.$dropdown_menu_alignment.';white-space: inherit;}';

$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .zolo_header_primary_menu > ul ul.sub-menu li{white-space:normal;}';
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .zolo_header_primary_menu > ul ul.sub-menu li > a{padding:'.$dropdown_item_padding_top.'px '.$dropdown_item_padding_right.'px '.$dropdown_item_padding_bottom.'px '.$dropdown_item_padding_left.'px;}';

if($dropdown_menu_font_size != ''){
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .zolo_header_primary_menu > ul ul.sub-menu li > a span{font-size:'.$dropdown_menu_font_size.'px!important;}';
	}


if($dropdown_padding_top == '' || $dropdown_padding_top == '0'){

$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .zolo_header_primary_menu > ul li ul.sub-menu li:first-child > a{ 
-moz-border-top-left-radius:'.$dropdown_border_radius.'px; 
-webkit-border-top-left-radius:'.$dropdown_border_radius.'px; 
-ms-border-top-left-radius:'.$dropdown_border_radius.'px;
border-top-left-radius:'.$dropdown_border_radius.'px; 
-moz-border-top-right-radius:'.$dropdown_border_radius.'px; 
-webkit-border-top-right-radius:'.$dropdown_border_radius.'px; 
-ms-border-top-right-radius:'.$dropdown_border_radius.'px;
border-top-right-radius:'.$dropdown_border_radius.'px;
}';
}

if($dropdown_padding_bottom == '' || $dropdown_padding_bottom == '0'){
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .zolo_header_primary_menu > ul li ul.sub-menu li:last-child > a{ 
-moz-border-bottom-left-radius:'.$dropdown_border_radius.'px; 
-webkit-border-bottom-left-radius:'.$dropdown_border_radius.'px; 
-ms-border-bottom-left-radius:'.$dropdown_border_radius.'px;
border-bottom-left-radius:'.$dropdown_border_radius.'px; 
-moz-border-bottom-right-radius:'.$dropdown_border_radius.'px; 
-webkit-border-bottom-right-radius:'.$dropdown_border_radius.'px; 
-ms-border-bottom-right-radius:'.$dropdown_border_radius.'px;
border-bottom-right-radius:'.$dropdown_border_radius.'px;
}';
}


$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .zolo_header_primary_menu > ul ul.sub-menu li a{color:'.$dropdown_menu_color.';border-top:1px solid '.$dropdown_item_border_color.';border-bottom:0px;background:'.$dropdown_bg_color.';}';	
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .zolo_header_primary_menu > ul ul.sub-menu li > a:hover,
#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .zolo_header_primary_menu > ul ul.sub-menu li.current-menu-item > a,
#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .zolo_header_primary_menu > ul ul.sub-menu li.current_page_item > a{color:'.$dropdown_menu_hover_color.';}';

$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_header_primary_menu .zolo-megamenu-wrapper ul.sub-menu li a{border-top:1px solid '.$dropdown_item_border_color.'!important;}';	

if($dropdown_hover_style == 'background_style'){
	
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .zolo_header_primary_menu > ul ul.sub-menu li > a:hover,
#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .zolo_header_primary_menu > ul ul.sub-menu li.current-menu-item > a,
#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .zolo_header_primary_menu > ul ul.sub-menu li.current_page_item > a{background:'.$dropdown_menu_hover_bg_color.';}';
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .zolo_header_primary_menu > ul ul.sub-menu li > a .menu-text:after{display:none;}';

}else if($dropdown_hover_style == 'underline_style'){

$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .zolo_header_primary_menu > ul ul.sub-menu li > a .menu-text:after{background-color:'.$dropdown_menu_hover_underline_color.';}';

}

// Dropdown Menu

}



	
}

//Sidebar
if($hamburger_menu_action == 'extended_sidebar'){
	
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas_sidebar{
color:'.$text_color.';
background-color:'.$canvas_color.';
background-image: url('.$canvas_image.') !important;
background-position: center !important;
background-repeat: no-repeat !important;
background-size: cover !important;}';

$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas, 
#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .widget-title,
#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .zolo-about-me-name{color:'.$text_color.';}';

$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .widget a,
#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas a,
#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas a:before,
#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas a:after{color:'.$link_color.'!important;}';
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .widget a:hover,
#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas a:hover{color:'.$link_hover_color.'!important;}';

$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .widget.widget_pages li a, 
#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .widget .tagcloud a,
#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .widget li,
#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas .widget.widget_nav_menu li a{border-color:'.$sidebar_item_border_color.'!important;}';


if($extended_sidebar_position == 'right'){

	if($extended_sidebar_bg_image == 'slide'){ 
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas_sidebar{max-width:0px; width:100%;right:0px;top:0;height: 100vh;}';
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas_sidebar.open{max-width:'.$canvas_width.'px;}';
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .hamburger_extended_sidebar_maskopen{left:0;}';
	
	}else if($extended_sidebar_bg_image == 'fixed'){
	
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas_sidebar{max-width:'.$canvas_width.'px; width:100%;right:-'.$canvas_width.'px;top:0;height: 100vh;}';
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas_sidebar.open{right:0px;}';
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .hamburger_extended_sidebar_maskopen{left:0;}';

	}

}else if($extended_sidebar_position == 'left'){
	
	if($extended_sidebar_bg_image == 'slide'){ 
	
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas_sidebar{max-width:0px; width:100%;left:0px;top:0;height: 100vh;}';
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas_sidebar.open{max-width:'.$canvas_width.'px;}';
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .hamburger_extended_sidebar_maskopen{left:0px;}';
	
	}else if($extended_sidebar_bg_image == 'fixed'){
	
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas_sidebar{max-width:'.$canvas_width.'px; width:100%;left:-'.$canvas_width.'px;top:0;height: 100vh;}';
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas_sidebar.open{left:0px;}';
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .hamburger_extended_sidebar_maskopen{left:0px;}';
	}

}else if($extended_sidebar_position == 'top'){

$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas_sidebar{max-height:0px;height: 100%;width:100%;left: 0;top:0px;overflow: hidden;}';
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas_sidebar.open{max-height:'.$canvas_height.'px;}';
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .hamburger_extended_sidebar_maskopen{top:'.$canvas_width.'px;}';

}else if($extended_sidebar_position == 'bottom'){
	
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas_sidebar{max-height:0px;height:100%; width:100%;left: 0;bottom:0px;top:auto;}';
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_el_header_hamburger_canvas_sidebar.open{max-height:'.$canvas_height.'px;}';
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .hamburger_extended_sidebar_maskopen{top:-'.$canvas_width.'px;}';

}


}





$shortcode_css .= '
.apc-mask-wrapper {
	width: 100vw;
	height: 100vh;
	position: fixed;
	z-index: 9999;
	bottom: 100%;
	left: 0;
	visibility: hidden;
	pointer-events: none;
}

.apc-mask-wrapper.apc-layer-animate {
	visibility: visible;
}

.apc-mask-layer {
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	z-index: 9998;
}

/* Revealer effects */
.revealer {
	width: 100vw;
	height: 100vh;
	position: fixed;
	z-index: 1000;
	pointer-events: none;
}

.revealer-cornertopleft,
.revealer-cornertopright,
.revealer-cornerbottomleft,
.revealer-cornerbottomright {
	top: 50%;
	left: 50%;
}

.revealer-top,
.revealer-bottom {
	left: 0;
}

.revealer-right,
.revealer-left {
	top: 50%;
	left: 50%;
}

.revealer-top {
	bottom: 100%;
}

.revealer-bottom {
	top: 100%;
}

/* One layer effect (effect-1) */

.anim-effect-1 .apc-layer-animate .apc-mask-layer {
	-webkit-animation: anim-effect-1 1.5s cubic-bezier(0.2, 1, 0.3, 1) forwards;
	animation: anim-effect-1 1.5s cubic-bezier(0.2, 1, 0.3, 1) forwards;
}

@-webkit-keyframes anim-effect-1 {
	0% {
		-webkit-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
	}
	35%,
	65% {
		-webkit-transform: translate3d(0, -100%, 0);
		transform: translate3d(0, -100%, 0);
	}
	100% {
		-webkit-transform: translate3d(0, -200%, 0);
		transform: translate3d(0, -200%, 0);
	}
}

@keyframes anim-effect-1 {
	0% {
		-webkit-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
	}
	35%,
	65% {
		-webkit-transform: translate3d(0, -100%, 0);
		transform: translate3d(0, -100%, 0);
	}
	100% {
		-webkit-transform: translate3d(0, -200%, 0);
		transform: translate3d(0, -200%, 0);
	}
}


/* Two layer effect (effect-2) */

.anim-effect-2 .apc-layer-animate .apc-mask-layer {
	-webkit-animation: anim-effect-2-1 1.5s cubic-bezier(0.7, 0, 0.3, 1) forwards;
	animation: anim-effect-2-1 1.5s cubic-bezier(0.7, 0, 0.3, 1) forwards;
}

.anim-effect-2 .apc-layer-animate .apc-mask-layer:nth-child(2) {
	-webkit-animation-name: anim-effect-2-2;
	animation-name: anim-effect-2-2;
}

@-webkit-keyframes anim-effect-2-1 {
	0% {
		-webkit-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
	}
	30%,
	70% {
		-webkit-transform: translate3d(0, -100%, 0);
		transform: translate3d(0, -100%, 0);
		-webkit-animation-timing-function: cubic-bezier(0.7, 0, 0.3, 1);
		animation-timing-function: cubic-bezier(0.7, 0, 0.3, 1);
	}
	100% {
		-webkit-transform: translate3d(0, -200%, 0);
		transform: translate3d(0, -200%, 0);
	}
}

@keyframes anim-effect-2-1 {
	0% {
		-webkit-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
	}
	30%,
	70% {
		-webkit-transform: translate3d(0, -100%, 0);
		transform: translate3d(0, -100%, 0);
		-webkit-animation-timing-function: cubic-bezier(0.7, 0, 0.3, 1);
		animation-timing-function: cubic-bezier(0.7, 0, 0.3, 1);
	}
	100% {
		-webkit-transform: translate3d(0, -200%, 0);
		transform: translate3d(0, -200%, 0);
	}
}

@-webkit-keyframes anim-effect-2-2 {
	0%,
	14.5% {
		-webkit-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
	}
	37.5%,
	62.5% {
		-webkit-transform: translate3d(0, -100%, 0);
		transform: translate3d(0, -100%, 0);
		-webkit-animation-timing-function: cubic-bezier(0.7, 0, 0.3, 1);
		animation-timing-function: cubic-bezier(0.7, 0, 0.3, 1);
	}
	85.5%,
	100% {
		-webkit-transform: translate3d(0, -200%, 0);
		transform: translate3d(0, -200%, 0);
	}
}

@keyframes anim-effect-2-2 {
	0%,
	14.5% {
		-webkit-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
	}
	37.5%,
	62.5% {
		-webkit-transform: translate3d(0, -100%, 0);
		transform: translate3d(0, -100%, 0);
		-webkit-animation-timing-function: cubic-bezier(0.7, 0, 0.3, 1);
		animation-timing-function: cubic-bezier(0.7, 0, 0.3, 1);
	}
	85.5%,
	100% {
		-webkit-transform: translate3d(0, -200%, 0);
		transform: translate3d(0, -200%, 0);
	}
}


.anim-effect-3 .apc-layer-animate .apc-mask-layer {
	-webkit-animation: anim-effect-3-1 1.5s cubic-bezier(0.550, 0.055, 0.675, 0.190) forwards;
	animation: anim-effect-3-1 1.5s cubic-bezier(0.550, 0.055, 0.675, 0.190) forwards;
}

.anim-effect-3 .apc-layer-animate .apc-mask-layer:nth-child(2) {
	-webkit-animation-name: anim-effect-3-2;
	animation-name: anim-effect-3-2;
}

.anim-effect-3 .apc-layer-animate .apc-mask-layer:nth-child(3) {
	-webkit-animation-name: anim-effect-3-3;
	animation-name: anim-effect-3-3;
}

@-webkit-keyframes anim-effect-3-1 {
	0% {
		-webkit-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
	}
	25%,
	75% {
		-webkit-transform: translate3d(0, -100%, 0);
		transform: translate3d(0, -100%, 0);
		-webkit-animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
		animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
	}
	100% {
		-webkit-transform: translate3d(0, -200%, 0);
		transform: translate3d(0, -200%, 0);
	}
}

@keyframes anim-effect-3-1 {
	0% {
		-webkit-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
	}
	25%,
	75% {
		-webkit-transform: translate3d(0, -100%, 0);
		transform: translate3d(0, -100%, 0);
		-webkit-animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
		animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
	}
	100% {
		-webkit-transform: translate3d(0, -200%, 0);
		transform: translate3d(0, -200%, 0);
	}
}

@-webkit-keyframes anim-effect-3-2 {
	0%,
	12.5% {
		-webkit-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
	}
	37.5%,
	62.5% {
		-webkit-transform: translate3d(0, -100%, 0);
		transform: translate3d(0, -100%, 0);
		-webkit-animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
		animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
	}
	87.5%,
	100% {
		-webkit-transform: translate3d(0, -200%, 0);
		transform: translate3d(0, -200%, 0);
	}
}

@keyframes anim-effect-3-2 {
	0%,
	12.5% {
		-webkit-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
	}
	37.5%,
	62.5% {
		-webkit-transform: translate3d(0, -100%, 0);
		transform: translate3d(0, -100%, 0);
		-webkit-animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
		animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
	}
	87.5%,
	100% {
		-webkit-transform: translate3d(0, -200%, 0);
		transform: translate3d(0, -200%, 0);
	}
}

@-webkit-keyframes anim-effect-3-3 {
	0%,
	25% {
		-webkit-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
		-webkit-animation-timing-function: cubic-bezier(0.645, 0.045, 0.355, 1.000);
		animation-timing-function: cubic-bezier(0.645, 0.045, 0.355, 1.000);
	}
	75%,
	100% {
		-webkit-transform: translate3d(0, -200%, 0);
		transform: translate3d(0, -200%, 0);
	}
}

@keyframes anim-effect-3-3 {
	0%,
	25% {
		-webkit-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
		-webkit-animation-timing-function: cubic-bezier(0.645, 0.045, 0.355, 1.000);
		animation-timing-function: cubic-bezier(0.645, 0.045, 0.355, 1.000);
	}
	75%,
	100% {
		-webkit-transform: translate3d(0, -200%, 0);
		transform: translate3d(0, -200%, 0);
	}
}';

if($show_item_in_side_panel == 'enable'){
	
if($side_panel_alignment == 'right'){
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_header_hamburger_menu_area.show_item_in_side_panel_enable{right:'.$side_panel_right_offset.';}';
}else{
$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_header_hamburger_menu_area.show_item_in_side_panel_enable{left:'.$side_panel_left_offset.';}';
}

if($side_panel_vertical_alignment == 'top'){
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_header_hamburger_menu_area.show_item_in_side_panel_enable{top:'.$side_panel_top_offset.';}';

}else if($side_panel_vertical_alignment == 'middle'){
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_header_hamburger_menu_area.show_item_in_side_panel_enable{top:'.$side_panel_middle_offset.';}';

}else if($side_panel_vertical_alignment == 'bottom'){
	$shortcode_css .= '#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_header_hamburger_menu_area.show_item_in_side_panel_enable{bottom:'.$side_panel_bottom_offset.';top: auto;}';
}

if($hide_under_screen_size != ''){
$shortcode_css .= '@media (max-width:'.$hide_under_screen_size.'px) {#'.$zolo_hamburger_menu_id.'.zolo_el_header_hamburger_menu_content .zolo_header_hamburger_menu_area.show_item_in_side_panel_enable{display: none;} }';
}

}
	
//apcore_save_plugin_dyn_styles( $shortcode_css );
echo '<style>'.$shortcode_css.'</style>';
?>
</div>