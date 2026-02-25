<?php 
/*-----------------------------------------------------------------------------------*/
/* Header Search
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$social_profiles = $website_name = '';

extract( shortcode_atts( array(
	'style'							=> 'style1',
	'search_icon_color'				=> '#1769ff',
	'icon_size'						=> '26',
	'button_margin_top'				=> '',
	'button_margin_right'			=> '',
	'button_margin_bottom'			=> '',
	'button_margin_left'			=> '',
	'canvas_color'					=> '#ffffff',
	'border_color'					=> '#1c1c1c',
	'text_color'					=> '#1c1c1c',
	'link_color'					=> '#1c1c1c',
	'link_hover_color'				=> '#1769ff',
	'color_scheme'					=> 'primary_color_scheme',
	'button_custom_color'			=> '#1769ff',
	'select_search_design'			=> 'full_screen',
	'expanded_search_position'		=> 'right',
	'select_search_type'			=> 'default',
	'apress_hamburger_search_template'=> '',
	'search_box_position'			=> '',
	'radius_top_left'				=> '',
	'radius_top_right'				=> '',
	'radius_bottom_right'			=> '',
	'radius_bottom_left'			=> '',
	'box_shadow'					=> 'box_shadow_enable:disable|shadow_horizontal:0|shadow_vertical:2|shadow_blur:10|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
	
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
	$zolo_hamburger_search_id = 'zolo_hamburger_search_'.$uniqid;
	
	if($color_scheme == 'design_your_own'){
		$key = '';
		$button_color_scheme = 'background:'.$button_custom_color.';';
	}else{
		$key = $color_scheme;
		$button_color_scheme = apcore_shortcodes_background_color_scheme($key);
	}
	if($select_search_design == 'expanded'){
		$expanded_search_position_value = 'search_position_'.$expanded_search_position;
	}else{
		$expanded_search_position_value = '';
		}
	if(substr_count($box_shadow, 'disable') == 0) {
		$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
	}

	?>
	
    
    <div class="header_module_wrapper <?php echo 'search_design_'.$select_search_design.'_wrapper';?>">
        
    <div id="<?php echo $zolo_hamburger_search_id;?>" class="zolo_el_header_builder_search_content <?php echo 'search_design_'.$select_search_design;?> <?php echo $expanded_search_position_value;?>" data-id="<?php echo $zolo_hamburger_search_id;?>">
    
    <div class="zolo_el_header_builder_canvas">
        
        <?php if($select_search_design == 'full_screen'){
		echo '<a class="zolo_el_header_hamburger_close_button">Close</a>';
		}?>
        
		<?php //Menu Content
		 
		if ( $select_search_type == 'page_builder' &&  $apress_hamburger_search_template ) {

		$getFooterPost = get_post( $apress_hamburger_search_template );  
		
		if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
			$vc_enabled	  = ( $getFooterPost->post_content && ('<p>[vc_' || substr( $getFooterPost->post_content, 0, 4 ) === '[vc_' ) ) ? true : false;
			if ( ! $vc_enabled ) {
				echo '<div class="zolo-container"><div class="zolo_footer_padding">'.$getFooterPost->post_content.'</div></div>';
			} else {
				echo '<div class="zolo-container"><div class="zolo_footer_padding">'.do_shortcode( $getFooterPost->post_content ).'</div></div>';
			}		
		}
    
	
	
	}else{?>
		
        <div class="apcore_hb_full_screen_search">
        <div class="zolo-container">
        
        <?php if($select_search_design == 'slide_down'){
                echo '<div class="apcore_hb_search_slide_down_form">';
                }?>
		<?php get_search_form();?>
        <?php if($select_search_design == 'expanded' || $select_search_design == 'slide_down'){
                echo '<span class="zolo_el_header_hamburger_close_button"></span>';
                }?>
        <?php if($select_search_design == 'slide_down'){
                echo '</div>';
                }?>
        </div>
    	</div>
        
		<?php }?>

    </div>
    
    <!-- Button Code Start -->
    <div class="zolo_el_header_search_button zolo_header_hamburger_search_area  <?php echo 'zolo_header_hamburger_search_'.$style;?>">
    
        	<span class="zolo_header_hamburger_search <?php echo 'hamburger_search_'.$style;?>">
            	<?php if($select_search_design == 'default'){
                echo '<span class="zolo_el_header_hamburger_close_button"></span>';
                }?>
                <span class="zolo_el_header_hamburger_open_button">
				<?php if($style == 'style1'){?>
                <svg fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50"><path d="M 21 3 C 11.621094 3 4 10.621094 4 20 C 4 29.378906 11.621094 37 21 37 C 24.710938 37 28.140625 35.804688 30.9375 33.78125 L 44.09375 46.90625 L 46.90625 44.09375 L 33.90625 31.0625 C 36.460938 28.085938 38 24.222656 38 20 C 38 10.621094 30.378906 3 21 3 Z M 21 5 C 29.296875 5 36 11.703125 36 20 C 36 28.296875 29.296875 35 21 35 C 12.703125 35 6 28.296875 6 20 C 6 11.703125 12.703125 5 21 5 Z"/></svg>
                <?php }else if($style == 'style2'){?>
                <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" xml:space="preserve">
                  <path class="cls-1" d="M26,45A19,19,0,1,1,45,26,19,19,0,0,1,26,45ZM26,9A17,17,0,1,0,43,26,17,17,0,0,0,26,9Z"/>
                  <path class="cls-1" d="M43,44a1,1,0,0,1-.71-.29l-4-4a1,1,0,0,1,1.42-1.42l4,4a1,1,0,0,1,0,1.42A1,1,0,0,1,43,44Z"/>
                  <path class="cls-1" d="M53.14,57a3.85,3.85,0,0,1-2.73-1.13L40.29,45.75a1,1,0,0,1-.29-.7,1,1,0,0,1,.29-.71l4.05-4.05a1,1,0,0,1,1.41,0L55.87,50.41h0A3.86,3.86,0,0,1,53.14,57Zm-10.73-12,9.41,9.41a1.87,1.87,0,0,0,2.64-2.64l-9.41-9.41Z"/>
                  <path class="cls-1" d="M39,27a1,1,0,0,1-1-1A12,12,0,0,0,26,14a1,1,0,0,1,0-2A14,14,0,0,1,40,26,1,1,0,0,1,39,27Z"/>
                </svg>
                
                <?php }?>
                </span>
           </span>

    </div>
    <!-- Button Code End -->
    
    
    </div>
    </div>
    
	
<?php 
	$shortcode_css = '';
	$button_margintop = !empty($button_margin_top) ? 'padding-top:'.$button_margin_top.'px;' : '';
	$button_marginright = !empty($button_margin_right) ? 'padding-right:'.$button_margin_right.'px;' : '';
	$button_marginbottom = !empty($button_margin_bottom) ? 'padding-bottom:'.$button_margin_bottom.'px;' : '';
	$button_marginleft = !empty($button_margin_left) ? 'padding-left:'.$button_margin_left.'px;' : '';
	$shortcode_css .= '#'.$zolo_hamburger_search_id.'.zolo_el_header_builder_search_content{'.$button_margintop.$button_marginright.$button_marginbottom.$button_marginleft.'}';	
	$shortcode_css .= '#'.$zolo_hamburger_search_id.'.zolo_el_header_builder_search_content .zolo_header_hamburger_search{ width:'.$icon_size.'px;}';	
	$shortcode_css .= '#'.$zolo_hamburger_search_id.'.zolo_el_header_builder_search_content .zolo_header_hamburger_search svg{fill:'.$search_icon_color.';}';	


$shortcode_css .= '#'.$zolo_hamburger_search_id.'.zolo_el_header_builder_search_content .zolo_el_header_builder_canvas{background:'.$canvas_color.'; color:'.$text_color.';}';
$shortcode_css .= '#'.$zolo_hamburger_search_id.'.zolo_el_header_builder_search_content .zolo_el_header_builder_canvas input[type="search"]{border-color:'.$border_color.';color:'.$text_color.';}';

//Search Design Full Screen

if($select_search_design == 'full_screen'){
	
$shortcode_css .= '#'.$zolo_hamburger_search_id.'.zolo_el_header_builder_search_content .zolo_el_header_builder_canvas a{color:'.$link_color.'!important;}';
$shortcode_css .= '#'.$zolo_hamburger_search_id.'.zolo_el_header_builder_search_content .zolo_el_header_builder_canvas a:hover{color:'.$link_hover_color.'!important;}';

}

//Search Design Expanded

if($select_search_design == 'expanded'){
	
$shortcode_css .= '#'.$zolo_hamburger_search_id.'.zolo_el_header_builder_search_content .zolo_el_header_hamburger_close_button {color:'.$text_color.';}';

}



//Search Design Default
if($select_search_design == 'default'){

$search_box_position = !empty($search_box_position) ? 'top:'.$search_box_position.'px;' : '';
$shortcode_css .= '#'.$zolo_hamburger_search_id.'.search_design_default .zolo_el_header_builder_canvas{'.$box_shadow.'}';
$shortcode_css .= '#'.$zolo_hamburger_search_id.'.search_design_default .zolo_el_header_builder_canvas{'.$search_box_position.'}';
if($radius_top_left != ''){
	$shortcode_css .= '#'.$zolo_hamburger_search_id.'.search_design_default .zolo_el_header_builder_canvas{border-top-left-radius:'.$radius_top_left.'px; -moz-border-top-left-radius:'.$radius_top_left.'px; -webkit-border-top-left-radius:'.$radius_top_left.'px;}';
	}
if($radius_top_right != ''){
	$shortcode_css .= '#'.$zolo_hamburger_search_id.'.search_design_default .zolo_el_header_builder_canvas{border-top-right-radius:'.$radius_top_right.'px; -moz-border-top-right-radius:'.$radius_top_right.'px; -webkit-border-top-right-radius:'.$radius_top_right.'px;}';
	}
if($radius_bottom_right != ''){
	$shortcode_css .= '#'.$zolo_hamburger_search_id.'.search_design_default .zolo_el_header_builder_canvas{border-bottom-right-radius:'.$radius_bottom_right.'px; -moz-border-bottom-right-radius:'.$radius_bottom_right.'px; -webkit-border-bottom-right-radius:'.$radius_bottom_right.'px;}';
	}
if($radius_bottom_left != ''){
	$shortcode_css .= '#'.$zolo_hamburger_search_id.'.search_design_default .zolo_el_header_builder_canvas{border-bottom-left-radius:'.$radius_bottom_left.'px; -moz-border-bottom-left-radius:'.$radius_bottom_left.'px; -webkit-border-bottom-left-radius:'.$radius_bottom_left.'px;}';
	}
$shortcode_css .= '#'.$zolo_hamburger_search_id.'.zolo_el_header_builder_search_content .zolo_header_hamburger_search .zolo_el_header_hamburger_close_button {color:'.$search_icon_color.';}';
$shortcode_css .= '#'.$zolo_hamburger_search_id.'.search_design_default .zolo_el_header_builder_canvas .search-form .search-submit{'.$button_color_scheme.'}';

}

	
apcore_save_plugin_dyn_styles( $shortcode_css );