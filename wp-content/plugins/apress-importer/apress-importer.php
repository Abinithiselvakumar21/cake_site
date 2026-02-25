<?php
/*
Plugin Name: Apress Importer
Plugin URI: https://apresswp.com/plugins
Description: Apress Importer Plugin for Apress Theme
Version: 2.3.3
Author: Apress Themes
Author URI: https://themeforest.net/user/apressthemes
*/

defined( 'ABSPATH' ) or die( 'You cannot access this script directly' );

function enqueue_my_scripts() {
    wp_enqueue_script('apress_adminp_js', plugin_dir_url(__FILE__) . 'assets/js/apress-import.js');
	wp_enqueue_style( 'apress_demo_css', plugin_dir_url(__FILE__) . 'assets/css/apress-import.css' );
}
add_action('admin_enqueue_scripts', 'enqueue_my_scripts');

// Don't resize images
function apress_filter_image_sizes( $sizes ) {
	return array();
}
// Hook importer into admin init
add_action( 'wp_ajax_zolo_import_demo_data', 'zolo_importer' );
function zolo_importer() {
	global $wpdb;

	if ( current_user_can( 'manage_options' ) ) {
		if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true); // we are loading importers

		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( !class_exists( 'WP_Importer' ) ) { // if main importer class doesn't exist
			$wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
			include $wp_importer;
		}

		if ( !class_exists('WP_Import') ) { // if WP importer doesn't exist
			$wp_import = dirname( __FILE__ ) . '/wordpress-importer.php';
			include $wp_import;
		}

		if ( class_exists( 'WP_Importer' ) && class_exists( 'WP_Import' ) ) { // check for main import class and wp import class
			if( ! isset($_POST['demo_type']) || trim($_POST['demo_type']) == '' ) {
				$demo_type = 'main';
			} else {
				$demo_type = $_POST['demo_type'];
			}

			switch($demo_type) {
				case 'demo2':	
					$shop_demo = false;		
					$theme_xml_file = dirname( __FILE__ ) . '/demo2/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo2/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo2/revsliders/';

					// reading settings
					$homepage_title = 'Home';
					
				break;
				case 'demo3':	
					$shop_demo = false;				
					$theme_xml_file = dirname( __FILE__ ) . '/demo3/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo3/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo3/revsliders/';
					// reading settings
					$homepage_title = 'Home';

				break;	
				case 'demo4':	
					$shop_demo = false;				
					$theme_xml_file = dirname( __FILE__ ) . '/demo4/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo4/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo4/revsliders/';
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo5':	
					$shop_demo = false;				
					$theme_xml_file = dirname( __FILE__ ) . '/demo5/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo5/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;	
				case 'demo6':	
					$shop_demo = false;				
					$theme_xml_file = dirname( __FILE__ ) . '/demo6/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo6/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo6/revsliders/';
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo7':	
					$shop_demo = false;				
					$theme_xml_file = dirname( __FILE__ ) . '/demo7/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo7/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo7/revsliders/';
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo8':	
					$shop_demo = false;				
					$theme_xml_file = dirname( __FILE__ ) . '/demo8/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo8/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo8/revsliders/';
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo9':	
					$shop_demo = false;				
					$theme_xml_file = dirname( __FILE__ ) . '/demo9/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo9/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo9/revsliders/';
					// reading settings
					$homepage_title = 'Home';
				break;	
				case 'demo10':	
					$shop_demo = false;				
					$theme_xml_file = dirname( __FILE__ ) . '/demo10/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo10/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;					
					
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo10/revsliders/';
					// reading settings
					$homepage_title = 'Home';
				break;	
				case 'demo11':	
					$shop_demo = false;				
					$theme_xml_file = dirname( __FILE__ ) . '/demo11/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo11/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo11/revsliders/';
					// reading settings
					$homepage_title = 'Home';
				break;	
				case 'demo12':	
					$shop_demo = false;				
					$theme_xml_file = dirname( __FILE__ ) . '/demo12/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo12/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;					
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;	
				case 'demo13':	
					$shop_demo = false;				
					$theme_xml_file = dirname( __FILE__ ) . '/demo13/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo13/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo13/revsliders/';
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo14':	
					$shop_demo = false;				
					$theme_xml_file = dirname( __FILE__ ) . '/demo14/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo14/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo14/revsliders/';
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo15':	
					$shop_demo = false;				
					$theme_xml_file = dirname( __FILE__ ) . '/demo15/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo15/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;	
				case 'demo16':	
					$shop_demo = false;				
					$theme_xml_file = dirname( __FILE__ ) . '/demo16/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo16/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo16/revsliders/';
					// reading settings
					$homepage_title = 'Home';
				break;	
				case 'demo17':	
					$shop_demo = true;
					$woo_xml = dirname( __FILE__ ). '/demo17/apress.xml';			
					$theme_xml_file = dirname( __FILE__ ) . '/demo17/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo17/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					// Sidebar Widgets File
					$widgets_file = dirname( __FILE__ ) . '/demo17/widget_data.json';
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo17/revsliders/';
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo18':	
					$shop_demo = false;		
					$theme_xml_file = dirname( __FILE__ ) . '/demo18/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo18/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					// Sidebar Widgets File
					$widgets_file = dirname( __FILE__ ) . '/demo18/widget_data.json';
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo18/revsliders/';
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo19':	
					$shop_demo = false;		
					$theme_xml_file = dirname( __FILE__ ) . '/demo19/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo19/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo19/revsliders/';
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo20':	
					$shop_demo = false;		
					$theme_xml_file = dirname( __FILE__ ) . '/demo20/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo20/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo21':	
					$shop_demo = false;		
					$theme_xml_file = dirname( __FILE__ ) . '/demo21/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo21/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;	
				case 'demo22':	
					$shop_demo = false;		
					$theme_xml_file = dirname( __FILE__ ) . '/demo22/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo22/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;	
				case 'demo23':	
					$shop_demo = false;		
					$theme_xml_file = dirname( __FILE__ ) . '/demo23/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo23/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo23/revsliders/';
					// reading settings
					$homepage_title = 'Home';
				break;	
				case 'demo24':	
					$shop_demo = false;		
					$theme_xml_file = dirname( __FILE__ ) . '/demo24/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo24/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;	
				case 'demo25':	
					$shop_demo = false;		
					$theme_xml_file = dirname( __FILE__ ) . '/demo25/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo25/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;	
				case 'demo26':	
					$shop_demo = false;		
					$theme_xml_file = dirname( __FILE__ ) . '/demo26/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo26/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo27':	
					$shop_demo = false;		
					$theme_xml_file = dirname( __FILE__ ) . '/demo27/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo27/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo28':	
					$shop_demo = false;		
					$theme_xml_file = dirname( __FILE__ ) . '/demo28/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo28/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;	
				case 'demo29':	
					$shop_demo = false;		
					$theme_xml_file = dirname( __FILE__ ) . '/demo29/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo29/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo29/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo30':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo30/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo30/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo31':	
					$shop_demo = true;
					$woo_xml = dirname( __FILE__ ). '/demo31/apress.xml';			
					$theme_xml_file = dirname( __FILE__ ) . '/demo31/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo31/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo32':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo32/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo32/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;		
				case 'demo33':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo33/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo33/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo34':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo34/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo34/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;				
				case 'demo36':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo36/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo36/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo37':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo37/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo37/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo38':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo38/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo38/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo39':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo39/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo39/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo40':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo40/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo40/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo41':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo41/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo41/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo42':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo42/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo42/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo43':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo43/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo43/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo44':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo44/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo44/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo45':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo45/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo45/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo45/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo46':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo46/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo46/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo47':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo47/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo47/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo48':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo48/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo48/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo49':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo49/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo49/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo50':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo50/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo50/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo51':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo51/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo51/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo51/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo52':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo52/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo52/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo53':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo53/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo53/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					// Sidebar Widgets File
					$widgets_file = dirname( __FILE__ ) . '/demo53/widget_data.json';
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo53/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo54':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo54/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo54/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo56':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo56/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo56/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo57':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo57/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo57/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo57/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo58':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo58/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo58/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo58/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo59':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo59/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo59/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo60':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo60/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo60/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo61':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo61/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo61/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo62':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo62/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo62/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo63':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo63/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo63/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo63/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo64':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo64/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo64/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo65':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo65/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo65/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo66':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo66/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo66/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo67':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo67/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo67/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					// Sidebar Widgets File
					$widgets_file = dirname( __FILE__ ) . '/demo67/widget_data.json';
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo67/revsliders/';
										
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo68':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo68/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo68/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					// Sidebar Widgets File
					$widgets_file = dirname( __FILE__ ) . '/demo68/widget_data.json';
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo68/revsliders/';
										
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo69':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo69/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo69/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo69/revsliders/';
										
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo70':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo70/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo70/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo70/revsliders/';
										
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo71':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo71/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo71/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$widgets_file = dirname( __FILE__ ) . '/demo71/widget_data.json';
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo71/revsliders/';
										
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo72':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo72/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo72/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo72/revsliders/';
										
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo73':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo73/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo73/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
										
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo74':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo74/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo74/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					$widgets_file = dirname( __FILE__ ) . '/demo74/widget_data.json';
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo74/revsliders/';
										
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo75':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo75/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo75/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo75/revsliders/';
										
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo76':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo76/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo76/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo76/revsliders/';
										
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo77':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo77/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo77/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
										
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo78':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo78/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo78/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
										
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo79':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo79/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo79/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
										
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo80':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo80/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo80/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
										
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo81':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo81/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo81/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo81/revsliders/';
															
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo82':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo82/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo82/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo82/revsliders/';
															
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo83':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo83/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo83/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo83/revsliders/';
															
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo84':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo84/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo84/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo84/revsliders/';
															
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo85':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo85/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo85/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo85/revsliders/';
															
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo86':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo86/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo86/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo86/revsliders/';
															
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo87':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo87/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo87/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
															
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo88':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo88/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo88/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo89':	
					$shop_demo = true;
					$woo_xml = dirname( __FILE__ ). '/demo89/apress.xml';			
					$theme_xml_file = dirname( __FILE__ ) . '/demo89/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo89/theme_options.json';
					
					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$widgets_file = dirname( __FILE__ ) . '/demo89/widget_data.json';
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo89/revsliders/';
															
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo90':	
					$shop_demo = true;
					$woo_xml = dirname( __FILE__ ). '/demo90/apress.xml';			
					$theme_xml_file = dirname( __FILE__ ) . '/demo90/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo90/theme_options.json';
					
					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$widgets_file = dirname( __FILE__ ) . '/demo90/widget_data.json';
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo90/revsliders/';
															
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo91':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo91/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo91/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$widgets_file = dirname( __FILE__ ) . '/demo91/widget_data.json';
					
					$revslider_exists = false;
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo92':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo92/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo92/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$widgets_file = dirname( __FILE__ ) . '/demo92/widget_data.json';
					
					$revslider_exists = false;
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo93':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo93/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo93/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$widgets_file = dirname( __FILE__ ) . '/demo93/widget_data.json';
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo93/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo94':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo94/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo94/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$widgets_file = dirname( __FILE__ ) . '/demo94/widget_data.json';
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo94/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo95':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo95/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo95/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$widgets_file = dirname( __FILE__ ) . '/demo95/widget_data.json';
					
					$revslider_exists = false;
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo96':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo96/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo96/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$widgets_file = dirname( __FILE__ ) . '/demo96/widget_data.json';
					
					$revslider_exists = false;
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo97':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo97/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo97/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$widgets_file = dirname( __FILE__ ) . '/demo97/widget_data.json';
					
					$revslider_exists = false;
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo98':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo98/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo98/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo98/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo99':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo99/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo99/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$widgets_file = dirname( __FILE__ ) . '/demo99/widget_data.json';
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo99/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo100':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo100/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo100/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo100/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo101':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo101/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo101/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo101/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo102':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo102/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo102/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo102/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo103':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo103/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo103/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo103/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo104':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo104/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo104/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo104/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo105':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo105/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo105/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo105/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo106':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo106/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo106/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo107':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo107/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo107/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo107/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo108':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo108/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo108/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo108/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo109':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo109/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo109/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo109/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo110':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo110/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo110/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo110/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo111':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo111/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo111/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo111/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo112':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo112/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo112/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo112/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo113':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo113/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo113/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo114':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo114/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo114/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo114/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo115':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo115/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo115/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo116':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo116/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo116/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo117':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo117/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo117/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo118':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo118/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo118/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo118/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo119':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo119/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo119/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo120':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo120/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo120/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo121':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo121/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo121/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo122/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo122':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo122/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo122/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo122/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo124':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo124/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo124/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo124/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo125':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/demo125/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo125/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo125/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo126':	
					$shop_demo = true;
					$woo_xml = dirname( __FILE__ ). '/demo126/apress.xml';			
					$theme_xml_file = dirname( __FILE__ ) . '/demo126/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo126/theme_options.json';
					
					// Register Custom Sidebars
					$sidebar_exists = false;
					
					//$widgets_file = dirname( __FILE__ ) . '/demo126/widget_data.json';
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo126/revsliders/';
															
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'demo127':	
					$shop_demo = true;
					$woo_xml = dirname( __FILE__ ). '/demo127/apress.xml';			
					$theme_xml_file = dirname( __FILE__ ) . '/demo127/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo127/theme_options.json';
					
					// Register Custom Sidebars
					$sidebar_exists = false;
					
					//$widgets_file = dirname( __FILE__ ) . '/demo127/widget_data.json';
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo127/revsliders/';
															
					// reading settings
					$homepage_title = 'Home';
				break;
				case 'twenty18':	
					$shop_demo = false;
					$theme_xml_file = dirname( __FILE__ ) . '/twenty18/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/twenty18/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;
					
					$revslider_exists = false;
										
					// reading settings
					$homepage_title = 'Home';
				break;
				default:	
					$shop_demo = false;									
					$theme_xml_file = dirname( __FILE__ ) . '/demo35/apress.xml';
					$theme_options_file = dirname( __FILE__ ) . '/demo35/theme_options.json';

					// Register Custom Sidebars
					$sidebar_exists = false;

					// Sidebar Widgets File
					$widgets_file = dirname( __FILE__ ) . '/demo35/widget_data.json';
					
					$revslider_exists = true;
					$rev_directory = dirname( __FILE__ ) . '/demo35/revsliders/';
					
					// reading settings
					$homepage_title = 'Home';

			}

			add_filter('intermediate_image_sizes_advanced', 'apress_filter_image_sizes');
			
			/* Import Woocommerce if WooCommerce Exists */
			if( class_exists('WooCommerce') && $shop_demo == true ) {
				$importer = new WP_Import();
				$theme_xml = $woo_xml;
				$importer->fetch_attachments = true;
				ob_start();
				$importer->import($theme_xml);
				ob_end_clean();

				// Set pages
				$woopages = array(
					'woocommerce_shop_page_id' => 'Shop',
					'woocommerce_cart_page_id' => 'Cart',
					'woocommerce_checkout_page_id' => 'Checkout',
					'woocommerce_pay_page_id' => 'Checkout &#8594; Pay',
					'woocommerce_thanks_page_id' => 'Order Received',
					'woocommerce_myaccount_page_id' => 'My Account',
					'woocommerce_edit_address_page_id' => 'Edit My Address',
					'woocommerce_view_order_page_id' => 'View Order',
					'woocommerce_change_password_page_id' => 'Change Password',
					'woocommerce_logout_page_id' => 'Logout',
					'woocommerce_lost_password_page_id' => 'Lost Password'
				);
				foreach($woopages as $woo_page_name => $woo_page_title) {
					$woopage = get_page_by_title( $woo_page_title );
					if(isset( $woopage ) && $woopage->ID) {
						update_option($woo_page_name, $woopage->ID); // Front Page
					}
				}

				// We no longer need to install pages
				delete_option( '_wc_needs_pages' );
				delete_transient( '_wc_activation_redirect' );

				// Flush rules after install
				flush_rewrite_rules();
			} else {
				$importer = new WP_Import();
				/* Import Posts, Pages, Portfolio Content, FAQ, Images, Menus */
				$theme_xml = $theme_xml_file;
				$importer->fetch_attachments = true;
				ob_start();
				$importer->import($theme_xml);
				ob_end_clean();

				flush_rewrite_rules();
			}	

			// Set imported menus to registered theme locations
			$locations = get_theme_mod( 'nav_menu_locations' ); // registered menu locations in theme
			$menus = wp_get_nav_menus(); // registered menus
			
			if($menus) {
				foreach($menus as $menu) { // assign menus to theme locations
					if( $menu->name == 'Main Menu' ) {
						$locations['primary-nav'] = $menu->term_id;
					} else if( $menu->name == 'Top Menu' ) {
						$locations['top-nav'] = $menu->term_id;
					}
				}
			}

			set_theme_mod( 'nav_menu_locations', $locations ); // set menus to locations

			// Import Theme Options
			$theme_options_json = file_get_contents( $theme_options_file );
			$theme_options = json_decode( $theme_options_json, true );
			update_option( 'apress_data', $theme_options ); // update theme options

			// Add sidebar widget areas
			if($sidebar_exists == true) {
				update_option( 'sbg_sidebars', $sidebars );

				foreach( $sidebars as $sidebar ) {
					$sidebar_class = apress_name_to_class( $sidebar );
					register_sidebar( array(
					'name'          => $sidebar,
					'id'            => 'apress-custom-sidebar-' . strtolower( $sidebar_class ),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="heading"><h4 class="widget-title">',
					'after_title'   => '</h4></div>',
				) );
				}
			}

			// Add data to widgets
			if( isset( $widgets_file ) && $widgets_file ) {
				$widgets_json = $widgets_file; // widgets data file
				$widgets_json = file_get_contents( $widgets_json );
				$widget_data = $widgets_json;
				$import_widgets = zolo_import_widget_data( $widget_data );
			}

			// Import Revslider
			if( class_exists('UniteFunctionsRev') && $revslider_exists == true ) { // if revslider is activated
				$rev_files = zolo_get_import_files( $rev_directory, 'zip' );

				$slider = new RevSlider();
				foreach( $rev_files as $rev_file ) { // finally import rev slider data files

					$filepath = $rev_file;

					ob_start();
					$slider->importSliderFromPost(true, false, $filepath);
					ob_clean();
					ob_end_clean();
				}
			}
			
			// Set reading options
			$homepage = get_page_by_title( $homepage_title );
			if(isset( $homepage ) && $homepage->ID) {
				update_option('show_on_front', 'page');
				update_option('page_on_front', $homepage->ID); // Front Page
			}

			echo 'imported';

			exit;
		}
	}
}

// Parsing Widgets Function
// Thanks to http://wordpress.org/plugins/widget-settings-importexport/
function zolo_import_widget_data( $widget_data ) {
	$json_data = $widget_data;
	$json_data = json_decode( $json_data, true );

	$sidebar_data = $json_data[0];
	$widget_data = $json_data[1];

	foreach ( $widget_data as $widget_data_title => $widget_data_value ) {
		$widgets[ $widget_data_title ] = '';
		foreach( $widget_data_value as $widget_data_key => $widget_data_array ) {
			if( is_int( $widget_data_key ) ) {
				$widgets[$widget_data_title][$widget_data_key] = 'on';
			}
		}
	}
	unset($widgets[""]);

	foreach ( $sidebar_data as $title => $sidebar ) {
		$count = count( $sidebar );
		for ( $i = 0; $i < $count; $i++ ) {
			$widget = array( );
			$widget['type'] = trim( substr( $sidebar[$i], 0, strrpos( $sidebar[$i], '-' ) ) );
			$widget['type-index'] = trim( substr( $sidebar[$i], strrpos( $sidebar[$i], '-' ) + 1 ) );
			if ( !isset( $widgets[$widget['type']][$widget['type-index']] ) ) {
				unset( $sidebar_data[$title][$i] );
			}
		}
		$sidebar_data[$title] = array_values( $sidebar_data[$title] );
	}

	foreach ( $widgets as $widget_title => $widget_value ) {
		foreach ( $widget_value as $widget_key => $widget_value ) {
			$widgets[$widget_title][$widget_key] = $widget_data[$widget_title][$widget_key];
		}
	}

	$sidebar_data = array( array_filter( $sidebar_data ), $widgets );

	zolo_parse_import_data( $sidebar_data );
}

function zolo_parse_import_data( $import_array ) {
	global $wp_registered_sidebars;
	$sidebars_data = $import_array[0];
	$widget_data = $import_array[1];
	$current_sidebars = get_option( 'sidebars_widgets' );
	$new_widgets = array( );

	foreach ( $sidebars_data as $import_sidebar => $import_widgets ) :

		foreach ( $import_widgets as $import_widget ) :
			//if the sidebar exists
			if ( isset( $wp_registered_sidebars[$import_sidebar] ) ) :
				$title = trim( substr( $import_widget, 0, strrpos( $import_widget, '-' ) ) );
				$index = trim( substr( $import_widget, strrpos( $import_widget, '-' ) + 1 ) );
				$current_widget_data = get_option( 'widget_' . $title );
				$new_widget_name = zolo_get_new_widget_name( $title, $index );
				$new_index = trim( substr( $new_widget_name, strrpos( $new_widget_name, '-' ) + 1 ) );

				if ( !empty( $new_widgets[ $title ] ) && is_array( $new_widgets[$title] ) ) {
					while ( array_key_exists( $new_index, $new_widgets[$title] ) ) {
						$new_index++;
					}
				}
				$current_sidebars[$import_sidebar][] = $title . '-' . $new_index;
				if ( array_key_exists( $title, $new_widgets ) ) {
					$new_widgets[$title][$new_index] = $widget_data[$title][$index];
					$multiwidget = $new_widgets[$title]['_multiwidget'];
					unset( $new_widgets[$title]['_multiwidget'] );
					$new_widgets[$title]['_multiwidget'] = $multiwidget;
				} else {
					$current_widget_data[$new_index] = $widget_data[$title][$index];
					$current_multiwidget = isset($current_widget_data['_multiwidget']) ? $current_widget_data['_multiwidget'] : false;
					$new_multiwidget = isset($widget_data[$title]['_multiwidget']) ? $widget_data[$title]['_multiwidget'] : false;
					$multiwidget = ($current_multiwidget != $new_multiwidget) ? $current_multiwidget : 1;
					unset( $current_widget_data['_multiwidget'] );
					$current_widget_data['_multiwidget'] = $multiwidget;
					$new_widgets[$title] = $current_widget_data;
				}

			endif;
		endforeach;
	endforeach;

	if ( isset( $new_widgets ) && isset( $current_sidebars ) ) {
		update_option( 'sidebars_widgets', $current_sidebars );

		foreach ( $new_widgets as $title => $content )
			update_option( 'widget_' . $title, $content );

		return true;
	}

	return false;
}

function zolo_get_new_widget_name( $widget_name, $widget_index ) {
	$current_sidebars = get_option( 'sidebars_widgets' );
	$all_widget_array = array( );
	foreach ( $current_sidebars as $sidebar => $widgets ) {
		if ( !empty( $widgets ) && is_array( $widgets ) && $sidebar != 'wp_inactive_widgets' ) {
			foreach ( $widgets as $widget ) {
				$all_widget_array[] = $widget;
			}
		}
	}
	while ( in_array( $widget_name . '-' . $widget_index, $all_widget_array ) ) {
		$widget_index++;
	}
	$new_widget_name = $widget_name . '-' . $widget_index;
	return $new_widget_name;
}

if( function_exists( 'layerslider_import_sample_slider' ) ) {}

// Rename sidebar
function apress_name_to_class($name){
	$class = str_replace(array(' ',',','.','"',"'",'/',"\\",'+','=',')','(','*','&','^','%','$','#','@','!','~','`','<','>','?','[',']','{','}','|',':',),'',$name);
	return $class;
}



/*
* Returns all files in directory with the given filetype. Uses glob() for older
* php versions and recursive directory iterator otherwise.
*
* @param string $directory Directory that should be parsed
* @param string $filetype The file type
*
* @return array $files File names that match the $filetype
*/
function zolo_get_import_files( $directory, $filetype ) {
	$phpversion = phpversion();
	$files = array();

	// Check if the php version allows for recursive iterators
	if ( version_compare( $phpversion, '5.2.11', '>' ) ) {
		if ( $filetype != '*' )  {
			$filetype = '/^.*\.' . $filetype . '$/';
		} else {
			$filetype = '/.+\.[^.]+$/';
		}
		$directory_iterator = new RecursiveDirectoryIterator( $directory );
		$recusive_iterator = new RecursiveIteratorIterator( $directory_iterator );
		$regex_iterator = new RegexIterator( $recusive_iterator, $filetype );

		foreach( $regex_iterator as $file ) {
			$files[] = $file->getPathname();
		}
	// Fallback to glob() for older php versions
	} else {
		if ( $filetype != '*' )  {
			$filetype = '*.' . $filetype;
		}

		foreach( glob( $directory . $filetype ) as $filename ) {
			$filename = basename( $filename );
			$files[] = $directory . $filename;
		}
	}

	return $files;
}

// Omit closing PHP tag to avoid "Headers already sent" issues.
