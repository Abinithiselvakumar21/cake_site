<?php 
/*-----------------------------------------------------------------------------------*/
/* Vertical Menu
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
extract( shortcode_atts( array(
	'apress_primary_menu'		=> '',
	'menu_color'				=> '',
	'menu_hover_color'			=> '',
	
), $atts ) );

$uniqid = uniqid(rand());
$apcore_hb_menu_list_id = 'apcore_hb_menu_list_'.$uniqid;


if( is_nav_menu( $apress_primary_menu ) ) :
	
		$wp_nav_menu_option = array(  
			'theme_location'  	=> 'primary-nav', 
			'menu'           	=> $apress_primary_menu,
			'container'       	=> false,   
			'container_id'    	=> 'main-nav',  
			'container_class' 	=> '',  
			'menu_class' 	  	=> 'sub-menu menu_list_submenu ' .$apcore_hb_menu_list_id,
			'items_wrap'      	=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'menu_id'         	=> 'primary' ,
			'link_before'    	=> '<span class="menu-text">',
			'link_after'    	=> '</span>',
		);
	  
	
	else:

		$wp_nav_menu_option = array(
			'container'       	=> false,            
			'container_id'    	=> 'main-nav',  
			'container_class' 	=> '',  
			'menu_class' 	  	=> 'sub-menu menu_list_submenu ' .$apcore_hb_menu_list_id,
			'items_wrap'      	=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'link_before'    	=> '<span class="menu-text">',
			'link_after'    	=> '</span>',
		);

	endif;
		
	?>


  <?php wp_nav_menu($wp_nav_menu_option);?>



<?php 
	$shortcode_css = '';
	
	if($menu_hover_color != ''){
	$shortcode_css .= '.'. esc_js($apcore_hb_menu_list_id) .'.menu_list_submenu li a{ color:'.$menu_color.'!important;}';
	}
	if($menu_hover_color != ''){
	$shortcode_css .= '.'. esc_js($apcore_hb_menu_list_id) .'.menu_list_submenu li a:hover,
	.'. esc_js($apcore_hb_menu_list_id) .'.menu_list_submenu li.current_page_item > a{ color:'.$menu_hover_color.'!important;}';
	}

apcore_save_plugin_dyn_styles( $shortcode_css );
