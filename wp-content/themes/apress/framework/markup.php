<?php
/**
 * Apress Theme Framework
 */

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

if( ! defined( 'ABSPATH' ) ) 
	exit; 
// Exit if accessed directly

/**
 * [apress_add_body_classes description]
 * @method apress_add_body_classes
 * @param  [type] $classes [description]
 */
function apress_add_body_classes( $classes ) {
	global $apress_data;
	
	// Header body class
	$cur_id = apress_get_custom_header_id();
	$c_pageID = apress_theme_current_page_id();	
	$zolo_vc_choose_header_style = get_post_meta( $cur_id, 'zt_choose_header_style', true );
	$page_header_builder = get_post_meta( $c_pageID, 'zt_header_builder', true ); 
	$header_builder = isset($apress_data["header_builder"]) ? $apress_data["header_builder"] : 'default';
	
	if($header_builder == 'page_editor' || $page_header_builder == 'page_editor'){
		if( 'top_header' === $zolo_vc_choose_header_style ) {
		
			$classes[] = 'zolo_pagebuilder_topheader zolo_pagebuilder_horizontalheader zolo_theme_and_builder_horizontalheader';
		
		}elseif('right_header' === $zolo_vc_choose_header_style) {
		
			$classes[] = 'zolo_pagebuilder_rightheader zolo_pagebuilder_verticalheader';
			
		}elseif('left_header' === $zolo_vc_choose_header_style) {
		
			$classes[] = 'zolo_pagebuilder_leftheader zolo_pagebuilder_verticalheader';
			
		}elseif('bottom_header' === $zolo_vc_choose_header_style) {
		
			$classes[] = 'zolo_pagebuilder_bottomheader zolo_pagebuilder_horizontalheader zolo_theme_and_builder_horizontalheader';
			
		}
}
	return $classes;


}
add_filter( 'body_class', 'apress_add_body_classes' );


/**
 * [apress_attributes_body description]
 * @method apress_attributes_body
 * @param  [type]                $attributes [description]
 * @return [type]                            [description]
 */
add_filter( 'apress_attr_body', 'apress_attributes_body' );
function apress_attributes_body( $attributes ) {
	
	unset( $attributes['class'] );
	$attributes['dir']       = is_rtl() ? 'rtl' : 'ltr';
	$attributes['itemscope'] = 'itemscope';
	$attributes['itemtype']  = 'http://schema.org/WebPage';
	
	if ( is_singular( 'post' ) || is_home() || is_archive() ) {
		$attributes['itemtype'] = 'http://schema.org/Blog';
	}

	if ( is_search() ) {
		$attributes['itemtype'] = 'http://schema.org/SearchResultsPage';
	}

	return $attributes;
}

/**
 * [apress_attributes_menu description]
 * @method apress_attributes_menu
 * @return [type]                [description]
 */
add_filter( 'apress_attr_menu', 'apress_attributes_menu' );
function apress_attributes_menu( $attributes ) {

	if ( $attributes['location'] ) {

		$menu_name = apress_helper()->get_menu_location_name( $attributes['location'] );

		if ( $menu_name ) {
			// Translators: The %s is the menu name. This is used for the 'aria-label' attribute.
			$attributes['aria-label'] = esc_attr( sprintf( esc_html_x( '%s', 'nav menu aria label', 'apress' ), $menu_name ) );
		}
	}
	unset( $attributes['location'] );

	$attributes['itemscope']  = 'itemscope';
	$attributes['itemtype']   = 'http://schema.org/SiteNavigationElement';

	return $attributes;
}


/**
 * [apress_attributes_header description]
 * @method apress_attributes_header
 * @param  [type]                  $attributes [description]
 * @return [type]                              [description]
 */
add_filter( 'apress_attr_header', 'apress_attributes_header' );
function apress_attributes_header( $attributes ) {

	if( !isset( $attributes['id'] ) || empty( $attributes['id'] ) ) {
		$attributes['id'] = 'header';
	}

	$attributes['class'] = !empty( $attributes['class'] ) ? 'header site-header ' . $attributes['class'] : 'header site-header';
	$attributes['itemscope'] = 'itemscope';
	$attributes['itemtype']  = 'http://schema.org/WPHeader';

	return $attributes;

}
/**
 * [apress_attributes_footer description]
 * @method apress_attributes_footer
 * @param  [type]                  $attributes [description]
 * @return [type]                              [description]
 */
add_filter( 'apress_attr_footer', 'apress_attributes_footer' );
function apress_attributes_footer( $attributes ) {
	$attributes['id'] = 'footer';
	$attributes['itemscope'] = 'itemscope';
	$attributes['itemtype']  = 'http://schema.org/WPFooter';
	return $attributes;

}

/**
 * [apress_get_custom_header_id description]
 * @method apress_get_custom_header_id
 * @return [type]                     [description]
 */
function apress_get_custom_header_id() {
	
	global $apress_data;
	$cur_id = is_search() ? '' : apress_theme_current_page_id(); 
	
	// Header show and hide

	$header_builder_page_id_to = (!empty($apress_data["header_builder_template"])) ? $apress_data["header_builder_template"] : '';	
	$display_header_po = get_post_meta( $cur_id, 'zt_header_display', true ); 
	$header_builder_page_id_po = get_post_meta( $cur_id, 'zt_header_builder_template', true );
	
	// Header Show/hide
	if($display_header_po == 'default' || $display_header_po == ''){
	
		$header_builder_page_id = $header_builder_page_id_to;		
	
	}else if($display_header_po == 'yes'  || $display_header_po == 'no'){

		$header_builder_page_id = $header_builder_page_id_po;		
	
	} else {

		$header_builder_page_id = $header_builder_page_id_to;	
				
	}	

	return $header_builder_page_id;
}

/**
 * [apress_get_custom_footer_id description]
 * @method apress_get_custom_footer_id
 * @return [type]                     [description]
 */
function apress_get_custom_footer_id() {
	
	global $apress_data;
	$cur_id = is_search() ? '' : apress_theme_current_page_id(); 
	
	
	$footer_builder_page_id_to = (!empty($apress_data["footer_builder_template"])) ? $apress_data["footer_builder_template"] : '';
	$display_footer_po = get_post_meta( $cur_id, 'zt_display_footer', true ); 
	$footer_builder_page_id_po = get_post_meta( $cur_id, 'zt_footer_builder_template', true ); 
	
	if($display_footer_po == 'default' || $display_footer_po == ''){
		
		$footer_builder_page_id = $footer_builder_page_id_to;
	
	}else if($display_footer_po == 'on'  || $display_footer_po == 'off'){
	
		$footer_builder_page_id = $footer_builder_page_id_po;
	
	} else {
	
		$footer_builder_page_id = $footer_builder_page_id_to;
	}	

	return $footer_builder_page_id;
}


/**
 * [apress_get_header_layout description]
 * @method apress_get_header_layout
 * @return [type]                  [description]
 */
function apress_get_header_layout() {

	global $post;

	//Keep old id
	if( is_404() || 
		is_search() 
	) {
		$ID = 0;
	}
	else {
		$ID = $post->ID;
	}

	// which one
	$id = apress_get_custom_header_id();
	$header = get_post( $id );
	$post = $header;

	$out = array(
		'id' => $id,
		'attributes' =>'',
	);

	// reset
	wp_reset_postdata();
	return $out;
}

/**
 * [apress_get_footer_layout description]
 * @method apress_get_footer_layout
 * @return [type]                  [description]
 */
function apress_get_footer_layout() {
	global $post;

	// which one
	$id = apress_get_custom_footer_id();
	$footer = get_post( $id );
	$post = $footer;

	$out = array();

	$out = array_filter( $out );

	$out['id'] = $id;

	// reset
	wp_reset_postdata();

	return $out;
}
