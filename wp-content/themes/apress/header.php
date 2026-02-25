<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="site_layout">
<?php
// Extended Sidebar
apress_action( 'extended_sidebar_start' );
// Preloader
apress_action( 'before_preloader' );
apress_action( 'preloader' );
apress_action( 'after_preloader' );

?>
<div class="layout_design">

<!-- Home Page Section Start -->
<?php
// Header
apress_action( 'before_header' );
apress_action( 'header' );
apress_action( 'after_header' );
?>
<div class="zolo_main_content_area">
<div class="zolo_content_bg_area">
<?php 

apress_action( 'header_position_slider' );

//page title bar
//apress_theme_current_page_title_bar( $c_pageID );	
$c_pageID = is_search() ? '' : apress_theme_current_page_id(); 
apress_theme_current_page_title_bar( $c_pageID );	
?>