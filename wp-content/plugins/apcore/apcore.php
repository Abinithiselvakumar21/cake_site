<?php
/*
Plugin Name: Apress Core
Plugin URI: http://apresswp.com/plugins
Description: Apress theme extensions plugin contains custom shortcodes for Visual Composer, custom shortcodes, custom sidebars, custom widgets
Version: 2.6.2
Author: Apress Themes
Author URI: https://themeforest.net/user/apresswp
Text Domain: apcore
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define('APRESS_EXTENSIONS_PLUGIN_URL',plugins_url().'/apcore/');
define('APRESS_EXTENSIONS_PLUGIN_PATH',plugin_dir_path(__FILE__));

define('APCORE_DEMO_EXTENSIONS_PLUGIN_URL',plugins_url().'/apress-importer/');

define('APCORE_DOCUMENTATION_URL','http://apresswp.com/help');


include_once APRESS_EXTENSIONS_PLUGIN_PATH . 'includes/apcore-base.php';

class Apress_Core extends Apcore_Base {
	/**
	 * Core singleton class
	 * @var self - pattern realization
	 */
	protected static $instance = null;
	
	/**
	 * Get the instane of Apress_Core
	 *
	 * @return self
	 */
	public static function instance() {

		if( null == self::$instance ) {
			self::$instance = new Apress_Core();
		}

		return self::$instance;
	}

	
	/**
	 * Constructor
	 *
	 */
	public function __construct() {
		$theme = wp_get_theme()->get( 'Name' );
		if(substr_count($theme, 'Apress') > 0) {			
			$this->add_action( 'after_setup_theme', 'load_apcore_text_domain' );			
			$this->loadRedux();
			$this->mataboxGenerator();
			$this->multiple_post_thumbnail();
			$this->includes();
			$this->add_action( 'after_setup_theme', 'addVcCustomElements');			
			$this->add_action( 'init', 'load_post_types', 1 );			
			$this->add_action( 'init', 'init', 25 );					
			$this->sidebarGenerator();
			$this->zillaLikes();
			register_activation_hook( __FILE__, array($this,'apressReduxHook',) );
		} else {
			add_action(	'admin_notices', array($this, '_admin_notice__error'));
		}
	}
	
	/**
	 * Register the plugin text domain.
	 *
	 * @access public
	 * @return void
	 */
	public function load_apcore_text_domain() {
		load_plugin_textdomain( 'apcore', false, APRESS_EXTENSIONS_PLUGIN_PATH . '/languages' );
	}
	
	/**
	 * Enables to add hooks in activation process.
	 *
	 */
	public function apressReduxHook(  ) {
		do_action( 'apress_activation_hook' );
	}
	
	/**
	 * Callback function for WP init action hook. Loads required objects.
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function init() {
		
		
		if ( class_exists( 'Vc_Manager' ) && class_exists( 'WPBakeryShortCode' ) ) {
			$this->init_vc();
			//$this->vc_integration();
			//$this->load_shortcodes();
			$this->vc_apress_templates();
		}
		
	}
	
	public function init_vc() {

		global $vc_manager;
		$vc_manager->setIsAsTheme();
		$vc_manager->disableUpdater();
	}
	
	public function vc_apress_templates() {

		$apress_templates = new Apress_Vc_Templates_Panel_Editor();
		return $apress_templates->init();

	}
	
	/*
	 * Load Redux Core
	 */
	public function loadRedux() {
		require_once(APRESS_EXTENSIONS_PLUGIN_PATH.'redux_extensions/extensions-loader.php');
		require_once(APRESS_EXTENSIONS_PLUGIN_PATH.'redux_framework/ReduxCore/framework.php');
		require_once(APRESS_EXTENSIONS_PLUGIN_PATH.'redux_customizer/active-customizer.php');
	}
	
	/*
	 * Load Apress Welcome 
	 */
	public function welcomeApress() {
		require_once(APRESS_EXTENSIONS_PLUGIN_PATH.'apress_welcome/apress_welcome.php');
	}
	/*
	 * Load Metabox
	 */
	public function mataboxGenerator() {
		require_once(APRESS_EXTENSIONS_PLUGIN_PATH.'metaboxes/metaboxes.php');
	}
	/*
	 * Multiple Featured Images
	 */
	public function multiple_post_thumbnail() {
		require_once(APRESS_EXTENSIONS_PLUGIN_PATH.'multiple-featured-images/multiple-featured-images.php');
	}
	/*
	 * Register custom Functions
	 */
	public function includes() {
		require_once(APRESS_EXTENSIONS_PLUGIN_PATH.'actions.php');
	}
	
	
	/**
	 * Custom Post Types
	 */
	public function load_post_types() {		
		require_if_theme_supports( 'apcore-portfolio', APRESS_EXTENSIONS_PLUGIN_PATH . 'post-types/apcore-portfolio.php' );
		require_if_theme_supports( 'apcore-testimonial', APRESS_EXTENSIONS_PLUGIN_PATH . 'post-types/apcore-testimonial.php' );
		require_if_theme_supports( 'apcore-team', APRESS_EXTENSIONS_PLUGIN_PATH . 'post-types/apcore-team.php' );
		require_if_theme_supports( 'apcore-header', APRESS_EXTENSIONS_PLUGIN_PATH . 'post-types/apcore-header.php' );
		require_if_theme_supports( 'apcore-footer', APRESS_EXTENSIONS_PLUGIN_PATH . 'post-types/apcore-footer.php' );
		require_if_theme_supports( 'apcore-template', APRESS_EXTENSIONS_PLUGIN_PATH . 'post-types/apcore-template.php' );
	}
	
	
	/*
	 * Add custom VC elements
	 */
	public function addVcCustomElements() {
		if ( class_exists( 'Vc_Manager' ) && class_exists( 'WPBakeryShortCode' ) ) {						
			add_action('admin_enqueue_scripts', 'apress_vc_styles');
			add_action( 'admin_print_scripts-post.php', 'enqueue', 99 );
			add_action( 'admin_print_scripts-post-new.php', 'enqueue', 99 );
			function apress_vc_styles() {
				// Template Import Css
				wp_enqueue_style('apress_vc', APRESS_EXTENSIONS_PLUGIN_URL.'vc_custom/assets/admin/css/vc-custom.css', array(), time(), 'all');
				wp_enqueue_style('apress_linea', APRESS_EXTENSIONS_PLUGIN_URL.'vc_custom/assets/css/fonts/svg/font/all_linea_styles.css', array(), time(), 'all');
			}
			function enqueue() {
				wp_enqueue_script('apress_vc_script', APRESS_EXTENSIONS_PLUGIN_URL.'vc_custom/assets/admin/js/vc-script.js', array('jquery'), '1.0.0', true );
			}
			require_once APRESS_EXTENSIONS_PLUGIN_PATH. 'vc_custom/vc_functions.php';
			require_once APRESS_EXTENSIONS_PLUGIN_PATH. 'mce/zolo_shortcodes_tinymce.php';
			if( class_exists( 'WPBakeryVisualComposerAbstract' )) {
				require_once APRESS_EXTENSIONS_PLUGIN_PATH.'/vc_custom/theme-vc-templates-panel-editor.php';
				require_once APRESS_EXTENSIONS_PLUGIN_PATH.'/vc_custom/theme-studio-templates.php';
			}	
		}
	}
	/*
	 * Sidebar Generator
	 */
	public function sidebarGenerator() {
		// Inlude sidebar generator plugin
		require_once(APRESS_EXTENSIONS_PLUGIN_PATH.'sidebar_generator.php');
	}	
	/*
	 * Zilla Likes
	 */
	public function zillaLikes() {
		// Include Like plugin
		require_once(APRESS_EXTENSIONS_PLUGIN_PATH.'zilla-likes.php');
	}
	/*
	 * Admin notice text
	 */
	public function _admin_notice__error() {
		echo '<div class="notice notice-error is-dismissible">';
			echo '<p>'. esc_html__( 'Apress Theme Extensions is enabled but not effective. It requires Apress theme in order to work.', 'apcore' ) .'</p>';
		echo '</div>';
	}
}

$Apress_Core = new Apress_Core();