<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.4.1
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/framework/plugins/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'apress_theme_register_required_plugins' );
function apress_theme_register_required_plugins() {
	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		// This is an example of how to include a plugin pre-packaged with a theme
		array(
			'name'	 				=> 'Visual Composer', // The plugin name
			'slug'	 				=> 'js_composer', // The plugin slug (typically the folder name)
			'source'   				=> 'http://apresswp.com/updatedplugins/js_composer.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> 'http://apresswp.com/updatedplugins', // If set, overrides default API URL and points to an external URL
			'image_src'				=> get_template_directory_uri() . '/assets/images/plugin_visual-composer.jpg',
			'category'				=> 'premium builder',
		),
		array(
			'name'	 				=> 'Ultimate VC Addons', // The plugin name
			'slug'	 				=> 'Ultimate_VC_Addons', // The plugin slug (typically the folder name)
			'source'   				=> 'http://apresswp.com/updatedplugins/Ultimate_VC_Addons.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> 'http://apresswp.com/updatedplugins', // If set, overrides default API URL and points to an external URL
			'image_src'				=> get_template_directory_uri() . '/assets/images/plugin_ultimate.jpg',
			'category'				=> 'premium',
		),
		array(
			'name'	 				=> 'Apress Core', // The plugin name
			'slug'	 				=> 'apcore', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/plugins/apcore.zip', // The plugin source
			'version'            	=> '2.6.2', 
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			'image_src'				=> get_template_directory_uri() . '/assets/images/plugin_apcore.jpg',
			'category'				=> 'apress',
		),
		array(
			'name'	 				=> 'Apress Importer', // The plugin name
			'slug'	 				=> 'apress-importer', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/plugins/apress-importer.zip', // The plugin source
			'version'            	=> '2.3.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			'image_src'				=> get_template_directory_uri() . '/assets/images/plugin_apress-importer.jpg',
			'category'				=> 'apress',
		),
		array(
			'name'	 				=> 'Revolution Slider', // The plugin name
			'slug'	 				=> 'revslider', // The plugin slug (typically the folder name)
			'source'   				=> 'http://apresswp.com/updatedplugins/revslider.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> 'http://apresswp.com/updatedplugins', // If set, overrides default API URL and points to an external URL
			'image_src'				=> get_template_directory_uri() . '/assets/images/plugin_revslider.jpg',
			'category'				=> 'slider premium',
		),
		array(
			'name'	 				=> 'WooCommerce', // The plugin name
			'slug'	 				=> 'woocommerce', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'image_src'				=> get_template_directory_uri() . '/assets/images/plugin_woocommerce.jpg',
			'category'				=> 'free woocommerce',
		),
		array(
			'name'	 				=> 'WooCommerce Wishlist', // The plugin name
			'slug'	 				=> 'yith-woocommerce-wishlist', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'image_src'				=> get_template_directory_uri() . '/assets/images/plugin_woocommerce-wishlist.jpg',
			'category'				=> 'free woocommerce',
		),
		array(
			'name'	 				=> 'WooCommerce Compare', // The plugin name
			'slug'	 				=> 'yith-woocommerce-compare', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'image_src'				=> get_template_directory_uri() . '/assets/images/plugin_woocommerce-compare.jpg',
			'category'				=> 'free woocommerce',
		),
		array(
			'name'	 				=> 'Contact Form 7', // The plugin name
			'slug'	 				=> 'contact-form-7', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'image_src'				=> get_template_directory_uri() . '/assets/images/plugin_contact-form.jpg',
			'category'				=> 'free',
		),
		array(
			'name'	 				=> 'Mailchimp for WP', // The plugin name
			'slug'	 				=> 'mailchimp-for-wp', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'image_src'				=> get_template_directory_uri() . '/assets/images/plugin_mailchimp-for-wp.jpg',
			'category'				=> 'free',
		),
/*		array(
			'name'	 				=> 'Elementor', // The plugin name
			'slug'	 				=> 'elementor', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'image_src'				=> get_template_directory_uri() . '/assets/images/plugin_elementor.jpg',
			'category'				=> 'free builder',
		),*/
		array(
			'name'	 				=> 'Yoast', // The plugin name
			'slug'	 				=> 'wordpress-seo', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'image_src'				=> get_template_directory_uri() . '/assets/images/plugin_yoast.jpg',
			'category'				=> 'free',
		)
	);

	
	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'id'				=> 'apress',         	// Text domain - likely want to be the same as your theme.
		'domain'       		=> 'apress',         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_slug'		=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'dismissable'		=> true,                       	// If false, a user cannot dismiss the nag message.
		'dismiss_msg'		=> '',						// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		
	);

	tgmpa( $plugins, $config );
}