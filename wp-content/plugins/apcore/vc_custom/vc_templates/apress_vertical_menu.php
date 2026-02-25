<?php 
/*-----------------------------------------------------------------------------------*/
/* Vertical Menu
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$social_profiles = $website_name = '';

extract( shortcode_atts( array(
	'menu_design'					=> 'menu_design1',
	'hover_style'					=> 'menu_hover_style1',
	'apress_primary_menu'			=> '',
	'vertical_menu_max_width'		=> '',
	'vertical_menu_alignment'		=> 'left',
	'menu_border_width'				=> '2',
	'menu_hover_border_color'		=> '#1769ff',
	'menu_hover_bg_color'			=> '#1769ff',
	'menu_hover_bg_radius'			=> '0',
	'menu_color'					=> '#4f4f4f',
	'menu_hover_color'				=> '#1769ff',
	'vertical_hover_color1'			=> '#D9250C',
	'vertical_hover_color2'			=> '#F2670D',
	'vertical_hover_color3'			=> '#EBD789',
	'vertical_hover_color4'			=> '#A450D9',
	'vertical_hover_color5'			=> '#5D23BF',
	'vertical_hover_color6'			=> '#D2A918',
	'vertical_hover_styling'		=> 'single_color',
	'vertical_hover_single_color'	=> '#6ca0ff',
	'menu_description_color'		=> '#1769ff',
	'menu_font_options'				=> '',
	'menu_text_transform'			=> 'inherit',
	'menu_google_fonts'				=> '',
	'menu_custom_fonts'				=> '',
	'menu_responsive'				=> '',
	'menu_padding'					=> 'padding-top:10|padding-bottom:10|padding-left:20|padding-right:20',
	'menu_margin'					=> '',	
	'underline_width'			=> '3',
	'underline_height'			=> '4',
	'underline_color'			=> '#dddddd',
	'underline_hover_color'		=> '#1769ff',
	'menu_description_overlay_color'=> '#ffffff',
	'dropdown_width'			=> '210',
	'dropdown_menu_alignment'	=> 'left',
	'dropdown_menu_font_size'	=> '',
	'dropdown_menu_color'		=> '#4f4f4f',
	'dropdown_menu_hover_color'	=> '#1769ff',
	'dropdown_item_padding_top'	=> '10',
	'dropdown_item_padding_right'=> '0',
	'dropdown_item_padding_bottom'=> '10',
	'dropdown_item_padding_left'=> '0',
	'dropdown_hover_style'		=> 'dropdown_hover_style_none',
	
	'class'							=> '',
	'data_animation'				=> 'noanimation',
	'data_delay'					=> '500',
	
), $atts ) );

			
	//Animation
	if($data_animation == 'noanimation'){
		$animatedclass = '';
	}else{
		$animatedclass = 'animated hiding';
	}
	
	$uniqid = uniqid(rand());
	$zolo_primary_menu_id = 'zolo_primary_menu_'.$uniqid;
	
	$menu_typo_options = _zolo_parse_text_shortcode_params($menu_font_options, 'zolo_button_text', $menu_google_fonts, $menu_custom_fonts);

	
	if($menu_design == 'menu_design8'){
		$vertical_menu_alignment_class = 'vertical_menu_alignment_'.$vertical_menu_alignment;
	}else{
		$vertical_menu_alignment_class = "";
		}
	
	if($menu_design == 'menu_design1'){
			$menu_depth = 3;
		}else{
			$menu_depth = 1;
			}
	
	if( is_nav_menu( $apress_primary_menu ) ) :
		
			$wp_nav_menu_option = array(  
				'theme_location'  	=> 'primary-nav', 
				'menu'           	=> $apress_primary_menu,
				'container'       	=> false,            
				'container_id'    	=> 'main-nav',  
				'container_class' 	=> $menu_design,  
				'menu_class' 	  	=> 'nav zolo-navbar-nav',
				'items_wrap'      	=> '<ul id="%1$s" class="%2$s" ' . $menu_typo_options['style'] . '>%3$s</ul>',
				'menu_id'         	=> 'primary' ,
				'fallback_cb'       => 'Menu_With_Description::fallback',
				'link_before'    	=> '<span class="menu_item_name_reveal"><span class="menu_item_name"><span class="menu_item_name_text">',
				'link_after'    	=> '</span></span></span>',
				'depth'           	=> $menu_depth,
				'walker'    		=> new Menu_With_Description()
			);
		  
		
		else:

			$wp_nav_menu_option = array(
				'container'       	=> false,            
				'container_id'    	=> 'main-nav',  
				'container_class' 	=> '',  
				'menu_class' 	  	=> 'nav zolo-navbar-nav',
				'items_wrap'      	=> '<ul id="%1$s" class="%2$s" ' . $menu_typo_options['style'] . '>%3$s</ul>',
				'fallback_cb'       => 'Menu_With_Description::fallback',
				'link_before'    	=> '<span class="menu_item_name_reveal"><span class="menu_item_name"><span class="menu_item_name_text">',
				'link_after'    	=> '</span></span></span>',
				'depth'           	=> $menu_depth,
				'walker'    		=> new Menu_With_Description()
			);
	
		endif;
		/*
			if( is_nav_menu( $apress_primary_menu ) ) :
		
			$wp_nav_menu_option = array(  
				'theme_location'  	=> 'primary-nav', 
				'menu'           	=> $apress_primary_menu,
				'container'       	=> false,            
				'container_id'    	=> 'main-nav',  
				'container_class' 	=> '',  
				'menu_class' 	  	=> 'nav zolo-navbar-nav',
				'items_wrap'      	=> '<ul id="%1$s" class="%2$s" ' . $menu_typo_options['style'] . '>%3$s</ul>',
				'menu_id'         	=> 'primary' ,
				'fallback_cb'       => 'ZOLOCoreFrontendWalker::fallback',
				'link_before'    	=> '<span class="menu-text">',
				'link_after'    	=> '</span>',
				'depth'           	=> $menu_depth,
				'walker'    		=> new ZOLOCoreFrontendWalker()
			);
		  
		
		else:

			$wp_nav_menu_option = array(
				'container'       	=> false,            
				'container_id'    	=> 'main-nav',  
				'container_class' 	=> '',  
				'menu_class' 	  	=> 'nav zolo-navbar-nav',
				'items_wrap'      	=> '<ul id="%1$s" class="%2$s" ' . $menu_typo_options['style'] . '>%3$s</ul>',
				'fallback_cb'       => 'ZOLOCoreFrontendWalker::fallback',
				'link_before'    	=> '<span class="menu-text">',
				'link_after'    	=> '</span>',
				'depth'           	=> $menu_depth,
				'walker'    		=> new ZOLOCoreFrontendWalker()
			);
	
		endif;*/
		
		
		
	if($menu_design == 'menu_design5' || $menu_design == 'menu_design6' || $menu_design == 'menu_design7' || $menu_design == 'menu_design8' || $menu_design == 'menu_design9' || $menu_design == 'menu_design10'){
		wp_enqueue_script('charming.min');
		wp_enqueue_script('fancymenu');
	
	};		
		
	?>

<div class="header_module_wrapper fancy_menu <?php echo $menu_design;?>" data-menutype="<?php echo $menu_design;?>">
  <?php 
		echo '<div id="'.$zolo_primary_menu_id.'" class="zolo_element_vertical_menu zolo_element_vertical_'.$menu_design.'  '.$class.' '.$data_animation.' '.$vertical_menu_alignment_class.'" data-delay = "'.$data_delay.'">';
		
		
		if($menu_design == 'menu_design1'){
			
			echo '<nav class="main-navigation zolo_header_primary_menu '.$hover_style.' vertical '.$dropdown_hover_style.'">';
		}else{
			echo '<nav class="main-navigation zolo_header_primary_menu vertical">';
			}
        
		wp_nav_menu($wp_nav_menu_option);
		
		echo '</nav>';
		echo '</div>';
	 ?>
</div>
<?php 
	$shortcode_css = '';
	$shortcode_css .= '#'. esc_js($zolo_primary_menu_id) .' .zolo_header_primary_menu ul > li{' . esc_js(Zolo_Param_Padding::paddings_css($menu_margin)) . '}';
	$shortcode_css .= '#'. esc_js($zolo_primary_menu_id) .' .zolo_header_primary_menu ul > li{text-transform:'.$menu_text_transform.'}';
	
	$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > li > a{color:'.$menu_color.'!important;}';
	

	if($menu_design == 'menu_design1'){
			$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu > li > a.current,#'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current-menu-ancestor > a,#'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current_page_item > a, #'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current-menu-item > a,#'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current-menu-parent > a, #'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li:hover > a, #'.$zolo_primary_menu_id.'.ascending_reveal .zolo_header_primary_menu > ul > li:hover > a .menu_item_name_text{color:'.$menu_hover_color.'!important;}';		

	}else if($menu_design == 'menu_design2'){
		
		if($vertical_hover_styling != 'multi_color'){
		$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu > li > a.current,#'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current-menu-ancestor > a,#'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current_page_item > a, #'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current-menu-item > a,#'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current-menu-parent > a, #'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li > a:hover, #'.$zolo_primary_menu_id.'.ascending_reveal .zolo_header_primary_menu > ul > li > a:hover .menu_item_name_text{color:'.$vertical_hover_single_color.'!important;}';
		}
		
	}else if($menu_design == 'menu_design5'){
		
		if($vertical_hover_styling != 'multi_color'){
		$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu > li > a.current,#'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current-menu-ancestor > a,#'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current_page_item > a, #'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current-menu-item > a,#'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current-menu-parent > a, #'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li > a:hover, #'.$zolo_primary_menu_id.'.ascending_reveal .zolo_header_primary_menu > ul > li > a:hover .menu_item_name_text{color:'.$menu_color.'!important;}';
		}
		
	}else{
		$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu > li > a.current,#'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current-menu-ancestor > a,#'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current_page_item > a, #'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current-menu-item > a,#'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current-menu-parent > a, #'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li > a:hover , #'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li > a:hover, #'.$zolo_primary_menu_id.'.ascending_reveal .zolo_header_primary_menu > ul > li > a:hover .menu_item_name_text{color:'.$menu_hover_color.'!important;}';
		
		}

$shortcode_css .= '.zolo_header_primary_menu.vertical ul li,.zolo_header_primary_menu.vertical ul li a,.menu_item_name, .menu_item_label{text-decoration:inherit;}';
$shortcode_css .= '.zolo_header_primary_menu.vertical ul li .menu_item_label{display: block;}';

if($menu_design == 'menu_design1'){

$shortcode_css .= '#'. esc_js($zolo_primary_menu_id) .' .zolo_header_primary_menu ul > li > a{' . esc_js(Zolo_Param_Padding::paddings_css($menu_padding)) . '}';


if($hover_style == 'menu_hover_style2'){
	
	$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu > li > a.current,#'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current-menu-ancestor > a,#'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current_page_item > a, #'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current-menu-item > a,#'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current-menu-parent > a, #'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li:hover > a{background:'.$menu_hover_bg_color.';}';

if($menu_hover_bg_radius != ''){
	$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li > a{
-moz-border-radius:'.$menu_hover_bg_radius.'px; 
-webkit-border-radius:'.$menu_hover_bg_radius.'px; 
-ms-border-radius:'.$menu_hover_bg_radius.'px;
border-radius:'.$menu_hover_bg_radius.'px;
	}';
}


}else if($hover_style == 'menu_hover_style3' || $hover_style == 'menu_hover_style4' || $hover_style == 'menu_hover_style5' || $hover_style == 'menu_hover_style6' || $hover_style == 'menu_hover_style7' || $hover_style == 'menu_hover_style8'){
	
	$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li > a:after{border-color:'.$menu_hover_border_color.';}';
	$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li > a:before{border-color:'.$menu_hover_border_color.';}';
	
	}
	
if($hover_style == 'menu_hover_style3' || $hover_style == 'menu_hover_style4' || $hover_style == 'menu_hover_style5' || $hover_style == 'menu_hover_style7'){
	
	$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li > a:after{border-bottom-width:'.$menu_border_width.'px;border-top-width:'.$menu_border_width.'px;}';
	
	}

if($hover_style == 'menu_hover_style6'){
	
	$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li > a:before{border-width: '.$menu_border_width.'px 0 '.$menu_border_width.'px 0;}';
	$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li > a:after{border-width: 0 '.$menu_border_width.'px 0 '.$menu_border_width.'px;}';

	
	}
if($hover_style == 'menu_hover_style8'){
	
	$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li > a:after,#'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li > a:before{border-bottom-width:'.$menu_border_width.'px;}';
	
	}

if($hover_style == 'menu_hover_style9'){
	
	$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li:hover > a:after,
	#'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current-menu-parent > a:after,
	#'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current-menu-item > a:after,
	#'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current_page_item > a:after,
	#'.$zolo_primary_menu_id.' .zolo_header_primary_menu ul > .current-menu-ancestor > a:after,
	#'.$zolo_primary_menu_id.' .zolo_header_primary_menu > li > a.current:after{text-shadow: 10px 0 '.$menu_hover_color.', -10px 0 '.$menu_hover_color.';
	color: '.$menu_hover_color.';}';
	
	}
	
if($hover_style == 'menu_hover_style10'){
	
	$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li > a:after,
	#'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li > a:before{border-color:'.$menu_hover_color.';}';
	
	}
if($hover_style == 'menu_hover_style12'){
	
	$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu > ul > li > a:after{background-color:'.$menu_hover_color.';}';
	
	}	

//Dropdown Start

$dropdown_item_padding_top = !empty($dropdown_item_padding_top) ? $dropdown_item_padding_top : '0';
$dropdown_item_padding_right = !empty($dropdown_item_padding_right) ? $dropdown_item_padding_right : '0';
$dropdown_item_padding_bottom = !empty($dropdown_item_padding_bottom) ? $dropdown_item_padding_bottom : '0';
$dropdown_item_padding_left = !empty($dropdown_item_padding_left) ? $dropdown_item_padding_left : '0';

$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu.vertical ul ul.sub-menu li > a{padding:'.$dropdown_item_padding_top.'px '.$dropdown_item_padding_right.'px '.$dropdown_item_padding_bottom.'px 0px;}';

$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu.vertical ul ul.sub-menu li > a .menu-text{padding:0 0 0 '.$dropdown_item_padding_left.'px;}';

if($dropdown_width != ''){
	$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu.vertical ul ul.sub-menu{width:'.$dropdown_width.'px;}';
	}	
$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu.vertical ul ul.sub-menu{text-align:'.$dropdown_menu_alignment.';}';

if($dropdown_menu_font_size != ''){
	$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu.vertical ul ul.sub-menu li > a{font-size:'.$dropdown_menu_font_size.'px; line-height: normal;}';
	}	
$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu.vertical ul ul.sub-menu li > a{color:'.$dropdown_menu_color.'}';

$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu.vertical ul ul.sub-menu li > a:hover,
#'.$zolo_primary_menu_id.' .zolo_header_primary_menu.vertical ul ul.sub-menu li.current-menu-item > a,
#'.$zolo_primary_menu_id.' .zolo_header_primary_menu.vertical ul ul.sub-menu li.current_page_item > a{color:'.$dropdown_menu_hover_color.';}';

$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu.vertical ul ul.sub-menu li > a .menu-text:after{background-color:'.$dropdown_menu_hover_color.'}';


//Dropdown End

}elseif($menu_design == 'menu_design2'){
	

$shortcode_css .= "

.menu_item_name, .menu_item_label {
	position: relative;
	display: inline-block;
}
.menu_item_label {
	margin: 0 0 0 0.5em;
}
.zolo_element_vertical_menu_design2 .menu_item_name {
	padding: 0 0.35em;
	transition: transform 0.5s, color 0.5s;
	transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
}
.zolo_element_vertical_menu_design2 .menu_item_name::before {
	content: '';
	position: absolute;
	z-index: -1;
	bottom: 0;
	left: 0;
	width: 100%;
	height: 50%;
	transform: scale3d(0, 1, 1);
	transform-origin: 0% 50%;
	transition: transform 0.5s;
	transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
}
.zolo_element_vertical_menu_design2 .menu_item_label {
	font-size:0.6em;
	letter-spacing: 0.05em;
	transform: translate3d(-0.5em, 0, 0);
	transition: transform 0.5s, color 0.5s;
	transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
}
.zolo_element_vertical_menu_design2 .menu_item_label::before {
	content: '';
	position: absolute;
	z-index: -1;
	top: 1.25em;
	left: 0.05em;
	width: 25%;
	height: 1px;
	transform: scale3d(0, 1, 1);
	transform-origin: 100% 50%;
	transition: transform 0.5s;
	transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
}
/* Hover */

.zolo_element_vertical_menu_design2 .current-menu-item .menu_item .menu_item_name::before,.zolo_element_vertical_menu_design2 .current-menu-item .menu_item .menu_item_label::before,
.zolo_element_vertical_menu_design2 .menu_item:hover .menu_item_name::before, .zolo_element_vertical_menu_design2 .menu_item:focus .menu_item_name::before, .zolo_element_vertical_menu_design2 .menu_item:hover .menu_item_label::before, .zolo_element_vertical_menu_design2 .menu_item:focus .menu_item_label::before {
	transform: scale3d(1, 1, 1);
}
.zolo_element_vertical_menu_design2 .current-menu-item .menu_item .menu_item_label,
.zolo_element_vertical_menu_design2 .menu_item:hover .menu_item_label, .zolo_element_vertical_menu_design2 .menu_item:focus .menu_item_label {
	transform: translate3d(0, 0, 0);
}
.zolo_element_vertical_menu_design2 .menu_item:hover .menu_item_label::before, .zolo_element_vertical_menu_design2 .menu_item:focus .menu_item_label::before {
	transform-origin: 0% 50%;
	transition-timing-function: ease;
}
.zolo_element_vertical_menu_design2 .menu_item_name::before {
	content: '';
	position: absolute;
	z-index: -1;
	bottom: 0;
	left: 0;
	width: 100%;
	height: 50%;
	opacity: 0.3;
	transform: scale3d(0, 1, 1);
	transform-origin: 0% 50%;
	transition: transform 0.5s;
	transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
}
.zolo_element_vertical_menu_design2 .sub-menu_item_name {
	font-size: 1em;
	letter-spacing: 0.05em;
	transform: translate3d(-0.5em, 0, 0);
	transition: transform 0.5s, color 0.5s;
	transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
}
.zolo_element_vertical_menu_design2 .sub-menu_item_name::before {
	content: '';
	position: absolute;
	z-index: -1;
	top: 1.25em;
	left: 0.05em;
	width: 25%;
	height: 1px;
	transform: scale3d(0, 1, 1);
	transform-origin: 100% 50%;
	transition: transform 0.5s;
	transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
}
";
$shortcode_css .= '.zolo_element_vertical_menu_design2 .zolo_header_primary_menu.vertical ul li .menu_item_label{display: inline-block;}';
if($vertical_hover_styling == 'multi_color'){
	
$shortcode_css .= '
.zolo_element_vertical_menu_design2 li:nth-child(1) .menu_item_name::before, 
.zolo_element_vertical_menu_design2 li:nth-child(1) .menu_item_label::before, 
.zolo_element_vertical_menu_design2 li:nth-child(1) .sub-menu_item_name::before,
.zolo_element_vertical_menu_design2 li:nth-child(7) .menu_item_name::before, 
.zolo_element_vertical_menu_design2 li:nth-child(7) .menu_item_label::before, 
.zolo_element_vertical_menu_design2 li:nth-child(7) .sub-menu_item_name::before {
	background: '.$vertical_hover_color1.';
}

.zolo_element_vertical_menu_design2 li:nth-child(2) .menu_item_name::before, 
.zolo_element_vertical_menu_design2 li:nth-child(2) .menu_item_label::before, 
.zolo_element_vertical_menu_design2 li:nth-child(2) .sub-menu_item_name::before,
.zolo_element_vertical_menu_design2 li:nth-child(8) .menu_item_name::before, 
.zolo_element_vertical_menu_design2 li:nth-child(8) .menu_item_label::before, 
.zolo_element_vertical_menu_design2 li:nth-child(8) .sub-menu_item_name::before {
	background:'.$vertical_hover_color2.';
}

.zolo_element_vertical_menu_design2 li:nth-child(3) .menu_item_name::before, 
.zolo_element_vertical_menu_design2 li:nth-child(3) .menu_item_label::before, 
.zolo_element_vertical_menu_design2 li:nth-child(3) .sub-menu_item_name::before,
.zolo_element_vertical_menu_design2 li:nth-child(9) .menu_item_name::before, 
.zolo_element_vertical_menu_design2 li:nth-child(9) .menu_item_label::before, 
.zolo_element_vertical_menu_design2 li:nth-child(9) .sub-menu_item_name::before {
	background:'.$vertical_hover_color3.';
}
.zolo_element_vertical_menu_design2 li:nth-child(4) .menu_item_name::before, 
.zolo_element_vertical_menu_design2 li:nth-child(4) .menu_item_label::before, 
.zolo_element_vertical_menu_design2 li:nth-child(4) .sub-menu_item_name::before,
.zolo_element_vertical_menu_design2 li:nth-child(10) .menu_item_name::before, 
.zolo_element_vertical_menu_design2 li:nth-child(10) .menu_item_label::before, 
.zolo_element_vertical_menu_design2 li:nth-child(10) .sub-menu_item_name::before {
	background:'.$vertical_hover_color4.';
}
.zolo_element_vertical_menu_design2 li:nth-child(5) .menu_item_name::before, 
.zolo_element_vertical_menu_design2 li:nth-child(5) .menu_item_label::before, 
.zolo_element_vertical_menu_design2 li:nth-child(5) .sub-menu_item_name::before,
.zolo_element_vertical_menu_design2 li:nth-child(11) .menu_item_name::before, 
.zolo_element_vertical_menu_design2 li:nth-child(11) .menu_item_label::before, 
.zolo_element_vertical_menu_design2 li:nth-child(11) .sub-menu_item_name::before {
	background:'.$vertical_hover_color5.';
}
.zolo_element_vertical_menu_design2 li:nth-child(6) .menu_item_name::before, 
.zolo_element_vertical_menu_design2 li:nth-child(6) .menu_item_label::before, 
.zolo_element_vertical_menu_design2 li:nth-child(6) .sub-menu_item_name::before,
.zolo_element_vertical_menu_design2 li:nth-child(12) .menu_item_name::before, 
.zolo_element_vertical_menu_design2 li:nth-child(12) .menu_item_label::before, 
.zolo_element_vertical_menu_design2 li:nth-child(12) .sub-menu_item_name::before {
	background:'.$vertical_hover_color6.';
}



';

$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu > li:nth-child(1) > a.current,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(1).current-menu-ancestor > a,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(1).current_page_item > a, 
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(1).current-menu-item > a,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(1).current-menu-parent > a, 
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu > ul > li:nth-child(1) > a:hover{color:'.$vertical_hover_color1.'!important;}';

$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu > li:nth-child(2) > a.current,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(2).current-menu-ancestor > a,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(2).current_page_item > a, 
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(2).current-menu-item > a,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(2).current-menu-parent > a, 
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu > ul > li:nth-child(2) > a:hover{color:'.$vertical_hover_color2.'!important;}';

$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu > li:nth-child(3) > a.current,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(3).current-menu-ancestor > a,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(3).current_page_item > a, 
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(3).current-menu-item > a,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(3).current-menu-parent > a, 
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu > ul > li:nth-child(3) > a:hover{color:'.$vertical_hover_color3.'!important;}';

$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu > li:nth-child(4) > a.current,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(4).current-menu-ancestor > a,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(4).current_page_item > a, 
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(4).current-menu-item > a,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(4).current-menu-parent > a, 
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu > ul > li:nth-child(4) > a:hover{color:'.$vertical_hover_color4.'!important;}';

$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu > li:nth-child(5) > a.current,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(5).current-menu-ancestor > a,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(5).current_page_item > a, 
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(5).current-menu-item > a,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(5).current-menu-parent > a, 
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu > ul > li:nth-child(5) > a:hover{color:'.$vertical_hover_color5.'!important;}';

$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu > li:nth-child(6) > a.current,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(6).current-menu-ancestor > a,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(6).current_page_item > a, 
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(6).current-menu-item > a,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(6).current-menu-parent > a, 
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu > ul > li:nth-child(6) > a:hover{color:'.$vertical_hover_color6.'!important;}';

$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu > li:nth-child(7) > a.current,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(7).current-menu-ancestor > a,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(7).current_page_item > a, 
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(7).current-menu-item > a,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(7).current-menu-parent > a, 
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu > ul > li:nth-child(7) > a:hover{color:'.$vertical_hover_color1.'!important;}';

$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu > li:nth-child(8) > a.current,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(8).current-menu-ancestor > a,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(8).current_page_item > a, 
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(8).current-menu-item > a,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(8).current-menu-parent > a, 
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu > ul > li:nth-child(8) > a:hover{color:'.$vertical_hover_color2.'!important;}';

$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu > li:nth-child(9) > a.current,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(9).current-menu-ancestor > a,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(9).current_page_item > a, 
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(9).current-menu-item > a,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(9).current-menu-parent > a, 
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu > ul > li:nth-child(9) > a:hover{color:'.$vertical_hover_color3.'!important;}';

$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu > li:nth-child(10) > a.current,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(10).current-menu-ancestor > a,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(10).current_page_item > a, 
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(10).current-menu-item > a,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(10).current-menu-parent > a, 
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu > ul > li:nth-child(10) > a:hover{color:'.$vertical_hover_color4.'!important;}';

$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu > li:nth-child(11) > a.current,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(11).current-menu-ancestor > a,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(11).current_page_item > a, 
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(11).current-menu-item > a,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(11).current-menu-parent > a, 
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu > ul > li:nth-child(11) > a:hover{color:'.$vertical_hover_color5.'!important;}';

$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu > li:nth-child(12) > a.current,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(12).current-menu-ancestor > a,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(12).current_page_item > a, 
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(12).current-menu-item > a,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu ul > li:nth-child(12).current-menu-parent > a, 
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 .zolo_header_primary_menu > ul > li:nth-child(12) > a:hover{color:'.$vertical_hover_color6.'!important;}';











}else if($vertical_hover_styling == 'single_color'){
	
	$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design8 .menu_item_label{color:'.$menu_description_color.';}';	
	
$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design2 li .menu_item_name::before, .zolo_element_vertical_menu_design2 li .menu_item_label::before, .zolo_element_vertical_menu_design2 li .sub-menu_item_name::before {
	background:'.$vertical_hover_single_color.';
}';

}

}elseif($menu_design == 'menu_design3'){

$shortcode_css .= "

.menu_item_name,
.menu_item_label {
	position: relative;
	display: inline-block;
}

.zolo_element_vertical_menu_design3 .menu_item_name {
	overflow: hidden;
	padding: 0 0.25em;
	transition:all 0.4s;-webkit-transition:all 0.4s;
}

.zolo_element_vertical_menu_design3 .menu_item_name::before,
.zolo_element_vertical_menu_design3 .menu_item_name::after {
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: #eb2141;
	transform: translate3d(-100%,0,0) translate3d(-1px,0,0);
	transition: transform 0.7s;
	transition-timing-function: cubic-bezier(0.7,0,0.3,1);
}

.zolo_element_vertical_menu_design3 .menu_item:hover .menu_item_name::before {
	transform: translate3d(100%,0,0) translate3d(1px,0,0);
}
.zolo_element_vertical_menu_design3 .current-menu-item .menu_item_name::after,
.zolo_element_vertical_menu_design3 .menu_item:hover .menu_item_name::after {
	transform: translate3d(0,0,0);
}

.zolo_element_vertical_menu_design3 .menu_item_name::after {
	top: calc(50% - 0px);
	height: 4px;
}

.zolo_element_vertical_menu_design3 .menu_item_label {
	margin: 0.5em 0 0 0;
	margin-top: 0.25em;
	padding: 0.5em;
	transition:all 0.4s;-webkit-transition:all 0.4s;
	opacity:0.6;font-size:0.6em; display: block;
}
.zolo_element_vertical_menu_design3 .menu_item:hover .menu_item_label{opacity:1;}

";
}elseif($menu_design == 'menu_design4'){
	
$shortcode_css .= "
.menu {
	position: relative;
	z-index: 10;
}

.menu_item {
	line-height: 1;
	position: relative;
	display: block;
	outline: none;
}

.menu_item_name,
.menu_item_label {
	position: relative;
	display: inline-block;
}
.menu_item_label {
	margin: 0 0 0 0.5em;
}
.zolo_element_vertical_menu_design4 {
	display: flex;
	flex-direction: column;
	align-items: center;
}

.zolo_element_vertical_menu_design4 .menu_item {
	position: relative;
	display: flex;
	flex-direction: column;
	align-items: center;
}

.zolo_element_vertical_menu_design4 .menu_item:last-child {
	margin-bottom: 0;
}

.zolo_element_vertical_menu_design4 .menu_item_name {
	padding: 0 0.25em;
}

.zolo_element_vertical_menu_design4 .menu_item_name::before {
	content: '';
	position: absolute;
	top: calc(50% - 0px);
	left: 0;
	width: 100%;
	height: 4px;
	pointer-events: none;
	background: currentColor;
	transform: scale3d(0,1,1);
	transform-origin: 100% 50%;
	transition: transform 0.5s;
	transition-timing-function: cubic-bezier(0.8,0,0.2,1);
}
.zolo_element_vertical_menu_design4 .current-menu-item .menu_item_name::before,
.zolo_element_vertical_menu_design4 .menu_item:hover .menu_item_name::before,
.zolo_element_vertical_menu_design4 .menu_item:focus .menu_item_name::before {
	transform: scale3d(1,1,1);
	transform-origin: 0% 50%;
}

.zolo_element_vertical_menu_design4 .menu_item_label {
	font-size: 0.85em;
	margin-top: 0.5em;
}

.zolo_element_vertical_menu_design4 .menu_item_label::after {
	content: '';
	position: absolute;
	left: 0;
	width: 100%;
	height: 100%;
	transform-origin: 100% 50%;
	transition: transform 0.5s;
	transition-timing-function: cubic-bezier(0.8,0,0.2,1);
}

.zolo_element_vertical_menu_design4 .menu_item:hover .menu_item_label::after,
.zolo_element_vertical_menu_design4 .menu_item:focus .menu_item_label::after {
	transform: scale3d(0,1,1);
	transform-origin: 0% 50%;
}
	";
$shortcode_css .= '.zolo_element_vertical_menu_design4 .menu_item_label::after {background:'.$menu_description_overlay_color.';}';

}elseif($menu_design == 'menu_design5'){
	
	$shortcode_css .= "

.menu_item_name, .menu_item_label {
	position: relative;
	display: inline-block;
}
.menu_item_label {
	margin: 0 0 0 0.5em;
	font-size: 0.65em;line-height: 1.1;
}
.zolo_element_vertical_menu_design5 .menu_item {
	display: flex;
	flex-wrap: wrap;
	align-items: flex-end;
}
.zolo_element_vertical_menu_design5 .menu_item:hover {
	color: #515152;
}
.zolo_element_vertical_menu_design5 .menu_item_name {
	padding: 0 0.25em 0.25em 0.25em;
}
.zolo_element_vertical_menu_design5 .menu_item_name::before {
	content: '';
	position: absolute;
	z-index: -1;
	bottom: 0;
	left: 0;
	width: 100%;
	height: 50%;
	background: var(--menu-item-color);
	transform: scale3d(1, 0, 1);
	transform-origin: 50% 100%;
	transition: transform 0.3s;
	transition-timing-function: cubic-bezier(0.7, 0, 0.3, 1);
}
.zolo_element_vertical_menu_design5 .current-menu-item .menu_item_name::before, .zolo_element_vertical_menu_design5 .current-menu-item .menu_item_name::before,
.zolo_element_vertical_menu_design5 .menu_item:hover .menu_item_name::before, .zolo_element_vertical_menu_design5 .menu_item:focus .menu_item_name::before {
	transform: scale3d(1, 1, 1);
	transform-origin: 50% 0%;
}
.zolo_element_vertical_menu_design5 .menu_item_label {
	display: flex;
	flex-wrap: wrap;
	width: 100%;
	margin: 0.5em 0 0 1.5em;
	white-space: pre;
}
.zolo_element_vertical_menu_design5 .menu_item_label span {
	display: inline-block;
}";

if($vertical_hover_styling == 'multi_color'){
	
$shortcode_css .= '
.zolo_element_vertical_menu_design5 ul li:first-child {
 --menu-item-color:'.$vertical_hover_color1.';
}
.zolo_element_vertical_menu_design5 .current-menu-item:first-child .menu_item_label {color:'.$vertical_hover_color1.';}

.zolo_element_vertical_menu_design5 ul li:nth-child(2) {
 --menu-item-color:'.$vertical_hover_color2.';
}
.zolo_element_vertical_menu_design5 .current-menu-item:nth-child(2) .menu_item_label {color:'.$vertical_hover_color2.';}

.zolo_element_vertical_menu_design5 ul li:nth-child(3) {
 --menu-item-color:'.$vertical_hover_color3.';
}
.zolo_element_vertical_menu_design5 .current-menu-item:nth-child(3) .menu_item_label {color:'.$vertical_hover_color3.';}
.zolo_element_vertical_menu_design5 ul li:nth-child(4) {
 --menu-item-color:'.$vertical_hover_color4.';
}
.zolo_element_vertical_menu_design5 .current-menu-item:nth-child(4) .menu_item_label {color:'.$vertical_hover_color4.';}
.zolo_element_vertical_menu_design5 ul li:nth-child(5){
 --menu-item-color:'.$vertical_hover_color5.';
}
.zolo_element_vertical_menu_design5 .current-menu-item:nth-child(5) .menu_item_label {color:'.$vertical_hover_color5.';}
.zolo_element_vertical_menu_design5 ul li:nth-child(6) {
 --menu-item-color:'.$vertical_hover_color6.';
}
.zolo_element_vertical_menu_design5 .current-menu-item:nth-child(6) .menu_item_label {color:'.$vertical_hover_color6.';}
.zolo_element_vertical_menu_design5 ul li:nth-child(7) {
 --menu-item-color:'.$vertical_hover_color1.';
}
.zolo_element_vertical_menu_design5 .current-menu-item:nth-child(7) .menu_item_label {color:'.$vertical_hover_color1.';}
.zolo_element_vertical_menu_design5 ul li:nth-child(8) {
 --menu-item-color:'.$vertical_hover_color2.';
}
.zolo_element_vertical_menu_design5 .current-menu-item:nth-child(8) .menu_item_label {color:'.$vertical_hover_color2.';}
.zolo_element_vertical_menu_design5 ul li:nth-child(9){
 --menu-item-color:'.$vertical_hover_color3.';
}
.zolo_element_vertical_menu_design5 .current-menu-item:nth-child(9) .menu_item_label {color:'.$vertical_hover_color3.';}
.zolo_element_vertical_menu_design5 ul li:nth-child(10) {
 --menu-item-color:'.$vertical_hover_color4.';
}
.zolo_element_vertical_menu_design5 .current-menu-item:nth-child(10) .menu_item_label {color:'.$vertical_hover_color4.';}
.zolo_element_vertical_menu_design5 ul li:nth-child(11) {
 --menu-item-color:'.$vertical_hover_color5.';
}
.zolo_element_vertical_menu_design5 .current-menu-item:nth-child(11) .menu_item_label {color:'.$vertical_hover_color5.';}
.zolo_element_vertical_menu_design5 ul li:nth-child(12) {
 --menu-item-color:'.$vertical_hover_color6.';
}
.zolo_element_vertical_menu_design5 .current-menu-item:nth-child(12) .menu_item_label {color:'.$vertical_hover_color6.';}
.zolo_element_vertical_menu_design5 .menu_item_name::before {
	background: var(--menu-item-color);
}
';

}else if($vertical_hover_styling == 'single_color'){
	
$shortcode_css .= '.zolo_element_vertical_menu_design5 ul li{--menu-item-color:'.$vertical_hover_single_color.';}
.zolo_element_vertical_menu_design5 .menu_item_name::before {
	background: var(--menu-item-color);
}';
$shortcode_css .= '.zolo_element_vertical_menu_design5 .current-menu-item .menu_item_label {color:'.$vertical_hover_single_color.';}';
}
$shortcode_css .= '.zolo_element_vertical_menu_design5 .menu_item_label {color:'.$menu_description_color.';}';



}elseif($menu_design == 'menu_design6'){
	$shortcode_css .= "

.menu_item_name, .menu_item_label {
	position: relative;
	display: inline-block;
}
.menu_item_label {
	margin: 0 0 0 0.5em;
}
.zolo_element_vertical_menu_design6 .menu_item {
	padding-left: 0.25em;
}
.zolo_element_vertical_menu_design6 .menu_item_name {
	transition: transform 0.3s;
}
.zolo_element_vertical_menu_design6 .current-menu-item .menu_item_name,
.zolo_element_vertical_menu_design6 .menu_item:hover .menu_item_name, 
.zolo_element_vertical_menu_design6 .menu_item:focus .menu_item_name {
	transform: translate3d(1em, 0, 0);
}
.zolo_element_vertical_menu_design6 .menu_item .menu_item_name_reveal{ position: relative;}
.zolo_element_vertical_menu_design6 .menu_item .menu_item_name_reveal::before {
	content: '';
	position: absolute;
	top:50%;
	left: 0;
	width: 0.75em;
	height: 0.25em;
	background: #000;
	transform: scale3d(0, 1, 1);
	transform-origin: 0% 50%;
	transition: transform 0.3s;margin-top: -0.12em;
}
.zolo_element_vertical_menu_design6 .current-menu-item .menu_item .menu_item_name_reveal::before,
.zolo_element_vertical_menu_design6 .menu_item:hover .menu_item_name_reveal::before, .zolo_element_vertical_menu_design6 .menu_item:focus .menu_item_name_reveal::before {
	transform: scale3d(1, 1, 1);
}
.zolo_element_vertical_menu_design6 .menu_item_label {
	display: block;font-size: 0.65em;line-height: 1.4;
	margin: 0;
	word-spacing: 0.15em;
}";

$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design6 .menu_item .menu_item_name_reveal::before{background:'.$menu_hover_color.';}';	

}elseif($menu_design == 'menu_design7'){
	$shortcode_css .= "


.menu_item_name, .menu_item_label {
	position: relative;
	display: inline-block;
}
.menu_item_label {
	margin: 0 0 0 0.5em;
}
.zolo_element_vertical_menu.zolo_element_vertical_menu_design7 .vertical .zolo-navbar-nav li a.menu_item{
	display: grid;
	justify-content: center;
	text-transform: lowercase;
	grid-template-columns: auto;
}
.zolo_element_vertical_menu.zolo_element_vertical_menu_design7 .vertical .zolo-navbar-nav li a.menu_item span.menu_item_name{overflow: visible;}
.zolo_element_vertical_menu_design7 .menu_item_name_reveal{
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	white-space: pre;
	pointer-events: none;
	color: var(--color-text);
	grid-area: 1 / 1 / 2 / 2;
}
.zolo_element_vertical_menu_design7 .menu_item_name span {
	display: inline-block;
}
.zolo_element_vertical_menu_design7 .menu_item_label {
	font-size: 0.85em;
	line-height: 1.1;
	overflow: hidden;
	margin: 0;
	text-align: center;
	color: transparent;
	transition: color 0s 0.3s;
	grid-area: 1 / 1 / 2 / 2;
}
.zolo_element_vertical_menu_design7 .menu_item_label::before {
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: #fff;
	transform: translate3d(-100%, 0, 0) translate3d(-1px, 0, 0);
	transition: transform 0.6s;
	transition-timing-function: cubic-bezier(0.7, 0, 0.3, 1);
}
.zolo_element_vertical_menu_design7 .menu_item:hover .menu_item_label::before, .zolo_element_vertical_menu_design7 .menu_item:focus .menu_item_label::before {
	transform: translate3d(100%, 0, 0) translate3d(1px, 0, 0);
}";

$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design7 .menu_item:hover .menu_item_label, .zolo_element_vertical_menu_design7 .menu_item:focus .menu_item_label{color:'.$menu_description_color.';}';
$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design7 .menu_item_label::before{background:'.$menu_description_color.';}';	

}elseif($menu_design == 'menu_design8'){
	$shortcode_css .= "
.menu_item_name,
.menu_item_label {
	position: relative;
	display: inline-block;
}
.zolo_element_vertical_menu.zolo_element_vertical_menu_design8 .vertical .zolo-navbar-nav li a.menu_item span.menu_item_name{overflow: visible; padding:0 5px;}
.zolo_element_vertical_menu_design8 .menu_item .menu_item_name:before {
	content: '';
	position: absolute;
	top: 0;
	right: 101%;
	width: 0.9em;
	height: 1em;
	opacity: 0;
	background: red;
	animation: none; /* For Chrome */
}
.zolo_element_vertical_menu_design8 .current-menu-item .menu_item_name:before,
.zolo_element_vertical_menu_design8 .menu_item:hover .menu_item_name:before,
.zolo_element_vertical_menu_design8 .menu_item:focus .menu_item_name:before {
	animation: blinkblink 0.4s cubic-bezier(0.5,0,1,1) infinite alternate;
}
@keyframes blinkblink {
	from {
		opacity: 0;
	}
	to {
		opacity: 0.5;
	}
}
.zolo_element_vertical_menu_design8 .menu_item_label{ padding-left:15px;}

	";
$shortcode_css .= '.zolo_element_vertical_menu_design8 .zolo_header_primary_menu.vertical ul li .menu_item_label{display: inline-block;}';
$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design8 .menu_item_label{color:'.$menu_description_color.';}';	
$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design8 .menu_item .menu_item_name:before{background:'.$menu_color.';}';	
$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design8 .menu_item:hover .menu_item_name,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design8 .menu_item:focus .menu_item_name,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design8 .current-menu-item .menu_item_name{background:'.$menu_color.';}';	

}elseif($menu_design == 'menu_design9'){
	$shortcode_css .= "

.menu_item_name,
.menu_item_label {
	position: relative;
	display: inline-block;
}
.zolo_element_vertical_menu.zolo_element_vertical_menu_design9 .vertical .zolo-navbar-nav li a.menu_item span.menu_item_name{overflow: visible;}
.zolo_element_vertical_menu_design9 .menu_item_label{ font-size:0.65em; line-height:1.1;display: block;}
.zolo_element_vertical_menu_design9 {
	counter-reset: itemCounter;
}

.zolo_element_vertical_menu_design9 .menu_item {
	padding-left:14px!important;
}

.zolo_element_vertical_menu_design9 .menu_item::before {
	content: counter(itemCounter,decimal-leading-zero);
	font-size: 1em;
	position: absolute;
	right: 100%;
	bottom: calc(100% - 0.35em);
	counter-increment: itemCounter; font-size: 16px;line-height: 24px;
}
.zolo_element_vertical_menu_design9 .menu_item_name {
	display: flex;
	flex-wrap: wrap;
	padding: 0.4em 0 0 0;
	white-space: pre;
}

.zolo_element_vertical_menu_design9 .menu_item_name::before,
.zolo_element_vertical_menu_design9 .menu_item_name::after {
	content: '';
	position: absolute;
	bottom: 100%;
	left: 0;
}

.zolo_element_vertical_menu_design9 .menu_item_name::after {
	transform: scale3d(0,1,1);
	transform-origin: 0% 50%;
	transition: transform 0.5s;
}

.zolo_element_vertical_menu_design9 .current-menu-item .menu_item .menu_item_name::after,
.zolo_element_vertical_menu_design9 .menu_item:hover .menu_item_name::after,
.zolo_element_vertical_menu_design9 .menu_item:focus .menu_item_name::after {
	transform: scale3d(1,1,1);
}

.zolo_element_vertical_menu_design9 .menu_item_name span {
	display: inline-block;
}	
	";
	
$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design9 .menu_item{--menu-item-color:'.$menu_hover_color.';}';
$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design9 .menu_item:before{color:'.$underline_color.'!important;}';

$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design9 .menu_item:hover:before, 
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design9 .menu_item:focus::before,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design9 .current-menu-item .menu_item::before{color:'.$underline_hover_color.'!important;}';

$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design9 .menu_item_name:before{background:'.$underline_color.'; height:'.$underline_height.'px; width:'.$underline_width.'em;}';
$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design9 .menu_item_name:after{background:'.$underline_hover_color.';height:'.$underline_height.'px; width:'.$underline_width.'em;}';

}elseif($menu_design == 'menu_design10'){
	$shortcode_css .= "

.menu_item_name,
.menu_item_label {
	position: relative;
	display: inline-block;
}
.zolo_element_vertical_menu.zolo_element_vertical_menu_design10 .vertical .zolo-navbar-nav li a.menu_item span.menu_item_name{overflow: visible;}
.zolo_element_vertical_menu_design10 .menu_item_label{ font-size:0.65em; line-height:1.1;display: block;}
.zolo_element_vertical_menu_design10 {
	counter-reset: itemCounter;
}

.zolo_element_vertical_menu_design10 .menu_item {
	padding-left:27px!important;padding-top:10px!important;
}

.zolo_element_vertical_menu_design10 .menu_item::before {
	content: counter(itemCounter,decimal-leading-zero);
	position: absolute;
	bottom: calc(100% - 0.35em);
	counter-increment: itemCounter;
	font-weight: bold;
	vertical-align: top;
	font-size: 16px;line-height: 24px;
	left: 0;
	top: 0;
}
.zolo_element_vertical_menu_design10 .menu_item_name {
	display: flex;
	flex-wrap: wrap;
	padding:0;
	white-space: pre;
}

.zolo_element_vertical_menu_design10 .menu_item_name span {
	display: inline-block;
}	
	";
	
$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design10 .menu_item{--menu-item-color:'.$menu_hover_color.';}';
$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design10 .menu_item:before{color:'.$menu_color.'!important;}';

}elseif($menu_design == 'menu_design11'){
	$shortcode_css .= "

.menu_item_name {
	position: relative;
	display: inline-block;
}
.zolo_element_vertical_menu_design11 .menu_item_label{ font-size:0.65em; line-height:1.1;display: block;}
.zolo_element_vertical_menu_design11 {
	counter-reset: itemCounter;
}

.zolo_element_vertical_menu_design11 .menu_item {
	padding-left:24px!important;padding-top:10px!important;
}

.zolo_element_vertical_menu_design11 .menu_item::before {
	content: counter(itemCounter,decimal-leading-zero);
	position: absolute;
	bottom: calc(100% - 0.35em);
	counter-increment: itemCounter;
	font-weight: bold;
	vertical-align: top;
	line-height: 20px;
	font-size:16px;
	left: 0;
	top: 0;
}
.zolo_element_vertical_menu_design11 .menu_item_name {
	display: flex;
	flex-wrap: wrap;
	padding:0;
	white-space: pre;
}
";
$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design11 .menu_item .menu_item_name{
	-webkit-text-fill-color: '.$menu_color.';
	text-fill-color: '.$menu_color.';
	-webkit-text-stroke-width: 1px;
	text-stroke-width: 1px;
	-webkit-text-stroke-color: '.$menu_color.';
	text-stroke-color: '.$menu_color.';
	-webkit-transition: all .3s ease;
	-moz-transition: all .3s ease;
	transition: all .3s ease;
}';

$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design11 .menu_item:hover .menu_item_name .menu_item_name_text,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design11 .current-menu-item .menu_item .menu_item_name .menu_item_name_text{
	-webkit-text-fill-color: transparent;
	text-fill-color: transparent;
	-webkit-text-stroke-width: 1px;
	text-stroke-width: 1px;
	-webkit-text-stroke-color: '.$menu_hover_color.';
	text-stroke-color: '.$menu_hover_color.';
	-webkit-transition: all .3s ease;
	-moz-transition: all .3s ease;
	transition: all .3s ease;
	
}';
$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design11 .menu_item:before{color:'.$menu_color.';}';

}elseif($menu_design == 'menu_design12'){
	$shortcode_css .= "
.zolo_element_vertical_menu_design12 .menu_item{
  position: relative;
  mix-blend-mode: lighten; padding: 0;
}
.zolo_element_vertical_menu_design12 .menu_item:before, .zolo_element_vertical_menu_design12 .menu_item:after {
  content: attr(data-text);
  position: absolute;
  top: 0;
  width: 100%;
  clip: rect(0, 0, 0, 0);
}
.zolo_element_vertical_menu_design12 .menu_item:before {
  left: -1px;
  text-shadow: 1px 0 rgba(255, 0, 0, 0.7);
}
.zolo_element_vertical_menu_design12 .menu_item:after {
  left: 1px;
  text-shadow: -1px 0 rgba(0, 0, 255, 0.7);
}

.zolo_element_vertical_menu_design12 .current-menu-item .menu_item:before,
.zolo_element_vertical_menu_design12 .menu_item:hover:before {
  text-shadow: 4px 0 rgba(255, 0, 0, 0.7);
  animation: glitch-loop-1 0.8s infinite ease-in-out alternate-reverse;
}
.zolo_element_vertical_menu_design12 .current-menu-item .menu_item:after,
.zolo_element_vertical_menu_design12 .menu_item:hover:after {
  text-shadow: -5px 0 rgba(0, 0, 255, 0.7);
  animation: glitch-loop-2 0.8s infinite ease-in-out alternate-reverse;
}

@-webkit-keyframes glitch-loop-1 {
  0% {
    clip: rect(10px, 9999px, 9px, 0);
  }
  25% {
    clip: rect(0px, 9999px, 99px, 0);
  }
  50% {
    clip: rect(25px, 9999px, 102px, 0);
  }
  75% {
    clip: rect(5px, 9999px, 92px, 0);
  }
  100% {
    clip: rect(91px, 9999px, 98px, 0);
  }
}

@keyframes glitch-loop-1 {
  0% {
    clip: rect(10px, 9999px, 9px, 0);
  }
  25% {
    clip: rect(0px, 9999px, 99px, 0);
  }
  50% {
    clip: rect(25px, 9999px, 102px, 0);
  }
  75% {
    clip: rect(5px, 9999px, 92px, 0);
  }
  100% {
    clip: rect(91px, 9999px, 98px, 0);
  }
}
@-webkit-keyframes glitch-loop-2 {
  0% {
    top: -1px;
    left: 1px;
    clip: rect(65px, 9999px, 119px, 0);
  }
  25% {
    top: -6px;
    left: 4px;
    clip: rect(79px, 9999px, 19px, 0);
  }
  50% {
    top: -3px;
    left: 2px;
    clip: rect(68px, 9999px, 11px, 0);
  }
  75% {
    top: 0px;
    left: -4px;
    clip: rect(95px, 9999px, 53px, 0);
  }
  100% {
    top: -1px;
    left: -1px;
    clip: rect(31px, 9999px, 149px, 0);
  }
}
@keyframes glitch-loop-2 {
  0% {
    top: -1px;
    left: 1px;
    clip: rect(65px, 9999px, 119px, 0);
  }
  25% {
    top: -6px;
    left: 4px;
    clip: rect(79px, 9999px, 19px, 0);
  }
  50% {
    top: -3px;
    left: 2px;
    clip: rect(68px, 9999px, 11px, 0);
  }
  75% {
    top: 0px;
    left: -4px;
    clip: rect(95px, 9999px, 53px, 0);
  }
  100% {
    top: -1px;
    left: -1px;
    clip: rect(31px, 9999px, 149px, 0);
  }
}
";


$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design12 .menu_item:after,
#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design12 .menu_item:before{color: '.$menu_hover_color.'!important;}';

}else{
	
	}

//vertical_menu

if($vertical_menu_max_width == '' ){
		$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu.vertical > ul{width:auto;}';	
	}else{
		$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu.vertical > ul{width:'.$vertical_menu_max_width.'px;}';	
		}
$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu.vertical > ul > li{text-align:'.$vertical_menu_alignment.';}';	
if($menu_design == 'menu_design6'){
$shortcode_css .= '#'.$zolo_primary_menu_id.' .zolo_header_primary_menu.vertical > ul > li{text-align:left;}';	
$shortcode_css .= '#'.$zolo_primary_menu_id.'.zolo_element_vertical_menu_design6 .menu_item::before{background:'.$menu_hover_color.';}';	
}

if(isset($menu_responsive) && $menu_responsive != '') {
	$shortcode_css .= Zolo_Resposive_Text_Param::responsive_css($menu_responsive, '#' . esc_js($zolo_primary_menu_id) . ' .zolo_header_primary_menu ul');
}


apcore_save_plugin_dyn_styles( $shortcode_css );
