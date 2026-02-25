<?php 
/*-----------------------------------------------------------------------------------*/
/* Header Minimal Search
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$social_profiles = $website_name = '';

extract( shortcode_atts( array(

	'search_box_border_top'			=> '0',
	'search_box_border_right'		=> '0',
	'search_box_border_bottom'		=> '1',
	'search_box_border_left'		=> '0',
	'border_radius'					=> '0',
	'search_margin_top'				=> '',
	'search_margin_right'			=> '',
	'search_margin_bottom'			=> '',
	'search_margin_left'			=> '',
	'text_color'					=> '#1c1c1c',
	'input_bg_color'				=> '#ffffff',
	'border_color'					=> '#1c1c1c',
	'button_bg_color'				=> '',
	'button_icon_color'				=> '',
	'button_max_width'				=> '50',
	'search_font_options'			=> '',
	'search_google_fonts'			=> '',
	'search_custom_fonts'			=> '',
	'input_max_width'				=> '240',
	'input_max_width_small_desktop'	=> '',
	'input_max_width_tablet'		=> '',
	'input_max_width_mobile'		=> '',
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
	$apcore_hb_minimal_search_id = 'apcore_hb_minimal_search_'.$uniqid;
	$search_options = _zolo_parse_text_shortcode_params($search_font_options, 'zolo_search_text', $search_google_fonts, $search_custom_fonts);
	?>
	
    
    <div class="header_module_wrapper">
    <div id="<?php echo $apcore_hb_minimal_search_id;?>" class="apcore_hb_minimal_search_content">
    <div class="apcore_hb_minimal_search" <?php echo $search_options['style']?>>
    	<?php get_search_form();?>
    </div>
    </div>
    </div>
    
	
<?php
	$shortcode_css = '';
	$search_margintop = !empty($search_margin_top) ? 'padding-top:'.$search_margin_top.'px;' : '';
	$search_marginright = !empty($search_margin_right) ? 'padding-right:'.$search_margin_right.'px;' : '';
	$search_marginbottom = !empty($search_margin_bottom) ? 'padding-bottom:'.$search_margin_bottom.'px;' : '';
	$search_marginleft = !empty($search_margin_left) ? 'padding-left:'.$search_margin_left.'px;' : '';
	
	$search_box_border_top = !empty($search_box_border_top) ? 'border-top-width:'.$search_box_border_top.'px;' : '';
	$search_box_border_right = !empty($search_box_border_right) ? 'border-right-width:'.$search_box_border_right.'px;' : '';
	$search_box_border_bottom = !empty($search_box_border_bottom) ? 'border-bottom-width:'.$search_box_border_bottom.'px;' : '';
	$search_box_border_left = !empty($search_box_border_left) ? 'border-left-width:'.$search_box_border_left.'px;' : '';
	
	$shortcode_css .= '#'.$apcore_hb_minimal_search_id.'.apcore_hb_minimal_search_content{'.$search_margintop.$search_marginright.$search_marginbottom.$search_marginleft.'}';	
	
	$shortcode_css .= '#'.$apcore_hb_minimal_search_id.'.apcore_hb_minimal_search_content .apcore_hb_minimal_search input[type="search"]{width:'.$input_max_width.'px;color:'.$text_color.';border-color:'.$border_color.';'.$search_box_border_top.$search_box_border_right.$search_box_border_bottom.$search_box_border_left.'; -moz-border-radius:'.$border_radius.'px;-webkit-border-radius:'.$border_radius.'px;border-radius:'.$border_radius.'px;background:'.$input_bg_color.';}';
	$shortcode_css .= '#'.$apcore_hb_minimal_search_id.'.apcore_hb_minimal_search_content .search-form::after{width:'.$button_max_width.'px;}';
	$shortcode_css .= '#'.$apcore_hb_minimal_search_id.'.apcore_hb_minimal_search_content .search-form .search-submit{width:'.$button_max_width.'px;}';
	if($button_icon_color != ''){
		$shortcode_css .= '#'.$apcore_hb_minimal_search_id.'.apcore_hb_minimal_search_content .search-form::after{color:'.$button_icon_color.';}';
	}else{
		$shortcode_css .= '#'.$apcore_hb_minimal_search_id.'.apcore_hb_minimal_search_content .search-form::after{color:'.$text_color.';}';
		}
	if($button_bg_color != ''){
		$shortcode_css .= '#'.$apcore_hb_minimal_search_id.'.apcore_hb_minimal_search_content .search-form::before{background:'.$button_bg_color.';width:'.$button_max_width.'px; -moz-border-top-right-radius:'.$border_radius.'px;-webkit-border-top-right-radius:'.$border_radius.'px;border-top-right-radius:'.$border_radius.'px;-moz-border-bottom-right-radius:'.$border_radius.'px;-webkit-border-bottom-right-radius:'.$border_radius.'px;border-bottom-right-radius:'.$border_radius.'px;}';
	}
	
if($input_max_width_small_desktop != ''){
	$shortcode_css .= '@media (max-width: 1280px) and (min-width: 1024px) {#'.$apcore_hb_minimal_search_id.'.apcore_hb_minimal_search_content .apcore_hb_minimal_search input[type="search"]{width:'.$input_max_width_small_desktop.'px;}}';
}
	
if($input_max_width_tablet != ''){
	$shortcode_css .= '@media (max-width: 1023px) and (min-width: 769px) {#'.$apcore_hb_minimal_search_id.'.apcore_hb_minimal_search_content .apcore_hb_minimal_search input[type="search"]{width:'.$input_max_width_tablet.'px;}}';
}

if($input_max_width_mobile != ''){
	$shortcode_css .= '@media (max-width: 768px) {#'.$apcore_hb_minimal_search_id.'.apcore_hb_minimal_search_content .apcore_hb_minimal_search input[type="search"]{width:'.$input_max_width_mobile.'px;}}';
}
	

	
apcore_save_plugin_dyn_styles( $shortcode_css );