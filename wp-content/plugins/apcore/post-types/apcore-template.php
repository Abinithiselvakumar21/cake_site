<?php
/**
 * Post Type: Template
 * Register Custom Post Type
 */

$labels = array(
	'name'                  => _x( 'Templates', 'Post Type General Name', 'apcore' ),
	'singular_name'         => _x( 'Template', 'Post Type Singular Name', 'apcore' ),
	'menu_name'             => __( 'Templates', 'apcore' ),
	'name_admin_bar'        => __( 'Templates', 'apcore' ),
	'archives'              => __( 'Item Archives', 'apcore' ),
	'parent_item_colon'     => __( 'Parent Item:', 'apcore' ),
	'all_items'             => __( 'All Items', 'apcore' ),
	'add_new_item'          => __( 'Add New Template', 'apcore' ),
	'add_new'               => __( 'Add New Template', 'apcore' ),
	'new_item'              => __( 'New Template', 'apcore' ),
	'edit_item'             => __( 'Edit Template', 'apcore' ),
	'update_item'           => __( 'Update Template', 'apcore' ),
	'view_item'             => __( 'View Template', 'apcore' ),
	'search_items'          => __( 'Search Template', 'apcore' ),
	'not_found'             => __( 'Not found', 'apcore' ),
	'not_found_in_trash'    => __( 'Not found in Trash', 'apcore' ),
	'featured_image'        => __( 'Featured Image', 'apcore' ),
	'set_featured_image'    => __( 'Set featured image', 'apcore' ),
	'remove_featured_image' => __( 'Remove featured image', 'apcore' ),
	'use_featured_image'    => __( 'Use as featured image', 'apcore' ),
	'insert_into_item'      => __( 'Insert into item', 'apcore' ),
	'uploaded_to_this_item' => __( 'Uploaded to this item', 'apcore' ),
	'items_list'            => __( 'Items list', 'apcore' ),
	'items_list_navigation' => __( 'Items list navigation', 'apcore' ),
	'filter_items_list'     => __( 'Filter items list', 'apcore' ),
);
$args = array(
	'label'                 => __( 'Template', 'apcore' ),
	'labels'        		=> $labels,
	'supports'              => array( 'title', 'editor', 'revisions', ),
	'show_in_rest'			=> true, // Gutenberg Support
	'hierarchical'          => false,
	'public'                => true,
	'show_ui'       		=> true,
	'show_in_menu'          => true,
	'menu_position'         => 26,
	'menu_icon'     		=> 'dashicons-tagcloud',	
	'show_in_admin_bar'     => true,
	'show_in_nav_menus'     => false,
	'can_export'            => true,
	'has_archive'   		=> false,
	'exclude_from_search'   => true,
	'publicly_queryable'    => true,
	'rewrite'               => false,
	'capability_type'       => 'page',
);

register_post_type( 'apcore_template', $args );
